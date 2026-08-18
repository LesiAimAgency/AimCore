<!doctype html>
<html lang="en" x-data :dir="$store.appStore.dir" x-cloak>
<head>
    <meta charset="utf-8" />
    <title> Home Decor | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="" name="description" />
    <meta content="srbthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/build/images/k_favicon_32x.png')}}">
    @yield('css')
    @include('partials.head-css')
</head>
<body class="" x-data="{ showMenuScroll : false }">
@include('partials.header-decor2')
<div>
    <section class="mt-3 kalles-decor-cat-banner-layout">
        <div class="container-fluid">
            <div class="row overflow-hidden">
                <div class="col-lg-6 pe-md-0">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <a href="{{ url('shop_pages/shop')}}" class="position-relative hover-zoom d-block">
                                <img src="{{ URL::asset('/build/images/home-decor-2/banner-cat-01.jpg')}}" alt="" class="img-fluid hover-zoom-img w-100">
                                <div class="position-absolute top-0 end-0 d-flex m-3">
                                    <div class="text-dark text-center">
                                        <h4 class="fs-30 fw-semibold mb-2">living room</h4>
                                        <p class="fw-semibold text-dark viewbtn mb-0 btn_icon_true d-inline-block position-relative fs-16">
                                            view collectons</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('shop_pages/shop')}}" class="position-relative hover-zoom d-block">
                                <img src="/build/images/home-decor-2/banner-cat-02.jpg " alt="" class="img-fluid hover-zoom-img w-100">
                                <div class="position-absolute bottom-0 start-50 translate-middle-x d-flex m-3">
                                    <div class="text-dark text-center">
                                        <h4 class="fs-30 fw-semibold mb-2" style="white-space: nowrap;">kitchen & dining</h4>
                                        <p class="fw-semibold text-dark viewbtn mb-0 btn_icon_true d-inline-block position-relative fs-16">
                                            view collectons</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-8">
                            <a href="{{ url('shop_pages/shop')}}" class="position-relative hover-zoom d-block h-100">
                                <img src="{{ URL::asset('/build/images/home-decor/cat-banner-02.jpg')}}" alt="" class="img-fluid hover-zoom-img w-100 h-100">
                                <div class="position-absolute top-0 end-0 d-flex m-3">
                                    <div class="text-dark text-center">
                                        <h4 class="fs-30 fw-semibold mb-2">audio decor</h4>
                                        <p class="fw-semibold text-dark viewbtn mb-0 btn_icon_true d-inline-block position-relative fs-16">
                                            view collectons</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ url('shop_pages/shop')}}" class="position-relative hover-zoom d-block bg-light">
                                <img src="{{ URL::asset('/build/images/home-decor-2/banner-cat-05.jpg')}}" alt="" class="img-fluid hover-zoom-img w-100">
                                <div class="position-absolute bottom-0 start-50 translate-middle-x d-flex m-3">
                                    <h4 class="fs-30 fw-semibold mb-2 text-dark">bottles</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-3 mt-lg-0">
                    <a href="{{ url('shop_pages/shop')}}" class="position-relative hover-zoom d-block">
                        <img src="{{ URL::asset('/build/images/home-decor-2/banner-cat-03.jpg')}}" alt="" class="img-fluid hover-zoom-img w-100">
                        <div class="position-absolute top-0 start-0 d-flex m-3">
                            <div class="text-light">
                                <h4 class="fs-30 fw-semibold mb-2">lighting collections</h4>
                                <p class="fw-semibold text-white mb-0 btn_icon_true d-inline-block position-relative fs-16">
                                    Explorer
                                </p>
                            </div>
                        </div>
                    </a>
                </div><!--end col-->

            </div><!--end row-->
        </div><!--end container-->
    </section>

    <section class="type_tab_collection pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="text-center">
                        <div class="mb-4">
                            <h3 class="position-relative flex text-capitalize line-section-title">
                                <span>best selling products</span>
                            </h3>
                        </div>
                        <p class="fs-14 text-muted mb-0">Dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor!</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->


            <div class="mt-4">
                <ul class="nav tab_header gap-4 justify-content-center mt-4 mb-0" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill active" id="best-seller-tab" data-bs-toggle="pill" data-bs-target="#best-seller" type="button" role="tab" aria-controls="best-seller" aria-selected="true">furniture</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill" id="featured-tab" data-bs-toggle="pill" data-bs-target="#featured" type="button" role="tab" aria-controls="featured" aria-selected="false">kichen&dinning</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill" id="sale-tab" data-bs-toggle="pill" data-bs-target="#sale" type="button" role="tab" aria-controls="sale" aria-selected="false">lighting</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill" id="top-sale-tab" data-bs-toggle="pill" data-bs-target="#top-sale" type="button" role="tab" aria-controls="top-sale" aria-selected="false">techs</button>
                    </li>
                </ul>
                <div class="tab-content mt-4" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="best-seller" role="tabpanel" aria-labelledby="best-seller-tab" tabindex="0">
                        <div class="row g-4 row-cols-2 row-cols-md-3 row-cols-lg-4 mt-4">
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-09.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-10.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">form egg slicer</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$35.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-01.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded">
                                        <span class="new-label bg-danger text-white rounded-circle text-center"> -29%
                                        </span>
                                        <img :src="isHovered ? '/build/images/home-decor/pr-02.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn bg-dark text-white rounded-pill fs-14"><span>Quick
                                                    View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill fs-14 " data-toggle="modal" data-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                                    Shop</span> <i class="iccl iccl-cart"></i></button>
                                        </div>

                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">cymbal pendant</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <del>$35.00</del>
                                            <span class="text-danger">$25.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-03.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-04.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">Chair Wood Legs</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$30.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-05.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-06.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">light oil lamp</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$65.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-07.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-08.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">Line Cocktail Shaker</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$65.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-11.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-12.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">Piep Show</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$15.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-13.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-14.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">Herit Chair</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$55.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-15.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-16.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">buddy table lamp</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$35.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-17.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-18.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">picto wall clock</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$15.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-19.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <span class="new-label bg-teal text-white rounded-circle text-center"> New
                                        </span>
                                        <img :src="isHovered ? '/build/images/home-decor/pr-20.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">brush set small</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$65.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-21.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-22.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">cru thermos jug</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$45.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-23.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-24.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">urkiola bowl</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$85.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div>
                    </div><!--end tab pane-->
                    <div class="tab-pane fade" id="featured" role="tabpanel" aria-labelledby="featured-tab" tabindex="0">
                        <div class="row g-4 row-cols-2 row-cols-md-3 row-cols-lg-4 mt-4">
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-09.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-10.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">form egg slicer</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$35.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-01.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded">
                                        <span class="new-label bg-danger text-white rounded-circle text-center"> -29%
                                        </span>
                                        <img :src="isHovered ? '/build/images/home-decor/pr-02.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">cymbal pendant</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <del>$35.00</del>
                                            <span class="text-danger">$25.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-03.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-04.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">Chair Wood Legs</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$30.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-05.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-06.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">light oil lamp</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$65.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-07.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-08.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">Line Cocktail Shaker</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$65.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-11.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-12.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">Piep Show</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$15.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-13.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-14.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">Herit Chair</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$55.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-15.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-16.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">buddy table lamp</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$35.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-17.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-18.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">picto wall clock</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$15.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-19.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <span class="new-label bg-teal text-white rounded-circle text-center"> New
                                        </span>
                                        <img :src="isHovered ? '/build/images/home-decor/pr-20.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">brush set small</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$65.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-21.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-22.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">cru thermos jug</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$45.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-23.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-24.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">urkiola bowl</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$85.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sale" role="tabpanel" aria-labelledby="sale-tab" tabindex="0">
                        <div class="row g-4 row-cols-2 row-cols-md-3 row-cols-lg-4 mt-4">
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-09.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-10.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">form egg slicer</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$35.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-01.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded">
                                        <span class="new-label bg-danger text-white rounded-circle text-center"> -29%
                                        </span>
                                        <img :src="isHovered ? '/build/images/home-decor/pr-02.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">cymbal pendant</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <del>$35.00</del>
                                            <span class="text-danger">$25.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-03.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-04.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">Chair Wood Legs</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$30.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-05.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-06.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">light oil lamp</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$65.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-07.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-08.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">Line Cocktail Shaker</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$65.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-11.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-12.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">Piep Show</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$15.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-13.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-14.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">Herit Chair</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$55.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-15.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-16.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">buddy table lamp</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$35.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-17.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-18.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">picto wall clock</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$15.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-19.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <span class="new-label bg-teal text-white rounded-circle text-center"> New
                                        </span>
                                        <img :src="isHovered ? '/build/images/home-decor/pr-20.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">brush set small</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$65.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-21.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-22.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">cru thermos jug</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$45.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-23.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-24.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">urkiola bowl</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$85.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="top-sale" role="tabpanel" aria-labelledby="top-sale-tab" tabindex="0">
                        <div class="row g-4 row-cols-2 row-cols-md-3 row-cols-lg-4 mt-4">
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-09.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-10.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">form egg slicer</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$35.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-01.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded">
                                        <span class="new-label bg-danger text-white rounded-circle text-center"> -29%
                                        </span>
                                        <img :src="isHovered ? '/build/images/home-decor/pr-02.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">cymbal pendant</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <del>$35.00</del>
                                            <span class="text-danger">$25.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-03.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-04.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">Chair Wood Legs</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$30.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-05.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-06.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">light oil lamp</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$65.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-07.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-08.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">Line Cocktail Shaker</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$65.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-11.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-12.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">Piep Show</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$15.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-13.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-14.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">Herit Chair</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$55.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-15.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-16.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">buddy table lamp</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$35.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-17.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-18.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">picto wall clock</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$15.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-19.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <span class="new-label bg-teal text-white rounded-circle text-center"> New
                                        </span>
                                        <img :src="isHovered ? '/build/images/home-decor/pr-20.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">brush set small</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$65.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-21.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-22.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">cru thermos jug</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$45.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div x-data="{ imageUrl: '/build/images/home-decor/pr-23.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden shadow rounded main">
                                        <img :src="isHovered ? '/build/images/home-decor/pr-24.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                        <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill bg-dark text-white fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart text-white"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-dark rounded-pill m-2" style="z-index: 1;">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold text-white"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-1 text-capitalize fs-16"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">urkiola bowl</a></h6>
                                        <p class="mb-0 fs-16 text-muted">
                                            <span>$85.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end container-->
    </section><!--end section-->

    <section class="bg-light">
        @include('partials.shipping')
    </section>

    <section class="kalles-section_type_featured_blog kalles-decor-02-blog-post">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center mb-4 pb-2">
                        <div class="mb-4">
                            <h3 class="position-relative flex text-capitalize fw-semibold line-section-title">
                                <span>latest blog posts</span>
                            </h3>
                        </div>
                        <span class="fs-14 text-muted">Dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor!</span>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="row g-4 blog-arrow kalles-blog-grid" data-flickity='{"imagesLoaded": 0, "adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold": 5, "cellAlign": "left", "wrapAround": true, "prevNextButtons": true, "percentPosition": 1, "pageDots": false, "autoPlay": 0, "pauseAutoPlayOnHover": true }' dir="ltr">
                <div class="col-md-6 col-lg-4">
                    <div class="blog-card">
                        <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                            <img src="{{ URL::asset('/build/images/home-decor-2/blog-post-01.jpg')}}" alt="" class="blog-img object-fit-cover w-100">
                        </a>
                        <h6 class="fs-16 mt-3 main_link_mustard lh-base"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">The Kozmophone Is a Holographic, Bluetooth Turntable</a></h6>
                        <div class="d-flex gap-1 align-items-center text-muted">
                            By
                            <span class="text-body">admin</span>
                            On
                            <span class="text-body">February 21, 2024</span>
                        </div>
                        <div class="post-content text-muted mt-3">Imagine a turntable with a portable and detachable
                            phonograph-style horn speaker and a miniature.</div>
                    </div>
                </div><!--end col-->
                <div class="col-md-6 col-lg-4">
                    <div class="blog-card">
                        <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                            <img src="{{ URL::asset('/build/images/home-decor-2/blog-post-02.jpg')}}" alt="" class="blog-img object-fit-cover w-100">
                        </a>
                        <h6 class="fs-16 mt-3 main_link_mustard lh-base"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">The Pi Offers a Futuristic Slice of Proximity Charging For New
                                iPhones</a></h6>
                        <div class="d-flex gap-1 align-items-center text-muted">
                            By
                            <span class="text-body">admin</span>
                            On
                            <span class="text-body">February 21, 2024</span>
                        </div>
                        <div class="post-content text-muted mt-3">This startup founded by MIT grads wants users to
                            charge up to four iPhones at the same time</div>
                    </div>
                </div><!--end col-->
                <div class="col-md-6 col-lg-4">
                    <div class="blog-card">
                        <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                            <img src="{{ URL::asset('/build/images/home-decor-2/blog-post-03.jpg')}}" alt="" class="blog-img object-fit-cover w-100">
                        </a>
                        <h6 class="fs-16 mt-3 main_link_mustard lh-base"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">Poilu Vases Are 3D Printed with Implanted “Hair”</a></h6>
                        <div class="d-flex gap-1 align-items-center text-muted">
                            On
                            <span class="text-body">February 21, 2024</span>
                        </div>
                        <div class="post-content text-muted mt-3">A collection of 3D printed vases where "hair" is
                            implanted during the printing process.</div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>

    <section class="kalles-decor-newsletter bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-4 pb-2">
                        <div class="mb-4">
                            <h3 class="position-relative flex text-capitalize line-section-title">
                                <span>Subscribe our newsletter</span>
                            </h3>
                        </div>
                        <span class="fs-14 text-muted">Sign up for our newsletter to be updated on the latest designs,
                            exclusive offers, inspiration and tips!</span>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="#!" class="signup-newsletter-form">
                        <div class="row g-2">
                            <div class="col-md col-12">
                                <input type="email" name="email" placeholder="Your email address" value="" class="form-control rounded-0 bg-transparent" required="required">
                            </div>
                            <div class="col-md-auto col-12">
                                <button type="submit" class="btn btn-dark rounded-0 fw-semibold btn_icon_true position-relative w-100">Subscribe</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @include('partials.footer-decor2')
    @include('partials.popup')
  </div>
    @include('partials.card-model')
    @include('partials.vendor-scripts')
    <script src="{{ URL::asset('build/libs/flickity/flickity.pkgd.min.js')}}"></script>
    <script src="{{ URL::asset('build/js/main.js')}}"></script>
    <script src="{{ URL::asset('build/js/app.js')}}"></script>
</body>

</html>