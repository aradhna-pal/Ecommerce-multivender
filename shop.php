<?php include 'header.php'; ?>


    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section">
        <div class="custom-container">
            <div class="breadcrumb-contain">
                <h2>Shop collection grid 5</h2>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <i class="ri-home-3-fill"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Shop collection grid</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Start -->
    <section class="section-t-space shop-section">
        <div class="custom-container">
            <div class="offcanvas-button">
                <button class="btn" data-bs-toggle="offcanvas" data-bs-target="#filterOffcanvas">
                    <i class="ri-equalizer-line"></i>
                    <span>Filter</span>
                </button>
            </div>
            <div class="show-button show-button-2">
                <div class="top-filter-menu">
                    <div class="category-dropdown dropdown-box">
                        <h3 class="text-content h5">Sort By :</h3>
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown">
                                <span>Most Popular</span>
                                <i class="ri-arrow-down-s-line"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" id="pop" href="#!">Popularity</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" id="low" href="#!">Low - High
                                        Price</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" id="high" href="#!">High - Low
                                        Price</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" id="rating" href="#!">Average
                                        Rating</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" id="aToz" href="#!">A - Z Order</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" id="zToa" href="#!">Z - A Order</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" id="off" href="#!">% Off - Hight To
                                        Low</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="grid-option d-none d-md-block">
                        <ul>
                            <li class="two-grid">
                                <button class="btn">
                                    <svg>
                                        <use xlink:href="https://themes.pixelstrap.net/kartify/assets/svg/grid-option.svg#gridTwo"></use>
                                    </svg>
                                </button>
                            </li>
                            <li class="three-grid">
                                <button class="btn">
                                    <svg>
                                        <use xlink:href="https://themes.pixelstrap.net/kartify/assets/svg/grid-option.svg#gridThree"></use>
                                    </svg>
                                </button>
                            </li>
                            <li class="grid-btn">
                                <button class="btn">
                                    <svg>
                                        <use xlink:href="https://themes.pixelstrap.net/kartify/assets/svg/grid-option.svg#gridFour"></use>
                                    </svg>
                                </button>
                            </li>
                            <li class="five-grid d-xxl-inline-block d-none active">
                                <button class="btn">
                                    <svg>
                                        <use xlink:href="https://themes.pixelstrap.net/kartify/assets/svg/grid-option.svg#gridFive"></use>
                                    </svg>
                                </button>
                            </li>
                            <li class="list-btn">
                                <button class="btn">
                                    <svg>
                                        <use xlink:href="https://themes.pixelstrap.net/kartify/assets/svg/grid-option.svg#list"></use>
                                    </svg>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row g-sm-4 g-3 product-list-section row-cols-xxl-5 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2" id="productContainer">
            

                    <div class="col">
                        <div class="product-box-4-main">
                            <div class="select-option-box">
                                <div class="select-box">
                                    <div>
                                        <div class="color-box">
                                            <h4 class="h5">Colors</h4>
                                            <ul class="color-list">
                                                <li>
                                                    <a href="#!" style="background-color: #0038A8;"></a>
                                                </li>
                                                <li>
                                                    <a href="#!" style="background-color: #728C69;"></a>
                                                </li>
                                                <li>
                                                    <a href="#!" style="background-color: #FFF4DF;"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        
                                        <div class="size-box">
                                            <h4 class="h5">Sizes</h4>
                                            <ul class="size-list">
                                                <li>
                                                    <a href="#!">xs</a>
                                                </li>
                                                <li>
                                                    <a href="#!">s</a>
                                                </li>
                                                <li>
                                                    <a href="#!">m</a>
                                                </li>
                                                <li>
                                                    <a href="#!">l</a>
                                                </li>
                                                <li>
                                                    <a href="#!">xl</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <button class="btn add-cart-btn">add to cart</button>
                                        <button class="close-btn btn" onclick="closeSidebar()">
                                            <i class="ri-close-line"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="productMain product-box-4 pro-bg-white">
                                <div class="product-image">
                                    <a href="product-color.html">
                                        <img src="./assets/images/product/105.png" class="img-fluid productImage" alt="">
                                    </a>
                                    <div class="quick-view-button-box">
                                        <button class="btn view-btn" data-bs-target="#quickViewModal"
                                            data-bs-toggle="modal">Quick View</button>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h5 class="sub-name productName">Home Furniture</h5>
                                    <a href="product-color.html" class="name">
                                        <h5>Handmade Table</h5>
                                    </a>
                                    <ul class="rating">
                                        <li>
                                            <i class="ri-star-fill fill"></i>
                                        </li>
                                        <li>
                                            <i class="ri-star-fill fill"></i>
                                        </li>
                                        <li>
                                            <i class="ri-star-fill fill"></i>
                                        </li>
                                        <li>
                                            <i class="ri-star-fill fill"></i>
                                        </li>
                                        <li>
                                            <i class="ri-star-fill fill"></i>
                                        </li>
                                    </ul>
                                    <p class="product-details">This beautifully crafted handmade table adds a rustic charm
                                        to
                                        any room. Built from high-quality solid wood with a smooth finish, it features
                                        sturdy legs and a spacious top for functionality. Perfect as a coffee table or a
                                        decorative centerpiece for your living space.</p>
                                    <h5 class="price">$1010.00 <del>$1200.00</del></h5>
                                    <div class="option-box">
                                        <button class="btn select-btn">Select Options</button>
                                        <ul class="option-list">
                                            <li>
                                                <a href="#!" class="wishlistProduct">
                                                    <i class="ri-heart-3-line"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!">
                                                    <i class="ri-repeat-2-line"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>


            <nav class="custom-pagination">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#!">
                            <i class="ri-arrow-left-s-line"></i>
                        </a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#!">
                            <span>1</span>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#!">
                            <span>2</span>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#!">
                            <span>3</span>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#!">
                            <i class="ri-arrow-right-s-line"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <!-- Shop Section End -->

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

 

  


 

    <!-- Recent Product View Box Start -->
    <div class="recently-product-box">
        <button class="btn recent-close">
            <i class="iconsax" data-icon-name="add"></i>
        </button>
        <a href="product-color.html">
            <img src="./assets/images/product/1.png" class="img-fluid" alt="Product Image">
        </a>
        <div class="recent-content">
            <a href="product-color.html">Smart Watch Series X3</a>
            <h3 class="price h5">$239.00 <del>$250.00</del></h3>
            <h4 class="timer h6">1 minutes ago</h4>
        </div>
    </div>
    <!-- Recent Product View Box End -->
    
    <!-- Quick View Modal Start -->
    <div class="modal fade quick-view-modal theme-modal" id="quickViewModal">
        <div class="modal-dialog modal-custom-size modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="ri-close-line"></i>
                    </button>
                    <div class="row g-sm-4 g-3">
                        <div class="col-md-6">
                            <div class="left-box-contain">
                                <div class="swiper quick-main-slider quick-slider-product-box">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="view-image">
                                                <img src="./assets/images/product/15.png" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="view-image">
                                                <img src="./assets/images/product/22.png" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="view-image">
                                                <img src="./assets/images/product/25.png" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="view-image">
                                                <img src="./assets/images/product/28.png" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="view-image">
                                                <img src="./assets/images/product/98.png" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-button-next">
                                        <i class="ri-arrow-right-s-line"></i>
                                    </div>
                                    <div class="swiper-button-prev">
                                        <i class="ri-arrow-left-s-line"></i>
                                    </div>
                                </div>
    
                                <div class="swiper quick-thumbnail-product-box quick-thumbnail-slider">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="image-box">
                                                <img src="./assets/images/product/15.png" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="image-box">
                                                <img src="./assets/images/product/22.png" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="image-box">
                                                <img src="./assets/images/product/25.png" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="image-box">
                                                <img src="./assets/images/product/28.png" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="image-box">
                                                <img src="./assets/images/product/98.png" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="product-right-box">
                                <div class="right-box-contain">
                                    <a href="seller-details-2.html" class="offer-top">Visit SmartBuy Store</a>
                                    <h2 class="name">Next-level performance with stunning design & cutting-edge features
                                    </h2>
                                    <div class="price-rating">
                                        <ul class="rating-review-sold-box">
                                            <li>
                                                <h3><i class="ri-star-fill"></i> 4.8 Ratings</h3>
                                            </li>
                                            <li></li>
                                            <li>
                                                <h3>4.5M+ Reviews</h3>
                                            </li>
                                            <li></li>
                                            <li>
                                                <h3>3.5M+ Sold</h3>
                                            </li>
                                        </ul>
                                    </div>
    
                                    <div class="product-contain">
                                        <p>Experience brilliance with the iPhone 14 Pro Max, designed with a sleek
                                            finish and a stunning Super Retina XDR display. Powered by the A16 Bionic
                                            chip, it delivers lightning-fast performance and efficiency. The advanced
                                            triple-camera system captures professional-quality photos and videos in all
                                            lighting conditions.</p>
                                    </div>
    
                                    <div class="product-package product-spacing">
                                        <div class="product-title">
                                            <h4>Choose Color :</h4>
                                        </div>
                                        <form class="select-package color-product">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="6"
                                                    checked style="background-color: #d5dde0;">
                                                <label class="form-check-label bg-transparent" for="6"></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="7"
                                                    style="background-color: #edd4d7;">
                                                <label class="form-check-label bg-transparent" for="7"></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="8"
                                                    style="background-color: #ece7c9;">
                                                <label class="form-check-label bg-transparent" for="8"></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="9"
                                                    style="background-color: #d4ddce;">
                                                <label class="form-check-label bg-transparent" for="9"></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="10"
                                                    style="background-color: #4d5154;">
                                                <label class="form-check-label bg-transparent" for="10"></label>
                                            </div>
                                        </form>
                                    </div>
    
                                    <div class="hurry-up-box">
                                        <h5>There are just <span class="theme-color">5</span> left in stock, so please
                                            act immediately.</h5>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                style="width: 50%"></div>
                                        </div>
                                    </div>
    
                                    <div class="about-item-box product-spacing border-top-space">
                                        <div class="product-title">
                                            <h4>About Item :</h4>
                                        </div>
    
                                        <ul class="about-item-list">
                                            <li>Brand : <span>Apple</span></li>
                                            <li>Category : <span>Smartphone</span></li>
                                            <li>Condition : <span>Brand New</span></li>
                                            <li>Color : <span>Deep Purple</span></li>
                                            <li>Pattern : <span>Glossy finish</span></li>
                                            <li>Style : <span>Premium</span></li>
                                        </ul>
                                    </div>
    
                                    <div class="qty-stock-box">
                                        <div class="qty-box h-100 qty-container quantity-box-2">
                                            <button class="btn qty-btn qty-btn-minus">
                                                <i class="ri-subtract-line"></i>
                                            </button>
                                            <input type="number" readonly="" name="qty" value="0"
                                                class="qty-input form-control input-qty">
                                            <button class="btn qty-btn qty-btn-plus">
                                                <i class="ri-add-line"></i>
                                            </button>
                                        </div>
    
                                        <button onclick="location.href = 'cart.html';"
                                            class="btn buy-btn theme-border fw-500">
                                            <i class="ri-shopping-bag-line"></i> Add to bag</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick View Modal End -->

    <!-- Alert Box Start -->
    <div id="alertBox" class="alert-box">
        <div class="alert-message" id="alertMessage"></div>
        <div class="alert-progressbar" id="progressBar"></div>
        <div class="button-group">
            <button class="remove-wishlist btn">remove wishlist</button>
            <button class="add-cart-btn btn" data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas">Add to
                cart</button>
        </div>
    </div>
    <!-- Alert Box End -->

    <!-- Bg Overlay Start -->
    <div id="overlay" class="bg-overlay"></div>
    <!-- Bg Overlay End -->

    <!-- Newsletter Modal Start -->
    <div class="modal fade theme-modal newsletter-modal" id="newsletterModal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="ri-close-line"></i>
                    </button>
                    <div class="newsletter-box">
                        <img src="./assets/images/newsletter.jpg" alt="" class="img-fluid newsletter-image">

                        <div class="newsletter-content">
                            <h3>Your Direct Line to Offers</h3>
                            <p>Subscribe now and enjoy insider tips, special rewards, and early access to our latest
                                products.</p>
                            <div class="newsletter-form-box">
                                <input type="email" class="form-control" placeholder="Your Email">
                                <button class="newsletter-button btn">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter Modal End -->

    <!-- Cookie Box Start -->
    <div class="cookie-bar-section cookie">
        <div class="cookie-bar-box">
            <svg>
                <use xlink:href="https://themes.pixelstrap.net/kartify/assets/images/cookie/1.svg#one"></use>
            </svg>
            <p>We use cookies to ensure that we give you the best experience on our website. <a href="#!">Read cookies
                    policies.</a></p>
            <div class="cookie-buttons">
                <button class="btn decline-btn">Decline</button>
                <button class="btn allow-btn">Allow</button>
            </div>
        </div>
    </div>
    <!-- Cookie Box End -->

    <!-- Exit Modal Start -->
    <div class="modal fade exit-modal theme-modal" id="exitModal">
        <div class="modal-dialog modal-custom-size modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="exit-box">
                        <div class="row g-0">
                            <div class="col-sm-6 order-sm-1 order-2">
                                <div class="exit-left-box">
                                    <h3>HEY YOU</h3>
                                    <h4>Don't leave now!</h4>
                                    <h5>OFFER68</h5>
                                    <h6>Use this coupon code to get 68% off</h6>
                                    <ul class="clock-list">
                                        <li>
                                            <div class="digits minutes" id="minutes"></div>
                                        </li>
                                        <li class="dots">:</li>
                                        <li>
                                            <div class="digits seconds" id="seconds"></div>
                                        </li>
                                    </ul>
                                    <h6>This coupon code expires in</h6>
                                </div>
                            </div>
                            <div class="col-sm-6 order-sm-2 order-1">
                                <div class="exit-right-box">
                                    <img src="./assets/images/exit-modal/1.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Exit Modal End -->


<?php include 'footer.php'; ?>