<div class="row mt-4 my-sm-4 pt-2 py-sm-2" data-flickity='{"imagesLoaded": 0,"adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": false,"percentPosition": 1,"pageDots": false, "autoPlay" : 0, "pauseAutoPlayOnHover" : true, "rightToLeft": false }'>

    <div class="col-md-3 col-6 px-lg-12 px-2">
        <div x-data="{ imageUrl: '/build/images/products/pr-33.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
            <div class="position-relative overflow-hidden">
                <img :src="isHovered ? '/build/images/products/pr-34.jpg' : imageUrl" alt="" class="img-fluid">
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
    <div class="col-md-3 col-6 px-lg-12 px-2">
        <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-51.jpg' }" class="topbar-product-card pb-3">
            <div class="position-relative overflow-hidden">
                <span class="new-label bg-danger text-white rounded-circle"> -25% </span>
                <img :src="imageUrl" alt="" class="img-fluid">
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
                <h6 class="mb-1"><a href="#!" class="product-title">Skin Sweatpans</a></h6>
                <p class="mb-0 fs-14 text-muted">
                    <del>$60.00</del>
                    <span class="text-danger">$45.00</span>
                </p>
                <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/home-fashion-9/pr-s-50.jpg'" x-on:click.prevent="imageUrl = '/build/images/home-fashion-9/pr-s-50.jpg'" class="d-inline-block bg_color_pink2 rounded-circle"></a>
                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/home-fashion-9/pr-s-51.jpg'" x-on:click.prevent="imageUrl = '/build/images/home-fashion-9/pr-s-51.jpg'" class="d-inline-block bg-blue-dark rounded-circle"></a>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-6 px-lg-12 px-2">
        <div x-data="{ imageUrl: '/build/images/products/pr-04.jpg' }" class="topbar-product-card pb-3">
            <div class="position-relative overflow-hidden">
                <img :src="imageUrl" alt="" class="img-fluid">
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
    <div class="col-md-3 col-6 px-lg-12 px-2">
        <div x-data="{ imageUrl: '/build/images/home-classic/pr-31.jpg' }" class="topbar-product-card pb-3">
            <div class="position-relative overflow-hidden">
                <img :src="imageUrl" alt="" class="img-fluid">
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
                <h6 class="mb-1"><a href="#!" class="product-title">Cluse La Boheme Rose Gold</a></h6>
                <p class="mb-0 fs-14 text-muted">
                    <del>$60.00</del>
                    <span class="text-danger">$45.00</span>
                </p>
                <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/home-classic/pr-31.jpg'" x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-31.jpg'" class="d-inline-block bg_color_green rounded-circle"></a>
                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/home-classic/pr-33.jpg'" x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-33.jpg'" class="d-inline-block bg-black rounded-circle"></a>

                </div>
            </div>
        </div>
    </div>
    <!-- slide5 -->
    <div class="col-md-3 col-6 px-lg-12 px-2">
        <div x-data="{ imageUrl: '/build/images/home-classic/pr-19.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
            <div class="position-relative overflow-hidden">
                <span class="new-label bg-success text-white rounded-circle"> 40% </span>
                <span class="new-label bg-success text-white rounded-circle text-center"> New
                </span>
                <img :src="isHovered ? '/build/images/home-classic/pr-20.jpg' : imageUrl" alt="" class="img-fluid">
                <a href="#" class="d-lg-none position-absolute " style="z-index: 1; top:10px; left:10px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>
                <a href="#" class="wishlistadd d-none d-lg-flex position-absolute" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o text-white"></i></a>

                <div class="product-button d-flex flex-column gap-2">
                    <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick
                            View</span> <i class="iccl iccl-eye"></i></a>
                    <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal" data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                        <i class="iccl iccl-cart"></i></button>
                </div>
                <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
            </div>
            <a href="{{ url('product/product-detail-layout-01')}}" class="mt-3 d-block">
                <h6 class="mb-1">Cream women pants</h6>
                <p class="mb-0 fs-14 text-muted">
                    <span>$30.00</span>
                </p>
            </a>
        </div>
    </div>
    <div class="col-md-3 col-6 px-lg-12 px-2">
        <div x-data="{ imageUrl: '/build/images/products/pr-15.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
            <div class="position-relative overflow-hidden">
                <img :src="isHovered ? '/build/images/products/pr-14.jpg' : imageUrl" alt="" class="img-fluid">
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
    <div class="col-md-3 col-6 px-lg-12 px-2">
        <div x-data="{ imageUrl: '/build/images/products/pr-27.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
            <div class="position-relative overflow-hidden">
                <span class="new-label bg-danger text-white rounded-circle"> -34% </span>
                <img :src="isHovered ? '/build/images/products/pr-28.jpg' : imageUrl" alt="" class="img-fluid">
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
            </div>
        </div>
    </div>
    <div class="col-md-3 col-6 px-lg-12 px-2">
        <div x-data="{ imageUrl: '/build/images/products/pr-18.jpg', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
            <div class="position-relative overflow-hidden">
                <img :src="isHovered ? '/build/images/products/pr-17.jpg' : imageUrl" alt="" class="img-fluid">
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
                <h6 class="mb-1"> Cream Women Pants</h6>
                <p class="mb-0 fs-14 text-muted">
                    <span>$35.00</span>
                </p>
            </a>
        </div>
    </div>
    <div class="col-md-3 col-6 px-lg-12 px-2">
        <div x-data="{ imageUrl: '/build/images/products/pr-25.png', isHovered: false }" class="topbar-product-card pb-3" x-on:mouseenter="isHovered = true" x-on:mouseleave="isHovered = false">
            <div class="position-relative overflow-hidden">
                <img :src="isHovered ? '/build/images/products/pr-26.png' : imageUrl" alt="" class="img-fluid">
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
                <h6 class="mb-1"> Black Mountain Hat</h6>
                <p class="mb-0 fs-14 text-muted">
                    <span>$50.00</span>
                </p>
            </a>
        </div>
    </div>
</div>