// Start SignIn
function togglePasswordVisibility() {
  let password = document.getElementById("password");
  if (password.type === "password") {
      password.type = "text";
  } else {
      password.type = "password";
  }
  let eyeIcon = document.getElementById("eyeIcon");
  if (eyeIcon.classList.contains("bi-eye")) {
      eyeIcon.classList.remove("bi-eye");
      eyeIcon.classList.add("bi-eye-slash");
  } else {
      eyeIcon.classList.remove("bi-eye-slash");
      eyeIcon.classList.add("bi-eye");
  }
}
// End SignIn

//Start ReviewItem
let amount = document.getElementById("amount");
function ereasing() {
  amount.innerHTML = +amount.innerHTML - 1;
    if (amount.innerHTML < 0) {
      amount.innerHTML = 0;
    }
}
function adding(max) {
  if (amount.innerHTML < max) {
    amount.innerHTML = +amount.innerHTML + 1;
  }
}
//End ReviewItem