<?php include 'header.php'; ?>
<!-- ========== Topbar End ========== -->
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <h4>Add Coupon </h4>


                    <ol class="breadcrumb d-lg-flex d-none mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">TechUI</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>

                        <li class="breadcrumb-item"><a href="javascript: void(0);"> Add Coupon </a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-1">Details</h4>
                        <p class="mb-0 text-muted">Title, short description, image...</p>
                    </div>
                    <div class="card-body">

                       <form action="#" id="addCouponForm">

  <!-- Coupon Code -->
  <div class="mb-3">
    <label class="form-label" for="couponCode">Coupon Code</label>
    <input type="text" class="form-control" id="couponCode" name="couponCode" placeholder="Coupon Code">
  </div>

  <!-- Coupon Type -->
  <div class="mb-3">
    <label class="form-label" for="couponType">Coupon Type</label>
    <select class="form-select" id="couponType" name="couponType">
      <option value="" selected disabled>Select Type</option>
      <option value="percentage">Percentage (%)</option>
      <option value="fixed">Fixed Amount (₹)</option>
    </select>
  </div>

  <!-- Coupon Value -->
  <div class="mb-3">
    <label class="form-label" for="couponValue">Value</label>
    <input type="number" class="form-control" id="couponValue" name="couponValue" placeholder="Enter value">
  </div>

</form>



                    </div>

                </div>
            </div>
            <div class="d-flex justify-content-end mb-3">
                <!-- IMPORTANT: type="button" -->
                <button type="button" class="btn btn-dark" id="addCouponBtn">
                    Add Coupon
                </button>
            </div>



        </div><!-- end row -->
    </div> <!-- container -->

</div> <!-- content -->


<?php include 'footer.php'; ?>