
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



// ================================================================= Add Banner API ===============================================================

// const BASE = "https://api.workarya.com";

document.addEventListener("click", async function (e) {
  if (!e.target.closest("#addBannerBtn")) return;

  const token = localStorage.getItem("superadminToken");

  const title = document.getElementById("bannerName").value.trim();
  const link = document.getElementById("bannerDescription").value.trim();
  const imageFile = document.getElementById("bannerImage").files[0];
  const isActive = document.getElementById("isActive").checked;

  if (!title || !imageFile) {
    Swal.fire("Error", "Title and Image required", "error");
    return;
  }

  const fd = new FormData();
  fd.append("Title", title);
  fd.append("Link", link);
  fd.append("Image", imageFile);
  fd.append("IsActive", isActive);

  try {
    const res = await fetch(`https://api.workarya.com/api/banner/create`, {
      method: "POST",
      headers: { Authorization: `Bearer ${token}` },
      body: fd,
    });

    if (!res.ok) throw new Error();

    await Swal.fire("Success", "Banner added successfully", "success");

    // ✅ redirect to banners list page
    window.location.href = "banner.php"; // yaha apna page name do

  } catch (err) {
    Swal.fire("Error", "Banner create failed", "error");
  }
});



// ============================================================== Add Banner API End ===============================================================


// ================================================================ Edit Banner API ===============================================================
// const BASE = "https://api.workarya.com";


// ====================== EDIT BANNER SCRIPT ======================

// const BASE = "https://api.workarya.com";



const urlParams = new URLSearchParams(window.location.search);
const bannerId = urlParams.get("id");

if (!bannerId) {
    Swal.fire({ title: "Error", text: "Banner ID not found!", icon: "error" });
}

// ================== LOAD EXISTING DATA ==================
document.addEventListener("DOMContentLoaded", async function () {
    const token = localStorage.getItem("superadminToken");
    if (!token) {
        Swal.fire("Error", "Token not found. Please login again.", "error");
        return;
    }

    try {
        const res = await fetch(`${BASE}/api/banner/list`, {
            headers: { "Authorization": `Bearer ${token}` }
        });

        if (!res.ok) throw new Error();

        const banners = await res.json();
        const banner = banners.find(b => b.id == bannerId);

        if (!banner) {
            Swal.fire("Error", "Banner not found", "error");
            return;
        }

        document.getElementById("bannerName").value = banner.title || "";
        document.getElementById("bannerDescription").value = banner.link || "";

        const isActiveCheckbox = document.getElementById("isActive");
        isActiveCheckbox.checked = !!banner.isActive;

        const toggleLabel = document.getElementById("toggleLabel");
        if (toggleLabel) toggleLabel.textContent = banner.isActive ? "Active" : "Inactive";

        if (banner.image) {
            const preview = document.getElementById("previewImage");
            const placeholder = document.getElementById("placeholderText");
            preview.src = BASE + banner.image;
            preview.style.display = "block";
            placeholder.style.display = "none";
        }

    } catch (err) {
        console.error(err);
        Swal.fire("Error", "Failed to load banner details", "error");
    }
});

// ================== UPDATE BANNER (NO _method) ==================
document.addEventListener("click", async function (e) {
    if (!e.target.closest("#editBannerBtn")) return;

    const token = localStorage.getItem("superadminToken");
    if (!token) return;

    const title = document.getElementById("bannerName").value.trim();
    const link = document.getElementById("bannerDescription").value.trim();
    const imageFile = document.getElementById("bannerImage").files[0];
    const isActive = document.getElementById("isActive").checked;

    if (!title) {
        Swal.fire("Error", "Banner Name is required", "error");
        return;
    }

    const formData = new FormData();
    formData.append("id", bannerId);
    formData.append("Title", title);
    formData.append("Link", link || "");
    formData.append("IsActive", isActive ? "true" : "false");

    // Image bhi bhejo agar select ki ho
    if (imageFile) {
        formData.append("Image", imageFile);
        console.log("✅ New image added to FormData:", imageFile.name);
    } else {
        console.log("ℹ️ No new image selected");
    }


    // 🔥 Important Fix
    // formData.append("_method", "PUT");

    try {
        const res = await fetch(`${BASE}/api/banner/update`, {
            method: "PUT",                    // ← POST rakho
            headers: {
                "Authorization": `Bearer ${token}`,
                "Accept": "application/json"
            },
            body: formData
        });

        const text = await res.text();
        console.log("=== UPDATE RAW RESPONSE ===");
        console.log("Status:", res.status, res.statusText);
        console.log("Body:", text);

        let result = {};
        try { 
            result = JSON.parse(text); 
        } catch (e) {}

        if (res.ok || result.success === true || result.status === true) {
            Swal.fire("Success", "Banner updated successfully", "success")
                .then(() => window.location.href = "banner.php");
        } else {
            const msg = result.message || result.error || text || "Update failed";
            throw new Error(msg);
        }

    } catch (err) {
        console.error("Update Error:", err);
        Swal.fire("Error", err.message || "Failed to update banner", "error");
    }
});
