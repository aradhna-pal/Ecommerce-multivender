
window.addEventListener("load", async function () {
  try {
    const token = localStorage.getItem("superadminToken");

    const vendorId = new URLSearchParams(window.location.search).get("id");
    console.log("Vendor ID from URL =>", vendorId);

    if (!vendorId) return;

    const res = await fetch("https://api.workarya.com/api/bank/get", {
      headers: {
        "Content-Type": "application/json",
        "Authorization": `Bearer ${token}`,
      },
    });

    const result = await res.json();
    console.log("Bank API Full Response =>", result);

    let banks = result.data || result;
    if (!Array.isArray(banks)) banks = [banks];

    const bank = banks.find(b => String(b.vendorId) === String(vendorId));
    console.log("Matched Bank =>", bank);

    if (!bank) {
      document.getElementById("accHolder").innerText = "No bank data found";
      return;
    }

    // 🔥 Important: check element exists before setting
    const setText = (id, value) => {
      const el = document.getElementById(id);
      if (el) el.innerText = value || "-";
      else console.warn("ID not found in HTML:", id);
    };

    setText("accHolder", bank.accountHolderName);
    setText("bankName", bank.bankName);
    setText("accNumber", bank.accountNumber);
    setText("country", bank.branchName);
    setText("confirmAccNumber", bank.accountNumber);
    setText("ifsc", bank.ifscCode);

    const cancelEl = document.getElementById("cancelCheck");
    if (cancelEl && bank.cancelCheck) {
      cancelEl.innerHTML = `<a href="${bank.cancelCheck}" target="_blank">View Check</a>`;
    }

  } catch (err) {
    console.error("Bank Load Error:", err);
  }
});




// ********************************************** business Detail ***********************************************

window.addEventListener("load", async function () {
  try {
    const token = localStorage.getItem("superadminToken");
    const vendorId = new URLSearchParams(window.location.search).get("id");

    const res = await fetch("https://api.workarya.com/api/vendor/business/list", {
      headers: {
        "Content-Type": "application/json",
        "Authorization": `Bearer ${token}`,
      },
    });

    const result = await res.json();
    const list = result?.data?.data || [];

    const b = list.find(x => x.vendorId === vendorId);
    if (!b) return;

    const set = (id, val) =>
      document.getElementById(id).innerHTML = val || "-";

    const link = url => url ? `<a href="${url}" target="_blank">Visit</a>` : "-";

    set("businessName", b.businessName);
    set("businessType", b.businessType);
    set("businessCategory", b.businessCategory);
    set("businessDescription", b.businessDescription);
    set("gstNumber", b.gstNumber);
    set("panNumber", b.panNumber);
    set("cinNumber", b.cinNumber);
    set("udyamNumber", b.udyamRegistrationNumber);
    set("addressLine1", b.addressLine1);
    set("addressLine2", b.addressLine2);
    set("city", b.city);
    set("state", b.state);
    set("country", b.country);
    set("pincode", b.pincode);
    set("businessEmail", b.businessEmail);
    set("businessPhone", b.businessPhone);
    set("alternatePhone", b.alternatePhone);

    set("websiteUrl", link(b.websiteUrl));
    set("gstDoc", link(b.gstDocumentUrl));
    set("panDoc", link(b.panDocumentUrl));
    set("cinDoc", link(b.cinCertificateUrl));
    set("logoUrl", link(b.businessLogoUrl));

    set("isVerified", b.isVerified ? "Yes" : "No");
    set("isActive", b.isActive ? 
        '<span class="badge bg-success">Active</span>' : 
        '<span class="badge bg-danger">Inactive</span>'
    );

  } catch (err) {
    console.error(err);
  }
});
