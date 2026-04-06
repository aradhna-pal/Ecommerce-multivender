
document.addEventListener("DOMContentLoaded", loadBanners);

const BASE = "https://api.workarya.com";

async function loadBanners() {
  try {
    const token = localStorage.getItem("superadminToken");

    const res = await fetch(`${BASE}/api/banner/list`, {
      headers: { Authorization: `Bearer ${token}` }
    });

    const banners = await res.json();
    const tbody = document.getElementById("allbanner");
    tbody.innerHTML = "";

    banners.forEach((b, index) => {
      tbody.innerHTML += `
        <tr>
         <td>${index + 1}</td>
         

          <td>
            <img src="${BASE + b.image}" height="48" class="rounded me-3"/>
          </td>

          <td>
            <p class="m-0 font-16">${b.link ?? "-"}</p>
          </td>

          <td>${b.title}</td>

          <td>
            <span class="badge ${
              b.isActive
                ? "bg-success-subtle text-success"
                : "bg-danger-subtle text-danger"
            } p-1">
              ${b.isActive ? "Published" : "Unpublished"}
            </span>
          </td>

          <td class="table-action">
            <a href="edit-banner.php?id=${b.id}" class="action-icon">
              <i class="mdi mdi-square-edit-outline"></i>
            </a>
          </td>

          <td class="table-action">
            <a href="javascript:void(0);" 
               class="action-icon delete-banner" 
               data-id="${b.id}">
              <i class="mdi mdi-delete"></i>
            </a>
          </td>
        </tr>
      `;
    });

  } catch (err) {
    console.error(err);
  }
}




// ****************************************************** delete api ************************************************

// DELETE WITH SWEET ALERT
document.addEventListener("click", async function (e) {
  if (!e.target.closest(".delete-banner")) return;

  const id = e.target.closest(".delete-banner").dataset.id;
  const token = localStorage.getItem("superadminToken");

  const confirmDelete = await Swal.fire({
    title: "Delete Banner?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, Delete"
  });

  if (!confirmDelete.isConfirmed) return;

  try {
    const res = await fetch(
      `https://api.workarya.com/api/banner/delete/${id}`,
      {
        method: "DELETE",
        headers: {
          Authorization: `Bearer ${token}`
        }
      }
    );

    // 🔥 IMPORTANT — see actual API reply
    const text = await res.text();
    console.log("DELETE API RAW:", text);

    // some APIs return empty body on delete
    if (!text) {
      Swal.fire("Deleted!", "Banner removed", "success");
      loadBanners();
      return;
    }

    const result = JSON.parse(text);

    // handle multiple possible formats
    if (res.ok || result.success === true || result.status === true) {
      Swal.fire("Deleted!", "Banner removed", "success");
      loadBanners();
    } else {
      throw new Error(result.message || "Unknown error");
    }

  } catch (err) {
    console.error("DELETE ERROR:", err);
    Swal.fire("Error", "Delete failed", "error");
  }
});


// ============================================================== delte api end ==============================================================