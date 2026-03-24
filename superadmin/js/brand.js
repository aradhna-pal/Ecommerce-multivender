// ******************************************************GET BRANDS******************************************************

async function loadBrands() {
  try {
    const token = localStorage.getItem("superadminToken");

    if (!token) {
      alert("Please login first");
      return;
    }

    const res = await fetch(
      "http://multivendor_backend.workarya.com/api/brands/list",
      {
        method: "GET",
        headers: {
          Authorization: `Bearer ${token}`,
        },
      },
    );

    const data = await res.json();

    console.log("Brand API:", data); // ✅ check response

    const tbody = document.getElementById("brandTableBody");
    tbody.innerHTML = "";

    // agar response direct array hai
    const brands = data.data || data;

    brands.forEach((brand, index) => {
      const row = `
                <tr>
                     <td>${index + 1}</td> <!-- ✅ S.No -->


                    <td>
                        <img src="${brand.logo || "https://via.placeholder.com/48"}"
                             class="rounded" height="48" />
                    </td>

                    <td>${brand.name}</td>

                    <td>${brand.description}</td>

                    <td>
                        <span class="badge ${
                          brand.isActive
                            ? "bg-success-subtle text-success"
                            : "bg-danger-subtle text-danger"
                        }">
                            ${brand.isActive ? "Active" : "Inactive"}
                        </span>
                    </td>

                    <td onclick="editBrand('${brand.id}')" style="cursor: pointer;">
                        <i class="mdi mdi-square-edit-outline text-primary fs-3"></i>
                    </td>

                  <td onclick="deleteBrand('${brand.id}')" style="cursor: pointer;">
                    <i class="mdi mdi-delete text-danger fs-3"></i>
                   </td>
                </tr>
            `;

      tbody.insertAdjacentHTML("beforeend", row);
    });
  } catch (error) {
    console.error("Error:", error);
  }
}

loadBrands();

// {/* <td
//   onclick="window.location.href='edit_brand.php?id=${brand.id}'"
//   style="cursor: pointer;"
// >
//   <i class="mdi mdi-square-edit-outline text-primary fs-3"></i>
// </td>; */}

// ******************************************************END BRAND******************************************************

// ******************************************************DELETE BRAND START *****************************************************


async function deleteBrand(id) {
  const result = await Swal.fire({
    title: "Confirm Deletion",
    text: "This brand will be permanently removed from the system.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#000",
    cancelButtonColor: "#6c757d",
    confirmButtonText: "Delete",
    cancelButtonText: "Cancel",
  });

  if (!result.isConfirmed) return;


  try {
    const token = localStorage.getItem("superadminToken");

    const res = await fetch(
      `http://multivendor_backend.workarya.com/api/brands/delete/${id}`,
      {
        method: "DELETE",
        headers: {
          Authorization: `Bearer ${token}`,
        },
      },
    );

    const data = await res.json();
    console.log("Delete API:", data);

    if (data.status === true || data.success === true) {
      await Swal.fire({
        icon: "success",
        title: "Deleted!",
        text: "Brand has been deleted.",
        confirmButtonColor: "#000",
      });


      loadBrands(); // reload
    } else {
      Swal.fire("Error", data.message || "Delete failed", "error");
    }
  } catch (error) {
    console.error(error);
    Swal.fire("Error", "Something went wrong", "error");
  }
}

// ******************************************************DELETE BRAND END ******************************************************

// ******************************************************ADD BRAND START ******************************************************

