async function childcategoryget() {
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

    const tbody = document.getElementById("allchildcategory");
    tbody.innerHTML = "";

    const categories = data.data || data;

    let count = 1;

    categories.forEach((category) => {

      // 👉 level 1 (parent)
      if (category.children && category.children.length > 0) {

        category.children.forEach((sub) => {

          // 👉 level 2 (subcategory)
          if (sub.children && sub.children.length > 0) {

            // 👉 level 3 (child category)
            sub.children.forEach((child) => {

              const row = `
                <tr>
                  <td>${count++}</td>
                   <td>
                        <img src="${category.logo || "https://via.placeholder.com/48"}"
                             class="rounded" height="48" />
                    </td>

                  <td>${category.name}</td>
                  <td>${sub.name}</td>
                  <td>${child.name}</td>

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

          } else {
            // 👉 no child category
            const row = `
              <tr>
                <td>${count++}</td>
                 <td>
                        <img src="${category.logo || "https://via.placeholder.com/48"}"
                             class="rounded" height="48" />
                    </td>

                <td>${category.name}</td>
                <td>${sub.name}</td>
                <td>-</td>

                <td>
                  <span class="badge ${
                    sub.isActive
                      ? "bg-success-subtle text-success"
                      : "bg-danger-subtle text-danger"
                  }">
                    ${sub.isActive ? "Active" : "Inactive"}
                  </span>
                </td>

                <td onclick="editCategory('${sub.id}')" style="cursor: pointer;">
                  <i class="mdi mdi-square-edit-outline text-primary fs-3"></i>
                </td>

                <td onclick="deleteCategory('${sub.id}')" style="cursor: pointer;">
                  <i class="mdi mdi-delete text-danger fs-3"></i>
                </td>
              </tr>
            `;

            tbody.insertAdjacentHTML("beforeend", row);
          }

        });

      }

    });

  } catch (error) {
    console.error("Error:", error);
  }
}

childcategoryget();