@extends('layouts.master_shop')
@section('title', 'Home Default | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme ')
@section('content')
<div>
    <div style="background-image: url('/build/images/shop/collection-list/bg-heading.jpg'); background-position: center; background-size: cover;" class="position-relative">
        <div class="position-absolute top-0 start-0 right-0 bottom-0 bg-dark w-100 opacity-50"></div>
        <div class=" container">
            <div class="text-white text-center py-5 position-relative">
                <h4 class="fs-20 fw-medium">
                    Collections</h4>
            </div>
        </div>
    </div>

    <section class="cat-section">
        <div class="container">
            <div class="row g-lg-4 g-2">
                <div class="col-md-4 col-6">
                    <a href="{{url( 'shop_pages.shop-left-sidebar')}}" class="d-block position-relative cat_grid_item overflow-hidden shop-collection-img">
                        <div class="h-100 w-100 cat-grid-img" style="background-image: url('{{ asset('/build/images/shop/collection-list/cat-01.jpg')}}"></div>
                        <div class="cat-grid-button text-body">
                            <div class="cat_grid_item__title">Women</div>
                        </div>
                    </a>

                </div>
                <div class="col-md-4 col-6">
                    <a href="{{url( 'shop_pages.shop-left-sidebar')}}" class="d-block position-relative cat_grid_item overflow-hidden shop-collection-img">
                        <div class="h-100 w-100 cat-grid-img" style="background-image: url('{{ asset('/build/images/shop/collection-list/cat-02.jpg')}}">
                        </div>
                        <div class="cat-grid-button text-body">
                            <div class="cat_grid_item__title">Men</div>
                        </div>
                    </a>

                </div>
                <div class="col-md-4 col-6">
                    <a href="{{url( 'shop_pages.shop-left-sidebar')}}" class="d-block position-relative cat_grid_item overflow-hidden shop-collection-img">
                        <div class="h-100 w-100 cat-grid-img" style="background-image: url('{{ asset('/build/images/shop/collection-list/cat-03.jpeg')}}">
                        </div>
                        <div class="cat-grid-button text-body">
                            <div class="cat_grid_item__title">Accessories</div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-6">
                    <a href="{{url( 'shop_pages.shop-left-sidebar')}}" class="d-block position-relative cat_grid_item overflow-hidden shop-collection-img">
                        <div class="h-100 w-100 cat-grid-img" style="background-image: url('{{ asset('/build/images/shop/collection-list/cat-04.jpeg')}}">
                        </div>
                        <div class="cat-grid-button text-body">
                            <div class="cat_grid_item__title">Footwear</div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-6">
                    <a href="{{url( 'shop_pages.shop-left-sidebar')}}" class="d-block position-relative cat_grid_item overflow-hidden shop-collection-img">
                        <div class="h-100 w-100 cat-grid-img" style="background-image: url('{{ asset('/build/images/shop/collection-list/cat-05.jpg')}}">
                        </div>
                        <div class="cat-grid-button text-body">
                            <div class="cat_grid_item__title">Tops</div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-6">
                    <a href="{{url( 'shop_pages.shop-left-sidebar')}}" class="d-block position-relative cat_grid_item overflow-hidden shop-collection-img">
                        <div class="h-100 w-100 cat-grid-img" style="background-image: url('{{ asset('/build/images/shop/collection-list/cat-06.jpeg')}}">
                        </div>
                        <div class="cat-grid-button text-body">
                            <div class="cat_grid_item__title">Sale</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    
</div>

