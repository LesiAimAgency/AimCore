<!doctype html>
<html lang="en" x-data :dir="$store.appStore.dir" x-cloak>

<head>
    <meta charset="utf-8" />
    <title> Home Fashion 9 | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="" name="description" />
    <meta content="srbthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/build/images/k_favicon_32x.png') }}">
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
    @include('partials/header-fashion-09')

    <div>
        <section class=" kalles-categories-link-banner position-relative"
            style="background-image: url('/build/images/home-fashion-9/main-slide.jpg');">
            <div
                class="position-absolute top-0 start-0 end-0 bottom-0 text-center py-5 d-flex align-items-center justify-content-center">
                <div>
                    <h3 class="fs-18 mb-3">SUMMER COLLECTION</h3>
                    <h1 class="text-uppercase fs-60 fw-bold mb-4">HUGE SALE 70% OFF</h1>
                    <a href="{{ url('shop_pages/shop') }}"
                        class="btn btn-dark text-white fw-medium min-w-150 rounded-0">Men</a>
                    <a href="{{ url('shop_pages/shop') }}"
                        class="btn btn-dark text-white fw-medium min-w-150 rounded-0">Women</a>
                </div>
            </div>
        </section>

        <section class="cat-section pb-0">
            <div class="container">
                <div class="row g-2 g-lg-4">
                    <div class="col-lg-3 col-6 col-md-4">
                        <a href="{{ url('shop_pages/shop-right-sidebar') }}"
                            class="d-block position-relative cat_grid_item overflow-hidden h-300 mb-2 mb-lg-4">
                            <div class="h-100 w-100 cat-grid-img"
                                style="background-image: url('/build/images/home-fashion-10/cat-women.jpg')">
                            </div>
                            <div class="cat-grid-button">
                                <div class="cat_grid_item__title text-body">Women</div>
                            </div>
                        </a>
                        <a href="{{ url('shop_pages/shop-right-sidebar') }}"
                            class="d-block position-relative cat_grid_item overflow-hidden h-300">
                            <div class="h-100 w-100 cat-grid-img"
                                style="background-image: url('{{ asset('/build/images/home-fashion-10/cat-accessories.jpg') }}">
                            </div>
                            <div class="cat-grid-button">
                                <div class="cat_grid_item__title text-body">Accessories</div>
                            </div>
                        </a>
                    </div><!--end col-->
                    <div class="col-lg-3 col-6 col-md-4">
                        <a href="{{ url('shop_pages/shop-right-sidebar') }}"
                            class="d-block position-relative cat_grid_item overflow-hidden h-300 mb-2 mb-lg-4">
                            <div class="h-100 w-100 cat-grid-img"
                                style="background-image: url('{{ asset('/build/images/home-fashion-10/cat-men.jpg') }}">
                            </div>
                            <div class="cat-grid-button">
                                <div class="cat_grid_item__title text-body">Men</div>
                            </div>
                        </a>
                        <a href="{{ url('shop_pages/shop-right-sidebar') }}"
                            class="d-block position-relative cat_grid_item overflow-hidden h-300">
                            <div class="h-100 w-100 cat-grid-img"
                                style="background-image: url('{{ asset('/build/images/home-fashion-10/cat-shoes.jpg') }}">
                            </div>
                            <div class="cat-grid-button">
                                <div class="cat_grid_item__title text-body">Shoes</div>
                            </div>
                        </a>
                    </div><!--end col-->
                    <div class="col-md-4 col-lg-6">
                        <a href="{{ url('shop_pages/shop-right-sidebar') }}"
                            class="d-block position-relative cat_grid_item overflow-hidden h-624">
                            <div class="h-100 w-100 cat-grid-img"
                                style="background-image: url('/build/images/home-fashion-10/cat-watch.jpg');background-position: center;">
                            </div>
                            <div class="cat-grid-button">
                                <div class="cat_grid_item__title text-body">Watch Collections</div>
                            </div>
                        </a>
                    </div><!--end col-->
                    <div class="col-md-6">
                        <a href="#!" class="position-relative hover-zoom d-block">
                            <img src="{{ URL::asset('/build/images/home-fashion-10/twin-banner-01.jpg') }}"
                                alt="" class="img-fluid hover-zoom-img">
                            <div
                                class="position-absolute start-0 start-0 end-0 top-0 bottom-0 d-flex align-items-center justify-content-center">
                                <div class="text-center text-white">
                                    <h4 class="fs-24">LOOKBOOK 2021</h4>
                                    <h6 class="mb-0">MAKE LOVE THIS LOOK</h6>
                                </div>
                            </div>
                        </a>
                    </div><!--end col-->
                    <div class="col-md-6">
                        <a href="#!" class="position-relative hover-zoom d-block">
                            <img src="{{ URL::asset('/build/images/home-fashion-10/twin-banner-02.jpg') }}"
                                alt="" class="hover-zoom-img img-fluid">
                            <div
                                class="position-absolute start-0 start-0 end-0 top-0 bottom-0 d-flex align-items-center justify-content-center">
                                <div class="text-center text-white">
                                    <h6 class="text-uppercase fs-20 fw-medium mb-2">Huge Sale</h6>
                                    <h1 class="mb-0 text-uppercase fs-60">50% off</h1>
                                    <h6 class="text-uppercase fs-20 fw-medium mb-0">Hurry up</h6>
                                </div>
                            </div>
                        </a>
                    </div><!--end   col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->

        <section class="type_tab_collection">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="text-center">
                            <div class="mb-4">
                                <h3 class="position-relative flex text-capitalize line-section-title">
                                    <span>best seller products</span>
                                </h3>
                            </div>
                            <span class="fs-14 text-muted">Dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor!</span>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                <ul class="nav nav-underline g-lg-4 justify-content-center mt-4 mb-0" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="women-tab" data-bs-toggle="pill" data-bs-target="#women"
                            type="button" role="tab" aria-controls="women" aria-selected="true">Women</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="men-tab" data-bs-toggle="pill" data-bs-target="#men"
                            type="button" role="tab" aria-controls="men" aria-selected="false">Men</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="accessories-tab" data-bs-toggle="pill"
                            data-bs-target="#accessories" type="button" role="tab" aria-controls="accessories"
                            aria-selected="false">Accessories</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="top-tab" data-bs-toggle="pill" data-bs-target="#top"
                            type="button" role="tab" aria-controls="top" aria-selected="false">Top</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="bottoms-tab" data-bs-toggle="pill" data-bs-target="#bottoms"
                            type="button" role="tab" aria-controls="bottoms"
                            aria-selected="false">Bottoms</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="shoes-tab" data-bs-toggle="pill" data-bs-target="#shoes"
                            type="button" role="tab" aria-controls="shoes" aria-selected="false">Shoes</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="jewellery-tab" data-bs-toggle="pill"
                            data-bs-target="#jewellery" type="button" role="tab" aria-controls="jewellery"
                            aria-selected="false">Jewellery</button>
                    </li>
                </ul>
                <div class="tab-content mt-4" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="women" role="tabpanel"
                        aria-labelledby="women-tab" tabindex="0">
                        <div class="row g-2 g-lg-4">
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/products/pr-01.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <span class="new-label bg-success text-white rounded-circle text-center"> New
                                        </span>
                                        <img :src="isHovered ? '/build/images/products/pr-02.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                    <div class="mt-3 text-center">
                                        <p class="text-muted mb-2">Kalles</p>
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Analogue
                                                Resin Strap</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$30.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-classic/pr-big-24.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <span class="new-label bg-danger text-white rounded-circle text-center"> -34%
                                        </span>
                                        <img :src="isHovered ? '/build/images/home-classic/pr-big-25.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                    <div class="mt-3 text-center">
                                        <p class="text-muted mb-2">Kalles</p>
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">La Bohème
                                                Rose Gold</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <del>$60.00</del>
                                            <span class="text-danger">$40.00</span>
                                        </p>
                                        <div
                                            class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-big-24.jpg'; isHovered = false"
                                                class="d-inline-block bg_color_pink rounded-circle"></a>
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-big-25.jpg'; isHovered = false"
                                                class="d-inline-block bg-dark rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-classic/pr-03.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-classic/pr-04.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                    <div class="mt-3 text-center">
                                        <p class="text-muted mb-2">Kalles</p>
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Ridley
                                                High Waist</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$36.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-classic/pr-19.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-classic/pr-20.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                    <div class="mt-3 text-center">
                                        <p class="text-muted mb-2">Kalles</p>
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Cream
                                                women pants</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$35.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-classic/pr-30.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-classic/pr-29.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                    <div class="mt-3 text-center">
                                        <p class="text-muted mb-2">Kalles</p>
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Women
                                                Black Pants</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$100.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/products/pr-33.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-34.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                    <div class="mt-3 text-center">
                                        <p class="text-muted mb-2">Kalles</p>
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Sweatshirt in Geometric Print</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$35.00</span>
                                        </p>
                                        <div
                                            class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/products/pr-33.jpg'; isHovered = false"
                                                class="d-inline-block bg-dark rounded-circle"></a>
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/products/pr-34.jpg'; isHovered = false"
                                                class="d-inline-block bg_color_blue rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/products/pr-15.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-16.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                        <p class="product-size mb-0 text-center text-white fw-medium">S, M</p>
                                    </div>
                                    <div class="mt-3 text-center">
                                        <p class="text-muted mb-2">Kalles</p>
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Mercury
                                                Tee</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$68.00</span>
                                        </p>
                                        <div
                                            class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/products/pr-15.jpg'; isHovered = false"
                                                style="background-image: url('/build/images/products/pr-15.jpg');background-size: cover;"
                                                class="d-inline-block rounded-circle"></a>
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/products/pr-16.jpg'; isHovered = false"
                                                style="background-image: url('/build/images/products/pr-16.jpg');background-size: cover;"
                                                class="d-inline-block rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/products/pr-05.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-05.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                    <div class="mt-3 text-center">
                                        <p class="text-muted mb-2">H&M</p>
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Blush
                                                Beanie</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$15.00</span>
                                        </p>
                                        <div
                                            class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/products/pr-05.jpg'; isHovered = false"
                                                class="d-inline-block bg-body-tertiary rounded-circle"></a>
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/products/pr-31.jpg'; isHovered = false"
                                                class="d-inline-block bg_color_pink rounded-circle"></a>
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/products/pr-32.jpg'; isHovered = false"
                                                class="d-inline-block bg-dark rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->

                        <div class="text-center mt-4 pt-2">
                            <a href="#!" class="btn btn-dark btn-lg min-w-150 px-4 fs-14 py-3 rounded-0">Load
                                More</a>
                        </div>
                    </div><!--end tab pane-->
                    <div class="tab-pane fade" id="men" role="tabpanel" aria-labelledby="men-tab"
                        tabindex="0">
                        <div class="row g-2 g-lg-4">
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/products/pr-19.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-20.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                    <div class="mt-3 text-center">
                                        <p class="text-muted mb-2">Mi-Pac</p>
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Circle
                                                Snapback Cap</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$25.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-metro/pr-q6.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-metro/pr-q7.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                    <div class="mt-3 text-center">
                                        <p class="text-muted mb-2">Mi-Pac</p>
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Crosshatch Backpack</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$30.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-classic/pr-31.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-classic/pr-33.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                    <div class="mt-3 text-center">
                                        <p class="text-muted mb-2">Kalles</p>
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Men
                                                pants</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$49.00 – $56.00</span>
                                        </p>
                                        <div
                                            class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-31.jpg'; isHovered = false"
                                                class="d-inline-block bg_color_blue rounded-circle"></a>
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-33.jpg'; isHovered = false"
                                                class="d-inline-block bg-dark rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/products/pr-23.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-24.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                    <div class="mt-3 text-center">
                                        <p class="text-muted mb-2">CK</p>
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Dusk Pom
                                                Beanie</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$25.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/products/pr-36.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-37.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                    <div class="mt-3 text-center">
                                        <p class="text-muted mb-2">Nike</p>
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Sampson
                                                Lo Trainers</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$65.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-classic/pr-27.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-classic/pr-28.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                    <div class="mt-3 text-center">
                                        <p class="text-muted mb-2">Kalles</p>
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">City
                                                Backpack Black</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$55.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/products/pr-38.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-39.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <p class="text-muted mb-2">Kalles</p>
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Wide Fit
                                                Dusty</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$12.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/products/pr-10.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-41.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <p class="text-muted mb-2">CK</p>
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Tote Bag
                                                Cream Cord</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$16.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                    <div class="tab-pane fade" id="accessories" role="tabpanel"
                        aria-labelledby="accessories-tab" tabindex="0">
                        <div class="row g-2 g-lg-4">
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-classic/pr-27.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-classic/pr-28.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <p class="text-muted mb-2">Kalles</p>
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">City
                                                Backpack Black</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$55.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-17.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-fashion-9/pr-s-18.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Women
                                                clothing combo</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$3.50– $30.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-19.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-fashion-9/pr-s-20.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Neck Snap
                                                Tee</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$12.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-21.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-fashion-9/pr-s-22.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Coaches
                                                Cap Black</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$15.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-23.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <span class="new-label bg-danger text-white rounded-circle"> -34% </span>
                                        <img :src="isHovered ? '/build/images/home-fashion-9/pr-s-24.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Retro
                                                Lace Up Sneakers</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$30.00 – $40.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-lookbook/pinner-p-03.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <span class="new-label bg-danger text-white rounded-circle"> -56% </span>
                                        <img :src="isHovered ? '/build/images/home-lookbook/pinner-p-04.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Striped
                                                Long Sleeve Top</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <del>$45.00</del>
                                            <span class="text-danger">$20.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-25.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-fashion-9/pr-s-26.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Newyork
                                                Coaches Hat</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$15.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-lookbook/pinner-p-01.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <span class="new-label bg-danger text-white rounded-circle"> -30% </span>
                                        <img :src="isHovered ? '/build/images/home-lookbook/pinner-p-02.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Organza
                                                Hair Scrunchie</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <del>$5.00</del>
                                            <span class="text-danger">$3.50</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--END ROW-->
                    </div>
                    <div class="tab-pane fade" id="top" role="tabpanel" aria-labelledby="top-tab"
                        tabindex="0">
                        <div class="row g-2 g-lg-4">
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-classic/mega-bagal-1.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-classic/mega-bagal-3.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Wash
                                                me!</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$35.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-classic/mega-cq-4.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-classic/mega-cq-1.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Woleen
                                                Tee</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$35.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-classic/pr-30.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-classic/pr-29.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Women
                                                Black Pants</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$100.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-classic/pr-31.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-classic/pr-33.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Men
                                                pants</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$49.00 – $56.00</span>
                                        </p>
                                        <div
                                            class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-31.jpg'; isHovered = false"
                                                class="d-inline-block bg_color_blue rounded-circle"></a>
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-33.jpg'; isHovered = false"
                                                class="d-inline-block bg-dark rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-classic/pr-03.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-classic/pr-04.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Ridley
                                                High Waist</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$36.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-classic/pr-03.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-classic/pr-04.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Sweatshirt in Geometric Print</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$35.00</span>
                                        </p>
                                        <div
                                            class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-03.jpg'; isHovered = false"
                                                class="d-inline-block bg_color_blue rounded-circle"></a>
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-04.jpg'; isHovered = false"
                                                class="d-inline-block bg-dark rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/products/pr-15.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-16.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Sweatshirt in Geometric Print</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$35.00</span>
                                        </p>
                                        <div
                                            class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/products/pr-15.jpg'; isHovered = false"
                                                style="background-image: url('/build/images/products/pr-15.jpg');background-size: cover;"
                                                class="d-inline-block bg_color_blue rounded-circle"></a>
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/products/pr-14.jpg'; isHovered = false"
                                                style="background-image: url('/build/images/products/pr-14.jpg');background-size: cover;"
                                                class="d-inline-block bg-dark rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-classic/pr-21.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-classic/pr-22.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Black
                                                mountain hat</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$50.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                    <div class="tab-pane fade" id="bottoms" role="tabpanel" aria-labelledby="bottoms-tab"
                        tabindex="0">
                        <div class="row g-2 g-lg-4">
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/products/pr-19.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-20.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Circle
                                                Snapback Cap</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$25.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-29.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <span class="new-label bg-danger text-white rounded-circle"> -34% </span>
                                        <img :src="isHovered ? '/build/images/home-fashion-9/pr-s-30.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Short
                                                Sleeved Hoodie</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <del>$45.00</del>
                                            <span class="text-danger">$30.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/products/pr-04.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-05.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Blush
                                                Beanie</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$15.00</span>
                                        </p>
                                        <div
                                            class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/products/pr-04.jpg'; isHovered = false"
                                                class="d-inline-block bg-body-tertiary rounded-circle"></a>
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/products/pr-31.jpg'; isHovered = false"
                                                class="d-inline-block bg_color_pink rounded-circle"></a>
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/products/pr-32.jpg'; isHovered = false"
                                                class="d-inline-block bg-dark rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-33.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-fashion-9/pr-s-34.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Sunny
                                                Life</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$68.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-31.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-fashion-9/pr-s-32.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Track
                                                Pants With Zip Sides</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$68.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-classic/pr-03.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-classic/pr-04.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Ridley
                                                High Waist</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$36.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-classic/pr-30.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-classic/pr-29.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Women
                                                Black Pants</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$100.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-35.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-fashion-9/pr-s-36.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">White
                                                Cream Sleeve</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$100.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                    <div class="tab-pane fade" id="shoes" role="tabpanel" aria-labelledby="shoes-tab"
                        tabindex="0">
                        <div class="row g-2 g-lg-4 justify-content-center">
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-37.png', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-fashion-9/pr-s-38.png' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Simple
                                                Skin T-shirt</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$56.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-39.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-fashion-9/pr-s-40.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Leather
                                                White Trainers</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$20.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-41.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <span class="new-label bg-danger text-white rounded-circle"> -50% </span>
                                        <img :src="isHovered ? '/build/images/home-fashion-9/pr-s-42.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">White
                                                Sneaker Shoes</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <del>$60.00</del>
                                            <span class="text-danger">$30.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/products/pr-38.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-39.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Wide Fit
                                                Dusty</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$12.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-43.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-fashion-9/pr-s-44.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Stan
                                                Smith Trainers</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$75.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/products/pr-36.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-37.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Sampson
                                                Lo Trainers</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$65.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-23.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <span class="new-label bg-danger text-white rounded-circle"> -34% </span>
                                        <img :src="isHovered ? '/build/images/home-fashion-9/pr-s-24.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Retro
                                                Lace Up Sneakers</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$30.00 – $40.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                    <div class="tab-pane fade" id="jewellery" role="tabpanel" aria-labelledby="jewellery-tab"
                        tabindex="0">
                        <div class="row g-2 g-lg-4 justify-content-center">
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-metro/pr-q6.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-metro/pr-q7.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <p class="text-muted mb-2">Mi-Pac</p>
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Crosshatch Backpack</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$30.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-45.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-fashion-9/pr-s-46.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Angled
                                                Rimless Sunglasses</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$10.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/products/pr-23.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/products/pr-24.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <p class="text-muted mb-2">CK</p>
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Dusk Pom
                                                Beanie</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$25.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/megamenu/pr-07.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <span class="new-label bg-danger text-white rounded-circle"> -25% </span>
                                        <img :src="isHovered ? '/build/images/megamenu/pr-08.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Cluse La
                                                Boheme Rose Gold</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <del>$60.00</del>
                                            <span class="text-danger">$45.00</span>
                                        </p>
                                        <div
                                            class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/products/pr-07.jpg'; isHovered = false"
                                                class="d-inline-block bg_color_green rounded-circle"></a>
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/products/pr-08.jpg'; isHovered = false"
                                                class="d-inline-block bg-body-tertiary rounded-circle"></a>
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/products/pr-06.jpg'; isHovered = false"
                                                class="d-inline-block bg_color_blue rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-37.png', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-fashion-9/pr-s-38.png' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Simple
                                                Skin T-shirt</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$56.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-47.jpg', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <img :src="isHovered ? '/build/images/home-fashion-9/pr-s-48.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Sport
                                                Sneaker</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$35.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-50.jpg  ', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <span class="new-label bg-danger text-white rounded-circle"> -40% </span>
                                        <img :src="isHovered ? '/build/images/home-fashion-9/pr-s-50.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Skin
                                                Sweatpans</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <del>$75.00</del>
                                            <span class="text-danger">$45.00</span>
                                        </p>
                                        <div
                                            class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/home-fashion-9/pr-s-50.jpg'; isHovered = false"
                                                class="d-inline-block bg_color_pink rounded-circle"></a>
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/home-fashion-9/pr-s-51.jpg'; isHovered = false"
                                                class="d-inline-block bg_color_cyan rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-52.jpg  ', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <span class="new-label bg-danger text-white rounded-circle"> -40% </span>
                                        <img :src="isHovered ? '/build/images/home-fashion-9/pr-s-53.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Leather
                                                Watch</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <del>$75.00</del>
                                            <span class="text-danger">$45.00</span>
                                        </p>
                                        <div
                                            class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/home-fashion-9/pr-s-52.jpg'; isHovered = false"
                                                class="d-inline-block bg_color_pink rounded-circle"></a>
                                            <a href="#!"
                                                x-on:click.prevent="imageUrl = '/build/images/home-fashion-9/pr-s-54.jpg'; isHovered = false"
                                                class="d-inline-block bg_color_cyan rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3 col-6 col-md-4">
                                <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-55.jpg  ', isHovered: false }" class="topbar-product-card"
                                    x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden">
                                        <span class="new-label bg-body-tertiary text-white rounded-circle"> Sold Out
                                        </span>
                                        <img :src="isHovered ? '/build/images/home-fashion-9/pr-s-56.jpg' : imageUrl"
                                            alt="" class="img-fluid w-100">
                                        <a href="#" class="d-lg-none position-absolute "
                                            style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to Wishlist"><i
                                                class="facl facl-heart-o text-white"></i></a>

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
                                            style="z-index: 1;">
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
                                    <div class="mt-3 text-center">
                                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                                class="main_link">Analogue
                                                Resin Strap Watch</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$85.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
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
    <script src="{{ URL::asset('build/libs/flickity/flickity.pkgd.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
</body>

</html>
