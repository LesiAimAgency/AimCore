@extends('layouts.master_product')
@section('title', 'Home Default | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme ')
@section('content')

<div id="nt_content">
    <!-- main slide -->
    <div class="kalles-blog-grid">
        <div class="slideshow" data-flickity='{ "groupCells": true, "fade":0, "imagesLoaded": 0, "lazyLoad": 0, "freeScroll": 0, "wrapAround": false, "autoPlay" : 0, "pauseAutoPlayOnHover" : true, "rightToLeft": false, "prevNextButtons": true, "pageDots": false, "contain" : 3, "adaptiveHeight" : 1, "dragThreshold" : 5,"percentPosition": 1}'>
            <!-- first slide -->
            <div class="slideshow__slide" style="width: 33.33%; ">
                <a href="#" class="blog_grid">
                    <div class="blog_grid_img w-100 h-100" style="background: url('/build/images/blog-page/blog-slide-01.jpg') center no-repeat; background-size: cover;">
                    </div>
                </a>
                <div class="card rounded-0 border-0 bg-black bg-opacity-75 position-absolute w-100 bottom-0 start-0 end-0 z-3">
                    <div class="card-body text-center">
                        <div>
                            <span class="fs-12 text-white-50">By <span class="text-white">admin</span></span>
                            <span class="fs-12 text-white-50">In <a href="#!" class="text-white">Beauty</a>,
                                <a href="#!" class="text-white">Fashion</a>
                            </span>
                        </div>
                        <h2 class="fs-14 text-uppercase blog_grid_img_heading">
                            <a class="text-white" href="{{ url('blog/blog-post-with-instagram-shop')}}">Spring – Summer Trending
                                2020</a>
                        </h2>
                        <span>
                            <time class="text-white-50" datetime="2020-04-06T02:22:00Z">April 6, 2020</time>
                        </span>
                    </div>
                </div>
            </div>
            <!-- end first slide -->
            <!-- second slide -->
            <div class="slideshow__slide" style="width: 33.33%; ">
                <a href="#" class="blog_grid">
                    <div class="blog_grid_img w-100 h-100" style="background: url('/build/images/blog-page/blog-slide-02.jpg') center no-repeat; background-size: cover;">
                    </div>
                </a>
                <div class="card rounded-0 border-0 bg-black bg-opacity-75 position-absolute w-100 bottom-0 start-0 end-0 z-3">
                    <div class="card-body text-center">
                        <div>
                            <span class="fs-12 text-white-50">By <span class="text-white">admin</span></span>
                            <span class="fs-12 text-white-50">In <a href="#!" class="text-white">Life
                                    Style</a>,
                                <a href="#!" class="text-white">Travel</a>
                            </span>
                        </div>
                        <h2 class="fs-14 text-uppercase blog_grid_img_heading">
                            <a class="text-white" href="{{ url('blog/blog-post-with-instagram-shop')}}">The Easiest Way to Break Out
                                on Top</a>
                        </h2>
                        <span>
                            <time class="text-white-50" datetime="2020-04-06T02:22:00Z">April 6, 2020</time>
                        </span>
                    </div>
                </div>
            </div>
            <!-- end first slide -->
            <!-- third slide -->
            <div class="slideshow__slide" style="width: 33.33%; ">
                <a href="#" class="blog_grid">
                    <div class="blog_grid_img w-100 h-100" style="background: url('/build/images/blog-page/blog-slide-03.jpg') center no-repeat; background-size: cover;">
                    </div>
                </a>
                <div class="card rounded-0 border-0 bg-black bg-opacity-75 position-absolute w-100 bottom-0 start-0 end-0 z-3">
                    <div class="card-body text-center">
                        <div>
                            <span class="fs-12 text-white-50">By <span class="text-white">admin</span></span>
                            <span class="fs-12 text-white-50">In <a href="#!" class="text-white">Fashion</a>,
                                <a href="#!" class="text-white">Travel</a>
                            </span>
                        </div>
                        <h2 class="fs-14 text-uppercase blog_grid_img_heading">
                            <a class="text-white" href="{{ url('blog/blog-post-with-instagram-shop')}}">Style for couple in Weeding
                                season</a>
                        </h2>
                        <span>
                            <time class="text-white-50" datetime="2020-04-06T02:22:00Z">April 6, 2020</time>
                        </span>
                    </div>
                </div>
            </div>
            <!-- end first slide -->
            <!-- first slide -->
            <div class="slideshow__slide" style="width: 33.33%; ">
                <a href="#" class="blog_grid">
                    <div class="blog_grid_img w-100 h-100" style="background: url('/build/images/blog-page/blog-slide-04.jpg') center no-repeat; background-size: cover;">
                    </div>
                </a>
                <div class="card rounded-0 border-0 bg-black bg-opacity-75 position-absolute w-100 bottom-0 start-0 end-0 z-3">
                    <div class="card-body text-center">
                        <div>
                            <span class="fs-12 text-white-50">By <span class="text-white">admin</span></span>
                            <span class="fs-12 text-white-50">In <a href="#!" class="text-white">Food</a>,
                                <a href="#!" class="text-white">Life Style</a>
                            </span>
                        </div>
                        <h2 class="fs-14 text-uppercase blog_grid_img_heading">
                            <a class="text-white" href="{{ url('blog/blog-post-with-instagram-shop')}}">Cool Spring Street Style
                                Looks</a>
                        </h2>
                        <span>
                            <time class="text-white-50" datetime="2020-04-06T02:22:00Z">April 6, 2020</time>
                        </span>
                    </div>
                </div>
            </div>
            <!-- end first slide -->
            <!-- first slide -->
            <div class="slideshow__slide" style="width: 33.33%; ">
                <a href="#" class="blog_grid">
                    <div class="blog_grid_img w-100 h-100" style="background: url('/build/images/blog-page/blog-slide-05.jpg') center no-repeat; background-size: cover;">
                    </div>
                </a>
                <div class="card rounded-0 border-0 bg-black bg-opacity-75 position-absolute w-100 bottom-0 start-0 end-0 z-3">
                    <div class="card-body text-center">
                        <div>
                            <span class="fs-12 text-white-50">By <span class="text-white">admin</span></span>
                            <span class="fs-12 text-white-50">In <a href="#!" class="text-white">Fashion</a>,
                                <a href="#!" class="text-white">Life Style</a>,
                                <a href="#!" class="text-white">Travel</a>
                            </span>
                        </div>
                        <h2 class="fs-14 text-uppercase blog_grid_img_heading">
                            <a class="text-white" href="{{ url('blog/blog-post-with-instagram-shop')}}">Style Advice All Men Should
                                Hear</a>
                        </h2>
                        <span>
                            <time class="text-white-50" datetime="2020-04-06T02:22:00Z">April 6, 2020</time>
                        </span>
                    </div>
                </div>
            </div>
            <!-- end first slide -->
            <!-- first slide -->
            <div class="slideshow__slide" style="width: 33.33%; ">
                <a href="#" class="blog_grid">
                    <div class="blog_grid_img w-100 h-100" style="background: url('/build/images/blog-page/blog-slide-06.jpg') center no-repeat; background-size: cover;">
                    </div>
                </a>
                <div class="card rounded-0 border-0 bg-black bg-opacity-75 position-absolute w-100 bottom-0 start-0 end-0 z-3">
                    <div class="card-body text-center">
                        <div>
                            <span class="fs-12 text-white-50">By <span class="text-white">admin</span></span>
                            <span class="fs-12 text-white-50">In <a href="#!" class="text-white">Beauty</a>,
                                <a href="#!" class="text-white">Food</a>
                            </span>
                        </div>
                        <h2 class="fs-14 text-uppercase blog_grid_img_heading">
                            <a class="text-white" href="{{ url('blog/blog-post-with-instagram-shop')}}">101 Beauty Tips Every Girl
                                Should Know</a>
                        </h2>
                        <span>
                            <time class="text-white-50" datetime="2020-04-06T02:22:00Z">April 6, 2020</time>
                        </span>
                    </div>
                </div>
            </div>
            <!-- end first slide -->

        </div>
    </div>
    <!-- end main slide -->
    <section>
        <div class="container">
            <div class="row flex-md-row-reverse mt-5">
                <div class="col-lg-9">
                    <div class="row kalles-blog-grid mb-4 g-4">
                        <div class="col-sm-6 slideshow__slide" style="height:max-content !important ;">
                            <a href="#!">
                                <div class="blog_grid overflow-hidden">
                                    <div class=" blog_grid_img w-100 position-relative" style="background: url('/build/images/blog-page/blog-slide-01.jpg') center no-repeat; background-size: cover; height: 400px;">
                                    </div>
                                </div>
                                <div class="my-4">
                                    <p class="text-muted">By <span class="text-black">admin</span> on <span class="text-black">April
                                            6, 2020</span></p>
                                    <h6 class="text-black">Spring – Summer Trending 2020</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 slideshow__slide" style="height:max-content !important ;">
                            <a href="#!">
                                <div class="blog_grid overflow-hidden">
                                    <div class=" blog_grid_img w-100 position-relative" style="background: url('/build/images/blog-page/blog-slide-02.jpg') center no-repeat; background-size: cover; height: 400px;">
                                    </div>
                                </div>
                                <div class="my-4">
                                    <p class="text-muted">By <span class="text-black">admin</span> on <span class="text-black">April
                                            6, 2020</span></p>
                                    <h6 class="text-black">The Easiest Way to Break Out on Top</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 slideshow__slide" style="height:max-content !important ;">
                            <a href="#!">
                                <div class="blog_grid overflow-hidden">
                                    <div class=" blog_grid_img w-100 position-relative" style="background: url('/build/images/blog-page/blog-slide-03.jpg') center no-repeat; background-size: cover; height: 400px;">
                                    </div>
                                </div>
                                <div class="my-4">
                                    <p class="text-muted">By <span class="text-black">admin</span> on <span class="text-black">April
                                            6, 2020</span></p>
                                    <h6 class="text-black">Style for couple in Weeding season</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 slideshow__slide" style="height:max-content !important ;">
                            <a href="#!">
                                <div class="blog_grid overflow-hidden">
                                    <div class=" blog_grid_img w-100 position-relative" style="background: url('/build/images/blog-page/blog-slide-04.jpg') center no-repeat; background-size: cover; height: 400px;">
                                    </div>
                                </div>
                                <div class="my-4">
                                    <p class="text-muted">By <span class="text-black">admin</span> on <span class="text-black">April
                                            6, 2020</span></p>
                                    <h6 class="text-black">Cool Spring Street Style Looks</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 slideshow__slide" style="height:max-content !important ;">
                            <a href="#!">
                                <div class="blog_grid overflow-hidden">
                                    <div class=" blog_grid_img w-100 position-relative" style="background: url('/build/images/blog-page/blog-slide-05.jpg') center no-repeat; background-size: cover; height: 400px;">
                                    </div>
                                </div>
                                <div class="my-4">
                                    <p class="text-muted">By <span class="text-black">admin</span> on <span class="text-black">April
                                            6, 2020</span></p>
                                    <h6 class="text-black">Style for couple in Weeding season</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 slideshow__slide" style="height:max-content !important ;">
                            <a href="#!">
                                <div class="blog_grid overflow-hidden">
                                    <div class=" blog_grid_img w-100 position-relative" style="background: url('/build/images/blog-page/blog-slide-06.jpg') center no-repeat; background-size: cover; height: 400px;">
                                    </div>
                                </div>
                                <div class="my-4">
                                    <p class="text-muted">By <span class="text-black">admin</span> on <span class="text-black">April
                                            6, 2020</span></p>
                                    <h6 class="text-black">Cool Spring Street Style Looks</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="filter-pagination">
                        <ul class="pagination py-4 d-flex justify-content-center">
                            <li class="active"><a href="#" class="text-danger">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <div>
                        <h5 class="mb-2 fw-medium"> Blog Categories </h5>
                        <div class="filter-title mb-4"></div>
                        <ul class=" list-unstyled mb-4 navbar-nav justify-content-center ">
                            <li class="nav-item">
                                <a class="nav-link pt-0 pe-3 text-teal" href="#!">
                                    <span class="d-inline-flex"><i class="close_pp  pegk pe-7s-close ts__03 cd fs-16 me-2 mt-1 fw-bold filter-close" style="transform: rotate(45deg);"></i>Life Style (10)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pt-0 pe-3" href="#!">
                                    <span class="d-inline-flex"><i class="close_pp  pegk pe-7s-close ts__03 cd fs-16 me-2 mt-1 fw-bold filter-close" style="transform: rotate(45deg);"></i>Electric (7)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pt-0 pe-3" href="#!">
                                    <span class="d-inline-flex"><i class="close_pp  pegk pe-7s-close ts__03 cd fs-16 me-2 mt-1 fw-bold filter-close" style="transform: rotate(45deg);"></i>Electric (6)</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="mb-2 mt-3 mt-lg-4 fw-medium">Recent Post </h5>
                        <div class="filter-title mb-4"></div>
                        <div class="row">
                            <div class="col-4">
                                <img src="{{ URL::asset('/build/images/blog-page/blog-thumbnail-01.jpg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="col-8 ps-0">
                                <h6 class="fw-medium mb-1">Spring – Summer Trending 2020</h6>
                                <p class="text-muted mb-0">April 6, 2020</p>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-4">
                                <img src="{{ URL::asset('/build/images/blog-page/blog-thumbnail-02.jpg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="col-8 ps-0">
                                <h6 class="fw-medium mb-1">The Easiest Way to Break Out on Top</h6>
                                <p class="text-muted mb-0">April 6, 2020</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <img src="{{ URL::asset('/build/images/blog-page/blog-thumbnail-03.jpg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="col-8 ps-0">
                                <h6 class="fw-medium mb-1">Style for couple in Weeding season</h6>
                                <p class="text-muted mb-0">April 6, 2020</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h5 class="mb-2 mt-3 mt-lg-5 fw-medium"> Instagram </h5>
                        <div class="filter-title mb-4"></div>
                        <div class="row row-cols-3 g-1">
                            <div class="insta-card position-relative">
                                <img src="{{ URL::asset('/build/images/instagram/ins1_1.jpg')}}" alt="" class="img-fluid">
                                <a href="#!" class="d-flex position-absolute text-white start-0 end-0 top-0 bottom-0 align-items-center justify-content-center icon">
                                    <i class="facl facl-instagram fs-28"></i>
                                </a>
                            </div>
                            <div class="insta-card position-relative">
                                <img src="{{ URL::asset('/build/images/instagram/ins1_8.jpg')}}" alt="" class="img-fluid">
                                <a href="#!" class="d-flex position-absolute text-white start-0 end-0 top-0 bottom-0 align-items-center justify-content-center icon">
                                    <i class="facl facl-instagram fs-28"></i>
                                </a>
                            </div>
                            <div class="insta-card position-relative">
                                <img src="{{ URL::asset('/build/images/instagram/ins1_4.jpg')}}" alt="" class="img-fluid">
                                <a href="#!" class="d-flex position-absolute text-white start-0 end-0 top-0 bottom-0 align-items-center justify-content-center icon">
                                    <i class="facl facl-instagram fs-28"></i>
                                </a>
                            </div>
                            <div class="insta-card position-relative">
                                <img src="{{ URL::asset('/build/images/instagram/ins1_5.jpg')}}" alt="" class="img-fluid">
                                <a href="#!" class="d-flex position-absolute text-white start-0 end-0 top-0 bottom-0 align-items-center justify-content-center icon">
                                    <i class="facl facl-instagram fs-28"></i>
                                </a>
                            </div>
                            <div class="insta-card position-relative">
                                <img src="{{ URL::asset('/build/images/instagram/ins1_6.jpg')}}" alt="" class="img-fluid">
                                <a href="#!" class="d-flex position-absolute text-white start-0 end-0 top-0 bottom-0 align-items-center justify-content-center icon">
                                    <i class="facl facl-instagram fs-28"></i>
                                </a>
                            </div>
                            <div class="insta-card position-relative">
                                <img src="{{ URL::asset('/build/images/instagram/ins1_7.jpg')}}" alt="" class="img-fluid">
                                <a href="#!" class="d-flex position-absolute text-white start-0 end-0 top-0 bottom-0 align-items-center justify-content-center icon">
                                    <i class="facl facl-instagram fs-28"></i>
                                </a>
                            </div>
                            <div class="insta-card position-relative">
                                <img src="{{ URL::asset('/build/images/instagram/ins1_8.jpg')}}" alt="" class="img-fluid">
                                <a href="#!" class="d-flex position-absolute text-white start-0 end-0 top-0 bottom-0 align-items-center justify-content-center icon">
                                    <i class="facl facl-instagram fs-28"></i>
                                </a>
                            </div>
                            <div class="insta-card position-relative">
                                <img src="{{ URL::asset('/build/images/instagram/ins1_13.jpg')}}" alt="" class="img-fluid">
                                <a href="#!" class="d-flex position-absolute text-white start-0 end-0 top-0 bottom-0 align-items-center justify-content-center icon">
                                    <i class="facl facl-instagram fs-28"></i>
                                </a>
                            </div>
                            <div class="insta-card position-relative">
                                <img src="{{ URL::asset('/build/images/instagram/ins1_14.jpg')}}" alt="" class="img-fluid">
                                <a href="#!" class="d-flex position-absolute text-white start-0 end-0 top-0 bottom-0 align-items-center justify-content-center icon">
                                    <i class="facl facl-instagram fs-28"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h5 class="mb-2 mt-3 mt-lg-5 fw-medium">Sale Products </h5>
                        <div class="filter-title mb-4"></div>
                        <div class="row">
                            <div class="col-4">
                                <img src="{{ URL::asset('/build/images/blog-page/pr-thumbnail-01.jpg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="col-8 ps-0">
                                <h6 class="fw-medium mb-1">Analogue Resin Strap</h6>
                                <p class="text-muted mb-0">$30.00</p>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-4">
                                <img src="{{ URL::asset('/build/images/blog-page/pr-thumbnail-02.jpg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="col-8 ps-0">
                                <h6 class="fw-medium mb-1">Ridley High Waist</h6>
                                <p class="text-muted mb-0">$36.00</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <img src="{{ URL::asset('/build/images/blog-page/pr-thumbnail-03.jpg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="col-8 ps-0">
                                <h6 class="fw-medium mb-1">Blush Beanie</h6>
                                <p class="text-muted mb-0">$15.00</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h5 class="mb-2 mt-3 mt-lg-5 fw-medium">Blog Tags </h5>
                        <div class="filter-title mb-4"></div>
                        <div class="row d-flex me-lg-2">
                            <div style="display: contents; ">
                                <button class="btn btn-outline-dark m-1 rounded-pill px-3 py-0 fs-12" style="height: 30px;">Beauty (3)</button>
                            </div>
                            <div style="display: contents; ">
                                <button class="btn btn-outline-dark m-1 rounded-pill px-3 py-0 fs-12" style="height: 30px;">Fashion (5)</button>
                            </div>
                            <div style="display: contents; ">
                                <button class="btn btn-outline-dark m-1 rounded-pill px-3 py-0 fs-12" style="height: 30px;">Food (3)</button>
                            </div>
                            <div style="display: contents; ">
                                <button class="btn btn-outline-dark m-1 rounded-pill px-3 py-0 fs-12" style="height: 30px;">Life (1)</button>
                            </div>
                            <div style="display: contents; ">
                                <button class="btn btn-outline-dark m-1 rounded-pill px-3 py-0 fs-12" style="height: 30px;">Life Style (5)</button>
                            </div>
                            <div style="display: contents; ">
                                <button class="btn btn-outline-dark m-1 rounded-pill px-2 py-0 fs-12" style="height: 30px;">Travel (5)</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    @include('partials.footer')

    @include('partials.popup')
    
</div>
@endsection
