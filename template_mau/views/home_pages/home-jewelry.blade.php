<!doctype html>
<html lang="en" x-data :dir="$store.appStore.dir" x-cloak>
<head>
    <meta charset="utf-8" />
    <title>Home Jewelry | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="" name="description" />
    <meta content="srbthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/build/images/k_favicon_32x.png')}}">
    @include('partials.head-css')
    </head>
    <body class="" x-data="{ showMenuScroll : false }">
    @include('partials.header-jewelry')
<div class="jewelry-home">
    <!-- main slide -->
    <section class="kalles-home-section type_slideshow type_carousel kalles-medical kalles-jewelry-home overflow-hidden min-vh-100">
        <div class="slideshow" data-flickity='{ "fade":0,"cellAlign": "center","imagesLoaded": 0,"lazyLoad": 0,"freeScroll": 0,"wrapAround": true,"autoPlay" : 0,"pauseAutoPlayOnHover" : true, "rightToLeft": false, "prevNextButtons": false,"pageDots": true, "contain" : 1,"adaptiveHeight" : 1,"dragThreshold" : 5,"percentPosition": 1 }'>
            <!-- first slide -->
            <div class="slideshow__slide">
                <img src="{{ URL::asset('/build/images/home-jewelry/main-slide-01.jpg')}}" alt="" class="position-absolute w-100 h-100 object-fit-cover">
                <div class="container position-relative">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="content text-white">
                                <h5 class="fw-medium fs-18 mb-2">A must-have for any jewellery box</h5>
                                <h1 class="fs-50 fw-semibold mb-4">70% OFF NEW COLLECTIONS</h1>
                                <a class="btn btn-dark rounded-0 min-w-150 min-h-45 d-inline-flex align-items-center justify-content-center fw-semibold px-4" href="{{ url('shop_pages/shop')}}">Explore Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end first slide -->

            <!-- second slide -->
            <div class="slideshow__slide">
                <img src="{{ URL::asset('/build/images/home-jewelry/main-slide-02.jpg')}}" alt="" class="position-absolute w-100 h-100 object-fit-cover">
                <div class="container position-relative">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="content text-center text-white">
                                <h5 class="fw-medium fs-18 mb-2">Autumn-Spring Collections</h5>
                                <h1 class="fs-50 fw-semibold mb-4">WEDDING SEASON 50% OFF</h1>
                                <a class="btn btn-dark rounded-0 min-w-150 min-h-45 d-inline-flex align-items-center justify-content-center fw-semibold px-4" href="{{ url('shop_pages/shop')}}">Discover More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end second slide -->
        </div>
    </section>
    <!-- end main slide -->

    <section class="cat-section pb-4">
        <div class="container">
            <div class="row g-2 g-md-4">
                <div class="col-md-3">
                    <div class="row g-2 g-md-4">
                        <div class="col-6 col-md-12">
                            <a href="{{ url('shop_pages/shop')}}" class="d-block position-relative cat_grid_item overflow-hidden shops-img">
                                <div class="h-100 w-100" style="background-image: url('/build/images/home-jewelry/banner-collection-01.png');background-size: cover;">
                                </div>
                                <div class="cat-grid-button text-white bg-dark">
                                    <div class="cat_grid_item__title">BRACELETS</div>
                                </div>
                            </a>
                        </div><!--end col-->
                        <div class="col-6 col-md-12">
                            <a href="{{ url('shop_pages/shop')}}" class="d-block position-relative cat_grid_item overflow-hidden shops-img">
                                <div class="h-100 w-100" style="background-image: url('/build/images/home-jewelry/banner-collection-05.png');background-size: cover;">
                                </div>
                                <div class="cat-grid-button text-white bg-dark">
                                    <div class="cat_grid_item__title">NECKLACE</div>
                                </div>
                            </a>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end col-->
                <div class="col-md-6">
                    <div class="row g-2 g-md-4">
                        <div class="col-lg-12">
                            <a href="{{ url('shop_pages/shop')}}" class="d-block position-relative cat_grid_item overflow-hidden shops-img">
                                <div class="h-100 w-100" style="background-image: url('/build/images/home-jewelry/banner-collection-02.png'); background-size: contain; background-position: center">
                                </div>
                            </a>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <a href="{{ url('shop_pages/shop')}}" class="d-none d-md-block position-relative cat_grid_item overflow-hidden shops-img">
                                <div class="h-100 w-100" style="background-image: url('/build/images/home-jewelry/banner-collection-04.png'); background-position: center;">
                                </div>
                                <div class="cat-grid-button text-white bg-dark">
                                    <div class="cat_grid_item__title">ENGAGEMENT</div>
                                </div>
                            </a>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end col-->
                <div class="col-md-3 mt-0">
                    <a href="{{ url('shop_pages/shop')}}" class="d-block position-relative cat_grid_item overflow-hidden h-524">
                        <div class="h-100 w-100" style="background-image: url('/build/images/home-jewelry/banner-collection-03.png');background-size: cover;">
                        </div>
                        <div class="cat-grid-button text-white bg-dark">
                            <div class="cat_grid_item__title">ACCESSORIES</div>
                        </div>
                    </a>
                </div><!--end col-->
                <div class="col-lg-12 d-md-none">
                    <a href="{{ url('shop_pages/shop')}}" class="d-block position-relative cat_grid_item overflow-hidden shops-img">
                        <div class="h-100 w-100" style="background-image: url('/build/images/home-jewelry/banner-collection-04.png'); background-position:  center; background-size: cover;">
                        </div>
                        <div class="cat-grid-button text-white bg-dark">
                            <div class="cat_grid_item__title">ENGAGEMENT</div>
                        </div>
                    </a>
                </div>
            </div><!--end row-->
        </div>
    </section><!--end section-->

    <section class="type_tab_collection kalles-glasses-tab-product pb-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-5">
                        <div>
                            <h1 class="position-relative text-capitalize font-playfair fw-medium">
                                <span>Our Best Selling</span>
                            </h1>
                            <span class="dn tt_divider"><span></span><i class="la la-close fs-14 text-muted"></i><span></span></span>
                        </div>
                        <p class="fs-14 text-muted mt-2 mb-0">Discover our best selling items</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="row g-2 g-md-4">
                <div class="col-lg-3 col-6 col-md-4">
                    <div x-data="{ imageUrl: '/build/images/home-jewelry/pr-15.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <span class="onsale position-absolute bg-danger text-white d-flex align-items-center justify-content-center z-3">New</span>
                            <img :src="isHovered ? '/build/images/home-jewelry/pr-16.jpg' : imageUrl" alt="" class="img-fluid w-100">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white m-2" style="z-index: 1;">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <h6 class="mb-1 fs-16 font-playfair"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Glamira - Siplora Ring</a></h6>
                            <p class="mb-0 fs-15 text-muted">
                                <span>$4,800.00</span>
                            </p>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-6 col-md-4">
                    <div x-data="{ imageUrl: '/build/images/home-jewelry/pr-17.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <img :src="isHovered ? '/build/images/home-jewelry/pr-18.jpg' : imageUrl" alt="" class="img-fluid w-100">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white m-2" style="z-index: 1;">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <h6 class="mb-1 fs-16 font-playfair"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Chain Bertha Necklace</a></h6>
                            <p class="mb-0 fs-15 text-muted">
                                <span>$1,225.00</span>
                            </p>
                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-17.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-17.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-18.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-18.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-6 col-md-4">
                    <div x-data="{ imageUrl: '/build/images/home-jewelry/pr-19.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <span class="onsale position-absolute bg-warning text-white d-flex align-items-center justify-content-center z-3">Hot</span>
                            <img :src="isHovered ? '/build/images/home-jewelry/pr-20.jpg' : imageUrl" alt="" class="img-fluid w-100">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>
                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white m-2" style="z-index: 1;">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <h6 class="mb-1 fs-16 font-playfair"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Brigida Diamond Ring</a></h6>
                            <p class="mb-0 fs-15 text-muted">
                                <span>$2,395.00</span>
                            </p>
                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-19.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-19.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-20.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-20.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-31.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-31.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-32.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-32.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-33.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-33.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-6 col-md-4">
                    <div x-data="{ imageUrl: '/build/images/home-jewelry/pr-21.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <img :src="isHovered ? '/build/images/home-jewelry/pr-22.jpg' : imageUrl" alt="" class="img-fluid w-100">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white m-2" style="z-index: 1;">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <h6 class="mb-1 fs-16 font-playfair"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Acennan Ruby Earrings</a></h6>
                            <p class="mb-0 fs-15 text-muted">
                                <span>$899.00 - $905.00</span>
                            </p>
                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-21.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-21.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-22.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-22.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-6 col-md-4">
                    <div x-data="{ imageUrl: '/build/images/home-jewelry/pr-23.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <span class="onsale position-absolute bg-warning text-white d-flex align-items-center justify-content-center z-3">-21%</span>
                            <img :src="isHovered ? '/build/images/home-jewelry/pr-24.jpg' : imageUrl" alt="" class="img-fluid w-100">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white m-2" style="z-index: 1;">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <h6 class="mb-1 fs-16 font-playfair"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Germana Diamond Ring</a></h6>
                            <p class="mb-0 fs-15 text-muted">
                                <span>$3,259.00 - $3,900.00</span>
                            </p>
                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-23.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-23.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-24.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-24.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-34.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-34.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-6 col-md-4">
                    <div x-data="{ imageUrl: '/build/images/home-jewelry/pr-25.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <img :src="isHovered ? '/build/images/home-jewelry/pr-26.jpg' : imageUrl" alt="" class="img-fluid w-100">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white m-2" style="z-index: 1;">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <h6 class="mb-1 fs-16 font-playfair"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Parthenia Earrings</a></h6>
                            <p class="mb-0 fs-15 text-muted">
                                <span>$1,025.00 - $1,245.00</span>
                            </p>
                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-25.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-25.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-26.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-26.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-6 col-md-4">
                    <div x-data="{ imageUrl: '/build/images/home-jewelry/pr-27.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <img :src="isHovered ? '/build/images/home-jewelry/pr-28.jpg' : imageUrl" alt="" class="img-fluid w-100">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white m-2" style="z-index: 1;">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <h6 class="mb-1 fs-16 font-playfair"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Pendant Mecole Necklace</a></h6>
                            <p class="mb-0 fs-15 text-muted">
                                <span>$3,009.00</span>
                            </p>
                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-27.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-27.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-28.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-28.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-35.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-35.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-36.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-36.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-6 col-md-4">
                    <div x-data="{ imageUrl: '/build/images/home-jewelry/pr-40.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <img :src="isHovered ? '/build/images/home-jewelry/pr-30.jpg' : imageUrl" alt="" class="img-fluid w-100">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white m-2" style="z-index: 1;">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <h6 class="mb-1 fs-16 font-playfair"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Cesarina Diamond Ring</a></h6>
                            <p class="mb-0 fs-15 text-muted">
                                <span>$1,575.00</span>
                            </p>
                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-29.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-29.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-30.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-30.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-37.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-37.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-38.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-38.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-39.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-39.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-40.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-40.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </section>

    <div class="banner-section position-relative mt-5 pt-4">
        <div class="container">
            <div class="row g-2 g-md-4">
                <div class="col-lg-6">
                    <a href="#!" class="position-relative hover-zoom d-block">
                        <img src="{{ URL::asset('/build/images/home-jewelry/banner-promotion-01.jpg')}}" alt="" class="img-fluid hover-zoom-img w-100">
                        <div class="position-absolute start-0 start-0 end-0 top-0 bottom-0 d-flex align-items-end m-4 mb-5">
                            <div class="text-white">
                                <h5 class="fs-16 fw-medium">The latest on-trend styles</h5>
                                <h4 class="fs-36 font-playfair fw-semibold mb-4">Check out our latest range</h4>
                                <p class="fw-normal btn btn-dark rounded-0 font-futura mb-0 btn_icon_true d-inline-block position-relative fs-14">
                                    Shop Now</p>
                            </div>
                        </div>
                    </a>
                </div><!--end col-->
                <div class="col-lg-6">
                    <a href="#!" class="position-relative hover-zoom d-block">
                        <img src="{{ URL::asset('/build/images/home-jewelry/banner-promotion-02.jpg')}}" alt="" class="img-fluid hover-zoom-img w-100">
                        <div class="position-absolute top-50 start-50 translate-middle d-flex align-items-center text-center">
                            <div class="text-white">
                                <h5 class="fs-16 fw-medium">Shop our most popular products</h5>
                                <h4 class="fs-36 font-playfair fw-semibold mb-4" style="white-space: nowrap;">Earing Collections</h4>
                                <p class="fw-normal btn btn-dark rounded-0 font-futura mb-0 btn_icon_true d-inline-block position-relative fs-14">
                                    Shop Now</p>
                            </div>
                        </div>
                    </a>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </div><!--end section-->

    <section class="type_tab_collection pt-4 pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-5">
                        <div>
                            <h1 class="position-relative text-capitalize font-playfair fw-medium">
                                <span>Our Trendings</span>
                            </h1>
                            <span class="dn tt_divider"><span></span><i class="la la-close fs-14 text-muted"></i><span></span></span>
                        </div>
                        <p class="fs-14 text-muted mt-2 mb-0">Explore all trending items</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="row g-2 g-md-4">
                <div class="col-lg-3 col-6 col-md-4">
                    <div x-data="{ imageUrl: '/build/images/home-jewelry/pr-41.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <img :src="isHovered ? '/build/images/home-jewelry/pr-42.jpg' : imageUrl" alt="" class="img-fluid w-100">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white m-2" style="z-index: 1;">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <h6 class="mb-1 fs-16 font-playfair"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Patrizia Heart Earrings</a></h6>
                            <p class="mb-0 fs-15 text-muted">
                                <span>$1,245.00</span>
                            </p>
                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-41.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-41.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-42.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-42.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-57.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-57.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-58.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-58.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-6 col-md-4">
                    <div x-data="{ imageUrl: '/build/images/home-jewelry/pr-43.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <img :src="isHovered ? '/build/images/home-jewelry/pr-44.jpg' : imageUrl" alt="" class="img-fluid w-100">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white m-2" style="z-index: 1;">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <h6 class="mb-1 fs-16 font-playfair"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Swarovski Gaby Ring</a></h6>
                            <p class="mb-0 fs-15 text-muted">
                                <span>$309.00</span>
                            </p>
                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-43.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-43.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-44.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-44.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-59.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-59.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-6 col-md-4">
                    <div x-data="{ imageUrl: '/build/images/home-jewelry/pr-45.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <img :src="isHovered ? '/build/images/home-jewelry/pr-46.jpg' : imageUrl" alt="" class="img-fluid w-100">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white m-2" style="z-index: 1;">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <h6 class="mb-1 fs-16 font-playfair"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Arlean Earrings</a></h6>
                            <p class="mb-0 fs-15 text-muted">
                                <span>$899.00 - $935.00</span>
                            </p>
                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-45.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-45.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-46.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-46.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-6 col-md-4">
                    <div x-data="{ imageUrl: '/build/images/home-jewelry/pr-47.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <span class="onsale position-absolute bg-warning text-white d-flex align-items-center justify-content-center z-3">-12%</span>
                            <img :src="isHovered ? '/build/images/home-jewelry/pr-48.jpg' : imageUrl" alt="" class="img-fluid w-100">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white m-2" style="z-index: 1;">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <h6 class="mb-1 fs-16 font-playfair"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Glamira Loberta Ring</a></h6>
                            <p class="mb-0 fs-15 text-muted">
                                <del>$4,200.00</del>
                                <span class="text-danger">$3,699.00</span>
                            </p>
                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-47.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-47.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-48.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-48.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-60.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-60.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-61.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-61.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-62.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-62.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-6 col-md-4">
                    <div x-data="{ imageUrl: '/build/images/home-jewelry/pr-49.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <span class="onsale position-absolute bg-warning text-white d-flex align-items-center justify-content-center z-3">Hot</span>
                            <img :src="isHovered ? '/build/images/home-jewelry/pr-50.jpg' : imageUrl" alt="" class="img-fluid w-100">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white m-2" style="z-index: 1;">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <h6 class="mb-1 fs-16 font-playfair"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Glamira Gratia Ring</a></h6>
                            <p class="mb-0 fs-15 text-muted">
                                <span>$3,600.00</span>
                            </p>
                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-49.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-49.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-50.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-50.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-61.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-61.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-62.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-62.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-6 col-md-4">
                    <div x-data="{ imageUrl: '/build/images/home-jewelry/pr-51.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <img :src="isHovered ? '/build/images/home-jewelry/pr-52.jpg' : imageUrl" alt="" class="img-fluid w-100">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white m-2" style="z-index: 1;">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <h6 class="mb-1 fs-16 font-playfair"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Peridot Ecateri Earrings</a></h6>
                            <p class="mb-0 fs-15 text-muted">
                                <span>$925.00 - $985.00</span>
                            </p>
                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-51.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-51.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-52.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-52.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-6 col-md-4">
                    <div x-data="{ imageUrl: '/build/images/home-jewelry/pr-53.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <span class="onsale position-absolute bg-danger text-white d-flex align-items-center justify-content-center z-3">New</span>
                            <img :src="isHovered ? '/build/images/home-jewelry/pr-54.jpg' : imageUrl" alt="" class="img-fluid w-100">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white m-2" style="z-index: 1;">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <h6 class="mb-1 fs-16 font-playfair"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Glamira - Sekaya Ring</a></h6>
                            <p class="mb-0 fs-15 text-muted">
                                <span>$3,590.00</span>
                            </p>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-6 col-md-4">
                    <div x-data="{ imageUrl: '/build/images/home-jewelry/pr-55.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <img :src="isHovered ? '/build/images/home-jewelry/pr-56.jpg' : imageUrl" alt="" class="img-fluid w-100">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-danger"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white m-2" style="z-index: 1;">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <h6 class="mb-1 fs-16 font-playfair"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Cesarina Diamond Ring</a></h6>
                            <p class="mb-0 fs-15 text-muted">
                                <span>$1,575.00</span>
                            </p>
                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-55.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-55.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-56.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-56.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-65.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-65.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-jewelry/pr-66.jpg'; isHovered = false" style="background-image: url('/build/images/home-jewelry/pr-66.jpg');background-size: cover;" class="d-inline-block rounded-circle"></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </section>

    <section class="kalles-section_type_featured_blog pt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center">
                        <div>
                            <h1 class="position-relative text-capitalize font-playfair fw-medium">
                                <span>From The Blogs</span>
                            </h1>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="row g-2 g-md-4  blog-arrow" data-flickity='{"imagesLoaded": 0, "adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold": 5, "cellAlign": "left", "wrapAround": true, "prevNextButtons": true, "percentPosition": 1, "pageDots": false, "autoPlay": 0, "pauseAutoPlayOnHover": true }' dir="ltr">
                    <div class="col-md-6 col-lg-4 px-2 px-lg-3">
                        <div class="blog-card">
                            <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                                <img src="{{ URL::asset('/build/images/home-jewelry/blog-01.jpg')}}" alt="" class="img-fluid">
                            </a>
                            <div class="d-flex gap-1 align-items-center text-muted my-3">
                                On
                                <span class="text-body">September 10, 2024</span>
                            </div>
                            <h6 class="fs-17 font-playfair fw-medium main_link"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">Unique First
                                    Anniversary Gift Ideas</a></h6>
                            <div class="post-content text-muted mt-3">If you’ve been faced with the decision to
                                reschedule or cancel your 2020 wedding, you’re not alone. If only th...</div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-6 col-lg-4 px-2 px-lg-3">
                        <div class="blog-card">
                            <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                                <img src="{{ URL::asset('/build/images/home-jewelry/blog-02.jpg')}}" alt="" class="img-fluid">
                            </a>
                            <div class="d-flex gap-1 align-items-center text-muted my-3">
                                On
                                <span class="text-body">September 10, 2024</span>
                            </div>
                            <h6 class="fs-17 font-playfair fw-medium main_link"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">Glossary Of Jewelry
                                    Terms</a></h6>
                            <div class="post-content text-muted mt-3">IS TROILITE IN METEORITE AN IMPERFECTION? This
                                depends entirely on who you ask. And could potentially lead into a h...</div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-6 col-lg-4 px-2 px-lg-3">
                        <div class="blog-card">
                            <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                                <img src="{{ URL::asset('/build/images/home-jewelry/blog-03.jpg')}}" alt="" class="img-fluid">
                            </a>
                            <div class="d-flex gap-1 align-items-center text-muted my-3">
                                On
                                <span class="text-body">September 10, 2024</span>
                            </div>
                            <h6 class="fs-17 font-playfair fw-medium main_link"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">Covid-19 Wedding
                                    Planning Advice</a></h6>
                            <div class="post-content text-muted mt-3">The sad reality is that some of us are losing very
                                important people in our lives, including partners of many y...</div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
    </section>

    <section class="overflow-hidden">
        <div class="container-fuild px-0">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center mb-4">
                        <div>
                            <h3 class="position-relative flex font-playfair fw-semibold fs-30 text-uppercase">
                                <span>@ FOLLOW US ON INSTAGRAM</span>
                            </h3>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="row g-0" data-flickity='{"imagesLoaded": 0,"adaptiveHeight": 1, "contain": 1, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": false,"prevNextButtons": true,"percentPosition": 1,"pageDots": false, "autoPlay" : 0, "pauseAutoPlayOnHover" : true, "rightToLeft": false }' dir="ltr">
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="overflow-hidden img-zoom">
                        <img src="{{ URL::asset('/build/images/home-jewelry/instagram-01.jpg')}}" alt="" class="w-100 img-fluid h-100">
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="overflow-hidden img-zoom">
                        <img src="{{ URL::asset('/build/images/home-jewelry/instagram-02.jpg')}}" alt="" class="w-100 img-fluid h-100">
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="overflow-hidden img-zoom">
                        <img src="{{ URL::asset('/build/images/home-jewelry/instagram-03.jpg')}}" alt="" class="w-100 img-fluid h-100">
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="overflow-hidden img-zoom">
                        <img src="{{ URL::asset('/build/images/home-jewelry/instagram-04.jpg')}}" alt="" class="w-100 img-fluid h-100">
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="overflow-hidden img-zoom">
                        <img src="{{ URL::asset('/build/images/home-jewelry/instagram-05.jpg')}}" alt="" class="w-100 img-fluid h-100">
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="overflow-hidden img-zoom">
                        <img src="{{ URL::asset('/build/images/home-jewelry/instagram-06.jpg')}}" alt="" class="w-100 img-fluid h-100">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="kalles-section-type-shipping">
        <div class="container">
            <div class="gap-4 d-flex overflow-x-auto" style="white-space: nowrap;">
                <div class="d-flex gap-3">
                    <i class="pegk pe-7s-car fs-36 text-muted flex-shrink-0"></i>
                    <div class="flex-grow-1">
                        <h6 class="text-uppercase font-playfair">Free Shipping</h6>
                        <p class="text-muted mb-0">Free shipping on all US order or <br /> order above $100</p>
                    </div>
                </div>
                <div class="d-flex gap-3">
                    <i class="pegk pe-7s-help2 fs-36 text-muted flex-shrink-0"></i>
                    <div class="flex-grow-1">
                        <h6 class="text-uppercase font-playfair">Support 24/7</h6>
                        <p class="text-muted mb-0">Contact us 24 hours a day, 7 <br /> days a week</p>
                    </div>
                </div>
                <div class="d-flex gap-3">
                    <i class="pegk pe-7s-refresh fs-36 text-muted flex-shrink-0"></i>
                    <div class="flex-grow-1">
                        <h6 class="text-uppercase font-playfair">30 Days Return</h6>
                        <p class="text-muted mb-0">Simply return it within 30 days <br /> for an exchange.</p>
                    </div>
                </div>
                <div class="d-flex gap-3">
                    <i class="pegk pe-7s-door-lock fs-36 text-muted flex-shrink-0"></i>
                    <div class="flex-grow-1">
                        <h6 class="text-uppercase font-playfair">100% Payment Secure</h6>
                        <p class="text-muted mb-0">We ensure secure payment with <br /> PEV</p>
                    </div>
                </div>

            </div><!--end row-->
        </div><!--end container-->
    </div><!--end shipping-->

    @include('partials.footer')
    @include('partials.popup')
</div>
    @include('partials.card-model')
    @include('partials.vendor-scripts')
    <script src="{{ URL::asset('build/libs/flickity/flickity.pkgd.min.js')}}"></script>
    <script src="{{ URL::asset('build/js/main.js')}}"></script>
    <script src="{{ URL::asset('build/js/app.js')}}"></script>
</body>
</html>