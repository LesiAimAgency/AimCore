<?php

namespace App\Http\Controllers\Viettinmart;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

            // Simple Captcha check (if user submitted captcha_answer)
            if ($request->filled('captcha_answer')) {
                $sessionCaptcha = session('captcha_answer');
                if ($sessionCaptcha !== null && (int) $request->input('captcha_answer') !== (int) $sessionCaptcha) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Câu trả lời câu hỏi bảo mật không chính xác. Vui lòng thử lại.',
                    ], 422);
                }
            }

            // Validation
            $validator = Validator::make($request->all(), [
                'product_id' => 'required|integer|exists:products_enhanced,id',
                'rating' => 'required|integer|min:1|max:5',
                'customer_name' => 'required|string|max:255',
                'customer_email' => 'required|email|max:255',
                'comment' => 'required|string|min:10|max:2000',
            ], [
                'product_id.required' => 'Vui lòng chọn sản phẩm',
                'product_id.exists' => 'Sản phẩm không tồn tại',
                'rating.required' => 'Vui lòng chọn số sao đánh giá',
                'rating.min' => 'Đánh giá tối thiểu 1 sao',
                'rating.max' => 'Đánh giá tối đa 5 sao',
                'customer_name.required' => 'Vui lòng nhập tên của bạn',
                'customer_email.required' => 'Vui lòng nhập email của bạn',
                'customer_email.email' => 'Email không đúng định dạng',
                'comment.required' => 'Vui lòng nhập nội dung đánh giá',
                'comment.min' => 'Nội dung đánh giá phải có ít nhất 10 ký tự',
                'comment.max' => 'Nội dung đánh giá không được quá 2000 ký tự',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->first(),
                ], 422);
            }

            // Sanitize input
            $customerName = strip_tags(trim($request->customer_name));
            $customerEmail = filter_var(trim($request->customer_email), FILTER_SANITIZE_EMAIL);
            $comment = strip_tags(trim($request->comment));

            // Handle forbidden keywords
            $forbidden = setting('review_forbidden_keywords', 'tệ, kém, ghét');
            $keywords = $forbidden ? array_map('trim', explode(',', $forbidden)) : [];
            foreach ($keywords as $kw) {
                if ($kw !== '' && stripos($comment, $kw) !== false) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Nội dung chứa từ khóa không cho phép!',
                    ], 422);
                }
            }

            // Check require_purchase setting (defaults to false)
            if (setting('review_require_purchase', false)) {
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
                $isVerifiedPurchase = (bool) $hasOrdered;
            }

            $autoApprove = setting('review_auto_approve', 1);
            $isAutoApproved = ($autoApprove == '1' || $autoApprove === true || $autoApprove === 1);

            // Create ProductReview
            $review = ProductReview::create([
                'product_id' => $request->product_id,
                'rating' => $request->rating,
                'reviewer_name' => $customerName,
                'reviewer_email' => $customerEmail,
                'comment' => $comment,
                'status' => $isAutoApproved ? 'approved' : 'pending',
                'is_verified' => $isVerifiedPurchase,
            ]);

            return response()->json([
                'success' => true,
                'message' => $review->status === 'approved'
                    ? 'Cảm ơn bạn đã gửi đánh giá! Đánh giá đã được ghi nhận.'
                    : 'Đánh giá đã được gửi và đang chờ quản trị viên duyệt.',
                'review' => [
                    'id' => $review->id,
                    'rating' => $review->rating,
                    'status' => $review->status,
                ],
            ], 201);

        } catch (\Exception $e) {
            Log::error('Review submission error: '.$e->getMessage(), [
                'exception' => $e,
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi gửi đánh giá. Vui lòng thử lại sau.',
            ], 500);
        }
    }
}
