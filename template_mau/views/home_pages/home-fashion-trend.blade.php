<!doctype html>
<html lang="en" x-data :dir="$store.appStore.dir" x-cloak>
    <head>
        <meta charset="utf-8" />
        <title>Home Fashion Trend | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta content="" name="description" />
        <meta content="srbthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ URL::asset('/build/images/k_favicon_32x.png')}}">
        @include('partials.head-css')
    </head>
<body class="" x-data="{ showMenuScroll : false }">
    <div class="home-fashion-trend">
    @include('partials.header-fashion-trend')
    <section class="home-lookbook-section min-vh-100 position-relative">
        <div class="container-fluid px-0">
            <div class="row g-0">
                <div class="col-lg-12 position-relative">
                    <img src="{{ URL::asset('/build/images/home-fashion-trend/slide-top.jpg')}}" alt="" class="w-100 img-fluid">
                    <div class="pin-type position-absolute position-10">
                        <span class="zoompin"></span>
                        <a href="#!" class="bg-pink text-white rounded-circle d-flex align-items-center justify-content-center position-relative" data-bs-toggle="modal">
                            <i class="nav_link_icon position-relative"></i>
                        </a>
                    </div>
                    <div class="pin-type position-absolute position-11">
                        <span class="zoompin"></span>
                        <a href="#!" class="bg-pink text-white rounded-circle d-flex align-items-center justify-content-center position-relative" data-bs-toggle="modal">
                            <i class="nav_link_icon position-relative"></i>
                        </a>
                    </div>
                    <div class="pin-type position-absolute position-12">
                        <span class="zoompin"></span>
                        <a href="#!" class="bg-pink text-white rounded-circle d-flex align-items-center justify-content-center position-relative" data-bs-toggle="modal">
                            <i class="nav_link_icon position-relative"></i>
                        </a>
                    </div>
                    <div class="pin-type position-absolute position-13">
                        <span class="zoompin"></span>
                        <a href="#!" class="bg-pink text-white rounded-circle d-flex align-items-center justify-content-center position-relative" data-bs-toggle="modal">
                            <i class="nav_link_icon position-relative"></i>
                        </a>
                    </div>
                </div><!--end col-->
                <div class="col-lg-4 position-relative">
                    <img src="{{ URL::asset('/build/images/home-fashion-trend/slide-left.jpg')}}" alt="" class="w-100 img-fluid">
                    <div class="pin-type position-absolute position-03">
                        <span class="zoompin"></span>
                        <a href="#!" class="bg-pink text-white rounded-circle d-flex align-items-center justify-content-center position-relative" data-bs-toggle="modal">
                            <i class="nav_link_icon position-relative"></i>
                        </a>
                    </div>
                    <div class="pin-type position-absolute position-04">
                        <span class="zoompin"></span>
                        <a href="#!" class="bg-pink text-white rounded-circle d-flex align-items-center justify-content-center position-relative" data-bs-toggle="modal">
                            <i class="nav_link_icon position-relative"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 position-relative">
                    <img src="{{ URL::asset('/build/images/home-fashion-trend/slide-right.jpg')}}" alt="" class="w-100 img-fluid">
                    <div class="pin-type position-absolute position-09">
                        <span class="zoompin"></span>
                        <a href="#!" class="bg-pink text-white rounded-circle d-flex align-items-center justify-content-center position-relative" data-bs-toggle="modal">
                            <i class="nav_link_icon position-relative"></i>
                        </a>
                    </div>
                    <div class="pin-type position-absolute position-10">
                        <span class="zoompin"></span>
                        <a href="#!" class="bg-pink text-white rounded-circle d-flex align-items-center justify-content-center position-relative" data-bs-toggle="modal">
                            <i class="nav_link_icon position-relative"></i>
                        </a>
                    </div>
                    <div class="pin-type position-absolute position-11">
                        <span class="zoompin"></span>
                        <a href="#!" class="bg-pink text-white rounded-circle d-flex align-items-center justify-content-center position-relative" data-bs-toggle="modal">
                            <i class="nav_link_icon position-relative"></i>
                        </a>
                    </div>
                    <div class="pin-type position-absolute position-05">
                        <span class="zoompin"></span>
                        <a href="#!" class="bg-pink text-white rounded-circle d-flex align-items-center justify-content-center position-relative" data-bs-toggle="modal">
                            <i class="nav_link_icon position-relative"></i>
                        </a>
                    </div>
                </div>
            </div><!--end row-->
        </div>
    </section>

    <section class="mt-30 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center">
                        <div>
                            <h3 class="position-relative title_9 d-inline-block fs-30">
                                <span>best seller products</span>
                            </h3>
                        </div>
                        <span class="fs-14 text-muted">Dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor!</span>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="row my-4 g-3 g-lg-4">
                <div class="col-lg-3 col-md-4 col-6">
                    <div x-data="{ imageUrl: '/build/images/home-fashion-trend/pr-17.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <span class="new-label bg-success text-white rounded-circle"> New </span>
                            <img :src="isHovered ? '/build/images/home-fashion-trend/pr-18.jpg' : imageUrl" alt="" class="img-fluid">
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
                            <h6 class="mb-1 fw-medium"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_acid_green">Festival Shirt Young</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <span>$66.00 - $86.00</span>
                            </p>
                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-fashion-trend/pr-17.jpg'; isHovered = false" class="d-inline-block bg-danger rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-fashion-trend/pr-18.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-3 col-md-4 col-6">
                    <div x-data="{ imageUrl: '/build/images/home-fashion-trend/pr-20.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <img :src="isHovered ? '/build/images/home-fashion-trend/pr-21.jpg' : imageUrl" alt="" class="img-fluid">
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
                            <h6 class="mb-1 fw-medium"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_acid_green">Tbar 3/4 Baseball Tee</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <span>$44.00</span>
                            </p>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-3 col-md-4 col-6">
                    <div x-data="{ imageUrl: '/build/images/home-fashion-trend/pr-22.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <span class="new-label bg-danger text-white rounded-circle"> -10% </span>
                            <img :src="isHovered ? '/build/images/home-fashion-trend/pr-23.jpg' : imageUrl" alt="" class="img-fluid">
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
                            <h6 class="mb-1 fw-medium"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_acid_green">Drop Shoulder Pullover Fleece</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <del>$60.00</del>
                                <span class="text-danger">$54.00</span>
                            </p>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-3 col-md-4 col-6">
                    <div x-data="{ imageUrl: '/build/images/home-fashion-trend/pr-24.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <img :src="isHovered ? '/build/images/home-fashion-trend/pr-25.jpg' : imageUrl" alt="" class="img-fluid">
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
                            <h6 class="mb-1 fw-medium"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_acid_green">Tbar Collab Movie And Tv T-Shirt</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <span>$55.00</span>
                            </p>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-3 col-md-4 col-6">
                    <div x-data="{ imageUrl: '/build/images/home-fashion-trend/pr-15.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <img :src="isHovered ? '/build/images/home-fashion-trend/pr-16.jpg' : imageUrl" alt="" class="img-fluid">
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
                            <h6 class="mb-1 fw-medium"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_acid_green">Essential Longline Curved Hem</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <span>$77.00</span>
                            </p>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-3 col-md-4 col-6">
                    <div x-data="{ imageUrl: '/build/images/home-fashion-trend/pr-09.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <img :src="isHovered ? '/build/images/home-fashion-trend/pr-10.jpg' : imageUrl" alt="" class="img-fluid">
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
                            <h6 class="mb-1 fw-medium"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_acid_green">91 Short Sleeve Shirt</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <span>$66.00</span>
                            </p>
                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-fashion-trend/pr-09.jpg'; isHovered = false" class="d-inline-block bg-body-tertiary rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-fashion-trend/pr-10.jpg'; isHovered = false" class="d-inline-block bg-warning-subtle rounded-circle"></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-3 col-md-4 col-6">
                    <div x-data="{ imageUrl: '/build/images/home-fashion-trend/pr-26.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <img :src="isHovered ? '/build/images/home-fashion-trend/pr-26.jpg' : imageUrl" alt="" class="img-fluid">
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
                            <h6 class="mb-1 fw-medium"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_acid_green">Tbar Collab Movie And Tv T-Shirt</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <span>$51.00</span>
                            </p>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-3 col-md-4 col-6">
                    <div x-data="{ imageUrl: '/build/images/home-fashion-trend/pr-27.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <span class="new-label bg-danger text-white rounded-circle"> Hot </span>
                            <img :src="isHovered ? '/build/images/home-fashion-trend/pr-28.jpg' : imageUrl" alt="" class="img-fluid">
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
                            <h6 class="mb-1 fw-medium"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_acid_green">Graduate Tee</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <span>$54.00</span>
                            </p>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="mt-4 text-center">
                <button class="btn-load">Load More</button>
            </div>
        </div><!--end container-->
    </section><!--end section-->

    <section class="kalles-section_type_featured_blog kalles-decor-02-blog-post">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center mb-4 pb-2">
                        <h3 class="position-relative title_9 d-inline-block fs-30">
                            <span>latest blog posts</span>
                        </h3>
                        <p class="fs-14 mb-0 text-muted">Dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor!</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="row g-4 blog-arrow" data-flickity='{"imagesLoaded": 0, "adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold": 5, "cellAlign": "left", "wrapAround": true, "prevNextButtons": true, "percentPosition": 1, "pageDots": false, "autoPlay": 0, "pauseAutoPlayOnHover": true }' dir="ltr">
                <div class="col-md-6 col-lg-4 px-2 px-lg-3">
                    <div class="blog-card">
                        <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                            <img src="{{ URL::asset('/build/images/home-fashion-trend/blog-01.jpg')}}" alt="" class="blog-img object-fit-cover w-100">
                        </a>
                        <h6 class="fs-16 mt-3 main_link_acid_green lh-base fw-medium"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset main_link_acid_green">4 ITEMS IN WHICH IT IS
                                WORTH IT TO INVEST</a></h6>
                        <div class="d-flex gap-1 align-items-center text-muted">
                            By
                            <span class="text-body">Kate Hoang</span>
                            On
                            <span class="text-body">April 6, 2024</span>
                        </div>
                        <div class="post-content text-muted mt-3">It is essential to have timeless pieces in our
                            wardrobe, these are items that can be spent a lot, however you will...</div>
                    </div>
                </div><!--end col-->
                <div class="col-md-6 col-lg-4 px-2 px-lg-3">
                    <div class="blog-card">
                        <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                            <img src="{{ URL::asset('/build/images/home-fashion-trend/blog-02.jpg')}}" alt="" class="blog-img object-fit-cover w-100">
                        </a>
                        <h6 class="fs-16 mt-3 main_link_acid_green lh-base fw-medium"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset main_link_acid_green">NEUTRAL COLORS: THE BEST
                                COLORS FOR MEN</a></h6>
                        <div class="d-flex gap-1 align-items-center text-muted">
                            By
                            <span class="text-body">Kate Hoang</span>
                            On
                            <span class="text-body">April 6, 2024</span>
                        </div>
                        <div class="post-content text-muted mt-3">NEUTRAL COLORS: THE BEST COLORS FOR MEN Having a
                            wardrobe that has mostly neutral colors is a great idea, regardle...</div>
                    </div>
                </div><!--end col-->
                <div class="col-md-6 col-lg-4 px-2 px-lg-3">
                    <div class="blog-card">
                        <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                            <img src="{{ URL::asset('/build/images/home-fashion-trend/blog-03.jpg')}}" alt="" class="blog-img object-fit-cover w-100">
                        </a>
                        <h6 class="fs-16 mt-3 main_link_acid_green lh-base fw-medium"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset main_link_acid_green">6 TIPS WILL MAKE YOU LOOK
                                ATTRACTIVE</a></h6>
                        <div class="d-flex gap-1 align-items-center text-muted">
                            By
                            <span class="text-body">Kate Hoang</span>
                            On
                            <span class="text-body">February 21, 2024</span>
                        </div>
                        <div class="post-content text-muted mt-3">1. Face Men should also take care of the sun and
                            blemishes. It is recommended that you choose the ideal soap accor...</div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>

    <section class="home-fashion-trend-insta">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center mb-4">
                        <h3 class="position-relative title_9 d-inline-block fs-30">
                            <span>#kalles template</span>
                        </h3>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="row" data-flickity='{"imagesLoaded": 0,"adaptiveHeight": 1, "contain": 1, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": false,"prevNextButtons": true,"percentPosition": 1,"pageDots": false, "autoPlay" : 0, "pauseAutoPlayOnHover" : true, "rightToLeft": false }'>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="insta-card position-relative">
                        <img src="{{ URL::asset('/build/images/home-fashion-trend/inst-01.jpg')}}" alt="" class="img-fluid">
                        <a href="#!" class="d-flex position-absolute text-white start-0 end-0 top-0 bottom-0 align-items-center justify-content-center icon">
                            <i class="facl facl-instagram fs-28"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="insta-card position-relative">
                        <img src="{{ URL::asset('/build/images/home-fashion-trend/inst-02.jpg')}}" alt="" class="img-fluid">
                        <a href="#!" class="d-flex position-absolute text-white start-0 end-0 top-0 bottom-0 align-items-center justify-content-center icon">
                            <i class="facl facl-instagram fs-28"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="insta-card position-relative">
                        <img src="{{ URL::asset('/build/images/home-fashion-trend/inst-03.jpg')}}" alt="" class="img-fluid">
                        <a href="#!" class="d-flex position-absolute text-white start-0 end-0 top-0 bottom-0 align-items-center justify-content-center icon">
                            <i class="facl facl-instagram fs-28"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="insta-card position-relative">
                        <img src="{{ URL::asset('/build/images/home-fashion-trend/inst-03.jpg')}}" alt="" class="img-fluid">
                        <a href="#!" class="d-flex position-absolute text-white start-0 end-0 top-0 bottom-0 align-items-center justify-content-center icon">
                            <i class="facl facl-instagram fs-28"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="insta-card position-relative">
                        <img src="{{ URL::asset('/build/images/home-fashion-trend/inst-04.jpg')}}" alt="" class="img-fluid">
                        <a href="#!" class="d-flex position-absolute text-white start-0 end-0 top-0 bottom-0 align-items-center justify-content-center icon">
                            <i class="facl facl-instagram fs-28"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="insta-card position-relative">
                        <img src="{{ URL::asset('/build/images/home-fashion-trend/inst-05.jpg')}}" alt="" class="img-fluid">
                        <a href="#!" class="d-flex position-absolute text-white start-0 end-0 top-0 bottom-0 align-items-center justify-content-center icon">
                            <i class="facl facl-instagram fs-28"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="insta-card position-relative">
                        <img src="{{ URL::asset('/build/images/home-fashion-trend/inst-06.jpg')}}" alt="" class="img-fluid">
                        <a href="#!" class="d-flex position-absolute text-white start-0 end-0 top-0 bottom-0 align-items-center justify-content-center icon">
                            <i class="facl facl-instagram fs-28"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="insta-card position-relative">
                        <img src="{{ URL::asset('/build/images/home-fashion-trend/inst-07.jpg')}}" alt="" class="img-fluid">
                        <a href="#!" class="d-flex position-absolute text-white start-0 end-0 top-0 bottom-0 align-items-center justify-content-center icon">
                            <i class="facl facl-instagram fs-28"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="insta-card position-relative">
                        <img src="{{ URL::asset('/build/images/home-fashion-trend/inst-08.jpg')}}" alt="" class="img-fluid">
                        <a href="#!" class="d-flex position-absolute text-white start-0 end-0 top-0 bottom-0 align-items-center justify-content-center icon">
                            <i class="facl facl-instagram fs-28"></i>
                        </a>
                    </div>
                </div>
            </div><!--end row-->
        </div>
    </section>

    <div class="kalles-section-type-shipping">
        <div class="container">
            <div class="gap-4 d-flex overflow-x-auto" style="white-space: nowrap;">
                <div class="d-flex gap-3">
                    <i class="pegk pe-7s-car fs-36 text-muted flex-shrink-0"></i>
                    <div class="flex-grow-1">
                        <h6 class="text-uppercase fw-medium">Free Shipping</h6>
                        <p class="text-muted mb-0">Free shipping on all US order or <br /> order above $100</p>
                    </div>
                </div>
                <div class="d-flex gap-3">
                    <i class="pegk pe-7s-help2 fs-36 text-muted flex-shrink-0"></i>
                    <div class="flex-grow-1">
                        <h6 class="text-uppercase fw-medium">Support 24/7</h6>
                        <p class="text-muted mb-0">Contact us 24 hours a day, 7 <br /> days a week</p>
                    </div>
                </div>
                <div class="d-flex gap-3">
                    <i class="pegk pe-7s-refresh fs-36 text-muted flex-shrink-0"></i>
                    <div class="flex-grow-1">
                        <h6 class="text-uppercase fw-medium">30 Days Return</h6>
                        <p class="text-muted mb-0">Simply return it within 30 days <br /> for an exchange.</p>
                    </div>
                </div>
                <div class="d-flex gap-3">
                    <i class="pegk pe-7s-door-lock fs-36 text-muted flex-shrink-0"></i>
                    <div class="flex-grow-1">
                        <h6 class="text-uppercase fw-medium">100% Payment Secure</h6>
                        <p class="text-muted mb-0">We ensure secure payment with <br /> PEV</p>
                    </div>
                </div>

            </div><!--end row-->
        </div><!--end container-->
    </div><!--end shipping-->
    @include('partials.footer-trend')
    @include('partials.popup')
</div>
    @include('partials.card-model')
    @include('partials.vendor-scripts')
    <script src="{{ URL::asset('build/libs/flickity/flickity.pkgd.min.js')}}"></script>
    <script src="{{ URL::asset('build/js/main.js')}}"></script>
    <script src="{{ URL::asset('build/js/app.js')}}"></script>
</body>
</html>