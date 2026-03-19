// **********************************************************get all category start *******************************************************

async function categoryget() {
  try {
    const token = localStorage.getItem("superadminToken");

    if (!token) {
      alert("Please login first");
      return;
    }

    const res = await fetch(
      "http://multivendor_backend.workarya.com/api/category/list",
      {
        method: "GET",
        headers: {
          Authorization: `Bearer ${token}`,
        },
      },
    );

    const data = await res.json();

    console.log("Category API:", data); // ✅ check response

    const tbody = document.getElementById("allcategory");
    tbody.innerHTML = "";

    // agar response direct array hai
    const categories = data.data || data;

    categories.forEach((category, index) => {
      const row = `
                <tr>
                     <td>${index + 1}</td> <!-- ✅ S.No -->


                    <td>
                        <img src="${category.logo || "https://via.placeholder.com/48"}"
                             class="rounded" height="48" />
                    </td>

                    <td>${category.name}</td>


                    <td>
                        <span class="badge ${
                          category.isActive
                            ? "bg-success-subtle text-success"
                            : "bg-danger-subtle text-danger"
                        }">
                            ${category.isActive ? "Active" : "Inactive"}
                        </span>
                    </td>

                    <td onclick="editCategory('${category.id}')" style="cursor: pointer;">
                        <i class="mdi mdi-square-edit-outline text-primary fs-3"></i>
                    </td>

                  <td onclick="deleteCategory('${category.id}')" style="cursor: pointer;">
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

categoryget();

// **********************************************************get all category end *******************************************************

// **********************************************************delete category start *******************************************************

async function deleteCategory(categoryId) {
  const result = await Swal.fire({
    title: "Confirm Deletion",
    text: "Are you sure you delete this category",
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
    if (!token) {
      alert("Please login first");
      return;
    }

    const res = await fetch(
      `http://multivendor_backend.workarya.com/api/category/delete/${categoryId}`,
      {
        method: "DELETE",
        headers: {
          Authorization: `Bearer ${token}`,
        },
      },
    );

    const data = await res.json();
    console.log("Delete API:", data);

    // 👇 FIX: correct path
    const apiData = data.value || {};
    const message = (apiData.message || "").toLowerCase();

    // ❌ If subcategory exists
    if (apiData.status === false && message.includes("sub")) {
      Swal.fire({
        title: "Cannot Delete ❌",
        text: apiData.message,
        icon: "warning",
        confirmButtonText: "OK",
      });
      return; // 🚫 stop success
    }

    // ✅ Success
    if (res.ok && apiData.status !== false) {
      Swal.fire({
        title: "Deleted!",
        text: "Category has been deleted.",
        icon: "success",
      }).then(() => {
        categoryget();
      });
    } else {
      Swal.fire({
        title: "Error!",
        text: apiData.message || "Failed to delete category.",
        icon: "error",
      });
    }
  } catch (error) {
    console.error("Error:", error);
    Swal.fire({
      title: "Error!",
      text: "An error occurred while deleting the category.",
      icon: "error",
    });
  }
}

// **********************************************************delete category end *******************************************************

// ********************************************************** edit category******************************************************************

function editCategory(id) {
  window.location.href = `edit-category.php?id=${id}`;
}

// ✅ GET ID FROM URL (MOST IMPORTANT)
const urlParams = new URLSearchParams(window.location.search);
const categoryId = urlParams.get("id");

async function loadCategoryDetails() {
  try {
    const token = localStorage.getItem("superadminToken");

    // ❗ FIX: ID check
    if (!categoryId) {
      console.error("❌ Category ID not found in URL");
      return; // ❌ Swal mat dikhao reload pe
    }

    console.log("Category ID 👉", categoryId);

    const res = await fetch(
      "http://multivendor_backend.workarya.com/api/category/list",
      {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      },
    );

    const data = await res.json();
    const categories = data.data || data;

    // 🔥 RECURSIVE FIND FUNCTION
    function findCategory(list, id) {
      for (let item of list) {
        if (item.id == id) return item;

        if (item.children && item.children.length > 0) {
          const found = findCategory(item.children, id);
          if (found) return found;
        }
      }
      return null;
    }

    const category = findCategory(categories, categoryId);

    console.log("Selected Category 👉", category);

    // ❗ FIX: only show alert if ID valid but not found
    if (!category) {
      console.error("❌ Category not found in data");
      return;
    }

    // ✅ Prefill
    document.getElementById("categoryName").value = category.name || "";
    document.getElementById("categoryDescription").value =
      category.description || "";
    document.getElementById("isActive").checked = category.isActive;

    // ✅ Image
    if (category.logo) {
      const preview = document.getElementById("previewImage");
      const placeholder = document.getElementById("placeholderText");

      preview.src = category.logo;
      preview.style.display = "block";
      placeholder.style.display = "none";
    }

  } catch (error) {
    console.error("Prefill error:", error);
  }
}

document.addEventListener("DOMContentLoaded", loadCategoryDetails);

document.addEventListener("DOMContentLoaded", () => {
  const btn = document.getElementById("editcategorybtn");

  btn.addEventListener("click", async () => {
    try {
      const token = localStorage.getItem("superadminToken");

      if (!categoryId) {
        Swal.fire("Error", "Category ID missing", "error");
        return;
      }

      const name = document.getElementById("categoryName").value.trim();
      const isActive = document.getElementById("isActive").checked;
      const fileInput = document.getElementById("categoryImage");

      if (!name) {
        Swal.fire("Error", "Category name is required", "error");
        return;
      }

      const formData = new FormData();

      // ❌ ID remove from body
      formData.append("category_name", name);
      formData.append("parent_id", "");
      // formData.append("id", categoryId);
      formData.append("category_status", isActive ? "true" : "false");

      // ✅ image
      const file = fileInput.files[0];
      if (file) {
  formData.append("category_image", file);
}

      // 🔍 DEBUG
      for (let pair of formData.entries()) {
        console.log(pair[0], pair[1]);
      }

      // ✅ YOUR API (ID IN URL)
      const res = await fetch(
        `http://multivendor_backend.workarya.com/api/category/update/${categoryId}`,
        {
          method: "PUT",
          headers: {
            Authorization: `Bearer ${token}`,
          },
          body: formData,
        },
      );

      const data = await res.json();
      console.log("Update API Response 👉", data);

      const apiData = data?.value || data;

      if (apiData.status === false) {
        Swal.fire("Error", apiData.message || "Update failed", "error");
        return;
      }

      // ✅ SUCCESS
      Swal.fire({
        title: "Updated!",
        text: "Category updated successfully.",
        icon: "success",
      }).then(() => {
        window.location.href = "category.php";
      });
    } catch (error) {
      console.error(error);
      Swal.fire("Error", "Something went wrong", "error");
    }
  });
});

// document.addEventListener("DOMContentLoaded", () => {
//   const btn = document.getElementById("editcategorybtn");

//   btn.addEventListener("click", async () => {
//     try {
//       const token = localStorage.getItem("superadminToken");

//       if (!categoryId) {
//         Swal.fire("Error", "Category ID missing", "error");
//         return;
//       }

//       const name = document.getElementById("categoryName").value.trim();
//       const isActive = document.getElementById("isActive").checked;
//       const fileInput = document.getElementById("categoryImage");

//       if (!name) {
//         Swal.fire("Error", "Category name is required", "error");
//         return;
//       }

//       const formData = new FormData();

//       // ✅ ID body me hi jayegi (IMPORTANT)
//       formData.append("id", categoryId);

//       formData.append("category_name", name);
//       formData.append("parent_id", "");
//       formData.append("category_status", isActive ? "true" : "false");

//       // ✅ IMAGE SIZE CHECK (413 FIX)
//       const file = fileInput.files[0];
//       if (file) {
//         if (file.size > 2 * 1024 * 1024) {
//           Swal.fire("Error", "Image must be less than 2MB", "error");
//           return;
//         }
//         formData.append("category_image", file);
//       }

//       // 🔍 DEBUG
//       for (let pair of formData.entries()) {
//         console.log(pair[0], pair[1]);
//       }

//       const res = await fetch(
//         "http://multivendor_backend.workarya.com/api/category/update",
//         {
//           method: "POST",
//           headers: {
//             Authorization: `Bearer ${token}`,
//           },
//           body: formData,
//         }
//       );

//       const data = await res.json();
//       console.log("Update API Response 👉", data);

//       const apiData = data?.value || data;

//       if (apiData.status === false) {
//         Swal.fire("Error", apiData.message || "Update failed", "error");
//         return;
//       }

//       Swal.fire({
//         title: "Updated!",
//         text: "Category updated successfully.",
//         icon: "success",
//       }).then(() => {
//         window.location.href = "category.php";
//       });

//     } catch (error) {
//       console.error(error);
//       Swal.fire("Error", "Something went wrong", "error");
//     }
//   });
// });
