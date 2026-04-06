document.addEventListener("DOMContentLoaded", loadCoupons);

async function loadCoupons() {
  const token = localStorage.getItem("superadminToken");

  try {
    const res = await fetch("https://api.workarya.com/api/coupon/list", {
      headers: {
        "Content-Type": "application/json",
        Authorization: `Bearer ${token}`,
      },
    });

    const coupons = await res.json();
    renderCoupons(coupons);
  } catch (err) {
    console.error("Coupon load error:", err);
    document.getElementById("allcoupon").innerHTML =
      `<tr><td colspan="7" class="text-center text-danger">Failed to load coupons</td></tr>`;
  }
}

function renderCoupons(coupons) {
  const tbody = document.getElementById("allcoupon");
  tbody.innerHTML = "";

  coupons.forEach((c, i) => {
    const typeText = c.type === "percentage" ? "Percentage" : "Fixed Amount";
    const valueText = c.type === "percentage" ? `${c.value}%` : `₹${c.value}`;

    tbody.innerHTML += `
        <tr>
            <td>${i + 1}</td>
            <td>${c.code}</td>
            <td>${typeText}</td>
            <td>${valueText}</td>
            <td>
                <span class="badge bg-success-subtle text-success p-1">Active</span>
            </td>
            <td class="table-action">
                <a href="edit-coupon.html?id=${c.id}" class="action-icon">
                    <i class="mdi mdi-square-edit-outline"></i>
                </a>
            </td>
            <td class="table-action">
                <a href="javascript:void(0);" class="action-icon delete-coupon" data-id="${c.id}">
                    <i class="mdi mdi-trash-can"></i>
                </a>
            </td>
        </tr>`;
  });
}

// ✅ Delete coupon

document.addEventListener("click", async function (e) {
  const btn = e.target.closest(".delete-coupon");
  if (!btn) return;

  const id = btn.dataset.id;
  const token = localStorage.getItem("superadminToken");

  const confirm = await Swal.fire({
    title: "Delete Coupon?",
    text: "This action cannot be undone",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, delete it",
    cancelButtonText: "Cancel"
  });

  if (!confirm.isConfirmed) return;

  try {
    const res = await fetch(`https://api.workarya.com/api/coupon/delete/${id}`, {
      method: "DELETE",
      headers: {
        Authorization: `Bearer ${token}`
      }
    });

    const result = await res.json();
    if (!result.success) throw new Error();

    await Swal.fire({
      title: "Deleted!",
      text: "Coupon has been removed",
      icon: "success",
      timer: 1500,
      showConfirmButton: false
    });

    loadCoupons();

  } catch (err) {
    Swal.fire({
      title: "Error",
      text: "Delete failed",
      icon: "error"
    });
  }
});

