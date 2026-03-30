
<?php include 'header.php'; ?>


    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section">
        <div class="custom-container">
            <div class="breadcrumb-contain">
                <h2>Checkout</h2>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <i class="ri-home-3-fill"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Return login section start -->
    <section class="return-login-section section-t-space">
        <div class="custom-container">
            <div class="return-box">
                <h3>Returning customer?</h3>
                <button class="btn" data-bs-toggle="modal" data-bs-target="#authenticationModal">Click here to
                    Login</button>
            </div>
        </div>
    </section>
    <!-- Return login section end -->

    <!-- Checkout Section Start -->
    <section class="checkout-section-new section-t-space">
        <div class="custom-container">
            <div class="row g-sm-4 g-3">
                <div class="col-xl-7 col-lg-6">
                    <div class="checkout-left-box">
                        <div class="billing-box checkbox-bg-color">
                            <div class="checkout-title">
                                <h4>Billing details</h4>
                            </div>

                            <form class="row g-sm-4 g-3 needs-validation theme-form" novalidate>
                                <div class="col-xl-6 col-lg-12 col-sm-6">
                                    <label for="details1" class="form-label">First name <span>*</span></label>
                                    <input type="text" placeholder="Enter your first name" class="form-control"
                                        id="details1">
                                </div>
                                <div class="col-xl-6 col-lg-12 col-sm-6">
                                    <label for="details2" class="form-label">Last name <span>*</span></label>
                                    <input type="text" class="form-control" id="details2"
                                        placeholder="Enter your first name">
                                </div>
                                <div class="col-xl-6 col-lg-12 col-sm-6">
                                    <label for="details4" class="form-label">Email Address <span>*</span></label>
                                    <input type="email" class="form-control" id="details4"
                                        placeholder="Enter your Email address">
                                </div>
                                <div class="col-xl-6 col-lg-12 col-sm-6">
                                    <label for="details5" class="form-label">Phone Number <span>*</span></label>
                                    <input type="number" class="form-control" id="details5"
                                        placeholder="Enter your number" oninput="limitLength(this)" required>
                                </div>
                                <div class="col-xl-6 col-lg-12 col-sm-6">
                                    <label for="details6" class="form-label">Street Address <span>*</span></label>
                                    <input type="text" class="form-control" id="details6"
                                        placeholder="Enter your street address">
                                </div>
                                <div class="col-xl-6 col-lg-12 col-sm-6">
                                    <label for="details7" class="form-label">Apartment/Suite (Optional)
                                        <span>*</span></label>
                                    <input type="text" class="form-control" id="details7"
                                        placeholder="Enter your apartment/suite (optional)">
                                </div>
                                <div class="col-xl-6 col-lg-12 col-sm-6">
                                    <label for="details8" class="form-label">City <span>*</span></label>
                                    <input type="text" class="form-control" id="details8" placeholder="Enter your city">
                                </div>
                                <div class="col-xl-6 col-lg-12 col-sm-6">
                                    <label for="details9" class="form-label">State/Province/Region
                                        <span>*</span></label>
                                    <input type="text" class="form-control" id="details9"
                                        placeholder="Enter your state/province/region">
                                </div>
                                <div class="col-xl-6 col-lg-12 col-sm-6">
                                    <label for="details10" class="form-label">ZIP/Postal Code <span>*</span></label>
                                    <input type="text" class="form-control" id="details10"
                                        placeholder="Enter your ZIP/postal code">
                                </div>
                                <div class="col-xl-6 col-lg-12 col-sm-6">
                                    <label for="details11" class="form-label">Country <span>*</span></label>
                                    <input type="text" class="form-control" id="details11"
                                        placeholder="Enter your country">
                                </div>
                                <div class="col-12">
                                    <label for="details12" class="form-label">Payment Method <span>*</span></label>
                                    <select class="form-select" id="details12">
                                        <option selected disabled>Choose payment method</option>
                                        <option value="1">Credit/Debit Card</option>
                                        <option value="2">PayPal / Digital Wallet Options</option>
                                        <option value="3">Bank Transfer</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <ul class="checkout-list">
                                        <li class="form-check theme-checkbox">
                                            <input class="form-check-input" type="checkbox" id="list">
                                            <label class="form-check-label" for="list">Create an account?</label>
                                        </li>
                                        <li class="form-check theme-checkbox">
                                            <input class="form-check-input" type="checkbox" id="list1">
                                            <label class="form-check-label" for="list1">Ship to a different
                                                address?</label>
                                        </li>
                                        <li class="form-check theme-checkbox">
                                            <input class="form-check-input" type="checkbox" id="list2">
                                            <label class="form-check-label" for="list2">Sign me up to receive email
                                                updates and news (optional)</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12">
                                    <label for="details14" class="form-label">Order Notes (Optional)
                                        <span>*</span></label>
                                    <textarea class="form-control" id="details14" rows="4"
                                        placeholder="Any special instructions for the order"></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="checkout-right-box checkbox-bg-color">
                        <div class="checkout-title">
                            <h4>Your order</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table order-table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="checkout-product-box">
                                                <a href="product-circle.html" class="product-image">
                                                    <img src="../assets/images/product/30.png" class="img-fluid" alt="">
                                                </a>
                                                <div class="product-contain">
                                                    <a href="product-color.html">
                                                        <h5>Canon EOS 1500D DSLR Camera Body + 18-55 mm <span>x2</span>
                                                        </h5>
                                                    </a>
                                                    <ul class="product-category-list">
                                                        <li>Brand: <span>Canon</span></li>
                                                        <li>Color: <span>Starlight</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$152.36</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="checkout-product-box">
                                                <a href="product-circle.html" class="product-image">
                                                    <img src="../assets/images/product/24.png" class="img-fluid" alt="">
                                                </a>
                                                <div class="product-contain">
                                                    <a href="product-color.html">
                                                        <h5>Refurb macbook air space gray m1 202009 <span>x1</span></h5>
                                                    </a>
                                                    <ul class="product-category-list">
                                                        <li>Brand: <span>Apple</span></li>
                                                        <li>Storage: <span>1TB</span></li>
                                                        <li>Color: <span>Dark Gray</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$32.45</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="checkout-product-box">
                                                <a href="product-circle.html" class="product-image">
                                                    <img src="../assets/images/product/26.png" class="img-fluid" alt="">
                                                </a>
                                                <div class="product-contain">
                                                    <a href="product-color.html">
                                                        <h5>EvoFox Game Box 32 GB with Asphalt 8 <span>x4</span></h5>
                                                    </a>
                                                    <ul class="product-category-list">
                                                        <li>Brand: <span>EvoFox</span></li>
                                                        <li>Color: <span>Light Gray</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$1025.35</td>
                                    </tr>
                                    <tr class="price-tb">
                                        <td>Subtotal</td>
                                        <td>$1210.16</td>
                                    </tr>
                                    <tr class="price-tb">
                                        <td>Tax</td>
                                        <td>$0.00</td>
                                    </tr>
                                    <tr class="price-tb">
                                        <td>Total</td>
                                        <td>$1210.16</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="accordion checkout-payment-accordion section-t-space-2" id="accordionExample">
                            <div class="accordion-item">
                                <div class="accordion-header" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    <div class="form-check">
                                        <input class="form-check-input" name="flexRadioDefault" type="radio" id="pay"
                                            checked>
                                        <label class="form-check-label" for="pay"><span class="circle"></span>
                                            <span>Buy Now, Pay Later <a href="#!">What is Klarna?</a></span>
                                        </label>
                                    </div>
                                </div>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p><i class="ri-check-line"></i> Enjoy <span>Buyer production</span> with
                                            Klarna. See <span>Payment options</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                    <div class="form-check">
                                        <input class="form-check-input" name="flexRadioDefault" type="radio" id="pay1">
                                        <label class="form-check-label" for="pay1"><span class="circle"></span> Paypal
                                            Express Checkout</label>
                                    </div>
                                </div>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p><i class="ri-check-line"></i> Enjoy <span>Buyer production</span> with
                                            Klarna. See <span>Payment options</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                    <div class="form-check">
                                        <input class="form-check-input" name="flexRadioDefault" type="radio" id="pay2">
                                        <label class="form-check-label" for="pay2"><span class="circle"></span> Amazon
                                            Pay</label>
                                    </div>
                                </div>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p><i class="ri-check-line"></i> Enjoy <span>Buyer production</span> with
                                            Klarna. See <span>Payment options</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="section-t-space-2">
                            <div class="checkout-information">
                                <p>Your personal data will be used to process your order, support your experience
                                    throughout this website, and for other purposes described in our <a
                                        href="#!">privacy policy</a>.</p>
                                <div class="form-check theme-checkbox">
                                    <input class="form-check-input checkbox_animated" type="checkbox" name="information"
                                        id="details">
                                    <label class="form-check-label" for="details">I Have Read And Agree To The Website
                                        Terms And Conditions <span>*</span></label>
                                </div>
                            </div>
                        </div>

                        <div class="section-t-space-2">
                            <button onclick="location.href = 'order-success.html';"
                                class="btn theme-bg-color text-white rounded-pill w-100">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->



    <!-- News-letter Section Start -->
    <section class="section-block-space newsletter-section">
        <div class="custom-container">
            <div class="newsletter-box">
                <img src="https://themes.pixelstrap.net/kartify/assets/images/newsletter/1.svg" class="newsletter-1" alt="">
                <img src="https://themes.pixelstrap.net/kartify/assets/images/newsletter/2.svg" class="newsletter-2" alt="">
                <img src="https://themes.pixelstrap.net/kartify/assets/images/newsletter/3.svg" class="newsletter-3" alt="">
                <div class="row g-3">
                    <div class="col-xl-6">
                        <div class="newsletter-content">
                            <svg>
                                <use xlink:href="https://themes.pixelstrap.net/kartify/assets/images/newsletter/newsletter-icon.svg#newsletter"></use>
                            </svg>
                            <div>
                                <h3>Subscribe to our newsletter</h3>
                                <h4>Get all the latest information on Events, sales and Offers</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <form class="newsletter-form">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter Your E-mail Address">
                                <button class="input-group-text btn newsletter-form-button">Subscribe Now!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- News-letter Section End -->

   
    <?php include 'footer.php'; ?>
