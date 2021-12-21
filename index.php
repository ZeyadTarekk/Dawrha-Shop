<?php
  $pageTitle = 'Home Page';
  include "init.php";
  $items = getItems($db);
  $categories = getCategories($db);
  $itemImages = getItemsImages($db);

  // Linking item cateogry to each item
    for($i=0,$j=count($categories); $i < $j ; ++$i) {
      for($k=0,$l=count($items);$k < $l;++$k){
        if($items[$k]['categoryId']==$categories[$i]['cateogryId']){
          $items[$k]["categoryName"]=$categories[$i]['categoryName'];
          // echo $items[$k]["categoryName"];
          } 
        }
    }

    // linking items image to each item
    for($i=0,$j=count($itemImages); $i < $j ; ++$i) {
      for($k=0,$l=count($items);$k < $l;++$k){
        if($items[$k]['itemId']==$itemImages[$i]['itemId']){
          $items[$k]["image"]=$itemImages[$i]['image'];
          // echo $items[$k]["image"];
          } 
        }
    }

?>

<div class="main-page pt-5 pb-5 bg-light">
  <div class="container-lg ">
    <div class="text-center ">
      <ol class="item-categories ">
        <li class=""><button class="btn btn-success active"><a href="#">All</a></button>
        </li>
        <?php foreach($categories as $cat): ?>
        <li><button class="btn btn-success"><a href="#"><?php echo $cat['categoryName'] ?></a></button></li>
        <?php endforeach; ?>
      </ol>
    </div>
    <div class="text-center">
      <div class="row row-of-card g-5 justify-content-center align-items-center">
        <?php foreach($items as $ite): ?>
        <div class="col-8 col-lg-4 col-xl-3 ">
          <a href="reviewitem.php" style="text-decoration:none; color:black">
            <div class="card m-md-auto shadow" style="width: 18rem;">
              <img src="<?php echo $imgs . $ite['image'] ?>" class="card-img-top" alt="Item">
              <div class="card-body">
                <h5 class="card-title"><?php echo $ite['title'] ?></h5>
                <h6 class="card-title"><?php echo $ite['categoryName'] ?></h6>
                <p class="card-text"> <?php echo $ite['description'] ?></p>
                <h4 class="card-title"><?php echo $ite['price'] . '$' ?></h4>
                <div class="card-body">
                  <a href="reviewitem.php" class="btn btn-success">Review</a>
                </div>
              </div>
            </div>
          </a>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <!-- </div> -->



  <?php include $tpl . "footer.php" ?>