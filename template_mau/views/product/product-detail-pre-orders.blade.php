@extends('layouts.master_product')
@section('title', 'Home Default | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme ')
@section('content')
<div>

    <div class="main-project-section">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-3">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 fs-13">
                        <li class="breadcrumb-item"><a href="{{ url('index')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('shop_pages/shop-filter-sidebar')}}">New Arrival</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ribbed Stripe Top</li>
                    </ol>
                </nav>

                <ul class="d-flex list-unstyled align-items-center mb-0" dir="ltr">
                    <li>
                        <a href="{{ url('product/product-detail-layout-01')}}" class="fs-18"><i class="las la-angle-left"></i></a>
                    </li>
                    <li>
                        <a href="{{ url('product/product-detail-layout-01')}}" class="mx-2 fs-15"><i class="fwb iccl iccl-grid fw-semibold align-middle"></i></a>
                    </li>
                    <li>
                        <a href="{{ url('product/product-detail-layout-01')}}" class="fs-18"><i class="las la-angle-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- main slider -->
    <section class="py-4">
        <div class="container">
            <div class="row py-3 gx-xl-1">
                <div class="col-md-6">
                    <div class="row g-2">
                        <div class="col-xl-2 mt-xl-3 mt-2 order-2 order-xl-1">
                            <div thumbsSlider="" class="swiper productSmall">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ URL::asset('/build/images/single-product/pre-orders/thumb-01.jpg')}}" class="object-fit-cover" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ URL::asset('/build/images/single-product/pre-orders/thumb-02.jpg')}}" class="object-fit-cover" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ URL::asset('/build/images/single-product/pre-orders/thumb-03.jpg')}}" class="object-fit-cover" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ URL::asset('/build/images/single-product/pre-orders/thumb-04.jpg')}}" class="object-fit-cover" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ URL::asset('/build/images/single-product/pre-orders/thumb-05.jpg')}}" class="object-fit-cover" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 mt-3 order-1 order-xl-2">
                            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper productMain">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ URL::asset('/build/images/single-product/pre-orders/thumb-01.jpg')}}" class="img-fluid w-100" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ URL::asset('/build/images/single-product/pre-orders/thumb-02.jpg')}}" class="img-fluid w-100" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ URL::asset('/build/images/single-product/pre-orders/thumb-03.jpg')}}" class="img-fluid w-100" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ URL::asset('/build/images/single-product/pre-orders/thumb-04.jpg')}}" class="img-fluid w-100" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ URL::asset('/build/images/single-product/pre-orders/thumb-05.jpg')}}" class="img-fluid w-100" />
                                    </div>

                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 mt-5 mt-md-0">
                    <h4 class="mb-3">Ribbed Stripe Top</h4>
                    <div class="d-flex flex-wrap justify-content-between">
                        <p class="text-muted fs-18 mb-4">$15.00</p>
                        <a href="#tab_reviews_product">
                            <div class="kalles-rating-result">
                                <span class="kalles-rating-result__pipe">
                                    <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                    <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                    <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                    <span class="kalles-rating-result__start kalles-rating-result__start--big active"></span>
                                    <span class="kalles-rating-result__start kalles-rating-result__start--big de-active"></span>
                                </span>
                                <a href="#!">(12 reviews)</a>
                            </div>
                        </a>
                    </div>

                    <p class="text-muted">
                        Go kalles this summer with this vintage navy and white striped v-neck t-shirt from the Nike.
                        Perfect for pairing with denim and white kicks for a stylish kalles vibe.
                    </p>
                    <div class="d-flex flex-wrap align-items-center gap-2 mt-4">
                        <div class="input-step border border-dark rounded-pill">
                            <button type="button" class="minus material-shadow text-dark fw-bold">–</button>
                            <input type="number" class="product-quantity fw-bold fs-6" value="1" min="0" max="100">
                            <button type="button" class="plus material-shadow text-dark fw-bold">+</button>
                        </div>
                        <button x-data="{ shake: false }" x-init="
                                    setInterval(() => { 
                                        shake = true; 
                                        setTimeout(() => { 
                                            shake = false; 
                                        }, 2000); 
                                    }, 6000);
                                " :class="{ 'animation-shake': shake }" data-bs-toggle="offcanvas" data-bs-target="#shoppingCartOffcanvas" aria-controls="shoppingCartOffcanvas" class="btn btn-teal text-uppercase rounded-pill min-w-150">
                            PRE-ORDER
                        </button>
                        <div class="product_wishlist square-40 rounded-circle border border-dark bg-transparent text-center" style="line-height: 40px;">
                            <a href="#"><i class="facl facl-heart-o"></i></a>
                        </div>
                    </div>

                    <div class="mt-4">
                        <img src="{{ URL::asset('/build/images/single-product/trust_img2.png')}}" alt="" class="img-fluid">
                    </div>

                    <div class="mt-4 d-flex gap-3 text-nowrap flex-wrap row-gap-1">
                        <a href="#sizeGuidModal" data-bs-toggle="modal" class="text-black fw-semibold">Size Guide</a>
                        <a href="#deliveyReturnModal" data-bs-toggle="modal" class="text-black fw-semibold mx-2">Delivery and Return</a>
                        <a href="#askQuesitionModal" data-bs-toggle="modal" class="text-black fw-semibold">Ask a
                            Question</a>
                    </div>
                    <div class="mt-4">
                        <p class="mb-2"><span>SKU :</span><span class="text-muted"> P15-2</span></p>
                        <p class="mb-2">
                            <span>Categories:</span>
                            <span class="text-muted">
                                <a href="#!" class="text-muted">All,</a>
                                <a href="#!" class="text-muted">Best seller,</a>
                                <a href="#!" class="text-muted">Bottom,</a>
                                <a href="#!" class="text-muted">Dress,</a>
                                <a href="#!" class="text-muted">New Arrival,</a>
                                <a href="#!" class="text-muted">Women</a>
                            </span>
                        </p>
                        <p class="mb-2">
                            <span>Tags :</span>
                            <span class="text-muted">
                                <a href="#!" class="text-muted">Color Black,</a>
                                <a href="#!" class="text-muted">Color Grey,</a>
                                <a href="#!" class="text-muted">Color Pink,</a>
                                <a href="#!" class="text-muted">Price $7-$50,</a>
                                <a href="#!" class="text-muted">Size L,</a>
                                <a href="#!" class="text-muted">Size M,</a>
                                <a href="#!" class="text-muted">Size S,</a>
                            </span>
                        </p>
                    </div>
                    <div class="social-share mt-5">
                        <div class="d-flex align-items-center gap-2">
                            <a href="https://www.facebook.com/">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                    <g>
                                        <path d="M22 5.16c-.406-.054-1.806-.16-3.43-.16-3.4 0-5.733 1.825-5.733 5.17v2.882H9v3.913h3.837V27h4.604V16.965h3.823l.587-3.913h-4.41v-2.5c0-1.123.347-1.903 2.198-1.903H22V5.16z" fill-rule="evenodd"></path>
                                    </g>
                                </svg>
                            </a>
                            <a href="https://twitter.com/">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                    <g>
                                        <path d="M27.996 10.116c-.81.36-1.68.602-2.592.71a4.526 4.526 0 0 0 1.984-2.496 9.037 9.037 0 0 1-2.866 1.095 4.513 4.513 0 0 0-7.69 4.116 12.81 12.81 0 0 1-9.3-4.715 4.49 4.49 0 0 0-.612 2.27 4.51 4.51 0 0 0 2.008 3.755 4.495 4.495 0 0 1-2.044-.564v.057a4.515 4.515 0 0 0 3.62 4.425 4.52 4.52 0 0 1-2.04.077 4.517 4.517 0 0 0 4.217 3.134 9.055 9.055 0 0 1-5.604 1.93A9.18 9.18 0 0 1 6 23.85a12.773 12.773 0 0 0 6.918 2.027c8.3 0 12.84-6.876 12.84-12.84 0-.195-.005-.39-.014-.583a9.172 9.172 0 0 0 2.252-2.336" fill-rule="evenodd"></path>
                                    </g>
                                </svg>
                            </a>
                            <a href="https://www.google.com/gmail/about">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
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
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                    <g>
                                        <path d="M7 13.252c0 1.81.772 4.45 2.895 5.045.074.014.178.04.252.04.49 0 .772-1.27.772-1.63 0-.428-1.174-1.34-1.174-3.123 0-3.705 3.028-6.33 6.947-6.33 3.37 0 5.863 1.782 5.863 5.058 0 2.446-1.054 7.035-4.468 7.035-1.232 0-2.286-.83-2.286-2.018 0-1.742 1.307-3.43 1.307-5.225 0-1.092-.67-1.977-1.916-1.977-1.692 0-2.732 1.77-2.732 3.165 0 .774.104 1.63.476 2.336-.683 2.736-2.08 6.814-2.08 9.633 0 .87.135 1.728.224 2.6l.134.137.207-.07c2.494-3.178 2.405-3.8 3.533-7.96.61 1.077 2.182 1.658 3.43 1.658 5.254 0 7.614-4.77 7.614-9.067C26 7.987 21.755 5 17.094 5 12.017 5 7 8.15 7 13.252z" fill-rule="evenodd"></path>
                                    </g>
                                </svg>
                            </a>
                            <a href="https://www.messenger.com">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
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
    </section>
    <!-- end main slider -->
    <!-- tab -->
    <div class="mt-4 mb-5 py-5 d-none d-lg-block main-project-section">
        <div class="container">
            <ul class="nav tab_header justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-pill pill-border fw-medium active" id="best-seller-tab" data-bs-toggle="pill" data-bs-target="#best-seller" type="button" role="tab" aria-controls="best-seller" aria-selected="true">Description</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-pill pill-border fw-medium" id="featured-tab" data-bs-toggle="pill" data-bs-target="#featured" type="button" role="tab" aria-controls="featured" aria-selected="false">Additional Information</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-pill pill-border fw-medium" id="sale-tab" data-bs-toggle="pill" data-bs-target="#sale" type="button" role="tab" aria-controls="sale" aria-selected="false">Warranty & Shipping</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-pill pill-border fw-medium" id="top-sale-tab" data-bs-toggle="pill" data-bs-target="#top-sale" type="button" role="tab" aria-controls="top-sale" aria-selected="false">Wash & Care</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-pill pill-border fw-medium" id="top-review-tab" data-bs-toggle="pill" data-bs-target="#top-review" type="button" role="tab" aria-controls="top-review" aria-selected="false">Reviews</button>
                </li>
            </ul>

            <div class="tab-content mt-5" id="pills-tabContent">
                <div class="tab-pane fade show active" id="best-seller" role="tabpanel" aria-labelledby="best-seller-tab" tabindex="0">
                    <p class="text-black">
                        Design inspiration lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo,
                        ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam
                        sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat.
                        Sed quis velit. Nulla facilisi. Nulla libero. Vivamus pharetra posuere sapien. Nam consectetuer.
                        Sed aliquam, nunc eget euismod ullamcorper, lectus nunc ullamcorper orci.</p>
                    <div class="row my-5 g-3">
                        <div class="col-md-4">
                            <img src="{{ URL::asset('/build/images/single-product/pre-orders/thumb-02.jpg')}}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-4">
                            <img src="{{ URL::asset('/build/images/single-product/pre-orders/thumb-03.jpg')}}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-4">
                            <img src="{{ URL::asset('/build/images/single-product/pre-orders/thumb-01.jpg')}}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="row align-items-center pt-5">
                        <div class="col-md-3">
                            <div class="text-center text-md-end d-md-flex flex-md-row-reverse align-items-center justify-md-content-end mb-5">
                                <div>
                                    <img src="{{ URL::asset('/build/images/single-product/water-resistant.png')}}" class="img-fluid" style="width: 44px;" alt="">
                                </div>
                                <p class="me-2 mb-0 text-muted text-md-end">Rain & Water<br>Resistant</p>
                            </div>
                            <div class="text-center text-md-end d-md-flex flex-md-row-reverse align-items-center justify-md-content-end mb-5">
                                <div>
                                    <img src="{{ URL::asset('/build/images/single-product/uv-resistant.png')}}" class="img-fluid" style="width: 44px;" alt="">
                                </div>
                                <p class="me-2 mb-0 text-muted text-md-end">UV Resistant<br>Coatings</p>
                            </div>
                            <div class="text-center text-md-end d-md-flex flex-md-row-reverse align-items-center justify-md-content-end mb-5">
                                <div>
                                    <img src="{{ URL::asset('/build/images/single-product/corrosion-resistance.png')}}" class="img-fluid" style="width: 44px;" alt="">
                                </div>
                                <p class="me-2 mb-0 text-muted text-md-end">Corrosion Resistance<br>to Sea water</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ URL::asset('/build/images/single-product/athun.png')}}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-3">
                            <div class="text-center text-md-end d-md-flex align-items-center justify-md-content-start mb-5">
                                <div>
                                    <img src="{{ URL::asset('/build/images/single-product/lead-free.png')}}" class="img-fluid" style="width: 44px;" alt="">
                                </div>
                                <p class="ms-2 mb-0 text-muted text-md-start">
                                    Lead-free<br>Powdercoat Finish
                                </p>
                            </div>
                            <div class="text-center text-md-end d-md-flex align-items-center justify-md-content-start mb-5">
                                <div>
                                    <img src="{{ URL::asset('/build/images/single-product/resistant-to-spills.png')}}" class="img-fluid" style="width: 44px;" alt="">
                                </div>
                                <p class="ms-2 mb-0 text-muted text-md-start">
                                    Resistant to<br>Spills
                                </p>
                            </div>
                            <div class="text-center text-md-end d-md-flex align-items-center justify-md-content-start mb-md-5">
                                <div>
                                    <img src="{{ URL::asset('/build/images/single-product/recyclable.png')}}" class="img-fluid" style="width: 44px;" alt="">
                                </div>
                                <p class="ms-2 mb-0 text-muted text-md-start">
                                    Recyclable<br>Aluminium Frame
                                </p>
                            </div>
                        </div>
                    </div>
                </div><!--end tab pane-->
                <div class="tab-pane fade " id="featured" role="tabpanel" aria-labelledby="featured-tab" tabindex="0">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th class="bg-transparent" scope="row"> Color</th>
                                <td class="bg-transparent">Grey, Pink, Black</td>
                            </tr>
                            <tr>
                                <th class="bg-transparent" scope="row">Size</th>
                                <td class="bg-transparent"> S, M, L</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="sale" role="tabpanel" aria-labelledby="sale-tab" tabindex="0">
                    <h6 class="fw-bold">Warranty</h6>
                    <p class="mb-0">
                        If issues experienced with the frame include a manufacturer's defect, or an issue resulting from
                        an inherent flaw in the product, RAEN provides a 365 day warranty from the time of purchase. If
                        you feel your product meets these requirements, please email <a href="#!">warranty@domain.com</a> explaining the
                        nature of your warranty claim and all necessary details.
                    </p>
                    <p class="mb-4">
                        Scratched lenses and physical damage are not covered by warranty. Unfortunately we do not
                        manufacture or sell replacement lenses.
                    </p>
                    <h6 class="fw-bold">Free FedEx 2-Day Shipping</h6>
                    <p class="mb-4">
                        Free FedEx 2-Day Shipping is available exclusively to the U.S. on orders over $150. FedEx 2-Day
                        packages are delivered Monday through Friday.
                    </p>
                    <h6 class="fw-bold">Free FedEx Ground Shipping</h6>
                    <p class="mb-4">
                        Free FedEx Ground Shipping is available exclusively to U.S. orders over $100.
                    </p>
                    <h6 class="fw-bold">Free Returns</h6>
                    <p class="mb-4">
                        Free returns are available on all U.S. order within 14 days of shipment.
                    </p>
                    <p class="fst-italic fw-medium">*Free Shipping is not available with some promotions and other
                        restrictions
                        may apply.
                    </p>
                </div>
                <div class=" tab-pane fade" id="top-sale" role="tabpanel" aria-labelledby="top-sale-tab" tabindex="0">
                    <ul class="list-unstyled d-flex flex-wrap justify-content-center mb-0 ">
                        <li class="m-2">
                            <svg width="35" viewBox="0 0 40 40">
                                <path fill="currentColor" d="M8.7 30.7h22.7c.3 0 .6-.2.7-.6l4-25.3c-.1-.4-.3-.7-.7-.8s-.7.2-.8.6L34 8.9l-3-1.1c-2.4-.9-5.1-.5-7.2 1-2.3 1.6-5.3 1.6-7.6 0-2.1-1.5-4.8-1.9-7.2-1L6 8.9l-.7-4.3c0-.4-.4-.7-.7-.6-.4.1-.6.4-.6.8l4 25.3c.1.3.3.6.7.6zm.8-21.6c2-.7 4.2-.4 6 .8 1.4 1 3 1.5 4.6 1.5s3.2-.5 4.6-1.5c1.7-1.2 4-1.6 6-.8l3.3 1.2-3 19.1H9.2l-3-19.1 3.3-1.2zM32 32H8c-.4 0-.7.3-.7.7s.3.7.7.7h24c.4 0 .7-.3.7-.7s-.3-.7-.7-.7zm0 2.7H8c-.4 0-.7.3-.7.7s.3.6.7.6h24c.4 0 .7-.3.7-.7s-.3-.6-.7-.6zm-17.9-8.9c-1 0-1.8-.3-2.4-.6l.1-2.1c.6.4 1.4.6 2 .6.8 0 1.2-.4 1.2-1.3s-.4-1.3-1.3-1.3h-1.3l.2-1.9h1.1c.6 0 1-.3 1-1.3 0-.8-.4-1.2-1.1-1.2s-1.2.2-1.9.4l-.2-1.9c.7-.4 1.5-.6 2.3-.6 2 0 3 1.3 3 2.9 0 1.2-.4 1.9-1.1 2.3 1 .4 1.3 1.4 1.3 2.5.3 1.8-.6 3.5-2.9 3.5zm4-5.5c0-3.9 1.2-5.5 3.2-5.5s3.2 1.6 3.2 5.5-1.2 5.5-3.2 5.5-3.2-1.6-3.2-5.5zm4.1 0c0-2-.1-3.5-.9-3.5s-1 1.5-1 3.5.1 3.5 1 3.5c.8 0 .9-1.5.9-3.5zm4.5-1.4c-.9 0-1.5-.8-1.5-2.1s.6-2.1 1.5-2.1 1.5.8 1.5 2.1-.5 2.1-1.5 2.1zm0-.8c.4 0 .7-.5.7-1.2s-.2-1.2-.7-1.2-.7.5-.7 1.2.3 1.2.7 1.2z">
                                </path>
                            </svg>
                        </li>
                        <li class="m-2">
                            <svg width="35" viewBox="0 0 40 40">
                                <path fill="currentColor" d="M36.7 31.1l-2.8-1.3-4.7-9.1 7.5-3.5c.4-.2.6-.6.4-1s-.6-.5-1-.4l-7.5 3.5-7.8-15c-.3-.5-1.1-.5-1.4 0l-7.8 15L4 15.9c-.4-.2-.8 0-1 .4s0 .8.4 1l7.5 3.5-4.7 9.1-2.8 1.3c-.4.2-.6.6-.4 1 .1.3.4.4.7.4.1 0 .2 0 .3-.1l1-.4-1.5 2.8c-.1.2-.1.5 0 .8.1.2.4.3.7.3h31.7c.3 0 .5-.1.7-.4.1-.2.1-.5 0-.8L35.1 32l1 .4c.1 0 .2.1.3.1.3 0 .6-.2.7-.4.1-.3 0-.8-.4-1zm-5.1-2.3l-9.8-4.6 6-2.8 3.8 7.4zM20 6.4L27.1 20 20 23.3 12.9 20 20 6.4zm-7.8 15l6 2.8-9.8 4.6 3.8-7.4zm22.4 13.1H5.4L7.2 31 20 25l12.8 6 1.8 3.5z">
                                </path>
                            </svg>
                        </li>
                        <li class="m-2">
                            <svg width="35" viewBox="0 0 40 40">
                                <path fill="currentColor" d="M5.9 5.9v28.2h28.2V5.9H5.9zM19.1 20l-8.3 8.3c-2-2.2-3.2-5.1-3.2-8.3s1.2-6.1 3.2-8.3l8.3 8.3zm-7.4-9.3c2.2-2 5.1-3.2 8.3-3.2s6.1 1.2 8.3 3.2L20 19.1l-8.3-8.4zM20 20.9l8.3 8.3c-2.2 2-5.1 3.2-8.3 3.2s-6.1-1.2-8.3-3.2l8.3-8.3zm.9-.9l8.3-8.3c2 2.2 3.2 5.1 3.2 8.3s-1.2 6.1-3.2 8.3L20.9 20zm8.4-10.2c-1.2-1.1-2.6-2-4.1-2.6h6.6l-2.5 2.6zm-18.6 0L8.2 7.2h6.6c-1.5.6-2.9 1.5-4.1 2.6zm-.9.9c-1.1 1.2-2 2.6-2.6 4.1V8.2l2.6 2.5zM7.2 25.2c.6 1.5 1.5 2.9 2.6 4.1l-2.6 2.6v-6.7zm3.5 5c1.2 1.1 2.6 2 4.1 2.6H8.2l2.5-2.6zm18.6 0l2.6 2.6h-6.6c1.4-.6 2.8-1.5 4-2.6zm.9-.9c1.1-1.2 2-2.6 2.6-4.1v6.6l-2.6-2.5zm2.6-14.5c-.6-1.5-1.5-2.9-2.6-4.1l2.6-2.6v6.7z">
                                </path>
                            </svg>
                        </li>
                        <li class="m-2">
                            <svg width="35" viewBox="0 0 40 40">
                                <path fill="currentColor" d="M35.1 33.6L33.2 6.2c0-.4-.3-.7-.7-.7H13.9c-.4 0-.7.3-.7.7s.3.7.7.7h18l.7 10.5H20.8c-8.8.2-15.9 7.5-15.9 16.4 0 .4.3.7.7.7h28.9c.2 0 .4-.1.5-.2s.2-.3.2-.5v-.2h-.1zm-28.8-.5C6.7 25.3 13 19 20.8 18.9h11.9l1 14.2H6.3zm11.2-6.8c0 1.2-1 2.1-2.1 2.1s-2.1-1-2.1-2.1 1-2.1 2.1-2.1 2.1 1 2.1 2.1zm6.3 0c0 1.2-1 2.1-2.1 2.1-1.2 0-2.1-1-2.1-2.1s1-2.1 2.1-2.1 2.1 1 2.1 2.1z">
                                </path>
                            </svg>
                        </li>
                        <li class="m-2">
                            <svg width="35" viewBox="0 0 40 40">
                                <path fill="currentColor" d="M20 33.8c7.6 0 13.8-6.2 13.8-13.8S27.6 6.2 20 6.2 6.2 12.4 6.2 20 12.4 33.8 20 33.8zm0-26.3c6.9 0 12.5 5.6 12.5 12.5S26.9 32.5 20 32.5 7.5 26.9 7.5 20 13.1 7.5 20 7.5zm-.4 15h.5c1.8 0 3-1.1 3-3.7 0-2.2-1.1-3.6-3.1-3.6h-2.6v10.6h2.2v-3.3zm0-5.2h.4c.6 0 .9.5.9 1.7 0 1.1-.3 1.7-.9 1.7h-.4v-3.4z">
                                </path>
                            </svg>
                        </li>
                        <li class="m-2">
                            <svg width="35" viewBox="0 0 40 40">
                                <path fill="currentColor" d="M30.2 29.3c2.2-2.5 3.6-5.7 3.6-9.3s-1.4-6.8-3.6-9.3l3.6-3.6c.3-.3.3-.7 0-.9-.3-.3-.7-.3-.9 0l-3.6 3.6c-2.5-2.2-5.7-3.6-9.3-3.6s-6.8 1.4-9.3 3.6L7.1 6.2c-.3-.3-.7-.3-.9 0-.3.3-.3.7 0 .9l3.6 3.6c-2.2 2.5-3.6 5.7-3.6 9.3s1.4 6.8 3.6 9.3l-3.6 3.6c-.3.3-.3.7 0 .9.1.1.3.2.5.2s.3-.1.5-.2l3.6-3.6c2.5 2.2 5.7 3.6 9.3 3.6s6.8-1.4 9.3-3.6l3.6 3.6c.1.1.3.2.5.2s.3-.1.5-.2c.3-.3.3-.7 0-.9l-3.8-3.6z">
                                </path>
                            </svg>
                        </li>
                        <li class="m-2">
                            <svg width="35" viewBox="0 0 40 40">
                                <path fill="currentColor" d="M34.1 34.1H5.9V5.9h28.2v28.2zM7.2 32.8h25.6V7.2H7.2v25.6zm13.5-18.3a.68.68 0 0 0-.7-.7.68.68 0 0 0-.7.7v10.9a.68.68 0 0 0 .7.7.68.68 0 0 0 .7-.7V14.5z">
                                </path>
                            </svg>
                        </li>
                    </ul>
                    <p class="mb-0 text-center">LT01: 70% wool, 15% polyester, 10% polyamide, 5% acrylic 900 Grms/mt</p>
                </div>
                <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="top-review-tab" tabindex="0">
                    <div class="row mb-3">
                        <div class="col-md-2 text-center">
                            <p class="mb-0">Average</p>
                            <h2 class="fw-bold my-1">4.8</h2>
                            <div class="kalles-rating-result">
                                <span class="kalles-rating-result__pipe ,b-1">
                                    <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                    <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                    <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                    <span class="kalles-rating-result__start kalles-rating-result__start--big active"></span>
                                    <span class="text-muted kalles-rating-result__start kalles-rating-result__start--big"></span>
                                </span>
                            </div>
                            <p class="text-muted">13 Review</p>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex align-items-center my-2">
                                <p class="mb-0 me-2 text-nowrap">Excellent</p>
                                <input type="range" min="1" max="12" value="12" class="slider slider1" id="myRange">
                            </div>
                            <div class="d-flex align-items-center my-2">
                                <p class="mb-0 me-2 text-nowrap text-muted">Very Good </p>
                                <input type="range" min="1" max="12" value="0" class="slider slider1" id="myRange">
                            </div>
                            <div class="d-flex align-items-center my-2">
                                <p class="mb-0 me-2 text-nowrap">Average</p>
                                <input type="range" min="1" max="12" value="1" class="slider slider1" id="myRange">
                            </div>
                            <div class="d-flex align-items-center my-2">
                                <p class="mb-0 pe-2 me-4 text-nowrap text-muted">Poor</p>
                                <input type="range" min="1" max="12" value="0" class="slider slider1" id="myRange">
                            </div>
                            <div class="d-flex align-items-center my-2">
                                <p class="mb-0 me-2 text-nowrap text-muted">Terrible</p>
                                <input type="range" min="1" max="12" value="0" class="slider slider1" id="myRange">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#rateUsModel" class="btn btn-warning py-1 px-2">
                                <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="18.37" height="17.8" viewBox="0 0 21.682 21.602">
                                    <g id="Symbol_32_2" data-name="Symbol 32 – 2" transform="translate(-961.98 -374.155)">
                                        <path d="M0,0H4V11.2L1.937,14h0L0,11.2Z" transform="translate(979.891 381.756) rotate(40)" fill="none" stroke="#ffffff" stroke-linejoin="round" stroke-width="1"></path>
                                        <path d="M0,0H4" transform="translate(972.692 390.335) rotate(40)" fill="none" stroke="#ffffff" stroke-width="1"></path>
                                        <g transform="translate(981.126 380.964) rotate(40)" fill="none" stroke="#ffffff" stroke-width="1">
                                            <rect width="3.128" height="1.4" stroke="none"></rect>
                                            <rect x="0.5" y="0.5" width="2.128" height="0.4" fill="none"></rect>
                                        </g>
                                        <path d="M2858.324,3384.6h7.412" transform="translate(-1891.1 -3003.987)" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"></path>
                                        <path d="M2858.324,3384.6h7.412" transform="translate(-1891.1 -2999.611)" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-width="1"></path>
                                        <path d="M8.952,0H15a2,2,0,0,1,2,2V15a2,2,0,0,1-2,2H2a2,2,0,0,1-2-2V12.162" transform="translate(979.48 391.655) rotate(180)" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"></path>
                                    </g>
                                </svg> Write a review</button>
                        </div>
                    </div>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <p class="text-muted mb-0">Showing 1 - 6 of 13 reviews</p>
                        <div class="d-flex mt-3 mt-sm-0">
                            <div class="dropdown review-dropdown">
                                <a class="dropdown-toggle text-muted me-2" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Filter </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#!">ALL</a></li>
                                    <li><a class="dropdown-item" href="#!">Excellent</a></li>
                                    <li><a class="dropdown-item" href="#!">Very Good</a></li>
                                </ul>
                            </div>
                            <div class="dropdown review-dropdown">
                                <a class="dropdown-toggle text-muted" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Short by: Latest </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#!">Latest</a></li>
                                    <li><a class="dropdown-item" href="#!">Oldest</a></li>
                                    <li><a class="dropdown-item" href="#!">Images</a></li>
                                    <li><a class="dropdown-item" href="#!">Most like</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 review-container">
                        <div class="col-sm-6 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="rounded-pill d-inline-block align-items-center p-1 bg-light">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0 rounded-pill  bg-warning text-white d-inline-block text-center d-flex justify-content-center align-items-center" style="width: 25px; height: 25px;">P</p>
                                            <span class="fw-bold mx-2">Peter</span>
                                        </div>
                                    </div>
                                    <div class="kalles-rating-result my-2">
                                        <span class="kalles-rating-result__pipe ,b-1">
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big active"></span>
                                            <span class="text-muted kalles-rating-result__start kalles-rating-result__start--big"></span>
                                        </span>
                                    </div>
                                    <h6>Contrary to popular belief</h6>
                                    <p class="text-muted mb-2">It is a long established fact that a reader will be
                                        distracted
                                        by the readable content of a page</p>
                                    <p class="text-muted mb-2 opacity-75 fs-14">15 days ago
                                    </p>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center gap-1">
                                            <svg role="button" fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.762 17.939" class="text-muted">
                                                <g transform="translate(-926.048 -414.43)">
                                                    <path d="M0,14.842V6.033l.266.709S3.779,4.692,3.9,1.674s2.5-1.661,2.624.45-.095,2.192.517,3.909c1.392-.021,2.211-.013,2.59-.006H9.71q.06,0,.119,0l.056,0v0A1.532,1.532,0,0,1,10.923,8.5a1.533,1.533,0,0,1,.45,2.515,1.533,1.533,0,0,1-.387,2.485,1.859,1.859,0,0,1,.257.966c0,.847-.515,1.584-1.15,1.584L9.237,16c-.7.042-2.286.125-2.717.131H6.448A31.646,31.646,0,0,1,0,14.842Z" transform="translate(929.463 415.021)" class="cls-1"></path>
                                                    <path d="M945.558,421.769v11.039l-2.9-.279V422.22Z" transform="translate(-16.112 -0.939)" class="cls-2"></path>
                                                </g>
                                            </svg>
                                            <span class="text-muted">12</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-1">
                                            <svg role="button" fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.762 17.659" class="r--icon-dislike">
                                                <g transform="translate(956.922 435.325) rotate(180)">
                                                    <path d="M0,14.842V6.033l.266.709S3.779,4.692,3.9,1.674s2.5-1.661,2.624.45-.095,2.192.517,3.909c1.392-.021,2.211-.013,2.59-.006H9.71q.06,0,.119,0l.056,0v0A1.532,1.532,0,0,1,10.923,8.5a1.533,1.533,0,0,1,.45,2.515,1.533,1.533,0,0,1-.387,2.485,1.859,1.859,0,0,1,.257.966c0,.847-.515,1.584-1.15,1.584L9.237,16c-.7.042-2.286.125-2.717.131H6.448A31.646,31.646,0,0,1,0,14.842Z" transform="translate(944.575 418.257)" class="cls-1"></path>
                                                    <path d="M945.558,421.946v10.321l-2.9.261V421.777Z" transform="translate(-1 2.296)" class="cls-2"></path>
                                                </g>
                                            </svg>
                                            <span class="text-muted">08</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#commentModel" >
                                            <svg role="button" fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.125 17.584" class="r--icon-reply">
                                                <defs>
                                                    <clipPath>
                                                        <rect width="14.094" height="3.924" class="cls-1"></rect>
                                                    </clipPath>
                                                </defs>
                                                <g transform="translate(-784.909 -833.715)">
                                                    <path d="M4.01,12.938H2a2,2,0,0,1-2-2V2A2,2,0,0,1,2,0H18.125a2,2,0,0,1,2,2v8.937a2,2,0,0,1-2,2H8.78l-.667.923L6.4,16.232Z" transform="translate(785.409 834.215)" class="cls-2"></path>
                                                    <g transform="translate(788.554 839.127)" class="cls-3">
                                                        <g transform="translate(-739 -839)">
                                                            <g transform="translate(739 839)" class="cls-4">
                                                                <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                </circle>
                                                                <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                </circle>
                                                            </g>
                                                        </g>
                                                        <g transform="translate(-734 -839)">
                                                            <g transform="translate(739 839)" class="cls-4">
                                                                <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                </circle>
                                                                <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                </circle>
                                                            </g>
                                                        </g>
                                                        <g transform="translate(-729 -839)">
                                                            <g transform="translate(739 839)" class="cls-4">
                                                                <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                </circle>
                                                                <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                </circle>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="text-muted">02</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="rounded-pill d-inline-block align-items-center p-1 bg-light">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0 rounded-pill  bg-danger text-white d-inline-block text-center d-flex justify-content-center align-items-center" style="width: 25px; height: 25px;">K</p>
                                            <span class="fw-bold mx-2">Kodeman</span>
                                        </div>
                                    </div>
                                    <div class="kalles-rating-result my-2">
                                        <span class="kalles-rating-result__pipe ,b-1">
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big active"></span>
                                            <span class="text-muted kalles-rating-result__start kalles-rating-result__start--big"></span>
                                        </span>
                                    </div>
                                    <h6>Contrary to popular belief</h6>
                                    <p class="text-muted mb-2">It is a long established fact that a reader will be
                                        distracted
                                        by the readable content of a page</p>
                                    <p class="text-muted mb-2 opacity-75 fs-14">15 days ago
                                    </p>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center gap-1">
                                            <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.762 17.939" class="text-muted">
                                                <g transform="translate(-926.048 -414.43)">
                                                    <path d="M0,14.842V6.033l.266.709S3.779,4.692,3.9,1.674s2.5-1.661,2.624.45-.095,2.192.517,3.909c1.392-.021,2.211-.013,2.59-.006H9.71q.06,0,.119,0l.056,0v0A1.532,1.532,0,0,1,10.923,8.5a1.533,1.533,0,0,1,.45,2.515,1.533,1.533,0,0,1-.387,2.485,1.859,1.859,0,0,1,.257.966c0,.847-.515,1.584-1.15,1.584L9.237,16c-.7.042-2.286.125-2.717.131H6.448A31.646,31.646,0,0,1,0,14.842Z" transform="translate(929.463 415.021)" class="cls-1"></path>
                                                    <path d="M945.558,421.769v11.039l-2.9-.279V422.22Z" transform="translate(-16.112 -0.939)" class="cls-2"></path>
                                                </g>
                                            </svg>
                                            <span class="text-muted">12</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-1">
                                            <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.762 17.659" class="r--icon-dislike">
                                                <g transform="translate(956.922 435.325) rotate(180)">
                                                    <path d="M0,14.842V6.033l.266.709S3.779,4.692,3.9,1.674s2.5-1.661,2.624.45-.095,2.192.517,3.909c1.392-.021,2.211-.013,2.59-.006H9.71q.06,0,.119,0l.056,0v0A1.532,1.532,0,0,1,10.923,8.5a1.533,1.533,0,0,1,.45,2.515,1.533,1.533,0,0,1-.387,2.485,1.859,1.859,0,0,1,.257.966c0,.847-.515,1.584-1.15,1.584L9.237,16c-.7.042-2.286.125-2.717.131H6.448A31.646,31.646,0,0,1,0,14.842Z" transform="translate(944.575 418.257)" class="cls-1"></path>
                                                    <path d="M945.558,421.946v10.321l-2.9.261V421.777Z" transform="translate(-1 2.296)" class="cls-2"></path>
                                                </g>
                                            </svg>
                                            <span class="text-muted">08</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-1">
                                            <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.125 17.584" class="r--icon-reply">
                                                <defs>
                                                    <clipPath>
                                                        <rect width="14.094" height="3.924" class="cls-1"></rect>
                                                    </clipPath>
                                                </defs>
                                                <g transform="translate(-784.909 -833.715)">
                                                    <path d="M4.01,12.938H2a2,2,0,0,1-2-2V2A2,2,0,0,1,2,0H18.125a2,2,0,0,1,2,2v8.937a2,2,0,0,1-2,2H8.78l-.667.923L6.4,16.232Z" transform="translate(785.409 834.215)" class="cls-2"></path>
                                                    <g transform="translate(788.554 839.127)" class="cls-3">
                                                        <g transform="translate(-739 -839)">
                                                            <g transform="translate(739 839)" class="cls-4">
                                                                <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                </circle>
                                                                <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                </circle>
                                                            </g>
                                                        </g>
                                                        <g transform="translate(-734 -839)">
                                                            <g transform="translate(739 839)" class="cls-4">
                                                                <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                </circle>
                                                                <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                </circle>
                                                            </g>
                                                        </g>
                                                        <g transform="translate(-729 -839)">
                                                            <g transform="translate(739 839)" class="cls-4">
                                                                <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                </circle>
                                                                <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                </circle>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="text-muted">02</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="rounded-pill d-inline-block align-items-center p-1 bg-light">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0 rounded-pill  bg-primary text-white d-inline-block text-center d-flex justify-content-center align-items-center" style="width: 25px; height: 25px;">G</p>
                                            <span class="fw-bold mx-2">Glager</span>
                                        </div>
                                    </div>
                                    <div class="kalles-rating-result my-2">
                                        <span class="kalles-rating-result__pipe ,b-1">
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big active"></span>
                                            <span class="text-muted kalles-rating-result__start kalles-rating-result__start--big"></span>
                                        </span>
                                    </div>
                                    <h6>Contrary to popular belief</h6>
                                    <p class="text-muted mb-2">It is a long established fact that a reader will be
                                        distracted
                                        by the readable content of a page</p>
                                    <p class="text-muted mb-2 opacity-75 fs-14">15 days ago
                                    </p>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center gap-1">
                                            <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.762 17.939" class="text-muted">
                                                <g transform="translate(-926.048 -414.43)">
                                                    <path d="M0,14.842V6.033l.266.709S3.779,4.692,3.9,1.674s2.5-1.661,2.624.45-.095,2.192.517,3.909c1.392-.021,2.211-.013,2.59-.006H9.71q.06,0,.119,0l.056,0v0A1.532,1.532,0,0,1,10.923,8.5a1.533,1.533,0,0,1,.45,2.515,1.533,1.533,0,0,1-.387,2.485,1.859,1.859,0,0,1,.257.966c0,.847-.515,1.584-1.15,1.584L9.237,16c-.7.042-2.286.125-2.717.131H6.448A31.646,31.646,0,0,1,0,14.842Z" transform="translate(929.463 415.021)" class="cls-1"></path>
                                                    <path d="M945.558,421.769v11.039l-2.9-.279V422.22Z" transform="translate(-16.112 -0.939)" class="cls-2"></path>
                                                </g>
                                            </svg>
                                            <span class="text-muted">12</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-1">
                                            <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.762 17.659" class="r--icon-dislike">
                                                <g transform="translate(956.922 435.325) rotate(180)">
                                                    <path d="M0,14.842V6.033l.266.709S3.779,4.692,3.9,1.674s2.5-1.661,2.624.45-.095,2.192.517,3.909c1.392-.021,2.211-.013,2.59-.006H9.71q.06,0,.119,0l.056,0v0A1.532,1.532,0,0,1,10.923,8.5a1.533,1.533,0,0,1,.45,2.515,1.533,1.533,0,0,1-.387,2.485,1.859,1.859,0,0,1,.257.966c0,.847-.515,1.584-1.15,1.584L9.237,16c-.7.042-2.286.125-2.717.131H6.448A31.646,31.646,0,0,1,0,14.842Z" transform="translate(944.575 418.257)" class="cls-1"></path>
                                                    <path d="M945.558,421.946v10.321l-2.9.261V421.777Z" transform="translate(-1 2.296)" class="cls-2"></path>
                                                </g>
                                            </svg>
                                            <span class="text-muted">08</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-1">
                                            <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.125 17.584" class="r--icon-reply">
                                                <defs>
                                                    <clipPath>
                                                        <rect width="14.094" height="3.924" class="cls-1"></rect>
                                                    </clipPath>
                                                </defs>
                                                <g transform="translate(-784.909 -833.715)">
                                                    <path d="M4.01,12.938H2a2,2,0,0,1-2-2V2A2,2,0,0,1,2,0H18.125a2,2,0,0,1,2,2v8.937a2,2,0,0,1-2,2H8.78l-.667.923L6.4,16.232Z" transform="translate(785.409 834.215)" class="cls-2"></path>
                                                    <g transform="translate(788.554 839.127)" class="cls-3">
                                                        <g transform="translate(-739 -839)">
                                                            <g transform="translate(739 839)" class="cls-4">
                                                                <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                </circle>
                                                                <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                </circle>
                                                            </g>
                                                        </g>
                                                        <g transform="translate(-734 -839)">
                                                            <g transform="translate(739 839)" class="cls-4">
                                                                <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                </circle>
                                                                <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                </circle>
                                                            </g>
                                                        </g>
                                                        <g transform="translate(-729 -839)">
                                                            <g transform="translate(739 839)" class="cls-4">
                                                                <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                </circle>
                                                                <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                </circle>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="text-muted">02</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="rounded-pill d-inline-block align-items-center p-1 bg-light">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0 rounded-pill  bg-info text-white d-inline-block text-center d-flex justify-content-center align-items-center" style="width: 25px; height: 25px;">C</p>
                                            <span class="fw-bold mx-2">Chaos</span>
                                        </div>
                                    </div>
                                    <div class="kalles-rating-result my-2">
                                        <span class="kalles-rating-result__pipe ,b-1">
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big active"></span>
                                            <span class="text-muted kalles-rating-result__start kalles-rating-result__start--big"></span>
                                        </span>
                                    </div>
                                    <h6>Contrary to popular belief</h6>
                                    <p class="text-muted mb-2">It is a long established fact that a reader will be
                                        distracted
                                        by the readable content of a page</p>
                                    <p class="text-muted mb-2 opacity-75 fs-14">15 days ago
                                    </p>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center gap-1">
                                            <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.762 17.939" class="text-muted">
                                                <g transform="translate(-926.048 -414.43)">
                                                    <path d="M0,14.842V6.033l.266.709S3.779,4.692,3.9,1.674s2.5-1.661,2.624.45-.095,2.192.517,3.909c1.392-.021,2.211-.013,2.59-.006H9.71q.06,0,.119,0l.056,0v0A1.532,1.532,0,0,1,10.923,8.5a1.533,1.533,0,0,1,.45,2.515,1.533,1.533,0,0,1-.387,2.485,1.859,1.859,0,0,1,.257.966c0,.847-.515,1.584-1.15,1.584L9.237,16c-.7.042-2.286.125-2.717.131H6.448A31.646,31.646,0,0,1,0,14.842Z" transform="translate(929.463 415.021)" class="cls-1"></path>
                                                    <path d="M945.558,421.769v11.039l-2.9-.279V422.22Z" transform="translate(-16.112 -0.939)" class="cls-2"></path>
                                                </g>
                                            </svg>
                                            <span class="text-muted">12</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-1">
                                            <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.762 17.659" class="r--icon-dislike">
                                                <g transform="translate(956.922 435.325) rotate(180)">
                                                    <path d="M0,14.842V6.033l.266.709S3.779,4.692,3.9,1.674s2.5-1.661,2.624.45-.095,2.192.517,3.909c1.392-.021,2.211-.013,2.59-.006H9.71q.06,0,.119,0l.056,0v0A1.532,1.532,0,0,1,10.923,8.5a1.533,1.533,0,0,1,.45,2.515,1.533,1.533,0,0,1-.387,2.485,1.859,1.859,0,0,1,.257.966c0,.847-.515,1.584-1.15,1.584L9.237,16c-.7.042-2.286.125-2.717.131H6.448A31.646,31.646,0,0,1,0,14.842Z" transform="translate(944.575 418.257)" class="cls-1"></path>
                                                    <path d="M945.558,421.946v10.321l-2.9.261V421.777Z" transform="translate(-1 2.296)" class="cls-2"></path>
                                                </g>
                                            </svg>
                                            <span class="text-muted">08</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-1">
                                            <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.125 17.584" class="r--icon-reply">
                                                <defs>
                                                    <clipPath>
                                                        <rect width="14.094" height="3.924" class="cls-1"></rect>
                                                    </clipPath>
                                                </defs>
                                                <g transform="translate(-784.909 -833.715)">
                                                    <path d="M4.01,12.938H2a2,2,0,0,1-2-2V2A2,2,0,0,1,2,0H18.125a2,2,0,0,1,2,2v8.937a2,2,0,0,1-2,2H8.78l-.667.923L6.4,16.232Z" transform="translate(785.409 834.215)" class="cls-2"></path>
                                                    <g transform="translate(788.554 839.127)" class="cls-3">
                                                        <g transform="translate(-739 -839)">
                                                            <g transform="translate(739 839)" class="cls-4">
                                                                <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                </circle>
                                                                <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                </circle>
                                                            </g>
                                                        </g>
                                                        <g transform="translate(-734 -839)">
                                                            <g transform="translate(739 839)" class="cls-4">
                                                                <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                </circle>
                                                                <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                </circle>
                                                            </g>
                                                        </g>
                                                        <g transform="translate(-729 -839)">
                                                            <g transform="translate(739 839)" class="cls-4">
                                                                <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                </circle>
                                                                <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                </circle>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="text-muted">02</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="rounded-pill d-inline-block align-items-center p-1 bg-light">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0 rounded-pill  bg-warning text-white d-inline-block text-center d-flex justify-content-center align-items-center" style="width: 25px; height: 25px;">S</p>
                                            <span class="fw-bold mx-2">Sevenor</span>
                                        </div>
                                    </div>
                                    <div class="kalles-rating-result my-2">
                                        <span class="kalles-rating-result__pipe ,b-1">
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big active"></span>
                                            <span class="text-muted kalles-rating-result__start kalles-rating-result__start--big"></span>
                                        </span>
                                    </div>
                                    <h6>Contrary to popular belief</h6>
                                    <p class="text-muted mb-2">It is a long established fact that a reader will be
                                        distracted
                                        by the readable content of a page</p>
                                    <p class="text-muted mb-2 opacity-75 fs-14">15 days ago
                                    </p>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center gap-1">
                                            <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.762 17.939" class="text-muted">
                                                <g transform="translate(-926.048 -414.43)">
                                                    <path d="M0,14.842V6.033l.266.709S3.779,4.692,3.9,1.674s2.5-1.661,2.624.45-.095,2.192.517,3.909c1.392-.021,2.211-.013,2.59-.006H9.71q.06,0,.119,0l.056,0v0A1.532,1.532,0,0,1,10.923,8.5a1.533,1.533,0,0,1,.45,2.515,1.533,1.533,0,0,1-.387,2.485,1.859,1.859,0,0,1,.257.966c0,.847-.515,1.584-1.15,1.584L9.237,16c-.7.042-2.286.125-2.717.131H6.448A31.646,31.646,0,0,1,0,14.842Z" transform="translate(929.463 415.021)" class="cls-1"></path>
                                                    <path d="M945.558,421.769v11.039l-2.9-.279V422.22Z" transform="translate(-16.112 -0.939)" class="cls-2"></path>
                                                </g>
                                            </svg>
                                            <span class="text-muted">12</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-1">
                                            <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.762 17.659" class="r--icon-dislike">
                                                <g transform="translate(956.922 435.325) rotate(180)">
                                                    <path d="M0,14.842V6.033l.266.709S3.779,4.692,3.9,1.674s2.5-1.661,2.624.45-.095,2.192.517,3.909c1.392-.021,2.211-.013,2.59-.006H9.71q.06,0,.119,0l.056,0v0A1.532,1.532,0,0,1,10.923,8.5a1.533,1.533,0,0,1,.45,2.515,1.533,1.533,0,0,1-.387,2.485,1.859,1.859,0,0,1,.257.966c0,.847-.515,1.584-1.15,1.584L9.237,16c-.7.042-2.286.125-2.717.131H6.448A31.646,31.646,0,0,1,0,14.842Z" transform="translate(944.575 418.257)" class="cls-1"></path>
                                                    <path d="M945.558,421.946v10.321l-2.9.261V421.777Z" transform="translate(-1 2.296)" class="cls-2"></path>
                                                </g>
                                            </svg>
                                            <span class="text-muted">08</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-1">
                                            <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.125 17.584" class="r--icon-reply">
                                                <defs>
                                                    <clipPath>
                                                        <rect width="14.094" height="3.924" class="cls-1"></rect>
                                                    </clipPath>
                                                </defs>
                                                <g transform="translate(-784.909 -833.715)">
                                                    <path d="M4.01,12.938H2a2,2,0,0,1-2-2V2A2,2,0,0,1,2,0H18.125a2,2,0,0,1,2,2v8.937a2,2,0,0,1-2,2H8.78l-.667.923L6.4,16.232Z" transform="translate(785.409 834.215)" class="cls-2"></path>
                                                    <g transform="translate(788.554 839.127)" class="cls-3">
                                                        <g transform="translate(-739 -839)">
                                                            <g transform="translate(739 839)" class="cls-4">
                                                                <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                </circle>
                                                                <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                </circle>
                                                            </g>
                                                        </g>
                                                        <g transform="translate(-734 -839)">
                                                            <g transform="translate(739 839)" class="cls-4">
                                                                <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                </circle>
                                                                <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                </circle>
                                                            </g>
                                                        </g>
                                                        <g transform="translate(-729 -839)">
                                                            <g transform="translate(739 839)" class="cls-4">
                                                                <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                </circle>
                                                                <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                </circle>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="text-muted">02</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="rounded-pill d-inline-block align-items-center p-1 bg-light">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0 rounded-pill  bg-danger text-white d-inline-block text-center d-flex justify-content-center align-items-center" style="width: 25px; height: 25px;">D</p>
                                            <span class="fw-bold mx-2">Dranking</span>
                                        </div>
                                    </div>
                                    <div class="kalles-rating-result my-2">
                                        <span class="kalles-rating-result__pipe ,b-1">
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big active"></span>
                                            <span class="text-muted kalles-rating-result__start kalles-rating-result__start--big"></span>
                                        </span>
                                    </div>
                                    <h6>Contrary to popular belief</h6>
                                    <p class="text-muted mb-2">It is a long established fact that a reader will be
                                        distracted
                                        by the readable content of a page</p>
                                    <p class="text-muted mb-2 opacity-75 fs-14">15 days ago
                                    </p>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center gap-1">
                                            <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.762 17.939" class="text-muted">
                                                <g transform="translate(-926.048 -414.43)">
                                                    <path d="M0,14.842V6.033l.266.709S3.779,4.692,3.9,1.674s2.5-1.661,2.624.45-.095,2.192.517,3.909c1.392-.021,2.211-.013,2.59-.006H9.71q.06,0,.119,0l.056,0v0A1.532,1.532,0,0,1,10.923,8.5a1.533,1.533,0,0,1,.45,2.515,1.533,1.533,0,0,1-.387,2.485,1.859,1.859,0,0,1,.257.966c0,.847-.515,1.584-1.15,1.584L9.237,16c-.7.042-2.286.125-2.717.131H6.448A31.646,31.646,0,0,1,0,14.842Z" transform="translate(929.463 415.021)" class="cls-1"></path>
                                                    <path d="M945.558,421.769v11.039l-2.9-.279V422.22Z" transform="translate(-16.112 -0.939)" class="cls-2"></path>
                                                </g>
                                            </svg>
                                            <span class="text-muted">12</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-1">
                                            <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.762 17.659" class="r--icon-dislike">
                                                <g transform="translate(956.922 435.325) rotate(180)">
                                                    <path d="M0,14.842V6.033l.266.709S3.779,4.692,3.9,1.674s2.5-1.661,2.624.45-.095,2.192.517,3.909c1.392-.021,2.211-.013,2.59-.006H9.71q.06,0,.119,0l.056,0v0A1.532,1.532,0,0,1,10.923,8.5a1.533,1.533,0,0,1,.45,2.515,1.533,1.533,0,0,1-.387,2.485,1.859,1.859,0,0,1,.257.966c0,.847-.515,1.584-1.15,1.584L9.237,16c-.7.042-2.286.125-2.717.131H6.448A31.646,31.646,0,0,1,0,14.842Z" transform="translate(944.575 418.257)" class="cls-1"></path>
                                                    <path d="M945.558,421.946v10.321l-2.9.261V421.777Z" transform="translate(-1 2.296)" class="cls-2"></path>
                                                </g>
                                            </svg>
                                            <span class="text-muted">08</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-1">
                                            <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.125 17.584" class="r--icon-reply">
                                                <defs>
                                                    <clipPath>
                                                        <rect width="14.094" height="3.924" class="cls-1"></rect>
                                                    </clipPath>
                                                </defs>
                                                <g transform="translate(-784.909 -833.715)">
                                                    <path d="M4.01,12.938H2a2,2,0,0,1-2-2V2A2,2,0,0,1,2,0H18.125a2,2,0,0,1,2,2v8.937a2,2,0,0,1-2,2H8.78l-.667.923L6.4,16.232Z" transform="translate(785.409 834.215)" class="cls-2"></path>
                                                    <g transform="translate(788.554 839.127)" class="cls-3">
                                                        <g transform="translate(-739 -839)">
                                                            <g transform="translate(739 839)" class="cls-4">
                                                                <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                </circle>
                                                                <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                </circle>
                                                            </g>
                                                        </g>
                                                        <g transform="translate(-734 -839)">
                                                            <g transform="translate(739 839)" class="cls-4">
                                                                <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                </circle>
                                                                <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                </circle>
                                                            </g>
                                                        </g>
                                                        <g transform="translate(-729 -839)">
                                                            <g transform="translate(739 839)" class="cls-4">
                                                                <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                </circle>
                                                                <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                </circle>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="text-muted">02</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <div class="d-flex justify-content-center mt-4">
                            <a href="#" class="btn  text-center fw-semibold sub-gray">Load
                                more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Accordion -->
    <div class="mt-4 mb-3 d-block d-lg-none">
        <div class="container">
            <div class="accordion accordion-flush product-accordion" id="accordionFlushExample">
                <div class="accordion-item border-0 mb-2">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed bg-light position-relative pe-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Description
                            <span class="bg-dark position-absolute end-0" style="width: 47px; height: 100%;"></span>
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body border border-top-0 border-light">
                            <p class="text-black">
                                Design inspiration lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi
                                commodo,
                                ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis.
                                Nullam
                                sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat
                                volutpat.
                                Sed quis velit. Nulla facilisi. Nulla libero. Vivamus pharetra posuere sapien. Nam
                                consectetuer.
                                Sed aliquam, nunc eget euismod ullamcorper, lectus nunc ullamcorper orci.</p>
                            <div class="row my-5 g-3">
                                <div class="col-md-4">
                                    <img src="{{ URL::asset('/build/images/single-product/pre-orders/thumb-02.jpg')}}" class="img-fluid" alt="">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ URL::asset('/build/images/single-product/pre-orders/thumb-03.jpg')}}" class="img-fluid" alt="">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ URL::asset('/build/images/single-product/pre-orders/thumb-01.jpg')}}" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="row align-items-center pt-5">
                                <div class="col-md-3">
                                    <div class="text-center text-md-end d-md-flex flex-md-row-reverse align-items-center justify-md-content-end mb-5">
                                        <div>
                                            <img src="{{ URL::asset('/build/images/single-product/water-resistant.png')}}" class="img-fluid" style="width: 44px;" alt="">
                                        </div>
                                        <p class="me-2 mb-0 text-muted text-md-end">Rain & Water<br>Resistant</p>
                                    </div>
                                    <div class="text-center text-md-end d-md-flex flex-md-row-reverse align-items-center justify-md-content-end mb-5">
                                        <div>
                                            <img src="{{ URL::asset('/build/images/single-product/uv-resistant.png')}}" class="img-fluid" style="width: 44px;" alt="">
                                        </div>
                                        <p class="me-2 mb-0 text-muted text-md-end">UV Resistant<br>Coatings</p>
                                    </div>
                                    <div class="text-center text-md-end d-md-flex flex-md-row-reverse align-items-center justify-md-content-end mb-5">
                                        <div>
                                            <img src="{{ URL::asset('/build/images/single-product/corrosion-resistance.png')}}" class="img-fluid" style="width: 44px;" alt="">
                                        </div>
                                        <p class="me-2 mb-0 text-muted text-md-end">Corrosion Resistance<br>to Sea water
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <img src="{{ URL::asset('/build/images/single-product/athun.png')}}" class="img-fluid" alt="">
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center text-md-end d-md-flex align-items-center justify-md-content-start mb-5">
                                        <div>
                                            <img src="{{ URL::asset('/build/images/single-product/lead-free.png')}}" class="img-fluid" style="width: 44px;" alt="">
                                        </div>
                                        <p class="ms-2 mb-0 text-muted text-md-start">
                                            Lead-free<br>Powdercoat Finish
                                        </p>
                                    </div>
                                    <div class="text-center text-md-end d-md-flex align-items-center justify-md-content-start mb-5">
                                        <div>
                                            <img src="{{ URL::asset('/build/images/single-product/resistant-to-spills.png')}}" class="img-fluid" style="width: 44px;" alt="">
                                        </div>
                                        <p class="ms-2 mb-0 text-muted text-md-start">
                                            Resistant to<br>Spills
                                        </p>
                                    </div>
                                    <div class="text-center text-md-end d-md-flex align-items-center justify-md-content-start mb-md-5">
                                        <div>
                                            <img src="{{ URL::asset('/build/images/single-product/recyclable.png')}}" class="img-fluid" style="width: 44px;" alt="">
                                        </div>
                                        <p class="ms-2 mb-0 text-muted text-md-start">
                                            Recyclable<br>Aluminium Frame
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 mb-2">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed bg-light position-relative pe-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                            Additional Information
                            <span class="bg-dark position-absolute end-0" style="width: 47px; height: 100%;"></span>
                        </button>
                    </h2>
                    <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body border border-top-0 border-light">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th class="bg-transparent" scope="row"> Color</th>
                                        <td class="bg-transparent">Grey, Pink, Black</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-transparent" scope="row">Size</th>
                                        <td class="bg-transparent"> S, M, L</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 mb-2">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed bg-light position-relative pe-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                            Warranty & Shipping
                            <span class="bg-dark position-absolute end-0" style="width: 47px; height: 100%;"></span>
                        </button>
                    </h2>
                    <div id="flush-collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body border border-top-0 border-light">
                            <h6 class="fw-bold">Warranty</h6>
                            <p class="mb-0">
                                If issues experienced with the frame include a manufacturer's defect, or an issue
                                resulting from
                                an inherent flaw in the product, RAEN provides a 365 day warranty from the time of
                                purchase. If
                                you feel your product meets these requirements, please email <a href="#!">warranty@domain.com</a> explaining the
                                nature of your warranty claim and all necessary details.
                            </p>
                            <p class="mb-4">
                                Scratched lenses and physical damage are not covered by warranty. Unfortunately we do
                                not
                                manufacture or sell replacement lenses.
                            </p>
                            <h6 class="fw-bold">Free FedEx 2-Day Shipping</h6>
                            <p class="mb-4">
                                Free FedEx 2-Day Shipping is available exclusively to the U.S. on orders over $150.
                                FedEx 2-Day
                                packages are delivered Monday through Friday.
                            </p>
                            <h6 class="fw-bold">Free FedEx Ground Shipping</h6>
                            <p class="mb-4">
                                Free FedEx Ground Shipping is available exclusively to U.S. orders over $100.
                            </p>
                            <h6 class="fw-bold">Free Returns</h6>
                            <p class="mb-4">
                                Free returns are available on all U.S. order within 14 days of shipment.
                            </p>
                            <p class="fst-italic fw-medium">*Free Shipping is not available with some promotions and
                                other
                                restrictions
                                may apply.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 mb-2">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed bg-light position-relative pe-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Wash & Care
                            <span class="bg-dark position-absolute end-0" style="width: 47px; height: 100%;"></span>
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="list-unstyled d-flex flex-wrap justify-content-center mb-0 ">
                                <li class="m-2">
                                    <svg width="35" viewBox="0 0 40 40">
                                        <path fill="currentColor" d="M8.7 30.7h22.7c.3 0 .6-.2.7-.6l4-25.3c-.1-.4-.3-.7-.7-.8s-.7.2-.8.6L34 8.9l-3-1.1c-2.4-.9-5.1-.5-7.2 1-2.3 1.6-5.3 1.6-7.6 0-2.1-1.5-4.8-1.9-7.2-1L6 8.9l-.7-4.3c0-.4-.4-.7-.7-.6-.4.1-.6.4-.6.8l4 25.3c.1.3.3.6.7.6zm.8-21.6c2-.7 4.2-.4 6 .8 1.4 1 3 1.5 4.6 1.5s3.2-.5 4.6-1.5c1.7-1.2 4-1.6 6-.8l3.3 1.2-3 19.1H9.2l-3-19.1 3.3-1.2zM32 32H8c-.4 0-.7.3-.7.7s.3.7.7.7h24c.4 0 .7-.3.7-.7s-.3-.7-.7-.7zm0 2.7H8c-.4 0-.7.3-.7.7s.3.6.7.6h24c.4 0 .7-.3.7-.7s-.3-.6-.7-.6zm-17.9-8.9c-1 0-1.8-.3-2.4-.6l.1-2.1c.6.4 1.4.6 2 .6.8 0 1.2-.4 1.2-1.3s-.4-1.3-1.3-1.3h-1.3l.2-1.9h1.1c.6 0 1-.3 1-1.3 0-.8-.4-1.2-1.1-1.2s-1.2.2-1.9.4l-.2-1.9c.7-.4 1.5-.6 2.3-.6 2 0 3 1.3 3 2.9 0 1.2-.4 1.9-1.1 2.3 1 .4 1.3 1.4 1.3 2.5.3 1.8-.6 3.5-2.9 3.5zm4-5.5c0-3.9 1.2-5.5 3.2-5.5s3.2 1.6 3.2 5.5-1.2 5.5-3.2 5.5-3.2-1.6-3.2-5.5zm4.1 0c0-2-.1-3.5-.9-3.5s-1 1.5-1 3.5.1 3.5 1 3.5c.8 0 .9-1.5.9-3.5zm4.5-1.4c-.9 0-1.5-.8-1.5-2.1s.6-2.1 1.5-2.1 1.5.8 1.5 2.1-.5 2.1-1.5 2.1zm0-.8c.4 0 .7-.5.7-1.2s-.2-1.2-.7-1.2-.7.5-.7 1.2.3 1.2.7 1.2z">
                                        </path>
                                    </svg>
                                </li>
                                <li class="m-2">
                                    <svg width="35" viewBox="0 0 40 40">
                                        <path fill="currentColor" d="M36.7 31.1l-2.8-1.3-4.7-9.1 7.5-3.5c.4-.2.6-.6.4-1s-.6-.5-1-.4l-7.5 3.5-7.8-15c-.3-.5-1.1-.5-1.4 0l-7.8 15L4 15.9c-.4-.2-.8 0-1 .4s0 .8.4 1l7.5 3.5-4.7 9.1-2.8 1.3c-.4.2-.6.6-.4 1 .1.3.4.4.7.4.1 0 .2 0 .3-.1l1-.4-1.5 2.8c-.1.2-.1.5 0 .8.1.2.4.3.7.3h31.7c.3 0 .5-.1.7-.4.1-.2.1-.5 0-.8L35.1 32l1 .4c.1 0 .2.1.3.1.3 0 .6-.2.7-.4.1-.3 0-.8-.4-1zm-5.1-2.3l-9.8-4.6 6-2.8 3.8 7.4zM20 6.4L27.1 20 20 23.3 12.9 20 20 6.4zm-7.8 15l6 2.8-9.8 4.6 3.8-7.4zm22.4 13.1H5.4L7.2 31 20 25l12.8 6 1.8 3.5z">
                                        </path>
                                    </svg>
                                </li>
                                <li class="m-2">
                                    <svg width="35" viewBox="0 0 40 40">
                                        <path fill="currentColor" d="M5.9 5.9v28.2h28.2V5.9H5.9zM19.1 20l-8.3 8.3c-2-2.2-3.2-5.1-3.2-8.3s1.2-6.1 3.2-8.3l8.3 8.3zm-7.4-9.3c2.2-2 5.1-3.2 8.3-3.2s6.1 1.2 8.3 3.2L20 19.1l-8.3-8.4zM20 20.9l8.3 8.3c-2.2 2-5.1 3.2-8.3 3.2s-6.1-1.2-8.3-3.2l8.3-8.3zm.9-.9l8.3-8.3c2 2.2 3.2 5.1 3.2 8.3s-1.2 6.1-3.2 8.3L20.9 20zm8.4-10.2c-1.2-1.1-2.6-2-4.1-2.6h6.6l-2.5 2.6zm-18.6 0L8.2 7.2h6.6c-1.5.6-2.9 1.5-4.1 2.6zm-.9.9c-1.1 1.2-2 2.6-2.6 4.1V8.2l2.6 2.5zM7.2 25.2c.6 1.5 1.5 2.9 2.6 4.1l-2.6 2.6v-6.7zm3.5 5c1.2 1.1 2.6 2 4.1 2.6H8.2l2.5-2.6zm18.6 0l2.6 2.6h-6.6c1.4-.6 2.8-1.5 4-2.6zm.9-.9c1.1-1.2 2-2.6 2.6-4.1v6.6l-2.6-2.5zm2.6-14.5c-.6-1.5-1.5-2.9-2.6-4.1l2.6-2.6v6.7z">
                                        </path>
                                    </svg>
                                </li>
                                <li class="m-2">
                                    <svg width="35" viewBox="0 0 40 40">
                                        <path fill="currentColor" d="M35.1 33.6L33.2 6.2c0-.4-.3-.7-.7-.7H13.9c-.4 0-.7.3-.7.7s.3.7.7.7h18l.7 10.5H20.8c-8.8.2-15.9 7.5-15.9 16.4 0 .4.3.7.7.7h28.9c.2 0 .4-.1.5-.2s.2-.3.2-.5v-.2h-.1zm-28.8-.5C6.7 25.3 13 19 20.8 18.9h11.9l1 14.2H6.3zm11.2-6.8c0 1.2-1 2.1-2.1 2.1s-2.1-1-2.1-2.1 1-2.1 2.1-2.1 2.1 1 2.1 2.1zm6.3 0c0 1.2-1 2.1-2.1 2.1-1.2 0-2.1-1-2.1-2.1s1-2.1 2.1-2.1 2.1 1 2.1 2.1z">
                                        </path>
                                    </svg>
                                </li>
                                <li class="m-2">
                                    <svg width="35" viewBox="0 0 40 40">
                                        <path fill="currentColor" d="M20 33.8c7.6 0 13.8-6.2 13.8-13.8S27.6 6.2 20 6.2 6.2 12.4 6.2 20 12.4 33.8 20 33.8zm0-26.3c6.9 0 12.5 5.6 12.5 12.5S26.9 32.5 20 32.5 7.5 26.9 7.5 20 13.1 7.5 20 7.5zm-.4 15h.5c1.8 0 3-1.1 3-3.7 0-2.2-1.1-3.6-3.1-3.6h-2.6v10.6h2.2v-3.3zm0-5.2h.4c.6 0 .9.5.9 1.7 0 1.1-.3 1.7-.9 1.7h-.4v-3.4z">
                                        </path>
                                    </svg>
                                </li>
                                <li class="m-2">
                                    <svg width="35" viewBox="0 0 40 40">
                                        <path fill="currentColor" d="M30.2 29.3c2.2-2.5 3.6-5.7 3.6-9.3s-1.4-6.8-3.6-9.3l3.6-3.6c.3-.3.3-.7 0-.9-.3-.3-.7-.3-.9 0l-3.6 3.6c-2.5-2.2-5.7-3.6-9.3-3.6s-6.8 1.4-9.3 3.6L7.1 6.2c-.3-.3-.7-.3-.9 0-.3.3-.3.7 0 .9l3.6 3.6c-2.2 2.5-3.6 5.7-3.6 9.3s1.4 6.8 3.6 9.3l-3.6 3.6c-.3.3-.3.7 0 .9.1.1.3.2.5.2s.3-.1.5-.2l3.6-3.6c2.5 2.2 5.7 3.6 9.3 3.6s6.8-1.4 9.3-3.6l3.6 3.6c.1.1.3.2.5.2s.3-.1.5-.2c.3-.3.3-.7 0-.9l-3.8-3.6z">
                                        </path>
                                    </svg>
                                </li>
                                <li class="m-2">
                                    <svg width="35" viewBox="0 0 40 40">
                                        <path fill="currentColor" d="M34.1 34.1H5.9V5.9h28.2v28.2zM7.2 32.8h25.6V7.2H7.2v25.6zm13.5-18.3a.68.68 0 0 0-.7-.7.68.68 0 0 0-.7.7v10.9a.68.68 0 0 0 .7.7.68.68 0 0 0 .7-.7V14.5z">
                                        </path>
                                    </svg>
                                </li>
                            </ul>
                            <p class="mb-0 text-center">LT01: 70% wool, 15% polyester, 10% polyamide, 5% acrylic 900
                                Grms/mt</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed bg-light position-relative pe-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Reviews
                            <span class="bg-dark position-absolute end-0" style="width: 47px; height: 100%;"></span>
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="row mb-3">
                                <div class="col-md-2 text-center">
                                    <p class="mb-0">Average</p>
                                    <h2 class="fw-bold my-1">4.8</h2>
                                    <div class="kalles-rating-result">
                                        <span class="kalles-rating-result__pipe ,b-1">
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                            <span class="kalles-rating-result__start kalles-rating-result__start--big active"></span>
                                            <span class="text-muted kalles-rating-result__start kalles-rating-result__start--big"></span>
                                        </span>
                                    </div>
                                    <p class="text-muted">13 Review</p>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex align-items-center my-2">
                                        <p class="mb-0 me-2">Excellent</p>
                                        <input type="range" min="1" max="12" value="12" class="slider slider1" id="myRange">
                                    </div>
                                    <div class="d-flex align-items-center my-2">
                                        <p class="mb-0 me-2">Very Good </p>
                                        <input type="range" min="1" max="12" value="0" class="slider slider1" id="myRange">
                                    </div>
                                    <div class="d-flex align-items-center my-2">
                                        <p class="mb-0 me-2">Average</p>
                                        <input type="range" min="1" max="12" value="1" class="slider slider1" id="myRange">
                                    </div>
                                    <div class="d-flex align-items-center my-2">
                                        <p class="mb-0 pe-2 me-4">Poor</p>
                                        <input type="range" min="1" max="12" value="0" class="slider slider1" id="myRange">
                                    </div>
                                    <div class="d-flex align-items-center my-2">
                                        <p class="mb-0 me-2">Terrible</p>
                                        <input type="range" min="1" max="12" value="0" class="slider slider1" id="myRange">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-warning py-1 px-2">
                                        <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="18.37" height="17.8" viewBox="0 0 21.682 21.602">
                                            <g id="Symbol_32_2" data-name="Symbol 32 – 2" transform="translate(-961.98 -374.155)">
                                                <path d="M0,0H4V11.2L1.937,14h0L0,11.2Z" transform="translate(979.891 381.756) rotate(40)" fill="none" stroke="#ffffff" stroke-linejoin="round" stroke-width="1"></path>
                                                <path d="M0,0H4" transform="translate(972.692 390.335) rotate(40)" fill="none" stroke="#ffffff" stroke-width="1"></path>
                                                <g transform="translate(981.126 380.964) rotate(40)" fill="none" stroke="#ffffff" stroke-width="1">
                                                    <rect width="3.128" height="1.4" stroke="none"></rect>
                                                    <rect x="0.5" y="0.5" width="2.128" height="0.4" fill="none"></rect>
                                                </g>
                                                <path d="M2858.324,3384.6h7.412" transform="translate(-1891.1 -3003.987)" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"></path>
                                                <path d="M2858.324,3384.6h7.412" transform="translate(-1891.1 -2999.611)" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-width="1"></path>
                                                <path d="M8.952,0H15a2,2,0,0,1,2,2V15a2,2,0,0,1-2,2H2a2,2,0,0,1-2-2V12.162" transform="translate(979.48 391.655) rotate(180)" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"></path>
                                            </g>
                                        </svg> Write a review</button>
                                </div>
                            </div>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <p class="text-muted mb-0">Showing 1 - 6 of 13 reviews</p>
                        <div class="d-flex mt-3 mt-sm-0">
                            <div class="dropdown review-dropdown">
                                <a class="dropdown-toggle text-muted me-2" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Filter </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#!">ALL</a></li>
                                    <li><a class="dropdown-item" href="#!">Excellent</a></li>
                                    <li><a class="dropdown-item" href="#!">Very Good</a></li>
                                </ul>
                            </div>
                            <div class="dropdown review-dropdown">
                                <a class="dropdown-toggle text-muted" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Short by: Latest </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#!">Latest</a></li>
                                    <li><a class="dropdown-item" href="#!">Oldest</a></li>
                                    <li><a class="dropdown-item" href="#!">Images</a></li>
                                    <li><a class="dropdown-item" href="#!">Most like</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                            <div class="row g-3">
                                <div class="col-sm-6 col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="rounded-pill d-inline-block align-items-center p-1 bg-light">
                                                <div class="d-flex align-items-center">
                                                    <p class="mb-0 rounded-pill  bg-warning text-white d-inline-block text-center d-flex justify-content-center align-items-center" style="width: 25px; height: 25px;">P</p>
                                                    <span class="fw-bold mx-2">Peter</span>
                                                </div>
                                            </div>
                                            <div class="kalles-rating-result my-2">
                                                <span class="kalles-rating-result__pipe ,b-1">
                                                    <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                                    <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                                    <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                                    <span class="kalles-rating-result__start kalles-rating-result__start--big active"></span>
                                                    <span class="text-muted kalles-rating-result__start kalles-rating-result__start--big"></span>
                                                </span>
                                            </div>
                                            <h6>Contrary to popular belief</h6>
                                            <p class="text-muted mb-2">It is a long established fact that a reader will
                                                be
                                                distracted
                                                by the readable content of a page</p>
                                            <p class="text-muted mb-2 opacity-75 fs-14">15 days ago
                                            </p>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="d-flex align-items-center gap-1">
                                                    <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.762 17.939" class="text-muted">
                                                        <g transform="translate(-926.048 -414.43)">
                                                            <path d="M0,14.842V6.033l.266.709S3.779,4.692,3.9,1.674s2.5-1.661,2.624.45-.095,2.192.517,3.909c1.392-.021,2.211-.013,2.59-.006H9.71q.06,0,.119,0l.056,0v0A1.532,1.532,0,0,1,10.923,8.5a1.533,1.533,0,0,1,.45,2.515,1.533,1.533,0,0,1-.387,2.485,1.859,1.859,0,0,1,.257.966c0,.847-.515,1.584-1.15,1.584L9.237,16c-.7.042-2.286.125-2.717.131H6.448A31.646,31.646,0,0,1,0,14.842Z" transform="translate(929.463 415.021)" class="cls-1">
                                                            </path>
                                                            <path d="M945.558,421.769v11.039l-2.9-.279V422.22Z" transform="translate(-16.112 -0.939)" class="cls-2">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                    <span class="text-muted">12</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-1">
                                                    <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.762 17.659" class="r--icon-dislike">
                                                        <g transform="translate(956.922 435.325) rotate(180)">
                                                            <path d="M0,14.842V6.033l.266.709S3.779,4.692,3.9,1.674s2.5-1.661,2.624.45-.095,2.192.517,3.909c1.392-.021,2.211-.013,2.59-.006H9.71q.06,0,.119,0l.056,0v0A1.532,1.532,0,0,1,10.923,8.5a1.533,1.533,0,0,1,.45,2.515,1.533,1.533,0,0,1-.387,2.485,1.859,1.859,0,0,1,.257.966c0,.847-.515,1.584-1.15,1.584L9.237,16c-.7.042-2.286.125-2.717.131H6.448A31.646,31.646,0,0,1,0,14.842Z" transform="translate(944.575 418.257)" class="cls-1">
                                                            </path>
                                                            <path d="M945.558,421.946v10.321l-2.9.261V421.777Z" transform="translate(-1 2.296)" class="cls-2"></path>
                                                        </g>
                                                    </svg>
                                                    <span class="text-muted">08</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-1">
                                                    <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.125 17.584" class="r--icon-reply">
                                                        <defs>
                                                            <clipPath>
                                                                <rect width="14.094" height="3.924" class="cls-1">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                        <g transform="translate(-784.909 -833.715)">
                                                            <path d="M4.01,12.938H2a2,2,0,0,1-2-2V2A2,2,0,0,1,2,0H18.125a2,2,0,0,1,2,2v8.937a2,2,0,0,1-2,2H8.78l-.667.923L6.4,16.232Z" transform="translate(785.409 834.215)" class="cls-2">
                                                            </path>
                                                            <g transform="translate(788.554 839.127)" class="cls-3">
                                                                <g transform="translate(-739 -839)">
                                                                    <g transform="translate(739 839)" class="cls-4">
                                                                        <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                        </circle>
                                                                        <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                        </circle>
                                                                    </g>
                                                                </g>
                                                                <g transform="translate(-734 -839)">
                                                                    <g transform="translate(739 839)" class="cls-4">
                                                                        <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                        </circle>
                                                                        <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                        </circle>
                                                                    </g>
                                                                </g>
                                                                <g transform="translate(-729 -839)">
                                                                    <g transform="translate(739 839)" class="cls-4">
                                                                        <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                        </circle>
                                                                        <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                        </circle>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <span class="text-muted">02</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="rounded-pill d-inline-block align-items-center p-1 bg-light">
                                                <div class="d-flex align-items-center">
                                                    <p class="mb-0 rounded-pill  bg-danger text-white d-inline-block text-center d-flex justify-content-center align-items-center" style="width: 25px; height: 25px;">K</p>
                                                    <span class="fw-bold mx-2">Kodeman</span>
                                                </div>
                                            </div>
                                            <div class="kalles-rating-result my-2">
                                                <span class="kalles-rating-result__pipe ,b-1">
                                                    <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                                    <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                                    <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                                    <span class="kalles-rating-result__start kalles-rating-result__start--big active"></span>
                                                    <span class="text-muted kalles-rating-result__start kalles-rating-result__start--big"></span>
                                                </span>
                                            </div>
                                            <h6>Contrary to popular belief</h6>
                                            <p class="text-muted mb-2">It is a long established fact that a reader will
                                                be
                                                distracted
                                                by the readable content of a page</p>
                                            <p class="text-muted mb-2 opacity-75 fs-14">15 days ago
                                            </p>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="d-flex align-items-center gap-1">
                                                    <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.762 17.939" class="text-muted">
                                                        <g transform="translate(-926.048 -414.43)">
                                                            <path d="M0,14.842V6.033l.266.709S3.779,4.692,3.9,1.674s2.5-1.661,2.624.45-.095,2.192.517,3.909c1.392-.021,2.211-.013,2.59-.006H9.71q.06,0,.119,0l.056,0v0A1.532,1.532,0,0,1,10.923,8.5a1.533,1.533,0,0,1,.45,2.515,1.533,1.533,0,0,1-.387,2.485,1.859,1.859,0,0,1,.257.966c0,.847-.515,1.584-1.15,1.584L9.237,16c-.7.042-2.286.125-2.717.131H6.448A31.646,31.646,0,0,1,0,14.842Z" transform="translate(929.463 415.021)" class="cls-1">
                                                            </path>
                                                            <path d="M945.558,421.769v11.039l-2.9-.279V422.22Z" transform="translate(-16.112 -0.939)" class="cls-2">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                    <span class="text-muted">12</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-1">
                                                    <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.762 17.659" class="r--icon-dislike">
                                                        <g transform="translate(956.922 435.325) rotate(180)">
                                                            <path d="M0,14.842V6.033l.266.709S3.779,4.692,3.9,1.674s2.5-1.661,2.624.45-.095,2.192.517,3.909c1.392-.021,2.211-.013,2.59-.006H9.71q.06,0,.119,0l.056,0v0A1.532,1.532,0,0,1,10.923,8.5a1.533,1.533,0,0,1,.45,2.515,1.533,1.533,0,0,1-.387,2.485,1.859,1.859,0,0,1,.257.966c0,.847-.515,1.584-1.15,1.584L9.237,16c-.7.042-2.286.125-2.717.131H6.448A31.646,31.646,0,0,1,0,14.842Z" transform="translate(944.575 418.257)" class="cls-1">
                                                            </path>
                                                            <path d="M945.558,421.946v10.321l-2.9.261V421.777Z" transform="translate(-1 2.296)" class="cls-2"></path>
                                                        </g>
                                                    </svg>
                                                    <span class="text-muted">08</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-1">
                                                    <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.125 17.584" class="r--icon-reply">
                                                        <defs>
                                                            <clipPath>
                                                                <rect width="14.094" height="3.924" class="cls-1">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                        <g transform="translate(-784.909 -833.715)">
                                                            <path d="M4.01,12.938H2a2,2,0,0,1-2-2V2A2,2,0,0,1,2,0H18.125a2,2,0,0,1,2,2v8.937a2,2,0,0,1-2,2H8.78l-.667.923L6.4,16.232Z" transform="translate(785.409 834.215)" class="cls-2">
                                                            </path>
                                                            <g transform="translate(788.554 839.127)" class="cls-3">
                                                                <g transform="translate(-739 -839)">
                                                                    <g transform="translate(739 839)" class="cls-4">
                                                                        <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                        </circle>
                                                                        <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                        </circle>
                                                                    </g>
                                                                </g>
                                                                <g transform="translate(-734 -839)">
                                                                    <g transform="translate(739 839)" class="cls-4">
                                                                        <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                        </circle>
                                                                        <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                        </circle>
                                                                    </g>
                                                                </g>
                                                                <g transform="translate(-729 -839)">
                                                                    <g transform="translate(739 839)" class="cls-4">
                                                                        <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                        </circle>
                                                                        <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                        </circle>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <span class="text-muted">02</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="rounded-pill d-inline-block align-items-center p-1 bg-light">
                                                <div class="d-flex align-items-center">
                                                    <p class="mb-0 rounded-pill  bg-primary text-white d-inline-block text-center d-flex justify-content-center align-items-center" style="width: 25px; height: 25px;">G</p>
                                                    <span class="fw-bold mx-2">Glager</span>
                                                </div>
                                            </div>
                                            <div class="kalles-rating-result my-2">
                                                <span class="kalles-rating-result__pipe ,b-1">
                                                    <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                                    <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                                    <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                                    <span class="kalles-rating-result__start kalles-rating-result__start--big active"></span>
                                                    <span class="text-muted kalles-rating-result__start kalles-rating-result__start--big"></span>
                                                </span>
                                            </div>
                                            <h6>Contrary to popular belief</h6>
                                            <p class="text-muted mb-2">It is a long established fact that a reader will
                                                be
                                                distracted
                                                by the readable content of a page</p>
                                            <p class="text-muted mb-2 opacity-75 fs-14">15 days ago
                                            </p>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="d-flex align-items-center gap-1">
                                                    <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.762 17.939" class="text-muted">
                                                        <g transform="translate(-926.048 -414.43)">
                                                            <path d="M0,14.842V6.033l.266.709S3.779,4.692,3.9,1.674s2.5-1.661,2.624.45-.095,2.192.517,3.909c1.392-.021,2.211-.013,2.59-.006H9.71q.06,0,.119,0l.056,0v0A1.532,1.532,0,0,1,10.923,8.5a1.533,1.533,0,0,1,.45,2.515,1.533,1.533,0,0,1-.387,2.485,1.859,1.859,0,0,1,.257.966c0,.847-.515,1.584-1.15,1.584L9.237,16c-.7.042-2.286.125-2.717.131H6.448A31.646,31.646,0,0,1,0,14.842Z" transform="translate(929.463 415.021)" class="cls-1">
                                                            </path>
                                                            <path d="M945.558,421.769v11.039l-2.9-.279V422.22Z" transform="translate(-16.112 -0.939)" class="cls-2">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                    <span class="text-muted">12</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-1">
                                                    <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.762 17.659" class="r--icon-dislike">
                                                        <g transform="translate(956.922 435.325) rotate(180)">
                                                            <path d="M0,14.842V6.033l.266.709S3.779,4.692,3.9,1.674s2.5-1.661,2.624.45-.095,2.192.517,3.909c1.392-.021,2.211-.013,2.59-.006H9.71q.06,0,.119,0l.056,0v0A1.532,1.532,0,0,1,10.923,8.5a1.533,1.533,0,0,1,.45,2.515,1.533,1.533,0,0,1-.387,2.485,1.859,1.859,0,0,1,.257.966c0,.847-.515,1.584-1.15,1.584L9.237,16c-.7.042-2.286.125-2.717.131H6.448A31.646,31.646,0,0,1,0,14.842Z" transform="translate(944.575 418.257)" class="cls-1">
                                                            </path>
                                                            <path d="M945.558,421.946v10.321l-2.9.261V421.777Z" transform="translate(-1 2.296)" class="cls-2"></path>
                                                        </g>
                                                    </svg>
                                                    <span class="text-muted">08</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-1">
                                                    <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.125 17.584" class="r--icon-reply">
                                                        <defs>
                                                            <clipPath>
                                                                <rect width="14.094" height="3.924" class="cls-1">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                        <g transform="translate(-784.909 -833.715)">
                                                            <path d="M4.01,12.938H2a2,2,0,0,1-2-2V2A2,2,0,0,1,2,0H18.125a2,2,0,0,1,2,2v8.937a2,2,0,0,1-2,2H8.78l-.667.923L6.4,16.232Z" transform="translate(785.409 834.215)" class="cls-2">
                                                            </path>
                                                            <g transform="translate(788.554 839.127)" class="cls-3">
                                                                <g transform="translate(-739 -839)">
                                                                    <g transform="translate(739 839)" class="cls-4">
                                                                        <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                        </circle>
                                                                        <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                        </circle>
                                                                    </g>
                                                                </g>
                                                                <g transform="translate(-734 -839)">
                                                                    <g transform="translate(739 839)" class="cls-4">
                                                                        <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                        </circle>
                                                                        <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                        </circle>
                                                                    </g>
                                                                </g>
                                                                <g transform="translate(-729 -839)">
                                                                    <g transform="translate(739 839)" class="cls-4">
                                                                        <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                        </circle>
                                                                        <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                        </circle>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <span class="text-muted">02</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="rounded-pill d-inline-block align-items-center p-1 bg-light">
                                                <div class="d-flex align-items-center">
                                                    <p class="mb-0 rounded-pill  bg-info text-white d-inline-block text-center d-flex justify-content-center align-items-center" style="width: 25px; height: 25px;">C</p>
                                                    <span class="fw-bold mx-2">Chaos</span>
                                                </div>
                                            </div>
                                            <div class="kalles-rating-result my-2">
                                                <span class="kalles-rating-result__pipe ,b-1">
                                                    <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                                    <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                                    <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                                    <span class="kalles-rating-result__start kalles-rating-result__start--big active"></span>
                                                    <span class="text-muted kalles-rating-result__start kalles-rating-result__start--big"></span>
                                                </span>
                                            </div>
                                            <h6>Contrary to popular belief</h6>
                                            <p class="text-muted mb-2">It is a long established fact that a reader will
                                                be
                                                distracted
                                                by the readable content of a page</p>
                                            <p class="text-muted mb-2 opacity-75 fs-14">15 days ago
                                            </p>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="d-flex align-items-center gap-1">
                                                    <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.762 17.939" class="text-muted">
                                                        <g transform="translate(-926.048 -414.43)">
                                                            <path d="M0,14.842V6.033l.266.709S3.779,4.692,3.9,1.674s2.5-1.661,2.624.45-.095,2.192.517,3.909c1.392-.021,2.211-.013,2.59-.006H9.71q.06,0,.119,0l.056,0v0A1.532,1.532,0,0,1,10.923,8.5a1.533,1.533,0,0,1,.45,2.515,1.533,1.533,0,0,1-.387,2.485,1.859,1.859,0,0,1,.257.966c0,.847-.515,1.584-1.15,1.584L9.237,16c-.7.042-2.286.125-2.717.131H6.448A31.646,31.646,0,0,1,0,14.842Z" transform="translate(929.463 415.021)" class="cls-1">
                                                            </path>
                                                            <path d="M945.558,421.769v11.039l-2.9-.279V422.22Z" transform="translate(-16.112 -0.939)" class="cls-2">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                    <span class="text-muted">12</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-1">
                                                    <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.762 17.659" class="r--icon-dislike">
                                                        <g transform="translate(956.922 435.325) rotate(180)">
                                                            <path d="M0,14.842V6.033l.266.709S3.779,4.692,3.9,1.674s2.5-1.661,2.624.45-.095,2.192.517,3.909c1.392-.021,2.211-.013,2.59-.006H9.71q.06,0,.119,0l.056,0v0A1.532,1.532,0,0,1,10.923,8.5a1.533,1.533,0,0,1,.45,2.515,1.533,1.533,0,0,1-.387,2.485,1.859,1.859,0,0,1,.257.966c0,.847-.515,1.584-1.15,1.584L9.237,16c-.7.042-2.286.125-2.717.131H6.448A31.646,31.646,0,0,1,0,14.842Z" transform="translate(944.575 418.257)" class="cls-1">
                                                            </path>
                                                            <path d="M945.558,421.946v10.321l-2.9.261V421.777Z" transform="translate(-1 2.296)" class="cls-2"></path>
                                                        </g>
                                                    </svg>
                                                    <span class="text-muted">08</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-1">
                                                    <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.125 17.584" class="r--icon-reply">
                                                        <defs>
                                                            <clipPath>
                                                                <rect width="14.094" height="3.924" class="cls-1">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                        <g transform="translate(-784.909 -833.715)">
                                                            <path d="M4.01,12.938H2a2,2,0,0,1-2-2V2A2,2,0,0,1,2,0H18.125a2,2,0,0,1,2,2v8.937a2,2,0,0,1-2,2H8.78l-.667.923L6.4,16.232Z" transform="translate(785.409 834.215)" class="cls-2">
                                                            </path>
                                                            <g transform="translate(788.554 839.127)" class="cls-3">
                                                                <g transform="translate(-739 -839)">
                                                                    <g transform="translate(739 839)" class="cls-4">
                                                                        <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                        </circle>
                                                                        <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                        </circle>
                                                                    </g>
                                                                </g>
                                                                <g transform="translate(-734 -839)">
                                                                    <g transform="translate(739 839)" class="cls-4">
                                                                        <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                        </circle>
                                                                        <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                        </circle>
                                                                    </g>
                                                                </g>
                                                                <g transform="translate(-729 -839)">
                                                                    <g transform="translate(739 839)" class="cls-4">
                                                                        <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                        </circle>
                                                                        <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                        </circle>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <span class="text-muted">02</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="rounded-pill d-inline-block align-items-center p-1 bg-light">
                                                <div class="d-flex align-items-center">
                                                    <p class="mb-0 rounded-pill  bg-warning text-white d-inline-block text-center d-flex justify-content-center align-items-center" style="width: 25px; height: 25px;">S</p>
                                                    <span class="fw-bold mx-2">Sevenor</span>
                                                </div>
                                            </div>
                                            <div class="kalles-rating-result my-2">
                                                <span class="kalles-rating-result__pipe ,b-1">
                                                    <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                                    <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                                    <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                                    <span class="kalles-rating-result__start kalles-rating-result__start--big active"></span>
                                                    <span class="text-muted kalles-rating-result__start kalles-rating-result__start--big"></span>
                                                </span>
                                            </div>
                                            <h6>Contrary to popular belief</h6>
                                            <p class="text-muted mb-2">It is a long established fact that a reader will
                                                be
                                                distracted
                                                by the readable content of a page</p>
                                            <p class="text-muted mb-2 opacity-75 fs-14">15 days ago
                                            </p>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="d-flex align-items-center gap-1">
                                                    <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.762 17.939" class="text-muted">
                                                        <g transform="translate(-926.048 -414.43)">
                                                            <path d="M0,14.842V6.033l.266.709S3.779,4.692,3.9,1.674s2.5-1.661,2.624.45-.095,2.192.517,3.909c1.392-.021,2.211-.013,2.59-.006H9.71q.06,0,.119,0l.056,0v0A1.532,1.532,0,0,1,10.923,8.5a1.533,1.533,0,0,1,.45,2.515,1.533,1.533,0,0,1-.387,2.485,1.859,1.859,0,0,1,.257.966c0,.847-.515,1.584-1.15,1.584L9.237,16c-.7.042-2.286.125-2.717.131H6.448A31.646,31.646,0,0,1,0,14.842Z" transform="translate(929.463 415.021)" class="cls-1">
                                                            </path>
                                                            <path d="M945.558,421.769v11.039l-2.9-.279V422.22Z" transform="translate(-16.112 -0.939)" class="cls-2">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                    <span class="text-muted">12</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-1">
                                                    <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.762 17.659" class="r--icon-dislike">
                                                        <g transform="translate(956.922 435.325) rotate(180)">
                                                            <path d="M0,14.842V6.033l.266.709S3.779,4.692,3.9,1.674s2.5-1.661,2.624.45-.095,2.192.517,3.909c1.392-.021,2.211-.013,2.59-.006H9.71q.06,0,.119,0l.056,0v0A1.532,1.532,0,0,1,10.923,8.5a1.533,1.533,0,0,1,.45,2.515,1.533,1.533,0,0,1-.387,2.485,1.859,1.859,0,0,1,.257.966c0,.847-.515,1.584-1.15,1.584L9.237,16c-.7.042-2.286.125-2.717.131H6.448A31.646,31.646,0,0,1,0,14.842Z" transform="translate(944.575 418.257)" class="cls-1">
                                                            </path>
                                                            <path d="M945.558,421.946v10.321l-2.9.261V421.777Z" transform="translate(-1 2.296)" class="cls-2"></path>
                                                        </g>
                                                    </svg>
                                                    <span class="text-muted">08</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-1">
                                                    <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.125 17.584" class="r--icon-reply">
                                                        <defs>
                                                            <clipPath>
                                                                <rect width="14.094" height="3.924" class="cls-1">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                        <g transform="translate(-784.909 -833.715)">
                                                            <path d="M4.01,12.938H2a2,2,0,0,1-2-2V2A2,2,0,0,1,2,0H18.125a2,2,0,0,1,2,2v8.937a2,2,0,0,1-2,2H8.78l-.667.923L6.4,16.232Z" transform="translate(785.409 834.215)" class="cls-2">
                                                            </path>
                                                            <g transform="translate(788.554 839.127)" class="cls-3">
                                                                <g transform="translate(-739 -839)">
                                                                    <g transform="translate(739 839)" class="cls-4">
                                                                        <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                        </circle>
                                                                        <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                        </circle>
                                                                    </g>
                                                                </g>
                                                                <g transform="translate(-734 -839)">
                                                                    <g transform="translate(739 839)" class="cls-4">
                                                                        <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                        </circle>
                                                                        <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                        </circle>
                                                                    </g>
                                                                </g>
                                                                <g transform="translate(-729 -839)">
                                                                    <g transform="translate(739 839)" class="cls-4">
                                                                        <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                        </circle>
                                                                        <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                        </circle>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <span class="text-muted">02</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="rounded-pill d-inline-block align-items-center p-1 bg-light">
                                                <div class="d-flex align-items-center">
                                                    <p class="mb-0 rounded-pill  bg-danger text-white d-inline-block text-center d-flex justify-content-center align-items-center" style="width: 25px; height: 25px;">D</p>
                                                    <span class="fw-bold mx-2">Dranking</span>
                                                </div>
                                            </div>
                                            <div class="kalles-rating-result my-2">
                                                <span class="kalles-rating-result__pipe ,b-1">
                                                    <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                                    <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                                    <span class="kalles-rating-result__start kalles-rating-result__start--big"></span>
                                                    <span class="kalles-rating-result__start kalles-rating-result__start--big active"></span>
                                                    <span class="text-muted kalles-rating-result__start kalles-rating-result__start--big"></span>
                                                </span>
                                            </div>
                                            <h6>Contrary to popular belief</h6>
                                            <p class="text-muted mb-2">It is a long established fact that a reader will
                                                be
                                                distracted
                                                by the readable content of a page</p>
                                            <p class="text-muted mb-2 opacity-75 fs-14">15 days ago
                                            </p>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="d-flex align-items-center gap-1">
                                                    <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.762 17.939" class="text-muted">
                                                        <g transform="translate(-926.048 -414.43)">
                                                            <path d="M0,14.842V6.033l.266.709S3.779,4.692,3.9,1.674s2.5-1.661,2.624.45-.095,2.192.517,3.909c1.392-.021,2.211-.013,2.59-.006H9.71q.06,0,.119,0l.056,0v0A1.532,1.532,0,0,1,10.923,8.5a1.533,1.533,0,0,1,.45,2.515,1.533,1.533,0,0,1-.387,2.485,1.859,1.859,0,0,1,.257.966c0,.847-.515,1.584-1.15,1.584L9.237,16c-.7.042-2.286.125-2.717.131H6.448A31.646,31.646,0,0,1,0,14.842Z" transform="translate(929.463 415.021)" class="cls-1">
                                                            </path>
                                                            <path d="M945.558,421.769v11.039l-2.9-.279V422.22Z" transform="translate(-16.112 -0.939)" class="cls-2">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                    <span class="text-muted">12</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-1">
                                                    <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.762 17.659" class="r--icon-dislike">
                                                        <g transform="translate(956.922 435.325) rotate(180)">
                                                            <path d="M0,14.842V6.033l.266.709S3.779,4.692,3.9,1.674s2.5-1.661,2.624.45-.095,2.192.517,3.909c1.392-.021,2.211-.013,2.59-.006H9.71q.06,0,.119,0l.056,0v0A1.532,1.532,0,0,1,10.923,8.5a1.533,1.533,0,0,1,.45,2.515,1.533,1.533,0,0,1-.387,2.485,1.859,1.859,0,0,1,.257.966c0,.847-.515,1.584-1.15,1.584L9.237,16c-.7.042-2.286.125-2.717.131H6.448A31.646,31.646,0,0,1,0,14.842Z" transform="translate(944.575 418.257)" class="cls-1">
                                                            </path>
                                                            <path d="M945.558,421.946v10.321l-2.9.261V421.777Z" transform="translate(-1 2.296)" class="cls-2"></path>
                                                        </g>
                                                    </svg>
                                                    <span class="text-muted">08</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-1">
                                                    <svg fill="#878787" width="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.125 17.584" class="r--icon-reply">
                                                        <defs>
                                                            <clipPath>
                                                                <rect width="14.094" height="3.924" class="cls-1">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                        <g transform="translate(-784.909 -833.715)">
                                                            <path d="M4.01,12.938H2a2,2,0,0,1-2-2V2A2,2,0,0,1,2,0H18.125a2,2,0,0,1,2,2v8.937a2,2,0,0,1-2,2H8.78l-.667.923L6.4,16.232Z" transform="translate(785.409 834.215)" class="cls-2">
                                                            </path>
                                                            <g transform="translate(788.554 839.127)" class="cls-3">
                                                                <g transform="translate(-739 -839)">
                                                                    <g transform="translate(739 839)" class="cls-4">
                                                                        <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                        </circle>
                                                                        <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                        </circle>
                                                                    </g>
                                                                </g>
                                                                <g transform="translate(-734 -839)">
                                                                    <g transform="translate(739 839)" class="cls-4">
                                                                        <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                        </circle>
                                                                        <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                        </circle>
                                                                    </g>
                                                                </g>
                                                                <g transform="translate(-729 -839)">
                                                                    <g transform="translate(739 839)" class="cls-4">
                                                                        <circle cx="1.75" cy="1.75" r="1.75" class="cls-5">
                                                                        </circle>
                                                                        <circle cx="1.75" cy="1.75" r="1.25" class="cls-1">
                                                                        </circle>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <span class="text-muted">02</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                <a href="#" class="btn  text-center fw-semibold bg-light">Load
                                    more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="pt-5 py-lg-5 mb-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="text-center mb-lg-4">
                            <h3 class="pb-lg-2">You may also like</h3>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                @include('partials.product-like-card')
            </div>

            <div class="container">
                <div class="row justify-content-center mt-3 mt-lg-5 pt-2">
                    <div class="col-lg-7">
                        <div class="text-center mb-lg-4 pb-lg-2">
                            <h3>Recently viewed products</h3>
                        </div>
                    </div><!--end col-->
                </div>
                @include('partials.product-recently-card')
            </div><!--end container-->
    </section>
    @include('partials.footer')

    @include('partials.popup')
    
