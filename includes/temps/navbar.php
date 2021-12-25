<?php
  require 'admin/connect.php' ;
  $func = "includes/functions/";
  require $func . 'controllerForNavbar.php';

  session_start();
  // $_SESSION["username"]= 'ZeyadTarek';
  // unset($_SESSION["username"]);
  // $_SESSION["typeOfUser"] = 'seller';
  // unset($_SESSION["typeOfUser"]);
  if(isset($_SESSION["typeOfUser"]) && $_SESSION["typeOfUser"]==="buyer")
    $User = getBuyer($db,$_SESSION["username"]);
  else if(isset($_SESSION["typeOfUser"]) && $_SESSION["typeOfUser"]==="seller")
    $User = getSeller($db,$_SESSION["username"]);
?>
<?php if(isset($_SESSION["username"])): ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-success ">
  <div class="container-fluid ">
    <a class="navbar-brand" href="index.php" style=" order:1">Logo</a>
    <a class="navbar-brand ms-1 mt-3 m-lg-auto notification-icon me-lg-2" href="#" id="navbarDropdown11" role="button"
      data-bs-toggle="dropdown" aria-expanded="false" style="position: relative; display:inline-block; ">
      <i class="fa fa-bell" style="font-size: 23px; color: white; "></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-notification" aria-labelledby="navbarDropdown11" style="right: 0;">
      <li><a class="dropdown-item" href="#">First Notification</a></li>
      <li><a class="dropdown-item" href="#">First Notification</a></li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li><a class="dropdown-item" href="#">Older Notification</a></li>
    </ul>

    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div style=" order:2" class="collapse navbar-collapse justify-content-end align-center" id="navbarSupportedContent">
      <form class="m-auto  d-flex  mt-3 mt-lg-auto" action="" method="">
        <input class="form-control me-2 search-input" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
      <ul class="navbar-nav text-center">
        <!-- Start Difference -->

        <li class="nav-item dropdown ">
          <a class="nav-link d-none d-lg-block" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-profile mt-3 mt-lg-0 mb-2 mb-lg-0" aria-labelledby="navbarDropdown1"
            style="top: 52px; left: -50px;">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Cart </a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Log Out</a></li>
          </ul>
        </li>
        <li class="nav-item ">
          <a class="nav-link active me-lg-3" aria-current="page"
            href="#"><?php echo $User[0]['fName']." ". $User[0]['lName'] ?></a>
        </li>
        <!-- End Difference-->
      </ul>
    </div>
  </div>
</nav>
<?php else: ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-success ">
  <div class="container-fluid ">
    <a class="navbar-brand" href="index.php">Logo</a>
    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end align-center" id="navbarSupportedContent">
      <form class="m-auto  d-flex mt-3 mt-lg-0" action="" method="">
        <input class="form-control me-2 search-input" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
      <ul class="navbar-nav text-center">
        <!-- Start Difference -->
        <a class="btn btn-outline-light mt-3 mt-lg-0  me-lg-3  " href="signup.php" role="button">Sign Up</a>
        <a class="btn btn-outline-light mt-3 mb-3 mb-lg-0 mt-lg-0  me-lg-3 " href="signin.php" role="button">Log In</a>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Guest</a>
        </li>
        <!-- End Difference-->
      </ul>
    </div>
  </div>
</nav>
<?php endif ?>