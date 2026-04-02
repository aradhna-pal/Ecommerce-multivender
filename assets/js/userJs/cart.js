// ==================== CONFIG ====================
// const BASE = "http://multivendor_backend.workarya.com";

const API = {
  applyCoupon: `${BASE}/api/coupon/apply`,
  list: `${BASE}/api/cart/list`,
  updateQuantity: `${BASE}/api/cart/update-quantity`,
  remove: `${BASE}/api/cart/remove`,
  clear: `${BASE}/api/cart/clear`
};

// ==================== HEADERS ====================
function getHeaders() {
  const token = localStorage.getItem("userToken");
  const headers = { "Content-Type": "application/json" };
  if (token) headers["Authorization"] = `Bearer ${token}`;
  return headers;
}

// ==================== GLOBAL STATE ====================
let currentCartData = { items: [], subTotal: 0, couponCode: "" };

// ==================== INIT ====================
document.addEventListener("DOMContentLoaded", () => {
  initMainCart();
  loadOffcanvasCart();
});

// ==================== MAIN CART ====================
async function initMainCart(coupon = "") {
  try {
    const res = await fetch(API.list, { 
      method: "POST",
      headers: getHeaders(),
      body: JSON.stringify({ couponCode: coupon || currentCartData.couponCode || "" })
    });
    const data = await res.json();
    // Store the latest cart data globally
    currentCartData = data;

    const items = data.items || [];
    renderMainCart(items);
    updateCartSummary(data);   // Update summary box
  } catch (err) {
    console.error("Main cart load error:", err);
  }
}

function renderMainCart(items) {
  const tbody = document.getElementById("cartTableBody");
  const countSpan = document.querySelector("#cartCount span");
  if (!tbody) return;

  tbody.innerHTML = "";
  countSpan.textContent = `(${items.length})`;

  items.forEach((item) => {
    const rowHTML = `
      <tr class="table-row" data-product-id="${item.productId}">
        <td>
          <div class="cart-box">
            <div class="cart-image">
              <a href="product.html?id=${item.productId}">
                <img src="${BASE}${item.productImage}" class="img-fluid" alt="${item.productName}">
              </a>
            </div>
            <div class="cart-contain">
              <a href="product.html?id=${item.productId}">
                <h3>${item.productName}</h3>
              </a>
            </div>
          </div>
        </td>
        <td>
          <div class="quantity-box qty-container quantity-box-2">
            <button class="btn qty-btn-minus" data-id="${item.productId}"><i class="ri-subtract-line"></i></button>
            <input type="number" disabled class="quantity form-control input-qty" value="${item.quantity}">
            <button class="btn qty-btn-plus" data-id="${item.productId}"><i class="ri-add-line"></i></button>
          </div>
        </td>
        <td>
          <button class="remove-row btn" data-id="${item.productId}">
            <i class="ri-delete-bin-7-line"></i>
          </button>
        </td>
        <td>
          <h4 class="h5 row-total">₹${item.total}</h4>
        </td>
      </tr>
    `;
    tbody.insertAdjacentHTML("beforeend", rowHTML);
  });
}

// ==================== CART SUMMARY BOX ====================
function updateCartSummary(data) {
  const subTotalEl = document.querySelector(".summery-contain ul li:nth-child(1) .price");
  const couponDiscountEl = document.querySelector(".summery-contain ul li:nth-child(2) .price");
  const shippingEl = document.querySelector(".summery-contain ul li:nth-child(3) .price");
  const finalTotalEl = document.querySelector(".summery-total .price");

  if (subTotalEl) subTotalEl.textContent = `₹${(data.subTotal || 0).toFixed(2)}`;
  if (couponDiscountEl) couponDiscountEl.textContent = `(-) ₹${(data.discount || 0).toFixed(2)}`;
  
  // Shipping - assuming it's not coming from API yet, keeping static or set to 0
  if (shippingEl) shippingEl.textContent = "₹0.00";

  if (finalTotalEl) finalTotalEl.textContent = `₹${(data.finalTotal || data.subTotal || 0).toFixed(2)}`;
}

// ==================== CORE FUNCTIONS ====================
async function updateQuantity(productId, action) {
  try {
    const headers = getHeaders();
    await fetch(API.updateQuantity, {
      method: "POST",
      headers,
      body: JSON.stringify({ productId, action })
    });
    await refreshAllCarts();
  } catch (err) {
    console.error("Quantity update failed:", err);
    Swal.fire("Error", "Failed to update quantity", "error");
  }
}

async function removeCartItem(productId) {
  const result = await Swal.fire({
    title: "Remove item?",
    text: "This product will be removed from your cart.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, remove it"
  });

  if (!result.isConfirmed) return;

  try {
    const headers = getHeaders();
    const res = await fetch(API.remove, {
      method: "DELETE",
      headers,
      body: JSON.stringify({ productId })
    });

    if (res.ok) {
      Swal.fire({
        icon: "success",
        title: "Item removed!",
        timer: 1200,
        showConfirmButton: false
      });
      await refreshAllCarts();
    } else {
      Swal.fire("Failed", "Unable to remove item", "error");
    }
  } catch (err) {
    Swal.fire("Error", "Something went wrong", "error");
  }
}

