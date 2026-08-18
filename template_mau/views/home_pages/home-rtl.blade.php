<!doctype html>
<html lang="en" x-data :dir="$store.appStore.dir" x-cloak>
<head>

    <meta charset="utf-8" />
    <title>Home Default | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="" name="description" />
    <meta content="srbthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/build/images/k_favicon_32x.png')}}">
@include('partials.head-css')
</head>
<body class="" x-data="{ showMenuScroll : false }">
 <!--head banner-->
<div x-data="{ isOpen: true }" class="">
    <div class="t_header fs-13 d-flex align-items-center" x-bind:class="{ 'd-none': !isOpen }">
        <div class="container-fluid">
            <div class="d-flex gap-2">
                <div class="col text-center text-white">
                    Today deal sale off <strong>70% </strong>. End in
                    <strong class="js_kl__countdown"></strong>. <a href="#!" class="text-white">Hurry Up <i class="las la-arrow-right"></i></a>
                </div>
                <div class="col-auto mt-2 mt-md-0">
                    <a href="#" class="h_banner_close text-white" x-on:click.prevent="isOpen = false">close</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end head banner-->
@include('partials.header')   
<div dir="rtl">
    <!-- main slide -->
    <div class="kalles-home-section type_slideshow type_carousel" dir="ltr">
        <div class="slideshow" data-flickity='{ "fade":0,"cellAlign": "center","imagesLoaded": 0,"lazyLoad": 0,"freeScroll": 0,"wrapAround": true,"autoPlay" : 0,"pauseAutoPlayOnHover" : true, "rightToLeft": false, "prevNextButtons": false,"pageDots": true, "contain" : 1,"adaptiveHeight" : 1,"dragThreshold" : 5,"percentPosition": 1 }'>
            <!-- first slide -->
            <div class="slideshow__slide w-100" style="background-image: url('{{ asset('/build/images/slide/slider-01.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div data-aos="fade-right" data-aos-delay="300">
                                <h4 class="fs-18 fw-medium">SUMMER 2020</h4>
                                <h1 class="display-4 fw-semibold mb-3">New Arrival Collection</h1>
                                <a class="btn btn-dark rounded-0 min-w-150 text-white" href="{{ url('shop_pages/shop-filter-sidebar')}}">Explore
                                    Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end first slide -->

            <!-- second slide -->
            <div class="slideshow__slide w-100" style="background-image: url('{{ asset('/build/images/slide/slider-02.jpg')}}">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-lg-6">
                            <div class="text-end" data-aos="fade-right" data-aos-delay="300">
                                <h4 class="fs-18 fw-medium">NEW SEASON</h4>
                                <h3 class="display-4 fw-semibold mb-3">Lookbook Collection</h3>
                                <a class="btn btn-dark rounded-0 min-w-150 text-white" href="{{ url('shop_pages/shop-filter-sidebar')}}">Explore
                                    Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end second slide -->

            <!-- third slide -->
            <div class="slideshow__slide w-100" style="background-image: url('{{ asset('/build/images/slide/slider-03.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div data-aos="fade-right" data-aos-delay="300">
                                <h4 class="fs-18 fw-medium">SUMMER SALE</h4>
                                <h1 class="display-4 fw-semibold mb-3">Save up to 70%</h1>
                                <a class="btn btn-dark rounded-0 min-w-150" href="{{ url('shop_pages/shop-filter-sidebar')}}">Explore
                                    Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end third slide -->
        </div>
    </div>
    <!-- end main slide -->

    <section class="cat-section">
        <div class="container">
            <div class="row g-lg-4 g-2">
                <div class="col-md-6">
                    <a href="{{ url('shop_pages/shop-right-sidebar')}}" class="d-block position-relative cat_grid_item overflow-hidden h-624">
                        <div class="h-100 w-100 cat-grid-img" style="background-image: url('{{ asset('/build/images/home-01/bn-01.jpg')}}"></div>
                        <div class="cat-grid-button text-body">
                            <div class="cat_grid_item__title">Women....</div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-6">
                    <a href="{{ url('shop_pages/shop-right-sidebar')}}" class="d-block position-relative cat_grid_item overflow-hidden h-300 mb-2 mb-lg-4">
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
                <div class="col-md-3 col-6">
                    <a href="{{ url('shop_pages/shop-right-sidebar')}}" class="d-block position-relative cat_grid_item overflow-hidden h-624">
                        <div class="h-100 w-100 cat-grid-img" style="background-image: url('{{ asset('/build/images/home-01/bn-04.jpg')}}"></div>
                        <div class="cat-grid-button text-body">
                            <div class="cat_grid_item__title">Watches</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- TRENDING -->
    @include('partials/trending-card')
    <!-- lookbook -->
    @include('partials/lookbook-card')
    <!-- BEST SELLER -->
    @include('partials/seller-card')
    <!-- blog -->
    @include('partials/latest-blog')
    <!-- instagram -->
    @include('partials/follow-instagram')
    @include('partials/shipping')
    @include('partials/footer')
    @include('partials/popup')
   </div>
<!-- modal -->
@include('partials.card-model')
@include('partials.vendor-scripts')
<script src="{{ URL::asset('build/libs/flickity/flickity.pkgd.min.js')}}"></script>
<script src="{{ URL::asset('build/js/main.js')}}"></script>
<script src="{{ URL::asset('build/js/app.js')}}"></script>
</body>

</html>