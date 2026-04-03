// =============================================== PLACE ORDER LOGIC ===============================================

document.addEventListener("DOMContentLoaded", function () {
  const placeOrderBtn = document.getElementById("placeOrderBtn");

  if (placeOrderBtn) {
    placeOrderBtn.addEventListener("click", async function () {
      const userToken = localStorage.getItem("userToken");
      if (!userToken) {
        Swal.fire({
          title: "Login Required",
          text: "Please login to place your order",
          icon: "warning",
        });
        return;
      }

      // 1. Selected Address
      const selectedAddressRadio = document.querySelector(
        'input[name="selectedAddressRadio"]:checked',
      );
      if (!selectedAddressRadio) {
        Swal.fire({
          title: "Address Required",
          text: "Please select a delivery address",
          icon: "error",
        });
        return;
      }

      const addressId = selectedAddressRadio.getAttribute("data-address-id");
      if (!addressId) {
        Swal.fire("Error", "Please select a valid address", "error");
        return;
      }

      // 2. Selected Payment Method
      const selectedPaymentRadio = document.querySelector(
        'input[name="paymentMethod"]:checked',
      );
      if (!selectedPaymentRadio) {
        Swal.fire({
          title: "Payment Method Required",
          text: "Please select COD or Razorpay",
          icon: "error",
        });
        return;
      }

      const paymentMethod =
        selectedPaymentRadio.id === "cod" ? "COD" : "RAZORPAY";

      // 3. Get Checkout Data from URL
      const urlParams = new URLSearchParams(window.location.search);
      const checkoutDataStr = urlParams.get("checkoutData");

      if (!checkoutDataStr) {
        Swal.fire({
          title: "Error",
          text: "Checkout data not found. Please go back and try again.",
          icon: "error",
        });
        return;
      }

      let checkoutData;
      try {
        checkoutData = JSON.parse(decodeURIComponent(checkoutDataStr));
      } catch (e) {
        Swal.fire("Error", "Invalid checkout data", "error");
        return;
      }

      // 4. Build Items Array
      const itemsArray = checkoutData.cartItems.map((item) => ({
        productId: item.productId,
        quantity: parseInt(item.quantity) || 1,
      }));

      // 5. Final Order Payload
      const orderPayload = {
        addressId: addressId,
        paymentMethod: paymentMethod,
        couponCode: checkoutData.couponCode || "",
        items: itemsArray,
      };

      console.log("✅ Final Order Payload:", orderPayload);

      // Button Loading
      const originalText = placeOrderBtn.innerHTML;
      placeOrderBtn.disabled = true;
      placeOrderBtn.innerHTML = `Placing Order... <span class="spinner-border spinner-border-sm"></span>`;

      try {
        const response = await fetch(
          "http://multivendor_backend.workarya.com/api/orders/create",
          {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
              Authorization: "Bearer " + userToken,
            },
            body: JSON.stringify(orderPayload),
          },
        );

        const result = await response.json();

        if (response.ok && result.success) {
          // ==================== SUCCESS - Clear LocalStorage ====================
          localStorage.removeItem("checkoutData"); // Main checkout data
          localStorage.removeItem("appliedCoupon"); // Applied Coupon Code
          localStorage.removeItem("couponDiscount"); // Agar extra coupon data save kiya hai to

          Swal.fire({
            title: "🎉 Order Placed Successfully!",
            text: "Thank you for your purchase.",
            icon: "success",
            confirmButtonText: "View My Orders",
          }).then(() => {
            window.location.href = "order-success.php";
          });
        } else {
          Swal.fire({
            title: "Order Failed",
            text: result.message || "Something went wrong while placing order",
            icon: "error",
          });
        }
      } catch (error) {
        console.error("Order Error:", error);
        Swal.fire({
          title: "Network Error",
          text: "Please check your internet connection and try again.",
          icon: "error",
        });
      } finally {
        placeOrderBtn.disabled = false;
        placeOrderBtn.innerHTML = originalText;
      }
    });
  }

  // Load saved addresses
  loadSavedAddresses();
});

// ====================== LOAD SAVED ADDRESSES ======================
async function loadSavedAddresses() {
  const container = document.getElementById("addressListContainer");
  const loadingEl = document.getElementById("addressLoading");

  if (!container) return;

  const userToken = localStorage.getItem("userToken");
  if (!userToken) {
    container.innerHTML = `<p class="text-danger text-center py-3">Please login to view addresses.</p>`;
    return;
  }

  try {
    if (loadingEl) loadingEl.style.display = "block";

    const response = await fetch(
      "http://multivendor_backend.workarya.com/api/address/list",
      {
        method: "GET",
        headers: {
          "Content-Type": "application/json",
          Authorization: "Bearer " + userToken,
        },
      },
    );

    if (!response.ok) throw new Error("Failed to fetch addresses");

    const addresses = await response.json();

    if (loadingEl) loadingEl.style.display = "none";

    if (!addresses || addresses.length === 0) {
      container.innerHTML = `<p class="text-muted text-center py-4">No saved addresses found.</p>`;
      return;
    }

    let html = "";

    addresses.forEach((addr, index) => {
      const collapseId = `savedAddr${index}`;
      const radioId = `addressRadio${index}`;
      const isFirst = index === 0;

      const fullAddress = [addr.addressLine1, addr.addressLine2]
        .filter(Boolean)
        .join(", ");

      html += `
<div class="accordion-item mb-3">
    <h2 class="accordion-header" id="heading${addr.id}">
        <button class="accordion-button ${isFirst ? "" : "collapsed"} d-flex align-items-center gap-2" 
                type="button"
                data-bs-toggle="collapse" 
                data-bs-target="#${collapseId}">

            <input class="form-check-input"
                   name="selectedAddressRadio"
                   type="radio"
                   id="${radioId}"
                   data-address-id="${addr.id}"
                   ${isFirst ? "checked" : ""}>

            <label class="form-check-label m-0" for="${radioId}">
                ${addr.addressType || "Home"} 
                
            </label>

        </button>
    </h2>

    <div id="${collapseId}" 
         class="accordion-collapse collapse ${isFirst ? "show" : ""}" 
         data-bs-parent="#savedAddressAccordion">
        <div class="accordion-body">
            <h5 class="fw-bold mb-2">${addr.fullName}</h5>
            <p class="mb-1">${fullAddress}</p>
            <p class="mb-1">${addr.city}, ${addr.state} - ${addr.postalCode}</p>
            <p class="mb-0">📞 ${addr.phoneNumber}</p>
        </div>
    </div>
</div>`;
    });

    container.innerHTML = html;
  } catch (error) {
    console.error("Error loading addresses:", error);
    if (loadingEl) loadingEl.style.display = "none";
    if (container) {
      container.innerHTML = `<p class="text-danger text-center py-4">Failed to load addresses. Please try again.</p>`;
    }
  }
}

// respnse

// {
//     "addressId": "984cb4b4-10e1-48f4-bb18-dcb28ae93ba3",
//     "paymentMethod": "COD",
//     "couponCode": "",
//     "items": [
//         {
//             "productId": "7368857a-70a7-478e-aabd-5f1fff5dbe1c",
//             "quantity": 1
//         }
//     ]
// }
