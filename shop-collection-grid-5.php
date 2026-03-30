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
            <div
                class="row g-sm-4 g-3 product-list-section row-cols-xxl-5 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2">
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
                                <a href="product-color.html">
                                    <img src="../assets/images/product/106.png" class="img-fluid productImage" alt="">
                                </a>
                                <div class="quick-view-button-box">
                                    <button class="btn view-btn" data-bs-target="#quickViewModal"
                                        data-bs-toggle="modal">Quick View</button>
                                </div>
                            </div>
                            <div class="product-content">
                                <h5 class="sub-name productName">Apple Product</h5>
                                <a href="product-color.html" class="name">
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

                <div class="col">
                    <div class="product-box-4-main">
                        <div class="select-option-box">
                            <div class="select-box">
                                <div>
                                    <div class="color-box">
                                        <h4 class="h5">Colors</h4>
                                        <ul class="color-list">
                                            <li>
                                                <a href="#!" style="background-color: #6a7b9d;"></a>
                                            </li>
                                            <li>
                                                <a href="#!" style="background-color: #b6a9ab;"></a>
                                            </li>
                                            <li>
                                                <a href="#!" style="background-color: #a8b5c8;"></a>
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
                                    <img src="../assets/images/product/107.png" class="img-fluid productImage" alt="">
                                </a>
                                <div class="quick-view-button-box">
                                    <button class="btn view-btn" data-bs-target="#quickViewModal"
                                        data-bs-toggle="modal">Quick View</button>
                                </div>
                            </div>
                            <div class="product-content">
                                <h5 class="sub-name productName">Rainbow Umbral</h5>
                                <a href="product-color.html" class="name">
                                    <h5>Cyanic Pop Burst Long</h5>
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
                                <p class="product-details">This is a beautifully crafted traditional paper
                                    parasol with a light blue canopy adorned with elegant pink floral designs.
                                    The frame and handle are made from natural bamboo, providing durability and
                                    an authentic touch. Perfect for cultural events, photography props, or as a
                                    stylish sunshade accessory.</p>
                                <h5 class="price">$120.00 <del>$135.00</del></h5>
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

                <div class="col">
                    <div class="product-box-4-main">
                        <div class="select-option-box">
                            <div class="select-box">
                                <div>
                                    <div class="color-box">
                                        <h4 class="h5">Colors</h4>
                                        <ul class="color-list">
                                            <li>
                                                <a href="#!" style="background-color: #5a6aa3;"></a>
                                            </li>
                                            <li>
                                                <a href="#!" style="background-color: #bf62a8;"></a>
                                            </li>
                                            <li>
                                                <a href="#!" style="background-color: #ef7a7a;"></a>
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
                                    <img src="../assets/images/product/108.png" class="img-fluid productImage" alt="">
                                </a>
                                <div class="quick-view-button-box">
                                    <button class="btn view-btn" data-bs-target="#quickViewModal"
                                        data-bs-toggle="modal">Quick View</button>
                                </div>
                            </div>
                            <div class="product-content">
                                <h5 class="sub-name productName">Apple Smart HD TV</h5>
                                <a href="product-color.html" class="name">
                                    <h5>Apple Smart HD TV</h5>
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
                                <p class="product-details">A sleek media streaming device that delivers 4K entertainment
                                    with Dolby Vision and immersive sound. Comes with a responsive Siri remote for easy
                                    navigation and voice control. Perfect for enjoying movies, shows, music, and apps on
                                    the big screen.</p>
                                <h5 class="price">$1020.00 <del>$1130.00</del></h5>
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
                                <a href="product-color.html">
                                    <img src="../assets/images/product/109.png" class="img-fluid productImage" alt="">
                                </a>
                                <div class="quick-view-button-box">
                                    <button class="btn view-btn" data-bs-target="#quickViewModal"
                                        data-bs-toggle="modal">Quick View</button>
                                </div>
                            </div>
                            <div class="product-content">
                                <h5 class="sub-name productName">Man Accessories</h5>
                                <a href="product-color.html" class="name">
                                    <h5>Men Lace Up Shoes</h5>
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
                                <p class="product-details">Lightweight and stylish running shoes designed with
                                    breathable mesh for maximum comfort. The vibrant orange design with multicolor
                                    accents adds a modern sporty look. Ideal for workouts, outdoor runs, or casual wear.
                                </p>
                                <h5 class="price">$1020.00 <del>$1100.00</del></h5>
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
                                <a href="product-color.html">
                                    <img src="../assets/images/product/110.png" class="img-fluid productImage" alt="">
                                </a>
                                <div class="quick-view-button-box">
                                    <button class="btn view-btn" data-bs-target="#quickViewModal"
                                        data-bs-toggle="modal">Quick View</button>
                                </div>
                            </div>
                            <div class="product-content">
                                <h5 class="sub-name productName">Apple Product</h5>
                                <a href="product-color.html" class="name">
                                    <h5>Apple iPhone 14 Plus</h5>
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
                                <p class="product-details">A premium smartphone featuring a stunning edge-to-edge
                                    display and advanced dual camera system. Delivers smooth performance, secure Face
                                    ID, and seamless connectivity with AirPods. Sleek, durable, and built for everyday
                                    convenience.</p>
                                <h5 class="price">$1450.00 <del>$1500.00</del></h5>
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

                <div class="col">
                    <div class="product-box-4-main">
                        <div class="select-option-box">
                            <div class="select-box">
                                <div>
                                    <div class="color-box">
                                        <h4 class="h5">Colors</h4>
                                        <ul class="color-list">
                                            <li>
                                                <a href="#!" style="background-color: #DAA520;"></a>
                                            </li>
                                            <li>
                                                <a href="#!" style="background-color: #CDC6B4;"></a>
                                            </li>
                                            <li>
                                                <a href="#!" style="background-color: #D9B061;"></a>
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
                                    <img src="../assets/images/product/111.png" class="img-fluid productImage" alt="">
                                </a>
                                <div class="quick-view-button-box">
                                    <button class="btn view-btn" data-bs-target="#quickViewModal"
                                        data-bs-toggle="modal">Quick View</button>
                                </div>
                            </div>
                            <div class="product-content">
                                <h5 class="sub-name productName">Man Accessories</h5>
                                <a href="product-color.html" class="name">
                                    <h5>Men brown casual belt</h5>
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
                                <p class="product-details">Crafted from high-quality brown leather with fine stitching
                                    for durability and elegance. Features a sturdy metallic buckle for a secure fit and
                                    classic style. Suitable for both formal and casual outfits.</p>
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

                <div class="col">
                    <div class="product-box-4-main">
                        <div class="select-option-box">
                            <div class="select-box">
                                <div>
                                    <div class="color-box">
                                        <h4 class="h5">Colors</h4>
                                        <ul class="color-list">
                                            <li>
                                                <a href="#!" style="background-color: #F9F8FD;"></a>
                                            </li>
                                            <li>
                                                <a href="#!" style="background-color: #EBF6F5;"></a>
                                            </li>
                                            <li>
                                                <a href="#!" style="background-color: #FAE3E8;"></a>
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
                                    <img src="../assets/images/product/112.png" class="img-fluid productImage" alt="">
                                </a>
                                <div class="quick-view-button-box">
                                    <button class="btn view-btn" data-bs-target="#quickViewModal"
                                        data-bs-toggle="modal">Quick View</button>
                                </div>
                            </div>
                            <div class="product-content">
                                <h5 class="sub-name productName">Electronic Product</h5>
                                <a href="product-color.html" class="name">
                                    <h5>miniprojector</h5>
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
                                <p class="product-details">Compact and portable projector with a modern two-tone design.
                                    Offers clear, vibrant projection for movies, presentations, or gaming. A perfect
                                    entertainment solution for home or travel use.</p>
                                <h5 class="price">$1009.00 <del>$1366.00</del></h5>
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

                <div class="col">
                    <div class="product-box-4-main">
                        <div class="select-option-box">
                            <div class="select-box">
                                <div>
                                    <div class="color-box">
                                        <h4 class="h5">Colors</h4>
                                        <ul class="color-list">
                                            <li>
                                                <a href="#!" style="background-color: #FFE4C4;"></a>
                                            </li>
                                            <li>
                                                <a href="#!" style="background-color: #FEDC6A;"></a>
                                            </li>
                                            <li>
                                                <a href="#!" style="background-color: #4B9CD3;"></a>
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
                                    <img src="../assets/images/product/113.png" class="img-fluid productImage" alt="">
                                </a>
                                <div class="quick-view-button-box">
                                    <button class="btn view-btn" data-bs-target="#quickViewModal"
                                        data-bs-toggle="modal">Quick View</button>
                                </div>
                            </div>
                            <div class="product-content">
                                <h5 class="sub-name productName">American Tourister</h5>
                                <a href="product-color.html" class="name">
                                    <h5>travel luggage bag</h5>
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
                                <p class="product-details">This premium hard-shell luggage features a sleek deep blue
                                    finish with a durable construction, ideal for travel. It includes a retractable
                                    handle and smooth-rolling wheels for easy mobility. The elegant shield emblem and
                                    "LUGGAGE 24/01/02" marking add a touch of sophistication to its functional design.
                                </p>
                                <h5 class="price">$1009.00 <del>$1200.00</del></h5>
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
                                    <img src="../assets/images/product/114.png" class="img-fluid productImage" alt="">
                                </a>
                                <div class="quick-view-button-box">
                                    <button class="btn view-btn" data-bs-target="#quickViewModal"
                                        data-bs-toggle="modal">Quick View</button>
                                </div>
                            </div>
                            <div class="product-content">
                                <h5 class="sub-name productName">Home Furniture</h5>
                                <a href="product-color.html" class="name">
                                    <h5>hand truck</h5>
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
                                <p class="product-details">This robust blue hand truck is designed for heavy-duty use,
                                    featuring a sturdy metal frame with a weathered finish that adds character. Equipped
                                    with two durable wheels and a wide base platform, it provides excellent stability
                                    and support for transporting large or bulky items such as boxes, furniture, or
                                    equipment. The ergonomic handles allow for comfortable maneuvering, making it an
                                    essential tool for warehouses, moving services, or home projects.</p>
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
                                    <img src="../assets/images/product/105.png" class="img-fluid productImage" alt="">
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

                <div class="col">
                    <div class="product-box-4-main">
                        <div class="select-option-box">
                            <div class="select-box">
                                <div>
                                    <div class="color-box">
                                        <h4 class="h5">Colors</h4>
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
                                    <img src="../assets/images/product/115.png" class="img-fluid productImage" alt="">
                                </a>
                                <div class="quick-view-button-box">
                                    <button class="btn view-btn" data-bs-target="#quickViewModal"
                                        data-bs-toggle="modal">Quick View</button>
                                </div>
                            </div>
                            <div class="product-content">
                                <h5 class="sub-name productName">Metal Shell Connectors</h5>
                                <a href="product-color.html" class="name">
                                    <h5>Retro movie film cinema</h5>
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
                                <p class="product-details">Bring the magic of the movies home with this retro movie film
                                    cinema projector. Featuring a classic vintage design with modern projection
                                    technology, it offers clear visuals and nostalgic appeal. Ideal for movie nights,
                                    home theaters, or as a unique decorative piece.</p>
                                <h5 class="price">$1400.00 <del>$1786.00</del></h5>
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

                <div class="col">
                    <div class="product-box-4-main">
                        <div class="select-option-box">
                            <div class="select-box">
                                <div>
                                    <div class="color-box">
                                        <h4 class="h5">Colors</h4>
                                        <ul class="color-list">
                                            <li>
                                                <a href="#!" style="background-color: #6a7b9d;"></a>
                                            </li>
                                            <li>
                                                <a href="#!" style="background-color: #b6a9ab;"></a>
                                            </li>
                                            <li>
                                                <a href="#!" style="background-color: #a8b5c8;"></a>
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
                                    <img src="../assets/images/product/116.png" class="img-fluid productImage" alt="">
                                </a>
                                <div class="quick-view-button-box">
                                    <button class="btn view-btn" data-bs-target="#quickViewModal"
                                        data-bs-toggle="modal">Quick View</button>
                                </div>
                            </div>
                            <div class="product-content">
                                <h5 class="sub-name productName">Beauty Essential</h5>
                                <a href="product-color.html" class="name">
                                    <h5>make-up Kit</h5>
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
                                <p class="product-details">This complete make-up kit includes everything you need for a
                                    flawless look. Featuring a variety of eyeshadows, lipsticks, and brushes in a
                                    compact case, it's perfect for travel or daily use. Dermatologically tested and
                                    suitable for all skin types.</p>
                                <h5 class="price">$125.00 <del>$354.00</del></h5>
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

                <div class="col">
                    <div class="product-box-4-main">
                        <div class="select-option-box">
                            <div class="select-box">
                                <div>
                                    <div class="color-box">
                                        <h4 class="h5">Colors</h4>
                                        <ul class="color-list">
                                            <li>
                                                <a href="#!" style="background-color: #5a6aa3;"></a>
                                            </li>
                                            <li>
                                                <a href="#!" style="background-color: #bf62a8;"></a>
                                            </li>
                                            <li>
                                                <a href="#!" style="background-color: #ef7a7a;"></a>
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
                                    <img src="../assets/images/product/117.png" class="img-fluid productImage" alt="">
                                </a>
                                <div class="quick-view-button-box">
                                    <button class="btn view-btn" data-bs-target="#quickViewModal"
                                        data-bs-toggle="modal">Quick View</button>
                                </div>
                            </div>
                            <div class="product-content">
                                <h5 class="sub-name productName">Woman Fashion</h5>
                                <a href="product-color.html" class="name">
                                    <h5>Brown Casual Wallet</h5>
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
                                <p class="product-details">This sophisticated brown leather handbag combines timeless
                                    style with practical functionality. Featuring a spacious main compartment with a
                                    secure zipper closure, it is accented by a contrasting beige trim and a long,
                                    adjustable strap for shoulder or crossbody wear.</p>
                                <h5 class="price">$789.00 <del>$987.00</del></h5>
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

                <div class="col">
                    <div class="product-box-4-main">
                        <div class="select-option-box">
                            <div class="select-box">
                                <div>
                                    <div class="color-box">
                                        <h4 class="h5">Colors</h4>
                                        <ul class="color-list">
                                            <li>
                                                <a href="#!" style="background-color: #5a6aa3;"></a>
                                            </li>
                                            <li>
                                                <a href="#!" style="background-color: #bf62a8;"></a>
                                            </li>
                                            <li>
                                                <a href="#!" style="background-color: #ef7a7a;"></a>
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
                                    <button class="close-btn btn">
                                        <i class="ri-close-line"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="product-box-4 pro-bg-white">
                            <div class="product-image">
                                <a href="product-color.html">
                                    <img src="../assets/images/product/107.png" class="img-fluid" alt="">
                                </a>
                                <div class="quick-view-button-box">
                                    <button class="btn view-btn">Quick View</button>
                                </div>
                            </div>
                            <div class="product-content">
                                <h5 class="sub-name">Rainbow Umbral</h5>
                                <a href="product-color.html" class="name">
                                    <h5>Cyanic Pop Burst Long</h5>
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
                                <p class="product-details">This is a beautifully crafted traditional paper
                                    parasol with a light blue canopy adorned with elegant pink floral designs.
                                    The frame and handle are made from natural bamboo, providing durability and
                                    an authentic touch. Perfect for cultural events, photography props, or as a
                                    stylish sunshade accessory.</p>

                                <h5 class="price">$120.00 <del>$135.00</del></h5>
                                <div class="option-box">
                                    <button class="btn select-btn">Select Options</button>
                                    <ul class="option-list">
                                        <li>
                                            <a href="#!">
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
     <!-- Product Filter Offcanvas Start -->
    <div class="offcanvas offcanvas-start product-filter-offcanvas" id="filterOffcanvas">
        <div class="offcanvas-header">
            <h4 class="offcanvas-title">Product Filter</h4>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <div class="left-box">
                <div class="shop-left-sidebar">
                    <div class="filter-category-2">
                        <div class="filter-title">
                            <h2>Filters</h2>
                            <a href="#!">Clear All</a>
                        </div>
                        <ul>
                            <li>
                                <a href="#!">T-Shirt</a>
                            </li>
                            <li>
                                <a href="#!">Rainwear</a>
                            </li>
                            <li>
                                <a href="#!">Jeans</a>
                            </li>
                            <li>
                                <a href="#!">Shorts</a>
                            </li>
                            <li>
                                <a href="#!">Shirts</a>
                            </li>
                        </ul>
                    </div>

                    <div class="accordion custom-accordion-2">
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

                                    <ul class="category-list custom-padding custom-height">
                                        <li>
                                            <div class="form-check category-list-box">
                                                <input class="checkbox_animated" type="checkbox" id="fruit">
                                                <label class="form-check-label" for="fruit">
                                                    <span class="name">T-Shirts & Polos</span>
                                                    <span class="number">(15)</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check category-list-box">
                                                <input class="checkbox_animated" type="checkbox" id="cake">
                                                <label class="form-check-label" for="cake">
                                                    <span class="name">Shirts</span>
                                                    <span class="number">(12)</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check category-list-box">
                                                <input class="checkbox_animated" type="checkbox" id="behe">
                                                <label class="form-check-label" for="behe">
                                                    <span class="name">Jeans</span>
                                                    <span class="number">(20)</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check category-list-box">
                                                <input class="checkbox_animated" type="checkbox" id="snacks">
                                                <label class="form-check-label" for="snacks">
                                                    <span class="name">Snacks & Branded Foods</span>
                                                    <span class="number">(05)</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check category-list-box">
                                                <input class="checkbox_animated" type="checkbox" id="beauty">
                                                <label class="form-check-label" for="beauty">
                                                    <span class="name">Suits & Blazers</span>
                                                    <span class="number">(30)</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check category-list-box">
                                                <input class="checkbox_animated" type="checkbox" id="pets">
                                                <label class="form-check-label" for="pets">
                                                    <span class="name">Shorts</span>
                                                    <span class="number">(50)</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check category-list-box">
                                                <input class="checkbox_animated" type="checkbox" id="egg">
                                                <label class="form-check-label" for="egg">
                                                    <span class="name">Rainwear</span>
                                                    <span class="number">(19)</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check category-list-box">
                                                <input class="checkbox_animated" type="checkbox" id="food">
                                                <label class="form-check-label" for="food">
                                                    <span class="name">Trousers</span>
                                                    <span class="number">(30)</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check category-list-box">
                                                <input class="checkbox_animated" type="checkbox" id="care">
                                                <label class="form-check-label" for="care">
                                                    <span class="name">Accessories</span>
                                                    <span class="number">(20)</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check category-list-box">
                                                <input class="checkbox_animated" type="checkbox" id="fish">
                                                <label class="form-check-label" for="fish">
                                                    <span class="name">Ethnic Wear</span>
                                                    <span class="number">(10)</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check category-list-box">
                                                <input class="checkbox_animated" type="checkbox" id="marinades">
                                                <label class="form-check-label" for="marinades">
                                                    <span class="name">Trousers</span>
                                                    <span class="number">(05)</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check category-list-box">
                                                <input class="checkbox_animated" type="checkbox" id="lamb">
                                                <label class="form-check-label" for="lamb">
                                                    <span class="name">Unstitched Fabric</span>
                                                    <span class="number">(09)</span>
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
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
                                                <input type="range" id="minRange" min="0" max="10000" value="1000"
                                                    step="100">
                                                <input type="range" id="maxRange" min="0" max="10000" value="9000"
                                                    step="100">
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

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseFour">
                                    <span>Color</span>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <ul class="color-box-list">
                                        <li>
                                            <button class="color-1 btn"></button>
                                        </li>
                                        <li>
                                            <button class="color-2 btn"></button>
                                        </li>
                                        <li>
                                            <button class="color-3 btn"></button>
                                        </li>
                                        <li>
                                            <button class="color-4 btn"></button>
                                        </li>
                                        <li>
                                            <button class="color-5 btn"></button>
                                        </li>
                                        <li>
                                            <button class="color-6 btn"></button>
                                        </li>
                                        <li>
                                            <button class="color-7 btn"></button>
                                        </li>
                                        <li>
                                            <button class="color-8 btn"></button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseFive">
                                    <span>Customer Review</span>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <ul class="category-list custom-padding">
                                        <li>
                                            <div class="form-check category-list-box">
                                                <input class="checkbox_animated" type="checkbox">
                                                <div class="form-check-label category-rating-box">
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
                                                    <span class="text-content">(31)</span>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="form-check category-list-box">
                                                <input class="checkbox_animated" type="checkbox">
                                                <div class="form-check-label category-rating-box">
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
                                                    <span class="text-content">(15)</span>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="form-check category-list-box">
                                                <input class="checkbox_animated" type="checkbox">
                                                <div class="form-check-label category-rating-box">
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
                                                    <span class="text-content">(24)</span>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="form-check category-list-box">
                                                <input class="checkbox_animated" type="checkbox">
                                                <div class="form-check-label category-rating-box">
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
                                                    <span class="text-content">(10)</span>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="form-check category-list-box">
                                                <input class="checkbox_animated" type="checkbox">
                                                <div class="form-check-label category-rating-box">
                                                    <ul class="rating">
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
                                                        <li>
                                                            <i class="ri-star-fill"></i>
                                                        </li>
                                                    </ul>
                                                    <span class="text-content">(08)</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseSix">
                                    <span>Discount</span>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <ul class="category-list custom-padding">
                                        <li>
                                            <div class="form-check category-list-box">
                                                <input class="checkbox_animated" type="checkbox" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <span class="name">upto 5%</span>
                                                    <span class="number">(06)</span>
                                                </label>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="form-check category-list-box">
                                                <input class="checkbox_animated" type="checkbox" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    <span class="name">5% - 10%</span>
                                                    <span class="number">(08)</span>
                                                </label>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="form-check category-list-box">
                                                <input class="checkbox_animated" type="checkbox" id="flexCheckDefault2">
                                                <label class="form-check-label" for="flexCheckDefault2">
                                                    <span class="name">10% - 15%</span>
                                                    <span class="number">(10)</span>
                                                </label>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="form-check category-list-box">
                                                <input class="checkbox_animated" type="checkbox" id="flexCheckDefault3">
                                                <label class="form-check-label" for="flexCheckDefault3">
                                                    <span class="name">15% - 25%</span>
                                                    <span class="number">(14)</span>
                                                </label>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="form-check category-list-box">
                                                <input class="checkbox_animated" type="checkbox" id="flexCheckDefault4">
                                                <label class="form-check-label" for="flexCheckDefault4">
                                                    <span class="name">More than 25%</span>
                                                    <span class="number">(13)</span>
                                                </label>
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
    <!-- Product Filter Offcanvas End -->



   <?php include 'footer.php'; ?>
