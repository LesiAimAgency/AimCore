
    @extends('layouts.master_home')
    @section('title', 'Home Lookbook | | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme')
    @section('content')
    <section class="position-relative home-lookbook-section">
        <div class="slideshow" data-flickity='{ "fade":0,"cellAlign": "center","imagesLoaded": 0,"lazyLoad": 0,"freeScroll": 0,"wrapAround": true,"autoPlay" : 0,"pauseAutoPlayOnHover" : true, "rightToLeft": false, "prevNextButtons": true,"pageDots": true, "contain" : 1,"adaptiveHeight" : 1,"dragThreshold" : 10,"percentPosition": 1,"draggable": true,"selectedAttraction": 0.1,"parallax" : 0,"friction": 0.6 }'>
            <!-- first slide -->
            <div class="slideshow__slide w-100 kalles-lookbook-home" style="background-image: url('{{ asset('/build/images/home-lookbook/slide-01.jpg')}}">
                <div class="pin-type position-absolute position-01">
                    <span class="zoompin"></span>
                    <a href="#pinType1" class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center position-relative" data-bs-toggle="modal">
                        <i class="nav_link_icon position-relative"></i>
                    </a>
                </div>
                <div class="pin-type position-absolute position-02">
                    <span class="zoompin"></span>
                    <a href="#pinType2" class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center position-relative" data-bs-toggle="modal">
                        <i class="nav_link_icon position-relative"></i>
                    </a>
                </div>

                <div class="pin-type position-absolute position-03">
                    <span class="zoompin"></span>
                    <a href="#pinType3" class="bg_color_red text-white rounded-circle d-flex align-items-center justify-content-center position-relative" data-bs-toggle="modal">
                        <i class="nav_link_icon position-relative"></i>
                    </a>
                </div>
                <div class="pin-type position-absolute position-04">
                    <span class="zoompin"></span>
                    <a href="#pinType4" class="bg_color_red text-white rounded-circle d-flex align-items-center justify-content-center position-relative" data-bs-toggle="modal">
                        <i class="nav_link_icon position-relative"></i>
                    </a>
                </div>
                <div class="pin-type position-absolute position-05">
                    <span class="zoompin"></span>
                    <a href="#pinType5" class="bg_color_red text-white rounded-circle d-flex align-items-center justify-content-center position-relative" data-bs-toggle="modal">
                        <i class="nav_link_icon position-relative"></i>
                    </a>
                </div>
            </div>
            <!-- end first slide -->

            <!-- second slide -->
            <div class="slideshow__slide w-100 kalles-lookbook-home" style="background-image: url('{{ asset('/build/images/home-lookbook/slide-02.jpg')}}">
                <div class="pin-type position-absolute position-06">
                    <span class="zoompin"></span>
                    <a href="#pinType6" class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center position-relative" data-bs-toggle="modal">
                        <i class="nav_link_icon position-relative"></i>
                    </a>
                </div>
                <div class="pin-type position-absolute position-07">
                    <span class="zoompin"></span>
                    <a href="#pinType7" class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center position-relative" data-bs-toggle="modal">
                        <i class="nav_link_icon position-relative"></i>
                    </a>
                </div>
            </div>
            <!-- end second slide -->

            <!-- third slide -->
            <div class="slideshow__slide w-100 kalles-lookbook-home" style="background-image: url('{{ asset('/build/images/home-lookbook/slide-03.jpg')}}">
                <div class="pin-type position-absolute position-08">
                    <span class="zoompin"></span>
                    <a href="#pinType8" class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center position-relative" data-bs-toggle="modal">
                        <i class="nav_link_icon position-relative"></i>
                    </a>
                </div>
                <div class="pin-type position-absolute position-09">
                    <span class="zoompin"></span>
                    <a href="#pinType9" class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center position-relative" data-bs-toggle="modal">
                        <i class="nav_link_icon position-relative"></i>
                    </a>
                </div>
            </div>
            <!-- end third slide -->
        </div>
        <!-- pin-type 1 -->
        <div class="modal fade modal-overl pin_popup" id="pinType1" tabindex="-1" aria-labelledby="pinType1Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body p-20">
                        <div x-data="{ imageUrl: '/build/images/home-lookbook/pinner-p-01.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false" class="topbar-product-card">
                            <div class="position-relative overflow-hidden">
                                <span class="new-label bg-danger text-white rounded-circle"> -34% </span>
                                <img :src="isHovered ? '/build/images/home-lookbook/pinner-p-02.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                                <div class="product-button d-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                            Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                            </div>
                            <div class="mt-3 text-center">
                                <h6 class="mb-2"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Organza
                                        Hair Scrunchie</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <del>$5.00</del>
                                    <span class="text-danger">$3.50</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end pin-type 1 -->

        <!-- pin-type 2 -->
        <div class="modal fade modal-overl pin_popup" id="pinType2" tabindex="-1" aria-labelledby="pinType2Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body p-20">
                        <div x-data="{ imageUrl: '/build/images/home-lookbook/pinner-p-03.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false" class="topbar-product-card">
                            <div class="position-relative overflow-hidden">
                                <span class="new-label bg-danger text-white rounded-circle"> -56% </span>
                                <img :src="isHovered ? '/build/images/home-lookbook/pinner-p-04.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                                <div class="product-button d-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                            Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                            </div>
                            <div class="mt-3 text-center">
                                <h6 class="mb-2"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Striped
                                        Long Sleeve Top</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <del>$45.00</del>
                                    <span class="text-danger">$20.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end pin-type 2 -->

        <!-- pin-type 3 -->
        <div class="modal fade modal-overl modal-md" id="pinType3" tabindex="-1" aria-labelledby="pinType3Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="fs-16 mb-0 fw-normal">Sweatshirt in Stripe</h5>
                    </div>
                    <div class="modal-body">
                        <p class="text-muted mb-0">With groundbreaking water resistant capabilities, The Mission has the
                            highest waterproof rating of any smartwatch on the market.</p>
                    </div>
                </div>
            </div>
        </div><!-- end pin-type 3 -->

        <!-- pin-type 4 -->
        <div class="modal fade modal-overl pin_popup" id="pinType4" tabindex="-1" aria-labelledby="pinType4Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body p-20">
                        <div x-data="{ imageUrl: '/build/images/home-lookbook/pinner-p-07.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false" class="topbar-product-card">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/home-lookbook/pinner-p-08.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                                <div class="product-button d-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                            Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                            </div>
                            <div class="mt-3 text-center">
                                <h6 class="mb-2"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Men Knit
                                        Sweater</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$95.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end pin-type 4 -->

        <!-- pin-type 5 -->
        <div class="modal fade modal-overl pin_popup" id="pinType5" tabindex="-1" aria-labelledby="pinType5Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body p-20">
                        <div x-data="{ imageUrl: '/build/images/home-lookbook/pinner-p-09.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false" class="topbar-product-card">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/home-lookbook/pinner-p-10.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                                <div class="product-button d-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                            Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                            </div>
                            <div class="mt-3 text-center">
                                <h6 class="mb-2"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">High
                                        Waist Skinny Jean</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$95.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end pin-type 5 -->

        <!-- pin-type 6 -->
        <div class="modal fade modal-overl pin_popup" id="pinType6" tabindex="-1" aria-labelledby="pinType6Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body p-20">
                        <div x-data="{ imageUrl: '/build/images/home-lookbook/pinner-p-11.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false" class="topbar-product-card">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/home-lookbook/pinner-p-12.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                                <div class="product-button d-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                            Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                            </div>
                            <div class="mt-3 text-center">
                                <h6 class="mb-2"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Circle
                                        Snapback Cap</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$25.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end pin-type 6 -->

        <!-- pin-type 7 -->
        <div class="modal fade modal-overl modal-md" id="pinType7" tabindex="-1" aria-labelledby="pinType3Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="fs-16 mb-0 fw-normal">Graphic T-shirt</h5>
                    </div>
                    <div class="modal-body">
                        <p class="text-muted mb-0">With groundbreaking water resistant capabilities, The Mission has the
                            highest waterproof rating of any smartwatch on the market.</p>
                    </div>
                </div>
            </div>
        </div><!-- end pin-type 7 -->

        <!-- pin-type 8 -->
        <div class="modal fade modal-overl pin_popup" id="pinType8" tabindex="-1" aria-labelledby="pinType1Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body p-20">
                        <div x-data="{ imageUrl: '/build/images/home-classic/pr-big-24.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <span class="new-label bg-danger text-white rounded-circle"> -34% </span>
                                <img :src="isHovered ? '/build/images/home-classic/pr-big-25.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                                <div class="product-button d-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick
                                            Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                            </div>
                            <div class="mt-3 text-center">
                                <h6 class="mb-2"><a href="#!" class="product-title">La Bohème Rose Gold</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <del>$60.00</del>
                                    <span class="text-danger">$40.00</span>
                                </p>
                                <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                    <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-big-24.jpg'; isHovered = false" class="d-inline-block bg_color_pink rounded-circle"></a>
                                    <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-big-25.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end pin-type 8 -->

        <!-- pin-type 9 -->
        <div class="modal fade modal-overl modal-md" id="pinType9" tabindex="-1" aria-labelledby="pinType3Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="fs-16 mb-0 fw-normal">01 - Water Resistance</h5>
                    </div>
                    <div class="modal-body">
                        <p class="text-muted mb-0">With groundbreaking water resistant capabilities, The Mission has the
                            highest waterproof rating of any smartwatch on the market.</p>
                    </div>
                </div>
            </div>
        </div><!-- end pin-type 9 -->
    </section>


    <section class="cat-section pb-4">
        <div class="container-fluid">
            <div class="row g-lg-4 g-3">
                <div class="col-md-3">
                    <a href="{{url( 'shop_pages.shop-left-sidebar')}}" class="d-block position-relative cat_grid_item overflow-hidden h-100">
                        <img class="h-100 w-100 cat-grid-img" src="{{ URL::asset('/build/images/home-categories-links/cat-bn-02.jpg')}}"></img>
                        <div class="cat-grid-button text-body">
                            <div class="cat_grid_item__title">Bags</div>
                        </div>
                    </a>
                </div><!--end col-->
                <div class="col-md-3">
                    <a href="{{url( 'shop_pages.shop-left-sidebar')}}" class="d-block position-relative cat_grid_item overflow-hidden h-100">
                        <img class="h-100 w-100 cat-grid-img" src="{{ URL::asset('/build/images/home-categories-links/cat-bn-04.jpg')}}"></img>
                        <div class="cat-grid-button text-body">
                            <div class="cat_grid_item__title">Caps & Hats</div>
                        </div>
                    </a>
                </div><!--end col-->
                <div class="col-md-3">
                    <a href="{{url( 'shop_pages.shop-left-sidebar')}}" class="d-block position-relative cat_grid_item overflow-hidden h-100">
                        <img class="h-100 w-100 cat-grid-img" src="{{ URL::asset('/build/images/home-categories-links/cat-bn-03.jpg')}}"></img>
                        <div class="cat-grid-button text-body">
                            <div class="cat_grid_item__title">Watches</div>
                        </div>
                    </a>
                </div><!--end col-->
                <div class="col-md-3">
                    <a href="{{url( 'shop_pages.shop-left-sidebar')}}" class="d-block position-relative cat_grid_item overflow-hidden h-100">
                        <img class="h-100 w-100 cat-grid-img" src="/build/images/home-categories-links/cat-bn-01.jpeg"></img>
                        <div class="cat-grid-button text-body">
                            <div class="cat_grid_item__title">Footwear</div>
                        </div>
                    </a>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </section>
    <!-- sale -->
    <section class="mb-5">
        <div class="container">
            <div class="row g-lg-4 g-3 gy-md-0 gy-4 align-items-center">
                <div class="col-md-4">
                    <a href="{{ url('shop_pages/shop-right-sidebar')}}" class="kalles-banner-promotion d-block">
                        <img src="{{ URL::asset('/build/images/home-lookbook/bn-01.jpg')}}" alt="" class="img-fluid">
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
                                    <li class="bg-dark text-white text-white-50 fs-12 rounded"><span class="hr text-white fs-14">00</span>Hours</li>
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
                    <a href="{{ url('shop_pages/shop')}}" class="kalles-banner-promotion d-block">
                        <img src="{{ URL::asset('/build/images/home-lookbook/bn-03.jpg')}}" alt="" class="img-fluid">
                        <div class="p-20 position-absolute top-50 end-0 text-body start-0 content-position text-center">
                            <p class="text-uppercase fw-medium fs-18 mb-1">Men Collection</p>
                            <h3 class="fs-50">SALE 70%</h3>
                            <button class="btn btn-custom-dark fw-medium min-w-150 rounded-pill">Shop Now</button>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!--trending  -->

    @include('partials/trending')
    <!-- our product -->
 @include('partials/our-product')
  @endsection