<!-- Modal -->
<div class="modal fade modal-overl" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content overflow-hidden">
            <div class="modal-body p-0">
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                <div class="row">
                    <div class="col-lg-7">
                        <div class="images">
                            <div class="product-images-slider" data-flickity='{ "fade":true,"cellSelector": ".q-item:not(.is_varhide)","cellAlign": "center","wrapAround": true,"autoPlay": false,"prevNextButtons":true,"adaptiveHeight": true,"imagesLoaded": false, "lazyLoad": 0,"dragThreshold" : 0,"pageDots": true,"rightToLeft": false }'>
                                <div data-grname="not4" data-grpvl="ntt4" class="q-item" data-mdtype="image">
                                    <img src="{{ URL::asset('/build/images/quick_view/pr-01.jpg')}}" alt="" class="product-view-img w-100 object-fit-cover">
                                </div>
                                <div data-grname="not4" data-grpvl="ntt4" class="q-item" data-mdtype="image">
                                    <img src="{{ URL::asset('/build/images/quick_view/pr-02.jpg')}}" alt="" class="product-view-img w-100 object-fit-cover">
                                </div>
                                <div data-grname="not4" data-grpvl="ntt4" class="q-item" data-mdtype="image">
                                    <img src="{{ URL::asset('/build/images/quick_view/pr-03.jpg')}}" alt="" class="product-view-img w-100 object-fit-cover">
                                </div>
                                <div data-grname="not4" data-grpvl="ntt4" class="q-item" data-mdtype="image">
                                    <img src="{{ URL::asset('/build/images/quick_view/pr-04.jpg')}}" alt="" class="product-view-img w-100 object-fit-cover">
                                </div>
                                <div data-grname="not4" data-grpvl="ntt4" class="q-item" data-mdtype="image">
                                    <img src="{{ URL::asset('/build/images/quick_view/pr-05.jpg')}}" alt="" class="product-view-img w-100 object-fit-cover">
                                </div>
                                <div data-grname="not4" data-grpvl="ntt4" class="q-item" data-mdtype="image">
                                    <img src="{{ URL::asset('/build/images/quick_view/pr-06.jpg')}}" alt="" class="product-view-img w-100 object-fit-cover">
                                </div>
                                <div data-grname="not4" data-grpvl="ntt4" class="q-item" data-mdtype="image">
                                    <img src="{{ URL::asset('/build/images/quick_view/pr-07.jpg')}}" alt="" class="product-view-img w-100 object-fit-cover">
                                </div>
                                <div data-grname="not4" data-grpvl="ntt4" class="q-item" data-mdtype="image">
                                    <img src="{{ URL::asset('/build/images/quick_view/pr-08.jpg')}}" alt="" class="product-view-img w-100 object-fit-cover">
                                </div>
                                <div data-grname="not4" data-grpvl="ntt4" class="q-item" data-mdtype="image">
                                    <img src="{{ URL::asset('/build/images/quick_view/pr-09.jpg')}}" alt="" class="product-view-img w-100 object-fit-cover">
                                </div>
                                <div data-grname="not4" data-grpvl="ntt4" class="q-item" data-mdtype="image">
                                    <img src="{{ URL::asset('/build/images/quick_view/pr-10.jpg')}}" alt="" class="product-view-img w-100 object-fit-cover">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 h-100 overflow-y-auto">
                        <div class="py-30 ps-4 ps-lg-0 pe-4">
                            <h6 class="fs-20 mb-2"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link">La Bohème
                                    Rose Gold</a></h6>
                            <div class="d-flex align-items-center gap-3 mb-4">
                                <p class="mb-0 fs-18 text-muted flex-grow-1">
                                    <del>$60.00</del>
                                    <span class="text-danger">$40.00</span>
                                </p>
                                <a href="{{ url('product/product-detail-layout-01')}}" class="text-body flex-shrink-0">
                                    <div class="kalles-rating-result">
                                        <span class="kalles-rating-result__pipe">
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start active"></span>
                                            <span class="kalles-rating-result__start"></span>
                                        </span>
                                        <span class="kalles-rating-result__number">(12 reviews)</span>
                                    </div>
                                </a>
                            </div>
                            <p class="text-muted">Go kalles this summer with this vintage navy and white striped v-neck
                                t-shirt from the Nike. Perfect for pairing with denim and white kicks for a stylish
                                kalles vibe.</p>
                            <div x-data="{ color: 'Pink' }">
                                <h6 class="text-uppercase mb-3">Color: <span x-text="color"></span></h6>
                                <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                    <a href="#!" class="d-inline-block bg_color_pink rounded-circle active square-xs" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Pink" x-on:click.prevent="color = 'Pink'; $event.target.classList.add('active'); $event.target.nextElementSibling.classList.remove('active');"></a>
                                    <a href="#!" class="d-inline-block bg-dark rounded-circle square-xs" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Black" x-on:click.prevent="color = 'Black'; $event.target.classList.add('active'); $event.target.previousElementSibling.classList.remove('active');"></a>
                                </div>
                            </div>

                            <div x-data="{ size: 'M' }" class="mt-4 pt-2">
                                <h6 class="text-uppercase mb-3">Size: <span x-text="size"></span></h6>
                                <div class="product-color-list size mt-2 gap-2 d-flex align-items-center">
                                    <a href="#!" class="d-inline-block rounded-circle square-xs d-flex align-items-center justify-content-center" :class="{ 'active': size === 'XS' }" x-on:click.prevent="size = 'XS';">XS</a>
                                    <a href="#!" class="d-inline-block rounded-circle square-xs d-flex align-items-center justify-content-center" :class="{ 'active': size === 'S' }" x-on:click.prevent="size = 'S';">S</a>
                                    <a href="#!" class="d-inline-block rounded-circle square-xs d-flex align-items-center justify-content-center" :class="{ 'active': size === 'M' }" x-on:click.prevent="size = 'M';">M</a>
                                </div>
                            </div>

                            <div class="mt-4 d-flex align-items-center pt-2 gap-2">
                                <div x-data="{ quantity: 1 }" class="quantity fs-14 position-relative mb-0">
                                    <input x-bind:value="quantity" type="number" class="input-text text-center" readonly step="1" min="0" max="9999">
                                    <button type="button" class="minus position-absolute start-0 ps-3" x-on:click="quantity > 1 ? quantity-- : null">
                                        <i class="facl facl-minus"></i>
                                    </button>
                                    <button type="button" class="plus position-absolute end-0 pe-3" x-on:click="quantity++">
                                        <i class="facl facl-plus"></i>
                                    </button>
                                </div>
                                <button x-data="{ shake: false }" x-init="
            setInterval(() => { 
                shake = true; 
                setTimeout(() => { 
                    shake = false; 
                }, 2000); 
            }, 6000);
        " :class="{ 'animation-shake': shake }" class="btn btn-info text-uppercase rounded-pill min-w-150">
                                    Add to Cart
                                </button>
                                <a href="#" class="btn square-40 btn-wishlistadd p-0 fs-16 d-flex align-items-center rounded-pill flex-shrink-0 justify-content-center"><i class="facl facl-heart-o"></i></a>
                            </div>

                            <div class="mt-3">
                                <img src="{{ URL::asset('/build/images/trust_img2.png')}}" alt="" class="img-fluid">
                            </div>
                            <div class="mt-4">
                                <p class="text-muted mb-1"><span class="text-body">SKU:</span> 4540967714955-1</p>
                                <p class="text-muted mb-1"><span class="text-body">Categories:</span> <a href="#!" class="main_link">Accessories</a>, <a href="#!" class="main_link">All</a>, <a href="#!" class="main_link">Best seller</a>, <a href="#!" class="main_link">New
                                        Arrival</a>, <a href="#!" class="main_link">Sale</a>, <a href="#!" class="main_link">Watches</a>, <a href="#!" class="main_link">Women</a></p>
                                <p class="text-muted mb-1"><span class="text-body">Tags:</span> <a href="#!" class="main_link">Color Black</a>, <a href="#!" class="main_link">Color
                                        Pink</a>, <a href="#!" class="main_link">Price $7-$50</a>, <a href="#!" class="main_link">Vendor Kalles</a>, <a href="#!" class="main_link">Watch</a>,
                                    <a href="#!" class="main_link">Women</a>
                                </p>
                            </div>
                            <div>
                                <div class="social-share mt-4">
                                    <a href="https://www.facebook.com/">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="at-icon at-icon-facebook">
                                            <g>
                                                <path d="M22 5.16c-.406-.054-1.806-.16-3.43-.16-3.4 0-5.733 1.825-5.733 5.17v2.882H9v3.913h3.837V27h4.604V16.965h3.823l.587-3.913h-4.41v-2.5c0-1.123.347-1.903 2.198-1.903H22V5.16z" fill-rule="evenodd"></path>
                                            </g>
                                        </svg>
                                    </a>
                                    <a href="https://twitter.com/">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="at-icon at-icon-twitter">
                                            <g>
                                                <path d="M27.996 10.116c-.81.36-1.68.602-2.592.71a4.526 4.526 0 0 0 1.984-2.496 9.037 9.037 0 0 1-2.866 1.095 4.513 4.513 0 0 0-7.69 4.116 12.81 12.81 0 0 1-9.3-4.715 4.49 4.49 0 0 0-.612 2.27 4.51 4.51 0 0 0 2.008 3.755 4.495 4.495 0 0 1-2.044-.564v.057a4.515 4.515 0 0 0 3.62 4.425 4.52 4.52 0 0 1-2.04.077 4.517 4.517 0 0 0 4.217 3.134 9.055 9.055 0 0 1-5.604 1.93A9.18 9.18 0 0 1 6 23.85a12.773 12.773 0 0 0 6.918 2.027c8.3 0 12.84-6.876 12.84-12.84 0-.195-.005-.39-.014-.583a9.172 9.172 0 0 0 2.252-2.336" fill-rule="evenodd"></path>
                                            </g>
                                        </svg>
                                    </a>
                                    <a href="https://www.google.com/gmail/about">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="at-icon at-icon-email kalles-social-media__btn">
                                            <g>
                                                <g fill-rule="evenodd"></g>
                                                <path d="M27 22.757c0 1.24-.988 2.243-2.19 2.243H7.19C5.98 25 5 23.994 5 22.757V13.67c0-.556.39-.773.855-.496l8.78 5.238c.782.467 1.95.467 2.73 0l8.78-5.238c.472-.28.855-.063.855.495v9.087z">
                                                </path>
                                                <path d="M27 9.243C27 8.006 26.02 7 24.81 7H7.19C5.988 7 5 8.004 5 9.243v.465c0 .554.385 1.232.857 1.514l9.61 5.733c.267.16.8.16 1.067 0l9.61-5.733c.473-.283.856-.96.856-1.514v-.465z">
                                                </path>
                                            </g>
                                        </svg>
                                    </a>
                                    <a href="https://www.pinterest.com/">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="at-icon at-icon-pinterest_share">
                                            <g>
                                                <path d="M7 13.252c0 1.81.772 4.45 2.895 5.045.074.014.178.04.252.04.49 0 .772-1.27.772-1.63 0-.428-1.174-1.34-1.174-3.123 0-3.705 3.028-6.33 6.947-6.33 3.37 0 5.863 1.782 5.863 5.058 0 2.446-1.054 7.035-4.468 7.035-1.232 0-2.286-.83-2.286-2.018 0-1.742 1.307-3.43 1.307-5.225 0-1.092-.67-1.977-1.916-1.977-1.692 0-2.732 1.77-2.732 3.165 0 .774.104 1.63.476 2.336-.683 2.736-2.08 6.814-2.08 9.633 0 .87.135 1.728.224 2.6l.134.137.207-.07c2.494-3.178 2.405-3.8 3.533-7.96.61 1.077 2.182 1.658 3.43 1.658 5.254 0 7.614-4.77 7.614-9.067C26 7.987 21.755 5 17.094 5 12.017 5 7 8.15 7 13.252z" fill-rule="evenodd"></path>
                                            </g>
                                        </svg>
                                    </a>
                                    <a href="https://www.messenger.com">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="at-icon at-icon-messenger">
                                            <g>
                                                <path d="M16 6C9.925 6 5 10.56 5 16.185c0 3.205 1.6 6.065 4.1 7.932V28l3.745-2.056c1 .277 2.058.426 3.155.426 6.075 0 11-4.56 11-10.185C27 10.56 22.075 6 16 6zm1.093 13.716l-2.8-2.988-5.467 2.988 6.013-6.383 2.868 2.988 5.398-2.987-6.013 6.383z" fill-rule="evenodd"></path>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection