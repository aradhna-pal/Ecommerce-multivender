// ****************************************************************LOGIN API ****************************************************************
function loginApi(){

let email = document.getElementById("emailaddress").value;
let password = document.getElementById("password").value;

if(email === "" || password === ""){
alert("Please enter email and password");
return;
}

let formData = new FormData();
formData.append("email", email);
formData.append("password", password);

fetch("http://multivendor_backend.workarya.com/api/login",{
method:"POST",
body:formData
})

.then(response => response.json())
.then(data => {

console.log(data);

if(data.status === true || data.success === true){

alert("Login Successful");

// superadmin token save
localStorage.setItem("vendorToken", data.token);

// login flag
// localStorage.setItem("adminLogin", "true");


// redirect
window.location.href="index.php";

}else{

alert("Invalid Email or Password");

}

})
.catch(error => {

console.log(error);
alert("API Error");

});

}

// ****************************************************************LOGOUT ****************************************************************

document.addEventListener("DOMContentLoaded", function () {
    const logoutBtn = document.getElementById("logoutBtn");

    if (logoutBtn) {
        logoutBtn.addEventListener("click", function (e) {
            e.preventDefault();

            localStorage.removeItem("vendorToken");

            window.location.href = "login.php";
        });
    } else {
        console.log("Logout button not found ❌");
    }
});
