let qvName, qvDesc, qvPrice, qvImages, qvIndex, qvMainImg, qvThumbs, qvColors, qvSizes, quickModal;
let currentFilters = null;


window.applyFilters = function (filters) {
    currentFilters = filters;
    loadProducts(1, 50);
};



document.addEventListener("DOMContentLoaded", () => {
  // Initialize quick view modal elements
  qvName = document.getElementById("qvName");
  qvDesc = document.getElementById("qvDesc");
  qvPrice = document.getElementById("qvPrice");
  qvMainImg = document.getElementById("qvMainImg");
  qvThumbs = document.getElementById("qvThumbs");
  qvColors = document.getElementById("qvColors");
  qvSizes = document.getElementById("qvSizes");
  
  // Initialize modal
  const el = document.getElementById("quickViewModal");
  if (el) {
    quickModal = new bootstrap.Modal(el);
    el.addEventListener("hidden.bs.modal", () => {
      document.body.classList.remove("modal-open");
      document.querySelectorAll(".modal-backdrop").forEach((b) => b.remove());
    });
  }
  
  loadProducts(1, 50);
});


function closeSidebar() {
  document
    .querySelectorAll(".select-option-box")
    .forEach((b) => b.classList.remove("show"));
}

function openOptions(btn) {
  const card = btn.closest(".col");
  const box = card.querySelector(".select-option-box");
  box.classList.add("show");
}
// Quick View Function - Fetches full product data and populates modal
async function openQuickView(productId) {
  try {
    console.log("Fetching products list for quick view, looking for ID:", productId);
    const res = await fetch(`${BASE}/api/products/list`);
    if (!res.ok) {
      throw new Error(`HTTP error! status: ${res.status}`);
    }
    const json = await res.json();
    let products = [];
    if (json.success && json.data) {
      products = json.data.data || json.data || [];
      console.log("Products list fetched:", products.length, "products");
    } else {
      console.warn("Products list not found");
      return;
    }

    // Find the specific product by ID
    const p = products.find(product => product._id === productId || product.id === productId);
    if (!p) {
      console.warn("Product not found in list with ID:", productId);
      return;
    }

    console.log("Found product for quick view:", p);

    // Populate all product details in quick view modal
    if (qvName) qvName.innerText = p.name || "";
    if (qvDesc) qvDesc.innerText = p.shortDescription || "";
    if (qvPrice) qvPrice.innerHTML = `₹${p.discountPrice || p.price || 0} ${p.discountPrice ? `<del>₹${p.price}</del>` : ""}`;

    // Images
    qvImages = [p.mainImage, ...(p.galleryImages || [])].filter(Boolean);
    qvIndex = 0;

    if (qvMainImg && qvImages.length > 0) {
      qvMainImg.src = BASE + qvImages[qvIndex];
    }

    // Thumbnails
    if (qvThumbs) {
      qvThumbs.innerHTML = "";
      qvImages.forEach((src, i) => {
        qvThumbs.innerHTML += `
          <div class="swiper-slide">
            <div class="image-box">
              <img src="${BASE + src}" class="thumb-img" data-i="${i}" style="cursor:pointer">
            </div>
          </div>`;
      });

      // Add click handlers for thumbnails
      setTimeout(() => {
        document.querySelectorAll(".thumb-img").forEach((img) => {
          img.onclick = () => {
            qvIndex = +img.dataset.i;
            if (qvMainImg) qvMainImg.src = img.src;
          };
        });
      }, 50);
    }

    // Colors
    if (qvColors) {
      qvColors.innerHTML = "";
      if (p.colors && p.colors.length > 0) {
        p.colors.forEach((c) => {
          qvColors.innerHTML += `
            <div style="width:30px;height:30px;border-radius:50%;
                        background:${c};border:1px solid #ccc;cursor:pointer;margin:2px;"></div>`;
        });
      }
    }

    // Sizes
    if (qvSizes) {
      qvSizes.innerHTML = "";
      if (p.sizes && p.sizes.length > 0) {
        p.sizes.forEach((s) => {
          qvSizes.innerHTML += `
            <div class="px-3 py-1 border" style="cursor:pointer;margin:2px;">${s}</div>`;
        });
      }
    }

    // Configure Quick View Add to Cart button (Overriding footer.php defaults)
    const quickViewModalEl = document.getElementById("quickViewModal");
    if (quickViewModalEl) {
      const addBtn = quickViewModalEl.querySelector(".buy-btn");
      if (addBtn) {
        addBtn.removeAttribute("onclick"); // Remove existing redirect to cart.html
        addBtn.classList.add("qv-add-cart-btn");
        addBtn.setAttribute("data-id", p._id || p.id);
        addBtn.setAttribute("data-price", p.discountPrice || p.price || 0);
      }
    }

    // Show modal
    if (quickModal) {
      quickModal.show();
    }

  } catch (error) {
    console.error("Error loading quick view:", error);
  }
}



