<?php include 'header.php'; ?>


<!-- Breadcrumb Section Start -->
<section class="breadcrumb-section">
    <div class="custom-container">
        <div class="breadcrumb-contain">
            <h2>Shop </h2>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            <i class="ri-home-3-fill"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item active">Shop </li>
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
                                    <use
                                        xlink:href="https://themes.pixelstrap.net/kartify/assets/svg/grid-option.svg#gridTwo">
                                    </use>
                                </svg>
                            </button>
                        </li>
                        <li class="three-grid">
                            <button class="btn">
                                <svg>
                                    <use
                                        xlink:href="https://themes.pixelstrap.net/kartify/assets/svg/grid-option.svg#gridThree">
                                    </use>
                                </svg>
                            </button>
                        </li>
                        <li class="grid-btn">
                            <button class="btn">
                                <svg>
                                    <use
                                        xlink:href="https://themes.pixelstrap.net/kartify/assets/svg/grid-option.svg#gridFour">
                                    </use>
                                </svg>
                            </button>
                        </li>
                        <li class="five-grid d-xxl-inline-block d-none active">
                            <button class="btn">
                                <svg>
                                    <use
                                        xlink:href="https://themes.pixelstrap.net/kartify/assets/svg/grid-option.svg#gridFive">
                                    </use>
                                </svg>
                            </button>
                        </li>
                        <li class="list-btn">
                            <button class="btn">
                                <svg>
                                    <use
                                        xlink:href="https://themes.pixelstrap.net/kartify/assets/svg/grid-option.svg#list">
                                    </use>
                                </svg>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="selectedFiltersContainer" class="selected-filters-wrapper mb-3 d-flex flex-wrap gap-2"></div>
        <div class="row g-sm-4 g-3 product-list-section row-cols-xxl-5 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2"
            id="productsContainer">
            <div class="col">
                <div class="product-box-4-main">
                    <div class="select-option-box">
                        <div class="select-box">
                            <div>
                                <div class="color-box">
                                    <h4 class="h5">Colors</h4>
                                    <ul class="color-list">
                                        <li>
                                            <a href="#!" style="background-color: #f4c266;"></a>
                                        </li>
                                        <li>
                                            <a href="#!" style="background-color: #e7e597;"></a>
                                        </li>
                                        <li>
                                            <a href="#!" style="background-color: #6aa473;"></a>
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
                            <a href="">
                                <img src="./assets/images/product/106.png" class="img-fluid productImage" alt="">
                            </a>
                            <div class="quick-view-button-box">
                                <button class="btn view-btn" data-bs-target="#quickViewModal"
                                    data-bs-toggle="modal">Quick View</button>
                            </div>
                        </div>
                        <div class="product-content">
                            <h5 class="sub-name productName">Apple Product</h5>
                            <a href="" class="name">
                                <h5>Apple iPhone 13 (128GB)</h5>
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
                            <p class="product-details">The Apple iPhone 13 features a durable ceramic shield front
                                and a
                                super retina XDR display for vibrant visuals. Powered by the A15 Bionic chip, it
                                delivers lightning-fast performance and impressive battery life. Its advanced
                                dual-camera system captures stunning photos and 4K videos.</p>
                            <h5 class="price">$1920.00 <del>$2100.00</del></h5>
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
<!-- Product Filter Offcanvas Start -->
<div class="offcanvas offcanvas-start product-filter-offcanvas" id="filterOffcanvas">
    <div class="offcanvas-header">
        <h4 class="offcanvas-title">Product Filter</h4>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <div class="left-box">
            <div class="shop-left-sidebar">
                <div class="filter-category-2" id="filterCategory2Container" style="display: none;">
                    <div class="filter-title">
                        <h2>Filters</h2>
                        <a href="javascript:void(0)" onclick="clearAllFilters()">Clear All</a>
                    </div>
                    <ul id="sidebarSelectedFilters">
                    </ul>
                </div>

               <div class="accordion custom-accordion-2">
    
    <!-- Categories -->
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseTwo">
                <span>Categories</span>
            </button>
        </h2>
        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show">
            <div class="accordion-body">
                <div class="search-box">
                    <input type="search" class="form-control" id="search" placeholder="Search ..">
                    <button class="search-button btn">
                        <i class="ri-search-2-line"></i>
                    </button>
                </div>

                <ul class="category-list custom-padding custom-height" id="filterCategoryList">
                    <li>
                        <div class="form-check category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="fruit">
                            <label class="form-check-label" for="fruit">
                                <span class="name">T-Shirts & Polos</span>
                                <span class="number">(15)</span>
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Price -->
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseThree">
                <span>Price</span>
            </button>
        </h2>
        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show">
            <div class="accordion-body">
                <div class="price-range-slider">
                    <div class="slider-container">
                        <div class="range-slider">
                            <div class="range-fill"></div>
                            <input type="range" id="minRange" min="0" max="100000" value="1000" step="100">
                            <input type="range" id="maxRange" min="0" max="100000" value="9000" step="100">
                        </div>
                        <div class="price-values">
                            <span id="min-price">₹1000</span>
                            <span class="dash">-</span>
                            <span id="max-price">₹9000</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Color -->
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseFour">
                <span>Color</span>
            </button>
        </h2>
        <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show">
            <div class="accordion-body">
                <ul class="color-box-list" id="filterColorList">
                    <li>
                        <button class="color-1 btn"></button>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Size (New) -->
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseSize">
                <span>Size</span>
            </button>
        </h2>
        <div id="panelsStayOpen-collapseSize" class="accordion-collapse collapse show">
            <div class="accordion-body">
                <ul class="category-list custom-padding custom-height" id="filterSizeList">
                </ul>
            </div>
        </div>
    </div>

    <!-- Brand (New) -->
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseBrand">
                <span>Brand</span>
            </button>
        </h2>
        <div id="panelsStayOpen-collapseBrand" class="accordion-collapse collapse show">
            <div class="accordion-body">
                <div class="search-box">
                    <input type="search" class="form-control" id="brand-search" placeholder="Search brands..">
                    <button class="search-button btn">
                        <i class="ri-search-2-line"></i>
                    </button>
                </div>

                <ul class="category-list custom-padding custom-height" id="filterBrandList">
                </ul>
            </div>
        </div>
    </div>

</div>
            </div>
        </div>
    </div>
</div>
<!-- Product Filter Offcanvas End -->


<?php include 'footer.php'; ?>