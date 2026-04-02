// const BASE = "http://multivendor_backend.workarya.com";
const API = "http://multivendor_backend.workarya.com/api/cart/list";

document.addEventListener("DOMContentLoaded", initCart);

async function initCart() {
  try {
    const res = await fetch(API);
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

  items.forEach((item) => {
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

function bindEvents() {
  document.querySelectorAll(".qty-btn-plus").forEach((btn) => {
    btn.onclick = () => handleQty(btn, 1);
  });

  document.addEventListener("click", async (e) => {
  const plus = e.target.closest(".qty-btn-plus");
  const minus = e.target.closest(".qty-btn-minus");

  if (!plus && !minus) return;

  const btn = plus || minus;
  const action = plus ? "ADD" : "REMOVE";
  const productId = btn.dataset.id;

  await updateQty(productId, action, btn);
});
}

// function handleQty(btn, change) {
//   const tr = btn.closest("tr");
//   const input = tr.querySelector(".input-qty");
//   const totalEl = tr.querySelector(".row-total");
//   const price = parseFloat(tr.dataset.price);

//   let qty = parseInt(input.value);
//   if (qty + change < 1) return;

//   qty += change;
//   input.value = qty;

//   totalEl.textContent = "₹" + (price * qty).toFixed(2);

//   updateQty(btn.dataset.id, change);
// }

async function updateQty(productId, action, btn) {
  try {
    const res = await fetch(
      "http://multivendor_backend.workarya.com/api/cart/update-quantity",
      {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ productId, action }),
      }
    );

    const data = await res.json();
    if (!res.ok) return alert(data.message || "Update failed");

    // 🔥 Update only this row from API response
    const tr = btn.closest("tr");
    const qtyInput = tr.querySelector(".input-qty");
    const totalEl = tr.querySelector(".row-total");

    qtyInput.value = data.quantity;     // API se new qty
    totalEl.textContent = "₹" + data.total; // API se new total

  } catch (err) {
    console.error(err);
  }
}

// ********************************************  start remove item ********************************************

async function removeItem(productId) {
  const confirm = await Swal.fire({
    title: "Remove item?",
    text: "This product will be removed from your cart.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, remove it",
    cancelButtonText: "Cancel",
  });

  if (!confirm.isConfirmed) return;

  try {
    const res = await fetch(
      "http://multivendor_backend.workarya.com/api/cart/remove",
      {
        method: "DELETE", // keep as your API expects
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ ProductId: productId }),
      },
    );

    const data = await res.json();

    if (res.ok) {
      await Swal.fire({
        title: "Removed!",
        text: "Item removed from cart successfully.",
        icon: "success",
        timer: 1500,
        showConfirmButton: false,
      });

      initCart(); // refresh cart
    } else {
      Swal.fire("Failed", data.message || "Failed to remove item", "error");
    }
  } catch (err) {
    console.error(err);
    Swal.fire("Error", "Something went wrong while removing item", "error");
  }
}

// ******************************************** clear cart ********************************************

document.addEventListener("click", function (e) {
  const btn = e.target.closest(".clear-btn");
  if (!btn) return;
  clearCart();
});

async function clearCart() {
  const confirm = await Swal.fire({
    title: "Clear entire cart?",
    text: "All items will be removed from your cart.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, clear it",
    cancelButtonText: "Cancel",
  });

  if (!confirm.isConfirmed) return;

  try {
    const res = await fetch(
      "http://multivendor_backend.workarya.com/api/cart/clear",
      {
        method: "DELETE", // change to POST if your API needs
        headers: { "Content-Type": "application/json" },
      },
    );

    const data = await res.json();

    if (res.ok) {
      await Swal.fire({
        title: "Cart Cleared!",
        text: "All items removed successfully.",
        icon: "success",
        timer: 1500,
        showConfirmButton: false,
      });

      initCart(); // reload empty cart
    } else {
      Swal.fire("Failed", data.message || "Failed to clear cart", "error");
    }
  } catch (err) {
    console.error(err);
    Swal.fire("Error", "Something went wrong while clearing cart", "error");
  }
}

// ********************************************* clear cart end ********************************************
