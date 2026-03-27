function truncateWords(text, wordLimit = 10) {
  if (!text) return "";

  // HTML tags remove karo
  const cleanText = text.replace(/<[^>]*>/g, "");

  const words = cleanText.split(" ");
  if (words.length <= wordLimit) return cleanText;

  return words.slice(0, wordLimit).join(" ") + "...";
}
async function loadProduct() {
  try {
    const token = localStorage.getItem("superadminToken");

    if (!token) {
      alert("Please login first");
      return;
    }

    const res = await fetch(
      "http://multivendor_backend.workarya.com/api/products/list",
      {
        method: "GET",
        headers: {
          Authorization: `Bearer ${token}`,
        },
      },
    );

    const data = await res.json();

    console.log("API:", data);

    const tbody = document.getElementById("allproduct");
    tbody.innerHTML = "";

    // ✅ FIX: nested data handle
    const products = data.data?.data || [];

    products.forEach((product, index) => {
      const row = `
        <tr>
          <td>${index + 1}</td>

          <td class="d-flex align-items-center gap-2">
  <img 
    src="http://multivendor_backend.workarya.com${product.mainImage}" 
    class="rounded" 
    height="48"
    width="48"
    style="object-fit: cover;"
    onerror="this.src='https://via.placeholder.com/48'"
  />

  <span>${truncateWords(product.name || "", 5)}</span>
</td>

       

          <td>${truncateWords(product.shortDescription || "", 5)}</td>
        <td>${truncateWords(product.description, 4)}</td>

        <td>${product.categoryName}</td>

            <td>${product.brandName}</td>
            <td>${product.discountPrice}</td>
            <td>${product.price}</td>

            <td>${product.stockQuantity}</td>
            

          <td>
            <span class="badge ${
              product.isActive
                ? "bg-success-subtle text-success"
                : "bg-danger-subtle text-danger"
            }">
              ${product.isActive ? "Active" : "Inactive"}
            </span>
          </td>

          <!-- EDIT -->
          <td>
            <i 
              class="mdi mdi-square-edit-outline text-primary fs-3"
              style="cursor: pointer;"
              onclick="editProduct('${product.id}')"
            ></i>
          </td>

          <!-- DELETE -->
          <td>
            <i 
              class="mdi mdi-delete text-danger fs-3"
              style="cursor: pointer;"
              onclick="deleteProduct('${product.id}')"
            ></i>
          </td>
        </tr>
      `;

      tbody.insertAdjacentHTML("beforeend", row);
    });
  } catch (error) {
    console.error("Error:", error);
  }
}

loadProduct();


// ****************************************************** END GET ALL PRODUCT API **************************************


// ****************************************************** DELETE PRODUCT START ******************************************

async function deleteProduct(id) {
  const token = localStorage.getItem("superadminToken");

  if (!token) {
    Swal.fire({
      icon: "warning",
      title: "Login required",
      text: "Please login first."
    });
    return;
  }

  const confirm = await Swal.fire({
    icon: "warning",
    title: "Delete permanently?",
    text: "This action cannot be undone!",
    showCancelButton: true,
    confirmButtonText: "Yes, delete",
    cancelButtonText: "Cancel"
  });

  if (!confirm.isConfirmed) return;

  try {
    Swal.fire({
      title: "Deleting...",
      allowOutsideClick: false,
      didOpen: () => Swal.showLoading()
    });

    const res = await fetch(
      `http://multivendor_backend.workarya.com/api/products/permanent-delete-product/${id}`,
      {
        method: "DELETE",
        headers: {
          Authorization: `Bearer ${token}`,
        },
      }
    );

    const text = await res.text();
    if (!res.ok) throw new Error(text || "Delete failed");

    // ✅ remove row without reload
    const icon = document.querySelector(`i[onclick="deleteProduct('${id}')"]`);
    if (icon) icon.closest("tr").remove();

    Swal.fire({
      icon: "success",
      title: "Deleted!",
      text: "Product deleted successfully.",
      timer: 1500,
      showConfirmButton: false
    });

  } catch (err) {
    Swal.fire({
      icon: "error",
      title: "Error",
      text: err.message
    });
  }
}


// ************************************************ end delte ********************************