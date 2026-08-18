<!doctype html>
<html lang="en" x-data :dir="$store.appStore.dir" x-cloak>
<head>
    <meta charset="utf-8" />
    <title>Home Default | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="" name="description" />
    <meta content="srbthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/build/images/k_favicon_32x.png')}}">
    @yield('css')
    @include('partials.head-css')
</head>
<body class="font-raleway" x-data="{ showMenuScroll : false }">

    <div x-data="{ isOpen: true }" class="navbar-glass">
        <div class="t_header fs-13 d-flex align-items-center" x-bind:class="{ 'd-none': !isOpen }">
            <div class="container-fluid">
                <div class="d-flex gap-2">
                    <div class="col text-center text-white">
                        Today deal sale off <strong>70% </strong>. End in
                        <strong class="js_kl__countdown"></strong>. <a href="#!" class="text-white">Hurry Up <i class="las la-arrow-right"></i></a>
                    </div>
                    <div class="col-auto mt-2 mt-md-0">
                        <a href="#" class="h_banner_close text-white" x-on:click.prevent="isOpen = false">close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials/header-glasses')
<div class="backdrop-shadow d-none"></div>
    <div>
    <!-- main slide -->
    <section class="kalles-home-section type_slideshow type_carousel kalles-medical overflow-hidden kalles-glasses-home">
        <div class="slideshow" data-flickity='{ "fade":0,"cellAlign": "center","imagesLoaded": 0,"lazyLoad": 0,"freeScroll": 0,"wrapAround": true,"autoPlay" : 0,"pauseAutoPlayOnHover" : true, "rightToLeft": false, "prevNextButtons": false,"pageDots": true, "contain" : 1,"adaptiveHeight" : 1,"dragThreshold" : 5,"percentPosition": 1 }'>
            <!-- third slide -->
            <div class="slideshow__slide">
                <img src="{{ URL::asset('/build/images/home-glasses/slide-01.jpg')}}" alt="" class="position-absolute start-0 end-0 top-0 w-100 h-100 object-fit-cover">
                <div class="container position-relative">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="content text-start text-sm-center">
                                <h1 class="summer-tag fw-semibold mb-3 text-white font-montserrat">SUMMER CLEARANCE</h1>
                                <h6 class="fs-24 text-white fw-medium mb-4">Code Z7922G8 to Get 25% OFF!</h6>
                                <div class="d-sm-flex justify-content-center gap-2">
                                    <a class="btn btn-mustard text-white rounded-0 min-w-150 text-uppercase d-inline-flex align-items-center justify-content-center" href="{{ url('shop_pages/shop')}}">Shop Now</a>
                                    <a class="btn btn-outline-mustard mt-2 mt-sm-0 text-white rounded-0 min-w-150 text-uppercase d-inline-flex align-items-center justify-content-center" href="{{ url('shop_pages/shop')}}">VIEW PROMOTION</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end third slide -->
            <!-- first slide -->
            <div class="slideshow__slide">
                <div class="bg-overlay"></div>
                <img src="{{ URL::asset('/build/images/home-glasses/slide-02.jpg')}}" alt="" class="position-absolute start-0 end-0 top-0 bottom-0 w-100 h-100 object-fit-cover">
                <div class="container position-relative">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="content text-center">
                                <h1 class="fs-60 fw-semibold mb-3 text-white font-montserrat">MEN’S SUNGLASSES <br>
                                    LookBook</h1>
                                <p class="fs-14 text-white fw-normal mb-4">Brighten up your day and keep the rays at bay
                                    with our collection of women’s sunglasses you’ll want to book a holiday just to wear
                                    them.</p>
                                <a class="btn btn-mustard rounded-0 min-w-150 text-uppercase d-inline-flex align-items-center justify-content-center text-white" href="{{ url('shop_pages/shop')}}">VIEW THE LOOK</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end first slide -->

            <!-- second slide -->
            <div class="slideshow__slide">
                <img src="{{ URL::asset('/build/images/home-glasses/slide-03.jpg')}}" alt="" class="position-absolute start-0 end-0 top-0 bottom-0 w-100 h-100 object-fit-cover">
                <div class="container position-relative">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="content text-center">
                                <h6 class="fs-24 text-white fw-medium mb-2">COME & GET OUR NEW LOOKBOOK</h6>
                                <h1 class="fs-60 fw-semibold mb-3 text-white font-montserrat">RX EYEWEAR ESSENTIAL
                                    LookBook</h1>
                                <a class="btn btn-mustard rounded-0 min-w-150 d-inline-flex align-items-center justify-content-center text-white" href="{{ url('shop_pages/shop')}}">Explore Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end second slide -->
        </div>
    </section>
    <!-- end main slide -->

    <div class="banner-section kalles-glasses-banner-double-cat position-relative py-4 mt-2">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6">
                    <a href="{{ url('shop_pages/shop')}}" class="position-relative hover-zoom d-block">
                        <img src="{{ URL::asset('/build/images/home-glasses/banner-01.jpg')}}" alt="" class="img-fluid hover-zoom-img w-100">
                        <div class="nt_promotion_html position-absolute">
                            <div class="text-end">
                                <h4 class="fs-28 font-pinyon-script text-mustard ls-1">The classic aviator</h4>
                                <h6 class="mb-0 fs-32 text-body font-montserrat">MEN’S EYEWEAR <br> ORIGINALS</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="{{ url('shop_pages/shop')}}" class="position-relative hover-zoom d-block">
                        <img src="{{ URL::asset('/build/images/home-glasses/banner-02.jpg')}}" alt="" class="img-fluid hover-zoom-img w-100">
                        <div class="nt_promotion_html position-absolute">
                            <div class="text-end">
                                <h4 class="fs-28 font-pinyon-script text-mustard ls-1">a rectangular shape</h4>
                                <h6 class="mb-0 fs-32 text-body font-montserrat">WOMEN’S <br> SUNGLASSES</h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div><!--end section-->

    <section class="type_tab_collection kalles-glasses-tab-product pb-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center">
                        <div>
                            <h1 class="position-relative text-capitalize font-montserrat fw-medium">
                                <span>Our Products</span>
                            </h1>
                            <span class="dn tt_divider"><span></span><i class="la la-glasses text-muted"></i><span></span></span>
                        </div>
                        <p class="fs-14 text-muted mt-2 mb-0">Eyeglasses teamed up to design a performance cycling frame
                            inspired by the French outfitter’s ability to honor classic
                            design while elevating technical capabilities.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <ul class="nav nav-underline gap-4 nav-mustard justify-content-center mt-4 mb-0" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-medium fs-14 active" id="featured-tab" data-bs-toggle="pill" data-bs-target="#featured" type="button" role="tab" aria-controls="featured" aria-selected="true">FEATURED</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-medium fs-14" id="new-arrivals-tab" data-bs-toggle="pill" data-bs-target="#new-arrivals" type="button" role="tab" aria-controls="new-arrivals" aria-selected="false">NEW ARRIVALS</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-medium fs-14" id="onSale-tab" data-bs-toggle="pill" data-bs-target="#onSale" type="button" role="tab" aria-controls="onSale" aria-selected="false">ON SALE</button>
                </li>
            </ul>
            <div class="tab-content mt-4" id="pills-tabContent">
                <div class="tab-pane fade show active" id="featured" role="tabpanel" aria-labelledby="featured-tab" tabindex="0">
                    <div class="row g-4">
                        <div class="col-6 col-lg-3">
                            <div x-data="{ imageUrl: '/build/images/home-glasses/pr-14.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-glasses/pr-06.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute mustard" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>


                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_mustard">Vintage Aviator Sunglasses</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$155.00</span>
                                    </p>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-mustard text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                        <button type="button" class="btn bg-mustard fs-14 text-white" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart text-white"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-mustard m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart bg-mustard  fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-6 col-lg-3">
                            <div x-data="{ imageUrl: '/build/images/home-glasses/pr-09.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-glasses/pr-10.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute mustard" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>


                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_mustard">Miu Miu/Core Collection MU 08RS</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$450.00</span>
                                    </p>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-mustard text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                        <button type="button" class="btn bg-mustard fs-14 text-white" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart text-white"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-mustard m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart bg-mustard  fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-6 col-lg-3">
                            <div x-data="{ imageUrl: '/build/images/home-glasses/pr-03.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-glasses/pr-04.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute mustard" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-mustard text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                        <button type="button" class="btn bg-mustard fs-14 text-white" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart text-white"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-mustard m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart bg-mustard  fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_mustard">Miu Miu/Core Collection MU 59US</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$388.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-6 col-lg-3">
                            <div x-data="{ imageUrl: '/build/images/home-glasses/pr-05.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-glasses/pr-06.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute mustard" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-mustard text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                        <button type="button" class="btn bg-mustard fs-14 text-white" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart text-white"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-mustard m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart bg-mustard  fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_mustard">Ray-ban/Hexagonal Flat Lenses</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$205.00 - $259.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-glasses/pr-06.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-glasses/pr-04.jpg'; isHovered = false" class="d-inline-block bg_color_green rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end tab pane-->
                <div class="tab-pane fade" id="new-arrivals" role="tabpanel" aria-labelledby="new-arrivals-tab" tabindex="0">
                    <div class="row g-4">
                        <div class="col-6 col-lg-3">
                            <div x-data="{ imageUrl: '/build/images/home-glasses/pr-06.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-glasses/pr-06.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute mustard" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-mustard text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                        <button type="button" class="btn bg-mustard fs-14 text-white" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart text-white"></i></button>
                                    </div>

                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_mustard">Vintage Aviator Sunglasses</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$155.00</span>
                                    </p>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-mustard text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                        <button type="button" class="btn bg-mustard fs-14 text-white" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart text-white"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-mustard m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart bg-mustard  fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-6 col-lg-3">
                            <div x-data="{ imageUrl: '/build/images/home-glasses/pr-05.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-glasses/pr-06.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute mustard" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-mustard text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                        <button type="button" class="btn bg-mustard fs-14 text-white" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart text-white"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-mustard m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart bg-mustard  fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_mustard">Ray-ban/Hexagonal Flat Lenses</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$205.00 - $259.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-glasses/pr-06.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-glasses/pr-04.jpg'; isHovered = false" class="d-inline-block bg_color_green rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-6 col-lg-3">
                            <div x-data="{ imageUrl: '/build/images/home-glasses/pr-07.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-glasses/pr-08.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute mustard" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-mustard text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                        <button type="button" class="btn bg-mustard fs-14 text-white" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart text-white"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-mustard m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart bg-mustard  fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_mustard">Ray-ban Gold Flat Lenses</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$205.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-glasses/pr-08.jpg'; isHovered = false" class="d-inline-block bg_color_green rounded-circle"></a>
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-glasses/pr-13.jpg'; isHovered = false" class="d-inline-block bg-warning rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-6 col-lg-3">
                            <div x-data="{ imageUrl: '/build/images/home-glasses/pr-15.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-glasses/pr-16.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute mustard" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-mustard text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                        <button type="button" class="btn bg-mustard fs-14 text-white" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart text-white"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-mustard m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart bg-mustard  fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_mustard">Ray-Ban/SQUARE II</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$320.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
                <div class="tab-pane fade" id="onSale" role="tabpanel" aria-labelledby="onSale-tab" tabindex="0">
                    <div class="row g-4">
                        <div class="col-6 col-lg-3">
                            <div x-data="{ imageUrl: '/build/images/home-glasses/pr-01.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-glasses/pr-02.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute mustard" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-mustard text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                        <button type="button" class="btn bg-mustard fs-14 text-white" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart text-white"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-mustard m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart bg-mustard  fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_mustard">Miu Miu/NOIR Glasses</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$205.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-6 col-lg-3">
                            <div x-data="{ imageUrl: '/build/images/home-glasses/pr-03.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-glasses/pr-04.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute mustard" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-mustard text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                        <button type="button" class="btn bg-mustard fs-14 text-white" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart text-white"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-mustard m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart bg-mustard  fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_mustard">Miu Miu/Core Collection MU 59US</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$388.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-6 col-lg-3">
                            <div x-data="{ imageUrl: '/build/images/home-glasses/pr-05.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-glasses/pr-06.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute mustard" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-mustard text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                        <button type="button" class="btn bg-mustard fs-14 text-white" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart text-white"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-mustard m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart bg-mustard  fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_mustard">Ray-ban/Hexagonal Flat Lenses</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$205.00 - $259.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-glasses/pr-06.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-glasses/pr-04.jpg'; isHovered = false" class="d-inline-block bg_color_green rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-6 col-lg-3">
                            <div x-data="{ imageUrl: '/build/images/home-glasses/pr-07.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-glasses/pr-08.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute mustard" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-mustard text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                        <button type="button" class="btn bg-mustard fs-14 text-white" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart text-white"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-mustard m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart bg-mustard  fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_mustard">Ray-ban Gold Flat Lenses</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$205.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-glasses/pr-08.jpg'; isHovered = false" class="d-inline-block bg_color_green rounded-circle"></a>
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-glasses/pr-13.jpg'; isHovered = false" class="d-inline-block bg-warning rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
            </div>
        </div>
    </section>

    <section class="kalles-glasses-shipping-info">
        <div class="container border-top border-bottom py-5 mt-5">
            <div class="row py-4 g-3">
                <div class="col-md-6 col-lg-4">
                    <div class="text-center">
                        <i class="las la-truck text-mustard fs-48"></i>
                        <h6 class="font-montserrat mt-3">FREE SHIPPING UK&UK</h6>
                        <p class="mb-0 text-muted">Free shipping on all orders above $100</p>
                    </div>
                </div><!--end col-->
                <div class="col-md-6 col-lg-4">
                    <div class="text-center">
                        <i class="las la-headset text-mustard fs-48"></i>
                        <h6 class="font-montserrat mt-3">SUPPORT 24/7</h6>
                        <p class="mb-0 text-muted">Contact us 24 hours a day, 7 days a week</p>
                    </div>
                </div><!--end col-->
                <div class="col-md-6 col-lg-4">
                    <div class="text-center">
                        <i class="las la-donate text-mustard fs-48"></i>
                        <h6 class="font-montserrat mt-3">30 DAYS MONEY BACK</h6>
                        <p class="mb-0 text-muted">Simply return it within 30 days for an exchange.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </section>

    <section class="kalles-section_type_featured_blog">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-4">
                        <div>
                            <h1 class="position-relative text-capitalize font-montserrat fw-medium">
                                <span>Latest News</span>
                            </h1>
                            <span class="dn tt_divider"><span></span><i class="la la-glasses text-muted"></i><span></span></span>
                        </div>
                        <p class="fs-14 text-muted mt-2 mb-0">Finding eyeglasses with the qualities that are most
                            important to you could be as simple as choosing a frame material
                            each distinguished by its own strengths.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="row g-4 blog-arrow" data-flickity='{"imagesLoaded": 0, "adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold": 5, "cellAlign": "left", "wrapAround": true, "prevNextButtons": true, "percentPosition": 1, "pageDots": false, "autoPlay": 0, "pauseAutoPlayOnHover": true }' dir="ltr">
                <div class=" col-md-6 col-lg-4 px-2">
                    <div class="blog-card">
                        <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                            <img src="{{ URL::asset('/build/images/home-glasses/blog-01.jpg')}}" alt="" class="img-fluid">
                        </a>
                        <h6 class="fs-16 mt-3 main_link_mustard font-montserrat"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset main_link_mustard">Eyeglasses that Suit Your
                                Personality</a></h6>
                        <div class="d-flex gap-1 align-items-center text-muted">
                            On
                            <span class="text-body">August 27, 2024</span>
                        </div>
                        <div class="post-content text-muted mt-3">Because people generally recognize you by your face,
                            the eyeglasses you wear are a very real part of your identity....</div>
                    </div>
                </div><!--end col-->
                <div class="col-md-6 col-lg-4  px-2">
                    <div class="blog-card">
                        <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                            <img src="{{ URL::asset('/build/images/home-glasses/blog-02.jpg')}}" alt="" class="img-fluid">
                        </a>
                        <h6 class="fs-16 mt-3 main_link_mustard font-montserrat"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset main_link_mustard">How Eyeglasses Protect and
                                Improve Vision?</a></h6>
                        <div class="d-flex gap-1 align-items-center text-muted">
                            On
                            <span class="text-body">August 26, 2024</span>
                        </div>
                        <div class="post-content text-muted mt-3">For most Americans, eyeglasses are an indispensable
                            part of our daily lives. In the United States, more than 6 out...</div>
                    </div>
                </div><!--end col-->
                <div class="col-md-6 col-lg-4  px-2">
                    <div class="blog-card">
                        <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                            <img src="{{ URL::asset('/build/images/blog/blog-03.jpg')}}" alt="" class="img-fluid">
                        </a>
                        <h6 class="fs-16 mt-3 main_link_mustard font-montserrat"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset main_link_mustard">Making a spectacle: How
                                glasses are crafted</a></h6>
                        <div class="d-flex gap-1 align-items-center text-muted">
                            On
                            <span class="text-body">August 26, 2024</span>
                        </div>
                        <div class="post-content text-muted mt-3">When it comes to getting a pair of glasses, looks can
                            be deceiving. We see them as functional fashion, but in reali...</div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>

    <section class="kalles-glasses-vertical-products border-top py-5">
        <div class="container my-4">
            <div class="row g-2">
                <div class="col-md-6 col-lg-3">
                    <h5 class="widget-title mb-4">MOST REVIEW</h5>

                    <div class="vstack gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ URL::asset('/build/images/home-glasses/thumb-01.jpg')}}" alt="" class="img-fluid flex-shrink-0">
                            <div class="flex-grow-1 overflow-hidden">
                                <h6 class="font-montserrat text-truncate mb-1"><a href="#!" class="main_link_mustard">Vintage Aviator Sunglasses</a></h6>
                                <p class="mb-0 text-muted">$155.00</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ URL::asset('/build/images/home-glasses/thumb-02.jpg')}}" alt="" class="img-fluid flex-shrink-0">
                            <div class="flex-grow-1 overflow-hidden">
                                <h6 class="font-montserrat text-truncate mb-1"><a href="#!" class="main_link_mustard">Ray-ban/Hexagonal Flat Lenses</a></h6>
                                <p class="mb-0 text-muted">$205.00 - $259.00</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ URL::asset('/build/images/home-glasses/thumb-01.jpg')}}" alt="" class="img-fluid flex-shrink-0">
                            <div class="flex-grow-1 overflow-hidden">
                                <h6 class="font-montserrat text-truncate mb-1"><a href="#!" class="main_link_mustard">Ray-ban Gold Flat Lenses</a></h6>
                                <p class="mb-0 text-muted">$205.00</p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-md-6 col-lg-3">
                    <h5 class="widget-title mb-4">TOP RATE</h5>

                    <div class="vstack gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ URL::asset('/build/images/home-glasses/thumb-04.jpg')}}" alt="" class="img-fluid flex-shrink-0">
                            <div class="flex-grow-1 overflow-hidden">
                                <h6 class="font-montserrat text-truncate mb-1"><a href="#!" class="main_link_mustard">Vintage Aviator Sunglasses</a></h6>
                                <p class="mb-0 text-muted">$155.00</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ URL::asset('/build/images/home-glasses/thumb-05.jpg')}}" alt="" class="img-fluid flex-shrink-0">
                            <div class="flex-grow-1 overflow-hidden">
                                <h6 class="font-montserrat text-truncate mb-1"><a href="#!" class="main_link_mustard">Miu Miu/Core Collection MU 08RS</a></h6>
                                <p class="mb-0 text-muted">$405.00</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ URL::asset('/build/images/home-glasses/thumb-06.jpg')}}" alt="" class="img-fluid flex-shrink-0">
                            <div class="flex-grow-1 overflow-hidden">
                                <h6 class="font-montserrat text-truncate mb-1"><a href="#!" class="main_link_mustard">Miu Miu/Core Collection MU 59US</a></h6>
                                <p class="mb-0 text-muted">$388.00</p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-md-6 col-lg-3">
                    <h5 class="widget-title mb-4">RECENT ITEMS</h5>

                    <div class="vstack gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ URL::asset('/build/images/home-glasses/thumb-07.jpg')}}" alt="" class="img-fluid flex-shrink-0">
                            <div class="flex-grow-1 overflow-hidden">
                                <h6 class="font-montserrat text-truncate mb-1"><a href="#!" class="main_link_mustard">Miu Miu/NOIR Glasses</a></h6>
                                <p class="mb-0 text-muted">$205.00</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ URL::asset('/build/images/home-glasses/thumb-08.jpg')}}" alt="" class="img-fluid flex-shrink-0">
                            <div class="flex-grow-1 overflow-hidden">
                                <h6 class="font-montserrat text-truncate mb-1"><a href="#!" class="main_link_mustard">Miu Miu/Core Collection MU 59US</a></h6>
                                <p class="mb-0 text-muted">$388.00</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ URL::asset('/build/images/home-glasses/thumb-09.jpg')}}" alt="" class="img-fluid flex-shrink-0">
                            <div class="flex-grow-1 overflow-hidden">
                                <h6 class="font-montserrat text-truncate mb-1"><a href="#!" class="main_link_mustard">Ray-ban/Hexagonal Flat Lenses</a></h6>
                                <p class="mb-0 text-muted">$205.00 - $259.00</p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-md-6 col-lg-3">
                    <h5 class="widget-title mb-4">POPULAR ITEMS</h5>

                    <div class="vstack gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ URL::asset('/build/images/home-glasses/thumb-10.jpg')}}" alt="" class="img-fluid flex-shrink-0">
                            <div class="flex-grow-1 overflow-hidden">
                                <h6 class="font-montserrat text-truncate mb-1"><a href="#!" class="main_link_mustard">Ray-ban/Hexagonal Flat Lenses</a></h6>
                                <p class="mb-0 text-muted">$205.00 - $259.00</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ URL::asset('/build/images/home-glasses/thumb-11.jpg')}}" alt="" class="img-fluid flex-shrink-0">
                            <div class="flex-grow-1 overflow-hidden">
                                <h6 class="font-montserrat text-truncate mb-1"><a href="#!" class="main_link_mustard">Miu Miu/Core Collection MU 59US</a></h6>
                                <p class="mb-0 text-muted">$450.00</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ URL::asset('/build/images/home-glasses/thumb-12.jpg')}}" alt="" class="img-fluid flex-shrink-0">
                            <div class="flex-grow-1 overflow-hidden">
                                <h6 class="font-montserrat text-truncate mb-1"><a href="#!" class="main_link_mustard">Ray-ban/Hexagonal Flat Lenses</a></h6>
                                <p class="mb-0 text-muted">$320.00</p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </section>
    @include('partials.footer-dark')
    @include('partials.popup')
</div>

@include('partials.card-model')
@include('partials/vendor-scripts')
<script  src="{{ URL::asset('build/libs/flickity/flickity.pkgd.min.js')}}"></script>
<script  src="{{ URL::asset('build/js/main.js')}}"></script>
<script  src="{{ URL::asset('build/js/app.js')}}"></script>
</body>

</html>