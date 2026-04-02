
// const BASE = "http://multivendor_backend.workarya.com";
const API  =  "http://multivendor_backend.workarya.com/api/cart/list";

document.addEventListener("DOMContentLoaded", initCart);

async function initCart() {
  try {
    const headers = {};
    const token = localStorage.getItem("userToken");
    if (token) {
      headers["Authorization"] = `Bearer ${token}`;
    }

    const res = await fetch(API, { headers });
    const data = await res.json();
    console.log("Cart API Response:", data);
    renderTable(Array.isArray(data) ? data : []);
  } catch (err) {
    console.error("Cart API Error:", err);
  }
}

function renderTable(items) {
  const tbody = document.getElementById("cartTableBody");
  const countSpan = document.querySelector("#cartCount span");

  tbody.innerHTML = "";
  countSpan.textContent = `(${items.length})`;

  items.forEach(item => {
    const row = `
      <tr class="table-row" data-price="${item.currentPrice}">
        <td>
          <div class="cart-box">
            <div class="cart-image">
              <a href="product.html?id=${item.productId}">
                <img src="${BASE}${item.productImage}" class="img-fluid"/>
              </a>
            </div>
            <div class="cart-contain">
              <a href="product.html?id=${item.productId}">
                <h3>${item.productName}</h3>
              </a>
           
            </div>
          </div>
        </td>

        <!-- Quantity -->
        <td>
          <div class="quantity-box qty-container quantity-box-2">
            <button class="btn qty-btn-minus" data-id="${item.productId}">
              <i class="ri-subtract-line"></i>
            </button>
            <input type="number" disabled
              class="quantity form-control input-qty"
              value="${item.quantity}">
            <button class="btn qty-btn-plus" data-id="${item.productId}">
              <i class="ri-add-line"></i>
            </button>
          </div>
        </td>

        <!-- Delete -->
        <td>
          <button class="remove-row btn" data-id="${item.productId}">
            <i class="ri-delete-bin-7-line"></i>
          </button>
        </td>

        <!-- Total -->
        <td>
          <h4 class="h5 row-total">₹${item.total}</h4>
        </td>
      </tr>
    `;
    tbody.insertAdjacentHTML("beforeend", row);
  });

  bindEvents();
}

// function bindEvents() {
//   document.querySelectorAll(".qty-btn-plus").forEach(btn => {
//     btn.onclick = () => handleQty(btn, 1);
//   });

//   document.querySelectorAll(".qty-btn-minus").forEach(btn => {
//     btn.onclick = () => handleQty(btn, -1);
//   });

//   document.querySelectorAll(".remove-row").forEach(btn => {
//     btn.onclick = () => removeItem(btn.dataset.id);
//   });
// }

async function updateQty(productId, change) {
  const headers = { "Content-Type": "application/json" };
  const token = localStorage.getItem("userToken");
  if (token) {
    headers["Authorization"] = `Bearer ${token}`;
  }

  await fetch(BASE + "/api/cart/update", {
    method: "PUT",
    headers: headers,
    body: JSON.stringify({ productId, change }),
  });
}


// ********************************************* rmeove cart *********************************************
document.addEventListener("click", (e) => {
  const btn = e.target.closest(".remove-row");
  if (!btn) return;

  removeItem(btn.dataset.id);
});




async function removeItem(productId) {
  const userToken = localStorage.getItem("userToken");

  const confirm = await Swal.fire({
    title: "Remove item?",
    text: "This product will be removed from your cart.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, remove it",
  });

  if (!confirm.isConfirmed) return;

  try {
    const headers = { "Content-Type": "application/json" };
    if (userToken) headers["Authorization"] = `Bearer ${userToken}`;

    const res = await fetch(
      "http://multivendor_backend.workarya.com/api/cart/remove",
      {
        method: "DELETE",
        headers,
        body: JSON.stringify({ ProductId: productId }),
      }
    );

    const data = await res.json();

    if (res.ok) {
      await Swal.fire({
        icon: "success",
        title: "Item removed!",
        timer: 1200,
        showConfirmButton: false,
      });

      // remove row instantly (no full reload)
      document
        .querySelector(`.remove-row[data-id="${productId}"]`)
        .closest("tr")
        .remove();

      // optional: refresh count / totals
      initCart();
    } else {
      Swal.fire("Failed", data.message || "Unable to remove item", "error");
    }
  } catch (err) {
    Swal.fire("Error", "Something went wrong", "error");
  }
}


// ********************************************* rmeove cart end *********************************************

// ****************************************** clear cart ******************************************
document.addEventListener("click", function (e) {
  const btn = e.target.closest(".clear-btn");
  if (!btn) return;
  clearCart();
});
async function clearCart() {
  const userToken = localStorage.getItem("userToken");

  const confirm = await Swal.fire({
    title: "Clear entire cart?",
    text: "All items will be removed from your cart.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, clear it",
  });

  if (!confirm.isConfirmed) return;

  try {
    const headers = { "Content-Type": "application/json" };

    // ✅ only add token if exists
    if (userToken) {
      headers["Authorization"] = `Bearer ${userToken}`;
    }

    const res = await fetch(
      "http://multivendor_backend.workarya.com/api/cart/clear",
      {
        method: "DELETE",
        headers,
      }
    );

    if (res.ok) {
      await Swal.fire({
        icon: "success",
        title: "Cart Cleared!",
        timer: 1500,
        showConfirmButton: false,
      });
      initCart();
    } else {
      Swal.fire("Failed", "Unable to clear cart", "error");
    }
  } catch (err) {
    Swal.fire("Error", "Something went wrong", "error");
  }
}


// ****************************************** clear cart end ******************************************