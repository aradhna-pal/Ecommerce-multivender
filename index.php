<?php include 'header.php'; ?>

<!-- Home Section Start -->
<section class="home-section">
    <div class="custom-container">
        <div class="row g-0 custom-home-row">
            <div class="custom-xxl-3">
                <div class="category-full-box offcanvas" id="categoryCanvas">
                    <div class="category-header">
                        <h5>Category</h5>
                        <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas">
                            <i class="ri-close-fill"></i>
                        </button>
                    </div>
                    <div class="category-menu-list" id="categoryMenu">


                        <ul class="sub-menu-list" id="categoryList">
                        </ul>
                    </div>
                </div>
            </div>


            <style>
                .category-menu-list {
                    position: relative;
                    /* width: 250px; */
                    border: 1px solid #ddd;
                    background: #fff;
                }

                /* Menu items */
                .sub-menu-list {
                    list-style: none;
                    margin: 0;
                    padding: 0;
                    position: relative;
                }

                .sub-menu-list li {
                    position: relative;
                    position: static;
                }

                .sub-menu-list li a {
                    display: flex;
                    align-items: center;
                    padding: 10px;
                    /* background: #fff; */
                    border-bottom: 1px solid #ddd;
                    text-decoration: none;
                    color: #333;
                    white-space: nowrap;
                }

                .sub-menu-list li a:hover {
                    background: #f0f0f0;
                }

                .sub-menu-list li a h5 {
                    margin-left: 8px;
                }

                /* Badge */
                .success-bg-color {
                    background: #28a745;
                    color: #fff;
                    padding: 2px 5px;
                    font-size: 10px;
                    margin-left: 5px;
                    border-radius: 3px;
                }

                /* Submenus hidden by default */
                .sub-menu-list li ul {
                    display: none;
                    position: absolute;
                    top: 0;
                    left: 100%;
                    width: 100%;
                    min-height: 100%;
                    /* flyout to right */
                    min-width: 200px;
                    background: #fff;
                    border: 1px solid #ddd;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    z-index: 999;
                }

                /* Show submenu on hover */
                .sub-menu-list li:hover>ul {
                    display: block;
                }
            </style>
            <div class="custom-xxl-9">
                <div class="row g-0">
                    <div class="col-xl-8 col-12">
                        <a href="shop.php" class="banner-box b-left">
                            <img src="assets/images/banner/1.jpg" class="img-fluid ratio-8x5" alt="">
                        </a>
                    </div>
                    <div class="col-4 d-xl-block d-none">
                        <div class="row m-0 h-100">
                            <div class="col-12 p-0">
                                <a href="shop.php" class="banner-box">
                                    <img src="assets/images/banner/2.jpg" class="img-fluid ratio-8x5" alt="">
                                </a>
                            </div>
                            <div class="col-12 p-0">
                                <a href="shop.php" class="banner-box">
                                    <img src="assets/images/banner/3.jpg" class="img-fluid ratio-8x5" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-0 ratio_82">
                    <div class="col-lg-3 col-sm-6 h-100">
                        <a href="shop.php" class="banner-box">
                            <img src="assets/images/banner/4.jpg" alt="" class="bg-img">
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 h-100">
                        <a href="shop.php" class="banner-box">
                            <img src="assets/images/banner/5.jpg" alt="" class="bg-img">
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 h-100">
                        <a href="shop.php" class="banner-box">
                            <img src="assets/images/banner/6.jpg" alt="" class="bg-img">
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 h-100">
                        <a href="shop.php" class="banner-box">
                            <img src="assets/images/banner/7.jpg" alt="" class="bg-img">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Home Section End -->

<!-- Flash Sale Section Start -->
<section class="mt-20">
    <div class="custom-container">
        <div class="flash-sale-section light-bg-color">
            <div class="title title-timer justify-content-between">
                <div class="title-flex">
                    <h3><i class="ri-flashlight-line"></i> Flash Sale</h3>
                    <div class="title-timer clockdiv">
                        <span class="timer">Ending in :</span>
                        <div class="counter">
                            <span class="hours"></span>
                        </div>
                        <div class="counter">
                            <span class="minutes"></span>
                        </div>
                        <div class="counter">
                            <span class="seconds"></span>
                        </div>
                    </div>
                    <p>Hot items, Affordable price, Daily updates.</p>
                </div>
                <a href="shop.php">See all deals <i class="ri-arrow-right-s-line"></i></a>
            </div>

            <div class="swiper product-slider-7 product-box-slider">
                <div class="swiper-wrapper" id="flashSaleContainer"></div>
            </div>
        </div>
    </div>
</section>
<!-- Flash Sale Section End -->

<!-- Latest & Upcoming product Start -->
<section class="mt-20">
    <div class="custom-container">
        <div class="row g-sm-4 g-3">
            <div class="col-xl-4 col-md-6">
                <div class="light-bg-color">
                    <div class="title d-block">
                        <h3>Top Kitchen items</h3>
                    </div>

                    <div class="row g-3">
                        <div class="col-xxl-4 col-lg-6 col-sm-4 col-6">
                            <div class="latest-product-box">
                                <a href="product-color.php">
                                    <img src="assets/images/product/8.png" class="img-fluid" alt="">
                                </a>
                                <h4>kitchen utensils</h4>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-lg-6 col-sm-4 col-6">
                            <div class="latest-product-box">
                                <a href="product-color.php">
                                    <img src="assets/images/product/9.png" class="img-fluid" alt="">
                                </a>
                                <h4>Vacuum Coffee Mug</h4>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-lg-6 col-sm-4 col-6">
                            <div class="latest-product-box">
                                <a href="product-color.php">
                                    <img src="assets/images/product/10.png" class="img-fluid" alt="">
                                </a>
                                <h4>6 Pcs Set Stainless</h4>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="latest-product-box">
                                <a href="product-color.php">
                                    <img src="assets/images/product/11.png" class="img-fluid" alt="">
                                </a>
                                <h4>stainless dishware</h4>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                            <div class="latest-product-box">
                                <a href="product-color.php">
                                    <img src="assets/images/product/12.png" class="img-fluid" alt="">
                                </a>
                                <h4>Wholesale Cheap Square Des..</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="light-bg-color">
                    <div class="title d-block">
                        <h3>Top Tech items</h3>
                    </div>

                    <div class="row g-3">
                        <div class="col-xxl-4 col-lg-6 col-sm-4 col-6">
                            <div class="latest-product-box">
                                <a href="product-color.php">
                                    <img src="assets/images/product/13.png" class="img-fluid" alt="">
                                </a>
                                <h4>One plus Nord CE</h4>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-lg-6 col-sm-4 col-6">
                            <div class="latest-product-box">
                                <a href="product-color.php">
                                    <img src="assets/images/product/14.png" class="img-fluid" alt="">
                                </a>
                                <h4>Samsung Galaxy M14</h4>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-lg-6 col-sm-4 col-6">
                            <div class="latest-product-box">
                                <a href="product-color.php">
                                    <img src="assets/images/product/15.png" class="img-fluid" alt="">
                                </a>
                                <h4>iPhone 14 Pro</h4>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="latest-product-box">
                                <a href="product-color.php">
                                    <img src="assets/images/product/16.png" class="img-fluid" alt="">
                                </a>
                                <h4>Realme 10 PRO</h4>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                            <div class="latest-product-box">
                                <a href="product-color.php">
                                    <img src="assets/images/product/17.png" class="img-fluid" alt="">
                                </a>
                                <h4>MacBook Pro 14-inch and 16-inch</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="light-bg-color">
                    <div class="title d-block">
                        <h3>Top Kitchen Appliances</h3>
                    </div>

                    <div class="row g-3">
                        <div class="col-xxl-4 col-lg-6 col-sm-4 col-6">
                            <div class="latest-product-box">
                                <a href="product-color.php">
                                    <img src="assets/images/product/18.png" class="img-fluid" alt="">
                                </a>
                                <h4>Stainless Steel Over</h4>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-lg-6 col-sm-4 col-6">
                            <div class="latest-product-box">
                                <a href="product-color.php">
                                    <img src="assets/images/product/21.png" class="img-fluid" alt="">
                                </a>
                                <h4>FridgeFrost Innovations</h4>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-lg-6 col-sm-4 col-6">
                            <div class="latest-product-box">
                                <a href="product-color.php">
                                    <img src="assets/images/product/20.png" class="img-fluid" alt="">
                                </a>
                                <h4>BakeMaster Professional Ovens</h4>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="latest-product-box">
                                <a href="product-color.php">
                                    <img src="assets/images/product/19.png" class="img-fluid" alt="">
                                </a>
                                <h4>BrewMaster Coffee Systems</h4>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                            <div class="latest-product-box">
                                <a href="product-color.php">
                                    <img src="assets/images/product/18.png" class="img-fluid" alt="">
                                </a>
                                <h4>RoastRite Culinary Ovens</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest & Upcoming product End -->

<!-- Banner Section Start -->
<section class="mt-20">
    <div class="custom-container">
        <div class="row g-sm-4 g-3">
            <div class="col-xl-8">
                <a href="shop.php" class="banner-box">
                    <img src="assets/images/banner/8.jpg" class="img-fluid" alt="">
                </a>
            </div>
            <div class="col-xl-4">
                <a href="shop.php" class="banner-box h-100">
                    <img src="assets/images/banner/9.jpg" class="img-fluid" alt="">
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Category Section Start -->
<section class="mt-20">
    <div class="custom-container">
        <div class="light-bg-color overflow-hidden">
            <div class="title title-timer justify-content-between">
                <h3>Category</h3>
                <a href="shop.php">See all deals <i class="ri-arrow-right-s-line"></i></a>
            </div>

            <div class="swiper category-box-slide">
                <div class="swiper-wrapper" id="categoryWrapper">
                    <div class="swiper-slide">
                        <a href="shop.php" class="category-box">
                            <img src="assets/images/category/1.png" class="img-fluid" alt="">
                            <h4>Electronic</h4>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="shop.php" class="category-box">
                            <img src="assets/images/category/2.png" class="img-fluid" alt="">
                            <h4>Home</h4>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="shop.php" class="category-box">
                            <img src="assets/images/category/3.png" class="img-fluid" alt="">
                            <h4>Sport & Outdoor</h4>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="shop.php" class="category-box">
                            <img src="assets/images/category/4.png" class="img-fluid" alt="">
                            <h4>Toys</h4>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="shop.php" class="category-box">
                            <img src="assets/images/category/5.png" class="img-fluid" alt="">
                            <h4>Grocery</h4>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="shop.php" class="category-box">
                            <img src="assets/images/category/6.png" class="img-fluid" alt="">
                            <h4>Man's Fashion</h4>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="shop.php" class="category-box">
                            <img src="assets/images/category/7.png" class="img-fluid" alt="">
                            <h4>Woman's Fashion</h4>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="shop.php" class="category-box">
                            <img src="assets/images/category/8.png" class="img-fluid" alt="">
                            <h4>Baby</h4>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="shop.php" class="category-box">
                            <img src="assets/images/category/9.png" class="img-fluid" alt="">
                            <h4>Health & Wellness</h4>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="shop.php" class="category-box">
                            <img src="assets/images/category/10.png" class="img-fluid" alt="">
                            <h4>Auto & Tires</h4>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="shop.php" class="category-box">
                            <img src="assets/images/category/11.png" class="img-fluid" alt="">
                            <h4>Household Essentials</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Category Section End -->

<!-- Recommendations Product & Banner Section Start -->
<section class="mt-20">
    <div class="custom-container">
        <div class="row g-4">
            <div class="col-xxl-3-1 col-xl-4 d-xl-block d-none">
                <a href="shop.php" class="banner-box b-left h-100">
                    <img src="assets/images/banner/10.jpg" class="img-fluid" alt="">
                </a>
            </div>

            <div class="col-xxl-8-1 col-xl-8">
                <div class="light-bg-color">
                    <div class="title justify-content-between d-sm-flex d-block">
                        <h3>Recommendations</h3>
                        <ul class="nav nav-pills title-nav-pills mt-sm-0 mt-3" id="pills-tab">
                            <li class="nav-item">
                                <button class="nav-link active" id="pills-top-tabe" data-bs-toggle="pill"
                                    data-bs-target="#pills-top" type="button">Top 20</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="pills-rate-tabe" data-bs-toggle="pill"
                                    data-bs-target="#pills-rate" type="button">Best Rated</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="pills-choice-tabe" data-bs-toggle="pill"
                                    data-bs-target="#pills-choice" type="button">Editor's
                                    Choices</button>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-top">
                            <div class="swiper recommendations-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <ul class="recommendations-product-list">
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/22.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h4 class="name title-color">Apple iPhone 14 (128 GB) -
                                                                Purple</h4>
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
                                                        <h5 class="price">$1209.00 <del>$1220.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/23.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h4 class="name title-color">BlackBerry Keyone BBB100-7
                                                                64gb unlocked gSM</h4>
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
                                                        <h5 class="price">$1920.00 <del>$2000.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/24.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h4 class="name title-color">refurb macbook air space
                                                                gray m1 202009
                                                            </h4>
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
                                                        <h5 class="price">$1309.00 <del>$3000.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="swiper-slide">
                                        <ul class="recommendations-product-list">
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/25.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h4 class="name title-color">Apple iPhone 14 - 128 GB
                                                                Silver Model
                                                            </h4>
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
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1099.00 <del>$1236.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/26.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h4 class="name title-color">EvoFox Game Box 32 GB with
                                                                Asphalt 8
                                                            </h4>
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
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$130.00 <del>$153.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/27.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h4 class="name title-color">Motorola Moto X4 32GB
                                                                Unlocked
                                                                Smartphone</h4>
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
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1220.00 <del>$1269.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="swiper-slide">
                                        <ul class="recommendations-product-list">
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/28.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h4 class="name title-color">Apple iPhone 13 Mini
                                                                (512GB) -
                                                                Starlight</h4>
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
                                                        <h5 class="price">$120.00 <del>$365.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/29.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h4 class="name title-color">Fujifilm Instax Mini 9
                                                                Instant Camera
                                                            </h4>
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
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1690.00 <del>$2000.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/30.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h4 class="name title-color">Canon EOS 1500D DSLR Camera
                                                                Body+ 18-55
                                                                mm</h4>
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
                                                        <h5 class="price">$199.00 <del>$252.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-rate">
                            <div class="swiper recommendations-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <ul class="recommendations-product-list">
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/22.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h5 class="name title-color">Apple iPhone 14 (128 GB) -
                                                                Purple</h5>
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
                                                        <h5 class="price">$1209.00 <del>$1220.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/23.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h5 class="name title-color">BlackBerry Keyone BBB100-7
                                                                64gb unlocked gSM</h5>
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
                                                        <h5 class="price">$1920.00 <del>$2000.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/24.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h5 class="name title-color">refurb macbook air space
                                                                gray m1 202009
                                                            </h5>
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
                                                        <h5 class="price">$1309.00 <del>$3000.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="swiper-slide">
                                        <ul class="recommendations-product-list">
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/25.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h5 class="name title-color">Apple iPhone 14 - 128 GB
                                                                Silver Model
                                                            </h5>
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
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1099.00 <del>$1236.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/26.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h5 class="name title-color">EvoFox Game Box 32 GB with
                                                                Asphalt 8
                                                            </h5>
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
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$130.00 <del>$153.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/27.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h5 class="name title-color">Motorola Moto X4 32GB
                                                                Unlocked
                                                                Smartphone</h5>
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
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1220.00 <del>$1269.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="swiper-slide">
                                        <ul class="recommendations-product-list">
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/28.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h5 class="name title-color">Apple iPhone 13 Mini
                                                                (512GB) -
                                                                Starlight</h5>
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
                                                        <h5 class="price">$120.00 <del>$365.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/29.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h5 class="name title-color">Fujifilm Instax Mini 9
                                                                Instant Camera
                                                            </h5>
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
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1690.00 <del>$2000.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/30.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h5 class="name title-color">Canon EOS 1500D DSLR Camera
                                                                Body+ 18-55
                                                                mm</h5>
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
                                                        <h5 class="price">$199.00 <del>$252.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-choice">
                            <div class="swiper recommendations-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <ul class="recommendations-product-list">
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/22.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h5 class="name title-color">Apple iPhone 14 (128 GB) -
                                                                Purple</h5>
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
                                                        <h5 class="price">$1209.00 <del>$1220.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/23.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h5 class="name title-color">BlackBerry Keyone BBB100-7
                                                                64gb unlocked gSM</h5>
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
                                                        <h5 class="price">$1920.00 <del>$2000.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/24.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h5 class="name title-color">refurb macbook air space
                                                                gray m1 202009
                                                            </h5>
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
                                                        <h5 class="price">$1309.00 <del>$3000.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="swiper-slide">
                                        <ul class="recommendations-product-list">
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/25.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h5 class="name title-color">Apple iPhone 14 - 128 GB
                                                                Silver Model
                                                            </h5>
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
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1099.00 <del>$1236.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/26.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h5 class="name title-color">EvoFox Game Box 32 GB with
                                                                Asphalt 8
                                                            </h5>
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
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$130.00 <del>$153.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/27.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h5 class="name title-color">Motorola Moto X4 32GB
                                                                Unlocked
                                                                Smartphone</h5>
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
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1220.00 <del>$1269.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="swiper-slide">
                                        <ul class="recommendations-product-list">
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/28.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h5 class="name title-color">Apple iPhone 13 Mini
                                                                (512GB) -
                                                                Starlight</h5>
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
                                                        <h5 class="price">$120.00 <del>$365.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/29.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h5 class="name title-color">Fujifilm Instax Mini 9
                                                                Instant Camera
                                                            </h5>
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
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1690.00 <del>$2000.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/30.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h5 class="name title-color">Canon EOS 1500D DSLR Camera
                                                                Body+ 18-55
                                                                mm</h5>
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
                                                        <h5 class="price">$199.00 <del>$252.00</del></h5>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
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
<!-- Recommendations Product & Banner Section End -->

<!-- Top Trending & Hot Deal Product Section Start -->
<section class="mt-20">
    <div class="custom-container">
        <div class="row g-3">
            <div class="col-xxl-3-1 col-xl-3 d-xl-block d-none">
                <div class="bg-white h-100 ratio_50">
                    <a href="shop.php" class="banner-box b-left">
                        <img src="assets/images/banner/11.jpg" class="bg-img" alt="">
                    </a>
                    <div class="left-banner-content">
                        <div class="accessories-computer-box">
                            <h4 class="deal-title">Accessories</h4>
                            <ul class="deal-list">
                                <li>
                                    <a href="shop.php">Pendrives</a>
                                </li>
                                <li>
                                    <a href="shop.php">External Hard Disks</a>
                                </li>
                                <li>
                                    <a href="shop.php">Laptop Bags</a>
                                </li>
                                <li>
                                    <a href="shop.php">Mouse</a>
                                </li>
                                <li>
                                    <a href="shop.php">Computer Table</a>
                                </li>
                                <li>
                                    <a href="shop.php">read more</a>
                                </li>
                            </ul>
                        </div>

                        <div class="accessories-computer-box">
                            <h4 class="deal-title">Computers & Laptops</h4>
                            <ul class="deal-list">
                                <li>
                                    <a href="shop.php">Laptops</a>
                                </li>
                                <li>
                                    <a href="shop.php">Desktops</a>
                                </li>
                                <li>
                                    <a href="shop.php">PC Gaming</a>
                                </li>
                                <li>
                                    <a href="shop.php">Components</a>
                                </li>
                                <li>
                                    <a href="shop.php">Mobile</a>
                                </li>
                                <li>
                                    <a href="shop.php">read more</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-8-1 col-xl-8">
                <div class="row g-3">
                    <div class="col-xxl-7 col-xl-6">
                        <div class="light-bg-color">
                            <div class="title title-timer justify-content-between">
                                <h3>Top Trending</h3>
                                <a href="shop.php">See all<i class="ri-arrow-right-s-line"></i></a>
                            </div>

                            <div class="swiper slider-2 slider-pagination">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <ul class="top-trending-product-list">
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/31.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h4 class="name title-color">Pro Healthy Lifestyle
                                                                Edible Oil 5
                                                                litre Jar | Saffola Gold Refined Oil</h4>
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
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1309.00 <del>$1525.00</del></h5>
                                                        <a class="btn btn-sm mt-sn-3 mt-2 btn-bg-theme"
                                                            href="product-color.php">Shop Now</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mt-md-5 mt-sm-4 mt-3">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/32.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h4 class="name title-color">Cabin Luggage Polycarbonate
                                                                8 Wheel
                                                                Trolly Luggage</h4>
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
                                                        <h5 class="price">$1308.00 <del>$1425.00</del></h5>
                                                        <a class="btn btn-sm mt-sn-3 mt-2 btn-bg-theme"
                                                            href="product-color.php">Shop Now</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="swiper-slide">
                                        <ul class="top-trending-product-list">
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/33.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h4 class="name title-color">Stainless Steel Premium
                                                                Vegetable &
                                                                Onion Chopper</h4>
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
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1209.00 <del>$1220.00</del></h5>
                                                        <a class="btn btn-sm mt-sn-3 mt-2 btn-bg-theme"
                                                            href="product-color.php">Shop Now</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mt-md-5 mt-sm-4 mt-3">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/34.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h4 class="name title-color">Shears Kitchen Spoone
                                                                6 Piece Set with Wooden Block</h4>
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
                                                        <h5 class="price">$1209.00 <del>$1220.00</del></h5>
                                                        <a class="btn btn-sm mt-sn-3 mt-2 btn-bg-theme"
                                                            href="product-color.php">Shop Now</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="swiper-slide">
                                        <ul class="top-trending-product-list">
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/31.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h4 class="name title-color">Pro Healthy Lifestyle
                                                                Edible Oil 5
                                                                litre Jar | Saffola Gold Refined Oil</h4>
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
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1309.00 <del>$1525.00</del></h5>
                                                        <a class="btn btn-sm mt-sn-3 mt-2 btn-bg-theme"
                                                            href="product-color.php">Shop Now</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mt-md-5 mt-sm-4 mt-3">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/32.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h4 class="name title-color">Cabin Luggage Polycarbonate
                                                                8 Wheel
                                                                Trolly Luggage</h4>
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
                                                        <h5 class="price">$1308.00 <del>$1425.00</del></h5>
                                                        <a class="btn btn-sm mt-sn-3 mt-2 btn-bg-theme"
                                                            href="product-color.php">Shop Now</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="swiper-slide">
                                        <ul class="top-trending-product-list">
                                            <li>
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/33.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h4 class="name title-color">Stainless Steel Premium
                                                                Vegetable &
                                                                Onion Chopper</h4>
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
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                            <li>
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5 class="price">$1209.00 <del>$1220.00</del></h5>
                                                        <a class="btn btn-sm mt-sn-3 mt-2 btn-bg-theme"
                                                            href="product-color.php">Shop Now</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mt-md-5 mt-sm-4 mt-3">
                                                <div class="vertical-product-box">
                                                    <a href="product-color.php" class="product-image">
                                                        <img src="assets/images/product/34.png" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="product-color.php">
                                                            <h4 class="name title-color">Shears Kitchen Spoone
                                                                6 Piece Set with Wooden Block</h4>
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
                                                        <h5 class="price">$1209.00 <del>$1220.00</del></h5>
                                                        <a class="btn btn-sm mt-sn-3 mt-2 btn-bg-theme"
                                                            href="product-color.php">Shop Now</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-5 col-xl-6">
                        <div class="light-bg-color">
                            <div class="title slider-button">
                                <h3>Deal hot today</h3>
                                <div class="title-slider-button">
                                    <div class="swiper-button-prev swiper-btn-prev">
                                        <i class="ri-arrow-left-s-line"></i>
                                    </div>
                                    <div class="swiper-button-next swiper-btn-next">
                                        <i class="ri-arrow-right-s-line"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper hot-deal-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="hot-deal-product-box">
                                            <div class="product-slider-box">
                                                <div class="swiper swiper-main">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide">
                                                            <a href="product-color.php" class="main-image-box">
                                                                <img src="assets/images/product/35-1.png"
                                                                    class="img-fluid" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <a href="product-color.php" class="main-image-box">
                                                                <img src="assets/images/product/35-2.png"
                                                                    class="img-fluid" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <a href="product-color.php" class="main-image-box">
                                                                <img src="assets/images/product/35-3.png"
                                                                    class="img-fluid" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <ul class="clockdiv-2 product-timer">
                                                        <li>
                                                            <div>
                                                                <div class="counter">
                                                                    <div class="days"></div>
                                                                </div>
                                                                <span class="smalltext">Days</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div>
                                                                <div class="counter">
                                                                    <div class="hours"></div>
                                                                </div>
                                                                <span class="smalltext">Hours</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div>
                                                                <div class="counter">
                                                                    <div class="minutes"></div>
                                                                </div>
                                                                <span class="smalltext">Minutes</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div>
                                                                <div class="counter">
                                                                    <div class="seconds"></div>
                                                                </div>
                                                                <span class="smalltext">Seconds</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="swiper swiper-thumbnail">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide">
                                                            <div class="thumbnail-image">
                                                                <img src="assets/images/product/35-1.png"
                                                                    class="img-fluid" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="thumbnail-image">
                                                                <img src="assets/images/product/35-2.png"
                                                                    class="img-fluid" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="thumbnail-image">
                                                                <img src="assets/images/product/35-3.png"
                                                                    class="img-fluid" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a href="product-color.php">
                                                    <h3>SonicPulse Pro Studio Headphones - Premium Comfort</h3>
                                                </a>
                                                <div class="price-stock">
                                                    <h4 class="price">$670.00 <del>$900.00</del></h4>
                                                    <div class="product-rating">
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
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5>Status : <span>In Stock</span></h5>
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar"></div>
                                                </div>
                                                <h5><span>14/56</span> Sold</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="hot-deal-product-box">
                                            <div class="product-slider-box">
                                                <div class="swiper swiper-main1">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide">
                                                            <a href="product-color.php" class="main-image-box">
                                                                <img src="assets/images/product/23.png"
                                                                    class="img-fluid" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <a href="product-color.php" class="main-image-box">
                                                                <img src="assets/images/product/24.png"
                                                                    class="img-fluid" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <a href="product-color.php" class="main-image-box">
                                                                <img src="assets/images/product/27.png"
                                                                    class="img-fluid" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <ul class="clockdiv-2 product-timer">
                                                        <li>
                                                            <div>
                                                                <div class="counter">
                                                                    <div class="days"></div>
                                                                </div>
                                                                <span class="smalltext">Days</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div>
                                                                <div class="counter">
                                                                    <div class="hours"></div>
                                                                </div>
                                                                <span class="smalltext">Hours</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div>
                                                                <div class="counter">
                                                                    <div class="minutes"></div>
                                                                </div>
                                                                <span class="smalltext">Minutes</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div>
                                                                <div class="counter">
                                                                    <div class="seconds"></div>
                                                                </div>
                                                                <span class="smalltext">Seconds</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="swiper swiper-thumbnail1">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide">
                                                            <div class="thumbnail-image">
                                                                <img src="assets/images/product/23.png"
                                                                    class="img-fluid" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="thumbnail-image">
                                                                <img src="assets/images/product/24.png"
                                                                    class="img-fluid" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="thumbnail-image">
                                                                <img src="assets/images/product/27.png"
                                                                    class="img-fluid" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a href="product-color.php">
                                                    <h3>BlackBerry Keyone BBB100-7 64gb unlocked gSM</h3>
                                                </a>
                                                <div class="price-stock">
                                                    <h4 class="price">$850.45 <del>$962.25</del></h4>
                                                    <div class="product-rating">
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
                                                                <i class="ri-star-fill"></i>
                                                            </li>
                                                        </ul>
                                                        <h5>Status : <span>Few Stock</span></h5>
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar"></div>
                                                </div>
                                                <h5><span>14/56</span> Sold</h5>
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
<!-- Top Trending & Hot Deal Product Section End -->

