<!doctype html>
<html lang="en" x-data :dir="$store.appStore.dir" x-cloak>

<head>
    <meta charset="utf-8" />
    <title> Home Lookbook Collection | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="" name="description" />
    <meta content="srbthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/build/images/k_favicon_32x.png')}}">
    @yield('css')
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
            <div class="slideshow"
                data-flickity='{ "fade":0,"cellAlign": "center","imagesLoaded": 0,"lazyLoad": 0,"freeScroll": 0,"wrapAround": true,"autoPlay" : 0,"pauseAutoPlayOnHover" : true, "rightToLeft": false, "prevNextButtons": false,"pageDots": true, "contain" : 1,"adaptiveHeight" : 1,"dragThreshold" : 5,"percentPosition": 1 }'>
                <!-- first slide -->
                <div class="slideshow__slide w-100" style="background-image: url('{{ asset('/build/images/slide/slider-01.jpg')}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7">
                                <div data-aos="fade-right" data-aos-delay="300">
                                    <h4 class="fs-18 fw-medium">SUMMER 2020</h4>
                                    <h1 class="display-4 fw-semibold mb-3">New Arrival Collection</h1>
                                    <a class="btn btn-dark text-white rounded-0 min-w-150"
                                        href="{{ url('shop_pages/shop-filter-sidebar')}}">Explore
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
                            <div class="col-lg-7">
                                <div class="text-end" data-aos="fade-right" data-aos-delay="300">
                                    <h4 class="fs-18 fw-medium">NEW SEASON</h4>
                                    <h3 class="display-4 fw-semibold mb-3">Lookbook Collection</h3>
                                    <a class="btn btn-dark text-white rounded-0 min-w-150"
                                        href="{{ url('shop_pages/shop-filter-sidebar')}}">Explore
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
                            <div class="col-lg-7">
                                <div data-aos="fade-right" data-aos-delay="300">
                                    <h4 class="fs-18 fw-medium">SUMMER SALE</h4>
                                    <h1 class="display-4 fw-semibold mb-3">Save up to 70%</h1>
                                    <a class="btn btn-dark text-white rounded-0 min-w-150"
                                        href="{{ url('shop_pages/shop-filter-sidebar')}}">Explore
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

        <section class="cat-section pb-4">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-6">
                        <a href="#!" class="d-block position-relative cat_grid_item overflow-hidden h-624">
                            <div class="h-100 w-100 cat-grid-img"
                                style="background-image: url('{{ asset('/build/images/home-lookbook-collection/cat-women.jpg')}}">
                            </div>
                            <div class="cat-grid-button text-body">
                                <div class="cat_grid_item__title">Women</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#!" class="d-block position-relative cat_grid_item overflow-hidden h-300 mb-4">
                            <div class="h-100 w-100 cat-grid-img"
                                style="background-image: url('/build/images/home-lookbook-collection/cat-accessories.jpeg'); background-position: center;">
                            </div>
                            <div class="cat-grid-button text-body">
                                <div class="cat_grid_item__title">Accessories</div>
                            </div>
                        </a>
                        <a href="#!" class="d-block position-relative cat_grid_item overflow-hidden h-300">
                            <div class="h-100 w-100 cat-grid-img"
                                style="background-image: url('/build/images/home-lookbook-collection/cat-shoes.jpeg'); background-position: center;">
                            </div>
                            <div class="cat-grid-button text-body">
                                <div class="cat_grid_item__title">Shoes</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#!" class="d-block position-relative cat_grid_item overflow-hidden h-624">
                            <div class="h-100 w-100 cat-grid-img"
                                style="background-image: url('{{ asset('/build/images/home-lookbook-collection/cat-watches.jpg')}}">
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
            <div class="container">
                <div class="row g-lg-4 g-3 gy-md-0 gy-4 align-items-center">
                    <div class="col-md-4">
                        <a href="{{ url('shop_pages/shop-right-sidebar')}}" class="kalles-banner-promotion d-block">
                            <img src="{{ URL::asset('/build/images/home-lookbook-collection/cat-left.jpg')}}" alt=""
                                class="img-fluid">
                            <div class="p-20 position-absolute bottom-0 left-0 text-body">
                                <p class="text-uppercase fw-medium fs-14 mb-1">View Collections</p>
                                <h3 class="fs-35">LOOKBOOK</h3>
                                <p class="text-muted mb-0">your world of fashion in numbers</p>
                            </div>
                        </a>
                    </div><!--end col-->
                    <div class="col-md-4">
                        <div x-data="{ imageUrl: '/build/images/home-lookbook-collection/cat-center-01.jpg' }" class="kalles-banner-promotion topbar-product-card">
                            <div class="position-relative overflow-hidden">
                                <span class="new-label bg-danger text-white rounded-circle"> -34% </span>
                                <img :src="imageUrl" alt="" class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-white"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

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
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                                <div class="product-size text-center d-none d-lg-block">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link">La
                                            Bohème
                                            Rose Gold</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$60.00</del>
                                        <span class="text-danger">$45.00</span>
                                    </p>
                                    <div
                                        class="product-color-list mt-1 gap-2 d-flex align-items-center justify-content-center p-2">
                                        <a href="#!"
                                            x-on:mouseover="imageUrl = '/build/images/home-classic/pr-big-24.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-big-24.jpg'"
                                            class="d-inline-block bg_color_pink rounded-circle"></a>
                                        <a href="#!"
                                            x-on:mouseover="imageUrl = '/build/images/home-classic/pr-big-25.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-big-25.jpg'"
                                            class="d-inline-block bg-dark rounded-circle"></a>
                                    </div>
                                </div>
                                <div class="count-time d-none d-lg-block" data-date="10-10-2028">
                                    <ul
                                        class="list-unstyled d-flex gap-2 align-items-center text-center justify-content-center mb-0">
                                        <li class="bg-dark text-white text-white-50 fs-12 rounded"><span
                                                class="days text-white fs-14">0</span>days</li>
                                        <li class="bg-dark text-white text-white-50 fs-12 rounded"><span
                                                class="text-white fs-14">00</span>Hours</li>
                                        <li class="bg-dark text-white text-white-50 fs-12 rounded"><span
                                                class="min text-white fs-14">00</span>Minutes</li>
                                        <li class="bg-dark text-white text-white-50 fs-12 rounded"><span
                                                class="sc text-white fs-14">00</span>Seconds</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="d-lg-none">
                                <div class="text-center mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link">La
                                            Bohème
                                            Rose Gold</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$60.00</del>
                                        <span class="text-danger">$45.00</span>
                                    </p>
                                    <div
                                        class="product-color-list mt-1 gap-2 d-flex align-items-center justify-content-center p-2">
                                        <a href="#!"
                                            x-on:mouseover="imageUrl = '/build/images/home-classic/pr-big-24.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-big-24.jpg'"
                                            class="d-inline-block bg_color_pink rounded-circle"></a>
                                        <a href="#!"
                                            x-on:mouseover="imageUrl = '/build/images/home-classic/pr-big-25.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-big-25.jpg'"
                                            class="d-inline-block bg-dark rounded-circle"></a>
                                    </div>
                                </div>
                                <div class="count-time position-relative mt-4 d-lg-block d-none"
                                    data-date="10-10-2028">
                                    <ul
                                        class="list-unstyled d-flex gap-2 align-items-center text-center justify-content-center mb-0">
                                        <li class="bg-dark text-white text-white-50 fs-12 rounded"
                                            style="min-width: 50px;"><span class="days text-white fs-14">0</span>days
                                        </li>
                                        <li class="bg-dark text-white text-white-50 fs-12 rounded"
                                            style="min-width: 50px;"><span class=" text-white fs-14">00</span>Hours
                                        </li>
                                        <li class="bg-dark text-white text-white-50 fs-12 rounded"
                                            style="min-width: 50px;"><span
                                                class="min text-white fs-14">00</span>Minutes</li>
                                        <li class="bg-dark text-white text-white-50 fs-12 rounded"
                                            style="min-width: 50px;"><span
                                                class="sc text-white fs-14">00</span>Seconds</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-4">
                        <a href="{{ url('shop_pages/shop')}}" class="kalles-banner-promotion d-block">
                            <img src="{{ URL::asset('/build/images/home-lookbook-collection/cat-right.jpg')}}" alt=""
                                class="img-fluid">
                            <div
                                class="p-20 position-absolute top-50 end-0 text-body start-0 content-position text-center">
                                <p class="text-uppercase fw-medium fs-18 mb-1">Men Collection</p>
                                <h3 class="fs-50">SALE 70%</h3>
                                <button class="btn btn-custom-dark fw-medium min-w-150 rounded-pill">Shop Now</button>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-5 pt-5">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="text-center">
                            <div class="mb-2">
                                <h3 class="section-title position-relative flex">
                                    <span>TRENDING</span>
                                </h3>
                            </div>
                            <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">Top
                                view in
                                this week</span>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row my-4 py-2 tranding-card"
                    data-flickity='{"imagesLoaded": 0,"adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": 1,"pageDots": false, "autoPlay" : 0, "pauseAutoPlayOnHover" : true, "rightToLeft": false }'>
                    <div class="col-md-3 col-6 col-lg-2 px-lg-12 px-2 ">
                        <div x-data="{ imageUrl: '/build/images/products/pr-01.jpg', isHovered: false }" class="topbar-product-card pb-3"
                            x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <span class="new-label bg-success text-white rounded-circle text-center"> New
                                </span>
                                <img :src="isHovered ? '/build/images/products/pr-02.jpg' : imageUrl" alt=""
                                    class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-white"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
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
                        <div x-data="{ imageUrl: '/build/images/products/pr-33.jpg', isHovered: false }" class="topbar-product-card pb-3"
                            x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/products/pr-34.jpg' : imageUrl" alt=""
                                    class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-white"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
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
                        <div x-data="{ imageUrl: '/build/images/products/pr-04.jpg' }" class="topbar-product-card pb-3">
                            <div class="position-relative overflow-hidden">
                                <img :src="imageUrl" alt="" class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-white"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
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
                                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-05.jpg'"
                                        x-on:click.prevent="imageUrl = '/build/images/products/pr-05.jpg'"
                                        class="d-inline-block bg-body-tertiary rounded-circle"></a>
                                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-31.jpg'"
                                        x-on:click.prevent="imageUrl = '/build/images/products/pr-31.jpg'"
                                        class="d-inline-block bg_color_pink rounded-circle"></a>
                                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-32.jpg'"
                                        x-on:click.prevent="imageUrl = '/build/images/products/pr-32.jpg'"
                                        class="d-inline-block bg-dark rounded-circle"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 col-lg-2 px-lg-12 px-2 ">
                        <div x-data="{ imageUrl: '/build/images/products/pr-06.jpg' }" class="topbar-product-card pb-3">
                            <div class="position-relative overflow-hidden">
                                <span class="new-label bg-danger text-white rounded-circle"> -25% </span>
                                <img :src="imageUrl" alt="" class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-white"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
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
                                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-07.jpg'"
                                        x-on:click.prevent="imageUrl = '/build/images/products/pr-07.jpg'"
                                        class="d-inline-block bg_color_green rounded-circle"></a>
                                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-08.jpg'"
                                        x-on:click.prevent="imageUrl = '/build/images/products/pr-08.jpg'"
                                        class="d-inline-block bg-body-secondary rounded-circle"></a>
                                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-09.jpg'"
                                        x-on:click.prevent="imageUrl = '/build/images/products/pr-09.jpg'"
                                        class="d-inline-block bg_color_blue rounded-circle"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- slide5 -->
                    <div class="col-md-3 col-6 col-lg-2 px-lg-12 px-2 ">
                        <div x-data="{ imageUrl: '/build/images/products/pr-15.jpg', isHovered: false }" class="topbar-product-card pb-3"
                            x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/products/pr-14.jpg' : imageUrl" alt=""
                                    class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-white"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                <div class="bg-overlay"></div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
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
                                <h6 class="mb-1"><a href="#!" class="product-title">Mercury Tee</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span class="text-muted">$68.00</span>
                                </p>
                                <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                    <a href="#!"
                                        x-on:click.prevent="imageUrl = '/build/images/home-metro/pr-q1.jpg'; isHovered = false"
                                        style="background: url('/build/images/home-metro/pr-q1.jpg');background-size: cover;"
                                        class="d-inline-block bg-body-tertiary rounded-circle"></a>
                                    <a href="#!"
                                        x-on:click.prevent="imageUrl = '/build/images/home-metro/pr-q2.jpg'; isHovered = false"
                                        style="background: url('/build/images/home-metro/pr-q2.jpg');background-size: cover;"
                                        class="d-inline-block bg_color_pink rounded-circle"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 col-lg-2 px-lg-12 px-2 ">
                        <div x-data="{ imageUrl: '/build/images/products/pr-27.jpg', isHovered: false }" class="topbar-product-card pb-3"
                            x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <span class="new-label bg-danger text-white rounded-circle"> -34% </span>
                                <img :src="isHovered ? '/build/images/products/pr-28.jpg' : imageUrl" alt=""
                                    class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-white"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                <div class="bg-overlay"></div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
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
                                <h6 class="mb-1"><a href="#!" class="product-title">Mercury Tee</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span class="text-muted">$68.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 col-lg-2 px-lg-12 px-2 ">
                        <div x-data="{ imageUrl: '/build/images/products/pr-18.jpg', isHovered: false }" class="topbar-product-card pb-3"
                            x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/products/pr-17.jpg' : imageUrl" alt=""
                                    class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-white"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
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
                        <div x-data="{ imageUrl: '/build/images/products/pr-25.png', isHovered: false }" class="topbar-product-card pb-3"
                            x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/products/pr-26.png' : imageUrl" alt=""
                                    class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-white"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
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

        <section class="cat-section pb-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="text-center">
                            <div class="mb-2">
                                <h3 class="section-title position-relative flex text-uppercase">
                                    <span>Lookbook Collection</span>
                                </h3>
                            </div>
                            <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">Spring
                                summer 2024 lookbook</span>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row g-4 mt-4">
                    <div class="col-lg-6">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="position-relative cat_grid_item overflow-hidden h-350">
                                    <div class="h-100 w-100 cat-grid-img"
                                        style="background-image: url('{{ asset('/build/images/home-lookbook-collection/bg-pin-01.jpeg')}}">
                                    </div>
                                    <div class="pin-type position-absolute position-09 z-2">
                                        <span class="zoompin"></span>
                                        <a href="#pinType1"
                                            class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center position-relative"
                                            data-bs-toggle="modal">
                                            <i class="nav_link_icon position-relative"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative cat_grid_item overflow-hidden h-350">
                                    <div class="h-100 w-100 cat-grid-img"
                                        style="background-image: url('{{ asset('/build/images/home-lookbook-collection/bg-pin-02.jpeg')}}">
                                    </div>
                                    <div class="pin-type position-absolute position-08 z-2">
                                        <span class="zoompin"></span>
                                        <a href="#pinType2"
                                            class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center position-relative"
                                            data-bs-toggle="modal">
                                            <i class="nav_link_icon position-relative"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative cat_grid_item overflow-hidden h-350">
                                    <div class="h-100 w-100 cat-grid-img"
                                        style="background-image: url('{{ asset('/build/images/home-lookbook-collection/bg-pin-04.jpg')}}">
                                    </div>
                                    <div class="pin-type position-absolute position-04 z-2">
                                        <span class="zoompin"></span>
                                        <a href="#pinType3"
                                            class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center position-relative"
                                            data-bs-toggle="modal">
                                            <i class="nav_link_icon position-relative"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative cat_grid_item overflow-hidden h-350">
                                    <div class="h-100 w-100 cat-grid-img"
                                        style="background-image: url('{{ asset('/build/images/home-lookbook-collection/bg-pin-05.jpg')}}">
                                    </div>
                                    <div class="pin-type position-absolute position-04 z-2">
                                        <span class="zoompin"></span>
                                        <a href="#pinType4"
                                            class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center position-relative"
                                            data-bs-toggle="modal">
                                            <i class="nav_link_icon position-relative"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-6">
                        <div class="position-relative cat_grid_item overflow-hidden h-100">
                            <div class="h-100 w-100 cat-grid-img"
                                style="background-image: url('{{ asset('/build/images/home-lookbook-collection/bg-pin-03.jpg')}}">
                            </div>
                            <div class="pin-type position-absolute position-06 z-2">
                                <span class="zoompin"></span>
                                <a href="#pinType5"
                                    class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center position-relative"
                                    data-bs-toggle="modal">
                                    <i class="nav_link_icon position-relative"></i>
                                </a>
                            </div>
                            <div class="pin-type position-absolute position-09 z-2">
                                <span class="zoompin"></span>
                                <a href="#pinType6"
                                    class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center position-relative"
                                    data-bs-toggle="modal">
                                    <i class="nav_link_icon position-relative"></i>
                                </a>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end-->
            </div><!--end container-->
            <!-- pin-type 1 -->
            <div class="modal fade modal-overl pin_popup" id="pinType1" tabindex="-1"
                aria-labelledby="pinType1Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-20">
                            <div x-data="{ imageUrl: '/build/images/home-lookbook-collection/pr-pin-11.jpg', isHovered: false }" class="topbar-product-card"
                                x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false"
                                class="topbar-product-card">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/home-lookbook-collection/pr-pin-12.jpg' : imageUrl"
                                        alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                        data-bs-placement="right" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o"></i></a>

                                    <div class="product-button d-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn rounded-pill fs-14"><span>Quick
                                                View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-toggle="modal"
                                            data-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                                Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-2"><a href="{{ url('product/product-detail-layout-01')}}"
                                            class="product-title">New Look
                                            lace up trainer</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$14.99</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end pin-type 1 -->
            <!-- pin-type 2 -->
            <div class="modal fade modal-overl pin_popup" id="pinType2" tabindex="-1"
                aria-labelledby="pinType2Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-20">
                            <div x-data="{ imageUrl: '/build/images/products/pr-10.jpg', isHovered: false }" class="topbar-product-card"
                                x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false"
                                class="topbar-product-card">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/products/pr-41.jpg' : imageUrl"
                                        alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="right"
                                        data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                                    <div class="product-button d-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn rounded-pill fs-14"><span>Quick
                                                View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-toggle="modal"
                                            data-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                                Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-2"><a href="{{ url('product/product-detail-layout-01')}}"
                                            class="product-title">Tote Bag
                                            Cream Cord</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$16.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end pin-type 2 -->
            <!-- pin-type 3 -->
            <div class="modal fade modal-overl pin_popup" id="pinType3" tabindex="-1"
                aria-labelledby="pinType3Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-20">
                            <div x-data="{ imageUrl: '/build/images/home-lookbook-collection/pr-pin-51.jpg', isHovered: false }" class="topbar-product-card"
                                x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false"
                                class="topbar-product-card">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/home-lookbook-collection/pr-pin-52.jpg' : imageUrl"
                                        alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="right"
                                        data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                                    <div class="product-button d-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn rounded-pill fs-14"><span>Quick
                                                View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-toggle="modal"
                                            data-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                                Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-2"><a href="{{ url('product/product-detail-layout-01')}}"
                                            class="product-title">Stripe
                                            Long Sleeve Top</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$15.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end pin-type 3 -->
            <!-- pin-type 4 -->
            <div class="modal fade modal-overl pin_popup" id="pinType4" tabindex="-1"
                aria-labelledby="pinType4Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-20">
                            <div x-data="{ imageUrl: '/build/images/home-lookbook-collection/pr-pin-61.jpg', isHovered: false }" class="topbar-product-card"
                                x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false"
                                class="topbar-product-card">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/home-lookbook-collection/pr-pin-62.jpg' : imageUrl"
                                        alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="right"
                                        data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                                    <div class="product-button d-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn rounded-pill fs-14"><span>Quick
                                                View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-toggle="modal"
                                            data-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                                Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-2"><a href="{{ url('product/product-detail-layout-01')}}"
                                            class="product-title">Boxy
                                            Sweatshirt Stripe</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$18.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end pin-type 4 -->
            <!-- pin-type 5 -->
            <div class="modal fade modal-overl pin_popup" id="pinType5" tabindex="-1"
                aria-labelledby="pinType5Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-20">
                            <div x-data="{ imageUrl: '/build/images/home-lookbook-collection/pr-pin-41.jpg', isHovered: false }" class="topbar-product-card"
                                x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false"
                                class="topbar-product-card">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/home-lookbook-collection/pr-pin-42.jpg' : imageUrl"
                                        alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="right"
                                        data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                                    <div class="product-button d-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn rounded-pill fs-14"><span>Quick
                                                View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-toggle="modal"
                                            data-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                                Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-2"><a href="{{ url('product/product-detail-layout-01')}}"
                                            class="product-title">Men Knit
                                            Sweater</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$95.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end pin-type 5 -->
            <!-- pin-type 6 -->
            <div class="modal fade modal-overl pin_popup" id="pinType6" tabindex="-1"
                aria-labelledby="pinType6Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-20">
                            <div x-data="{ imageUrl: '/build/images/home-lookbook-collection/pr-pin-31.jpg', isHovered: false }" class="topbar-product-card"
                                x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false"
                                class="topbar-product-card">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/home-lookbook-collection/pr-pin-32.jpg' : imageUrl"
                                        alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="right"
                                        data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                                    <div class="product-button d-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn rounded-pill fs-14"><span>Quick
                                                View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-toggle="modal"
                                            data-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                                Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-2"><a href="{{ url('product/product-detail-layout-01')}}"
                                            class="product-title">High
                                            Waist Skinny Jean</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$95.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end pin-type  -->
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