// individual product buy now  ****************************************


const BASE = "https://api.workarya.com";

// Proceed to Checkout Function
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

  try {
    const headers = {
      'Content-Type': 'application/json',
    };
    if (userToken) {
      headers['Authorization'] = `Bearer ${userToken}`;
    }

    const response = await fetch(`${BASE}/api/orders/checkout`, {
      method: 'POST',
      headers: headers,
      body: JSON.stringify(payload)
    });

    const data = await response.json();

    console.log("Checkout API Response:", data);

    if (response.ok && data.success === true) {
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
    if (typeof Swal !== 'undefined') {
      Swal.fire("Error", "Something went wrong. Please try again later.", "error");
    } else {
      alert("Something went wrong. Please try again later.");
    }
  }
}


// individual product buy now  end ****************************************

// Add to Cart Function
async function addToCart(productId, quantity = 1, price) {
  try {
    const payload = {
      productId: productId,
      quantity: quantity,
      price: price
    };

    console.log("Adding to cart with payload:", payload);

    const headers = {
      'Content-Type': 'application/json',
    };
    const userToken = localStorage.getItem("userToken");
    if (userToken) {
      headers['Authorization'] = `Bearer ${userToken}`;
    }

    const response = await fetch(`${BASE}/api/cart/add`, {
      method: 'POST',
      headers: headers,
      body: JSON.stringify(payload)
    });

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const data = await response.json();
    console.log("Add to cart response:", data);

    if (data.success || data.message) {
      // Use SweetAlert if available, otherwise use regular alert
      if (typeof Swal !== 'undefined') {
        Swal.fire({
          icon: 'success',
          title: 'Success!',
          text: 'Product added to cart successfully!',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'OK'
        });
      } else {
        alert("Product added to cart successfully!");
      }

      // Refresh cart displays after adding an item
      if (typeof refreshAllCarts === "function") {
        refreshAllCarts();
      } else if (typeof loadOffcanvasCart === "function") {
        // Fallback for pages that might only have offcanvas logic
        loadOffcanvasCart();
      }

      return true; // Return success
    } else {
      if (typeof Swal !== 'undefined') {
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'Error adding to cart',
          confirmButtonColor: '#d33',
          confirmButtonText: 'OK'
        });
      } else {
        alert("Error adding to cart");
      }
      return false; // Return failure
    }

  } catch (error) {
    console.error("Error adding to cart:", error);
    if (typeof Swal !== 'undefined') {
      Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: 'Error adding to cart: ' + error.message,
        confirmButtonColor: '#d33',
        confirmButtonText: 'OK'
      });
    } else {
      alert("Error adding to cart: " + error.message);
    }
    return false; // Return failure
  }
}

async function loadProducts(page = 1, limit = 50) {
  const container = document.getElementById("productsContainer");
  if (!container) return;

  // Show Spinner Loading State
  container.innerHTML = "";
  container.innerHTML = `
    <div class="col-12 d-flex justify-content-center align-items-center py-5 w-100">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
  `;

  let url = `${BASE}/api/products/list?page=${page}&pageSize=${limit}`;

  // Add search query if present in URL
  const urlParams = new URLSearchParams(window.location.search);
  const searchQuery = urlParams.get('search');
  if (searchQuery) {
      url += `&search=${encodeURIComponent(searchQuery)}`;
  }

  const brandIdQuery = urlParams.get('brandId');
  const categoryIdQuery = urlParams.get('categoryId');
  let hasBrandFilter = false;
  let hasCategoryFilter = false;

  if (currentFilters) {
      if (currentFilters.categories?.length > 0) {
          url += `&categoryIds=${currentFilters.categories.map(c => c.id).join(',')}`;
          hasCategoryFilter = true;
      }
      if (currentFilters.brands?.length > 0) {
          url += `&brandIds=${currentFilters.brands.map(b => b.id).join(',')}`;
          hasBrandFilter = true;
      }
      if (currentFilters.colors?.length > 0) {
          url += `&` + currentFilters.colors.map(c => `colors=${encodeURIComponent(c.name)}`).join('&');
      }
      if (currentFilters.sizes?.length > 0) {
          url += `&` + currentFilters.sizes.map(s => `sizes=${encodeURIComponent(s.name)}`).join('&');
      }
      if (currentFilters.price) {
          url += `&minPrice=${currentFilters.price.min}&maxPrice=${currentFilters.price.max}`;
      }
  }

  if (brandIdQuery && !hasBrandFilter) {
      url += `&brandIds=${encodeURIComponent(brandIdQuery)}`;
  }

  // Apply category ID from URL if not already handled by a sidebar filter selection
  if (categoryIdQuery && !hasCategoryFilter) {
      url += `&categoryIds=${encodeURIComponent(categoryIdQuery)}`;
  }

  try {
      const res = await fetch(url);
      const json = await res.json();
      const products = json?.data?.data || json?.data || [];
      const totalProducts = json?.data?.total || products.length;
      const totalPages = json?.data?.totalPages || Math.ceil(totalProducts  / limit);

      container.innerHTML = "";

      if (products.length === 0) {
          container.innerHTML = `<div class="col-12 text-center py-5 w-100"><h4 class="text-muted">No products found matching your filters.</h4></div>`;
      } else {
          products.forEach((p) => {
              container.insertAdjacentHTML("beforeend", cardHTML(p));
          });
          bindCardEvents();
      }

  renderPagination(totalPages, page);
  } catch (error) {
      console.error("Error loading products:", error);
      container.innerHTML = `<div class="col-12 text-center text-danger py-5 w-100"><h4>Error loading products. Please try again.</h4></div>`;
  }
}