<!-- Mega Brands Banner Section Start -->
<section class="section-t-space">
    <div class="custom-container">
        <a href="shop.php" class="banner-box-9 brand-banner">
            <img src="assets/images/banner/12.jpg" class="img-fluid" alt="">
        </a>
    </div>
</section>
<!-- Mega Brands Banner Section End -->

<!-- Hot Tag Section Start -->
<section class="section-t-space d-md-block d-none">
    <div class="custom-container">
        <div class="light-bg-color">
            <div class="title-2 title-timer justify-content-between">
                <h3>All Brand:</h3>
            </div>
            <ul class="hot-tag-list" id="allBrandList">
                <li>
                    <a href="shop.php">Nokia</a>
                </li>
                <li>
                    <a href="shop.php">Acer</a>
                </li>
                <li>
                    <a href="shop.php">Samsung Tablet</a>
                </li>
                <li>
                    <a href="shop.php">Apple iPhone</a>
                </li>
                <li>
                    <a href="shop.php">HTC</a>
                </li>
                <li>
                    <a href="shop.php">Macbook</a>
                </li>
                <li>
                    <a href="shop.php">Sony TV</a>
                </li>
                <li>
                    <a href="shop.php">Lenovo</a>
                </li>
                <li>
                    <a href="shop.php">iPhone 12 Pro</a>
                </li>
                <li>
                    <a href="shop.php">Dell</a>
                </li>
                <li>
                    <a href="shop.php">Samsung LED TV</a>
                </li>
                <li>
                    <a href="shop.php">Accessories</a>
                </li>
                <li>
                    <a href="shop.php">Desktops</a>
                </li>
                <li>
                    <a href="shop.php">Acer</a>
                </li>
                <li>
                    <a href="shop.php">LG LCD TV</a>
                </li>
                <li>
                    <a href="shop.php">Sharp LCD TV</a>
                </li>
                <li>
                    <a href="shop.php">Panasonic TV</a>
                </li>
                <li>
                    <a href="shop.php">Electrolux</a>
                </li>
                <li>
                    <a href="shop.php">Toshiba</a>
                </li>
                <li>
                    <a href="shop.php">Toshiba TV</a>
                </li>
                <li>
                    <a href="shop.php">PC Gaming</a>
                </li>
                <li>
                    <a href="shop.php">LG LCD TV</a>
                </li>
                <li>
                    <a href="shop.php">LED TV</a>
                </li>
                <li>
                    <a href="shop.php">Sony</a>
                </li>
                <li>
                    <a href="shop.php">Windows Tablets</a>
                </li>
                <li>
                    <a href="shop.php">Mini Refrigerators</a>
                </li>
                <li>
                    <a href="shop.php">Macbook</a>
                </li>

                <li>
                    <a href="shop.php">Windows Tablets</a>
                </li>
                <li>
                    <a href="shop.php">Apple Accessories</a>
                </li>
                <li>
                    <a href="shop.php">Blackberry</a>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- Hot Tag Section End -->

