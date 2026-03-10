alert("kjhrfkemdvj");
document.getElementById("registerForm").addEventListener("submit", async function (e) {
  e.preventDefault();

  const firstname = document.getElementById("firstname").value;
  const lastname = document.getElementById("lastname").value;
  const email = document.getElementById("emailaddress").value;
  const password = document.getElementById("password").value;
  const phone = document.getElementById("phone").value;
  const role = document.getElementById("role").value;

  const payload = {
    email: email,
    password: password,
    firstname: firstname,
    lastname: lastname,
    phone: phone,
    role: role
  };

  console.log("Request Payload:", payload);

  try {

    const response = await fetch("http://multivendor_backend.workarya.com/register", {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(payload)
    });

    const data = await response.json();

    console.log("API Response:", data);

    if (response.ok) {

      alert("Signup Successful! Redirecting to Login...");

      // redirect to login page
      window.location.href = "login.html";

    } else {
      alert(data.message || "Signup Failed");
    }

  } catch (error) {
    console.error("Signup Error:", error);
    alert("Something went wrong!");
  }

});