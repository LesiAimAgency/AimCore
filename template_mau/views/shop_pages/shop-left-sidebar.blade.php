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


<div class="container">
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
        <ul class=" nav tab_header tab_filter gap-2 justify-content-end justify-content-sm-center" id="pills-tab" role="tablist">
            <li class="nav-item d-sm-none" role="presentation">
                <button class="nav-link" id="best-pan1-tab" data-bs-toggle="pill" data-bs-target="#best-pan1" type="button" role="tab" aria-controls="best-pan1" aria-selected="true">
                    <div class="filter-option d-flex">
                        <div class="grid1"></div>
                    </div>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link " id="best-seller-tab" data-bs-toggle="pill" data-bs-target="#best-seller" type="button" role="tab" aria-controls="best-seller" aria-selected="true">
                    <div class="filter-option d-flex">
                        <div class="grid1"></div>
                        <div class="grid1"></div>
                    </div>
                </button>
            </li>
            <li class="nav-item d-none d-sm-block" role="presentation">
                <button class="nav-link " id="featured-tab" data-bs-toggle="pill" data-bs-target="#featured" type="button" role="tab" aria-controls="featured" aria-selected="false">
                    <div class="filter-option d-flex">
                        <div class="grid1"></div>
                        <div class="grid1"></div>
                        <div class="grid1"></div>
                    </div>
                </button>
            </li>
            <li class="nav-item d-none d-md-block" role="presentation">
                <button class="nav-link active" id="sale-tab" data-bs-toggle="pill" data-bs-target="#sale" type="button" role="tab" aria-controls="sale" aria-selected="false">
                    <div class="filter-option d-flex">
                        <div class="grid1"></div>
                        <div class="grid1"></div>
                        <div class="grid1"></div>
                        <div class="grid1"></div>
                    </div>
                </button>
            </li>
            <li class="nav-item d-none d-lg-block" role="presentation">
                <button class="nav-link" id="top-sale-tab" data-bs-toggle="pill" data-bs-target="#top-sale" type="button" role="tab" aria-controls="top-sale" aria-selected="false">
                    <div class="filter-option d-flex">
                        <div class="grid1"></div>
                        <div class="grid1"></div>
                        <div class="grid1"></div>
                        <div class="grid1"></div>
                        <div class="grid1"></div>
                    </div>
                </button>
            </li>
            <li class="nav-item d-none d-xl-block" role="presentation">
                <button class="nav-link" id="top-product-tab" data-bs-toggle="pill" data-bs-target="#top-product" type="button" role="tab" aria-controls="top-product" aria-selected="false">
                    <div class="filter-option d-flex">
                        <div class="grid1"></div>
                        <div class="grid1"></div>
                        <div class="grid1"></div>
                        <div class="grid1"></div>
                        <div class="grid1"></div>
                        <div class="grid1"></div>
                    </div>
                </button>
            </li>
        </ul>
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
    <!-- tab -->
    <div class="row">
        <div class="col-lg-3 d-none d-lg-block filter-box border-0" style="box-shadow: none;">
            <div>
                <h5 class="mb-2 mt-3"> Product Categories </h5>
                <div class="filter-title mb-4"></div>
                <ul class=" list-unstyled mb-4 navbar-nav justify-content-center ">
                    <li class="nav-item">
                        <a class="nav-link pt-0 pe-3 d-flex" href="{{ url('shop_pages/shop-full-width-layout')}}">
                            <span><i class="close_pp  pegk pe-7s-close ts__03 cd fs-20 fw-bold filter-close" style="transform: rotate(45deg);"></i></span>
                            Accessories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pt-0 pe-3" href="{{ url('shop_pages/shop-1600px-layout')}}">
                            <span class="d-inline-flex"><i class="close_pp  pegk pe-7s-close ts__03 cd fs-20 fw-bold filter-close" style="transform: rotate(45deg);"></i>Bottom</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pt-0 pe-3" href="{{ url('shop_pages/shop-filter-sidebar')}}">
                            <span class="d-inline-flex"><i class="close_pp  pegk pe-7s-close ts__03 cd fs-20 fw-bold filter-close" style="transform: rotate(45deg);"></i>Denim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pt-0 pe-3" href="{{ url('shop_pages/shop-right-sidebar')}}">
                            <span class="d-inline-flex"><i class="close_pp  pegk pe-7s-close ts__03 cd fs-20 fw-bold filter-close" style="transform: rotate(45deg);"></i>Dress</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pt-0 pe-3" href="{{ url('shop_pages/shop-filter-sidebar')}}">
                            <span class="d-inline-flex"><i class="close_pp  pegk pe-7s-close ts__03 cd fs-20 fw-bold filter-close" style="transform: rotate(45deg);"></i>Jackets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pt-0 pe-3" href="{{url( 'shop_pages.shop-left-sidebar')}}">
                            <span class="d-inline-flex"><i class="close_pp  pegk pe-7s-close ts__03 cd fs-20 fw-bold filter-close" style="transform: rotate(45deg);"></i>Jewellery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pt-0 pe-3" href="{{ url('shop_pages/shop-filter-sidebar')}}">
                            <span class="d-inline-flex"><i class="close_pp  pegk pe-7s-close ts__03 cd fs-20 fw-bold filter-close" style="transform: rotate(45deg);"></i>Men</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pt-0 pe-3" href="{{url( 'shop_pages.shop-left-sidebar')}}">
                            <span class="d-inline-flex"><i class="close_pp  pegk pe-7s-close ts__03 cd fs-20 fw-bold filter-close" style="transform: rotate(45deg);"></i>Shoes</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link pt-0 pe-3" href="{{ url('shop_pages/shop-right-sidebar')}}">
                            <span class="d-inline-flex"><i class="close_pp  pegk pe-7s-close ts__03 cd fs-20 fw-bold filter-close" style="transform: rotate(45deg);"></i>Tops</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pt-0 pe-3 text-teal" href="{{ url('shop_pages/shop-filter-sidebar')}}">
                            <span class="d-inline-flex"><i class="close_pp  pegk pe-7s-close ts__03 cd fs-20 fw-bold filter-close" style="transform: rotate(45deg);"></i>Women</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pt-0 pe-3" href="{{ url('shop_pages/shop-filter-sidebar')}}">
                            <span class="d-inline-flex"><i class="close_pp  pegk pe-7s-close ts__03 cd fs-20 fw-bold filter-close" style="transform: rotate(45deg);"></i>T-Shirt</a>
                    </li>
                </ul>
            </div>
            <div>
                <h5 class="mb-2 mt-3">Filter by price </h5>
                <div class="filter-title mb-4"></div>
                <div class="mt-3">
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            $50-$100
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            $100-$150
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            $150-$200
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            $250-$300
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            $350-$400
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            $450-$500
                        </label>
                    </div>
                </div>
            </div>
            <div>
                <h5 class="mb-2 mt-4"> Filter by color </h5>
                <div class="filter-title mb-4"></div>
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
            <div>
                <h5 class="mb-2 mt-4"> By Size </h5>
                <div class="filter-title mb-4"></div>
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
        </div>
        <div class="col-lg-9">
            <div class="tab-content my-3 my-md-4" id="pills-tabContent">
                <div class="tab-pane fade" id="best-pan1" role="tabpanel" aria-labelledby="best-pan1-tab" tabindex="0">
                    <div class="row g-lg-4 g-3">
                        <div class="col-12">
                            <div x-data="{ imageUrl: '/build/images/products/pr-01.jpg' }" :class="{ 'w-100': true, 'h-100': true }" class="topbar-product-card pb-3 w-100">
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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL
                                    </p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Analogue
                                            Resin Strap</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$30.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div x-data="{ imageUrl: '/build/images/megamenu/pr-11.jpg' }" class="topbar-product-card pb-3 w-100">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-danger text-white rounded-circle"> -25% </span>
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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">La Bohème Rose Gold</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$60.00</del>
                                        <span class="text-danger">$40.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/megamenu/pr-11.jpg'" x-on:click.prevent="imageUrl = '/build/images/megamenu/pr-11.jpg'" class="d-inline-block bg_color_pink rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-35.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-35.jpg'" class="d-inline-block bg-black rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div x-data="{ imageUrl: '/build/images/megamenu/pr-03.jpg' }" class="topbar-product-card pb-3 w-100">
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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL
                                    </p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Ridley
                                            High
                                            Waist</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$36.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div x-data="{ imageUrl: '/build/images/megamenu/pr-03.jpg' }" class="topbar-product-card pb-3 w-100">
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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL
                                    </p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Ridley
                                            High
                                            Waist</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$36.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div x-data="{ imageUrl: '/build/images/products/pr-18.jpg' }" class="topbar-product-card pb-3 w-100">
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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL
                                    </p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Cream
                                            Women
                                            Pants</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- second row -->
                        <div class="col-12">
                            <div x-data="{ imageUrl: '/build/images/products/pr-11.jpg' }" class="topbar-product-card pb-3 w-100">
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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL
                                    </p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Women
                                            Black
                                            Pants</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$100.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div x-data="{ imageUrl: '/build/images/products/pr-33.jpg' }" class="topbar-product-card pb-3 w-100">
                                <div class="position-relative overflow-hidden">
                                    
                                    <img :src="imageUrl" alt="" class="img-fluid w-100" src="/build/images/products/pr-33.jpg">

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
                                    <h6 class="mb-1"><a href="#!" class="product-title">La Bohème Rose Gold</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$60.00</del>
                                        <span class="text-danger">$40.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-33.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-33.jpg'" class="d-inline-block bg_color_black rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-34.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-34.jpg'" class="d-inline-block bg-black rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div x-data="{ imageUrl: '/build/images/products/pr-15.jpg' }" class="topbar-product-card pb-3 w-100 w-100 h-100">
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
                                    <p class="product-size mb-0 text-center text-white fw-medium">S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">Mercury Tee</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$68.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-15.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-15.jpg'" class="d-inline-block rounded-circle" style="background: url('/build/images/products/pr-15.jpg');background-size: cover;"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-14.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-14.jpg'" class="d-inline-block rounded-circle" style="background: url('/build/images/products/pr-14.jpg');background-size: cover;"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div x-data="{ imageUrl: '/build/images/megamenu/pr-05.jpg' }" class="topbar-product-card pb-3 w-100">
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
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">Blush Beanie</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span class="text-muted">$15.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/megamenu/pr-05.jpg'" x-on:click.prevent="imageUrl = '/build/images/megamenu/pr-05.jpg'" class="d-inline-block bg_color_muted rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-31.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-31.jpg'" class="d-inline-block bg_color_pink rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-32.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-32.jpg'" class="d-inline-block bg-dark rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- third row -->
                        <div class="col-12">
                            <div x-data="{ imageUrl: '/build/images/home-classic/pr-11.jpg' }" class="topbar-product-card pb-3 w-100">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-danger text-white rounded-circle"> -25% </span>
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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">La Bohème Rose Gold</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$60.00</del>
                                        <span class="text-danger">$40.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/home-classic/pr-11.jpg'" x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-11.jpg'" class="d-inline-block bg-green2 rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/home-classic/pr-09.jpg'" x-on:click.prevent="imageUrl = ' build/images/home-classic/pr-09.jpg'" class="d-inline-block bg-sea rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/home-classic/pr-12.jpg'" x-on:click.prevent="imageUrl = ' build/images/home-classic/pr-12.jpg'" class="d-inline-block bg-blue-dark rounded-circle"></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div x-data="{ imageUrl: '/build/images/home-fashion-simple/pr-01.jpg' }" class="topbar-product-card pb-3 w-100">
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
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Short
                                            Sleeved
                                            Hoodie</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del class="text-muted">$45.00</del>
                                        <span class="text-danger">$30.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div x-data="{ imageUrl: '/build/images/shop/pr-01.jpg' }" class="topbar-product-card pb-3 w-100">
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
                                </div>
                                <div class="mt-3">
                                    <a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Chill
                                        Candle</a>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$16.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-47.jpg' }" class="topbar-product-card pb-3 w-100">
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
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title w-100 ">Sport
                                            Sneaker</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end tab pane-->
                <div class="tab-pane fade " id="best-seller" role="tabpanel" aria-labelledby="best-seller-tab" tabindex="0">
                    <div class="row g-lg-4 g-3">
                        <div class="col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-01.jpg', isHovered: false }" class="topbar-product-card pb-3 w-100" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-success text-white rounded-circle text-center"> New
                                    </span>
                                    <img :src="isHovered ? '/build/images/products/pr-02.jpg' : imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

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
                        <div class="col-6 ">
                            <div x-data="{ imageUrl: '/build/images/products/pr-27.jpg', isHovered: false }" class="topbar-product-card pb-3 w-100" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-danger text-white rounded-circle"> -34% </span>
                                    <img :src="isHovered ? '/build/images/products/pr-28.jpg' : imageUrl" alt="" class="img-fluid w-100">
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
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-33.jpg', isHovered: false }" class="topbar-product-card pb-3 w-100" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/products/pr-34.jpg' : imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

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
                        <div class="col-6 ">
                            <div x-data="{ imageUrl: '/build/images/products/pr-18.jpg', isHovered: false }" class="topbar-product-card pb-3 w-100" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/products/pr-17.jpg' : imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

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
                                    <h6 class="mb-1"> Cream Women Pants</h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <!-- second row -->
                        <div class="col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-11.jpg' }" class="topbar-product-card pb-3 w-100">
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
                                    <p class="product-size mb-0 text-center text-white fw-medium">S, M, L</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">Women Black Pants</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$100.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-33.jpg', isHovered: false }" class="topbar-product-card pb-3 w-100" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/products/pr-34.jpg' : imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

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
                                    <h6 class="mb-1"> Sweatshirt In Geometric Print</h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-15.jpg', isHovered: false }" class="topbar-product-card pb-3 w-100" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/products/pr-14.jpg' : imageUrl" alt="" class="img-fluid w-100">
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
                        <div class="col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-04.jpg' }" class="topbar-product-card pb-3 w-100">
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
                        <!-- third row -->
                        <div class="col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-06.jpg' }" class="topbar-product-card pb-3 w-100">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-danger text-white rounded-circle"> -25% </span>
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
                        <div class="col-6 ">
                            <div x-data="{ imageUrl: '/build/images/home-fashion-simple/pr-01.jpg', isHovered: false }" class="topbar-product-card pb-3 w-100" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/home-fashion-simple/pr-02.jpg' : imageUrl" alt="" class="img-fluid w-100 w-100 h-100" style="height: 350px;">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

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
                                    <h6 class="mb-1"> Short Sleeved Hoodie</h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$50.00</span>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div x-data="{ imageUrl: '/build/images/shop/pr-01.jpg' }" class="topbar-product-card pb-3 w-100">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="wishlistadd text-white position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

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
                                    <h6 class="mb-1"><a href="{{ URL::asset('/build/images/shop/pr-01.jpg')}}" class="product-title">Chill
                                            Candle</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$16.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-47.jpg' }" class="topbar-product-card pb-3 w-100">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="wishlistadd text-white position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

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
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Sport
                                            Sneaker</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end tab pane-->
                <div class="tab-pane fade" id="featured" role="tabpanel" aria-labelledby="featured-tab" tabindex="0">
                    <div class="row g-lg-4 g-3">
                        <div class="col-md-4 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-01.jpg', isHovered: false }" class="topbar-product-card pb-3 w-100" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-success text-white rounded-circle text-center"> New
                                    </span>
                                    <img :src="isHovered ? '/build/images/products/pr-02.jpg' : imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

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
                        <div class="col-md-4 col-6 ">
                            <div x-data="{ imageUrl: '/build/images/products/pr-27.jpg', isHovered: false }" class="topbar-product-card pb-3 w-100" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-danger text-white rounded-circle"> -34% </span>
                                    <img :src="isHovered ? '/build/images/products/pr-28.jpg' : imageUrl" alt="" class="img-fluid w-100">
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
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-33.jpg', isHovered: false }" class="topbar-product-card pb-3 w-100" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/products/pr-34.jpg' : imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

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
                        <div class="col-md-4 col-6 ">
                            <div x-data="{ imageUrl: '/build/images/products/pr-18.jpg', isHovered: false }" class="topbar-product-card pb-3 w-100" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/products/pr-17.jpg' : imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

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
                                    <h6 class="mb-1"> Cream Women Pants</h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <!-- second row -->
                        <div class="col-md-4 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-11.jpg' }" class="topbar-product-card pb-3 w-100">
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
                                    <p class="product-size mb-0 text-center text-white fw-medium">S, M, L</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">Women Black Pants</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$100.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-33.jpg', isHovered: false }" class="topbar-product-card pb-3 w-100" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/products/pr-34.jpg' : imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

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
                                    <h6 class="mb-1"> Sweatshirt In Geometric Print</h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-15.jpg', isHovered: false }" class="topbar-product-card pb-3 w-100" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/products/pr-14.jpg' : imageUrl" alt="" class="img-fluid w-100">
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
                        <div class="col-md-4 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-04.jpg' }" class="topbar-product-card pb-3 w-100">
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
                        <!-- third row -->
                        <div class="col-md-4 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-06.jpg' }" class="topbar-product-card pb-3 w-100">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-danger text-white rounded-circle"> -25% </span>
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
                        <div class="col-md-4 col-6 ">
                            <div x-data="{ imageUrl: '/build/images/home-fashion-simple/pr-01.jpg', isHovered: false }" class="topbar-product-card pb-3 w-100" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/home-fashion-simple/pr-02.jpg' : imageUrl" alt="" class="img-fluid w-100 h-100" style="height: 350px;">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

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
                                    <h6 class="mb-1"> Short Sleeved Hoodie</h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$50.00</span>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div x-data="{ imageUrl: '/build/images/shop/pr-01.jpg' }" class="topbar-product-card pb-3 w-100">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="wishlistadd text-white position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

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
                                    <h6 class="mb-1"><a href="{{ URL::asset('/build/images/shop/pr-01.jpg')}}" class="product-title">Chill
                                            Candle</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$16.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-47.jpg' }" class="topbar-product-card pb-3 w-100">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="wishlistadd text-white position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

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
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Sport
                                            Sneaker</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="sale" role="tabpanel" aria-labelledby="sale-tab" tabindex="0">
                    <div class="row g-lg-4 g-3">
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-01.jpg', isHovered: false }" class="topbar-product-card pb-3 w-100" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-success text-white rounded-circle text-center"> New
                                    </span>
                                    <img :src="isHovered ? '/build/images/products/pr-02.jpg' : imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

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
                        <div class="col-md-3 col-6 ">
                            <div x-data="{ imageUrl: '/build/images/products/pr-27.jpg', isHovered: false }" class="topbar-product-card pb-3 w-100" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-danger text-white rounded-circle"> -34% </span>
                                    <img :src="isHovered ? '/build/images/products/pr-28.jpg' : imageUrl" alt="" class="img-fluid w-100">
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
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-33.jpg', isHovered: false }" class="topbar-product-card pb-3 w-100" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/products/pr-34.jpg' : imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

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
                        <div class="col-md-3 col-6 ">
                            <div x-data="{ imageUrl: '/build/images/products/pr-18.jpg', isHovered: false }" class="topbar-product-card pb-3 w-100" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/products/pr-17.jpg' : imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

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
                                    <h6 class="mb-1"> Cream Women Pants</h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <!-- second row -->
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-11.jpg' }" class="topbar-product-card pb-3 w-100">
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
                                    <p class="product-size mb-0 text-center text-white fw-medium">S, M, L</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">Women Black Pants</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$100.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-33.jpg', isHovered: false }" class="topbar-product-card pb-3 w-100" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/products/pr-34.jpg' : imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

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
                                    <h6 class="mb-1"> Sweatshirt In Geometric Print</h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-15.jpg', isHovered: false }" class="topbar-product-card pb-3 w-100" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/products/pr-14.jpg' : imageUrl" alt="" class="img-fluid w-100">
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
                        <div class="col-md-3 col-6 px-lg-12 px-2">
                            <div x-data="{ imageUrl: '/build/images/products/pr-04.jpg' }" class="topbar-product-card pb-3 w-100">
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
                        <!-- third row -->
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-06.jpg' }" class="topbar-product-card pb-3 w-100">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-danger text-white rounded-circle"> -25% </span>
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
                        <div class="col-md-3 col-6 ">
                            <div x-data="{ imageUrl: '/build/images/home-fashion-simple/pr-01.jpg', isHovered: false }" class="topbar-product-card pb-3 w-100" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/home-fashion-simple/pr-02.jpg' : imageUrl" alt="" class="img-fluid w-100 h-100" style="height: 350px;">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

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
                                    <h6 class="mb-1"> Short Sleeved Hoodie</h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$50.00</span>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/shop/pr-01.jpg' }" class="topbar-product-card pb-3 w-100">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="wishlistadd text-white position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

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
                                    <h6 class="mb-1"><a href="{{ URL::asset('/build/images/shop/pr-01.jpg')}}" class="product-title">Chill
                                            Candle</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$16.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-47.jpg' }" class="topbar-product-card pb-3 w-100">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="wishlistadd text-white position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

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
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Sport
                                            Sneaker</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- second row -->
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-11.jpg' }" class="topbar-product-card pb-3 w-100">
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
                                    <p class="product-size mb-0 text-center text-white fw-medium">S, M, L</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">Women Black Pants</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$100.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-33.jpg', isHovered: false }" class="topbar-product-card pb-3 w-100" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/products/pr-34.jpg' : imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

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
                                    <h6 class="mb-1"> Sweatshirt In Geometric Print</h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-15.jpg', isHovered: false }" class="topbar-product-card pb-3 w-100" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/products/pr-14.jpg' : imageUrl" alt="" class="img-fluid w-100">
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
                        <div class="col-md-3 col-6 px-lg-12 px-2">
                            <div x-data="{ imageUrl: '/build/images/products/pr-04.jpg' }" class="topbar-product-card pb-3 w-100">
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
                    </div>
                </div>

            </div>
            <div class="filter-pagination">
                <ul class="pagination py-4 d-flex justify-content-center">
                    <li class="active"><a href="#" class="text-danger">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection