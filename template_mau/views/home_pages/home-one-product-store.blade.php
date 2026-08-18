<!doctype html>
<html lang="en" x-data :dir="$store.appStore.dir" x-cloak>

<head>
    <meta charset="utf-8" />
    <title>Home One Product Store | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="" name="description" />
    <meta content="srbthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/build/images/k_favicon_32x.png') }}">
    @include('partials.head-css')
</head>

<body class="font-futura" x-data="{ showMenuScroll: false }">
    @include('partials.header-product-store')
    <div>
        <!-- main section -->
        <section class="position-relative kalles-decor overflow-hidden kill-store-banner"
            style="background-image: url('/build/images/home-one-product-store/slide-01.jpg'); background-size: cover; background-position: center;">
            <div class="container-fluid px-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bg-overlay"></div>
                        <div
                            class="position-absolute top-0 start-0 end-0 bottom-0 text-start text-lg-end py-5 text-white d-flex">
                            <div class="container w-100 mt-md-5 pt-md-5">
                                <div class="row justify-content-lg-end">
                                    <div class="col-6 col-lg-3 mb-5 mb-lg-0">
                                        <h1 class="text-capitalize fw-semibold mb-4 ms-lg-auto max-w-160">Cactus
                                            Mosquito Killer</h1>
                                        <h3 class="fs-14 fw-normal mb-2 mb-lg-4">LED Lamp Electronic Pest Repeller</h3>
                                        <a href="{{ url('shop_pages/shop') }}"
                                            class="btn btn-dark fw-medium min-w-150 rounded-0 d-inline-flex align-items-center justify-content-center">Shop
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end main section -->

        <section class="cat-section py-2">
            <div class="container-fluid px-2">
                <div class="row g-2">
                    <div class="col-lg-6">
                        <div class="kalles-medical-banner-01 position-relative img-zoom">
                            <img src="{{ URL::asset('/build/images/home-one-product-store/banner-1.jpg') }}"
                                alt="" class="img-fluid w-100">
                            <div
                                class="position-absolute start-0 bottom-0 end-0 top-0 end-0 d-flex align-items-end text-white m-5">
                                <div>
                                    <h3 class="fs-36 fw-medium">No Fumes <br> No Radiation <br> No Bad Odors</h3>
                                    <p class="fs-16 mb-1">Having Without The Above 3 Disturbance. <br> It Reduces
                                        Likehood
                                        Of Having Respirator <br> Discomfort.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="kalles-medical-banner-01 position-relative img-zoom">
                            <img src="{{ URL::asset('/build/images/home-one-product-store/banner-2.jpg') }}"
                                alt="" class="img-fluid w-100">
                            <div
                                class="position-absolute start-0 bottom-0 end-0 top-0 end-0 d-flex align-items-end text-white m-5">
                                <div>
                                    <h3 class="fs-36 fw-medium">No Fumes <br> No Radiation <br> No Bad Odors</h3>
                                    <p class="fs-16 mb-1">Having Without The Above 3 Disturbance. <br> It Reduces
                                        Likehood
                                        Of Having Respirator <br> Discomfort.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end row-->
            </div>
        </section><!--end section-->

        <section class="kalles-one-product-store-slide-type-02">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <h2 class="fs-30 fw-medium lh-base text-white mb-3">Green Fresh <br> Sleep Peacefully <br>
                            Potted
                            Shape</h2>
                        <p class="text-white mb-4 pb-2">Powerful flow of fan can make vortex to kill mosquito safely and
                            easily by air drying and dehydration. USB powered, por table, convenient and safe to use.
                        </p>
                        <div>
                            <img src="{{ URL::asset('/build/images/home-one-product-store/slide-second-item.png') }}"
                                alt="" height="110">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="kalles-one-product-store-slide-type-03">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-lg-center">
                        <h2 class="fs-30 fw-medium lh-base mb-3">Smokeless. Tasteless. Dustless. Anti-Mosquito Lamp</h2>
                        <p class="mb-4 pb-1">The principle of inhalation and anti-mosquito uses mosquito's phototaxis of
                            UV
                            light to induce it to enter the effective range of the mosquito-killing lamp, and the
                            airflow
                            generated by fan is sucked into box.</p>
                        <a href="#!"
                            class="btn btn-dark fw-medium min-w-150 rounded-0 d-inline-flex align-items-center justify-content-center">Purchase
                            Now</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="kalles-one-product-store-slide-type-02"
            style="background-image: url('{{ asset('/build/images/home-one-product-store/slide-fourth-desktop.jpg') }}">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-4">
                        <h2 class="fs-30 fs-small-14 fw-medium text-white lh-base mb-3">One Button Control <br> Easy To
                            Operation <br>
                            Power By Micro USB</h2>
                        <p class="text-white mb-3">Using The UV Light Instead Of Volatile Mosquito Repellents,</p>
                        <ul class="text-white mb-4">
                            <li>Decoy Of Bionic Breath</li>
                            <li>Body Temperature Limitation</li>
                            <li>Harmless Light Wave</li>
                        </ul>
                        <a href="#!"
                            class="btn btn-light fw-medium min-w-150 rounded-0 d-inline-flex align-items-center justify-content-center text-hover-dark">Shop
                            Now</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="cat-section py-2">
            <div class="container-fluid px-2">
                <div class="row g-2">
                    <div class="col-lg-6">
                        <div class="kalles-medical-banner-01 position-relative img-zoom">
                            <img src="{{ URL::asset('/build/images/home-one-product-store/double-slide-01.jpg') }}"
                                alt="" class="img-fluid w-100">
                            <div
                                class="position-absolute start-0 bottom-0 end-0 top-0 end-0 d-flex text-center justify-content-center text-white m-5">
                                <div>
                                    <h3 class="fs-36 fw-medium">360 All Rounder Design</h3>
                                    <p class="fs-16 mb-1">Improves Air Flow Suction And All Rounder Coverage.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="kalles-medical-banner-01 position-relative img-zoom">
                            <img src="{{ URL::asset('/build/images/home-one-product-store/double-slide-02.jpg') }}"
                                alt="" class="img-fluid w-100">
                            <div
                                class="position-absolute start-0 bottom-0 end-0 top-0 end-0 d-flex text-center justify-content-center text-white m-5">
                                <div>
                                    <h3 class="fs-36 fw-medium">Inhalation Systems</h3>
                                    <p class="fs-16 mb-1">UV Lamp Attract Mosquito Within Range Unit & Trap Box.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end row-->
            </div>
        </section><!--end section-->

        <section class="kalles-one-product-store-slide-type-02 position-relative"
            style="background-image: url('{{ asset('/build/images/home-one-product-store/banner-list-desktop.jpg') }}">
            <div class="bg-overlay"></div>
            <div class="container position-relative">
                <div class="row">
                    <div class="col-lg-4">
                        <ul class="text-white vstack gap-2">
                            <li>Name / Cactus Mosquito Killer</li>
                            <li>Model / DSH-MK-006</li>
                            <li>Input Interface / Micro USB</li>
                            <li>Power / 1.5W</li>
                            <li>Coverage / 400-800 sq ft</li>
                            <li>Input / DC5V-0.3A</li>
                            <li>Net Weight / 307 gsm</li>
                            <li>Product Size / 120*120*150 Min</li>
                            <li>Standards / GB4706.1-2005</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="kalles-one-product-store-testimonial-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="text-center mb-4 pb-2">
                            <h3 class="position-relative flex fs-30">
                                <span>What People Say About Us</span>
                            </h3>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="js_carousel"
                    data-flickity='{"imagesLoaded": 0,"adaptiveHeight": 1, "contain": 1, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": false,"prevNextButtons": false,"percentPosition": 1,"pageDots": false, "autoPlay" : 0, "pauseAutoPlayOnHover" : true, "rightToLeft": false }'>
                    <div class="col-12">
                        <div class="text-center">
                            <img src="{{ URL::asset('/build/images/home-one-product-store/user-01.jpg') }}"
                                alt="" class="square-lg rounded-circle">
                            <div class="text-warning my-3">
                                <i class="facl facl-star"></i><i class="facl facl-star"></i><i
                                    class="facl facl-star"></i><i class="facl facl-star"></i><i
                                    class="facl facl-star"></i><i class="facl facl-stardn"></i>
                            </div>
                            <p class="text-muted">
                                There are many variations of passages of Lorem Ipsum available, but the majority
                                <br>
                                have suffered alteration in some form, by injected humour, or randomised words which
                                <br>
                                don't look even slightly believable.
                            </p>
                            <h6 class="mb-0">Henry Pham</h6>
                        </div>
                    </div><!--end col-->
                    <div class="col-12">
                        <div class="text-center">
                            <img src="{{ URL::asset('/build/images/home-one-product-store/user-02.jpg') }}"
                                alt="" class="square-lg rounded-circle">
                            <div class="text-warning my-3">
                                <i class="facl facl-star"></i><i class="facl facl-star"></i><i
                                    class="facl facl-star"></i><i class="facl facl-star"></i><i
                                    class="facl facl-star"></i><i class="facl facl-stardn"></i>
                            </div>
                            <p class="text-muted">
                                There are many variations of passages of Lorem Ipsum available, but the majority
                                <br>
                                have suffered alteration in some form, by injected humour, or randomised words which
                                <br>
                                don't look even slightly believable.
                            </p>
                            <h6 class="mb-0">Nathan Nguyen</h6>
                        </div>
                    </div><!--end col-->
                    <div class="col-12">
                        <div class="text-center">
                            <img src="{{ URL::asset('/build/images/home-one-product-store/user-01.jpg') }}"
                                alt="" class="square-lg rounded-circle">
                            <div class="text-warning my-3">
                                <i class="facl facl-star"></i><i class="facl facl-star"></i><i
                                    class="facl facl-star"></i><i class="facl facl-star"></i><i
                                    class="facl facl-star"></i><i class="facl facl-stardn"></i>
                            </div>
                            <p class="text-muted">
                                There are many variations of passages of Lorem Ipsum available, but the majority
                                <br>
                                have suffered alteration in some form, by injected humour, or randomised words which
                                <br>
                                don't look even slightly believable.
                            </p>
                            <h6 class="mb-0">Daniel Truong</h6>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div>
        </section>

        <section class="kalles-on-product-frequently-questions">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="text-center mb-4 pb-2">
                            <h3 class="position-relative flex fs-30">
                                <span>Frequently Asked Questions</span>
                            </h3>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="accordion accordion-flush accordion-custom" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button d-flex" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="true"
                                        aria-controls="flush-collapseOne">
                                        <div class="flex-grow-1">
                                            Anyone ever cough mosquitos with it?
                                        </div>
                                        <span class="icon d-inline-block ms-auto rounded-circle"></span>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body p-4">
                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                                            roots
                                            in a piece of classical Latin literature from 45 BC, making it over 2000
                                            years
                                            old. Richard McClintock a Latin professor at Hampden-Sydney College in
                                            Virginia.
                                        </p>
                                        <p class="mb-0">It is a long established fact that a reader will be
                                            distracted by
                                            the readable.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed d-flex" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                        aria-expanded="false" aria-controls="flush-collapseTwo">
                                        <div class="flex-grow-1">
                                            Is it a Real UV led or only a blue or colored led ?
                                        </div>
                                        <span class="icon d-inline-block ms-auto rounded-circle"></span>
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body p-4">
                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                                            roots
                                            in a piece of classical Latin literature from 45 BC, making it over 2000
                                            years
                                            old. Richard McClintock a Latin professor at
                                            Hampden-Sydney College in Virginia.</p>
                                        <p class="mb-0">It is a long established fact that a reader will be
                                            distracted by
                                            the readable.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button d-flex collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                        aria-expanded="false" aria-controls="flush-collapseThree">
                                        <div class="flex-grow-1">
                                            Is UV light dangerous or optimized?
                                        </div>
                                        <span class="icon d-inline-block ms-auto rounded-circle"></span>
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body p-4">
                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                                            roots
                                            in a piece of classical Latin literature from 45 BC, making it over 2000
                                            years
                                            old. Richard McClintock a Latin professor at
                                            Hampden-Sydney College in Virginia.</p>
                                        <p class="mb-0">It is a long established fact that a reader will be
                                            distracted by
                                            the readable.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button d-flex collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseFour"
                                        aria-expanded="false" aria-controls="flush-collapseFour">
                                        <div class="flex-grow-1">
                                            Has Autonomy or works only with the cable?
                                        </div>
                                        <span class="icon d-inline-block ms-auto rounded-circle"></span>
                                    </button>
                                </h2>
                                <div id="flush-collapseFour" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body p-4">
                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                                            roots
                                            in a piece of classical Latin literature from 45 BC, making it over 2000
                                            years
                                            old. Richard McClintock a Latin professor at
                                            Hampden-Sydney College in Virginia.</p>
                                        <p class="mb-0">It is a long established fact that a reader will be
                                            distracted by
                                            the readable.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('partials.footer-store')
        @include('partials.popup')
    </div>
    @include('partials.card-model')
    @include('partials.vendor-scripts')
    <script src="{{ URL::asset('build/libs/flickity/flickity.pkgd.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
</body>

</html>
