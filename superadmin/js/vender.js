// document.addEventListener("DOMContentLoaded", loadVendors);

// async function loadVendors() {
//   try {
//     const token = localStorage.getItem("superadminToken"); // if your API needs auth

//     const res = await fetch("https://api.workarya.com/admin-vendors", {
//       headers: {
//         "Content-Type": "application/json",
//         Authorization: token ? `Bearer ${token}` : "",
//       },
//     });

//     const result = await res.json();
//     console.log("Vendors API:", result);

//     if (!result.success) return;

//     const tbody = document.getElementById("allvender");
//     tbody.innerHTML = "";

//     result.data.forEach((v, i) => {
//       const statusBadge = `
//     <span class="badge ${
//       v.status === "approved"
//         ? "badge-soft-success"
//         : v.status === "rejected"
//           ? "badge-soft-danger"
//           : "badge-soft-warning"
//     }">
//         ${v.status}
//     </span>
// `;

//      const isApproved = v.status === "approved";

// tbody.innerHTML += `
// <tr>
//     <td>${i + 1}</td>
//     <td>${v.firstName} ${v.lastName}</td>
//     <td>${v.sourceType}</td>
//     <td>${v.phoneNumber || "-"}</td>
//     <td>${v.email}</td>
//     <td>
//         <img src="assets/images/users/avatar-2.jpg" 
//              class="avatar-sm rounded-circle" />
//     </td>

//     <td class="status-badge">
//         <span class="badge ${isApproved ? "badge-soft-success" : "badge-soft-danger"}">
//             ${v.status}
//         </span>
//     </td>

//     <!-- Toggle ALWAYS OFF -->
//     <td>
//         <div class="form-check form-switch">
//             <input class="form-check-input vendor-approval-toggle"
//                    type="checkbox"
//                    data-id="${v.id}">
//             <label class="form-check-label">
//                 ${isApproved ? "Approved" : "Rejected"}
//             </label>
//         </div>
//     </td>
// </tr>
// `;
//     });
//   } catch (err) {
//     console.error("Error loading vendors:", err);
//   }
// }

// // function getStatusBadge(status) {
// //     switch (status) {
// //         case "approved":
// //             return `<span class="badge badge-soft-success">Approved</span>`;
// //         case "rejected":
// //             return `<span class="badge badge-soft-danger">Rejected</span>`;
// //         case "pending":
// //             return `<span class="badge badge-soft-warning">Pending</span>`;
// //         default:
// //             return `<span class="badge badge-soft-secondary">${status}</span>`;
// //     }
// // }

// document.addEventListener("change", async function (e) {
//   if (!e.target.matches(".vendor-approval-toggle")) return;

//   const toggle = e.target;
//   const vendorId = toggle.dataset.id;
//   const label = toggle.nextElementSibling;
//   const row = toggle.closest("tr");
//   const badgeCell = row.querySelector(".status-badge");
//   const token = localStorage.getItem("superadminToken");

//   const isApprove = toggle.checked;
//   label.textContent = "Updating...";

//   try {
//     let res;

//     // ✅ APPROVE (JSON)
//     if (isApprove) {
//       res = await fetch("https://api.workarya.com/approve-vendor", {
//         method: "POST",
//         headers: {
//           "Content-Type": "application/json",
//           Authorization: `Bearer ${token}`,
//         },
//         body: JSON.stringify({ id: vendorId }),
//       });
//     }

//     // ✅ REJECT (FormData + reason)
//     else {
//       const reason = prompt("Enter rejection reason:");
//       if (!reason) {
//         toggle.checked = true;
//         label.textContent = "Approved";
//         return;
//       }

//       const formData = new FormData();
//       formData.append("id", vendorId);
//       formData.append("reason", reason);

//       res = await fetch("https://api.workarya.com/reject-vendor", {
//         method: "POST",
//         headers: {
//           Authorization: `Bearer ${token}`,
//         },
//         body: formData,
//       });
//     }

