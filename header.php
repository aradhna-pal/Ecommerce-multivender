<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.net/kartify/template/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Mar 2026 10:19:55 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Kartify">
    <meta name="keywords" content="Kartify">
    <meta name="author" content="Kartify">
    <link rel="icon" href="assets/images/img/favicon.webp" type="image/x-icon">
    <link rel="apple-touch-icon" href="assets/images/img/favicon.webp">
    <meta name="title-color" content="#ff9900">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Kartify">
    <meta name="msapplication-TileImage" content="assets/images/favicon/1.html">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

    <title>HyperScripts | E-commerce </title>

    <!-- Google Font Link -->
    <link rel="stylesheet" type="text/css" href="assets/fonts/br-hendrix/stylesheet.css">

    <!-- Bootstrap Link -->
    <link rel="stylesheet" id="rtl-link" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- Iconsax Icon Link -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/iconsax.css">

    <!-- Remix Icon Link -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/remixicon.css">

    <!-- Swiper Link -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/swiper.css">

    <!-- Style Link -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script> -->


    <script src="./assets/js/userJs/login.js"></script>
    <script src="./assets/js/userJs/allproduct.js"></script>
</head>

<body class="base-bg-color">
    <!-- Page Loader Start -->
    <!-- <div class="preloader">
        <div class="progress-container">
            <div class="progress-bar preloader-progress-bar"></div>
        </div>
        <div class="text-container">
            <div class="loading-text initial">Loading</div>
            <div class="loading-text complete mt-2">
            
                <span>Welcome<br>HyperScripts</span>
            </div>
        </div>
        <div class="percentage">0</div>
    </div> -->
    <!-- Page Loader End -->

    <!-- Header Start -->
    <header class="header-style-1">
        <div class="top-header custom-container">
            <div class="left-header">
                <div class="dropdown-box">
                    <ul>
                        <li class="contact-list">
                            <a href="tel:+918586084450"
                                style="display:flex; align-items:center; gap:8px; color: white;">
                                <i class="fa-solid fa-phone"></i>
                                <span>Call us now: +91 8586084450</span>

                            </a>
                        </li>
                    </ul>
                </div>
                <div class="social-box">
                    <ul class="social-list">
                        <li>
                            <a href="https://www.facebook.com/" target="_blank">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/" target="_blank">
                                <i class="ri-twitter-x-line"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/" target="_blank">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="middle-header">
                <div class="middle-content">
                    <p>
                        <span>FREE RETURNS. STANDARD SHIPPING ORDERS $99+
                            <br>
                            FREE RETURNS. STANDARD SHIPPING ORDERS $99+</span>
                    </p>

                </div>
            </div>

            <div class="right-header">
                <ul class="content-list">
                    <li>
                        <a href="user-dashboard.php">My Account</a>
                    </li>
                    <li>
                        <a href="contact-us.php">Contact Us</a>
                    </li>
                    <li>
                        <a href="blog-3-grid.php">Blog</a>
                    </li>
                    <li>
                        <a href="wishlist.php">Wishlist</a>
                    </li>
                    <li>
                        <a href="cart.php">Cart</a>
                    </li>
                    <li>
                        <a href="#authenticationModal" class="login-btn" data-bs-toggle="modal">Log In</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-header custom-container">
            <div class="left-header">
                <button class="navbar-toggler d-xl-none d-inline navbar-menu-button" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                    <span class="navbar-toggler-icon">
                        <i class="ri-menu-line"></i>
                    </span>
                </button>
                <a href="index.php" class="header-logo">
                    <img src="assets/images/img/logo.png" class="img-fluid" alt="">
                </a>
            </div>
            <div class="middle-header searchInput" id="searchOffcanvas">
                <div class="search-overlay" id="searchOverlay"></div>
                <form class="search-form">
                    <div class="input-group">
                        <div class="close-icon">
                            <i class="ri-close-fill" id="close-btn"></i>
                        </div>
                        <div class="input-group-text">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <span>All Category</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="#!">Laptop</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#!">Camera</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#!">Device</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#!">Watch</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#!">Beauty</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#!">Headphone</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#!">Furniture</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#!">Movie & TV</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#!">Music</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <input id="searchInputBox" type="search" class="form-control"
                            placeholder="I'm searching for...">
                        <button class="search-button btn">
                            <i class="ri-search-line"></i>
                        </button>
                    </div>
                    <div class="result-box" id="resultBox">
                        <div class="search-result-box search-border-box">
                            <div class="result-title mb-sm-3 mb-2">
                                <h4>Popular Product</h4>
                            </div>
                            <ul class="result-list-box">
                                <li>
                                    <a href="product-color.php">iPhone 14</a>
                                </li>
                                <li>
                                    <a href="product-color.php">kitchen utensils</a>
                                </li>
                                <li>
                                    <a href="product-color.php">Realme 10 PRO</a>
                                </li>
                                <li>
                                    <a href="product-color.php">Sport & Outdoor</a>
                                </li>
                                <li>
                                    <a href="product-color.php">Samsung Gal. M14</a>
                                </li>
                                <li>
                                    <a href="product-color.php">Office Wear Perfume</a>
                                </li>
                                <li>
                                    <a href="product-color.php">Handmade table</a>
                                </li>
                                <li>
                                    <a href="product-color.php">mini projector</a>
                                </li>
                            </ul>
                        </div>
                        <div class="last-search-box search-border-box">
                            <div class="result-title mb-sm-3 mb-2">
                                <h4>Last Search</h4>
                                <a href="#!" class="text-danger">Remove all</a>
                            </div>
                            <ul class="search-list-box">
                                <li>
                                    <a href="shop-left-sidebar.php">iPhone 14</a>
                                </li>
                                <li>
                                    <a href="shop-left-sidebar.php">kitchen utensils</a>
                                </li>
                                <li>
                                    <a href="shop-left-sidebar.php">Realme 10 PRO</a>
                                </li>
                                <li>
                                    <a href="shop-left-sidebar.php">Samsung Galaxy M14</a>
                                </li>
                            </ul>
                        </div>
                        <div class="last-seen-search-box search-border-box">
                            <div class="result-title mb-sm-3 mb-2">
                                <h4>Recently Viewed</h4>
                            </div>
                            <ul class="search-list-box">
                                <li>
                                    <a href="product-color.php">
                                        <img src="assets/images/product/104.png" class="img-fluid" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="product-color.php">
                                        <img src="assets/images/product/58.png" class="img-fluid" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="product-color.php">
                                        <img src="assets/images/product/69.png" class="img-fluid" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="product-color.php">
                                        <img src="assets/images/product/42.jpg" class="img-fluid" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="product-color.php">
                                        <img src="assets/images/product/50.jpg" class="img-fluid" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="product-color.php">
                                        <img src="assets/images/product/5.png" class="img-fluid" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>

            <div class="right-header">
                <ul class="header-icon">
                    <li>
                        <a href="#!" id="searchClick">
                            <i class="iconsax search-btn" data-icon-name="search-normal-2"></i>
                        </a>
                    </li>

                    <li class="dropdown-box">
                        <a href="#!">
                            <i class="iconsax" data-icon-name="user-2"></i>
                        </a>
                        <ul class="dropdown-list user-dropdown">
                            <li>
                                <a href="#authenticationModal" class="btn login-btn" data-bs-toggle="modal">Log In</a>
                            </li>
                            <li>
                                <span>New customer?</span>
                                <button class="btn signup-btn" data-bs-toggle="modal"
                                    data-bs-target="#authenticationModal">Start here.</button>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a data-bs-toggle="offcanvas" href="#wishlistOffcanvas">
                            <i class="iconsax" data-icon-name="heart"></i>
                        </a>
                    </li>
                    <li>
                        <a data-bs-toggle="offcanvas" href="#cartOffcanvas">
                            <i class="iconsax" data-icon-name="basket-2"></i>
                            <span class="label">
                                <span>5</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="nav-header custom-container d-flex">
            <div class="category-header d-sm-flex d-none">
                <a data-bs-toggle="offcanvas" href="#categoryCanvas" class="btn category-button d-xxl-none d-block">
                    <i class="ri-menu-line"></i>
                    <span>Shop By Categories</span>
                </a>
                <button class="btn category-button categoryButton d-xxl-block d-none">
                    <i class="ri-menu-line"></i>
                    <span>Shop By Categories</span>
                </button>
            </div>

            <div class="header-nav-middle">
                <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                    <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                        <div class="offcanvas-header navbar-shadow">
                            <h5>Menu</h5>
                            <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas">
                                <i class="ri-close-fill"></i>
                            </button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown mega-dropdown">
                                    <a class="nav-link " href="index.php" data-bs-toggle="dropdown">Home</a>

                                </li>

                                <li class="nav-item dropdown mega-dropdown">
                                    <a class="nav-link dropdown-toggle" href="#!" data-bs-auto-close="outside"
                                        data-bs-toggle="dropdown">Shop</a>
                                    <ul class="dropdown-menu">
                                        <li class="sub-dropdown-hover">
                                            <a class="dropdown-item" href="#!">Shop grid</a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="shop-grid-5.php">Shop grid 5</a>
                                                </li>
                                                <li>
                                                    <a href="shop-grid-4.php">Shop grid 4</a>
                                                </li>
                                                <li>
                                                    <a href="shop-grid-3.php">Shop grid 3</a>
                                                </li>
                                                <li>
                                                    <a href="shop-grid-2.php">Shop grid 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sub-dropdown-hover">
                                            <a class="dropdown-item" href="#!">Shop collection</a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="shop-collection-grid-5.php">Shop collection 5</a>
                                                </li>
                                                <li>
                                                    <a href="shop-collection-grid-4.php">Shop collection 4</a>
                                                </li>
                                                <li>
                                                    <a href="shop-collection-grid-3.php">Shop collection 3</a>
                                                </li>
                                                <li>
                                                    <a href="shop-collection-grid-2.php">Shop collection 2</a>
                                                </li>
                                                <li>
                                                    <a href="shop-collection-list.php">Shop collection list</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="shop-left-sidebar.php">Shop Left sidebar</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="shop-right-sidebar.php">Shop right
                                                sidebar</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="shop-list-infinite.php">Shop List
                                                Infinite</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="shop-banner.php">Shop banner</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="shop-category.php">Shop
                                                category</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="shop-full-width.php">Shop full
                                                width</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="shop-grid-infinite.php">shop
                                                grid infinite</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="shop-list.php">Shop List</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="shop-recent-view.php">Shop
                                                recent view</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item dropdown mega-dropdown">
                                    <a class="nav-link dropdown-toggle" href="#!" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside">Product</a>

                                    <div class="dropdown-menu mega-menu">
                                        <div class="row g-xl-4 g-3">
                                            <div class="col-xl-8">
                                                <div class="row gx-xl-4 gx-3 gy-0 row-cols-xxl-5 row-cols-xl-3">
                                                    <div class="col">
                                                        <div class="menu-title">
                                                            <h4>Product page</h4>
                                                        </div>
                                                        <ul class="menu-list">
                                                            <li>
                                                                <a href="product-sticky.php"
                                                                    class="dropdown-item">Product thumbnail</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-4-images.php"
                                                                    class="dropdown-item">Product image</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-slider.php"
                                                                    class="dropdown-item">Product slider</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-sticky.php"
                                                                    class="dropdown-item">Product sticky</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-full-width.php"
                                                                    class="dropdown-item">Product full width</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col">
                                                        <div class="menu-title">
                                                            <h4>Product variants</h4>
                                                        </div>
                                                        <ul class="menu-list">
                                                            <li>
                                                                <a href="product-rectangle.php"
                                                                    class="dropdown-item">variants rectangle</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-circle.php"
                                                                    class="dropdown-item">variants circle</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-image-swatch.php"
                                                                    class="dropdown-item">variants image swatch</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-color.php"
                                                                    class="dropdown-item">variants color</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-radio-button.php"
                                                                    class="dropdown-item">variants radio</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-dropdown.php"
                                                                    class="dropdown-item">variants dropdown</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col">
                                                        <div class="menu-title">
                                                            <h4>Product Features</h4>
                                                        </div>
                                                        <ul class="menu-list">
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="product-color.php">Product simple</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="product-sticky.php">Product classified</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="product-circle.php">size
                                                                    chart</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-color.php"
                                                                    class="dropdown-item">delivery & return</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-full-width.php"
                                                                    class="dropdown-item">Product review</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="product-dropdown.php">ask
                                                                    an expert</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col">
                                                        <div class="menu-title">
                                                            <h4>Product Features</h4>
                                                        </div>
                                                        <ul class="menu-list">
                                                            <li>
                                                                <a href="product-bundle.php"
                                                                    class="dropdown-item">Product bundle</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-out-stock.php"
                                                                    class="dropdown-item">Out of stock</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-out-stock-2.php"
                                                                    class="dropdown-item">Out of stock 2</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-zoom.php" class="dropdown-item">Product
                                                                    zoom</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-zoom-gallery.php"
                                                                    class="dropdown-item">Product light zoom</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-sticky.php"
                                                                    class="dropdown-item">Product sticky checkout</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col">
                                                        <div class="menu-title">
                                                            <h4>Product Features</h4>
                                                        </div>
                                                        <ul class="menu-list">
                                                            <li>
                                                                <a class="dropdown-item" href="product-circle.php">
                                                                    Sticky Checkout</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-circle.php"
                                                                    class="dropdown-item">Secure Checkout</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-4-images.php"
                                                                    class="dropdown-item">Social share</a>
                                                            </li>
                                                            <li>
                                                                <a href="product-color.php"
                                                                    class="dropdown-item">Related products</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="product-slider.php">Wishlist & compare</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 d-xl-block d-none">
                                                <div class="menu-title">
                                                    <h3>Top Selling Product</h3>
                                                </div>
                                                <div class="swiper menu-product-slider">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide">
                                                            <div class="product-box productMain">
                                                                <a href="product-color.php" class="product-image">
                                                                    <img src="assets/images/product/1.png"
                                                                        class="img-fluid productImage" alt="">
                                                                </a>
                                                                <div class="product-content">
                                                                    <a href="product-color.php">
                                                                        <h4 class="productName ">Smart Watch Series X3
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
                                                                    <h5 class="price mb-0">$456.64 <del>$750.36</del>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="product-box productMain">
                                                                <a href="product-color.php" class="product-image">
                                                                    <img src="assets/images/product/2.png"
                                                                        class="img-fluid productImage" alt="">
                                                                </a>
                                                                <div class="product-content">
                                                                    <a href="product-color.php">
                                                                        <h4 class="productName">Slim 3 Intel Core i4
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
                                                                    <h5 class="price mb-0">$258.12 <del>$295.69</del>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="product-box productMain">
                                                                <a href="product-color.php" class="product-image">
                                                                    <img src="assets/images/product/3.png"
                                                                        class="img-fluid productImage" alt="">
                                                                </a>
                                                                <div class="product-content">
                                                                    <a href="product-color.php">
                                                                        <h4 class="productName">Portable Laptop Table
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
                                                                    <h5 class="price mb-0">$213.32 <del>$258.36</del>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="product-box productMain">
                                                                <a href="product-color.php" class="product-image">
                                                                    <img src="assets/images/product/4.png"
                                                                        class="img-fluid productImage" alt="">
                                                                </a>
                                                                <div class="product-content">
                                                                    <a href="product-color.php">
                                                                        <h4 class="productName">Smart Watch Series X3
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
                                                                    <h5 class="price mb-0">$321.36 <del>$369.36</del>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="product-box productMain">
                                                                <a href="product-color.php" class="product-image">
                                                                    <img src="assets/images/product/5.png"
                                                                        class="img-fluid productImage" alt="">
                                                                </a>
                                                                <div class="product-content">
                                                                    <a href="product-color.php">
                                                                        <h4 class="productName">Kitchen Accessories</h4>
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
                                                                    <h5 class="price mb-0">$752.24 <del>$852.36</del>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="product-box productMain">
                                                                <a href="product-color.php" class="product-image">
                                                                    <img src="assets/images/product/6.png"
                                                                        class="img-fluid productImage" alt="">
                                                                </a>
                                                                <div class="product-content">
                                                                    <a href="product-color.php">
                                                                        <h4 class="productName">Smart Watch Series X3
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
                                                                    <h5 class="price mb-0">$102.31 <del>$110.78</del>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="product-box productMain">
                                                                <a href="product-color.php" class="product-image">
                                                                    <img src="assets/images/product/7.png"
                                                                        class="img-fluid productImage" alt="">
                                                                </a>
                                                                <div class="product-content">
                                                                    <a href="product-color.php">
                                                                        <h4 class="productName">Rockerz 458 Bluetooth
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
                                                                    <h5 class="price mb-0">$239.00 <del>$250.00</del>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item dropdown mega-dropdown">
                                    <a class="nav-link dropdown-toggle" href="#!" data-bs-toggle="dropdown">Sales</a>

                                    <div class="dropdown-menu mega-menu">
                                        <div class="row g-xl-5">
                                            <div class="col-xl-3 border-right-color">
                                                <ul class="nav nav-tabs menu-nav-tabs" id="myTab3">
                                                    <li class="nav-item">
                                                        <button class="nav-link shopBtn active" id="mobile-tab"
                                                            data-bs-toggle="tab" data-bs-target="#mobile-tab-pane">
                                                            <i class="ri-smartphone-line"></i>
                                                            <span>Mobiles, Laptop</span>
                                                            <i class="ri-arrow-right-long-line arrow"></i>
                                                        </button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button class="nav-link shopBtn" id="men-tab"
                                                            data-bs-toggle="tab" data-bs-target="#men-tab-pane">
                                                            <i class="ri-men-line"></i>
                                                            <span>Perfume, Watch, Furniture</span>
                                                            <i class="ri-arrow-right-long-line arrow"></i>
                                                        </button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button class="nav-link shopBtn" id="women-tab"
                                                            data-bs-toggle="tab" data-bs-target="#women-tab-pane">
                                                            <i class="ri-women-line"></i>
                                                            <span>Headphone, Speaker</span>
                                                            <i class="ri-arrow-right-long-line arrow"></i>
                                                        </button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button class="nav-link shopBtn" id="beauty-tab"
                                                            data-bs-toggle="tab" data-bs-target="#beauty-tab-pane">
                                                            <i class="ri-empathize-line"></i>
                                                            <span>Beauty, Health, Grocery</span>
                                                            <i class="ri-arrow-right-long-line arrow"></i>
                                                        </button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button class="nav-link shopBtn" id="baby-tab"
                                                            data-bs-toggle="tab" data-bs-target="#baby-tab-pane">
                                                            <i class="ri-open-arm-line"></i>
                                                            <span>Toys, Baby Products, Kid's Fashion</span>
                                                            <i class="ri-arrow-right-long-line arrow"></i>
                                                        </button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button class="nav-link shopBtn" id="consoles-tab"
                                                            data-bs-toggle="tab" data-bs-target="#consoles-tab-pane">
                                                            <i class="ri-gamepad-line"></i>
                                                            <span>Kitchen items & Appliances</span>
                                                            <i class="ri-arrow-right-long-line arrow"></i>
                                                        </button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button class="nav-link shopBtn" id="electronic-tab"
                                                            data-bs-toggle="tab" data-bs-target="#electronic-tab-pane">
                                                            <i class="ri-plug-2-line"></i>
                                                            <span>TV, Appliances, Electronics</span>
                                                            <i class="ri-arrow-right-long-line arrow"></i>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-9 d-xl-block d-none">
                                                <div class="tab-content" id="myTabContent3">
                                                    <div class="tab-pane fade show active" id="mobile-tab-pane">
                                                        <div class="swiper menu-product-slider2">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/4.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Smart Watch
                                                                                    Series X3</h5>
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
                                                                            <h5 class="price mb-0">$239.00
                                                                                <del>$250.00</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/13.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">One plus Nord CE
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
                                                                            <h5 class="price mb-0">$80.00
                                                                                <del>$85.67</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/14.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Samsung Galaxy
                                                                                    M14</h5>
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
                                                                            <h5 class="price mb-0">$83.25
                                                                                <del>$92.15</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/14.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">iPhone 14 Pro
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
                                                                            <h5 class="price mb-0">$101.25
                                                                                <del>$110.69</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/16.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Realme 10 PRO
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
                                                                            <h5 class="price mb-0">$48.45
                                                                                <del>$52.25</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/22.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Apple iPhone 14
                                                                                    (128 GB) - Purple</h5>
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
                                                                            <h5 class="price mb-0">$110.38
                                                                                <del>$118.68</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/28.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Apple iPhone 13
                                                                                    Mini (512GB) - Starlight</h5>
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
                                                                            <h5 class="price mb-0">$120.38
                                                                                <del>$354.68</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="men-tab-pane">
                                                        <div class="swiper menu-product-slider2">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/97.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Fresh Apricot
                                                                                    Scrub</h5>
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
                                                                            <h5 class="price mb-0">$210.00
                                                                                <del>$250.00</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/96.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Cleansers Beauty
                                                                                    Product</h5>
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
                                                                            <h5 class="price mb-0">$1300.00
                                                                                <del>$1402.67</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/106.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Brawn boys
                                                                                    analog watch</h5>
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
                                                                            <h5 class="price mb-0">$68.42
                                                                                <del>$85.15</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/1.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Smart Watch
                                                                                    Series X3</h5>
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
                                                                            <h5 class="price mb-0">$250.25
                                                                                <del>$275.69</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/105.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Handmade Table
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
                                                                            <h5 class="price mb-0">$1010.25
                                                                                <del>$1250.25</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/60.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Pluto SW250
                                                                                    Smart Watch</h5>
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
                                                                            <h5 class="price mb-0">$400.69
                                                                                <del>$450.45</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="women-tab-pane">
                                                        <div class="swiper menu-product-slider2">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/35-1.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Herschel Leather
                                                                                    duffle bag in brown color</h5>
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
                                                                            <h5 class="price mb-0">$670.00
                                                                                <del>$900.00</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/6.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Smart Watch
                                                                                    Series X3</h5>
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
                                                                            <h5 class="price mb-0">$572.36
                                                                                <del>$856.69</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/category/59.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">dolby Atoms
                                                                                    yellow headphone</h5>
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
                                                                            <h5 class="price mb-0">$258.78
                                                                                <del>$546.58</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/103.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Wireless Black
                                                                                    Headphone</h5>
                                                                            </a>
                                                                            <ul class="rating">
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
                                                                                <li>
                                                                                    <i class="ri-star-fill"></i>
                                                                                </li>
                                                                            </ul>
                                                                            <h5 class="price mb-0">$1300.67
                                                                                <del>$1500.00</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/129.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Wireless in Ear
                                                                                    Earphones with Mic</h5>
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
                                                                            <h5 class="price mb-0">$711.98
                                                                                <del>$750.25</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/131.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Samsung Galaxy
                                                                                    Book3 Pro Intel 13th Gen i5</h5>
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
                                                                            <h5 class="price mb-0">$110.38
                                                                                <del>$118.68</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/151.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Infinix Smart
                                                                                    headphone</h5>
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
                                                                            <h5 class="price mb-0">$1234.62
                                                                                <del>$1804.69</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="beauty-tab-pane">
                                                        <div class="swiper menu-product-slider2">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/7.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Combo Face Care
                                                                                    cream</h5>
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
                                                                            <h5 class="price mb-0">$246.36
                                                                                <del>$506.24</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/97.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Fresh Apricot
                                                                                    Scrub</h5>
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
                                                                            <h5 class="price mb-0">$600.00
                                                                                <del>$850.67</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/62.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Fresho Signature
                                                                                    Garlic & Herb Toast, 100 g</h5>
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
                                                                            <h5 class="price mb-0">$89.69
                                                                                <del>$92.15</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/66.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Popped Potato
                                                                                    Chips Healthy Snack, Assorted</h5>
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
                                                                            <h5 class="price mb-0">$89.33
                                                                                <del>$96.24</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/63.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Fresho Signature
                                                                                    Garlic & Herb Toast, 100 g</h5>
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
                                                                            <h5 class="price mb-0">$78.11
                                                                                <del>$86.25</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/61.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Organic
                                                                                    Himalayan Multiflower Honey, 500 g
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
                                                                            <h5 class="price mb-0">$99.99
                                                                                <del>$105.78</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/84.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">kotaliya Brown
                                                                                    flax seeds(Alsi) Brown Flax Seeds
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
                                                                            <h5 class="price mb-0">$67.38
                                                                                <del>$110.68</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="baby-tab-pane">
                                                        <div class="swiper menu-product-slider2">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/77.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Baby Pacifier
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
                                                                            <h5 class="price mb-0">$169.00
                                                                                <del>$180.00</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/167.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">all-in-one
                                                                                    pyjamas</h5>
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
                                                                            <h5 class="price mb-0">$139.00
                                                                                <del>$150.67</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/170.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Baby skincare
                                                                                    product</h5>
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
                                                                            <h5 class="price mb-0">$83.25
                                                                                <del>$92.15</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/176.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Baby little
                                                                                    trolley</h5>
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
                                                                            <h5 class="price mb-0">$101.25
                                                                                <del>$110.69</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/173.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Cotton Baby
                                                                                    Pillow</h5>
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
                                                                            <h5 class="price mb-0">$48.45
                                                                                <del>$52.25</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/185.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Dusting Powder
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
                                                                            <h5 class="price mb-0">$78.38
                                                                                <del>$95.68</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/182.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Natural Milk
                                                                                    Powder</h5>
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
                                                                            <h5 class="price mb-0">$69.38
                                                                                <del>$86.68</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="consoles-tab-pane">
                                                        <div class="swiper menu-product-slider2">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/5.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Kitchen
                                                                                    Accessories</h5>
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
                                                                            <h5 class="price mb-0">$587.31
                                                                                <del>$896.45</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/8.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">kitchen utensils
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
                                                                            <h5 class="price mb-0">$68.48
                                                                                <del>$85.25</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/11.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">stainless
                                                                                    dishware</h5>
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
                                                                            <h5 class="price mb-0">$48.25
                                                                                <del>$56.15</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/12.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Wholesale Cheap
                                                                                    Square</h5>
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
                                                                            <h5 class="price mb-0">$87.25
                                                                                <del>$101.69</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/18.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">RoastRite
                                                                                    Culinary Ovens</h5>
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
                                                                            <h5 class="price mb-0">$1548.46
                                                                                <del>$1850.69</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/20.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">BakeMaster
                                                                                    Professional Ovens</h5>
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
                                                                            <h5 class="price mb-0">$1200.00
                                                                                <del>$1500.20</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/21.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">FridgeFrost
                                                                                    Innovations</h5>
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
                                                                            <h5 class="price mb-0">$3698.36
                                                                                <del>$4561.00</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="electronic-tab-pane">
                                                        <div class="swiper menu-product-slider2">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/27.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Motorola Moto X4
                                                                                    32GB Unlocked Smartphone</h5>
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
                                                                            <h5 class="price mb-0">$1220.24
                                                                                <del>$1520.98</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/29.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Fujifilm Instax
                                                                                    Mini 9 Instant Camera</h5>
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
                                                                            <h5 class="price mb-0">$569.33
                                                                                <del>$85.67</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/41.jpg"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Samsung Galaxy
                                                                                    Book3 Pro Intel 13th Gen i5</h5>
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
                                                                            <h5 class="price mb-0">$2548.12
                                                                                <del>$3000.89</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/115.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Retro movie film
                                                                                    cinema</h5>
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
                                                                            <h5 class="price mb-0">$6542.98
                                                                                <del>$8632.99</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/108.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Apple Smart HD
                                                                                    TV</h5>
                                                                            </a>
                                                                            <ul class="rating">
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
                                                                                <li>
                                                                                    <i class="ri-star-fill"></i>
                                                                                </li>
                                                                            </ul>
                                                                            <h5 class="price mb-0">$4523.25
                                                                                <del>$5658.25</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/112.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">mini projector
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
                                                                                    <i class="ri-star-fill"></i>
                                                                                </li>
                                                                                <li>
                                                                                    <i class="ri-star-fill"></i>
                                                                                </li>
                                                                                <li>
                                                                                    <i class="ri-star-fill"></i>
                                                                                </li>
                                                                            </ul>
                                                                            <h5 class="price mb-0">$2567.48
                                                                                <del>$3524.36</del>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <div class="product-box productMain">
                                                                        <a href="product-color.php"
                                                                            class="product-image">
                                                                            <img src="assets/images/product/134.png"
                                                                                class="img-fluid productImage" alt="">
                                                                        </a>
                                                                        <div class="product-content">
                                                                            <a href="product-color.php">
                                                                                <h5 class="productName">Best Accessories
                                                                                    SteelSeries NIMBUS</h5>
                                                                            </a>
                                                                            <ul class="rating">
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
                                                                                <li>
                                                                                    <i class="ri-star-fill"></i>
                                                                                </li>
                                                                            </ul>
                                                                            <h5 class="price mb-0">$369.58
                                                                                <del>$523.14</del>
                                                                            </h5>
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
                                </li>

                                <li class="nav-item dropdown mega-dropdown">
                                    <a class="nav-link dropdown-toggle" href="#!" data-bs-toggle="dropdown">Features</a>

                                    <div class="dropdown-menu mega-menu">
                                        <div class="row row-cols-xl-5 row-cols-1 g-md-4 g-2">
                                            <div class="col">
                                                <div class="menu-title">
                                                    <h4>Portfolio pages</h4>
                                                </div>
                                                <ul class="menu-list">
                                                    <li>
                                                        <a class="dropdown-item" href="portfolio-2-grid.php">Portfolio
                                                            grid 2</a>
                                                    </li>
                                                    <li>
                                                        <a href="portfolio-3-grid.php" class="dropdown-item">Portfolio
                                                            grid 3</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="portfolio-4-grid.php">Portfolio
                                                            grid 4</a>
                                                    </li>
                                                    <li>
                                                        <a href="portfolio-2-grid-masonary.php"
                                                            class="dropdown-item">Portfolio Masonary 2</a>
                                                    </li>
                                                    <li>
                                                        <a href="portfolio-3-grid-masonary.php"
                                                            class="dropdown-item">Portfolio Masonary 3</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="portfolio-4-grid-masonary.php">Portfolio Masonary
                                                            4</a>
                                                    </li>
                                                    <li>
                                                        <a href="portfolio-full-width-masonary.php"
                                                            class="dropdown-item">Portfolio Masonary full width</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col">
                                                <div class="menu-title">
                                                    <h4>Invoice pages</h4>
                                                </div>
                                                <ul class="menu-list">
                                                    <li>
                                                        <a href="https://themes.pixelstrap.net/kartify/invoice/invoice-1.php"
                                                            class="dropdown-item">Invoice 1</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://themes.pixelstrap.net/kartify/invoice/invoice-2.php"
                                                            class="dropdown-item">Invoice 2</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://themes.pixelstrap.net/kartify/invoice/invoice-3.php"
                                                            class="dropdown-item">Invoice 3</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col">
                                                <div class="menu-title">
                                                    <h4>Email templates</h4>
                                                </div>
                                                <ul class="menu-list">
                                                    <li>
                                                        <a href="https://themes.pixelstrap.net/kartify/email-templete/black-friday.php"
                                                            class="dropdown-item">Black friday</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://themes.pixelstrap.net/kartify/email-templete/leave-feedback.php"
                                                            class="dropdown-item">Leave feedback</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://themes.pixelstrap.net/kartify/email-templete/order-tracking.php"
                                                            class="dropdown-item">Order tracking</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://themes.pixelstrap.net/kartify/email-templete/reset-password.php"
                                                            class="dropdown-item">Reset password</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://themes.pixelstrap.net/kartify/email-templete/welcome.php"
                                                            class="dropdown-item">Welcome</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col">
                                                <div class="menu-title">
                                                    <h4>Cookie bar</h4>
                                                </div>
                                                <ul class="menu-list">
                                                    <li>
                                                        <a href="index.php" class="dropdown-item">Cookie bar bottom
                                                            1</a>
                                                    </li>
                                                    <li>
                                                        <a href="index-2.php" class="dropdown-item">Cookie bar bottom
                                                            2</a>
                                                    </li>
                                                    <li>
                                                        <a href="index-3.php" class="dropdown-item">Cookie bar bottom
                                                            3</a>
                                                    </li>
                                                    <li>
                                                        <a href="index-4.php" class="dropdown-item">Cookie bar Right
                                                            1</a>
                                                    </li>
                                                    <li>
                                                        <a href="index-5.php" class="dropdown-item">Cookie bar Right
                                                            2</a>
                                                    </li>
                                                    <li>
                                                        <a href="index-6.php" class="dropdown-item">Cookie bar Right
                                                            3</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col">
                                                <div class="menu-title">
                                                    <h4>Modal</h4>
                                                </div>
                                                <ul class="menu-list">
                                                    <li>
                                                        <a class="dropdown-item" href="#quickViewModal"
                                                            data-bs-toggle="modal">Add to Cart</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item newsletter-btn" data-bs-toggle="modal"
                                                            href="#newsletterModal">Newsletter</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item exit-modal-btn" data-bs-toggle="modal"
                                                            href="#exitModal">Exit</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-12 d-xl-block d-none w-100">
                                                <a href="shop-left-sidebar.php" class="menu-banner">
                                                    <img src="assets/images/banner/12.jpg" class="img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#!" data-bs-toggle="dropdown">Pages</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="400.php">400</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="404.php">404</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="500.php">500</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="about-us.php">About us</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="cart.php">Cart</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="checkout.php">Checkout</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="coming-soon.php">Coming Soon</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="compare.php">Compare</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="contact-us.php">Contact us</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="faq.php">FAQ's</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="maintenance.php">Maintenance</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="order-success.php">Order success</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="order-tracking.php">Order tracking</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="search.php">Search</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="user-dashboard.php">User dashboard</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="wishlist.php">Wishlist</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item dropdown new-nav-item">
                                    <a class="nav-link dropdown-toggle" href="#!" data-bs-toggle="dropdown">Seller</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="seller-become.php">Become a Seller</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="seller-grid.php">Seller grid</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="seller-grid-2.php">Seller grid 2</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="seller-list.php">Seller list</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="seller-list-2.php">Seller list 2</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="seller-details.php">Seller details</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="seller-details-2.php">Seller details 2</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#!" data-bs-toggle="dropdown">Blog</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="blog-2-grid.php">Blog grid 2</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="blog-3-grid.php">Blog grid 3</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="blog-list.php">Blog list</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="blog-masonary.php">blog masonary</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="blog-no-sidebar.php">Blog no sidebar</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="blog-detail.php">Blog details</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="recent-header">
                <ul class="product-viwer">
                    <li class="recent-product dropdown-box">
                        <a data-bs-toggle="offcanvas" href="#recentViwerModal"
                            class="product-link d-xxl-none d-sm-flex d-none">Recent Viewer</a>
                        <a href="#!" class="product-link d-xxl-flex d-none">Recent Viewer</a>
                        <div class="review-dropdown dropdown-list offcanvas" id="recentViwerModal">
                            <div class="dropdown-title">
                                <h4>Recent view</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas">
                                    <i class="ri-close-line"></i>
                                </button>
                            </div>

                            <ul class="product-box-list">
                                <li>
                                    <div class="vertical-product-box">
                                        <a href="product-color.php" class="product-image">
                                            <img src="assets/images/product/1.png" class="img-fluid" alt="">
                                        </a>
                                        <div class="product-content">
                                            <a href="product-color.php">
                                                <h5 class="name title-color">Smart Watch Series X3</h5>
                                            </a>
                                            <h5 class="price">$239.00 <del>$250.00</del></h5>
                                            <button class="btn cart-btn">
                                                <i class="ri-shopping-cart-line"></i>
                                                <span>Add to cart</span>
                                            </button>
                                        </div>
                                        <button class="btn close-button">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </li>

                                <li>
                                    <div class="vertical-product-box">
                                        <a href="product-color.php" class="product-image">
                                            <img src="assets/images/product/2.png" class="img-fluid" alt="">
                                        </a>
                                        <div class="product-content">
                                            <a href="product-color.php">
                                                <h5 class="name title-color">Slim 3 Intel Core i5</h5>
                                            </a>
                                            <h5 class="price">$700.00 <del>$720.00</del></h5>
                                            <button class="btn cart-btn">
                                                <i class="ri-shopping-cart-line"></i>
                                                <span>Add to cart</span>
                                            </button>
                                        </div>
                                        <button class="btn close-button">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </li>

                                <li>
                                    <div class="vertical-product-box">
                                        <a href="product-color.php" class="product-image">
                                            <img src="assets/images/product/3.png" class="img-fluid" alt="">
                                        </a>
                                        <div class="product-content">
                                            <a href="product-color.php">
                                                <h5 class="name title-color">Portable Laptop Table</h5>
                                            </a>
                                            <h5 class="price">$199.00 <del>$200.00</del></h5>
                                            <button class="btn cart-btn">
                                                <i class="ri-shopping-cart-line"></i>
                                                <span>Add to cart</span>
                                            </button>
                                        </div>
                                        <button class="btn close-button">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </li>

                                <li>
                                    <div class="vertical-product-box">
                                        <a href="product-color.php" class="product-image">
                                            <img src="assets/images/product/2.png" class="img-fluid" alt="">
                                        </a>
                                        <div class="product-content">
                                            <a href="product-color.php">
                                                <h5 class="name title-color">Slim 3 Intel Core i5</h5>
                                            </a>
                                            <h5 class="price">$700.00 <del>$720.00</del></h5>
                                            <button class="btn cart-btn">
                                                <i class="ri-shopping-cart-line"></i>
                                                <span>Add to cart</span>
                                            </button>
                                        </div>
                                        <button class="btn close-button">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </li>

                                <li>
                                    <div class="vertical-product-box">
                                        <a href="product-color.php" class="product-image">
                                            <img src="assets/images/product/3.png" class="img-fluid" alt="">
                                        </a>
                                        <div class="product-content">
                                            <a href="product-color.php">
                                                <h5 class="name title-color">Portable Laptop Table</h5>
                                            </a>
                                            <h5 class="price">$199.00 <del>$200.00</del></h5>
                                            <button class="btn cart-btn">
                                                <i class="ri-shopping-cart-line"></i>
                                                <span>Add to cart</span>
                                            </button>
                                        </div>
                                        <button class="btn close-button">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </li>
                            </ul>

                            <div class="empty-message">
                                <svg>
                                    <use
                                        xlink:href="https://themes.pixelstrap.net/kartify/assets/images/no-recent.svg#noRecent">
                                    </use>
                                </svg>
                                <h6>No products available</h6>
                            </div>
                        </div>
                    </li>
                    <li class="order-tracking d-xxl-inline-block d-none">
                        <a href="order-tracking.php" class="product-link">Order Tracking</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Mobile Menu Start -->
    <div class="mobile-menu d-sm-none">
        <ul>
            <li class="active">
                <a href="index.php">
                    <i class="ri-home-2-line"></i>
                    <span>Home</span>
                </a>
            </li>

            <li class="mobile-category">
                <a data-bs-toggle="offcanvas" href="#categoryCanvas">
                    <i class="ri-menu-line"></i>
                    <span>Category</span>
                </a>
            </li>

            <li>
                <a data-bs-toggle="offcanvas" href="#cartOffcanvas" class="search-box">
                    <i class="ri-shopping-cart-line"></i>
                    <span>Cart</span>
                </a>
            </li>

            <li>
                <a data-bs-toggle="offcanvas" href="#wishlistOffcanvas" class="notifi-wishlist">
                    <i class="ri-heart-3-line"></i>
                    <span>Wishlist</span>
                </a>
            </li>

            <li>
                <a href="user-dashboard.php">
                    <i class="ri-user-3-line"></i>
                    <span>Account</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- Mobile Menu End -->