function renderPagination(totalPages, currentPage) {
  const paginationNav = document.querySelector(".custom-pagination .pagination");
  if (!paginationNav) return;

  paginationNav.innerHTML = "";

  // Previous button
  const prevLi = document.createElement("li");
  prevLi.className = `page-item ${currentPage === 1 ? "disabled" : ""}`;
  prevLi.innerHTML = `<a class="page-link" href="#!"><i class="ri-arrow-left-s-line"></i></a>`;
  if (currentPage > 1) {
    prevLi.addEventListener("click", () => loadProducts(currentPage - 1));
  }
  paginationNav.appendChild(prevLi);

  // Page numbers
  for (let i = 1; i <= totalPages; i++) {
    const pageLi = document.createElement("li");
    pageLi.className = `page-item ${i === currentPage ? "active" : ""}`;
    pageLi.innerHTML = `<a class="page-link" href="#!"><span>${i}</span></a>`;
    pageLi.addEventListener("click", () => loadProducts(i));
    paginationNav.appendChild(pageLi);
  }

  // Next button
  const nextLi = document.createElement("li");
  nextLi.className = `page-item ${currentPage === totalPages ? "disabled" : ""}`;
  nextLi.innerHTML = `<a class="page-link" href="#!"><i class="ri-arrow-right-s-line"></i></a>`;
  if (currentPage < totalPages) {
    nextLi.addEventListener("click", () => loadProducts(currentPage + 1));
  }
  paginationNav.appendChild(nextLi);
}

function cardHTML(p) {
  const id = p._id || p.id;
  const img = p.images?.[0] || "../assets/images/product/placeholder.png";

  return `
  <div class="col">
    <div class="product-box-4-main">

      <div class="select-option-box">
        <div class="select-box">
          <div>
            <div class="color-box">
              <h4 class="h5">Colors</h4>
              <ul class="color-list">
                <li><a href="#!" style="background-color:#f4c266;"></a></li>
                <li><a href="#!" style="background-color:#e7e597;"></a></li>
                <li><a href="#!" style="background-color:#6aa473;"></a></li>
              </ul>
            </div>

            <div class="size-box">
              <h4 class="h5">Sizes</h4>
              <ul class="size-list">
                <li><a href="#!">xs</a></li>
                <li><a href="#!">s</a></li>
                <li><a href="#!">m</a></li>
                <li><a href="#!">l</a></li>
                <li><a href="#!">xl</a></li>
              </ul>
            </div>

            <button class="btn add-cart-btn" data-id="${p._id}">add to cart</button>
            <button class="close-btn btn" onclick="closeSidebar()">
              <i class="ri-close-line"></i>
            </button>
          </div>
        </div>
      </div>

      <div class="productMain product-box-4 pro-bg-white">
        <div class="product-image">
          <a href="product-detail.php?id=${id}">
            <img src="${BASE + p.mainImage}" class="img-fluid productImage" alt="">
          </a>

          <div class="quick-view-button-box">
            <button class="btn view-btn quickViewBtn" data-id="${id}">
              Quick View
            </button>
          </div>
        </div>

        <div class="product-content">
          <h5 class="sub-name productName">${p.brandName || ""}</h5>

          <a href="product-detail.php?id=${id}" class="name">
            <h5>${p.name}</h5>
          </a>

          <ul class="rating">
            <li><i class="ri-star-fill fill"></i></li>
            <li><i class="ri-star-fill fill"></i></li>
            <li><i class="ri-star-fill fill"></i></li>
            <li><i class="ri-star-fill fill"></i></li>
            <li><i class="ri-star-fill fill"></i></li>
          </ul>

          

          <h5 class="price">
            ₹${p.discountPrice}
            ${p.discountPrice ? `<del>₹${p.price}</del>` : ""}
          </h5>

          <div class="option-box">
            <button class="btn select-btn" data-id="${id}" onclick="openOptions(this)">Select Options</button>
            <ul class="option-list">
              <li>
               <a class="wishlistProduct" data-id="${id}" style="cursor:pointer">
  <i class="ri-heart-3-line"></i>
</a>
              </li>
              <li>
                <a href="#!">
                  <i class="ri-repeat-2-line"></i>
                </a>
              </li>
            </ul>
          </div>

        </div>
      </div>

    </div>
  </div>`;
}

