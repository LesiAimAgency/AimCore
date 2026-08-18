@extends('layouts.master_index')
@section('title', 'Home Default | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme ')
@section('content')
<!-- main slide -->
<div class="kalles-home-section type_slideshow type_carousel">
    <div class="slideshow"
        data-flickity='{ "fade":0,"cellAlign": "center","imagesLoaded": 0,"lazyLoad": 0,"freeScroll": 0,"wrapAround": true,"autoPlay" : 0,"pauseAutoPlayOnHover" : true, "rightToLeft": false, "prevNextButtons": false,"pageDots": true, "contain" : 1,"adaptiveHeight" : 1,"dragThreshold" : 5,"percentPosition": 1 }'>
        <!-- first slide -->
        <div class="slideshow__slide w-100"
            style="background-image: url(' {{ asset('/build/images/slide/slider-01.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div data-aos="fade-right" data-aos-delay="300">
                            <h4 class="fs-18 fw-medium">SUMMER 2020</h4>
                            <h1 class="display-4 fw-semibold mb-3">New Arrival Collection</h1>
                            <a class="btn btn-dark rounded-0 min-w-150 text-white"
                                href="{{ url('shop_pages/shop-filter-sidebar')}}">Explore
                                Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end first slide -->

        <!-- second slide -->
        <div class="slideshow__slide w-100"
            style="background-image: url(' {{ asset('/build/images/slide/slider-02.jpg')}}">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-6">
                        <div class="text-end" data-aos="fade-right" data-aos-delay="300">
                            <h4 class="fs-18 fw-medium">NEW SEASON</h4>
                            <h3 class="display-4 fw-semibold mb-3">Lookbook Collection</h3>
                            <a class="btn btn-dark rounded-0 min-w-150 text-white"
                                href="{{ url('shop_pages/shop-filter-sidebar')}}">Explore
                                Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end second slide -->

        <!-- third slide -->
        <div class="slideshow__slide w-100"
            style="background-image: url(' {{ asset('/build/images/slide/slider-03.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div data-aos="fade-right" data-aos-delay="300">
                            <h4 class="fs-18 fw-medium">SUMMER SALE</h4>
                            <h1 class="display-4 fw-semibold mb-3">Save up to 70%</h1>
                            <a class="btn btn-dark rounded-0 min-w-150"
                                href="{{ url('shop_pages/shop-filter-sidebar')}}">Explore
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
                <a href="{{ url('shop_pages/shop-right-sidebar') }}" class="d-block position-relative cat_grid_item overflow-hidden h-624">
                    <div class="h-100 w-100 cat-grid-img" style="background-image: url('{{ asset('/build/images/home-01/bn-01.jpg') }}');"></div>
                    <div class="cat-grid-button text-body">
                        <div class="cat_grid_item__title">Women</div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-6">
                <a href="{{ url('shop_pages/shop-right-sidebar')}}"
                    class="d-block position-relative cat_grid_item overflow-hidden h-300 mb-2 mb-lg-4">
                    <div class="h-100 w-100 cat-grid-img"
                        style="background-image: url(' {{ asset('/build/images/home-01/bn-02.jpg')}}"></div>
                    <div class="cat-grid-button text-body">
                        <div class="cat_grid_item__title">Accessories</div>
                    </div>
                </a>
                <a href="{{ url('shop_pages/shop-right-sidebar')}}"
                    class="d-block position-relative cat_grid_item overflow-hidden h-300">
                    <div class="h-100 w-100 cat-grid-img"
                        style="background-image: url(' {{ asset('/build/images/home-01/bn-03.jpg')}}"></div>
                    <div class="cat-grid-button text-body">
                        <div class="cat_grid_item__title">Footwear</div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-6">
                <a href="{{ url('shop_pages/shop-right-sidebar')}}"
                    class="d-block position-relative cat_grid_item overflow-hidden h-624">
                    <div class="h-100 w-100 cat-grid-img"
                        style="background-image: url(' {{ asset('/build/images/home-01/bn-04.jpg')}}"></div>
                    <div class="cat-grid-button text-body">
                        <div class="cat_grid_item__title">Watches</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

@include('partials.trending-card')

{{-- lookbook-card start --}}
<div class="banner-section position-relative">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
                <a href="#!" class="position-relative hover-zoom d-block">
                    <img src="{{ URL::asset('/build/images/home-01/bn-05.jpg')}}" alt=""
                        class="img-fluid hover-zoom-img">
                    <div
                        class="position-absolute start-0 start-0 end-0 top-0 bottom-0 d-flex align-items-center justify-content-center">
                        <div class="text-center text-white">
                            <h4 class="fs-24">LOOKBOOK 2021</h4>
                            <h6 class="mb-0">MAKE LOVE THIS LOOK</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6">
                <a href="#!" class="position-relative hover-zoom d-block">
                    <img src="{{ URL::asset('/build/images/home-01/bn-06.jpg')}}" alt=""
                        class="img-fluid hover-zoom-img">
                    <div
                        class="position-absolute start-0 start-0 end-0 top-0 bottom-0 d-flex align-items-center justify-content-center">
                        <div class="text-center text-white">
                            <h6 class="text-capitalize mb-2">Summer Sale</h6>
                            <h1 class="mb-0" style="font-size: 50px;">UP TO 70%</h1>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
{{-- lookbook-card end --}}
@include('partials.seller-card')
<button type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#CODE15OFF">
    Launch demo modal
</button>
@endsection