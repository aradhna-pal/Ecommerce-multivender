document.addEventListener('DOMContentLoaded', () => {
    const BASE_URL = 'https://api.workarya.com';
    let selectedFilters = {
        categories: [],
        brands: [],
        sizes: [],
        colors: [],
        price: { min: 1000, max: 9000 }
    };

    // APIs
    const API_ENDPOINTS = {
        categories: `${BASE_URL}/api/category/list`,
        brands: `${BASE_URL}/api/brands/list`,
        colors: `${BASE_URL}/api/colors/get`,
        sizes: `${BASE_URL}/api/size/get`
    };

    // DOM Elements
    const categoryListEl = document.getElementById('filterCategoryList');
    const brandListEl = document.getElementById('filterBrandList');
    const sizeListEl = document.getElementById('filterSizeList');
    const colorListEl = document.getElementById('filterColorList');
    const minRange = document.getElementById('minRange');
    const maxRange = document.getElementById('maxRange');
    const minPriceEl = document.getElementById('min-price');
    const maxPriceEl = document.getElementById('max-price');
    const selectedFiltersContainer = document.getElementById('selectedFiltersContainer');
    const filterCategory2Container = document.getElementById('filterCategory2Container');
    const sidebarSelectedFilters = document.getElementById('sidebarSelectedFilters');

    async function fetchApi(url) {
        try {
            const response = await fetch(url);
            if (!response.ok) throw new Error('Network response was not ok');
            const data = await response.json();
            return data.data || data;
        } catch (error) {
            console.error('Fetch error:', error);
            return [];
        }
    }

    function getColorCode(colorName) {
        const ctx = document.createElement("canvas").getContext("2d");
        ctx.fillStyle = colorName.toLowerCase();
        return ctx.fillStyle; 
    }

    function renderSelectedFilters() {
        if (!selectedFiltersContainer && !sidebarSelectedFilters) return;
        
        if (selectedFiltersContainer) selectedFiltersContainer.innerHTML = '';
        if (sidebarSelectedFilters) sidebarSelectedFilters.innerHTML = '';
        
        let hasFilters = false;

        const createBadge = (type, value, id) => {
            hasFilters = true;
            if (selectedFiltersContainer) {
                const badge = document.createElement('span');
                badge.className = 'badge bg-light text-dark border d-flex align-items-center py-2 px-3 m-1';
                badge.style.fontSize = '14px';
                badge.innerHTML = `${value} <i class="ri-close-line ms-2" style="cursor:pointer; font-size:16px;" onclick="removeFilter('${type}', '${id}')"></i>`;
                selectedFiltersContainer.appendChild(badge);
            }
            if (sidebarSelectedFilters) {
                const li = document.createElement('li');
                li.innerHTML = `<a href="javascript:void(0)" onclick="removeFilter('${type}', '${id}')">${value} <i class="ri-close-line ms-2"></i></a>`;
                sidebarSelectedFilters.appendChild(li);
            }
        };

        selectedFilters.categories.forEach(item => createBadge('categories', item.name, item.id));
        selectedFilters.brands.forEach(item => createBadge('brands', item.name, item.id));
        selectedFilters.sizes.forEach(item => createBadge('sizes', item.name, item.id));
        selectedFilters.colors.forEach(item => createBadge('colors', item.name, item.id));

        if (minRange && maxRange && (selectedFilters.price.min > parseInt(minRange.min) || selectedFilters.price.max < parseInt(maxRange.max))) {
            hasFilters = true;
            if (selectedFiltersContainer) {
                const badge = document.createElement('span');
                badge.className = 'badge bg-light text-dark border d-flex align-items-center py-2 px-3 m-1';
                badge.style.fontSize = '14px';
                badge.innerHTML = `₹${selectedFilters.price.min} - ₹${selectedFilters.price.max} <i class="ri-close-line ms-2" style="cursor:pointer; font-size:16px;" onclick="resetPriceFilter()"></i>`;
                selectedFiltersContainer.appendChild(badge);
            }
            if (sidebarSelectedFilters) {
                const li = document.createElement('li');
                li.innerHTML = `<a href="javascript:void(0)" onclick="resetPriceFilter()">₹${selectedFilters.price.min} - ₹${selectedFilters.price.max} <i class="ri-close-line ms-2"></i></a>`;
                sidebarSelectedFilters.appendChild(li);
            }
        }

        if (hasFilters) {
            if (filterCategory2Container) filterCategory2Container.style.display = 'block';
            if (selectedFiltersContainer) {
                const clearAll = document.createElement('a');
                clearAll.href = 'javascript:void(0)';
                clearAll.className = 'text-danger ms-2 fw-bold text-decoration-underline align-self-center m-1';
                clearAll.innerText = 'Clear All';
                clearAll.onclick = clearAllFilters;
                selectedFiltersContainer.appendChild(clearAll);
            }
        } else {
            if (filterCategory2Container) filterCategory2Container.style.display = 'none';
        }

        if (typeof window.applyFilters === 'function') {
            window.applyFilters(selectedFilters);
        }
    }

    window.removeFilter = function (type, id) {
        selectedFilters[type] = selectedFilters[type].filter(item => item.id !== id);
        
        const checkbox = document.getElementById(`filter-${type}-${id}`);
        if (checkbox) checkbox.checked = false;
        
        if (type === 'colors') {
            const btn = document.getElementById(`filter-color-${id}`);
            if (btn) btn.classList.remove('active', 'border-dark');
        }

        renderSelectedFilters();
    };

    window.resetPriceFilter = function () {
        if (minRange && maxRange) {
            minRange.value = minRange.min;
            maxRange.value = maxRange.max;
            updatePriceDisplay();
        }
    };

    window.clearAllFilters = function () {
        selectedFilters = { categories: [], brands: [], sizes: [], colors: [], price: { min: parseInt(minRange?.min || 0), max: parseInt(maxRange?.max || 100000) } };
        
        document.querySelectorAll('.filter-checkbox').forEach(cb => cb.checked = false);
        document.querySelectorAll('.filter-color-btn').forEach(btn => btn.classList.remove('active', 'border-dark'));
        
        resetPriceFilter();
        renderSelectedFilters();
    };

    function handleCheckboxChange(e, type, id, name) {
        if (e.target.checked) {
            selectedFilters[type].push({ id, name });
        } else {
            selectedFilters[type] = selectedFilters[type].filter(item => item.id !== id);
        }
        renderSelectedFilters();
    }

    async function loadCategories() {
        if (!categoryListEl) return;
        const categoriesData = await fetchApi(API_ENDPOINTS.categories);
        let categories = [];
        if (Array.isArray(categoriesData)) categories = categoriesData;
        else if (categoriesData && Array.isArray(categoriesData.data)) categories = categoriesData.data;

        categoryListEl.innerHTML = '';
        
        const leafCategories = [];
        const extractLeaves = (cats) => {
            cats.forEach(c => {
                if (c.children && c.children.length > 0) {
                    extractLeaves(c.children);
                } else {
                    leafCategories.push(c);
                }
            });
        };
        extractLeaves(categories);

        leafCategories.forEach(cat => {
            const id = cat._id || cat.id;
            const li = document.createElement('li');
            li.innerHTML = `
                <div class="form-check category-list-box">
                    <input class="checkbox_animated filter-checkbox" type="checkbox" id="filter-categories-${id}">
                    <label class="form-check-label" for="filter-categories-${id}">
                        <span class="name">${cat.name}</span>
                    </label>
                </div>
            `;
            categoryListEl.appendChild(li);
            li.querySelector('input').addEventListener('change', (e) => handleCheckboxChange(e, 'categories', id, cat.name));
        });
    }

    async function loadBrands() {
        if (!brandListEl) return;
        const brandsData = await fetchApi(API_ENDPOINTS.brands);
        let brands = [];
        if (Array.isArray(brandsData)) brands = brandsData;
        else if (brandsData && Array.isArray(brandsData.data)) brands = brandsData.data;

        brandListEl.innerHTML = '';
        
        brands.forEach(brand => {
            const id = brand._id || brand.id;
            const li = document.createElement('li');
            li.innerHTML = `
                <div class="form-check category-list-box">
                    <input class="checkbox_animated filter-checkbox" type="checkbox" id="filter-brands-${id}">
                    <label class="form-check-label" for="filter-brands-${id}">
                        <span class="name">${brand.name}</span>
                    </label>
                </div>
            `;
            brandListEl.appendChild(li);
            li.querySelector('input').addEventListener('change', (e) => handleCheckboxChange(e, 'brands', id, brand.name));
        });
    }

    async function loadSizes() {
        if (!sizeListEl) return;
        const sizesData = await fetchApi(API_ENDPOINTS.sizes);
        let sizes = [];
        if (Array.isArray(sizesData)) sizes = sizesData;
        else if (sizesData && Array.isArray(sizesData.data)) sizes = sizesData.data;

        sizeListEl.innerHTML = '';
        
        sizes.forEach(size => {
            const id = size._id || size.id;
            const li = document.createElement('li');
            li.innerHTML = `
                <div class="form-check category-list-box">
                    <input class="checkbox_animated filter-checkbox" type="checkbox" id="filter-sizes-${id}">
                    <label class="form-check-label" for="filter-sizes-${id}">
                        <span class="name">${size.name}</span>
                    </label>
                </div>
            `;
            sizeListEl.appendChild(li);
            li.querySelector('input').addEventListener('change', (e) => handleCheckboxChange(e, 'sizes', id, size.name));
        });
    }

    async function loadColors() {
        if (!colorListEl) return;
        const colorsData = await fetchApi(API_ENDPOINTS.colors);
        let colors = [];
        if (Array.isArray(colorsData)) colors = colorsData;
        else if (colorsData && Array.isArray(colorsData.data)) colors = colorsData.data;

        colorListEl.innerHTML = '';
        
        colors.forEach(color => {
            const id = color._id || color.id;
            const colorCode = getColorCode(color.name);
            const li = document.createElement('li');
            li.style.display = 'inline-block';
            li.style.margin = '2px';
            li.innerHTML = `
                <button class="btn filter-color-btn" id="filter-color-${id}" style="background-color: ${colorCode}; width:30px; height:30px; border-radius:50%; border: 1px solid #ccc;"></button>
            `;
            colorListEl.appendChild(li);
            
            li.querySelector('button').addEventListener('click', (e) => {
                const btn = e.target;
                const isSelected = selectedFilters.colors.some(c => c.id === id);
                
                if (isSelected) {
                    selectedFilters.colors = selectedFilters.colors.filter(c => c.id !== id);
                    btn.classList.remove('active', 'border-dark');
                    btn.style.border = '1px solid #ccc';
                } else {
                    selectedFilters.colors.push({ id: id, name: color.name });
                    btn.classList.add('active', 'border-dark');
                    btn.style.border = '2px solid #000';
                }
                renderSelectedFilters();
            });
        });
    }

    function updatePriceDisplay() {
        if (!minRange || !maxRange || !minPriceEl || !maxPriceEl) return;
        
        let minVal = parseInt(minRange.value);
        let maxVal = parseInt(maxRange.value);
        
        if (minVal > maxVal) {
            let tmp = minVal;
            minVal = maxVal;
            maxVal = tmp;
        }
        
        minPriceEl.innerText = `₹${minVal}`;
        maxPriceEl.innerText = `₹${maxVal}`;
        
        selectedFilters.price.min = minVal;
        selectedFilters.price.max = maxVal;
        
        renderSelectedFilters();
    }

    if (minRange && maxRange) {
        minRange.addEventListener('input', updatePriceDisplay);
        maxRange.addEventListener('input', updatePriceDisplay);
        
        // Initial setup
        updatePriceDisplay();
    }

    // Initialize all API calls
    loadCategories();
    loadBrands();
    loadSizes();
    loadColors();
});