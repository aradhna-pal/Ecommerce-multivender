<?php include 'header.php'; ?>
<!-- ========== Topbar End ========== -->
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <h4>Add Brand </h4>


                    <ol class="breadcrumb d-lg-flex d-none mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">TechUI</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>

                        <li class="breadcrumb-item"><a href="javascript: void(0);"> Add Brand </a></li>
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

                        <form action="#">
                            <div class="mb-3">
                                <label class="form-label" for="product-name">Product Name</label>
                                <input type="email" class="form-control" id="product-name" placeholder="Product Name">
                            </div>


                            <div class="mb-3">
                                <h4 class="mt-0">Content</h4>
                                <div class="mb-2">
                                    <div id="snow-editor" style="height: 300px;">
                                        <h3>Write Somthing Hear</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <h4 class="mt-0">Images</h4>

                                <input type="file" data-plugins="dropify" data-height="300" />
                            </div>
                            <div class="form-check form-switch mt-3">
                                <input class="form-check-input" type="checkbox" id="activeToggle" checked>
                                <label class="form-check-label" id="toggleLabel" for="activeToggle">
                                    Active
                                </label>
                            </div>
                        </form>
                        <script>
                            const toggle = document.getElementById("activeToggle");
                            const label = document.getElementById("toggleLabel");

                            toggle.addEventListener("change", function () {
                                label.textContent = this.checked ? "Active" : "Inactive";
                                label.style.color = "black"; // always black
                            });
                            const style = document.createElement("style");
                            style.innerHTML = `
                                    .form-check-input {
                                     accent-color: black;
                                     }

                                     .form-check-input:checked {
                                      background-color: black;
                                       border-color: black;
                                       }

                                     .form-check-input:focus {
                                     box-shadow: none;
                                    }
                                `;
                            document.head.appendChild(style);

                        </script>
                        <!-- <style>
                            .form-check-input:checked {
                                background-color: black;
                                border-color: black;
                            }

                            .form-check-input:focus {
                                box-shadow: none;
                            }
                        </style> -->
                    </div>

                </div>
            </div>
            <div class="d-flex justify-content-end mb-3">
                <button type="button" class="btn btn-dark" id="addBrandBtn">Add Brand</button>
            </div>


        </div><!-- end row -->
    </div> <!-- container -->

</div> <!-- content -->


<?php include 'footer.php'; ?>