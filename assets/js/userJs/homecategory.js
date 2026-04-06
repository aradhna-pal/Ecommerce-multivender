// const BASE = "https://api.workarya.com";
const FALLBACK_IMG = "https://api.workarya.com/"; // default image if none

document.addEventListener("DOMContentLoaded", loadCategories);

async function loadCategories() {
    try {
        const res = await fetch(`https://api.workarya.com/api/category/list`);
        const result = await res.json();

        if (!result.success) {
            console.log("API call failed");
            return;
        }

        const wrapper = document.getElementById("categoryWrapper");
        wrapper.innerHTML = "";

        // Filter top-level active categories
        const parents = result.data.filter(c => c.parentId === null && c.isActive);

        console.log("=== Parent Categories ===");
        parents.forEach(cat => {
            console.log("Name:", cat.name);
            console.log("Slug:", cat.slug);
            console.log("Children Count:", cat.children.length);
            console.log("------------------------");

            const img = cat.image ? cat.image : FALLBACK_IMG;

            const slide = `
                <div class="swiper-slide">
                    <a href="shop.php?slug=${cat.slug}" class="category-box">
                        <img src="${img}" class="img-fluid" alt="${cat.name}">
                        <h4>${cat.name}</h4>
                    </a>
                </div>
            `;
            wrapper.insertAdjacentHTML("beforeend", slide);
        });

        console.log("Full API Data:", result.data);

        initCategorySwiper();

    } catch (err) {
        console.error("Error fetching categories:", err);
    }
}

function initCategorySwiper() {
    new Swiper(".category-box-slide", {
        slidesPerView: 6,
        spaceBetween: 15,
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            0: { slidesPerView: 2 },
            576: { slidesPerView: 3 },
            768: { slidesPerView: 4 },
            992: { slidesPerView: 5 },
            1200: { slidesPerView: 6 }
        }
    });
}