</div>
<!-- Bottom product -->
<div class="position-fixed bottom-0 bg-body start-0 end-0 z-1 productCart d-none" style="box-shadow: 0 0 9px rgba(0, 0, 0, 0.12);">
    <div class="container">
        <div class="row justify-content-between align-items-center py-2">
            <div class="col-auto">
                <div class="d-flex align-items-center">
                    <div>
                        <img alt="" src="{{ URL::asset('/build/images/single-product/pre-orders/thumb-sticky.jpg')}}" style="max-height: 75px; max-width: 65px; Width: auto; height: auto; vertical-align: middle;">
                    </div>
                    <div class="ms-2">
                        <h6 class="mb-1">Ribbed Stripe Top</h6>
                        <a href="#" class="text-teal text-decoration-underline fs-12 fw-semibold">Grey / S</a>
                    </div>
                </div>
            </div>
            <div class="col-auto mt-2 mt-md-0">
                <div class="d-flex align-items-center gap-2">
                    <p class="text-danger fs-18 mb-0 d-none d-md-flex">$15.00</p>
                    <div class="input-step border">
                        <button type="button" class="minus material-shadow text-dark fw-bold">–</button>
                        <input type="number" class="product-quantity fw-bold fs-6" value="1" min="0" max="100">
                        <button type="button" class="plus material-shadow text-dark fw-bold">+</button>
                    </div>
                    <button data-bs-toggle="offcanvas" data-bs-target="#shoppingCartOffcanvas" aria-controls="shoppingCartOffcanvas" class="btn btn-teal text-uppercase rounded-0 min-w-150">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection