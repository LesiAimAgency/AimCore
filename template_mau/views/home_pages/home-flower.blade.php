<!doctype html>
<html lang="en" x-data :dir="$store.appStore.dir" x-cloak>

<head>
    <meta charset="utf-8" />
    <title>'Home Flower | | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="" name="description" />
    <meta content="srbthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/build/images/k_favicon_32x.png')}}">
     @include('partials.head-css')
</head>

<body class="font-quicksand">

    <!--head banner-->
    <div x-data="{ isOpen: true }" class="navbar-green">
        <div class="t_header fs-13 d-flex align-items-center" x-bind:class="{ 'd-none': !isOpen }">
            <div class="container-fluid">
                <div class="d-flex gap-2">
                    <div class="col text-center text-white">
                        Today deal sale off <strong>70% </strong>. End in
                        <strong class="js_kl__countdown"></strong>. <a href="#!" class="text-white">Hurry Up <i
                                class="las la-arrow-right"></i></a>
                    </div>
                    <div class="col-auto mt-2 mt-md-0">
                        <a href="#" class="h_banner_close text-white"
                            x-on:click.prevent="isOpen = false">close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--end head banner-->




    @include('partials.header-flower', ['class-name' => 'navbar-green'])


    <div>
        <!-- main slide -->
        <div class="kalles-home-section type_slideshow type_carousel kalles-flower">
            <div class="slideshow"
                data-flickity='{ "fade":0,"cellAlign": "center","imagesLoaded": 0,"lazyLoad": 0,"freeScroll": 0,"wrapAround": true,"autoPlay" : 0,"pauseAutoPlayOnHover" : true, "rightToLeft": false, "prevNextButtons": false,"pageDots": true, "contain" : 1,"adaptiveHeight" : 1,"dragThreshold" : 5,"percentPosition": 1 }'>
                <!-- first slide -->
                <div class="slideshow__slide">
                    <img src="{{ URL::asset('/build/images/home-flower/slide-01.jpg')}}" alt=""
                        class="position-absolute w-100 h-100 object-fit-cover">
                    <div class="container position-relative">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="content">
                                    <h5 class="text-green2 fs-18 fw-medium">Honor your moment!</h5>
                                    <h1 class="fs-55 fw-semibold text-pink2 mb-3">Flower Shop & Florist</h1>
                                    <p class="fs-16 text-muted me-xl-5">Floral Hair Few things like flowers in your hair
                                        to make you feel like a goddess during quarantine.</p>
                                    <a href="{{ url('shop_pages/shop')}}">
                                        <div
                                            class="btn btn-success bg-green2 border-0 text-white rounded-pill min-w-150 min-h-45 d-inline-flex align-items-center justify-content-center fw-semibold">
                                            Explore Now</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end first slide -->

                <!-- second slide -->
                <div class="slideshow__slide">
                    <img src="{{ URL::asset('/build/images/home-flower/slide-02.png')}}" alt=""
                        class="position-absolute w-100 h-100">
                    <div class="container position-relative">
                        <div class="row justify-content-end">
                            <div class="col-lg-6">
                                <div class="content text-end">
                                    <h5 class="text-green2 fs-18 fw-medium">Wedding Decor</h5>
                                    <h1 class="fs-55 fw-semibold text-pink2 mb-3">Floral Arrangment</h1>
                                    <p class="fs-16 text-muted ms-xl-5">When presented with this event, we're given the
                                        creative freedom with flower selection and color palette.</p>
                                    <a href="{{ url('shop_pages/shop')}}">
                                        <div
                                            class="btn btn-success bg-green2 border-0 text-white rounded-pill min-w-150 min-h-45 d-inline-flex align-items-center justify-content-center fw-semibold">
                                            Discovery</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end second slide -->

                <!-- third slide -->
                <div class="slideshow__slide">
                    <img src="{{ URL::asset('/build/images/home-flower/slide-03.jpg')}}" alt=""
                        class="position-absolute w-100 h-100 object-fit-cover">
                    <div class="container position-relative">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="content">
                                    <h5 class="text-green2 fs-18 fw-medium">Flashback Friday</h5>
                                    <h1 class="fs-55 fw-semibold text-pink2 mb-3">Daydream Bouquet</h1>
                                    <p class="fs-16 text-muted me-xl-5">The bridal bouquet featured three types of
                                        Protea and two types of roses. Come by and say Hi!</p>
                                    <a href="{{ url('shop_pages/shop')}}">
                                        <div
                                            class="btn btn-success bg-green2 border-0 text-white rounded-pill min-w-150 min-h-45 d-inline-flex align-items-center justify-content-center fw-semibold">
                                            Explore Now</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end third slide -->
            </div>
        </div>
        <!-- end main slide -->

        <section class="kalles-flower-type-section cat-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center">
                            <img src="{{ URL::asset('/build/images/home-flower/who-we-are.png')}}" alt=""
                                class="img-fluid d-block mx-auto">
                            <p class="text-muted mt-2">Kalles landscape is a full service design studio based in Studio
                                City (California) offering landscape, planting, material, and layout plans.
                                We focus on the spatial relations created in our designs so they are functional,
                                meaningful, and aesthetically appealing
                                to both the architectural style of the property and end user. </p>
                            <img src="{{ URL::asset('/build/images/home-flower/we-sign.png')}}" alt=""
                                class="img-fluid d-block mx-auto">
                            <p class="text-muted mt-3">Camila Menson, owner of Kalles Flowers shop.</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row g-lg-4 g-2 mt-2">
                    <div class="col-md-6">
                        <a href="{{url( 'shop_pages.shop-left-sidebar')}}"
                            class="d-block position-relative cat_grid_item overflow-hidden h-624">
                            <div class="h-100 w-100 cat-grid-img"
                                style="background-image: url('{{ asset('/build/images/home-flower/cat-01.png')}}"></div>
                            <div class="cat-grid-button text-body">
                                <div class="cat_grid_item__title">Events</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-6">
                        <a href="{{url( 'shop_pages.shop-left-sidebar')}}"
                            class="d-block position-relative cat_grid_item overflow-hidden h-300 mb-lg-4 mb-2">
                            <div class="h-100 w-100 cat-grid-img"
                                style="background-image: url('{{ asset('/build/images/home-flower/cat-02.jpg')}}"></div>
                            <div class="cat-grid-button text-body">
                                <div class="cat_grid_item__title">Accessories</div>
                            </div>
                        </a>
                        <a href="{{url( 'shop_pages.shop-left-sidebar')}}"
                            class="d-block position-relative cat_grid_item overflow-hidden h-300">
                            <div class="h-100 w-100 cat-grid-img"
                                style="background-image: url('{{ asset('/build/images/home-flower/cat-03.jpg')}}"></div>
                            <div class="cat-grid-button text-body">
                                <div class="cat_grid_item__title">Wedding Decor</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-6">
                        <a href="{{url( 'shop_pages.shop-left-sidebar')}}"
                            class="d-block position-relative cat_grid_item overflow-hidden h-624">
                            <div class="h-100 w-100 cat-grid-img"
                                style="background-image: url('{{ asset('/build/images/home-flower/cat-04.jpg')}}"></div>
                            <div class="cat-grid-button text-body">
                                <div class="cat_grid_item__title">Home Decor</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div><!--end container-->
        </section>

        <section class="mt-40 pt-30">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="text-center">
                            <div class="mb-2">
                                <h3 class="section-title position-relative flex">
                                    <span>TRENDING</span>
                                </h3>
                            </div>
                            <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">Top
                                view
                                in this week</span>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row g-lg-4 g-3 mt-4">
                    <div class="col-md-3 col-6">
                        <div x-data="{ imageUrl: '/build/images/home-flower/pr-trending-01.png', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true"
                            x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/home-flower/pr-trending-02.png' : imageUrl"
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
                                        class="btn rounded-pill bg-pink2 text-white fs-14"><span>Quick View</span> <i
                                            class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn bg-pink2 text-white rounded-pill fs-14"
                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn bg-pink2 text-white responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                    <button type="button" class="btn responsive-cart bg-pink2 rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                </div>

                            </div>
                            <div class="mt-3">
                                <h6 class="mb-2 fw-normal text-pink2"><a href="{{ url('product/product-detail-layout-01')}}"
                                        class="text-pink2">Regular Succulent Shebang</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$125.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-3 col-6">
                        <div x-data="{ imageUrl: '/build/images/home-flower/pr-trending-03.png', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true"
                            x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <span class="new-label bg-danger text-white rounded-circle"> -31% </span>
                                <img :src="isHovered ? '/build/images/home-flower/pr-trending-04.png' : imageUrl"
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
                                        class="btn rounded-pill bg-pink2 text-white fs-14"><span>Quick View</span> <i
                                            class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn bg-pink2 text-white rounded-pill fs-14"
                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn bg-pink2 text-white responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                    <button type="button" class="btn responsive-cart bg-pink2 rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h6 class="mb-2 fw-normal"><a href="{{ url('product/product-detail-layout-01')}}"
                                        class="text-pink2">Shade Of Green</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <del>$285.00</del> <span class="text-danger">$199.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-3 col-6">
                        <div x-data="{ imageUrl: '/build/images/home-flower/pr-trending-05.png', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true"
                            x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/home-flower/pr-trending-06.png' : imageUrl"
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
                                        class="btn rounded-pill bg-pink2 text-white fs-14"><span>Quick View</span> <i
                                            class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn bg-pink2 text-white rounded-pill fs-14"
                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn bg-pink2 text-white responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                    <button type="button" class="btn responsive-cart bg-pink2 rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h6 class="mb-2 fw-normal"><a href="{{ url('product/product-detail-layout-01')}}"
                                        class="text-pink2">Seasonal Arrangement</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$95.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-3 col-6">
                        <div x-data="{ imageUrl: '/build/images/home-flower/pr-trending-07.png', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true"
                            x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <span class="new-label bg-success text-white rounded-circle text-center"> Sold Out
                                </span>
                                <img :src="isHovered ? '/build/images/home-flower/pr-trending-08.png' : imageUrl"
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
                                        class="btn rounded-pill bg-pink2 text-white fs-14"><span>Quick View</span> <i
                                            class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn bg-pink2 text-white rounded-pill fs-14"
                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn bg-pink2 text-white responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                    <button type="button" class="btn responsive-cart bg-pink2 rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h6 class="mb-2 fw-normal"><a href="{{ url('product/product-detail-layout-01')}}"
                                        class="text-pink2">Seasonal Hobnail Arrangement</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$145.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-3 col-6">
                        <div x-data="{ imageUrl: '/build/images/home-flower/pr-trending-09.png', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true"
                            x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <span class="new-label bg-success text-white rounded-circle text-center"> Sold Out
                                </span>
                                <img :src="isHovered ? '/build/images/home-flower/pr-trending-10.png' : imageUrl"
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
                                        class="btn rounded-pill bg-pink2 text-white fs-14"><span>Quick View</span> <i
                                            class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn bg-pink2 text-white rounded-pill fs-14"
                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn bg-pink2 text-white responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                    <button type="button" class="btn responsive-cart bg-pink2 rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h6 class="mb-2 fw-normal"><a href="{{ url('product/product-detail-layout-01')}}"
                                        class="text-pink2">Floral Garden Arrangement</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$195.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-3 col-6">
                        <div x-data="{ imageUrl: '/build/images/home-flower/pr-trending-11.png', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true"
                            x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/home-flower/pr-trending-12.png' : imageUrl"
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
                                        class="btn rounded-pill bg-pink2 text-white fs-14"><span>Quick View</span> <i
                                            class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn bg-pink2 text-white rounded-pill fs-14"
                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn bg-pink2 text-white responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                    <button type="button" class="btn responsive-cart bg-pink2 rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h6 class="mb-2 fw-normal"><a href="{{ url('product/product-detail-layout-01')}}"
                                        class="text-pink2">Boho Garden Arrangement</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$195.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->

                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->

        <div class="banner-section position-relative">
            <div class="container">
                <div class="row g-0">
                    <div class="col-md-6">
                        <div class="position-relative overflow-hidden img-zoom">
                            <img src="{{ URL::asset('/build/images/home-flower/card-info-01.jpg')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative overflow-hidden img-zoom">
                            <img src="{{ URL::asset('/build/images/home-flower/card-info-02.jpg')}}" alt="" class="img-fluid">
                            <div
                                class="position-absolute top-0 start-0 end-0 bottom-0 p-4 text-center d-flex align-items-center justify-content-center">
                                <div>
                                    <h2 class=" mb-4">Fall Floral Arranging Workshop</h2>
                                    <p class="text-muted pb-2">Flowers look great in a vase, but if you've got a little
                                        extra time at home these days and need a fun project, here are five great ways
                                        to play with your flowers! Floral things like flowers in your hair to make you
                                        feel like a goddess. </p>
                                    <a href="#!"
                                        class="btn btn-custom-dark fw-medium rounded-pill min-w-150">Shop
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end section-->

        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="text-center">
                            <div class="mb-2">
                                <h3 class="section-title position-relative flex text-uppercase">
                                    <span>Best Seller</span>
                                </h3>
                            </div>
                            <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">Top
                                sale
                                in this week</span>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row g-lg-4 g-3 mt-4">
                    <div class="col-md-3 col-6">
                        <div x-data="{ imageUrl: '/build/images/home-flower/pr-flw-01.png', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true"
                            x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/home-flower/pr-flw-02.png' : imageUrl"
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
                                        class="btn rounded-pill bg-pink2 text-white fs-14"><span>Quick View</span> <i
                                            class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn bg-pink2 text-white rounded-pill fs-14"
                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn bg-pink2 text-white responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                    <button type="button" class="btn responsive-cart bg-pink2 rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h6 class="mb-2 fw-normal"><a href="{{ url('product/product-detail-layout-01')}}"
                                        class="text-pink2">Kalles Medium Arrangment</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$295.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-3 col-6">
                        <div x-data="{ imageUrl: '/build/images/home-flower/pr-trending-01.png', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true"
                            x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/home-flower/pr-trending-02.png' : imageUrl"
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
                                        class="btn rounded-pill bg-pink2 text-white fs-14"><span>Quick View</span> <i
                                            class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn bg-pink2 text-white rounded-pill fs-14"
                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn bg-pink2 text-white responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                    <button type="button" class="btn responsive-cart bg-pink2 rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h6 class="mb-2 fw-normal"><a href="{{ url('product/product-detail-layout-01')}}"
                                        class="text-pink2">Regular Succulent Shebang</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$125.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-3 col-6">
                        <div x-data="{ imageUrl: '/build/images/home-flower/pr-flw-05.png', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true"
                            x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/home-flower/pr-flw-06.png' : imageUrl"
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
                                        class="btn rounded-pill bg-pink2 text-white fs-14"><span>Quick View</span> <i
                                            class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn bg-pink2 text-white rounded-pill fs-14"
                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn bg-pink2 text-white responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                    <button type="button" class="btn responsive-cart bg-pink2 rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h6 class="mb-2 fw-normal"><a href="{{ url('product/product-detail-layout-01')}}"
                                        class="text-pink2">Regular Succulent Shebang</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$335.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-3 col-6">
                        <div x-data="{ imageUrl: '/build/images/home-flower/pr-trending-05.png', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true"
                            x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/home-flower/pr-trending-06.png' : imageUrl"
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
                                        class="btn rounded-pill bg-pink2 text-white fs-14"><span>Quick View</span> <i
                                            class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn bg-pink2 text-white rounded-pill fs-14"
                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn bg-pink2 text-white responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                    <button type="button" class="btn responsive-cart bg-pink2 rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h6 class="mb-2 fw-normal"><a href="{{ url('product/product-detail-layout-01')}}"
                                        class="text-pink2">Seasonal Arrangement</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$95.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-3 col-6">
                        <div x-data="{ imageUrl: '/build/images/home-flower/pr-flw-09.png', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true"
                            x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/home-flower/pr-flw-10.png' : imageUrl"
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
                                        class="btn rounded-pill bg-pink2 text-white fs-14"><span>Quick View</span> <i
                                            class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn bg-pink2 text-white rounded-pill fs-14"
                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn bg-pink2 text-white responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                    <button type="button" class="btn responsive-cart bg-pink2 rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h6 class="mb-2 fw-normal"><a href="{{ url('product/product-detail-layout-01')}}"
                                        class="text-pink2">Lovely Lavender Gift Box</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$295.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-3 col-6">
                        <div x-data="{ imageUrl: '/build/images/home-flower/pr-flw-12.png', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true"
                            x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/home-flower/pr-flw-12.png' : imageUrl"
                                    alt="" class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-white"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                <div class="bg-overlay"></div>
                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn rounded-pill bg-pink2 text-white fs-14"><span>Quick View</span> <i
                                            class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn bg-pink2 text-white rounded-pill fs-14"
                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn bg-pink2 text-white responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                    <button type="button" class="btn responsive-cart bg-pink2 rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}"
                                        class="text-pink2">Botanical
                                        Crowns</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$25.00</span>
                                </p>
                                <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                    <a href="#!"
                                        x-on:click.prevent="imageUrl = '/build/images/home-flower/pr-flw-12.png'; isHovered = false"
                                        class="d-inline-block bg-danger rounded-circle"></a>
                                    <a href="#!"
                                        x-on:click.prevent="imageUrl = '/build/images/home-flower/pr-flw-13.png'; isHovered = false"
                                        class="d-inline-block bg_color_green rounded-circle"></a>
                                    <a href="#!"
                                        x-on:click.prevent="imageUrl = '/build/images/home-flower/pr-flw-12.png'; isHovered = false"
                                        class="d-inline-block bg-body-tertiary rounded-circle"></a>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-3 col-6">
                        <div x-data="{ imageUrl: '/build/images/home-flower/pr-trending-09.png', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true"
                            x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <span class="new-label bg-success text-white rounded-circle text-center"> Sold Out
                                </span>
                                <img :src="isHovered ? '/build/images/home-flower/pr-trending-10.png' : imageUrl"
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
                                        class="btn rounded-pill bg-pink2 text-white fs-14"><span>Quick View</span> <i
                                            class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn bg-pink2 text-white rounded-pill fs-14"
                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn bg-pink2 text-white responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                    <button type="button" class="btn responsive-cart bg-pink2 rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h6 class="mb-2 fw-normal"><a href="{{ url('product/product-detail-layout-01')}}"
                                        class="text-pink2">Floral Garden Arrangement</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$195.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-3 col-6">
                        <div x-data="{ imageUrl: '/build/images/home-flower/pr-17.png', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true"
                            x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/home-flower/pr-18.png' : imageUrl" alt=""
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
                                        class="btn rounded-pill bg-pink2 text-white fs-14"><span>Quick View</span> <i
                                            class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn bg-pink2 text-white rounded-pill fs-14"
                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn bg-pink2 text-white responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                    <button type="button" class="btn responsive-cart bg-pink2 rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h6 class="mb-2 fw-normal"><a href="{{ url('product/product-detail-layout-01')}}"
                                        class="text-pink2">Floral Crowns</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$28.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section>

        <section class="kalles-section_type_featured_blog">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="text-center mb-4 pb-2">
                            <div class="mb-2">
                                <h3 class="section-title position-relative flex text-uppercase">
                                    <span style="white-space: nowrap;">Lates from Blog</span>
                                </h3>
                            </div>
                            <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">The
                                freshest and most exciting news</span>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row g-4 blog-arrow"
                    data-flickity='{"imagesLoaded": 0, "adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold": 5, "cellAlign": "left", "wrapAround": true, "prevNextButtons": true, "percentPosition": 1, "pageDots": false, "autoPlay": 0, "pauseAutoPlayOnHover": true }'
                    dir="ltr">
                    <div class="col-md-4">
                        <div class="blog-card">
                            <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                                <img src="{{ URL::asset('/build/images/home-flower/blog-01.jpg')}}" alt="" class="img-fluid">
                            </a>
                            <h6 class="fs-16 mt-3 main_link_primary mb-2"><a href="{{ url('blog/blog-post-with-instagram-shop')}}"
                                    class="text-reset">5 Ways to Play: Florals at home!</a></h6>
                            <div class="post-content text-muted">Dried flower straw wreathes are super fun and easy to
                                make. Don't have dried flowers? We couldn’t be more thrilled ...</div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-4">
                        <div class="blog-card">
                            <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                                <img src="{{ URL::asset('/build/images/home-flower/blog-02.jpg')}}" alt="" class="img-fluid">
                            </a>
                            <h6 class="fs-16 mt-3 main_link_primary mb-2"><a href="{{ url('blog/blog-post-with-instagram-shop')}}"
                                    class="text-reset">Ed Alfrey and Warner Brothers Event</a></h6>
                            <div class="post-content text-muted">Flowers look great in a vase, but if you've got a
                                little extra time at home these days and need a fun project, here...</div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-4">
                        <div class="blog-card">
                            <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                                <img src="{{ URL::asset('/build/images/home-flower/blog-03.jpg')}}" alt="" class="img-fluid">
                            </a>
                            <h6 class="fs-16 mt-3 main_link_primary mb-2"><a href="{{ url('blog/blog-post-with-instagram-shop')}}"
                                    class="text-reset">A Wanderlust Wedding</a></h6>
                            <div class="post-content text-muted">In January, WildFlora got the opportunity to once
                                again
                                work with Fundamental Events Catering (always a pleasure!) ...</div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section>

        <section>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="text-center mb-4">
                            <div>
                                <h3 class="section-title position-relative flex text-uppercase">
                                    <span>@ Follow us on Instagram</span>
                                </h3>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row"
                    data-flickity='{"imagesLoaded": 0,"adaptiveHeight": 1, "contain": 1, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": false,"prevNextButtons": true,"percentPosition": 1,"pageDots": false, "autoPlay" : 0, "pauseAutoPlayOnHover" : true, "rightToLeft": false }'>
                    <div class="col-lg-2 col-md-3 col-6">
                        <div class="insta-card position-relative">
                            <img src="{{ URL::asset('/build/images/home-flower/instagram-01.png')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-6">
                        <div class="insta-card position-relative">
                            <img src="{{ URL::asset('/build/images/home-flower/instagram-04.jpg')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-6">
                        <div class="insta-card position-relative">
                            <img src="{{ URL::asset('/build/images/home-flower/instagram-05.jpg')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-6">
                        <div class="insta-card position-relative">
                            <img src="{{ URL::asset('/build/images/home-flower/instagram-06.png')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-6">
                        <div class="insta-card position-relative">
                            <img src="{{ URL::asset('/build/images/home-flower/instagram-07.jpg')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-6">
                        <div class="insta-card position-relative">
                            <img src="{{ URL::asset('/build/images/home-flower/instagram-08.jpg')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-6">
                        <div class="insta-card position-relative">
                            <img src="{{ URL::asset('/build/images/home-flower/instagram-02.png')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-6">
                        <div class="insta-card position-relative">
                            <img src="{{ URL::asset('/build/images/home-flower/instagram-01.png')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('partials.shipping')
        @include('partials.footer-flower')
        @include('partials.popup')
    </div>
    @include('partials.card-model')
    @include('partials.vendor-scripts')
    <script src="{{ URL::asset('build/libs/flickity/flickity.pkgd.min.js')}}"></script>
    <script src="{{ URL::asset('build/js/main.js')}}"></script>
    <script src="{{ URL::asset('build/js/app.js')}}"></script>


</body>

</html>
