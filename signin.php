<?php
include "admin/includes/temps/header.php";
?>
    <div class="container-fluid text-center shadow p-2">
        <h3>Logo</h3>
    </div>
    <div class="row justify-content-evenly container-fluid">
        <div class="col-md-10 row justify-content-center m-5 text-center shadow">
            <div class="col-lg-5 col-md-12">
                <form class="form-signin p-5">
                    <h3 class="m-3">Sign in to your account</h3>
                    <p class="lead m-3">Dawrha </p>
                    <div class="input-group mb-4">
                        <input type="email" id="email" class="form-control" placeholder="Email Address" required>
                        <span class="input-group-text">@</span>
                    </div>
                    <div class="input-group mb-4">
                        <input type="password" id="password" class="form-control" placeholder="Password" required>
                        <span class="input-group-text" onclick="togglePasswordVisibility()">
                         <i class="bi bi-eye" id="eyeIcon"></i>
                    </span>
                    </div>
                    <p class="mb-4 text-secondary">By clicking Sign In, you agree to our <a href="#"
                                                                                            class="link-primary">Terms
                            of
                            Use</a> and our <a href="#" class="link-primary">Privacy Policy</a>.</p>
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-block btn-success text-white rounded-pill btn-lg"
                               value="Sign-in">
                    </div>
                    <span class="d-block text-left my-4 text-muted">— or signup —</span>
                    <button type="button" class="btn btn-block btn-success text-white rounded-pill btn-lg ps-5 pe-5">Sign-up</button>
                </form>
            </div>
            <div class="col-lg-7 col-md-12">
                <img src="./Login-img.png" alt="Login image" class="img-fluid">
            </div>
        </div>
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