const SUPERADMIN_DASHBOARD_API_BASE = (window.API_BASE_URL || window.BASE || "https://api.workarya.com").replace(/\/$/, "");

function superadminDashboardToken() {
  return localStorage.getItem("superadminToken");
}

function formatCurrency(value) {
  const num = Number(value || 0);
  return `₹${num.toLocaleString("en-IN", { maximumFractionDigits: 0 })}`;
}

function setCardValueByTitle(title, value) {
  const cards = Array.from(document.querySelectorAll(".card .card-body"));
  const card = cards.find((c) => {
    const heading = c.querySelector("h4");
    return heading && heading.textContent.trim().toLowerCase() === title.toLowerCase();
  });
  if (!card) return;
  const valueEl = card.querySelector("h2");
  if (valueEl) valueEl.textContent = value;
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

    setCardValueByTitle("Balance", formatCurrency(data.totalRevenue));
    setCardValueByTitle("Spending", String(data.totalVendors ?? 0));
    setCardValueByTitle("Total Profit", formatCurrency(data.totalRevenue));
    setCardValueByTitle("Running Project", String(data.totalProducts ?? 0));
    setCardValueByTitle("Expense Total", String(data.totalOrders ?? 0));
    renderSuperadminTrend(data.trend || []);
  } catch (e) {
    console.error("Superadmin dashboard load error:", e);
  }
}

document.addEventListener("DOMContentLoaded", loadSuperadminDashboard);
