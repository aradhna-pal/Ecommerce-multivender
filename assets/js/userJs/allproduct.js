// let quickModal;
let qvImages = [];
let qvIndex = 0;

const BASE = "http://multivendor_backend.workarya.com";

document.addEventListener("DOMContentLoaded", init);

async function init() {
  const res = await fetch(`${BASE}/api/products/list`);
  const json = await res.json();
  const products = json.data.data;

  renderProducts(products);
}

function renderProducts(products) {
  const container = document.getElementById("productsContainer");
  const template = container.querySelector(".col");

  container.innerHTML = "";

  products.forEach((p) => {
    if (!p.isActive || p.isDeleted) return;

    const card = template.cloneNode(true);

    // IMAGE
    card.querySelector(".productImage").src = BASE + p.mainImage;

    // TEXT
    card.querySelector(".productName").innerText = p.brandName;

    card.querySelector(".name h5").innerText = p.name;

    card.querySelector(".product-details").innerText = p.shortDescription;

    card.querySelector(".price").innerHTML =
      `₹${p.discountPrice} <del>₹${p.price}</del>`;

    // EVENTS
    card.querySelector(".select-btn").onclick = () => openOptions(card, p);

    card.querySelector(".view-btn").onclick = () => openQuickView(p);

    container.appendChild(card);
  });
}

function openOptions(card, p) {
  const box = card.querySelector(".select-option-box");
  box.classList.add("show");

  const colors = box.querySelector(".color-list");
  colors.innerHTML = "";
  (p.colors || []).forEach((c) => {
    colors.innerHTML += `<li><a style="background:${c.toLowerCase()}"></a></li>`;
  });

  const sizes = box.querySelector(".size-list");
  sizes.innerHTML = "";
  (p.sizes || []).forEach((s) => {
    sizes.innerHTML += `<li><a>${s}</a></li>`;
  });
}

function closeSidebar() {
  document
    .querySelectorAll(".select-option-box")
    .forEach((b) => b.classList.remove("show"));
}

document.addEventListener("DOMContentLoaded", () => {
  const el = document.getElementById("quickViewModal");
  quickModal = new bootstrap.Modal(el);

  // modal cleanup
  el.addEventListener("hidden.bs.modal", () => {
    document.body.classList.remove("modal-open");
    document.querySelectorAll(".modal-backdrop").forEach((b) => b.remove());
  });

  init();
});
document.addEventListener("click", function (e) {
  if (e.target.closest(".swiper-button-next")) {
    if (!qvImages.length) return;
    qvIndex = (qvIndex + 1) % qvImages.length;
    qvMainImg.src = BASE + qvImages[qvIndex];
  }

  if (e.target.closest(".swiper-button-prev")) {
    if (!qvImages.length) return;
    qvIndex = (qvIndex - 1 + qvImages.length) % qvImages.length;
    qvMainImg.src = BASE + qvImages[qvIndex];
  }
});
function openQuickView(p) {
  qvName.innerText = p.name || "";
  qvDesc.innerText = p.shortDescription || "";
  qvPrice.innerText = "₹ " + (p.discountPrice || p.price || 0);

  qvImages = [p.mainImage, ...(p.galleryImages || [])].filter(Boolean);
  qvIndex = 0;

  qvMainImg.src = BASE + qvImages[qvIndex];

  // ===== THUMBNAILS =====
  const thumbs = document.getElementById("qvThumbs");
  thumbs.innerHTML = "";

  qvImages.forEach((src, i) => {
    thumbs.innerHTML += `
        <div class="swiper-slide">
            <div class="image-box">
                <img src="${BASE + src}" class="thumb-img" data-i="${i}" style="cursor:pointer">
            </div>
        </div>`;
  });

  // thumb click
  setTimeout(() => {
    document.querySelectorAll(".thumb-img").forEach((img) => {
      img.onclick = () => {
        qvIndex = +img.dataset.i;
        qvMainImg.src = img.src;
      };
    });
  }, 50);

  // ===== COLORS =====
  const colorBox = document.getElementById("qvColors");
  colorBox.innerHTML = "";
  (p.colors || []).forEach((c) => {
    colorBox.innerHTML += `
        <div style="width:30px;height:30px;border-radius:50%;
                    background:${c};border:1px solid #ccc;cursor:pointer"></div>`;
  });

  // ===== SIZES =====
  const sizeBox = document.getElementById("qvSizes");
  sizeBox.innerHTML = "";
  (p.sizes || []).forEach((s) => {
    sizeBox.innerHTML += `
        <div class="px-3 py-1 border" style="cursor:pointer">${s}</div>`;
  });

  quickModal.show();
}

let quickModal;

document.addEventListener("DOMContentLoaded", () => {
  const el = document.getElementById("quickViewModal");
  quickModal = new bootstrap.Modal(el);

  // cleanup when modal fully hidden
  el.addEventListener("hidden.bs.modal", () => {
    document.body.classList.remove("modal-open");
    document.querySelectorAll(".modal-backdrop").forEach((b) => b.remove());
  });

  init(); // your old init call
});

function closeQuickView() {
  quickModal.hide();

  setTimeout(() => {
    document.body.classList.remove("modal-open");
    document.querySelectorAll(".modal-backdrop").forEach((b) => b.remove());
  }, 300);
}
