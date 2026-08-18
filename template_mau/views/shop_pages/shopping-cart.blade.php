@extends('layouts.master_shop')
@section('title', 'Home Default | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme ')
@section('content')
    <!-- main slide -->
    <div style="background-image: url('/build/images/shopping-cart/shopping-cart-head.jpg'); background-size: cover; background-position: center;"
        class="position-relative">
        <div class="position-absolute top-0 start-0 right-0 bottom-0 bg-dark w-100 opacity-50"></div>
        <div class=" container">
            <div class="text-white text-center py-5 position-relative">
                <h4 class="fs-20 fw-medium">
                    SHOPPING CART</h4>
            </div>
        </div>
    </div>
    <!-- product data -->
    <section>
        <div class="container">
            <div class="mt-md-5 pt-4">
                <div class="row d-none d-lg-flex  border-bottom">
                    <div class="col-6">
                        <h6>PRODUCT</h6>
                    </div>
                    <div class="col-2">
                        <h6>PRICE</h6>
                    </div>
                    <div class="col-2">
                        <h6 class="text-center">QUALITY</h6>
                    </div>
                    <div class="col-2">
                        <h6 class="text-end">TOTAL</h6>
                    </div>
                </div>
                <div class="row g-0 border-bottom align-items-center py-3 border-bottom">
                    <div class="col-md-6">
                        <div class="d-flex gap-3 align-items-start align-items-md-center">
                            <img src="{{ URL::asset('/build/images/shopping-cart/thumb-01.jpg') }}" alt="">
                            <div class="w-100">
                                <div class="px-2 pb-2">
                                    <h6 class="fs-16 ">Cream women pants</h6>
                                    <div class="mt-3">
                                        <svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>
                                    </div>
                                </div>
                                <div class="border-bottom border-top border-dotted p-2 d-md-none">
                                    <p class="text-muted m-0">$35.00</p>
                                </div>
                                <div class="input-step m-2 border border-dark rounded-pill d-md-none">
                                    <button type="button" class="minus material-shadow text-dark fw-bold">–</button>
                                    <input type="number" class="product-quantity fw-bold fs-6" value="1"
                                        min="0" max="100">
                                    <button type="button" class="plus material-shadow text-dark fw-bold">+</button>
                                </div>
                                <div class="border-top border-dotted p-2 d-md-none">
                                    <p class="m-0">$35.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  justify-content-between d-none d-md-flex align-items-center">
                        <p class="text-muted">$35.00</p>
                        <div class="input-step border border-dark rounded-pill">
                            <button type="button" class="minus material-shadow text-dark fw-bold">–</button>
                            <input type="number" class="product-quantity fw-bold fs-6" value="1" min="0"
                                max="100">
                            <button type="button" class="plus material-shadow text-dark fw-bold">+</button>
                        </div>
                        <p class="text-black text-end">$35.00</p>
                    </div>

                </div>
                <div class="row g-0 border-bottom align-items-center py-3 border-bottom">
                    <div class="col-md-6">
                        <div class="d-flex gap-3 align-items-start align-items-md-center">
                            <img src="{{ URL::asset('/build/images/shopping-cart/thumb-02.png') }}" alt="">
                            <div class="w-100">
                                <div class="px-2 pb-2">
                                    <h6 class="fs-16 ">Black mountain hat</h6>
                                    <div class="mt-3">
                                        <svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>
                                    </div>
                                </div>
                                <div class="border-bottom border-top p-2 d-md-none">
                                    <p class="text-muted m-0">$35.00</p>
                                </div>
                                <div class="input-step m-2 border border-dark rounded-pill d-md-none">
                                    <button type="button" class="minus material-shadow text-dark fw-bold">–</button>
                                    <input type="number" class="product-quantity fw-bold fs-6" value="1"
                                        min="0" max="100">
                                    <button type="button" class="plus material-shadow text-dark fw-bold">+</button>
                                </div>
                                <div class="border-top p-2 d-md-none">
                                    <p class="m-0">$35.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  justify-content-between d-none d-md-flex align-items-center">
                        <p class="text-muted">$50.00</p>
                        <div class="quantity pr mr__10 qty__true position-relative">
                            <div class="input-step border border-dark rounded-pill">
                                <button type="button" class="minus material-shadow text-dark fw-bold">–</button>
                                <input type="number" class="product-quantity fw-bold fs-6" value="1"
                                    min="0" max="100">
                                <button type="button" class="plus material-shadow text-dark fw-bold">+</button>
                            </div>
                        </div>
                        <p class="text-black text-end">$50.00</p>
                    </div>

                </div>
                <!-- subtotal -->
                <div class="row py-5 form-comman">
                    <div class="col-md-6">
                        <label class="fs-14 mb-2" for="order" role="button">Add Order Note</label>
                        <textarea class="form-control rounded-0" id="order" placeholder="How can we help you ?" rows="6"></textarea>
                        <div class="row">
                            <div class="col-12 col-md-7">
                                <label class="fs-14 mt-3 mb-2" for="coupon" role="button">Coupon:</label>
                                <p class="text-muted">Coupon code will work on checkout page</p>
                                <input class="form-control rounded-0" id="coupon" type="text"
                                    aria-label="default input example" placeholder="Coupon code">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-md-end mt-4 mt-md-0">
                        <h5>SUBTOTAL : $85.00</h5>
                        <p class="text-muted mb-2">Taxes, shipping and discounts codes calculated at checkout</p>
                        <div class="text-muted mb-3">
                            <input class="form-check-input rounded-0" type="checkbox" value=""
                                id="flexCheckChecked">
                            <label for="flexCheckChecked" role="button" class="ms-1">
                                I agree with the terms and conditions.
                            </label>
                        </div>
                        <button type="submit" class=" btn btn-teal px-5 py-2 rounded-pill mb-3">
                            CHECK OUT
                        </button>
                        <div>
                            <img src="{{ URL::asset('/build/images/shopping-cart/cart_image.png') }}"
                                style="width: 300px;" alt="">
                        </div>
                    </div>
                </div>
                <div class="form-comman center-text-frame">
                    <h3>Estimate Shipping</h3>
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <label class="text-muted mb-2">Country</label>
                            <select class="form-select rounded-pill mb-3" id="address_country_ship_2">
                                <option value="">---</option>
                                <option value="United States" selected="">United States</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="Italy">Italy</option>
                                <option value="Germany">Germany</option>
                                <option value="France">France</option>
                                <option value="Spain">Spain</option>
                                <option value="Australia">Australia</option>
                                <option value="Finland">Finland</option>
                                <option value="Austria">Austria</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Brazil">Brazil</option>
                                <option value="Canada">Canada</option>
                                <option value="Chile">Chile</option>
                                <option value="Cuba">Cuba</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Japan">Japan</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <label class="text-muted mb-2">Country</label>
                            <select class="form-select rounded-pill mb-3" id="address_province_ship">
                                <option value="Alabama">Alabama</option>
                                <option value="Alaska">Alaska</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Arizona">Arizona</option>
                                <option value="Arkansas">Arkansas</option>
                                <option value="Armed Forces Americas">Armed Forces Americas</option>
                                <option value="Armed Forces Europe">Armed Forces Europe</option>
                                <option value="Armed Forces Pacific">Armed Forces Pacific</option>
                                <option value="California">California</option>
                                <option value="Colorado">Colorado</option>
                                <option value="Connecticut">Connecticut</option>
                                <option value="Delaware">Delaware</option>
                                <option value="District of Columbia">Washington DC</option>
                                <option value="Federated States of Micronesia">Micronesia</option>
                                <option value="Florida">Florida</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Guam">Guam</option>
                                <option value="Hawaii">Hawaii</option>
                                <option value="Idaho">Idaho</option>
                                <option value="Illinois">Illinois</option>
                                <option value="Indiana">Indiana</option>
                                <option value="Iowa">Iowa</option>
                                <option value="Kansas">Kansas</option>
                                <option value="Kentucky">Kentucky</option>
                                <option value="Louisiana">Louisiana</option>
                                <option value="Maine">Maine</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Maryland">Maryland</option>
                                <option value="Massachusetts">Massachusetts</option>
                                <option value="Michigan">Michigan</option>
                                <option value="Minnesota">Minnesota</option>
                                <option value="Mississippi">Mississippi</option>
                                <option value="Missouri">Missouri</option>
                                <option value="Montana">Montana</option>
                                <option value="Nebraska">Nebraska</option>
                                <option value="Nevada">Nevada</option>
                                <option value="New Hampshire">New Hampshire</option>
                                <option value="New Jersey">New Jersey</option>
                                <option value="New Mexico">New Mexico</option>
                                <option value="New York">New York</option>
                                <option value="North Carolina">North Carolina</option>
                                <option value="North Dakota">North Dakota</option>
                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                <option value="Ohio">Ohio</option>
                                <option value="Oklahoma">Oklahoma</option>
                                <option value="Oregon">Oregon</option>
                                <option value="Palau">Palau</option>
                                <option value="Pennsylvania">Pennsylvania</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Rhode Island">Rhode Island</option>
                                <option value="South Carolina">South Carolina</option>
                                <option value="South Dakota">South Dakota</option>
                                <option value="Tennessee">Tennessee</option>
                                <option value="Texas" selected="">Texas</option>
                                <option value="Utah">Utah</option>
                                <option value="Vermont">Vermont</option>
                                <option value="Virgin Islands">U.S. Virgin Islands</option>
                                <option value="Virginia">Virginia</option>
                                <option value="Washington">Washington</option>
                                <option value="West Virginia">West Virginia</option>
                                <option value="Wisconsin">Wisconsin</option>
                                <option value="Wyoming">Wyoming</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <label class="text-muted mb-2" for="pincode">Postal/Zip Code</label>
                            <input class="form-control rounded-pill mb-3" id="pincode" type="text"
                                aria-label="default input example">
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex align-items-end">
                            <!-- <label class="text-muted mb-2"></label> -->
                            <button type="submit" class="w-100 btn btn-teal rounded-pill mb-3">
                                CHECK OUT
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- end main slide -->
    <div class="container mt-3 mt-lg-5">
        <h3 class="py-4 text-center">
            You may also like
        </h3>
        <div class="row my-4 py-2"
            data-flickity='{"imagesLoaded": 0,"adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": false,"percentPosition": 1,"pageDots": false, "autoPlay" : 0, "pauseAutoPlayOnHover" : true, "rightToLeft": false }'>
            <div class="col-md-3 col-6 px-lg-12 px-2">
                <div x-data="{ imageUrl: '/build/images/home-classic/pr-03.jpg' }" class="topbar-product-card pb-3">
                    <div class="position-relative overflow-hidden">
                        <img :src="imageUrl" alt="" class="img-fluid">
                        <a href="#" class="wishlistadd text-white position-absolute" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                        <div class="product-button d-flex flex-column gap-2">
                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick
                                    View</span> <i class="iccl iccl-eye"></i></a>
                            <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                <i class="iccl iccl-cart"></i></button>
                        </div>
                        <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                    </div>
                    <div class="mt-3">
                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}" class="product-title">
                                Ridley High Waist
                            </a></h6>
                        <p class="mb-0 fs-14 text-muted">
                            <span>$36.00</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 px-lg-12 px-2">
                <div x-data="{ imageUrl: '/build/images/home-fashion-9/pr-s-49.jpg' }" class="topbar-product-card pb-3">
                    <div class="position-relative overflow-hidden">
                        <span class="new-label bg-danger text-white rounded-circle"> New </span>
                        <img :src="imageUrl" alt="" class="img-fluid">
                        <a href="#" class="wishlistadd text-white position-absolute" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                        <div class="product-button d-flex flex-column gap-2">
                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick
                                    View</span> <i class="iccl iccl-eye"></i></a>
                            <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                <i class="iccl iccl-cart"></i></button>
                        </div>
                        <p class="product-size mb-0 text-center text-white fw-medium">S, M, L</p>
                    </div>
                    <div class="mt-3">
                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}" class="product-title">
                                Skin Sweatpans
                            </a></h6>
                        <p class="mb-0 fs-14 text-muted">
                            <del class="text-muted">$75.00</del>
                            <span class="text-danger">$36.00</span>
                        </p>
                        <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/home-fashion-9/pr-s-50.jpg'"
                                x-on:click.prevent="imageUrl = '/build/images/home-fashion-9/pr-s-50.jpg'"
                                class="d-inline-block bg_color_pink rounded-circle"></a>
                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/home-fashion-9/pr-s-51.jpg'"
                                x-on:click.prevent="imageUrl = '/build/images/home-fashion-9/pr-s-51.jpg'"
                                class="d-inline-block bg-success rounded-circle"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 px-lg-12 px-2">
                <div x-data="{ imageUrl: '/build/images/products/pr-04.jpg' }" class="topbar-product-card pb-3">
                    <div class="position-relative overflow-hidden">
                        <img :src="imageUrl" alt="" class="img-fluid">
                        <a href="#" class="wishlistadd text-white position-absolute" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                        <div class="product-button d-flex flex-column gap-2">
                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick
                                    View</span> <i class="iccl iccl-eye"></i></a>
                            <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                <i class="iccl iccl-cart"></i></button>
                        </div>
                        <p class="product-size mb-0 text-center text-white fw-medium">S, M, L</p>
                    </div>
                    <div class="mt-3">
                        <h6 class="mb-1"><a href="#!" class="product-title">Black mountain hat</a></h6>
                        <p class="mb-0 fs-14 text-muted">
                            <span>$50.00</span>
                        </p>

                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 px-lg-12 px-2">
                <div x-data="{ imageUrl: '/build/images/home-classic/pr-31.jpg' }" class="topbar-product-card pb-3">
                    <div class="position-relative overflow-hidden">
                        <img :src="imageUrl" alt="" class="img-fluid">
                        <a href="#" class="wishlistadd text-white position-absolute" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                        <div class="product-button d-flex flex-column gap-2">
                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick
                                    View</span> <i class="iccl iccl-eye"></i></a>
                            <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                <i class="iccl iccl-cart"></i></button>
                        </div>
                        <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M</p>
                    </div>
                    <div class="mt-3">
                        <h6 class="mb-1"><a href="#!" class="product-title">Men Pants</a></h6>
                        <p class="mb-0 fs-14 text-muted">
                            <span class="text-danger">$49.00 - $56.00</span>
                        </p>
                        <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/home-classic/pr-31.jpg'"
                                x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-31.jpg'"
                                class="d-inline-block bg-body-secondary rounded-circle"></a>
                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/home-classic/pr-33.jpg'"
                                x-on:click.prevent="imageUrl = '/build/images/home-classic/pr-33.jpg'"
                                class="d-inline-block bg-black rounded-circle"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 px-lg-12 px-2">
                <div x-data="{ imageUrl: '/build/images/products/pr-15.jpg' }" class="topbar-product-card pb-3">
                    <div class="position-relative overflow-hidden">
                        <img :src="imageUrl" alt="" class="img-fluid">
                        <a href="#" class="wishlistadd text-white position-absolute" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                        <div class="product-button d-flex flex-column gap-2">
                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick
                                    View</span> <i class="iccl iccl-eye"></i></a>
                            <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                <i class="iccl iccl-cart"></i></button>
                        </div>
                        <p class="product-size mb-0 text-center text-white fw-medium">S, M</p>
                    </div>
                    <div class="mt-3">
                        <h6 class="mb-1"><a href="#!" class="product-title">Mercury Tee</a></h6>
                        <p class="mb-0 fs-14 text-muted">
                            <span>$68.00</span>
                        </p>
                        <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-15.jpg'"
                                x-on:click.prevent="imageUrl = '/build/images/products/pr-15.jpg'"
                                class="d-inline-block rounded-circle"
                                style="background: url('/build/images/products/pr-15.jpg');background-size: cover;"></a>
                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-14.jpg'"
                                x-on:click.prevent="imageUrl = '/build/images/products/pr-14.jpg'"
                                class="d-inline-block rounded-circle"
                                style="background: url('/build/images/products/pr-14.jpg');background-size: cover;"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 px-lg-12 px-2">
                <div x-data="{ imageUrl: '/build/images/products/pr-27.jpg' }" class="topbar-product-card pb-3">
                    <div class="position-relative overflow-hidden">
                        <span class="new-label bg-danger text-white rounded-circle"> -34% </span>
                        <img :src="imageUrl" alt="" class="img-fluid">
                        <a href="#" class="wishlistadd text-white position-absolute" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                        <div class="product-button d-flex flex-column gap-2">
                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick
                                    View</span> <i class="iccl iccl-eye"></i></a>
                            <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                <i class="iccl iccl-cart"></i></button>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h6 class="mb-1"><a href="#!" class="product-title">La Bohème Rose Gold</a></h6>
                        <p class="mb-0 fs-14 text-muted">
                            <del>$60.00</del>
                            <span class="text-danger">$40.00</span>
                        </p>
                        <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-27.jpg'"
                                x-on:click.prevent="imageUrl = '/build/images/products/pr-27.jpg'"
                                class="d-inline-block bg_color_pink rounded-circle"></a>
                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-35.jpg'"
                                x-on:click.prevent="imageUrl = '/build/images/products/pr-35.jpg'"
                                class="d-inline-block bg-dark rounded-circle"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 px-lg-12 px-2">
                <div x-data="{ imageUrl: '/build/images/products/pr-18.jpg' }" class="topbar-product-card pb-3">
                    <div class="position-relative overflow-hidden">
                        <img :src="imageUrl" alt="" class="img-fluid">
                        <a href="#" class="wishlistadd text-white position-absolute" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                        <div class="product-button d-flex flex-column gap-2">
                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick
                                    View</span> <i class="iccl iccl-eye"></i></a>
                            <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                <i class="iccl iccl-cart"></i></button>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                class="product-title">Cream women
                                pants</a></h6>
                        <p class="mb-0 fs-14 text-muted">
                            <span>$35.00</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 px-lg-12 px-2">
                <div x-data="{ imageUrl: '/build/images/products/pr-25.png' }" class="topbar-product-card pb-3">
                    <div class="position-relative overflow-hidden">
                        <img :src="imageUrl" alt="" class="img-fluid">
                        <a href="#" class="wishlistadd text-white position-absolute" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                        <div class="product-button d-flex flex-column gap-2">
                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick
                                    View</span> <i class="iccl iccl-eye"></i></a>
                            <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                <i class="iccl iccl-cart"></i></button>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                class="product-title">Black
                                mountain hat</a></h6>
                        <p class="mb-0 fs-14 text-muted">
                            <span>$50.00</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- viewed products -->
    <div class="container">
        <h3 class="py-4 text-center">
            Recently viewed products
        </h3>
        <div class="row my-4 py-2"
            data-flickity='{"imagesLoaded": 0,"adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": false,"percentPosition": 1,"pageDots": false, "autoPlay" : 0, "pauseAutoPlayOnHover" : true, "rightToLeft": false }'>
            <div class="col-md-3 col-6 px-lg-12 px-2">
                <div x-data="{ imageUrl: '/build/images/single-product/pr-viewed-01.jpg' }" class="topbar-product-card pb-3">
                    <div class="position-relative overflow-hidden">
                        <img :src="imageUrl" alt="" class="img-fluid">
                        <a href="#" class="wishlistadd text-white position-absolute" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                        <div class="product-button d-flex flex-column gap-2">
                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick
                                    View</span> <i class="iccl iccl-eye"></i></a>
                            <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                <i class="iccl iccl-cart"></i></button>
                        </div>
                        <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M, L, XL</p>
                    </div>
                    <div class="mt-3">
                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}" class="product-title">
                                Felt Cowboy Hat
                            </a></h6>
                        <p class="mb-0 fs-14 text-muted">
                            <span>$22.00</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 px-lg-12 px-2">
                <div x-data="{ imageUrl: '/build/images/single-product/pr-viewed-03.jpg' }" class="topbar-product-card pb-3">
                    <div class="position-relative overflow-hidden">
                        <img :src="imageUrl" alt="" class="img-fluid">
                        <a href="#" class="wishlistadd text-white position-absolute" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                        <div class="product-button d-flex flex-column gap-2">
                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick
                                    View</span> <i class="iccl iccl-eye"></i></a>
                            <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                <i class="iccl iccl-cart"></i></button>
                        </div>
                        <p class="product-size mb-0 text-center text-white fw-medium">S, M, L</p>
                    </div>
                    <div class="mt-3">
                        <h6 class="mb-1"><a href="#!" class="product-title">Blue Jean</a></h6>
                        <p class="mb-0 fs-14 text-muted">
                            <span>$25.00</span>
                        </p>

                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 px-lg-12 px-2">
                <div x-data="{ imageUrl: '/build/images/megamenu/pr-11.jpg' }" class="topbar-product-card pb-3">
                    <div class="position-relative overflow-hidden">
                        <span class="new-label bg-danger text-white rounded-circle"> -34 </span>
                        <img :src="imageUrl" alt="" class="img-fluid">
                        <a href="#" class="wishlistadd text-white position-absolute" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                        <div class="product-button d-flex flex-column gap-2">
                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick
                                    View</span> <i class="iccl iccl-eye"></i></a>
                            <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                <i class="iccl iccl-cart"></i></button>
                        </div>
                        <p class="product-size mb-0 text-center text-white fw-medium">S, M, L</p>
                    </div>
                    <div class="mt-3">
                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}" class="product-title">
                                La Bohème Rose Gold
                            </a></h6>
                        <p class="mb-0 fs-14 text-muted">
                            <del class="text-muted">$60.00</del>
                            <span class="text-danger">$40.00</span>
                        </p>
                        <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/megamenu/pr-11.jpg'"
                                x-on:click.prevent="imageUrl = '/build/images/megamenu/pr-11.jpg'"
                                class="d-inline-block bg_color_pink rounded-circle"></a>
                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-35.jpg'"
                                x-on:click.prevent="imageUrl = '/build/images/products/pr-35.jpg'"
                                class="d-inline-block bg-black rounded-circle"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-6 px-lg-12 px-2">
                <div x-data="{
                    imageUrl: '/build/images/home-fashion-9/pr-s-37.png',
                    hoverScale: 1.5
                }" class="topbar-product-card pb-3">
                    <div class="position-relative overflow-hidden">
                        <img :src="imageUrl" alt="" class="img-fluid">
                        <a href="#" class="wishlistadd text-white position-absolute" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                        <div class="product-button d-flex flex-column gap-2">
                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick
                                    View</span> <i class="iccl iccl-eye"></i></a>
                            <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                <i class="iccl iccl-cart"></i></button>
                        </div>
                        <p class="product-size mb-0 text-center text-white fw-medium">XS, S, M</p>
                    </div>
                    <div class="mt-3">
                        <h6 class="mb-1"><a href="#!" class="product-title">Simple Skin T-shirt</a></h6>
                        <p class="mb-0 fs-14 text-muted">
                            <span class="text-danger">$56.00</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 px-lg-12 px-2">
                <div x-data="{ imageUrl: '/build/images/products/pr-15.jpg' }" class="topbar-product-card pb-3">
                    <div class="position-relative overflow-hidden">
                        <img :src="imageUrl" alt="" class="img-fluid">
                        <a href="#" class="wishlistadd text-white position-absolute" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                        <div class="product-button d-flex flex-column gap-2">
                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick
                                    View</span> <i class="iccl iccl-eye"></i></a>
                            <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                <i class="iccl iccl-cart"></i></button>
                        </div>
                        <p class="product-size mb-0 text-center text-white fw-medium">S, M</p>
                    </div>
                    <div class="mt-3">
                        <h6 class="mb-1"><a href="#!" class="product-title">Mercury Tee</a></h6>
                        <p class="mb-0 fs-14 text-muted">
                            <span>$68.00</span>
                        </p>
                        <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-15.jpg'"
                                x-on:click.prevent="imageUrl = '/build/images/products/pr-15.jpg'"
                                class="d-inline-block rounded-circle"
                                style="background: url('/build/images/products/pr-15.jpg');background-size: cover;"></a>
                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-14.jpg'"
                                x-on:click.prevent="imageUrl = '/build/images/products/pr-14.jpg'"
                                class="d-inline-block rounded-circle"
                                style="background: url('/build/images/products/pr-14.jpg');background-size: cover;"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 px-lg-12 px-2">
                <div x-data="{ imageUrl: '/build/images/products/pr-27.jpg' }" class="topbar-product-card pb-3">
                    <div class="position-relative overflow-hidden">
                        <span class="new-label bg-danger text-white rounded-circle"> -34% </span>
                        <img :src="imageUrl" alt="" class="img-fluid">
                        <a href="#" class="wishlistadd text-white position-absolute" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                        <div class="product-button d-flex flex-column gap-2">
                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick
                                    View</span> <i class="iccl iccl-eye"></i></a>
                            <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                <i class="iccl iccl-cart"></i></button>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h6 class="mb-1"><a href="#!" class="product-title">La Bohème Rose Gold</a></h6>
                        <p class="mb-0 fs-14 text-muted">
                            <del>$60.00</del>
                            <span class="text-danger">$40.00</span>
                        </p>
                        <div class="product-color-list mt-2 gap-2 d-flex align-items-center">
                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-27.jpg'"
                                x-on:click.prevent="imageUrl = '/build/images/products/pr-27.jpg'"
                                class="d-inline-block bg_color_pink rounded-circle"></a>
                            <a href="#!" x-on:mouseover="imageUrl = '/build/images/products/pr-35.jpg'"
                                x-on:click.prevent="imageUrl = '/build/images/products/pr-35.jpg'"
                                class="d-inline-block bg-dark rounded-circle"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 px-lg-12 px-2">
                <div x-data="{ imageUrl: '/build/images/products/pr-18.jpg' }" class="topbar-product-card pb-3">
                    <div class="position-relative overflow-hidden">
                        <img :src="imageUrl" alt="" class="img-fluid">
                        <a href="#" class="wishlistadd text-white position-absolute" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                        <div class="product-button d-flex flex-column gap-2">
                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick
                                    View</span> <i class="iccl iccl-eye"></i></a>
                            <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                <i class="iccl iccl-cart"></i></button>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                class="product-title">Cream women
                                pants</a></h6>
                        <p class="mb-0 fs-14 text-muted">
                            <span>$35.00</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 px-lg-12 px-2">
                <div x-data="{ imageUrl: '/build/images/products/pr-25.png' }" class="topbar-product-card pb-3">
                    <div class="position-relative overflow-hidden">
                        <img :src="imageUrl" alt="" class="img-fluid">
                        <a href="#" class="wishlistadd text-white position-absolute" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="facl facl-heart-o"></i></a>

                        <div class="product-button d-flex flex-column gap-2">
                            <a href="#exampleModal" data-bs-toggle="modal" class="btn rounded-pill fs-14"><span>Quick
                                    View</span> <i class="iccl iccl-eye"></i></a>
                            <button type="button" class="btn rounded-pill fs-14" data-bs-toggle="modal"
                                data-bs-target="#cardModal" class="btn rounded-pill fs-14"><span>Quick Shop</span>
                                <i class="iccl iccl-cart"></i></button>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h6 class="mb-1"><a href="{{ url('product/product-detail-layout-01') }}"
                                class="product-title">Black
                                mountain hat</a></h6>
                        <p class="mb-0 fs-14 text-muted">
                            <span>$50.00</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
