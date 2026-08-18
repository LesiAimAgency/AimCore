   <!doctype html>
   <html lang="en" x-data :dir="$store.appStore.dir" x-cloak>

   <head>
       <meta charset="utf-8" />
       <title>Home Cosmetics | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme</title>
       <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
       <meta content="" name="description" />
       <meta content="srbthemes" name="author" />
       <!-- App favicon -->
       <link rel="shortcut icon" href="{{ URL::asset('/build/images/k_favicon_32x.png')}}">
       @yield('css')
       @include('partials.head-css')
   </head>

   <body class="wrapper_cus">

       @include('partials.top-banner-cosmetics')
       @include('partials.header-cosmetics')

       <div>
           <!-- main slide -->
           <section
               class="kalles-home-section type_slideshow type_carousel kalles-medical kalles-cosmetics overflow-hidden">
               <div class="slideshow"
                   data-flickity='{ "fade":0,"cellAlign": "center","imagesLoaded": 0,"lazyLoad": 0,"freeScroll": 0,"wrapAround": true,"autoPlay" : 0,"pauseAutoPlayOnHover" : true, "rightToLeft": false, "prevNextButtons": false,"pageDots": true, "contain" : 1,"adaptiveHeight" : 1,"dragThreshold" : 5,"percentPosition": 1 }'>
                   <!-- first slide -->
                   <div class="slideshow__slide">
                       <img src="{{ URL::asset('/build/images/home-cosmetics/main-slide-01.jpg')}}" alt=""
                           class="position-absolute w-100 h-100 object-fit-cover">
                       <div class="container position-relative">
                           <div class="row">
                               <div class="col-lg-4 offset-md-1">
                                   <div class="content">
                                       <h5 class="text-uppercase fs-13 text-lima ls-normal">NEW PRODUCT</h5>
                                       <h1 class="fs-55 font-playfair fw-semibold text-lima mb-3">Free Cleanser <br>
                                           Goodness</h1>
                                       <a class="btn btn-cosmetics d-inline-flex align-items-center justify-content-center rounded-0 text-uppercase  text-lima"
                                           href="{{ url('shop_pages/shop')}}">Shop Now</a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <!-- second slide -->
                   <div class="slideshow__slide">
                       <img src="{{ URL::asset('/build/images/home-cosmetics/main-slide-03.jpg')}}" alt=""
                           class="position-absolute w-100 h-100 object-fit-cover">
                       <div class="container position-relative">
                           <div class="row">
                               <div class="col-lg-4 offset-md-2">
                                   <div class="content">
                                       <h5 class="text-uppercase fs-13 text-white ls-normal">NEW COLLECTION</h5>
                                       <h1 class="fs-55 font-playfair fw-semibold text-white mb-3">Green Tea <br> Seed
                                           Serum</h1>
                                       <a class="btn btn-cosmetics d-inline-flex align-items-center justify-content-center rounded-0 text-uppercase  text-lima"
                                           href="{{ url('shop_pages/shop')}}">Shop Now</a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>

                   <!-- third slide -->
                   <div class="slideshow__slide">
                       <img src="{{ URL::asset('/build/images/home-cosmetics/main-slide-02.jpg')}}" alt=""
                           class="position-absolute w-100 h-100 object-fit-cover">
                       <div class="container position-relative">
                           <div class="row justify-content-center">
                               <div class="col-lg-6">
                                   <div class="content text-center">
                                       <h5 class="text-uppercase fs-13 text-white ls-normal">NEW COLLECTION</h5>
                                       <h1 class="fs-55 font-playfair fw-semibold text-white mb-3">UV Protection Cream
                                       </h1>
                                       <a class="btn btn-cosmetics d-inline-flex align-items-center justify-content-center rounded-0 text-uppercase  text-lima"
                                           href="{{ url('shop_pages/shop')}}">Shop Now</a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <!-- end third slide -->
               </div>
           </section>
           <!-- end main slide -->

           <section class="kalles-cosmetics-trending-products pb-4">
               <div class="container">
                   <div class="row justify-content-center">
                       <div class="col-lg-8">
                           <div class="text-center mb-4">
                               <div>
                                   <h1 class="position-relative text-capitalize font-playfair text-lima fw-medium">
                                       <span>Now Trending</span>
                                   </h1>
                                   <span class="dn tt_divider"><span></span><i
                                           class="la la-spa text-muted"></i><span></span></span>
                               </div>
                           </div>
                       </div><!--end col-->
                   </div><!--end row-->
                   <div class="row my-4 py-2"
                       data-flickity='{"imagesLoaded": 0,"adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": 1,"pageDots": false, "autoPlay" : 0, "pauseAutoPlayOnHover" : true, "rightToLeft": false }'>
                       <div class="col-lg-3 col-md-3 col-6 px-12">
                           <div x-data="{ imageUrl: '/build/images/home-cosmetics/pr-13.jpg', isHovered: false }" class="topbar-product-card overlay-hover"
                               x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                               <div class="position-relative overflow-hidden main">
                                   <span class="new-label bg-success text-white rounded-circle"> New </span>
                                   <img :src="isHovered ? '/build/images/home-cosmetics/pr-14.jpg' : imageUrl"
                                       alt="" class="img-fluid">
                                   <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                       data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                           class="facl facl-heart-o text-white"></i></a>

                                   <div class="product-button d-none d-lg-flex flex-column gap-2">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                               class="iccl iccl-eye"></i></a>
                                       <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                               Shop</span>
                                           <i class="iccl iccl-cart"></i></button>
                                   </div>
                                   <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                       style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;"><i
                                               class="iccl iccl-eye fw-semibold"></i></a>
                                       <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                           <i class="iccl iccl-cart fw-semibold"></i></button>
                                   </div>
                               </div>
                               <div class="mt-3">
                                   <h6 class="mb-1 fs-16 fw-semibold font-playfair"><a
                                           href="{{ url('product/product-detail-layout-01')}}" class="main_link_lima">Skin Medical
                                           HA5</a></h6>
                                   <p class="mb-0 fs-14 text-muted">
                                       <span>$29.00</span>
                                   </p>
                               </div>
                           </div>
                       </div><!--end col-->

                       <div class="col-lg-3 col-md-3 col-6 px-12">
                           <div x-data="{ imageUrl: '/build/images/home-cosmetics/pr-05.jpg', isHovered: false }" class="topbar-product-card overlay-hover"
                               x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                               <div class="position-relative overflow-hidden main">
                                   <img :src="isHovered ? '/build/images/home-cosmetics/pr-06.jpg' : imageUrl"
                                       alt="" class="img-fluid">
                                   <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                       data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                           class="facl facl-heart-o text-white"></i></a>

                                   <div class="product-button d-none d-lg-flex flex-column gap-2">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                               class="iccl iccl-eye"></i></a>
                                       <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                               Shop</span>
                                           <i class="iccl iccl-cart"></i></button>
                                   </div>
                                   <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                       style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;"><i
                                               class="iccl iccl-eye fw-semibold"></i></a>
                                       <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                           <i class="iccl iccl-cart fw-semibold"></i></button>
                                   </div>
                               </div>
                               <div class="mt-3">
                                   <h6 class="mb-1 fs-16 fw-semibold font-playfair"><a
                                           href="{{ url('product/product-detail-layout-01')}}" class="main_link_lima">Skin Fit Glow
                                           Cushion</a></h6>
                                   <p class="mb-0 fs-14 text-muted">
                                       <span>$49.00</span>
                                   </p>
                               </div>
                           </div>
                       </div>

                       <div class="col-lg-3 col-md-3 col-6 px-12">
                           <div x-data="{ imageUrl: '/build/images/home-cosmetics/pr-15.jpg', isHovered: false }" class="topbar-product-card overlay-hover"
                               x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                               <div class="position-relative overflow-hidden main">
                                   <span class="new-label bg-danger text-white rounded-circle"> -34% </span>
                                   <img :src="isHovered ? '/build/images/home-cosmetics/pr-16.jpg' : imageUrl"
                                       alt="" class="img-fluid">
                                   <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                       data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                           class="facl facl-heart-o text-white"></i></a>

                                   <div class="product-button d-none d-lg-flex flex-column gap-2">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                               class="iccl iccl-eye"></i></a>
                                       <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                               Shop</span>
                                           <i class="iccl iccl-cart"></i></button>
                                   </div>
                                   <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                       style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;"><i
                                               class="iccl iccl-eye fw-semibold"></i></a>
                                       <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                           <i class="iccl iccl-cart fw-semibold"></i></button>
                                   </div>
                               </div>
                               <div class="mt-3">
                                   <h6 class="mb-1 fs-16 fw-semibold font-playfair"><a
                                           href="{{ url('product/product-detail-layout-01')}}" class="main_link_lima">White Dew Milky
                                           Cleanser</a></h6>
                                   <p class="mb-0 fs-14 text-muted">
                                       <del>$98.00</del>
                                       <span class="text-danger">$65.00</span>
                                   </p>
                               </div>
                           </div>
                       </div>

                       <div class="col-lg-3 col-md-3 col-6 px-12">
                           <div x-data="{ imageUrl: '/build/images/home-cosmetics/pr-17.jpg', isHovered: false }" class="topbar-product-card overlay-hover"
                               x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                               <div class="position-relative overflow-hidden main">
                                   <img :src="isHovered ? '/build/images/home-cosmetics/pr-18.jpg' : imageUrl"
                                       alt="" class="img-fluid">
                                   <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                       data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                           class="facl facl-heart-o text-white"></i></a>

                                   <div class="product-button d-none d-lg-flex flex-column gap-2">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                               class="iccl iccl-eye"></i></a>
                                       <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                               Shop</span>
                                           <i class="iccl iccl-cart"></i></button>
                                   </div>
                                   <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                       style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;"><i
                                               class="iccl iccl-eye fw-semibold"></i></a>
                                       <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                           <i class="iccl iccl-cart fw-semibold"></i></button>
                                   </div>
                               </div>
                               <div class="mt-3">
                                   <h6 class="mb-1 fs-16 fw-semibold font-playfair"><a
                                           href="{{ url('product/product-detail-layout-01')}}" class="main_link_lima">Water Bank
                                           Hydro Essence</a></h6>
                                   <p class="mb-0 fs-14 text-muted">
                                       <span>$49.00</span>
                                   </p>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-3 col-md-3 col-6 px-12">
                           <div x-data="{ imageUrl: '/build/images/home-cosmetics/pr-19.jpg', isHovered: false }" class="topbar-product-card overlay-hover"
                               x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                               <div class="position-relative overflow-hidden main">
                                   <img :src="isHovered ? '/build/images/home-cosmetics/pr-20.jpg' : imageUrl"
                                       alt="" class="img-fluid">
                                   <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                       data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                           class="facl facl-heart-o text-white"></i></a>

                                   <div class="product-button d-none d-lg-flex flex-column gap-2">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                               class="iccl iccl-eye"></i></a>
                                       <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                               Shop</span>
                                           <i class="iccl iccl-cart"></i></button>
                                   </div>
                                   <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                       style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;"><i
                                               class="iccl iccl-eye fw-semibold"></i></a>
                                       <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                           <i class="iccl iccl-cart fw-semibold"></i></button>
                                   </div>
                               </div>
                               <div class="mt-3">
                                   <h6 class="mb-1 fs-16 fw-semibold font-playfair"><a
                                           href="{{ url('product/product-detail-layout-01')}}" class="main_link_lima">My Foundation
                                           All Day Long Wear</a></h6>
                                   <p class="mb-0 fs-14 text-muted">
                                       <span>$45.00</span>
                                   </p>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-3 col-md-3 col-6 px-12">
                           <div x-data="{ imageUrl: '/build/images/home-cosmetics/pr-01.jpg', isHovered: false }" class="topbar-product-card overlay-hover"
                               x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                               <div class="position-relative overflow-hidden main">
                                   <span class="new-label bg-danger text-white rounded-circle"> Hot </span>
                                   <img :src="isHovered ? '/build/images/home-cosmetics/pr-02.jpg' : imageUrl"
                                       alt="" class="img-fluid">
                                   <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                       data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                           class="facl facl-heart-o text-white"></i></a>

                                   <div class="product-button d-none d-lg-flex flex-column gap-2">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                               class="iccl iccl-eye"></i></a>
                                       <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                               Shop</span>
                                           <i class="iccl iccl-cart"></i></button>
                                   </div>
                                   <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                       style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;"><i
                                               class="iccl iccl-eye fw-semibold"></i></a>
                                       <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                           <i class="iccl iccl-cart fw-semibold"></i></button>
                                   </div>
                               </div>
                               <div class="mt-3">
                                   <h6 class="mb-1 fs-16 fw-semibold font-playfair"><a
                                           href="{{ url('product/product-detail-layout-01')}}" class="main_link_lima">Laneige White
                                           Dew Emulsion</a></h6>
                                   <p class="mb-0 fs-14 text-muted">
                                       <span>$55.00</span>
                                   </p>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-3 col-md-3 col-6 px-12">
                           <div x-data="{ imageUrl: '/build/images/home-cosmetics/pr-13.jpg', isHovered: false }" class="topbar-product-card overlay-hover"
                               x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                               <div class="position-relative overflow-hidden main">
                                   <span class="new-label bg-danger text-white rounded-circle"> Hot </span>
                                   <img :src="isHovered ? '/build/images/home-cosmetics/pr-14.jpg' : imageUrl"
                                       alt="" class="img-fluid">
                                   <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                       data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                           class="facl facl-heart-o text-white"></i></a>

                                   <div class="product-button d-none d-lg-flex flex-column gap-2">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                               class="iccl iccl-eye"></i></a>
                                       <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                               Shop</span>
                                           <i class="iccl iccl-cart"></i></button>
                                   </div>
                                   <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                       style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;"><i
                                               class="iccl iccl-eye fw-semibold"></i></a>
                                       <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                           <i class="iccl iccl-cart fw-semibold"></i></button>
                                   </div>
                               </div>
                               <div class="mt-3">
                                   <h6 class="mb-1 fs-16 fw-semibold font-playfair"><a
                                           href="{{ url('product/product-detail-layout-01')}}" class="main_link_lima">Skin Medical
                                           HA5</a></h6>
                                   <p class="mb-0 fs-14 text-muted">
                                       <span>$29.00</span>
                                   </p>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-3 col-md-3 col-6 px-12">
                           <div x-data="{ imageUrl: '/build/images/home-cosmetics/pr-05.jpg', isHovered: false }" class="topbar-product-card overlay-hover"
                               x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                               <div class="position-relative overflow-hidden main">
                                   <img :src="isHovered ? '/build/images/home-cosmetics/pr-06.jpg' : imageUrl"
                                       alt="" class="img-fluid">
                                   <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                       data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                           class="facl facl-heart-o text-white"></i></a>

                                   <div class="product-button d-none d-lg-flex flex-column gap-2">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                               class="iccl iccl-eye"></i></a>
                                       <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                               Shop</span>
                                           <i class="iccl iccl-cart"></i></button>
                                   </div>
                                   <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                       style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;"><i
                                               class="iccl iccl-eye fw-semibold"></i></a>
                                       <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                           <i class="iccl iccl-cart fw-semibold"></i></button>
                                   </div>
                               </div>
                               <div class="mt-3">
                                   <h6 class="mb-1 fs-16 fw-semibold font-playfair"><a
                                           href="{{ url('product/product-detail-layout-01')}}" class="main_link_lima">Skin Fit Glow
                                           Cushion</a></h6>
                                   <p class="mb-0 fs-14 text-muted">
                                       <span>$49.00</span>
                                   </p>
                               </div>
                           </div>
                       </div>
                   </div>
               </div><!--end container-->
           </section><!--end section-->

           <section class="cat-section">
               <div class="container">
                   <div class="row justify-content-center">
                       <div class="col-lg-8">
                           <div class="text-center mb-4 pb-2">
                               <div>
                                   <h1 class="position-relative text-capitalize font-playfair text-lima fw-medium">
                                       <span>Welcome to Kalles Natural Skincare</span>
                                   </h1>
                                   <span class="dn tt_divider"><span></span><i
                                           class="la la-spa text-muted"></i><span></span></span>
                               </div>
                           </div>
                       </div><!--end col-->
                   </div><!--end row-->
                   <div class="row g-4">
                       <div class="col-md-6">
                           <div class="row g-4">
                               <div class="col-lg-12">
                                   <a href="#!"
                                       class="d-block position-relative cat_grid_item overflow-hidden h-505">
                                       <div class="h-100 w-100 cat-grid-img"
                                           style="background-image: url('{{ asset('/build/images/home-cosmetics/cat-banner-01.jpg')}}">
                                       </div>
                                       <div class="cat-grid-button text-body">
                                           <div class="cat_grid_item__title">Accessories</div>
                                       </div>
                                   </a>
                               </div>
                               <div class="col-lg-12">
                                   <a href="#!"
                                       class="d-block position-relative cat_grid_item overflow-hidden h-315">
                                       <div class="h-100 w-100 cat-grid-img"
                                           style="background-image: url('{{ asset('/build/images/home-cosmetics/cat-banner-02.jpg')}}">
                                       </div>
                                       <div class="cat-grid-button text-body">
                                           <div class="cat_grid_item__title">Skincare</div>
                                       </div>
                                   </a>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-6">
                           <div class="row g-4">
                               <div class="col-lg-12">
                                   <a href="#!"
                                       class="d-block position-relative cat_grid_item overflow-hidden h-410">
                                       <div class="h-100 w-100 cat-grid-img"
                                           style="background-image: url('{{ asset('/build/images/home-cosmetics/cat-banner-03.jpg')}}">
                                       </div>
                                       <div class="cat-grid-button text-body">
                                           <div class="cat_grid_item__title">Bath & Body</div>
                                       </div>
                                   </a>
                               </div>
                               <div class="col-lg-12">
                                   <a href="#!"
                                       class="d-block position-relative cat_grid_item overflow-hidden h-410">
                                       <div class="h-100 w-100 cat-grid-img"
                                           style="background-image: url('{{ asset('/build/images/home-cosmetics/cat-banner-04.jpg')}}">
                                       </div>
                                       <div class="cat-grid-button text-body">
                                           <div class="cat_grid_item__title">Makeup Brushes</div>
                                       </div>
                                   </a>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </section>

           <section class="cat-section">
               <div class="container">
                   <div class="row justify-content-center">
                       <div class="col-lg-8">
                           <div>
                               <h1
                                   class="position-relative text-center text-capitalize font-playfair text-lima fw-medium">
                                   <span>New Arrivals</span>
                               </h1>
                               <span class="dn tt_divider"><span></span><i
                                       class="la la-spa text-muted"></i><span></span></span>
                           </div>
                       </div><!--end col-->
                   </div><!--end row-->
                   <div class="row g-4 mt-4">
                       <div class="col-md-3 col-6">
                           <div x-data="{ imageUrl: '/build/images/home-cosmetics/pr-15.jpg', isHovered: false }" class="topbar-product-card overlay-hover"
                               x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                               <div class="position-relative overflow-hidden main">
                                   <span class="new-label bg-danger text-white rounded-circle"> -34% </span>
                                   <img :src="isHovered ? '/build/images/home-cosmetics/pr-16.jpg' : imageUrl"
                                       alt="" class="img-fluid">
                                   <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                       data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                           class="facl facl-heart-o text-white"></i></a>

                                   <div class="product-button d-none d-lg-flex flex-column gap-2">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                               class="iccl iccl-eye"></i></a>
                                       <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                               Shop</span>
                                           <i class="iccl iccl-cart"></i></button>
                                   </div>
                                   <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                       style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;"><i
                                               class="iccl iccl-eye fw-semibold"></i></a>
                                       <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                           <i class="iccl iccl-cart fw-semibold"></i></button>
                                   </div>
                               </div>
                               <div class="mt-3">
                                   <h6 class="mb-1 fs-16 fw-semibold font-playfair"><a
                                           href="{{ url('product/product-detail-layout-01')}}" class="main_link_lima">White Dew Milky
                                           Cleanser</a></h6>
                                   <p class="mb-0 fs-14 text-muted">
                                       <del>$98.00</del>
                                       <span class="text-danger">$98.00</span>
                                   </p>
                               </div>
                           </div>
                       </div><!--end col-->
                       <div class="col-md-3 col-6">
                           <div x-data="{ imageUrl: '/build/images/home-cosmetics/pr-11.jpg', isHovered: false }" class="topbar-product-card overlay-hover"
                               x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                               <div class="position-relative overflow-hidden main">
                                   <img :src="isHovered ? '/build/images/home-cosmetics/pr-12.jpg' : imageUrl"
                                       alt="" class="img-fluid">
                                   <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                       data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                           class="facl facl-heart-o text-white"></i></a>

                                   <div class="product-button d-none d-lg-flex flex-column gap-2">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                               class="iccl iccl-eye"></i></a>
                                       <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                               Shop</span>
                                           <i class="iccl iccl-cart"></i></button>
                                   </div>
                                   <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                       style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;"><i
                                               class="iccl iccl-eye fw-semibold"></i></a>
                                       <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                           <i class="iccl iccl-cart fw-semibold"></i></button>
                                   </div>
                               </div>
                               <div class="mt-3">
                                   <h6 class="mb-1 fs-16 fw-semibold font-playfair"><a
                                           href="{{ url('product/product-detail-layout-01')}}" class="main_link_lima">Fresh Calming
                                           Balancing Toner</a></h6>
                                   <p class="mb-0 fs-14 text-muted">
                                       <span>$49.00</span>
                                   </p>
                               </div>
                           </div>
                       </div><!--end col-->
                       <div class="col-md-3 col-6">
                           <div x-data="{ imageUrl: '/build/images/home-cosmetics/pr-21.jpg', isHovered: false }" class="topbar-product-card overlay-hover"
                               x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                               <div class="position-relative overflow-hidden main">
                                   <img :src="isHovered ? '/build/images/home-cosmetics/pr-22.jpg' : imageUrl"
                                       alt="" class="img-fluid">
                                   <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                       data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                           class="facl facl-heart-o text-white"></i></a>

                                   <div class="product-button d-none d-lg-flex flex-column gap-2">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                               class="iccl iccl-eye"></i></a>
                                       <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                               Shop</span>
                                           <i class="iccl iccl-cart"></i></button>
                                   </div>
                                   <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                       style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;"><i
                                               class="iccl iccl-eye fw-semibold"></i></a>
                                       <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                           <i class="iccl iccl-cart fw-semibold"></i></button>
                                   </div>
                               </div>
                               <div class="mt-3">
                                   <h6 class="mb-1 fs-16 fw-semibold font-playfair"><a
                                           href="{{ url('product/product-detail-layout-01')}}" class="main_link_lima">Advanced
                                           Hydrating Conditioner</a></h6>
                                   <p class="mb-0 fs-14 text-muted">
                                       <span>$28.00</span>
                                   </p>
                               </div>
                           </div>
                       </div>

                       <div class="col-md-3 col-6">
                           <div x-data="{ imageUrl: '/build/images/home-cosmetics/pr-13.jpg', isHovered: false }" class="topbar-product-card overlay-hover"
                               x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                               <div class="position-relative overflow-hidden main">
                                   <span class="new-label bg-success text-white rounded-circle"> New </span>
                                   <img :src="isHovered ? '/build/images/home-cosmetics/pr-14.jpg' : imageUrl"
                                       alt="" class="img-fluid">
                                   <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                       data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                           class="facl facl-heart-o text-white"></i></a>

                                   <div class="product-button d-none d-lg-flex flex-column gap-2">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                               class="iccl iccl-eye"></i></a>
                                       <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                               Shop</span>
                                           <i class="iccl iccl-cart"></i></button>
                                   </div>
                                   <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                       style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;"><i
                                               class="iccl iccl-eye fw-semibold"></i></a>
                                       <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                           <i class="iccl iccl-cart fw-semibold"></i></button>
                                   </div>
                               </div>
                               <div class="mt-3">
                                   <h6 class="mb-1 fs-16 fw-semibold font-playfair"><a
                                           href="{{ url('product/product-detail-layout-01')}}" class="main_link_lima">Skin Medical
                                           HA5</a></h6>
                                   <p class="mb-0 fs-14 text-muted">
                                       <span>$29.00</span>
                                   </p>
                               </div>
                           </div>
                       </div><!--end col-->
                       <div class="col-md-3 col-6">
                           <div x-data="{ imageUrl: '/build/images/home-cosmetics/pr-01.jpg', isHovered: false }" class="topbar-product-card overlay-hover"
                               x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                               <div class="position-relative overflow-hidden main">
                                   <span class="new-label bg-danger text-white rounded-circle"> Hot </span>
                                   <img :src="isHovered ? '/build/images/home-cosmetics/pr-02.jpg' : imageUrl"
                                       alt="" class="img-fluid">
                                   <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                       data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                           class="facl facl-heart-o text-white"></i></a>

                                   <div class="product-button d-none d-lg-flex flex-column gap-2">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                               class="iccl iccl-eye"></i></a>
                                       <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                               Shop</span>
                                           <i class="iccl iccl-cart"></i></button>
                                   </div>
                                   <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                       style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;"><i
                                               class="iccl iccl-eye fw-semibold"></i></a>
                                       <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                           <i class="iccl iccl-cart fw-semibold"></i></button>
                                   </div>
                               </div>
                               <div class="mt-3">
                                   <h6 class="mb-1 fs-16 fw-semibold font-playfair"><a
                                           href="{{ url('product/product-detail-layout-01')}}" class="main_link_lima">Laneige White
                                           Dew Emulsion</a></h6>
                                   <p class="mb-0 fs-14 text-muted">
                                       <span>$55.00</span>
                                   </p>
                               </div>
                           </div>
                       </div><!--end col-->
                       <div class="col-md-3 col-6">
                           <div x-data="{ imageUrl: '/build/images/home-cosmetics/pr-07.jpg', isHovered: false }" class="topbar-product-card overlay-hover"
                               x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                               <div class="position-relative overflow-hidden main">
                                   <img :src="isHovered ? '/build/images/home-cosmetics/pr-08.jpg' : imageUrl"
                                       alt="" class="img-fluid">
                                   <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                       data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                           class="facl facl-heart-o text-white"></i></a>

                                   <div class="product-button d-none d-lg-flex flex-column gap-2">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                               class="iccl iccl-eye"></i></a>
                                       <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                               Shop</span>
                                           <i class="iccl iccl-cart"></i></button>
                                   </div>
                                   <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                       style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;"><i
                                               class="iccl iccl-eye fw-semibold"></i></a>
                                       <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                           <i class="iccl iccl-cart fw-semibold"></i></button>
                                   </div>
                               </div>
                               <div class="mt-3">
                                   <h6 class="mb-1 fs-16 fw-semibold font-playfair"><a
                                           href="{{ url('product/product-detail-layout-01')}}" class="main_link_lima">Dr.Jart
                                           Sensitive Sun Protector</a></h6>
                                   <p class="mb-0 fs-14 text-muted">
                                       <span>$35.00</span>
                                   </p>
                               </div>
                           </div>
                       </div><!--end col-->
                       <div class="col-md-3 col-6">
                           <div x-data="{ imageUrl: '/build/images/home-cosmetics/pr-04.jpg', isHovered: false }" class="topbar-product-card overlay-hover"
                               x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                               <div class="position-relative overflow-hidden main">
                                   <img :src="isHovered ? '/build/images/home-cosmetics/pr-05.jpg' : imageUrl"
                                       alt="" class="img-fluid">
                                   <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                       data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                           class="facl facl-heart-o text-white"></i></a>

                                   <div class="product-button d-none d-lg-flex flex-column gap-2">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                               class="iccl iccl-eye"></i></a>
                                       <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                               Shop</span>
                                           <i class="iccl iccl-cart"></i></button>
                                   </div>
                                   <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                       style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;"><i
                                               class="iccl iccl-eye fw-semibold"></i></a>
                                       <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                           <i class="iccl iccl-cart fw-semibold"></i></button>
                                   </div>
                               </div>
                               <div class="mt-3">
                                   <h6 class="mb-1 fs-16 fw-semibold font-playfair"><a
                                           href="{{ url('product/product-detail-layout-01')}}" class="main_link_lima">Les Beiges
                                           Water Fresh Tint Light</a></h6>
                                   <p class="mb-0 fs-14 text-muted">
                                       <span>$38.00</span>
                                   </p>
                               </div>
                           </div>
                       </div><!--end col-->
                       <div class="col-md-3 col-6">
                           <div x-data="{ imageUrl: '/build/images/home-cosmetics/pr-14.jpg', isHovered: false }" class="topbar-product-card overlay-hover"
                               x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                               <div class="position-relative overflow-hidden main">
                                   <img :src="isHovered ? '/build/images/home-cosmetics/pr-15.jpg' : imageUrl"
                                       alt="" class="img-fluid">
                                   <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                       data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                           class="facl facl-heart-o text-white"></i></a>

                                   <div class="product-button d-none d-lg-flex flex-column gap-2">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                               class="iccl iccl-eye"></i></a>
                                       <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                               Shop</span>
                                           <i class="iccl iccl-cart"></i></button>
                                   </div>
                                   <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                       style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                       <a href="#exampleModal" data-bs-toggle="modal"
                                           class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;"><i
                                               class="iccl iccl-eye fw-semibold"></i></a>
                                       <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                           style="width:36px; height: 36px;" data-bs-toggle="modal"
                                           data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                           <i class="iccl iccl-cart fw-semibold"></i></button>
                                   </div>
                               </div>
                               <div class="mt-3">
                                   <h6 class="mb-1 fs-16 fw-semibold font-playfair"><a
                                           href="{{ url('product/product-detail-layout-01')}}" class="main_link_lima">Advanced
                                           Hydrating Shampoo</a></h6>
                                   <p class="mb-0 fs-14 text-muted">
                                       <span>$32.00</span>
                                   </p>
                               </div>
                           </div>
                       </div><!--end col-->
                   </div>
               </div>
           </section>

           <section class="overflow-hidden">
               <div class="container-fuild px-0">
                   <div class="row g-0 blog-arrow"
                       data-flickity='{"imagesLoaded": 0, "adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold": 5, "cellAlign": "left", "wrapAround": true, "prevNextButtons": true, "percentPosition": 1, "pageDots": false, "autoPlay": 0, "pauseAutoPlayOnHover": true }'
                       dir="ltr">
                       <div class="col-md-2 col-6">
                           <div class="overflow-hidden img-zoom">
                               <img src="{{ URL::asset('/build/images/home-cosmetics/intg-01.jpg')}}" alt=""
                                   class="img-fluid h-100">
                           </div>
                       </div>
                       <div class="col-md-2 col-6">
                           <div class="overflow-hidden img-zoom">
                               <img src="{{ URL::asset('/build/images/home-cosmetics/intg-02.jpg')}}" alt=""
                                   class="img-fluid h-100">
                           </div>
                       </div>
                       <div class="col-md-2 col-6">
                           <div class="overflow-hidden img-zoom">
                               <img src="{{ URL::asset('/build/images/home-cosmetics/intg-03.jpg')}}" alt=""
                                   class="img-fluid h-100">
                           </div>
                       </div>
                       <div class="col-md-2 col-6">
                           <div class="overflow-hidden img-zoom">
                               <img src="{{ URL::asset('/build/images/home-cosmetics/intg-04.jpg')}}" alt=""
                                   class="img-fluid h-100">
                           </div>
                       </div>
                       <div class="col-md-2 col-6">
                           <div class="overflow-hidden img-zoom">
                               <img src="{{ URL::asset('/build/images/home-cosmetics/intg-05.jpg')}}" alt=""
                                   class="img-fluid h-100">
                           </div>
                       </div>
                       <div class="col-md-2 col-6">
                           <div class="overflow-hidden img-zoom">
                               <img src="{{ URL::asset('/build/images/home-cosmetics/intg-06.jpg')}}" alt=""
                                   class="img-fluid h-100">
                           </div>
                       </div>
                   </div>
               </div>
           </section>

           <section class="kellas-medical-brand-list py-5 position-relative">
               <div class="container">
                   <div class="row justify-content-between d-flex align-items-center "
                       data-flickity='{"imagesLoaded": 0, "adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold": 5, "cellAlign": "left", "wrapAround": true, "prevNextButtons": false, "percentPosition": 1, "pageDots": false, "autoPlay": 0, "pauseAutoPlayOnHover": true }'
                       dir="ltr">
                       <div class="col-6 col-sm-4 w-lg-20 brand-item">
                           <a href="#!">
                               <img src="{{ URL::asset('/build/images/home-cosmetics/br1.png')}}" alt=""
                                   class="img-fluid max-w-200 mx-auto d-block">
                           </a>
                       </div><!--end col-->
                       <div class="col-6 col-sm-4 w-lg-20 brand-item">
                           <a href="#!">
                               <img src="{{ URL::asset('/build/images/home-cosmetics/br2.png')}}" alt=""
                                   class="img-fluid max-w-200 mx-auto d-block">
                           </a>
                       </div><!--end col-->
                       <div class="col-6 col-sm-4 w-lg-20 brand-item">
                           <a href="#!">
                               <img src="{{ URL::asset('/build/images/home-cosmetics/br3.png')}}" alt=""
                                   class="img-fluid max-w-200 mx-auto d-block">
                           </a>
                       </div><!--end col-->
                       <div class="col-6 col-sm-4 w-lg-20 brand-item">
                           <a href="#!">
                               <img src="{{ URL::asset('/build/images/home-cosmetics/br4.png')}}" alt=""
                                   class="img-fluid max-w-200 mx-auto d-block">
                           </a>
                       </div><!--end col-->
                       <div class="col-6 col-sm-4 w-lg-20 brand-item">
                           <a href="#!">
                               <img src="{{ URL::asset('/build/images/home-cosmetics/br5.png')}}" alt=""
                                   class="img-fluid max-w-200 mx-auto d-block">
                           </a>
                       </div><!--end col-->
                   </div><!--end row-->
               </div><!--end container-->
           </section>
           @include('partials.footer-cosmetics')
           @include('partials.popup')
       </div>

       @include('partials.card-model')
       @include('partials.vendor-scripts')

       <script src="{{ URL::asset('build/libs/flickity/flickity.pkgd.min.js')}}"></script>
       <script src="{{ URL::asset('build/js/main.js')}}"></script>
       <script src="{{ URL::asset('build/js/app.js')}}"></script>


   </body>

   </html>
