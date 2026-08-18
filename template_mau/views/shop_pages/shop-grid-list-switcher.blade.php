@extends('layouts.master_shop')
@section('title', 'Home Default | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme ')
@section('content')
<div>

    <!-- main slide -->
    <div style="background-image: url('/build/images/shop/shop-banner.jpg'); background-position: center;" class="position-relative">
        <div class="position-absolute top-0 start-0 right-0 bottom-0 bg-dark w-100 opacity-50"></div>
        <div class=" container">
            <div class="text-white text-center py-5 position-relative">
                <h4 class="fs-20 fw-medium">Boys</h4>
                <p class="fs-14">Shop through our latest selection of Boy’s Clothing and Accessories.</p>
            </div>
        </div>
    </div>
    <!-- end main slide -->

    <!-- filter -->
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
        <div class="p-4 mt-4 filter-box d-none">
            <div class="row m-sm-2 g-4 g-sm-2">
                <div class=" col-sm-6 col-lg-3">
                    <h5 class="mb-1 fw-medium"> By Vendor </h5>
                    <div class="filter-title"></div>
                    <div class="mt-3">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked1" checked>
                            <label class="form-check-label" for="flexCheckChecked1" style="cursor: pointer;">
                                Ck
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked2" checked>
                            <label class="form-check-label" for="flexCheckChecked2" style="cursor: pointer;">
                                H&M
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked3" checked>
                            <label class="form-check-label" for="flexCheckChecked3" style="cursor: pointer;">
                                Kalles
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked4" style="cursor: pointer;">
                            <label class="form-check-label" for="flexCheckChecked4" style="cursor: pointer;">
                                Lavi's
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked5" style="cursor: pointer;">
                            <label class="form-check-label" for="flexCheckChecked5" style="cursor: pointer;">
                                Monki
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked6" style="cursor: pointer;">
                            <label class="form-check-label" for="flexCheckChecked6" style="cursor: pointer;">
                                Nike
                            </label>
                        </div>
                    </div>

                </div>
                <div class=" col-sm-6 col-lg-3">
                    <h5 class="mb-1 fw-medium"> By Size </h5>
                    <div class="filter-title"></div>
                    <div class="mt-3">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked11" checked>
                            <label class="form-check-label" for="flexCheckChecked11" style="cursor: pointer;">
                                S <span class="ms-1 text-muted">(9)</span>
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked21" checked>
                            <label class="form-check-label" for="flexCheckChecked21" style="cursor: pointer;">
                                M <span class="ms-1 text-muted">(12)</span>
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked31" checked>
                            <label class="form-check-label" for="flexCheckChecked31" style="cursor: pointer;">
                                L <span class="ms-1 text-muted">(6)</span>
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked41" style="cursor: pointer;">
                            <label class="form-check-label" for="flexCheckChecked41" style="cursor: pointer;">
                                Xs <span class="ms-1 text-muted">(8)</span>
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked51" style="cursor: pointer;">
                            <label class="form-check-label" for="flexCheckChecked51" style="cursor: pointer;">
                                Xl <span class="ms-1 text-muted">(25)</span>
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked61" style="cursor: pointer;">
                            <label class="form-check-label" for="flexCheckChecked61" style="cursor: pointer;">
                                Xxl <span class="ms-1 text-muted">(16)</span>
                            </label>
                        </div>
                    </div>

                </div>
                <!-- color -->
                <div class=" col-sm-6 col-lg-3">
                    <h5 class="mb-1 fw-medium"> By Vendor </h5>
                    <div class="filter-title"></div>
                    <div class="mt-3 filter-category">
                        <div class="round d-flex align-items-center mb-2">
                            <input class="form-check-input bg-black border-black p-1" type="checkbox" value="" id="colo1">
                            <label class="form-check-label ms-1" style="cursor: pointer;" for="color1">
                                Black
                            </label>
                        </div>
                        <div class="round d-flex align-items-center mb-2">
                            <input class="form-check-input bg-teal border-teal p-1" type="checkbox" value="" id="color2">
                            <label class="form-check-label ms-1" style="cursor: pointer;" for="color2">
                                Cyan
                            </label>
                        </div>
                        <div class="round d-flex align-items-center mb-2">
                            <input class="form-check-input bg-green2 p-1" type="checkbox" value="" id="color3">
                            <label class="form-check-label ms-1" style="cursor: pointer;" for="color3">
                                Green
                            </label>
                        </div>
                        <div class="round d-flex align-items-center mb-2">
                            <input class="form-check-input bg-cid-green border-cid-green p-1" type="checkbox" value="" id="color4">
                            <label class="form-check-label ms-1" style="cursor: pointer;" for="color4">
                                Gray
                            </label>
                        </div>
                        <div class="round d-flex align-items-center mb-2">
                            <input class="form-check-input bg-pink2 border-pink2 p-1" type="checkbox" value="" id="color5">
                            <label class="form-check-label ms-1" style="cursor: pointer;" for="color5">
                                Pink
                            </label>
                        </div>
                        <div class="round d-flex align-items-center mb-2">
                            <input class="form-check-input bg-sea border-sea p-1" type="checkbox" value="" id="color6">
                            <label class="form-check-label ms-1" style="cursor: pointer;" for="color6">
                                Sea
                            </label>
                        </div>
                        <div class="round d-flex align-items-center mb-2">
                            <input class="form-check-input bg-blue-dark border-blue-dark p-1" type="checkbox" value="" id="color7">
                            <label class="form-check-label ms-1" style="cursor: pointer;" for="color7">
                                Blue
                            </label>
                        </div>
                        <div class="round d-flex align-items-center mb-2">
                            <input class="form-check-input bg-red border-red p-1" type="checkbox" value="" id="color8">
                            <label class="form-check-label ms-1" style="cursor: pointer;" for="color8">
                                red
                            </label>
                        </div>
                        <div class="round d-flex align-items-center mb-2">
                            <input class="form-check-input bg-orange p-1 border-orange" type="checkbox" value="" id="color9">
                            <label class="form-check-label ms-1" style="cursor: pointer;" for="color9">
                                Orange
                            </label>
                        </div>
                    </div>
                </div>
                <!-- Category -->
                <div class=" col-sm-6 col-lg-3 ">
                    <h5 class="mb-1 fw-medium"> By Category </h5>
                    <div class="filter-title"></div>
                    <div class="mt-3 filter-category">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="cate">
                            <label class="form-check-label" style="cursor: pointer;" for="cate">
                                Accessories
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="cate2">
                            <label class="form-check-label" style="cursor: pointer;" for=" cate2">
                                Men
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="cate3" checked>
                            <label class="form-check-label" style="cursor: pointer;" for=" cate3">
                                Women
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="cate4">
                            <label class="form-check-label" style="cursor: pointer;" for=" cate4">
                                Shoes
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="cate5">
                            <label class="form-check-label" style="cursor: pointer;" for=" cate5">
                                T-Shirt
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="cate6">
                            <label class="form-check-label" style="cursor: pointer;" for=" cate6">
                                Dress
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="cate7">
                            <label class="form-check-label" style="cursor: pointer;" for=" cate7">
                                Jackets
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="cate8">
                            <label class="form-check-label" style="cursor: pointer;" for=" cate8">
                                Boots
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="cate9">
                            <label class="form-check-label" style="cursor: pointer;" for=" cate9">
                                Jewellery
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="cate10">
                            <label class="form-check-label" style="cursor: pointer;" for=" cate">
                                Tops
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="cate11">
                            <label class="form-check-label" style="cursor:pointer; " for=" cate11">
                                Wallet
                            </label>
                        </div>
                    </div>
                </div>
                <!-- title-->
                <div class=" col-sm-6 col-lg-3">
                    <h5 class="mb-1 fw-medium"> By Title </h5>
                    <div class="filter-title"></div>
                    <form class="form-inline my-2 my-lg-4 filter-search me-3">
                        <input class="form-control fs-12" type="search" placeholder="Search for product title" aria-label="Search">
                        <button class="btn btn-custom-dark  fw-medium min-w-150 mt-3">FILTER</button>
                    </form>
                </div>

                <div class=" col-sm-6 col-lg-3">
                    <h5 class="mb-1 fw-medium"> By Price </h5>
                    <div class="filter-title"></div>
                    <form action="" class="mt-5">
                        <div class="slider">
                            <div class="progress"></div>
                        </div>
                        <div class="range-input">
                            <input type="range" class="range-min" min="32" max="100" value="32" step="1">
                            <input type="range" class="range-max" min="60" max="100" value="60" step="1">
                        </div>
                        <p class="fw-medium text-black fs-14 mt-4"><span class="text-muted fw-normal me-2">Price</span>$32.70
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
            <div class="tab-pane fade " id="best-verti" role="tabpanel" aria-labelledby="best-verti-tab" tabindex="0">
                <div class="row row-cols-1 justify-content-center g-0">
                    <div class="col card rounded-0 mb-0 p-3">
                        <div class="row align-items-center">
                            <div class="col-md-3 col-lg-2">
                                <div x-data="{ imageUrl: '/build/images/home-shoes/pr-04.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden main">
                                        <img :src="isHovered ? '/build/images/home-shoes/pr-13.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                        <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                            <i class="las la-sync"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 col-lg-10">
                                <div class="row">
                                    <div class="col-lg-8 col-xl-9">
                                        <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Adidas Zapatillas Calcetin</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$122.00</span>
                                        </p>
                                        <p class="text-muted">
                                            Orange you glad to be standing fit and healthy on your feet? Whether
                                            skateboarding on the streets or rushing to make it to the front of a music
                                            gig, these...
                                        </p>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl-3 px-4">
                                        <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold"></i></button>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col card rounded-0 mb-0 p-3">
                        <div class="row align-items-center">
                            <div class="col-md-3 col-lg-2">
                                <div x-data="{ imageUrl: '/build/images/home-shoes/pr-03.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden main">
                                        <span class="new-label bg-danger text-white rounded-circle"> -29% </span>
                                        <img :src="isHovered ? '/build/images/home-shoes/pr-04.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                        <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                            <i class="las la-sync"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 col-lg-10">
                                <div class="row">
                                    <div class="col-lg-8 col-xl-9">
                                        <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Gold Foil Chunky Leather Sneakers</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$52.00</span>
                                        </p>
                                        <p class="text-muted">
                                            Orange you glad to be standing fit and healthy on your feet? Whether
                                            skateboarding on the streets or rushing to make it to the front of a music
                                            gig, these...
                                        </p>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl-3 px-4">
                                        <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col card rounded-0 mb-0 p-3">
                        <div class="row align-items-center">
                            <div class="col-md-3 col-lg-2">
                                <div x-data="{ imageUrl: '/build/images/home-shoes/pr-15.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden main">
                                        <img :src="isHovered ? '/build/images/home-shoes/pr-16.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                        <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                            <i class="las la-sync"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 col-lg-10">
                                <div class="row">
                                    <div class="col-lg-8 col-xl-9">
                                        <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Deluxe Brand Donna Super Star Scarpe</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$52.00</span>
                                        </p>
                                        <p class="text-muted">
                                            Orange you glad to be standing fit and healthy on your feet? Whether
                                            skateboarding on the streets or rushing to make it to the front of a music
                                            gig, these...
                                        </p>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl-3 px-4">
                                        <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col card rounded-0 mb-0 p-3">
                        <div class="row align-items-center">
                            <div class="col-md-3 col-lg-2">
                                <div x-data="{ imageUrl: '/build/images/home-shoes/pr-13.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden main">
                                        <img :src="isHovered ? '/build/images/home-shoes/pr-14.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                        <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                            <i class="las la-sync"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 col-lg-10">
                                <div class="row">
                                    <div class="col-lg-8 col-xl-9">
                                        <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Gold Foil Chunky Leather Sneakers</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$500.00</span>
                                        </p>
                                        <p class="text-muted">
                                            Orange you glad to be standing fit and healthy on your feet? Whether
                                            skateboarding on the streets or rushing to make it to the front of a music
                                            gig, these...
                                        </p>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl-3 px-4">
                                        <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col card rounded-0 mb-0 p-3">
                        <div class="row align-items-center">
                            <div class="col-md-3 col-lg-2">
                                <div x-data="{ imageUrl: '/build/images/home-shoes/pr-07.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden main">
                                        <img :src="isHovered ? '/build/images/home-shoes/pr-08.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                        <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                            <i class="las la-sync"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 col-lg-10">
                                <div class="row">
                                    <div class="col-lg-8 col-xl-9">
                                        <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Birkenstock Boston Suede</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$46.00</span>
                                        </p>
                                        <p class="text-muted">
                                            Orange you glad to be standing fit and healthy on your feet? Whether
                                            skateboarding on the streets or rushing to make it to the front of a music
                                            gig, these...
                                        </p>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl-3 px-4">
                                        <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col card rounded-0 mb-0 p-3">
                        <div class="row align-items-center">
                            <div class="col-md-3 col-lg-2">
                                <div x-data="{ imageUrl: '/build/images/home-shoes/pr-09.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden main">
                                        <img :src="isHovered ? '/build/images/home-shoes/pr-08.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                        <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                            <i class="las la-sync"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 col-lg-10">
                                <div class="row">
                                    <div class="col-lg-8 col-xl-9">
                                        <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Adidas Gazelle Yellow Collegiate Gold</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$46.00</span>
                                        </p>
                                        <p class="text-muted">
                                            Orange you glad to be standing fit and healthy on your feet? Whether
                                            skateboarding on the streets or rushing to make it to the front of a music
                                            gig, these...
                                        </p>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl-3 px-4">
                                        <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col card rounded-0 mb-0 p-3">
                        <div class="row align-items-center">
                            <div class="col-md-3 col-lg-2">
                                <div x-data="{ imageUrl: '/build/images/home-shoes/pr-11.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                    <div class="position-relative overflow-hidden main">
                                        <img :src="isHovered ? '/build/images/home-shoes/pr-12.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                        <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                            <i class="las la-sync"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 col-lg-10">
                                <div class="row">
                                    <div class="col-lg-8 col-xl-9">
                                        <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Uomo Verde – Converse Utility Sneakers</a></h6>
                                        <p class="mb-0 fs-14 text-muted">
                                            <span>$188.00</span>
                                        </p>
                                        <p class="text-muted">
                                            Orange you glad to be standing fit and healthy on your feet? Whether
                                            skateboarding on the streets or rushing to make it to the front of a music
                                            gig, these...
                                        </p>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl-3 px-4">
                                        <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                <i class="iccl iccl-cart"></i></button>
                                        </div>
                                        <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                            <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                            <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                <i class="iccl iccl-cart fw-semibold"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end row-->

            <div class="tab-pane fade " id="best-pan1" role="tabpanel" aria-labelledby="best-pan1-tab" tabindex="0">
                <div class="row row-cols-1 justify-content-center g-0">
                    <div class="col card rounded-0 mb-0">
                        <div class="card-body">
                            <div x-data="{ imageUrl: '/build/images/home-shoes/pr-04.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-shoes/pr-13.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                            <div x-data="{ imageUrl: '/build/images/home-shoes/pr-15.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-shoes/pr-15.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-flex flex-column gap-2">
                                        <a href="#!" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick
                                                View</span> <i class="iccl iccl-eye"></i></a>
                                        <a href="#!" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick
                                                Shop</span> <i class="iccl iccl-cart"></i></a>
                                    </div>
                                    <p class="product-size mb-0 text-center text-white fw-medium">40, 41, 42,
                                        43, 44, 45</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Deluxe Brand Donna Super Star Scarpe</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$52.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-shoes/pr-14.jpg'; isHovered = false" class="d-inline-block bg-warning-subtle rounded-circle"></a>
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-shoes/pr-15.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col card rounded-0 mb-0">
                        <div class="card-body">
                            <div x-data="{ imageUrl: '/build/images/home-shoes/pr-13.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-shoes/pr-03.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                    <div class="col card rounded-0 mb-0 border-end">
                        <div class="card-body">
                            <div x-data="{ imageUrl: '/build/images/home-shoes/pr-21.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-shoes/pr-20.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Saint Laurent Classic Embroidered Sneakers</a>
                                    </h6>
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
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                    <div class="col card rounded-0 mb-0 border-end">
                        <div class="card-body">
                            <div x-data="{ imageUrl: '/build/images/home-shoes/pr-05.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-shoes/pr-06.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Uomo Verde – Converse Utility Sneakers</a>
                                    </h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$222.00</del>
                                        <span class="text-danger">$188.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div>
            <!-- second -->
            <div class="tab-pane fade " id="best-seller" role="tabpanel" aria-labelledby="best-seller-tab" tabindex="0">
                <div class="row row-cols-2 justify-content-center g-0">
                    <div class="col card rounded-0 mb-0">
                        <div class="card-body">
                            <div x-data="{ imageUrl: '/build/images/home-shoes/pr-04.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-shoes/pr-13.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                    <div class="col card rounded-0 mb-0  border-end">
                        <div class="card-body">
                            <div x-data="{ imageUrl: '/build/images/home-shoes/pr-03.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <span class="new-label bg-danger text-white rounded-circle"> -29% </span>
                                    <img :src="isHovered ? '/build/images/home-shoes/pr-04.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                            <div x-data="{ imageUrl: '/build/images/home-shoes/pr-15.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-shoes/pr-15.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-flex flex-column gap-2">
                                        <a href="#!" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick
                                                View</span> <i class="iccl iccl-eye"></i></a>
                                        <a href="#!" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick
                                                Shop</span> <i class="iccl iccl-cart"></i></a>
                                    </div>
                                    <p class="product-size mb-0 text-center text-white fw-medium">40, 41, 42,
                                        43, 44, 45</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Deluxe Brand Donna Super Star Scarpe</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$52.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-shoes/pr-14.jpg'; isHovered = false" class="d-inline-block bg-warning-subtle rounded-circle"></a>
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-shoes/pr-15.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col card rounded-0 mb-0  border-end">
                        <div class="card-body">
                            <div x-data="{ imageUrl: '/build/images/home-shoes/pr-13.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-shoes/pr-03.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                    <div class="col card rounded-0 mb-0 border-end">
                        <div class="card-body">
                            <div x-data="{ imageUrl: '/build/images/home-shoes/pr-18.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-shoes/pr-16.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                    <div class="col card rounded-0 mb-0 border-end">
                        <div class="card-body">
                            <div x-data="{ imageUrl: '/build/images/home-shoes/pr-21.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-shoes/pr-20.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Saint Laurent Classic Embroidered Sneakers</a>
                                    </h6>
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
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                    <div class="col card rounded-0 mb-0 border-end">
                        <div class="card-body">
                            <div x-data="{ imageUrl: '/build/images/home-shoes/pr-05.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-shoes/pr-06.jpg' : imageUrl" alt="" class="img-fluid">
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                    <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                    <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                        <i class="las la-sync"></i>
                                    </a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Uomo Verde – Converse Utility Sneakers</a>
                                    </h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$222.00</del>
                                        <span class="text-danger">$188.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div>
            <div class="tab-pane fade " id="featured" role="tabpanel" aria-labelledby="featured-tab" tabindex="0">
                <section class="kalles-shoes-grid-products-section pb-0">
                    <div class="container-fluid px-0">
                        <div class="row row-cols-2 row-cols-md-3 justify-content-center row-cols-lg-3 g-0">
                            <div class="col card rounded-0 mb-0">
                                <div class="card-body">
                                    <div x-data="{ imageUrl: '/build/images/home-shoes/pr-04.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                        <div class="position-relative overflow-hidden main">
                                            <img :src="isHovered ? '/build/images/home-shoes/pr-13.jpg' : imageUrl" alt="" class="img-fluid">
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                            <div class="col card rounded-0 mb-0 border-end">
                                <div class="card-body">
                                    <div x-data="{ imageUrl: '/build/images/home-shoes/pr-15.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                        <div class="position-relative overflow-hidden main">
                                            <img :src="isHovered ? '/build/images/home-shoes/pr-15.jpg' : imageUrl" alt="" class="img-fluid">
                                            <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-flex flex-column gap-2">
                                                <a href="#!" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick
                                                        View</span> <i class="iccl iccl-eye"></i></a>
                                                <a href="#!" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick
                                                        Shop</span> <i class="iccl iccl-cart"></i></a>
                                            </div>
                                            <p class="product-size mb-0 text-center text-white fw-medium">40, 41, 42,
                                                43, 44, 45</p>
                                        </div>
                                        <div class="mt-3">
                                            <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Deluxe Brand Donna Super Star Scarpe</a></h6>
                                            <p class="mb-0 fs-14 text-muted">
                                                <span>$52.00</span>
                                            </p>
                                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-shoes/pr-14.jpg'; isHovered = false" class="d-inline-block bg-warning-subtle rounded-circle"></a>
                                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-shoes/pr-15.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col card rounded-0 mb-0">
                                <div class="card-body">
                                    <div x-data="{ imageUrl: '/build/images/home-shoes/pr-13.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                        <div class="position-relative overflow-hidden main">
                                            <img :src="isHovered ? '/build/images/home-shoes/pr-03.jpg' : imageUrl" alt="" class="img-fluid">
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                            <div class="col card rounded-0 mb-0 border-end">
                                <div class="card-body">
                                    <div x-data="{ imageUrl: '/build/images/home-shoes/pr-18.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                        <div class="position-relative overflow-hidden main">
                                            <img :src="isHovered ? '/build/images/home-shoes/pr-16.jpg' : imageUrl" alt="" class="img-fluid">
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                            <div class="col card rounded-0 mb-0 border-end">
                                <div class="card-body">
                                    <div x-data="{ imageUrl: '/build/images/home-shoes/pr-21.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                        <div class="position-relative overflow-hidden main">
                                            <img :src="isHovered ? '/build/images/home-shoes/pr-20.jpg' : imageUrl" alt="" class="img-fluid">
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                                <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Saint Laurent Classic Embroidered Sneakers</a>
                                            </h6>
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                            <div class="col card rounded-0 mb-0 border-end">
                                <div class="card-body">
                                    <div x-data="{ imageUrl: '/build/images/home-shoes/pr-05.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                        <div class="position-relative overflow-hidden main">
                                            <img :src="isHovered ? '/build/images/home-shoes/pr-06.jpg' : imageUrl" alt="" class="img-fluid">
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                                <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Uomo Verde – Converse Utility Sneakers</a>
                                            </h6>
                                            <p class="mb-0 fs-14 text-muted">
                                                <del>$222.00</del>
                                                <span class="text-danger">$188.00</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </section>
            </div>
            <div class="tab-pane fade show active" id="sale" role="tabpanel" aria-labelledby="sale-tab" tabindex="0">
                <section class="kalles-shoes-grid-products-section pb-0">
                    <div class="container-fluid px-0">
                        <div class="row row-cols-2 row-cols-md-3 justify-content-center row-cols-lg-4 g-0">
                            <div class="col card rounded-0 mb-0">
                                <div class="card-body">
                                    <div x-data="{ imageUrl: '/build/images/home-shoes/pr-04.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                        <div class="position-relative overflow-hidden main">
                                            <img :src="isHovered ? '/build/images/home-shoes/pr-13.jpg' : imageUrl" alt="" class="img-fluid">
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                    <div x-data="{ imageUrl: '/build/images/home-shoes/pr-15.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                        <div class="position-relative overflow-hidden main">
                                            <img :src="isHovered ? '/build/images/home-shoes/pr-15.jpg' : imageUrl" alt="" class="img-fluid">
                                            <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-flex flex-column gap-2">
                                                <a href="#!" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick
                                                        View</span> <i class="iccl iccl-eye"></i></a>
                                                <a href="#!" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick
                                                        Shop</span> <i class="iccl iccl-cart"></i></a>
                                            </div>
                                            <p class="product-size mb-0 text-center text-white fw-medium">40, 41, 42,
                                                43, 44, 45</p>
                                        </div>
                                        <div class="mt-3">
                                            <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Deluxe Brand Donna Super Star Scarpe</a></h6>
                                            <p class="mb-0 fs-14 text-muted">
                                                <span>$52.00</span>
                                            </p>
                                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-shoes/pr-14.jpg'; isHovered = false" class="d-inline-block bg-warning-subtle rounded-circle"></a>
                                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-shoes/pr-15.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col card rounded-0 mb-0 border-end">
                                <div class="card-body">
                                    <div x-data="{ imageUrl: '/build/images/home-shoes/pr-13.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                        <div class="position-relative overflow-hidden main">
                                            <img :src="isHovered ? '/build/images/home-shoes/pr-03.jpg' : imageUrl" alt="" class="img-fluid">
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                            <div class="col card rounded-0 mb-0 border-end">
                                <div class="card-body">
                                    <div x-data="{ imageUrl: '/build/images/home-shoes/pr-20.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                        <div class="position-relative overflow-hidden main">
                                            <img :src="isHovered ? '/build/images/home-shoes/pr-01.jpg' : imageUrl" alt="" class="img-fluid">
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                                <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Saint Laurent Classic Embroidered Sneakers</a>
                                            </h6>
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                            <div class="col card rounded-0 mb-0 border-end">
                                <div class="card-body">
                                    <div x-data="{ imageUrl: '/build/images/home-shoes/pr-05.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                        <div class="position-relative overflow-hidden main">
                                            <img :src="isHovered ? '/build/images/home-shoes/pr-06.jpg' : imageUrl" alt="" class="img-fluid">
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                                <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Uomo Verde – Converse Utility Sneakers</a>
                                            </h6>
                                            <p class="mb-0 fs-14 text-muted">
                                                <del>$222.00</del>
                                                <span class="text-danger">$188.00</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </section>
            </div>
            <div class="tab-pane fade" id="top-sale" role="tabpanel" aria-labelledby="top-sale-tab" tabindex="0">
                <section class="kalles-shoes-grid-products-section pb-0">
                    <div class="container-fluid px-0">
                        <div class="row row-cols-2 row-cols-md-3 justify-content-center row-cols-lg-5 g-0">
                            <div class="col card rounded-0 mb-0">
                                <div class="card-body">
                                    <div x-data="{ imageUrl: '/build/images/home-shoes/pr-04.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                        <div class="position-relative overflow-hidden main">
                                            <img :src="isHovered ? '/build/images/home-shoes/pr-13.jpg' : imageUrl" alt="" class="img-fluid">
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                    <div x-data="{ imageUrl: '/build/images/home-shoes/pr-15.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                        <div class="position-relative overflow-hidden main">
                                            <img :src="isHovered ? '/build/images/home-shoes/pr-15.jpg' : imageUrl" alt="" class="img-fluid">
                                            <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-flex flex-column gap-2">
                                                <a href="#!" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick
                                                        View</span> <i class="iccl iccl-eye"></i></a>
                                                <a href="#!" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick
                                                        Shop</span> <i class="iccl iccl-cart"></i></a>
                                            </div>
                                            <p class="product-size mb-0 text-center text-white fw-medium">40, 41, 42,
                                                43, 44, 45</p>
                                        </div>
                                        <div class="mt-3">
                                            <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Deluxe Brand Donna Super Star Scarpe</a></h6>
                                            <p class="mb-0 fs-14 text-muted">
                                                <span>$52.00</span>
                                            </p>
                                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-shoes/pr-14.jpg'; isHovered = false" class="d-inline-block bg-warning-subtle rounded-circle"></a>
                                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-shoes/pr-15.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col card rounded-0 mb-0">
                                <div class="card-body">
                                    <div x-data="{ imageUrl: '/build/images/home-shoes/pr-13.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                        <div class="position-relative overflow-hidden main">
                                            <img :src="isHovered ? '/build/images/home-shoes/pr-03.jpg' : imageUrl" alt="" class="img-fluid">
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                            <div class="col card rounded-0 mb-0 border-end">
                                <div class="card-body">
                                    <div x-data="{ imageUrl: '/build/images/home-shoes/pr-16.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                        <div class="position-relative overflow-hidden main">
                                            <span class="new-label bg-danger text-white rounded-circle"> -34% </span>
                                            <img :src="isHovered ? '/build/images/home-shoes/pr-17.jpg' : imageUrl" alt="" class="img-fluid">
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                            <div class="col card rounded-0 mb-0 border-end">
                                <div class="card-body">
                                    <div x-data="{ imageUrl: '/build/images/home-shoes/pr-06.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                        <div class="position-relative overflow-hidden main">
                                            <img :src="isHovered ? '/build/images/home-shoes/pr-21.jpg' : imageUrl" alt="" class="img-fluid">
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                                <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Saint Laurent Classic Embroidered Sneakers</a>
                                            </h6>
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                                <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Uomo Verde – Converse Utility Sneakers</a>
                                            </h6>
                                            <p class="mb-0 fs-14 text-muted">
                                                <del>$222.00</del>
                                                <span class="text-danger">$188.00</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </section>
            </div>
            <div class="tab-pane fade" id="top-product" role="tabpanel" aria-labelledby="top-product-tab" tabindex="0">
                <section class="kalles-shoes-grid-products-section pb-0">
                    <div class="container-fluid px-0">
                        <div class="row row-cols-2 row-cols-md-3 justify-content-center row-cols-lg-6 g-0">
                            <div class="col card rounded-0 mb-0">
                                <div class="card-body">
                                    <div x-data="{ imageUrl: '/build/images/home-shoes/pr-04.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                        <div class="position-relative overflow-hidden main">
                                            <img :src="isHovered ? '/build/images/home-shoes/pr-13.jpg' : imageUrl" alt="" class="img-fluid">
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                    <div x-data="{ imageUrl: '/build/images/home-shoes/pr-15.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                        <div class="position-relative overflow-hidden main">
                                            <img :src="isHovered ? '/build/images/home-shoes/pr-15.jpg' : imageUrl" alt="" class="img-fluid">
                                            <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-flex flex-column gap-2">
                                                <a href="#!" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick
                                                        View</span> <i class="iccl iccl-eye"></i></a>
                                                <a href="#!" class="btn rounded-pill bg-dark text-white fs-14"><span>Quick
                                                        Shop</span> <i class="iccl iccl-cart"></i></a>
                                            </div>
                                            <p class="product-size mb-0 text-center text-white fw-medium">40, 41, 42,
                                                43, 44, 45</p>
                                        </div>
                                        <div class="mt-3">
                                            <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Deluxe Brand Donna Super Star Scarpe</a></h6>
                                            <p class="mb-0 fs-14 text-muted">
                                                <span>$52.00</span>
                                            </p>
                                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-shoes/pr-14.jpg'; isHovered = false" class="d-inline-block bg-warning-subtle rounded-circle"></a>
                                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-shoes/pr-15.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col card rounded-0 mb-0">
                                <div class="card-body">
                                    <div x-data="{ imageUrl: '/build/images/home-shoes/pr-13.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                        <div class="position-relative overflow-hidden main">
                                            <img :src="isHovered ? '/build/images/home-shoes/pr-03.jpg' : imageUrl" alt="" class="img-fluid">
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                            <div class="col card rounded-0 mb-0 border-end">
                                <div class="card-body">
                                    <div x-data="{ imageUrl: '/build/images/home-shoes/pr-18.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                        <div class="position-relative overflow-hidden main">
                                            <img :src="isHovered ? '/build/images/home-shoes/pr-16.jpg' : imageUrl" alt="" class="img-fluid">
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                                <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Saint Laurent Classic Embroidered Sneakers</a>
                                            </h6>
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                            <div class="col card rounded-0 mb-0 border-end">
                                <div class="card-body">
                                    <div x-data="{ imageUrl: '/build/images/home-shoes/pr-05.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                        <div class="position-relative overflow-hidden main">
                                            <img :src="isHovered ? '/build/images/home-shoes/pr-06.jpg' : imageUrl" alt="" class="img-fluid">
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
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
                                            <a href="#!" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>
                                            <a href="#!" class="compare_add position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Compare">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <div class="product-button d-none d-lg-flex flex-column gap-2" style="  box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                                    <i class="iccl iccl-cart"></i></button>
                                            </div>
                                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;   box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                                <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <h6 class="mb-1 fw-medium lh-base"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_red">Uomo Verde – Converse Utility Sneakers</a>
                                            </h6>
                                            <p class="mb-0 fs-14 text-muted">
                                                <del>$222.00</del>
                                                <span class="text-danger">$188.00</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </section>
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
@endsection