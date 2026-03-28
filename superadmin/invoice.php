<?php include 'header.php'; ?>

<!-- ========== Topbar End ========== -->
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <h4>Invoice</h4>


                    <ol class="breadcrumb d-lg-flex d-none mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">TechUI</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Invoice</a></li>

                        <li class="breadcrumb-item"><a href="javascript: void(0);">Invoice</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" id="invoiceBody">

                        <!-- Invoice Logo-->
                        <div class="clearfix">
                            <div class="float-start mb-3">
                                <img src="assets/img/logo.png" alt="dark logo" height="32">
                            </div>
                            <div class="float-end">
                                <h4 class="m-0 d-print-none">Invoice</h4>
                            </div>
                        </div>

                        <!-- Invoice Detail-->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="float-end mt-3">
                                    <p><b>Hello, Thomson</b></p>
                                    <p class="text-muted fs-13">Please find below a cost-breakdown for the recent work
                                        completed. Please make payment at your earliest convenience, and do not hesitate
                                        to contact me with any questions.</p>
                                </div>

                            </div><!-- end col -->
                            <div class="col-sm-4 offset-sm-2">
                                <div class="mt-3 float-sm-end">
                                    <p class="fs-13"><strong>Order Date: </strong> &nbsp;&nbsp;&nbsp; Jan 17, 2023</p>
                                    <p class="fs-13"><strong>Order Status: </strong> <span
                                            class="badge bg-success float-end">Paid</span></p>
                                    <p class="fs-13"><strong>Order ID: </strong> <span class="float-end">#123456</span>
                                    </p>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row mt-4">
                            <div class="col-6">
                                <h6 class="fs-14">Billing Address</h6>
                                <address>
                                    Lynne K. Higby<br>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                    <abbr title="Phone">P:</abbr> (123) 456-7890
                                </address>
                            </div> <!-- end col-->

                            <div class="col-6">
                                <h6 class="fs-14">Shipping Address</h6>
                                <address>
                                    Thomson<br>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                    <abbr title="Phone">P:</abbr> (123) 456-7890
                                </address>
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-sm table-centered table-hover table-borderless mb-0 mt-3">
                                        <thead class="border-top border-bottom bg-light-subtle border-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>Unit Cost</th>
                                                <th class="text-end">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="">1</td>
                                                <td>
                                                    <b>Laptop</b> <br />
                                                    Brand Model VGN-TXN27N/B
                                                    11.1" Notebook PC
                                                </td>
                                                <td>1</td>
                                                <td>$1799.00</td>
                                                <td class="text-end">$1799.00</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>
                                                    <b>Warranty</b> <br />
                                                    Two Year Extended Warranty -
                                                    Parts and Labor
                                                </td>
                                                <td class="">3</td>
                                                <td>$499.00</td>
                                                <td class="text-end">$1497.00</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>
                                                    <b>LED</b> <br />
                                                    80cm (32) HD Ready LED TV
                                                </td>
                                                <td class="">2</td>
                                                <td>$412.00</td>
                                                <td class="text-end">$824.00</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="clearfix pt-3">
                                    <h6 class="text-muted fs-14">Notes:</h6>
                                    <small>
                                        All accounts are to be paid within 7 days from receipt of
                                        invoice. To be paid by cheque or credit card or direct payment
                                        online. If account is not paid within 7 days the credits details
                                        supplied as confirmation of work undertaken will be charged the
                                        agreed quoted fee noted above.
                                    </small>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-sm-6">
                                <div class="float-end mt-3 mt-sm-0">
                                    <p><b>Sub-total:</b> <span class="float-end">$4120.00</span></p>
                                    <p><b>VAT (12.5):</b> <span class="float-end">$515.00</span></p>
                                    <h3>$4635.00 USD</h3>
                                </div>
                                <div class="clearfix"></div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->

                        <div class="d-print-none mt-4">
                            <div class="text-end">
                                <a href="javascript:window.print()" class="btn btn-primary"><i
                                        class="mdi mdi-printer"></i> Print</a>
                                <a href="javascript: void(0);" class="btn btn-info">Submit</a>
                            </div>
                        </div>
                        <!-- end buttons -->

                    </div> <!-- end card-body-->


                    
                </div> <!-- end card -->
            </div> <!-- end col-->
        </div>

        
        <!-- end row -->

    </div> <!-- container -->

</div>



<script>
    
const BASE = "http://multivendor_backend.workarya.com";
const orderId = new URLSearchParams(window.location.search).get("id");

async function loadInvoice() {
  const res = await fetch(`${BASE}/api/orders/my-orders`, {
    headers: {
      Authorization: "Bearer " + localStorage.getItem("superadminToken"),
    },
  });

  const result = await res.json();
  const orders = result.data || [];
  const o = orders.find((x) => x.orderId === orderId);
  if (!o) return;

  const a = o.address || {};
  const items = o.items || [];

  // ===== Header Right Info =====
  document.querySelector(".col-sm-4.offset-sm-2 .mt-3").innerHTML = `
    <p class="fs-13"><strong>Order Date: </strong>
      <span class="float-end">${new Date(o.createdAt).toLocaleDateString()}</span>
    </p>
    <p class="fs-13"><strong>Order Status: </strong>
      <span class="badge bg-success float-end">${o.paymentStatus}</span>
    </p>
    <p class="fs-13"><strong>Order ID: </strong>
      <span class="float-end">${o.orderId}</span>
    </p>
  `;

  // ===== Billing Address =====
  document.querySelectorAll("address")[0].innerHTML = `
    ${a.fullName}<br>
    ${a.addressLine1} ${a.addressLine2}<br>
    ${a.city}, ${a.state} - ${a.postalCode}<br>
    <abbr title="Phone">P:</abbr> ${a.phoneNumber}
  `;

  // ===== Shipping Address =====
  document.querySelectorAll("address")[1].innerHTML = `
    ${a.fullName}<br>
    ${a.addressLine1} ${a.addressLine2}<br>
    ${a.city}, ${a.state} - ${a.postalCode}<br>
    <abbr title="Phone">P:</abbr> ${a.phoneNumber}
  `;

  // ===== Items Table =====
  let rows = "";
  let subTotal = 0;

  items.forEach((it, i) => {
    const total = it.price * it.quantity;
    subTotal += total;

    rows += `
      <tr>
        <td>${i + 1}</td>
        <td>
          <b>${it.productName}</b><br/>
          Qty: ${it.quantity}
        </td>
        <td>${it.quantity}</td>
        <td>₹${it.price}</td>
        <td class="text-end">₹${total.toFixed(2)}</td>
      </tr>
    `;
  });

  document.querySelector("tbody").innerHTML = rows;

  // ===== Totals =====
  const totalBox = document.querySelector(".float-end.mt-3.mt-sm-0");
  totalBox.innerHTML = `
    <p><b>Sub-total:</b> <span class="float-end">₹${subTotal.toFixed(2)}</span></p>
    <p><b>Shipping:</b> <span class="float-end">₹0.00</span></p>
    <h3>₹${o.totalAmount.toFixed(2)}</h3>
  `;

  // ===== Greeting Name =====
  document.querySelector(".float-end.mt-3 p b").innerText =
    `Hello, ${a.fullName}`;
}

loadInvoice();
</script>

<!-- content -->

<?php include 'footer.php'; ?>