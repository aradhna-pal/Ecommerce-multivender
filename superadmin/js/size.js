// ****************************************** GET ALL SIZE  START ******************************************

async function loadSizes() {
  try {
    const token = localStorage.getItem("superadminToken");

    if (!token) {
      alert("Please login first");
      return;
    }

    const res = await fetch(
      "http://multivendor_backend.workarya.com/api/size/get",
      {
        method: "GET",
        headers: {
          Authorization: `Bearer ${token}`,
        },
      },
    );

    const data = await res.json();

    console.log("Size API:", data); // ✅ check response

    const tbody = document.getElementById("allsize");
    tbody.innerHTML = "";

    // agar response direct array hai
    const sizes = data.data || data;

    sizes.forEach((size, index) => {
      const row = `
                <tr>
                     <td>${index + 1}</td> <!-- ✅ S.No -->


                   

                    <td>${size.name}</td>
                    <td>${size.description}</td>


                    

                    

                    <td onclick="editSize('${size.id}')" style="cursor: pointer;">
                        <i class="mdi mdi-square-edit-outline text-dark fs-3"></i>
                    </td>

                  <td onclick="deleteSize('${size.id}')" style="cursor: pointer;">
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

loadSizes();
//   <td>${size.description && typeof size.description === "object" ? JSON.stringify(size.description) : size.description || "N/A"}</td>

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
    const res = await fetch(
      `http://multivendor_backend.workarya.com/api/size/delete-size-permanent/${id}`,
      {
        method: "DELETE",
        headers: {
          Authorization: `Bearer ${token}`,
        },
      },
    );

    if (res.ok) {
      await Swal.fire("Deleted!", "Size deleted successfully.", "success");
      location.reload(); // or call getAllSize() if you want to refresh table without reload
    } else {
      Swal.fire("Error", data.message || "Failed to delete size", "error");
    }
  } catch (error) {
    console.error("Error deleting size:", error);
    Swal.fire(
      "Error",
      "An error occurred while deleting the size. Please try again.",
      "error",
    );
  }
}

// ******************************************* DELETE SIZE END ******************************************
