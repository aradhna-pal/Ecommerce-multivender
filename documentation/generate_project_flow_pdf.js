const fs = require("fs");
const path = require("path");
const PDFDocument = require("pdfkit");

const outputPath = path.join(__dirname, "Multivendor-Complete-Flow.pdf");
const manifestPath = path.join(__dirname, "screenshots", "manifest.json");
const doc = new PDFDocument({ size: "A4", margin: 40 });
doc.pipe(fs.createWriteStream(outputPath));

const manifest = fs.existsSync(manifestPath)
  ? JSON.parse(fs.readFileSync(manifestPath, "utf8"))
  : { superadmin: [], vendor: [], user: [], generatedAt: new Date().toISOString() };

function title(text) {
  doc.fontSize(22).fillColor("#111827").text(text, { align: "center" });
  doc.moveDown(0.8);
}

function section(text) {
  doc.fontSize(15).fillColor("#0f172a").text(text);
  doc.moveDown(0.4);
}

function bullet(text) {
  doc.fontSize(11).fillColor("#1f2937").text(`- ${text}`, { width: 520 });
}

function addPageHeader(text) {
  doc.addPage();
  section(text);
}

function humanizeRouteFromFile(filePath) {
  const base = path.basename(filePath, ".png");
  const route = base
    .replace(/^(superadmin|vendor|user)_\d+_/, "")
    .replace(/^ecommerce_multivender_/, "")
    .replace(/_/g, " ")
    .trim();
  return route || "route page";
}

function addScreenshotPage(role, filePath) {
  addPageHeader(`${role.toUpperCase()} - ${humanizeRouteFromFile(filePath)}`);
  doc.fontSize(10).fillColor("#475569").text(`Route screenshot: ${filePath}`);
  doc.moveDown(0.5);
  if (!fs.existsSync(filePath)) {
    doc.fillColor("#b91c1c").text("Screenshot not found.");
    return;
  }
  const x = 45;
  const y = doc.y;
  const w = 510;
  const h = 640;
  doc.image(filePath, x, y, { fit: [w, h], align: "center", valign: "top" });
}

title("Multivendor Ecommerce Project");
doc.fontSize(14).fillColor("#334155").text("Complete Flow Document (PPT Style with Route Screenshots)", { align: "center" });
doc.moveDown(1);
bullet("Platform: Multi-role ecommerce system (User, Vendor, Superadmin)");
bullet(`Superadmin screenshots captured: ${manifest.superadmin.length}`);
bullet(`Vendor screenshots captured: ${manifest.vendor.length}`);
bullet(`User screenshots captured: ${manifest.user.length}`);
bullet("Includes key flow explanation and route-wise visual pages.");

addPageHeader("1) User Flow Summary");
bullet("Browse catalog, product details, cart, and checkout.");
bullet("Place order and track from dashboard.");
bullet("Update profile, password, and email.");
bullet("Receive order and status update email notifications.");

addPageHeader("2) Vendor Flow Summary");
bullet("Vendor authentication and dashboard access.");
bullet("Product operations: add/edit/price/stock.");
bullet("Catalog masters and coupon handling.");
bullet("Order visibility and business profile workflows.");

addPageHeader("3) Superadmin Flow Summary");
bullet("System-level management over users and vendors.");
bullet("Catalog masters: categories, brands, colors, sizes.");
bullet("Content and growth modules: banners, blogs, inquiries.");
bullet("Order and governance operations through admin routes.");

addPageHeader("4) Technical Highlights");
bullet("Frontend: PHP route-driven pages for each role.");
bullet("Backend: .NET APIs for auth, orders, and notifications.");
bullet("Role-based flows validated via route screenshot automation.");
bullet("Email module confirms transactional communication events.");

for (const s of manifest.superadmin) addScreenshotPage("superadmin", s);
for (const s of manifest.vendor) addScreenshotPage("vendor", s);
for (const s of manifest.user) addScreenshotPage("user", s);

addPageHeader("Conclusion");
bullet("The project demonstrates a complete multivendor lifecycle for three roles.");
bullet("Administrative, vendor, and customer responsibilities are clearly separated.");
bullet("Order + email flows are integrated and operational.");
bullet("The attached screenshots provide route-level visual evidence of implemented modules.");
doc.moveDown(1);
doc.fontSize(10).fillColor("#64748b").text(
  `Generated on: ${new Date().toISOString().replace("T", " ").slice(0, 19)} UTC`,
  { align: "right" }
);

doc.end();
console.log(`PDF generated: ${outputPath}`);