function bindCardEvents() {
  const container = document.getElementById("productsContainer");
  
  if (!container) {
    console.warn("Products container not found");
    return;
  }

  // Prevent duplicate event bindings if loadProducts is called multiple times
  if (container.dataset.eventsBound) return;
  container.dataset.eventsBound = "true";

  // Use event delegation for all button clicks
  container.addEventListener("click", (e) => {
    // Select Options button
    if (e.target.closest(".select-btn")) {
      const btn = e.target.closest(".select-btn");
      const card = btn.closest(".col");
      const id = btn.dataset.id;
      openOptions(card, id);
    }

    // Quick View button
    if (e.target.closest(".view-btn")) {
      const btn = e.target.closest(".view-btn");
      const id = btn.dataset.id;
      openQuickView(id);
    }

    // Add to Cart button
    if (e.target.closest(".add-cart-btn")) {
      e.preventDefault();
      const btn = e.target.closest(".add-cart-btn");
      const card = btn.closest(".col") || btn.closest(".select-box");
      const productId = btn.getAttribute("data-id");
      
      if (!card) {
        console.error("Product card not found");
        return;
      }

      // Get price from the card
      const priceEl = card.closest(".col")?.querySelector(".price") || 
                      card.querySelector(".price") ||
                      card.closest(".product-box-4-main")?.querySelector(".price");
      
      let price = 0;
      if (priceEl) {
        const priceText = priceEl.innerText;
        const priceMatch = priceText.match(/[\d.]+/);
        price = priceMatch ? parseFloat(priceMatch[0]) : 0;
      }

      if (!productId) {
        console.error("Product ID not found");
        return;
      }

      addToCart(productId, 1, price);
    }
  });
}

// Open Options Function - Fetches product data and populates select options
async function openOptions(card, productId) {
  const box = card?.querySelector(".select-option-box");
  if (!box) return;

  // Show immediately for instant UI feedback
  box.classList.add("show");

  const colorsList = card.querySelector(".color-list");
  const sizesList = card.querySelector(".size-list");

  if (colorsList) colorsList.innerHTML = "<li>Loading colors...</li>";
  if (sizesList) sizesList.innerHTML = "<li>Loading sizes...</li>";

  if (!productId) {
    if (colorsList) colorsList.innerHTML = "<li>No colors available</li>";
    if (sizesList) sizesList.innerHTML = "<li>No sizes available</li>";
    return;
  }

  try {
    console.log("Fetching products list for select options, looking for ID:", productId);
    const res = await fetch(`${BASE}/api/products/list`);
    if (!res.ok) {
      throw new Error(`HTTP error! status: ${res.status}`);
    }
    const json = await res.json();
    let products = [];
    if (json.success && json.data) {
      products = json.data.data || json.data || [];
      console.log("Products list fetched:", products.length, "products");
    } else {
      console.warn("Products list not found");
      throw new Error("Products list not found");
    }

    const p = products.find((product) => product._id === productId || product.id === productId);
    if (!p) {
      console.warn("Product not found in list with ID:", productId);
      if (colorsList) colorsList.innerHTML = "<li>No colors available</li>";
      if (sizesList) sizesList.innerHTML = "<li>No sizes available</li>";
      return;
    }

    console.log("Found product for select options:", p);

    if (colorsList) {
      if (Array.isArray(p.colors) && p.colors.length > 0) {
        colorsList.innerHTML = p.colors
          .map((c) => `<li><a href='#!' style='background-color:${c};'></a></li>`)
          .join("");
      } else {
        colorsList.innerHTML = "<li>No colors available</li>";
      }
    }

    if (sizesList) {
      if (Array.isArray(p.sizes) && p.sizes.length > 0) {
        sizesList.innerHTML = p.sizes
          .map((s) => `<li><a href='#!'>${s}</a></li>`)
          .join("");
      } else {
        sizesList.innerHTML = "<li>No sizes available</li>";
      }
    }

    const addCartBtn = card.querySelector(".add-cart-btn");
    if (addCartBtn) {
      addCartBtn.setAttribute("data-id", productId);
    }

  } catch (error) {
    console.error("Error loading select options:", error);
    if (colorsList) colorsList.innerHTML = "<li>Error loading colors</li>";
    if (sizesList) sizesList.innerHTML = "<li>Error loading sizes</li>";
  }
}

