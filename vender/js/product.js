const API_BASE = (window.API_BASE_URL || window.BASE || "https://api.workarya.com").replace(/\/$/, "");
const PRODUCT_INSERT = `${API_BASE}/api/products/insert`;
const PRODUCT_UPDATE_BASE = `${API_BASE}/api/products/update`;
const PRODUCT_DETAIL_BASE = `${API_BASE}/api/products/detail`;
const PRODUCT_IMPORT = `${API_BASE}/api/products/upload-excel`;
const PRODUCT_EXPORT = `${API_BASE}/api/products/export`;

let categoryTree = [];

function authToken() {
  return localStorage.getItem("vendorToken");
}

function getVendorIdFromToken() {
  const token = authToken();
  if (!token) return "";
  try {
    const payload = JSON.parse(atob(token.split(".")[1].replace(/-/g, "+").replace(/_/g, "/")));
    return (
      payload.UserId ||
      payload.userId ||
      payload.NameIdentifier ||
      payload.sub ||
      payload["http://schemas.xmlsoap.org/ws/2005/05/identity/claims/nameidentifier"] ||
      payload.VendorId ||
      payload.vendorId ||
      payload.vendorid ||
      ""
    );
  } catch {
    return "";
  }
}

function getVendorEmailFromToken() {
  const token = authToken();
  if (!token) return "";
  try {
    const payload = JSON.parse(atob(token.split(".")[1].replace(/-/g, "+").replace(/_/g, "/")));
    return (
      payload.Email ||
      payload.email ||
      payload.UserEmail ||
      payload.userEmail ||
      payload["http://schemas.xmlsoap.org/ws/2005/05/identity/claims/emailaddress"] ||
      ""
    );
  } catch {
    return "";
  }
}

function getVendorFullNameFromToken() {
  const token = authToken();
  if (!token) return "";
  try {
    const payload = JSON.parse(atob(token.split(".")[1].replace(/-/g, "+").replace(/_/g, "/")));
    const firstName = payload.FirstName || payload.firstName || "";
    const lastName = payload.LastName || payload.lastName || "";
    return `${firstName} ${lastName}`.trim();
  } catch {
    return "";
  }
}

