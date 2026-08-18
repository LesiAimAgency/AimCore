<!doctype html>
<html lang="en" x-data :dir="$store.appStore.dir" x-cloak>
<head>
    <meta charset="utf-8" />
    <title>Home Default | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="" name="description" />
    <meta content="srbthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/build/images/k_favicon_32x.png')}}">
    @include('partials.head-css')
</head>
<body class="" x-data="{ showMenuScroll : false }">
@include('partials.header-shoes')
<div>
    <section class="kalles-shoes-grid-banner">
        <div class="container-fluid px-2">
            <div class="row g-2">
                <div class="col-md-4">
                    <div class="row g-2">
                        <div class="col-lg-12">
                            <a href="{{ url('shop_pages/shop')}}" class="overflow-hidden img-zoom position-relative d-block">
                                <img src="{{ URL::asset('/build/images/home-shoes/grid-bn-01.jpg')}}" alt="" class="img-fluid w-100">
                                <div class="position-absolute bottom-0 text-white p-4 m-2">
                                    <h3 class="fs-30 fw-medium mb-1">Ultra Boost Shoes</h3>
                                    <p class="fw-medium mb-0">SHOP ADIDAS <i class="las la-angle-right"></i></p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-12">
                            <a href="{{ url('shop_pages/shop')}}" class="overflow-hidden img-zoom position-relative d-block">
                                <img src="{{ URL::asset('/build/images/home-shoes/grid-bn-04.jpg')}}" alt="" class="img-fluid w-100">
                                <div class=" position-absolute bottom-0 text-white p-4 m-2">
                                    <h3 class="fs-30 fw-medium mb-1">Faded To Perfection</h3>
                                    <p class="fw-medium mb-0">SHOP ECCO <i class="las la-angle-right"></i></p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row g-2">
                        <div class="col-lg-12">
                            <a href="{{ url('shop_pages/shop')}}" class="overflow-hidden img-zoom position-relative d-block">
                                <img src="{{ URL::asset('/build/images/home-shoes/grid-bn-02.jpg')}}" alt="" class="img-fluid w-100">
                                <div class="position-absolute bottom-0 text-white p-4 m-2">
                                    <h3 class="fs-30 fw-medium mb-1">Toms Exclusives</h3>
                                    <p class="fw-medium mb-0">SHOP TOMS <i class="las la-angle-right"></i></p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-12">
                            <a href="{{ url('shop_pages/shop')}}" class="overflow-hidden img-zoom position-relative d-block">
                                <img src="{{ URL::asset('/build/images/home-shoes/grid-bn-05.jpg')}}" alt="" class="img-fluid w-100">
                                <div class="position-absolute bottom-0 text-white p-4 m-2">
                                    <h3 class="fs-30 fw-medium mb-1">Summer Ready</h3>
                                    <p class="fw-medium mb-0">SHOP CONVERSE <i class="las la-angle-right"></i></p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <a href="{{ url('shop_pages/shop')}}" class="overflow-hidden img-zoom position-relative d-block">
                        <img src="{{ URL::asset('/build/images/home-shoes/grid-bn-03.jpg')}}" alt="" class="img-fluid w-100 object-fit-cover">
                        <div class="position-absolute bottom-0 text-white p-4 m-2">
                            <h3 class="fs-30 fw-medium mb-1">The Ragged Priest</h3>
                            <p class="fw-medium mb-0">SHOP NOW <i class="las la-angle-right"></i></p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!--brand-list section-->
    <section class="kellas-medical-brand-list bg-light position-relative py-4 mt-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 col-md-4 p-3 p-lg-0 col-lg-2 brand-item">
                    <a href="#!">
                        <img src="{{ URL::asset('/build/images/home-shoes/brand-01.png')}}" alt="" class="img-fluid max-w-200 mx-auto d-block">
                    </a>
                </div><!--end col-->
                <div class="col-6 col-md-4 p-3 p-lg-0 col-lg-2 brand-item">
                    <a href="#!">
                        <img src="{{ URL::asset('/build/images/home-shoes/brand-02.png')}}" alt="" class="img-fluid max-w-200 mx-auto d-block">
                    </a>
                </div><!--end col-->
                <div class="col-6 col-md-4 p-3 p-lg-0 col-lg-2 brand-item">
                    <a href="#!">
                        <img src="{{ URL::asset('/build/images/home-shoes/brand-03.png')}}" alt="" class="img-fluid max-w-200 mx-auto d-block">
                    </a>
                </div><!--end col-->
                <div class="col-6 col-md-4 p-3 p-lg-0 col-lg-2 brand-item">
                    <a href="#!">
                        <img src="{{ URL::asset('/build/images/home-shoes/brand-04.png')}}" alt="" class="img-fluid max-w-200 mx-auto d-block">
                    </a>
                </div><!--end col-->
                <div class="col-6 col-md-4 p-3 p-lg-0 col-lg-2 brand-item">
                    <a href="#!">
                        <img src="{{ URL::asset('/build/images/home-shoes/brand-05.png')}}" alt="" class="img-fluid max-w-200 mx-auto d-block">
                    </a>
                </div><!--end col-->
                <div class="col-6 col-md-4 p-3 p-lg-0 col-lg-2 brand-item">
                    <a href="#!">
                        <img src="{{ URL::asset('/build/images/home-shoes/brand-06.png')}}" alt="" class="img-fluid max-w-200 mx-auto d-block">
                    </a>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <!--end brand-list section-->

    <section class="kalles-shoes-grid-products-section">
        <div class="container-fluid px-2">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-0 justify-content-center">
                <div class="col card rounded-0 mb-0">
                    <div class="card-body">
                        <div x-data="{ imageUrl: '/build/images/home-shoes/pr-04.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden main">
                                <img :src="isHovered ? '/build/images/home-shoes/pr-13.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                    <i class="las la-sync text-white"></i>
                                </a>
                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                    <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Adidas Zapatillas Calcetin</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$122.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col card rounded-0 mb-0">
                    <div class="card-body">
                        <div x-data="{ imageUrl: '/build/images/home-shoes/pr-03.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden main">
                                <span class="new-label bg-danger text-white rounded-circle"> -29% </span>
                                <img :src="isHovered ? '/build/images/home-shoes/pr-04.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                    <i class="las la-sync text-white"></i>
                                </a>
                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                    <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>



                            </div>
                            <div class="mt-4">
                                <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Deluxe Brand Uomo Slide Hi Tops</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <del>$635.00</del>
                                    <span class="text-danger">$452.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col card rounded-0 mb-0">
                    <div class="card-body">
                        <div x-data="{ imageUrl: '/build/images/home-shoes/pr-14.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden main">
                                <img :src="isHovered ? '/build/images/home-shoes/pr-18.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                    <i class="las la-sync text-white"></i>
                                </a>
                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                    <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Deluxe Brand Donna Super Star Scarpe</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$52.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col card rounded-0 mb-0">
                    <div class="card-body">
                        <div x-data="{ imageUrl: '/build/images/home-shoes/pr-13.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden main">
                                <img :src="isHovered ? '/build/images/home-shoes/pr-03.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                    <i class="las la-sync text-white"></i>
                                </a>
                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                    <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Gold Foil Chunky Leather Sneakers</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$309.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col card rounded-0 mb-0">
                    <div class="card-body">
                        <div x-data="{ imageUrl: '/build/images/home-shoes/pr-16.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden main">
                                <span class="new-label bg-danger text-white rounded-circle"> -34% </span>
                                <img :src="isHovered ? '/build/images/home-shoes/pr-17.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                    <i class="las la-sync text-white"></i>
                                </a>
                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                    <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Vans Classic Slip-on Shoes</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <del>$149.00</del>
                                    <span class="text-danger">$99.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col card rounded-0 mb-0">
                    <div class="card-body">
                        <div x-data="{ imageUrl: '/build/images/home-shoes/pr-18.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden main">
                                <img :src="isHovered ? '/build/images/home-shoes/pr-16.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                    <i class="las la-sync text-white"></i>
                                </a>
                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                    <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Adidas Copa Primeknit Sneakers</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$289.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col card rounded-0 mb-0">
                    <div class="card-body">
                        <div x-data="{ imageUrl: '/build/images/home-shoes/pr-19.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden main">
                                <img :src="isHovered ? '/build/images/home-shoes/pr-18.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                    <i class="las la-sync text-white"></i>
                                </a>
                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                    <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Premiata Hattori Sneakers</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$289.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col card rounded-0 mb-0">
                    <div class="card-body">
                        <div x-data="{ imageUrl: '/build/images/home-shoes/pr-20.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden main">
                                <img :src="isHovered ? '/build/images/home-shoes/pr-01.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                    <i class="las la-sync text-white"></i>
                                </a>
                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                    <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Urban Street Reverse Logo Sneakers</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$299.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col card rounded-0 mb-0">
                    <div class="card-body">
                        <div x-data="{ imageUrl: '/build/images/home-shoes/pr-21.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden main">
                                <img :src="isHovered ? '/build/images/home-shoes/pr-20.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                    <i class="las la-sync text-white"></i>
                                </a>
                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                    <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Givenchy Paris Strap Sneakers</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$237.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col card rounded-0 mb-0">
                    <div class="card-body">
                        <div x-data="{ imageUrl: '/build/images/home-shoes/pr-06.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden main">
                                <img :src="isHovered ? '/build/images/home-shoes/pr-21.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                    <i class="las la-sync text-white"></i>
                                </a>
                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                    <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Saint Laurent Classic Embroidered Sneakers</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$347.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col card rounded-0 mb-0">
                    <div class="card-body">
                        <div x-data="{ imageUrl: '/build/images/home-shoes/pr-01.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden main">
                                <img :src="isHovered ? '/build/images/home-shoes/pr-02.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                    <i class="las la-sync text-white"></i>
                                </a>
                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                    <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Givenchy Logo Print Low-top Sneakers</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$152.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col card rounded-0 mb-0">
                    <div class="card-body">
                        <div x-data="{ imageUrl: '/build/images/home-shoes/pr-05.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden main">
                                <img :src="isHovered ? '/build/images/home-shoes/pr-06.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                    <i class="las la-sync text-white"></i>
                                </a>
                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                    <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Sperry Men's 2-Eye Boat Shoes</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$52.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col card rounded-0 mb-0">
                    <div class="card-body">
                        <div x-data="{ imageUrl: '/build/images/home-shoes/pr-07.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden main">
                                <img :src="isHovered ? '/build/images/home-shoes/pr-08.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                    <i class="las la-sync text-white"></i>
                                </a>
                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                    <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Birkenstock Boston Suede</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$46.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col card rounded-0 mb-0">
                    <div class="card-body">
                        <div x-data="{ imageUrl: '/build/images/home-shoes/pr-09.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden main">
                                <img :src="isHovered ? '/build/images/home-shoes/pr-10.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                    <i class="las la-sync text-white"></i>
                                </a>
                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                    <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Adidas Gazelle Yellow Collegiate Gold</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$136.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col card rounded-0 mb-0 border-end">
                    <div class="card-body">
                        <div x-data="{ imageUrl: '/build/images/home-shoes/pr-11.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden main">
                                <span class="new-label bg-danger text-white rounded-circle"> -16% </span>
                                <img :src="isHovered ? '/build/images/home-shoes/pr-12.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                    <i class="las la-sync text-white"></i>
                                </a>
                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye text-white"></i></a>
                                    <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold"></i></button>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Uomo Verde – Converse Utility Sneakers</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <del>$222.00</del>
                                    <span class="text-danger">$188.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="text-center mt-4 pt-3">
                <button type="button" class="btn btn-custom-dark-red btn-load rounded-pill">Load More</button>
            </div>
        </div>
    </section>

    <section class="kalles-shoes-newsletter-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <h2 class="text-white fs-35 ls-normal mb-3">SUBSCRIBE OUR NEWSLETTER</h2>
                    <p class="section-subtitle sub-title font-secondary fst-italic fs-14 text-white mb-4">Sign up for
                        our newsletter to be updated on the latest designs, exclusive offers, inspiration and tips!</p>
                    <form action="#!" class="newsletter-form mx-5">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <input type="email" name="email" placeholder="Enter your email address" value="" class="form-control bg-transparent text-muted border-0 border-bottom rounded-0" required="required">
                            </div>
                            <button class="btn btn-link text-white border-bottom rounded-0 flex-shrink-0">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer-shoes')
@include('partials.popup')
</div>
@include('partials.card-model')
@include('partials.vendor-scripts')
<script  src="{{ URL::asset('build/libs/flickity/flickity.pkgd.min.js')}}"></script>
<script  src="{{ URL::asset('build/js/main.js')}}"></script>
<script  src="{{ URL::asset('build/js/app.js')}}"></script>
</body>

</html>