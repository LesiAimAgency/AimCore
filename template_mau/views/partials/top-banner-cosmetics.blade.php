<!--head banner-->
<div x-data="{ isOpen: true }" class="topbar-cosmetics">
        <div class="t_header fs-13 d-flex align-items-center" x-bind:class="{ 'd-none': !isOpen }">
                <div class="container">
                        <div class="row">
                                <div class="col text-white text-center text-lg-start">
                                        Start earning Octopus Rewards points when you shop! <a href="#!" class="main_link_white_lima text-white fw-medium">JOIN NOW</a>
                                </div>
                                <div class="col-auto d-none d-lg-block">
                                        <div class="dropdown text-end position-relative">
                                                <a href="#!" class="fs-12 text-white currency-button" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <img src="{{ URL::asset('/build/images/svg/usd.svg')}}" alt="" height="12" class="me-1"> USD <i class="facl facl-angle-down ms-1"></i>
                                                </a>
                                                <ul class="dropdown-menu p-3 dropdown-currency">
                                                        <li><a href="#!"><img src="{{ URL::asset('/build/images/svg/aud.svg')}}" alt="" height="12" class="me-1">
                                                                        AUD</a></li>
                                                        <li><a href="#!"><img src="{{ URL::asset('/build/images/svg/cad.svg')}}" alt="" height="12" class="me-1">
                                                                        CAD</a></li>
                                                        <li><a href="#!"><img src="{{ URL::asset('/build/images/svg/dkk.svg')}}" alt="" height="12" class="me-1">
                                                                        DKK</a></li>
                                                        <li><a href="#!"><img src="{{ URL::asset('/build/images/svg/eur.svg')}}" alt="" height="12" class="me-1">
                                                                        EUR</a></li>
                                                        <li><a href="#!"><img src="{{ URL::asset('/build/images/svg/gbp.svg')}}" alt="" height="12" class="me-1">
                                                                        GBP</a></li>
                                                        <li><a href="#!"><img src="{{ URL::asset('/build/images/svg/hkd.svg')}}" alt="" height="12" class="me-1">
                                                                        HKD</a></li>
                                                        <li><a href="#!"><img src="{{ URL::asset('/build/images/svg/jpy.svg')}}" alt="" height="12" class="me-1">
                                                                        JPY</a></li>
                                                        <li><a href="#!"><img src="{{ URL::asset('/build/images/svg/nzd.svg')}}" alt="" height="12" class="me-1">
                                                                        NZD</a></li>
                                                        <li><a href="#!"><img src="{{ URL::asset('/build/images/svg/sgd.svg')}}" alt="" height="12" class="me-1">
                                                                        SGD</a></li>
                                                        <li><a href="#!"><img src="{{ URL::asset('/build/images/svg/usd.svg')}}" alt="" height="12" class="me-1">
                                                                        USD</a></li>
                                                </ul>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>

<!--end head banner-->