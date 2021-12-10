<?php
include "admin/includes/temps/header.php";
?>
<div class="container-fluid text-center shadow p-2">
    <h1 class="display-4">Logo</h1>
</div>
<div class="row justify-content-center m-5 text-center">
    <form class="form-signin col-lg-6  shadow p-5">
        <h1 class="display-6 m-3">Sign in to your account</h1>
        <p class="lead m-3">Dawrha </p>
        <div class="input-group mb-4">
            <span class="input-group-text">@</span>
            <input type="email" id="email" class="form-control" placeholder="Email Address" required>
        </div>
        <div class="input-group mb-4">
            <span class="input-group-text" onclick="togglePasswordVisibility()">
                <i class="bi bi-eye" id="eyeIcon"></i>
            </span>
            <input type="password" id="password" class="form-control" placeholder="Password" required>
        </div>
        <p class="lead text-secondary">By clicking Sign In, you agree to our <a href="#" class="link-primary">Terms of
                Use</a> and our <a href="#" class="link-primary">Privacy Policy</a>.</p>
        <div class="d-grid gap-2">
            <input type="submit" class="form-control bg-primary text-white" value="Sign-in">
        </div>
    </form>

</div>

<script>
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
</script>
<?php
include "admin/includes/temps/footer.php";
?>