//     const result = await res.json();
//     console.log("Result:", result);

//     if (!result.success) throw new Error();

//     // ✅ UI update
//     label.textContent = isApprove ? "Approved" : "Rejected";
//     badgeCell.innerHTML = `
//             <span class="badge ${isApprove ? "badge-soft-success" : "badge-soft-danger"}">
//                 ${isApprove ? "approved" : "rejected"}
//             </span>
//         `;
//   } catch (err) {
//     console.error(err);
//     toggle.checked = !isApprove;
//     label.textContent = !isApprove ? "Approved" : "Rejected";
//     alert("Action failed");
//   }
// });




document.addEventListener("DOMContentLoaded", loadVendors);

async function loadVendors() {
  try {
    const token = localStorage.getItem("superadminToken");

    const res = await fetch("https://api.workarya.com/admin-vendors", {
      headers: {
        "Content-Type": "application/json",
        Authorization: token ? `Bearer ${token}` : "",
      },
    });

    const result = await res.json();
    if (!result.success) return;

    const tbody = document.getElementById("allvender");
    tbody.innerHTML = "";

    result.data.forEach((v, i) => {
      const isApproved = v.status === "approved";

      tbody.innerHTML += `
<tr>
    <td>${i + 1}</td>
    <td>${v.firstName} ${v.lastName}</td>
    <td>${v.sourceType}</td>
    <td>${v.phoneNumber || "-"}</td>
    <td>${v.email}</td>
    <td>
        <img src="assets/images/users/avatar-2.jpg" 
             class="avatar-sm rounded-circle" />
    </td>

    <!-- STATUS CONTROL BY TOGGLE -->
    <td>
        <div class="form-check form-switch">
            <input class="form-check-input vendor-approval-toggle"
                   type="checkbox"
                   data-id="${v.id}"
                   ${isApproved ? "checked" : ""}>
            <label class="form-check-label">
                ${isApproved ? "Approved" : "Rejected"}
            </label>
        </div>
    </td>
</tr>
`;
    });
  } catch (err) {
    console.error("Error loading vendors:", err);
  }
}


document.addEventListener("change", async function (e) {
  if (!e.target.matches(".vendor-approval-toggle")) return;

  const toggle = e.target;
  const vendorId = toggle.dataset.id;
  const label = toggle.nextElementSibling;
  const token = localStorage.getItem("superadminToken");

  const isApprove = toggle.checked;
  label.textContent = "Updating...";

  try {
    let res;

    // ✅ APPROVE
    if (isApprove) {
      res = await fetch(`https://api.workarya.com/approve-vendor/${vendorId}`, {
        method: "POST",
        headers: { Authorization: `Bearer ${token}` }
      });
    }

    // ✅ REJECT
    else {
      const { value: reason } = await Swal.fire({
        title: "Reject Vendor",
        input: "text",
        inputLabel: "Rejection reason",
        inputPlaceholder: "Enter reason...",
        showCancelButton: true,
        confirmButtonText: "Reject"
      });

      if (!reason) {
        toggle.checked = true;
        label.textContent = "Approved";
        return;
      }

      const fd = new FormData();
      fd.append("reason", reason);

      res = await fetch(`https://api.workarya.com/reject-vendor/${vendorId}`, {
        method: "POST",
        headers: { Authorization: `Bearer ${token}` },
        body: fd,
      });
    }

    const result = await res.json();
    if (!result.success) throw new Error(result.message);

    label.textContent = isApprove ? "Approved" : "Rejected";

    // ✅ SUCCESS ALERT
    Swal.fire({
      icon: "success",
      title: isApprove ? "Vendor Approved" : "Vendor Rejected",
      timer: 1500,
      showConfirmButton: false
    });

  } catch (err) {
    console.error(err);
    toggle.checked = !isApprove;
    label.textContent = !isApprove ? "Approved" : "Rejected";

    Swal.fire({
      icon: "error",
      title: "Action Failed",
      text: "Please try again"
    });
  }
});