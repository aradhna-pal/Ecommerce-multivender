const SUPERADMIN_DASHBOARD_API_BASE = (() => {
  const localOverride = localStorage.getItem("apiBaseUrl");
  if (localOverride) return String(localOverride).replace(/\/$/, "");
  const isLocal = /^(localhost|127\.0\.0\.1)$/i.test(window.location.hostname);
  const configured = window.API_BASE_URL || window.BASE;
  if (isLocal && (!configured || /api\.workarya\.com/i.test(String(configured)))) {
    return "http://127.0.0.1:5098";
  }
  if (configured) return String(configured).replace(/\/$/, "");
  return (isLocal ? "http://127.0.0.1:5098" : "https://api.workarya.com").replace(/\/$/, "");
})();

function superadminDashboardToken() {
  return localStorage.getItem("superadminToken");
}

function formatCurrency(value) {
  const num = Number(value || 0);
  return `₹${num.toLocaleString("en-IN", { maximumFractionDigits: 0 })}`;
}

function setText(id, value) {
  const el = document.getElementById(id);
  if (el) el.textContent = value;
}

function renderSuperadminTrend(trend) {
  const el = document.querySelector("#balance_overview");
  if (!el || typeof ApexCharts === "undefined") return;
  const labels = (trend || []).map((x) => x.month || "-");
  const data = (trend || []).map((x) => Number(x.revenue || 0));

  el.innerHTML = "";
  const chart = new ApexCharts(el, {
    chart: { type: "area", height: 300, toolbar: { show: false } },
    series: [{ name: "Revenue", data }],
    xaxis: { categories: labels },
    stroke: { curve: "smooth", width: 3 },
    dataLabels: { enabled: false },
    colors: ["#0dcaf0"],
  });
  chart.render();
}

function updateSuperadminParamTable(data) {
  const rows = Array.from(document.querySelectorAll(".table-responsive.pt-2 tbody tr"));
  if (!rows.length) return;
  const mapped = [
    { label: "Products", today: data.totalProducts ?? 0, total: data.totalProducts ?? 0, percent: "100%" },
    { label: "Brands", today: data.totalBrands ?? 0, total: data.totalBrands ?? 0, percent: "100%" },
    { label: "Categories", today: data.totalCategories ?? 0, total: data.totalCategories ?? 0, percent: "100%" },
    { label: "Colors / Sizes", today: `${data.totalColors ?? 0} / ${data.totalSizes ?? 0}`, total: `${data.totalColors ?? 0} / ${data.totalSizes ?? 0}`, percent: "100%" },
  ];
  mapped.forEach((item, index) => {
    if (!rows[index]) return;
    const cells = rows[index].querySelectorAll("th, td");
    if (cells[0]) cells[0].textContent = item.label;
    if (cells[1]) cells[1].textContent = item.today;
    if (cells[2]) cells[2].textContent = item.total;
    if (cells[4]) cells[4].textContent = item.percent;
  });
}

async function loadSuperadminDashboard() {
  if (!document.getElementById("balance_overview")) return;
  const token = superadminDashboardToken();
  if (!token) return;

  try {
    const res = await fetch(`${SUPERADMIN_DASHBOARD_API_BASE}/api/dashboard/superadmin`, {
      headers: { Authorization: `Bearer ${token}` },
    });
    const json = await res.json();
    const data = json?.data || {};

    setText("sdTotalRevenue", formatCurrency(data.totalRevenue));
    setText("sdTotalVendors", String(data.totalVendors ?? 0));
    setText("sdTotalUsers", String(data.totalUsers ?? 0));
    setText("sdRevenueCard", formatCurrency(data.totalRevenue));
    setText("sdTotalProducts", String(data.totalProducts ?? 0));
    setText("sdTotalOrders", String(data.totalOrders ?? 0));
    renderSuperadminTrend(data.trend || []);
    updateSuperadminParamTable(data);
  } catch (e) {
    console.error("Superadmin dashboard load error:", e);
  }
}

document.addEventListener("DOMContentLoaded", loadSuperadminDashboard);
