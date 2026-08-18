@extends('layouts.master_product')
@section('title', 'Home Default | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme ')
@section('content')
<div>

    <!-- main slide -->
    <div style="background-image: url('/build/images/blog-page/single-header__bg.jpg'); background-size: cover; background-position: center;" class="position-relative">
        <div class="position-absolute top-0 start-0 right-0 bottom-0 bg-dark w-100 opacity-50"></div>
        <div class="px-4">
            <div class="text-white text-center py-5 position-relative">
                <h4 class="fs-20 fw-medium">SPRING – SUMMER TRENDING 2020</h4>
                <p class="section-subtitle sub-title font-secondary fst-italic fs-14 text-white">April 6, 2020</p>
                <p class="fs-14">In Life Style 6 comments</p>
            </div>
        </div>
    </div>
    <!-- end main slide -->
    <section>
        <div class="container">
            <div class="my-4 text-muted pt-4">
                <p>
                    Typography is the work of <span class="ection-subtitle sub-title font-secondary fst-italic">typesetters, compositors,
                        typographers, graphic
                        designers, art directors, manga artists, comic book artists, graffiti artists,</span> and
                    now—anyone
                    who arranges words, letters, numbers, and symbols for publication, display, or distribution—from
                    clerical <b class="fw-semibold">workers and newsletter writers to anyone self-publishing
                        materials.</b>
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
                            <img src="{{ URL::asset('/build/images/portfolio/gallery-06.jpg')}}" class="img-fluid h-100" alt="">
                        </a>
                    </div>
                </div>
                <p class="sub-title font-secondary lookbook-contain my-3 fst-italic py-4 px-5 position-relative gray-light">
                    Sed utgio perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                    laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                    beatae vitae dicta sunt explicabo.
                </p>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="py-3">
                <h3 class="shop-title position-relative w-100 text-center">
                    <span class="bg-white px-3 ">Shop The Look</span>
                </h3>
                <div class="row mx-2 mt-5" data-flickity='{"imagesLoaded": 0,"adaptiveHeight": 1, "contain": 1, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": false,"prevNextButtons": true,"percentPosition": 1,"pageDots": false, "autoPlay" : 0, "pauseAutoPlayOnHover" : true, "rightToLeft": false }'>
                    <div class="col-md-3 col-6">
                        <div class="insta-card position-relative">
                            <img src="{{ URL::asset('/build/images/instagram/ins1_14.jpg')}}" alt="" class="img-fluid">
                            <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal" class="card-spin position-01 position-absolute fs-14 bg-dark text-white rounded-circle fw-semibold">1</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="insta-card position-relative">
                            <img src="{{ URL::asset('/build/images/instagram/ins1_8.jpg')}}" alt="" class="img-fluid">
                            <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal" class="card-spin position-02 position-absolute fs-14 bg-dark text-white rounded-circle fw-semibold">1</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="insta-card position-relative">
                            <img src="{{ URL::asset('/build/images/instagram/ins1_1.jpg')}}" alt="" class="img-fluid">
                            <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal" class="card-spin position-03 position-absolute fs-14 bg-dark text-white rounded-circle fw-semibold">1</a>
                            <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal" class="card-spin position-04 position-absolute fs-14 bg-dark text-white rounded-circle fw-semibold">2</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="insta-card position-relative">
                            <img src="{{ URL::asset('/build/images/instagram/ins1_6.jpg')}}" alt="" class="img-fluid">
                            <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal" class="card-spin position-05 position-absolute fs-14 bg-dark text-white rounded-circle fw-semibold">1</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="insta-card position-relative">
                            <img src="{{ URL::asset('/build/images/instagram/ins1_5.jpg')}}" alt="" class="img-fluid">
                            <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal" class="card-spin position-06 position-absolute fs-14 bg-dark text-white rounded-circle fw-semibold">1</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="insta-card position-relative">
                            <img src="{{ URL::asset('/build/images/instagram/ins1_4.jpg')}}" alt="" class="img-fluid">
                            <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal" class="card-spin position-07 position-absolute fs-14 bg-dark text-white rounded-circle fw-semibold">1</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="insta-card position-relative">
                            <img src="{{ URL::asset('/build/images/instagram/ins1_2.jpg')}}" alt="" class="img-fluid">
                            <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal" class="card-spin position-02 position-absolute fs-14 bg-dark text-white rounded-circle fw-semibold">1</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="insta-card position-relative">
                            <img src="{{ URL::asset('/build/images/instagram/ins1_13.jpg')}}" alt="" class="img-fluid">
                            <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal" class="card-spin position-02 position-absolute fs-14 bg-dark text-white rounded-circle fw-semibold">1</a>
                        </div>
                    </div>
                </div>
                <p class="text-muted my-4">
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
                <div class="d-flex justify-content-center mt-5">
                    <a href="https://www.facebook.com" class="facebook social-icon d-flex justify-content-center align-items-center" data-bs-toggle="tooltip" title=" Share on Facebook">
                        <i class="facl facl-facebook"></i>
                    </a>
                    <a href="https://twitter.com" class="twitter social-icon d-flex justify-content-center align-items-center " data-bs-toggle="tooltip" title=" Share on Twitter">
                        <i class="facl facl-twitter"></i>
                    </a>
                    <a href="https://www.facebook.com" class="email social-icon d-flex justify-content-center align-items-center " data-bs-toggle="tooltip" title=" Share on Email">
                        <i class="lar la-envelope"></i>
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
                <div class="py-5 tooltip-back d-flex justify-content-center">
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
                <div class="row pb-5 border-bottom mx-0" data-flickity='{"imagesLoaded": 0,"adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": false,"percentPosition": 1,"pageDots": false, "autoPlay" : 0, "pauseAutoPlayOnHover" : true, "rightToLeft": false }'>
                    <div class="col-md-4 col-sm-6 px-lg-2">
                        <div class="blog-card">
                            <a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="overflow-hidden d-block blog-wrap">
                                <img src="{{ URL::asset('/build/images/blog-page/blog-slide-01.jpg')}}" alt="" class="img-fluid">
                            </a>
                            <h6 class="fs-16 mt-3 main_link"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">The Easiest Way to Break Out on Top</a></h6>
                            <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">April 6,
                                2020</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 px-lg-2">
                        <div class="blog-card">
                            <a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="overflow-hidden d-block blog-wrap">
                                <img src="{{ URL::asset('/build/images/blog-page/blog-slide-03.jpg')}}" alt="" class="img-fluid">
                            </a>
                            <h6 class="fs-16 mt-3 main_link"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">Style for couple in Weeding season</a></h6>
                            <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">April 6,
                                2020</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 px-lg-2">
                        <div class="blog-card">
                            <a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="overflow-hidden d-block blog-wrap">
                                <img src="{{ URL::asset('/build/images/blog-page/blog-slide-04.jpg')}}" alt="" class="img-fluid">
                            </a>
                            <h6 class="fs-16 mt-3 main_link"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">Cool Spring Street Style Looks</a></h6>
                            <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">April 6,
                                2020</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 px-lg-2">
                        <div class="blog-card">
                            <a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="overflow-hidden d-block blog-wrap">
                                <img src="{{ URL::asset('/build/images/blog-page/blog-slide-03.jpg')}}" alt="" class="img-fluid">
                            </a>
                            <h6 class="fs-16 mt-3 main_link"><a href="{{ url('blog/blog-post-with-instagram-shop')}}" class="text-reset">Style for couple in Weeding season</a></h6>
                            <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">April 6,
                                2020</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 px-lg-2">
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
                                <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">April
                                    6,
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
                                <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">July
                                    31,
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
                                <p class="my-1">Lorem ipsum dolor sit amet, lacus eu erat integer bibendum rutrum, sed
                                    arcu
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
        </div>
    </section>

    @include('partials.footer')

    @include('partials.popup')
    
</div>
@endsection
