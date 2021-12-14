<?php
$noNavbar = '';
$pageTitle = 'SignUp';
include "init.php";
?>
    <div class="container-fluid text-center shadow p-2">
        <h3>Logo</h3>
    </div>
    <div class="row justify-content-evenly container-fluid">
        <div class="col-md-10 row justify-content-center m-5 text-center shadow">
            <div class="col-lg-5 col-md-12 ">
                <form class="form-signin p-5">
                    <h3 class="m-3">Create your account</h3>
                    <p class="lead m-3">Dawrha </p>
                    <div class="input-group mb-4">
                        <span class="input-group-text">@</span>
                        <input type="email" id="email" class="form-control" placeholder="Email Address" required>
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" id="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="bi bi-file-person"></i></span>
                        <input type="text" id="firstName" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="bi bi-file-person"></i></span>
                        <input type="text" id="lastName" class="form-control" placeholder="Last Name" required>
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="bi bi-phone"></i></span>
                        <input type="tel" id="typePhone" class="form-control" placeholder="Phone Number" required>

                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" id="password" class="form-control" placeholder="Password" required>
                        <span class="input-group-text" onclick="togglePasswordVisibility()"><i class="bi bi-eye"
                                                                                               id="eyeIcon"></i></span>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="userType" id="buyerCheck" value="buyer" checked>
                        <label class="form-check-label" for="buyerCheck">Buyer</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="userType" id="sellerCheck" value="seller">
                        <label class="form-check-label" for="sellerCheck">Seller</label>
                    </div>
                    <p class="mb-4 text-secondary">By clicking Sign-up, you agree to our <a href="#"
                                                                                            class="link-primary">Terms
                            of
                            Use</a> and our <a href="#" class="link-primary">Privacy Policy</a>.</p>
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-block btn-success text-white rounded-pill btn-lg"
                               value="Sign-up">
                    </div>
                    <span class="d-block text-left my-4 text-muted">— or sign-in —</span>
                    <a href="signin.php" type="button"
                       class="btn btn-block btn-success text-white rounded-pill btn-lg ps-5 pe-5">Sign-in</a>
                </form>
            </div>
            <div class="col-lg-7 col-md-12 order-lg-first">
                <img src=" <?php echo $imgs . "Signup.png" ?>" alt="Login image" class="img-fluid">
            </div>
        </div>
    </div>

<?php include $tpl . "footer.php" ?>