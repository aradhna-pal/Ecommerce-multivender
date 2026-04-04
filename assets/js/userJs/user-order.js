const userOrders = "https://api.workarya.com/api/orders/my-orders";
const userToken = localStorage.getItem("userToken");

document.addEventListener("DOMContentLoaded", async function () {
    const tableBody = document.getElementById("order-table-body");

    if (!tableBody) return;

    // Token check
    if (!userToken) {
        tableBody.innerHTML = `
            <tr>
                <td colspan="6" style="text-align:center; color:red;">
                    User token not found. Please login first.
                </td>
            </tr>
        `;
        return;
    }

    try {
        const response = await fetch(userOrders, {
            method: "GET",
            headers: {
                "Authorization": `Bearer ${userToken}`,
                "Content-Type": "application/json"
            }
        });

        const result = await response.json();
        console.log("Orders API Response:", result);

        if (!result.success || !result.data || result.data.length === 0) {
            tableBody.innerHTML = `
                <tr>
                    <td colspan="6" style="text-align:center;">
                        No orders found.
                    </td>
                </tr>
            `;
            return;
        }

        tableBody.innerHTML = "";

        result.data.forEach((order) => {
            const firstItem = order.items && order.items.length > 0 ? order.items[0] : null;

            const orderId = order.orderId ? "#" + order.orderId.slice(0, 8) : "-";
            const productName = firstItem?.productName || "No Product";
            const createdDate = formatDate(order.createdAt);
            const orderStatus = order.orderStatus || "-";
            const paymentStatus = order.paymentStatus || "-";
            const totalAmount = order.totalAmount ? `$${parseFloat(order.totalAmount).toFixed(2)}` : "$0.00";

            const statusClass = getStatusClass(orderStatus);

            const row = `
                <tr>
                    <td>${orderId}</td>
                    <td>
                        <a href="product-circle.html">${productName}</a>
                    </td>
                    <td>${createdDate}</td>
                    <td>
                        <span class="${statusClass}">${orderStatus}</span>
                    </td>
                    <td>${paymentStatus}</td>
                    <td>${totalAmount}</td>
                </tr>
            `;

            tableBody.innerHTML += row;
        });

    } catch (error) {
        console.error("Error fetching orders:", error);
        tableBody.innerHTML = `
            <tr>
                <td colspan="6" style="text-align:center; color:red;">
                    Failed to load orders.
                </td>
            </tr>
        `;
    }
});

// Date format function
function formatDate(dateString) {
    const date = new Date(dateString);

    return date.toLocaleDateString("en-GB", {
        day: "2-digit",
        month: "short",
        year: "numeric"
    });
}

// Status class function
function getStatusClass(status) {
    switch (status?.toUpperCase()) {
        case "PLACED":
        case "COMPLETED":
        case "SUCCESS":
            return "status-success";

        case "PROCESSING":
        case "PENDING":
            return "status-process";

        case "CANCELED":
        case "CANCELLED":
        case "FAILED":
            return "status-cancel";

        default:
            return "status-process";
    }
}