<!-- Offer Section Start -->
<section class="section-t-space offer-section">
    <div class="custom-container">
        <div class="light-bg-color">
            <div class="title title-timer justify-content-between">
                <h3>Don't Miss This Offers</h3>
                <a href="shop.php">See all deals<i class="ri-arrow-right-s-line"></i></a>
            </div>
            <div class="row g-sm-4 g-3">
                <div class="col-xxl-3 col-sm-6">
                    <a href="shop.php" class="offer-product-box">
                        <img src="assets/images/banner/13.png" class="img-fluid" alt="">
                    </a>
                </div>
                <div class="col-xxl-3 col-sm-6">
                    <a href="shop.php" class="offer-product-box">
                        <img src="assets/images/banner/14.png" class="img-fluid" alt="">
                    </a>
                </div>
                <div class="col-xxl-3 col-sm-6">
                    <a href="shop.php" class="offer-product-box">
                        <img src="assets/images/banner/15.png" class="img-fluid" alt="">
                    </a>
                </div>
                <div class="col-xxl-3 col-sm-6">
                    <a href="shop.php" class="offer-product-box">
                        <img src="assets/images/banner/16.png" class="img-fluid" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Offer Section End -->



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
                            <use
                                xlink:href="https://themes.pixelstrap.net/kartify/assets/images/newsletter/newsletter-icon.svg#newsletter">
                            </use>
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


<script>
   document.addEventListener("DOMContentLoaded", async () => {
       const brandListContainer = document.getElementById("allBrandList");
       if (brandListContainer) {
           try {
               const res = await fetch("https://api.workarya.com/api/brands/list");
               const json = await res.json();
               let brands = [];
               if (json.success && json.data) {
                   brands = json.data.data || json.data || [];
               } else if (Array.isArray(json)) {
                   brands = json;
               }
               
               brandListContainer.innerHTML = "";
               if (brands.length > 0) {
                   brands.forEach(brand => {
                       const brandId = brand._id || brand.id;
                       const brandName = brand.name;
                       brandListContainer.insertAdjacentHTML(
                           "beforeend",
                           `<li><a href="shop.php?brandId=${brandId}">${brandName}</a></li>`
                       );
                   });
               } else {
                   brandListContainer.innerHTML = "<li>No brands available</li>";
               }
           } catch (error) {
               console.error("Error loading brands:", error);
               brandListContainer.innerHTML = "<li>Error loading brands</li>";
           }
       }
   });
</script>



<?php include 'footer.php'; ?>