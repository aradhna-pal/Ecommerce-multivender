<?php include 'header.php'; ?>
<?php $orderId = $_GET['id'] ?? ''; ?>


<div class="container-fluid ">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center py-2">
                <h4>Orders Details</h4>


                <ol class="breadcrumb d-lg-flex d-none mb-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="order.php">Order</a></li>

                    <li class="breadcrumb-item"><a href="javascript: void(0);">Orders Details</a></li>
                </ol>
            </div>
        </div>
    </div>

    <!-- Heading -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 id="orderHeading">Order ID - #<?php echo $orderId; ?></h4>
        <a href="order.php" class="btn btn-secondary">← Back to Orders</a>
    </div>

    <div class="row g-3">

        <!-- Box 1: Order Details -->
        <div class="col-md-6">
            <div class="card p-3 shadow-sm" >
                <h5 class="mb-3">Order Details</h5>
                <div id="orderDetails">
                    <p><strong>Order ID:</strong> #236</p>
                    <p><strong>Order Number:</strong> ORD-680B2992549C8</p>
                    <p><strong>Order Date:</strong> 2025-04-25 06:20:02</p>
                    <p><strong>Order Status:</strong> Cancelled</p>
                    <p><strong>Cancellation Reason:</strong> </p>
                    <p><strong>Comment:</strong> </p>
                    <p><strong>Order Total:</strong> ₹465.00</p>
                    <p><strong>Shipping Charges:</strong> ₹0.00</p>
                    <p><strong>Payment Method:</strong> razorpay</p>
                    <p><strong>Payment Status:</strong> Paid</p>
                    <p><strong>Courier Name:</strong> N/A</p>
                    <p><strong>Tracking Number:</strong> N/A</p>
                </div>
            </div>
        </div>

        <!-- Box 2: Delivery Address -->
        <div class="col-md-6">
            <div class="card p-3 shadow-sm">
                <h5 class="mb-3">Delivery Address</h5>
                <div id="deliveryAddress">
                    <p><strong>Name:</strong> </p>
                    <p><strong>Mobile:</strong> </p>
                    <p><strong>Address:</strong> N/A</p>
                    <p><strong>City:</strong> N/A</p>
                    <p><strong>State:</strong> N/A</p>
                    <p><strong>Country:</strong> N/A</p>
                    <p><strong>Post Code:</strong> 000000</p>
                </div>
            </div>
        </div>

        <!-- Box 3: Customer Details -->
        <div class="col-md-6">
            <div class="card p-3 shadow-sm">
                <h5 class="mb-3">Customer Details</h5>
                <div id="customerDetails">
                    <p><strong>Name:</strong> Yogesh Kumar</p>
                    <p><strong>Email:</strong> yogeshkumar0798@gmail.com</p>
                    <p><strong>Mobile:</strong> 8650242402</p>
                    <p><strong>Address:</strong> N/A</p>
                    <p><strong>City:</strong> N/A</p>
                    <p><strong>State:</strong> N/A</p>
                    <p><strong>Country:</strong> N/A</p>
                    <p><strong>Post Code:</strong> 000000</p>
                </div>
            </div>
        </div>

        <!-- Box 4: Status Update + History -->
        <div class="col-md-6">
            <div class="card p-3 shadow-sm">
                <h5 class="mb-3">Update Order Status</h5>

                <select id="statusSelect" class="form-select mb-2">
                    <option value="">Select Status</option>
                    <option value="Pending">Pending</option>
                    <option value="Processing">Processing</option>
                    <option value="Shipped">Shipped</option>
                    <option value="Delivered">Delivered</option>
                    <option value="Cancelled">Cancelled</option>
                </select>

                <button class="btn btn-primary mb-3" onclick="updateStatus()">Update</button>

                <h6>Status History</h6>
                <div id="statusHistory"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-3 shadow-sm">
                <h5 class="mb-3">Order Items</h5>
                <div id="orderItems"></div>
            </div>
        </div>

    </div>
</div>


<style>

    .card{
        height: 100%;
    }
</style>


<script>


    // order - detail **************************************************************
    const BASE = "http://multivendor_backend.workarya.com";
    const orderId = "<?php echo $orderId; ?>";

    async function loadOrderDetail() {
        try {
            const res = await fetch(`${BASE}/api/orders/my-orders`, {
                headers: {
                    "Authorization": "Bearer " + localStorage.getItem("superadminToken")
                }
            });

            const result = await res.json();
            const orders = result.data || [];

            const o = orders.find(x => x.orderId === orderId);
            if (!o) {
                document.getElementById("orderDetails").innerHTML = "Order not found";
                return;
            }

            // 🔹 Heading
            document.getElementById("orderHeading").innerText =
                "Order Detail - " + o.orderId;

            // 🔹 Order Details
            document.getElementById("orderDetails").innerHTML = `
      <p><strong>Order ID:</strong> ${o.orderId}</p>
      <p><strong>Order Date:</strong> ${new Date(o.createdAt).toLocaleString()}</p>
      <p><strong>Order Status:</strong> ${o.orderStatus}</p>
      <p><strong>Payment Status:</strong> ${o.paymentStatus}</p>
      <p><strong>Order Total:</strong> ₹${o.totalAmount}</p>
    `;

            // 🔹 Address
            const a = o.address || {};
            document.getElementById("deliveryAddress").innerHTML = `
      <p><strong>Name:</strong> ${a.fullName || ""}</p>
      <p><strong>Mobile:</strong> ${a.phoneNumber || ""}</p>
      <p><strong>Address:</strong> ${a.addressLine1 || ""} ${a.addressLine2 || ""}</p>
      <p><strong>City:</strong> ${a.city || ""}</p>
      <p><strong>State:</strong> ${a.state || ""}</p>
      <p><strong>Post Code:</strong> ${a.postalCode || ""}</p>
    `;

            // 🔹 Customer
            document.getElementById("customerDetails").innerHTML = `
      <p><strong>Name:</strong> ${a.fullName || ""}</p>
      <p><strong>Mobile:</strong> ${a.phoneNumber || ""}</p>
      <p><strong>City:</strong> ${a.city || ""}</p>
      <p><strong>State:</strong> ${a.state || ""}</p>
    `;

            // 🔹 Items
            let itemsHtml = "";
            o.items.forEach(it => {
                itemsHtml += `
        <div class="border rounded p-2 mb-2 d-flex gap-2">
          <img src="${BASE}${it.productImage}"
               width="60" height="60"
               style="object-fit:cover;border-radius:6px"/>
          <div>
            <p class="m-0"><strong>${it.productName}</strong></p>
            <p class="m-0">Qty: ${it.quantity}</p>
            <p class="m-0">Price: ₹${it.price}</p>
          </div>
        </div>
      `;
            });
            document.getElementById("orderItems").innerHTML = itemsHtml;

        } catch (e) {
            console.error(e);
        }
    }

    loadOrderDetail();


    // end order detil **********************************************************


</script>