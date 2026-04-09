<?php include 'header.php'; ?>
<!-- ========== Topbar End ========== -->
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <h4>Profile</h4>


                    <ol class="breadcrumb d-lg-flex d-none mb-0">
                        <li class="breadcrumb-item"><a href="index">Home</a></li>

                        <li class="breadcrumb-item"><a href="#">Profile</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <!-- start page title -->

        <div class="row">
            <div class="col-12">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <!-- <div>
                                        <img src="assets/small-6-cd90fef9.png" alt="" width="100%" height="400"
                                            class="object-fit-cover rounded">
                                    </div> -->

                        <div class="w-100">
                            <div class="d-flex justify-content-between mb-4 ms-2">
                                <div>
                                    <img src="data:image/jpeg;base64,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"
                                        alt="" width="150" class="img-thumbnail rounded-circle">
                                </div>

                            </div>

                            <div class="d-flex justify-content-between w-100">
                                <div>
                                    <h3 class="mb-2 mt-0">Daniel R. Moulton</h3>
                                    <p class="mb-0 font-16">Authorised Brand Seller</p>
                                    <p class="font-16 mb-4">New York, United States</p>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">SELLER INFORMATION</h5>
                                    <P class="mb-3 d-none d-md-block">Hi! I am a good Authorised Brand Seller , always
                                        willing to learn new skills. I am friendly, helpful and polite, have a good
                                        sense of humour. I am able to work independently in busy environments and also
                                        within a team setting. I am outgoing and tactful, and able to listen effectively
                                        when solving problems.
                                        I am a punctual and motivated individual who is able to work in a busy
                                        environment and produce high standards of work. I am an excellent team worker
                                        and am able to take instructions from all levels and build up good working
                                        relationships with all colleagues. I am flexible, reliable and possess excellent
                                        time keeping skills.
                                    </P>

                                    <ul class="list-unstyled">
                                        <li class="mb-2"><b>Full Name : </b><span class="ms-1 text-muted">Daniel R.
                                                Moulton </span></li>
                                        <li class="mb-2"><b>Mobile :</b> <span class="ms-1 text-muted">(+45) 23 323
                                                343544 </span></li>
                                        <li class="mb-2"><b>Email :</b> <a href="#"
                                                class="ms-1 text-muted">DanielRMoulton@armyspy.com </a></li>
                                        <li class="mb-2"><b>Location : </b><span class="ms-1 text-muted">United
                                                Stat</span></li>
                                        <li class="mb-2"><b>Languages :</b> <span class="ms-1 text-muted"> English ,
                                                Spanish , French</span></li>
                                    </ul>

                                </div>
                            </div>  -->

                <div class="card">
                    <div class="card-body">
                        <div class="profile-content">
                            <ul class="nav nav-pills bg-light nav-justified gap-0 mb-4 overflow-hidden rounded"
                                role="tablist">
                                <li class="nav-item" role="presentation"><a class="nav-link rounded-0 active"
                                        data-bs-toggle="tab" data-bs-target="#aboutme" type="button" role="tab"
                                        aria-controls="home" aria-selected="true" href="#aboutme">Personal Detail</a>
                                </li>
                                <li class="nav-item" role="presentation"><a class="nav-link rounded-0"
                                        data-bs-toggle="tab" data-bs-target="#businessdetail" type="button" role="tab"
                                        aria-controls="home" aria-selected="false" href="#edit-profile"
                                        tabindex="-1">Business Detail</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link rounded-0"
                                        data-bs-toggle="tab" data-bs-target="#projects" type="button" role="tab"
                                        aria-controls="home" aria-selected="false" href="#projects" tabindex="-1">Bank
                                        Detail</a></li>
                            </ul>

                            <div class="tab-content m-0">
                                <div class="tab-pane active" id="aboutme" role="tabpanel" aria-labelledby="home-tab"
                                    tabindex="0">
                                    <div class="profile-desk">




                                        <h5 class="mt-4 fs-17 text-dark">Personal Information</h5>
                                        <table class="table table-sm mb-0 border-top">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Name</th>
                                                    <td>
                                                        <a href="#" class="ng-binding">
                                                            example
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Email</th>
                                                    <td>
                                                        <a href="#" class="ng-binding">
                                                            jonathandeo@example.com
                                                        </a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">Phone</th>
                                                    <td class="ng-binding">(123)-456-7890</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Country</th>
                                                    <td>
                                                        <a href="#" class="ng-binding">
                                                            India
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">State</th>
                                                    <td>
                                                        <a href="#" class="ng-binding">
                                                            UP
                                                        </a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">City</th>
                                                    <td>
                                                        <a href="#" class="ng-binding">
                                                            Noida
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Pincode</th>
                                                    <td>
                                                        <a href="#" class="ng-binding">
                                                            201301
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Address</th>
                                                    <td>
                                                        <a href="#" class="ng-binding">
                                                            Noida Sector 62
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- end profile-desk -->
                                </div>



                                <div id="businessdetail" class="tab-pane" role="tabpanel">
                                    <div class="row m-t-10">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                               <table class="table table-sm mb-0 border-top">
    <tbody>
        <tr><th>Business Name</th><td id="businessName"></td></tr>
        <tr><th>Business Type</th><td id="businessType"></td></tr>
        <tr><th>Business Category</th><td id="businessCategory"></td></tr>
        <tr><th>Business Description</th><td id="businessDescription"></td></tr>
        <tr><th>GST Number</th><td id="gstNumber"></td></tr>
        <tr><th>PAN Number</th><td id="panNumber"></td></tr>
        <tr><th>CIN Number</th><td id="cinNumber"></td></tr>
        <tr><th>Udyam Registration Number</th><td id="udyamNumber"></td></tr>
        <tr><th>Address Line 1</th><td id="addressLine1"></td></tr>
        <tr><th>Address Line 2</th><td id="addressLine2"></td></tr>
        <tr><th>City</th><td id="city"></td></tr>
        <tr><th>State</th><td id="state"></td></tr>
        <tr><th>Country</th><td id="country"></td></tr>
        <tr><th>Pin Code</th><td id="pincode"></td></tr>
        <tr><th>Business Email</th><td id="businessEmail"></td></tr>
        <tr><th>Business Phone</th><td id="businessPhone"></td></tr>
        <tr><th>Alternate Phone</th><td id="alternatePhone"></td></tr>
        <tr><th>Website Url</th><td id="websiteUrl"></td></tr>
        <tr><th>GST Document Url</th><td id="gstDoc"></td></tr>
        <tr><th>PAN Document Url</th><td id="panDoc"></td></tr>
        <tr><th>CIN Certificate Url</th><td id="cinDoc"></td></tr>
        <tr><th>Business Logo Url</th><td id="logoUrl"></td></tr>
        <tr><th>Verified</th><td id="isVerified"></td></tr>
        <tr><th>Status</th><td id="isActive"></td></tr>
    </tbody>
</table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- profile -->
                                <div id="projects" class="tab-pane" role="tabpanel">
                                    <div class="row m-t-10">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <h5 class=" fs-17 text-dark">Bank Details</h5>

                                                <table class="table table-sm mb-0 border-top">
                                                    <table class="table table-sm mb-0 border-top">
                                                        <tbody>
                                                            <tr>
                                                                <th>Account Holder Name</th>
                                                                <td id="accHolder"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Bank Name</th>
                                                                <td id="bankName"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Account Number</th>
                                                                <td id="accNumber"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Branch</th>
                                                                <td id="country"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Confirm Account Number</th>
                                                                <td id="confirmAccNumber"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>IFSC Code</th>
                                                                <td id="ifsc"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Cancel Check</th>
                                                                <td id="cancelCheck"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card body -->
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container -->

</div> <!-- content -->


<?php include 'footer.php'; ?>