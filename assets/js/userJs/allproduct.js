
let qvName, qvDesc, qvPrice, qvImages, qvIndex, qvMainImg, qvThumbs, qvColors, qvSizes, quickModal;

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
  
  loadProducts();
});

// async function init() {
//   const res = await fetch(`${BASE}/api/products/list`);
//   const json = await res.json();
//   const products = json.data.data;

//   renderProducts(products);
// }

// function renderProducts(products) {
//   const container = document.getElementById("productsContainer");
//   const template = container.querySelector(".col");

//   container.innerHTML = "";

//   products.forEach((p) => {
//     if (!p.isActive || p.isDeleted) return;

//     const card = template.cloneNode(true);

//     // IMAGE
//     card.querySelector(".productImage").src = BASE + p.mainImage;

//     // TEXT
//     card.querySelector(".productName").innerText = p.brandName;

//     card.querySelector(".name h5").innerText = p.name;

//     card.querySelector(".product-details").innerText = p.shortDescription;

//     card.querySelector(".price").innerHTML =
//       `₹${p.discountPrice} <del>₹${p.price}</del>`;

//     // EVENTS
//     card.querySelector(".select-btn").onclick = () => openOptions(card, p);

//     card.querySelector(".view-btn").onclick = () => openQuickView(p);

//     container.appendChild(card);
//   });
// }

// function openOptions(card, p) {
//   const box = card.querySelector(".select-option-box");
//   box.classList.add("show");

//   const colors = box.querySelector(".color-list");
//   colors.innerHTML = "";
//   (p.colors || []).forEach((c) => {
//     colors.innerHTML += `<li><a style="background:${c.toLowerCase()}"></a></li>`;
//   });

//   const sizes = box.querySelector(".size-list");
//   sizes.innerHTML = "";
//   (p.sizes || []).forEach((s) => {
//     sizes.innerHTML += `<li><a>${s}</a></li>`;
//   });
// }

// function closeSidebar() {
//   document
//     .querySelectorAll(".select-option-box")
//     .forEach((b) => b.classList.remove("show"));
// }

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

// document.addEventListener("DOMContentLoaded", () => {
//   const el = document.getElementById("quickViewModal");
//   quickModal = new bootstrap.Modal(el);

//   // modal cleanup
//   el.addEventListener("hidden.bs.modal", () => {
//     document.body.classList.remove("modal-open");
//     document.querySelectorAll(".modal-backdrop").forEach((b) => b.remove());
//   });

//   init();
// });
// document.addEventListener("click", function (e) {
//   if (e.target.closest(".swiper-button-next")) {
//     if (!qvImages.length) return;
//     qvIndex = (qvIndex + 1) % qvImages.length;
//     qvMainImg.src = BASE + qvImages[qvIndex];
//   }

//   if (e.target.closest(".swiper-button-prev")) {
//     if (!qvImages.length) return;
//     qvIndex = (qvIndex - 1 + qvImages.length) % qvImages.length;
//     qvMainImg.src = BASE + qvImages[qvIndex];
//   }
// });
// function openQuickView(p) {
//   qvName.innerText = p.name || "";
//   qvDesc.innerText = p.shortDescription || "";
//   qvPrice.innerText = "₹ " + (p.discountPrice || p.price || 0);

//   qvImages = [p.mainImage, ...(p.galleryImages || [])].filter(Boolean);
//   qvIndex = 0;

//   qvMainImg.src = BASE + qvImages[qvIndex];

//   // ===== THUMBNAILS =====
//   const thumbs = document.getElementById("qvThumbs");
//   thumbs.innerHTML = "";

//   qvImages.forEach((src, i) => {
//     thumbs.innerHTML += `
//         <div class="swiper-slide">
//             <div class="image-box">
//                 <img src="${BASE + src}" class="thumb-img" data-i="${i}" style="cursor:pointer">
//             </div>
//         </div>`;
//   });

//   // thumb click
//   setTimeout(() => {
//     document.querySelectorAll(".thumb-img").forEach((img) => {
//       img.onclick = () => {
//         qvIndex = +img.dataset.i;
//         qvMainImg.src = img.src;
//       };
//     });
//   }, 50);

