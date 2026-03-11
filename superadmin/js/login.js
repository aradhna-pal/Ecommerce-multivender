

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


// login save
localStorage.setItem("adminLogin", "true");

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