// Product Detail Page Script

// <script>
{
  /* const BASE = "https://api.workarya.com"; */
}

// ==================== RECENT VIEWS API ====================
async function addToRecentViews(productId) {
  if (!productId) return;

  try {
    const userToken = localStorage.getItem("userToken");
    const headers = {
      'Content-Type': 'application/json',
    };

    if (userToken) {
      headers['Authorization'] = `Bearer ${userToken}`;
    }

    const response = await fetch(`${BASE}/api/recent/add/${productId}`, {
      method: 'POST',
      headers: headers,
    });

    const data = await response.json();

    console.log("Recent view API response:", data);

    if (response.ok && (data.success || data.message?.toLowerCase().includes("success"))) {
      console.log(`Product ${productId} added to recent views successfully`);

      // Optional: Show success message (can be removed if you don't want alert every time)
      if (typeof Swal !== 'undefined') {
        Swal.fire({
          icon: 'success',
          title: 'Recent View Updated',
          text: 'Product added to Recently Viewed',
          toast: true,
          position: 'bottom-end',
          showConfirmButton: false,
          timer: 2000,
          timerProgressBar: true
        });
      } else {
        console.log("Product added to recently viewed");
      }
    } else {
      console.warn("Recent view API did not return success:", data.message || data);
    }

  } catch (error) {
    console.error("Error adding to recent views:", error);
    // Silent fail - don't disturb user experience
  }
}

// Product Detail Page Script - Only run on product-detail.php
// Product Detail Page Script - Only run on product-detail.php
if (window.location.pathname.includes('product-detail')) {
  document.addEventListener("DOMContentLoaded", async () => {
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get("id");
    console.log("Product ID from URL:", id);

    if (!id) {
      alert("No product ID provided");
      return;
    }

    try {
      console.log("Fetching product from:", `${BASE}/api/products/get/${id}`);
      const res = await fetch(`${BASE}/api/products/get/${id}`);
      
      if (!res.ok) {
        throw new Error(`HTTP error! status: ${res.status}`);
      }

      const json = await res.json();
      console.log("Full API response:", json);

      let p;
      if (json.success && json.data) {
        p = json.data.data || json.data;

        if (!p || !p.name) {
          throw new Error("Invalid product data structure");
        }

        populateProduct(p);

        // ================ ADD TO RECENT VIEWS ================
        // Call after successfully loading product data
        await addToRecentViews(id);

      } else {
        alert("Product not found or API error");
      }
    } catch (error) {
      console.error("Error fetching product:", error);
      alert("Error loading product: " + error.message);
    }
  });
}

function stripHtml(html) {
  const tempDiv = document.createElement("div");
  tempDiv.innerHTML = html;
  return tempDiv.textContent || tempDiv.innerText || "";
}

