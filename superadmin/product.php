<?php include 'header.php'; ?>
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <h4>Product</h4>


                    <ol class="breadcrumb d-lg-flex d-none mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">TechUI</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>

                        <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-5">
                                <a href="product-create.php" class="btn btn-dark"><i
                                        class="mdi mdi-plus-circle me-2"></i> Add Products</a>
                            </div>
                            <div class="col-sm-7">
                                <div class="text-sm-end">
                                    <button type="button" class="btn btn-success me-1"><i
                                            class="mdi mdi-cog-outline"></i></button>
                                    <button type="button" class="btn btn-light me-1">Import</button>
                                    <button type="button" class="btn btn-light">Export</button>
                                </div>
                            </div><!-- end col-->
                        </div>
                    </div><!-- end card-body-->

                    <div class="table-responsive">
                        <table class="table table-centered w-100 nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th >
                                        S.No
                                    </th>
                                    <th >Product</th>
                                    <th >Short Description</th>
                                    <th >Description</th>
                                    <th >Category</th>
                                    <th>Brand</th>
                                    <th>Discount Price</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th >Edit</th>
                                    <th >Delete</th>
                                </tr>
                            </thead>
                            <tbody id="allproduct">
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customCheck2">
                                            <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="assets/product-1-eec07e95.jpg" alt="contact-img" title="contact-img"
                                            class="rounded me-3" height="48" />
                                        <p class="m-0 d-inline-block align-middle font-16">
                                            <a href="products-details.html" class="text-body">Blue N</a>
                                    
                                        </p>
                                    </td>
                                    <td>
                                        shrot description
                                    </td>
                                    <td>
                                         description
                                    </td>
                                    <td>
                                         category
                                    </td>
                                    <td>
                                        Wilson
                                    </td>
                                    <td>
                                       6245
                                    </td>
                                    <td>
                                        $148.66
                                    </td>

                                    <td>
                                        254
                                    </td>
                                    <td>
                                        <span class="badge bg-success-subtle text-success p-1">Published</span>
                                    </td>

                                    <td style="cursor: pointer;">
                        <i class="mdi mdi-square-edit-outline text-primary fs-3"></i>
                    </td>

                  <td  style="cursor: pointer;">
                    <i class="mdi mdi-delete text-danger fs-3"></i>
                   </td>
                                </tr>

                               
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container -->

</div> <!-- content -->


<?php include 'footer.php'; ?>