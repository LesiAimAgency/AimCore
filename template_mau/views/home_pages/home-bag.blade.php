<!doctype html>
<html lang="en" x-data :dir="$store.appStore.dir" x-cloak>
<head>
    <meta charset="utf-8" />
    <title> Home Default | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="" name="description" />
    <meta content="srbthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/build/images/k_favicon_32x.png')}}">
     @include('partials.head-css')
</head>
<body class="" x-data="{ showMenuScroll: false }">
    <!--head banner-->
    <div x-data="{ isOpen: true }" class="navbar-dark">
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
    @include(' partials.header-bag')
    <div>
        <!-- main slide -->
        <div class="kalles-home-section type_slideshow type_carousel kalles-medical kalles-bags">
            <div class="slideshow"
                data-flickity='{ "fade":0,"cellAlign": "center","imagesLoaded": 0,"lazyLoad": 0,"freeScroll": 0,"wrapAround": true,"autoPlay" : 0,"pauseAutoPlayOnHover" : true, "rightToLeft": false, "prevNextButtons": false,"pageDots": true, "contain" : 1,"adaptiveHeight" : 1,"dragThreshold" : 5,"percentPosition": 1 }'>
                <!-- second slide -->
                <div class="slideshow__slide">
                    <img src="{{ URL::asset('/build/images/home-bags/main-slide-01.jpg')}}" alt=""
                        class="position-absolute w-100 h-100 object-fit-cover">
                    <div class="container position-relative">
                        <div class="row justify-content-end">
                            <div class="col-lg-6">
                                <div class="content text-end">
                                    <h5 class="text-white fs-18 fw-medium">MEMBERS GET</h5>
                                    <h1 class="display-3 fw-bold text-white mb-1">20% OFF</h1>
                                    <h1 class="fs-50 fw-bold text-white mb-3">ONE FULL PRICE ITEM</h1>
                                    <a href="{{ url('shop_pages/shop')}}"
                                        class="btn text-white btn-custom-white-red btn_icon_true fw-medium min-w-150 rounded-0 py-3 px-5 text-uppercase fs-17">Register
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end second slide -->

                <!-- third slide -->
                <div class="slideshow__slide">
                    <img src="{{ URL::asset('/build/images/home-bags/main-slide-02.jpg')}}" alt=""
                        class="position-absolute w-100 h-100 object-fit-cover">
                    <div class="container position-relative">
                        <div class="row justify-content-end">
                            <div class="col-lg-6">
                                <div class="content">
                                    <h5 class="text-white fs-18 fw-medium">WE ARE KALLES</h5>
                                    <h1 class="display-3 fw-bold text-white mb-4">No Matter What Lifestyle You Live</h1>
                                    <a href="{{ url('shop_pages/shop')}}"
                                        class="btn text-white btn-custom-white-red btn_icon_true fw-medium min-w-150 rounded-0 py-3 px-5 text-uppercase fs-17">Learn
                                        More </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end third slide -->
            </div>
        </div>
        <!-- end main slide -->


        <section class="pt-5 mt-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="text-center">
                            <div class="mb-2">
                                <h1>POWERPLATE COLLECTION</h1>
                            </div>
                            <span class="fs-14 text-uppercase ls-normal text-muted">DISCOVER OUR BEST PRODUCTS</span>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row g-4 mt-4">
                    <div class="col-md-3 col-6">
                        <div x-data="{ imageUrl: '/build/images/home-bags/pr-15.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true"
                            x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/home-bags/pr-16.jpg' : imageUrl" alt=""
                                    class="img-fluid">
                                <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o"></i></a>

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
                                        style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                            </div>

                            <div class="mt-3">
                                <h6 class="mb-1 fs-16 fw-medium text-capitalize"><a
                                        href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Nebula Violet
                                        Backpack</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$235.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-3 col-6">
                        <div x-data="{ imageUrl: '/build/images/home-bags/pr-16.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true"
                            x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/home-bags/pr-17.jpg' : imageUrl" alt=""
                                    class="img-fluid">
                                <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o"></i></a>

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
                                <h6 class="mb-1 fs-16 fw-medium text-capitalize"><a
                                        href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Crumpler The
                                        Algorith Backpack</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$159.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-3 col-6">
                        <div x-data="{ imageUrl: '/build/images/home-bags/pr-18.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true"
                            x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/home-bags/pr-19.jpg' : imageUrl" alt=""
                                    class="img-fluid">
                                <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o"></i></a>

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
                                <h6 class="mb-1 fs-16 fw-medium text-capitalize"><a
                                        href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Little America
                                        Herschel Supy</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$235.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-3 col-6">
                        <div x-data="{ imageUrl: '/build/images/home-bags/pr-20.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true"
                            x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/home-bags/pr-21.jpg' : imageUrl" alt=""
                                    class="img-fluid">
                                <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o"></i></a>

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
                                <h6 class="mb-1 fs-16 fw-medium text-capitalize"><a
                                        href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Tim Rogue Laptop
                                        Backpack</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$189.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-3 col-6">
                        <div x-data="{ imageUrl: '/build/images/home-bags/pr-22.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true"
                            x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/home-bags/pr-23.jpg' : imageUrl" alt=""
                                    class="img-fluid">
                                <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o"></i></a>

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
                                <h6 class="mb-1 fs-16 fw-medium text-capitalize"><a
                                        href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Versatile Laptop
                                        Work Bag</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$185.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-3 col-6">
                        <div x-data="{ imageUrl: '/build/images/home-bags/pr-24.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true"
                            x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/home-bags/pr-25.jpg' : imageUrl" alt=""
                                    class="img-fluid">
                                <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o"></i></a>

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
                                <h6 class="mb-1 fs-16 fw-medium text-capitalize"><a
                                        href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Herschel Classic
                                        Backpack</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$168.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-3 col-6">
                        <div x-data="{ imageUrl: '/build/images/home-bags/pr-26.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true"
                            x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/home-bags/pr-27.jpg' : imageUrl" alt=""
                                    class="img-fluid">
                                <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o"></i></a>

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
                                <h6 class="mb-1 fs-16 fw-medium text-capitalize"><a
                                        href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Antihero Fortnight
                                        Backpack</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$129.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-3 col-6">
                        <div x-data="{ imageUrl: '/build/images/home-bags/pr-28.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true"
                            x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/home-bags/pr-29.jpg' : imageUrl" alt=""
                                    class="img-fluid">
                                <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o"></i></a>

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
                                <h6 class="mb-1 fs-16 fw-medium text-capitalize"><a
                                        href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Timbuk Authority
                                        BackPack</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$205.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="mt-4 text-center pt-3">
                    <button class="btn btn-custom-dark-red btn-load rounded-0">Load More <i
                            class="las la-arrow-down"></i></button>
                </div>
            </div><!--end container-->
        </section><!--end section-->

        <section class="cat-section pt-5 mt-5">
            <div class="container-fluid">
                <div class="row g-2">
                    <div class="col-md-8">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <a href="{{url( 'shop_pages.shop-left-sidebar')}}"
                                    class="d-block position-relative cat_grid_item overflow-hidden h-410">
                                    <div class="h-100 w-100 cat-grid-img"
                                        style="background-image: url('{{ asset('/build/images/home-bags/messengers-cat.jpg')}}">
                                    </div>
                                    <div class="cat-grid-button text-body">
                                        <div class="cat_grid_item__title">Messengers</div>
                                    </div>
                                </a>
                            </div><!--end col-->
                            <div class="col-md-6">
                                <a href="{{url( 'shop_pages.shop-left-sidebar')}}"
                                    class="d-block position-relative cat_grid_item overflow-hidden h-410">
                                    <div class="h-100 w-100 cat-grid-img"
                                        style="background-image: url('{{ asset('/build/images/home-bags/travel-luggage-cat.jpg')}}">
                                    </div>
                                    <div class="cat-grid-button text-body">
                                        <div class="cat_grid_item__title">Travel & Luggage</div>
                                    </div>
                                </a>
                            </div><!--end col-->
                            <div class="col-md-12">
                                <a href="{{url( 'shop_pages.shop-left-sidebar')}}"
                                    class="d-block position-relative cat_grid_item overflow-hidden h-410">
                                    <div class="h-100 w-100 cat-grid-img"
                                        style="background-image: url('{{ asset('/build/images/home-bags/laptop-bags-cat.jpg')}}">
                                    </div>
                                    <div class="cat-grid-button text-body">
                                        <div class="cat_grid_item__title">Laptop Bags</div>
                                    </div>
                                </a>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end col-->
                    <div class="col-md-4 h-100">
                        <a href="#!" class="d-block position-relative cat_grid_item overflow-hidden h-844">
                            <div class="h-100 w-100 cat-grid-img"
                                style="background-image: url('/build/images/home-bags/backpack-cat.jpg');background-position: center;">
                            </div>
                            <div class="cat-grid-button text-body">
                                <div class="cat_grid_item__title">Backpack</div>
                            </div>
                        </a>
                    </div><!--end col-->
                </div><!--end row-->
            </div>
        </section><!--end section-->

        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="text-center pb-3">
                            <div class="mb-2">
                                <h1>BEST SELLER PRODUCTS</h1>
                            </div>
                            <span class="fs-14 text-uppercase ls-normal text-muted">BEST SELLING PRODUCTS THIS
                                SEASON</span>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="card border-0 mt-4 overflow-hidden">
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-6 order-1 order-md-0">
                            <div class="card-body">
                                <div class="row g-4">
                                    <div class="col-lg-6 col-md-3 col-6">
                                        <div x-data="{ imageUrl: '/build/images/home-bags/pr-01.jpg', isHovered: false }" class="topbar-product-card"
                                            x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                            <div class="position-relative overflow-hidden">
                                                <img :src="isHovered ? '/build/images/home-bags/pr-02.jpg' : imageUrl"
                                                    alt="" class="img-fluid">
                                                <a href="#" class="wishlistadd position-absolute"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Add to Wishlist"><i
                                                        class="facl facl-heart-o"></i></a>

                                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                                    <a href="#exampleModal" data-bs-toggle="modal"
                                                        class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                                            class="iccl iccl-eye"></i></a>
                                                    <button type="button" class="btn rounded-pill fs-14"
                                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                        <i class="iccl iccl-cart"></i></button>
                                                </div>
                                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                                    style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                    <a href="#exampleModal" data-bs-toggle="modal"
                                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                                        style="width:36px; height: 36px;"><i
                                                            class="iccl iccl-eye fw-semibold"></i></a>
                                                    <button type="button"
                                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <h6 class="mb-1 fs-16 fw-medium"><a
                                                        href="{{ url('product/product-detail-layout-01')}}"
                                                        class="main_link_red">Tactical Bags</a></h6>
                                                <p class="mb-0 fs-15 text-muted">
                                                    <span>$51.00 - $57.00</span>
                                                </p>
                                                <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                                    <a href="#!"
                                                        x-on:click.prevent="imageUrl = '/build/images/home-bags/pr-14.jpg'; isHovered = false"
                                                        class="d-inline-block bg_color_blue rounded-circle"></a>
                                                    <a href="#!"
                                                        x-on:click.prevent="imageUrl = '/build/images/home-bags/pr-01.jpg'; isHovered = false"
                                                        class="d-inline-block bg_color_green rounded-circle"></a>
                                                    <a href="#!"
                                                        x-on:click.prevent="imageUrl = '/build/images/home-bags/pr-02.jpg'; isHovered = false"
                                                        class="d-inline-block bg-success rounded-circle"></a>
                                                    <a href="#!"
                                                        x-on:click.prevent="imageUrl = '/build/images/home-bags/pr-13.jpg'; isHovered = false"
                                                        class="d-inline-block bg-dark rounded-circle"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-6 col-md-3 col-6">
                                        <div x-data="{ imageUrl: '/build/images/home-bags/pr-03.jpg', isHovered: false }" class="topbar-product-card"
                                            x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                            <div class="position-relative overflow-hidden">
                                                <img :src="isHovered ? '/build/images/home-bags/pr-04.jpg' : imageUrl"
                                                    alt="" class="img-fluid">
                                                <a href="#" class="wishlistadd position-absolute"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Add to Wishlist"><i
                                                        class="facl facl-heart-o"></i></a>

                                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                                    <a href="#exampleModal" data-bs-toggle="modal"
                                                        class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                                            class="iccl iccl-eye"></i></a>
                                                    <button type="button" class="btn rounded-pill fs-14"
                                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                        <i class="iccl iccl-cart"></i></button>
                                                </div>
                                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                                    style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                    <a href="#exampleModal" data-bs-toggle="modal"
                                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                                        style="width:36px; height: 36px;"><i
                                                            class="iccl iccl-eye fw-semibold"></i></a>
                                                    <button type="button"
                                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <h6 class="mb-1 fs-16 fw-medium"><a
                                                        href="{{ url('product/product-detail-layout-01')}}"
                                                        class="main_link_red">Crumpler The Drewbob 200</a></h6>
                                                <p class="mb-0 fs-15 text-muted">
                                                    <span>$79.00</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-6 col-md-3 col-6">
                                        <div x-data="{ imageUrl: '/build/images/home-bags/pr-05.jpg', isHovered: false }" class="topbar-product-card"
                                            x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                            <div class="position-relative overflow-hidden">
                                                <img :src="isHovered ? '/build/images/home-bags/pr-05.jpg' : imageUrl"
                                                    alt="" class="img-fluid">
                                                <a href="#" class="wishlistadd position-absolute"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Add to Wishlist"><i
                                                        class="facl facl-heart-o"></i></a>

                                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                                    <a href="#exampleModal" data-bs-toggle="modal"
                                                        class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                                            class="iccl iccl-eye"></i></a>
                                                    <button type="button" class="btn rounded-pill fs-14"
                                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                        <i class="iccl iccl-cart"></i></button>
                                                </div>
                                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                                    style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                    <a href="#exampleModal" data-bs-toggle="modal"
                                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                                        style="width:36px; height: 36px;"><i
                                                            class="iccl iccl-eye fw-semibold"></i></a>
                                                    <button type="button"
                                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <h6 class="mb-1 fs-16 fw-medium"><a
                                                        href="{{ url('product/product-detail-layout-01')}}"
                                                        class="main_link_red">Crumpler Rooftop Resume</a></h6>
                                                <p class="mb-0 fs-15 text-muted">
                                                    <span>$189.00</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-6 col-md-3 col-6">
                                        <div x-data="{ imageUrl: '/build/images/home-bags/pr-07.jpg', isHovered: false }" class="topbar-product-card"
                                            x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                            <div class="position-relative overflow-hidden">
                                                <img :src="isHovered ? '/build/images/home-bags/pr-08.jpg' : imageUrl"
                                                    alt="" class="img-fluid">
                                                <a href="#" class="wishlistadd position-absolute"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Add to Wishlist"><i
                                                        class="facl facl-heart-o"></i></a>

                                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                                    <a href="#exampleModal" data-bs-toggle="modal"
                                                        class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                                            class="iccl iccl-eye"></i></a>
                                                    <button type="button" class="btn rounded-pill fs-14"
                                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                        <i class="iccl iccl-cart"></i></button>
                                                </div>
                                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                                    style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                    <a href="#exampleModal" data-bs-toggle="modal"
                                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                                        style="width:36px; height: 36px;"><i
                                                            class="iccl iccl-eye fw-semibold"></i></a>
                                                    <button type="button"
                                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <h6 class="mb-1 fs-16 fw-medium"><a
                                                        href="{{ url('product/product-detail-layout-01')}}"
                                                        class="main_link_red">Crumpler Big Breakfast Tote</a></h6>
                                                <p class="mb-0 fs-15 text-muted">
                                                    <span>$199.00</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-6 order-md-1 order-0">
                            <div class="position-relative">
                                <img src="{{ URL::asset('/build/images/home-bags/bestseller-product-banner.jpg')}}" alt=""
                                    class="img-fluid w-100">
                                <div class="position-absolute bottom-0 start-0 text-white p-5">
                                    <h6>FEATURED BACKPACK</h6>
                                    <h2 class="fs-60 mb-2">Urban 80M</h2>
                                    <a href="{{ url('shop_pages/shop')}}"
                                        class="btn text-white btn-custom-white-red btn_icon_true fw-medium min-w-150 rounded-0 py-3 px-5 text-uppercase fs-17">Learn
                                        More </a>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-->
            </div><!--end container-->
        </section>

        <section class="kalles-bags-brand">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="text-center pb-3">
                            <div class="mb-2">
                                <h1>OUR PARTNERS</h1>
                            </div>
                            <span class="fs-14 text-uppercase ls-normal text-muted">WHO WE WORK WITH</span>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row row-cols-2 row-cols-md-5 justify-content-center">
                    <div class="col">
                        <a href="#!" class="text-center d-inline-block mt-4">
                            <img src="{{ URL::asset('/build/images/home-bags/br1.png')}}" alt="" class="img-fluid">
                        </a>
                    </div><!--end col-->
                    <div class="col">
                        <a href="#!" class="text-center d-inline-block mt-4">
                            <img src="{{ URL::asset('/build/images/home-bags/br2.png')}}" alt="" class="img-fluid">
                        </a>
                    </div><!--end col-->
                    <div class="col">
                        <a href="#!" class="text-center d-inline-block mt-4">
                            <img src="{{ URL::asset('/build/images/home-bags/br3.png')}}" alt="" class="img-fluid">
                        </a>
                    </div><!--end col-->
                    <div class="col">
                        <a href="#!" class="text-center d-inline-block mt-4">
                            <img src="{{ URL::asset('/build/images/home-bags/br4.png')}}" alt="" class="img-fluid">
                        </a>
                    </div><!--end col-->
                    <div class="col">
                        <a href="#!" class="text-center d-inline-block mt-4">
                            <img src="{{ URL::asset('/build/images/home-bags/br5.png')}}" alt="" class="img-fluid">
                        </a>
                    </div><!--end col-->
                    <div class="col">
                        <a href="#!" class="text-center d-inline-block mt-4">
                            <img src="{{ URL::asset('/build/images/home-bags/br6.jpg')}}" alt="" class="img-fluid">
                        </a>
                    </div><!--end col-->
                    <div class="col">
                        <a href="#!" class="text-center d-inline-block mt-4">
                            <img src="{{ URL::asset('/build/images/home-bags/br7.jpg')}}" alt="" class="img-fluid">
                        </a>
                    </div><!--end col-->
                    <div class="col">
                        <a href="#!" class="text-center d-inline-block mt-4">
                            <img src="{{ URL::asset('/build/images/home-bags/br8.jpg')}}" alt="" class="img-fluid">
                        </a>
                    </div><!--end col-->
                    <div class="col">
                        <a href="#!" class="text-center d-inline-block mt-4">
                            <img src="{{ URL::asset('/build/images/home-bags/br9.jpg')}}" alt="" class="img-fluid">
                        </a>
                    </div><!--end col-->
                    <div class="col">
                        <a href="#!" class="text-center d-inline-block mt-4">
                            <img src="{{ URL::asset('/build/images/home-bags/br10.jpg')}}" alt="" class="img-fluid">
                        </a>
                    </div><!--end col-->
                </div><!--end row-->
            </div>
        </section><!--end section-->

        <section class="kalles-furniture-testimonial pt-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="text-center">
                            <div class="mb-2">
                                <h1>HAPPY CUSTOMERS</h1>
                            </div>
                            <span class="fs-14 text-uppercase ls-normal text-muted">WHAT FOLKS ARE SAYING ABOUT
                                US</span>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="quotes_wrapper row mt-30 g-0">
                    <div class="col-lg-4">
                        <div class="quote_slide border">
                            <p class="text-muted fs-14">Amazing theme and top class support, as I’m a beginner, Luke
                                helped
                                me above and beyond and was more than patient, his responses were quick and he has a
                                genuine
                                care for you to enjoy and move forward with your theme!</p>
                            <div class="d-flex align-items-center gap-3 mt-4 pt-2">
                                <img src="{{ URL::asset('/build/images/home-bags/avatar-01.jpg')}}" alt=""
                                    class="square-md rounded-circle">
                                <div>
                                    <h6 class="quote_author mb-0 text-uppercase">Chester Torres</h6>
                                    <p class="text-muted mb-1">VP of Product / Local Inc</p>
                                    <div class="text-warning fs-13">
                                        <i class="facl facl-star"></i>
                                        <i class="facl facl-star"></i>
                                        <i class="facl facl-star"></i>
                                        <i class="facl facl-star"></i>
                                        <i class="facl facl-star"></i>
                                        <i class="facl facl-stardn"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-4">
                        <div class="quote_slide border">
                            <p class="text-muted fs-14">Amazing theme and top class support, as I’m a beginner, Luke
                                helped
                                me above and beyond and was more than patient, his responses were quick and he has a
                                genuine
                                care for you to enjoy and move forward with your theme!</p>
                            <div class="d-flex align-items-center gap-3 mt-4 pt-2">
                                <img src="{{ URL::asset('/build/images/home-furniture/customer-02.jpg')}}" alt=""
                                    class="square-md rounded-circle">
                                <div>
                                    <h6 class="quote_author mb-0 text-uppercase">Annie Quinn</h6>
                                    <p class="text-muted mb-1">Co-Founder / April Inc</p>
                                    <div class="text-warning fs-13">
                                        <i class="facl facl-star"></i>
                                        <i class="facl facl-star"></i>
                                        <i class="facl facl-star"></i>
                                        <i class="facl facl-star"></i>
                                        <i class="facl facl-star"></i>
                                        <i class="facl facl-stardn"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-4">
                        <div class="quote_slide border">
                            <p class="text-muted fs-14">Amazing theme and top class support, as I’m a beginner, Luke
                                helped
                                me above and beyond and was more than patient, his responses were quick and he has a
                                genuine
                                care for you to enjoy and move forward with your theme!</p>
                            <div class="d-flex align-items-center gap-3 mt-4 pt-2">
                                <img src="{{ URL::asset('/build/images/home-bags/avatar-03.jpg')}}" alt=""
                                    class="square-md rounded-circle">
                                <div>
                                    <h6 class="quote_author mb-0 text-uppercase">Arthur Hansen</h6>
                                    <p class="text-muted mb-1">CEO / Letters Inc</p>
                                    <div class="text-warning fs-13">
                                        <i class="facl facl-star"></i>
                                        <i class="facl facl-star"></i>
                                        <i class="facl facl-star"></i>
                                        <i class="facl facl-star"></i>
                                        <i class="facl facl-star"></i>
                                        <i class="facl facl-stardn"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div>
        </section>
    @include('partials/footer')
    @include('partials/popup')
    </div>
    @include('partials/card-model')
    @include('/partials/vendor-scripts')
    <script src="{{ URL::asset('build/libs/flickity/flickity.pkgd.min.js')}}"></script>
    <script src="{{ URL::asset('build/js/main.js')}}"></script>
    <script src="{{ URL::asset('build/js/app.js')}}"></script>
</body>
</html>
