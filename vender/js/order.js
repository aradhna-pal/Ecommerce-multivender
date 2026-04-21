const VENDOR_ORDER_API_BASE = (window.API_BASE_URL || window.BASE || "https://api.workarya.com").replace(/\/$/, "");

function vendorOrderToken() {
  return localStorage.getItem("vendorToken");
}

function vendorIdFromToken() {
  const token = vendorOrderToken();
  if (!token) return "";
  try {
    const payload = JSON.parse(atob(token.split(".")[1].replace(/-/g, "+").replace(/_/g, "/")));
    return payload.VendorId || payload.vendorId || payload.vendorid || "";
  } catch {
    return "";
  }
}

function normalizeOrderPayload(result) {
  return result?.data?.data || result?.data || result?.orders || [];
}

function ownsOrder(order, vendorId) {
  if (!vendorId) return true;
  const orderOwnerId = order.vendorId || order.vendorid || order.sellerId || order.sellerid || "";
  if (orderOwnerId) return String(orderOwnerId) === String(vendorId);

  const items = Array.isArray(order.items) ? order.items : [];
  const ownedItems = items.filter((item) => {
    const itemOwner = item.vendorId || item.vendorid || item.sellerId || item.sellerid || "";
    return itemOwner ? String(itemOwner) === String(vendorId) : true;
  });
  if (!items.length) return true;
  return ownedItems.length > 0;
}

function formatDate(dateStr) {
  const d = new Date(dateStr);
  if (Number.isNaN(d.getTime())) return "-";
  return `${d.toLocaleDateString()}<br><small>${d.toLocaleTimeString()}</small>`;
}

async function loadOrders() {
  const tableBody = document.getElementById("allorder");
  if (!tableBody) return;

  const token = vendorOrderToken();
  if (!token) {
    tableBody.innerHTML = "";
    return;
  }

  try {
    const res = await fetch(`${VENDOR_ORDER_API_BASE}/api/orders/my-orders`, {
      headers: { Authorization: `Bearer ${token}` },
    });
    const result = await res.json();
    const vendorId = vendorIdFromToken();
    const orders = normalizeOrderPayload(result).filter((order) => ownsOrder(order, vendorId));

    tableBody.innerHTML = "";

    orders.forEach((o, index) => {
      const firstItem = (o.items && o.items[0]) || {};
      const address = o.address || {};
      const imageUrl = window.resolveApiMediaUrl
        ? window.resolveApiMediaUrl(firstItem.productImage || firstItem.image)
        : `${VENDOR_ORDER_API_BASE}${firstItem.productImage || firstItem.image || ""}`;

      const row = `
        <tr>
          <td>${index + 1}</td>
          <td class="fw-bold">${o.orderId || o.id || "-"}</td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <img src="${imageUrl}" width="40" height="40" style="object-fit:cover;border-radius:6px" onerror="this.style.display='none'" />
              <div>
                <h6 class="mb-0">${address.fullName || "-"}</h6>
                <small class="text-muted">${address.phoneNumber || "-"}</small>
              </div>
            </div>
          </td>
          <td>${formatDate(o.createdAt)}</td>
          <td>₹${o.totalAmount ?? o.total ?? 0}</td>
          <td>${o.paymentStatus || o.paymentstatus || "-"}</td>
          <td>
            <span class="badge bg-info-subtle text-info fw-semibold">${o.orderStatus || o.status || "-"}</span>
          </td>
          <td class="table-action">
            <i class="mdi mdi-eye-outline fs-4 text-primary" title="Order Details" style="cursor:pointer" onclick="viewOrder('${o.orderId || o.id}')"></i>
          </td>
          <td class="table-action">
            <i class="mdi mdi-printer fs-3 text-success" title="Print Invoice" style="cursor:pointer" onclick="printInvoice('${o.orderId || o.id}')"></i>
          </td>
        </tr>
      `;
      tableBody.insertAdjacentHTML("beforeend", row);
    });
  } catch (err) {
    console.error("Order load error:", err);
  }
}

window.viewOrder = function viewOrder(id) {
  window.location.href = `order-detail.php?id=${id}`;
};

window.printInvoice = function printInvoice(orderId) {
  window.open(`invoice.php?id=${orderId}`, "_blank");
};

document.addEventListener("DOMContentLoaded", () => {
  loadOrders();
});
