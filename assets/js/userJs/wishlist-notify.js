/**=====================
    Wishlist Notify Js
==========================**/
document.addEventListener("DOMContentLoaded", () => {
    const BASE_URL = "https://api.workarya.com";
    let fadeOutTimeout;

    window.loadWishlist = async function() {
        const userToken = localStorage.getItem("userToken");
        if (!userToken) return;

        try {
            const response = await fetch(`${BASE_URL}/api/user/list`, {
                headers: { 'Authorization': `Bearer ${userToken}` }
            });
            const data = await response.json();
            const items = data.data || data || [];
            
            // Update wishlist count in header badges
            const countElements = document.querySelectorAll('#wishlistCount span, .wishlistCount span, #wishlistCount, .wishlistCount, .wishlist-qty');
            countElements.forEach(el => {
                if (el.textContent.includes('(')) {
                    el.textContent = `(${items.length})`;
                } else {
                    el.textContent = items.length;
                }
            });

            // Update container in wishlist.php if we are on that page
            const container = document.getElementById('wishlistContainer');
            if (container) {
                renderWishlistItems(items, container);
            }

            // Synchronize heart icons globally so they turn red if the product is in the wishlist
            document.querySelectorAll('.wishlistProduct').forEach(icon => {
                const id = icon.getAttribute('data-id');
                const inWishlist = items.some(item => {
                    const p = item.product || item;
                    return (p._id === id || p.id === id || item.productId === id);
                });
                
                const iTag = icon.querySelector('i');
                if (inWishlist) {
                    icon.classList.add('show');
                    if(iTag) {
                        iTag.classList.replace('ri-heart-3-line', 'ri-heart-3-fill');
                        iTag.style.color = 'red';
                    }
                } else {
                    icon.classList.remove('show');
                    if(iTag) {
                        iTag.classList.replace('ri-heart-3-fill', 'ri-heart-3-line');
                        iTag.style.color = '';
                    }
                }
            });
        } catch (err) {
            console.error("Error loading wishlist:", err);
        }
    };

    function renderWishlistItems(items, container) {
        if (!items || items.length === 0) {
            container.innerHTML = `<div class="col-12 text-center py-5 w-100"><h4 class="text-muted">Your wishlist is empty.</h4></div>`;
            return;
        }

        container.innerHTML = items.map(item => {
            const p = item.product || item; 
            const id = p._id || p.id || item.productId;
            const img = p.images?.[0] || p.mainImage || '../assets/images/product/placeholder.png';
            const name = p.name || 'Product Name';
            const price = p.discountPrice || p.price || 0;
            const originalPrice = p.price || 0;

            return `
                <div class="col">
                    <div class="product-box-4-main">
                        <div class="productMain product-box-4 pro-bg-white p-3 border rounded h-100 d-flex flex-column">
                            <div class="product-image text-center mb-3">
                                <a href="product-detail.php?id=${id}">
                                    <img src="${img.startsWith('http') ? img : BASE_URL + img}" class="img-fluid productImage" alt="${name}" style="max-height:150px; object-fit:contain;">
                                </a>
                            </div>
                            <div class="product-content mt-auto text-center">
                                <a href="product-detail.php?id=${id}" class="name text-dark fw-bold mb-2 d-block text-truncate">
                                    <h5>${name}</h5>
                                </a>
                                <h5 class="price text-primary mb-3">₹${price} ${price < originalPrice ? `<del class="text-muted fs-6">₹${originalPrice}</del>` : ''}</h5>
                                <div class="option-box mt-3 d-flex gap-2 justify-content-center">
                                    <button class="btn btn-sm text-white" onclick="addToCart('${id}', 1, ${price})" style="background-color: var(--theme-color);">Add to Cart</button>
                                    <button class="btn btn-sm btn-danger" onclick="removeFromWishlist('${id}')">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }).join('');
    }

    window.removeFromWishlist = async function (productId) {
        const userToken = localStorage.getItem("userToken");
        if (!userToken) return;
        try {
            const response = await fetch(`${BASE_URL}/api/user/delete/${productId}`, {
                method: 'DELETE',
                headers: { 'Authorization': `Bearer ${userToken}` }
            });
            if (response.ok) loadWishlist(); // reload list and counts
        } catch (err) {
            console.error("Error removing from wishlist:", err);
        }
    };

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

        // Check if we need to Add or Delete based on current UI state
        const isCurrentlyAdded = icon.classList.contains('show');
        const apiUrl = isCurrentlyAdded 
            ? `${BASE_URL}/api/user/delete/${productId}`
            : `${BASE_URL}/api/user/add/${productId}`;
        const apiMethod = isCurrentlyAdded ? 'DELETE' : 'POST';

        try {
            const response = await fetch(apiUrl, {
                method: apiMethod,
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${userToken}`
                }
            });

            let data;
            if (!response.ok && apiMethod === 'POST' && (response.status === 405 || response.status === 404)) {
                const getResponse = await fetch(apiUrl, {
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
                const isAdded = !isCurrentlyAdded;
                icon.classList.toggle('show', isAdded);
                
                const iTag = icon.querySelector('i');
                if (iTag) {
                    if (isAdded) {
                        iTag.classList.replace('ri-heart-3-line', 'ri-heart-3-fill');
                        iTag.style.color = 'red';
                    } else {
                        iTag.classList.replace('ri-heart-3-fill', 'ri-heart-3-line');
                        iTag.style.color = '';
                    }
                }

                // Extract product info for popup
                const productBox = icon.closest('.productMain') || icon.closest('.product-box-4-main');
                const productImageEl = productBox ? productBox.querySelector('.productImage') : null;
                const productNameEl = productBox ? (productBox.querySelector('.productName') || productBox.querySelector('.name')) : null;

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
    
    // Load the wishlist and update the badge counts the moment the DOM loads
    loadWishlist();
});
