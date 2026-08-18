@extends('layouts.master_home')
@section('title', 'Home Instagram Shop | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme')
@section('content')
<div>
    <section class="kalles-banner-parallax-layout-01 min-vh-100 position-relative" style="background-image: url('/build/images/home-instagram-shop/loobook.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center top;">
        <div class="position-absolute top-50 start-50 translate-middle text-white text-center my-5">
            <h1 class="text-uppercase fs-60">Clearance sale off to 70%</h1>
            <h3 class="fs-18 font-secondary fst-italic">Spring Collection 2021</h3>
            <a href="{{ url('shop_pages/shop')}}" class="btn btn-custom-white text-white min-w-150 rounded-pill mt-4">Shop Now</a>
        </div>
    </section>

    <section class="cat-section">
        <div class="container-fluid mb-30">
            <div class="row g-xl-4 g-3">
                <div class="col-md-3">
                    <a href="{{ url('shop_pages/shop')}}" class="d-block position-relative cat_grid_item overflow-hidden h-100">
                        <img class="h-100 w-100 cat-grid-img" src="/build/images/home-categories-links/cat-bn-01.jpeg"></img>
                        <div class="cat-grid-button text-body">
                            <div class="cat_grid_item__title">Footwear</div>
                        </div>
                    </a>
                </div><!--end col-->
                <div class="col-md-3">
                    <a href="{{ url('shop_pages/shop')}}" class="d-block position-relative cat_grid_item overflow-hidden h-100">
                        <img class="h-100 w-100 cat-grid-img" src="{{ URL::asset('/build/images/home-categories-links/cat-bn-02.jpg')}}"></img>
                        <div class="cat-grid-button text-body">
                            <div class="cat_grid_item__title">Bags</div>
                        </div>
                    </a>
                </div><!--end col-->
                <div class="col-md-3">
                    <a href="{{ url('shop_pages/shop')}}" class="d-block position-relative cat_grid_item overflow-hidden h-100">
                        <img class="h-100 w-100 cat-grid-img" src="{{ URL::asset('/build/images/home-categories-links/cat-bn-03.jpg')}}"></img>
                        <div class="cat-grid-button text-body">
                            <div class="cat_grid_item__title">Watches</div>
                        </div>
                    </a>
                </div><!--end col-->
                <div class="col-md-3">
                    <a href="{{ url('shop_pages/shop')}}" class="d-block position-relative cat_grid_item overflow-hidden h-100">
                        <img class="h-100 w-100 cat-grid-img" src="{{ URL::asset('/build/images/home-categories-links/cat-bn-04.jpg')}}"></img>
                        <div class="cat-grid-button text-body">
                            <div class="cat_grid_item__title">Caps & Hats</div>
                        </div>
                    </a>
                </div><!--end col-->
            </div><!--end row-->
        </div>
        <div class="container">
            <div class="row g-lg-4 g-3 align-items-center">
                <div class="col-md-4">
                    <a href="#!" class="kalles-banner-promotion d-block">
                        <img src="{{ URL::asset('/build/images/home-video-banner/bn-01.jpeg')}}" alt="" class="img-fluid">
                        <div class="p-20 position-absolute bottom-0 left-0 text-body">
                            <p class="text-uppercase fw-medium fs-14 mb-1">View Collections</p>
                            <h3 class="fs-35">LOOKBOOK</h3>
                            <p class="text-muted mb-0">your world of fashion in numbers</p>
                        </div>
                    </a>
                </div><!--end col-->
                <div class="col-md-4">
                    <div x-data="{ imageUrl: '/build/images/home-classic/pr-big-24.jpg' }" class="kalles-banner-promotion topbar-product-card">
                        <div class="position-relative overflow-hidden">
                            <span class="new-label bg-danger text-white rounded-circle"> -34% </span>
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
                            <div class="product-size text-center d-none d-lg-block">
                                <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link">La Bohème
                                        Rose Gold</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <del>$60.00</del>
                                    <span class="text-danger">$45.00</span>
                                </p>
                                <div class="product-color-list mt-1 gap-2 d-flex align-items-center justify-content-center p-2">
                                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/home-classic/pr-big-24.jpg'" x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-big-24.jpg'" class="d-inline-block bg_color_pink rounded-circle"></a>
                                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/home-classic/pr-big-25.jpg'" x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-big-25.jpg'" class="d-inline-block bg-dark rounded-circle"></a>
                                </div>
                            </div>
                            <div class="count-time d-none d-lg-block" data-date="10-10-2028">
                                <ul class="list-unstyled d-flex gap-2 align-items-center text-center justify-content-center mb-0">
                                    <li class="bg-dark text-white text-white-50 fs-12 rounded"><span class="days text-white fs-14">0</span>days</li>
                                    <li class="bg-dark text-white text-white-50 fs-12 rounded"><span class="text-white fs-14">00</span>Hours</li>
                                    <li class="bg-dark text-white text-white-50 fs-12 rounded"><span class="min text-white fs-14">00</span>Minutes</li>
                                    <li class="bg-dark text-white text-white-50 fs-12 rounded"><span class="sc text-white fs-14">00</span>Seconds</li>
                                </ul>
                            </div>
                        </div>
                        <div class="d-lg-none">
                            <div class="text-center mt-3">
                                <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link">La Bohème
                                        Rose Gold</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <del>$60.00</del>
                                    <span class="text-danger">$45.00</span>
                                </p>
                                <div class="product-color-list mt-1 gap-2 d-flex align-items-center justify-content-center p-2">
                                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/home-classic/pr-big-24.jpg'" x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-big-24.jpg'" class="d-inline-block bg_color_pink rounded-circle"></a>
                                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/home-classic/pr-big-25.jpg'" x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-big-25.jpg'" class="d-inline-block bg-dark rounded-circle"></a>
                                </div>
                            </div>
                            <div class="count-time position-relative mt-4 d-lg-block d-none" data-date="10-10-2028">
                                <ul class="list-unstyled d-flex gap-2 align-items-center text-center justify-content-center mb-0">
                                    <li class="bg-dark text-white text-white-50 fs-12 rounded" style="min-width: 50px;"><span class="days text-white fs-14">0</span>days</li>
                                    <li class="bg-dark text-white text-white-50 fs-12 rounded" style="min-width: 50px;"><span class=" text-white fs-14">00</span>Hours</li>
                                    <li class="bg-dark text-white text-white-50 fs-12 rounded" style="min-width: 50px;"><span class="min text-white fs-14">00</span>Minutes</li>
                                    <li class="bg-dark text-white text-white-50 fs-12 rounded" style="min-width: 50px;"><span class="sc text-white fs-14">00</span>Seconds</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-md-4">
                    <a href="#!" class="kalles-banner-promotion d-block">
                        <img src="{{ URL::asset('/build/images/home-classic/pr-big-26.jpg')}}" alt="" class="img-fluid">
                        <div class="p-20 position-absolute top-50 end-0 text-body start-0 content-position text-center">
                            <p class="text-uppercase fw-medium fs-18 mb-1">Men Collection</p>
                            <h3 class="fs-50">SALE 70%</h3>
                            <button class="btn btn-custom-dark fw-medium min-w-150 rounded-pill">Shop Now</button>
                        </div>
                    </a>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>

    <section class="mt-30">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center mb-4 pb-2">
                        <div class="mb-2">
                            <h3 class="section-title position-relative flex text-uppercase">
                                <span>Instgram Shop</span>
                            </h3>
                        </div>
                        <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">Make your
                            Instagram shop</span>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="row g-3">
                <div class="col-md-3 col-6">
                    <div class="insta-card position-relative rounded">
                        <img src="{{ URL::asset('/build/images/home-instagram-shop/bg-pin-01.jpg')}}" alt="" class="img-fluid">
                        <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal" class="card-spin position-03 position-absolute fs-14 bg-dark text-white rounded-circle fw-semibold">1</a>
                    </div>
                </div><!--end col-->
                <div class="col-md-3 col-6">
                    <div class="insta-card position-relative rounded">
                        <img src="{{ URL::asset('/build/images/home-instagram-shop/bg-pin-02.jpg')}}" alt="" class="img-fluid">
                        <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal" class="card-spin position-02 position-absolute fs-14 bg-dark text-white rounded-circle fw-semibold">1</a>
                        <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal" class="card-spin position-05 position-absolute fs-14 bg-dark text-white rounded-circle fw-semibold">2</a>
                    </div>
                </div><!--end col-->
                <div class="col-md-3 col-6">
                    <div class="insta-card position-relative rounded">
                        <img src="{{ URL::asset('/build/images/home-instagram-shop/bg-pin-03.jpg')}}" alt="" class="img-fluid">
                        <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal" class="card-spin position-08 position-absolute fs-14 bg-dark text-white rounded-circle fw-semibold">1</a>
                    </div>
                </div><!--end col-->
                <div class="col-md-3 col-6">
                    <div class="insta-card position-relative rounded">
                        <img src="{{ URL::asset('/build/images/home-instagram-shop/bg-pin-04.jpg')}}" alt="" class="img-fluid">
                        <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal" class="card-spin position-07 position-absolute fs-14 bg-dark text-white rounded-circle fw-semibold">1</a>
                    </div>
                </div><!--end col-->
                <div class="col-md-3 col-6">
                    <div class="insta-card position-relative rounded">
                        <img src="{{ URL::asset('/build/images/home-instagram-shop/bg-pin-05.jpg')}}" alt="" class="img-fluid">
                        <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal" class="card-spin position-02 position-absolute fs-14 bg-dark text-white rounded-circle fw-semibold">1</a>
                    </div>
                </div><!--end col-->
                <div class="col-md-3 col-6">
                    <div class="insta-card position-relative rounded">
                        <img src="{{ URL::asset('/build/images/home-instagram-shop/bg-pin-06.jpg')}}" alt="" class="img-fluid">
                        <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal" class="card-spin position-02 position-absolute fs-14 bg-dark text-white rounded-circle fw-semibold">1</a>
                    </div>
                </div><!--end col-->
                <div class="col-md-3 col-6">
                    <div class="insta-card position-relative rounded">
                        <img src="{{ URL::asset('/build/images/home-instagram-shop/bg-pin-07.jpg')}}" alt="" class="img-fluid">
                        <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal" class="card-spin position-02 position-absolute fs-14 bg-dark text-white rounded-circle fw-semibold">1</a>
                    </div>
                </div><!--end col-->
                <div class="col-md-3 col-6">
                    <div class="insta-card position-relative rounded">
                        <img src="{{ URL::asset('/build/images/home-instagram-shop/bg-pin-08.jpg')}}" alt="" class="img-fluid">
                        <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal" class="card-spin position-06 position-absolute fs-14 bg-dark text-white rounded-circle fw-semibold">1</a>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->

@endsection