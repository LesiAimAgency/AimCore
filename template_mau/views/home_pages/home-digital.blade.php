<!doctype html>
<html lang="en" x-data :dir="$store.appStore.dir" x-cloak>
<head>
    <meta charset="utf-8" />
    <title>Home Digital | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="" name="description" />
    <meta content="srbthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/build/images/k_favicon_32x.png')}}">
    @include('partials.head-css')
   </head>
<!--head banner-->
<div x-data="{ isOpen: true }" class="navbar-digital">
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
 @include('partials.header-digital')
<div>
    <!-- main slide -->
    <section class="kalles-home-section type_slideshow type_carousel kalles-medical kalles-digital overflow-hidden" dir="ltr">
        <div class="slideshow" data-flickity='{ "fade":0,"cellAlign": "center","imagesLoaded": 0,"lazyLoad": 0,"freeScroll": 0,"wrapAround": true,"autoPlay" : 0,"pauseAutoPlayOnHover" : true, "rightToLeft": false, "prevNextButtons": false,"pageDots": true, "contain" : 1,"adaptiveHeight" : 1,"dragThreshold" : 5,"percentPosition": 1 }'>
            <!-- first slide -->
            <div class="slideshow__slide">
                <img src="{{ URL::asset('/build/images/home-digital/main-slide.jpg')}}" alt="" class="d-none d-md-block position-absolute w-100 h-100 object-fit-cover">
                <div class="container position-relative">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="content text-center text-sm-start">
                                <h5 class="fw-medium fs-18 mb-2">SUMMER 2024</h5>
                                <h1 class=" lh-base mb-1 ">Meet Galaxy S20, S20+</h1>
                                <h5 class="mb-4 fs-22">This is the phone that will change photography</h5>
                                <a class="btn btn-dark text-white rounded-pill min-w-150 min-h-45 d-inline-flex align-items-center justify-content-center fw-semibold px-4" href="{{ url('shop_pages/shop')}}">Explore Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end first slide -->

            <!-- second slide -->
            <div class="slideshow__slide">
                <img src="{{ URL::asset('/build/images/home-digital/main-slide.jpg')}}" alt="" class="d-none d-md-block position-absolute w-100 h-100 object-fit-cover">
                <div class="container position-relative">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="content">
                                <h5 class="fw-medium fs-18 mb-2">SUMMER 2024</h5>
                                <h1 class="fs-55 lh-base mb-1">Meet Galaxy S20, S20+</h1>
                                <h5 class="mb-4 fs-22">This is the phone that will change photography</h5>
                                <a class="btn btn-dark text-white rounded-pill min-w-150 min-h-45 d-inline-flex align-items-center justify-content-center fw-semibold px-4" href="{{ url('shop_pages/shop')}}">Explore Now</a>
                            </div>
                        </div>
                        <!-- <div class="col-12">
                            <img src="{{ URL::asset('/build/images/home-digital/main-slide.jpg')}}" alt="" class="d-md-none img-fluid w-100" style="width: 720px;">
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- end second slide -->
        </div>
    </section>
    <!-- end main slide -->

    <section>
        <div class="container border-bottom border-top py-4">
            <div class="row g-2">
                <div class=" col-sm-4">
                    <div class="text-center">
                        <img src="{{ URL::asset('/build/images/home-digital/shp-inf-01.png')}}" alt="" class="img-fluid square-sm">
                        <h6 class="mt-2">FREE SHIPPING</h6>
                    </div>
                </div><!--end col-->
                <div class=" col-sm-4">
                    <div class="text-center">
                        <img src="{{ URL::asset('/build/images/home-digital/shp-inf-02.png')}}" alt="" class="img-fluid square-sm">
                        <h6 class="mt-2">SUPPORT 24/7</h6>
                    </div>
                </div><!--end col-->
                <div class=" col-sm-4">
                    <div class="text-center">
                        <img src="{{ URL::asset('/build/images/home-digital/shp-inf-03.png')}}" alt="" class="img-fluid square-sm">
                        <h6 class="mt-2">30 DAYS RETURN</h6>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </section>

    <div class="banner-section position-relative py-4 my-2" dir="ltr">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6">
                    <a href="{{ url('shop_pages/shop')}}" class="position-relative hover-zoom d-block">
                        <img src="{{ URL::asset('/build/images/home-digital/grid-banner-01.jpg')}}" alt="" class="img-fluid hover-zoom-img">
                        <div class="position-absolute start-0 start-0 end-0 top-0 bottom-0 d-flex align-items-center">
                            <div class="m-3 m-sm-4 px-sm-3 text-body">
                                <h4 class="fs-30">Galaxy S10 Lite</h4>
                                <h6 class="mb-4 fs-16">Save up to 25%</h6>
                                <p class="btn text-dark fw-semibold border border-2 border-dark rounded-pill min-w-150">
                                    Buy Now</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="{{ url('shop_pages/shop')}}" class="position-relative hover-zoom d-block">
                        <img src="{{ URL::asset('/build/images/home-digital/grid-banner-02.jpg')}}" alt="" class="img-fluid hover-zoom-img">
                        <div class="position-absolute start-0 start-0 end-0 top-0 bottom-0 d-flex align-items-center">
                            <div class="m-3 m-sm-4 px-sm-3 text-body">
                                <h4 class="fs-30" style="white-space: nowrap;">New SmartWatch</h4>
                                <h6 class="mb-4 fs-16">Save up to 35%</h6>
                                <p class="btn text-dark fw-semibold border border-2 border-dark rounded-pill min-w-150">
                                    Buy Now</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="{{ url('shop_pages/shop')}}" class="position-relative hover-zoom d-block">
                        <img src="{{ URL::asset('/build/images/home-digital/grid-banner-03.jpg')}}" alt="" class="img-fluid hover-zoom-img ">
                        <div class="position-absolute start-0 start-0 end-0 top-0 bottom-0 d-flex align-items-center">
                            <div class="m-3 m-sm-4 px-sm-3 text-body">
                                <h4 class="fs-30">Dell XPS 2020</h4>
                                <h6 class="mb-4 fs-16">Engineered to run on ultra-fast <br> networks.</h6>
                                <p class="btn text-dark fw-semibold border border-2 border-dark rounded-pill min-w-150">
                                    Buy Now</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="{{ url('shop_pages/shop')}}" class="position-relative hover-zoom d-block">
                        <img src="{{ URL::asset('/build/images/home-digital/grid-banner-04.jpg')}}" alt="" class="img-fluid hover-zoom-img ">
                        <div class="position-absolute start-0 start-0 end-0 top-0 bottom-0 d-flex align-items-center">
                            <div class="m-3 m-sm-4 px-sm-3 text-body">
                                <h4 class="fs-30">Save up to</h4>
                                <h6 class="mb-4 fs-16">Plus earn 2% back in Kalles <br> rewards.</h6>
                                <p class="btn text-dark fw-semibold border border-2 border-dark rounded-pill min-w-150">
                                    Buy Now</p>
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
                    <div class="text-center mb-4">
                        <div>
                            <h3 class="position-relative text-capitalize fs-24">
                                <span>Best Selling</span>
                            </h3>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="row g-4">
                <div class="col-lg-3 col-6 col-md-4">
                    <div x-data="{ imageUrl: '/build/images/home-digital/pr-01.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden main">
                            <span class="new-label bg-indigo text-white rounded-circle text-center"> -24% </span>
                            <img :src="isHovered ? '/build/images/home-digital/pr-02.jpg' : imageUrl" alt="" class="img-fluid">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">Video & Air Quality Monitor</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <del>$312.00</del>
                                <span class="text-danger">$239.00</span>
                            </p>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-6 col-md-4">
                    <div x-data="{ imageUrl: '/build/images/home-digital/pr-03.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden main">
                            <img :src="isHovered ? '/build/images/home-digital/pr-04.jpg' : imageUrl" alt="" class="img-fluid">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">X-Star Premium Drone with 4K Camera</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <span>$450.00</span>
                            </p>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-6 col-md-4">
                    <div x-data="{ imageUrl: '/build/images/home-digital/pr-05.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden main">
                            <span class="new-label bg-indigo text-white rounded-circle text-center"> -10% </span>
                            <img :src="isHovered ? '/build/images/home-digital/pr-06.jpg' : imageUrl" alt="" class="img-fluid">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">Digital 20.1 4K Video</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <del>$440.00</del>
                                <span class="text-danger">$400.00</span>
                            </p>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-6 col-md-4">
                    <div x-data="{ imageUrl: '/build/images/home-digital/pr-07.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden main">
                            <span class="new-label bg-indigo text-white rounded-circle text-center"> -28% </span>
                            <img :src="isHovered ? '/build/images/home-digital/pr-08.jpg' : imageUrl" alt="" class="img-fluid">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">On-ear Wireless NXTG</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <del>$312.00</del>
                                <span class="text-danger">$225.00</span>
                            </p>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-6 col-md-4">
                    <div x-data="{ imageUrl: '/build/images/home-digital/pr-09.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden main">
                            <img :src="isHovered ? '/build/images/home-digital/pr-10.jpg' : imageUrl" alt="" class="img-fluid">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">Wireless Multiroom Speaker</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <span>$250.00</span>
                            </p>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-6 col-md-4">
                    <div x-data="{ imageUrl: '/build/images/home-digital/pr-11.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden main">
                            <span class="new-label bg-indigo text-white rounded-circle text-center"> -9% </span>
                            <img :src="isHovered ? '/build/images/home-digital/pr-12.jpg' : imageUrl" alt="" class="img-fluid">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">Smart Watches 4</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <del>$350.00</del>
                                <span class="text-danger">$320.00</span>
                            </p>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-6 col-md-4">
                    <div x-data="{ imageUrl: '/build/images/home-digital/pr-13.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden main">
                            <span class="new-label bg-indigo text-white rounded-circle text-center"> -19% </span>
                            <img :src="isHovered ? '/build/images/home-digital/pr-14.jpg' : imageUrl" alt="" class="img-fluid">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">Camera TZ85 optical 30 white DMC-TZ85</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <del>$550.00</del>
                                <span class="text-danger">$450.00</span>
                            </p>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-6 col-md-4">
                    <div x-data="{ imageUrl: '/build/images/home-digital/pr-15.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden main">
                            <img :src="isHovered ? '/build/images/home-digital/pr-16.jpg' : imageUrl" alt="" class="img-fluid">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">X70 Digital Camera White</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <span>$350.00</span>
                            </p>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </section><!--end section-->

    <section class="py-5 my-3">
        <div class="container">
            <div class="row align-items-center">
                <div class=" col-lg-4">
                    <a href="#!" class="kalles-banner-promotion d-block">
                        <img src="{{ URL::asset('/build/images/home-digital/banner-countdown-left.jpg')}}" alt="" class="img-fluid">
                        <div class="p-20 position-absolute top-50 end-0 text-end translate-middle-y text-body">
                            <p class="text-uppercase fw-medium fs-18 mb-1">WORK AT HOME SALE</p>
                            <h3 class="fs-50">70%</h3>
                            <button class="btn btn-outline-dark rounded-pill min-w-150">Get it Now</button>
                        </div>
                    </a>
                </div><!--end col-->
                <div class=" col-lg-4">
                    <div x-data="{ imageUrl: '/build/images/home-digital/pr-17.jpg' }" class="kalles-banner-promotion topbar-product-card">
                        <div class="position-relative overflow-hidden">
                            <img :src="imageUrl" alt="" class="img-fluid">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                            <div class="product-size text-center d-none d-lg-block">
                                <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link">La Bohème
                                        Rose Gold</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <del>$60.00</del>
                                    <span class="text-danger">$45.00</span>
                                </p>
                                <div class="product-color-list mt-1 gap-2 d-flex align-items-center justify-content-center p-2">
                                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/home-classic/pr-big-24.jpg'" x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-big-24.jpg'" class="d-inline-block bg_color_pink rounded-circle"></a>
                                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/home-classic/pr-big-25.jpg'" x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-big-25.jpg'" class="d-inline-block bg-dark rounded-circle"></a>
                                </div>
                            </div>
                            <div class="count-time d-none d-lg-block" data-date="10-10-2028">
                                <ul class="list-unstyled d-flex gap-2 align-items-center text-center justify-content-center mb-0">
                                    <li class="bg-dark text-white text-white-50 fs-12 rounded"><span class="days text-white fs-14">0</span>days</li>
                                    <li class="bg-dark text-white text-white-50 fs-12 rounded"><span class="text-white fs-14">00</span>Hours</li>
                                    <li class="bg-dark text-white text-white-50 fs-12 rounded"><span class="min text-white fs-14">00</span>Minutes</li>
                                    <li class="bg-dark text-white text-white-50 fs-12 rounded"><span class="sc text-white fs-14">00</span>Seconds</li>
                                </ul>
                            </div>
                        </div>
                        <div class="d-lg-none">
                            <div class="text-center mt-3">
                                <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link">La Bohème
                                        Rose Gold</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <del>$60.00</del>
                                    <span class="text-danger">$45.00</span>
                                </p>
                                <div class="product-color-list mt-1 gap-2 d-flex align-items-center justify-content-center p-2">
                                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/home-classic/pr-big-24.jpg'" x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-big-24.jpg'" class="d-inline-block bg_color_pink rounded-circle"></a>
                                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/home-classic/pr-big-25.jpg'" x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-big-25.jpg'" class="d-inline-block bg-dark rounded-circle"></a>
                                </div>
                            </div>
                            <div class="count-time position-relative mt-4 d-lg-block d-none" data-date="10-10-2028">
                                <ul class="list-unstyled d-flex gap-2 align-items-center text-center justify-content-center mb-0">
                                    <li class="bg-dark text-white text-white-50 fs-12 rounded" style="min-width: 50px;"><span class="days text-white fs-14">0</span>days</li>
                                    <li class="bg-dark text-white text-white-50 fs-12 rounded" style="min-width: 50px;"><span class=" text-white fs-14">00</span>Hours</li>
                                    <li class="bg-dark text-white text-white-50 fs-12 rounded" style="min-width: 50px;"><span class="min text-white fs-14">00</span>Minutes</li>
                                    <li class="bg-dark text-white text-white-50 fs-12 rounded" style="min-width: 50px;"><span class="sc text-white fs-14">00</span>Seconds</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-4">
                    <a href="#!" class="kalles-banner-promotion d-block">
                        <img src="{{ URL::asset('/build/images/home-digital/banner-countdown-right.jpg')}}" alt="" class="img-fluid">
                        <div class="p-20 position-absolute top-50 end-0 text-body start-0 content-position text-center">
                            <p class="text-uppercase fw-medium fs-18 mb-1">SUMMER SALE</p>
                            <h3 class="fs-50">UP TO 30%</h3>
                            <button class="btn btn-outline-dark rounded-pill min-w-150">Shop Now</button>
                        </div>
                    </a>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>

    <section class="type_tab_collection kalles-glasses-tab-product pb-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center mb-3">
                        <div class="mb-2">
                            <h3 class="position-relative flex fw-semibold">
                                <span>Featured Collection</span>
                            </h3>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="mb-4 pb-3">
                <ul class="nav tab_header gap-lg-4 justify-content-center mt-4 mb-0" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill active" id="accessories-tab" data-bs-toggle="pill" data-bs-target="#accessories" type="button" role="tab" aria-controls="accessories" aria-selected="true">Accessories</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill" id="smart-tv-tab" data-bs-toggle="pill" data-bs-target="#smart-tv" type="button" role="tab" aria-controls="smart-tv" aria-selected="false" tabindex="-1">Smart TV</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill" id="camera-tab" data-bs-toggle="pill" data-bs-target="#camera" type="button" role="tab" aria-controls="camera" aria-selected="false" tabindex="-1">Camera</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill" id="digital-tab" data-bs-toggle="pill" data-bs-target="#digital" type="button" role="tab" aria-controls="digital" aria-selected="false" tabindex="-1">Digital</button>
                    </li>
                </ul>
            </div>
            <div class="tab-content mt-4" id="pills-tabContent">
                <div class="tab-pane fade show active" id="accessories" role="tabpanel" aria-labelledby="accessories-tab" tabindex="0">
                    <div class="row g-4 row-cols-2 row-cols-sm-3 row-cols-lg-4">
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-11.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <span class="new-label bg-indigo text-white rounded-circle text-center"> -9% </span>
                                    <img :src="isHovered ? '/build/images/home-digital/pr-12.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">Smart Watches 4</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$350.00</del>
                                        <span class="text-danger">$320.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-09.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-digital/pr-10.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">Wireless Multiroom Speaker</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$250.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-19.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-digital/pr-20.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">ZenBook 3 Ultrabook 8GB 512SSD</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$250.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-03.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-digital/pr-04.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">X-Star Premium Drone with 4K Camera</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$450.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-07.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <span class="new-label bg-indigo text-white rounded-circle text-center"> -28%
                                    </span>
                                    <img :src="isHovered ? '/build/images/home-digital/pr-08.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">On-ear Wireless NXTG</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$312.00</del>
                                        <span class="text-danger">$225.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-22.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-digital/pr-21.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">XPS 13 Laptop 6GB W10</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$1,115.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-23.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <span class="new-label bg-indigo text-white rounded-circle text-center"> -69%
                                    </span>
                                    <img :src="isHovered ? '/build/images/home-digital/pr-24.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">Gear Virtual Reality 3D</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$312.00</del>
                                        <span class="text-danger">$99.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-25.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <span class="new-label bg-indigo text-white rounded-circle text-center"> -24%
                                    </span>
                                    <img :src="isHovered ? '/build/images/home-digital/pr-26.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">XPS 13 Laptop 6GB W10 Infinity Edge Display</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$312.00</del>
                                        <span class="text-danger">$239.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
                <div class="tab-pane fade" id="smart-tv" role="tabpanel" aria-labelledby="smart-tv-tab" tabindex="0">
                    <div class="row g-4 row-cols-2 row-cols-sm-3 row-cols-lg-4">
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-11.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <span class="new-label bg-indigo text-white rounded-circle text-center"> -9% </span>
                                    <img :src="isHovered ? '/build/images/home-digital/pr-12.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">Smart Watches 4</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$350.00</del>
                                        <span class="text-danger">$320.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-09.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-digital/pr-10.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">Wireless Multiroom Speaker</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$250.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-19.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-digital/pr-20.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">ZenBook 3 Ultrabook 8GB 512SSD</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$250.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-03.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-digital/pr-04.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">X-Star Premium Drone with 4K Camera</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$450.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-07.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <span class="new-label bg-indigo text-white rounded-circle text-center"> -28%
                                    </span>
                                    <img :src="isHovered ? '/build/images/home-digital/pr-08.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">On-ear Wireless NXTG</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$312.00</del>
                                        <span class="text-danger">$225.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-22.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-digital/pr-21.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">XPS 13 Laptop 6GB W10</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$1,115.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-23.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <span class="new-label bg-indigo text-white rounded-circle text-center"> -69%
                                    </span>
                                    <img :src="isHovered ? '/build/images/home-digital/pr-24.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">Gear Virtual Reality 3D</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$312.00</del>
                                        <span class="text-danger">$99.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-25.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <span class="new-label bg-indigo text-white rounded-circle text-center"> -24%
                                    </span>
                                    <img :src="isHovered ? '/build/images/home-digital/pr-26.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">XPS 13 Laptop 6GB W10 Infinity Edge Display</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$312.00</del>
                                        <span class="text-danger">$239.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
                <div class="tab-pane fade" id="camera" role="tabpanel" aria-labelledby="camera-tab" tabindex="0">
                    <div class="row g-4 row-cols-2 row-cols-sm-3 row-cols-lg-4">
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-11.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <span class="new-label bg-indigo text-white rounded-circle text-center"> -9% </span>
                                    <img :src="isHovered ? '/build/images/home-digital/pr-12.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">Smart Watches 4</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$350.00</del>
                                        <span class="text-danger">$320.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-09.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-digital/pr-10.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">Wireless Multiroom Speaker</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$250.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-19.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-digital/pr-20.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">ZenBook 3 Ultrabook 8GB 512SSD</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$250.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-03.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-digital/pr-04.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">X-Star Premium Drone with 4K Camera</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$450.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-07.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <span class="new-label bg-indigo text-white rounded-circle text-center"> -28%
                                    </span>
                                    <img :src="isHovered ? '/build/images/home-digital/pr-08.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">On-ear Wireless NXTG</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$312.00</del>
                                        <span class="text-danger">$225.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-22.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-digital/pr-21.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">XPS 13 Laptop 6GB W10</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$1,115.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-23.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <span class="new-label bg-indigo text-white rounded-circle text-center"> -69%
                                    </span>
                                    <img :src="isHovered ? '/build/images/home-digital/pr-24.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">Gear Virtual Reality 3D</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$312.00</del>
                                        <span class="text-danger">$99.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-25.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <span class="new-label bg-indigo text-white rounded-circle text-center"> -24%
                                    </span>
                                    <img :src="isHovered ? '/build/images/home-digital/pr-26.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">XPS 13 Laptop 6GB W10 Infinity Edge Display</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$312.00</del>
                                        <span class="text-danger">$239.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
                <div class="tab-pane fade" id="digital" role="tabpanel" aria-labelledby="digital-tab" tabindex="0">
                    <div class="row g-4 row-cols-2 row-cols-sm-3 row-cols-lg-4">
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-11.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <span class="new-label bg-indigo text-white rounded-circle text-center"> -9% </span>
                                    <img :src="isHovered ? '/build/images/home-digital/pr-12.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">Smart Watches 4</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$350.00</del>
                                        <span class="text-danger">$320.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-09.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-digital/pr-10.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">Wireless Multiroom Speaker</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$250.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-19.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-digital/pr-20.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">ZenBook 3 Ultrabook 8GB 512SSD</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$250.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-03.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-digital/pr-04.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">X-Star Premium Drone with 4K Camera</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$450.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-07.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <span class="new-label bg-indigo text-white rounded-circle text-center"> -28%
                                    </span>
                                    <img :src="isHovered ? '/build/images/home-digital/pr-08.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">On-ear Wireless NXTG</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$312.00</del>
                                        <span class="text-danger">$225.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-22.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-digital/pr-21.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">XPS 13 Laptop 6GB W10</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$1,115.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-23.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <span class="new-label bg-indigo text-white rounded-circle text-center"> -69%
                                    </span>
                                    <img :src="isHovered ? '/build/images/home-digital/pr-24.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">Gear Virtual Reality 3D</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$312.00</del>
                                        <span class="text-danger">$99.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-digital/pr-25.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <span class="new-label bg-indigo text-white rounded-circle text-center"> -24%
                                    </span>
                                    <img :src="isHovered ? '/build/images/home-digital/pr-26.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1)">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-semibold fs-14"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_blue">XPS 13 Laptop 6GB W10 Infinity Edge Display</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$312.00</del>
                                        <span class="text-danger">$239.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
            </div>
        </div>
    </section>

    <section class="kalles-section_type_featured_blog kalles-decor-02-blog-post">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center mb-4 pb-2">
                        <div class="mb-2">
                            <h3 class="position-relative flex">
                                <span>Blog posts</span>
                            </h3>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="row g-4 blog-arrow">
                <div class="col-md-6 col-lg-4 px-2 px-lg-3">
                    <div class="blog-card">
                        <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                            <img src="{{ URL::asset('/build/images/home-digital/blog-01.jpg')}}" alt="" class="blog-img object-fit-cover w-100">
                        </a>
                        <h6 class="fs-16 mt-3 main_link"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">Style for couple in Weeding season</a></h6>
                        <div class="d-flex gap-1 align-items-center text-muted">
                            <span class="me-1">By <span class="text-body">John Doe</span></span>
                            On
                            <span class="text-body">May 22, 2024</span>
                        </div>
                        <div class="post-content text-muted mt-3">Typography is the work of typesetters, compositors,
                            typographers, graphic designers, art directors, manga artists,...</div>
                    </div>
                </div><!--end col-->
                <div class="col-md-6 col-lg-4 px-2 px-lg-3">
                    <div class="blog-card">
                        <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                            <img src="{{ URL::asset('/build/images/home-digital/blog-02.jpg')}}" alt="" class="blog-img object-fit-cover w-100">
                        </a>
                        <h6 class="fs-16 mt-3 main_link"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">The Easiest Way to Break Out on Top</a></h6>
                        <div class="d-flex gap-1 align-items-center text-muted">
                            <span class="me-1">By <span class="text-body">John Doe</span></span>
                            On
                            <span class="text-body">May 22, 2024</span>
                        </div>
                        <div class="post-content text-muted mt-3">Typography is the work of typesetters, compositors,
                            typographers, graphic designers, art directors, manga artists, ...</div>
                    </div>
                </div><!--end col-->
                <div class="col-md-6 col-lg-4 px-2 px-lg-3">
                    <div class="blog-card">
                        <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                            <img src="{{ URL::asset('/build/images/home-digital/blog-03.jpg')}}" alt="" class="blog-img object-fit-cover w-100">
                        </a>
                        <h6 class="fs-16 mt-3 main_link"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">SPRING – SUMMER TRENDING 2020</a></h6>
                        <div class="d-flex gap-1 align-items-center text-muted">
                            <span class="me-1">By <span class="text-body">John Doe</span></span>
                            On
                            <span class="text-body">May 22, 2024</span>
                        </div>
                        <div class="post-content text-muted mt-3">Typography is the work of typesetters, compositors,
                            typographers, graphic designers, art directors, manga artists, ...</div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
    @include('partials.footer-digital')
    @include('partials.popup')
</div>
    @include('partials.card-model')     
    @include('partials.vendor-scripts')
    <script src="{{ URL::asset('build/libs/flickity/flickity.pkgd.min.js')}}"></script>
    <script src="{{ URL::asset('build/js/main.js')}}"></script>
    <script src="{{ URL::asset('build/js/app.js')}}"></script>
</body>
</html>