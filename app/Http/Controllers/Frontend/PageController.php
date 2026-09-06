<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Viettinmart\ShopController;
use App\Models\Category;
use App\Models\FormSubmission;
use App\Models\Post;
use App\Models\Product;
use App\Models\Project;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($locale = null, $slug = null)
    {
        // Handle both localized and non-localized routes, or {projectCode}/{slug}
        if ($slug === null) {
            $slug = $locale;
            $locale = null;
        }

        $project = function_exists('current_project') ? current_project() : null;
        if (! $project && app()->bound('current_project_id')) {
            $project = Project::find(app('current_project_id'));
        }
        if (! $project && request()->route('projectCode')) {
            $project = Project::where('code', request()->route('projectCode'))->first();
        }

        $query = Post::pages()->where('status', 'published');
        if ($project) {
            $query->where('project_id', $project->id);
        }

        // Try exact slug
        $page = (clone $query)->where('slug', $slug)->first();

        // Try slug with project id suffix (e.g. gioi-thieu-10)
        if (! $page && $project) {
            $page = (clone $query)->where('slug', $slug.'-'.$project->id)->first();
        }

        // Known aliases
        if (! $page && $project) {
            $aliases = [
                'gioi-thieu' => ['gioi-thieu-10', 'about-us', 'introduce'],
                'chinh-sach-giao-hang' => ['shipping-policy', 'chinh-sach-van-chuyen', 'chinh-sach-giao-hang-10'],
                'chinh-sach-van-chuyen' => ['shipping-policy', 'chinh-sach-giao-hang'],
            ];
            if (isset($aliases[$slug])) {
                $page = (clone $query)->whereIn('slug', $aliases[$slug])->first();
            }
        }

        // Fallback without project filter
        if (! $page) {
            $page = Post::pages()->where('slug', $slug)->where('status', 'published')->first();
        }

        if (! $page) {
            // Check if slug belongs to a product category
            $catAliases = [
                'dong-lanh' => ['dong-lanh', 'san-pham-tuoi-cap-dong-chua-so-che', 'thuc-pham-dong-lanh'],
                'thuc-pham-dong-lanh' => ['thuc-pham-dong-lanh', 'dong-lanh', 'san-pham-tuoi-cap-dong-chua-so-che'],
                'thit-hai-san' => ['thit-hai-san', 'cac-san-pham-tu-thit'],
                'rau-cu-qua' => ['rau-cu-qua', 'san-pham-da-lam-sach'],
                'do-uong' => ['do-uong', 'cac-san-pham-khac'],
                'banh-keo' => ['banh-keo', 'cac-san-pham-khac'],
            ];
            $lookupSlugs = $catAliases[$slug] ?? [$slug];

            $categoryQuery = Category::withoutGlobalScopes()->where('is_active', true);
            if ($project) {
                $category = (clone $categoryQuery)->where('project_id', $project->id)->whereIn('slug', $lookupSlugs)->first();
            } else {
                $category = null;
            }

            if (! $category) {
                $category = $categoryQuery->whereIn('slug', $lookupSlugs)->first();
            }

            if ($category) {
                if (class_exists(ShopController::class)) {
                    return app(ShopController::class)->index(request(), $project?->code, $category->slug);
                }

                return redirect(locale_route('shop.category', ['slug' => $category->slug]));
            }

            // Check if slug belongs to a product
            $product = Product::where('slug', $slug)->active()->first();
            if ($product) {
                if (class_exists(ShopController::class)) {
                    return app(ShopController::class)->show($project?->code, $slug);
                }

                return redirect(locale_route('shop.show', ['slug' => $slug]));
            }

            abort(404);
        }

        $theme = setting('theme');
        if ($theme) {
            if (view()->exists("frontend.themes.{$theme}.pages.show")) {
                return view("frontend.themes.{$theme}.pages.show", compact('page'));
            }
            if (view()->exists("frontend.themes.{$theme}.page")) {
                return view("frontend.themes.{$theme}.page", compact('page'));
            }
        }

        if ($page->template && view()->exists("frontend.templates.{$page->template}")) {
            return view("frontend.templates.{$page->template}", compact('page'));
        }

        if (view()->exists('pages.show')) {
            return view('pages.show', compact('page'));
        }

        return view('frontend.page', compact('page'));
    }

    public function contact($locale = null)
    {
        $theme = setting('theme');
        if ($theme && view()->exists("frontend.themes.{$theme}.contact")) {
            return view("frontend.themes.{$theme}.contact");
        }

        if (view()->exists('frontend.contact')) {
            return view('frontend.contact');
        }

        return view('frontend.pages.contact');
    }

    public function contactSubmit(Request $request, $projectCode = null, $locale = null)
    {
        // Detect INBETWEEN drawer form (uses full_name, phone, company, social_link fields)
        $isDrawerForm = $request->has('full_name') || $request->input('form_source') === 'contact_drawer';

        if ($isDrawerForm) {
            return $this->inbetweenContactSubmit($request);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'service' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',
        ], [
            'name.required' => 'Vui lòng nhập họ tên.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'message.required' => 'Vui lòng nhập nội dung.',
        ]);

        FormSubmission::create([
            'form_name' => 'contact',
            'data' => [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'service' => $validated['service'] ?? null,
                'message' => $validated['message'],
            ],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'status' => 'pending',
            'tenant_id' => session('current_tenant_id'),
        ]);

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất.']);
        }

        return back()->with('success', 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất.');
    }

    /**
     * Handle INBETWEEN contact drawer form submissions (full_name, phone, company, social_link, message).
     */
    protected function inbetweenContactSubmit(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:30',
            'company' => 'nullable|string|max:255',
            'social_link' => 'nullable|string|max:500',
            'message' => 'nullable|string|max:5000',
        ], [
            'full_name.required' => 'Vui lòng nhập họ tên.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
        ]);

        FormSubmission::create([
            'form_name' => 'inbetween_contact',
            'data' => [
                'full_name' => $validated['full_name'],
                'phone' => $validated['phone'],
                'company' => $validated['company'] ?? null,
                'social_link' => $validated['social_link'] ?? null,
                'message' => $validated['message'] ?? null,
                'source' => $request->input('form_source', 'inbetween'),
            ],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'status' => 'pending',
            'tenant_id' => session('current_tenant_id'),
        ]);

        return response()->json(['success' => true, 'message' => 'Cảm ơn bạn! Chúng tôi sẽ liên hệ sớm nhất.']);
    }
}
