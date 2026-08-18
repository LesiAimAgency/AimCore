@extends('layouts.master_product')
@section('title', 'Home Default | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme ')
@section('content')
<div>


    <!-- main slide -->
    <div style="background-image: url('/build/images/blog-page/single-header__bg.jpg'); background-position: center; background-size: cover;" class="position-relative">
        <div class="position-absolute top-0 start-0 right-0 bottom-0 bg-dark w-100 opacity-50"></div>
        <div class="px-4">
            <div class="text-white text-center py-5 position-relative">
                <h4 class="fs-20 fw-medium">SPRING – SUMMER TRENDING 2020</h4>
                <p class="fs-14 section-subtitle sub-title font-secondary fst-italic">April 6, 2020</p>
                <p class="text-white mb-0">In Life Style 6 comments</p>
            </div>
        </div>
    </div>
    <!-- end main slide -->


    <section>
        <div class="container">
            <div class="mt-4 text-muted pt-3">
                <p>
                    Typography is the work of <span class="sub-title font-secondary fst-italic"> typesetters,
                        compositors, typographers, graphic designers, art directors, manga artists, comic book
                        artists, graffiti artists, </span> and now—anyone who arranges words, letters, numbers, and
                    symbols for
                    publication, display, or distribution—from clerical <b> workers and newsletter writers to anyone
                        self-publishing materials. </b>

                </p>
                <div class="row row-cols-2 row-cols-md-3 g-2">
                    <div class="col">
                        <a href="{{ url('shop_pages/shop')}}" class="db">
                            <img src="{{ URL::asset('/build/images/portfolio/gallery-full-size-01.jpg')}}" class="img-fluid h-100" alt="">
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{ url('shop_pages/shop')}}" class="db">
                            <img src="{{ URL::asset('/build/images/portfolio/gallery-02.jpg')}}" class="img-fluid h-100" alt="">
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{ url('shop_pages/shop')}}" class="db">
                            <img src="{{ URL::asset('/build/images/portfolio/gallery-03.jpg')}}" class="img-fluid h-100" alt="">
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{ url('shop_pages/shop')}}" class="db">
                            <img src="{{ URL::asset('/build/images/portfolio/gallery-04.jpg')}}" class="img-fluid h-100" alt="">
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{ url('shop_pages/shop')}}" class="db">
                            <img src="{{ URL::asset('/build/images/portfolio/gallery-05.jpg')}}" class="img-fluid h-100" alt="">
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{ url('shop_pages/shop')}}" class="db">
                            <img src="{{ URL::asset('/build/images/portfolio/gallery-06.jpg')}}" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
                <p class="lookbook-contain position-relative sub-title font-secondary mt-4 mb-0 fst-italic py-4 px-5 gray-light">
                    Sed utgio perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                    laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                    beatae vitae dicta sunt explicabo.
                </p>
            </div>
            <div class="row g-4 cat-section mt-0 py-0">
                <div class="col-md-6">
                    <a href="{{ url('shop_pages/shop-right-sidebar')}}" class="d-block position-relative cat_grid_item overflow-hidden h-624">
                        <div class="h-100 w-100 cat-grid-img" style="background-image: url('{{ asset('/build/images/home-01/bn-01.jpg')}}"></div>
                        <div class="cat-grid-button text-body">
                            <div class="cat_grid_item__title">Women</div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ url('shop_pages/shop-right-sidebar')}}" class="d-block position-relative cat_grid_item overflow-hidden h-300 mb-4">
                        <div class="h-100 w-100 cat-grid-img" style="background-image: url('{{ asset('/build/images/home-01/bn-02.jpg')}}"></div>
                        <div class="cat-grid-button text-body">
                            <div class="cat_grid_item__title">Accessories</div>
                        </div>
                    </a>
                    <a href="{{ url('shop_pages/shop-right-sidebar')}}" class="d-block position-relative cat_grid_item overflow-hidden h-300">
                        <div class="h-100 w-100 cat-grid-img" style="background-image: url('{{ asset('/build/images/home-01/bn-03.jpg')}}"></div>
                        <div class="cat-grid-button text-body">
                            <div class="cat_grid_item__title">Footwear</div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ url('shop_pages/shop-right-sidebar')}}" class="d-block position-relative cat_grid_item overflow-hidden h-624">
                        <div class="h-100 w-100 cat-grid-img" style="background-image: url('{{ asset('/build/images/home-01/bn-04.jpg')}}"></div>
                        <div class="cat-grid-button text-body">
                            <div class="cat_grid_item__title">Watches</div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row mt-4">
                <div>
                    <div class="position-relative home-lookbook-section" style="background-image: url('/build/images/single-product/thumb-right/bg-loobook.jpg'); height: 650px;">
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
                            <div class="modal-body p-20">
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
            <div class="row my-4">
                <p class="text-muted">
                    Until the Digital Age, typography was a specialized occupation. Digitization opened up typography to
                    new generations of previously unrelated designers and lay users, and David Jury, head of graphic
                    design at Colchester Institute in England, states that “typography is now something everybody does.
                    As the capability to create typography has become ubiquitous, the application of principles and best
                    practices developed over generations of skilled workers and professionals has diminished.
                    Ironically, at a time when scientific techniques.
                </p>
                <div class="d-flex justify-content-between border p-3">
                    <div class="d-flex gap-2 align-items-center">
                        <i class="facl facl-tags text-muted"></i>
                        <a href="#!">
                            Beauty,
                        </a>
                        <a href="#!">
                            Fashion
                        </a>
                    </div>
                    <a href="#comments">
                        <p class="mb-0">6 comments</p>
                    </a>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
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
                <h5 class="fw-bold">
                    RELATED ARTICLES
                </h5>
            </div>
            <div class="row pb-5 border-bottom mx-auto " data-flickity='{"imagesLoaded": 0,"adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": false,"percentPosition": 1,"pageDots": false, "autoPlay" : 0, "pauseAutoPlayOnHover" : true, "rightToLeft": false }'>
                <div class="col-md-4 col-sm-6 mx-lg-2">
                    <div class="blog-card">
                        <a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="overflow-hidden d-block blog-wrap">
                            <img src="{{ URL::asset('/build/images/blog-page/blog-slide-01.jpg')}}" alt="" class="img-fluid">
                        </a>
                        <h6 class="fs-16 mt-3 main_link"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">The Easiest Way to Break Out on Top</a></h6>
                        <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">April 6,
                            2020</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mx-lg-2">
                    <div class="blog-card">
                        <a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="overflow-hidden d-block blog-wrap">
                            <img src="{{ URL::asset('/build/images/blog-page/blog-slide-03.jpg')}}" alt="" class="img-fluid">
                        </a>
                        <h6 class="fs-16 mt-3 main_link"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">Style for couple in Weeding season</a></h6>
                        <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">April 6,
                            2020</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mx-lg-2">
                    <div class="blog-card">
                        <a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="overflow-hidden d-block blog-wrap">
                            <img src="{{ URL::asset('/build/images/blog-page/blog-slide-04.jpg')}}" alt="" class="img-fluid">
                        </a>
                        <h6 class="fs-16 mt-3 main_link"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">Cool Spring Street Style Looks</a></h6>
                        <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">April 6,
                            2020</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mx-lg-2">
                    <div class="blog-card">
                        <a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="overflow-hidden d-block blog-wrap">
                            <img src="{{ URL::asset('/build/images/blog-page/blog-slide-03.jpg')}}" alt="" class="img-fluid">
                        </a>
                        <h6 class="fs-16 mt-3 main_link"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">Style for couple in Weeding season</a></h6>
                        <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">April 6,
                            2020</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mx-lg-2">
                    <div class="blog-card">
                        <a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="overflow-hidden d-block blog-wrap">
                            <img src="{{ URL::asset('/build/images/blog-page/blog-slide-04.jpg')}}" alt="" class="img-fluid">
                        </a>
                        <h6 class="fs-16 mt-3 main_link"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">Cool Spring Street Style Looks</a></h6>
                        <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">April 6,
                            2020</span>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="py-5">
                <h5 class="pb-2"> 6 THOUGHTS ON “SPRING – SUMMER TRENDING 2020” </h5>
                <div class="mt-4">
                    <div class="row mt-4">
                        <div class="col-3 col-md-1">
                            <img src="{{ URL::asset('/build/images/blog-page/user-avatar-02.jpeg')}}" class="img-fluid" alt="">
                        </div>
                        <div class="col-9 col-md-11 px-0">
                            <h6 class="mb-1">SELENA RICHARDSON</h6>
                            <p class="my-1">Parturient odio mollis condimentum parturient a eu scelerisque auctor a
                                convallis blandit mi
                                vestibulum odio id rhoncus feugiat laoreet.</p>
                            <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">April 6,
                                2020 at 16:12pm</span>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-3 col-md-1">
                            <img src="/build/images/blog-page/no-avatar.jfif" class="img-fluid" alt="">
                        </div>
                        <div class="col-9 col-md-11 px-0">
                            <h6 class="mb-1">SFSF SA</h6>
                            <p class="my-1">smksj a;orw</p>
                            <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">January
                                8, 2021 at 01:00am</span>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-3 col-md-1">
                            <img src="/build/images/blog-page/no-avatar.jfif" class="img-fluid" alt="">
                        </div>
                        <div class="col-9 col-md-11 px-0">
                            <h6 class="mb-1">DFDSF</h6>
                            <p class="my-1">sfa ff</p>
                            <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">January
                                8, 2021 at 00:59am</span>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-3 col-md-1">
                            <img src="/build/images/blog-page/no-avatar.jfif" class="img-fluid" alt="">
                        </div>
                        <div class="col-9 col-md-11 px-0">
                            <h6 class="mb-1">JAMSHAID FAROOQUI</h6>
                            <p class="my-1">Test mail</p>
                            <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">July 31,
                                2020 at 17:39pm</span>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-3 col-md-1">
                            <img src="{{ URL::asset('/build/images/blog-page/user-avatar-01.jpeg')}}" class="img-fluid" alt="">
                        </div>
                        <div class="col-9 col-md-11 px-0">
                            <h6 class="mb-1">
                                MONICA JORK</h6>
                            <p class="my-1">Lorem ipsum dolor sit amet, lacus eu erat integer bibendum rutrum, sed arcu
                                molestie, in quis ornare, rhoncus scelerisque velit, nam feugiat nibh leo. Ac
                                suspendisse turpis posuere, cursus fames eu ege</p>
                            <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">April
                                12, 2020 at 16:09pm</span>
                        </div>
                    </div>
                </div>
                <div class="filter-pagination mt-5">
                    <ul class="pagination py-4 border-bottom d-flex justify-content-center">
                        <li class="active"><a href="#" class="text-danger">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
                <div class="mt-5">
                    <h6>LEAVE A COMMENT</h6>
                    <p class="text-muted">Your email address will not be published. Required fields are marked*</p>

                    <form action="" class="form-comman mt-4">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <label role="button" for="name" class="text-muted mb-2">Name *</label>
                                <input id="name" class="form-control rounded-0" type="text" aria-label="default input example">
                            </div>
                            <div class="col-lg-6">
                                <label role="button" for="email" class="text-muted mb-2">Email*</label>
                                <input id="email" class="form-control rounded-0" type="Email" aria-label="default input example">
                            </div>
                            <div class="col-12">
                                <label role="button" for="comment" class="text-muted mb-2">Comment*</label>
                                <textarea id="comment" class="form-control border-radious-none rounded-0" id="exampleFormControlTextarea1" rows="8"></textarea>
                            </div>
                            <div>
                                <button class="btn-load btn btn-custom-dark fw-semibold px-4 rounded-pill">Post Comment</button>
                            </div>
                        </div>
                    </form>
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