//   // ===== COLORS =====
//   const colorBox = document.getElementById("qvColors");
//   colorBox.innerHTML = "";
//   (p.colors || []).forEach((c) => {
//     colorBox.innerHTML += `
//         <div style="width:30px;height:30px;border-radius:50%;
//                     background:${c};border:1px solid #ccc;cursor:pointer"></div>`;
//   });

//   // ===== SIZES =====
//   const sizeBox = document.getElementById("qvSizes");
//   sizeBox.innerHTML = "";
//   (p.sizes || []).forEach((s) => {
//     sizeBox.innerHTML += `
//         <div class="px-3 py-1 border" style="cursor:pointer">${s}</div>`;
//   });

//   quickModal.show();
// }

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

    // Show modal
    if (quickModal) {
      quickModal.show();
    }

  } catch (error) {
    console.error("Error loading quick view:", error);
  }
}

// let quickModal;

// document.addEventListener("DOMContentLoaded", () => {
//   const el = document.getElementById("quickViewModal");
//   quickModal = new bootstrap.Modal(el);

//   // cleanup when modal fully hidden
//   el.addEventListener("hidden.bs.modal", () => {
//     document.body.classList.remove("modal-open");
//     document.querySelectorAll(".modal-backdrop").forEach((b) => b.remove());
//   });

//   init(); // your old init call
// });

// function closeQuickView() {
//   quickModal.hide();

//   setTimeout(() => {
//     document.body.classList.remove("modal-open");
//     document.querySelectorAll(".modal-backdrop").forEach((b) => b.remove());
//   }, 300);
// }

const BASE = "http://multivendor_backend.workarya.com";

document.addEventListener("DOMContentLoaded", loadProducts);

async function loadProducts() {
  const res = await fetch(`${BASE}/api/products/list`);
  const json = await res.json();
  const products = json?.data?.data || [];

  const container = document.getElementById("productsContainer");
  container.innerHTML = "";

  products.forEach((p) => {
    container.insertAdjacentHTML("beforeend", cardHTML(p));
  });

  bindCardEvents();
}

function cardHTML(p) {
  const img = p.images?.[0] || "../assets/images/product/placeholder.png";
  const id = p._id || p.id;

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
            <img src="${img}" class="img-fluid productImage" alt="">
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
               <a class="wishlistProduct" data-id="${p._id}" style="cursor:pointer">
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
  document.querySelectorAll(".select-btn").forEach((btn) => {
    btn.onclick = () => {
      const card = btn.closest(".col");
      const id = btn.dataset.id;
      openOptions(card, id);
    };
  });

  document.querySelectorAll(".view-btn").forEach((btn) => {
    btn.onclick = () => {
      const id = btn.dataset.id;
      openQuickView(id);
    };
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
  /* const BASE = "http://multivendor_backend.workarya.com"; */
}

// Product Detail Page Script - Only run on product-detail.php
if (window.location.pathname.includes('product-detail.php')) {
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
      console.log("Fetch response status:", res.status);
      if (!res.ok) {
        throw new Error(`HTTP error! status: ${res.status}`);
      }
      const json = await res.json();
      console.log("Full API response:", json);
      let p;
      if (json.success && json.data) {
        p = json.data.data || json.data;
        console.log("Extracted product data:", p);
        if (!p || !p.name) {
          throw new Error("Invalid product data structure");
        }
        populateProduct(p);
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
  // Breadcrumb
  // const breadcrumbTitle = document.querySelector('.breadcrumb-contain h2');
  // if (breadcrumbTitle) {
  //     breadcrumbTitle.innerText = p.name;
  //     console.log('Updated breadcrumb title to:', p.name);
  // } else {
  //     console.warn('Breadcrumb title element not found');
  // }
  // const breadcrumbActive = document.querySelector('.breadcrumb-item.active');
  // if (breadcrumbActive) {
  //     breadcrumbActive.innerText = p.name;
  //     console.log('Updated breadcrumb active to:', p.name);
  // } else {
  //     console.warn('Breadcrumb active element not found');
  // }

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
        <button onclick="location.href = 'checkout.php';" class="btn buy-btn theme-bg-color text-white">Buy now</button>
        <button onclick="location.href = 'cart.php';" class="btn buy-btn theme-border fw-500">
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
