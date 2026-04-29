const fs = require("fs");
const path = require("path");
const { chromium } = require("playwright");

const BASE = "http://localhost/Ecommerce-multivender";
const OUT_DIR = path.join(__dirname, "screenshots");
fs.mkdirSync(OUT_DIR, { recursive: true });

function safeName(value) {
  return value.replace(/[^a-z0-9]+/gi, "_").replace(/^_+|_+$/g, "").toLowerCase();
}

async function screenshotPage(page, role, url, index) {
  const u = new URL(url);
  const part = `${u.pathname}${u.search}` || "home";
  const file = path.join(OUT_DIR, `${role}_${String(index).padStart(2, "0")}_${safeName(part)}.png`);
  await page.screenshot({ path: file, fullPage: true, timeout: 120000, animations: "disabled" });
  return file;
}

async function collectLinks(page, prefix) {
  return await page.evaluate((startPrefix) => {
    const set = new Set();
    for (const a of document.querySelectorAll("a[href]")) {
      const href = a.getAttribute("href");
      if (!href) continue;
      if (href.startsWith("#") || href.startsWith("javascript:")) continue;
      try {
        const url = new URL(href, window.location.origin);
        if (url.origin !== window.location.origin) continue;
        if (!url.pathname.startsWith(startPrefix)) continue;
        set.add(url.toString());
      } catch {
      }
    }
    return [...set];
  }, prefix);
}

async function tryCommonLogin(page, email, password) {
  const emailSelectors = [
    'input[type="email"]',
    'input[name*="email" i]',
    'input[id*="email" i]',
    'input[type="text"]'
  ];
  const passSelectors = [
    'input[type="password"]',
    'input[name*="password" i]',
    'input[id*="password" i]'
  ];

  let emailFilled = false;
  for (const sel of emailSelectors) {
    const el = page.locator(sel).first();
    if (await el.count()) {
      await el.fill(email);
      emailFilled = true;
      break;
    }
  }
  if (!emailFilled) throw new Error("Email input not found");

  let passFilled = false;
  for (const sel of passSelectors) {
    const el = page.locator(sel).first();
    if (await el.count()) {
      await el.fill(password);
      passFilled = true;
      break;
    }
  }
  if (!passFilled) throw new Error("Password input not found");

  const submitCandidates = [
    'button[type="submit"]',
    'input[type="submit"]',
    'button:has-text("Log In")',
    'button:has-text("Login")',
    'button:has-text("Sign In")'
  ];
  for (const sel of submitCandidates) {
    const btn = page.locator(sel).first();
    if (await btn.count()) {
      await Promise.all([
        page.waitForLoadState("networkidle").catch(() => {}),
        btn.click()
      ]);
      return;
    }
  }
  throw new Error("Submit button not found");
}

async function captureRole({ role, loginUrl, email, password, routePrefix, maxPages = 20 }) {
  const browser = await chromium.launch({ headless: true });
  const context = await browser.newContext({ viewport: { width: 1600, height: 900 } });
  const page = await context.newPage();

  const captured = [];

  try {
    await page.goto(loginUrl, { waitUntil: "domcontentloaded", timeout: 60000 });
    await tryCommonLogin(page, email, password);
    await page.waitForTimeout(2000);

    let idx = 1;
    captured.push(await screenshotPage(page, role, page.url(), idx++));
    const dirName = role === "superadmin" ? "superadmin" : "vender";
    const localDir = path.join(__dirname, "..", dirName);
    const files = fs.readdirSync(localDir)
      .filter((f) => f.toLowerCase().endsWith(".php"))
      .filter((f) => !["header.php", "footer.php"].includes(f.toLowerCase()))
      .slice(0, maxPages);

    for (const file of files) {
      const url = `${BASE}/${dirName}/${file}`;
      try {
        await page.goto(url, { waitUntil: "domcontentloaded", timeout: 45000 });
        await page.waitForTimeout(1000);
        captured.push(await screenshotPage(page, role, page.url(), idx++));
      } catch {
      }
    }
  } finally {
    await context.close();
    await browser.close();
  }

  return captured;
}

async function captureUserFlow(email, password) {
  const browser = await chromium.launch({ headless: true });
  const context = await browser.newContext({ viewport: { width: 1600, height: 900 } });
  const page = await context.newPage();
  const captured = [];
  let idx = 1;

  try {
    await page.goto(`${BASE}/`, { waitUntil: "domcontentloaded", timeout: 60000 });
    await page.waitForTimeout(1000);
    captured.push(await screenshotPage(page, "user", page.url(), idx++));

    const routes = [
      `${BASE}/index.php`,
      `${BASE}/shop.php`,
      `${BASE}/cart.php`,
      `${BASE}/checkout.php`,
      `${BASE}/user-dashboard.php`,
      `${BASE}/wishlist.php`,
      `${BASE}/compare.php`
    ];
    for (const url of routes) {
      try {
        await page.goto(url, { waitUntil: "domcontentloaded", timeout: 45000 });
        await page.waitForTimeout(1200);
        captured.push(await screenshotPage(page, "user", page.url(), idx++));
      } catch {
      }
    }
  } finally {
    await context.close();
    await browser.close();
  }
  return captured;
}

async function main() {
  const superadmin = await captureRole({
    role: "superadmin",
    loginUrl: `${BASE}/superadmin/login`,
    email: "praveenbabu7300@gmail.com",
    password: "July@1234",
    routePrefix: "/Ecommerce-multivender/superadmin/",
    maxPages: 200
  });

  const vendor = await captureRole({
    role: "vendor",
    loginUrl: `${BASE}/vender/login`,
    email: "yogeshkumar0000@gmail.com",
    password: "July@1234",
    routePrefix: "/Ecommerce-multivender/vender/",
    maxPages: 200
  });

  let user = [];
  try {
    user = await captureUserFlow("a.pal@hyperscripts.io", "July@1234");
  } catch (err) {
    console.error("User flow capture failed:", err.message);
  }

  const manifest = {
    generatedAt: new Date().toISOString(),
    superadmin,
    vendor,
    user
  };

  fs.writeFileSync(path.join(OUT_DIR, "manifest.json"), JSON.stringify(manifest, null, 2));
  console.log("Screenshots captured:", manifest);
}

main().catch((err) => {
  console.error(err);
  process.exit(1);
});
