<section class="type_tab_collection">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="text-center">
                    <div class="mb-2">
                        <h3 class="section-title position-relative text-uppercase">
                            <span>OUR PRODUCTS</span>
                        </h3>
                    </div>
                    <span class="section-subtitle sub-title font-secondary fst-italic fs-14 text-muted">Top sale in
                        this week</span>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        <div class="mt-4">
            <ul class="nav tab_header gap-lg-4 justify-content-center mt-4 mb-0" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-pill active" id="best-seller-tab" data-bs-toggle="pill" data-bs-target="#best-seller" type="button" role="tab" aria-controls="best-seller" aria-selected="true">Best Seller</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-pill" id="featured-tab" data-bs-toggle="pill" data-bs-target="#featured" type="button" role="tab" aria-controls="featured" aria-selected="false">Featured</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-pill" id="sale-tab" data-bs-toggle="pill" data-bs-target="#sale" type="button" role="tab" aria-controls="sale" aria-selected="false">Sale</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-pill" id="top-sale-tab" data-bs-toggle="pill" data-bs-target="#top-sale" type="button" role="tab" aria-controls="top-sale" aria-selected="false">Top Sale</button>
                </li>
            </ul>
            <div class="tab-content mt-4" id="pills-tabContent">
                <!-- tab-1 -->
                <div class="tab-pane fade show active" id="best-seller" role="tabpanel" aria-labelledby="best-seller-tab" tabindex="0">
                    <div class="row g-4">
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-29.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/products/pr-30.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                    <h6 class="mb-1"> City Backpack Black</h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$55.00</span>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/home-metro/pr-q10.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/home-metro/pr-q11.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                    <h6 class="mb-1"> Women Black Pants </h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$100.00</span>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-15.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/products/pr-14.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100" src="{{ URL::asset('/build/images/products/pr-15.jpg')}}">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="bg-overlay"></div>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">Mercury Tee</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span class="text-muted">$68.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-metro/pr-q1.jpg'; isHovered = false" style="background: url('/build/images/home-metro/pr-q1.jpg');background-size: cover;" class="d-inline-block bg-body-tertiary rounded-circle"></a>
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-metro/pr-q2.jpg'; isHovered = false" style="background: url('/build/images/home-metro/pr-q2.jpg');background-size: cover;" class="d-inline-block bg_color_pink rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-12.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid object-fit-cover w-100">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Men
                                            pants</a>
                                    </h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$49.00 – $56.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-12.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-12.jpg'" class="d-inline-block bg_color_blue rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-34.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-34.jpg'" class="d-inline-block bg-dark rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="featured" role="tabpanel" aria-labelledby="featured-tab" tabindex="0">
                    <div class="row g-4">
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-01.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-success text-white rounded-circle text-center"> New
                                    </span>
                                    <img :src="isHovered ? '/build/images/products/pr-02.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL
                                    </p>
                                </div>
                                <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                    <h6 class="mb-1">Analogue
                                        Resin Strap</h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$30.00</span>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-33.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/products/pr-34.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                    <p class="product-size mb-0 text-center text-white fw-medium">S, M, L</p>
                                </div>
                                <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                    <h6 class="mb-1"> Ridley High Waist</h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$36.00</span>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-04.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid object-fit-cover w-100">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                    <p class="product-size mb-0 text-center text-white fw-medium">S, M, L</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">Blush Beanie</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$15.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-05.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-05.jpg'" class="d-inline-block bg-body-tertiary rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-31.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-31.jpg'" class="d-inline-block bg_color_pink rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-32.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-32.jpg'" class="d-inline-block bg-dark rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-11.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-danger text-white rounded-circle"> -25% </span>
                                    <img :src="imageUrl" alt="" class="img-fluid object-fit-cover w-100">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">Cluse La Boheme Rose
                                            Gold</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$60.00</del>
                                        <span class="text-danger">$45.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-07.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-07.jpg'" class="d-inline-block bg_color_green rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-08.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-08.jpg'" class="d-inline-block bg-body-secondary rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-09.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-09.jpg'" class="d-inline-block bg_color_blue rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="sale" role="tabpanel" aria-labelledby="sale-tab" tabindex="0">
                    <div class="row g-4">
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-01.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-success text-white rounded-circle text-center"> New
                                    </span>
                                    <img :src="isHovered ? '/build/images/products/pr-02.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL
                                    </p>
                                </div>
                                <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                    <h6 class="mb-1">Analogue
                                        Resin Strap</h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$30.00</span>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-33.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/products/pr-34.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                    <p class="product-size mb-0 text-center text-white fw-medium">S, M, L</p>
                                </div>
                                <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                    <h6 class="mb-1"> Ridley High Waist</h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$36.00</span>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-04.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid object-fit-cover w-100">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                    <p class="product-size mb-0 text-center text-white fw-medium">S, M, L</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">Blush Beanie</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$15.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-05.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-05.jpg'" class="d-inline-block bg-body-tertiary rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-31.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-31.jpg'" class="d-inline-block bg_color_pink rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-32.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-32.jpg'" class="d-inline-block bg-dark rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-06.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <span class="new-label bg-danger text-white rounded-circle"> -25% </span>
                                    <img :src="imageUrl" alt="" class="img-fluid object-fit-cover w-100">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                    <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M</p>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">Cluse La Boheme Rose
                                            Gold</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <del>$60.00</del>
                                        <span class="text-danger">$45.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-07.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-07.jpg'" class="d-inline-block bg_color_green rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-08.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-08.jpg'" class="d-inline-block bg-body-secondary rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-09.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-09.jpg'" class="d-inline-block bg_color_blue rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- tab 4 -->
                <div class="tab-pane fade" id="top-sale" role="tabpanel" aria-labelledby="top-sale-tab" tabindex="0">
                    <div class="row g-4">
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-29.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/products/pr-30.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                    <h6 class="mb-1"> City Backpack Black</h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$55.00</span>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/home-metro/pr-q10.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/home-metro/pr-q11.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                                    <h6 class="mb-1"> Women Black Pants </h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$100.00</span>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-15.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
                                <div class="position-relative overflow-hidden">
                                    <img :src="isHovered ? '/build/images/products/pr-14.jpg' : imageUrl" alt="" class="img-fluid object-fit-cover w-100" src="{{ URL::asset('/build/images/products/pr-15.jpg')}}">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="bg-overlay"></div>
                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="#!" class="product-title">Mercury Tee</a></h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span class="text-muted">$68.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-metro/pr-q1.jpg'; isHovered = false" style="background: url('/build/images/home-metro/pr-q1.jpg');background-size: cover;" class="d-inline-block bg-body-tertiary rounded-circle"></a>
                                        <a href="#!" x-on:click.prevent="imageUrl = '/build/images/home-metro/pr-q2.jpg'; isHovered = false" style="background: url('/build/images/home-metro/pr-q2.jpg');background-size: cover;" class="d-inline-block bg_color_pink rounded-circle"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div x-data="{ imageUrl: '/build/images/products/pr-12.jpg' }" class="topbar-product-card pb-3">
                                <div class="position-relative overflow-hidden">
                                    <img :src="imageUrl" alt="" class="img-fluid object-fit-cover w-100">
                                    <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                                    <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                                    <div class="product-button d-none d-lg-flex flex-column gap-2">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick View</span> <i class="iccl iccl-eye"></i></a>
                                        <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                            <i class="iccl iccl-cart"></i></button>
                                    </div>
                                    <div class="position-absolute d-lg-none bottom-0 end-0 d-flex flex-column bg-white rounded-pill m-2" style="z-index: 1;">
                                        <a href="#exampleModal" data-bs-toggle="modal" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;"><i class="iccl iccl-eye fw-semibold"></i></a>
                                        <button type="button" class="btn responsive-cart rounded-pill fs-14 p-2" style="width:36px; height: 36px;" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14">
                                            <i class="iccl iccl-cart fw-semibold"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Men
                                            pants</a>
                                    </h6>
                                    <p class="mb-0 fs-14 text-muted">
                                        <span>$49.00 – $56.00</span>
                                    </p>
                                    <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-12.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-12.jpg'" class="d-inline-block bg_color_blue rounded-circle"></a>
                                        <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-34.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-34.jpg'" class="d-inline-block bg-dark rounded-circle"></a>
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