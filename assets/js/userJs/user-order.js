const API_BASE = "https://api.workarya.com";
const USER_ORDERS = `${API_BASE}/api/orders/my-orders`;

document.addEventListener("DOMContentLoaded", loadOrders);

async function loadOrders() {
    const tableBody = document.getElementById("order-table-body");
    if (!tableBody) return;

    const token = localStorage.getItem("userToken");
    if (!token) {
        tableBody.innerHTML = `<tr><td colspan="7" class="text-center text-danger">Login required</td></tr>`;
        return;
    }

    try {
        const res = await fetch(USER_ORDERS, {
            headers: { Authorization: `Bearer ${token}` }
        });

        const result = await res.json();

        if (!result.success || !result.orders?.length) {
            tableBody.innerHTML = `<tr><td colspan="7" class="text-center">No orders found</td></tr>`;
            return;
        }

        tableBody.innerHTML = "";

        result.orders.forEach(order => {
            const firstItem = order.items?.[0];

            tableBody.innerHTML += `
            <tr>
                <td>#${order.orderId.slice(0,8)}</td>
                <td>${firstItem?.productName || "No Product"}</td>
                <td>${formatDate(order.createdAt)}</td>
                <td><span class="${getStatusClass(order.orderStatus)}">${order.orderStatus}</span></td>
                <td>${order.paymentStatus}</td>
                <td>₹${order.finalAmount}</td>
                <td>
                  <a href="order-tracking.php?orderId=${order.orderId}" 
   class="btn btn-sm btn-primary">
   Track Order
</a>
                </td>
            </tr>`;
        });

    } catch (e) {
        tableBody.innerHTML = `<tr><td colspan="7" class="text-center text-danger">Error loading orders</td></tr>`;
    }
}

document.addEventListener("click", e => {
    if (e.target.classList.contains("track-order-btn")) {
        const id = e.target.dataset.id;
        window.location.href = `order-tracking.php?id=${id}`;
    }
});

function formatDate(d) {
    return new Date(d).toLocaleDateString("en-GB",{day:"2-digit",month:"short",year:"numeric"});
}

function getStatusClass(s){
    s=s?.toUpperCase();
    if(["PLACED","COMPLETED","SUCCESS"].includes(s)) return "status-success";
    if(["CANCELED","FAILED"].includes(s)) return "status-cancel";
    return "status-process";
}

// ********************************************************* track order button click event ********************************************

