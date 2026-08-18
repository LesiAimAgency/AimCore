<!doctype html>
<html lang="en" x-data :dir="$store.appStore.dir" x-cloak>
<head>
    <meta charset="utf-8" />
    <title>Home Handmade | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="" name="description" />
    <meta content="srbthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/build/images/k_favicon_32x.png')}}">
    @include('partials.head-css')
</head>
<body class="font-futura" x-data="{ showMenuScroll : false }">
@include('partials.header-handmade')
<div>
    <!-- main slide -->
    <section class="kalles-home-section type_slideshow type_carousel kalles-medical kalles-handmade overflow-hidden" dir="ltr">
        <div class="slideshow" data-flickity='{ "fade":0,"cellAlign": "center","imagesLoaded": 0,"lazyLoad": 0,"freeScroll": 0,"wrapAround": true,"autoPlay" : 0,"pauseAutoPlayOnHover" : true, "rightToLeft": false, "prevNextButtons": false,"pageDots": true, "contain" : 1,"adaptiveHeight" : 1,"dragThreshold" : 5,"percentPosition": 1 }' style="height: 100%;">
            <!-- first slide -->
            <div class="slideshow__slide">
                <img src="{{ URL::asset('/build/images/home-hand-made/slide-01.png')}}" alt="" class="position-absolute w-100 h-100 object-fit-cover">
                <div class="container position-relative">
                    <div class="row">
                        <div class="col-10 col-lg-4">
                            <div class="content">
                                <h5 class="fw-medium text-sea fs-18 mb-2">Handcraft Shop</h5>
                                <h1 class="fs-45 lh-base fw-normal mb-4">Inspired by Your Sweetest Dreams</h1>
                                <a class="btn btn-dark rounded-pill min-w-150 min-h-45 d-inline-flex align-items-center justify-content-center fw-semibold px-4" href="{{ url('shop_pages/shop')}}">Explore Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end first slide -->

            <!-- second slide -->
            <div class="slideshow__slide">
                <img src="{{ URL::asset('/build/images/home-hand-made/slide-02.jpg')}}" alt="" class="position-absolute w-100 h-100 object-fit-cover">
                <div class="container position-relative">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="content">
                                <h5 class="fw-medium text-sea fs-18 mb-2">Spring Sale</h5>
                                <h1 class="fs-45 lh-base fw-normal mb-4">Daily Recipes for Your Health</h1>
                                <a class="btn btn-dark rounded-pill min-w-150 min-h-45 d-inline-flex align-items-center justify-content-center fw-semibold px-4" href="{{ url('shop_pages/shop')}}">Discovery</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end second slide -->

            <div class="slideshow__slide">
                <img src="{{ URL::asset('/build/images/home-hand-made/slide-03.jpg')}}" alt="" class="position-absolute w-100 h-100 object-fit-cover">
                <div class="container position-relative">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="content">
                                <h5 class="fw-medium text-sea fs-18 mb-2">Handmade Store</h5>
                                <h1 class="fs-45 lh-base fw-normal mb-4">Decorative Box for New Aspiration</h1>
                                <a class="btn btn-dark rounded-pill min-w-150 min-h-45 d-inline-flex align-items-center justify-content-center fw-semibold px-4" href="{{ url('shop_pages/shop')}}">Explore Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end main slide -->

    <section class="cat-section pb-0">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <a href="{{ url('shop_pages/shop')}}" class="d-block position-relative cat_grid_item overflow-hidden h-250">
                        <div class="h-100 w-100 cat-grid-img" style="background-image: url('{{ asset('/build/images/home-hand-made/grid-banner-01.png')}}"></div>
                        <div class="position-absolute start-0 bottom-0 end-0 top-0 end-0 d-flex align-items-center text-body m-4 p-2">
                            <div>
                                <h4 class="text-body font-avenir">Kalles is an online shop for handicrafts.</h4>
                                <p class="text-muted mb-0">Crafting beautiful stuff with our own hands and the help from
                                    useful tools is a wonderful process.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ url('shop_pages/shop')}}" class="d-block position-relative cat_grid_item overflow-hidden h-250">
                        <div class="h-100 w-100 cat-grid-img" style="background-image: url('/build/images/home-hand-made/grid-banner-02.jpg');background-size: cover;">
                        </div>
                        <div class="position-absolute start-0 bottom-0 end-0 top-0 end-0 d-flex align-items-center text-muted text-center justify-content-center m-4 p-2">
                            <div>
                                <p>Spring sale</p>
                                <h4 class="fw-medium fs-24 my-4">Sale up to 10% all</h4>
                                <p class="text-muted mb-0">SHOP NOW</p>
                            </div>
                        </div>
                    </a>
                </div><!--end col-->
                <div class="col-md-3">
                    <a href="{{ url('shop_pages/shop')}}" class="d-block position-relative cat_grid_item overflow-hidden h-250">
                        <div class="h-100 w-100 cat-grid-img" style="background-image: url('/build/images/home-hand-made/grid-banner-03.jpg');background-size: cover;">
                        </div>
                        <div class="position-absolute start-0 bottom-0 end-0 top-0 end-0 d-flex align-items-end text-muted mx-4 py-3">
                            <div>
                                <h4 class="fw-medium fs-25 my-0">Home Decor</h4>
                            </div>
                        </div>
                    </a>
                </div><!--end col-->
                <div class="col-md-3">
                    <a href="{{ url('shop_pages/shop')}}" class="d-block position-relative cat_grid_item overflow-hidden h-250">
                        <div class="h-100 w-100 cat-grid-img" style="background-image: url('/build/images/home-hand-made/grid-banner-04.jpg');background-size: cover;">
                        </div>
                        <div class="position-absolute start-0 bottom-0 end-0 top-0 end-0 d-flex align-items-end text-muted m-4">
                            <div>
                                <h4 class="fw-medium fs-25 mb-2">Gift ideas</h4>
                                <h4 class="fw-normal fs-16 mb-0">16 items</h4>
                            </div>
                        </div>
                    </a>
                </div><!--end col-->
                <div class="col-md-6">
                    <a href="{{ url('shop_pages/shop')}}" class="d-block position-relative cat_grid_item overflow-hidden h-250">
                        <div class="h-100 w-100 cat-grid-img" style="background-image: url('{{ asset('/build/images/home-hand-made/grid-banner-05.jpg')}}"></div>
                        <div class="position-absolute start-0 bottom-0 end-0 top-0 end-0 d-flex align-items-end text-muted m-4">
                            <div>
                                <h4 class="fw-medium fs-25 mb-2">Toys</h4>
                                <h4 class="fw-normal fs-16 mb-0">6 items</h4>
                            </div>
                        </div>
                    </a>
                </div><!--end col-->
                <div class="col-md-3">
                    <a href="{{ url('shop_pages/shop')}}" class="d-block position-relative cat_grid_item overflow-hidden h-250">
                        <div class="h-100 w-100 cat-grid-img" style="background-image: url('/build/images/home-hand-made/grid-banner-06.jpg');background-size: cover; background-position: center;">
                        </div>
                        <div class="position-absolute start-0 bottom-0 end-0 top-0 end-0 d-flex align-items-center text-muted text-center justify-content-center m-4 p-2">
                            <div>
                                <i class="fs-50 text-sea lab la-instagram text-opacity-50"></i>
                                <p class="mt-2">Follow us on Instagram</p>
                                <h4 class="fw-medium fs-24 mb-0">@kalles_store</h4>
                            </div>
                        </div>
                    </a>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </section><!--end section-->

    <section class="type_tab_collection kalles-glasses-tab-product pb-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center mb-4">
                        <div class="mb-2">
                            <h3 class="section-title position-relative fw-semibold font-avenir">
                                <span>Our Featured Products</span>
                            </h3>
                        </div>
                        <span class="fs-14 text-muted">Don't miss any featured product by categories.</span>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="mb-4 pb-2">
                <ul class="nav tab_header gap-md-4 justify-content-center mt-4 mb-0" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill active" id="gift-ideas-tab" data-bs-toggle="pill" data-bs-target="#gift-ideas" type="button" role="tab" aria-controls="gift-ideas" aria-selected="true">Gift ideas</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill" id="kids_babies-tab" data-bs-toggle="pill" data-bs-target="#kids_babies" type="button" role="tab" aria-controls="kids_babies" aria-selected="false" tabindex="-1">Kids &_Babies</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill" id="kniting_sewing-tab" data-bs-toggle="pill" data-bs-target="#kniting_sewing" type="button" role="tab" aria-controls="kniting_sewing" aria-selected="false" tabindex="-1">Kniting & Sewing</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill" id="toys-tab" data-bs-toggle="pill" data-bs-target="#toys" type="button" role="tab" aria-controls="toys" aria-selected="false" tabindex="-1">Toys</button>
                    </li>
                </ul>
            </div>
            <div class="tab-content mt-4" id="pills-tabContent">
                <div class="tab-pane fade show active" id="gift-ideas" role="tabpanel" aria-labelledby="gift-ideas-tab" tabindex="0">
                    <div class="row g-md-4 row-cols-2 row-cols-md-3 row-cols-lg-5 justify-content-center">
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-01.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-01.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Pendant Key Ornaments</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-02.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-03.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Abstract Folded Pots</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$52.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-04.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-05.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Adhesive Tape Dispenser</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$15.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-06.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <span class="new-label bg-danger text-white rounded-circle"> -20% </span>
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-06.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Antique Sewing Scissors</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <del>$15.00</del>
                                        <span class="text-danger">$12.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-08.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-05.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Bouncer Measuring Cup</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$350.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-09.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-09.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Digital Camera System</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$350.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-10.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-11.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">LCD Writing Tablet</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$250.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-one-product-store/pr-09.png', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-one-product-store/pr-10.png' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Motorized Tricycle</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-12.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-13.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Modern Camera</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$380.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-14.png', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-14.png' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Minimalist Ceramic Pot</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$120.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
                <div class="tab-pane fade" id="kids_babies" role="tabpanel" aria-labelledby="kids_babies-tab" tabindex="0">
                    <div class="row g-md-4 row-cols-2 row-cols-md-3 row-cols-lg-5 justify-content-center">
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-01.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-01.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Pendant Key Ornaments</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-09.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-09.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Digital Camera System</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$350.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-04.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-05.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Adhesive Tape Dispenser</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$15.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-one-product-store/pr-09.png', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-one-product-store/pr-10.png' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Motorized Tricycle</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-14.png', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-14.png' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Minimalist Ceramic Pot</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$120.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-02.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-03.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Abstract Folded Pots</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$52.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-06.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <span class="new-label bg-danger text-white rounded-circle"> -20% </span>
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-06.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Antique Sewing Scissors</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <del>$15.00</del>
                                        <span class="text-danger">$12.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-08.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-05.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Bouncer Measuring Cup</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$350.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-10.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-11.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">LCD Writing Tablet</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$250.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-12.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-13.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Modern Camera</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$380.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
                <div class="tab-pane fade" id="kniting_sewing" role="tabpanel" aria-labelledby="kniting_sewing-tab" tabindex="0">
                    <div class="row g-md-4 row-cols-2 row-cols-md-3 row-cols-lg-5 justify-content-center">
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-01.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-01.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Pendant Key Ornaments</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-02.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-03.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Abstract Folded Pots</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$52.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-04.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-05.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Adhesive Tape Dispenser</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$15.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-06.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <span class="new-label bg-danger text-white rounded-circle"> -20% </span>
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-06.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Antique Sewing Scissors</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <del>$15.00</del>
                                        <span class="text-danger">$12.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-08.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-05.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Bouncer Measuring Cup</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$350.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-09.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-09.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Digital Camera System</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$350.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-10.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-11.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">LCD Writing Tablet</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$250.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-one-product-store/pr-09.png', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-one-product-store/pr-10.png' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Motorized Tricycle</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-12.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-13.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Modern Camera</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$380.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-14.png', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-14.png' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Minimalist Ceramic Pot</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$120.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
                <div class="tab-pane fade" id="toys" role="tabpanel" aria-labelledby="toys-tab" tabindex="0">
                    <div class="row g-md-4 row-cols-2 row-cols-md-3 row-cols-lg-5 justify-content-center">
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-one-product-store/pr-09.png', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-one-product-store/pr-10.png' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Motorized Tricycle</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-09.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-09.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Digital Camera System</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$350.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-14.png', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-14.png' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Minimalist Ceramic Pot</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$120.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-02.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-03.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Abstract Folded Pots</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$52.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-12.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-13.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Modern Camera</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$380.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-01.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-01.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Pendant Key Ornaments</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$35.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-04.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-05.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Adhesive Tape Dispenser</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$15.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-06.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <span class="new-label bg-danger text-white rounded-circle"> -20% </span>
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-06.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Antique Sewing Scissors</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <del>$15.00</del>
                                        <span class="text-danger">$12.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-08.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-05.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">Bouncer Measuring Cup</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$350.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col">
                            <div x-data="{ imageUrl: '/build/images/home-hand-made/pr-10.jpg', isHovered: false }" class="topbar-product-card overlay-hover" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden main">
                                    <img :src="isHovered ? '/build/images/home-hand-made/pr-11.jpg' : imageUrl" alt="" class="img-fluid">
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
                                    <h6 class="mb-1 fs-16 fw-medium font-avenir"><a href="{{ url('product/product-detail-layout-01')}}" class="text-reset">LCD Writing Tablet</a></h6>
                                    <p class="mb-0 fs-15 text-muted">
                                        <span>$250.00</span>
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
            </div>
        </div>
    </section>

    <section class="kalles-handmade-banner mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="font-avenir">Deal of the day</h1>
                    <p class="text-muted mb-3">Years of experience brought about by our skilled craftsmen could ensure
                        that every piece produced is a work of art. Our focus is always the best quality possible.</p>
                    <a class="btn btn-dark rounded-pill min-w-150 min-h-45 d-inline-flex align-items-center justify-content-center fw-semibold px-4" href="{{ url('shop_pages/shop')}}">Shop Now</a>
                </div>
            </div>
        </div>
    </section>

    <section class="type_tab_collection kalles-glasses-tab-product pb-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center mb-4 pb-2">
                        <div class="mb-2">
                            <h3 class="section-title position-relative flex fw-semibold font-avenir">
                                <span>Shop by Categories</span>
                            </h3>
                        </div>
                        <span class="fs-14 text-muted">Making & crafting</span>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-4">
                <div class="col">
                    <div class="position-relative">
                        <a href="#!"><img src="{{ URL::asset('/build/images/home-hand-made/cat-circular-01.png')}}" alt="" class="img-fluid rounded-circle"></a>
                        <div class="mt-3 text-center">
                            <h5 class="fw-medium">Hospital Equipment</h5>
                            <p class="text-muted">7 products</p>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col">
                    <div class="position-relative">
                        <a href="#!"><img src="{{ URL::asset('/build/images/home-hand-made/cat-circular-02.png')}}" alt="" class="img-fluid rounded-circle"></a>
                        <div class="mt-3 text-center">
                            <h5 class="fw-medium">Blood Pressure</h5>
                            <p class="text-muted">15 products</p>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col">
                    <div class="position-relative">
                        <a href="#!"><img src="{{ URL::asset('/build/images/home-hand-made/cat-circular-03.png')}}" alt="" class="img-fluid rounded-circle"></a>
                        <div class="mt-3 text-center">
                            <h5 class="fw-medium">Accessories</h5>
                            <p class="text-muted">12 products</p>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col">
                    <div class="position-relative">
                        <a href="#!"><img src="{{ URL::asset('/build/images/home-hand-made/cat-circular-04.png')}}" alt="" class="img-fluid rounded-circle"></a>
                        <div class="mt-3 text-center">
                            <h5 class="fw-medium">Personal</h5>
                            <p class="text-muted">18 products</p>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col">
                    <div class="position-relative">
                        <a href="#!"><img src="{{ URL::asset('/build/images/home-hand-made/cat-circular-05.png')}}" alt="" class="img-fluid rounded-circle"></a>
                        <div class="mt-3 text-center">
                            <h5 class="fw-medium">Imdependent Living</h5>
                            <p class="text-muted">8 products</p>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </section><!--end section-->

    <section class="pt-5">
        <div class="container">
            <div class="bg-light px-4 py-5">
                <div class="row">
                    <div class="col-lg-4">
                        <h1 class="font-marcellus fw-medium fs-45 lh-base">The difference when you shop Kalles!</h1>
                    </div><!--end col-->
                    <div class="col-lg-4 my-4 mb-lg-0">
                        <div class="mb-4">
                            <h3 class="font-avenir fw-semibold fs-22">Superb Quality</h3>
                            <p class="fs-16 mb-0">We make commitments that the quality of our products will and always
                                will be superb.</p>
                        </div>
                        <div>
                            <h3 class="font-avenir fw-semibold fs-22">Free Returns</h3>
                            <p class="fs-16 mb-0">We accept returns for freshly purchased products within 7 days from
                                the payment.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-4 pb-2">
                            <h3 class="font-avenir fw-semibold fs-22">Free Wrapping</h3>
                            <p class="fs-16 mb-0">Upon request, items bought as gifts from our store can receive free
                                wrapping service. </p>
                        </div>
                        <div>
                            <h3 class="font-avenir fw-semibold fs-22">Free Shipping</h3>
                            <p class="fs-16 mb-0">Once receiving your order, we will turn your products around in 3- 5
                                business days.</p>
                        </div>
                    </div>
                </div><!--end row-->
            </div>
        </div>
    </section>

    <section class="kalles-section_type_featured_blog latest-blogs kalles-decor-02-blog-post">
        <div class="container">
            <div class="row justify-content-center">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="text-center">
                            <div class="mb-2">
                                <h3 class="section-title position-relative flex fw-semibold font-avenir">
                                    <span>Blog Posts</span>
                                </h3>
                            </div>
                            <span class="fs-14 text-muted">Don't miss any news from us</span>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row g-4 blog-arrow kalles-blog-grid" data-flickity='{"imagesLoaded": 0, "adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold": 5, "cellAlign": "left", "wrapAround": true, "prevNextButtons": true, "percentPosition": 1, "pageDots": false, "autoPlay": 0, "pauseAutoPlayOnHover": true }' dir="ltr">
                    <div class="col-md-6 col-lg-3 px-2 px-lg-3  slideshow__slide">
                        <div class="blog-card">
                            <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                                <img src="{{ URL::asset('/build/images/home-hand-made/blog-01.jpg')}}" alt="" class="blog-img object-fit-cover w-100">
                            </a>
                            <h6 class="fs-17 font-avenir fw-semibold text-body mt-3"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">Tile Tray with Brass
                                    Handles</a></h6>
                            <div class="d-flex gap-1 align-items-center text-muted">
                                On
                                <span class="text-body">May 27, 2024</span>
                            </div>
                            <div class="post-content text-muted mt-3">I got back home I decided to create a couple trays
                                to do some heavy lifting at my new house. We believe we shouldn’...</div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-6 col-lg-3 px-2 px-lg-3  slideshow__slide">
                        <div class="blog-card">
                            <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                                <img src="{{ URL::asset('/build/images/home-hand-made/blog-02.jpg')}}" alt="" class="blog-img object-fit-cover w-100">
                            </a>
                            <h6 class="fs-17 font-avenir fw-semibold text-body mt-3"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">Make a healthy meal</a>
                            </h6>
                            <div class="d-flex gap-1 align-items-center text-muted">
                                On
                                <span class="text-body">May 27, 2024</span>
                            </div>
                            <div class="post-content text-muted mt-3">Whether it’s a special event or a subscription
                                service designed specifically for your home or office needs, we’d lo...</div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-6 col-lg-3 px-2 px-lg-3">
                        <div class="blog-card">
                            <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                                <img src="{{ URL::asset('/build/images/home-hand-made/blog-03.jpg')}}" alt="" class="blog-img object-fit-cover w-100">
                            </a>
                            <h6 class="fs-17 font-avenir fw-semibold text-body mt-3"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">The Bombshell is a
                                    perfect fit on your table</a></h6>
                            <div class="d-flex gap-1 align-items-center text-muted">
                                On
                                <span class="text-body">May 27, 2024</span>
                            </div>
                            <div class="post-content text-muted mt-3">Each bouquet is hand-delivered with a custom
                                notecard, and comes either wrapped in our signature newspaper, tissue...</div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-6 col-lg-3">
                        <div class="blog-card">
                            <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                                <img src="{{ URL::asset('/build/images/home-hand-made/blog-04.jpg')}}" alt="" class="blog-img object-fit-cover w-100">
                            </a>
                            <h6 class="fs-17 font-avenir fw-semibold text-body mt-3"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">Dining Table Chairs
                                    Makeover</a></h6>
                            <div class="d-flex gap-1 align-items-center text-muted">
                                On
                                <span class="text-body">May 27, 2024</span>
                            </div>
                            <div class="post-content text-muted mt-3">The perfect centerpiece is here! Designed in a low
                                sitting glass vase perfect to allow conversation to carry over ...</div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
    </section>
    @include('partials.footer-handmade')
    @include('partials.popup')
</div>
    
    @include('partials.card-model')
    @include('partials.vendor-scripts')
    <script src="{{ URL::asset('build/libs/flickity/flickity.pkgd.min.js')}}"></script>
    <script src="{{ URL::asset('build/js/main.js')}}"></script>
    <script src="{{ URL::asset('build/js/app.js')}}"></script>
</body>
</html>