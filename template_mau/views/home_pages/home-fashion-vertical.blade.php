<!doctype html>
<html lang="en" x-data :dir="$store.appStore.dir" x-cloak>
<head>
    <meta charset="utf-8" />
    <title>Home Fashion Vertical | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="" name="description" />
    <meta content="srbthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/build/images/k_favicon_32x.png')}}">
    @include('partials.head-css')
</head>
<body class="{{ 'class-name' }}" x-data="{ showMenuScroll: false }">
 <!--head banner-->
<div x-data="{ isOpen: true }" class="vertical-wrpper">
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
@include('partials.header-vertical')
<div class="page-vertical-wrapper">
    <!-- main slide -->
    <div class="kalles-home-section type_slideshow type_carousel">
        <div class="slideshow" data-flickity='{ "fade":0,"cellAlign": "center","imagesLoaded": 0,"lazyLoad": 0,"freeScroll": 0,"wrapAround": true,"autoPlay" : 0,"pauseAutoPlayOnHover" : true, "rightToLeft": false, "prevNextButtons": false,"pageDots": true, "contain" : 1,"adaptiveHeight" : 1,"dragThreshold" : 5,"percentPosition": 1 }'>
            <!-- first slide -->
            <div class="slideshow__slide w-100" style="background-image: url('{{ asset('/build/images/home-fashion-vertical/slide-01.jpg')}}">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="text-center d-flex justify-content-end">
                            <div data-aos="fade-right" data-aos-delay="300">
                                <h4 class="fs-18 fw-medium">Men Collection</h4>
                                <h1 class="summer-tag fw-semibold mb-3">CLEARANCE SALE OFF 70%</h1>
                                <a class="btn btn-dark rounded-0 min-w-150 text-white" href="{{ url('shop_pages/shop')}}">Shop Now
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
                        <div class="col-md-6">
                            <div class="text-end" data-aos="fade-right" data-aos-delay="300">
                                <h4 class="fs-18 fw-medium">NEW SEASON</h4>
                                <h3 class="display-4 fw-semibold mb-3">Lookbook Collection</h3>
                                <a class="btn btn-dark rounded-0 min-w-150 text-white" href="{{ url('shop_pages/shop-filter-sidebar')}}">Explore
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
                                <a class="btn btn-dark rounded-0 min-w-150 text-white" href="{{ url('shop_pages/shop-filter-sidebar')}}">Explore
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
            <div class="row g-xl-4 g-2">
                <div class="col-md-6">
                    <a href="{{url( 'shop_pages.shop-left-sidebar')}}" class="d-block position-relative cat_grid_item overflow-hidden h-570">
                        <div class="h-100 w-100 cat-grid-img" style="background-image: url('{{ asset('/build/images/home-fashion-vertical/cat-women.jpg')}}"></div>
                        <div class="cat-grid-button text-body">
                            <div class="cat_grid_item__title">Women</div>
                        </div>
                    </a>
                    <div class="row gx-xl-4 gx-2 mt-xl-4 mt-2">
                        <div class="col-sm-6">
                            <a href="{{url( 'shop_pages.shop-left-sidebar')}}" class="d-block position-relative cat_grid_item overflow-hidden h-300">
                                <div class="h-100 w-100 cat-grid-img" style="background-image: url('{{ asset('/build/images/home-fashion-vertical/cat-caps-and-hats.jpg')}}"></div>
                                <div class="cat-grid-button text-body">
                                    <div class="cat_grid_item__title">Caps&Hats</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{url( 'shop_pages.shop-left-sidebar')}}" class="d-block position-relative cat_grid_item overflow-hidden h-300">
                                <div class="h-100 w-100 cat-grid-img" style="background-image: url('{{ asset('/build/images/home-fashion-vertical/cat-foot-wear.jpeg')}}">
                                </div>
                                <div class="cat-grid-button text-body">
                                    <div class="cat_grid_item__title">Footwear</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="{{url( 'shop_pages.shop-left-sidebar')}}" class="d-block position-relative cat_grid_item overflow-hidden h-300 mb-xl-4 mb-2">
                        <div class="h-100 w-100 cat-grid-img" style="background-image: url('/build/images/home-fashion-vertical/cat-accessories.jpg');background-position: center;">
                        </div>
                        <div class="cat-grid-button text-body">
                            <div class="cat_grid_item__title">Accessoies</div>
                        </div>
                    </a>
                    <a href="{{url( 'shop_pages.shop-left-sidebar')}}" class="d-block position-relative cat_grid_item overflow-hidden h-570">
                        <div class="h-100 w-100 cat-grid-img" style="background-image: url('/build/images/home-classic/cat-watch.jpg'); background-position: center;">
                        </div>
                        <div class="cat-grid-button text-body">
                            <div class="cat_grid_item__title">Watches</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid px-4">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center">
                        <div class="mb-2">
                            <h3 class="section-title position-relative flex">
                                <span>NEW ARRIVAL</span>
                            </h3>
                        </div>
                        <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">New product of our store</span>
                    </div>
                </div>
            </div>
            <div class="row mt-4 pt-2 tranding-card" data-flickity='{"imagesLoaded": 0, "adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold": 5, "cellAlign": "left", "wrapAround": true, "prevNextButtons": true, "percentPosition": 1, "pageDots": false, "autoPlay": 0, "pauseAutoPlayOnHover": true }' dir="ltr">
                <div class="col-md-3 col-6 px-lg-12 px-2">
                    <div x-data="{ imageUrl: '/build/images/products/pr-01.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <span class="new-label bg-success text-white rounded-circle text-center"> New
                            </span>
                            <img :src="isHovered ? '/build/images/products/pr-02.jpg' : imageUrl" alt="" class="img-fluid">
                            <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                            <div class="product-button d-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick
                                        View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
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
                <div class="col-md-3 col-6 px-lg-12 px-2">
                    <div x-data="{ imageUrl: '/build/images/products/pr-33.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <img :src="isHovered ? '/build/images/products/pr-34.jpg' : imageUrl" alt="" class="img-fluid">
                            <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                            <div class="product-button d-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
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
                <div class="col-md-3 col-6 px-lg-12 px-2">
                    <div x-data="{ imageUrl: '/build/images/products/pr-04.jpg' }" class="topbar-product-card pb-3">
                        <div class="position-relative overflow-hidden">
                            <img :src="imageUrl" alt="" class="img-fluid">
                            <a href="#" class="wishlistadd position-absolute text-white" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                            <div class="product-button d-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
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
                <div class="col-md-3 col-6 px-lg-12 px-2">
                    <div x-data="{ imageUrl: '/build/images/products/pr-06.jpg' }" class="topbar-product-card pb-3">
                        <div class="position-relative overflow-hidden">
                            <span class="new-label bg-danger text-white rounded-circle"> -25% </span>
                            <img :src="imageUrl" alt="" class="img-fluid">
                            <a href="#" class="wishlistadd position-absolute text-white" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                            <div class="product-button d-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
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
                <div class="col-md-3 col-6 px-lg-12 px-2">
                    <div x-data="{ imageUrl: '/build/images/products/pr-15.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <img :src="isHovered ? '/build/images/products/pr-14.jpg' : imageUrl" alt="" class="img-fluid">
                            <a href="#" class="wishlistadd position-absolute text-white" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                            <div class="bg-overlay"></div>
                            <div class="product-button d-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
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
                <div class="col-md-3 col-6 px-lg-12 px-2">
                    <div x-data="{ imageUrl: '/build/images/products/pr-27.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <span class="new-label bg-danger text-white rounded-circle"> -34% </span>
                            <img :src="isHovered ? '/build/images/products/pr-28.jpg' : imageUrl" alt="" class="img-fluid">
                            <a href="#" class="wishlistadd position-absolute text-white" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                            <div class="bg-overlay"></div>
                            <div class="product-button d-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
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
                <div class="col-md-3 col-6 px-lg-12 px-2">
                    <div x-data="{ imageUrl: '/build/images/products/pr-18.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <img :src="isHovered ? '/build/images/products/pr-17.jpg' : imageUrl" alt="" class="img-fluid">
                            <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                            <div class="product-button d-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
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
                <div class="col-md-3 col-6 px-lg-12 px-2">
                    <div x-data="{ imageUrl: '/build/images/products/pr-25.png', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <img :src="isHovered ? '/build/images/products/pr-26.png' : imageUrl" alt="" class="img-fluid">
                            <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                            <div class="product-button d-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
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
        </div>
    </section>

    <div class="banner-section position-relative">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <a href="#!" class="position-relative hover-zoom d-block">
                        <img src="{{ URL::asset('/build/images/home-fashion-vertical/banner-01.jpg')}}" alt="" class="img-fluid hover-zoom-img">
                        <div class="position-absolute start-0 start-0 end-0 top-0 bottom-0 d-flex align-items-center justify-content-center">
                            <div class="text-center text-white">
                                <h4 class="fs-24">LOOKBOOK 2021</h4>
                                <h6 class="mb-0">MAKE LOVE THIS LOOK</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="#!" class="position-relative hover-zoom d-block">
                        <img src="{{ URL::asset('/build/images/home-fashion-vertical/banner-02.jpg')}}" alt="" class="img-fluid hover-zoom-img">
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
    <section class="type_tab_collection">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center">
                        <div class="mb-2">
                            <h3 class="section-title position-relative text-uppercase">
                                <span>OUR PRODUCTS</span>
                            </h3>
                        </div>
                        <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">Top sale in
                            this week</span>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="mt-4">
                <ul class="nav tab_header gap-lg-4 justify-content-center mt-4 mb-0" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill active" id="best-seller-tab" data-bs-toggle="pill" data-bs-target="#best-seller" type="button" role="tab" aria-controls="best-seller" aria-selected="true">Best Seller</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill" id="featured-tab" data-bs-toggle="pill" data-bs-target="#featured" type="button" role="tab" aria-controls="featured" aria-selected="false">Featured</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill" id="sale-tab" data-bs-toggle="pill" data-bs-target="#sale" type="button" role="tab" aria-controls="sale" aria-selected="false">Sale</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill" id="top-sale-tab" data-bs-toggle="pill" data-bs-target="#top-sale" type="button" role="tab" aria-controls="top-sale" aria-selected="false">Top Sale</button>
                    </li>
                </ul>
                <div class="tab-content mt-4" id="pills-tabContent">
                    <!-- tab-1 -->
                    <div class="tab-pane fade show active" id="best-seller" role="tabpanel" aria-labelledby="best-seller-tab" tabindex="0">
                        <div class="row g-4">
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/products/pr-29.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-30.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                                    </div>
                                    <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                        <h6 class="mb-1"> City Backpack Black</h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$55.00</span>
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/home-metro/pr-q10.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-metro/pr-q11.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                                    </div>
                                    <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                        <h6 class="mb-1"> Women Black Pants </h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$100.00</span>
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/products/pr-15.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-14.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100" src="{{ URL::asset('/build/images/products/pr-15.jpg')}}">
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
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/products/pr-12.jpg' }" class="topbar-product-card pb-3">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                                    </div>
                                    <div class="mt-3">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Men
                                                pants</a>
                                        </h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$49.00 – $56.00</span>
                                        </p>
                                        <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-12.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-12.jpg'" class="d-inline-block bg_color_blue rounded-circle"></a>
                                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-34.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-34.jpg'" class="d-inline-block bg-dark rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-29.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? 'abuild/images/home-fashion-9/pr-s-30.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                                    </div>
                                    <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                        <h6 class="mb-1"> Short Sleeved Hoodie</h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <del>$45.00</del>
                                            <span class="text-danger">$30.00</span>
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/products/pr-33.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-metro/pr-q11.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                                    </div>
                                    <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                        <h6 class="mb-1"> Sweatshirt in Geometric Print</h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$35.00</span>
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/products/pr-23.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-23.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                                    </div>
                                    <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                        <h6 class="mb-1"> Dusk Pom Beanie</h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$25.00</span>
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-43.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-fashion-9/pr-s-43.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                                    </div>
                                    <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                        <h6 class="mb-1"> Stan Smith Trainers</h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$75.00</span>
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/products/pr-12.jpg' }" class="topbar-product-card pb-3">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                                    </div>
                                    <div class="mt-3">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Men
                                                pants</a>
                                        </h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$49.00 – $56.00</span>
                                        </p>
                                        <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-12.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-12.jpg'" class="d-inline-block bg_color_blue rounded-circle"></a>
                                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-34.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-34.jpg'" class="d-inline-block bg-dark rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/products/pr-23.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-23.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                                    </div>
                                    <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                        <h6 class="mb-1"> Dusk Pom Beanie</h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$25.00</span>
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/products/pr-12.jpg' }" class="topbar-product-card pb-3">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                                    </div>
                                    <div class="mt-3">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Men
                                                pants</a>
                                        </h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$49.00 – $56.00</span>
                                        </p>
                                        <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-12.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-12.jpg'" class="d-inline-block bg_color_blue rounded-circle"></a>
                                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-34.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-34.jpg'" class="d-inline-block bg-dark rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/products/pr-15.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-14.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100" src="{{ URL::asset('/build/images/products/pr-15.jpg')}}">
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
                        </div>
                    </div>
                    <div class="tab-pane fade" id="featured" role="tabpanel" aria-labelledby="featured-tab" tabindex="0">
                        <div class="row g-4">
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/products/pr-01.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <span class="new-label bg-success text-white rounded-circle text-center"> New
                                        </span>
                                        <img :src="isHovered ? '/build/images/products/pr-02.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                                        <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL
                                        </p>
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
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/products/pr-33.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-34.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                                    <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                        <h6 class="mb-1"> Ridley High Waist</h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$36.00</span>
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/products/pr-04.jpg' }" class="topbar-product-card pb-3">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/products/pr-11.jpg' }" class="topbar-product-card pb-3">
                                    <div class="position-relative overflow-hidden">
                                        <span class="new-label bg-danger text-white rounded-circle"> -25% </span>
                                        <img :src="imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                                        <h6 class="mb-1"><a href="#!" class="product-title">Cluse La Boheme Rose
                                                Gold</a></h6>
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
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sale" role="tabpanel" aria-labelledby="sale-tab" tabindex="0">
                        <div class="row g-4">
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/products/pr-29.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-30.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                                    </div>
                                    <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                        <h6 class="mb-1"> City Backpack Black</h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$55.00</span>
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/home-metro/pr-q10.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-metro/pr-q11.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                                    </div>
                                    <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                        <h6 class="mb-1"> Women Black Pants </h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$100.00</span>
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/products/pr-15.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-14.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100" src="{{ URL::asset('/build/images/products/pr-15.jpg')}}">
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
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/products/pr-12.jpg' }" class="topbar-product-card pb-3">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                                    </div>
                                    <div class="mt-3">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Men
                                                pants</a>
                                        </h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$49.00 – $56.00</span>
                                        </p>
                                        <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-12.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-12.jpg'" class="d-inline-block bg_color_blue rounded-circle"></a>
                                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-34.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-34.jpg'" class="d-inline-block bg-dark rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-29.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? 'abuild/images/home-fashion-9/pr-s-30.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                                    </div>
                                    <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                        <h6 class="mb-1"> Short Sleeved Hoodie</h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <del>$45.00</del>
                                            <span class="text-danger">$30.00</span>
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/products/pr-33.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-metro/pr-q11.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                                    </div>
                                    <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                        <h6 class="mb-1"> Sweatshirt in Geometric Print</h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$35.00</span>
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/products/pr-23.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-23.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                                    </div>
                                    <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                        <h6 class="mb-1"> Dusk Pom Beanie</h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$25.00</span>
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-43.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-fashion-9/pr-s-43.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                                    </div>
                                    <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                        <h6 class="mb-1"> Stan Smith Trainers</h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$75.00</span>
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/products/pr-12.jpg' }" class="topbar-product-card pb-3">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                                    </div>
                                    <div class="mt-3">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Men
                                                pants</a>
                                        </h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$49.00 – $56.00</span>
                                        </p>
                                        <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-12.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-12.jpg'" class="d-inline-block bg_color_blue rounded-circle"></a>
                                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-34.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-34.jpg'" class="d-inline-block bg-dark rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/products/pr-23.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-23.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                                    </div>
                                    <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                        <h6 class="mb-1"> Dusk Pom Beanie</h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$25.00</span>
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/products/pr-12.jpg' }" class="topbar-product-card pb-3">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                                    </div>
                                    <div class="mt-3">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Men
                                                pants</a>
                                        </h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$49.00 – $56.00</span>
                                        </p>
                                        <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-12.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-12.jpg'" class="d-inline-block bg_color_blue rounded-circle"></a>
                                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-34.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-34.jpg'" class="d-inline-block bg-dark rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/products/pr-15.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-14.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100" src="{{ URL::asset('/build/images/products/pr-15.jpg')}}">
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
                        </div>
                    </div>
                    <!-- tab 4 -->
                    <div class="tab-pane fade" id="top-sale" role="tabpanel" aria-labelledby="top-sale-tab" tabindex="0">
                        <div class="row g-4">
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/products/pr-29.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-30.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                                    </div>
                                    <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                        <h6 class="mb-1"> City Backpack Black</h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$55.00</span>
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/home-metro/pr-q10.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-metro/pr-q11.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                                    </div>
                                    <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                        <h6 class="mb-1"> Women Black Pants </h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$100.00</span>
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/products/pr-15.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-14.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100" src="{{ URL::asset('/build/images/products/pr-15.jpg')}}">
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
                            <div class="col-md-3 col-6">
                                <div x-data="{ imageUrl: '/build/images/products/pr-12.jpg' }" class="topbar-product-card pb-3">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="imageUrl" alt="" class="img-fluid object-fit-cover w-100">
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
                                    </div>
                                    <div class="mt-3">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Men
                                                pants</a>
                                        </h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$49.00 – $56.00</span>
                                        </p>
                                        <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-12.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-12.jpg'" class="d-inline-block bg_color_blue rounded-circle"></a>
                                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-34.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-34.jpg'" class="d-inline-block bg-dark rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@include('partials.latest-blog')
@include('partials.follow-instagram')
@include('partials.shipping')
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