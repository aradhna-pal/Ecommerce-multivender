// ############################################# GET ALL BLOGS ###########################################


async function loadBlogs() {
  try {
    const res = await fetch("http://multivendor_backend.workarya.com/api/blogs");
    const blogs = await res.json();

    console.log("BLOG API:", blogs);

    const tbody = document.getElementById("allBlogs");
    tbody.innerHTML = "";

    blogs.forEach((blog, index) => {
      const row = `
        <tr>
          <td>${index + 1}</td>

          <td>
            <img 
              src="http://multivendor_backend.workarya.com${blog.image}"
              height="48"
              width="48"
              class="rounded"
              style="object-fit:cover"
              onerror="this.src='https://via.placeholder.com/48'"
            />
          </td>

          <td>
            <p class="m-0 font-16">${blog.title}</p>
          </td>

          <td>
            ${truncateWords(blog.description, 10)}
          </td>

          <td>
            <span class="badge ${
              blog.is_active
                ? "bg-success-subtle text-success"
                : "bg-danger-subtle text-danger"
            } p-1">
              ${blog.is_active ? "Active" : "Inactive"}
            </span>
          </td>

          <td>
            <i 
              class="mdi mdi-square-edit-outline fs-4 text-primary"
              style="cursor:pointer"
              onclick="editBlog('${blog.id}')"
            ></i>
          </td>

          <td>
            <i 
              class="mdi mdi-delete fs-4 text-danger"
              style="cursor:pointer"
              onclick="deleteBlog('${blog.id}')"
            ></i>
          </td>
        </tr>
      `;

      tbody.insertAdjacentHTML("beforeend", row);
    });
  } catch (err) {
    console.error("Blog load error:", err);
  }
}

loadBlogs();


// ############################################# End GET ALL BLOGS ###########################################





// #############################################Start  delete  BLOGS ###########################################




async function deleteBlog(id) {
  const token = localStorage.getItem("superadminToken");

  const confirm = await Swal.fire({
    title: "Delete this blog?",
    text: "Are you sure you want to delete this blog?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, delete it",
    cancelButtonText: "Cancel",
  });

  if (!confirm.isConfirmed) return;

  try {
    const res = await fetch(
      `http://multivendor_backend.workarya.com/api/blogs/${id}`,
      {
        method: "DELETE",
        headers: {
          "Content-Type": "application/json",
          "Authorization": `Bearer ${token}`, // or "token": token
        },
      }
    );

    if (!res.ok) throw new Error();

    await Swal.fire({
      icon: "success",
      title: "Deleted!",
      text: "Blog deleted successfully.",
      timer: 1500,
      showConfirmButton: false,
    });

    loadBlogs(); // refresh table
  } catch (err) {
    Swal.fire({
      icon: "error",
      title: "Delete failed",
      text: "Please check console or token.",
    });
    console.error(err);
  }
}

// ############################################# END DELETE BLOG ###########################################