function populateProduct(p) {
  console.log("Populating product with data:", p);

  // Images
  const images = [p.mainImage, ...(p.galleryImages || [])].filter(Boolean);
  console.log("Images to display:", images);
  const swiperWrapper = document.querySelector(
    ".product-original-slider .swiper-wrapper",
  );
  const thumbWrapper = document.querySelector(
    ".thumbnail-product-slider .swiper-wrapper",
  );
  if (swiperWrapper) {
    swiperWrapper.innerHTML = "";
    images.forEach((img) => {
      swiperWrapper.innerHTML += `
                                <div class="swiper-slide">
                                    <div class="slider-image">
                                        <img src="${BASE + img}" class="img-fluid" alt="">
                                    </div>
                                </div>`;
    });
    console.log("Updated main images");
  } else {
    console.warn("Main swiper wrapper not found");
  }
  if (thumbWrapper) {
    thumbWrapper.innerHTML = "";
    images.forEach((img) => {
      thumbWrapper.innerHTML += `
                                <div class="swiper-slide">
                                    <div class="sidebar-image">
                                        <img src="${BASE + img}" class="img-fluid" alt="">
                                    </div>
                                </div>`;
    });
    console.log("Updated thumbnail images");
  } else {
    console.warn("Thumbnail swiper wrapper not found");
  }

  // Reinitialize Swiper instances for proper thumbs functionality
  if (typeof Swiper !== 'undefined') {
    // Destroy existing instances if they exist
    const existingMainSwiper = document.querySelector('.product-original-slider').swiper;
    const existingThumbSwiper = document.querySelector('.thumbnail-product-slider').swiper;
    
    if (existingMainSwiper) {
      existingMainSwiper.destroy();
    }
    if (existingThumbSwiper) {
      existingThumbSwiper.destroy();
    }

    // Initialize thumbnail swiper first
    const thumbSwiper = new Swiper('.thumbnail-product-slider', {
      spaceBetween: 15,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
    });

    // Initialize main swiper with thumbs
    const mainSwiper = new Swiper('.product-original-slider', {
      spaceBetween: 10,
      effect: 'fade',
      fadeEffect: {
        crossFade: true
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: thumbSwiper,
      },
    });

    // Add click handlers to thumbnail slides to change main image
    thumbSwiper.slides.forEach((slide, index) => {
      slide.style.cursor = 'pointer';
      slide.addEventListener('click', () => {
        mainSwiper.slideTo(index);
      });
    });

    console.log("Reinitialized Swiper instances with thumbs and click handlers");
  } else {
    console.warn("Swiper library not loaded");
  }

  // Product details
  const productNameEl = document.querySelector(".right-box-contain .name");
  if (productNameEl) {
    productNameEl.innerText = p.name;
    console.log("Updated product name to:", p.name);
  } else {
    console.warn("Product name element not found");
  }

  const priceEl = document.querySelector(".product-price");
  if (priceEl) {
    priceEl.innerHTML = `₹${p.discountPrice} <del>₹${p.price}</del>`;
    console.log("Updated price to:", `₹${p.discountPrice}`);
  } else {
    console.warn("Price element not found");
  }
  const descEl = document.querySelector(".product-contain p");
  if (descEl) {
    descEl.innerText = p.shortDescription;
    console.log("Updated description");
  } else {
    console.warn("Description element not found");
  }

  // Description box
  const descriptionBoxEl = document.querySelector(".description-box p");
  if (descriptionBoxEl) {
    descriptionBoxEl.innerText = stripHtml(p.description || "");
    console.log("Updated description box");
  } else {
    console.warn("Description box element not found");
  }

  ///// SIZES
  const sizeForm = document.querySelector(
    ".select-package:not(.color-product)",
  );
  const sizeSection = sizeForm?.closest(".product-package"); // poora size block

  if (sizeForm && Array.isArray(p.sizes) && p.sizes.length > 0) {
    // show section
    if (sizeSection) sizeSection.style.display = "";

    sizeForm.innerHTML = "";
    p.sizes.forEach((s, i) => {
      sizeForm.insertAdjacentHTML(
        "beforeend",
        `
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="size${i}" ${i === 0 ? "checked" : ""}>
        <label class="form-check-label" for="size${i}">${s}</label>
      </div>
    `,
      );
    });

    console.log("Updated sizes");
  } else {
    // hide entire size block if no sizes
    if (sizeSection) sizeSection.style.display = "none";
    console.warn("No sizes for this product");
  }

  ///// COLORS
  const colorForm = document.querySelector(".color-product");
  const colorSection = colorForm?.closest(".product-package"); // poora color block

  if (colorForm && Array.isArray(p.colors) && p.colors.length > 0) {
    // show section
    if (colorSection) colorSection.style.display = "";

    colorForm.innerHTML = "";
    p.colors.forEach((c, i) => {
      colorForm.insertAdjacentHTML(
        "beforeend",
        `
      <div class="form-check">
        <input class="form-check-input" type="radio" name="colorRadio" id="color${i}" ${i === 0 ? "checked" : ""} style="background-color: ${c};">
        <label class="form-check-label bg-transparent" for="color${i}"></label>
      </div>
    `,
      );
    });

    console.log("Updated colors");
  } else {
    // hide entire color block if no colors
    if (colorSection) colorSection.style.display = "none";
    console.warn("No colors for this product");
  }
  // Description tab
  const descTabEl = document.querySelector("#description .nav-desh p");
  if (descTabEl) {
    descTabEl.innerText = stripHtml(p.description || "");
    console.log("Updated description tab");
  } else {
    console.warn("Description tab element not found");
  }

  // About Item
  const aboutList = document.querySelector(".about-item-list");
  if (aboutList) {
    aboutList.innerHTML = `
                            <li>Brand : <span>${p.brandName || ""}</span></li>
                            <li>Category : <span>${p.categoryName || ""}</span></li>
                            <li>Condition : <span>Brand new</span></li>
                            <li>Color : <span>${(p.colors || [])[0] || ""}</span></li>
                            `;
    console.log("Updated about item list");
  } else {
    console.warn("About item list not found");
  }

  // Sidebar
  const sidebarImg = document.querySelector(
    ".side-product-box .product-image img",
  );
  if (sidebarImg) {
    sidebarImg.src = BASE + p.mainImage;
    console.log("Updated sidebar image");
  } else {
    console.warn("Sidebar image not found");
  }
  const stockEl = document.querySelector(".stock-box span");
  if (stockEl) {
    stockEl.innerText = p.stockQuantity || 0;
    console.log("Updated stock to:", p.stockQuantity);
  } else {
    console.warn("Stock element not found");
  }

  // Selected Options
  const selectedOptionsEl = document.querySelector(
    ".side-product-box .product-contain h4",
  );
  if (selectedOptionsEl) {
    const firstSize = p.sizes && p.sizes.length > 0 ? p.sizes[0] : "";
    const firstColor = p.colors && p.colors.length > 0 ? p.colors[0] : "";
    selectedOptionsEl.innerText = `${firstSize}${firstSize && firstColor ? ", " : ""}${firstColor}`;
    console.log("Updated selected options to:", selectedOptionsEl.innerText);
  } else {
    console.warn("Selected options element not found");
  }

  const h4 = document.querySelector(".total-price-box h4");

  if (h4) {
    // first text node (span se pehle jo price text hota hai)
    const textNode = [...h4.childNodes].find(
      (n) => n.nodeType === Node.TEXT_NODE,
    );

    if (textNode) {
      textNode.nodeValue = `₹${p.discountPrice} `;
    } else {
      // agar text node na mile to naya insert kar do span se pehle
      h4.insertBefore(
        document.createTextNode(`₹${p.discountPrice} `),
        h4.firstChild,
      );
    }
  } else {
    console.warn("Total price element not found");
  }

  // Add button group
  const buttonContainer = document.querySelector(".total-price-box") || document.querySelector(".side-product-box");
  if (buttonContainer) {
    // Remove existing button group if it exists
    const existingButtons = buttonContainer.querySelector(".button-group");
    if (existingButtons) {
      existingButtons.remove();
    }
    
    // Add new button group
    buttonContainer.insertAdjacentHTML("beforeend", `
      <div class="button-group">
        <button class="btn buy-btn-desktop theme-bg-color text-white" data-action="buy-now" data-product-id="${p.id}">Buy now</button>
        <button class="btn add-to-bag-btn buy-btn-2 theme-border fw-500" data-product-id="${p.id}" data-product-price="${p.discountPrice}">
          <i class="ri-shopping-bag-line"></i> Add to bag
        </button>
      </div>
    `);

    console.log("Added button group");
  } else {
    console.warn("Button container not found");
  }

  console.log("Product population completed");
}

