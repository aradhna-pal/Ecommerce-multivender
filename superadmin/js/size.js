// ****************************************** GET ALL SIZE START ******************************************
document.addEventListener("DOMContentLoaded", function () {
  const token = localStorage.getItem("superadminToken");
  const tbody = document.getElementById("allsize");

  if (!token) {
    alert("Token missing ❌");
    return;
  }

  async function loadSizes() {
    try {
      const res = await fetch(
        "http://multivendor_backend.workarya.com/api/size/get",
        {
          method: "GET",
          headers: { Authorization: `Bearer ${token}` },
        },
      );
      const data = await res.json();

      const sizes = data.data || data;
      //   const colors = data.data || data;

      console.log("GET ALL SIZE API:", sizes);
      tbody.innerHTML = sizes
        .map(
          (size, index) => `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${size.name || "N/A"}</td>
                      
                        <td>${size.description && typeof size.description === 'object' ? JSON.stringify(size.description) : size.description || "N/A"}</td>
                       

                         <td onclick="editSize('${size.id}')" style="cursor: pointer;">
                        <i class="mdi mdi-square-edit-outline text-primary fs-3"></i>
                    </td>

                  <td onclick="deleteSize('${size.id}')" style="cursor: pointer;">
                    <i class="mdi mdi-delete text-danger fs-3"></i>
                   </td>
                        
                    </tr>
                `,
        )
        .join("");
    } catch (error) {
      console.error("Error fetching sizes:", error);
      alert("Failed to load sizes. Please try again.");
    }
  }

  loadSizes();
});




// ****************************************** GET ALL SIZE  END ******************************************

// ******************************************* DELETE SIZE START ******************************************
async function deleteSize(id) {
  const token = localStorage.getItem("superadminToken");

    if (!token) {
    Swal.fire("Error", "Please login first", "error");
    return;
  }

  const result = await Swal.fire({
    title: "Are you sure?",
    text: "This size will be permanently deleted!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Yes, delete it!",
  });

  if (!result.isConfirmed) return;

    try {
        const res = await fetch(`http://multivendor_backend.workarya.com/api/size/delete-size-permanent/${id}`, {
            method: "DELETE",
            headers: {
                Authorization: `Bearer ${token}`,
            },
        });

       if (res.ok) {
      await Swal.fire("Deleted!", "Size deleted successfully.", "success");
      location.reload(); // or call getAllSize() if you want to refresh table without reload
    } else {
      Swal.fire("Error", data.message || "Failed to delete size", "error");
    }
  } catch (error) {
    console.error("Error deleting size:", error);
    Swal.fire("Error", "An error occurred while deleting the size. Please try again.", "error");
  }
}

// ******************************************* DELETE SIZE END ******************************************