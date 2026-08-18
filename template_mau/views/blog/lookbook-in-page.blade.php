@extends('layouts.master_product')
@section('title', 'Home Default | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme ')
@section('content')
<div>


    <!-- main slide -->
    <div style="background-image: url('/build/images/portfolio/p-04.jpg'); " class="position-relative">
        <div class="position-absolute top-0 start-0 right-0 bottom-0 bg-dark w-100 opacity-50"></div>
        <div class="px-4">
            <div class="text-white text-center py-5 position-relative">
                <h4 class="fs-20 fw-medium">BRANDING DESIGN MOCKUP</h4>
                <p class="fs-14 section-subtitle sub-title font-secondary fst-italic mb-0">April 5, 2020</p>
            </div>
        </div>
    </div>
    <!-- end main slide -->

    <section>
        <div class="container">
            <div class="my-4 text-muted">
                <p>
                    Typography is the work of <b class="fw-semibold">typesetters, compositors, typographers, graphic
                        designers, art directors, manga artists, comic book artists, graffiti artists,</b> and
                    now—anyone
                    who arranges words, letters, numbers, and symbols for publication, display, or distribution—from
                    clerical workers and newsletter writers to anyone self-publishing materials.
                </p>
                <p class="sub-title font-secondary my-3 fst-italic py-4 px-5 lookbook-contain position-relative gray-light ">
                    Sed utgio perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                    laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                    beatae vitae dicta sunt explicabo.
                </p>
                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur
                    magni dolores eos qui ratione voluptatem sequi nesciunt.</p>

            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="py-3">
                <h4 class="text-center mb-5"> Shop The Look</h4>
                <div class="row">
                    <div class="position-relative home-lookbook-section lookbookImg" style="background-image: url('/build/images/single-product/thumb-right/bg-loobook.jpg'); background-size: cover;">
                        <div class="pin-type position-absolute position-01">
                            <span class="zoompin"></span>
                            <a href="#pinType1" class="bg_color_red text-white rounded-circle d-flex align-items-center justify-content-center position-relative" data-bs-toggle="modal">
                                <i class="nav_link_icon position-relative"></i>
                            </a>
                        </div>
                        <div class="pin-type position-absolute position-02">
                            <span class="zoompin"></span>
                            <a href="#pinType2" class="bg_color_red text-white rounded-circle d-flex align-items-center justify-content-center position-relative" data-bs-toggle="modal">
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
                                                <a href="#!" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <a href="#!" class="btn rounded-pill fs-14"><span>Quick Shop</span> <i class="iccl iccl-cart"></i></a>
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
                                <div x-data="{ imageUrl: '/build/images/home-lookbook/pinner-p-03.jpg', isHovered: false }" class="topbar-product-card" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false" class="topbar-product-card">
                                    <div class="position-relative overflow-hidden">
                                        <span class="new-label bg-danger text-white rounded-circle"> -56% </span>
                                        <img :src="isHovered ? '/build/images/home-lookbook/pinner-p-04.jpg' : imageUrl" alt="" class="img-fluid">
                                        <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                                        <div class="product-button d-flex flex-column gap-2">
                                            <a href="#!" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                            <a href="#!" class="btn rounded-pill fs-14"><span>Quick Shop</span> <i class="iccl iccl-cart"></i></a>
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
                    </div><!-- end pin-type 2 -->

                    <!-- pin-type 3 -->
                    <div class="modal fade modal-overl modal-md" id="pinType3" tabindex="-1" aria-labelledby="pinType3Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="fs-16 mb-0 fw-normal">Sweatshirt in Stripe</h5>
                                </div>
                                <div class="modal-body">
                                    <p class="text-muted mb-0">With groundbreaking water resistant capabilities, The
                                        Mission has the
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
                                                <a href="#!" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <a href="#!" class="btn rounded-pill fs-14"><span>Quick Shop</span> <i class="iccl iccl-cart"></i></a>
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
                                                <a href="#!" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <a href="#!" class="btn rounded-pill fs-14"><span>Quick Shop</span> <i class="iccl iccl-cart"></i></a>
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
                                                <a href="#!" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <a href="#!" class="btn rounded-pill fs-14"><span>Quick Shop</span> <i class="iccl iccl-cart"></i></a>
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
                                    <p class="text-muted mb-0">With groundbreaking water resistant capabilities, The
                                        Mission has the
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
                                                <a href="#!" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                                <a href="#!" class="btn rounded-pill fs-14"><span>Quick Shop</span> <i class="iccl iccl-cart"></i></a>
                                            </div>
                                        </div>
                                        <div class="mt-3 text-center">
                                            <h6 class="mb-2"><a href="#!" class="product-title">La Bohème Rose Gold</a>
                                            </h6>
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
                                    <p class="text-muted mb-0">With groundbreaking water resistant capabilities, The
                                        Mission has the
                                        highest waterproof rating of any smartwatch on the market.</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- end pin-type 9 -->
                </div>
                <p class="text-muted my-5">
                    Typography is the work of <b class="fw-semibold">typesetters, compositors, typographers, graphic
                        designers, art directors, manga artists, comic book artists, graffiti artists,</b> and
                    now—anyone
                    who arranges words, letters, numbers, and symbols for publication, display, or distribution—from
                    clerical workers and newsletter writers to anyone self-publishing materials.
                </p>
                <div>
                    <h4 class="text-center mb-5">Shop The Look</h4>
                    <div class="row position-relative" data-flickity='{"imagesLoaded": 0,"adaptiveHeight": 1, "contain": 1, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": false,"prevNextButtons": true,"percentPosition": 1,"pageDots": false, "autoPlay" : 0, "pauseAutoPlayOnHover" : true, "rightToLeft": false }'>
                        <div class="col-md-3 col-6">
                            <div class="insta-card position-relative">
                                <img src="{{ URL::asset('/build/images/instagram/ins1_14.jpg')}}" alt="" class="img-fluid">
                                <a href="#!" class="d-flex position-absolute text-white start-0 end-0 top-0 bottom-0 align-items-center justify-content-center icon">
                                    <i class="facl facl-instagram fs-28"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="insta-card position-relative">
                                <img src="{{ URL::asset('/build/images/instagram/ins1_8.jpg')}}" alt="" class="img-fluid">
                                <a href="#!" class="d-flex position-absolute text-white start-0 end-0 top-0 bottom-0 align-items-center justify-content-center icon">
                                    <i class="facl facl-instagram fs-28"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="insta-card position-relative">
                                <img src="{{ URL::asset('/build/images/instagram/ins1_1.jpg')}}" alt="" class="img-fluid">
                                <a href="#!" class="d-flex position-absolute text-white start-0 end-0 top-0 bottom-0 align-items-center justify-content-center icon">
                                    <i class="facl facl-instagram fs-28"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="insta-card position-relative">
                                <img src="{{ URL::asset('/build/images/instagram/ins1_6.jpg')}}" alt="" class="img-fluid">
                                <a href="#!" class="d-flex position-absolute text-white start-0 end-0 top-0 bottom-0 align-items-center justify-content-center icon">
                                    <i class="facl facl-instagram fs-28"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="insta-card position-relative">
                                <img src="{{ URL::asset('/build/images/instagram/ins1_5.jpg')}}" alt="" class="img-fluid">
                                <a href="#!" class="d-flex position-absolute text-white start-0 end-0 top-0 bottom-0 align-items-center justify-content-center icon">
                                    <i class="facl facl-instagram fs-28"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="insta-card position-relative">
                                <img src="{{ URL::asset('/build/images/instagram/ins1_4.jpg')}}" alt="" class="img-fluid">
                                <a href="#!" class="d-flex position-absolute text-white start-0 end-0 top-0 bottom-0 align-items-center justify-content-center icon">
                                    <i class="facl facl-instagram fs-28"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="insta-card position-relative">
                                <img src="{{ URL::asset('/build/images/instagram/ins1_2.jpg')}}" alt="" class="img-fluid">
                                <a href="#!" class="d-flex position-absolute text-white start-0 end-0 top-0 bottom-0 align-items-center justify-content-center icon">
                                    <i class="facl facl-instagram fs-28"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="insta-card position-relative">
                                <img src="{{ URL::asset('/build/images/instagram/ins1_13.jpg')}}" alt="" class="img-fluid">
                                <a href="#!" class="d-flex position-absolute text-white start-0 end-0 top-0 bottom-0 align-items-center justify-content-center icon">
                                    <i class="facl facl-instagram fs-28"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-4 my-md-5 g-3">
                    <div class="col-md-6 col-lg-4 text-center border-end">
                        <h6>CATEGORY:</h6>
                        <p class="text-muted">Portfolio</p>
                    </div>
                    <div class="col-md-6 col-lg-4 text-center border-end">
                        <h6>AUTHOR:</h6>
                        <p class="text-muted">Admin</p>
                    </div>
                    <div class="col-md-6 col-lg-4 text-center">
                        <h6>TAGS:</h6>
                        <p class="text-muted">Accessories, Diy, Handmade</p>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="https://www.facebook.com" class="facebook social-icon d-flex justify-content-center align-items-center" data-bs-toggle="tooltip" title=" Share on Facebook">
                        <i class="facl facl-facebook"></i>
                    </a>
                    <a href="https://twitter.com" class="twitter social-icon d-flex justify-content-center align-items-center " data-bs-toggle="tooltip" title=" Share on Twitter">
                        <i class="facl facl-twitter"></i>
                    </a>
                    <a href="https://www.facebook.com" class="facebook social-icon d-flex justify-content-center align-items-center " data-bs-toggle="tooltip" title=" Share on Email">
                        <i class="facl facl-facebook"></i>
                    </a>
                    <a href="https://www.pinterest.com" class="pinterest social-icon d-flex justify-content-center align-items-center " data-bs-toggle="tooltip" title=" Share on Pinterest">
                        <i class="facl facl-pinterest"></i>
                    </a>
                    <a href="#" class="tumblr social-icon d-flex justify-content-center align-items-center " data-bs-toggle="tooltip" title=" Share on tumblr">
                        <i class="facl facl-tumblr"></i>
                    </a>
                    <a href="#" class="telegram social-icon d-flex justify-content-center align-items-center " data-bs-toggle="tooltip" title=" Share on Telegram">
                        <i class="facl facl-telegram"></i>
                    </a>
                </div>
                <div class="py-5 tooltip-back d-flex justify-content-center mt-4">
                    <a href="{{ url('portfolio/single-portfolio-with-shop')}}">
                        <h1>
                            <i class="pegk pe-7s-angle-left text-muted" data-toggle="tooltip" title=" Handmade Candle "></i>
                        </h1>
                    </a>
                    <a href="{{ url('portfolio/single-portfolio-with-shop')}}">
                        <i class="pegk pe-7s-keypad text-muted mx-5" style="font-size: 40px;" data-toggle="tooltip" title="Back to Portfolio "></i>
                    </a>
                    <a href="{{ url('portfolio/single-portfolio-with-shop')}}">
                        <h1>
                            <i class="pegk pe-7s-angle-right text-muted" data-toggle="tooltip" title="Handmade Craft "></i>
                        </h1>
                    </a>
                </div>
                <div class="d-flex justify-content-center mb-4">
                    <h4 class="fw-bold">
                        RELATED PORTFOLIO
                    </h4>

                </div>
                <div class="row py-2" data-flickity='{"imagesLoaded": 0,"adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": false,"percentPosition": 1,"pageDots": false, "autoPlay" : 0, "pauseAutoPlayOnHover" : true, "rightToLeft": false }'>
                    <div class="col-md-4 col-sm-6 px-2">
                        <a href="{{ url('shop_pages/shop')}}" class="d-lg-block portfolio-img text-black text-center">
                            <img src="{{ URL::asset('/build/images/portfolio/p-01.jpg')}}" class="img-fluid" alt="">
                            <div class="position-absolute start-50 translate-middle portfolio-card-detail" style="z-index: 2;">
                                <h6>WOMEN SHOES</h6>
                                <p class="text-muted">Accessories, DIY, Handmade</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 px-2">
                        <a href="{{ url('shop_pages/shop')}}" class="d-lg-block portfolio-img text-black text-center">
                            <img src="{{ URL::asset('/build/images/portfolio/p-02.jpg')}}" class="img-fluid" alt="">
                            <div class="position-absolute start-50 translate-middle portfolio-card-detail" style="z-index: 2;">
                                <h6>KALLES WATCH</h6>
                                <p class="text-muted">Accessories, DIY, Handmade</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 px-2">
                        <a href="{{ url('shop_pages/shop')}}" class="d-lg-block portfolio-img text-black text-center">
                            <img src="{{ URL::asset('/build/images/portfolio/p-03.jpg')}}" class="img-fluid" alt="">
                            <div class="position-absolute start-50 translate-middle portfolio-card-detail" style="z-index: 2;">
                                <h6>HANDMADE CRAFT</h6>
                                <p class="text-muted">Accessories, DIY, Handmade</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 px-2">
                        <a href="{{ url('shop_pages/shop')}}" class="d-lg-block portfolio-img text-black text-center">
                            <img src="{{ URL::asset('/build/images/portfolio/p-04.jpg')}}" class="img-fluid" alt="">
                            <div class="position-absolute start-50 translate-middle portfolio-card-detail" style="z-index: 2;">
                                <h6>Branding Design</h6>
                                <p class="text-muted">Accessories, DIY, Handmade</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 px-2">
                        <a href="{{ url('shop_pages/shop')}}" class="d-lg-block portfolio-img text-black text-center">
                            <img src="{{ URL::asset('/build/images/portfolio/p-05.jpg')}}" class="img-fluid" alt="">
                            <div class="position-absolute start-50 translate-middle portfolio-card-detail" style="z-index: 2;">
                                <h6>HAND CANDLE</h6>
                                <p class="text-muted">Accessories, DIY, Handmade</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 px-2">
                        <a href="{{ url('shop_pages/shop')}}" class="d-lg-block portfolio-img text-black text-center">
                            <img src="{{ URL::asset('/build/images/portfolio/p-06.jpg')}}" class="img-fluid" alt="">
                            <div class="position-absolute start-50 translate-middle portfolio-card-detail" style="z-index: 2;">
                                <h6>HAND CANDLE</h6>
                                <p class="text-muted">Accessories, DIY, Handmade</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')

    @include('partials.popup')

</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection


