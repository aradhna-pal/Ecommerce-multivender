alert("Please accept Terms & Conditions");
document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("registerForm");
    alert(form);
    alert("Form Element: " + form);

    form.addEventListener("submit", async function (e) {
        alert("Submit Event Triggered");
        e.preventDefault();

        console.log("Form Submitted ✅");

        const firstname = document.getElementById("firstname").value;
        alert(firstname);
        const lastname = document.getElementById("lastname").value;
        alert(lastname);
        const email = document.getElementById("emailaddress").value;
        alert(email);
        const password = document.getElementById("password").value;
        alert(password);
        const phone = document.getElementById("phone").value;
        alert(phone);

        const checkbox = document.getElementById("checkbox-signUp");
        alert(checkbox);

        if (!checkbox.checked) {
            Swal.fire({
                icon: "warning",
                title: "Please accept Terms & Conditions"
            });
            return;
        }

        try {
            // FormData create
            const formData = new FormData();
            formData.append("firstname", firstname);
            formData.append("lastname", lastname);
            formData.append("email", email);
            formData.append("password", password);
            formData.append("phone", phone);
            formData.append("role", "SUPERADMIN");

            // API call
            const response = await fetch("http://multivendor_backend.workarya.com/register", {
                method: "POST",
                body: formData
            });

            const data = await response.json();

            console.log("API Response:", data);

           if (data.success === true) {
    Swal.fire({
        icon: "success",
        title: "User Registered Successfully 🎉"
    }).then(() => {
        window.location.href = "login.php"; // ✅ redirect here
    });

    form.reset();
} else {
    Swal.fire({
        icon: "error",
        title: data.message || "Registration Failed"
    });
}

        } catch (error) {
            console.error("Error:", error);

            Swal.fire({
                icon: "error",
                title: "Server Error"
            });
        }

    });

});

