
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




// ********************************************** update quantity *********************************************

document.addEventListener("click", (e) => {
  const plus = e.target.closest(".qty-btn-plus");
  const minus = e.target.closest(".qty-btn-minus");
  if (!plus && !minus) return;

  const btn = plus || minus;
  const action = plus ? "ADD" : "REMOVE";
  const productId = btn.dataset.id;

  updateQtyRow(productId, action, btn);
});

async function updateQtyRow(productId, action, btn) {
  try {
    const userToken = localStorage.getItem("userToken");

    const headers = { "Content-Type": "application/json" };
    if (userToken) headers["Authorization"] = `Bearer ${userToken}`;

    // 1️⃣ update quantity on server
    await fetch(
      "http://multivendor_backend.workarya.com/api/cart/update-quantity",
      {
        method: "POST",
        headers,
        body: JSON.stringify({ productId, action }),
      }
    );

    // 2️⃣ get fresh cart
    const res = await fetch(
      "http://multivendor_backend.workarya.com/api/cart/list",
      { headers }
    );
    const items = await res.json();

    const item = items.find(x => x.productId === productId);
    if (!item) return;

    // 3️⃣ update only this row UI
    const tr = btn.closest("tr");
    tr.querySelector(".input-qty").value = item.quantity;
    tr.querySelector(".row-total").textContent = "₹" + item.total;

  } catch (err) {
    console.error(err);
  }
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






// ************************************** cart beg header and offcanvas count update **************************************
// document.addEventListener("DOMContentLoaded", loadOffcanvasCart);

// async function loadOffcanvasCart() {
//   const userToken = localStorage.getItem("userToken");
//   const headers = {};
//   if (userToken) headers["Authorization"] = `Bearer ${userToken}`;

//   const res = await fetch(
//     "http://multivendor_backend.workarya.com/api/cart/list",
//     { headers }
//   );

//   const items = await res.json();
//   renderOffcanvasCart(items);
// }

// function renderOffcanvasCart(items) {
//   const list = document.getElementById("offcanvasCartList");
//   const countEl = document.getElementById("cartCount");
//   const subtotalEl = document.getElementById("offcanvasSubtotal");

//   list.innerHTML = "";
//   let subtotal = 0;

//   items.forEach(item => {
//     subtotal += item.total;

//     const li = `
//       <li class="vertical-product-box" data-id="${item.productId}">
//         <a href="product.html?id=${item.productId}" class="product-image">
//           <img src="http://multivendor_backend.workarya.com${item.productImage}" class="img-fluid"/>
//         </a>

//         <div class="product-content">
//           <h5 class="name">${item.productName}</h5>
//           <h5 class="price">₹${item.currentPrice}</h5>

//           <div class="quantity-box qty-container">
//             <button class="btn qty-btn-minus" data-id="${item.productId}">
//               <i class="ri-subtract-line"></i>
//             </button>

//             <input type="number" disabled
//               class="quantity form-control input-qty"
//               value="${item.quantity}">

//             <button class="btn qty-btn-plus" data-id="${item.productId}">
//               <i class="ri-add-line"></i>
//             </button>

//             <button class="btn btn-trash remove-item" data-id="${item.productId}">
//               <i class="ri-delete-bin-line"></i>
//             </button>
//           </div>
//         </div>
//       </li>
//     `;

//     list.insertAdjacentHTML("beforeend", li);
//   });

//   countEl.textContent = items.length;
//   subtotalEl.textContent = "₹" + subtotal.toFixed(2);
// }


// const BASE = "http://multivendor_backend.workarya.com";

// -------------------- INIT --------------------


// const BASE = "http://multivendor_backend.workarya.com";

// -------------------- INIT --------------------
document.addEventListener("DOMContentLoaded", () => {
  loadOffcanvasCart();
  bindCartActions();
});

function getHeaders() {
  const token = localStorage.getItem("userToken");
  const h = { "Content-Type": "application/json" };
  if (token) h["Authorization"] = `Bearer ${token}`;
  return h;
}

// -------------------- LOAD CART --------------------
async function loadOffcanvasCart() {
  try {
    const res = await fetch(`${BASE}/api/cart/list`, { headers: getHeaders() });
    const items = await res.json();
    renderOffcanvasCart(items);
  } catch (err) {
    console.error("Cart load error:", err);
  }
}

// -------------------- RENDER CART --------------------
function renderOffcanvasCart(items) {
  const list = document.getElementById("offcanvasCartList");
  const subtotalEl = document.getElementById("offcanvasSubtotal");

  list.innerHTML = "";
  let subtotal = 0;

  items.forEach(item => {
    subtotal += item.total;

    const li = `
      <li class="vertical-product-box" data-id="${item.productId}" data-unit-price="${item.price}">
        <a href="product.html?id=${item.productId}" class="product-image">
          <img src="${BASE}${item.productImage}" class="img-fluid"/>
        </a>
        <div class="product-content">
          <h5 class="name">${item.productName}</h5>
          <h5 class="price">₹${item.price}</h5>

          <div class="quantity-box qty-container">
            <button class="btn qty-btn-minus" data-id="${item.productId}">
              <i class="ri-subtract-line"></i>
            </button>

            <button class="btn btn-trash remove-item" data-id="${item.productId}">
              <i class="ri-delete-bin-line"></i>
            </button>

            <input type="number" disabled class="quantity form-control input-qty" value="${item.quantity}">

            <button class="btn qty-btn-plus" data-id="${item.productId}">
              <i class="ri-add-line"></i>
            </button>
          </div>
        </div>

        <button class="btn close-button" data-id="${item.productId}">
          <i class="ri-delete-bin-line"></i>
        </button>
      </li>
    `;

    list.insertAdjacentHTML("beforeend", li);
  });

  subtotalEl.textContent = "₹" + subtotal.toFixed(2);
  initQtyUI();
}

// -------------------- UI TOGGLE --------------------
function toggleUI(li, qty) {
  const minus = li.querySelector(".qty-btn-minus");
  const plus  = li.querySelector(".qty-btn-plus");
  const trash = li.querySelector(".btn-trash");
  const qtyInput = li.querySelector(".input-qty");
  const closeBtn = li.querySelector(".close-button");

  if (qty <= 1) {
    trash.style.display = "inline-block";
    minus.style.display = "none";
    qtyInput.style.display = "none";
    plus.style.display = "inline-block";
    closeBtn.style.display = "none";
  } else {
    trash.style.display = "none";
    minus.style.display = "inline-block";
    qtyInput.style.display = "block";
    plus.style.display = "inline-block";
    closeBtn.style.display = "block";
  }
}

function initQtyUI() {
  document.querySelectorAll(".vertical-product-box").forEach(li => {
    const qty = parseInt(li.querySelector(".input-qty").value);
    toggleUI(li, qty);
  });
}

// -------------------- CART ACTIONS --------------------
function bindCartActions() {
  document.addEventListener("click", async e => {
    const li = e.target.closest(".vertical-product-box");
    if (!li) return;

    const id = li.dataset.id;
    const qtyInput = li.querySelector(".input-qty");
    const priceEl = li.querySelector(".price");
    const unitPrice = parseFloat(li.dataset.unitPrice);
    let qty = parseInt(qtyInput.value);

    // LEFT DELETE (qty = 1)
    if (e.target.closest(".btn-trash")) {
      await removeItem(id);
      li.remove();
      refreshSubtotal();
      return;
    }

    // PLUS
    if (e.target.closest(".qty-btn-plus")) {
      qty++;
      await updateQty(id, qty);
      qtyInput.value = qty;
      toggleUI(li, qty);
    }

    // MINUS
    if (e.target.closest(".qty-btn-minus")) {
      qty--;
      if (qty <= 1) qty = 1;
      await updateQty(id, qty);
      qtyInput.value = qty;
      toggleUI(li, qty);
    }

    // TOP DELETE
    if (e.target.closest(".close-button")) {
      await removeItem(id);
      li.remove();
      refreshSubtotal();
      return;
    }

    // Update line-item price
    priceEl.innerText = "₹" + (unitPrice * qty).toFixed(2);

    // Update subtotal
    refreshSubtotal();
  });
}

// -------------------- API --------------------
async function updateQty(productId, quantity) {
  try {
    await fetch(`${BASE}/api/cart/update`, {
      method: "PUT",
      headers: getHeaders(),
      body: JSON.stringify({ productId, quantity })
    });
  } catch (err) {
    console.error("Update qty error:", err);
  }
}

async function removeItem(productId) {
  try {
    await fetch(`${BASE}/api/cart/remove`, {
      method: "DELETE",
      headers: getHeaders(),
      body: JSON.stringify({ productId })
    });
  } catch (err) {
    console.error("Remove item error:", err);
  }
}

// -------------------- SUBTOTAL --------------------
function refreshSubtotal() {
  let total = 0;
  document.querySelectorAll(".vertical-product-box").forEach(li => {
    const priceText = li.querySelector(".price").innerText.replace(/[^\d.]/g, "");
    const price = parseFloat(priceText) || 0;
    total += price;
  });
  document.getElementById("offcanvasSubtotal").innerText = "₹" + total.toFixed(2);
}
