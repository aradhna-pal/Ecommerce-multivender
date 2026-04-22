<?php include 'header.php'; ?>
<?php $orderId = $_GET['id'] ?? ''; ?>


<div class="container-fluid ">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center py-2">
                <h4>Orders Details</h4>


                <ol class="breadcrumb d-lg-flex d-none mb-0">
                    <li class="breadcrumb-item"><a href="index">Home</a></li>
                    <li class="breadcrumb-item"><a href="order">Order</a></li>

                    <li class="breadcrumb-item"><a href="">Orders Details</a></li>
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
                <div id="orderDetails">Loading order...</div>
            </div>
        </div>

        <!-- Box 2: Delivery Address -->
        <div class="col-md-6">
            <div class="card p-3 shadow-sm">
                <h5 class="mb-3">Delivery Address</h5>
                <div id="deliveryAddress">Loading address...</div>
            </div>
        </div>

        <!-- Box 3: Customer Details -->
        <div class="col-md-6">
            <div class="card p-3 shadow-sm">
                <h5 class="mb-3">Customer Details</h5>
                <div id="customerDetails">Loading customer...</div>
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
(function () {
    const ORDER_BASE_URL = "https://api.workarya.com";
    const currentOrderId = "<?php echo $orderId; ?>";
    const normalizedOrderId = (currentOrderId || "").trim().toLowerCase();
    const orderDetailsEl = document.getElementById("orderDetails");
    const deliveryAddressEl = document.getElementById("deliveryAddress");
    const customerDetailsEl = document.getElementById("customerDetails");
    const orderItemsEl = document.getElementById("orderItems");

    function showState(message) {
        orderDetailsEl.innerHTML = message;
        deliveryAddressEl.innerHTML = message;
        customerDetailsEl.innerHTML = message;
        orderItemsEl.innerHTML = message;
    }

    function renderOrder(order) {
        const a = order.address || {};
        const addressName = a.fullName || a.FullName || a.name || a.Name || "";
        const addressPhone = a.phoneNumber || a.PhoneNumber || a.phone || a.Phone || "";
        const addressPincode = a.postalCode || a.PostalCode || a.pincode || a.Pincode || "";

        document.getElementById("orderHeading").innerText = "Order Detail - " + (order.orderId || order.id || "-");
        orderDetailsEl.innerHTML = `
      <p><strong>Order ID:</strong> ${order.orderId || order.id || "-"}</p>
      <p><strong>Order Date:</strong> ${new Date(order.createdAt).toLocaleString()}</p>
      <p><strong>Order Status:</strong> ${order.orderStatus || "-"}</p>
      <p><strong>Payment Status:</strong> ${order.paymentStatus || "-"}</p>
      <p><strong>Order Total:</strong> ₹${order.totalAmount ?? order.total ?? 0}</p>`;

        deliveryAddressEl.innerHTML = `
      <p><strong>Name:</strong> ${addressName}</p>
      <p><strong>Mobile:</strong> ${addressPhone}</p>
      <p><strong>Address:</strong> ${a.addressLine1 || ""} ${a.addressLine2 || ""}</p>
      <p><strong>City:</strong> ${a.city || ""}</p>
      <p><strong>State:</strong> ${a.state || ""}</p>
      <p><strong>Post Code:</strong> ${addressPincode}</p>`;

        customerDetailsEl.innerHTML = `
      <p><strong>Name:</strong> ${addressName}</p>
      <p><strong>Mobile:</strong> ${addressPhone}</p>
      <p><strong>City:</strong> ${a.city || ""}</p>
      <p><strong>State:</strong> ${a.state || ""}</p>`;

        const itemsHtml = (order.items || []).map((it) => `
            <div class="border rounded p-2 mb-2 d-flex gap-2">
                <img src="${window.resolveApiMediaUrl ? window.resolveApiMediaUrl(it.productImage || it.image) : (ORDER_BASE_URL + (it.productImage || ""))}"
                    width="60" height="60" style="object-fit:cover;border-radius:6px"/>
                <div>
                    <p class="m-0"><strong>${it.productName || "-"}</strong></p>
                    <p class="m-0">Qty: ${it.quantity || 0}</p>
                    <p class="m-0">Price: ₹${it.price || 0}</p>
                </div>
            </div>`).join("");

        orderItemsEl.innerHTML = itemsHtml || "No items";
    }

    async function loadOrderDetail() {
        try {
            const token = localStorage.getItem("superadminToken");
            if (!token) {
                showState("Login required");
                return;
            }

            const res = await fetch(`${ORDER_BASE_URL}/api/orders/my-orders`, {
                headers: { Authorization: `Bearer ${token}` },
            });

            if (!res.ok) {
                showState("Failed to load order");
                return;
            }

            const result = await res.json();
            const orders = result?.data?.data || result?.data || result?.orders || [];
            const order = orders.find((x) => ((x.orderId || x.id || "").trim().toLowerCase()) === normalizedOrderId);

            if (!order) {
                showState("Order not found");
                return;
            }

            renderOrder(order);
        } catch (error) {
            console.error("Superadmin order detail error:", error);
            showState("Unable to load order details");
        }
    }

    loadOrderDetail();
})();
</script>