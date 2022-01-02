<?php
ob_start();
$pageTitle = 'Edit profile';
$images = "layout/images/";
include "init.php";
//session_start();
//session_destroy();

//var_dump($_SESSION);
// if not signed in return to sign in
if (!isset($_SESSION['username'])) {
    header("Location: signin.php");
    return;
}
$userDate = "";
if ($_SESSION['typeOfUser'] == 'buyer') {
    $userDate = getBuyer($db, $_SESSION['username'])[0];
    $_SESSION['Edit_phone'] = getBuyerMobiles($_SESSION['id'], $db);
} else {
    $userDate = getSeller($db, $_SESSION['username'])[0];
    $_SESSION['Edit_phone'] = getSellerMobiles($_SESSION['id'], $db);
}
$_SESSION['Edit_email'] = $userDate['email'];
$_SESSION['Edit_username'] = $userDate['userName'];
$_SESSION['Edit_firstName'] = $userDate['fName'];
$_SESSION['Edit_lastName'] = $userDate['lName'];
$_SESSION['Edit_password'] = '';
var_dump($_SESSION);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // For printing
    $_SESSION['Edit_email'] = htmlentities($_POST['email']);
    $_SESSION['Edit_username'] = htmlentities($_POST['username']);
    $_SESSION['Edit_firstName'] = htmlentities($_POST['firstName']);
    $_SESSION['Edit_lastName'] = htmlentities($_POST['lastName']);
//    $_SESSION['Edit_phone'] = htmlentities($_POST['phone']);
    $_SESSION['Edit_password'] = htmlentities($_POST['password']);
    // error checking
    $_SESSION["missingError"] = "";
    $_SESSION['userNameError'] = "";
    $_SESSION['emailError'] = "";
    $_SESSION['firstNameError'] = "";
    $_SESSION['lastNameError'] = "";
    $_SESSION['passwordError'] = "";
    $_SESSION["missingError"] = $_SESSION["missingError"] . (empty($_POST['email']) ? " email" : "");
    $_SESSION["missingError"] = $_SESSION["missingError"] . (empty($_POST['username']) ? " username" : "");
    $_SESSION["missingError"] = $_SESSION["missingError"] . (empty($_POST['firstName']) ? " first name" : "");
    $_SESSION["missingError"] = $_SESSION["missingError"] . (empty($_POST['lastName']) ? " last name" : "");
    $_SESSION["missingError"] = $_SESSION["missingError"] . (empty($_POST['password']) ? " password" : "");

    $_SESSION['buyerUsernameId'] = $buyerUsernameId = (getBuyerIdByUserName($_POST["username"], $db)!=null?getBuyerIdByUserName($_POST["username"], $db)[0]->id:null);
    $_SESSION['sellerUsernameId'] = $sellerUsernameId = (getSellerIdByUserName($_POST["username"], $db)!=null?getSellerIdByUserName($_POST["username"], $db)[0]->id:null);
    $_SESSION['adminUsernameId'] = $adminUsernameId = getAdminIdByUserName($_POST["username"], $db);

    $_SESSION['buyerEmailId'] = $buyerEmailId = (getBuyerIdByEmail($_POST["email"], $db)!=null?getBuyerIdByEmail($_POST["username"], $db)[0]->id:null);
    $_SESSION['sellerEmailId'] = $sellerEmailId = (getSellerIdByEmail($_POST["email"], $db)!=null?getSellerIdByEmail($_POST["username"], $db)[0]->id:null);
    $_SESSION['adminEmailId'] = $adminEmailId = getAdminIdByEmail($_POST["email"], $db);

    $_SESSION['userNameError'] = validateUserName($_POST['username']);
    $_SESSION['emailError'] = validateEmail($_POST['email']);
    $_SESSION['firstNameError'] = validateName($_POST['firstName']);
    $_SESSION['lastNameError'] = validateName($_POST['lastName']);
    $_SESSION['passwordError'] = validatePassword($_POST['password']);
