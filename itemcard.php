<?php
$noNavbar = '';
$pageTitle = 'Card only';
include "init.php";
?>

<div class="container-lg text-center pt-5">
  <div class="text-center">
    <div class="row row-of-card g-5 justify-content-center align-items-center">
      <div class="col-8 col-lg-4 col-xl-3 ">
        <!-- This is the main card and the outer classes are for styling in this page only -->
        <div class="card m-md-auto" style="width: 18rem;">
          <img src="<?php echo $imgs . "Login-img.png" ?>" class="card-img-top" alt="Item">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
            <div class="card-body">
              <a href="#" class="btn btn-success">Go 1</a>
              <a href="#" class="btn btn-danger">Go 2</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include $tpl . "footer.php" ?>