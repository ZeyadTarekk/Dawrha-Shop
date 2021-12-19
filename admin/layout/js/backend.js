function togglePasswordVisibility(num) {
  let password = document.getElementById("password" + num);
  if (password.type === "password") {
    password.type = "text";
  } else {
    password.type = "password";
  }
  let eyeIcon = document.getElementById("eyeIcon" + num);
  if (eyeIcon.classList.contains("bi-eye")) {
    eyeIcon.classList.remove("bi-eye");
    eyeIcon.classList.add("bi-eye-slash");
  } else {
    eyeIcon.classList.remove("bi-eye-slash");
    eyeIcon.classList.add("bi-eye");
  }
}