//    $_SESSION['phoneError'] = validateNumber($_POST['phone']);
    $condition1 = false;
    $condition2 = false;
    if ($_SESSION['typeOfUser'] == 'buyer') {
        $condition1 = ($buyerUsernameId && $buyerUsernameId != $_SESSION['id']) || ($sellerUsernameId) || ($adminUsernameId);
        $condition2 = ($buyerEmailId && $buyerEmailId != $_SESSION['id']) || ($sellerEmailId) || ($adminUsernameId);
    } else {
        $condition1 = ($buyerUsernameId) || ($sellerUsernameId && $sellerUsernameId != $_SESSION['id']) || ($adminUsernameId);
        $condition2 = ($buyerEmailId) || ($sellerEmailId && $sellerEmailId != $_SESSION['id']) || ($adminEmailId);
    }
    if ($condition1) {
        $_SESSION['userNameError'] = $_SESSION['Edit_username'] . " already exists";
    }
    if ($condition2) {
        $_SESSION['emailError'] = $_SESSION['Edit_email'] . " already exists";
    }
    if ((!isset($_SESSION['missingError']) || empty($_SESSION['missingError']))
        && (!isset($_SESSION['userNameError']) || empty($_SESSION['userNameError']))
        && (!isset($_SESSION['emailError']) || empty($_SESSION['emailError']))
        && (!isset($_SESSION['firstNameError']) || empty($_SESSION['firstNameError']))
        && (!isset($_SESSION['lastNameError']) || empty($_SESSION['lastNameError']))
        && (!isset($_SESSION['passwordError']) || empty($_SESSION['passwordError']))) {
        if ($_SESSION['typeOfUser'] == "buyer") {
            $_SESSION['Edit_password'] = sha1($_SESSION['Edit_password']);
            updateBuyer($_SESSION['id'], $_SESSION['Edit_username'], $_SESSION['Edit_password'], $_SESSION['Edit_email'], $_SESSION['Edit_firstName'], $_SESSION['Edit_lastName'], $db);
//            insertBuyerPhoneNumber($_SESSION['id'], $_SESSION['signup_phone'], $db);
            $_SESSION['username'] = $_SESSION['Edit_username'];
            header("Location: profileBuyer.php");
            return;
        } else {
            $_SESSION['Edit_password'] = sha1($_SESSION['Edit_password']);
            updateSeller($_SESSION['id'], $_SESSION['Edit_username'], $_SESSION['Edit_password'], $_SESSION['Edit_email'], $_SESSION['Edit_firstName'], $_SESSION['Edit_lastName'], $db);
//            insertSellerPhoneNumber($_SESSION['id'], $_SESSION['signup_phone'], $db);
            $_SESSION['username'] = $_SESSION['Edit_username'];
            header("Location: profileSeller.php");
            return;
        }
    } else {
        if (isset($_SESSION['missingError']) && !empty($_SESSION['missingError']))
            $_SESSION['missingError'] = "Please enter your " . $_SESSION['missingError'];
        header("Location: EditProfile.php");
        return;
    }
}
?>
    <div class="row justify-content-evenly container-fluid">
        <div class="col-md-10 row justify-content-center m-5 text-center shadow">
            <div class="col-lg-5 col-md-12 ">
                <form method="POST" action="EditProfile.php" class="form-signin p-5">
                    <h3 class="m-3">Create your account</h3>
                    <p class="lead m-3">Dawrha </p>
                    <div class="input-group mb-4">
                        <span class="input-group-text">@</span>
                        <input type="email"  id="email" class="form-control" placeholder="Email Address"
                               name="email"
                               value="<?php
                               if (isset($_SESSION['Edit_email'])) {
                                   echo $_SESSION['Edit_email'];
                               }
                               ?>">
                    </div>
                    <?php
                    if (isset($_SESSION['emailError']) && !empty($_SESSION['emailError'])) {
                        echo ' <div class="alert alert-danger" role="alert">' . $_SESSION["emailError"] . '</div> ';
                        unset($_SESSION['emailError']);
                    }
                    ?>
                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" id="username" class="form-control" placeholder="Username"
                               name="username"
                               value="<?php
                               if (isset($_SESSION['Edit_username'])) {
                                   echo $_SESSION['Edit_username'];
                               }
                               ?>">
                    </div>
                    <?php
                    if (isset($_SESSION['userNameError']) && !empty($_SESSION['userNameError'])) {
                        echo ' <div class="alert alert-danger" role="alert">' . $_SESSION["userNameError"] . '</div> ';
                        unset($_SESSION['userNameError']);
                    }
                    ?>
                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="bi bi-file-person"></i></span>
                        <input type="text"  id="firstName" class="form-control" placeholder="First Name"
                               name="firstName"
                               value="<?php
                               if (isset($_SESSION['Edit_firstName'])) {
                                   echo $_SESSION['Edit_firstName'];
                               }
                               ?>">
                    </div>
                    <?php
                    if (isset($_SESSION['firstNameError']) && !empty($_SESSION['firstNameError'])) {
                        echo ' <div class="alert alert-danger" role="alert">' . $_SESSION["firstNameError"] . '</div> ';
                        unset($_SESSION['firstNameError']);
                    }
                    ?>
                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="bi bi-file-person"></i></span>
                        <input type="text"  id="lastName" class="form-control" placeholder="Last Name"
                               name="lastName"
                               value="<?php
                               if (isset($_SESSION['Edit_lastName'])) {
                                   echo $_SESSION['Edit_lastName'];
                               }
                               ?>"
                        >
                    </div>
                    <?php
                    if (isset($_SESSION['lastNameError']) && !empty($_SESSION['lastNameError'])) {
                        echo ' <div class="alert alert-danger" role="alert">' . $_SESSION["lastNameError"] . '</div> ';
                        unset($_SESSION['lastNameError']);
                    }
                    ?>
                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password"  id="password" class="form-control" placeholder="Password"
                               name="password"
                               value="<?php
                               if (isset($_SESSION['Edit_password'])) {
                                   echo $_SESSION['Edit_password'];
                               }
                               ?>">
                        <span class="input-group-text" onclick="togglePasswordVisibility()"><i class="bi bi-eye"
                                                                                               id="eyeIcon"></i></span>
                    </div>
                    <?php
                    if (isset($_SESSION['passwordError']) && !empty($_SESSION['passwordError'])) {
                        echo ' <div class="alert alert-danger" role="alert">' . $_SESSION["passwordError"] . '</div> ';
                        unset($_SESSION['passwordError']);
                    }
                    ?>
                    <div class="text-danger">
                        <?php
                        if (isset($_SESSION['missingError']) && !empty($_SESSION['missingError'])) {
                            echo ' <div class="alert alert-danger" role="alert">' . $_SESSION["missingError"] . '</div> ';
                            unset($_SESSION['missingError']);
                        }
                        ?>
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-block btn-success text-white rounded-pill btn-lg"
                               value="Submit">
                    </div>
                </form>
            </div>
            <div class="col-lg-7 col-md-12 order-lg">
                <img src=" <?php echo $imgs . "Profile_data_bro.png" ?>" alt="Login image" class="img-fluid">
            </div>
        </div>
    </div>

<?php include $tpl . "footer.php" ;ob_end_flush();?>