// Event delegation for buttons on product detail page
if (!window.cartGlobalClickBound) {
  window.cartGlobalClickBound = true;
  document.addEventListener("click", async (e) => {
    // Desktop "Add to bag" button
    if (e.target.closest(".add-to-bag-btn")) {
      e.preventDefault();
      const btn = e.target.closest(".add-to-bag-btn");
      const productId = btn.getAttribute("data-product-id");
      const price = parseFloat(btn.getAttribute("data-product-price"));

      if (!productId) {
        console.error("Product ID not found");
        return;
      }

      addToCart(productId, 1, price);
    }

    // Desktop "Buy now" button
    if (e.target.closest(".buy-btn-desktop")) {
      e.preventDefault();
      const btn = e.target.closest(".buy-btn-desktop");
      const productId = btn.getAttribute("data-product-id");

      if (!productId) {
        console.error("Product ID not found");
        return;
      }

      // Get the price from the DOM
      const priceEl = document.querySelector(".product-price");
      let price = 0;
      if (priceEl) {
        const priceText = priceEl.innerText;
        const priceMatch = priceText.match(/[\d.]+/);
        price = priceMatch ? parseFloat(priceMatch[0]) : 0;
      }

      if (price === 0) {
        console.warn("Could not extract price from page");
      }

      // First, add to cart
      const addToCartSuccess = await addToCart(productId, 1, price);
      if (addToCartSuccess) {
        // After adding to cart, proceed to checkout
        await proceedToCheckout();
      }
    }

    // Mobile buttons
    if (e.target.closest(".buy-btn-mobile") || e.target.closest(".add-to-bag-btn-mobile")) {
      e.preventDefault();
      const btn = e.target.closest(".buy-btn-mobile") || e.target.closest(".add-to-bag-btn-mobile");
      const action = btn.getAttribute("data-action");
      const urlParams = new URLSearchParams(window.location.search);
      const productId = urlParams.get("id");

      if (!productId) {
        console.error("Product ID not found in URL");
        alert("Product ID not found");
        return;
      }

      if (action === "buy-now") {
        // Redirect to checkout page with product ID
        window.location.href = `checkout.php?id=${productId}`;
      } else if (action === "add-to-cart") {
        // Get the price from the DOM
        const priceEl = document.querySelector(".product-price");
        let price = 0;
        if (priceEl) {
          const priceText = priceEl.innerText;
          const priceMatch = priceText.match(/[\d.]+/);
          price = priceMatch ? parseFloat(priceMatch[0]) : 0;
        }

        if (price === 0) {
          console.warn("Could not extract price from page");
        }

        addToCart(productId, 1, price);
      }
    }

    // Quick View "Add to bag" button
    if (e.target.closest(".qv-add-cart-btn")) {
      e.preventDefault();
      const btn = e.target.closest(".qv-add-cart-btn");
      const productId = btn.getAttribute("data-id");
      const price = parseFloat(btn.getAttribute("data-price")) || 0;

      if (!productId) {
        console.error("Product ID not found");
        return;
      }

      addToCart(productId, 1, price);
    }
  });
}

