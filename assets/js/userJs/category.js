const API_URL = "https://api.workarya.com/api/category/list";

async function loadCategories() {
    const homeListEl = document.getElementById("categoryList");
    const headerListEl = document.getElementById("headerCategoryList");
    if (!homeListEl && !headerListEl) return;

    try {
        const res = await fetch(API_URL);
        const data = await res.json();
        const categories = Array.isArray(data?.data) ? data.data.filter(c => c && c.isActive !== false) : [];

        if (homeListEl) {
            homeListEl.innerHTML = "";
            categories.forEach(cat => renderHomeCategory(cat, homeListEl));
        }

        if (headerListEl) {
            headerListEl.innerHTML = "";
            if (categories.length === 0) {
                headerListEl.innerHTML = '<li class="text-center text-muted small py-3">No categories found</li>';
            } else {
                // Render with the same hover-flyout style used on the home page.
                categories.forEach(cat => renderHeaderCategory(cat, headerListEl));
            }
        }
    } catch (err) {
        console.error("Failed to load categories:", err);
        if (headerListEl) {
            headerListEl.innerHTML = '<li class="text-center text-muted small py-3">Failed to load categories</li>';
        }
    }
}

// Original hover-flyout style rendering for the homepage sidebar (index.php).
function renderHomeCategory(cat, parentUl) {
    const li = document.createElement("li");
    const catId = cat._id || cat.id || "";
    const a = document.createElement("a");
    a.href = `shop.php?categoryId=${encodeURIComponent(catId)}`;
    a.classList.add("sub-category-box");

    const h5 = document.createElement("h5");
    h5.textContent = cat.name;
    a.appendChild(h5);

    if (cat.isNew) {
        const span = document.createElement("span");
        span.classList.add("success-bg-color");
        span.textContent = "New";
        h5.appendChild(span);
    }

    li.appendChild(a);

    if (cat.children && cat.children.length > 0) {
        const nestedUl = document.createElement("ul");
        nestedUl.classList.add("sub-menu-list");
        cat.children.forEach(child => renderHomeCategory(child, nestedUl));
        li.appendChild(nestedUl);
    }

    parentUl.appendChild(li);
}

// Same hover-flyout style rendering for the global header mega-dropdown.
// Parent categories expose a chevron; sub-categories reveal on hover (desktop)
// or on first tap (mobile, handled in header.php).
function renderHeaderCategory(cat, parentUl) {
    const li = document.createElement("li");
    const catId = cat._id || cat.id || "";
    const hasChildren = Array.isArray(cat.children) && cat.children.length > 0;

    const a = document.createElement("a");
    a.href = `shop.php?categoryId=${encodeURIComponent(catId)}`;
    if (hasChildren) a.setAttribute("data-has-children", "true");

    const h5 = document.createElement("h5");
    h5.textContent = cat.name;

    if (cat.isNew) {
        const span = document.createElement("span");
        span.classList.add("success-bg-color");
        span.textContent = "New";
        h5.appendChild(span);
    }

    a.appendChild(h5);

    if (hasChildren) {
        const icon = document.createElement("i");
        icon.className = "ri-arrow-right-s-line chevron";
        a.appendChild(icon);
    }

    li.appendChild(a);

    if (hasChildren) {
        const nestedUl = document.createElement("ul");
        cat.children.forEach(child => renderHeaderCategory(child, nestedUl));
        li.appendChild(nestedUl);
    }

    parentUl.appendChild(li);
}

document.addEventListener("DOMContentLoaded", loadCategories);










// ==================================================== INDEX PAGE CATEOGY SLIDER ====================================================
