<!doctype html>
<html lang="en" x-data :dir="$store.appStore.dir" x-cloak>

<head>
    <meta charset="utf-8" />
    <title> Home Fashion Simple | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="" name="description" />
    <meta content="srbthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/build/images/k_favicon_32x.png')}}">
    @include('partials.head-css')
</head>

<body class="{{ 'class-name' }}" x-data="{ showMenuScroll: false }">
   <!--head banner-->
    <div x-data="{ isOpen: true }">
        <div class="t_header fs-13 d-flex align-items-center" x-bind:class="{ 'd-none': !isOpen }">
            <div class="container-fluid">
                <div class="d-flex gap-2">
                    <div class="col text-center text-white">
                        Today deal sale off <strong>70% </strong>. End in
                        <strong class="js_kl__countdown"></strong>. <a href="#!" class="text-white">Hurry Up <i
                                class="las la-arrow-right"></i></a>
                    </div>
                    <div class="col-auto mt-2 mt-md-0">
                        <a href="#" class="h_banner_close text-white"
                            x-on:click.prevent="isOpen = false">close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end head banner-->
    @include('partials/header-fashion')
    <div>
        <!-- main slide -->
        <div class="kalles-home-section type_slideshow type_carousel">
            <div class="slideshow" data-flickity='{ "fade":0,"cellAlign": "center","imagesLoaded": 0,"lazyLoad": 0,"freeScroll": 0,"wrapAround": true,"autoPlay" : 0,"pauseAutoPlayOnHover" : true, "rightToLeft": false, "prevNextButtons": false,"pageDots": true, "contain" : 1,"adaptiveHeight" : 1,"dragThreshold" : 5,"percentPosition": 1 }'>
                <!-- first slide -->
                <div class="slideshow__slide w-100" style="background-image: url('{{ asset('/build/images/slide/slider-01.jpg')}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7">
                                <div data-aos="fade-right" data-aos-delay="300">
                                    <h4 class="fs-18 fw-medium">SUMMER 2020</h4>
                                    <h1 class="display-4 fw-semibold mb-3">New Arrival Collection</h1>
                                    <a class="btn btn-dark text-white rounded-0 min-w-150" href="{{ url('shop_pages/shop-filter-sidebar')}}">Explore
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end first slide -->
    
                <!-- second slide -->
                <div class="slideshow__slide w-100" style="background-image: url('{{ asset('/build/images/slide/slider-02.jpg')}}">
                    <div class="container">
                        <div class="row justify-content-end">
                            <div class="col-lg-6">
                                <div class="text-end" data-aos="fade-right" data-aos-delay="300">
                                    <h4 class="fs-18 fw-medium">NEW SEASON</h4>
                                    <h3 class="display-4 fw-semibold mb-3">Lookbook Collection</h3>
                                    <a class="btn btn-dark text-white rounded-0 min-w-150" href="{{ url('shop_pages/shop-filter-sidebar')}}">Explore
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end second slide -->
    
                <!-- third slide -->
                <div class="slideshow__slide w-100" style="background-image: url('{{ asset('/build/images/slide/slider-03.jpg')}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div data-aos="fade-right" data-aos-delay="300">
                                    <h4 class="fs-18 fw-medium">SUMMER SALE</h4>
                                    <h1 class="display-4 fw-semibold mb-3">Save up to 70%</h1>
                                    <a class="btn btn-dark text-white rounded-0 min-w-150" href="{{ url('shop_pages/shop-filter-sidebar')}}">Explore
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end third slide -->
            </div>
        </div>
        <!-- end main slide -->
    
        <section class="cat-section">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <a href="{{url( 'shop_pages.shop-left-sidebar')}}" class="d-block position-relative cat_grid_item overflow-hidden h-505">
                                    <div class="h-100 w-100 cat-grid-img" style="background-image: url('{{ asset('/build/images/home-fashion-simple/cat-women.jpg')}}">
                                    </div>
                                    <div class="cat-grid-button text-body">
                                        <div class="cat_grid_item__title">Women</div>
                                    </div>
                                </a>
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <a href="{{url( 'shop_pages.shop-left-sidebar')}}" class="d-block position-relative cat_grid_item overflow-hidden h-315">
                                    <div class="h-100 w-100 cat-grid-img" style="background-image: url('/build/images/home-fashion-simple/cat-footwear.jpeg');background-position: center;">
                                    </div>
                                    <div class="cat-grid-button text-body">
                                        <div class="cat_grid_item__title">Footwear</div>
                                    </div>
                                </a>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end col-->
                    <div class="col-lg-6">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <a href="{{url( 'shop_pages.shop-left-sidebar')}}" class="d-block position-relative cat_grid_item overflow-hidden h-410">
                                    <div class="h-100 w-100 cat-grid-img" style="background-image: url('{{ asset('/build/images/home-fashion-simple/cat-accessories.jpeg')}}">
                                    </div>
                                    <div class="cat-grid-button text-body">
                                        <div class="cat_grid_item__title">Accessories</div>
                                    </div>
                                </a>
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <a href="{{url( 'shop_pages.shop-left-sidebar')}}" class="d-block position-relative cat_grid_item overflow-hidden h-410">
                                    <div class="h-100 w-100 cat-grid-img" style="background-image: url('{{ asset('/build/images/home-fashion-simple/cat-men.jpg')}}">
                                    </div>
                                    <div class="cat-grid-button text-body">
                                        <div class="cat_grid_item__title">Men</div>
                                    </div>
                                </a>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end col-->
                </div><!--end row-->
            </div>
        </section><!--end section-->
    
        <section>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="text-center">
                            <div class="mb-2">
                                <h3 class="section-title position-relative flex">
                                    <span>NEW ARRIVAL</span>
                                </h3>
                            </div>
                            <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">New product
                                of our store</span>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row mt-4 pt-2 tranding-card" data-flickity='{"imagesLoaded": 0,"adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": 1,"pageDots": false, "autoPlay" : 0, "pauseAutoPlayOnHover" : true, "rightToLeft": false }'>
                    <div class="col-md-3 col-6 col-lg-2 px-lg-12 px-2 ">
                        <div x-data="{ imageUrl: '/build/images/products/pr-01.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <span class="new-label bg-success text-white rounded-circle text-center"> New
                                </span>
                                <img :src="isHovered ? '/build/images/products/pr-02.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
    
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
                                <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                            </div>
                            <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                <h6 class="mb-1">Analogue
                                    Resin Strap</h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$30.00</span>
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 col-lg-2 px-lg-12 px-2 ">
                        <div x-data="{ imageUrl: '/build/images/products/pr-33.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/products/pr-34.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
    
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
                                <p class="product-size mb-0 text-center text-white fw-medium">S, M, L</p>
                            </div>
                            <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                <h6 class="mb-1"> Ridley High Waist</h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$36.00</span>
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 col-lg-2 px-lg-12 px-2 ">
                        <div x-data="{ imageUrl: '/build/images/products/pr-04.jpg' }" class="topbar-product-card">
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
                                <p class="product-size mb-0 text-center text-white fw-medium">S, M, L</p>
                            </div>
                            <div class="mt-3">
                                <h6 class="mb-1"><a href="#!" class="product-title">Blush Beanie</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$15.00</span>
                                </p>
                                <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-05.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-05.jpg'" class="d-inline-block bg-body-tertiary rounded-circle"></a>
                                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-31.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-31.jpg'" class="d-inline-block bg_color_pink rounded-circle"></a>
                                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-32.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-32.jpg'" class="d-inline-block bg-dark rounded-circle"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 col-lg-2 px-lg-12 px-2 ">
                        <div x-data="{ imageUrl: '/build/images/products/pr-06.jpg' }" class="topbar-product-card">
                            <div class="position-relative overflow-hidden">
                                <span class="new-label bg-danger text-white rounded-circle"> -25% </span>
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
                                <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M</p>
                            </div>
                            <div class="mt-3">
                                <h6 class="mb-1"><a href="#!" class="product-title">Cluse La Boheme Rose Gold</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <del>$60.00</del>
                                    <span class="text-danger">$45.00</span>
                                </p>
                                <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-07.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-07.jpg'" class="d-inline-block bg_color_green rounded-circle"></a>
                                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-08.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-08.jpg'" class="d-inline-block bg-body-secondary rounded-circle"></a>
                                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-09.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-09.jpg'" class="d-inline-block bg_color_blue rounded-circle"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- slide5 -->
                    <div class="col-md-3 col-6 col-lg-2 px-lg-12 px-2 ">
                        <div x-data="{ imageUrl: '/build/images/products/pr-15.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/products/pr-14.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
    
                                <div class="bg-overlay"></div>
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
                            </div>
                            <div class="mt-3">
                                <h6 class="mb-1"><a href="#!" class="product-title">Mercury Tee</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span class="text-muted">$68.00</span>
                                </p>
                                <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                    <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-metro/pr-q1.jpg'; isHovered = false" style="background: url('/build/images/home-metro/pr-q1.jpg');background-size: cover;" class="d-inline-block bg-body-tertiary rounded-circle"></a>
                                    <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-metro/pr-q2.jpg'; isHovered = false" style="background: url('/build/images/home-metro/pr-q2.jpg');background-size: cover;" class="d-inline-block bg_color_pink rounded-circle"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 col-lg-2 px-lg-12 px-2 ">
                        <div x-data="{ imageUrl: '/build/images/products/pr-27.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <span class="new-label bg-danger text-white rounded-circle"> -34% </span>
                                <img :src="isHovered ? '/build/images/products/pr-28.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
    
                                <div class="bg-overlay"></div>
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
                            </div>
                            <div class="mt-3">
                                <h6 class="mb-1"><a href="#!" class="product-title">Mercury Tee</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span class="text-muted">$68.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 col-lg-2 px-lg-12 px-2 ">
                        <div x-data="{ imageUrl: '/build/images/products/pr-18.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/products/pr-17.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
    
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
                                <p class="product-size mb-0 text-center text-white fw-medium">S, M, L</p>
                            </div>
                            <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                <h6 class="mb-1"> Cream Women Pants</h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$35.00</span>
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 col-lg-2 px-lg-12 px-2 ">
                        <div x-data="{ imageUrl: '/build/images/products/pr-25.png', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/products/pr-26.png' : imageUrl" alt="" class="img-fluid">
                                <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
    
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
                                <p class="product-size mb-0 text-center text-white fw-medium">S, M, L</p>
                            </div>
                            <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                <h6 class="mb-1"> Black Mountain Hat</h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$50.00</span>
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div><!--end container-->
        </section><!--end section-->
    
        <div class="banner-section position-relative">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <a href="#!" class="position-relative hover-zoom d-block">
                            <img src="{{ URL::asset('/build/images/home-01/bn-05.jpg')}}" alt="" class="img-fluid hover-zoom-img">
                            <div class="position-absolute start-0 start-0 end-0 top-0 bottom-0 d-flex align-items-center justify-content-center">
                                <div class="text-center text-white">
                                    <h4 class="fs-24">LOOKBOOK 2021</h4>
                                    <h6 class="mb-0">MAKE LOVE THIS LOOK</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a href="#!" class="position-relative hover-zoom d-block">
                            <img src="{{ URL::asset('/build/images/home-01/bn-06.jpg')}}" alt="" class="img-fluid hover-zoom-img">
                            <div class="position-absolute start-0 start-0 end-0 top-0 bottom-0 d-flex align-items-center justify-content-center">
                                <div class="text-center text-white">
                                    <h6 class="text-capitalize mb-2">Summer Sale</h6>
                                    <h1 class="mb-0">UP TO 70%</h1>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div><!--end section-->
        
        <!-- our product -->

        @include('partials.our-product')
            <!-- blog -->
        @include('partials.latest-blog')
        <!-- instagram -->
        @include('partials.follow-instagram')
        @include('partials.shipping')
        @include('partials.footer')
        @include('partials.popup')
    </div>
    
    <!-- Modal -->
    <div class="modal fade modal-overl" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
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
                            <div class="py-30 pe-4">
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
  

    @include('partials.card-model')
    @include('partials.vendor-scripts')
    <script src="{{ URL::asset('build/libs/flickity/flickity.pkgd.min.js')}}"></script>
    <script src="{{ URL::asset('build/js/main.js')}}"></script>
    <script src="{{ URL::asset('build/js/app.js')}}"></script>
</body>

</html>
