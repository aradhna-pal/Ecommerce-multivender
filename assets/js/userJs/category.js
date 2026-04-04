
const API_URL = "https://api.workarya.com/api/category/list";

async function loadCategories() {
    try {
        const res = await fetch(API_URL);
        const data = await res.json();
        const categories = data?.data || [];
        const ul = document.getElementById("categoryList");
        ul.innerHTML = ""; // Clear existing list

        categories.forEach(cat => {
            const li = document.createElement("li");
            const a = document.createElement("a");
            a.href = "shop-left-sidebar.php"; // or dynamic link if available
            a.classList.add("sub-category-box");

            // You can optionally use an icon from the API if available
            const h5 = document.createElement("h5");
            h5.textContent = cat.name; // show only category name

            a.appendChild(h5);
            li.appendChild(a);
            ul.appendChild(li);
        });
    } catch (err) {
        console.error("Failed to load categories:", err);
    }
}

document.addEventListener("DOMContentLoaded", loadCategories);
