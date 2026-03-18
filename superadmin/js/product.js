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
