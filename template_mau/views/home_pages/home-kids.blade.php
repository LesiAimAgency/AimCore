
<!doctype html>
<html lang="en" x-data :dir="$store.appStore.dir" x-cloak>

<head>
    <meta charset="utf-8" />
    <title>Categories Links | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="" name="description" />
    <meta content="srbthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/build/images/k_favicon_32x.png') }}">
    @include('partials.head-css')
</head>

<body
    style="background-image: url('/build/images/home-kids/body-bg.jpg'); background-repeat: no-repeat; background-size: cover; overflow-x: hidden; ">
    <div class="home_kids_main">
        @include('partials.header-kids')
        <div class="px-0 kalles-home-section type_slideshow type_carousel kalles-medical kalles-bags kids-banner"
            dir="ltr">
            <div class="slideshow"
                data-flickity='{ "fade":0,"cellAlign": "center","imagesLoaded": 0,"lazyLoad": 0,"freeScroll": 0,"wrapAround": true,"autoPlay" : 0,"pauseAutoPlayOnHover" : true, "rightToLeft": false, "prevNextButtons": true,"pageDots": false, "contain" : 1,"adaptiveHeight" : 1,"dragThreshold" : 5,"percentPosition": 1 }'>
                <!-- first slide -->
                <div class="slideshow__slide"
                style="background: url('{{ asset('build/images/home-kids/slide-bg-01.jpg') }}'); background-size: cover; background-position: center;"> 
                    <!-- <img src="{{ URL::asset('/build/images/home-kids/slide-bg-02.jpg') }}" alt="" class="position-absolute w-100 h-100 object-fit-cover"> -->
                    <div class="container-fluid position-relative">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="content">
                                    <h5 class="text-blue fw-normal text-uppercase fs-14">Free Shipping Available</h5>
                                    <h1 class="font-futura text-blue-dark mb-5">BIG SAVE ON <br /> FASHION BONANSA</h1>
                                    <p class="mb-4">Flannel lightweight line overall collection</p>
                                    <a href="#!"
                                        class="btn btn-blue-dark text-white px-4 text-uppercase rounded-pill fw-semibold">shop
                                        now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end second slide -->
                <div class="slideshow__slide"
                   style="background: url('{{ asset('build/images/home-kids/slide-bg-02.jpg') }}'); background-size: cover; background-position: center;">
                    <!-- <img src="{{ URL::asset('/build/images/home-kids/slide-bg-02.jpg') }}" alt="" class="position-absolute w-100 h-100 object-fit-cover"> -->
                    <div class="container position-relative">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="content">
                                    <h5 class="text-blue fw-normal text-uppercase fs-14">FREE SHIPPING AVAILABLE
                                    </h5>
                                    <h1 class="font-futura fs-50 text-blue-dark mb-3">BIG SAVE ON<br /> FASHION
                                        BONANZA</h1>
                                    <h5 class="text-blue fw-normal fs-14 pb-3">Lightweight collection of
                                        apparels now!
                                    </h5>
                                    <a href="#!"
                                        class="btn btn-blue-dark text-white px-4 text-uppercase rounded-pill fw-semibold mt-4">shop
                                        now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="kids-discount ">
            <div class="container-fluid px-4 pt-5 bg-white">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class=" position-relative">
                            <img src="{{ URL::asset('/build/images/home-kids/banner-01.png') }}" class="w-100 img-fluid"
                                alt="">
                            <div class="position-absolute top-50 start-0 translate-middle-y mt-3 ms-2 ms-md-5">
                                <h6 class="fw-light d-none d-sm-block text-uppercase fs-13 fst-italic">50% Discount
                                    available</h6>
                                <h2 class="text-blue-dark text-uppercase fw-bold mb-1 mb-md-3">Warm winnter <br />
                                    collection 2021
                                </h2>
                                <a href="#!"
                                    class="btn btn-pink2 text-white text-uppercase rounded-pill fw-semibold">shop
                                    now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class=" position-relative">
                            <img src="{{ URL::asset('/build/images/home-kids/banner-02.png') }}" class="w-100 img-fluid"
                                alt="">
                            <div class="position-absolute top-50 start-0 translate-middle-y mt-3 ms-2 ms-md-5">
                                <h6 class="fw-light d-none d-sm-block text-uppercase fs-13 fst-italic">FREE SHIPPING NOW
                                </h6>
                                <h2 class="text-blue-dark text-uppercase fw-bold mb-1 mb-md-3">Baby sitter <br />
                                    trollycosatto
                                </h2>
                                <a href="#!"
                                    class="btn btn-pink2 text-white text-uppercase rounded-pill fw-semibold">shop
                                    now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--deal-section-->
        <div class="container-fluid bg-white px-4 py-5 ">
            <div class="kalles-medical-deal-section kids-deal-section">
                <h4
                    class="product-cd-header text-center text-sm-start  font-futura text-blue-dark fs-26 d-inline-flex bg-body align-items-center mb-0">
                    Daily Deal Of The Day</h4>
                <div class="row blog-arrow"
                    data-flickity='{"imagesLoaded": 0, "adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold": 5, "cellAlign": "left", "wrapAround": true, "prevNextButtons": true, "percentPosition": 1, "pageDots": false, "autoPlay": 0, "pauseAutoPlayOnHover": true }'
                    dir="ltr">
                    <div class="col-6 col-lg-3 px-2">
                        <div>
                            <div class="my-3">
                                <h6 class="fs-16 fw-medium mb-1">
                                    <a class="main_link_primary font-futura text-blue-dark"
                                        href="{{ url('product/product-detail-layout-01') }}">Glitter
                                        Pink Mini
                                        Backpack</a>
                                </h6>
                                <p class="pb-1 mb-0 fs-15 text-pink">
                                    $29.00
                                </p>
                                <div class="kalles-rating-result">
                                    <span class="kalles-rating-result__pipe">
                                        <span class="kalles-rating-result__start"></span>
                                        <span class="kalles-rating-result__start"></span>
                                        <span class="kalles-rating-result__start active"></span>
                                        <span class="kalles-rating-result__start"></span>
                                        <span class="kalles-rating-result__start"></span>
                                    </span>
                                    <span class="kalles-rating-result__number text-muted">(5)</span>
                                </div>
                            </div>
                            <div x-data="{ imageUrl: '/build/images/home-kids/pr-09.jpg' }" class="topbar-product-card desgin_1 bg-muted">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <div class="bg-overlay"></div>
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o"></i></a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                                class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14 text-black"
                                            data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="product2-button position-absolute d-lg-none bottom-0 end-0 d-flex flex-column rounded-pill m-2"
                                        style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;"><i
                                                class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="loop-product-stock mt-3">
                                <div class="progress" role="progressbar" aria-label="Basic example"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar rounded-pill" style="width: 85%"></div>
                                </div>
                                <div class="d-flex mt-2 fs-15">
                                    <p class="mb-0 flex-grow-1">Sold: 30</p>
                                    <p class="mb-0 flex-shrink-0">Available: 46</p>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-6 col-lg-3 px-2">
                        <div>
                            <div class="my-3">
                                <h6 class="fs-16 fw-medium mb-1">
                                    <a class="main_link_primary font-futura text-blue-dark"
                                        href="{{ url('product/product-detail-layout-01') }}">Low Blush Beanie</a>
                                </h6>
                                <p class="pb-1 mb-0 fs-15 text-pink">
                                    $24.00
                                </p>
                                <div class="kalles-rating-result">
                                    <span class="kalles-rating-result__pipe">
                                        <span class="kalles-rating-result__start"></span>
                                        <span class="kalles-rating-result__start"></span>
                                        <span class="kalles-rating-result__start active"></span>
                                        <span class="kalles-rating-result__start"></span>
                                        <span class="kalles-rating-result__start"></span>
                                    </span>
                                    <span class="kalles-rating-result__number text-muted">(6)</span>
                                </div>
                            </div>
                            <div x-data="{ imageUrl: '/build/images/home-kids/pr-11.jpg' }" class="topbar-product-card desgin_1 bg-muted">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <div class="bg-overlay"></div>
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o"></i></a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                                class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14 text-black"
                                            data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="product2-button position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                        style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;"><i
                                                class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="loop-product-stock mt-3">
                                <div class="progress" role="progressbar" aria-label="Basic example"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar rounded-pill" style="width: 25%"></div>
                                </div>
                                <div class="d-flex mt-2 fs-15">
                                    <p class="mb-0 flex-grow-1">Sold: 25</p>
                                    <p class="mb-0 flex-shrink-0">Available: 75</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 px-2">
                        <div>
                            <div class="my-3">
                                <h6 class="fs-16 fw-medium mb-1">
                                    <a class="main_link_primary font-futura text-blue-dark"
                                        href="{{ url('product/product-detail-layout-01') }}">Little Princess Rose
                                        Gold</a>
                                </h6>
                                <p class="pb-1 mb-0 fs-15 text-pink">
                                    $8.00
                                </p>
                                <div class="kalles-rating-result">
                                    <span class="kalles-rating-result__pipe">
                                        <span class="kalles-rating-result__start"></span>
                                        <span class="kalles-rating-result__start"></span>
                                        <span class="kalles-rating-result__start active"></span>
                                        <span class="kalles-rating-result__start"></span>
                                        <span class="kalles-rating-result__start"></span>
                                    </span>
                                    <span class="kalles-rating-result__number text-muted">(9)</span>
                                </div>
                            </div>
                            <div x-data="{ imageUrl: '/build/images/home-kids/pr-13.jpg' }" class="topbar-product-card desgin_1 bg-muted">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <div class="bg-overlay"></div>
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o"></i></a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                                class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14 text-black"
                                            data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="product2-button position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                        style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;"><i
                                                class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="loop-product-stock mt-3">
                                <div class="progress" role="progressbar" aria-label="Basic example"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar rounded-pill" style="width: 25%"></div>
                                </div>
                                <div class="d-flex mt-2 fs-15">
                                    <p class="mb-0 flex-grow-1">Sold: 52</p>
                                    <p class="mb-0 flex-shrink-0">Available: 48</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 px-2">
                        <div>
                            <div class="my-3">
                                <h6 class="fs-16 fw-medium mb-1">
                                    <a class="main_link_primary font-futura text-blue-dark"
                                        href="{{ url('product/product-detail-layout-01') }}">Striped Polo T-Shirt</a>
                                </h6>
                                <p class="pb-1 mb-0 fs-15 text-pink">
                                    <del class="text-muted">$19.99</del>
                                    $12.00
                                </p>
                                <div class="kalles-rating-result">
                                    <span class="kalles-rating-result__pipe">
                                        <span class="kalles-rating-result__start"></span>
                                        <span class="kalles-rating-result__start"></span>
                                        <span class="kalles-rating-result__start active"></span>
                                        <span class="kalles-rating-result__start"></span>
                                        <span class="kalles-rating-result__start"></span>
                                    </span>
                                    <span class="kalles-rating-result__number text-muted">(12)</span>
                                </div>
                            </div>
                            <div x-data="{ imageUrl: '/build/images/home-kids/pr-13.jpg' }" class="topbar-product-card desgin_1 bg-muted">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid w-100">
                                    <div class="bg-overlay"></div>
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o"></i></a>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                                class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14 text-black"
                                            data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="product2-button position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                        style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;"><i
                                                class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="loop-product-stock mt-3">
                                <div class="progress" role="progressbar" aria-label="Basic example"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar rounded-pill" style="width: 25%"></div>
                                </div>
                                <div class="d-flex mt-2 fs-15">
                                    <p class="mb-0 flex-grow-1">Sold: 32</p>
                                    <p class="mb-0 flex-shrink-0">Available: 36</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!--end container-->
        <!--end deal-section-->
        <div class="container-fluid bg-white pb-4">
            <div class="row justify-content-center pb-3">
                <div class="col-lg-5 px-3">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                        class="swiper productMain kidsPoducts kidsProductMain">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('/build/images/home-kids/thumb-01.jpg') }}"
                                    class="img-fluid w-100" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('/build/images/home-kids/thumb-02.jpg') }}"
                                    class="img-fluid w-100" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('/build/images/home-kids/thumb-03.jpg') }}"
                                    class="img-fluid w-100" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('/build/images/home-kids/thumb-04.jpg') }}"
                                    class="img-fluid w-100" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('/build/images/home-kids/thumb-05.jpg') }}"
                                    class="img-fluid w-100" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('/build/images/home-kids/thumb-06.jpg') }}"
                                    class="img-fluid w-100" />
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div thumbsSlider="" class="swiper productSmall kidsPoducts kidsProductSmall">
                        <div class="swiper-wrapper d-flex">
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('/build/images/home-kids/thumb-01.jpg') }}"
                                    class="object-fit-cover" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('/build/images/home-kids/thumb-02.jpg') }}"
                                    class="object-fit-cover" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('/build/images/home-kids/thumb-03.jpg') }}"
                                    class="object-fit-cover" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('/build/images/home-kids/thumb-04.jpg') }}"
                                    class="object-fit-cover" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('/build/images/home-kids/thumb-05.jpg') }}"
                                    class="object-fit-cover" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('/build/images/home-kids/thumb-06.jpg') }}"
                                    class="object-fit-cover" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <h4 class="mb-2 fs-16 font-futura">Cosatto Baby Fleece Troller</h4>
                    <p class="text-muted fs-22 mb-3">$145.00</p>
                    <p class="pr_flash"><i class="cd mr__5 fading_true fs__20 las la-fire me-1 mb-1"></i>13 sold in
                        last 19 hours</p>
                    <p class="text-muted mb-3">Fully removable seat unit for easy cleaning and self-standing
                        capability.
                        One-hand recline
                        with 4 recline...</p>
                    <div class="fw-bold text-blue-dark h6" x-data="{ color: 'Pink' }">
                        <h6 class="text-uppercase fw-bold mb-3">Color: <span x-text="color"></span></h6>
                        <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                            <a href="#!" class="d-inline-block bg_color_pink rounded-circle square-xs"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Pink"
                                x-on:click.prevent="color = 'Pink'; $event.target.classList.add('active'); $event.target.previousElementSibling.classList.remove('active');"></a>
                            <a href="#!" class="d-inline-block bg-dark rounded-circle square-xs"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Black"
                                x-on:click.prevent="color = 'Black'; $event.target.classList.add('active'); $event.target.previousElementSibling.classList.remove('active');"></a>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-2 mt-4">
                        <div class="input-step border border-dark rounded-pill">
                            <button type="button" class="minus material-shadow text-dark fw-bold">–</button>
                            <input type="number" class="product-quantity fw-bold fs-6" value="1"
                                min="0" max="100">
                            <button type="button" class="plus material-shadow text-dark fw-bold">+</button>
                        </div>
                        <button type="submit"
                            class="btn btn-blue-dark rounded-pill text-uppercase px-4 fw-semibold">Add
                            to
                            cart</button>
                        <div class="product_wishlist square-40 rounded-circle border border-dark bg-transparent text-center"
                            style="line-height: 40px;">
                            <a href="#"><i class="facl facl-heart-o"></i></a>
                        </div>
                    </div>

                    <div class="mt-4">
                        <img src="{{ URL::asset('/build/images/single-product/trust_img2.png') }}" alt="">
                    </div>
                    <div class="nt-social my-3 fs-20 d-flex align-items-center flex-wrap justify-content-center">
                        <a href="https://www.facebook.com" class="facebook cb ttip_nt tooltip_top m-2">
                            <i class="facl facl-facebook"></i>
                        </a>
                        <a href="https://twitter.com" class="twitter cb ttip_nt tooltip_top m-2">
                            <i class="facl facl-twitter"></i>
                        </a>
                        <a href="#" class="email cb ttip_nt tooltip_top m-2">
                            <i class="facl facl-mail-alt"></i>
                        </a>
                        <a href="https://www.pinterest.com" class="pinterest cb ttip_nt tooltip_top m-2">
                            <i class="facl facl-pinterest"></i>
                        </a>
                        <a href="#" class="tumblr cb ttip_nt tooltip_top m-2">
                            <i class="facl facl-tumblr"></i>
                        </a>
                        <a href="#" class="telegram cb ttip_nt tooltip_top m-2">
                            <i class="facl facl-telegram"></i>
                        </a>
                    </div>
                    <p class="pr_flash mb-3"><i class="cd mr__5 fading_true fs__20 las la-eye me-1 mb-1"></i>
                        <span class="fw-medium">85 People</span>&nbsp;are viewing this right now
                    </p>
                    <a href="#!" class="fs-14 fw-medium main_link_primary"> View Full details <i
                            class="facl facl-right"></i> </a>
                </div>
            </div>
        </div>

        <!--  -->
        <section class="home-kids-pin">
            <div class="container-fluid px-0">
                <!-- first slide -->
                <div class="w-100 kalles-lookbook-home position-relative"
                    style="background-image: url('{{ asset('/build/images/home-kids/pin-map-banner.jpg') }}">
                    <div class="pin-type position-absolute position-01">
                        <span class="zoompin"></span>
                        <a href="#pinType1"
                            class="bg-blue-dark text-white rounded-circle d-flex align-items-center justify-content-center position-relative"
                            data-bs-toggle="modal">
                            <i class="nav_link_icon position-relative"></i>
                        </a>
                    </div>
                    <div class="pin-type position-absolute position-02">
                        <span class="zoompin"></span>
                        <a href="#pinType2"
                            class="bg-blue-dark text-white rounded-circle d-flex align-items-center justify-content-center position-relative"
                            data-bs-toggle="modal">
                            <i class="nav_link_icon position-relative"></i>
                        </a>
                    </div>

                    <div class="pin-type position-absolute position-03">
                        <span class="zoompin"></span>
                        <a href="#pinType3"
                            class="bg-blue-dark text-white rounded-circle d-flex align-items-center justify-content-center position-relative"
                            data-bs-toggle="modal">
                            <i class="nav_link_icon position-relative"></i>
                        </a>
                    </div>
                    <div class="pin-type position-absolute position-04">
                        <span class="zoompin"></span>
                        <a href="#pinType4"
                            class="bg-blue-dark text-white rounded-circle d-flex align-items-center justify-content-center position-relative"
                            data-bs-toggle="modal">
                            <i class="nav_link_icon position-relative"></i>
                        </a>
                    </div>
                    <div class="pin-type position-absolute position-05">
                        <span class="zoompin"></span>
                        <a href="#pinType5"
                            class="bg-blue-dark text-white rounded-circle d-flex align-items-center justify-content-center position-relative"
                            data-bs-toggle="modal">
                            <i class="nav_link_icon position-relative"></i>
                        </a>
                    </div>
                </div>
                <!-- end first slide -->

            </div>
            <!-- pin-type 1 -->
            <div class="modal fade modal-overl pin_popup" id="pinType1" tabindex="-1"
                aria-labelledby="pinType1Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-20">
                            <div x-data="{ imageUrl: '/build/images/home-kids/pr-15.jpg', isHovered: false }" class="topbar-product-card"
                                x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false"
                                class="topbar-product-card">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-danger text-white rounded-circle"> -40% </span>
                                    <img :src="isHovered ? '/build/images/home-kids/pr-15.jpg' : imageUrl"
                                        alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                        data-bs-placement="right" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                                class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14 text-black"
                                            data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                        style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;"><i
                                                class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-2"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title font-futura text-blue-dark">Striped
                                            Polo T-shirt</a></h6>
                                    <p class="mb-1 fs-14 text-muted">
                                        <del>$19.99</del>
                                        <span class="text-pink">$12.50</span>
                                    </p>
                                    <div class="kalles-rating-result justify-content-center">
                                        <span class="kalles-rating-result__pipe">
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start active"></span>
                                            <span class="kalles-rating-result__start"></span>
                                        </span>
                                        <span class="kalles-rating-result__number cp text-muted">(12)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end pin-type 1 -->

            <!-- pin-type 2 -->
            <div class="modal fade modal-overl pin_popup" id="pinType2" tabindex="-1"
                aria-labelledby="pinType2Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-20">
                            <div x-data="{ imageUrl: '/build/images/home-kids/pr-15.jpg', isHovered: false }" class="topbar-product-card"
                                x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false"
                                class="topbar-product-card">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/home-kids/pr-15.jpg' : imageUrl"
                                        alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                        data-bs-placement="right" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                                class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14 text-black"
                                            data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                        style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;"><i
                                                class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-2"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Baby
                                            Pajamas</a></h6>
                                    <p class="mb-1 fs-14 text-muted">
                                        <span class="text-pink">$18.00</span>
                                    </p>
                                    <div class="kalles-rating-result justify-content-center">
                                        <span class="kalles-rating-result__pipe">
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start active"></span>
                                        </span>
                                        <span class="kalles-rating-result__number cp text-muted">(6)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end pin-type 2 -->

            <!-- pin-type 3 -->
            <div class="modal fade modal-overl modal-md" id="pinType3" tabindex="-1"
                aria-labelledby="pinType3Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-20">
                            <div x-data="{ imageUrl: '/build/images/home-kids/pr-15.jpg', isHovered: false }" class="topbar-product-card"
                                x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false"
                                class="topbar-product-card">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/home-kids/pr-15.jpg' : imageUrl"
                                        alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                        data-bs-placement="right" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                                class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14 text-black"
                                            data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                        style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;"><i
                                                class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-2"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Baby
                                            Pajamas</a></h6>
                                    <p class="mb-1 fs-14 text-muted">
                                        <span class="text-pink">$18.00</span>
                                    </p>
                                    <div class="kalles-rating-result justify-content-center">
                                        <span class="kalles-rating-result__pipe">
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start active"></span>
                                        </span>
                                        <span class="kalles-rating-result__number cp text-muted">(6)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end pin-type 3 -->

            <!-- pin-type 4 -->
            <div class="modal fade modal-overl pin_popup" id="pinType4" tabindex="-1"
                aria-labelledby="pinType4Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-20">
                            <div x-data="{ imageUrl: '/build/images/home-kids/pr-15.jpg', isHovered: false }" class="topbar-product-card"
                                x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false"
                                class="topbar-product-card">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/home-kids/pr-15.jpg' : imageUrl"
                                        alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                        data-bs-placement="right" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                                class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14 text-black"
                                            data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                        style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;"><i
                                                class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-2"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Baby
                                            Pajamas</a></h6>
                                    <p class="mb-1 fs-14 text-muted">
                                        <span class="text-pink">$18.00</span>
                                    </p>
                                    <div class="kalles-rating-result justify-content-center">
                                        <span class="kalles-rating-result__pipe">
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start active"></span>
                                        </span>
                                        <span class="kalles-rating-result__number cp text-muted">(6)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end pin-type 4 -->

            <!-- pin-type 5 -->
            <div class="modal fade modal-overl pin_popup" id="pinType5" tabindex="-1"
                aria-labelledby="pinType5Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-20">
                            <div x-data="{ imageUrl: '/build/images/home-kids/pr-15.jpg', isHovered: false }" class="topbar-product-card"
                                x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false"
                                class="topbar-product-card">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/home-kids/pr-15.jpg' : imageUrl"
                                        alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                        data-bs-placement="right" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                                class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14 text-black"
                                            data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                        style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;"><i
                                                class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-2"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Baby
                                            Pajamas</a></h6>
                                    <p class="mb-1 fs-14 text-muted">
                                        <span class="text-pink">$18.00</span>
                                    </p>
                                    <div class="kalles-rating-result justify-content-center">
                                        <span class="kalles-rating-result__pipe">
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start active"></span>
                                        </span>
                                        <span class="kalles-rating-result__number cp text-muted">(6)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end pin-type 5 -->

            <!-- pin-type 6 -->
            <div class="modal fade modal-overl pin_popup" id="pinType6" tabindex="-1"
                aria-labelledby="pinType6Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-20">
                            <div x-data="{ imageUrl: '/build/images/home-kids/pr-15.jpg', isHovered: false }" class="topbar-product-card"
                                x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false"
                                class="topbar-product-card">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/home-kids/pr-15.jpg' : imageUrl"
                                        alt="" class="img-fluid">
                                    <a href="#" class="wishlistadd position-absolute" data-bs-toggle="tooltip"
                                        data-bs-placement="right" data-bs-title="Add to Wishlist"><i
                                            class="facl facl-heart-o"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn rounded-pill fs-14"><span>Quick View</span> <i
                                                class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14 text-black"
                                            data-bs-toggle="modal" data-bs-target="#cardModal"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                        style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal"
                                            class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;"><i
                                                class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2"
                                            style="width:36px; height: 36px;" data-bs-toggle="modal"
                                            data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <h6 class="mb-2"><a href="{{ url('product/product-detail-layout-01') }}"
                                            class="product-title">Baby
                                            Pajamas</a></h6>
                                    <p class="mb-1 fs-14 text-muted">
                                        <span class="text-pink">$18.00</span>
                                    </p>
                                    <div class="kalles-rating-result justify-content-center">
                                        <span class="kalles-rating-result__pipe">
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start"></span>
                                            <span class="kalles-rating-result__start active"></span>
                                        </span>
                                        <span class="kalles-rating-result__number cp text-muted">(6)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end pin-type 6 -->
        </section>

        <section class="kids-discount ">
            <div class="container-fluid px-4 pt-5 bg-white">
                <div class="row justify-content-center g-4 mt-lg-3">
                    <div class="col-lg-5">
                        <div class=" position-relative">
                            <img src="{{ URL::asset('/build/images/home-kids/banner-04.png') }}"
                                class="w-100 img-fluid" alt="">
                            <div class="position-absolute top-50 start-0 translate-middle-y mt-3 ms-2 ms-md-5">
                                <h6 class="fw-light d-none d-sm-block text-uppercase fs-13 fst-italic">50% Discount
                                    available</h6>
                                <h2 class="text-blue-dark text-uppercase fw-bold mb-1 mb-md-3">Flannel-lined <br />
                                    clothings
                                </h2>
                                <a href="#!"
                                    class="btn btn-pink2 text-white text-uppercase rounded-pill fw-semibold">shop
                                    now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class=" position-relative">
                            <img src="{{ URL::asset('/build/images/home-kids/banner-05.png') }}"
                                class="w-100 img-fluid" alt="">
                            <div class="position-absolute top-50 start-0 translate-middle-y mt-3 ms-2 ms-md-5">
                                <h6 class="fw-light d-none d-sm-block text-uppercase fs-13 fst-italic">FREE SHIPPING
                                    NOW</h6>
                                <h2 class="text-blue-dark text-uppercase fw-bold mb-1 mb-md-3">HEATHERED TOE <br />
                                    TEADYBEAR
                                </h2>
                                <a href="#!"
                                    class="btn btn-pink2 text-white text-uppercase rounded-pill fw-semibold">shop
                                    now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="type_tab_collection kids-deal-section pt-0 border-0">
            <div class="container-fluid px-4 bg-white pt-5">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="text-center">
                            <div class="mt-3">
                                <h2 class="position-relative kids-header lh-lg">
                                    <span>Handpicked Products</span>
                                </h2>
                                <p class="m-0 text-muted">Buy High Quality Products To Ensure The Best Quality For Your
                                    Health</p>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="pt-4">
                    <ul class="nav tab_header gap-lg-2 justify-content-center mt-4 mb-0" id="pills-tab"
                        role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill active text-pink" id="best-seller-tab"
                                data-bs-toggle="pill" data-bs-target="#best-seller" type="button" role="tab"
                                aria-controls="best-seller" aria-selected="true">Best Seller</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill text-pink" id="featured-tab" data-bs-toggle="pill"
                                data-bs-target="#featured" type="button" role="tab" aria-controls="featured"
                                aria-selected="false">Featured</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill text-pink" id="sale-tab" data-bs-toggle="pill"
                                data-bs-target="#sale" type="button" role="tab" aria-controls="sale"
                                aria-selected="false">Sale</button>
                        </li>
                    </ul>
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="tab-content mt-4" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="best-seller" role="tabpanel"
                                    aria-labelledby="best-seller-tab" tabindex="0">
                                    <div class="row g-4">
                                        <div class="col-6 col-lg-3">
                                            <div>
                                                <div x-data="{ imageUrl: '/build/images/home-kids/pr-21.jpg' }"
                                                    class="topbar-product-card desgin_1 bg-muted">
                                                    <div class="position-relative overflow-hidden">
                                                        <img :src="imageUrl" alt=""
                                                            class="img-fluid w-100"
                                                            src="{{ URL::asset('/build/images/home-kids/pr-21.jpg')}}">
                                                        <div class="bg-overlay"></div>
                                                        <a href="#" class="d-lg-none position-absolute "
                                                            style="z-index: 1; top:10px; left:10px;"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <a href="#"
                                                            class="wishlistadd d-none d-lg-flex position-absolute"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn rounded-pill fs-14"><span>Quick View</span>
                                                                <i class="iccl iccl-eye"></i></a>
                                                            <button type="button"
                                                                class="btn rounded-pill fs-14 text-black"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#cardModal"><span>Quick Shop</span>
                                                                <i class="iccl iccl-cart"></i></button>
                                                        </div>
                                                        <div class="product2-button position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                                            style="z-index: 1;">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"><i
                                                                    class="iccl iccl-eye fw-semibold"></i></a>
                                                            <button type="button"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"
                                                                data-bs-toggle="modal" data-bs-target="#cardModal"
                                                                class="btn rounded-pill fs-14">
                                                                <i class="iccl iccl-cart fw-semibold"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="my-3">
                                                    <h6 class="fs-16 fw-medium mb-1">
                                                        <a class="main_link_primary font-futura text-blue-dark"
                                                            href="{{ url('product/product-detail-layout-01') }}">Monkey
                                                            Cutie Toy For
                                                            Baby</a>
                                                    </h6>
                                                    <p class="pb-1 mb-0 fs-15 text-pink">
                                                        $29.00
                                                    </p>
                                                    <div class="kalles-rating-result">
                                                        <span class="kalles-rating-result__pipe">
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start active"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                        </span>
                                                        <span
                                                            class="kalles-rating-result__number text-muted">(5)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div>
                                                <div x-data="{ imageUrl: '/build/images/home-kids/pr-29.jpg' }"
                                                    class="topbar-product-card desgin_1 bg-muted">
                                                    <div class="position-relative overflow-hidden">
                                                        <img :src="imageUrl" alt=""
                                                            class="img-fluid w-100"
                                                            src="{{ URL::asset('/build/images/home-kids/pr-21.jpg')}}">
                                                        <div class="bg-overlay"></div>
                                                        <a href="#" class="d-lg-none position-absolute "
                                                            style="z-index: 1; top:10px; left:10px;"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <a href="#"
                                                            class="wishlistadd d-none d-lg-flex position-absolute"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <div class="product-button d-none d-lg-flex flex-column gap-2">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn rounded-pill fs-14"><span>Quick View</span>
                                                                <i class="iccl iccl-eye"></i></a>
                                                            <button type="button"
                                                                class="btn rounded-pill fs-14 text-black"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#cardModal"><span>Quick Shop</span>
                                                                <i class="iccl iccl-cart"></i></button>
                                                        </div>
                                                        <div class="product2-button position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                                            style="z-index: 1;">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"><i
                                                                    class="iccl iccl-eye fw-semibold"></i></a>
                                                            <button type="button"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"
                                                                data-bs-toggle="modal" data-bs-target="#cardModal"
                                                                class="btn rounded-pill fs-14">
                                                                <i class="iccl iccl-cart fw-semibold"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="my-3">
                                                    <h6 class="fs-16 fw-medium mb-1">
                                                        <a class="main_link_primary font-futura text-blue-dark"
                                                            href="{{ url('product/product-detail-layout-01') }}">Baby
                                                            Pajamas</a>
                                                    </h6>
                                                    <p class="pb-1 mb-0 fs-15 text-pink">
                                                        $18.00
                                                    </p>
                                                    <div class="kalles-rating-result">
                                                        <span class="kalles-rating-result__pipe">
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start active"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                        </span>
                                                        <span
                                                            class="kalles-rating-result__number text-muted">(8)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div>
                                                <div x-data="{ imageUrl: '/build/images/home-kids/pr-23.jpg' }"
                                                    class="topbar-product-card desgin_1 bg-muted">
                                                    <div class="position-relative overflow-hidden">
                                                        <img :src="imageUrl" alt=""
                                                            class="img-fluid w-100"
                                                            src="{{ URL::asset('/build/images/home-kids/pr-21.jpg')}}">
                                                        <div class="bg-overlay"></div>
                                                        <a href="#" class="d-lg-none position-absolute "
                                                            style="z-index: 1; top:10px; left:10px;"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <a href="#"
                                                            class="wishlistadd d-none d-lg-flex position-absolute"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <div
                                                            class="product-button d-none d-lg-flex flex-column gap-2">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn rounded-pill fs-14"><span>Quick View</span>
                                                                <i class="iccl iccl-eye"></i></a>
                                                            <button type="button"
                                                                class="btn rounded-pill fs-14 text-black"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#cardModal"><span>Quick Shop</span>
                                                                <i class="iccl iccl-cart"></i></button>
                                                        </div>
                                                        <div class="product2-button position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                                            style="z-index: 1;">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"><i
                                                                    class="iccl iccl-eye fw-semibold"></i></a>
                                                            <button type="button"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"
                                                                data-bs-toggle="modal" data-bs-target="#cardModal"
                                                                class="btn rounded-pill fs-14">
                                                                <i class="iccl iccl-cart fw-semibold"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="my-3">
                                                    <h6 class="fs-16 fw-medium mb-1">
                                                        <a class="main_link_primary font-futura text-blue-dark"
                                                            href="{{ url('product/product-detail-layout-01') }}">Summer
                                                            My Fun Sticker
                                                            Potty</a>
                                                    </h6>
                                                    <p class="pb-1 mb-0 fs-15 text-pink">
                                                        $20.00
                                                    </p>
                                                    <div class="kalles-rating-result">
                                                        <span class="kalles-rating-result__pipe">
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start active"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                        </span>
                                                        <span
                                                            class="kalles-rating-result__number text-muted">(4)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div x-data="{ imageUrl: '/build/images/home-kids/pr-26.jpg' }" class="topbar-product-card pb-3">
                                                <div class="position-relative overflow-hidden">
                                                    <span class="new-label bg-blue-dark text-white rounded-circle">
                                                        -34%
                                                    </span>
                                                    <img :src="imageUrl" alt=""
                                                        class="img-fluid w-100"
                                                        src="{{ URL::asset('/build/images/home-kids/pr-26.jpg')}}">
                                                    <a href="#" class="wishlistadd position-absolute"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Add to Wishlist"><i
                                                            class="facl facl-heart-o"></i></a>

                                                    <div class="product-button d-flex flex-column gap-2">
                                                        <a href="#!" class="btn rounded-pill fs-14"><span>Quick
                                                                View</span>
                                                            <i class="iccl iccl-eye"></i></a>
                                                        <a href="#!" class="btn rounded-pill fs-14"><span>Quick
                                                                Shop</span>
                                                            <i class="iccl iccl-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <div class="my-3">
                                                        <h6 class="fs-16 fw-medium mb-1">
                                                            <a class="main_link_primary font-futura text-blue-dark"
                                                                href="{{ url('product/product-detail-layout-01') }}">Baby
                                                                Stroller -
                                                                Grey</a>
                                                        </h6>
                                                        <p class="pb-1 mb-0 fs-15 text-pink">
                                                            <del class="text-muted">$589.00</del>
                                                            $495.00
                                                        </p>
                                                        <div class=" kalles-rating-result">
                                                            <span class="kalles-rating-result__pipe">
                                                                <span class="kalles-rating-result__start"></span>
                                                                <span class="kalles-rating-result__start"></span>
                                                                <span
                                                                    class="kalles-rating-result__start active"></span>
                                                                <span class="kalles-rating-result__start"></span>
                                                                <span class="kalles-rating-result__start"></span>
                                                            </span>
                                                            <span
                                                                class="kalles-rating-result__number text-muted">(4)</span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                                        <a href="#!"
                                                            x-on:mouseover="imageUrl = '/build/images/home-kids/pr-25.jpg'"
                                                            x-on:click.prevent="imageUrl = '/build/images/home-kids/pr-25.jpg'"
                                                            class="d-inline-block bg_color_blue rounded-circle"
                                                            style="background: url('/build/images/home-kids/pr-25.jpg');background-size: cover;"></a>
                                                        <a href="#!"
                                                            x-on:mouseover="imageUrl = '/build/images/home-kids/pr-26.jpg'"
                                                            x-on:click.prevent="imageUrl = '/build/images/home-kids/pr-26.jpg'"
                                                            class="d-inline-block bg-dark rounded-circle"
                                                            style="background: url('/build/images/home-kids/pr-26.jpg');background-size: cover;"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div>
                                                <div x-data="{ imageUrl: '/build/images/home-kids/pr-27.jpg' }"
                                                    class="topbar-product-card desgin_1 bg-muted">
                                                    <div class="position-relative overflow-hidden">
                                                        <img :src="imageUrl" alt=""
                                                            class="img-fluid w-100"
                                                            src="{{ URL::asset('/build/images/home-kids/pr-27.jpg')}}">
                                                        <div class="bg-overlay"></div>
                                                        <a href="#" class="d-lg-none position-absolute "
                                                            style="z-index: 1; top:10px; left:10px;"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <a href="#"
                                                            class="wishlistadd d-none d-lg-flex position-absolute"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <div
                                                            class="product-button d-none d-lg-flex flex-column gap-2">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn rounded-pill fs-14"><span>Quick View</span>
                                                                <i class="iccl iccl-eye"></i></a>
                                                            <button type="button"
                                                                class="btn rounded-pill fs-14 text-black"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#cardModal"><span>Quick Shop</span>
                                                                <i class="iccl iccl-cart"></i></button>
                                                        </div>
                                                        <div class="product2-button position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                                            style="z-index: 1;">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"><i
                                                                    class="iccl iccl-eye fw-semibold"></i></a>
                                                            <button type="button"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"
                                                                data-bs-toggle="modal" data-bs-target="#cardModal"
                                                                class="btn rounded-pill fs-14">
                                                                <i class="iccl iccl-cart fw-semibold"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="my-3">
                                                    <h6 class="fs-16 fw-medium mb-1">
                                                        <a class="main_link_primary font-futura text-blue-dark"
                                                            href="{{ url('product/product-detail-layout-01') }}">Multi
                                                            Color Sailboat
                                                            Toy</a>
                                                    </h6>
                                                    <p class="pb-1 mb-0 fs-15 text-pink">
                                                        $6.00
                                                    </p>
                                                    <div class="kalles-rating-result">
                                                        <span class="kalles-rating-result__pipe">
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start active"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                        </span>
                                                        <span
                                                            class="kalles-rating-result__number text-muted">(1)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div>
                                                <div x-data="{ imageUrl: '/build/images/home-kids/pr-15.jpg' }"
                                                    class="topbar-product-card desgin_1 bg-muted">
                                                    <div class="position-relative overflow-hidden">
                                                        <span
                                                            class="new-label bg-blue-dark text-white rounded-circle">
                                                            -40%
                                                        </span>
                                                        <img :src="imageUrl" alt=""
                                                            class="img-fluid w-100"
                                                            src="{{ URL::asset('/build/images/home-kids/pr-15.jpg')}}">
                                                        <div class="bg-overlay"></div>
                                                        <a href="#" class="d-lg-none position-absolute "
                                                            style="z-index: 1; top:10px; left:10px;"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <a href="#"
                                                            class="wishlistadd d-none d-lg-flex position-absolute"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <div
                                                            class="product-button d-none d-lg-flex flex-column gap-2">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn rounded-pill fs-14"><span>Quick View</span>
                                                                <i class="iccl iccl-eye"></i></a>
                                                            <button type="button"
                                                                class="btn rounded-pill fs-14 text-black"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#cardModal"><span>Quick Shop</span>
                                                                <i class="iccl iccl-cart"></i></button>
                                                        </div>
                                                        <div class="product2-button position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                                            style="z-index: 1;">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"><i
                                                                    class="iccl iccl-eye fw-semibold"></i></a>
                                                            <button type="button"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"
                                                                data-bs-toggle="modal" data-bs-target="#cardModal"
                                                                class="btn rounded-pill fs-14">
                                                                <i class="iccl iccl-cart fw-semibold"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="my-3">
                                                    <h6 class="fs-16 fw-medium mb-1">
                                                        <a class="main_link_primary font-futura text-blue-dark"
                                                            href="{{ url('product/product-detail-layout-01') }}">Baby
                                                            Pajamas</a>
                                                    </h6>
                                                    <p class="pb-1 mb-0 fs-15 text-pink">
                                                        $18.00
                                                    </p>
                                                    <div class="kalles-rating-result">
                                                        <span class="kalles-rating-result__pipe">
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start active"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                        </span>
                                                        <span
                                                            class="kalles-rating-result__number text-muted">(8)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div>
                                                <div x-data="{ imageUrl: '/build/images/home-kids/pr-13.jpg' }"
                                                    class="topbar-product-card desgin_1 bg-muted">
                                                    <div class="position-relative overflow-hidden">
                                                        <span
                                                            class="new-label bg-blue-dark text-white rounded-circle">
                                                            -40%
                                                        </span>
                                                        <img :src="imageUrl" alt=""
                                                            class="img-fluid w-100"
                                                            src="{{ URL::asset('/build/images/home-kids/pr-13.jpg')}}">
                                                        <div class="bg-overlay"></div>
                                                        <a href="#" class="d-lg-none position-absolute "
                                                            style="z-index: 1; top:10px; left:10px;"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <a href="#"
                                                            class="wishlistadd d-none d-lg-flex position-absolute"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <div
                                                            class="product-button d-none d-lg-flex flex-column gap-2">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn rounded-pill fs-14"><span>Quick View</span>
                                                                <i class="iccl iccl-eye"></i></a>
                                                            <button type="button"
                                                                class="btn rounded-pill fs-14 text-black"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#cardModal"><span>Quick Shop</span>
                                                                <i class="iccl iccl-cart"></i></button>
                                                        </div>
                                                        <div class="product2-button position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                                            style="z-index: 1;">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"><i
                                                                    class="iccl iccl-eye fw-semibold"></i></a>
                                                            <button type="button"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"
                                                                data-bs-toggle="modal" data-bs-target="#cardModal"
                                                                class="btn rounded-pill fs-14">
                                                                <i class="iccl iccl-cart fw-semibold"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="my-3">
                                                    <h6 class="fs-16 fw-medium mb-1">
                                                        <a class="main_link_primary font-futura text-blue-dark"
                                                            href="{{ url('product/product-detail-layout-01') }}">Little
                                                            Princess Rose
                                                            Gold</a>
                                                    </h6>
                                                    <p class="pb-1 mb-0 fs-15 text-pink">
                                                        $8.00
                                                    </p>
                                                    <div class="kalles-rating-result">
                                                        <span class="kalles-rating-result__pipe">
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start active"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                        </span>
                                                        <span
                                                            class="kalles-rating-result__number text-muted">(1)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div x-data="{ imageUrl: '/build/images/home-kids/pr-15.jpg' }" class="topbar-product-card pb-3">
                                                <div class="position-relative overflow-hidden">
                                                    <span class="new-label bg-blue-dark text-white rounded-circle">
                                                        -21%
                                                    </span>
                                                    <img :src="imageUrl" alt=""
                                                        class="img-fluid w-100"
                                                        src="{{ URL::asset('/build/images/home-kids/pr-15.jpg')}}">
                                                    <a href="#" class="wishlistadd position-absolute"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Add to Wishlist"><i
                                                            class="facl facl-heart-o"></i></a>

                                                    <div class="product-button d-flex flex-column gap-2">
                                                        <a href="#!" class="btn rounded-pill fs-14"><span>Quick
                                                                View</span>
                                                            <i class="iccl iccl-eye"></i></a>
                                                        <a href="#!" class="btn rounded-pill fs-14"><span>Quick
                                                                Shop</span>
                                                            <i class="iccl iccl-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <div class="my-3">
                                                        <h6 class="fs-16 fw-medium mb-1">
                                                            <a class="main_link_primary font-futura text-blue-dark"
                                                                href="{{ url('product/product-detail-layout-01') }}">Cosatto
                                                                Baby Fleece
                                                                Troller</a>
                                                        </h6>
                                                        <p class="pb-1 mb-0 fs-15 text-pink">
                                                            $99.00 – $145.00
                                                        </p>
                                                        <div class=" kalles-rating-result">
                                                            <span class="kalles-rating-result__pipe">
                                                                <span class="kalles-rating-result__start"></span>
                                                                <span class="kalles-rating-result__start"></span>
                                                                <span
                                                                    class="kalles-rating-result__start active"></span>
                                                                <span class="kalles-rating-result__start"></span>
                                                                <span class="kalles-rating-result__start"></span>
                                                            </span>
                                                            <span
                                                                class="kalles-rating-result__number text-muted">(4)</span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                                        <a href="#!"
                                                            x-on:mouseover="imageUrl = '/build/images/home-kids/tab-dot-dark-blue.jpg'"
                                                            x-on:click.prevent="imageUrl = '/build/images/home-kids/tab-dot-dark-blue.jpg'"
                                                            class="d-inline-block bg_color_blue rounded-circle"
                                                            style="background: url('/build/images/home-kids/tab-dot-dark-blue.jpg');background-size: cover;"></a>
                                                        <a href="#!"
                                                            x-on:mouseover="imageUrl = '/build/images/home-kids/tab-dot-stripe-lines.jpg'"
                                                            x-on:click.prevent="imageUrl = '/build/images/home-kids/tab-dot-stripe-lines.jpg'"
                                                            class="d-inline-block bg-dark rounded-circle"
                                                            style="background: url('/build/images/home-kids/tab-dot-stripe-lines.jpg');background-size: cover;"></a>
                                                        <a href="#!"
                                                            x-on:mouseover="imageUrl = '/build/images/home-kids/tab-dot-nude.jpg'"
                                                            x-on:click.prevent="imageUrl = '/build/images/home-kids/tab-dot-nude.jpg'"
                                                            class="d-inline-block bg-dark rounded-circle"
                                                            style="background: url('/build/images/home-kids/tab-dot-nude.jpg');background-size: cover;"></a>
                                                        <a href="#!"
                                                            x-on:mouseover="imageUrl = '/build/images/home-kids/tab-dot-grey.jpg'"
                                                            x-on:click.prevent="imageUrl = '/build/images/home-kids/tab-dot-grey.jpg'"
                                                            class="d-inline-block bg-dark rounded-circle"
                                                            style="background: url('/build/images/home-kids/tab-dot-grey.jpg');background-size: cover;"></a>
                                                        <a href="#!"
                                                            x-on:mouseover="imageUrl = '/build/images/home-kids/tab-dot-stripe-lines.jpg'"
                                                            x-on:click.prevent="imageUrl = '/build/images/home-kids/tab-dot-stripe-lines.jpg'"
                                                            class="d-inline-block bg-dark rounded-circle"
                                                            style="background: url('/build/images/home-kids/tab-dot-stripe-lines.jpg');background-size: cover;"></a>
                                                        <a href="#!"
                                                            x-on:mouseover="imageUrl = '/build/images/home-kids/tab-dot-dark-blue.jpg'"
                                                            x-on:click.prevent="imageUrl = '/build/images/home-kids/tab-dot-dark-blue.jpg'"
                                                            class="d-inline-block bg-dark rounded-circle"
                                                            style="background: url('/build/images/home-kids/tab-dot-dark-blue.jpg');background-size: cover;"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="featured" role="tabpanel"
                                    aria-labelledby="featured-tab" tabindex="0">
                                    <div class="row g-4">
                                        <div class="col-6 col-lg-3">
                                            <div>
                                                <div x-data="{ imageUrl: '/build/images/home-kids/pr-29.jpg' }"
                                                    class="topbar-product-card desgin_1 bg-muted">
                                                    <div class="position-relative overflow-hidden">
                                                        <img :src="imageUrl" alt=""
                                                            class="img-fluid w-100"
                                                            src="{{ URL::asset('/build/images/home-kids/pr-21.jpg')}}">
                                                        <div class="bg-overlay"></div>
                                                        <a href="#" class="d-lg-none position-absolute "
                                                            style="z-index: 1; top:10px; left:10px;"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <a href="#"
                                                            class="wishlistadd d-none d-lg-flex position-absolute"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <div
                                                            class="product-button d-none d-lg-flex flex-column gap-2">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn rounded-pill fs-14"><span>Quick View</span>
                                                                <i class="iccl iccl-eye"></i></a>
                                                            <button type="button"
                                                                class="btn rounded-pill fs-14 text-black"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#cardModal"><span>Quick Shop</span>
                                                                <i class="iccl iccl-cart"></i></button>
                                                        </div>
                                                        <div class="product2-button position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                                            style="z-index: 1;">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"><i
                                                                    class="iccl iccl-eye fw-semibold"></i></a>
                                                            <button type="button"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"
                                                                data-bs-toggle="modal" data-bs-target="#cardModal"
                                                                class="btn rounded-pill fs-14">
                                                                <i class="iccl iccl-cart fw-semibold"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="my-3">
                                                    <h6 class="fs-16 fw-medium mb-1">
                                                        <a class="main_link_primary font-futura text-blue-dark"
                                                            href="{{ url('product/product-detail-layout-01') }}">Baby
                                                            Pajamas</a>
                                                    </h6>
                                                    <p class="pb-1 mb-0 fs-15 text-pink">
                                                        $18.00
                                                    </p>
                                                    <div class="kalles-rating-result">
                                                        <span class="kalles-rating-result__pipe">
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start active"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                        </span>
                                                        <span
                                                            class="kalles-rating-result__number text-muted">(8)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div>
                                                <div x-data="{ imageUrl: '/build/images/home-kids/pr-23.jpg' }"
                                                    class="topbar-product-card desgin_1 bg-muted">
                                                    <div class="position-relative overflow-hidden">
                                                        <img :src="imageUrl" alt=""
                                                            class="img-fluid w-100"
                                                            src="{{ URL::asset('/build/images/home-kids/pr-21.jpg')}}">
                                                        <div class="bg-overlay"></div>
                                                        <a href="#" class="d-lg-none position-absolute "
                                                            style="z-index: 1; top:10px; left:10px;"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <a href="#"
                                                            class="wishlistadd d-none d-lg-flex position-absolute"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <div
                                                            class="product-button d-none d-lg-flex flex-column gap-2">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn rounded-pill fs-14"><span>Quick View</span>
                                                                <i class="iccl iccl-eye"></i></a>
                                                            <button type="button"
                                                                class="btn rounded-pill fs-14 text-black"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#cardModal"><span>Quick Shop</span>
                                                                <i class="iccl iccl-cart"></i></button>
                                                        </div>
                                                        <div class="product2-button position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                                            style="z-index: 1;">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"><i
                                                                    class="iccl iccl-eye fw-semibold"></i></a>
                                                            <button type="button"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"
                                                                data-bs-toggle="modal" data-bs-target="#cardModal"
                                                                class="btn rounded-pill fs-14">
                                                                <i class="iccl iccl-cart fw-semibold"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="my-3">
                                                    <h6 class="fs-16 fw-medium mb-1">
                                                        <a class="main_link_primary font-futura text-blue-dark"
                                                            href="{{ url('product/product-detail-layout-01') }}">Summer
                                                            My Fun Sticker
                                                            Potty</a>
                                                    </h6>
                                                    <p class="pb-1 mb-0 fs-15 text-pink">
                                                        $20.00
                                                    </p>
                                                    <div class="kalles-rating-result">
                                                        <span class="kalles-rating-result__pipe">
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start active"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                        </span>
                                                        <span
                                                            class="kalles-rating-result__number text-muted">(4)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div>
                                                <div x-data="{ imageUrl: '/build/images/home-kids/pr-21.jpg' }"
                                                    class="topbar-product-card desgin_1 bg-muted">
                                                    <div class="position-relative overflow-hidden">
                                                        <img :src="imageUrl" alt=""
                                                            class="img-fluid w-100"
                                                            src="{{ URL::asset('/build/images/home-kids/pr-21.jpg')}}">
                                                        <div class="bg-overlay"></div>
                                                        <a href="#" class="d-lg-none position-absolute "
                                                            style="z-index: 1; top:10px; left:10px;"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <a href="#"
                                                            class="wishlistadd d-none d-lg-flex position-absolute"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <div
                                                            class="product-button d-none d-lg-flex flex-column gap-2">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn rounded-pill fs-14"><span>Quick View</span>
                                                                <i class="iccl iccl-eye"></i></a>
                                                            <button type="button"
                                                                class="btn rounded-pill fs-14 text-black"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#cardModal"><span>Quick Shop</span>
                                                                <i class="iccl iccl-cart"></i></button>
                                                        </div>
                                                        <div class="product2-button position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                                            style="z-index: 1;">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"><i
                                                                    class="iccl iccl-eye fw-semibold"></i></a>
                                                            <button type="button"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"
                                                                data-bs-toggle="modal" data-bs-target="#cardModal"
                                                                class="btn rounded-pill fs-14">
                                                                <i class="iccl iccl-cart fw-semibold"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="my-3">
                                                    <h6 class="fs-16 fw-medium mb-1">
                                                        <a class="main_link_primary font-futura text-blue-dark"
                                                            href="{{ url('product/product-detail-layout-01') }}">Monkey
                                                            Cutie Toy For
                                                            Baby</a>
                                                    </h6>
                                                    <p class="pb-1 mb-0 fs-15 text-pink">
                                                        $29.00
                                                    </p>
                                                    <div class="kalles-rating-result">
                                                        <span class="kalles-rating-result__pipe">
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start active"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                        </span>
                                                        <span
                                                            class="kalles-rating-result__number text-muted">(5)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6 col-lg-3">
                                            <div x-data="{ imageUrl: '/build/images/home-kids/pr-26.jpg' }" class="topbar-product-card pb-3">
                                                <div class="position-relative overflow-hidden">
                                                    <span class="new-label bg-blue-dark text-white rounded-circle">
                                                        -34%
                                                    </span>
                                                    <img :src="imageUrl" alt=""
                                                        class="img-fluid w-100"
                                                        src="{{ URL::asset('/build/images/home-kids/pr-26.jpg')}}">
                                                    <a href="#" class="wishlistadd position-absolute"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Add to Wishlist"><i
                                                            class="facl facl-heart-o"></i></a>

                                                    <div class="product-button d-flex flex-column gap-2">
                                                        <a href="#!" class="btn rounded-pill fs-14"><span>Quick
                                                                View</span>
                                                            <i class="iccl iccl-eye"></i></a>
                                                        <a href="#!" class="btn rounded-pill fs-14"><span>Quick
                                                                Shop</span>
                                                            <i class="iccl iccl-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <div class="my-3">
                                                        <h6 class="fs-16 fw-medium mb-1">
                                                            <a class="main_link_primary font-futura text-blue-dark"
                                                                href="{{ url('product/product-detail-layout-01') }}">Baby
                                                                Stroller -
                                                                Grey</a>
                                                        </h6>
                                                        <p class="pb-1 mb-0 fs-15 text-pink">
                                                            <del class="text-muted">$589.00</del>
                                                            $495.00
                                                        </p>
                                                        <div class=" kalles-rating-result">
                                                            <span class="kalles-rating-result__pipe">
                                                                <span class="kalles-rating-result__start"></span>
                                                                <span class="kalles-rating-result__start"></span>
                                                                <span
                                                                    class="kalles-rating-result__start active"></span>
                                                                <span class="kalles-rating-result__start"></span>
                                                                <span class="kalles-rating-result__start"></span>
                                                            </span>
                                                            <span
                                                                class="kalles-rating-result__number text-muted">(4)</span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                                        <a href="#!"
                                                            x-on:mouseover="imageUrl = '/build/images/home-kids/pr-25.jpg'"
                                                            x-on:click.prevent="imageUrl = '/build/images/home-kids/pr-25.jpg'"
                                                            class="d-inline-block bg_color_blue rounded-circle"
                                                            style="background: url('/build/images/home-kids/pr-25.jpg');background-size: cover;"></a>
                                                        <a href="#!"
                                                            x-on:mouseover="imageUrl = '/build/images/home-kids/pr-26.jpg'"
                                                            x-on:click.prevent="imageUrl = '/build/images/home-kids/pr-26.jpg'"
                                                            class="d-inline-block bg-dark rounded-circle"
                                                            style="background: url('/build/images/home-kids/pr-26.jpg');background-size: cover;"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div>
                                                <div x-data="{ imageUrl: '/build/images/home-kids/pr-27.jpg' }"
                                                    class="topbar-product-card desgin_1 bg-muted">
                                                    <div class="position-relative overflow-hidden">
                                                        <img :src="imageUrl" alt=""
                                                            class="img-fluid w-100"
                                                            src="{{ URL::asset('/build/images/home-kids/pr-27.jpg')}}">
                                                        <div class="bg-overlay"></div>
                                                        <a href="#" class="d-lg-none position-absolute "
                                                            style="z-index: 1; top:10px; left:10px;"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <a href="#"
                                                            class="wishlistadd d-none d-lg-flex position-absolute"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <div
                                                            class="product-button d-none d-lg-flex flex-column gap-2">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn rounded-pill fs-14"><span>Quick View</span>
                                                                <i class="iccl iccl-eye"></i></a>
                                                            <button type="button"
                                                                class="btn rounded-pill fs-14 text-black"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#cardModal"><span>Quick Shop</span>
                                                                <i class="iccl iccl-cart"></i></button>
                                                        </div>
                                                        <div class="product2-button position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                                            style="z-index: 1;">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"><i
                                                                    class="iccl iccl-eye fw-semibold"></i></a>
                                                            <button type="button"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"
                                                                data-bs-toggle="modal" data-bs-target="#cardModal"
                                                                class="btn rounded-pill fs-14">
                                                                <i class="iccl iccl-cart fw-semibold"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="my-3">
                                                    <h6 class="fs-16 fw-medium mb-1">
                                                        <a class="main_link_primary font-futura text-blue-dark"
                                                            href="{{ url('product/product-detail-layout-01') }}">Multi
                                                            Color Sailboat
                                                            Toy</a>
                                                    </h6>
                                                    <p class="pb-1 mb-0 fs-15 text-pink">
                                                        $6.00
                                                    </p>
                                                    <div class="kalles-rating-result">
                                                        <span class="kalles-rating-result__pipe">
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start active"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                        </span>
                                                        <span
                                                            class="kalles-rating-result__number text-muted">(1)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div>
                                                <div x-data="{ imageUrl: '/build/images/home-kids/pr-15.jpg' }"
                                                    class="topbar-product-card desgin_1 bg-muted">
                                                    <div class="position-relative overflow-hidden">
                                                        <span
                                                            class="new-label bg-blue-dark text-white rounded-circle">
                                                            -40%
                                                        </span>
                                                        <img :src="imageUrl" alt=""
                                                            class="img-fluid w-100"
                                                            src="{{ URL::asset('/build/images/home-kids/pr-15.jpg')}}">
                                                        <div class="bg-overlay"></div>
                                                        <a href="#" class="d-lg-none position-absolute "
                                                            style="z-index: 1; top:10px; left:10px;"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <a href="#"
                                                            class="wishlistadd d-none d-lg-flex position-absolute"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <div
                                                            class="product-button d-none d-lg-flex flex-column gap-2">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn rounded-pill fs-14"><span>Quick View</span>
                                                                <i class="iccl iccl-eye"></i></a>
                                                            <button type="button"
                                                                class="btn rounded-pill fs-14 text-black"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#cardModal"><span>Quick Shop</span>
                                                                <i class="iccl iccl-cart"></i></button>
                                                        </div>
                                                        <div class="product2-button position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                                            style="z-index: 1;">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"><i
                                                                    class="iccl iccl-eye fw-semibold"></i></a>
                                                            <button type="button"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"
                                                                data-bs-toggle="modal" data-bs-target="#cardModal"
                                                                class="btn rounded-pill fs-14">
                                                                <i class="iccl iccl-cart fw-semibold"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="my-3">
                                                    <h6 class="fs-16 fw-medium mb-1">
                                                        <a class="main_link_primary font-futura text-blue-dark"
                                                            href="{{ url('product/product-detail-layout-01') }}">Baby
                                                            Pajamas</a>
                                                    </h6>
                                                    <p class="pb-1 mb-0 fs-15 text-pink">
                                                        $18.00
                                                    </p>
                                                    <div class="kalles-rating-result">
                                                        <span class="kalles-rating-result__pipe">
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start active"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                        </span>
                                                        <span
                                                            class="kalles-rating-result__number text-muted">(8)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div>
                                                <div x-data="{ imageUrl: '/build/images/home-kids/pr-13.jpg' }"
                                                    class="topbar-product-card desgin_1 bg-muted">
                                                    <div class="position-relative overflow-hidden">
                                                        <span
                                                            class="new-label bg-blue-dark text-white rounded-circle">
                                                            -40%
                                                        </span>
                                                        <img :src="imageUrl" alt=""
                                                            class="img-fluid w-100"
                                                            src="{{ URL::asset('/build/images/home-kids/pr-13.jpg')}}">
                                                        <div class="bg-overlay"></div>
                                                        <a href="#" class="d-lg-none position-absolute "
                                                            style="z-index: 1; top:10px; left:10px;"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <a href="#"
                                                            class="wishlistadd d-none d-lg-flex position-absolute"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <div
                                                            class="product-button d-none d-lg-flex flex-column gap-2">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn rounded-pill fs-14"><span>Quick View</span>
                                                                <i class="iccl iccl-eye"></i></a>
                                                            <button type="button"
                                                                class="btn rounded-pill fs-14 text-black"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#cardModal"><span>Quick Shop</span>
                                                                <i class="iccl iccl-cart"></i></button>
                                                        </div>
                                                        <div class="product2-button position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                                            style="z-index: 1;">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"><i
                                                                    class="iccl iccl-eye fw-semibold"></i></a>
                                                            <button type="button"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"
                                                                data-bs-toggle="modal" data-bs-target="#cardModal"
                                                                class="btn rounded-pill fs-14">
                                                                <i class="iccl iccl-cart fw-semibold"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="my-3">
                                                    <h6 class="fs-16 fw-medium mb-1">
                                                        <a class="main_link_primary font-futura text-blue-dark"
                                                            href="{{ url('product/product-detail-layout-01') }}">Little
                                                            Princess Rose
                                                            Gold</a>
                                                    </h6>
                                                    <p class="pb-1 mb-0 fs-15 text-pink">
                                                        $8.00
                                                    </p>
                                                    <div class="kalles-rating-result">
                                                        <span class="kalles-rating-result__pipe">
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start active"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                        </span>
                                                        <span
                                                            class="kalles-rating-result__number text-muted">(1)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div x-data="{ imageUrl: '/build/images/home-kids/tab-dot-stripe-lines.jpg' }" class="topbar-product-card pb-3">
                                                <div class="position-relative overflow-hidden">
                                                    <span class="new-label bg-blue-dark text-white rounded-circle">
                                                        -21%
                                                    </span>
                                                    <img :src="imageUrl" alt=""
                                                        class="img-fluid w-100"
                                                        src="{{ URL::asset('/build/images/home-kids/tab-dot-stripe-lines.jpg')}}">
                                                    <a href="#" class="wishlistadd position-absolute"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Add to Wishlist"><i
                                                            class="facl facl-heart-o"></i></a>

                                                    <div class="product-button d-flex flex-column gap-2">
                                                        <a href="#!" class="btn rounded-pill fs-14"><span>Quick
                                                                View</span>
                                                            <i class="iccl iccl-eye"></i></a>
                                                        <a href="#!" class="btn rounded-pill fs-14"><span>Quick
                                                                Shop</span>
                                                            <i class="iccl iccl-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <div class="my-3">
                                                        <h6 class="fs-16 fw-medium mb-1">
                                                            <a class="main_link_primary font-futura text-blue-dark"
                                                                href="{{ url('product/product-detail-layout-01') }}">Cosatto
                                                                Baby Fleece
                                                                Troller</a>
                                                        </h6>
                                                        <p class="pb-1 mb-0 fs-15 text-pink">
                                                            $99.00 – $145.00
                                                        </p>
                                                        <div class=" kalles-rating-result">
                                                            <span class="kalles-rating-result__pipe">
                                                                <span class="kalles-rating-result__start"></span>
                                                                <span class="kalles-rating-result__start"></span>
                                                                <span
                                                                    class="kalles-rating-result__start active"></span>
                                                                <span class="kalles-rating-result__start"></span>
                                                                <span class="kalles-rating-result__start"></span>
                                                            </span>
                                                            <span
                                                                class="kalles-rating-result__number text-muted">(4)</span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                                        <a href="#!"
                                                            x-on:mouseover="imageUrl = '/build/images/home-kids/tab-dot-dark-blue.jpg'"
                                                            x-on:click.prevent="imageUrl = '/build/images/home-kids/tab-dot-dark-blue.jpg'"
                                                            class="d-inline-block bg_color_blue rounded-circle"
                                                            style="background: url('/build/images/home-kids/tab-dot-dark-blue.jpg');background-size: cover;"></a>
                                                        <a href="#!"
                                                            x-on:mouseover="imageUrl = '/build/images/home-kids/tab-dot-stripe-lines.jpg'"
                                                            x-on:click.prevent="imageUrl = '/build/images/home-kids/tab-dot-stripe-lines.jpg'"
                                                            class="d-inline-block bg-dark rounded-circle"
                                                            style="background: url('/build/images/home-kids/tab-dot-stripe-lines.jpg');background-size: cover;"></a>
                                                        <a href="#!"
                                                            x-on:mouseover="imageUrl = '/build/images/home-kids/tab-dot-nude.jpg'"
                                                            x-on:click.prevent="imageUrl = '/build/images/home-kids/tab-dot-nude.jpg'"
                                                            class="d-inline-block bg-dark rounded-circle"
                                                            style="background: url('/build/images/home-kids/tab-dot-nude.jpg');background-size: cover;"></a>
                                                        <a href="#!"
                                                            x-on:mouseover="imageUrl = '/build/images/home-kids/tab-dot-grey.jpg'"
                                                            x-on:click.prevent="imageUrl = '/build/images/home-kids/tab-dot-grey.jpg'"
                                                            class="d-inline-block bg-dark rounded-circle"
                                                            style="background: url('/build/images/home-kids/tab-dot-grey.jpg');background-size: cover;"></a>
                                                        <a href="#!"
                                                            x-on:mouseover="imageUrl = '/build/images/home-kids/tab-dot-stripe-lines.jpg'"
                                                            x-on:click.prevent="imageUrl = '/build/images/home-kids/tab-dot-stripe-lines.jpg'"
                                                            class="d-inline-block bg-dark rounded-circle"
                                                            style="background: url('/build/images/home-kids/tab-dot-stripe-lines.jpg');background-size: cover;"></a>
                                                        <a href="#!"
                                                            x-on:mouseover="imageUrl = '/build/images/home-kids/tab-dot-dark-blue.jpg'"
                                                            x-on:click.prevent="imageUrl = '/build/images/home-kids/tab-dot-dark-blue.jpg'"
                                                            class="d-inline-block bg-dark rounded-circle"
                                                            style="background: url('/build/images/home-kids/tab-dot-dark-blue.jpg');background-size: cover;"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="sale" role="tabpanel"
                                    aria-labelledby="sale-tab" tabindex="0">
                                    <div class="row g-4">
                                        <div class="col-6 col-lg-3">
                                            <div x-data="{ imageUrl: '/build/images/home-kids/pr-26.jpg' }" class="topbar-product-card pb-3">
                                                <div class="position-relative overflow-hidden">
                                                    <span class="new-label bg-blue-dark text-white rounded-circle">
                                                        -34%
                                                    </span>
                                                    <img :src="imageUrl" alt=""
                                                        class="img-fluid w-100"
                                                        src="{{ URL::asset('/build/images/home-kids/pr-26.jpg')}}">
                                                    <a href="#" class="wishlistadd position-absolute"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Add to Wishlist"><i
                                                            class="facl facl-heart-o"></i></a>

                                                    <div class="product-button d-flex flex-column gap-2">
                                                        <a href="#!" class="btn rounded-pill fs-14"><span>Quick
                                                                View</span>
                                                            <i class="iccl iccl-eye"></i></a>
                                                        <a href="#!" class="btn rounded-pill fs-14"><span>Quick
                                                                Shop</span>
                                                            <i class="iccl iccl-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <div class="my-3">
                                                        <h6 class="fs-16 fw-medium mb-1">
                                                            <a class="main_link_primary font-futura text-blue-dark"
                                                                href="{{ url('product/product-detail-layout-01') }}">Baby
                                                                Stroller -
                                                                Grey</a>
                                                        </h6>
                                                        <p class="pb-1 mb-0 fs-15 text-pink">
                                                            <del class="text-muted">$589.00</del>
                                                            $495.00
                                                        </p>
                                                        <div class=" kalles-rating-result">
                                                            <span class="kalles-rating-result__pipe">
                                                                <span class="kalles-rating-result__start"></span>
                                                                <span class="kalles-rating-result__start"></span>
                                                                <span
                                                                    class="kalles-rating-result__start active"></span>
                                                                <span class="kalles-rating-result__start"></span>
                                                                <span class="kalles-rating-result__start"></span>
                                                            </span>
                                                            <span
                                                                class="kalles-rating-result__number text-muted">(4)</span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                                        <a href="#!"
                                                            x-on:mouseover="imageUrl = '/build/images/home-kids/pr-25.jpg'"
                                                            x-on:click.prevent="imageUrl = '/build/images/home-kids/pr-25.jpg'"
                                                            class="d-inline-block bg_color_blue rounded-circle"
                                                            style="background: url('/build/images/home-kids/pr-25.jpg');background-size: cover;"></a>
                                                        <a href="#!"
                                                            x-on:mouseover="imageUrl = '/build/images/home-kids/pr-26.jpg'"
                                                            x-on:click.prevent="imageUrl = '/build/images/home-kids/pr-26.jpg'"
                                                            class="d-inline-block bg-dark rounded-circle"
                                                            style="background: url('/build/images/home-kids/pr-26.jpg');background-size: cover;"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div>
                                                <div x-data="{ imageUrl: '/build/images/home-kids/pr-27.jpg' }"
                                                    class="topbar-product-card desgin_1 bg-muted">
                                                    <div class="position-relative overflow-hidden">
                                                        <img :src="imageUrl" alt=""
                                                            class="img-fluid w-100"
                                                            src="{{ URL::asset('/build/images/home-kids/pr-27.jpg')}}">
                                                        <div class="bg-overlay"></div>
                                                        <a href="#" class="d-lg-none position-absolute "
                                                            style="z-index: 1; top:10px; left:10px;"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <a href="#"
                                                            class="wishlistadd d-none d-lg-flex position-absolute"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <div
                                                            class="product-button d-none d-lg-flex flex-column gap-2">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn rounded-pill fs-14"><span>Quick View</span>
                                                                <i class="iccl iccl-eye"></i></a>
                                                            <button type="button"
                                                                class="btn rounded-pill fs-14 text-black"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#cardModal"><span>Quick Shop</span>
                                                                <i class="iccl iccl-cart"></i></button>
                                                        </div>
                                                        <div class="product2-button position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                                            style="z-index: 1;">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"><i
                                                                    class="iccl iccl-eye fw-semibold"></i></a>
                                                            <button type="button"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"
                                                                data-bs-toggle="modal" data-bs-target="#cardModal"
                                                                class="btn rounded-pill fs-14">
                                                                <i class="iccl iccl-cart fw-semibold"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="my-3">
                                                    <h6 class="fs-16 fw-medium mb-1">
                                                        <a class="main_link_primary font-futura text-blue-dark"
                                                            href="{{ url('product/product-detail-layout-01') }}">Multi
                                                            Color Sailboat
                                                            Toy</a>
                                                    </h6>
                                                    <p class="pb-1 mb-0 fs-15 text-pink">
                                                        $6.00
                                                    </p>
                                                    <div class="kalles-rating-result">
                                                        <span class="kalles-rating-result__pipe">
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start active"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                        </span>
                                                        <span
                                                            class="kalles-rating-result__number text-muted">(1)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div>
                                                <div x-data="{ imageUrl: '/build/images/home-kids/pr-21.jpg' }"
                                                    class="topbar-product-card desgin_1 bg-muted">
                                                    <div class="position-relative overflow-hidden">
                                                        <img :src="imageUrl" alt=""
                                                            class="img-fluid w-100"
                                                            src="{{ URL::asset('/build/images/home-kids/pr-21.jpg')}}">
                                                        <div class="bg-overlay"></div>
                                                        <a href="#" class="d-lg-none position-absolute "
                                                            style="z-index: 1; top:10px; left:10px;"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <a href="#"
                                                            class="wishlistadd d-none d-lg-flex position-absolute"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <div
                                                            class="product-button d-none d-lg-flex flex-column gap-2">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn rounded-pill fs-14"><span>Quick View</span>
                                                                <i class="iccl iccl-eye"></i></a>
                                                            <button type="button"
                                                                class="btn rounded-pill fs-14 text-black"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#cardModal"><span>Quick Shop</span>
                                                                <i class="iccl iccl-cart"></i></button>
                                                        </div>
                                                        <div class="product2-button position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                                            style="z-index: 1;">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"><i
                                                                    class="iccl iccl-eye fw-semibold"></i></a>
                                                            <button type="button"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"
                                                                data-bs-toggle="modal" data-bs-target="#cardModal"
                                                                class="btn rounded-pill fs-14">
                                                                <i class="iccl iccl-cart fw-semibold"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="my-3">
                                                    <h6 class="fs-16 fw-medium mb-1">
                                                        <a class="main_link_primary font-futura text-blue-dark"
                                                            href="{{ url('product/product-detail-layout-01') }}">Monkey
                                                            Cutie Toy For
                                                            Baby</a>
                                                    </h6>
                                                    <p class="pb-1 mb-0 fs-15 text-pink">
                                                        $29.00
                                                    </p>
                                                    <div class="kalles-rating-result">
                                                        <span class="kalles-rating-result__pipe">
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start active"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                        </span>
                                                        <span
                                                            class="kalles-rating-result__number text-muted">(5)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div>
                                                <div x-data="{ imageUrl: '/build/images/home-kids/pr-29.jpg' }"
                                                    class="topbar-product-card desgin_1 bg-muted">
                                                    <div class="position-relative overflow-hidden">
                                                        <img :src="imageUrl" alt=""
                                                            class="img-fluid w-100"
                                                            src="{{ URL::asset('/build/images/home-kids/pr-21.jpg')}}">
                                                        <div class="bg-overlay"></div>
                                                        <a href="#" class="d-lg-none position-absolute "
                                                            style="z-index: 1; top:10px; left:10px;"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <a href="#"
                                                            class="wishlistadd d-none d-lg-flex position-absolute"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <div
                                                            class="product-button d-none d-lg-flex flex-column gap-2">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn rounded-pill fs-14"><span>Quick View</span>
                                                                <i class="iccl iccl-eye"></i></a>
                                                            <button type="button"
                                                                class="btn rounded-pill fs-14 text-black"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#cardModal"><span>Quick Shop</span>
                                                                <i class="iccl iccl-cart"></i></button>
                                                        </div>
                                                        <div class="product2-button position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                                            style="z-index: 1;">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"><i
                                                                    class="iccl iccl-eye fw-semibold"></i></a>
                                                            <button type="button"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"
                                                                data-bs-toggle="modal" data-bs-target="#cardModal"
                                                                class="btn rounded-pill fs-14">
                                                                <i class="iccl iccl-cart fw-semibold"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="my-3">
                                                    <h6 class="fs-16 fw-medium mb-1">
                                                        <a class="main_link_primary font-futura text-blue-dark"
                                                            href="{{ url('product/product-detail-layout-01') }}">Baby
                                                            Pajamas</a>
                                                    </h6>
                                                    <p class="pb-1 mb-0 fs-15 text-pink">
                                                        $18.00
                                                    </p>
                                                    <div class="kalles-rating-result">
                                                        <span class="kalles-rating-result__pipe">
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start active"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                        </span>
                                                        <span
                                                            class="kalles-rating-result__number text-muted">(8)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div>
                                                <div x-data="{ imageUrl: '/build/images/home-kids/pr-23.jpg' }"
                                                    class="topbar-product-card desgin_1 bg-muted">
                                                    <div class="position-relative overflow-hidden">
                                                        <img :src="imageUrl" alt=""
                                                            class="img-fluid w-100"
                                                            src="{{ URL::asset('/build/images/home-kids/pr-21.jpg')}}">
                                                        <div class="bg-overlay"></div>
                                                        <a href="#" class="d-lg-none position-absolute "
                                                            style="z-index: 1; top:10px; left:10px;"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <a href="#"
                                                            class="wishlistadd d-none d-lg-flex position-absolute"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <div
                                                            class="product-button d-none d-lg-flex flex-column gap-2">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn rounded-pill fs-14"><span>Quick View</span>
                                                                <i class="iccl iccl-eye"></i></a>
                                                            <button type="button"
                                                                class="btn rounded-pill fs-14 text-black"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#cardModal"><span>Quick Shop</span>
                                                                <i class="iccl iccl-cart"></i></button>
                                                        </div>
                                                        <div class="product2-button position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                                            style="z-index: 1;">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"><i
                                                                    class="iccl iccl-eye fw-semibold"></i></a>
                                                            <button type="button"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"
                                                                data-bs-toggle="modal" data-bs-target="#cardModal"
                                                                class="btn rounded-pill fs-14">
                                                                <i class="iccl iccl-cart fw-semibold"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="my-3">
                                                    <h6 class="fs-16 fw-medium mb-1">
                                                        <a class="main_link_primary font-futura text-blue-dark"
                                                            href="{{ url('product/product-detail-layout-01') }}">Summer
                                                            My Fun Sticker
                                                            Potty</a>
                                                    </h6>
                                                    <p class="pb-1 mb-0 fs-15 text-pink">
                                                        $20.00
                                                    </p>
                                                    <div class="kalles-rating-result">
                                                        <span class="kalles-rating-result__pipe">
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start active"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                        </span>
                                                        <span
                                                            class="kalles-rating-result__number text-muted">(4)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6 col-lg-3">
                                            <div>
                                                <div x-data="{ imageUrl: '/build/images/home-kids/pr-15.jpg' }"
                                                    class="topbar-product-card desgin_1 bg-muted">
                                                    <div class="position-relative overflow-hidden">
                                                        <span
                                                            class="new-label bg-blue-dark text-white rounded-circle">
                                                            -40%
                                                        </span>
                                                        <img :src="imageUrl" alt=""
                                                            class="img-fluid w-100"
                                                            src="{{ URL::asset('/build/images/home-kids/pr-15.jpg')}}">
                                                        <div class="bg-overlay"></div>
                                                        <a href="#" class="d-lg-none position-absolute "
                                                            style="z-index: 1; top:10px; left:10px;"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <a href="#"
                                                            class="wishlistadd d-none d-lg-flex position-absolute"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <div
                                                            class="product-button d-none d-lg-flex flex-column gap-2">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn rounded-pill fs-14"><span>Quick View</span>
                                                                <i class="iccl iccl-eye"></i></a>
                                                            <button type="button"
                                                                class="btn rounded-pill fs-14 text-black"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#cardModal"><span>Quick Shop</span>
                                                                <i class="iccl iccl-cart"></i></button>
                                                        </div>
                                                        <div class="product2-button position-absolute d-lg-none bottom-0 end-0 d-flex flex-column rounded-pill m-2"
                                                            style="z-index: 1;">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"><i
                                                                    class="iccl iccl-eye fw-semibold"></i></a>
                                                            <button type="button"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"
                                                                data-bs-toggle="modal" data-bs-target="#cardModal"
                                                                class="btn rounded-pill fs-14">
                                                                <i class="iccl iccl-cart fw-semibold"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="my-3">
                                                    <h6 class="fs-16 fw-medium mb-1">
                                                        <a class="main_link_primary font-futura text-blue-dark"
                                                            href="{{ url('product/product-detail-layout-01') }}">Baby
                                                            Pajamas</a>
                                                    </h6>
                                                    <p class="pb-1 mb-0 fs-15 text-pink">
                                                        $18.00
                                                    </p>
                                                    <div class="kalles-rating-result">
                                                        <span class="kalles-rating-result__pipe">
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start active"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                        </span>
                                                        <span
                                                            class="kalles-rating-result__number text-muted">(8)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div>
                                                <div x-data="{ imageUrl: '/build/images/home-kids/pr-13.jpg' }"
                                                    class="topbar-product-card desgin_1 bg-muted">
                                                    <div class="position-relative overflow-hidden">
                                                        <span
                                                            class="new-label bg-blue-dark text-white rounded-circle">
                                                            -40%
                                                        </span>
                                                        <img :src="imageUrl" alt=""
                                                            class="img-fluid w-100"
                                                            src="{{ URL::asset('/build/images/home-kids/pr-13.jpg')}}">
                                                        <div class="bg-overlay"></div>
                                                        <a href="#" class="d-lg-none position-absolute "
                                                            style="z-index: 1; top:10px; left:10px;"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <a href="#"
                                                            class="wishlistadd d-none d-lg-flex position-absolute"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Add to Wishlist"><i
                                                                class="facl facl-heart-o text-white"></i></a>
                                                        <div
                                                            class="product-button d-none d-lg-flex flex-column gap-2">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn rounded-pill fs-14"><span>Quick View</span>
                                                                <i class="iccl iccl-eye"></i></a>
                                                            <button type="button"
                                                                class="btn rounded-pill fs-14 text-black"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#cardModal"><span>Quick Shop</span>
                                                                <i class="iccl iccl-cart"></i></button>
                                                        </div>
                                                        <div class="product2-button position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2"
                                                            style="z-index: 1;">
                                                            <a href="#exampleModal" data-bs-toggle="modal"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"><i
                                                                    class="iccl iccl-eye fw-semibold"></i></a>
                                                            <button type="button"
                                                                class="btn responsive-cart rounded-pill fs-14 p-2"
                                                                style="width:36px; height: 36px;"
                                                                data-bs-toggle="modal" data-bs-target="#cardModal"
                                                                class="btn rounded-pill fs-14">
                                                                <i class="iccl iccl-cart fw-semibold"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="my-3">
                                                    <h6 class="fs-16 fw-medium mb-1">
                                                        <a class="main_link_primary font-futura text-blue-dark"
                                                            href="{{ url('product/product-detail-layout-01') }}">Little
                                                            Princess Rose
                                                            Gold</a>
                                                    </h6>
                                                    <p class="pb-1 mb-0 fs-15 text-pink">
                                                        $8.00
                                                    </p>
                                                    <div class="kalles-rating-result">
                                                        <span class="kalles-rating-result__pipe">
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start active"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                            <span class="kalles-rating-result__start"></span>
                                                        </span>
                                                        <span
                                                            class="kalles-rating-result__number text-muted">(1)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div x-data="{ imageUrl: '/build/images/home-kids/tab-dot-stripe-lines.jpg' }" class="topbar-product-card pb-3">
                                                <div class="position-relative overflow-hidden">
                                                    <span class="new-label bg-blue-dark text-white rounded-circle">
                                                        -21%
                                                    </span>
                                                    <img :src="imageUrl" alt=""
                                                        class="img-fluid w-100"
                                                        src="{{ URL::asset('/build/images/home-kids/tab-dot-stripe-lines.jpg')}}">
                                                    <a href="#" class="wishlistadd position-absolute"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Add to Wishlist"><i
                                                            class="facl facl-heart-o"></i></a>

                                                    <div class="product-button d-flex flex-column gap-2">
                                                        <a href="#!" class="btn rounded-pill fs-14"><span>Quick
                                                                View</span>
                                                            <i class="iccl iccl-eye"></i></a>
                                                        <a href="#!" class="btn rounded-pill fs-14"><span>Quick
                                                                Shop</span>
                                                            <i class="iccl iccl-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <div class="my-3">
                                                        <h6 class="fs-16 fw-medium mb-1">
                                                            <a class="main_link_primary font-futura text-blue-dark"
                                                                href="{{ url('product/product-detail-layout-01') }}">Cosatto
                                                                Baby Fleece
                                                                Troller</a>
                                                        </h6>
                                                        <p class="pb-1 mb-0 fs-15 text-pink">
                                                            $99.00 – $145.00
                                                        </p>
                                                        <div class=" kalles-rating-result">
                                                            <span class="kalles-rating-result__pipe">
                                                                <span class="kalles-rating-result__start"></span>
                                                                <span class="kalles-rating-result__start"></span>
                                                                <span
                                                                    class="kalles-rating-result__start active"></span>
                                                                <span class="kalles-rating-result__start"></span>
                                                                <span class="kalles-rating-result__start"></span>
                                                            </span>
                                                            <span
                                                                class="kalles-rating-result__number text-muted">(4)</span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                                        <a href="#!"
                                                            x-on:mouseover="imageUrl = '/build/images/home-kids/tab-dot-dark-blue.jpg'"
                                                            x-on:click.prevent="imageUrl = '/build/images/home-kids/tab-dot-dark-blue.jpg'"
                                                            class="d-inline-block bg_color_blue rounded-circle"
                                                            style="background: url('/build/images/home-kids/tab-dot-dark-blue.jpg');background-size: cover;"></a>
                                                        <a href="#!"
                                                            x-on:mouseover="imageUrl = '/build/images/home-kids/tab-dot-stripe-lines.jpg'"
                                                            x-on:click.prevent="imageUrl = '/build/images/home-kids/tab-dot-nude.jpg'"
                                                            class="d-inline-block bg-dark rounded-circle"
                                                            style="background: url('/build/images/home-kids/tab-dot-nude.jpg');background-size: cover;"></a>
                                                        <a href="#!"
                                                            x-on:mouseover="imageUrl = '/build/images/home-kids/tab-dot-nude.jpg'"
                                                            x-on:click.prevent="imageUrl = '/build/images/home-kids/tab-dot-nude.jpg'"
                                                            class="d-inline-block bg-dark rounded-circle"
                                                            style="background: url('/build/images/home-kids/tab-dot-nude.jpg');background-size: cover;"></a>
                                                        <a href="#!"
                                                            x-on:mouseover="imageUrl = '/build/images/home-kids/tab-dot-grey.jpg'"
                                                            x-on:click.prevent="imageUrl = '/build/images/home-kids/tab-dot-grey.jpg'"
                                                            class="d-inline-block bg-dark rounded-circle"
                                                            style="background: url('/build/images/home-kids/tab-dot-grey.jpg');background-size: cover;"></a>
                                                        <a href="#!"
                                                            x-on:mouseover="imageUrl = '/build/images/home-kids/tab-dot-stripe-lines.jpg'"
                                                            x-on:click.prevent="imageUrl = '/build/images/home-kids/tab-dot-nude.jpg'"
                                                            class="d-inline-block bg-dark rounded-circle"
                                                            style="background: url('/build/images/home-kids/tab-dot-nude.jpg');background-size: cover;"></a>
                                                        <a href="#!"
                                                            x-on:mouseover="imageUrl = '/build/images/home-kids/tab-dot-dark-blue.jpg'"
                                                            x-on:click.prevent="imageUrl = '/build/images/home-kids/tab-dot-dark-blue.jpg'"
                                                            class="d-inline-block bg-dark rounded-circle"
                                                            style="background: url('/build/images/home-kids/tab-dot-dark-blue.jpg');background-size: cover;"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="kalles-section_type_featured_blog py-0">
            <div class="container-fluid bg-white px-4 py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="text-center mb-4 pb-2">
                            <div class="mb-2">
                                <h2 class="position-relative kids-header"><span>LATES FROM BLOG</span></h2>
                            </div>
                            <span class="section-subtitle sub-title fs-14 text-muted">The freshest and most exciting
                                news</span>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="row g-4 blog-arrow"
                            data-flickity='{"imagesLoaded": 0, "adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold": 5, "cellAlign": "left", "wrapAround": true, "prevNextButtons": true, "percentPosition": 1, "pageDots": false, "autoPlay": 0, "pauseAutoPlayOnHover": true, "cellSpacing": 20 }'
                            dir="ltr">
                            <div class="col-lg-4 col-sm-6">
                                <div class="blog-card">
                                    <a href="{{ url('blog/blog-left-sidebar') }}"
                                        class="overflow-hidden d-block blog-wrap">
                                        <img src="{{ URL::asset('/build/images/home-kids/blog-post-01.jpg') }}"
                                            alt="" class="img-fluid">
                                    </a>
                                    <h6 class="fs-16 mt-3 main_link_primary mb-2"><a
                                            href="{{ url('blog/blog-post-with-instagram-shop') }}"
                                            class="text-reset font-futura fw-normal main_link_primary">Why February
                                            Babies
                                            Are Extra Special</a></h6>
                                    <div class="post-content text-muted">Applying The Kids Design Guide Internet
                                        technology
                                        such
                                        as
                                        online retailers and social media platforms have given...</div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-4 col-sm-6">
                                <div class="blog-card">
                                    <a href="{{ url('blog/blog-left-sidebar') }}"
                                        class="overflow-hidden d-block blog-wrap">
                                        <img src="{{ URL::asset('/build/images/home-kids/blog-post-02.jpg') }}"
                                            alt="" class="img-fluid">
                                    </a>
                                    <h6 class="fs-16 mt-3 main_link_primary mb-2"><a
                                            href="{{ url('blog/blog-post-with-instagram-shop') }}"
                                            class="text-reset font-futura fw-normal main_link_primary">The End Result
                                            Was
                                            Absolutely Amazing</a></h6>
                                    <div class="post-content text-muted">Consumption as a share of gross domestic
                                        product in
                                        China
                                        has fallen for six decades, from 76 percent in 1952 to 28...</div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-4 col-sm-6">
                                <div class="blog-card">
                                    <a href="{{ url('blog/blog-left-sidebar') }}"
                                        class="overflow-hidden d-block blog-wrap">
                                        <img src="{{ URL::asset('/build/images/home-kids/blog-post-03.jpg') }}"
                                            alt="" class="img-fluid">
                                    </a>
                                    <h6 class="fs-16 mt-3 main_link_primary mb-2"><a
                                            href="{{ url('blog/blog-post-with-instagram-shop') }}"
                                            class="text-reset font-futura fw-normal main_link_primary">The Surprising
                                            Way
                                            Motherhood Changed Me</a></h6>
                                    <div class="post-content text-muted">The End Result Was Absolutely Amazing As we
                                        undergo
                                        a
                                        global economic downturn, the “Spend now, think later” belief...</div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div>
            </div><!--end container-->
        </section>

        <section>
            <div class="container-fluid overflow-hidden bg-white px-0">
                <div class="position-relative">
                    <img class="kids-subscribe-image"
                        src="{{ URL::asset('/build/images/home-kids/newsletter-bg.png') }}" alt="">
                    <div class="position-absolute top-50 start-0 w-100 translate-middle-y">
                        <div class="row align-items-center justify-content-center pt-5 pb-4">
                            <div class="col-lg-5 text-white mb-4 mb-md-0">
                                <p class="text-center text-lg-start fs-22 mb-0">Subscribe Now!</p>
                            </div>
                            <div class="col-lg-5">
                                <form id="contact_form" class="d-block">
                                    <div class="footer-subscribe position-relative">
                                        <input type="email" name="email" placeholder="Your email address"
                                            value=""
                                            class="input-text form-control form-control-lg text-white py-3 w-100 rounded-pill bg-transparent text-white text-opacity-75 fs-14"
                                            required="required">
                                        <button type="submit"
                                            class="btn btn-dark position-absolute kids-subscribe-btn rounded-pill">
                                            <span>Subscribe</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        @include('partials.footer-kids')
        @include('partials.popup')

    </div>

    @include('partials.card-model')
    @include('partials.vendor-scripts')

    <script src="{{ URL::asset('build/libs/flickity/flickity.pkgd.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
</body>

</html>
