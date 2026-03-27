<?php include 'header.php'; ?>
<!-- ========== Topbar End ========== -->
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <h4>Product Create</h4>
                    <ol class="breadcrumb d-lg-flex d-none mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">TechUI</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Product Create</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-1">Details</h4>
                        <p class="mb-0 text-muted">Title, short description, image...</p>
                    </div>
                    <div class="card-body">

                        <form action="#" id="product-form">   <!-- Form 1 -->
                            <div class="mb-3">
                                <label class="form-label" for="name">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Product Name" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="ShortDescription">Short Description</label>
                                <input type="text" class="form-control" id="ShortDescription" name="ShortDescription"
                                    placeholder="Short Description">
                            </div>

                            <div class="mb-3">
                                <h4 class="mt-0">Description</h4>
                                <div class="mb-2">
                                    <div id="snow-editor" style="height: 300px;">
                                        <p>Write something here...</p>
                                    </div>
                                    <!-- Hidden field to store Quill content -->
                                    <input type="hidden" id="Description" name="Description">
                                </div>
                            </div>

                            <div class="mb-3">
                                <h4 class="mt-0">Main Image</h4>
                                <input type="file" id="MainImage" name="MainImage" data-plugins="dropify" data-height="300" accept="image/*" />
                            </div>

                            <div class="mb-3">
                                <h4 class="mt-0">Gallery Images</h4>
                                <input type="file" id="GalleryImages" name="GalleryImages[]" data-plugins="dropify" data-height="150" multiple accept="image/*" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-1">Properties</h4>
                        <p class="mb-0 text-muted">Additional functions and attributes...</p>
                    </div>
                    <div class="card-body">
                        <form action="#" id="properties-form">   <!-- Form 2 -->
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="product-code">Product Code</label>
                                        <input type="text" class="form-control" id="product-code">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="StockQuantity">Stock Quantity</label>
                                        <input type="number" id="StockQuantity" name="StockQuantity" class="form-control" placeholder="0" value="0">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="MinStockQuantity">Min Stock Quantity</label>
                                        <input type="number" id="MinStockQuantity" name="MinStockQuantity" class="form-control" value="0">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="color-select">Color</label>
                                        <select class="form-select" id="color-select" name="Color">
                                            <option selected value="Red">Red</option>
                                            <option value="Blue">Blue</option>
                                            <option value="Cyan">Cyan</option>
                                            <option value="Green">Green</option>
                                            <option value="Yellow">Yellow</option>
                                            <option value="Black">Black</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="BrandId">Brand</label>
                                        <select class="form-select" id="BrandId" name="BrandId">
                                            <!-- Populate dynamically from DB -->
                                            <option value="">Select Brand</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="CategoryId">Category</label>
                                        <select class="form-select" id="CategoryId" name="CategoryId">
                                            <option value="">Select Category</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="SubCategoryId">Sub Category</label>
                                        <select class="form-select" id="SubCategoryId" name="SubCategoryId">
                                            <option value="">Select Sub Category</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="example-select">Sizes</label>
                                        <select class="form-select" id="example-select" name="Sizes">
                                            <option selected value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="8.5">8.5</option>
                                            <option value="9">9</option>
                                            <option value="9.5">9.5</option>
                                            <option value="10">10</option>
                                            <option value="10.5">10.5</option>
                                            <option value="11">11</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="tags-select">Tags</label>
                                        <select class="form-select" id="tags-select" name="MetaKeywords" multiple>
                                            <option value="Technology">Technology</option>
                                            <option value="Marketing">Marketing</option>
                                            <option value="Design">Design</option>
                                            <option value="Fashion">Fashion</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Gender :</label>
                                        <div class="d-flex gap-3">
                                            <div class="form-check">
                                                <input type="radio" name="Gender" id="male" value="Male" class="form-check-input">
                                                <label for="male">Male</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="Gender" id="female" value="Female" class="form-check-input">
                                                <label for="female">Female</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="Gender" id="kids" value="Kids" class="form-check-input">
                                                <label for="kids">Kids</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="Weight">Weight (kg)</label>
                                        <input type="text" class="form-control" id="Weight" name="Weight" placeholder="0.00">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="Length">Length</label>
                                                <input type="text" class="form-control" id="Length" name="Length">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="Width">Width</label>
                                                <input type="text" class="form-control" id="Width" name="Width">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="Height">Height</label>
                                                <input type="text" class="form-control" id="Height" name="Height">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Pricing Card -->
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-1">Pricing</h4>
                            <p class="mb-0 text-muted">Price related inputs</p>
                        </div>
                        <div class="card-body">
                            <form action="#" id="pricing-form">   <!-- Form 3 -->
                                <div class="mb-3">
                                    <label for="Price" class="form-label">Regular Price</label>
                                    <input type="text" id="Price" name="Price" class="form-control" placeholder="$ 0.00" required>
                                </div>
                                <div class="mb-3">
                                    <label for="DiscountPrice" class="form-label">Discount / Sales Price</label>
                                    <input type="text" id="DiscountPrice" name="DiscountPrice" class="form-control" placeholder="$ 0.00">
                                </div>
                                <div class="mb-3">
                                    <label for="CostPrice" class="form-label">Cost Price</label>
                                    <input type="text" id="CostPrice" name="CostPrice" class="form-control" placeholder="$ 0.00">
                                </div>
                                <div class="mb-3">
                                    <label for="TaxPercentage" class="form-label">Tax Percentage (%)</label>
                                    <input type="number" id="TaxPercentage" name="TaxPercentage" class="form-control" step="0.01" value="0">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-3 mb-3">
                    <button type="button" onclick="submitProduct()" class="btn btn-dark">Create Product</button>
                </div>
            </div>
        </div><!-- end row -->
    </div> <!-- container -->

</div> <!-- content -->

<?php include 'footer.php'; ?>