document.addEventListener("DOMContentLoaded", () => {
  console.log("Product detail page scripts initialized");
  async function loadFlashSaleProducts() {
  const container = document.getElementById("flashSaleContainer");

  if (!container) return;

  try {
    const res = await fetch(`${BASE}/api/products/list?page=1&pageSize=7`);
    const json = await res.json();
    const products = json?.data?.data || json?.data || [];

    if (!products.length) {
      container.innerHTML = `<p>No products found</p>`;
      return;
    }

    container.innerHTML = "";

    products.forEach((p) => {
      container.insertAdjacentHTML("beforeend", flashSaleCardHTML(p));
    });

    // Re-initialize swiper if it exists
    const swiperEl = document.querySelector(".product-slider-7");
    if (swiperEl && swiperEl.swiper) {
      swiperEl.swiper.update();
    }

    // Add event delegation for "Add to cart" in flash sale
    if (!container.dataset.eventsBound) {
      container.dataset.eventsBound = "true";
      container.addEventListener("click", (e) => {
        if (e.target.closest(".add-cart-btn")) {
          e.preventDefault();
          const btn = e.target.closest(".add-cart-btn");
          const productId = btn.getAttribute("data-id");

          let price = 0;
          const card = btn.closest(".product-box");
          if (card) {
            const priceEl = card.querySelector(".price");
            if (priceEl) {
              const priceText = priceEl.innerText;
              const priceMatch = priceText.match(/[\d.]+/);
              price = priceMatch ? parseFloat(priceMatch[0]) : 0;
            }
          }

          if (productId) {
            addToCart(productId, 1, price);
          }
        }
      });
    }
  } catch (err) {
    console.error(err);
    container.innerHTML = `<p>Error loading products</p>`;
  }
}
  loadFlashSaleProducts();
});


function flashSaleCardHTML(p) {
  const id = p._id || p.id;
  const img = p.images?.[0] || p.mainImage || "assets/images/product/placeholder.png";

  return `
    <div class="swiper-slide">
        <div class="product-box productMain">
            <a href="product-detail.php?id=${id}" class="product-image">
                <img src="${img.startsWith('http') ? img : BASE + img}" class="img-fluid productImage" alt="">
            </a>
            <div class="product-content">
                <a href="product-detail.php?id=${id}">
                    <h4 class="productName">${p.name}</h4>
                </a>
                <h5 class="price">₹${p.discountPrice || p.price || 0} ${p.discountPrice ? `<del>₹${p.price}</del>` : ""}</h5>
                <div class="progress">
                    <div class="progress-bar" style="width: ${p.stockQuantity ? Math.min(100, (Math.floor(p.stockQuantity / 3) / (p.stockQuantity || 12)) * 100) : 30}%"></div>
                </div>
            </div>
            <div class="compare-box">
                <button class="btn cart-button add-cart-btn" data-id="${id}">Add to cart</button>
                <ul class="compare-list">
                    <li>
                        <a href="#!" class="wishlistProduct" data-id="${id}">
                            <i class="ri-heart-3-line"></i>
                            <span>Wishlist</span>
                        </a>
                    </li>
                    <li>
                        <button class="btn">
                            <i class="ri-repeat-2-line"></i>
                            <span>Compare</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
  `;
}