async function clearCart() {
  const result = await Swal.fire({
    title: "Clear entire cart?",
    text: "All items will be removed.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, clear it"
  });

  if (!result.isConfirmed) return;

  try {
    const res = await fetch(API.clear, {
      method: "DELETE",
      headers: getHeaders()
    });

    if (res.ok) {
      Swal.fire({
        icon: "success",
        title: "Cart Cleared!",
        timer: 1500,
        showConfirmButton: false
      });
      await refreshAllCarts();
    }
  } catch (err) {
    Swal.fire("Error", "Something went wrong", "error");
  }
}

async function refreshAllCarts() {
  await initMainCart();        // This will also update summary
  await loadOffcanvasCart();
}

// ==================== COUPON CODE LOGIC (NEW) ====================
async function applyCoupon() {
  const couponInput = document.getElementById("couponCodeInput");
  const couponCode = couponInput.value.trim();

  if (!couponCode) {
    Swal.fire("Error", "Please enter a coupon code.", "error");
    return;
  }

  if (!currentCartData || currentCartData.items.length === 0) {
    Swal.fire("Error", "Your cart is empty. Add items before applying a coupon.", "error");
    return;
  }

  // API 1: Validate Coupon
  try {
    const applyPayload = {
      couponCode: couponCode,
      cartAmount: currentCartData.subTotal,
      productIds: currentCartData.items.map(item => item.productId)
    };

    const applyRes = await fetch(API.applyCoupon, {
      method: "POST",
      headers: getHeaders(),
      body: JSON.stringify(applyPayload)
    });

    const applyData = await applyRes.json();

    if (!applyData.success) {
      throw new Error(applyData.message || "Invalid or expired coupon code.");
    }

    // API 2: If validation is successful, refresh the cart with the coupon applied
    await initMainCart(couponCode);
    Swal.fire("Success!", "Coupon applied successfully.", "success");

  } catch (err) {
    Swal.fire("Error", err.message, "error");
  }
}

// ==================== OFFCANVAS CART ====================
async function loadOffcanvasCart() {
  try {
    const res = await fetch(API.list, { 
      method: "POST",
      headers: getHeaders(),
      body: JSON.stringify({ couponCode: "" })
    });
    const data = await res.json();
    const items = data.items || [];
    renderOffcanvasCart(items);
  } catch (err) {
    console.error("Offcanvas cart load error:", err);
  }
}

function renderOffcanvasCart(items) {
  const list = document.getElementById("offcanvasCartList");
  const subtotalEl = document.getElementById("offcanvasSubtotal");
  const countEl = document.getElementById("cartCount");

  if (!list) return;

  list.innerHTML = "";
  let subtotal = 0;

  items.forEach(item => {
    const itemTotal = item.total || item.currentPrice || (item.price * item.quantity);
    subtotal += itemTotal;

    const li = `
      <li class="vertical-product-box" data-id="${item.productId}" data-unit-price="${item.price || item.currentPrice}">
        <a href="product.html?id=${item.productId}" class="product-image">
          <img src="${BASE}${item.productImage}" class="img-fluid" alt="${item.productName}">
        </a>
        
        <div class="product-content">
          <div class="d-flex justify-content-between align-items-start">
            <h5 class="name">${item.productName}</h5>
            
            <!-- DELETE ICON - Top Right -->
            <button class="btn btn-trash remove-item" data-id="${item.productId}" style="color: #dc3545; font-size: 18px; padding: 4px;">
              <i class="ri-delete-bin-line"></i>
            </button>
          </div>
          
          <h5 class="price">₹${itemTotal}</h5>

          <div class="quantity-box qty-container d-flex align-items-center gap-2 mt-2">
            <button class="btn qty-btn-minus" data-id="${item.productId}">
              <i class="ri-subtract-line"></i>
            </button>

            <input type="number" disabled 
                   class="quantity form-control input-qty text-center" 
                   value="${item.quantity}" 
                   style="width: 20px;">

            <button class="btn qty-btn-plus" data-id="${item.productId}">
              <i class="ri-add-line"></i>
            </button>
          </div>
        </div>
      </li>
    `;

    list.insertAdjacentHTML("beforeend", li);
  });

  subtotalEl.textContent = "₹" + subtotal.toFixed(2);
  if (countEl) countEl.textContent = items.length;
}

// ==================== GLOBAL CLICK HANDLER ====================
document.addEventListener("click", async (e) => {
  const plusBtn = e.target.closest(".qty-btn-plus");
  const minusBtn = e.target.closest(".qty-btn-minus");
  const trashBtn = e.target.closest(".btn-trash");
  const removeRowBtn = e.target.closest(".remove-row");

  if (plusBtn || minusBtn) {
    const btn = plusBtn || minusBtn;
    const productId = btn.dataset.id;
    const action = plusBtn ? "ADD" : "REMOVE";
    await updateQuantity(productId, action);
    return;
  }

  if (trashBtn) {
    const productId = trashBtn.dataset.id;
    await removeCartItem(productId);
    return;
  }

  if (removeRowBtn) {
    const productId = removeRowBtn.dataset.id;
    await removeCartItem(productId);
    return;
  }

  if (e.target.closest(".clear-btn")) {
    await clearCart();
  }

  // APPLY COUPON BUTTON (NEW)
  if (e.target.closest("#applyCouponBtn")) {
    e.preventDefault();
    await applyCoupon();
  }
});