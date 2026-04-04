
// const API_URL = "https://api.workarya.com/api/category/list";

// async function loadCategories() {
//     try {
//         const res = await fetch(API_URL);
//         const data = await res.json();
//         const categories = data?.data || [];
//         const ul = document.getElementById("categoryList");
//         ul.innerHTML = ""; // Clear existing list

//         categories.forEach(cat => {
//             const li = document.createElement("li");
//             const a = document.createElement("a");
//             a.href = "shop.php"; // or dynamic link if available
//             a.classList.add("sub-category-box");

//             // You can optionally use an icon from the API if available
//             const h5 = document.createElement("h5");
//             h5.textContent = cat.name; // show only category name

//             a.appendChild(h5);
//             li.appendChild(a);
//             ul.appendChild(li);
//         });
//     } catch (err) {
//         console.error("Failed to load categories:", err);
//     }
// }

// document.addEventListener("DOMContentLoaded", loadCategories);

const API_URL = "https://api.workarya.com/api/category/list";

async function loadCategories() {
    try {
        const res = await fetch(API_URL);
        const data = await res.json();
        const categories = data?.data || [];
        const ul = document.getElementById("categoryList");
        ul.innerHTML = "";

        function renderCategory(cat, parentUl) {
            const li = document.createElement("li");

            const a = document.createElement("a");
            a.href = "shop.php"; // or dynamic slug: `shop.php?slug=${cat.slug}`
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

            // Recursive children
            if (cat.children && cat.children.length > 0) {
                const nestedUl = document.createElement("ul");
                nestedUl.classList.add("sub-menu-list");
                cat.children.forEach(child => renderCategory(child, nestedUl));
                li.appendChild(nestedUl);
            }

            parentUl.appendChild(li);
        }

        categories.forEach(cat => renderCategory(cat, ul));
    } catch (err) {
        console.error("Failed to load categories:", err);
    }
}

document.addEventListener("DOMContentLoaded", loadCategories);