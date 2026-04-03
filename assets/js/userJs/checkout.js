// ==================== PROCEED TO CHECKOUT LOGIC ====================
// ==================== PROCEED TO CHECKOUT LOGIC ====================
async function proceedToCheckout() {
  const userToken = localStorage.getItem("userToken");
  if (!userToken) {
    if (typeof Swal !== 'undefined') {
      Swal.fire({
        title: "Login Required",
        text: "Please login to proceed to checkout.",
        icon: "info",
        showCancelButton: true,
        confirmButtonText: "Login",
        cancelButtonText: "Cancel"
      }).then((result) => {
        if (result.isConfirmed) {
          const authModalEl = document.getElementById('authenticationModal');
          if (authModalEl) {
            const authModal = bootstrap.Modal.getOrCreateInstance(authModalEl);
            authModal.show();
          }
        }
      });
    } else {
      alert("Login Required. Please login.");
    }
    return;
  }

  const currentCoupon = localStorage.getItem("appliedCoupon") || "";
  const payload = { couponCode: currentCoupon };

  const proceedBtn = document.getElementById("proceedToCheckoutBtn");
  if (proceedBtn) {
    proceedBtn.disabled = true;
    proceedBtn.innerText = "Processing...";
  }

  try {
    const res = await fetch(`${BASE}/api/orders/checkout`, {
      method: "POST",
      headers: getHeaders(),
      body: JSON.stringify(payload)
    });

    const data = await res.json();

    console.log("Checkout API Response:", data);

    if (res.ok && data.success === true) {

      // Show full response in alert
      alert("✅ Checkout API Full Response:\n\n" + JSON.stringify(data, null, 2));

      // Pass data to checkout.php via URL
      const encodedData = encodeURIComponent(JSON.stringify(data));
      window.location.href = `checkout.php?checkoutData=${encodedData}`;

    } else {
      if (typeof Swal !== 'undefined') {
        Swal.fire("Failed", data.message || "Unable to proceed to checkout.", "error");
      } else {
        alert(data.message || "Unable to proceed to checkout.");
      }
    }

  } catch (err) {
    console.error("Checkout error:", err);
    alert("Something went wrong. Please try again later.");
  } finally {
    if (proceedBtn) {
      proceedBtn.disabled = false;
      proceedBtn.innerText = "Proceed to checkout";
    }
  }
}

// ================================================
// YOUR ORDER / CHECKOUT PAGE LOGIC
// ================================================



// ================================================
// CHECKOUT PAGE - YOUR ORDER SECTION
// ================================================

document.addEventListener("DOMContentLoaded", function () {
  
  const urlParams = new URLSearchParams(window.location.search);
  const checkoutDataStr = urlParams.get("checkoutData");

  if (!checkoutDataStr) {
    console.warn("No checkout data found in URL!");
    return;
  }

  try {
    const data = JSON.parse(decodeURIComponent(checkoutDataStr));
    renderCheckoutProducts(data);
  } catch (e) {
    console.error("Error parsing checkout data:", e);
  }
});

function renderCheckoutProducts(data) {
  const tbody = document.getElementById("checkoutProduct");
  
  if (!tbody) {
    console.error("❌ checkoutProduct tbody not found!");
    return;
  }

  let html = '';

  // Render Products with Clickable Link
  data.cartItems.forEach(item => {
    const price = parseFloat(item.price) || 0;
    
    html += `
      <tr>
        <td>
          <div class="checkout-product-box">
            <a href="product-detail.php?id=${item.productId}" class="product-image">
              <img src="${BASE}${item.image}" class="img-fluid" alt="${item.productName}">
            </a>
            <div class="product-contain">
              <a href="product-detail.php?id=${item.productId}">
                <h5>${item.productName} <span>x${item.quantity}</span></h5>
              </a>
            </div>
          </div>
        </td>
        <td>₹${price.toLocaleString('en-IN')}</td>
      </tr>
    `;
  });

  // Price Summary
  const subtotal = parseFloat(data.totalAmount) || 0;
  const discount = parseFloat(data.discount) || 0;
  const finalAmount = parseFloat(data.finalAmount) || subtotal;

  html += `
    <tr class="price-tb">
      <td>Subtotal</td>
      <td id="subtotalAmount">₹${subtotal.toLocaleString('en-IN')}</td>
    </tr>
  `;

  if (discount > 0) {
    html += `
      <tr class="price-tb">
        <td>Discount ${data.couponCode ? `(${data.couponCode})` : ''}</td>
        <td id="discountAmount">-₹${discount.toLocaleString('en-IN')}</td>
      </tr>
    `;
  }

  html += `
    <tr class="price-tb">
      <td><strong>Total</strong></td>
      <td id="totalAmount"><strong>₹${finalAmount.toLocaleString('en-IN')}</strong></td>
    </tr>
  `;

  tbody.innerHTML = html;
  console.log("✅ Checkout table rendered successfully!");
}
