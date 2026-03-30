// register.js - handles the registration form submission and API interaction for user registration.
document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("registerForm");
    
   
    


    form.addEventListener("submit", async function (e) {
        // alert("Submit Event Triggered");
        e.preventDefault();

        console.log("Form Submitted ✅");
        

        const firstname = document.getElementById("firstname").value;
        const lastname = document.getElementById("lastname").value;
        const email = document.getElementById("emailaddress").value;
        const password = document.getElementById("password").value;
        const phone = document.getElementById("phone").value;
        const checkbox = document.getElementById("checkbox-signUp");

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
            formData.append("role", "USER");

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
                })
                // .then(() => {
                //     window.location.href = "login.php"; 
                // });

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

// login.js - handles the login form submission and API interaction for user authentication.
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("loginForm");
    form.addEventListener("submit", async function (e) {
        e.preventDefault();

        const email = document.getElementById("loginEmail").value;
        const password = document.getElementById("loginPassword").value;
        try {
            const formData = new FormData();
            formData.append("email", email);
            formData.append("password", password);
            const response = await fetch("http://multivendor_backend.workarya.com/api/login", {
                method: "POST",
                body: formData
            });
            const data = await response.json();
            console.log("API Response:", data);

            if (data.success === true) {
                Swal.fire({
                    icon: "success",
                    title: "Login Successful 🎉"
                }).then(() => {
                    window.location.href = "index.php"; // ✅ redirect here
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: data.message || "Login Failed"
                });
            }
        } catch (error) {
            console.error("Error:", error);
        }
    });
});



