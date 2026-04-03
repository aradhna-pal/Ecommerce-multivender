document.addEventListener("DOMContentLoaded", function () {

    const saveBtn = document.getElementById("saveAddressBtn");

    saveBtn.addEventListener("click", async function () {

        // 1. Form Validation
        if (!validateAddressForm()) {
            Swal.fire({
                title: "Validation Error",
                text: "Please fill all required fields correctly",
                icon: "error"
            });
            return;
        }

        // 2. Get User Token
        const userToken = localStorage.getItem("userToken");
        if (!userToken) {
            Swal.fire({
                title: "Login Required",
                text: "Please login to save address",
                icon: "warning"
            });
            return;
        }

        // 3. Prepare Payload
        const payload = {
            fullName: document.getElementById("fullName").value.trim(),
            phoneNumber: document.getElementById("phoneNumber").value.trim(),
            addressLine1: document.getElementById("addressLine1").value.trim(),
            addressLine2: document.getElementById("addressLine2").value.trim() || "",
            city: document.getElementById("city").value.trim(),
            state: document.getElementById("state").value.trim(),
            country: document.getElementById("country").value,
            postalCode: document.getElementById("postalCode").value.trim(),
            addressType: document.getElementById("addressType").value.trim(),
            isDefault: true
        };

        // Disable button + loading
        saveBtn.disabled = true;
        saveBtn.innerHTML = 'Saving... <span class="spinner-border spinner-border-sm"></span>';

        try {
            const response = await fetch(`http://multivendor_backend.workarya.com/api/address/add`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": "Bearer " + userToken
                },
                body: JSON.stringify(payload)
            });

            if (!response.ok) {
                const text = await response.text();
                throw new Error(text || "Failed to save address");
            }

            const result = await response.json();

            // ✅ Success Message with Green Tick
            Swal.fire({
                title: "Address Saved!",
                text: "Your address has been saved successfully.",
                icon: "success",
                timer: 2000,
                showConfirmButton: false,
                timerProgressBar: true
            });

            // 🔥 Form Fields Blank Kar Do (Reset)
            clearAddressFormFields();

        } catch (error) {
            console.error("API Error:", error);

            Swal.fire({
                title: "Failed",
                text: error.message || "Something went wrong. Please try again.",
                icon: "error"
            });
        } finally {
            // Reset button
            saveBtn.disabled = false;
            saveBtn.innerHTML = "Save Address";
        }
    });
});

// ====================== VALIDATION ======================
function validateAddressForm() {
    let isValid = true;
    clearAllErrors();

    const fields = ["fullName", "phoneNumber", "city", "state", "postalCode", "country", "addressType", "addressLine1"];

    fields.forEach(field => {
        const value = document.getElementById(field).value.trim();
        if (value === "") {
            showError(field + "Error", "This field is required");
            isValid = false;
        }
    });

    // Phone validation
    const phone = document.getElementById("phoneNumber").value.trim();
    if (!/^[6-9]\d{9}$/.test(phone)) {
        showError("phoneNumberError", "Enter valid 10-digit mobile number");
        isValid = false;
    }

    return isValid;
}

// ====================== CLEAR FORM FIELDS ======================
function clearAddressFormFields() {
    // Sab fields ko blank kar dete hain
    document.getElementById("fullName").value = "";
    document.getElementById("phoneNumber").value = "";
    document.getElementById("addressLine1").value = "";
    document.getElementById("addressLine2").value = "";
    document.getElementById("city").value = "";
    document.getElementById("state").value = "";
    document.getElementById("postalCode").value = "";
    document.getElementById("addressType").value = "";   // dropdown/select
    
    // Country ko agar default rakhna hai toh uncomment kar do
    // document.getElementById("country").value = "India";

    clearAllErrors();   // Error messages bhi hata do
}

// ====================== ERROR FUNCTIONS ======================
function showError(errorId, message) {
    const el = document.getElementById(errorId);
    if (el) {
        el.textContent = message;
        el.style.display = "block";
    }
}

function clearAllErrors() {
    document.querySelectorAll('.invalid-feedback').forEach(el => {
        el.textContent = '';
        el.style.display = 'none';
    });
}