<?php include 'header.php'; ?>

    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section">
        <div class="custom-container">
            <div class="breadcrumb-contain">
                <h2>Wishlist</h2>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <i class="ri-home-3-fill"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Wishlist</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Wishlist Section Start -->
    <section class="section-t-space wishlist-section">
        <div class="custom-container">
            <div class="row g-sm-4 g-3 row-cols-xxl-5 row-cols-xl-4 row-cols-md-3 row-cols-2">
                <div class="col">
                    <div class="product-box-4-main">
                        <div class="select-option-box">
                            <div class="select-box">
                                <div>
                                    <div class="color-box">
                                        <h3 class="h5">Colors</h3>
                                        <ul class="color-list">
                                            <li>
                                                <a href="#!" style="background-color: #43263D;"></a>
                                            </li>
                                            <li>
                                                <a href="#!" style="background-color: #A03158;"></a>
                                            </li>
                                            <li>
                                                <a href="#!" style="background-color: #657994;"></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="size-box">
                                        <h3 class="h5">Sizes</h3>
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
                                    <img src="../assets/images/product/96.png" class="img-fluid productImage" alt="">
                                </a>
                                <div class="quick-view-button-box">
                                    <button class="btn view-btn" data-bs-target="#quickViewModal"
                                        data-bs-toggle="modal">Quick View</button>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4 class="sub-name productName">Marth product</h4>
                                <a href="product-color.html" class="name">
                                    <h5>Cleansers Beauty Product</h5>
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
                                <h5 class="price">$1300.00 <del>$1402.00</del></h5>
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
    <!-- Wishlist Section End -->

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