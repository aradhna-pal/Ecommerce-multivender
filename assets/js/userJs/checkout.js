

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
  const payload = {
    couponCode: currentCoupon
  };

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
    alert("Checkout API Response: " + JSON.stringify(data));

    if (res.ok && data.success !== false) {
      window.location.href = "checkout.php";
    } else {
      if (typeof Swal !== 'undefined') {
        Swal.fire("Failed", data.message || "Unable to proceed to checkout.", "error");
      } else {
        alert(data.message || "Unable to proceed to checkout.");
      }
      if (proceedBtn) {
        proceedBtn.disabled = false;
        proceedBtn.innerText = "Proceed to checkout";
      }
    }
  } catch (err) {
    console.error("Checkout error:", err);
    alert("Something went wrong. Please try again later.");
    if (proceedBtn) {
      proceedBtn.disabled = false;
      proceedBtn.innerText = "Proceed to checkout";
    }
  }
}