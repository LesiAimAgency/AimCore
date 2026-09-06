<?php

namespace App\Http\Controllers\Viettinmart;

use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        // FORCE JSON RESPONSE
        $request->headers->set('Accept', 'application/json');

        try {
            // Check if reviews are enabled
            if (! setting('review_enabled', true)) {
                return response()->json(['success' => false, 'message' => 'Tính năng đánh giá hiện đang tắt.'], 403);
            }

            // VALIDATION CHẶT CHẼ
            $validator = Validator::make($request->all(), [
                'product_id' => 'required|integer|exists:products_enhanced,id',
                'rating' => 'required|integer|min:1|max:5',
                'customer_name' => 'required|string|max:255|regex:/^[\p{L}\s]+$/u',
                'customer_email' => 'required|email:rfc,dns|max:255',
                'comment' => 'required|string|min:10|max:2000',
                'title' => 'nullable|string|max:255',
                'review_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ], [
                'product_id.required' => 'Vui lòng chọn sản phẩm',
                'product_id.exists' => 'Sản phẩm không tồn tại',
                'rating.required' => 'Vui lòng chọn số sao',
                'rating.min' => 'Đánh giá tối thiểu 1 sao',
                'rating.max' => 'Đánh giá tối đa 5 sao',
                'customer_name.required' => 'Vui lòng nhập tên',
                'customer_name.regex' => 'Tên chỉ được chứa chữ cái và khoảng trắng',
                'customer_email.required' => 'Vui lòng nhập email',
                'customer_email.email' => 'Email không hợp lệ',
                'comment.required' => 'Vui lòng nhập nội dung đánh giá',
                'comment.min' => 'Nội dung đánh giá phải có ít nhất 10 ký tự',
                'comment.max' => 'Nội dung đánh giá không được quá 2000 ký tự',
                'review_images.*.image' => 'File phải là ảnh',
                'review_images.*.mimes' => 'Ảnh phải có định dạng: jpeg, png, jpg, gif, webp',
                'review_images.*.max' => 'Kích thước ảnh không được vượt quá 2MB',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->first(),
                ], 422);
            }

            // SANITIZE INPUT
            $customerName = strip_tags(trim($request->customer_name));
            $customerEmail = filter_var(trim($request->customer_email), FILTER_SANITIZE_EMAIL);
            $comment = strip_tags(trim($request->comment));
            $title = strip_tags(trim($request->title ?? ''));

            // Handle forbidden keywords
            $forbidden = setting('review_forbidden_keywords', 'tệ, kém, ghét');
            $keywords = $forbidden ? array_map('trim', explode(',', $forbidden)) : [];
            foreach ($keywords as $kw) {
                if ($kw && stripos($comment, $kw) !== false) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Nội dung chứa từ khóa không cho phép!',
                    ], 422);
                }
            }

            // Check require_purchase setting
            if (setting('review_require_purchase', true)) {
                if (! auth()->check()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Bạn cần đăng nhập để đánh giá sản phẩm.',
                    ], 401);
                }
                $user = auth()->user();
                $hasOrdered = Order::where(function ($q) use ($user) {
                    $q->where('user_id', $user->id)->orWhere('customer_email', $user->email);
                })
                    ->where('status', 'completed')
                    ->whereHas('items', function ($q) use ($request) {
                        $q->where('product_id', $request->product_id);
                    })->exists();
                if (! $hasOrdered) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Bạn cần mua sản phẩm này trước khi đánh giá.',
                    ], 403);
                }
            }

            // Check verified purchase
            $isVerifiedPurchase = false;
            if (auth()->check()) {
                $user = auth()->user();
                $hasOrdered = Order::where(function ($q) use ($user) {
                    $q->where('user_id', $user->id)->orWhere('customer_email', $user->email);
                })
                    ->where('status', 'completed')
                    ->whereHas('items', function ($q) use ($request) {
                        $q->where('product_id', $request->product_id);
                    })->exists();
                $isVerifiedPurchase = $hasOrdered;
            }

            // Handle image uploads
            $imagePaths = [];
            if ($request->hasFile('review_images')) {
                foreach ($request->file('review_images') as $file) {
                    if ($file->isValid()) {
                        $path = $file->store('reviews', 'public');
                        $imagePaths[] = 'storage/'.$path;
                    }
                }
            }

            // Create review
            $review = Review::create([
                'product_id' => $request->product_id,
                'user_id' => auth()->id(),
                'rating' => $request->rating,
                'customer_name' => $customerName,
                'customer_email' => $customerEmail,
                'comment' => $comment,
                'title' => $title,
                'images' => $imagePaths,
                'is_verified_purchase' => $isVerifiedPurchase,
                'status' => setting('review_auto_approve', false) ? 'approved' : 'pending',
                'ip_address' => $request->ip(),
            ]);

            return response()->json([
                'success' => true,
                'message' => $review->status == 'approved'
                    ? 'Cảm ơn bạn đã đánh giá!'
                    : 'Đánh giá đã được gửi và đang chờ duyệt.',
                'review' => [
                    'id' => $review->id,
                    'rating' => $review->rating,
                    'status' => $review->status,
                ],
            ], 201);

        } catch (\Exception $e) {
            \Log::error('Review submission error: '.$e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi gửi đánh giá. Vui lòng thử lại sau.',
            ], 500);
        }
    }
}