document.addEventListener("DOMContentLoaded", function () {
  console.log("JS Loaded ✅");

  const btn = document.getElementById("addBrandBtn");
  const token = localStorage.getItem("superadminToken");

  if (!btn) {
    console.error("Button not found ❌");
    return;
  }

  // Quill init (SAFE)
  let quill;
  try {
    quill = new Quill("#snow-editor", { theme: "snow" });
    console.log("Quill Loaded ✅");
  } catch (e) {
    console.error("Quill Error ❌", e);
  }

  btn.addEventListener("click", async function () {
    console.log("Button Clicked ✅");

    alert(token);

    const name = document.getElementById("brandName").value;
    const description = document.getElementById("brandDescription").value;
    // const description = quill ? quill.root.innerHTML : "";
    const isActive = document.getElementById("isActive").checked;
    const file = document.getElementById("brandImage").files[0];

    const payload = {
      Name: name,
      Description: description,
      Logo: file ? file.name : "",
      IsActive: isActive,
    };

    console.log("Payload:", payload);

    try {
      const res = await fetch(
        "http://multivendor_backend.workarya.com/api/brands/insert",
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${token}`,
          },
          body: JSON.stringify(payload),
        },
      );

      console.log("Response Status:", res.status);

      const data = await res.json();
      console.log("API Response:", data);
      if (data.status === true || data.success === true) {
        await Swal.fire({
          icon: "success",
          title: "Success",
          text: "Brand added successfully",
          confirmButtonColor: "#000",
        });

        // form reset
        document.getElementById("addBrandForm").reset();
        if (quill) quill.root.innerHTML = "";

        // 🔥 redirect after OK click
        window.location.href = "brand.php";
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: data.message || "Add brand failed",
        });
      }
    } catch (err) {
      console.error("Fetch Error ❌", err);

      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Something went wrong",
      });
    }
  });
});
// ******************************************************ADD BRAND END ******************************************************

// ******************************************************EDIT BRAND START ******************************************************

document.addEventListener("DOMContentLoaded", function () {
  const token = localStorage.getItem("superadminToken");
  const btn = document.getElementById("editBrandBtn");

  // Agar edit page nahi hai to exit
  if (!btn) return;

  const nameInput = document.getElementById("brandName");
  const descInput = document.getElementById("brandDescription");
  const isActiveInput = document.getElementById("isActive");

  const fileInput = document.getElementById("brandImage");
  const preview = document.getElementById("previewImage");
  const placeholder = document.getElementById("placeholderText");

  // 🔥 URL se ID lo
  const urlParams = new URLSearchParams(window.location.search);
  const brandId = urlParams.get("id");

  if (!brandId) {
    console.error("No ID found ❌");
    return;
  }

  console.log("Edit ID:", brandId);

  // =========================
  // ✅ LOAD DATA (Prefill)
  // =========================
  async function loadBrand() {
    try {
      const res = await fetch(
        `http://multivendor_backend.workarya.com/api/brands/list/${brandId}`,
        {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        },
      );

      const data = await res.json();
      console.log("GET API:", data);

      const brand = data.data || data;

      nameInput.value = brand.name || brand.Name || "";
      descInput.value = brand.description || brand.Description || "";
      isActiveInput.checked = brand.isActive ?? brand.IsActive ?? false;

      // 🔥 Image preview
      if (brand.logo || brand.Logo) {
        preview.src = brand.logo || brand.Logo;
        preview.style.display = "block";
        placeholder.style.display = "none";
      }
    } catch (err) {
      console.error("Load Error ❌", err);
    }
  }

  loadBrand();

  // =========================
  // ✅ UPDATE API
  // =========================
  btn.addEventListener("click", async function () {
    const payload = {
      Name: nameInput.value,
      Description: descInput.value,
      Logo: fileInput.files[0] ? fileInput.files[0].name : "",
      IsActive: isActiveInput.checked,
    };

    console.log("Update Payload:", payload);

    try {
      const res = await fetch(
        `http://multivendor_backend.workarya.com/api/brands/update/${brandId}`,
        {
          method: "PUT",
          headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${token}`,
          },
          body: JSON.stringify(payload),
        },
      );

      const data = await res.json();
      console.log("UPDATE API:", data);

      if (data.status === true || data.success === true) {
        await Swal.fire({
          icon: "success",
          title: "Updated",
          text: "Brand updated successfully",
          confirmButtonColor: "#000",
        });

        window.location.href = "brand.php";
      } else {
        Swal.fire("Error", data.message || "Update failed", "error");
      }
    } catch (err) {
      console.error("Update Error ❌", err);

      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Something went wrong",
      });
    }
  });
});

function editBrand(brandId) {
  window.location.href = `edit_brand.php?id=${brandId}`;
}
// ******************************************************EDIT BRAND END ******************************************************

