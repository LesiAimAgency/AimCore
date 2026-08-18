@extends('layouts.master_shop')
@section('title', 'Home Default | Kalles - Clean, Versatile, Responsive Bootstrap 5 Theme ')
@section('content')
<div style="background-image: url('/build/images/shopping-cart/shopping-cart-head.jpg'); background-position: center; background-size: cover;" class="position-relative">
    <div class="position-absolute top-0 start-0 right-0 bottom-0 bg-dark w-100 opacity-50"></div>
    <div class=" container">
        <div class="text-white text-center py-5 position-relative">
            <h4 class="fs-20 fw-medium">
                CHECKOUT</h4>
        </div>
    </div>
</div>
<section>
    <div class="container">
        <div class="row my-5">
            <div class="col-md-6 col-lg-7">
                <h3 class="border-bottom pb-3 mb-0">Billing details</h3>
                <div class="filter-title mb-4 bg-teal" style="width: 134px;"></div>
                <form action="" class="form-comman">
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <label class="fw-medium mb-2" for="fname">First name</label>
                            <input class="form-control rounded-pill" id="fname" type="text" aria-label="default input example">
                        </div>
                        <div class="col-lg-6">
                            <label class="fw-medium mb-2" for="lname">Last name</label>
                            <input class="form-control rounded-pill" id="lname" type="text" aria-label="default input example">
                        </div>
                        <div class="col-12 mt-4">
                            <label class="fw-medium mb-2" for="company">Company name (optional)</label>
                            <input class="form-control rounded-pill" id="company" type="text" aria-label="default input example">
                        </div>
                        <div class="col-12 mt-4">
                            <label class="fw-medium mb-2">Country / Region *</label>
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
                        <div class="col-12 mt-4">
                            <label class="fw-medium mb-2" for="address">Street address *</label>
                            <input class="form-control rounded-pill" id="address" placeholder="House number and street name" type="text" aria-label="default input example">
                            <input class="form-control rounded-pill  mt-3" placeholder="Apartment, suites, unit, etc.(optional)" type="text" aria-label="default input example">
                        </div>
                        <div class="col-12 mt-4">
                            <label class="fw-medium mb-2" for="city">Town / City</label>
                            <input class="form-control rounded-pill" id="city" type="text" aria-label="default input example">
                        </div>
                        <div class="col-12 mt-4">
                            <label class="fw-medium mb-2">State *</label>
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
                        <div class="col-12 mt-4">
                            <label class="fw-medium mb-2" for="zipcode">Postal/Zip Code</label>
                            <input class="form-control rounded-pill" id="zipcode" type="text" aria-label="default input example">
                        </div>
                        <div class="col-12 mt-4">
                            <label class="fw-medium mb-2" for="phone">Phone</label>
                            <input class="form-control rounded-pill" id="phone" type="text" aria-label="default input example">
                        </div>
                        <div class="col-12 mt-4">
                            <label class="fw-medium mb-2" for="email">Email</label>
                            <input class="form-control rounded-pill" id="email" type="text" aria-label="default input example">
                        </div>
                    </div>
                </form>
                <div class="mt-5 pt-md-3">
                    <h3 class="border-bottom pb-3 mb-0">Shipping Details</h3>
                    <div class="filter-title mb-4 bg-teal" style="width: 134px;"></div>
                    <div class="col-12">
                        <label class="fw-medium mb-2" for="order">Order notes (optional)</label>
                        <textarea class="form-control border-radious-none" style="border-radius: 20px;" id="order" placeholder="Notes about your order e.g. special notes for delivery." rows="8"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-5 mt-5 mt-md-0">
                <div class="checkout-order">
                    <h3 class="border-bottom pb-3 mb-0 fs-22">Your order</h3>
                    <div class="filter-title mb-4 bg-teal" style="width: 134px;"></div>
                    <div class="d-flex justify-content-between fw-medium border-bottom mb-0 p-2">
                        <h6 class="mb-0 lh-lg">Product</h6>
                        <h6 class="mb-0 lh-lg">Subtotal</h6>
                    </div>
                    <div class="d-flex justify-content-between fw-medium border-bottom mb-0 p-2">
                        <h6 class="mb-0 lh-lg"><span class="fw-normal">Black mountain hat</span> x 1</h6>
                        <p class="mb-0 lh-lg">$50.00</p>
                    </div>
                    <div class="d-flex justify-content-between fw-medium border-bottom mb-0 p-2">
                        <h6 class="mb-0 lh-lg"><span class="fw-normal">Cream women pants</span> x 1</h6>
                        <p class="mb-0 lh-lg">$35.00</p>
                    </div>
                    <div class="d-flex justify-content-between fw-medium border-bottom mb-0 p-2">
                        <h6 class="mb-0 lh-lg">Subtotal</h6>
                        <p class="mb-0 lh-lg">$85.00</p>
                    </div>
                    <div class="d-flex justify-content-between fw-medium border-bottom mb-0 p-2">
                        <h6 class="mb-0 lh-lg">Shipping</h6>
                        <p class="mb-0 lh-lg">$50.00</p>
                    </div>
                    <div class="d-flex justify-content-between fw-medium border-bottom mb-0 p-2">
                        <h6 class="mb-0 lh-lg">Total</h6>
                        <p class="mb-0 lh-lg">$145.00</p>
                    </div>
                    <div>
                        <div class="form-check py-3 mb-0 border-bottom">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="directBankTransfer" checked>
                            <label class="form-check-label fw-medium fs-13" for="directBankTransfer">
                                Direct bank transfer
                            </label>
                        </div>
                        <p id="direct-bank-info" class="p-3 fs-13 checkout-bg mb-0">Make your payment directly into our bank
                            account. Please use your
                            Order ID as the
                            payment
                            reference. Your order will not be shipped until the funds have cleared in our account.
                        </p>
                        
                        <div class="form-check py-3 mb-0 border-bottom">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard">
                            <label class="form-check-label fw-medium fs-13 d-block" for="creditCard">
                                Credit Card (Stripe) 
                                <img src="{{ URL::asset('/build/images/shopping-cart/visa.svg')}}" class="stripe-visa-icon stripe-icon" alt="Visa">
                                <img src="{{ URL::asset('/build/images/shopping-cart/mastercard.svg')}}" class="stripe-mastercard-icon stripe-icon" alt="Mastercard">
                                <img src="{{ URL::asset('/build/images/shopping-cart/amex.svg')}}" class="stripe-amex-icon stripe-icon" alt="American Express">
                                <img src="{{ URL::asset('/build/images/shopping-cart/discover.svg')}}" class="stripe-discover-icon stripe-icon" alt="Discover">
                                <img src="{{ URL::asset('/build/images/shopping-cart/diners.svg')}}" class="stripe-diners-icon stripe-icon" alt="Diners">
                                <img src="{{ URL::asset('/build/images/shopping-cart/jcb.svg')}}" class="stripe-jcb-icon stripe-icon" alt="JCB">
                            </label>
                        </div>
                        <div id="credit-card-info" class="p-3 checkout-bg">
                            <p class="fs-13">
                                Pay with your credit card via Stripe. TEST MODE ENABLED. In test mode, you can use the card number 4242424242424242 with any CVC and a valid expiration date or check the Testing Stripe documentation for more card numbers.
                            </p>
                            <label for="number" class="mb-1 fs-12 fw-semibold">Card Number*</label>
                            <input type="text" placeholder="1234 1234 1234 1234" id="number" class="form-control form-control-sm rounded-0 lh-lg">
                            <div class="row mt-3 g-4">
                                <div class="col-md-6 mt-0">
                                    <label for="Expiry" class="mb-1 fs-12 fw-semibold">Expiry Date *</label>
                                    <input type="text" placeholder="MM/YY" id="Expiry" class="form-control form-control-sm rounded-0 lh-lg">
                                </div>
                                <div class="col-md-6 mt-0">
                                    <label for="CVC" class="mb-1 fs-12 fw-semibold">Card Code (CVC) *</label>
                                    <input type="text" placeholder="CVC" id="CVC" class="form-control form-control-sm rounded-0 lh-lg">
                                </div>
                            </div>
                        </div>
                        
                        <p class="py-2">Your personal data will be used to process your order, support your
                            experience
                            throughout this website, and for other purposes described in ourprivacy policy.</p>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                I have read and agree to the website terms and conditions *
                            </label>
                        </div>
                        <button type="submit" class=" btn btn-teal my-3 px-5 py-3 fw-bold w-100 rounded-pill mb-3">
                            PLACE ORDER
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    const directBankRadio = document.getElementById("directBankTransfer");
    const creditCardRadio = document.getElementById("creditCard");
    const directBankInfo = document.getElementById("direct-bank-info");
    const creditCardInfo = document.getElementById("credit-card-info");

    function togglePaymentInfo() {
        if (directBankRadio.checked) {
            directBankInfo.style.display = "block";
            creditCardInfo.style.display = "none";
        } else if (creditCardRadio.checked) {
            directBankInfo.style.display = "none";
            creditCardInfo.style.display = "block";
        }
    }

    togglePaymentInfo();

    directBankRadio.addEventListener("change", togglePaymentInfo);
    creditCardRadio.addEventListener("change", togglePaymentInfo);
</script>
@endsection
