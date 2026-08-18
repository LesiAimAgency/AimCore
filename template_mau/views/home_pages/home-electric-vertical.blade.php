<!doctype html>
<html lang="en" x-data :dir="$store.appStore.dir" x-cloak>

<head>
    <meta charset="utf-8" />
    <title>Home Electric | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="" name="description" />
    <meta content="srbthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/build/images/k_favicon_32x.png')}}">
    @include('partials.head-css')
</head>

<body class="" x-data="{ showMenuScroll: false }">
    @include('partials.header-electric')
    <div>
        <!-- main section -->
        <section class="position-relative kalles-decor overflow-hidden"
            style="background-image: url('{{ asset('/build/images/home-electronic-vertical/slide-banner.jpg')}}">
            <div class="container-fluid px-0">
                <div class="row">
                    <div class="col-lg-12">
                        <img src="{{ URL::asset('/build/images/home-electronic-vertical/slide-banner.jpg')}}" alt=""
                            class="kalles-decor-img img-fluid w-100">
                        <div class="bg-overlay"></div>
                        <div
                            class="position-absolute top-0 start-0 end-0 bottom-0 text-center py-5 d-flex align-items-center justify-content-center">
                            <div>
                                <h1 class="mx-3 decor-title  mb-4">Decor your home with high-end audio</h1>
                                <a href="{{ url('shop_pages/shop')}}"
                                    class="btn btn-custom stretched-link text-white fw-medium min-w-150 rounded-0 d-inline-flex align-items-center justify-content-center">Shop
                                    Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end main section -->
        <section>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="d-flex">
                            <i class="las la-life-ring text-muted" style="font-size: 40px;"></i>
                            <div class="ms-2">
                                <h6 class="mb-1">SUPPORT 24/7</h6>
                                <p class="text-muted">we support 24 hours a day</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-4 my-md-0">
                        <div class="d-flex">
                            <i class="las la-sync-alt text-muted" style="font-size: 40px;"></i>
                            <div class="ms-2">
                                <h6 class="mb-1">30 DAYS RETURN</h6>
                                <p class="text-muted">you have 30 days to return</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex">
                            <i class="las la-user-circle text-muted " style="font-size: 40px;"></i>
                            <div class="ms-2">
                                <h6 class="mb-1">PAYMENT 100% SECURE</h6>
                                <p class="text-muted">Payment 100% Secure</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="cat-section">
            <div class="container">
                <div class="row g-2 g-lg-4">
                    <div class="col-md-4">
                        <a href="#!" class="d-block position-relative cat_grid_item overflow-hidden mb-4"
                            style="height: 220px;">
                            <div class="h-100 w-100 cat-grid-img"
                                style="background-image: url('{{ asset('/build/images/home-electronic-vertical/cat-audio.jpg')}}">
                            </div>
                            <div class="cat-grid-button text-body">
                                <div class="cat_grid_item__title">Smart Watch</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#!" class="d-block position-relative cat_grid_item overflow-hidden mb-4"
                            style="height: 220px;">
                            <div class="h-100 w-100 cat-grid-img"
                                style="background-image: url('{{ asset('/build/images/home-electronic-vertical/cat-speaker.jpg')}}">
                            </div>
                            <div class="cat-grid-button text-body">
                                <div class="cat_grid_item__title">Macbook</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#!" class="d-block position-relative cat_grid_item overflow-hidden mb-4"
                            style="height: 220px;">
                            <div class="h-100 w-100 cat-grid-img"
                                style="background-image: url('{{ asset('/build/images/home-electronic-vertical/cat-hi-end.jpg')}}">
                            </div>
                            <div class="cat-grid-button text-body">
                                <div class="cat_grid_item__title">Headphone</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="type_tab_collection py-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="text-center">
                            <div class="mb-2">
                                <h3 class="section-title position-relative flex">
                                    <span>BEST SELLER</span>
                                </h3>
                            </div>
                            <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">Top
                                seller
                                in the week</span>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row g-4 row-cols-2 row-cols-md-3 row-cols-lg-4  mt-4">
                    <div class="col">
                        <div x-data="{ imageUrl: '/build/images/home-electronic/pr-01.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true"
                            x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden shadow rounded">
                                <span class="new-label bg-danger text-white rounded-circle text-center"> -29% </span>
                                <img :src="isHovered ? '/build/images/home-electronic/pr-02.jpg' : imageUrl"
                                    alt="" class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-white"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

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
                            <div class="mt-4 text-center">
                                <h6 class="mb-1 text-capitalize fs-14 fw-medium"><a
                                        href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">Ysamsung
                                        Camera</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <del>$35.00</del>
                                    <span class="text-danger">$25.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col">
                        <div x-data="{ imageUrl: '/build/images/home-electronic/pr-03.jpg', isHovered: false }" class="topbar-product-card overlay-hover"
                            x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden shadow rounded main">
                                <img :src="isHovered ? '/build/images/home-electronic/pr-04.jpg' : imageUrl"
                                    alt="" class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-white"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
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
                            <div class="mt-4 text-center">
                                <h6 class="mb-1 text-capitalize fs-14 fw-medium"><a
                                        href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">Beats Solo3
                                        Wireless</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$35.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col">
                        <div x-data="{ imageUrl: '/build/images/home-electronic/pr-05.jpg', isHovered: false }" class="topbar-product-card overlay-hover"
                            x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden shadow rounded main">
                                <img :src="isHovered ? '/build/images/home-electronic/pr-06.jpg' : imageUrl"
                                    alt="" class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-white"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
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
                            <div class="mt-4 text-center">
                                <h6 class="mb-1 text-capitalize fs-14 fw-medium"><a
                                        href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">Lomo Sanremo
                                        Edition</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$35.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col">
                        <div x-data="{ imageUrl: '/build/images/home-electronic/pr-07.jpg', isHovered: false }" class="topbar-product-card overlay-hover"
                            x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden shadow rounded main">
                                <img :src="isHovered ? '/build/images/home-electronic/pr-08.jpg' : imageUrl"
                                    alt="" class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-white"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
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
                            <div class="mt-4 text-center">
                                <h6 class="mb-1 text-capitalize fs-14 fw-medium"><a
                                        href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">Ygoogle
                                        Speaker</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$65.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col">
                        <div x-data="{ imageUrl: '/build/images/home-decor-2/pr-14.jpg', isHovered: false }" class="topbar-product-card overlay-hover"
                            x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden shadow rounded main">
                                <img :src="isHovered ? '/build/images/home-decor-2/pr-15.jpg' : imageUrl" alt=""
                                    class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-white"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
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
                            <div class="mt-4 text-center">
                                <h6 class="mb-1 text-capitalize fs-14 fw-medium"><a
                                        href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">Ybeoplay H9i</a>
                                </h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$55.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col">
                        <div x-data="{ imageUrl: '/build/images/home-decor-2/pr-16.jpg', isHovered: false }" class="topbar-product-card overlay-hover"
                            x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden shadow rounded main">
                                <img :src="isHovered ? '/build/images/home-decor-2/pr-17.jpg' : imageUrl" alt=""
                                    class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-white"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
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
                            <div class="mt-4 text-center">
                                <h6 class="mb-1 text-capitalize fs-14 fw-medium"><a
                                        href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">YApple MacBook</a>
                                </h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$55.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col">
                        <div x-data="{ imageUrl: '/build/images/home-decor-2/pr-20.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true"
                            x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden shadow rounded">
                                <span class="new-label bg-success text-white rounded-circle text-center"> New </span>
                                <img :src="isHovered ? '/build/images/home-decor-2/pr-21.jpg' : imageUrl" alt=""
                                    class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-white"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

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
                            <div class="mt-4 text-center">
                                <h6 class="mb-1 text-capitalize fs-14 fw-medium"><a
                                        href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">Contemporary
                                        design classic</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$25.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col">
                        <div x-data="{ imageUrl: '/build/images/home-decor-2/pr-26.jpg', isHovered: false }" class="topbar-product-card overlay-hover"
                            x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden shadow rounded main">
                                <img :src="isHovered ? '/build/images/home-decor-2/pr-27.jpg' : imageUrl" alt=""
                                    class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-white"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
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
                            <div class="mt-4 text-center">
                                <h6 class="mb-1 text-capitalize fs-14 fw-medium"><a
                                        href="{{ url('product/product-detail-layout-01')}}" class="main_link_teal">Yapple Watch Nike
                                        Series 4</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$49.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="text-center mt-4 pt-2">
                    <a href="#!"
                        class="btn btn-dark btn-lg btn_icon_true min-w-150 px-5 fs-14 py-3 rounded-0">Load More</a>
                </div>
            </div><!--end container-->
        </section><!--end section-->

        <section class="kalles-section_type_featured_blog kalles-decor-02-blog-post">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="text-center mb-4 pb-2">
                            <div class="mb-2">
                                <h3 class="section-title position-relative flex">
                                    <span>LATES FROM BLOG</span>
                                </h3>
                            </div>
                            <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">The
                                freshest
                                and most exciting news</span>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row g-4 blog-arrow"
                    data-flickity='{"imagesLoaded": 0, "adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold": 5, "cellAlign": "left", "wrapAround": true, "prevNextButtons": true, "percentPosition": 1, "pageDots": false, "autoPlay": 0, "pauseAutoPlayOnHover": true }'
                    dir="ltr">
                    <div class="col-sm-6 col-lg-4 px-2">
                        <div class="blog-card">
                            <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                                <img src="{{ URL::asset('/build/images/home-electronic/blog-thumb-01.jpg')}}" alt=""
                                    class="blog-img object-fit-cover w-100">
                            </a>
                            <h6 class="fs-16 mt-3 main_link_mustard lh-base"><a
                                    href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">Dial and Disc
                                    Wireless Chargers home office from Sum</a></h6>
                            <div class="d-flex gap-1 align-items-center text-muted">
                                By
                                <span class="text-body">admin</span>
                                On
                                <span class="text-body">February 21, 2024</span>
                            </div>
                            <div class="post-content text-muted mt-3">Sleek, minimalist wireless charging designs to
                                "complement and blend within the home and office".</div>
                        </div>
                    </div><!--end col-->
                    <div class="col-sm-6 col-lg-4 px-2">
                        <div class="blog-card">
                            <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                                <img src="{{ URL::asset('/build/images/home-electronic/blog-thumb-02.jpg')}}" alt=""
                                    class="blog-img object-fit-cover w-100">
                            </a>
                            <h6 class="fs-16 mt-3 main_link_mustard lh-base"><a
                                    href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">The Headphones Can
                                    Translate 11 Languages Wireless Speaker</a></h6>
                            <div class="d-flex gap-1 align-items-center text-muted">
                                By
                                <span class="text-body">admin</span>
                                On
                                <span class="text-body">February 21, 2024</span>
                            </div>
                            <div class="post-content text-muted mt-3">These 3-in-1 headphones can snap together and
                                turn
                                into a wireless speaker.</div>
                        </div>
                    </div><!--end col-->
                    <div class="col-sm-6 col-lg-4 px-2">
                        <div class="blog-card">
                            <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                                <img src="{{ URL::asset('/build/images/home-electronic/blog-thumb-03.jpg')}}" alt=""
                                    class="blog-img object-fit-cover w-100">
                            </a>
                            <h6 class="fs-16 mt-3 main_link_mustard lh-base"><a
                                    href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">Microsoft’s Top
                                    Secret Surface Headphones Project Revealed</a></h6>
                            <div class="d-flex gap-1 align-items-center text-muted">
                                On
                                <span class="text-body">February 21, 2024</span>
                            </div>
                            <div class="post-content text-muted mt-3">Microsoft unveils the cool grey, minimalist
                                voice-controlled Surface Headphones.</div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section>

        <section class="kalles-electric-newsletter py-5 ">
            <div class="container">
                <div class="row justify-content-center py-4">
                    <div class="col-md-8 col-10 text-center">
                        <div class="mb-2">
                            <h3 class="section-title position-relative flex">
                                <span>SUBSCRIBE OUR NEWSLETTER</span>
                            </h3>
                        </div>
                        <span class="section-subtitle sub-title font-secondary fst-italic fs-16 text-muted ">
                            Sign up for our newsletter to be updated on the latest designs, exclusive offers,
                            inspiration
                            and tips! </span>
                        <form id="contact_form" class="d-block mt-4 pt-2 mx-lg-5">
                            <div class="footer-subscribe position-relative mx-lg-5">
                                <input type="email" name="email" placeholder="Your email address" value=""
                                    class="input-text form-control w-100 rounded-pill py-3" required="required">
                                <button type="submit" class="btn btn-dark position-absolute rounded-pill ">
                                    <span>Subscribe</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        @include('partials.shipping')
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
