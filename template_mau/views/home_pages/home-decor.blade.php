<!doctype html>
<html lang="en" x-data :dir="$store.appStore.dir" x-cloak>
<head>
    <meta charset="utf-8" />
    <title>Home Decor | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="" name="description" />
    <meta content="srbthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/build/images/k_favicon_32x.png')}}">
    @yield('css')
    @include('partials.head-css')
</head>
<body class="" x-data="{ showMenuScroll : false }">
@include('partials.header-decor')
<div>
    <!-- main section -->
    <section class="position-relative kalles-decor overflow-hidden">
        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-lg-12">
                    <img src="{{ URL::asset('/build/images/home-decor/main-slide.jpg')}}" alt="" class="w-100 img-fluid kalles-decor-img">
                    <div class="bg-overlay"></div>
                    <div class="position-absolute top-0 start-0 end-0 bottom-0 text-center py-5 text-white d-flex align-items-center justify-content-center">
                        <div class="pt-5 pt-sm-0">
                            <h1 class="text-capitalize summer-tag fw-medium main-title mb-4 pb-2 ">interior decorations</h1>
                            <h3 class=" font-secondary  fw-normal fst-italic mb-4">looking for furniture for
                                your living room</h3>
                            <a href="{{ url('shop_pages/shop')}}" class="btn btn-custom stretched-link fw-medium min-w-150 rounded-0 d-inline-flex align-items-center justify-content-center">Shop
                                Now&nbsp;<i class="las la-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end main section -->

    <section class="mt-3 kalles-decor-cat-banner-layout bg-light">
        <div class="container-fluid">
            <div class="row g-3">
                <div class="col-md-6 col-lg-4">
                    <a href="{{ url('shop_pages/shop')}}" class="position-relative hover-zoom d-block">
                        <img src="{{ URL::asset('/build/images/home-decor/cat-banner-01.jpg')}}" alt="" class="img-fluid hover-zoom-img w-100">
                        <div class="position-absolute start-0 start-0 end-0 top-0 bottom-0 d-flex m-3">
                            <div class="text-white">
                                <h4 class="fs-30 fw-semibold mb-2">Lighting Collections</h4>
                                <p class="fw-semibold font-futura mb-0 btn_icon_true d-inline-block position-relative fs-16">
                                    Explore Now</p>
                            </div>
                        </div>
                    </a>
                </div><!--end col-->
                <div class="col-md-6 col-lg-4">
                    <a href="{{ url('shop_pages/shop')}}" class="position-relative hover-zoom d-block">
                        <img src="{{ URL::asset('/build/images/home-decor/cat-banner-02.jpg')}}" alt="" class="img-fluid hover-zoom-img w-100">
                        <div class="position-absolute start-0 start-0 end-0 top-0 bottom-0 align-items-end justify-content-end text-end d-flex m-3">
                            <div class="text-dark">
                                <h4 class="fs-30 fw-semibold mb-2">Audio Decor</h4>
                                <p class="fw-semibold font-futura mb-0 btn_icon_true dark d-inline-block position-relative fs-16">
                                    View Collections</p>
                            </div>
                        </div>
                    </a>
                </div><!--end col-->
                <div class="col-md-6 col-lg-4">
                    <a href="{{ url('shop_pages/shop')}}" class="position-relative hover-zoom d-block">
                        <img src="{{ URL::asset('/build/images/home-decor/cat-banner-03.jpg')}}" alt="" class="img-fluid hover-zoom-img w-100">
                        <div class="position-absolute start-0 start-0 end-0 top-0 bottom-0 d-flex m-3">
                            <div class="text-dark">
                                <h4 class="fs-30 fw-semibold mb-2">New Arrivals</h4>
                                <p class="fw-semibold font-futura mb-0 btn_icon_true dark d-inline-block position-relative fs-16">
                                    Shop Now</p>
                            </div>
                        </div>
                    </a>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>

    <section class="type_tab_collection pb-5 bg-light">
        <div class="container-fluid">
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
            <div class="row g-4 row-cols-2 row-cols-md-3 row-cols-lg-6 mt-4">
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
                            <span class="new-label bg-danger text-white rounded-circle text-center"> -29% </span>
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
                            <span class="new-label bg-teal text-white rounded-circle text-center"> New </span>
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
            </div><!--end row-->
            <div class="text-center mt-4 pt-2 mb-5">
                <a href="#!" class="btn btn-dark btn-lg min-w-150 px-5 fs-14 py-3 rounded-0">Load More <i class="las la-arrow-down"></i></a>
            </div>
        </div><!--end container-->
    </section><!--end section-->

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
            <div class="row g-4  blog-arrow" data-flickity='{"imagesLoaded": 0, "adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold": 5, "cellAlign": "left", "wrapAround": true, "prevNextButtons": true, "percentPosition": 1, "pageDots": false, "autoPlay": 0, "pauseAutoPlayOnHover": true }' dir="ltr">
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
                                <span>subscribe our newsletter</span>
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

    <div class="kalles-section-type-shipping">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-3 col-md-6">
                    <div class="d-flex gap-3">
                        <i class="las la-plane fw-semibold fs-36 text-muted flex-shrink-0"></i>
                        <div class="flex-grow-1">
                            <h6>Free Shipping</h6>
                            <p class="text-muted mb-0">Free shipping on all US order or order above $100</p>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-xl-3 col-md-6">
                    <div class="d-flex gap-3">
                        <i class="pegk pe-7s-help2 fw-semibold fs-36 text-muted flex-shrink-0"></i>
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase">Support 24/7</h6>
                            <p class="text-muted mb-0">Contact us 24 hours a day, 7 days a week</p>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-xl-3 col-md-6">
                    <div class="d-flex gap-3">
                        <i class="las la-sync-alt fw-semibold fs-36 text-muted flex-shrink-0"></i>
                        <div class="flex-grow-1">
                            <h6>30 Days Return</h6>
                            <p class="text-muted mb-0">Simply return it within 30 days for an exchange.</p>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-xl-3 col-md-6">
                    <div class="d-flex gap-3">
                        <i class="las la-shield-alt fw-semibold fs-36 text-muted flex-shrink-0"></i>
                        <div class="flex-grow-1">
                            <h6>100% Payment Secure</h6>
                            <p class="text-muted mb-0">We ensure secure payment with PEV</p>
                        </div>
                    </div>
                </div><!--end col-->
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