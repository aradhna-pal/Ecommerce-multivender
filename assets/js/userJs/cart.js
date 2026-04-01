
// const BASE = "http://multivendor_backend.workarya.com";
const API  =  "http://multivendor_backend.workarya.com/api/cart/list";

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

function bindEvents() {
  document.querySelectorAll(".qty-btn-plus").forEach(btn => {
    btn.onclick = () => handleQty(btn, 1);
  });

  document.querySelectorAll(".qty-btn-minus").forEach(btn => {
    btn.onclick = () => handleQty(btn, -1);
  });

  document.querySelectorAll(".remove-row").forEach(btn => {
    btn.onclick = () => removeItem(btn.dataset.id);
  });
}

function handleQty(btn, change) {
  const tr = btn.closest("tr");
  const input = tr.querySelector(".input-qty");
  const totalEl = tr.querySelector(".row-total");
  const price = parseFloat(tr.dataset.price);

  let qty = parseInt(input.value);
  if (qty + change < 1) return;

  qty += change;
  input.value = qty;

  totalEl.textContent = "₹" + (price * qty).toFixed(2);

  updateQty(btn.dataset.id, change);
}

async function updateQty(productId, change) {
  await fetch(BASE + "/api/cart/update", {
    method: "PUT",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ productId, change }),
  });
}

async function removeItem(productId) {
  await fetch(BASE + "/api/cart/remove/" + productId, {
    method: "DELETE",
  });
  initCart();
}
