@extends('layouts.app')

@section('title', 'WKcomputer - Máy Tính, Laptop, Linh Kiện Chính Hãng')
@section('description', 'WKcomputer - Hệ thống bán lẻ laptop, PC, linh kiện, gaming gear và phụ kiện công nghệ chính hãng. Bảo hành dài hạn, giao hàng toàn quốc.')

@section('content')
    {!! render_widgets('homepage-main') ?: render_widgets('homepage') !!}
@endsection

@push('scripts')
<script>
// Recommendation & product card tracking for homepage
(function() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
    document.querySelectorAll('.rec-product-wrapper').forEach(function(wrapper) {
        wrapper.addEventListener('click', function(e) {
            const link = e.target.closest('a');
            if (!link) return;
            const productId = parseInt(wrapper.dataset.productId);
            const recType = wrapper.dataset.recommendationType;
            const source = wrapper.dataset.source;
            if (productId && recType) {
                try {
                    navigator.sendBeacon('/api/recommendations/track',
                        new Blob([JSON.stringify({
                            product_id: productId,
                            recommendation_type: recType,
                            source: source,
                            position: parseInt(wrapper.dataset.position),
                            _token: csrfToken
                        })], {type: 'application/json'})
                    );
                } catch(e) {}
            }
        });
    });
})();
</script>
@endpush
