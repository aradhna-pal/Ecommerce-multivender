// ====================== COMMON SETUP ======================
const BASE = "https://api.workarya.com";

function getToken() {
    return localStorage.getItem("superadminToken");
}

// ====================== BANNER LIST PAGE ======================
async function loadBanners() {
    if (!document.getElementById("allbanner")) return; // Safety: only run on list page

    try {
        const token = getToken();
        if (!token) return;

        const res = await fetch(`${BASE}/api/banner/list`, {
            headers: { Authorization: `Bearer ${token}` }
        });

        if (!res.ok) throw new Error("Failed to load banners");

        const banners = await res.json();
        const tbody = document.getElementById("allbanner");
        tbody.innerHTML = "";

        banners.forEach((b, index) => {
            tbody.innerHTML += `
                <tr>
                    <td>${index + 1}</td>
                    <td>
                        <img src="${BASE + b.image}" height="48" class="rounded me-3" alt="Banner"/>
                    </td>
                    <td>
                        <p class="m-0 font-16">${b.link ?? "-"}</p>
                    </td>
                    <td>${b.title}</td>
                    <td>
                        <span class="badge ${b.isActive ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger'} p-1">
                            ${b.isActive ? "Published" : "Unpublished"}
                        </span>
                    </td>
                    <td class="table-action">
                        <a href="edit-banner.php?id=${b.id}" class="action-icon">
                            <i class="mdi mdi-square-edit-outline"></i>
                        </a>
                    </td>
                    <td class="table-action">
                        <a href="javascript:void(0);" class="action-icon delete-banner" data-id="${b.id}">
                            <i class="mdi mdi-delete"></i>
                        </a>
                    </td>
                </tr>
            `;
        });

    } catch (err) {
        console.error("Load Banners Error:", err);
        Swal.fire("Error", "Failed to load banners", "error");
    }
}

// ====================== DELETE BANNER ======================
document.addEventListener("click", async function (e) {
    const deleteBtn = e.target.closest(".delete-banner");
    if (!deleteBtn) return;

    const id = deleteBtn.dataset.id;
    const token = getToken();

    const confirmDelete = await Swal.fire({
        title: "Delete Banner?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Delete"
    });

    if (!confirmDelete.isConfirmed) return;

    try {
        const res = await fetch(`${BASE}/api/banner/delete/${id}`, {
            method: "DELETE",
            headers: { Authorization: `Bearer ${token}` }
        });

        const text = await res.text();
        console.log("DELETE RAW:", text);

        let result = {};
        try { result = JSON.parse(text); } catch (e) {}

        if (res.ok || result.success === true || result.status === true) {
            Swal.fire("Deleted!", "Banner removed successfully", "success");
            loadBanners(); // Refresh list
        } else {
            throw new Error(result.message || "Delete failed");
        }
    } catch (err) {
        console.error("Delete Error:", err);
        Swal.fire("Error", err.message || "Delete failed", "error");
    }
});

// ====================== ADD BANNER ======================
document.addEventListener("click", async function (e) {
    if (!e.target.closest("#addBannerBtn")) return;

    const token = getToken();
    const title = document.getElementById("bannerName").value.trim();
    const link = document.getElementById("bannerDescription").value.trim();
    const imageFile = document.getElementById("bannerImage").files[0];
    const isActive = document.getElementById("isActive").checked;

    if (!title || !imageFile) {
        Swal.fire("Error", "Title and Image are required", "error");
        return;
    }

    const fd = new FormData();
    fd.append("Title", title);
    fd.append("Link", link);
    fd.append("Image", imageFile);
    fd.append("IsActive", isActive);

    try {
        const res = await fetch(`${BASE}/api/banner/create`, {
            method: "POST",
            headers: { Authorization: `Bearer ${token}` },
            body: fd
        });

        if (!res.ok) throw new Error();

        Swal.fire("Success", "Banner added successfully", "success")
            .then(() => {
                window.location.href = "banner.php";
            });

    } catch (err) {
        Swal.fire("Error", "Failed to create banner", "error");
    }
});

// ====================== EDIT BANNER PAGE ======================
let bannerId = null;

function initEditPage() {
    if (!document.getElementById("editBannerBtn")) return; // Only run on edit page

    const urlParams = new URLSearchParams(window.location.search);
    bannerId = urlParams.get("id");

    if (!bannerId) {
        Swal.fire({
            title: "Error",
            text: "Banner ID not found in URL!",
            icon: "error"
        });
        return;
    }

    loadBannerForEdit();
}

async function loadBannerForEdit() {
    const token = getToken();
    if (!token) {
        Swal.fire("Error", "Token not found. Please login again.", "error");
        return;
    }

    try {
        const res = await fetch(`${BASE}/api/banner/list`, {
            headers: { Authorization: `Bearer ${token}` }
        });

        if (!res.ok) throw new Error();

        const banners = await res.json();
        const banner = banners.find(b => String(b.id) === String(bannerId));

        if (!banner) {
            Swal.fire("Error", "Banner not found", "error");
            return;
        }

        // Fill form
        document.getElementById("bannerName").value = banner.title || "";
        document.getElementById("bannerDescription").value = banner.link || "";

        const isActiveCheckbox = document.getElementById("isActive");
        if (isActiveCheckbox) isActiveCheckbox.checked = !!banner.isActive;

        const toggleLabel = document.getElementById("toggleLabel");
        if (toggleLabel) toggleLabel.textContent = banner.isActive ? "Active" : "Inactive";

        // Show existing image preview
        if (banner.image) {
            const preview = document.getElementById("previewImage");
            const placeholder = document.getElementById("placeholderText");
            if (preview) {
                preview.src = BASE + banner.image;
                preview.style.display = "block";
            }
            if (placeholder) placeholder.style.display = "none";
        }

    } catch (err) {
        console.error(err);
        Swal.fire("Error", "Failed to load banner details", "error");
    }
}

// ====================== UPDATE BANNER ======================
document.addEventListener("click", async function (e) {
    if (!e.target.closest("#editBannerBtn")) return;

    if (!bannerId) {
        Swal.fire("Error", "Banner ID is missing", "error");
        return;
    }

    const token = getToken();
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

    if (imageFile) {
        formData.append("Image", imageFile);
    }

    try {
        const res = await fetch(`${BASE}/api/banner/update`, {
            method: "PUT",
            headers: {
                Authorization: `Bearer ${token}`,
                Accept: "application/json"
            },
            body: formData
        });

        const text = await res.text();
        console.log("UPDATE RAW:", res.status, text);

        let result = {};
        try { result = JSON.parse(text); } catch (e) {}

        if (res.ok || result.success === true || result.status === true) {
            Swal.fire("Success", "Banner updated successfully", "success")
                .then(() => {
                    window.location.href = "banner.php";
                });
        } else {
            const msg = result.message || result.error || "Update failed";
            throw new Error(msg);
        }
    } catch (err) {
        console.error("Update Error:", err);
        Swal.fire("Error", err.message || "Failed to update banner", "error");
    }
});

// ====================== INITIALIZE EVERYTHING ======================
document.addEventListener("DOMContentLoaded", function () {
    loadBanners();   // Works only on list page
    initEditPage();  // Works only on edit page
});