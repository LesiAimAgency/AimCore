<!doctype html>
<html lang="en" x-data :dir="$store.appStore.dir" x-cloak>

<head>
    <meta charset="utf-8" />
    <title>Home Medical | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="" name="description" />
    <meta content="srbthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/build/images/home-medical/favicon-medical.png') }}">

    @yield('css')
    @include('partials.head-css')
</head>
</head>

<body class="wrapper_cus font-open-sans">
    @include('partials.header-medical')

    <div>
        <!-- main slide -->
        <section class="kalles-home-section type_slideshow type_carousel kalles-medical overflow-hidden">
            <div class="slideshow"
                data-flickity='{ "fade":0,"cellAlign": "center","imagesLoaded": 0,"lazyLoad": 0,"freeScroll": 0,"wrapAround": true,"autoPlay" : 0,"pauseAutoPlayOnHover" : true, "rightToLeft": false, "prevNextButtons": false,"pageDots": true, "contain" : 1,"adaptiveHeight" : 1,"dragThreshold" : 5,"percentPosition": 1 }'>
                <!-- first slide -->
                <div class="slideshow__slide">
                    <img src="{{ URL::asset('/build/images/home-medical/slide-01.jpg') }}" alt=""
                        class="position-absolute w-100 h-100 object-fit-cover">
                    <div class="container position-relative">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="content">
                                    <h5 class="text-danger-emphasis fw-medium fs-22">3M 6000 Series</h5>
                                    <h1 class="fs-45 fw-semibold mb-3 ">Search Lab <br> N95 Face Mask</h1>
                                    <p class="d-none d-lg-block">respiratory protection against certain non oil based
                                        particles. </p>
                                    <a href="{{ url('shop_pages/shop') }}">
                                        <div
                                            class="btn btn-primary text-white rounded-0 min-w-150 min-h-45 d-inline-flex align-items-center justify-content-center fw-semibold">
                                            Explore Now</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end first slide -->

                <!-- second slide -->
                <div class="slideshow__slide">
                    <img src="{{ URL::asset('/build/images/home-medical/slide-02.png') }}" alt=""
                        class="position-absolute w-100 h-100 object-fit-cover">
                    <div class="container position-relative">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="content">
                                    <h5 class="text-danger-emphasis fw-medium fs-22">Price just <strong>$14</strong>
                                    </h5>
                                    <h1 class="fs-45 fw-semibold mb-3">Botanical Hand <br> Sanitizer Gel</h1>
                                    <p class="fs-16 text-muted d-none d-lg-block ">Soft and non-irritating, does not
                                        hurt the skin, has a
                                        water retention and hydration function</p>
                                    <a href="{{ url('shop_pages/shop') }}">
                                        <div
                                            class="btn btn-primary text-white rounded-pill min-w-150 min-h-45 d-inline-flex align-items-center justify-content-center fw-semibold">
                                            Buy Now</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end second slide -->

                <!-- third slide -->
                <div class="slideshow__slide">
                    <img src="{{ URL::asset('/build/images/home-medical/slide-03.png') }}" alt=""
                        class="position-absolute w-100 h-100 object-fit-cover">
                    <div class="container position-relative">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="content">
                                    <h5 class="text-danger-emphasis fw-medium fs-22">Only <strong>$1000</strong></h5>
                                    <p class="fs-22 mb-2">Fast Reading Digital</p>
                                    <h1 class="fs-45 fw-semibold mb-3">for Ear & Forehead</h1>
                                    <p class="fs-16 text-muted d-none d-lg-block">In 3 seconds, you'll get the exact
                                        number of your body's
                                        temperature. Suitable for both baby & adult</p>
                                    <a href="{{ url('shop_pages/shop') }}">
                                        <div
                                            class="btn text-white btn-primary rounded-pill min-w-150 min-h-45 d-inline-flex align-items-center justify-content-center fw-semibold">
                                            $29 - Buy Now</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end third slide -->
            </div>
        </section>
        <!-- end main slide -->

        <!-- bannner section-->
        <section class="py-30">
            <div class="container">
                <div class="row g-lg-4 g-2">
                    <div class="col-xl-4 col-md-6">
                        <div class="kalles-medical-banner-01 position-relative img-zoom">
                            <img src="{{ URL::asset('/build/images/home-medical/banner-01.jpg') }}" alt=""
                                class="w-100 img-fluid">
                            <div class="content position-absolute">
                                <p class="text-uppercase">Personal</p>
                                <h3>Temperature Gun</h3>
                                <p class="mb-2">
                                    <span class="text-danger fw-medium fs-25">$35.00</span>
                                    <del>$45.00</del>
                                </p>
                                <a href="{{ url('shop_pages/shop') }}">
                                    <div class="d-inline-block text-white btn btn-primary rounded-pill">Shop
                                        Now</div>
                                </a>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-xl-4 col-md-6">
                        <div class="kalles-medical-banner-01 position-relative img-zoom">
                            <img src="{{ URL::asset('/build/images/home-medical/banner-02.jpg') }}" alt=""
                                class="w-100 img-fluid">
                            <div class="content position-absolute">
                                <p class="text-uppercase">Home Medical Supplies</p>
                                <h3>Steam Vaporizer</h3>
                                <p class="mb-2">
                                    <span class="text-danger fw-medium fs-25">$86.00</span>
                                </p>
                                <a href="{{ url('shop_pages/shop') }}">
                                    <div class="d-inline-block text-white btn btn-primary rounded-pill">Shop
                                        Now</div>
                                </a>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-xl-4 col-md-6">
                        <div class="kalles-medical-banner-01 position-relative img-zoom">
                            <img src="{{ URL::asset('/build/images/home-medical/banner-03.jpg') }}" alt=""
                                class="w-100 img-fluid">
                            <div class="content position-absolute">
                                <p class="text-uppercase">Hospital Equipment</p>
                                <h3>Stainless Steel Scissors</h3>
                                <p class="mb-2">
                                    <span class="text-danger fw-medium fs-25">$13.00</span>
                                    <del>$16.00</del>
                                </p>
                                <a href="{{ url('shop_pages/shop') }}">
                                    <div class="d-inline-block text-white btn btn-primary rounded-pill">Shop
                                        Now</div>
                                </a>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end conatiner-->
        </section>
        <!--end bannner section-->

        <!-- categories -->
        <section class="py-30 shop-categories">
            <div class="container">
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <h3 class="fs-26">Shop by categories</h3>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row mt-3 pb-5 blog-arrow g-2"
                    data-flickity='{"imagesLoaded": 0, "adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold": 5, "cellAlign": "left", "wrapAround": true, "swiper-pagination": false, "prevNextButtons": false, "percentPosition": 1, "pageDots": true, "autoPlay": 0, "pauseAutoPlayOnHover": true }'
                    dir="ltr">
                    <div class="col-lg-2 col-md-4 col-sm-6 px-2 text-center">
                        <div class="img-zoom">
                            <a href="{{ url('shop_pages.shop-left-sidebar') }}"
                                class="overflow-hidden d-inline-block">
                                <img src="{{ URL::asset('/build/images/home-medical/cat-01.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                            <div class="p-10 text-center">
                                <h5 class="fw-medium mb-2"><a href="{{ url('shop_pages.shop-left-sidebar') }}"
                                        class="text-reset">Hospital
                                        Equipment</a></h5>
                                <p class="mb-0">19 Products</p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-2 col-md-4 col-sm-6 px-2 text-center">
                        <div class="img-zoom">
                            <a href="{{ url('shop_pages.shop-left-sidebar') }}"
                                class="overflow-hidden d-inline-block">
                                <img src="{{ URL::asset('/build/images/home-medical/cat-02.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                            <div class="p-10 text-center">
                                <h5 class="fw-medium mb-2"><a href="{{ url('shop_pages.shop-left-sidebar') }}"
                                        class="text-reset">Blood
                                        Pressure</a></h5>
                                <p class="mb-0">5 Products</p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-2 col-md-4 col-sm-6 px-2 text-center">
                        <div class="img-zoom">
                            <a href="{{ url('shop_pages.shop-left-sidebar') }}"
                                class="overflow-hidden d-inline-block">
                                <img src="{{ URL::asset('/build/images/home-medical/cat-03.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                            <div class="p-10 text-center">
                                <h5 class="fw-medium mb-2"><a href="{{ url('shop_pages.shop-left-sidebar') }}"
                                        class="text-reset">Medical
                                        Accessories</a></h5>
                                <p class="mb-0">5 Products</p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-2 col-md-4 col-sm-6 px-2 text-center">
                        <div class="img-zoom">
                            <a href="{{ url('shop_pages.shop-left-sidebar') }}"
                                class="overflow-hidden d-inline-block">
                                <img src="{{ URL::asset('/build/images/home-medical/cat-04.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                            <div class="p-10 text-center">
                                <h5 class="fw-medium mb-2"><a href="{{ url('shop_pages.shop-left-sidebar') }}"
                                        class="text-reset">Personal</a></h5>
                                <p class="mb-0">8 Products</p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-2 col-md-4 col-sm-6 px-2 text-center">
                        <div class="img-zoom">
                            <a href="{{ url('shop_pages.shop-left-sidebar') }}"
                                class="overflow-hidden d-inline-block">
                                <img src="{{ URL::asset('/build/images/home-medical/cat-05.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                            <div class="p-10 text-center">
                                <h5 class="fw-medium mb-2"><a href="{{ url('shop_pages.shop-left-sidebar') }}"
                                        class="text-reset">Independent Living</a></h5>
                                <p class="mb-0">8 Products</p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-2 col-md-4 col-sm-6 px-2 text-center">
                        <div class="img-zoom">
                            <a href="{{ url('shop_pages.shop-left-sidebar') }}"
                                class="overflow-hidden d-inline-block">
                                <img src="{{ URL::asset('/build/images/home-medical/cat-06.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                            <div class="p-10 text-center">
                                <h5 class="fw-medium mb-2"><a href="{{ url('shop_pages.shop-left-sidebar') }}"
                                        class="text-reset">Pharmacy</a></h5>
                                <p class="mb-0">8 Products</p>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section>
        <!-- end categories -->

        <!--deal-section-->
        <section>
            <div class="container">
                <div class="my-5 pb-md-5">
                    <div class="kalles-medical-deal-section">
                        <h4 class="product-cd-header text-center fs-25 d-inline-flex bg-body align-items-center mb-0">
                            Product Deals Of
                            The Day</h4>
                        <div class="swiper medialSwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div>
                                        <h6 class="fs-16 fw-medium mb-1">
                                            <a class="main_link_primary"
                                                href="{{ url('product/product-detail-layout-01') }}">Portable Personal
                                                Compressor</a>
                                        </h6>
                                        <p class="mb-3 pb-1 fs-15 text-muted">
                                            <del>$76.00</del>
                                            <span class="text-danger">$55.00</span>
                                        </p>
                                        <div x-data="{ imageUrl: '/build/images/home-medical/pr-20.jpg' }" class="topbar-product-card desgin_1">
                                            <div class="position-relative overflow-hidden">
                                                <span
                                                    class="onsale bg-danger text-white text-center position-absolute d-inline-block"><span>-28%</span></span>
                                                <img :src="imageUrl" alt="" class="img-fluid">
                                                <div class="bg-overlay"></div>
                                                <a href="#" class="text-white wishlistadd position-absolute"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Add to Wishlist"><i
                                                        class="facl facl-heart-o"></i></a>
                                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                                    <a href="#exampleModal" data-bs-toggle="modal"
                                                        class="btn rounded-pill fs-14 text-white"><span>Quick
                                                            View</span> <i class="iccl iccl-eye"></i></a>
                                                    <button type="button" class="btn rounded-pill fs-14"
                                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                        <i class="iccl iccl-cart"></i></button>
                                                </div>
                                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-primary rounded-pill m-2"
                                                    style="z-index: 1;">
                                                    <a href="#exampleModal" data-bs-toggle="modal"
                                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                                        style="width:36px; height: 36px;"><i
                                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                                    <button type="button"
                                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="loop-product-stock mt-3">
                                            <div class="progress" role="progressbar" aria-label="Basic example"
                                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar rounded-pill" style="width: 85%"></div>
                                            </div>
                                            <div class="d-flex mt-2 fs-15">
                                                <p class="mb-0 flex-grow-1">Sold: 15</p>
                                                <p class="mb-0 flex-shrink-0">Available: 0</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div>
                                        <h6 class="fs-16 fw-medium mb-1">
                                            <a class="main_link_primary"
                                                href="{{ url('product/product-detail-layout-01') }}">Disposable
                                                Hand
                                                Wash Gel</a>
                                        </h6>
                                        <p class="mb-3 pb-1 fs-15 text-muted">
                                            <del>$27.00</del>
                                            <span class="text-danger">$20.00</span>
                                        </p>
                                        <div x-data="{ imageUrl: '/build/images/home-medical/pr-11.jpg', isHovered: false }" class="topbar-product-card desgin_1"
                                            x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                            <div class="position-relative overflow-hidden">
                                                <span
                                                    class="onsale bg-danger text-white text-center position-absolute d-inline-block"><span>-26%</span></span>
                                                <img :src="isHovered ? '/build/images/home-medical/pr-11.jpg' : imageUrl"
                                                    alt="" class="img-fluid">
                                                <div class="bg-overlay"></div>
                                                <a href="#" class="text-white wishlistadd position-absolute"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Add to Wishlist"><i
                                                        class="facl facl-heart-o"></i></a>
                                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                                    <a href="#exampleModal" data-bs-toggle="modal"
                                                        class="btn rounded-pill fs-14 text-white"><span>Quick
                                                            View</span> <i class="iccl iccl-eye"></i></a>
                                                    <button type="button" class="btn rounded-pill fs-14"
                                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                        <i class="iccl iccl-cart"></i></button>
                                                </div>
                                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-primary rounded-pill m-2"
                                                    style="z-index: 1;">
                                                    <a href="#exampleModal" data-bs-toggle="modal"
                                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                                        style="width:36px; height: 36px;"><i
                                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                                    <button type="button"
                                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="loop-product-stock mt-3">
                                            <div class="progress" role="progressbar" aria-label="Basic example"
                                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar rounded-pill" style="width: 85%"></div>
                                            </div>
                                            <div class="d-flex mt-2 fs-15">
                                                <p class="mb-0 flex-grow-1">Sold: 5</p>
                                                <p class="mb-0 flex-shrink-0">Available: 1</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div>
                                        <h6 class="fs-16 fw-medium mb-1">
                                            <a class="main_link_primary"
                                                href="{{ url('product/product-detail-layout-01') }}">Surgical Latex
                                                Gloves</a>
                                        </h6>
                                        <p class="mb-3 pb-1 fs-15 text-muted">
                                            <del>$16.00</del>
                                            <span class="text-danger">$10.00</span>
                                        </p>
                                        <div x-data="{ imageUrl: '/build/images/home-medical/pr-12.jpg', isHovered: false }" class="topbar-product-card desgin_1"
                                            x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                            <div class="position-relative overflow-hidden">
                                                <span
                                                    class="onsale bg-danger text-white text-center position-absolute d-inline-block"><span>-38%</span></span>
                                                <img :src="isHovered ? '/build/images/home-medical/pr-13.jpg' : imageUrl"
                                                    alt="" class="img-fluid">
                                                <div class="bg-overlay"></div>
                                                <a href="#" class="text-white wishlistadd position-absolute"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Add to Wishlist"><i
                                                        class="facl facl-heart-o"></i></a>
                                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                                    <a href="#exampleModal" data-bs-toggle="modal"
                                                        class="btn rounded-pill fs-14 text-white"><span>Quick
                                                            View</span> <i class="iccl iccl-eye"></i></a>
                                                    <button type="button" class="btn rounded-pill fs-14"
                                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                        <i class="iccl iccl-cart"></i></button>
                                                </div>
                                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-primary rounded-pill m-2"
                                                    style="z-index: 1;">
                                                    <a href="#exampleModal" data-bs-toggle="modal"
                                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                                        style="width:36px; height: 36px;"><i
                                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                                    <button type="button"
                                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="loop-product-stock mt-3">
                                            <div class="progress" role="progressbar" aria-label="Basic example"
                                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar rounded-pill" style="width: 70%"></div>
                                            </div>
                                            <div class="d-flex mt-2 fs-15">
                                                <p class="mb-0 flex-grow-1">Sold: 21</p>
                                                <p class="mb-0 flex-shrink-0">Available: 9</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div>
                                        <h6 class="fs-16 fw-medium mb-1">
                                            <a class="main_link_primary"
                                                href="{{ url('product/product-detail-layout-01') }}">Manual Oxygen
                                                Device</a>
                                        </h6>
                                        <p class="mb-3 pb-1 fs-15 text-muted">
                                            <del>$15.00</del>
                                            <span class="text-danger">$12.00</span>
                                        </p>
                                        <div x-data="{ imageUrl: '/build/images/home-medical/pr-14.jpg', isHovered: false }" class="topbar-product-card desgin_1"
                                            x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                            <div class="position-relative overflow-hidden">
                                                <span
                                                    class="onsale bg-danger text-white text-center position-absolute d-inline-block"><span>-20%</span></span>
                                                <img :src="isHovered ? '/build/images/home-medical/pr-15.jpg' : imageUrl"
                                                    alt="" class="img-fluid">
                                                <div class="bg-overlay"></div>
                                                <a href="#" class="text-white wishlistadd position-absolute"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Add to Wishlist"><i
                                                        class="facl facl-heart-o"></i></a>
                                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                                    <a href="#exampleModal" data-bs-toggle="modal"
                                                        class="btn rounded-pill fs-14 text-white"><span>Quick
                                                            View</span> <i class="iccl iccl-eye"></i></a>
                                                    <button type="button" class="btn rounded-pill fs-14"
                                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                        <i class="iccl iccl-cart"></i></button>
                                                </div>
                                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-primary rounded-pill m-2"
                                                    style="z-index: 1;">
                                                    <a href="#exampleModal" data-bs-toggle="modal"
                                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                                        style="width:36px; height: 36px;"><i
                                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                                    <button type="button"
                                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="loop-product-stock mt-3">
                                            <div class="progress" role="progressbar" aria-label="Basic example"
                                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar rounded-pill" style="width: 100%"></div>
                                            </div>
                                            <div class="d-flex mt-2 fs-15">
                                                <p class="mb-0 flex-grow-1">Sold: 10</p>
                                                <p class="mb-0 flex-shrink-0">Available: 0</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div>
                                        <h6 class="fs-16 fw-medium mb-1">
                                            <a class="main_link_primary"
                                                href="{{ url('product/product-detail-layout-01') }}">12-Ply Gauze
                                                Sponges</a>
                                        </h6>
                                        <p class="mb-3 pb-1 fs-15 text-muted">
                                            <del>$10.00</del>
                                            <span class="text-danger">$7.00</span>
                                        </p>
                                        <div x-data="{ imageUrl: '/build/images/home-medical/pr-16.jpg', isHovered: false }" class="topbar-product-card desgin_1"
                                            x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                            <div class="position-relative overflow-hidden">
                                                <span
                                                    class="out-of-stock text-white text-center position-absolute d-inline-block">Sold
                                                    out</span>
                                                <span
                                                    class="onsale bg-danger text-white text-center position-absolute d-inline-block"><span>-30%</span></span>
                                                <img :src="isHovered ? '/build/images/home-medical/pr-17.jpg' : imageUrl"
                                                    alt="" class="img-fluid">
                                                <div class="bg-overlay"></div>
                                                <a href="#" class="text-white wishlistadd position-absolute"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Add to Wishlist"><i
                                                        class="facl facl-heart-o"></i></a>
                                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                                    <a href="#exampleModal" data-bs-toggle="modal"
                                                        class="btn rounded-pill fs-14 text-white"><span>Quick
                                                            View</span> <i class="iccl iccl-eye"></i></a>
                                                    <button type="button" class="btn rounded-pill fs-14"
                                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                        <i class="iccl iccl-cart"></i></button>
                                                </div>
                                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-primary rounded-pill m-2"
                                                    style="z-index: 1;">
                                                    <a href="#exampleModal" data-bs-toggle="modal"
                                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                                        style="width:36px; height: 36px;"><i
                                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                                    <button type="button"
                                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="loop-product-stock mt-3">
                                            <div class="progress" role="progressbar" aria-label="Basic example"
                                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar rounded-pill" style="width: 95%"></div>
                                            </div>
                                            <div class="d-flex mt-2 fs-15">
                                                <p class="mb-0 flex-grow-1">Sold: 14</p>
                                                <p class="mb-0 flex-shrink-0">Available: 1</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div>
                                        <h6 class="fs-16 fw-medium mb-1">
                                            <a class="main_link_primary"
                                                href="{{ url('product/product-detail-layout-01') }}">Cara Portable
                                                Air
                                                Compressor</a>
                                        </h6>
                                        <p class="mb-3 pb-1 fs-15 text-muted">
                                            <del>$145.00</del>
                                            <span class="text-danger">$120.00</span>
                                        </p>
                                        <div x-data="{ imageUrl: '/build/images/home-medical/pr-18.jpg', isHovered: false }" class="topbar-product-card desgin_1"
                                            x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                            <div class="position-relative overflow-hidden">
                                                <span
                                                    class="onsale bg-danger text-white text-center position-absolute d-inline-block"><span>-18%</span></span>
                                                <img :src="isHovered ? '/build/images/home-medical/pr-19.jpg' : imageUrl"
                                                    alt="" class="img-fluid">
                                                <div class="bg-overlay"></div>
                                                <a href="#" class="text-white wishlistadd position-absolute"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Add to Wishlist"><i
                                                        class="facl facl-heart-o"></i></a>
                                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                                    <a href="#exampleModal" data-bs-toggle="modal"
                                                        class="btn rounded-pill fs-14 text-white"><span>Quick
                                                            View</span> <i class="iccl iccl-eye"></i></a>
                                                    <button type="button" class="btn rounded-pill fs-14"
                                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                        <i class="iccl iccl-cart"></i></button>
                                                </div>
                                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-primary rounded-pill m-2"
                                                    style="z-index: 1;">
                                                    <a href="#exampleModal" data-bs-toggle="modal"
                                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                                        style="width:36px; height: 36px;"><i
                                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                                    <button type="button"
                                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="loop-product-stock mt-3">
                                            <div class="progress" role="progressbar" aria-label="Basic example"
                                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar rounded-pill" style="width: 100%"></div>
                                            </div>
                                            <div class="d-flex mt-2 fs-15">
                                                <p class="mb-0 flex-grow-1">Sold: 7</p>
                                                <p class="mb-0 flex-shrink-0">Available: 0</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-30">
                    <div class="col-lg-8">
                        <a href="{{ url('shop_pages/shop') }}"
                            class="kalles-medical-banner-01 position-relative img-zoom d-inline-block">
                            <img src="{{ URL::asset('/build/images/home-medical/deal-banner-01.png') }}"
                                alt="" class="w-100 img-fluid">
                            <div class="content position-absolute text-body">
                                <h3>Independent Living</h3>
                                <p class="mb-2 text-muted">Classic Personal Vaporizer</p>
                                <p class="mb-0">
                                    <span class="text-danger fw-medium fs-25">$35.00</span>
                                    <del class="text-muted">$45.00</del>
                                </p>
                            </div>
                        </a>
                    </div><!--end col-->
                    <div class="col-lg-4">
                        <a href="{{ url('shop_pages/shop') }}"
                            class="kalles-medical-banner-01 position-relative img-zoom d-inline-block w-100">
                            <img src="{{ URL::asset('/build/images/home-medical/deal-banner-02.png') }}"
                                alt="" class="w-100 img-fluid">
                            <div class="content position-absolute text-body">
                                <p class="text-uppercase">Personal</p>
                                <h3>Temperature Gun</h3>
                                <p class="mb-2">
                                    <span class="text-danger fw-medium fs-25">$35.00</span>
                                    <del class="text-muted">$45.00</del>
                                </p>

                                <div class="d-inline-block text-white btn btn-primary rounded-pill">Shop
                                    Now</div>
                            </div>
                        </a>

                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section>
        <!--end deal-section-->

        <!-- Best selling items -->
        <section class="py-30 mb-24">
            <div class="container">
                <div class="row mt-3 align-items-center">
                    <div class="col-md-6">
                        <h3 class="fs-26 mb-0 text-center text-md-start">Best selling items</h3>
                    </div><!--end col-->
                    <div class="col-md-6 text-center text-md-end">
                        <a href="#!" class="main_link_primary text-decoration-underline">See all products</a>
                    </div>
                </div><!--end row-->
                <div class="row row-cols-lg-5 row-cols-md-3 row-cols-2 mt-4">
                    <div class="col">
                        <div>
                            <div x-data="{ imageUrl: '/build/images/home-medical/pr-21.jpg', isHovered: false }" class="topbar-product-card desgin_1"
                                x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <span
                                        class="onsale bg-danger text-white text-center position-absolute d-inline-block"><span>-12%</span></span>
                                    <img :src="isHovered ? '/build/images/home-medical/pr-22.jpg' : imageUrl"
                                        alt="" class="img-fluid">
                                    <div class="bg-overlay"></div>
                                    <a href="#" class="text-white wishlistadd position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn rounded-pill fs-14 text-white"><span>Quick View</span> <i
                                                class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                                Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-primary rounded-pill m-2"
                                        style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;"><i
                                                class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>
                                </div>
                            </div>
                            <h6 class="fs-16 fw-medium mb-1 mt-3">
                                <a class="main_link_primary"
                                    href="{{ url('product/product-detail-layout-01') }}">Search Lab N95 Face
                                    Mask</a>
                            </h6>
                            <p class="mb-3 pb-1 fs-15 text-muted">
                                <del>$25.00</del>
                                <span class="text-danger">$22.00</span>
                            </p>
                        </div>
                    </div><!--end col-->
                    <div class="col">
                        <div>
                            <div x-data="{ imageUrl: '/build/images/home-medical/pr-23.jpg', isHovered: false }" class="topbar-product-card desgin_1"
                                x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <span
                                        class="onsale bg-danger text-white text-center position-absolute d-inline-block"><span>-46%</span></span>
                                    <img :src="isHovered ? '/build/images/home-medical/pr-24.jpg' : imageUrl"
                                        alt="" class="img-fluid">
                                    <div class="bg-overlay"></div>
                                    <a href="#" class="text-white wishlistadd position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn rounded-pill fs-14 text-white"><span>Quick View</span> <i
                                                class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                                Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-primary rounded-pill m-2"
                                        style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;"><i
                                                class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>
                                </div>
                            </div>
                            <h6 class="fs-16 fw-medium mb-1 mt-3">
                                <a class="main_link_primary"
                                    href="{{ url('product/product-detail-layout-01') }}">Anti-septic Dry Hand
                                    Gel</a>
                            </h6>
                            <p class="mb-3 pb-1 fs-15 text-muted">
                                <del>$35.00</del>
                                <span class="text-danger">$19.00</span>
                            </p>
                        </div>
                    </div><!--end col-->
                    <div class="col">
                        <div>
                            <div x-data="{ imageUrl: '/build/images/home-medical/pr-25.jpg', isHovered: false }" class="topbar-product-card desgin_1"
                                x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <span
                                        class="onsale bg-danger text-white text-center position-absolute d-inline-block"><span>-19%</span></span>
                                    <img :src="isHovered ? '/build/images/home-medical/pr-26.jpg' : imageUrl"
                                        alt="" class="img-fluid">
                                    <div class="bg-overlay"></div>
                                    <a href="#" class="text-white wishlistadd position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn rounded-pill fs-14 text-white"><span>Quick View</span> <i
                                                class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                                Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-primary rounded-pill m-2"
                                        style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;"><i
                                                class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>
                                </div>
                            </div>
                            <h6 class="fs-16 fw-medium mb-1 mt-3">
                                <a class="main_link_primary"
                                    href="{{ url('product/product-detail-layout-01') }}">Digital
                                    Thermometer</a>
                            </h6>
                            <p class="mb-3 pb-1 fs-15 text-muted">
                                <del>$55.00</del>
                                <span class="text-danger">$45.00</span>
                            </p>
                        </div>
                    </div><!--end col-->
                    <div class="col">
                        <div>
                            <div x-data="{ imageUrl: '/build/images/home-medical/pr-27.jpg', isHovered: false }" class="topbar-product-card desgin_1"
                                x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/home-medical/pr-28.jpg' : imageUrl"
                                        alt="" class="img-fluid">
                                    <div class="bg-overlay"></div>
                                    <a href="#" class="text-white wishlistadd position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn rounded-pill fs-14 text-white"><span>Quick View</span> <i
                                                class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                                Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-primary rounded-pill m-2"
                                        style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;"><i
                                                class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>
                                </div>
                            </div>
                            <h6 class="fs-16 fw-medium mb-1 mt-3">
                                <a class="main_link_primary"
                                    href="{{ url('product/product-detail-layout-01') }}">Anti-virus Carbon
                                    Mask</a>
                            </h6>
                            <p class="mb-3 pb-1 fs-15 text-muted">
                                <span>$35.00</span>
                            </p>
                        </div>
                    </div><!--end col-->
                    <div class="col">
                        <div>
                            <div x-data="{ imageUrl: '/build/images/home-medical/pr-29.jpg', isHovered: false }" class="topbar-product-card desgin_1"
                                x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <span
                                        class="onsale bg-danger text-white text-center position-absolute d-inline-block"><span>-23%</span></span>
                                    <img :src="isHovered ? '/build/images/home-medical/pr-30.jpg' : imageUrl"
                                        alt="" class="img-fluid">
                                    <div class="bg-overlay"></div>
                                    <a href="#" class="text-white wishlistadd position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn rounded-pill fs-14 text-white"><span>Quick View</span> <i
                                                class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                                Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-primary rounded-pill m-2"
                                        style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;"><i
                                                class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>
                                </div>
                            </div>
                            <h6 class="fs-16 fw-medium mb-1 mt-3">
                                <a class="main_link_primary"
                                    href="{{ url('product/product-detail-layout-01') }}">Temperature Gun</a>
                            </h6>
                            <p class="mb-3 pb-1 fs-15 text-muted">
                                <del>$45.00</del>
                                <span class="text-danger">$35.00</span>
                            </p>
                        </div>
                    </div><!--end col-->
                    <div class="col">
                        <div>
                            <div x-data="{ imageUrl: '/build/images/home-medical/pr-12.jpg', isHovered: false }" class="topbar-product-card desgin_1"
                                x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <span
                                        class="onsale bg-danger text-white text-center position-absolute d-inline-block"><span>-38%</span></span>
                                    <img :src="isHovered ? '/build/images/home-medical/pr-13.jpg' : imageUrl"
                                        alt="" class="img-fluid">
                                    <div class="bg-overlay"></div>
                                    <a href="#" class="text-white wishlistadd position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn rounded-pill fs-14 text-white"><span>Quick View</span> <i
                                                class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                                Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-primary rounded-pill m-2"
                                        style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;"><i
                                                class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>
                                </div>
                            </div>
                            <h6 class="fs-16 fw-medium mb-1 mt-3">
                                <a class="main_link_primary"
                                    href="{{ url('product/product-detail-layout-01') }}">Surgical Latex
                                    Gloves</a>
                            </h6>
                            <p class="mb-3 pb-1 fs-15 text-muted">
                                <del>$16.00</del>
                                <span class="text-danger">$10.00</span>
                            </p>
                        </div>
                    </div><!--end col-->
                    <div class="col">
                        <div>
                            <div x-data="{ imageUrl: '/build/images/home-medical/pr-01.jpg', isHovered: false }" class="topbar-product-card desgin_1"
                                x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <span
                                        class="onsale bg-danger text-white text-center position-absolute d-inline-block"><span>-17%</span></span>
                                    <img :src="isHovered ? '/build/images/home-medical/pr-02.jpg' : imageUrl"
                                        alt="" class="img-fluid">
                                    <div class="bg-overlay"></div>
                                    <a href="#" class="text-white wishlistadd position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn rounded-pill fs-14 text-white"><span>Quick View</span> <i
                                                class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                                Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-primary rounded-pill m-2"
                                        style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;"><i
                                                class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>
                                </div>
                            </div>
                            <h6 class="fs-16 fw-medium mb-1 mt-3">
                                <a class="main_link_primary"
                                    href="{{ url('product/product-detail-layout-01') }}">Surgical Face Mask</a>
                            </h6>
                            <p class="mb-3 pb-1 fs-15 text-muted">
                                <del>$12.00</del>
                                <span class="text-danger">$10.00</span>
                            </p>
                        </div>
                    </div><!--end col-->
                    <div class="col">
                        <div>
                            <div x-data="{ imageUrl: '/build/images/home-medical/pr-31.jpg', isHovered: false }" class="topbar-product-card desgin_1"
                                x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/home-medical/pr-31.jpg' : imageUrl"
                                        alt="" class="img-fluid">
                                    <div class="bg-overlay"></div>
                                    <a href="#" class="text-white wishlistadd position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn rounded-pill fs-14 text-white"><span>Quick View</span> <i
                                                class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                                Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-primary rounded-pill m-2"
                                        style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;"><i
                                                class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>
                                </div>
                            </div>
                            <h6 class="fs-16 fw-medium mb-1 mt-3">
                                <a class="main_link_primary"
                                    href="{{ url('product/product-detail-layout-01') }}">Blood Pressure
                                    Monitor</a>
                            </h6>
                            <p class="mb-3 pb-1 fs-15 text-muted">
                                <span>$121.00</span>
                            </p>
                        </div>
                    </div><!--end col-->
                    <div class="col">
                        <div>
                            <div x-data="{ imageUrl: '/build/images/home-medical/pr-32.jpg', isHovered: false }" class="topbar-product-card desgin_1"
                                x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <span
                                        class="onsale bg-danger text-white text-center position-absolute d-inline-block"><span>-40%</span></span>
                                    <img :src="isHovered ? '/build/images/home-medical/pr-33.jpg' : imageUrl"
                                        alt="" class="img-fluid">
                                    <div class="bg-overlay"></div>
                                    <a href="#" class="text-white wishlistadd position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn rounded-pill fs-14 text-white"><span>Quick View</span> <i
                                                class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                                Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-primary rounded-pill m-2"
                                        style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;"><i
                                                class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>
                                </div>
                            </div>
                            <h6 class="fs-16 fw-medium mb-1 mt-3">
                                <a class="main_link_primary"
                                    href="{{ url('product/product-detail-layout-01') }}">Stainless Steel Kidney
                                    Tray</a>
                            </h6>
                            <p class="mb-3 pb-1 fs-15 text-muted">
                                <del>$30.00</del>
                                <span class="text-danger">$18.00</span>
                            </p>
                        </div>
                    </div><!--end col-->
                    <div class="col">
                        <div>
                            <div x-data="{ imageUrl: '/build/images/home-medical/pr-34.jpg', isHovered: false }" class="topbar-product-card desgin_1"
                                x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/home-medical/pr-34.jpg' : imageUrl"
                                        alt="" class="img-fluid">
                                    <div class="bg-overlay"></div>
                                    <a href="#" class="text-white wishlistadd position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn rounded-pill fs-14 text-white"><span>Quick View</span> <i
                                                class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                                Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-primary rounded-pill m-2"
                                        style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;"><i
                                                class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>
                                </div>
                            </div>
                            <h6 class="fs-16 fw-medium mb-1 mt-3">
                                <a class="main_link_primary"
                                    href="{{ url('product/product-detail-layout-01') }}">Hand Sanitizer</a>
                            </h6>
                            <p class="mb-3 pb-1 fs-15 text-muted">
                                <span>$6.00</span>
                            </p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section>
        <!--end Best selling items-->

        <!--brand-list section-->
        <section class="kellas-medical-brand-list bg-light position-relative">
            <div class="container">
                <div class="row align-items-center mb-4">
                    <div class="col-md-6">
                        <h3 class="fs-26 mb-0 text-center text-md-start">Shop by brands</h3>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row align-items-center g-2">
                    <div class="col-lg-3 col-md-4 col-6 col-xl-2 brand-item">
                        <a href="#!" class="medical-logo">
                            <img src="{{ URL::asset('/build/images/home-medical/brand-logo-01.png') }}"
                                alt="" class="img-fluid mx-auto d-block">
                        </a>
                    </div><!--end col-->
                    <div class="col-lg-3 col-md-4 col-6 col-xl-2 brand-item">
                        <a href="#!" class="medical-logo">
                            <img src="{{ URL::asset('/build/images/home-medical/brand-logo-02.png') }}"
                                alt="" class="img-fluid mx-auto d-block">
                        </a>
                    </div><!--end col-->
                    <div class="col-lg-3 col-md-4 col-6 col-xl-2 brand-item">
                        <a href="#!" class="medical-logo">
                            <img src="{{ URL::asset('/build/images/home-medical/brand-logo-03.png') }}"
                                alt="" class="img-fluid mx-auto d-block">
                        </a>
                    </div><!--end col-->
                    <div class="col-lg-3 col-md-4 col-6 col-xl-2 brand-item">
                        <a href="#!" class="medical-logo">
                            <img src="{{ URL::asset('/build/images/home-medical/brand-logo-04.png') }}"
                                alt="" class="img-fluid mx-auto d-block">
                        </a>
                    </div><!--end col-->
                    <div class="col-lg-3 col-md-4 col-6 col-xl-2 brand-item">
                        <a href="#!" class="medical-logo">
                            <img src="{{ URL::asset('/build/images/home-medical/brand-logo-05.png') }}"
                                alt="" class="img-fluid mx-auto d-block">
                        </a>
                    </div><!--end col-->
                    <div class="col-lg-3 col-md-4 col-6 col-xl-2 brand-item">
                        <a href="#!" class="medical-logo">
                            <img src="{{ URL::asset('/build/images/home-medical/brand-logo-06.png') }}"
                                alt="" class="img-fluid mx-auto d-block">
                        </a>
                    </div><!--end col-->
                    <div class="col-lg-3 col-md-4 col-6 col-xl-2 brand-item">
                        <a href="#!" class="medical-logo">
                            <img src="{{ URL::asset('/build/images/home-medical/brand-logo-07.png') }}"
                                alt="" class="img-fluid mx-auto d-block">
                        </a>
                    </div><!--end col-->
                    <div class="col-lg-3 col-md-4 col-6 col-xl-2 brand-item">
                        <a href="#!" class="medical-logo">
                            <img src="{{ URL::asset('/build/images/home-medical/brand-logo-08.png') }}"
                                alt="" class="img-fluid mx-auto d-block">
                        </a>
                    </div><!--end col-->
                    <div class="col-lg-3 col-md-4 col-6 col-xl-2 brand-item">
                        <a href="#!" class="medical-logo">
                            <img src="{{ URL::asset('/build/images/home-medical/brand-logo-09.png') }}"
                                alt="" class="img-fluid mx-auto d-block">
                        </a>
                    </div><!--end col-->
                    <div class="col-lg-3 col-md-4 col-6 col-xl-2 brand-item">
                        <a href="#!" class="medical-logo">
                            <img src="{{ URL::asset('/build/images/home-medical/brand-logo-10.png') }}"
                                alt="" class="img-fluid mx-auto d-block">
                        </a>
                    </div><!--end col-->
                    <div class="col-lg-3 col-md-4 col-6 col-xl-2 brand-item">
                        <a href="#!" class="medical-logo">
                            <img src="{{ URL::asset('/build/images/home-medical/brand-logo-11.png') }}"
                                alt="" class="img-fluid mx-auto d-block">
                        </a>
                    </div><!--end col-->
                    <div class="col-lg-3 col-md-4 col-6 col-xl-2 brand-item">
                        <a href="#!" class="medical-logo">
                            <img src="{{ URL::asset('/build/images/home-medical/brand-logo-12.png') }}"
                                alt="" class="img-fluid mx-auto d-block">
                        </a>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section>
        <!--end brand-list section-->

        <!--kalles-medical-blog-post-->
        <section class="kalles-medical-blog-post shop-categories ">
            <div class="container">
                <div class="row justify-content-between align-items-center mb-4">
                    <div class="col-auto">
                        <h3 class="fs-26 mb-0">From our Blog</h3>
                    </div><!--end col-->
                    <div class="col-auto text-end">
                        <a href="#!" class="main_link_primary text-decoration-underline">See all Posts</a>
                    </div>
                </div><!--end row-->
                <div class="row g-lg-4 g-3 pt-lg-4 blog-arrow pb-5 pb-lg-0"
                    data-flickity='{"imagesLoaded": 0, "adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold": 5, "cellAlign": "left", "wrapAround": true, "prevNextButtons": false, "percentPosition": 1, "pageDots": false, "autoPlay": 0, "pauseAutoPlayOnHover": true }'
                    dir="ltr">
                    <div class="col-lg-3 col-sm-6 my-3 my-lg-0 px-2">
                        <div class="blog-card">
                            <a href="{{ url('blog/blog-left-sidebar') }}"
                                class="overflow-hidden d-block blog-wrap">
                                <img src="{{ URL::asset('/build/images/home-medical/post-thumb-01.jpg') }}"
                                    alt="" class="w-100 object-fit-cover">
                            </a>
                            <h6 class="fs-16 mt-3 main_link_primary text-truncate"><a
                                    href="{{ url('blog/blog-post-with-instagram-shop') }}"
                                    class="text-reset">Coronavirus latest: at
                                    a glance</a></h6>
                            <div class="d-flex gap-1 align-items-center">
                                on Feb 28, 2024
                            </div>
                            <div class="post-content text-muted mt-3">Spain’s death rate continues to fall The country
                                reported 399 deaths in 24 hours, lower than Sunday’s figure of 41...</div>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-3 col-sm-6 my-3 my-lg-0 px-2">
                        <div class="blog-card">
                            <a href="{{ url('blog/blog-left-sidebar') }}"
                                class="overflow-hidden d-block blog-wrap">
                                <img src="{{ URL::asset('/build/images/home-medical/post-thumb-02.jpg') }}"
                                    alt="" class="w-100 object-fit-cover">
                            </a>
                            <h6 class="fs-16 mt-3 main_link_primary text-truncate"><a
                                    href="{{ url('blog/blog-post-with-instagram-shop') }}" class="text-reset">WHO
                                    warns that few have
                                    developed antibodies to Covid-19</a></h6>
                            <div class="d-flex gap-1 align-items-center">
                                on Feb 28, 2024
                            </div>
                            <div class="post-content text-muted mt-3">Only a tiny proportion of the global population
                                –
                                maybe as few as 2% or 3% – appear to have antibodies in the bloo...</div>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-3 col-sm-6 my-3 my-lg-0 px-2">
                        <div class="blog-card">
                            <a href="{{ url('blog/blog-left-sidebar') }}"
                                class="overflow-hidden d-block blog-wrap">
                                <img src="{{ URL::asset('/build/images/home-medical/post-thumb-03.jpg') }}"
                                    alt="" class="w-100 object-fit-cover">
                            </a>
                            <h6 class="fs-16 mt-3 main_link_primary text-truncate"><a
                                    href="{{ url('blog/blog-post-with-instagram-shop') }}"
                                    class="text-reset">Healthcare workers
                                    confronted anti-lockdown protesters</a></h6>
                            <div class="d-flex gap-1 align-items-center">
                                on Feb 28, 2024
                            </div>
                            <div class="post-content text-muted mt-3">But a standout image by photographer Alyson
                                McClaran came on Sunday from Denver, Colorado. As protesters gathered ...</div>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-3 col-sm-6 my-3 my-lg-0 px-2">
                        <div class="blog-card">
                            <a href="{{ url('blog/blog-left-sidebar') }}"
                                class="overflow-hidden d-block blog-wrap">
                                <img src="{{ URL::asset('/build/images/home-medical/post-thumb-04.jpg') }}"
                                    alt="" class="w-100 object-fit-cover">
                            </a>
                            <h6 class="fs-16 mt-3 main_link_primary text-truncate"><a
                                    href="{{ url('blog/blog-post-with-instagram-shop') }}" class="text-reset">The
                                    stress of giving
                                    birth under lockdown</a></h6>
                            <div class="d-flex gap-1 align-items-center">
                                on Feb 28, 2024
                            </div>
                            <div class="post-content text-muted mt-3">Helen Simmons, a 28-year-old film producer from
                                London, went into labor with her second child on the ev...</div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div>
        </section>
        <!--end kalles-medical-blog-post-->

        <!--medical-shipping-info-->
        <section class="kalles-medical-shipping-info bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 mb-4 mb-lg-0">
                        <div class="text-center">
                            <i class="las la-las la-location-arrow fs-48 text-primary-emphasis"></i>
                            <h6 class="mt-3 mb-1">Store location</h6>
                            <p class="text-muted mb-0">219 Amara Fort Apt. 394</p>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-3 col-sm-6 mb-4 mb-lg-0">
                        <div class="text-center">
                            <i class="las la-las la-envelope-open fs-48 text-primary-emphasis"></i>
                            <h6 class="mt-3 mb-1">Work inquiries</h6>
                            <p class="text-muted mb-0">hello@kalles.com</p>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-3 col-sm-6 mb-4 mb-lg-0">
                        <div class="text-center">
                            <i class="las la-las la-phone-volume fs-48 text-primary-emphasis"></i>
                            <h6 class="mt-3 mb-1">Call us</h6>
                            <p class="text-muted mb-0">800 388 80 90</p>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-3 col-sm-6 mb-4 mb-lg-0">
                        <div class="text-center">
                            <i class="las la-las la-clock fs-48 text-primary-emphasis"></i>
                            <h6 class="mt-3 mb-1">Open hours</h6>
                            <p class="text-muted mb-0">Mon-Sat : 08.00 - 18.00</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section>
        <!--end medical-shipping-info-->
        @include('partials.footer-medical')
        @include('partials.popup')
    </div>

    @include('partials.card-model')
    @include('partials.vendor-scripts')
    <script src="{{ URL::asset('build/libs/flickity/flickity.pkgd.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>



</body>

</html>
