// ****************************************************************LOGIN API ****************************************************************

function loginApi() {

  let email = document.getElementById("emailaddress").value.trim();
  let password = document.getElementById("password").value.trim();

  if (!email || !password) {
    Swal.fire({
      icon: "warning",
      title: "Please enter email and password"
    });
    return;
  }

  let formData = new FormData();
  formData.append("email", email);
  formData.append("password", password);

  fetch("https://api.workarya.com/api/login", {
    method: "POST",
    body: formData
  })
    .then(res => res.json())
    .then(data => {

      console.log("Login Response 👉", data);

      if (data.status === true || data.success === true) {

        // ✅ TOKEN HANDLE
        const token =
          data.token ||
          data.data?.token ||
          data.accessToken;

        localStorage.setItem("superadminToken", token);

        // ✅ SUCCESS + REDIRECT
        Swal.fire({
          icon: "success",
          title: "Login Successful ✅",
          timer: 1500,
          showConfirmButton: false
        });

        // 🔥 redirect (guaranteed)
        setTimeout(() => {
          window.location.href = "index.php";
        }, 1500);

      } else {
        Swal.fire({
          icon: "error",
          title: data.message || "Invalid Email or Password ❌"
        });
      }

    })
    .catch(err => {
      console.error(err);
      Swal.fire({
        icon: "error",
        title: "API Error ❌"
      });
    });
}



// ****************************************************************LOGOUT ****************************************************************
