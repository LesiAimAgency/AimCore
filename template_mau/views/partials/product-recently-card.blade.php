<div class="row my-4 py-2" data-flickity='{"imagesLoaded": 0,"adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": false,"percentPosition": 1,"pageDots": false, "autoPlay" : 0, "pauseAutoPlayOnHover" : true, "rightToLeft": false }'>
    <div class="col-md-4 col-lg-3 col-6 px-lg-12 px-2">
        <div x-data="{ imageUrl: '/build/images/products/pr-50.jpg' }" class="topbar-product-card pb-3">
            <div class="position-relative overflow-hidden">
                <span class="new-label bg-danger text-white rounded-circle"> -34% </span>
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
                <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
            </div>
            <div class="mt-3">
                <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Short Sleeved
                        Hoodie</a></h6>
                <p class="mb-0 fs-14 text-muted">
                    <del>$45.00</del>
                    <span class="text-danger">$30.00</span>
                </p>

                <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-33.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-33.jpg'" class="d-inline-block bg-pink2 bg-opacity-50 rounded-circle"></a>
                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-34.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-34.jpg'" class="d-inline-block bg-dark rounded-circle"></a>
                </div>
            </div>
        </div>
    </div><!--end col-->
    <div class="col-md-4 col-lg-3 col-6 px-lg-12 px-2">
        <div x-data="{ imageUrl: '/build/images/products/pr-s-37.png' }" class="topbar-product-card pb-3">
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
            </div>
            <div class="mt-3">
                <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Sweatshirt in
                        Geometric Print</a></h6>
                <p class="mb-0 fs-14 text-muted">
                    <span>$35.00</span>
                </p>
            </div>
        </div>
    </div><!--end col-->
    <div class="col-md-4 col-lg-3 col-6 px-lg-12 px-2">
        <div x-data="{ imageUrl: '/build/images/products/pr-01.jpg' }" class="topbar-product-card pb-3">
            <div class="position-relative overflow-hidden">
                <span class="new-label bg-success-light text-white rounded-circle"> New </span>
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
            </div>
            <div class="mt-3">
                <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Dusk Pom
                        Beanie</a></h6>
                <p class="mb-0 fs-14 text-muted">
                    <span>$25.00</span>
                </p>

            </div>
        </div>
    </div><!--end col-->
    <div class="col-md-4 col-lg-3 col-6 px-lg-12 px-2">
        <div x-data="{ imageUrl: '/build/images/products/pr-pin-51.jpg' }" class="topbar-product-card pb-3">
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
            </div>
            <div class="mt-3">
                <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Circle
                        Snapback Cap</a></h6>
                <p class="mb-0 fs-14 text-muted">
                    <span>$25.00</span>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-3 col-6 px-lg-12 px-2">
        <div x-data="{ imageUrl: '/build/images/products/pr-50.jpg' }" class="topbar-product-card pb-3">
            <div class="position-relative overflow-hidden">
                <span class="new-label bg-danger text-white rounded-circle"> -34% </span>
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
                <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
            </div>
            <div class="mt-3">
                <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Short Sleeved
                        Hoodie</a></h6>
                <p class="mb-0 fs-14 text-muted">
                    <del>$45.00</del>
                    <span class="text-danger">$30.00</span>
                </p>

                <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-33.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-33.jpg'" class="d-inline-block bg-pink2 bg-opacity-50 rounded-circle"></a>
                    <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-34.jpg'" x-on:click.prevent="imageUrl = '/build/images/products/pr-34.jpg'" class="d-inline-block bg-dark rounded-circle"></a>
                </div>
            </div>
        </div>
    </div><!--end col-->
    <div class="col-md-4 col-lg-3 col-6 px-lg-12 px-2">
        <div x-data="{ imageUrl: '/build/images/products/pr-s-37.png' }" class="topbar-product-card pb-3">
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
            </div>
            <div class="mt-3">
                <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Sweatshirt in
                        Geometric Print</a></h6>
                <p class="mb-0 fs-14 text-muted">
                    <span>$35.00</span>
                </p>
            </div>
        </div>
    </div><!--end col-->
    <div class="col-md-4 col-lg-3 col-6 px-lg-12 px-2">
        <div x-data="{ imageUrl: '/build/images/products/pr-01.jpg' }" class="topbar-product-card pb-3">
            <div class="position-relative overflow-hidden">
                <span class="new-label bg-success-light text-white rounded-circle"> New </span>
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
            </div>
            <div class="mt-3">
                <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Dusk Pom
                        Beanie</a></h6>
                <p class="mb-0 fs-14 text-muted">
                    <span>$25.00</span>
                </p>

            </div>
        </div>
    </div><!--end col-->
    <div class="col-md-4 col-lg-3 col-6 px-lg-12 px-2">
        <div x-data="{ imageUrl: '/build/images/products/pr-pin-51.jpg' }" class="topbar-product-card pb-3">
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
            </div>
            <div class="mt-3">
                <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01')}}" class="product-title">Circle
                        Snapback Cap</a></h6>
                <p class="mb-0 fs-14 text-muted">
                    <span>$25.00</span>
                </p>
            </div>
        </div>
    </div>
</div>