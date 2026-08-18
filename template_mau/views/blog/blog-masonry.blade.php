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
            <div class="row kalles-blog-grid my-4 g-4">
                <div class="col-md-6 slideshow__slide " style="height:max-content !important ;">
                    <div class="blog_grid overflow-hidden">
                        <div class=" blog_grid_img w-100 position-relative" style="background: url('/build/images/blog-page/blog-slide-05.jpg') center no-repeat; background-size: cover; height: 400px;">
                        </div>
                        <div class="card rounded-0 border-0 bg-black position-absolute m-4 bottom-0 start-0 end-0 z-3">
                            <div class="card-body text-center">
                                <div>
                                    <span class="fs-12 text-white-50">By <span class="text-white">admin</span></span>
                                    <span class="fs-12 text-white-50">In <a href="#!" class="text-white">Beauty</a>,
                                        <a href="#!" class="text-white">Food</a>
                                    </span>
                                </div>
                                <h2 class="fs-14 text-uppercase blog_grid_img_heading my-2">
                                    <a class="text-white" href="{{ url('blog/blog-post-with-instagram-shop')}}">STYLE ADVICE ALL
                                        MEN
                                        SHOULD HEAR</a>
                                </h2>
                                <span>
                                    <time class="text-white-50" datetime="2020-04-06T02:22:00Z">April 6, 2020</time>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 text-center blog-grid-contain">
                        <p class="text-muted">Typography is the work of typesetters, compositors, typographers, graphic
                            designers, art directors, manga artists, ...</p>
                        <button class="btn btn-outline-dark rounded-pill px-4 fw-semibold mx-auto mb-3">Continue
                            Reading</button>
                    </div>

                </div>
                <div class="col-md-6 slideshow__slide" style="height:max-content !important ;">
                    <div class="blog_grid overflow-hidden">
                        <div class="blog_grid_img w-100 position-relative" style="background: url('/build/images/blog-page/blog-slide-06.jpg') center no-repeat; background-size: cover; height: 400px;">
                        </div>
                        <div class="card rounded-0 border-0 bg-black position-absolute m-4 bottom-0 start-0 end-0 z-3">
                            <div class="card-body text-center">
                                <div>
                                    <span class="fs-12 text-white-50">By <span class="text-white">admin</span></span>
                                    <span class="fs-12 text-white-50">In <a href="#!" class="text-white">Beauty</a>,
                                        <a href="#!" class="text-white">Food</a>
                                    </span>
                                </div>
                                <h2 class="fs-14 text-uppercase blog_grid_img_heading my-2">
                                    <a class="text-white" href="{{ url('blog/blog-post-with-instagram-shop')}}">101 BEAUTY TIPS
                                        EVERY GIRL SHOULD KNOW</a>
                                </h2>
                                <span>
                                    <time class="text-white-50" datetime="2020-04-06T02:22:00Z">April 6, 2020</time>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 text-center blog-grid-contain">
                        <p class="text-muted">Typography is the work of typesetters, compositors, typographers, graphic
                            designers, art directors, manga artists, ...</p>
                        <button class="btn btn-outline-dark rounded-pill px-4 fw-semibold mx-auto mb-3">Continue
                            Reading</button>
                    </div>

                </div>
                <div class="col-md-6 slideshow__slide" style="height:max-content !important ;">
                    <div class="blog_grid overflow-hidden">
                        <div class="blog_grid_img w-100 position-relative" style="background: url('/build/images/blog-page/blog-slide-07.jpg') center no-repeat; background-size: cover; height: 400px;">
                        </div>
                        <div class="card rounded-0 border-0 bg-black position-absolute m-4 bottom-0 start-0 end-0 z-3">
                            <div class="card-body text-center">
                                <div>
                                    <span class="fs-12 text-white-50">By <span class="text-white">admin</span></span>
                                    <span class="fs-12 text-white-50">In <a href="#!" class="text-white">Beauty</a>,
                                        <a href="#!" class="text-white">Food</a>
                                    </span>
                                </div>
                                <h2 class="fs-14 text-uppercase blog_grid_img_heading my-2">
                                    <a class="text-white" href="{{ url('blog/blog-post-with-instagram-shop')}}">7 THINGS YOU CAN’T
                                        WEAR AFTER LABOR DAY READ</a>
                                </h2>
                                <span>
                                    <time class="text-white-50" datetime="2020-04-06T02:22:00Z">April 6, 2020</time>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 text-center blog-grid-contain">
                        <p class="text-muted">Typography is the work of typesetters, compositors, typographers, graphic
                            designers, art directors, manga artists, ...</p>
                        <button class="btn btn-outline-dark rounded-pill px-4 fw-semibold mx-auto mb-3">Continue
                            Reading</button>
                    </div>

                </div>
                <div class="col-md-6 slideshow__slide" style="height:max-content !important ;">
                    <div class="blog_grid overflow-hidden">
                        <div class="blog_grid_img w-100 position-relative" style="background: url('/build/images/blog-page/blog-slide-08.jpg') center no-repeat; background-size: cover; height: 400px;">
                        </div>
                        <div class="card rounded-0 border-0 bg-black position-absolute m-4 bottom-0 start-0 end-0 z-3">
                            <div class="card-body text-center">
                                <div>
                                    <span class="fs-12 text-white-50">By <span class="text-white">admin</span></span>
                                    <span class="fs-12 text-white-50">In <a href="#!" class="text-white">Beauty</a>,
                                        <a href="#!" class="text-white">Food</a>
                                    </span>
                                </div>
                                <h2 class="fs-14 text-uppercase blog_grid_img_heading my-2">
                                    <a class="text-white" href="{{ url('blog/blog-post-with-instagram-shop')}}">HOW TO WEAR PAINFUL
                                        HEELS WITHOUT DYING</a>
                                </h2>
                                <span>
                                    <time class="text-white-50" datetime="2020-04-06T02:22:00Z">April 6, 2020</time>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 text-center blog-grid-contain">
                        <p class="text-muted">Typography is the work of typesetters, compositors, typographers, graphic
                            designers, art directors, manga artists, ...</p>
                        <button class="btn btn-outline-dark rounded-pill px-4 fw-semibold mx-auto mb-3">Continue
                            Reading</button>
                    </div>

                </div>
            </div>
            <div class="filter-pagination">
                <ul class="pagination py-4 d-flex justify-content-center">
                    <li><a href="#">1</a></li>
                    <li class="active text-danger"><a href="#" class="text-danger">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">Next</a></li>
                </ul>
            </div>
        </div>
    </section>

    @include('partials.footer')

    @include('partials.popup')
    
</div>
@endsection

