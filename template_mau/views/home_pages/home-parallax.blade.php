<!doctype html>
<html lang="en" x-data :dir="$store.appStore.dir" x-cloak>

<head>
    <meta charset="utf-8" />
    <title> Home Parallax | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="" name="description" />
    <meta content="srbthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/build/images/k_favicon_32x.png')}}">
    @yield('css')
    @include('partials.head-css')
</head>
<body class="{{ 'class-name' }}" x-data="{ showMenuScroll: false }">
    <div x-data="{ isOpen: true }">
        <div class="t_header fs-13 d-flex align-items-center" x-bind:class="{ 'd-none': !isOpen }">
            <div class="container-fluid">
                <div class="d-flex gap-2">
                    <div class="col text-center text-white">
                        Today deal sale off <strong>70% </strong>. End in
                        <strong class="js_kl__countdown"></strong>. <a href="#!" class="text-white">Hurry Up <i
                                class="las la-arrow-right"></i></a>
                    </div>
                    <div class="col-auto mt-2 mt-md-0">
                        <a href="#" class="h_banner_close text-white"
                            x-on:click.prevent="isOpen = false">close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('partials.header-parallex')
<div>
    <div class="bg-white position-relative mb-50" style=" z-index: 0;">
        <section class="kalles-banner-parallax-layout-01 min-vh-100 jarallax position-relative" style="background-image: url('{{ asset('/build/images/home-parallax/slide-01.jpg')}}">
            <div class="position-absolute top-0 start-0 end-0 bottom-0 text-center py-5 text-white d-flex align-items-center justify-content-center">
                <div class="text-center text-white">
                    <h1 class="fs-60 text-uppercase mb-3 fw-bold p-3 p-md-0">SALE OFF UP TO 70%</h1>
                    <h3 class="fs-18 font-secondary fst-italic mb-4">SS 2021 New Arrival</h3>
                    <a href="{{ url('shop_pages/shop')}}" class="text-white btn btn-custom-white fw-medium min-w-150 rounded-pill stretched-link">Shop
                        Now</a>
                </div>
            </div>
        </section>

        <section class="kalles-banner-parallax-layout-01 min-vh-100 jarallax position-relative" style="background-image: url('{{ asset('/build/images/home-parallax/slide-02.jpg')}}">
            <div class="position-absolute top-0 start-0 end-0 bottom-0 text-center py-5 text-white d-flex align-items-center justify-content-center">
                <div class="text-center text-white">
                    <h1 class="fs-60 text-uppercase mb-3 fw-bold">Women 2024 Lookbook</h1>
                    <h3 class="fs-18 font-secondary fst-italic mb-4">Discover for latest collection</h3>
                    <a href="{{ url('shop_pages/shop')}}" class="text-white btn btn-custom-white fw-medium min-w-150 rounded-pill stretched-link">Shop
                        Now</a>
                </div>
            </div>
        </section>

        <section class="kalles-banner-parallax-layout-01 min-vh-100 jarallax position-relative" style="background-image: url('{{ asset('/build/images/home-parallax/slide-03.jpg')}}">
            <div class="position-absolute top-0 start-0 end-0 bottom-0 text-center py-5 text-white d-flex align-items-center justify-content-center">
                <div class="text-center text-white">
                    <h3 class="fs-18 font-secondary fst-italic mb-3">Hot Trending</h3>
                    <h1 class="fs-60 text-uppercase mb-4 fw-bold p-3 p-md-0">Couple Collection</h1>
                    <a href="{{ url('shop_pages/shop')}}" class="text-white btn btn-custom-white fw-medium min-w-150 rounded-pill stretched-link">Shop
                        Now</a>
                </div>
            </div>
        </section>

        <section class="kalles-banner-parallax-layout-01 min-vh-100 jarallax position-relative" style="background-image: url('{{ asset('/build/images/home-parallax/slide-04.jpg')}}">
            <div class="position-absolute top-0 start-0 end-0 bottom-0 text-center py-5 text-white d-flex align-items-center justify-content-center">
                <div class="text-center text-white">
                    <h1 class="fs-60 text-uppercase mb-3 fw-bold">Fall 2024 Collections</h1>
                    <h3 class="fs-18 font-secondary fst-italic mb-4">Enjoy this Fall Trends</h3>
                    <a href="{{ url('shop_pages/shop')}}" class="text-white btn btn-custom-white fw-medium min-w-150 rounded-pill stretched-link">Shop
                        Now</a>
                </div>
            </div>
        </section>
    </div>
    

@include('partials/footer-parallax')
@include('partials/popup')
</div>

@include('partials/card-model')
@include('partials/vendor-scripts')
<script  src="{{ URL::asset('build/libs/flickity/flickity.pkgd.min.js')}}"></script>
<script  src="{{ URL::asset('build/js/main.js')}}"></script>
<script  src="{{ URL::asset('build/js/app.js')}}"></script>



</body>
</html>