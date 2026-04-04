/**=====================
    Wishlist Notify Js
==========================**/
document.addEventListener("DOMContentLoaded", () => {
    const BASE_URL = "https://api.workarya.com";
    let fadeOutTimeout;

    // Use event delegation so dynamically generated products also work
    document.addEventListener('click', async (e) => {
        const icon = e.target.closest('.wishlistProduct');
        if (!icon) return;
        
        e.preventDefault();

        const productId = icon.getAttribute('data-id');
        if (!productId) {
            console.warn("Product ID not found on this wishlist button.");
            return;
        }

        const userToken = localStorage.getItem("userToken");
        if (!userToken) {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: "Login Required",
                    text: "Please login to add items to your wishlist.",
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
                alert("Please login to add to wishlist");
            }
            return;
        }

        try {
            // Call API to add to wishlist
            const response = await fetch(`${BASE_URL}/api/user/add/${productId}`, {
                method: 'POST', // POST is standard for inserting data
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${userToken}`
                }
            });

            // Fallback to GET just in case the server expects GET requests for this endpoint
            let data;
            if (response.status === 405 || response.status === 404) {
                const getResponse = await fetch(`${BASE_URL}/api/user/add/${productId}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${userToken}`
                    }
                });
                data = await getResponse.json();
            } else {
                data = await response.json();
            }

            if ((response.ok || data.success) && !data.error) {
                // Toggle icon visual state
                const isAdded = !icon.classList.contains('show');
                icon.classList.toggle('show');

                // Extract product info for popup
                const productBox = icon.closest('.productMain') || icon.closest('.product-box-4-main');
                const productImageEl = productBox ? productBox.querySelector('.productImage') : null;
                const productNameEl = productBox ? productBox.querySelector('.productName') : null;

                const productImage = productImageEl ? (productImageEl.src || productImageEl.getAttribute('src')) : '../assets/images/product/placeholder.png';
                const productName = productNameEl ? productNameEl.textContent.trim() : 'Product';

                // Show sidebar alert popup
                showWishlistPopup(productImage, productName, isAdded, icon);

                // Re-fetch wishlist to update counts anywhere else on the page
                if (typeof loadWishlist === 'function') {
                    loadWishlist();
                }
            } else {
                if (typeof Swal !== 'undefined') {
                    Swal.fire("Failed", data.message || "Could not update wishlist", "error");
                } else {
                    alert(data.message || "Could not update wishlist");
                }
            }
        } catch (err) {
            console.error("Wishlist API Error:", err);
        }
    });

    function showWishlistPopup(imgSrc, name, isAdded, iconNode) {
        const alertBox = document.getElementById('alertBox');
        const alertMessage = document.getElementById('alertMessage');
        const progressBar = document.getElementById('progressBar');
        const removeButton = alertBox ? alertBox.querySelector('.remove-wishlist') : null;

        if (!alertBox || !alertMessage || !progressBar) return;

        const message = isAdded ? 'Product added successfully' : 'Product removed successfully';

        alertMessage.innerHTML = `
            <h4>${message}</h4>
            <div class="alert-image d-flex align-items-center mt-2">
                <img src="${imgSrc}" alt="Product" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;"/>
                <h5 class="ms-3 mb-0">${name}</h5>
            </div>
        `;

        alertBox.classList.toggle('added', isAdded);
        alertBox.classList.toggle('removed', !isAdded);

        alertBox.style.display = 'block';
        alertBox.style.opacity = '0';
        alertBox.style.transform = 'translateY(-20px)';

        let opacity = 0;
        let translateY = -20;
        const fadeIn = setInterval(() => {
            if (opacity < 1) {
                opacity += 0.05;
                translateY += 1;
                alertBox.style.opacity = opacity.toFixed(2);
                alertBox.style.transform = `translateY(${translateY}px)`;
            } else {
                clearInterval(fadeIn);
            }
        }, 16);

        progressBar.offsetWidth; // Trigger reflow
        progressBar.style.animation = 'progressBarAnimation 2.5s linear forwards';

        clearTimeout(fadeOutTimeout);
        function startFadeOut() {
            fadeOutTimeout = setTimeout(() => {
                let opacityOut = 1;
                let translateOut = 0;
                const fadeOut = setInterval(() => {
                    if (opacityOut > 0) {
                        opacityOut -= 0.05;
                        translateOut -= 1;
                        alertBox.style.opacity = opacityOut.toFixed(2);
                        alertBox.style.transform = `translateY(${translateOut}px)`;
                    } else {
                        clearInterval(fadeOut);
                        alertBox.style.display = 'none';
                    }
                }, 16);
            }, 2500);
        }

        startFadeOut();

        alertBox.onmouseenter = () => clearTimeout(fadeOutTimeout);
        alertBox.onmouseleave = startFadeOut;

        if (removeButton) {
            removeButton.textContent = isAdded ? 'Remove Wishlist' : 'Add to Wishlist';
            removeButton.onclick = () => {
                alertBox.style.display = 'none';
                if (iconNode) iconNode.click(); // Quick revert by triggering the icon again
            };
        }
    }

    // Hide the notification early if they decide to add to cart directly from it
    const addCartButton = document.querySelector('.alert-box .add-cart-btn');
    if (addCartButton) {
        addCartButton.addEventListener('click', () => {
            const alertBox = document.getElementById('alertBox');
            if (alertBox) {
                alertBox.style.display = 'none';
            }
        });
    }
});
