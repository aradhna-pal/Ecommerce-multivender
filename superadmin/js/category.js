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





