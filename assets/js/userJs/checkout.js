document.addEventListener("DOMContentLoaded", function () {
  const userToken = localStorage.getItem("userToken");

  // 1. If accessed directly without token, block access and show login
  if (!userToken) {
    const checkoutSection = document.querySelector(".checkout-section-new");
    if (checkoutSection) checkoutSection.style.display = "none";

    if (typeof Swal !== 'undefined') {
      Swal.fire({
        title: "Login Required",
        text: "Please login to access the checkout page.",
        icon: "warning",
        allowOutsideClick: false,
        allowEscapeKey: false,
        confirmButtonText: "Login"
      }).then((result) => {
        if (result.isConfirmed) {
          const authModalEl = document.getElementById('authenticationModal');
          if (authModalEl) {
            const authModal = bootstrap.Modal.getOrCreateInstance(authModalEl);
            authModal.show();
            
            authModalEl.addEventListener('hidden.bs.modal', function () {
              if (!localStorage.getItem("userToken")) {
                window.location.href = "index.php"; 
              } else {
                window.location.reload(); 
              }
            });
          }
        }
      });
    }
    return; // Stop checkout initialization
  }

  // Get and remove applied coupon from local storage immediately on page load
  let currentCoupon = localStorage.getItem("appliedCoupon") || "";

  const placeOrderBtn = document.getElementById("placeOrderBtn");
  
  if (placeOrderBtn) {
    placeOrderBtn.addEventListener("click", async function (e) {
      e.preventDefault();
      
      const userToken = localStorage.getItem("userToken");
      if (!userToken) {
        if (typeof Swal !== 'undefined') {
          Swal.fire({
            title: "Login Required",
            text: "Please login to place an order.",
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

      const payload = {
        couponCode: currentCoupon
        // NOTE: Add the rest of your form checkout data here later!
      };

      alert("Checkout Payload: " + JSON.stringify(payload)); // Debug alert

      placeOrderBtn.disabled = true;
      placeOrderBtn.innerText = "Processing...";

      try {
        // Show processing alert
        if (typeof Swal !== 'undefined') {
          Swal.fire({
            title: "Processing...",
            text: "Please wait while we place your order.",
            allowOutsideClick: false,
            didOpen: () => { Swal.showLoading(); }
          });
        }

        const res = await fetch("http://multivendor_backend.workarya.com/api/orders/checkout", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "Authorization": `Bearer ${userToken}`
          },
          body: JSON.stringify(payload)
        });

        const data = await res.json();
        console.log("Checkout API Response:", data);
        alert("Checkout API Response: " + JSON.stringify(data)); // Debug alert

        if (res.ok && data.success !== false) {
          if (typeof Swal !== 'undefined') {
            await Swal.fire({
              icon: "success",
              title: "Order Placed Successfully!",
              text: "Redirecting to order success page...",
              timer: 2000,
              showConfirmButton: false
            });
          }
          window.location.href = "order-success.html";
        } else {
          if (typeof Swal !== 'undefined') Swal.fire("Failed", data.message || "Unable to place order.", "error");
          else alert(data.message || "Unable to place order.");
        }
      } catch (err) {
        console.error("Checkout error:", err);
        if (typeof Swal !== 'undefined') Swal.fire("Error", "Something went wrong. Please try again later.", "error");
        else alert("Something went wrong. Please try again later.");
      } finally {
        placeOrderBtn.disabled = false;
        placeOrderBtn.innerText = "Place Order";
      }
    });
  }
});