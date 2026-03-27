
async function loadOrders() {
  const token = localStorage.getItem("superadminToken");

  try {
    const res = await fetch(
      "http://multivendor_backend.workarya.com/api/orders/my-orders",
      {
        headers: { "Authorization": `Bearer ${token}` },
      }
    );

    const result = await res.json();
    const orders = result.data || [];

    const tbody = document.getElementById("allorder");
    tbody.innerHTML = "";

    orders.forEach((o, index) => {
      const firstItem = o.items[0] || {};
      const address = o.address || {};

      const row = `
        <tr>
          <td>${index + 1}</td>

          <td class="fw-bold">${o.orderId}</td>

          <td>
            <div class="d-flex align-items-center gap-2">
              <img src="http://multivendor_backend.workarya.com${firstItem.productImage || ''}"
                   width="40" height="40" style="object-fit:cover;border-radius:6px"
                   onerror="this.style.display='none'"/>
              <div>
                <h6 class="mb-0">${address.fullName || "-"}</h6>
                <small class="text-muted">${address.phoneNumber || "-"}</small>
              </div>
            </div>
          </td>

          
          <td>
            ${formatDate(o.createdAt)}
          </td>

          <td>₹${o.totalAmount}</td>

          <td>${o.paymentStatus}</td>

          <td>
            <span class="badge bg-info-subtle text-info fw-semibold">
              ${o.orderStatus}
            </span>
          </td>

         <td class="table-action">
  <!-- Order Details -->
  <i class="mdi mdi-eye-outline fs-4 text-primary"
     title="Order Details"
     style="cursor:pointer"
     onclick="viewOrder('${o.orderId}')"></i>
</td>

<td class="table-action">
  <!-- Print Invoice -->
  <i class="mdi mdi-printer fs-3 text-success"
     title="Print Invoice"
     style="cursor:pointer"
     onclick="printInvoice('${o.orderId}')"></i>
</td>

<td class="table-action">
  <!-- Download PDF -->
  <i class="mdi mdi-file-pdf-box fs-3 text-danger"
     title="Download PDF"
     style="cursor:pointer"
     onclick="downloadInvoice('${o.orderId}')"></i>
</td>
        </tr>
      `;

      tbody.insertAdjacentHTML("beforeend", row);
    });
  } catch (err) {
    console.error("Order load error:", err);
  }
}

function formatDate(dateStr) {
  const d = new Date(dateStr);
  return d.toLocaleDateString() + "<br><small>" + d.toLocaleTimeString() + "</small>";
}

loadOrders();