function resolveMedia(url) {
  if (window.resolveApiMediaUrl) return window.resolveApiMediaUrl(url);
  if (!url) return "https://via.placeholder.com/48";
  if (/^https?:\/\//i.test(url)) return url;
  return `${API_BASE}${url.startsWith("/") ? "" : "/"}${url}`;
}

function truncateWords(text, wordLimit = 10) {
  if (!text) return "";
  const cleanText = String(text).replace(/<[^>]*>/g, "");
  const words = cleanText.split(" ");
  if (words.length <= wordLimit) return cleanText;
  return `${words.slice(0, wordLimit).join(" ")}...`;
}

function normalizeArrayPayload(payload) {
  return payload?.data?.data || payload?.data || payload?.items || payload || [];
}

function isProductOwnedByVendor(product, vendorId, vendorEmail, vendorFullName) {
  if (!vendorId && !vendorEmail && !vendorFullName) return false;
  const ownerId =
    product.vendorId ||
    product.VendorId ||
    product.vendorid ||
    product.sellerId ||
    product.SellerId ||
    product.sellerid ||
    product.userId ||
    product.UserId ||
    product.userid ||
    product.createdByVendorId ||
    product.CreatedByVendorId ||
    product.createdById ||
    product.CreatedById ||
    product.createdBy ||
    product.CreatedBy ||
    "";
  if (ownerId && vendorId && String(ownerId).trim() === String(vendorId).trim()) return true;

  const ownerEmail = (
    product.vendorEmail ||
    product.VendorEmail ||
    product.venderEmail ||
    product.email ||
    product.Email ||
    product.createdBy ||
    product.CreatedBy ||
    product.createdByEmail ||
    product.CreatedByEmail ||
    product.userEmail ||
    product.UserEmail ||
    ""
  )
    .toString()
    .trim()
    .toLowerCase();

  if (ownerEmail && vendorEmail && ownerEmail === vendorEmail.toLowerCase()) return true;

  const createdByName = (
    product.createdbyname ||
    product.createdByName ||
    product.CreatedByName ||
    ""
  )
    .toString()
    .trim()
    .toLowerCase();
  if (createdByName && vendorFullName && createdByName === vendorFullName.toLowerCase()) return true;

  return false;
}

async function fetchJson(url, options = {}) {
  const res = await fetch(url, options);
  const raw = await res.text();
  let data = {};
  try {
    data = raw ? JSON.parse(raw) : {};
  } catch {
    data = { message: raw };
  }
  if (!res.ok) {
    throw new Error(data?.message || `${res.status} ${res.statusText}`);
  }
  return data;
}

function setSelectOptions(selectId, list, labelKey = "name") {
  const el = document.getElementById(selectId);
  if (!el) return;
  const current = el.value;
  el.innerHTML = `<option value="">Select</option>`;
  list.forEach((item) => {
    const id = item.id || item._id;
    if (!id) return;
    const opt = document.createElement("option");
    opt.value = id;
    opt.textContent = item[labelKey] || item.Name || "-";
    el.appendChild(opt);
  });
  if (current) el.value = current;
}

function getNodeId(node) {
  return node?.id || node?._id || "";
}

function syncSelectedCategoryFields(pathIds) {
  const categoryIdInput = document.getElementById("CategoryId");
  const subCategoryIdInput = document.getElementById("SubCategoryId");
  const cleanPath = (pathIds || []).filter(Boolean);
  const rootId = cleanPath[0] || "";
  const deepestId = cleanPath.length > 1 ? cleanPath[cleanPath.length - 1] : "";
  if (categoryIdInput) categoryIdInput.value = rootId;
  if (subCategoryIdInput) subCategoryIdInput.value = deepestId;
}

function renderCategoryLevelSelect(levelIndex, nodes, selectedId = "") {
  const wrapper = document.createElement("div");
  wrapper.className = "mb-3";

  const label = document.createElement("label");
  label.className = "form-label";
  label.textContent = levelIndex === 0 ? "Category" : `Category Level ${levelIndex + 1}`;

  const select = document.createElement("select");
  select.className = "form-select dynamic-category-level";
  select.dataset.level = String(levelIndex);
  select.innerHTML = `<option value="">Select ${levelIndex === 0 ? "Category" : "Sub Category"}</option>`;

  (nodes || []).forEach((node) => {
    const id = getNodeId(node);
    if (!id) return;
    const opt = document.createElement("option");
    opt.value = id;
    opt.textContent = node.name || "-";
    if (selectedId && selectedId === id) opt.selected = true;
    select.appendChild(opt);
  });

  wrapper.appendChild(label);
  wrapper.appendChild(select);
  return wrapper;
}

function renderCategoryLevels(selectedPath = []) {
  const container = document.getElementById("CategoryLevelsContainer");
  if (!container) return;
  container.innerHTML = "";

  let nodesAtLevel = categoryTree || [];
  const path = [];
  let level = 0;

  while (nodesAtLevel && nodesAtLevel.length > 0) {
    const selectedAtLevel = selectedPath[level] || "";
    const block = renderCategoryLevelSelect(level, nodesAtLevel, selectedAtLevel);
    container.appendChild(block);

    const selectedNode = nodesAtLevel.find((n) => getNodeId(n) === selectedAtLevel) || null;
    if (!selectedNode) break;

    path.push(getNodeId(selectedNode));
    nodesAtLevel = selectedNode.children || [];
    level += 1;
  }

  syncSelectedCategoryFields(path);

  container.querySelectorAll(".dynamic-category-level").forEach((select) => {
    select.addEventListener("change", (e) => {
      const changedLevel = Number(e.target.dataset.level || 0);
      const selects = Array.from(container.querySelectorAll(".dynamic-category-level"));
      const nextPath = selects.slice(0, changedLevel + 1).map((s) => s.value).filter(Boolean);
      renderCategoryLevels(nextPath);
    });
  });
}

function findCategoryPathToId(nodes, targetId, trail = []) {
  for (let i = 0; i < (nodes || []).length; i += 1) {
    const n = nodes[i];
    const id = getNodeId(n);
    const nextTrail = [...trail, id];
    if (id === targetId) return nextTrail;
    if (n.children?.length) {
      const found = findCategoryPathToId(n.children, targetId, nextTrail);
      if (found.length) return found;
    }
  }
  return [];
}

async function loadProductFormOptions() {
  const token = authToken();
  if (!token) return;

  const headers = { Authorization: `Bearer ${token}` };
  const [brandsRes, categoriesRes, colorsRes, sizesRes] = await Promise.all([
    fetchJson(`${API_BASE}/api/brands/list`, { headers }),
    fetchJson(`${API_BASE}/api/category/list`, { headers }),
    fetchJson(`${API_BASE}/api/colors/get`, { headers }),
    fetchJson(`${API_BASE}/api/size/get`, { headers }),
  ]);

  setSelectOptions("BrandId", normalizeArrayPayload(brandsRes));
  categoryTree = normalizeArrayPayload(categoriesRes);
  renderCategoryLevels([]);
  setSelectOptions("ColorId", normalizeArrayPayload(colorsRes));
  setSelectOptions("SizeId", normalizeArrayPayload(sizesRes));
}

function toBool(elId, fallback = false) {
  const el = document.getElementById(elId);
  return el ? !!el.checked : fallback;
}

function numberValue(elId, fallback = 0) {
  const v = document.getElementById(elId)?.value;
  if (v === "" || v == null) return fallback;
  const n = Number(v);
  return Number.isNaN(n) ? fallback : n;
}

function textValue(elId) {
  return (document.getElementById(elId)?.value || "").trim();
}

function normalizeId(v) {
  return typeof v === "string" ? v : "";
}

function buildProductFormData() {
  const fd = new FormData();
  fd.append("Name", textValue("name"));
  fd.append("ShortDescription", textValue("ShortDescription"));
  fd.append("Description", textValue("Description"));
  fd.append("CategoryId", textValue("CategoryId"));
  if (textValue("SubCategoryId")) fd.append("SubCategoryId", textValue("SubCategoryId"));
  fd.append("BrandId", textValue("BrandId"));
  fd.append("ColorId", textValue("ColorId"));
  fd.append("SizeId", textValue("SizeId"));

  fd.append("Price", numberValue("Price", 0));
  fd.append("DiscountPrice", numberValue("DiscountPrice", 0));
  fd.append("CostPrice", numberValue("CostPrice", 0));
  fd.append("TaxPercentage", numberValue("TaxPercentage", 0));
  fd.append("StockQuantity", numberValue("StockQuantity", 0));
  fd.append("MinStockQuantity", numberValue("MinStockQuantity", 0));

  fd.append("Sku", textValue("Sku"));
  fd.append("Weight", numberValue("Weight", 0));
  fd.append("Length", numberValue("Length", 0));
  fd.append("Width", numberValue("Width", 0));
  fd.append("Height", numberValue("Height", 0));
  fd.append("MetaTitle", textValue("MetaTitle"));
  fd.append("MetaDescription", textValue("MetaDescription"));
  fd.append("MetaKeywords", textValue("MetaKeywords"));

  fd.append("TrackInventory", toBool("TrackInventory", true));
  fd.append("IsActive", toBool("IsActive", true));
  fd.append("IsFeatured", toBool("IsFeatured", false));

  const mainImage = document.getElementById("MainImage")?.files?.[0];
  if (mainImage) fd.append("MainImage", mainImage);

  const gallery = document.getElementById("GalleryImages")?.files || [];
  for (let i = 0; i < gallery.length; i += 1) {
    fd.append("GalleryImages", gallery[i]);
  }

  return fd;
}

function validateProductForm() {
  if (!textValue("name")) return "Product name is required";
  if (!textValue("CategoryId")) return "Category is required";
  if (!textValue("BrandId")) return "Brand is required";
  if (!textValue("ColorId")) return "Color is required";
  if (!textValue("SizeId")) return "Size is required";
  if (numberValue("Price", 0) <= 0) return "Price must be greater than 0";
  return null;
}

window.submitProduct = async function submitProduct() {
  const token = authToken();
  if (!token) {
    Swal.fire({ icon: "warning", title: "Please login first" });
    return;
  }
  const validationError = validateProductForm();
  if (validationError) {
    Swal.fire({ icon: "warning", title: validationError });
    return;
  }

  try {
    Swal.fire({ title: "Creating...", allowOutsideClick: false, didOpen: () => Swal.showLoading() });
    const data = await fetchJson(PRODUCT_INSERT, {
      method: "POST",
      headers: { Authorization: `Bearer ${token}` },
      body: buildProductFormData(),
    });
    await Swal.fire({
      icon: "success",
      title: "Product created",
      text: data?.message || "Created successfully",
    });
    window.location.href = "product.php";
  } catch (err) {
    Swal.fire({ icon: "error", title: "Create failed", text: err.message });
  }
};

window.submitProductUpdate = async function submitProductUpdate() {
  const token = authToken();
  const productId = new URLSearchParams(window.location.search).get("id") || textValue("ProductId");
  if (!token || !productId) {
    Swal.fire({ icon: "warning", title: "Missing token or product id" });
    return;
  }
  const validationError = validateProductForm();
  if (validationError) {
    Swal.fire({ icon: "warning", title: validationError });
    return;
  }

  try {
    Swal.fire({ title: "Updating...", allowOutsideClick: false, didOpen: () => Swal.showLoading() });
    const data = await fetchJson(`${PRODUCT_UPDATE_BASE}/${encodeURIComponent(productId)}`, {
      method: "PUT",
      headers: { Authorization: `Bearer ${token}` },
      body: buildProductFormData(),
    });
    await Swal.fire({
      icon: "success",
      title: "Product updated",
      text: data?.message || "Updated successfully",
    });
    window.location.href = "product.php";
  } catch (err) {
    Swal.fire({ icon: "error", title: "Update failed", text: err.message });
  }
};

async function loadProductForEdit() {
  const marker = document.getElementById("productEditPage");
  if (!marker) return;

  const productId = new URLSearchParams(window.location.search).get("id");
  if (!productId) return;

  const token = authToken();
  const headers = token ? { Authorization: `Bearer ${token}` } : {};
  const detail = await fetchJson(`${PRODUCT_DETAIL_BASE}/${encodeURIComponent(productId)}`, { headers });
  const p = detail?.data?.data || detail?.data || detail;

  document.getElementById("ProductId").value = p.id || "";
  document.getElementById("name").value = p.name || "";
  document.getElementById("ShortDescription").value = p.shortdescription || p.shortDescription || "";
  document.getElementById("Description").value = p.description || "";
  document.getElementById("BrandId").value = normalizeId(p.brandid || p.brandId || "");
  const categoryId = normalizeId(p.categoryid || p.categoryId || "");
  const subCategoryId = normalizeId(p.subcategoryid || p.subCategoryId || "");
  const targetCategoryId = subCategoryId || categoryId;
  const categoryPath = targetCategoryId ? findCategoryPathToId(categoryTree, targetCategoryId) : [];
  renderCategoryLevels(categoryPath);
  document.getElementById("ColorId").value = normalizeId(p.colorid || p.colorId || "");
  document.getElementById("SizeId").value = normalizeId(p.sizeid || p.sizeId || "");
  document.getElementById("Price").value = p.price ?? "";
  document.getElementById("DiscountPrice").value = p.discountprice ?? p.discountPrice ?? "";
  document.getElementById("CostPrice").value = p.costprice ?? p.costPrice ?? "";
  document.getElementById("TaxPercentage").value = p.taxpercentage ?? p.taxPercentage ?? 0;
  document.getElementById("Sku").value = p.sku || "";
  document.getElementById("StockQuantity").value = p.stockquantity ?? p.stockQuantity ?? 0;
  document.getElementById("MinStockQuantity").value = p.minstockquantity ?? p.minStockQuantity ?? 0;
  document.getElementById("Weight").value = p.weight ?? "";
  document.getElementById("Length").value = p.length ?? "";
  document.getElementById("Width").value = p.width ?? "";
  document.getElementById("Height").value = p.height ?? "";
  document.getElementById("MetaTitle").value = p.metatitle || "";
  document.getElementById("MetaDescription").value = p.metadescription || "";
  document.getElementById("MetaKeywords").value = p.metakeywords || "";
  document.getElementById("TrackInventory").checked = !!(p.trackinventory ?? p.trackInventory);
  document.getElementById("IsActive").checked = !!(p.isactive ?? p.isActive);
  document.getElementById("IsFeatured").checked = !!(p.isfeatured ?? p.isFeatured);

  const mainPrev = document.getElementById("existingMainImage");
  if (mainPrev && (p.mainimage || p.mainImage)) {
    mainPrev.src = resolveMedia(p.mainimage || p.mainImage);
    mainPrev.style.display = "block";
  }

  const galleryWrap = document.getElementById("existingGalleryImages");
  if (galleryWrap) {
    galleryWrap.innerHTML = "";
    const gallery = p.galleryimages || p.galleryImages || [];
    gallery.forEach((img) => {
      const el = document.createElement("img");
      el.src = resolveMedia(img);
      el.style.cssText = "width:70px;height:70px;object-fit:cover;border-radius:6px;margin:4px;";
      galleryWrap.appendChild(el);
    });
  }
}

async function loadProduct() {
  const tbody = document.getElementById("allproduct");
  if (!tbody) return;

  try {
    const token = authToken();
    const data = await fetchJson(`${API_BASE}/api/products/list`, {
      method: "GET",
      headers: token ? { Authorization: `Bearer ${token}` } : {},
    });

    const vendorId = getVendorIdFromToken();
    const vendorEmail = getVendorEmailFromToken();
    const vendorFullName = getVendorFullNameFromToken();
    const rawProducts = normalizeArrayPayload(data);
    const products = rawProducts.filter((product) => isProductOwnedByVendor(product, vendorId, vendorEmail, vendorFullName));
    tbody.innerHTML = "";

    products.forEach((product, index) => {
      const isActive = !!(product.isActive ?? product.isactive);
      const row = `
        <tr>
          <td>${index + 1}</td>
          <td class="d-flex align-items-center gap-2">
            <img
              src="${resolveMedia(product.mainImage || product.mainimage || product.image)}"
              class="rounded"
              height="48"
              width="48"
              style="object-fit: cover;"
              onerror="this.src='https://via.placeholder.com/48'"
            />
            <span>${truncateWords(product.name || product.productName || "", 5)}</span>
          </td>
          <td>${truncateWords(product.shortDescription || product.shortdescription || "", 5)}</td>
          <td>${truncateWords(product.description || "", 4)}</td>
          <td>${product.categoryName || product.categoryname || "-"}</td>
          <td>${product.brandName || product.brandname || "-"}</td>
          <td>${product.discountPrice ?? product.discountprice ?? "-"}</td>
          <td>${product.price ?? "-"}</td>
          <td>${product.stockQuantity ?? product.stockquantity ?? "-"}</td>
          <td>
            <span class="badge ${isActive ? "bg-success-subtle text-success" : "bg-danger-subtle text-danger"}">
              ${isActive ? "Active" : "Inactive"}
            </span>
          </td>
          <td>
            <i class="mdi mdi-square-edit-outline text-primary fs-3" style="cursor:pointer" onclick="editProduct('${product.id || product._id}')"></i>
          </td>
          <td>
            <i class="mdi mdi-delete text-danger fs-3" style="cursor:pointer" onclick="deleteProduct('${product.id || product._id}')"></i>
          </td>
        </tr>`;
      tbody.insertAdjacentHTML("beforeend", row);
    });
  } catch (error) {
    console.error("Error:", error);
  }
}

async function uploadProductsFile(file) {
  const token = authToken();
  if (!token) {
    Swal.fire({ icon: "warning", title: "Please login first" });
    return;
  }
  if (!file) {
    Swal.fire({ icon: "warning", title: "Please select a file first" });
    return;
  }

  const formData = new FormData();
  formData.append("file", file);

  try {
    Swal.fire({ title: "Uploading...", allowOutsideClick: false, didOpen: () => Swal.showLoading() });
    const response = await fetchJson(PRODUCT_IMPORT, {
      method: "POST",
      headers: { Authorization: `Bearer ${token}` },
      body: formData,
    });
    await Swal.fire({
      icon: "success",
      title: "Import complete",
      text: response?.message || "Products imported successfully.",
    });
    const modalEl = document.getElementById("importModal");
    if (modalEl && window.bootstrap?.Modal) {
      const modalInstance = window.bootstrap.Modal.getInstance(modalEl);
      modalInstance?.hide();
    }
    const fileInput = document.getElementById("excelFile");
    if (fileInput) fileInput.value = "";
    loadProduct();
  } catch (err) {
    Swal.fire({ icon: "error", title: "Import failed", text: err.message });
  }
}

async function exportProducts() {
  const token = authToken();
  if (!token) {
    Swal.fire({ icon: "warning", title: "Please login first" });
    return;
  }

  try {
    const res = await fetch(PRODUCT_EXPORT, {
      method: "GET",
      headers: { Authorization: `Bearer ${token}` },
    });
    if (!res.ok) throw new Error(`Export failed (${res.status})`);

    const blob = await res.blob();
    const downloadUrl = URL.createObjectURL(blob);
    const link = document.createElement("a");
    link.href = downloadUrl;
    link.download = `vendor-products-${new Date().toISOString().slice(0, 10)}.xlsx`;
    document.body.appendChild(link);
    link.click();
    link.remove();
    URL.revokeObjectURL(downloadUrl);
  } catch (err) {
    Swal.fire({ icon: "error", title: "Export failed", text: err.message });
  }
}

window.editProduct = function editProduct(id) {
  window.location.href = `product-edit.php?id=${encodeURIComponent(id)}`;
};

window.deleteProduct = async function deleteProduct(id) {
  const token = authToken();
  if (!token) {
    Swal.fire({ icon: "warning", title: "Login required", text: "Please login first." });
    return;
  }
  const confirm = await Swal.fire({
    icon: "warning",
    title: "Delete permanently?",
    text: "This action cannot be undone!",
    showCancelButton: true,
    confirmButtonText: "Yes, delete",
    cancelButtonText: "Cancel",
  });
  if (!confirm.isConfirmed) return;

  try {
    Swal.fire({ title: "Deleting...", allowOutsideClick: false, didOpen: () => Swal.showLoading() });
    await fetchJson(`${API_BASE}/api/products/permanent-delete-product/${id}`, {
      method: "DELETE",
      headers: { Authorization: `Bearer ${token}` },
    });
    await Swal.fire({ icon: "success", title: "Deleted!", text: "Product deleted successfully." });
    loadProduct();
  } catch (err) {
    Swal.fire({ icon: "error", title: "Error", text: err.message });
  }
};

document.addEventListener("DOMContentLoaded", async () => {
  const hasCategoryUi = document.getElementById("CategoryLevelsContainer");
  if (hasCategoryUi) {
    try {
      await loadProductFormOptions();
      await loadProductForEdit();
    } catch (err) {
      console.error("Form setup error:", err);
    }
  }
  const uploadBtn = document.getElementById("uploadExcelBtn");
  const fileInput = document.getElementById("excelFile");
  if (uploadBtn && fileInput) {
    uploadBtn.addEventListener("click", (e) => {
      e.preventDefault();
      uploadProductsFile(fileInput.files?.[0]);
    });
  }

  const exportBtn = document.getElementById("exportProductsBtn");
  if (exportBtn) {
    exportBtn.addEventListener("click", (e) => {
      e.preventDefault();
      exportProducts();
    });
  }

  loadProduct();
});
