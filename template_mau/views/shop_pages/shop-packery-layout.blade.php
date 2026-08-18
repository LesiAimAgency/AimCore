@extends('layouts.master_shop')
@section('title', 'Home Default | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme ')
@section('content')
    <div class="d-none d-lg-block navbar navbar-expand-lg py-1 border-top">
        <ul class=" list-unstyled navbar-nav justify-content-center ">
            <li class="nav-item">
                <a class="nav-link px-3" href="{{ url('shop_pages/shop-full-width-layout')}}">Accessories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3" href="{{ url('shop_pages/shop-1600px-layout')}}">Bottom</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3" href="{{ url('shop_pages/shop-filter-sidebar')}}">Denim</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3" href="{{ url('shop_pages/shop-right-sidebar')}}">Dress</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3" href="{{ url('shop_pages/shop-filter-sidebar')}}">Jackets</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3" href="{{url( 'shop_pages.shop-left-sidebar')}}">Jewellery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3" href="{{ url('shop_pages/shop-filter-sidebar')}}">Men</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3" href="{{url( 'shop_pages.shop-left-sidebar')}}">Shoes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3" href="{{ url('shop_pages/shop-filter-sidebar')}}">T-Shirt</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3" href="{{ url('shop_pages/shop-right-sidebar')}}">Tops</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3 text-teal" href="{{ url('shop_pages/shop-filter-sidebar')}}">Women</a>
            </li>
        </ul>
    </div>
    <!-- main slide -->
    <div style="background-image: url('/build/images/shop/shop-banner.jpg'); background-position: center;" class="position-relative">
        <div class="position-absolute top-0 start-0 right-0 bottom-0 bg-dark w-100 opacity-50"></div>
        <div class="px-4">
            <div class="text-white text-center py-5 position-relative">
                <h4 class="fs-20 fw-medium">Women</h4>
                <p class="fs-14">Shop through our latest selection of Women’s Clothing and Accessories.</p>
            </div>
        </div>
    </div>
    <!-- end main slide -->
    <div class="container   ">
        <div class=" mt-5 d-flex justify-content-between align-items-center">
            <a href="#!" class="text-muted fs-16 align-items-center d-none d-lg-flex" id="filter-icon">
                <i class="iccl fwb iccl-filter fwb me-2 fw-medium" id="icon-filter"></i>
                <i class="pe-7s-close pegk d-none me-2 fw-medium fw-semibold" id="icon-close" style="font-size: 24px;"></i>
                <p class="mb-0">Filter</p>
            </a>
            <div class="d-flex align-items-center d-lg-none fs-16 text-muted" data-bs-toggle="offcanvas" href="#filterOffcanvas">
                <i class="iccl fwb iccl-filter fwb me-2 fw-medium" id="icon-filter"></i>
                <i class="pe-7s-close pegk d-none me-2 fw-medium fw-semibold" id="icon-close" style="font-size: 24px;"></i>
                <p class="mb-0">Filter</p>
            </div>

            <div class="dropdown">
                <button class="btn d-flex align-items-center justify-content-between featurnBtn rounded-pill dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Feature
                </button>
                <ul class="dropdown-menu filter-dropdown">
                    <li><a class="dropdown-item" href="#">Feature</a></li>
                    <li><a class="dropdown-item" href="#">Best selling</a></li>
                    <li><a class="dropdown-item" href="#">Alphabetically, A-Z</a></li>
                    <li><a class="dropdown-item" href="#">Alphabetically, Z-A</a></li>
                    <li><a class="dropdown-item" href="#">Price, low to high</a></li>
                    <li><a class="dropdown-item" href="#">Date, old to new</a></li>
                    <li><a class="dropdown-item" href="#">Date, new to old</a></li>
                </ul>
            </div>
        </div>
        <!-- filter option -->
        <div class="p-4 filter-box d-none mt-4">
            <div class="row m-sm-2 g-4 g-sm-2">
                <!-- color -->
                <div class=" col-sm-6 col-lg-3">
                    <h5 class="mb-1 fw-medium"> By Vendor </h5>
                    <div class="filter-title"></div>
                    <div class="mt-3 filter-category">
                        <div class="round d-flex align-items-center pt-2 mb-2 gap-1">
                            <input class="form-check-input bg-black border-black p-1" type="checkbox" value="" id="colo1">
                            <label class="form-check-label ms-1" style="cursor: pointer;" for="color1">
                                Black
                            </label>
                        </div>
                        <div class="round d-flex align-items-center pt-2 mb-2 gap-1">
                            <input class="form-check-input bg-teal border-teal p-1" type="checkbox" value="" id="color2">
                            <label class="form-check-label ms-1" style="cursor: pointer;" for="color2">
                                Cyan
                            </label>
                        </div>
                        <div class="round d-flex align-items-center pt-2 mb-2 gap-1">
                            <input class="form-check-input bg-green2 p-1" type="checkbox" value="" id="color3">
                            <label class="form-check-label ms-1" style="cursor: pointer;" for="color3">
                                Green
                            </label>
                        </div>
                        <div class="round d-flex align-items-center pt-2 mb-2 gap-1">
                            <input class="form-check-input bg-cid-green border-cid-green p-1" type="checkbox" value="" id="color4">
                            <label class="form-check-label ms-1" style="cursor: pointer;" for="color4">
                                Gray
                            </label>
                        </div>
                        <div class="round d-flex align-items-center pt-2 mb-2 gap-1">
                            <input class="form-check-input bg-pink2 border-pink2 p-1" type="checkbox" value="" id="color5">
                            <label class="form-check-label ms-1" style="cursor: pointer;" for="color5">
                                Pink
                            </label>
                        </div>
                        <div class="round d-flex align-items-center pt-2 mb-2 gap-1">
                            <input class="form-check-input bg-sea border-sea p-1" type="checkbox" value="" id="color6">
                            <label class="form-check-label ms-1" style="cursor: pointer;" for="color6">
                                Sea
                            </label>
                        </div>
                        <div class="round d-flex align-items-center pt-2 mb-2 gap-1">
                            <input class="form-check-input bg-blue-dark border-blue-dark p-1" type="checkbox" value="" id="color7">
                            <label class="form-check-label ms-1" style="cursor: pointer;" for="color7">
                                Blue
                            </label>
                        </div>
                        <div class="round d-flex align-items-center pt-2 mb-2 gap-1">
                            <input class="form-check-input bg-red border-red p-1" type="checkbox" value="" id="color8">
                            <label class="form-check-label ms-1" style="cursor: pointer;" for="color8">
                                red
                            </label>
                        </div>
                        <div class="round d-flex align-items-center pt-2 mb-2 gap-1">
                            <input class="form-check-input bg-orange p-1 border-orange" type="checkbox" value="" id="color9">
                            <label class="form-check-label ms-1" style="cursor: pointer;" for="color9">
                                Orange
                            </label>
                        </div>
                    </div>
                </div>
                <div class=" col-sm-6 col-lg-3">
                    <h5 class="mb-1 fw-medium"> By Price </h5>
                    <div class="filter-title"></div>
                    <div class="mt-3">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheck1">
                            <label class="form-check-label" for="flexCheck1">
                                $50-$100
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheck2">
                            <label class="form-check-label" for="flexCheck2">
                                $100-$150
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheck3">
                            <label class="form-check-label" for="flexCheck3">
                                $150-$200
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheck4">
                            <label class="form-check-label" for="flexCheck4">
                                $250-$300
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheck5">
                            <label class="form-check-label" for="flexCheck5">
                                $350-$400
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheck6">
                            <label class="form-check-label" for="flexCheck6">
                                $450-$500
                            </label>
                        </div>
                    </div>
                </div>
                <div class=" col-sm-6 col-lg-3">
                    <h5 class="mb-1 fw-medium"> By Size </h5>
                    <div class="filter-title"></div>
                    <div class="mt-3">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked11">
                            <label class="form-check-label" for="flexCheckChecked11" style="cursor: pointer;">
                                L
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked21">
                            <label class="form-check-label" for="flexCheckChecked21" style="cursor: pointer;">
                                M
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked31">
                            <label class="form-check-label" for="flexCheckChecked31" style="cursor: pointer;">
                                S
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked41" style="cursor: pointer;">
                            <label class="form-check-label" for="flexCheckChecked41" style="cursor: pointer;">
                                Xl
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked51" style="cursor: pointer;">
                            <label class="form-check-label" for="flexCheckChecked51" style="cursor: pointer;">
                                Xs
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Category -->
                <div class=" col-sm-6 col-lg-3 ">
                    <h5 class="mb-1 fw-medium"> By Brand </h5>
                    <div class="filter-title"></div>
                    <div class="mt-3">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="flex23">
                            <label class="form-check-label" for="flex23">
                                Ck
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="flex22">
                            <label class="form-check-label" for="flex22">
                                H&M
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="">
                            <label class="form-check-label" for="flex21">
                                Kalles
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="flex11">
                            <label class="form-check-label" for="flex11">
                                Levi's
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="flex12">
                            <label class="form-check-label" for="flex12">
                                Monki
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="flex13">
                            <label class="form-check-label" for="flex13">
                                Nike
                            </label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--  -->
        <div class="filter-list">
            <ul class="list-unstyled d-flex my-4 align-items-center" style="height: 22px;">
                <li>
                    <a href="#!" class="d-flex align-items-center text-black"><span class="text-teal me-1">20</span>
                        Product
                        Found</a>
                </li>
                <li>
                    <a href="#!" class="d-flex align-items-center text-black">
                        <span class="filter-close"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                                <path d="M18 6 6 18" />
                                <path d="m6 6 12 12" />
                            </svg></span>
                        <span class="d-none filter-open"><svg class="me-1 mb-2" xmlns="http://www.w3.org/2000/svg" width="16" height="14" viewBox="0 0 24 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minus">
                                <path d="M5 12h14" />
                            </svg> </span>
                        Clear All Filter</a>
                </li>
                <li>
                    <a href="#!" class="d-flex align-items-center text-black">
                        <span class="filter-close"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                                <path d="M18 6 6 18" />
                                <path d="m6 6 12 12" />
                            </svg></span>
                        <span class="d-none filter-open"><svg class="me-1 mb-2" xmlns="http://www.w3.org/2000/svg" width="16" height="14" viewBox="0 0 24 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minus">
                                <path d="M5 12h14" />
                            </svg> </span>
                        Size M</a>
                </li>
                <li>
                    <a href="#!" class="d-flex align-items-center text-black">
                        <span class="filter-close"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                                <path d="M18 6 6 18" />
                                <path d="m6 6 12 12" />
                            </svg></span>
                        <span class="d-none filter-open"><svg class="me-1 mb-2" xmlns="http://www.w3.org/2000/svg" width="16" height="14" viewBox="0 0 24 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minus">
                                <path d="M5 12h14" />
                            </svg> </span>
                        Color Cyan</a>

                </li>
                <li>
                    <a href="#!" class="d-flex align-items-center text-black">
                        <span class="filter-close"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                                <path d="M18 6 6 18" />
                                <path d="m6 6 12 12" />
                            </svg></span>
                        <span class="d-none filter-open"><svg class="me-1 mb-2" xmlns="http://www.w3.org/2000/svg" width="16" height="14" viewBox="0 0 24 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minus">
                                <path d="M5 12h14" />
                            </svg> </span>
                        Vendor Kalles</a>
                </li>
            </ul>
        </div>
        <!--  -->
        <!-- row-1 -->
        <div class="row  g-lg-4 g-3 row-cols-2 row-cols-md-4 pb-1">
            <div class="col-md">
                <div class="row g-3 g-lg-4">
                    <div class="col-12">
                        <div x-data="{ imageUrl: '/build/images/home-classic/pr-01.jpg' }" class="topbar-product-card">
                            <div class="position-relative overflow-hidden">
                                <span class="new-label bg-success text-white rounded-circle"> New </span>
                                <img :src="imageUrl" alt="" class="img-fluid w-100">
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
                                <div class="product-size mb-0 start-0 end-0 bottom-0 p-2" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0) 100%);">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title text-white">Cream
                                            Women
                                            Pants</a></h6>
                                    <p class="mb-0 fs-14 text-white">
                                        <span>$35.00</span>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12">
                        <div x-data="{ imageUrl: '/build/images/home-metro/pr-q4.jpg' }" class="topbar-product-card pb-3 pb-md-0">
                            <div class="position-relative overflow-hidden">
                                <img :src="imageUrl" alt="" class="img-fluid w-100">
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
                                <div class="product-size mb-0 start-0 end-0 bottom-0 p-2" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0) 100%);">
                                    <h6 class="mb-1 text-white"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title text-white"></a>
                                        Blush Beanie </a></h6>
                                    <p class="mb-0 fs-14 text-white">
                                        <span>$15.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md col-md-6">
                <div x-data="{ imageUrl: '/build/images/home-metro/pr-q1.jpg' }" class="topbar-product-card">
                    <div class="position-relative overflow-hidden">
                        <img :src="imageUrl" alt="" class="img-fluid w-100" src="/build/images/products/pr-18.jpg">
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
                        <div class="product-size mb-0 start-0 end-0 bottom-0 p-2" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0) 100%);">
                            <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title text-white">
                                    Mercury Tee </a></h6>
                            <p class="mb-0 fs-14 text-white">
                                <span>$68.00</span>
                            </p>
                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/home-metro/pr-q1.jpg'" x-on:click.prevent="imageUrl = '/build/images/home-metro/pr-q1.jpg'" class="d-inline-block rounded-circle " style="background: url('/build/images/home-metro/pr-q1.jpg');background-size: cover; width: 16px; height: 16px;"></a>
                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/home-metro/pr-q2.jpg'" x-on:click.prevent="imageUrl = '/build/images/home-metro/pr-q2.jpg'" class="d-inline-block bg-black rounded-circle" style="background: url('/build/images/home-metro/pr-q2.jpg');background-size: cover; width: 16px; height: 16px;"></a>
                        </div>
                    </div>
                </div>
                <div class="d-md-none">
                    <div x-data="{ imageUrl: '/build/images/home-classic/pr-06.jpg' }" class="topbar-product-card pt-3">
                        <div class="position-relative overflow-hidden">
                            <img :src="imageUrl" alt="" class="img-fluid w-100">
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
                            <div class="product-size mb-0 start-0 end-0 bottom-0 p-2" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0) 100%);">
                                <h6 class="mb-1 text-white"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title text-white"></a>
                                    Blush Beanie </a></h6>
                                <p class="mb-0 fs-14 text-white">
                                    <span>$15.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="row g-3 g-lg-4">
                    <div class="col-12">
                        <div x-data="{ imageUrl: '/build/images/home-classic/pr-03.jpg' }" class="topbar-product-card">
                            <div class="position-relative overflow-hidden">
                                <img :src="imageUrl" alt="" class="img-fluid w-100">
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
                                <div class="product-size mb-0 start-0 end-0 bottom-0 p-2" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0) 100%);">
                                    <h6 class="mb-1 text-white"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title text-white">Ridley
                                            High
                                            Waist</a></h6>
                                    <p class="mb-0 fs-14 text-white">
                                        <span>$36.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div x-data="{ imageUrl: '/build/images/home-metro/pr-q6.jpg' }" class="topbar-product-card pb-3 pb-md-0">
                            <div class="position-relative overflow-hidden">
                                <img :src="imageUrl" alt="" class="img-fluid w-100">
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
                                <div class="product-size mb-0 start-0 end-0 bottom-0 p-2" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0) 100%);">
                                    <h6 class="mb-1 text-white"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title text-white">Crosshatch Backpack</a></h6>
                                    <p class="mb-0 fs-14 text-white">
                                        <span>$30.00</span>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- second row -->
            <div class="col-md">
                <div x-data="{ imageUrl: '/build/images/home-classic/pr-06.jpg' }" class="topbar-product-card pb-3">
                    <div class="position-relative overflow-hidden">
                        <img :src="imageUrl" alt="" class="img-fluid w-100">
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
                        <div class="product-size mb-0 start-0 end-0 bottom-0 p-2" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0) 100%);">
                            <h6 class="mb-1 text-white"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title text-white"></a>
                                Blush Beanie </a></h6>
                            <p class="mb-0 fs-14 text-white">
                                <span>$15.00</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="d-md-none">
                    <div x-data="{ imageUrl: '/build/images/home-classic/pr-27.jpg' }" class="topbar-product-card pb-3">
                        <div class="position-relative overflow-hidden">
                            <img :src="imageUrl" alt="" class="img-fluid w-100">
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
                            <div class="product-size mb-0 start-0 end-0 bottom-0 p-2" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0) 100%);">
                                <h6 class="mb-1 text-white"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title text-white"></a>
                                    City Backpack Black </a></h6>
                                <p class="mb-0 fs-14 text-white">
                                    <span>$55.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div x-data="{ imageUrl: '/build/images/home-classic/pr-31.jpg' }" class="topbar-product-card pb-3">
                    <div class="position-relative overflow-hidden">
                        <img :src="imageUrl" alt="" class="img-fluid w-100">
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
                        <div class="product-size mb-0 start-0 end-0 bottom-0 p-2" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0) 100%);">
                            <h6 class="mb-1 text-white"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title text-white"></a>
                                Men Pants </a></h6>
                            <p class="mb-0 fs-14 text-white">
                                <span>$49.00 – $56.00</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div x-data="{ imageUrl: '/build/images/home-metro/pr-q8.jpg' }" class="topbar-product-card pb-3">
                    <div class="position-relative overflow-hidden">
                        <img :src="imageUrl" alt="" class="img-fluid w-100">
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
                        <div class="product-size mb-0 start-0 end-0 bottom-0 p-2" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0) 100%);">
                            <h6 class="mb-1 text-white"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title text-white"></a>
                                Dusk Pom Beanie </a></h6>
                            <p class="mb-0 fs-14 text-white">
                                <span>$25.00</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-none d-md-block">
                <div x-data="{ imageUrl: '/build/images/home-classic/pr-27.jpg' }" class="topbar-product-card pb-3">
                    <div class="position-relative overflow-hidden">
                        <img :src="imageUrl" alt="" class="img-fluid w-100">
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
                        <div class="product-size mb-0 start-0 end-0 bottom-0 p-2" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0) 100%);">
                            <h6 class="mb-1 text-white"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title text-white"></a>
                                City Backpack Black </a></h6>
                            <p class="mb-0 fs-14 text-white">
                                <span>$55.00</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- row-2 -->
        <div class="row g-3 g-lg-4">
            <div class="col-lg-6">
                <div x-data="{ imageUrl: '/build/images/home-metro/pr-q10.jpg' }" class="topbar-product-card">
                    <div class="position-relative overflow-hidden">
                        <img :src="imageUrl" alt="" class="img-fluid w-100" src="/build/images/products/pr-18.jpg">
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
                        <div class="product-size mb-0 start-0 end-0 bottom-0 p-2" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0) 100%);">
                            <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title text-white">
                                    Women Black Pants </a></h6>
                            <p class="mb-0 fs-14 text-white">
                                <span>$100.00</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row g-3 g-lg-4">
                    <div class="col-6">
                        <div x-data="{ imageUrl: '/build/images/home-classic/pr-big-24.jpg' }" class="topbar-product-card">
                            <div class="position-relative overflow-hidden">
                                <img :src="imageUrl" alt="" class="img-fluid w-100" src="/build/images/home-classic/pr-big-24.jpg">
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
                                <div class="product-size mb-0 start-0 end-0 bottom-0 p-2" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0) 100%);">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title text-white">
                                            La Bohème Rose Gold </a></h6>
                                    <p class="mb-0 fs-14 text-white">
                                        <del>$60.00</del><span class="text-danger"> $40.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div x-data="{ imageUrl: '/build/images/home-metro/pr-q12.jpg' }" class="topbar-product-card">
                            <div class="position-relative overflow-hidden">
                                <img :src="imageUrl" alt="" class="img-fluid w-100" src="/build/images/home-metro/pr-q12.jpg">
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
                                <div class="product-size mb-0 start-0 end-0 bottom-0 p-2" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0) 100%);">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title text-white">
                                            Large Icon Bag </a></h6>
                                    <p class="mb-0 fs-14 text-white">
                                        <del>$60.00</del><span class="text-danger"> $45.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div x-data="{ imageUrl: '/build/images/home-metro/pr-q14.jpg' }" class="topbar-product-card">
                            <div class="position-relative overflow-hidden">
                                <img :src="imageUrl" alt="" class="img-fluid w-100" src="/build/images/home-metro/pr-q14.jpg">
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
                                <div class="product-size mb-0 start-0 end-0 bottom-0 p-2" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0) 100%);">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title text-white">
                                            Sunny Life </a></h6>
                                    <p class="mb-0 fs-14 text-white">
                                        <span class="text-danger"> $68.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div x-data="{ imageUrl: '/build/images/home-classic/pr-19.jpg' }" class="topbar-product-card">
                            <div class="position-relative overflow-hidden">
                                <img :src="imageUrl" alt="" class="img-fluid w-100" src="/build/images/home-classic/pr-19.jpg">
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
                                <div class="product-size mb-0 start-0 end-0 bottom-0 p-2" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0) 100%);">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title text-white">
                                            Cream Women Pants </a></h6>
                                    <p class="mb-0 fs-14 text-white">
                                        <span class="text-danger"> $35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- pagination -->
        <div class="py-3 my-3 my-lg-5 d-flex justify-content-center">
            <button class="btn-load btn btn-custom-dark fw-semibold min-w-150 rounded-pill">Lord More</button>
        </div>
    </div>
@endsection