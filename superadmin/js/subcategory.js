async function subcategoryget() {
  try {
    const token = localStorage.getItem("superadminToken");

    if (!token) {
      alert("Please login first");
      return;
    }

    const res = await fetch(
      "http://multivendor_backend.workarya.com/api/category/list",
      {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      },
    );

    const data = await res.json();
    console.log("Category API:", data);

    const tbody = document.getElementById("allsubcategory");
    tbody.innerHTML = "";

    const categories = data.data || data;

    let count = 1;

    categories.forEach((category) => {

      // ✅ CASE 1: has subcategory
      if (category.children && category.children.length > 0) {

        category.children.forEach((child) => {

          const row = `
            <tr>
              <td>${count++}</td>

              <td>
                <img src="${category.logo || "https://via.placeholder.com/48"}"
                     class="rounded" height="48" />
              </td>

              <td>${category.name}</td> <!-- Parent -->
              <td>${child.name}</td> <!-- Subcategory -->

              <td>
                <span class="badge ${
                  child.isActive
                    ? "bg-success-subtle text-success"
                    : "bg-danger-subtle text-danger"
                }">
                  ${child.isActive ? "Active" : "Inactive"}
                </span>
              </td>

              <td onclick="editCategory('${child.id}')" style="cursor: pointer;">
                <i class="mdi mdi-square-edit-outline text-primary fs-3"></i>
              </td>

              <td onclick="deleteCategory('${child.id}')" style="cursor: pointer;">
                <i class="mdi mdi-delete text-danger fs-3"></i>
              </td>
            </tr>
          `;

          tbody.insertAdjacentHTML("beforeend", row);
        });

      } 
      
      // ✅ CASE 2: NO subcategory → show parent only
      else {
        const row = `
          <tr>
            <td>${count++}</td>

            <td>
              <img src="${category.logo || "https://via.placeholder.com/48"}"
                   class="rounded" height="48" />
            </td>

            <td>${category.name}</td>
            <td>-</td>

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
      }

    });

  } catch (error) {
    console.error("Error:", error);
  }
}

subcategoryget();