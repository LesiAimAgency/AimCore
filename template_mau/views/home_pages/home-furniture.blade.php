<!doctype html>
<html lang="en" x-data :dir="$store.appStore.dir" x-cloak>

<head>
    <meta charset="utf-8" />
    <title>Home Furniture | | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="" name="description" />
    <meta content="srbthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/build/images/k_favicon_32x.png')}}">
    @include('partials.head-css')
</head>

<body class="" x-data="{ showMenuScroll: false }">
    @include('partials.header-furniture')

    <div>
        <section class="kalles-home-furniture position-relative home-lookbook-section"
            style="background-image: url('{{ asset('/build/images/home-furniture/slide.jpg')}}">
            <div class="pin-type position-absolute position-01">
                <span class="zoompin"></span>
                <a href="#pinType1"
                    class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center position-relative"
                    data-bs-toggle="modal">
                    <i class="las la-plus position-relative"></i>
                </a>
            </div>

            <div class="pin-type position-absolute position-02">
                <span class="zoompin"></span>
                <a href="#pinType2"
                    class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center position-relative"
                    data-bs-toggle="modal">
                    <i class="las la-plus position-relative"></i>
                </a>
            </div>
            <div class="pin-type position-absolute position-03">
                <span class="zoompin"></span>
                <a href="#pinType3"
                    class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center position-relative"
                    data-bs-toggle="modal">
                    <i class="las la-plus position-relative"></i>
                </a>
            </div>

            <!-- pin-type 1 -->
            <div class="modal fade modal-overl pin_popup" id="pinType1" tabindex="-1" aria-labelledby="pinType1Label"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-20">
                            <div x-data="{ imageUrl: '/build/images/home-furniture/pr-07.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true"
                                x-on:mouseleave="isHovered = false" class="topbar-product-card">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/home-furniture/pr-07.jpg' : imageUrl"
                                        alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                        data-bs-placement="right" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o"></i></a>

                                    <div class="product-button product-btn-warning d-flex flex-column gap-2">
                                        <a href="#!" class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                                class="iccl iccl-eye"></i></a>
                                        <a href="#!" class="btn rounded-pill fs-14"><span>Quick Shop</span> <i
                                                class="iccl iccl-cart"></i></a>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-2 fs-15 lh-base"><a href="{{ url('product/product-detail-layout-01')}}"
                                            class="main_link_warning">HAY About A Danish Style Dining Chair White</a>
                                    </h6>
                                    <p class="mb-0 fs-16 text-muted">
                                        <span>$300.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end pin-type 1 -->

            <!-- pin-type 2 -->
            <div class="modal fade modal-overl pin_popup" id="pinType2" tabindex="-1" aria-labelledby="pinType1Label"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-20">
                            <div x-data="{ imageUrl: '/build/images/home-furniture/pr-08.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true"
                                x-on:mouseleave="isHovered = false" class="topbar-product-card">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/home-furniture/pr-08.jpg' : imageUrl"
                                        alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                        data-bs-placement="right" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o"></i></a>

                                    <div class="product-button product-btn-warning d-flex flex-column gap-2">
                                        <a href="#!" class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                                class="iccl iccl-eye"></i></a>
                                        <a href="#!" class="btn rounded-pill fs-14"><span>Quick Shop</span> <i
                                                class="iccl iccl-cart"></i></a>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-2 fs-15 lh-base"><a href="{{ url('product/product-detail-layout-01')}}"
                                            class="main_link_warning">Bottle Grinder, Small</a></h6>
                                    <p class="mb-0 fs-16 text-muted">
                                        <span>$70.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end pin-type 2 -->

            <!-- pin-type 3 -->
            <div class="modal fade modal-overl pin_popup" id="pinType3" tabindex="-1"
                aria-labelledby="pinType1Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-20">
                            <div x-data="{ imageUrl: '/build/images/home-furniture/pr-09.jpg', isHovered: false }" class="topbar-product-card"
                                x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false"
                                class="topbar-product-card">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/home-furniture/pr-09.jpg' : imageUrl"
                                        alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                        data-bs-placement="right" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o"></i></a>

                                    <div class="product-button product-btn-warning d-flex flex-column gap-2">
                                        <a href="#!" class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                                class="iccl iccl-eye"></i></a>
                                        <a href="#!" class="btn rounded-pill fs-14"><span>Quick Shop</span> <i
                                                class="iccl iccl-cart"></i></a>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-2 fs-15 lh-base"><a href="{{ url('product/product-detail-layout-01')}}"
                                            class="main_link_warning">Stackable Hee Bar</a></h6>
                                    <p class="mb-0 fs-16 text-muted">
                                        <span>$150.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end pin-type 3 -->
        </section>

        <section class="kalles-furnitur-type-banner">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9 text-center">
                        <h6 class="mb-3 title fw-medium">URBAN DANISH DESIGN SINCE 1952</h6>
                        <p class="text-muted sub-title">We are not just another furniture store. We have worked with
                            interior design for more than 60 years, and we have a strong set of beliefs that run through
                            everything we do.</p>
                        <a href="#!"
                            class="btn d-flex align-items-center mx-auto rounded-0 fw-medium justify-content-center text-uppercase text-hover-white">Read
                            Our Story</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="kalles-furnitur-featured-collection position-relative">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center wrap_title position-relative">
                            <h3 class="font-roboto-slab mb-3 fw-light fs-35 pb-1">New Products</h3>
                            <p class="fs-16 text-muted mb-5">Update your space with new finds in dining furniture,
                                bedroom
                                sets, living room sofas and chairs, and accent tables from around the world</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row g-4 text-center">
                    <div class="col-md-4">
                        <div x-data="{ imageUrl: '/build/images/home-furniture/pr-01.jpg' }" class="topbar-product-card pb-3">
                            <div class="position-relative overflow-hidden">
                                <img :src="imageUrl" alt="" class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-warning"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-warning"></i></a>
                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn rounded-pill bg-blue-dark text-white fs-14"><span>Quick View</span>
                                        <i class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn rounded-pill bg-blue-dark text-white fs-14"
                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-blue-dark rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                </div>

                            </div>
                            <div class="text-start mt-3">
                                <h6 class="mb-2 fw-medium"><a href="{{ url('product/product-detail-layout-01')}}"
                                        class="main_link_warning fs-18">Hans Wegner Style Elbow Chair</a></h6>
                                <p class="mb-0 fs-16 text-muted">
                                    <span>$300.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-4">
                        <div x-data="{ imageUrl: '/build/images/home-furniture/pr-02.png' }" class="topbar-product-card pb-3">
                            <div class="position-relative overflow-hidden">
                                <span
                                    class="onsale position-absolute bg-danger text-white d-flex align-items-center justify-content-center">-23%</span>
                                <img :src="imageUrl" alt="" class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-warning"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-warning"></i></a>
                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn rounded-pill bg-blue-dark text-white fs-14"><span>Quick View</span>
                                        <i class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn rounded-pill bg-blue-dark text-white fs-14"
                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-blue-dark rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                </div>
                            </div>
                            <div class="text-start mt-3">
                                <h6 class="mb-2 fw-medium"><a href="{{ url('product/product-detail-layout-01')}}"
                                        class="main_link_warning fs-18">Rook Tripod Table Lamp Wooden</a></h6>
                                <p class="mb-0 fs-16 text-muted">
                                    <del>$800.00</del>
                                    <span class="text-warning">$620.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-4">
                        <div x-data="{ imageUrl: '/build/images/home-furniture/pr-03.png' }" class="topbar-product-card pb-3">
                            <div class="position-relative overflow-hidden">
                                <img :src="imageUrl" alt="" class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-warning"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-warning"></i></a>

                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn rounded-pill bg-blue-dark text-white fs-14"><span>Quick View</span>
                                        <i class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn rounded-pill bg-blue-dark text-white fs-14"
                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-blue-dark rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                </div>
                            </div>
                            <div class="text-start mt-3">
                                <h6 class="mb-2 fw-medium"><a href="{{ url('product/product-detail-layout-01')}}"
                                        class="main_link_warning fs-18">Flow Table Lamp EU Spainmboo Chair</a></h6>
                                <p class="mb-0 fs-16 text-muted">
                                    <span>$110.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-4">
                        <div x-data="{ imageUrl: '/build/images/home-furniture/pr-04.png' }" class="topbar-product-card pb-3">
                            <div class="position-relative overflow-hidden">
                                <img :src="imageUrl" alt="" class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-warning"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-warning"></i></a>

                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn rounded-pill bg-blue-dark text-white fs-14"><span>Quick View</span>
                                        <i class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn rounded-pill bg-blue-dark text-white fs-14"
                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-blue-dark rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                </div>
                            </div>
                            <div class="text-start mt-3">
                                <h6 class="mb-2 fw-medium"><a href="{{ url('product/product-detail-layout-01')}}"
                                        class="main_link_warning fs-18">3-seater sofa w/ chaiselong</a></h6>
                                <p class="mb-0 fs-16 text-muted">
                                    <span>$680.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-4">
                        <div x-data="{ imageUrl: '/build/images/home-furniture/pr-05.png' }" class="topbar-product-card pb-3">
                            <div class="position-relative overflow-hidden">
                                <img :src="imageUrl" alt="" class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-warning"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-warning"></i></a>

                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn rounded-pill bg-blue-dark text-white fs-14"><span>Quick View</span>
                                        <i class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn rounded-pill bg-blue-dark text-white fs-14"
                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-blue-dark rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                </div>
                            </div>
                            <div class="text-start mt-3">
                                <h6 class="mb-2 fw-medium"><a href="{{ url('product/product-detail-layout-01')}}"
                                        class="main_link_warning fs-18">Liby Sage Green</a></h6>
                                <p class="mb-0 fs-16 text-muted">
                                    <span>$100.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-4">
                        <div x-data="{ imageUrl: '/build/images/home-furniture/pr-06.jpg' }" class="topbar-product-card pb-3">
                            <div class="position-relative overflow-hidden">
                                <img :src="imageUrl" alt="" class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-warning"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-warning"></i></a>

                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn rounded-pill bg-blue-dark text-white fs-14"><span>Quick View</span>
                                        <i class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn rounded-pill bg-blue-dark text-white fs-14"
                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-blue-dark rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                </div>
                            </div>
                            <div class="text-start mt-3">
                                <h6 class="mb-2 fw-medium"><a href="{{ url('product/product-detail-layout-01')}}"
                                        class="main_link_warning fs-18">Andie Light Grey Oak Legs</a></h6>
                                <p class="mb-0 fs-16 text-muted">
                                    <span>$910.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->

        <div class="container">
            <div class="kalles-furniture-wrap-inner bg-warning text-white position-relative z-1">
                <p class="sub-title mb-1">RECENT PROJECTS</p>
                <h4 class="heading mb-0 fs-45">Hampton Chaise Corner Sofa Lounge</h4>
            </div>
        </div>
        <section class="kalles-furniture-recent-project-section jarallax position-relative"
            style="background-image: url('/build/images/home-furniture/recent-project-banner.jpg');background-size: cover;background-position: center;">
        </section><!--end section-->


        <section class="kalles-furniture-testimonial">
            <div class="container">
                <div class="row">
                    <div class="col-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="61px" height="54px">
                            <path fill-rule="evenodd" fill="rgb(41, 51, 65)"
                                d="M57.426,49.283 L46.839,49.283 L42.422,53.653 C42.190,53.884 41.885,53.999 41.580,53.999 C41.275,53.999 40.970,53.884 40.738,53.653 L36.321,49.283 L25.734,49.283 C23.764,49.283 22.160,47.696 22.160,45.746 L22.160,45.409 L20.262,47.287 C20.030,47.517 19.725,47.632 19.420,47.632 C19.115,47.632 18.810,47.517 18.577,47.287 L14.161,42.916 L3.574,42.916 C1.603,42.916 0.000,41.329 0.000,39.379 L0.000,17.685 C0.000,15.734 1.603,14.147 3.574,14.147 L11.080,14.147 L11.080,3.536 C11.080,1.586 12.683,-0.001 14.654,-0.001 L46.346,-0.001 C48.316,-0.001 49.920,1.586 49.920,3.536 L49.920,20.515 L57.426,20.515 C59.397,20.515 61.000,22.101 61.000,24.051 L61.000,45.746 C61.000,47.696 59.397,49.283 57.426,49.283 ZM11.080,25.231 L11.080,16.505 L3.574,16.505 C2.917,16.505 2.383,17.035 2.383,17.685 L2.383,39.379 C2.383,40.029 2.917,40.558 3.574,40.558 L14.654,40.558 C14.970,40.558 15.273,40.682 15.497,40.903 L19.420,44.786 L23.343,40.903 C23.566,40.682 23.870,40.558 24.185,40.558 L35.266,40.558 C35.923,40.558 36.457,40.029 36.457,39.379 L36.457,28.768 L35.759,28.768 L31.342,33.139 C31.110,33.368 30.805,33.483 30.500,33.483 C30.195,33.483 29.890,33.368 29.657,33.139 L25.241,28.768 L14.654,28.768 C12.683,28.768 11.080,27.181 11.080,25.231 ZM47.537,3.536 C47.537,2.886 47.003,2.358 46.346,2.358 L14.654,2.358 C13.997,2.358 13.463,2.886 13.463,3.536 L13.463,25.231 C13.463,25.881 13.997,26.409 14.654,26.409 L25.734,26.409 C26.050,26.409 26.353,26.534 26.577,26.755 L30.500,30.637 L34.423,26.755 C34.647,26.534 34.950,26.409 35.266,26.409 L46.346,26.409 C47.003,26.409 47.537,25.881 47.537,25.231 L47.537,3.536 ZM58.617,24.051 C58.617,23.401 58.083,22.872 57.426,22.872 L49.920,22.872 L49.920,25.231 C49.920,27.181 48.316,28.768 46.346,28.768 L38.840,28.768 L38.840,39.379 C38.840,41.329 37.236,42.916 35.266,42.916 L24.679,42.916 L24.543,43.050 L24.543,45.746 C24.543,46.396 25.077,46.925 25.734,46.925 L36.814,46.925 C37.130,46.925 37.433,47.049 37.657,47.270 L41.580,51.152 L45.503,47.270 C45.727,47.049 46.030,46.925 46.346,46.925 L57.426,46.925 C58.083,46.925 58.617,46.396 58.617,45.746 L58.617,24.051 ZM41.580,22.165 L25.266,22.165 C24.608,22.165 24.075,21.637 24.075,20.986 C24.075,20.335 24.608,19.807 25.266,19.807 L41.580,19.807 C42.238,19.807 42.771,20.335 42.771,20.986 C42.771,21.637 42.238,22.165 41.580,22.165 ZM41.580,15.562 C41.267,15.562 40.959,15.436 40.738,15.217 C40.516,14.997 40.389,14.694 40.389,14.384 C40.389,14.074 40.516,13.769 40.738,13.550 C40.959,13.330 41.267,13.204 41.580,13.204 C41.893,13.204 42.201,13.330 42.422,13.550 C42.644,13.769 42.771,14.074 42.771,14.384 C42.771,14.694 42.644,14.997 42.422,15.217 C42.201,15.436 41.893,15.562 41.580,15.562 ZM41.580,8.960 L19.437,8.960 C18.780,8.960 18.246,8.432 18.246,7.781 C18.246,7.129 18.780,6.601 19.437,6.601 L41.580,6.601 C42.238,6.601 42.771,7.129 42.771,7.781 C42.771,8.432 42.238,8.960 41.580,8.960 ZM18.246,14.384 C18.246,13.732 18.780,13.204 19.437,13.204 L35.664,13.204 C36.322,13.204 36.855,13.732 36.855,14.384 C36.855,15.034 36.322,15.562 35.664,15.562 L19.437,15.562 C18.780,15.562 18.246,15.034 18.246,14.384 ZM19.420,19.807 L19.520,19.807 C20.178,19.807 20.711,20.335 20.711,20.986 C20.711,21.637 20.178,22.165 19.520,22.165 L19.420,22.165 C18.762,22.165 18.228,21.637 18.228,20.986 C18.228,20.335 18.762,19.807 19.420,19.807 Z">
                            </path>
                        </svg>
                    </div><!--end col-->
                    <div class="col">
                        <h6 class="fs-16 mb-1 sub-title">52.910 + HAPPY CUSTOMERS</h6>
                        <h1 class="title fw-light font-roboto-slab">What folks are saying about us</h1>
                    </div>
                </div><!--end row-->
                <div class="quotes_wrapper row g-0">
                    <div class="col-lg-4 col-md-6">
                        <div class="quote_slide border">
                            <p class="text-muted fs-16">Really good design/documentation, pretty much everything is
                                nicely
                                setup. Support team is very responsive to problems. Highly recommended to everyone! I’m
                                your
                                fan already</p>
                            <div class="d-flex align-items-center gap-4 mt-4 pt-2">
                                <img src="{{ URL::asset('/build/images/home-furniture/customer-01.jpg')}}" alt=""
                                    class="square-md rounded-circle">
                                <div>
                                    <h6 class="quote_author mb-0 text-uppercase">ARTHUR HANSEN</h6>
                                    <p class="text-muted mb-0">CEO / Letters Inc</p>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-4 col-md-6">
                        <div class="quote_slide border">
                            <p class="text-muted fs-16">What an amazing theme and customer support!!! I knew I chose
                                well
                                with you, guys!! I am not a developer, I just adjust things I can manage, but everything
                                was
                                so easy customizing the theme.</p>
                            <div class="d-flex align-items-center gap-4 mt-4 pt-2">
                                <img src="{{ URL::asset('/build/images/home-furniture/customer-02.jpg')}}" alt=""
                                    class="square-md rounded-circle">
                                <div>
                                    <h6 class="quote_author mb-0 text-uppercase">ANNIE QUINN</h6>
                                    <p class="text-muted mb-0">Co-Founder / April Inc</p>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-4 col-md-6">
                        <div class="quote_slide border">
                            <p class="text-muted fs-16">Octopus templates are awesome and very contemporary. They are
                                super
                                sleek and fast. The best is the customer support. Usually response is less than 30
                                minutes.
                                Love it.</p>
                            <div class="d-flex align-items-center gap-4 mt-4 pt-2">
                                <img src="{{ URL::asset('/build/images/home-furniture/customer-03.jpg')}}" alt=""
                                    class="square-md rounded-circle">
                                <div>
                                    <h6 class="quote_author mb-0 text-uppercase">CHESTER TORRES</h6>
                                    <p class="text-muted mb-0">VP of Product / Local Inc</p>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->

        <section class="kalles-furnitur-featured-collection position-relative">
            <div class="container" dir="ltr">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center wrap_title position-relative">
                            <h3 class="font-roboto-slab mb-3 fw-light fs-35 pb-1">Best Seller</h3>
                            <p class="fs-16 text-muted mb-5">The point of using Lorem Ipsum is that it has a
                                more-or-less
                                normal distribution of letters, as opposed to using 'Content here, content here', making
                                it
                                look like readable English.</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row g-3 mt-4 js_carousel"
                    data-flickity='{"imagesLoaded": 0,"adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": 1,"pageDots": false, "autoPlay" : 0, "pauseAutoPlayOnHover" : true, "rightToLeft": false }'
                    dir="ltr">
                    <div class="col-lg-4">
                        <div x-data="{ imageUrl: '/build/images/home-furniture/pr-01.jpg' }" class="topbar-product-card pb-3">
                            <div class="position-relative overflow-hidden">
                                <img :src="imageUrl" alt="" class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-warning"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-warning"></i></a>

                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn rounded-pill bg-blue-dark text-white fs-14"><span>Quick View</span>
                                        <i class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn rounded-pill bg-blue-dark text-white fs-14"
                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-blue-dark rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h6 class="mb-2 fw-medium"><a href="{{ url('product/product-detail-layout-01')}}"
                                        class="main_link_warning fs-18">Hans Wegner Style Elbow Chair</a></h6>
                                <p class="mb-0 fs-16 text-muted">
                                    <span>$300.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-4">
                        <div x-data="{ imageUrl: '/build/images/home-furniture/pr-05.png' }" class="topbar-product-card pb-3">
                            <div class="position-relative overflow-hidden">
                                <img :src="imageUrl" alt="" class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-warning"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-warning"></i></a>

                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn rounded-pill bg-blue-dark text-white fs-14"><span>Quick View</span>
                                        <i class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn rounded-pill bg-blue-dark text-white fs-14"
                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-blue-dark rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h6 class="mb-2 fw-medium"><a href="{{ url('product/product-detail-layout-01')}}"
                                        class="main_link_warning fs-18">Liby Sage Green</a></h6>
                                <p class="mb-0 fs-16 text-muted">
                                    <span>$100.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-4">
                        <div x-data="{ imageUrl: '/build/images/home-furniture/pr-06.jpg' }" class="topbar-product-card pb-3">
                            <div class="position-relative overflow-hidden">
                                <img :src="imageUrl" alt="" class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-warning"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-warning"></i></a>

                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn rounded-pill bg-blue-dark text-white fs-14"><span>Quick View</span>
                                        <i class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn rounded-pill bg-blue-dark text-white fs-14"
                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-blue-dark rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h6 class="mb-2 fw-medium"><a href="{{ url('product/product-detail-layout-01')}}"
                                        class="main_link_warning fs-18">Andie Light Grey Oak Legs</a></h6>
                                <p class="mb-0 fs-16 text-muted">
                                    <span>$910.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-4">
                        <div x-data="{ imageUrl: '/build/images/home-furniture/pr-04.png' }" class="topbar-product-card pb-3">
                            <div class="position-relative overflow-hidden">
                                <img :src="imageUrl" alt="" class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-warning"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-warning"></i></a>

                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn rounded-pill bg-blue-dark text-white fs-14"><span>Quick View</span>
                                        <i class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn rounded-pill bg-blue-dark text-white fs-14"
                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-blue-dark rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h6 class="mb-2 fw-medium"><a href="{{ url('product/product-detail-layout-01')}}"
                                        class="main_link_warning fs-18">3-seater sofa w/ chaiselong</a></h6>
                                <p class="mb-0 fs-16 text-muted">
                                    <span>$680.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-4">
                        <div x-data="{ imageUrl: '/build/images/home-furniture/pr-11.jpg' }" class="topbar-product-card pb-3">
                            <div class="position-relative overflow-hidden">
                                <img :src="imageUrl" alt="" class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-warning"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-warning"></i></a>

                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn rounded-pill bg-blue-dark text-white fs-14"><span>Quick View</span>
                                        <i class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn rounded-pill bg-blue-dark text-white fs-14"
                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-blue-dark rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h6 class="mb-2 fw-medium"><a href="{{ url('product/product-detail-layout-01')}}"
                                        class="main_link_warning fs-18">Fabio Antracit</a></h6>
                                <p class="mb-0 fs-16 text-muted">
                                    <span>$420.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-4">
                        <div x-data="{ imageUrl: '/build/images/home-furniture/pr-02.png' }" class="topbar-product-card pb-3">
                            <div class="position-relative overflow-hidden">
                                <img :src="imageUrl" alt="" class="img-fluid">
                                <a href="#" class="d-lg-none position-absolute "
                                    style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                        class="facl facl-heart-o text-warning"></i></a>
                                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-warning"></i></a>

                                <div class="product-button d-none d-lg-flex flex-column gap-2">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn rounded-pill bg-blue-dark text-white fs-14"><span>Quick View</span>
                                        <i class="iccl iccl-eye"></i></a>
                                    <button type="button" class="btn rounded-pill bg-blue-dark text-white fs-14"
                                        data-bs-toggle="modal" data-bs-target="#cardModal"
                                        class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                        <i class="iccl iccl-cart"></i></button>
                                </div>
                                <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-blue-dark rounded-pill m-2"
                                    style="z-index: 1;">
                                    <a href="#exampleModal" data-bs-toggle="modal"
                                        class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;"><i
                                            class="iccl iccl-eye fw-semibold text-white"></i></a>
                                    <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                        style="width:36px; height: 36px;" data-bs-toggle="modal"
                                        data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                        <i class="iccl iccl-cart fw-semibold text-white"></i></button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h6 class="mb-2 fw-medium"><a href="{{ url('product/product-detail-layout-01')}}"
                                        class="main_link_warning fs-18">Retro Dining Rectangle</a></h6>
                                <p class="mb-0 fs-16 text-muted">
                                    <span>$300.00</span>
                                </p>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->

        <div class="container">
            <div class="kalles-furniture-wrap-inner bg-warning text-white position-relative z-1">
                <p class="sub-title mb-1">COLLECTION</p>
                <h4 class="heading mb-0">Impressive Scandinavi Interior Design</h4>
            </div>
        </div>
        <section class="kalles-furniture-recent-project-section jarallax position-relative"
            style="background-image: url('/build/images/home-furniture/collection-banner.jpg');background-size: cover;background-position: center;">
        </section><!--end section-->

        <section class="kalles-furniture-feature-blog">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center wrap_title position-relative">
                            <h3 class="font-roboto-slab mb-3 fw-light fs-35 pb-1">Inspiration</h3>
                            <p class="fs-16 text-muted mb-5">Contrary to popular belief, Lorem Ipsum is not simply
                                random
                                text. It has roots in a piece of classical Latin literature from 45 BC, making it over
                                2000
                                years old.</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row mt-4 g-lg-4 g-2">
                    <div class="col-md-4">
                        <div class="post-blog img-zoom overflow-hidden position-relative">
                            <img src="{{ URL::asset('/build/images/home-furniture/blog-01.jpg')}}" alt=""
                                class="img-fluid w-100 object-fit-cover">
                            <div
                                class="post-info position-absolute start-0 top-0 end-0 bottom-0 fs-16 d-flex align-items-center justify-content-center p-4 bg-white border">
                                <div>
                                    <div class="d-flex gap-1 align-items-center text-muted mb-2">
                                        <span class="me-1">By <span class="text-body">admin</span></span>
                                        On
                                        <span class="text-body">June 13, 2024</span>
                                    </div>
                                    <h6 class="fs-16 mb-2 lh-base"><a href="#!" class="main_link_warning">Tour a
                                            Luminous,
                                            Cozy and Stylish Family Home in Sweden</a></h6>
                                    <p class="text-muted mb-2">In part one of this post, we looked at the contemporary
                                        lifestyle setting: Tres Chic. In part two of the series, we...</p>
                                    <a href="#!" class="main_link_warning">READ MORE</a>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-4">
                        <div class="post-blog img-zoom overflow-hidden position-relative">
                            <img src="{{ URL::asset('/build/images/home-furniture/blog-02.jpg')}}" alt=""
                                class="img-fluid w-100 object-fit-cover">
                            <div
                                class="post-info position-absolute start-0 top-0 end-0 bottom-0 fs-16 d-flex align-items-center justify-content-center p-4 bg-white border">
                                <div>
                                    <div class="d-flex gap-1 align-items-center text-muted mb-2">
                                        <span class="me-1">By <span class="text-body">admin</span></span>
                                        On
                                        <span class="text-body">June 13, 2024</span>
                                    </div>
                                    <h6 class="fs-16 mb-2 lh-base"><a href="#!" class="main_link_warning">The
                                            Perfect
                                            Escape: A Remote Cabin in Iceland For a Stylish</a></h6>
                                    <p class="text-muted mb-2">In part one of this post, we looked at the contemporary
                                        lifestyle setting: Tres Chic. In part two of the series, we...</p>
                                    <a href="#!" class="main_link_warning">READ MORE</a>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-4">
                        <div class="post-blog img-zoom overflow-hidden position-relative">
                            <img src="{{ URL::asset('/build/images/home-furniture/blog-03.jpg')}}" alt=""
                                class="img-fluid w-100 object-fit-cover">
                            <div
                                class="post-info position-absolute start-0 top-0 end-0 bottom-0 fs-16 d-flex align-items-center justify-content-center p-4 bg-white border">
                                <div>
                                    <div class="d-flex gap-1 align-items-center text-muted mb-2">
                                        <span class="me-1">By <span class="text-body">admin</span></span>
                                        On
                                        <span class="text-body">June 13, 2024</span>
                                    </div>
                                    <h6 class="fs-16 mb-2 lh-base"><a href="#!" class="main_link_warning">Tour
                                            the
                                            Perfectly
                                            Styled Oslo Home of Katerina Dima</a></h6>
                                    <p class="text-muted mb-2">In part one of this post, we looked at the contemporary
                                        lifestyle setting: Tres Chic. In part two of the series, we...</p>
                                    <a href="#!" class="main_link_warning">READ MORE</a>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->

        <section class="kalles-furniture-newsletter overflow-hidden">
            <div class="container border-top">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-10">
                        <h1 class="font-roboto-slab fw-light mb-2 text-center text-lg-start">Get Discount 20% Off</h1>
                        <p class="text-muted fs-16 mb-0 text-center text-lg-start">Subscribe to our newsletters now and
                            stay up-to-date with new
                            collections, the latest lookbooks.</p>
                    </div>
                    <div class="col-lg-6 col-md-10">
                        <div class="input-group signup-newsletter-form">
                            <input type="text" class="form-control rounded-0 signup-newsletter-form"
                                placeholder="Your email address" aria-describedby="button-addon2">
                            <button class="btn btn-dark text-uppercase min-w-150 rounded-0" type="submit"
                                id="button-addon2">SubScribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('partials.footer-furniture')
        @include('partials.popup')
    </div>
    @include('partials.card-model')
    @include('partials.vendor-scripts')
<script  src="{{ URL::asset('build/libs/flickity/flickity.pkgd.min.js')}}"></script>
<script  src="{{ URL::asset('build/js/main.js')}}"></script>
<script  src="{{ URL::asset('build/js/app.js')}}"></script>
</body>

</html>
