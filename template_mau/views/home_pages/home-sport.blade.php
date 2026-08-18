<!doctype html>
<html lang="en" x-data :dir="$store.appStore.dir" x-cloak>
<head>
    <meta charset="utf-8" />
    <title>Home Sport | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="" name="description" />
    <meta content="srbthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/build/images/k_favicon_32x.png')}}">
@include('partials.head-css')
  </head>
<body class="font-raleway" x-data="{ showMenuScroll : false }">
<!--head banner-->
<div x-data="{ isOpen: true }" class="navbar-sport">
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
<!--end head banner-->
@include('partials.header-sport')
<div>
    <!-- main slide -->
    <section class="kalles-home-section type_slideshow type_carousel kalles-medical kalles-sport-home overflow-hidden" dir="ltr">
        <div class="slideshow" data-flickity='{ "fade":0,"cellAlign": "center","imagesLoaded": 0,"lazyLoad": 0,"freeScroll": 0,"wrapAround": true,"autoPlay" : 0,"pauseAutoPlayOnHover" : true, "rightToLeft": false, "prevNextButtons": false,"pageDots": true, "contain" : 1,"adaptiveHeight" : 1,"dragThreshold" : 5,"percentPosition": 1 }'>
            <!-- first slide -->
            <div class="slideshow__slide">
                <img src="{{ URL::asset('/build/images/home-sport/slide-01.jpg')}}" alt="" class="position-absolute w-100 h-100 object-fit-cover">
                <div class="container position-relative">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="content">
                                <h5 class="fw-medium fs-20 text-white text-uppercase font-raleway">PUSH HADER/RUN FASTER
                                    & GO FURTHER</h5>
                                <h1 class="fs-60 fw-bold font-montserrat text-white mb-4">TRAINING’S CLOTHING <br>
                                    LOOKBOOK</h1>
                                <div class="d-sm-flex align-items-center gap-2">
                                    <a class="btn btn-orange rounded-0 text-white min-w-150 min-h-45 text-uppercase d-inline-flex align-items-center justify-content-center fw-semibold" href="{{ url('shop_pages/shop')}}">Shop Now</a>
                                    <button class="mt-1 mt-sm-0 btn btn-outline-light text-white rounded-0 min-w-150 min-h-45 d-inline-flex text-uppercase align-items-center justify-content-center fw-semibold border border-2 border-light bg-transparent">VIEW THE LOOK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end first slide -->

            <!-- second slide -->
            <div class="slideshow__slide">
                <img src="{{ URL::asset('/build/images/home-sport/slide-02.jpg')}}" alt="" class="position-absolute w-100 h-100 object-fit-cover">
                <div class="container position-relative">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="content">
                                <h5 class="fw-medium fs-20 text-white text-uppercase font-raleway">TRANSFORM YOUR LIFE
                                    TODAY</h5>
                                <h1 class="fs-60 fw-bold font-montserrat text-white mb-4">LOSE FAT, GET FIT <br> HAVE
                                    FUN!</h1>
                                <div class="d-flex align-items-center gap-2">
                                    <a class="btn btn-orange rounded-0 min-w-150 min-h-45 d-inline-flex align-items-center justify-content-center fw-semibold text-white" href="{{ url('shop_pages/shop')}}">Explore Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end second slide -->

            <!-- third slide -->
            <div class="slideshow__slide">
                <img src="{{ URL::asset('/build/images/home-sport/slide-03.jpg')}}" alt="" class="position-absolute w-100 h-100 object-fit-cover">
                <div class="container position-relative">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="content">
                                <h5 class="fw-medium fs-20 text-white text-uppercase font-raleway">NEW ARRIVALS</h5>
                                <h1 class="fs-60 fw-bold font-montserrat text-white mb-4">MEN’S CLOTHING <br> &
                                    ACCESSORIES</h1>
                                <div class="d-sm-flex align-items-center gap-2">
                                    <a class="btn btn-orange rounded-0 text-white min-w-150 min-h-45 text-uppercase d-inline-flex align-items-center justify-content-center fw-semibold" href="{{ url('shop_pages/shop')}}">Shop Now</a>
                                    <button class="mt-1 mt-sm-0 btn btn-outline-light text-white rounded-0 min-w-150 min-h-45 d-inline-flex text-uppercase align-items-center justify-content-center fw-semibold border border-2 border-light bg-transparent">Explore Now</button>
                                </div>
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
            <div class="row g-3">
                <div class="col-md-6 col-lg-4">
                    <a href="{{ url('shop_pages/shop')}}" class="d-inline-block kalles-medical-banner-01 position-relative img-zoom w-100">
                        <img src="{{ URL::asset('/build/images/home-sport/banner-collection-01.jpg')}}" alt="" class="w-100 img-fluid">
                        <div class="content position-absolute text-white">
                            <p class="text-uppercase fs-16 fw-semibold mb-1">ACCESSORIES</p>
                            <h3 class="font-montserrat fw-bold fs-36 text-uppercase">FOR MEN</h3>
                        </div>
                    </a>
                </div><!--end col-->
                <div class="col-md-6 col-lg-4">
                    <a href="{{ url('shop_pages/shop')}}" class="d-inline-block kalles-medical-banner-01 position-relative img-zoom w-100">
                        <img src="{{ URL::asset('/build/images/home-sport/banner-collection-02.jpg')}}" alt="" class="w-100 img-fluid">
                        <div class="content position-absolute text-white">
                            <p class="text-uppercase fs-16 fw-semibold mb-1">TRAINING CLOTHING</p>
                            <h3 class="font-montserrat fw-bold fs-36 text-uppercase">FOR WOMEN</h3>
                        </div>
                    </a>
                </div><!--end col-->
                <div class="col-md-6 col-lg-4">
                    <a href="{{ url('shop_pages/shop')}}" class="d-inline-block kalles-medical-banner-01 position-relative img-zoom w-100">
                        <img src="{{ URL::asset('/build/images/home-sport/banner-collection-03.jpg')}}" alt="" class="w-100 img-fluid">
                        <div class="content position-absolute text-white start-50 translate-middle text-center w-100">
                            <div>
                                <h3 class="font-montserrat fw-bold fs-60 text-uppercase">-50% OFF</h3>
                                <p class="text-uppercase fs-16 fw-semibold mb-1">SUMMER SALE</p>
                            </div>
                        </div>
                    </a>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end conatiner-->
    </section>
    <!--end bannner section-->

    <section class="type_tab_collection pt-5">
        <div class="container">
            <ul class="nav nav-underline nav-orange gap-4 justify-content-center mb-4 pb-2 mb-0" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="featured-tab" data-bs-toggle="pill" data-bs-target="#featured" type="button" role="tab" aria-controls="featured" aria-selected="true">FEATURED</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="newArrivals-tab" data-bs-toggle="pill" data-bs-target="#newArrivals" type="button" role="tab" aria-controls="newArrivals" aria-selected="false">NEW ARRIVALS</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="onSale-tab" data-bs-toggle="pill" data-bs-target="#onSale" type="button" role="tab" aria-controls="onSale" aria-selected="false">ON SALE</button>
                </li>
            </ul>
            <div class="tab-content mt-4" id="pills-tabContent">
                <div class="tab-pane fade show active" id="featured" role="tabpanel" aria-labelledby="featured-tab" tabindex="0">
                    <div class="swiper featuredSwiper">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <div x-data="{ imageUrl: '/build/images/home-sport/pr-04.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-sport/pr-11.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute text-white dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-orange text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn bg-orange text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-orange m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>

                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_orange">Nike
                                            As Dri-Fit Training</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$65.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-04.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-11.jpg'; isHovered = false" class="d-inline-block bg_color_blue rounded-circle"></a>
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-12.jpg'; isHovered = false" class="d-inline-block bg_color_pink rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div x-data="{ imageUrl: '/build/images/home-sport/pr-08.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <span class="onsale position-absolute bg-danger text-white d-flex align-items-center justify-content-center z-3">-35%</span>
                                    <img :src="isHovered ? '/build/images/home-sport/pr-07.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute text-white dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-orange text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn bg-orange text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-orange m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_orange">Body
                                            Trimmer</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$99.00</del>
                                        <span class="text-danger">$65.00</span>
                                    </p>
                                </div>
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div x-data="{ imageUrl: '/build/images/home-sport/pr-10.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-sport/pr-09.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute text-white dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-orange text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn bg-orange text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-orange m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_orange">NIKE
                                            Trophy Training Shorts</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$29.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-10.jpg'; isHovered = false" class="d-inline-block bg_color_blue rounded-circle"></a>
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-09.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div x-data="{ imageUrl: '/build/images/home-sport/pr-13.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-sport/pr-14.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute text-white dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-orange text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn bg-orange text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-orange m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_orange">Calvin
                                            Klein Training Shorts</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$29.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-14.jpg'; isHovered = false" class="d-inline-block bg-danger rounded-circle"></a>
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-13.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div x-data="{ imageUrl: '/build/images/home-sport/pr-01.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-sport/pr-02.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute text-white dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-orange text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn bg-orange text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-orange m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                        <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                            <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_orange">Calvin
                                            Klein Training Shorts</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$29.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-14.jpg'; isHovered = false" class="d-inline-block bg-danger rounded-circle"></a>
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-13.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                      </div>
                </div><!--end tab pane-->
                <div class="tab-pane fade" id="newArrivals" role="tabpanel" aria-labelledby="newArrivals-tab" tabindex="0">
                    <div class="swiper featuredSwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div x-data="{ imageUrl: '/build/images/home-sport/pr-11.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden main">
                                        <span class="onsale position-absolute bg-danger text-white d-flex align-items-center justify-content-center z-3">-35%</span>
                                        <img :src="isHovered ? '/build/images/home-sport/pr-04.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="wishlistadd position-absolute text-white dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
    
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-orange text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn bg-orange text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-orange m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_orange">Men's
                                                Long Sleeve Rash Guard</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <del>$99.00</del>
                                            <span class="text-danger">$65.00</span>
                                        </p>
                                        <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                            <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-04.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                                            <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-11.jpg'; isHovered = false" class="d-inline-block bg_color_blue rounded-circle"></a>
                                            <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-12.jpg'; isHovered = false" class="d-inline-block bg_color_pink rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div x-data="{ imageUrl: '/build/images/home-sport/pr-13.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden main">
                                        <img :src="isHovered ? '/build/images/home-sport/pr-14.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="wishlistadd position-absolute text-white dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
    
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-orange text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn bg-orange text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-orange m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_orange">Calvin
                                                Klein Training Shorts</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$29.00</span>
                                        </p>
                                        <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                            <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-14.jpg'; isHovered = false" class="d-inline-block bg-danger rounded-circle"></a>
                                            <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-13.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div x-data="{ imageUrl: '/build/images/home-sport/pr-07.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden main">
                                        <img :src="isHovered ? '/build/images/home-sport/pr-08.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="wishlistadd position-absolute text-white dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
    
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-orange text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn bg-orange text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-orange m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_orange">Elip
                                                Power Max</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$35.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div x-data="{ imageUrl: '/build/images/home-sport/pr-02.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden main">
                                        <img :src="isHovered ? '/build/images/home-sport/pr-01.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="wishlistadd position-absolute text-white dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
    
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-orange text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn bg-orange text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-orange m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_orange">Shoes
                                                huarache</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$145.00</span>
                                        </p>
                                        <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                            <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-02.jpg'; isHovered = false" class="d-inline-block bg_color_cyan rounded-circle"></a>
                                            <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-01.jpg'; isHovered = false" class="d-inline-block bg_color_blue rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                              <div x-data="{ imageUrl: '/build/images/home-sport/pr-01.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                  <div class="position-relative overflow-hidden main">
                                      <img :src="isHovered ? '/build/images/home-sport/pr-02.jpg' : imageUrl" alt="" class="img-fluid">
                                      <a href="#" class="wishlistadd position-absolute text-white dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
  
                                      <div class="product-button d-none d-lg-flex flex-column gap-2">
                                          <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-orange text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                          <button type="button" class="btn bg-orange text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                              <i class="iccl iccl-cart"></i></button>
                                      </div>
                                      <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-orange m-2" style="z-index: 1;">
                                          <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                          <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                              <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                      </div>
                                  </div>
                                  <div class="mt-3 text-center">
                                      <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_orange">Calvin
                                              Klein Training Shorts</a></h6>
                                      <p class="mb-0 fs-14 text-muted">
                                          <span>$29.00</span>
                                      </p>
                                      <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                          <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-14.jpg'; isHovered = false" class="d-inline-block bg-danger rounded-circle"></a>
                                          <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-13.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                                      </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <div class="tab-pane fade" id="onSale" role="tabpanel" aria-labelledby="onSale-tab" tabindex="0">
                    <div class="swiper featuredSwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div x-data="{ imageUrl: '/build/images/home-sport/pr-07.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden main">
                                        <img :src="isHovered ? '/build/images/home-sport/pr-08.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="wishlistadd position-absolute text-white dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
    
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-orange text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn bg-orange text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-orange m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_orange">Elip
                                                Power Max</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$35.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div x-data="{ imageUrl: '/build/images/home-sport/pr-04.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden main">
                                        <img :src="isHovered ? '/build/images/home-sport/pr-11.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="wishlistadd position-absolute text-white dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
    
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-orange text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn bg-orange text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-orange m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_orange">Nike
                                                As Dri-Fit Training</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$65.00</span>
                                        </p>
                                        <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                            <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-04.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                                            <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-11.jpg'; isHovered = false" class="d-inline-block bg_color_blue rounded-circle"></a>
                                            <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-12.jpg'; isHovered = false" class="d-inline-block bg_color_pink rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div x-data="{ imageUrl: '/build/images/home-sport/pr-13.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden main">
                                        <img :src="isHovered ? '/build/images/home-sport/pr-14.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="wishlistadd position-absolute text-white dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
    
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-orange text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn bg-orange text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-orange m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_orange">Calvin
                                                Klein Training Shorts</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$29.00</span>
                                        </p>
                                        <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                            <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-14.jpg'; isHovered = false" class="d-inline-block bg-danger rounded-circle"></a>
                                            <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-13.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div x-data="{ imageUrl: '/build/images/home-sport/pr-11.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden main">
                                        <span class="onsale position-absolute bg-danger text-white d-flex align-items-center justify-content-center z-3">-35%</span>
                                        <img :src="isHovered ? '/build/images/home-sport/pr-04.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="wishlistadd position-absolute text-white dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
    
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-orange text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn bg-orange text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-orange m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_orange">Men's
                                                Long Sleeve Rash Guard</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <del>$99.00</del>
                                            <span class="text-danger">$65.00</span>
                                        </p>
                                        <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                            <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-04.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                                            <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-11.jpg'; isHovered = false" class="d-inline-block bg_color_blue rounded-circle"></a>
                                            <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-12.jpg'; isHovered = false" class="d-inline-block bg_color_pink rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div x-data="{ imageUrl: '/build/images/home-sport/pr-01.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden main">
                                        <img :src="isHovered ? '/build/images/home-sport/pr-02.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="wishlistadd position-absolute text-white dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
    
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-orange text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn bg-orange text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-orange m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_orange">Calvin
                                                Klein Training Shorts</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$29.00</span>
                                        </p>
                                        <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                            <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-14.jpg'; isHovered = false" class="d-inline-block bg-danger rounded-circle"></a>
                                            <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-13.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                              </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="overflow-hidden mt-5 pt-4">
        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="kalles-medical-banner-01 position-relative img-zoom">
                        <img src="{{ URL::asset('/build/images/home-sport/full-width-banner-desktop.jpg')}}" alt="" class="w-100 img-fluid">
                        <div class="content position-absolute text-white py-5">
                            <p class="text-uppercase fs-16 fw-semibold mb-1">BLACK FRIDAY</p>
                            <h3 class="font-montserrat fw-bold display-3 text-uppercase">SAVE 50% OFF</h3>
                            <h2 class="text-uppercase fs-36 fw-bold mb-4">FIRST ONLINE PURCHASE</h2>
                            <button class="btn btn-custom-orange rounded-0 min-w-150 min-h-45 text-uppercase d-inline-flex align-items-center justify-content-center fw-semibold">VIEW PROMOTION</button>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end conatiner-->
    </section>

    <section class="type_tab_collection kalles-glasses-tab-product pb-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-4">
                        <div>
                            <h1 class="position-relative text-capitalize font-montserrat fw-medium">
                                <span>TOP SELLING</span>
                            </h1>
                            <span class="dn tt_divider"><span></span><i class="la la-dumbbell text-muted"></i><span></span></span>
                        </div>
                        <p class="fs-14 text-muted mt-2 mb-0">Whether your goals are to improve weight or body
                            composition, increase strength and function, or improve overall
                            health, resistance training can help you get there.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="row g-4">
                <div class="col-6 col-sm-4 col-md-3">
                    <div x-data="{ imageUrl: '/build/images/home-sport/pr-01.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden main">
                            <img :src="isHovered ? '/build/images/home-sport/pr-02.jpg' : imageUrl" alt="" class="img-fluid">
                            <a href="#" class="wishlistadd position-absolute text-white dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-orange text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn bg-orange text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-orange m-2" style="z-index: 1;">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                    <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <h6 class="mb-1 font-montserrat fw-medium fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_orange">Shoes huarache – TT100</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <span>$145.00</span>
                            </p>
                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-01.jpg'; isHovered = false" class="d-inline-block bg_color_blue rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-02.jpg'; isHovered = false" class="d-inline-block bg_color_cyan rounded-circle"></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-6 col-sm-4 col-md-3">
                    <div x-data="{ imageUrl: '/build/images/home-sport/pr-03.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden main">
                            <img :src="isHovered ? '/build/images/home-sport/pr-04.jpg' : imageUrl" alt="" class="img-fluid">
                            <a href="#" class="wishlistadd position-absolute text-white dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-orange text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn bg-orange text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-orange m-2" style="z-index: 1;">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                    <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <h6 class="mb-1 font-montserrat fw-medium fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_orange">SwimZip Men's Long Sleeve Zipper</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <span>$65.00</span>
                            </p>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-6 col-sm-4 col-md-3">
                    <div x-data="{ imageUrl: '/build/images/home-sport/pr-05.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden main">
                            <span class="onsale position-absolute bg-danger text-white d-flex align-items-center justify-content-center z-3">-35%</span>
                            <img :src="isHovered ? '/build/images/home-sport/pr-06.jpg' : imageUrl" alt="" class="img-fluid" src="{{ URL::asset('/build/images/home-sport/pr-11.jpg')}}">
                            <a href="#" class="wishlistadd position-absolute text-white dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-orange text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn bg-orange text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-orange m-2" style="z-index: 1;">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                    <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_orange">Men's Tops
                                    Long Sleeve Shirts</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <del>$99.00</del>
                                <span class="text-danger">$65.00</span>
                            </p>
                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-05.jpg'; isHovered = false" class="d-inline-block bg_color_pink rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-06.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-11.jpg'; isHovered = false" class="d-inline-block bg_color_blue rounded-circle"></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-6 col-sm-4 col-md-3">
                    <div x-data="{ imageUrl: '/build/images/home-sport/pr-07.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden main">
                            <img :src="isHovered ? '/build/images/home-sport/pr-08.jpg' : imageUrl" alt="" class="img-fluid">
                            <a href="#" class="wishlistadd position-absolute text-white dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-orange text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn bg-orange text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-orange m-2" style="z-index: 1;">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                    <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <h6 class="mb-1 font-montserrat fw-medium fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_orange">Elip Power Max</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <span>$35.00</span>
                            </p>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-6 col-sm-4 col-md-3">
                    <div x-data="{ imageUrl: '/build/images/home-sport/pr-09.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden main">
                            <img :src="isHovered ? '/build/images/home-sport/pr-10.jpg' : imageUrl" alt="" class="img-fluid">
                            <a href="#" class="wishlistadd position-absolute text-white dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-orange text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn bg-orange text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-orange m-2" style="z-index: 1;">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                    <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <h6 class="mb-1 font-montserrat fw-medium fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_orange">Men's Sports Jogging Workout Shorts</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <span>$29.00</span>
                            </p>
                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-10.jpg'; isHovered = false" class="d-inline-block bg_color_blue rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-09.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-6 col-sm-4 col-md-3">
                    <div x-data="{ imageUrl: '/build/images/home-sport/pr-11.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden main">
                            <span class="onsale position-absolute bg-danger text-white d-flex align-items-center justify-content-center z-3">-35%</span>
                            <img :src="isHovered ? '/build/images/home-sport/pr-12.jpg' : imageUrl" alt="" class="img-fluid" src="{{ URL::asset('/build/images/home-sport/pr-11.jpg')}}">
                            <a href="#" class="wishlistadd position-absolute text-white dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-orange text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn bg-orange text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-orange m-2" style="z-index: 1;">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                    <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_orange">Men's Long
                                    Sleeve Rash Guard</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <del>$99.00</del>
                                <span class="text-danger">$65.00</span>
                            </p>
                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-06.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-11.jpg'; isHovered = false" class="d-inline-block bg_color_blue rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-05.jpg'; isHovered = false" class="d-inline-block bg_color_pink rounded-circle"></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-6 col-sm-4 col-md-3">
                    <div x-data="{ imageUrl: '/build/images/home-sport/pr-14.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden main">
                            <img :src="isHovered ? '/build/images/home-sport/pr-13.jpg' : imageUrl" alt="" class="img-fluid">
                            <a href="#" class="wishlistadd position-absolute text-white dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-orange text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn bg-orange text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-orange m-2" style="z-index: 1;">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                    <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <h6 class="mb-1 font-montserrat fw-medium fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_orange">Calvin Klein Workout Shorts</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <span>$29.00</span>
                            </p>
                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-14.jpg'; isHovered = false" class="d-inline-block bg-danger rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-13.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-6 col-sm-4 col-md-3">
                    <div x-data="{ imageUrl: '/build/images/home-sport/pr-02.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden main">
                            <img :src="isHovered ? '/build/images/home-sport/pr-01.jpg' : imageUrl" alt="" class="img-fluid">
                            <a href="#" class="wishlistadd position-absolute text-white dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-orange text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn bg-orange text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-orange m-2" style="z-index: 1;">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                    <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <h6 class="mb-1 font-montserrat fw-medium fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_orange">Shoes huarache</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <span>$145.00</span>
                            </p>
                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-02.jpg'; isHovered = false" class="d-inline-block bg_color_cyan rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-sport/pr-01.jpg'; isHovered = false" class="d-inline-block bg_color_blue rounded-circle"></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </section><!--end section-->

    <section class="kalles-section_type_featured_blog border-top sport-blog mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="text-center mb-4 pb-2">
                        <div>
                            <h1 class="position-relative text-capitalize font-montserrat fw-medium">
                                <span>Latest News</span>
                            </h1>
                            <span class="dn tt_divider"><span></span><i class="la la-dumbbell text-muted"></i><span></span></span>
                        </div>
                        <p class="fs-14 text-muted mt-2 mb-0">Increased caloric expenditure can result from resistance
                            training both due to acute effects from training sessions
                            and long-term effects from increased muscle mass.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="row g-4 blog-arrow " data-flickity='{"imagesLoaded": 0, "adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold": 5, "cellAlign": "left", "wrapAround": true, "prevNextButtons": true, "percentPosition": 1, "pageDots": false, "autoPlay": 0, "pauseAutoPlayOnHover": true }' dir="ltr">
                <div class="col-md-6 col-lg-4 px-2 px-lg-3">
                    <div class="blog-card">
                        <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                            <img src="{{ URL::asset('/build/images/home-sport/blog-01.jpg')}}" alt="" class="img-fluid">
                        </a>
                        <h6 class="fs-16 mt-3 font-montserrat fw-medium main_link text-truncate_orange"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">Tips At-home Cardio
                                Workouts</a></h6>
                        <div class="d-flex gap-1 align-items-center text-muted">
                            On
                            <span class="text-body">September 1, 2024</span>
                        </div>
                        <div class="post-content text-muted mt-3">Time to get your sweat on with this workout for a flat
                            stomach! These are the 10 best moves to tighten up that core...</div>
                    </div>
                </div><!--end col-->
                <div class="col-md-6 col-lg-4 px-2 px-lg-3">
                    <div class="blog-card">
                        <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                            <img src="{{ URL::asset('/build/images/home-sport/blog-02.jpg')}}" alt="" class="img-fluid">
                        </a>
                        <h6 class="fs-16 mt-3 font-montserrat fw-medium main_link text-truncate"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">5 Tips To Stay Healthy At
                                Home</a></h6>
                        <div class="d-flex gap-1 align-items-center text-muted">
                            On
                            <span class="text-body">September 1, 2024</span>
                        </div>
                        <div class="post-content text-muted mt-3">And now more than ever it’s so important to continue
                            to take care of ourselves and make sure we’re putting extra ca...</div>
                    </div>
                </div><!--end col-->
                <div class="col-md-6 col-lg-4 px-2 px-lg-3">
                    <div class="blog-card">
                        <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                            <img src="{{ URL::asset('/build/images/home-sport/blog-03.jpg')}}" alt="" class="img-fluid">
                        </a>
                        <h6 class="fs-16 mt-3 font-montserrat fw-medium main_link text-truncate"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">10 Minute Fat Burning
                                Workout For Beginners</a></h6>
                        <div class="d-flex gap-1 align-items-center text-muted">
                            On
                            <span class="text-body">September 1, 2024</span>
                        </div>
                        <div class="post-content text-muted mt-3">I know sometimes it can be difficult to keep your
                            healthy nutrition on track, so that’s why I created the Hot Body ...</div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>

    <section class="kalles-glasses-shipping-info">
        <div class="container border-top py-5">
            <div class="row py-2">
                <div class="col-lg-4">
                    <div class="text-center">
                        <i class="las la-truck text-orange fs-48"></i>
                        <h6 class="font-montserrat mt-3">FREE SHIPPING UK&amp;UK</h6>
                        <p class="mb-0 text-muted">Free shipping on all orders above $100</p>
                    </div>
                </div><!--end col-->
                <div class="col-lg-4">
                    <div class="text-center">
                        <i class="las la-headset text-orange fs-48"></i>
                        <h6 class="font-montserrat mt-3">SUPPORT 24/7</h6>
                        <p class="mb-0 text-muted">Contact us 24 hours a day, 7 days a week</p>
                    </div>
                </div><!--end col-->
                <div class="col-lg-4">
                    <div class="text-center">
                        <i class="las la-donate text-orange fs-48"></i>
                        <h6 class="font-montserrat mt-3">30 DAYS MONEY BACK</h6>
                        <p class="mb-0 text-muted">Simply return it within 30 days for an exchange.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </section>
    @include('partials.footer-sport')
    @include('partials.popup')
</div>
    @include('partials.card-model')
    @include('partials.vendor-scripts')
    <script  src="{{ URL::asset('build/libs/flickity/flickity.pkgd.min.js')}}"></script>
    <script  src="{{ URL::asset('build/js/main.js')}}"></script>
    <script  src="{{ URL::asset('build/js/app.js')}}"></script>

</body>

</html>