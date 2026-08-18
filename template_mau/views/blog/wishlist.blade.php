@extends('layouts.master_product')
@section('title', 'Home Default | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme ')
@section('content')
    <div>

        <div class="d-none d-lg-block navbar navbar-expand-lg py-1 border-top">
            <ul class=" list-unstyled navbar-nav justify-content-center ">
                <li class="nav-item">
                    <a class="nav-link px-3" href="{{ url('shop_pages/shop-full-width-layout') }}">Accessories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="{{ url('shop_pages/shop-1600px-layout') }}">Bottom</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="{{ url('shop_pages/shop-filter-sidebar') }}">Denim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="{{ url('shop_pages/shop-right-sidebar') }}">Dress</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="{{ url('shop_pages/shop-filter-sidebar') }}">Jackets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="{{ url('shop_pages.shop-left-sidebar') }}">Jewellery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="{{ url('shop_pages/shop-filter-sidebar') }}">Men</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="{{ url('shop_pages.shop-left-sidebar') }}">Shoes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="{{ url('shop_pages/shop-filter-sidebar') }}">T-Shirt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="{{ url('shop_pages/shop-right-sidebar') }}">Tops</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 text-teal" href="{{ url('shop_pages/shop-filter-sidebar') }}">Women</a>
                </li>
            </ul>
        </div>
        <!-- main slide -->
        <div style="background-image: url('/build/images/shop/shop-banner.jpg'); background-position: center;"
            class="position-relative">
            <div class="position-absolute top-0 start-0 right-0 bottom-0 bg-dark w-100 opacity-50"></div>
            <div class=" container">
                <div class="text-white text-center py-5 position-relative">
                    <h4 class="fs-20 fw-medium">Women</h4>
                    <p class="fs-14">Shop through our latest selection of Women’s Clothing and Accessories.</p>
                </div>
            </div>
        </div>
        <!-- end main slide -->

        <!-- filter -->
        <div class="container">
            <div class="row mt-5 justify-content-between align-items-center pb-3">
                <ul class="nav tab_header tab_filter gap-2 justify-content-end justify-content-sm-center" id="pills-tab"
                    role="tablist">
                    <li class="nav-item d-sm-none" role="presentation">
                        <button class="nav-link" id="best-pan1-tab" data-bs-toggle="pill" data-bs-target="#best-pan1"
                            type="button" role="tab" aria-controls="best-pan1" aria-selected="true">
                            <div class="filter-option d-flex">
                                <div class="grid1"></div>
                            </div>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="best-seller-tab" data-bs-toggle="pill" data-bs-target="#best-seller"
                            type="button" role="tab" aria-controls="best-seller" aria-selected="true">
                            <div class="filter-option d-flex">
                                <div class="grid1"></div>
                                <div class="grid1"></div>
                            </div>
                        </button>
                    </li>
                    <li class="nav-item d-none d-sm-block" role="presentation">
                        <button class="nav-link " id="featured-tab" data-bs-toggle="pill" data-bs-target="#featured"
                            type="button" role="tab" aria-controls="featured" aria-selected="false">
                            <div class="filter-option d-flex">
                                <div class="grid1"></div>
                                <div class="grid1"></div>
                                <div class="grid1"></div>
                            </div>
                        </button>
                    </li>
                    <li class="nav-item d-none d-md-block" role="presentation">
                        <button class="nav-link active" id="sale-tab" data-bs-toggle="pill" data-bs-target="#sale"
                            type="button" role="tab" aria-controls="sale" aria-selected="false">
                            <div class="filter-option d-flex">
                                <div class="grid1"></div>
                                <div class="grid1"></div>
                                <div class="grid1"></div>
                                <div class="grid1"></div>
                            </div>
                        </button>
                    </li>
                    <li class="nav-item d-none d-lg-block" role="presentation">
                        <button class="nav-link" id="top-sale-tab" data-bs-toggle="pill" data-bs-target="#top-sale"
                            type="button" role="tab" aria-controls="top-sale" aria-selected="false">
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
                        <button class="nav-link" id="top-product-tab" data-bs-toggle="pill"
                            data-bs-target="#top-product" type="button" role="tab" aria-controls="top-product"
                            aria-selected="false">
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
            </div>
            <!-- filter option -->
            <div class="p-4 filter-box d-none">
                <div class="row m-sm-2 g-4 g-sm-2">
                    <div class=" col-sm-6 col-lg-3">
                        <h5 class="mb-1"> By Vendor </h5>
                        <div class="filter-title"></div>
                        <div class="mt-3">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                    checked>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Ck
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                    checked>
                                <label class="form-check-label" for="flexCheckChecked">
                                    H&M
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                    checked>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Kalles
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Lavi's
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Monki
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Nike
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class=" col-sm-6 col-lg-3">
                        <h5 class="mb-1"> By Size </h5>
                        <div class="filter-title"></div>
                        <div class="mt-3">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                    checked>
                                <label class="form-check-label" for="flexCheckChecked">
                                    S <span class="ms-1 text-muted">(9)</span>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    M <span class="ms-1 text-muted">(12)</span>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    L <span class="ms-1 text-muted">(6)</span>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Xs <span class="ms-1 text-muted">(8)</span>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Xl <span class="ms-1 text-muted">(25)</span>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Xxl <span class="ms-1 text-muted">(16)</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- color -->
                    <div class=" col-sm-6 col-lg-3">
                        <h5 class="mb-1"> By Vendor </h5>
                        <div class="filter-title"></div>
                        <div class="mt-3 filter-category">
                            <div class="round d-flex align-items-center mb-2">
                                <input class="form-check-input bg-black p-1" type="checkbox" value=""
                                    id="flexCheckChecked">
                                <label class="form-check-label ms-1" for="flexCheckChecked">
                                    Black
                                </label>
                            </div>
                            <div class="round d-flex align-items-center mb-2">
                                <input class="form-check-input bg-teal p-1" type="checkbox" value=""
                                    id="flexCheckChecked">
                                <label class="form-check-label ms-1" for="flexCheckChecked">
                                    Cyan
                                </label>
                            </div>
                            <div class="round d-flex align-items-center mb-2">
                                <input class="form-check-input bg-green2 p-1" type="checkbox" value=""
                                    id="flexCheckChecked">
                                <label class="form-check-label ms-1" for="flexCheckChecked">
                                    Green
                                </label>
                            </div>
                            <div class="round d-flex align-items-center mb-2">
                                <input class="form-check-input bg-cid-green: p-1" type="checkbox" value=""
                                    id="flexCheckChecked">
                                <label class="form-check-label ms-1" for="flexCheckChecked">
                                    Gray
                                </label>
                            </div>
                            <div class="round d-flex align-items-center mb-2">
                                <input class="form-check-input bg-pink2 p-1" type="checkbox" value=""
                                    id="flexCheckChecked">
                                <label class="form-check-label ms-1" for="flexCheckChecked">
                                    Pink
                                </label>
                            </div>
                            <div class="round d-flex align-items-center mb-2">
                                <input class="form-check-input bg-sea p-1" type="checkbox" value=""
                                    id="flexCheckChecked">
                                <label class="form-check-label ms-1" for="flexCheckChecked">
                                    Sea
                                </label>
                            </div>
                            <div class="round d-flex align-items-center mb-2">
                                <input class="form-check-input bg-blue-dark p-1" type="checkbox" value=""
                                    id="flexCheckChecked">
                                <label class="form-check-label ms-1" for="flexCheckChecked">
                                    Blue
                                </label>
                            </div>
                            <div class="round d-flex align-items-center mb-2">
                                <input class="form-check-input bg-red p-1" type="checkbox" value=""
                                    id="flexCheckChecked">
                                <label class="form-check-label ms-1" for="flexCheckChecked">
                                    red
                                </label>
                            </div>
                            <div class="round d-flex align-items-center mb-2">
                                <input class="form-check-input bg-orange p-1" type="checkbox" value=""
                                    id="flexCheckChecked">
                                <label class="form-check-label ms-1" for="flexCheckChecked">
                                    Orange
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Category -->
                    <div class=" col-sm-6 col-lg-3 ">
                        <h5 class="mb-1"> By Category </h5>
                        <div class="filter-title"></div>
                        <div class="mt-3 filter-category">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Accessories
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Men
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                    checked>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Women
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Shoes
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    T-Shirt
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Dress
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Jackets
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Boots
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Jewellery
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Tops
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Wallet
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- title-->
                    <div class=" col-sm-6 col-lg-3">
                        <h5 class="mb-3"> By Title </h5>
                        <form class="form-inline my-2 my-lg-0 filter-search">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search for product title"
                                aria-label="Search">
                            <button class="btn btn-custom-dark  fw-medium min-w-150 mt-3">FILTER</button>
                        </form>
                    </div>
                    <div class=" col-sm-6 col-lg-3">
                        <h5 class="mb-3"> By Price </h5>
                        <form action="">
                            <div data-role="main" class="ui-content">
                                <input type="range" class="form-range" min="0" max="5" step="0.5"
                                    id="customRange3">
                            </div>
                            <p class="fw-medium text-black fs-14"><span
                                    class="text-muted fw-normal me-2">Price</span>$32.70
                                -
                                $60.19
                            </p>
                            <button class="btn btn-custom-dark  fw-medium min-w-150 ">FILTER</button>
                        </form>
                    </div>
                </div>

            </div>
            <!-- tab -->
            <div class="tab-content my-3 my-md-4" id="pills-tabContent">
                <div class="tab-pane fade" id="best-pan1" role="tabpanel" aria-labelledby="best-pan1-tab"
                    tabindex="0">
                    <div class="row g-lg-4 g-3">
                        <div class="col-12">
                            <div x-data="{ imageUrl: '/build/images/products/pr-01.jpg' }" :class="{ 'w-100': true, 'h-100': true }"
                                class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-success text-white rounded-circle"> New </span>
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <div class="position-absolute top-0 start-0 bg-white rounded-circle">
                                        <i class="facl facl-heart-o"></i> 12343
                                    </div>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Analogue
                                            Resin Strap</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$30.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div x-data="{ imageUrl: '/build/images/megamenu/pr-11.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-danger text-white rounded-circle"> -25% </span>
                                    <img :src="imageUrl" alt="" class="img-fluid w-100"
                                       src="{{ URL::asset('/build/images/products/pr-18.jpg')}}">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">La Bohème Rose Gold</a>
                                    </h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$60.00</del>
                                        <span class="text-danger">$40.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/megamenu/pr-11.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/megamenu/pr-11.jpg'"
                                            class="d-inline-block bg_color_pink rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-35.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-35.jpg'"
                                            class="d-inline-block bg-black rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div x-data="{ imageUrl: '/build/images/megamenu/pr-03.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Ridley
                                            High
                                            Waist</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$36.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div x-data="{ imageUrl: '/build/images/megamenu/pr-03.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Ridley
                                            High
                                            Waist</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$36.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div x-data="{ imageUrl: '/build/images/products/pr-18.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Cream
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
                            <div x-data="{ imageUrl: '/build/images/products/pr-11.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Women
                                            Black
                                            Pants</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$100.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div x-data="{ imageUrl: '/build/images/products/pr-33.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100"
                                       src="{{ URL::asset('/build/images/products/pr-33.jpg')}}">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">La Bohème Rose Gold</a>
                                    </h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$60.00</del>
                                        <span class="text-danger">$40.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-33.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-33.jpg'"
                                            class="d-inline-block bg_color_black rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-34.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-34.jpg'"
                                            class="d-inline-block bg-black rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div x-data="{ imageUrl: '/build/images/products/pr-15.jpg' }" class="topbar-product-card pb-3 w-100 h-100">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">Mercury Tee</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$68.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-15.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-15.jpg'"
                                            class="d-inline-block rounded-circle"
                                            style="background: url('/build/images/products/pr-15.jpg');background-size: cover;"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-14.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-14.jpg'"
                                            class="d-inline-block rounded-circle"
                                            style="background: url('/build/images/products/pr-14.jpg');background-size: cover;"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div x-data="{ imageUrl: '/build/images/megamenu/pr-05.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">Blush Beanie</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span class="text-muted">$15.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/megamenu/pr-05.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/megamenu/pr-05.jpg'"
                                            class="d-inline-block bg_color_muted rounded-circle"></a>
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
                        <!-- third row -->
                        <div class="col-12">
                            <div x-data="{ imageUrl: '/build/images/home-classic/pr-11.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-danger text-white rounded-circle"> -25% </span>
                                    <img :src="imageUrl" alt="" class="img-fluid w-100"
                                       src="{{ URL::asset('/build/images/products/pr-18.jpg')}}">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">La Bohème Rose Gold</a>
                                    </h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$60.00</del>
                                        <span class="text-danger">$40.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!"
                                            x-on:mouseover="imageUrl = '/build/images/home-classic/pr-11.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-11.jpg'"
                                            class="d-inline-block bg-green2 rounded-circle"></a>
                                        <a href="#!"
                                            x-on:mouseover="imageUrl = '/build/images/home-classic/pr-09.jpg'"
                                            x-on:click.prevent="imageUrl = ' build/images/home-classic/pr-09.jpg'"
                                            class="d-inline-block bg-sea rounded-circle"></a>
                                        <a href="#!"
                                            x-on:mouseover="imageUrl = '/build/images/home-classic/pr-12.jpg'"
                                            x-on:click.prevent="imageUrl = ' build/images/home-classic/pr-12.jpg'"
                                            class="d-inline-block bg-blue-dark rounded-circle"></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div x-data="{ imageUrl: '/build/images/home-fashion-simple/pr-01.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Short
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
                            <div x-data="{ imageUrl: '/build/images/shop/pr-01.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                </div>
                                <div class="mt-3">
                                    <a href="{{ url('product/product-detail-layout-01') }}" class="product-title">Chill
                                        Candle</a>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$16.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-47.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title w-100 ">Sport
                                            Sneaker</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end tab pane-->
                <div class="tab-pane fade " id="best-seller" role="tabpanel" aria-labelledby="best-seller-tab"
                    tabindex="0">
                    <div class="row g-lg-4 g-3">
                        <div class="col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-01.jpg' }" :class="{ 'w-100': true, 'h-100': true }"
                                class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-success text-white rounded-circle"> New </span>
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Analogue
                                            Resin Strap</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$30.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div x-data="{ imageUrl: '/build/images/megamenu/pr-11.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-danger text-white rounded-circle"> -25% </span>
                                    <img :src="imageUrl" alt="" class="img-fluid w-100"
                                       src="{{ URL::asset('/build/images/products/pr-18.jpg')}}">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">La Bohème Rose Gold</a>
                                    </h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$60.00</del>
                                        <span class="text-danger">$40.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/megamenu/pr-11.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/megamenu/pr-11.jpg'"
                                            class="d-inline-block bg_color_pink rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-35.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-35.jpg'"
                                            class="d-inline-block bg-black rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div x-data="{ imageUrl: '/build/images/megamenu/pr-03.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Ridley
                                            High
                                            Waist</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$36.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-18.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Cream
                                            Women
                                            Pants</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- second row -->
                        <div class="col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-11.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Women
                                            Black
                                            Pants</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$100.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-33.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100"
                                       src="{{ URL::asset('/build/images/products/pr-33.jpg')}}">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">La Bohème Rose Gold</a>
                                    </h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$60.00</del>
                                        <span class="text-danger">$40.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-33.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-33.jpg'"
                                            class="d-inline-block bg_color_black rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-34.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-34.jpg'"
                                            class="d-inline-block bg-black rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-15.jpg' }" class="topbar-product-card pb-3 w-100 h-100">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">Mercury Tee</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$68.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-15.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-15.jpg'"
                                            class="d-inline-block rounded-circle"
                                            style="background: url('/build/images/products/pr-15.jpg');background-size: cover;"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-14.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-14.jpg'"
                                            class="d-inline-block rounded-circle"
                                            style="background: url('/build/images/products/pr-14.jpg');background-size: cover;"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div x-data="{ imageUrl: '/build/images/megamenu/pr-05.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">Blush Beanie</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span class="text-muted">$15.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/megamenu/pr-05.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/megamenu/pr-05.jpg'"
                                            class="d-inline-block bg_color_muted rounded-circle"></a>
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
                        <!-- third row -->
                        <div class="col-6">
                            <div x-data="{ imageUrl: '/build/images/home-classic/pr-11.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-danger text-white rounded-circle"> -25% </span>
                                    <img :src="imageUrl" alt="" class="img-fluid w-100"
                                       src="{{ URL::asset('/build/images/products/pr-18.jpg')}}">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">La Bohème Rose Gold</a>
                                    </h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$60.00</del>
                                        <span class="text-danger">$40.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!"
                                            x-on:mouseover="imageUrl = '/build/images/home-classic/pr-11.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-11.jpg'"
                                            class="d-inline-block bg-green2 rounded-circle"></a>
                                        <a href="#!"
                                            x-on:mouseover="imageUrl = '/build/images/home-classic/pr-09.jpg'"
                                            x-on:click.prevent="imageUrl = ' build/images/home-classic/pr-09.jpg'"
                                            class="d-inline-block bg-sea rounded-circle"></a>
                                        <a href="#!"
                                            x-on:mouseover="imageUrl = '/build/images/home-classic/pr-12.jpg'"
                                            x-on:click.prevent="imageUrl = ' build/images/home-classic/pr-12.jpg'"
                                            class="d-inline-block bg-blue-dark rounded-circle"></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div x-data="{ imageUrl: '/build/images/home-fashion-simple/pr-01.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Short
                                            Sleeved
                                            Hoodie</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del class="text-muted">$45.00</del>
                                        <span class="text-danger">$30.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div x-data="{ imageUrl: '/build/images/shop/pr-01.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                </div>
                                <div class="mt-3">
                                    <a href="{{ url('product/product-detail-layout-01') }}" class="product-title">Chill
                                        Candle</a>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$16.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-47.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title w-100 ">Sport
                                            Sneaker</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end tab pane-->
                <div class="tab-pane fade" id="featured" role="tabpanel" aria-labelledby="featured-tab"
                    tabindex="0">
                    <div class="row g-lg-4 g-3">
                        <div class="col-md-4 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-01.jpg' }" :class="{ 'w-100': true, 'h-100': true }"
                                class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-success text-white rounded-circle"> New </span>
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Analogue
                                            Resin Strap</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$30.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div x-data="{ imageUrl: '/build/images/megamenu/pr-11.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-danger text-white rounded-circle"> -25% </span>
                                    <img :src="imageUrl" alt="" class="img-fluid w-100"
                                       src="{{ URL::asset('/build/images/products/pr-18.jpg')}}">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">La Bohème Rose Gold</a>
                                    </h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$60.00</del>
                                        <span class="text-danger">$40.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/megamenu/pr-11.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/megamenu/pr-11.jpg'"
                                            class="d-inline-block bg_color_pink rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-35.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-35.jpg'"
                                            class="d-inline-block bg-black rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div x-data="{ imageUrl: '/build/images/megamenu/pr-03.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Ridley
                                            High
                                            Waist</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$36.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-18.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Cream
                                            Women
                                            Pants</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- second row -->
                        <div class="col-md-4 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-11.jpg' }" class="topbar-product-card pb-3 w-100 h-100">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Women
                                            Black
                                            Pants</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$100.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-33.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100"
                                       src="{{ URL::asset('/build/images/products/pr-33.jpg')}}">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">La Bohème Rose Gold</a>
                                    </h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$60.00</del>
                                        <span class="text-danger">$40.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-33.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-33.jpg'"
                                            class="d-inline-block bg_color_black rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-34.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-34.jpg'"
                                            class="d-inline-block bg-black rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-15.jpg' }" class="topbar-product-card pb-3 w-100 h-100">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">Mercury Tee</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$68.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-15.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-15.jpg'"
                                            class="d-inline-block rounded-circle"
                                            style="background: url('/build/images/products/pr-15.jpg');background-size: cover;"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-14.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-14.jpg'"
                                            class="d-inline-block rounded-circle"
                                            style="background: url('/build/images/products/pr-14.jpg');background-size: cover;"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div x-data="{ imageUrl: '/build/images/megamenu/pr-05.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">Blush Beanie</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span class="text-muted">$15.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/megamenu/pr-05.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/megamenu/pr-05.jpg'"
                                            class="d-inline-block bg_color_muted rounded-circle"></a>
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
                        <!-- third row -->
                        <div class="col-md-4 col-6">
                            <div x-data="{ imageUrl: '/build/images/home-classic/pr-11.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-danger text-white rounded-circle"> -25% </span>
                                    <img :src="imageUrl" alt="" class="img-fluid w-100"
                                       src="{{ URL::asset('/build/images/products/pr-18.jpg')}}">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">La Bohème Rose Gold</a>
                                    </h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$60.00</del>
                                        <span class="text-danger">$40.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!"
                                            x-on:mouseover="imageUrl = '/build/images/home-classic/pr-11.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-11.jpg'"
                                            class="d-inline-block bg-green2 rounded-circle"></a>
                                        <a href="#!"
                                            x-on:mouseover="imageUrl = '/build/images/home-classic/pr-09.jpg'"
                                            x-on:click.prevent="imageUrl = ' build/images/home-classic/pr-09.jpg'"
                                            class="d-inline-block bg-sea rounded-circle"></a>
                                        <a href="#!"
                                            x-on:mouseover="imageUrl = '/build/images/home-classic/pr-12.jpg'"
                                            x-on:click.prevent="imageUrl = ' build/images/home-classic/pr-12.jpg'"
                                            class="d-inline-block bg-blue-dark rounded-circle"></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div x-data="{ imageUrl: '/build/images/home-fashion-simple/pr-01.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Short
                                            Sleeved
                                            Hoodie</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del class="text-muted">$45.00</del>
                                        <span class="text-danger">$30.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div x-data="{ imageUrl: '/build/images/shop/pr-01.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Chill
                                            Candle</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$16.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-47.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Sport
                                            Sneaker</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="sale" role="tabpanel" aria-labelledby="sale-tab"
                    tabindex="0">
                    <div class="row g-lg-4 g-3">
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-01.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-success text-white rounded-circle"> New </span>
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Analogue
                                            Resin Strap</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$30.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/megamenu/pr-11.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-danger text-white rounded-circle"> -25% </span>
                                    <img :src="imageUrl" alt="" class="img-fluid w-100"
                                       src="{{ URL::asset('/build/images/products/pr-18.jpg')}}">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">La Bohème Rose Gold</a>
                                    </h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$60.00</del>
                                        <span class="text-danger">$40.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/megamenu/pr-11.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/megamenu/pr-11.jpg'"
                                            class="d-inline-block bg_color_pink rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-35.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-35.jpg'"
                                            class="d-inline-block bg-black rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/megamenu/pr-03.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Ridley
                                            High
                                            Waist</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$36.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-18.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Cream
                                            Women
                                            Pants</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- second row -->
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-11.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Women
                                            Black
                                            Pants</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$100.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-33.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100"
                                       src="{{ URL::asset('/build/images/products/pr-33.jpg')}}">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">La Bohème Rose Gold</a>
                                    </h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$60.00</del>
                                        <span class="text-danger">$40.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-33.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-33.jpg'"
                                            class="d-inline-block bg_color_black rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-34.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-34.jpg'"
                                            class="d-inline-block bg-black rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-15.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">Mercury Tee</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$68.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-15.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-15.jpg'"
                                            class="d-inline-block rounded-circle"
                                            style="background: url('/build/images/products/pr-15.jpg');background-size: cover;"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-14.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-14.jpg'"
                                            class="d-inline-block rounded-circle"
                                            style="background: url('/build/images/products/pr-14.jpg');background-size: cover;"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/megamenu/pr-05.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">Blush Beanie</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span class="text-muted">$15.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/megamenu/pr-05.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/megamenu/pr-05.jpg'"
                                            class="d-inline-block bg_color_muted rounded-circle"></a>
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
                        <!-- third row -->
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/home-classic/pr-11.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-danger text-white rounded-circle"> -25% </span>
                                    <img :src="imageUrl" alt="" class="img-fluid w-100"
                                       src="{{ URL::asset('/build/images/products/pr-18.jpg')}}">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">La Bohème Rose Gold</a>
                                    </h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$60.00</del>
                                        <span class="text-danger">$40.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!"
                                            x-on:mouseover="imageUrl = '/build/images/home-classic/pr-11.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-11.jpg'"
                                            class="d-inline-block bg-green2 rounded-circle"></a>
                                        <a href="#!"
                                            x-on:mouseover="imageUrl = '/build/images/home-classic/pr-09.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-09.jpg'"
                                            class="d-inline-block bg-sea rounded-circle"></a>
                                        <a href="#!"
                                            x-on:mouseover="imageUrl = '/build/images/home-classic/pr-12.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-12.jpg'"
                                            class="d-inline-block bg-blue-dark rounded-circle"></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/home-fashion-simple/pr-01.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Short
                                            Sleeved
                                            Hoodie</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del class="text-muted">$45.00</del>
                                        <span class="text-danger">$30.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/shop/pr-01.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Chill
                                            Candle</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$16.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-47.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Sport
                                            Sneaker</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="top-sale" role="tabpanel" aria-labelledby="top-sale-tab"
                    tabindex="0">
                    <div class="row g-3 row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5">
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/products/pr-01.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-success text-white rounded-circle"> New </span>
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Analogue
                                            Resin Strap</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$30.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/megamenu/pr-11.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-danger text-white rounded-circle"> -25% </span>
                                    <img :src="imageUrl" alt="" class="img-fluid w-100"
                                       src="{{ URL::asset('/build/images/products/pr-18.jpg')}}">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">La Bohème Rose Gold</a>
                                    </h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$60.00</del>
                                        <span class="text-danger">$40.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/megamenu/pr-11.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/megamenu/pr-11.jpg'"
                                            class="d-inline-block bg_color_pink rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-35.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-35.jpg'"
                                            class="d-inline-block bg-black rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/megamenu/pr-03.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Ridley
                                            High
                                            Waist</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$36.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/products/pr-18.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Cream
                                            Women
                                            Pants</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- second row -->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/products/pr-11.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Women
                                            Black
                                            Pants</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$100.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/products/pr-33.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100"
                                       src="{{ URL::asset('/build/images/products/pr-33.jpg')}}">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">La Bohème Rose Gold</a>
                                    </h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$60.00</del>
                                        <span class="text-danger">$40.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-33.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-33.jpg'"
                                            class="d-inline-block bg_color_black rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-34.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-34.jpg'"
                                            class="d-inline-block bg-black rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/products/pr-15.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">Mercury Tee</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$68.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-15.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-15.jpg'"
                                            class="d-inline-block rounded-circle"
                                            style="background: url('/build/images/products/pr-15.jpg');background-size: cover;"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-14.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-14.jpg'"
                                            class="d-inline-block rounded-circle"
                                            style="background: url('/build/images/products/pr-14.jpg');background-size: cover;"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/megamenu/pr-05.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">Blush Beanie</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span class="text-muted">$15.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/megamenu/pr-05.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/megamenu/pr-05.jpg'"
                                            class="d-inline-block bg_color_muted rounded-circle"></a>
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
                        <!-- third row -->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-classic/pr-11.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-danger text-white rounded-circle"> -25% </span>
                                    <img :src="imageUrl" alt="" class="img-fluid w-100"
                                       src="{{ URL::asset('/build/images/products/pr-18.jpg')}}">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">La Bohème Rose Gold</a>
                                    </h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$60.00</del>
                                        <span class="text-danger">$40.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!"
                                            x-on:mouseover="imageUrl = '/build/images/home-classic/pr-11.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-11.jpg'"
                                            class="d-inline-block bg-green2 rounded-circle"></a>
                                        <a href="#!"
                                            x-on:mouseover="imageUrl = '/build/images/home-classic/pr-09.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-09.jpg'"
                                            class="d-inline-block bg-sea rounded-circle"></a>
                                        <a href="#!"
                                            x-on:mouseover="imageUrl = '/build/images/home-classic/pr-12.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-12.jpg'"
                                            class="d-inline-block bg-blue-dark rounded-circle"></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-fashion-simple/pr-01.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Short
                                            Sleeved
                                            Hoodie</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del class="text-muted">$45.00</del>
                                        <span class="text-danger">$30.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/shop/pr-01.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Chill
                                            Candle</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$16.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-47.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Sport
                                            Sneaker</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="top-product" role="tabpanel" aria-labelledby="top-product-tab"
                    tabindex="0">
                    <div class="row g-lg-4 g-3">
                        <div class="col-md-3 col-6 col-lg-2">
                            <div x-data="{ imageUrl: '/build/images/products/pr-01.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-success text-white rounded-circle"> New </span>
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Analogue
                                            Resin Strap</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$30.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 col-lg-2">
                            <div x-data="{ imageUrl: '/build/images/megamenu/pr-11.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-danger text-white rounded-circle"> -25% </span>
                                    <img :src="imageUrl" alt="" class="img-fluid w-100"
                                       src="{{ URL::asset('/build/images/products/pr-18.jpg')}}">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">La Bohème Rose Gold</a>
                                    </h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$60.00</del>
                                        <span class="text-danger">$40.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/megamenu/pr-11.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/megamenu/pr-11.jpg'"
                                            class="d-inline-block bg_color_pink rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-35.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-35.jpg'"
                                            class="d-inline-block bg-black rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 col-lg-2">
                            <div x-data="{ imageUrl: '/build/images/megamenu/pr-03.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Ridley
                                            High
                                            Waist</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$36.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 col-lg-2">
                            <div x-data="{ imageUrl: '/build/images/products/pr-18.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Cream
                                            Women
                                            Pants</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- second row -->
                        <div class="col-md-3 col-6 col-lg-2">
                            <div x-data="{ imageUrl: '/build/images/products/pr-11.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Women
                                            Black
                                            Pants</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$100.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 col-lg-2">
                            <div x-data="{ imageUrl: '/build/images/products/pr-33.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100"
                                       src="{{ URL::asset('/build/images/products/pr-33.jpg')}}">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">La Bohème Rose Gold</a>
                                    </h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$60.00</del>
                                        <span class="text-danger">$40.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-33.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-33.jpg'"
                                            class="d-inline-block bg_color_black rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-34.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-34.jpg'"
                                            class="d-inline-block bg-black rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 col-lg-2">
                            <div x-data="{ imageUrl: '/build/images/products/pr-15.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">Mercury Tee</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$68.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-15.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-15.jpg'"
                                            class="d-inline-block rounded-circle"
                                            style="background: url('/build/images/products/pr-15.jpg');background-size: cover;"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-14.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/products/pr-14.jpg'"
                                            class="d-inline-block rounded-circle"
                                            style="background: url('/build/images/products/pr-14.jpg');background-size: cover;"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 col-lg-2">
                            <div x-data="{ imageUrl: '/build/images/megamenu/pr-05.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">Blush Beanie</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span class="text-muted">$15.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/megamenu/pr-05.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/megamenu/pr-05.jpg'"
                                            class="d-inline-block bg_color_muted rounded-circle"></a>
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
                        <!-- third row -->
                        <div class="col-md-3 col-6 col-lg-2">
                            <div x-data="{ imageUrl: '/build/images/home-classic/pr-11.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-danger text-white rounded-circle"> -25% </span>
                                    <img :src="imageUrl" alt="" class="img-fluid w-100"
                                       src="{{ URL::asset('/build/images/products/pr-18.jpg')}}">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">La Bohème Rose Gold</a>
                                    </h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$60.00</del>
                                        <span class="text-danger">$40.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!"
                                            x-on:mouseover="imageUrl = '/build/images/home-classic/pr-11.jpg'"
                                            x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-11.jpg'"
                                            class="d-inline-block bg-green2 rounded-circle"></a>
                                        <a href="#!"
                                            x-on:mouseover="imageUrl = '/build/images/home-classic/pr-09.jpg'"
                                            x-on:click.prevent="imageUrl = ' build/images/home-classic/pr-09.jpg'"
                                            class="d-inline-block bg-sea rounded-circle"></a>
                                        <a href="#!"
                                            x-on:mouseover="imageUrl = '/build/images/home-classic/pr-12.jpg'"
                                            x-on:click.prevent="imageUrl = ' build/images/home-classic/pr-12.jpg'"
                                            class="d-inline-block bg-blue-dark rounded-circle"></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 col-lg-2">
                            <div x-data="{ imageUrl: '/build/images/home-fashion-simple/pr-01.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Short
                                            Sleeved
                                            Hoodie</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del class="text-muted">$45.00</del>
                                        <span class="text-danger">$30.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 col-lg-2">
                            <div x-data="{ imageUrl: '/build/images/shop/pr-01.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Chill
                                            Candle</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$16.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 col-lg-2">
                            <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-47.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <a href="#" class="d-lg-none position-absolute "
                                        style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o text-white"></i></a>
                                    <a href="#"
                                        class="wis_remove_icon fs-18 shadow-sm d-flex align-items-center justify-content-center rounded-circle bg-white position-absolute"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Remove Wishlist"><i class="las la-trash"></i></a>

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
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Sport
                                            Sneaker</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- pagination -->
            <div class="filter-pagination">
                <ul class="pagination py-4 d-flex justify-content-center">
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">Next</a></li>
                </ul>
            </div>
        </div>

        @include('partials.footer')

        @include('partials.popup')

    </div>

    <!-- Modal -->
    <div class="modal fade modal-overl" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content overflow-hidden">
                <div class="modal-body p-0">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="images">
                                <div class="product-images-slider"
                                    data-flickity='{ "fade":true,"cellSelector": ".q-item:not(.is_varhide)","cellAlign": "center","wrapAround": true,"autoPlay": false,"prevNextButtons":true,"adaptiveHeight": true,"imagesLoaded": false, "lazyLoad": 0,"dragThreshold" : 0,"pageDots": true,"rightToLeft": false }'>
                                    <div data-grname="not4" data-grpvl="ntt4" class="q-item" data-mdtype="image">
                                        <img src="{{ URL::asset('/build/images/quick_view/pr-01.jpg') }}"
                                            alt="" class="product-view-img w-100 object-fit-cover">
                                    </div>
                                    <div data-grname="not4" data-grpvl="ntt4" class="q-item" data-mdtype="image">
                                        <img src="{{ URL::asset('/build/images/quick_view/pr-02.jpg') }}"
                                            alt="" class="product-view-img w-100 object-fit-cover">
                                    </div>
                                    <div data-grname="not4" data-grpvl="ntt4" class="q-item" data-mdtype="image">
                                        <img src="{{ URL::asset('/build/images/quick_view/pr-03.jpg') }}"
                                            alt="" class="product-view-img w-100 object-fit-cover">
                                    </div>
                                    <div data-grname="not4" data-grpvl="ntt4" class="q-item" data-mdtype="image">
                                        <img src="{{ URL::asset('/build/images/quick_view/pr-04.jpg') }}"
                                            alt="" class="product-view-img w-100 object-fit-cover">
                                    </div>
                                    <div data-grname="not4" data-grpvl="ntt4" class="q-item" data-mdtype="image">
                                        <img src="{{ URL::asset('/build/images/quick_view/pr-05.jpg') }}"
                                            alt="" class="product-view-img w-100 object-fit-cover">
                                    </div>
                                    <div data-grname="not4" data-grpvl="ntt4" class="q-item" data-mdtype="image">
                                        <img src="{{ URL::asset('/build/images/quick_view/pr-06.jpg') }}"
                                            alt="" class="product-view-img w-100 object-fit-cover">
                                    </div>
                                    <div data-grname="not4" data-grpvl="ntt4" class="q-item" data-mdtype="image">
                                        <img src="{{ URL::asset('/build/images/quick_view/pr-07.jpg') }}"
                                            alt="" class="product-view-img w-100 object-fit-cover">
                                    </div>
                                    <div data-grname="not4" data-grpvl="ntt4" class="q-item" data-mdtype="image">
                                        <img src="{{ URL::asset('/build/images/quick_view/pr-08.jpg') }}"
                                            alt="" class="product-view-img w-100 object-fit-cover">
                                    </div>
                                    <div data-grname="not4" data-grpvl="ntt4" class="q-item" data-mdtype="image">
                                        <img src="{{ URL::asset('/build/images/quick_view/pr-09.jpg') }}"
                                            alt="" class="product-view-img w-100 object-fit-cover">
                                    </div>
                                    <div data-grname="not4" data-grpvl="ntt4" class="q-item" data-mdtype="image">
                                        <img src="{{ URL::asset('/build/images/quick_view/pr-10.jpg') }}"
                                            alt="" class="product-view-img w-100 object-fit-cover">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 h-100 overflow-y-auto">
                            <div class="py-30 ps-4 ps-lg-0 pe-4">
                                <h6 class="fs-20 mb-2"><a href="{{ url('product/product-detail-layout-01') }}"
                                        class="main_link">La Bohème
                                        Rose Gold</a></h6>
                                <div class="d-flex align-items-center gap-3 mb-4">
                                    <p class="mb-0 fs-18 text-muted flex-grow-1">
                                        <del>$60.00</del>
                                        <span class="text-danger">$40.00</span>
                                    </p>
                                    <a href="{{ url('product/product-detail-layout-01') }}"
                                        class="text-body flex-shrink-0">
                                        <div class="kalles-rating-result">
                                            <span class="kalles-rating-result__pipe">
                                                <span class="kalles-rating-result__start"></span>
                                                <span class="kalles-rating-result__start"></span>
                                                <span class="kalles-rating-result__start"></span>
                                                <span class="kalles-rating-result__start active"></span>
                                                <span class="kalles-rating-result__start"></span>
                                            </span>
                                            <span class="kalles-rating-result__number">(12 reviews)</span>
                                        </div>
                                    </a>
                                </div>
                                <p class="text-muted">Go kalles this summer with this vintage navy and white striped
                                    v-neck
                                    t-shirt from the Nike. Perfect for pairing with denim and white kicks for a stylish
                                    kalles vibe.</p>
                                <div x-data="{ color: 'Pink' }">
                                    <h6 class="text-uppercase mb-3">Color: <span x-text="color"></span></h6>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!"
                                            class="d-inline-block bg_color_pink rounded-circle active square-xs"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Pink"
                                            x-on:click.prevent="color = 'Pink'; $event.target.classList.add('active'); $event.target.nextElementSibling.classList.remove('active');"></a>
                                        <a href="#!" class="d-inline-block bg-dark rounded-circle square-xs"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Black"
                                            x-on:click.prevent="color = 'Black'; $event.target.classList.add('active'); $event.target.previousElementSibling.classList.remove('active');"></a>
                                    </div>
                                </div>

                                <div x-data="{ size: 'M' }" class="mt-4 pt-2">
                                    <h6 class="text-uppercase mb-3">Size: <span x-text="size"></span></h6>
                                    <div class="product-color-list size mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!"
                                            class="d-inline-block rounded-circle square-xs d-flex align-items-center justify-content-center"
                                            :class="{ 'active': size === 'XS' }"
                                            x-on:click.prevent="size = 'XS';">XS</a>
                                        <a href="#!"
                                            class="d-inline-block rounded-circle square-xs d-flex align-items-center justify-content-center"
                                            :class="{ 'active': size === 'S' }"
                                            x-on:click.prevent="size = 'S';">S</a>
                                        <a href="#!"
                                            class="d-inline-block rounded-circle square-xs d-flex align-items-center justify-content-center"
                                            :class="{ 'active': size === 'M' }"
                                            x-on:click.prevent="size = 'M';">M</a>
                                    </div>
                                </div>

                                <div class="mt-4 d-flex align-items-center pt-2 gap-2">
                                    <div x-data="{ quantity: 1 }" class="quantity fs-14 position-relative mb-0">
                                        <input x-bind:value="quantity" type="number"
                                            class="input-text text-center" readonly step="1" min="0"
                                            max="9999">
                                        <button type="button" class="minus position-absolute start-0 ps-3"
                                            x-on:click="quantity > 1 ? quantity-- : null">
                                            <i class="facl facl-minus"></i>
                                        </button>
                                        <button type="button" class="plus position-absolute end-0 pe-3"
                                            x-on:click="quantity++">
                                            <i class="facl facl-plus"></i>
                                        </button>
                                    </div>
                                    <button x-data="{ shake: false }" x-init="setInterval(() => {
                                        shake = true;
                                        setTimeout(() => {
                                            shake = false;
                                        }, 2000);
                                    }, 6000);"
                                        :class="{ 'animation-shake': shake }"
                                        class="btn btn-info text-uppercase rounded-pill min-w-150">
                                        Add to Cart
                                    </button>
                                    <a href="#"
                                        class="btn square-40 btn-wishlistadd p-0 fs-16 d-flex align-items-center rounded-pill flex-shrink-0 justify-content-center"><i
                                            class="facl facl-heart-o"></i></a>
                                </div>

                                <div class="mt-3">
                                    <img src="{{ URL::asset('/build/images/trust_img2.png') }}" alt=""
                                        class="img-fluid">
                                </div>
                                <div class="mt-4">
                                    <p class="text-muted mb-1"><span class="text-body">SKU:</span> 4540967714955-1</p>
                                    <p class="text-muted mb-1"><span class="text-body">Categories:</span> <a
                                            href="#!" class="main_link">Accessories</a>, <a href="#!"
                                            class="main_link">All</a>, <a href="#!" class="main_link">Best
                                            seller</a>, <a href="#!" class="main_link">New
                                            Arrival</a>, <a href="#!" class="main_link">Sale</a>, <a
                                            href="#!" class="main_link">Watches</a>, <a href="#!"
                                            class="main_link">Women</a></p>
                                    <p class="text-muted mb-1"><span class="text-body">Tags:</span> <a href="#!"
                                            class="main_link">Color Black</a>, <a href="#!"
                                            class="main_link">Color
                                            Pink</a>, <a href="#!" class="main_link">Price $7-$50</a>, <a
                                            href="#!" class="main_link">Vendor Kalles</a>, <a href="#!"
                                            class="main_link">Watch</a>,
                                        <a href="#!" class="main_link">Women</a>
                                    </p>
                                </div>
                                <div>
                                    <div class="social-share mt-4">
                                        <a href="https://www.facebook.com/">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                                class="at-icon at-icon-facebook">
                                                <g>
                                                    <path
                                                        d="M22 5.16c-.406-.054-1.806-.16-3.43-.16-3.4 0-5.733 1.825-5.733 5.17v2.882H9v3.913h3.837V27h4.604V16.965h3.823l.587-3.913h-4.41v-2.5c0-1.123.347-1.903 2.198-1.903H22V5.16z"
                                                        fill-rule="evenodd"></path>
                                                </g>
                                            </svg>
                                        </a>
                                        <a href="https://twitter.com/">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                                class="at-icon at-icon-twitter">
                                                <g>
                                                    <path
                                                        d="M27.996 10.116c-.81.36-1.68.602-2.592.71a4.526 4.526 0 0 0 1.984-2.496 9.037 9.037 0 0 1-2.866 1.095 4.513 4.513 0 0 0-7.69 4.116 12.81 12.81 0 0 1-9.3-4.715 4.49 4.49 0 0 0-.612 2.27 4.51 4.51 0 0 0 2.008 3.755 4.495 4.495 0 0 1-2.044-.564v.057a4.515 4.515 0 0 0 3.62 4.425 4.52 4.52 0 0 1-2.04.077 4.517 4.517 0 0 0 4.217 3.134 9.055 9.055 0 0 1-5.604 1.93A9.18 9.18 0 0 1 6 23.85a12.773 12.773 0 0 0 6.918 2.027c8.3 0 12.84-6.876 12.84-12.84 0-.195-.005-.39-.014-.583a9.172 9.172 0 0 0 2.252-2.336"
                                                        fill-rule="evenodd"></path>
                                                </g>
                                            </svg>
                                        </a>
                                        <a href="https://www.google.com/gmail/about">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                                class="at-icon at-icon-email kalles-social-media__btn">
                                                <g>
                                                    <g fill-rule="evenodd"></g>
                                                    <path
                                                        d="M27 22.757c0 1.24-.988 2.243-2.19 2.243H7.19C5.98 25 5 23.994 5 22.757V13.67c0-.556.39-.773.855-.496l8.78 5.238c.782.467 1.95.467 2.73 0l8.78-5.238c.472-.28.855-.063.855.495v9.087z">
                                                    </path>
                                                    <path
                                                        d="M27 9.243C27 8.006 26.02 7 24.81 7H7.19C5.988 7 5 8.004 5 9.243v.465c0 .554.385 1.232.857 1.514l9.61 5.733c.267.16.8.16 1.067 0l9.61-5.733c.473-.283.856-.96.856-1.514v-.465z">
                                                    </path>
                                                </g>
                                            </svg>
                                        </a>
                                        <a href="https://www.pinterest.com/">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                                class="at-icon at-icon-pinterest_share">
                                                <g>
                                                    <path
                                                        d="M7 13.252c0 1.81.772 4.45 2.895 5.045.074.014.178.04.252.04.49 0 .772-1.27.772-1.63 0-.428-1.174-1.34-1.174-3.123 0-3.705 3.028-6.33 6.947-6.33 3.37 0 5.863 1.782 5.863 5.058 0 2.446-1.054 7.035-4.468 7.035-1.232 0-2.286-.83-2.286-2.018 0-1.742 1.307-3.43 1.307-5.225 0-1.092-.67-1.977-1.916-1.977-1.692 0-2.732 1.77-2.732 3.165 0 .774.104 1.63.476 2.336-.683 2.736-2.08 6.814-2.08 9.633 0 .87.135 1.728.224 2.6l.134.137.207-.07c2.494-3.178 2.405-3.8 3.533-7.96.61 1.077 2.182 1.658 3.43 1.658 5.254 0 7.614-4.77 7.614-9.067C26 7.987 21.755 5 17.094 5 12.017 5 7 8.15 7 13.252z"
                                                        fill-rule="evenodd"></path>
                                                </g>
                                            </svg>
                                        </a>
                                        <a href="https://www.messenger.com">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                                class="at-icon at-icon-messenger">
                                                <g>
                                                    <path
                                                        d="M16 6C9.925 6 5 10.56 5 16.185c0 3.205 1.6 6.065 4.1 7.932V28l3.745-2.056c1 .277 2.058.426 3.155.426 6.075 0 11-4.56 11-10.185C27 10.56 22.075 6 16 6zm1.093 13.716l-2.8-2.988-5.467 2.988 6.013-6.383 2.868 2.988 5.398-2.987-6.013 6.383z"
                                                        fill-rule="evenodd"></path>
                                                </g>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
