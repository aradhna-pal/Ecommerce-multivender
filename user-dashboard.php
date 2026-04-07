<?php include 'header.php'; ?>


    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section">
        <div class="custom-container">
            <div class="breadcrumb-contain">
                <h2>User Dashboard</h2>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="index">
                                <i class="ri-home-3-fill"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">User Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- User Dashboard Section Start -->
    <section class="user-dashboard-section section-t-space section-b-space">
        <div class="custom-container">
            <div class="row">
                <div class="col-xxl-3 col-lg-4">
                    <div class="dashboard-left-sidebar">
                        <button class="sidebar-close d-flex d-lg-none">
                            <i class="ri-close-line"></i>
                        </button>
                        <div class="profile-box">
                            <div class="profile-contain">
                                <!-- <div class="profile-image">
                                    <img src="../assets/images/review/1.jpg" class="img-fluid update_img" alt="" id="userProfileImage">
                                </div> -->

                                <div class="profile-name">
                                    <h3 id="userFullName"></h3>
                                    <h4 id="userEmail" class="text-content"></h4>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-pills user-nav-pills" id="pills-tab">
                            <li class="nav-item">
                                <button class="nav-link active" id="pills-dashboard-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-dashboard" type="button"><i class="ri-home-2-line"></i>
                                    Dashboard</button>

                                    
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="pills-order-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-order" type="button"><i
                                        class="ri-shopping-basket-line"></i>Order</button>
                            </li>
                            <!-- <li class="nav-item">
                                <button class="nav-link" id="pills-card-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-card" type="button"><i class="ri-bank-card-line"></i> Saved
                                    Card</button>
                            </li> -->
                            <li class="nav-item">
                                <button class="nav-link" id="pills-address-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-address" type="button"><i
                                        class="ri-map-pin-line"></i>Address</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button"><i class="ri-user-3-line"></i>
                                    Profile</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="pills-security-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-security" type="button"><i
                                        class="ri-shield-line"></i>Privacy</button>
                            </li>
                        </ul>
                        <div class="logout-box">
                            <button class="nav-link logout-btn theme-bg-color text-light" logout-nav><i
                                    class="ri-logout-box-line"></i>Log Out</button>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-9 col-lg-8">
                    <button class="btn left-dashboard-show btn-bg-theme btn-md mb-4 d-lg-none">Show Menu</button>
                    <div class="tab-content dashboard-right-sidebar" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="pills-dashboard">
                            <div class="dashboard-home dashboard-bg-box">
                                <div class="title d-block">
                                    <h3 id="welcomeUserName"></h3>
                                    <p class="mt-2 fw-normal">From your My Account Dashboard you have the ability to
                                        view a snapshot of your recent account activity and update your account
                                        information. Select a link below to view or edit information.</p>
                                </div>

                                <ul class="dashboard-setting">
                                    <li data-class="pills-order">
                                        <a href="#!" class="personal-detail">
                                            <svg>
                                                <use
                                                    xlink:href="https://themes.pixelstrap.net/kartify/assets/images/inner-page/user-dashboard/home.svg#order">
                                                </use>
                                            </svg>
                                            
                                            <h4>Orders</h4>
                                            <p>Verify the status of your order.</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="wishlist.html" class="personal-detail">
                                            <svg>
                                                <use
                                                    xlink:href="https://themes.pixelstrap.net/kartify/assets/images/inner-page/user-dashboard/home.svg#wishlist">
                                                </use>
                                            </svg>
                                            <h4>Wishlist</h4>
                                            <p>Every one of your carefully chosen product assortments</p>
                                        </a>
                                    </li>
                                    <!-- <li data-class="pills-card">
                                        <a href="#!" class="personal-detail">
                                            <svg>
                                                <use
                                                    xlink:href="https://themes.pixelstrap.net/kartify/assets/images/inner-page/user-dashboard/home.svg#saveCard">
                                                </use>
                                            </svg>
                                            <h4>Saved Card</h4>
                                            <p>Keep your credit cards handy for a quicker checkout.</p>
                                        </a>
                                    </li> -->
                                    <li data-class="pills-address">
                                        <a href="#!" class="personal-detail">
                                            <svg>
                                                <use
                                                    xlink:href="https://themes.pixelstrap.net/kartify/assets/images/inner-page/user-dashboard/home.svg#address">
                                                </use>
                                            </svg>
                                            <h4>Address</h4>
                                            <p>Keep track of addresses for a smooth checkout</p>
                                        </a>
                                    </li>
                                    <li data-class="pills-profile">
                                        <a href="#!" class="personal-detail">
                                            <svg>
                                                <use
                                                    xlink:href="https://themes.pixelstrap.net/kartify/assets/images/inner-page/user-dashboard/home.svg#profile">
                                                </use>
                                            </svg>
                                            <h4>Profile</h4>
                                            <p>Modify the information on your profile.</p>
                                        </a>
                                    </li>
                                    <li data-class="pills-security">
                                        <a href="#!" class="personal-detail">
                                            <svg>
                                                <use
                                                    xlink:href="https://themes.pixelstrap.net/kartify/assets/images/inner-page/user-dashboard/home.svg#privacy">
                                                </use>
                                            </svg>
                                            <h4>Privacy</h4>
                                            <p>Check your order status</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-order">
                            <div class="dashboard-order dashboard-bg-box">
                                <div class="title d-block">
                                    <h3>My Orders History</h3>
                                    <p class="mt-2 fw-normal">Check the status of your orders, manage returns, and
                                        discover similar products. You can view your order history and details below.
                                    </p>
                                </div>

                                <div class="order-contain">
                                    <div class="table-responsive dashboard-order-table">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Product name</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Payment</th>
                                                    <th>Price</th>
                                                    <th>Track Order</th>
                                                </tr>
                                            </thead>
                                            <tbody id="order-table-body">
                                                <tr>
                                                    <td>#366947</td>
                                                    <td>
                                                        <a href="product-circle.html">Apple iPhone 14 (128
                                                            GB) - Purple</a>
                                                    </td>
                                                    <td>30 Sep 2025</td>
                                                    <td>
                                                        <span class="status-success">Completed</span>
                                                    </td>
                                                    <td>COD</td>
                                                    <td>$2.54</td>
                                                </tr>
                                                <tr>
                                                    <td>#758364</td>
                                                    <td>
                                                        <a href="product-circle.html">Apple Watch Series
                                                            3</a>
                                                    </td>
                                                    <td>15 Jun 2025</td>
                                                    <td>
                                                        <span class="status-process">Processing</span>
                                                    </td>
                                                    <td>COD</td>
                                                    <td>$24.36</td>
                                                </tr>
                                                <tr>
                                                    <td>#758854</td>
                                                    <td>
                                                        <a href="product-circle.html">Slim 3 Intel Core
                                                            i5</a>
                                                    </td>
                                                    <td>17 Feb 2025</td>
                                                    <td>
                                                        <span class="status-cancel">Canceled</span>
                                                    </td>
                                                    <td>COD</td>
                                                    <td>$24.15</td>
                                                </tr>
                                                <tr>
                                                    <td>#357412</td>
                                                    <td>
                                                        <a href="product-circle.html">Apple Watch Series
                                                            3</a>
                                                    </td>
                                                    <td>30 Jan 2025</td>
                                                    <td>
                                                        <span class="status-cancel">Canceled</span>
                                                    </td>
                                                    <td>BT</td>
                                                    <td>$52.36</td>
                                                </tr>
                                                <tr>
                                                    <td>#425235</td>
                                                    <td>
                                                        <a href="product-circle.html">Kitchen
                                                            Accessories</a>
                                                    </td>
                                                    <td>15 Jan 2025</td>
                                                    <td>
                                                        <span class="status-cancel">Canceled</span>
                                                    </td>
                                                    <td>BT</td>
                                                    <td>$48.24</td>
                                                </tr>
                                                <tr>
                                                    <td>#786414</td>
                                                    <td>
                                                        <a href="product-circle.html">Rockerz 558
                                                            Bluetooth</a>
                                                    </td>
                                                    <td>8 Jan 2025</td>
                                                    <td>
                                                        <span class="status-process">Processing</span>
                                                    </td>
                                                    <td>CC</td>
                                                    <td>$69.36</td>
                                                </tr>
                                                <tr>
                                                    <td>#968574</td>
                                                    <td>
                                                        <a href="product-circle.html">Motorola Moto X4 32GB
                                                            Unlocked Smartphone</a>
                                                    </td>
                                                    <td>15 Dec 2025</td>
                                                    <td>
                                                        <span class="status-success">Completed</span>
                                                    </td>
                                                    <td>CC</td>
                                                    <td>$47.58</td>
                                                </tr>
                                                <tr>
                                                    <td>#142536</td>
                                                    <td>
                                                        <a href="product-circle.html">EvoFox Game Box 32 GB
                                                            with Asphalt 8</a>
                                                    </td>
                                                    <td>22 Dec 2025</td>
                                                    <td>
                                                        <span class="status-process">Processing</span>
                                                    </td>
                                                    <td>BT</td>
                                                    <td>$68.35</td>
                                                </tr>
                                                <tr>
                                                    <td>#486246</td>
                                                    <td>
                                                        <a href="product-circle.html">Canon EOS 1500D DSLR
                                                            Camera Body+ 18-55 mm</a>
                                                    </td>
                                                    <td>5 Nov 2025</td>
                                                    <td>
                                                        <span class="status-success">Completed</span>
                                                    </td>
                                                    <td>COD</td>
                                                    <td>$49.16</td>
                                                </tr>
                                                <tr>
                                                    <td>#537535</td>
                                                    <td>
                                                        <a href="product-circle.html">BlackBerry Keyone
                                                            BBB100-7 64gb unlocked gSM</a>
                                                    </td>
                                                    <td>30 Sep 2025</td>
                                                    <td>
                                                        <span class="status-cancel">Canceled</span>
                                                    </td>
                                                    <td>BT</td>
                                                    <td>$50.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-address">
                            <div class="dashboard-address dashboard-bg-box">
                                <div class="title address-title dashboard-title justify-content-between flex-wrap">
                                    <h3>My Address Book</h3>
                                    <!-- <button class="btn theme-bg-color text-white">
                                        <i class="ri-add-line"></i>Add New Address</button> -->
                                </div>

                                <div class="row g-sm-4 g-3" id="addressContainer">
                                    <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6">
                                        <div class="address-box">
                                            <div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jack"
                                                        id="flexRadioDefault2" checked>
                                                </div>

                                                <div class="label">
                                                    <label>Home</label>
                                                </div>

                                                <div class="table-responsive address-table">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="3">Cameron Williamson</td>
                                                            </tr>

                                                            <tr>
                                                                <td>Address</td>
                                                                <td>:</td>
                                                                <td>
                                                                    <p>8424 James Lane South San Francisco, CA 94080
                                                                    </p>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>Pin Code</td>
                                                                <td>:</td>
                                                                <td>+380</td>
                                                            </tr>

                                                            <tr>
                                                                <td>Phone</td>
                                                                <td>:</td>
                                                                <td>+1 202-555-0123</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="button-group">
                                                <button class="btn btn-sm add-button w-100"><i
                                                        class="ri-edit-box-line"></i>Edit</button>
                                                <button class="btn btn-sm add-button w-100"><i
                                                        class="ri-delete-bin-5-line"></i>Remove</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6">
                                        <div class="address-box">
                                            <div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jack"
                                                        id="flexRadioDefault3">
                                                </div>

                                                <div class="label">
                                                    <label>Office</label>
                                                </div>

                                                <div class="table-responsive address-table">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="3">Kathryn E. Willingham</td>
                                                            </tr>

                                                            <tr>
                                                                <td>Address</td>
                                                                <td>:</td>
                                                                <td>
                                                                    <p>2072 Romrog Way Cheyenne, WY 82007</p>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>Pin Code</td>
                                                                <td>:</td>
                                                                <td>+36</td>
                                                            </tr>

                                                            <tr>
                                                                <td>Phone</td>
                                                                <td>:</td>
                                                                <td>+ 365-799-8564</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="button-group">
                                                <button class="btn btn-sm add-button w-100"><i
                                                        class="ri-edit-box-line"></i>Edit</button>
                                                <button class="btn btn-sm add-button w-100"><i
                                                        class="ri-delete-bin-5-line"></i>Remove</button>
                                            </div>
                                        </div>
                                    </div>

                                  
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-card">
                            <div class="dashboard-card dashboard-bg-box">
                                <div class="title card-title justify-content-between">
                                    <h3>My Card Details</h3>
                                    <button class="btn theme-bg-color text-white">
                                        <i class="me-1 ri-add-line"></i>
                                        Add New Card</button>
                                </div>

                                <div class="row g-4">
                                    <div class="col-xxl-4 col-xl-6 col-lg-12 col-sm-6">
                                        <div class="payment-card-detail">
                                            <div class="card-details">
                                                <div class="top-box">
                                                    <img src="../assets/images/inner-page/user-dashboard/chip.png"
                                                        class="img-fluid card-chip" alt="">
                                                    <div class="bank-name">
                                                        <img src="../assets/images/inner-page/bank/3.png"
                                                            class="img-fluid bank-img" alt="">
                                                        <span>Marshall</span>
                                                    </div>
                                                </div>
                                                <div class="card-number">
                                                    <h4>25## - #### - #### - ##48</h4>
                                                </div>

                                                <div class="name-detail">
                                                    <div class="name">
                                                        <h5>Card Holder</h5>
                                                        <h6>Cameron Williamson</h6>
                                                    </div>
                                                    <div class="name">
                                                        <h5>Expires</h5>
                                                        <h6>03/2030</h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="edit-card">
                                                <button class="btn"><i class="ri-edit-box-line"></i>edit</button>
                                                <button class="btn" data-bs-target="#deleteCard"
                                                    data-bs-toggle="modal"><i class="ri-delete-bin-5-line"></i>
                                                    delete</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xxl-4 col-xl-6 col-lg-12 col-sm-6">
                                        <div class="payment-card-detail">
                                            <div class="card-details card-visa">
                                                <div class="top-box">
                                                    <img src="../assets/images/inner-page/user-dashboard/chip.png"
                                                        class="img-fluid card-chip" alt="">
                                                    <div class="bank-name">
                                                        <img src="../assets/images/inner-page/bank/2.png"
                                                            class="img-fluid bank-img" alt="">
                                                        <span>Summerlin</span>
                                                    </div>
                                                </div>
                                                <div class="card-number">
                                                    <h4>69## - #### - #### - ##96</h4>
                                                </div>

                                                <div class="name-detail">
                                                    <div class="name">
                                                        <h5>Card Holder</h5>
                                                        <h6>Itzayana Norman</h6>
                                                    </div>
                                                    <div class="name">
                                                        <h5>Expires</h5>
                                                        <h6>10/2033</h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="edit-card">
                                                <button class="btn"><i class="ri-edit-box-line"></i>edit</button>
                                                <button class="btn" data-bs-target="#deleteCard"
                                                    data-bs-toggle="modal"><i class="ri-delete-bin-5-line"></i>
                                                    delete</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xxl-4 col-xl-6 col-lg-12 col-sm-6">
                                        <div class="payment-card-detail">
                                            <div class="card-details debit-card">
                                                <div class="top-box">
                                                    <img src="../assets/images/inner-page/user-dashboard/chip.png"
                                                        class="img-fluid card-chip" alt="">
                                                    <div class="bank-name">
                                                        <img src="../assets/images/inner-page/bank/1.png"
                                                            class="img-fluid bank-img" alt="">
                                                        <span>Auburn</span>
                                                    </div>
                                                </div>
                                                <div class="card-number">
                                                    <h4>15## - #### - #### - ##75</h4>
                                                </div>

                                                <div class="name-detail">
                                                    <div class="name">
                                                        <h5>Card Holder</h5>
                                                        <h6>Fatima Aguirre</h6>
                                                    </div>
                                                    <div class="name">
                                                        <h5>Expires</h5>
                                                        <h6>09/2028</h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="edit-card">
                                                <button class="btn"><i class="ri-edit-box-line"></i>edit</button>
                                                <button class="btn" data-bs-target="#deleteCard"
                                                    data-bs-toggle="modal"><i class="ri-delete-bin-5-line"></i>
                                                    delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-profile">
                            <div class="dashboard-profile dashboard-bg-box">
                                <div class="title">
                                    <h3>Account Setting</h3>
                                </div>

                                <div class="profile-title">
                                    <h4>Profile Picture</h4>
                                </div>

                                <div class="profile-box">
                                    <div class="profile-image">
                                        <div class="profile-icon">
                                            <input id="file" type="file" onchange="loadFile(event)">
                                            <i class="ri-edit-2-line"></i>
                                        </div>
                                        <img src="../assets/images/review/1.jpg" class="img-fluid" id="output" alt="">
                                    </div>
                                    <div class="profile-content">
                                        <h4 class="notifi-wishlist">Your Picture</h4>
                                        <h5>Maximum 4 MB for allowed files: *.jpeg, *.jpg, *.png, *.gif</h5>
                                    </div>
                                </div>

                                <form class="profile-form">
                                    <div class="profile-title">
                                        <h4>Account Information</h4>
                                    </div>
                                    <div class="row g-sm-4 g-3">
                                        <div class="col-sm-6">
                                            <div class="theme-form">
                                                <label for="fname" class="form-label">First Name</label>
                                                <input placeholder="Enter First Name" value="Cameron" type="text"
                                                    class="form-control" id="fname">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="theme-form">
                                                <label for="lname" class="form-label">Last Name</label>
                                                <input placeholder="Enter Last Name" value="Williamson" type="text"
                                                    class="form-control" id="lname">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="theme-form">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="tel" class="form-control" id="phone" value="+359-654-3248">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="theme-form">
                                                <label for="date" class="form-label">Birthday</label>
                                                <input type="date" class="form-control" id="date">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="theme-form">
                                                <label for="address" class="form-label">Address Line</label>
                                                <textarea class="form-control" id="address"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-6 col-md-3 col-sm-6">
                                            <div class="theme-form">
                                                <label for="exampleInputPassword1" class="form-label">Country</label>
                                                <select class="form-select">
                                                    <option selected disabled>Choose...</option>
                                                    <option value="1">India</option>
                                                    <option value="2">Australia</option>
                                                    <option value="3">Canada</option>
                                                    <option value="4">United Kingdom</option>
                                                    <option value="5">Bangkok</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-6 col-md-3 col-sm-6">
                                            <div class="theme-form">
                                                <label for="exampleInputPassword1" class="form-label">State /
                                                    Region</label>
                                                <select class="form-select">
                                                    <option selected disabled>Choose...</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Gujarat</option>
                                                    <option value="3">Rajasthan</option>
                                                    <option value="4">Delhi</option>
                                                    <option value="5">Mumbai</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-6 col-md-3 col-sm-6">
                                            <div class="theme-form">
                                                <label for="exampleInputPassword1" class="form-label">State</label>
                                                <select class="form-select">
                                                    <option selected disabled>Choose...</option>
                                                    <option value="1">Ahmadabad</option>
                                                    <option value="2">Vapi</option>
                                                    <option value="3">Surat</option>
                                                    <option value="4">Vadodara</option>
                                                    <option value="5">Kingdom</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-6 col-md-3 col-sm-6">
                                            <div class="theme-form">
                                                <label for="exampleInputPassword1" class="form-label">Zip/Code</label>
                                                <input type="number" class="form-control" id="exampleInputPassword1">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="from-button-group d-flex gap-sm-3 gap-2 justify-content-end">
                                                <button type="submit"
                                                    class="btn d-inline-block theme-bg-color text-light rounded-2">Save
                                                    Changes</button>
                                                <button type="submit"
                                                    class="btn d-inline-block theme-bg-color text-light rounded-2">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-security">
                            <div class="dashboard-privacy dashboard-bg-box">
                                <div class="profile-title">
                                    <h4>Email Address</h4>
                                    <p>Modify the e-mail associated with your account. Your account is currently
                                        <a
                                            href="mailto:cameron.williamson@example.com">cameron.williamson@example.com</a>
                                    </p>
                                </div>

                                <form class="profile-form">
                                    <div class="row g-sm-4 g-3">
                                        <div class="col-12">
                                            <div class="theme-form custom-width">
                                                <label for="email" class="form-label">New Email Address</label>
                                                <input placeholder="blocktheme@example.com" type="email"
                                                    class="form-control" id="email">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="from-button-group d-flex gap-sm-3 gap-2">
                                                <button type="submit"
                                                    class="btn d-inline-block theme-bg-color text-light rounded-2">Save
                                                    Changes</button>
                                                <button type="submit"
                                                    class="btn d-inline-block gray-bg-color rounded-2">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="dashboard-privacy dashboard-bg-box">
                                <div class="profile-title">
                                    <h4>Change Password</h4>
                                    <p>When you change your password, we will send you an email to confirm, so
                                        please watch for that email after submitting.</p>
                                </div>

                                <form class="profile-form">
                                    <div class="row g-sm-4 g-3">
                                        <div class="col-12">
                                            <div class="theme-form custom-width">
                                                <label for="pass" class="form-label">Old Password</label>
                                                <input placeholder="Enter Old Password" type="password"
                                                    class="form-control" id="pass">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="theme-form custom-width">
                                                <label for="pass1" class="form-label">New Password</label>
                                                <input placeholder="Enter New Password" type="password"
                                                    class="form-control" id="pass1">
                                                <span class="suggestion-text">Verify that there are at least 15
                                                    characters OR that there are at least 8 characters, including a
                                                    lowercase letter and a number.</span>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="theme-form custom-width">
                                                <label for="pass2" class="form-label">Confirm New Password</label>
                                                <input placeholder="Enter New Password" type="password"
                                                    class="form-control" id="pass2">
                                                <span class="suggestion-text">Make sure the new password above
                                                    corresponds with it.</span>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="from-button-group d-flex gap-sm-3 gap-2">
                                                <button type="submit"
                                                    class="btn d-inline-block theme-bg-color text-light rounded-2">Save
                                                    Changes</button>
                                                <button type="submit"
                                                    class="btn d-inline-block gray-bg-color rounded-2">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="dashboard-bg-box delete-account-box">
                                <div class="profile-title">
                                    <h4>Danger Zone</h4>
                                    <p>Deleting your account will</p>
                                </div>

                                <ul class="delete-detail-link">
                                    <li>Delete your profile and all of your authentication associations permanently.
                                    </li>
                                    <li>Delete anything you have ever written, including articles, bookmarks, comments,
                                        and more, permanently.</li>
                                    <li>Let anyone to be able to access your username.</li>
                                </ul>

                                <ul class="delete-detail-link mt-3 gap-0 p-0">
                                    <li class="d-inline-block">Important: There is no way to undo the deletion of your
                                        account. Please get in touch.</li>
                                    <li class="d-inline-block"> Send inquiries to <a href="#!"
                                            class="d-inline-block text-danger">support@blockthemeexample.com.</a></li>
                                </ul>

                                <button class="btn btn-danger mt-3 rounded-2" data-bs-toggle="modal"
                                    data-bs-target="#delete-account">Delete Account</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- User Dashboard Section End -->

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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let user = null;
            const userDataStr = localStorage.getItem("userData");
            if (userDataStr) {
                try {
                    user = JSON.parse(userDataStr);
                } catch(e) {}
            }
            
            const token = localStorage.getItem('userToken');
            if (!user && token) {
                try {
                    const base64Url = token.split('.')[1];
                    const base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
                    const jsonPayload = decodeURIComponent(window.atob(base64).split('').map(function(c) {
                        return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
                    }).join(''));
                    user = JSON.parse(jsonPayload);
                } catch (e) {
                    console.error("Could not parse token");
                }
            }

            if (user) {
                const firstName = user.firstname || user.firstName || user.name || "User";
                const lastName = user.lastname || user.lastName || "";
                const fullName = (firstName + " " + lastName).trim();
                const email = user.email || "";
                
                const userFullNameEl = document.getElementById("userFullName");
                const userEmailEl = document.getElementById("userEmail");
                const welcomeUserNameEl = document.getElementById("welcomeUserName");
                
                if (userFullNameEl) userFullNameEl.textContent = fullName;
                if (userEmailEl) userEmailEl.textContent = email;
                if (welcomeUserNameEl) welcomeUserNameEl.textContent = "Welcome Back, " + fullName;

                const profileImg = user.image || user.profileImage || user.profilePic || user.avatar;
                const userProfileImageEl = document.getElementById("userProfileImage");
                if (userProfileImageEl && profileImg && profileImg.trim() !== "") {
                    if(profileImg.startsWith('http')) {
                        userProfileImageEl.src = profileImg;
                    } else if (profileImg.startsWith('/')) {
                        userProfileImageEl.src = 'https://api.workarya.com' + profileImg;
                    } else {
                        userProfileImageEl.src = 'https://api.workarya.com/' + profileImg;
                    }
                }
            }
        });
    </script>

    <?php include 'footer.php'; ?>
