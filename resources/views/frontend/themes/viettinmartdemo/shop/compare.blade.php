@extends('layouts.app')

@section('title', __('compare_title'))

@section('content')
<div class="rts-compare-area rts-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area-between mb--40">
                    <h2 class="title text-3xl font-bold">{{ __('compare_title') }}</h2>
                    <a href="{{ locale_route('shop.index') }}" class="rts-btn btn-primary">{{ __('compare_continue_shopping') }}</a>
                </div>
                
                @if($products->count() > 0)
                <div class="compare-table-wrapper table-responsive">
                    <table class="table table-bordered text-center align-middle">
                        <thead>
                            <tr class="bg-gray-50">
                                <th style="width: 200px;">{{ __('compare_col_spec') }}</th>
                                @foreach($products as $product)
                                <th style="min-width: 250px;">
                                    <div class="product-compare-header p-3">
                                        <div class="text-right mb-2">
                                            <button type="button" onclick="removeFromCompare({{ $product->id }})" class="text-danger">
                                                <i class="fa-solid fa-xmark"></i> {{ __('compare_remove_btn') }}
                                            </button>
                                        </div>
                                        <a href="{{ locale_route('shop.show', $product->slug) }}">
                                            <img src="{{ $product->thumbnail_url }}" alt="{{ $product->name }}" class="mx-auto mb-3" style="max-height: 150px;">
                                            <h4 class="text-sm font-bold h-12 overflow-hidden">{{ $product->name }}</h4>
                                        </a>
                                    </div>
                                </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="font-bold">{{ __('compare_col_price') }}</td>
                                @foreach($products as $product)
                                <td class="text-primary font-bold text-lg">{{ $product->formatted_price }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="font-bold">{{ __('compare_col_category') }}</td>
                                @foreach($products as $product)
                                <td>{{ $product->categories->first()->name ?? 'N/A' }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="font-bold">{{ __('compare_col_description') }}</td>
                                @foreach($products as $product)
                                <td class="text-xs text-muted">
                                    <div class="max-h-24 overflow-y-auto">
                                        {{ Str::limit(strip_tags($product->description), 150) }}
                                    </div>
                                </td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="font-bold">{{ __('compare_col_action') }}</td>
                                @foreach($products as $product)
                                <td>
                                    @if(!$product->has_contact_price)
                                        <a href="javascript:void(0)" onclick="cart.add({{ $product->id }}, this)" class="rts-btn btn-primary btn-sm py-2 px-3 w-100">
                                            {{ __('product_add_to_cart') }}
                                        </a>
                                    @else
                                        <a href="tel:{{ setting('hotline') }}" class="rts-btn btn-primary btn-sm py-2 px-3 w-100">
                                            {{ __('compare_contact_btn') }}
                                        </a>
                                    @endif
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-20 bg-gray-50 rounded">
                    <i class="fa-solid fa-arrows-retweet text-6xl text-gray-300 mb-4"></i>
                    <p class="text-xl text-gray-500">{{ __('compare_empty_message') }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
const _compareI18n = {
    confirmTitle: '{{ __('compare_confirm_title') }}',
    confirmText: '{{ __('compare_confirm_text') }}',
    deleteBtn: '{{ __('swal_delete') }}',
    cancelBtn: '{{ __('swal_cancel') }}',
    processing: '{{ __('swal_processing') }}',
    successTitle: '{{ __('swal_success') }}',
    removedText: '{{ __('compare_removed_text') }}',
    errorTitle: '{{ __('swal_error') }}',
    errorText: '{{ __('compare_error_text') }}',
    errorRetry: '{{ __('compare_error_retry') }}',
    closeBtn: '{{ __('swal_close') }}',
};

function removeFromCompare(productId) {
    Swal.fire({
        title: _compareI18n.confirmTitle,
        text: _compareI18n.confirmText,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: _compareI18n.deleteBtn,
        cancelButtonText: _compareI18n.cancelBtn,
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: _compareI18n.processing,
                allowOutsideClick: false,
                didOpen: () => { Swal.showLoading(); }
            });

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            fetch('{{ locale_route('compare.remove') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ product_id: productId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        title: _compareI18n.successTitle,
                        text: data.message || _compareI18n.removedText,
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => window.location.reload());
                } else {
                    Swal.fire({
                        title: _compareI18n.errorTitle,
                        text: data.message || _compareI18n.errorText,
                        icon: 'error',
                        confirmButtonText: _compareI18n.closeBtn
                    });
                }
            })
            .catch(() => {
                Swal.fire({
                    title: _compareI18n.errorTitle,
                    text: _compareI18n.errorRetry,
                    icon: 'error',
                    confirmButtonText: _compareI18n.closeBtn
                });
            });
        }
    });
}
</script>
@endpush



