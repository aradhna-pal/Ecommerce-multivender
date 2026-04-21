async function loadOrders() {
  const token = localStorage.getItem("superadminToken");

  try {
    const res = await fetch(
      "https://api.workarya.com/api/orders/my-orders",
      {
        headers: { Authorization: `Bearer ${token}` },
      },
    );

    const result = await res.json();
    const orders = result?.data?.data || result?.data || result?.orders || [];

    const tbody = document.getElementById("allorder");
    tbody.innerHTML = "";

    orders.forEach((o, index) => {
      const firstItem = (o.items && o.items[0]) || {};
      const address = o.address || {};

      const row = `
        <tr>
          <td>${index + 1}</td>

          <td class="fw-bold">${o.orderId || o.id || "-"}</td>

          <td>
            <div class="d-flex align-items-center gap-2">
              <img src="${(window.resolveApiMediaUrl ? window.resolveApiMediaUrl(firstItem.productImage || firstItem.image) : ("https://api.workarya.com" + (firstItem.productImage || firstItem.image || "")))}"
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

          <td>₹${o.totalAmount ?? o.total ?? 0}</td>

          <td>${o.paymentStatus || o.paymentstatus || "-"}</td>

          <td>
            <span class="badge bg-info-subtle text-info fw-semibold">
              ${o.orderStatus || o.status || "-"}
            </span>
          </td>

         <td class="table-action">
  <!-- Order Details -->
  <i class="mdi mdi-eye-outline fs-4 text-primary"
     title="Order Details"
     style="cursor:pointer"
     onclick="viewOrder('${o.orderId || o.id}')"></i>
</td>

<td class="table-action">
  <!-- Print Invoice -->
  <i class="mdi mdi-printer fs-3 text-success"
     title="Print Invoice"
     style="cursor:pointer"
     onclick="printInvoice('${o.orderId || o.id}')"></i>
</td>


        </tr>
      `;

      tbody.insertAdjacentHTML("beforeend", row);
    });
  } catch (err) {
    console.error("Order load error:", err);
  }
}


{/* <td class="table-action">
  <!-- Download PDF -->
  <i class="mdi mdi-file-pdf-box fs-3 text-danger"
     title="Download PDF"
     style="cursor:pointer"
     onclick="downloadInvoice('${o.orderId}')"></i>
</td> */}
function formatDate(dateStr) {
  const d = new Date(dateStr);
  return (
    d.toLocaleDateString() + "<br><small>" + d.toLocaleTimeString() + "</small>"
  );
}

loadOrders();

// order detial***************************

function viewOrder(id) {
  window.location.href = `order-detail.php?id=${id}`;
}

// end order detail **************************

// invoice ******************************************************************************

function printInvoice(orderId) {
  // open invoice page with id
  window.open(`invoice.php?id=${orderId}`, "_blank");
}


// end invoice ************************************************************************************

// function downloadInvoice(orderId) {
//   window.open(`invoice.php?id=${orderId}&pdf=1`, "_blank");
// }






// ************************************************* pdf download invoce *****************************


// const BASE = "https://api.workarya.com";

// async function downloadInvoice(orderId) {
//   try {
//     const res = await fetch(`${BASE}/api/orders/my-orders`, {
//       headers: {
//         "Authorization": "Bearer " + localStorage.getItem("superadminToken")
//       }
//     });

//     const result = await res.json();
//     const orders = result.data || [];
//     const o = orders.find(x => x.orderId === orderId);
//     if (!o) return alert("Order not found");

//     const a = o.address || {};
//     const items = o.items || [];

//     const { jsPDF } = window.jspdf;
//     const doc = new jsPDF();

//     // ===== Header =====
//     doc.setFontSize(18);
//     doc.text("INVOICE", 14, 18);

//     doc.setFontSize(10);
//     doc.text(`Order ID: ${o.orderId}`, 14, 28);
//     doc.text(`Order Date: ${new Date(o.createdAt).toLocaleString()}`, 14, 34);
//     doc.text(`Payment Status: ${o.paymentStatus}`, 14, 40);

//     // ===== Address =====
//     doc.text("Billing / Shipping Address:", 14, 52);
//     doc.text(`${a.fullName}`, 14, 58);
//     doc.text(`${a.addressLine1} ${a.addressLine2}`, 14, 64);
//     doc.text(`${a.city}, ${a.state} - ${a.postalCode}`, 14, 70);
//     doc.text(`Phone: ${a.phoneNumber}`, 14, 76);

//     // ===== Items Table =====
//     let y = 90;
//     doc.text("Items:", 14, y);
//     y += 8;

//     items.forEach((it, i) => {
//       const line = `${i + 1}. ${it.productName} | Qty: ${it.quantity} | ₹${it.price}`;
//       doc.text(line, 14, y);
//       y += 8;
//     });

//     // ===== Total =====
//     y += 10;
//     doc.setFontSize(12);
//     doc.text(`Total Amount: ₹${o.totalAmount}`, 14, y);

//     doc.save(`Invoice-${o.orderId}.pdf`);

//   } catch (err) {
//     console.error(err);
//     alert("PDF failed");
//   }
// }

