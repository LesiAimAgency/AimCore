<!doctype html>
<html lang="en" x-data :dir="$store.appStore.dir" x-cloak>
    
<head>
    <meta charset="utf-8" />
    <title>Home Lingeries | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="" name="description" />
    <meta content="srbthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/build/images/k_favicon_32x.png')}}">
    @yield('css')
    @include('partials.head-css')
</head>
<body class="" x-data="{ showMenuScroll : false }">
@includeIf('partials.header-lingeries')
<div>
    <!-- main slide -->
    <section class="kalles-home-section type_slideshow type_carousel kalles-bags kalles-medical overflow-hidden">
        <div class="slideshow" data-flickity='{ "fade":0,"cellAlign": "center","imagesLoaded": 0,"lazyLoad": 0,"freeScroll": 0,"wrapAround": true,"autoPlay" : 0,"pauseAutoPlayOnHover" : true, "rightToLeft": false, "prevNextButtons": false,"pageDots": true, "contain" : 1,"adaptiveHeight" : 1,"dragThreshold" : 5,"percentPosition": 1 }'>
            <!-- first slide -->
            <div class="slideshow__slide">
                <img src="{{ URL::asset('/build/images/home-lingerie/slide-01.jpg')}}" alt="" class="position-absolute w-100 h-100">
                <div class="container position-relative">
                    <div class="row justify-content-end">
                        <div class="col-lg-6">
                            <div class="content text-center text-md-start">
                                <h5 class="fw-medium fs-18 mb-2">Smart Clothing For Any Situation</h5>
                                <h1 class="display-3 fw-normal font-futura mb-4">Kalles’s Beachwear Etiquette 2020</h1>
                                <a class="btn btn-dark rounded-0 min-w-150 min-h-45 d-inline-flex align-items-center justify-content-center fw-semibold px-4" href="{{ url('shop_pages/shop')}}">Explore Collection</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end first slide -->

            <!-- second slide -->
            <div class="slideshow__slide">
                <img src="{{ URL::asset('/build/images/home-lingerie/slide-02.jpg')}}" alt="" class="position-absolute w-100 h-100">
                <div class="container position-relative">
                    <div class="row justify-content-end">
                        <div class="col-lg-6">
                            <div class="content">
                                <h5 class="fw-medium fs-18 mb-2">Latest Arrivals Collection on 50% Off</h5>
                                <h1 class="display-3 fw-normal font-futura mb-4">Natural Febric Is 100% Unrefined</h1>
                                <a class="btn btn-dark rounded-0 min-w-150 min-h-45 d-inline-flex align-items-center justify-content-center fw-semibold px-4" href="{{ url('shop_pages/shop')}}">Discover More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end second slide -->
        </div>
    </section>
    <!-- end main slide -->

    <section class="kalles-lingerie-main">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="text-center">
                        <div class="mb-4">
                            <h3 class="position-relative flex text-capitalize font-futura fw-normal line-section-title">
                                <span>OUR STORY</span>
                            </h3>
                        </div>
                        <p class="fs-14 text-muted mb-3 pb-2">When you think of swimwear, you likely don’t think about
                            high necklines. After all, most styles are swooping so low in the front that they’re
                            absolutely impossible to wear if you have a large bust. But don’t be mistaken – high
                            neckline bikini tops are all the rage right now, and they’re super chic!</p>
                        <a class="btn btn-dark rounded-0 min-w-150 min-h-45 d-inline-flex align-items-center justify-content-center fw-semibold px-4" href="{{ url('shop_pages/shop')}}">Read More</a>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="row g-2 mt-5">
                <div class="col-md-6">
                    <div class="position-relative">
                        <img src="{{ URL::asset('/build/images/home-lingerie/lookbook-pin-01.jpg')}}" class="img-fluid">
                        <div class="pin-type position-absolute position-05">
                            <span class="zoompin"></span>
                            <a href="#pinType8" class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center position-relative" data-bs-toggle="modal">
                                <i class="nav_link_icon position-relative"></i>
                            </a>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-md-6">
                    <div class="position-relative">
                        <img src="{{ URL::asset('/build/images/home-lingerie/lookbook-pin-02.jpg')}}" class="img-fluid" alt="">
                        <div class="pin-type position-absolute position-09">
                            <span class="zoompin"></span>
                            <a href="#pinType9" class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center position-relative" data-bs-toggle="modal">
                                <i class="nav_link_icon position-relative"></i>
                            </a>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end col-->
        </div>
        <!-- pin-type -->
        <div class="modal fade modal-overl pin_popup" id="pinType8" tabindex="-1" aria-labelledby="pinType8Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body p-20">
                        <div x-data="{ imageUrl: '/build/images/home-lingerie/pr-01.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/home-lingerie/pr-01.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                <div class="product-button d-flex flex-column gap-2">
                                    <a href="#!" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                    <a href="#!" class="btn rounded-pill fs-14"><span>Quick Shop</span> <i class="iccl iccl-cart"></i></a>
                                </div>
                                <p class="product-size mb-0 text-center text-white fw-medium">S, M, L, XL, 2XL</p>
                            </div>
                            <div class="mt-3 text-center">
                                <h6 class="mb-2 font-futura fw-medium fs-15"><a href="#!" class="main_link">Mia & Marley
                                        Bikini Set</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$35.00</span>
                                </p>
                                <div class="product-color-list mt-2 gap-2 d-flex align-items-center justify-content-center">
                                    <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-lingerie/pr-02.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                                    <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-lingerie/pr-03.jpg'; isHovered = false" class="d-inline-block bg-danger rounded-circle"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade modal-overl pin_popup" id="pinType9" tabindex="-1" aria-labelledby="pinType9Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body p-20">
                        <div x-data="{ imageUrl: '/build/images/home-lingerie/pr-04.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                            <div class="position-relative overflow-hidden">
                                <img :src="isHovered ? '/build/images/home-lingerie/pr-05.jpg' : imageUrl" alt="" class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                <div class="product-button d-flex flex-column gap-2">
                                    <a href="#!" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                    <a href="#!" class="btn rounded-pill fs-14"><span>Quick Shop</span> <i class="iccl iccl-cart"></i></a>
                                </div>
                            </div>
                            <div class="mt-3 text-center">
                                <h6 class="mb-2 font-futura fw-medium fs-15"><a href="#!" class="main_link">Turks
                                        One-Piece Swimsuit</a></h6>
                                <p class="mb-0 fs-14 text-muted">
                                    <span>$40.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end pin-type -->
    </section>

    <section class="kalles-lingerie-new-products">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="text-center">
                        <div class="mb-4">
                            <h3 class="position-relative flex text-capitalize font-futura fw-normal line-section-title">
                                <span>NEW ARRIVALS</span>
                            </h3>
                        </div>
                        <p class="fs-14 text-muted mb-0">Making this the perfect beach to street look with some denim
                            cut-offs!</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="row g-lg-4 g-3 justify-content-center row-cols-2 row-cols-md-4 row-cols-lg-6 mt-4">
                <div class="col">
                    <div x-data="{ imageUrl: '/build/images/home-lingerie/pr-06.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <img :src="isHovered ? '/build/images/home-lingerie/pr-07.jpg' : imageUrl" alt="" class="img-fluid">
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
                            <h6 class="mb-1 fw-medium font-futura"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_acid_green">Jayme Bandeau Bikini Top</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <span>$32.00</span>
                            </p>
                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-lingerie/pr-18.jpg'; isHovered = false" class="d-inline-block bg-white rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-lingerie/pr-07.jpg'; isHovered = false" class="d-inline-block bg-dark rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-lingerie/pr-19.jpg'; isHovered = false" class="d-inline-block bg-danger rounded-circle"></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col">
                    <div x-data="{ imageUrl: '/build/images/home-lingerie/pr-08.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <img :src="isHovered ? '/build/images/home-lingerie/pr-09.jpg' : imageUrl" alt="" class="img-fluid">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="mb-1 fw-medium font-futura"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_acid_green">Turks One-Piece Swimsuit</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <span>$40.00</span>
                            </p>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col">
                    <div x-data="{ imageUrl: '/build/images/home-lingerie/pr-10.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <img :src="isHovered ? '/build/images/home-lingerie/pr-11.jpg' : imageUrl" alt="" class="img-fluid">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="mb-1 fw-medium font-futura"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_acid_green">Seaside Bandeau Bikini Top</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <span>$42.00</span>
                            </p>
                            <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-lingerie/pr-11.jpg'; isHovered = false" class="d-inline-block bg-white rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-lingerie/pr-20.jpg'; isHovered = false" class="d-inline-block bg_color_green rounded-circle"></a>
                                <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-lingerie/pr-21.jpg'; isHovered = false" class="d-inline-block bg_color_blue rounded-circle"></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col">
                    <div x-data="{ imageUrl: '/build/images/home-lingerie/pr-12.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <img :src="isHovered ? '/build/images/home-lingerie/pr-13.jpg' : imageUrl" alt="" class="img-fluid">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="mb-1 fw-medium font-futura"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_acid_green">Callie Off The Shoulder Bikini</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <span>$38.00</span>
                            </p>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col">
                    <div x-data="{ imageUrl: '/build/images/home-lingerie/pr-14.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <img :src="isHovered ? '/build/images/home-lingerie/pr-15.jpg' : imageUrl" alt="" class="img-fluid">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="mb-1 fw-medium font-futura"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_acid_green">Zen Color Block One-piece</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <span>$29.99</span>
                            </p>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col">
                    <div x-data="{ imageUrl: '/build/images/home-lingerie/pr-16.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                        <div class="position-relative overflow-hidden">
                            <img :src="isHovered ? '/build/images/home-lingerie/pr-17.jpg' : imageUrl" alt="" class="img-fluid">
                            <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                            <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                            <div class="product-button d-none d-lg-flex flex-column gap-2">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                    <i class="iccl iccl-cart"></i></button>
                            </div>
                            <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1; box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);">
                                <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                    <i class="iccl iccl-cart fw-semibold"></i></button>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="mb-1 fw-medium font-futura"><a href="{{ url('product/product-detail-layout-01')}}" class="main_link_acid_green">Brooke Underwire Bikini</a></h6>
                            <p class="mb-0 fs-14 text-muted">
                                <span>$39.99</span>
                            </p>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->

    <div class="kalles-lingerie-banner-trending position-relative">
        <div class="container">
            <div class="row g-0">
                <div class="col-md-6 img-zoom">
                    <img src="{{ URL::asset('/build/images/home-lingerie/trending-item-left.jpg')}}" class="img-fluid" alt="">
                </div>
                <div class="col-md-6 h-100">
                    <div class="position-relative">
                        <img src="{{ URL::asset('/build/images/home-lingerie/trending-item-right.jpg')}}" class="img-fluid" alt="">
                        <div class="text-center position-absolute top-0 start-0 end-0 bottom-0 d-flex align-items-center justify-content-center mx-5">
                            <div>
                                <div class="mb-4">
                                    <h3 class="position-relative flex text-capitalize font-futura fw-normal line-section-title">
                                        <span>TRENDING ITEMS</span>
                                    </h3>
                                </div>
                                <p class="fs-14 text-muted mb-3">Where many swim lines have their place in the sun,
                                    Kalles transcends beach and the pool. The pieces transition seamlessly as day or
                                    evening Ready-to-Wear, providing an innate versatility your already established
                                    wardrobe.</p>
                                <a class="btn btn-dark rounded-0 min-w-150 min-h-45 d-inline-flex align-items-center justify-content-center fw-semibold px-4" href="{{ url('shop_pages/shop')}}">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end section-->

    <section class="kalles-section_type_featured_blog pt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="text-center mb-4 pb-2">
                        <div class="mb-4">
                            <h3 class="position-relative flex text-capitalize font-futura fw-normal line-section-title">
                                <span>POPULAR BLOG</span>
                            </h3>
                        </div>
                        <p class="fs-14 text-muted mb-0">One-piece swimsuits are hotter than ever, offering styles that
                            are even sexier than itsy bitsy bikinis!</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="row g-4 ">
                <div class="col-md-4">
                    <div class="blog-card">
                        <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                            <img src="{{ URL::asset('/build/images/home-lingerie/blog-01.png')}}" alt="" class="img-fluid">
                        </a>
                        <h6 class="fs-17 mt-3 font-futura fw-medium main_link"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">Holiday Capsule
                                Collection</a></h6>
                        <div class="d-flex gap-1 align-items-center text-muted">
                            On
                            <span class="text-body">July 23, 2024</span>
                        </div>
                        <div class="post-content text-muted mt-3">Looking (and feeling) like a badass beach babe comes
                            naturally when you’re wearing a strappy style. So, the Camilla...</div>
                    </div>
                </div><!--end col-->
                <div class="col-md-4">
                    <div class="blog-card">
                        <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                            <img src="{{ URL::asset('/build/images/home-lingerie/blog-02.jpg')}}" alt="" class="img-fluid">
                        </a>
                        <h6 class="fs-17 mt-3 font-futura fw-medium main_link"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">Best Swimsuits for Small
                                Bust</a></h6>
                        <div class="d-flex gap-1 align-items-center text-muted">
                            On
                            <span class="text-body">July 23, 2020</span>
                        </div>
                        <div class="post-content text-muted mt-3">Don’t be mistaken ladies, you don’t need a large bust
                            that fills out your bikini top for a flawless beach look. You...</div>
                    </div>
                </div><!--end col-->
                <div class="col-md-4">
                    <div class="blog-card">
                        <a href="{{ url('blog/blog-left-sidebar')}}" class="overflow-hidden d-block blog-wrap">
                            <img src="{{ URL::asset('/build/images/blog/blog-03.jpg')}}" alt="" class="img-fluid">
                        </a>
                        <h6 class="fs-17 mt-3 font-futura fw-medium main_link"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">5 Best Swimsuits for Big
                                Busts</a></h6>
                        <div class="d-flex gap-1 align-items-center text-muted">
                            On
                            <span class="text-body">AJuly 23, 20200</span>
                        </div>
                        <div class="post-content text-muted mt-3">Our top 5 Best Swimsuits for Big Busts Bikinis and a
                            big bust are rarely two things that go together. Well, that is...</div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>

    <section class="kalles-lingerie-brand">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-2 col-4">
                    <a href="#!" class="type_brand_list">
                        <img src="{{ URL::asset('/build/images/home-lingerie/brand-01.png')}}" alt="" class="img-fluid">
                    </a>
                </div><!--end col-->
                <div class="col-md-2 col-4">
                    <a href="#!" class="type_brand_list">
                        <img src="{{ URL::asset('/build/images/home-lingerie/brand-02.png')}}" alt="" class="img-fluid">
                    </a>
                </div><!--end col-->
                <div class="col-md-2 col-4">
                    <a href="#!" class="type_brand_list">
                        <img src="{{ URL::asset('/build/images/home-lingerie/brand-03.png')}}" alt="" class="img-fluid">
                    </a>
                </div><!--end col-->
                <div class="col-md-2 col-4">
                    <a href="#!" class="type_brand_list">
                        <img src="{{ URL::asset('/build/images/home-lingerie/brand-04.png')}}" alt="" class="img-fluid">
                    </a>
                </div><!--end col-->
                <div class="col-md-2 col-4">
                    <a href="#!" class="type_brand_list">
                        <img src="{{ URL::asset('/build/images/home-lingerie/brand-05.png')}}" alt="" class="img-fluid">
                    </a>
                </div><!--end col-->
                <div class="col-md-2 col-4">
                    <a href="#!" class="type_brand_list">
                        <img src="{{ URL::asset('/build/images/home-lingerie/brand-06.png')}}" alt="" class="img-fluid">
                    </a>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </section>

    <div class="banner-section position-relative mt-5 pt-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <a href="#!" class="position-relative hover-zoom d-block">
                        <img src="{{ URL::asset('/build/images/home-lingerie/line-banner-01.jpg')}}" alt="" class="img-fluid hover-zoom-img w-100">
                        <div class="position-absolute start-0 start-0 end-0 top-0 bottom-0 d-flex align-items-center justify-content-end mx-4">
                            <div class="text-white text-end">
                                <h4 class="fs-24 font-futura fw-medium mb-4">Summer Wear <br> Collection 2024</h4>
                                <p class="fw-normal font-futura mb-0 btn_icon_true d-inline-block position-relative fs-14">
                                    Explore Now</p>
                            </div>
                        </div>
                    </a>
                </div><!--end col-->
                <div class="col-md-6">
                    <a href="#!" class="position-relative hover-zoom d-block">
                        <img src="{{ URL::asset('/build/images/home-lingerie/line-banner-02.jpg')}}" alt="" class="img-fluid hover-zoom-img w-100">
                        <div class="position-absolute start-0 start-0 end-0 top-0 bottom-0 d-flex align-items-center mx-4">
                            <div class="text-white">
                                <h4 class="fs-24 font-futura fw-medium mb-4">Trending Item <br> Sale Of The Day</h4>
                                <p class="fw-normal font-futura mb-0 btn_icon_true d-inline-block position-relative fs-14">
                                    Explore Now</p>
                            </div>
                        </div>
                    </a>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </div><!--end section-->

    <section class="kalles-lingerie-newsletter">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <h1 class="font-futura fs-45 fw-medium text-center">Get Daily Update For Deals & Exclusive Discount
                    </h1>
                </div>
            </div><!--end row-->
            <div class="row justify-content-center mt-4 pt-2">
                <div class="col-lg-7 col-md-10">
                    <form action="#!" class="signup-newsletter-form row g-0">
                        <div class="col-md col-12">
                            <input type="email" name="email" placeholder="Your email address" value="" class="form-control bg-transparent shadow-none border-0" required="required">
                        </div>
                        <div class="col-md-auto col-12">
                            <button type="submit" class="btn_icon_true btn bg-dark border-dark rounded-0 text-white w-100 w-md-auto">
                                Subscribe
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @include('partials/footer-lingerie')
    @include('partials/popup')

</div>
<div class="position-fixed bottom-0 bg-body start-0 end-0 z-1" style="box-shadow: 0 0 9px rgba(0, 0, 0, 0.12);">
    <div class="container">
        <div class="d-md-flex text-center align-items-center justify-content-between py-3">
            <p class="text-muted mb-0">We use cookies to improve your experience on our website. By browsing this website, you agree to our use of cookies.</p>
            <div class="mt-3 mt-md-0">
                <button data-bs-toggle="offcanvas" data-bs-target="#shoppingCartOffcanvas" aria-controls="shoppingCartOffcanvas" class="btn btn-teal text-uppercase rounded-0 min-w-150">
                    accept
                </button>
            </div>

        </div>
    </div>
</div>

@include('partials/card-model')
@include('partials/vendor-scripts')

<script  src="{{ URL::asset('build/libs/flickity/flickity.pkgd.min.js')}}"></script>
<script  src="{{ URL::asset('build/js/main.js')}}"></script>
<script  src="{{ URL::asset('build/js/app.js')}}"></script>
</body>

</html>