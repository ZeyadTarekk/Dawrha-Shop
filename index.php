<?php
  $pageTitle = 'Home Page';
  require "init.php";
  $items = getItems($db);
  $categories = getCategories($db);
  $itemImages = getItemsImages($db);
  $categories = array_reverse($categories);

  if(isset($_GET['cat']))
    $items = getItemsByCategory($db,$_GET['cat']);

  $noItems = false;
  if(count($items)==0)
    $noItems = true;
  // Linking item cateogry to each item
  $iterI1 = count($categories);
  $iterk1 = count($items);
    for($i=0; $i < $iterI1 ; ++$i) {
      for($k=0;$k < $iterk1;++$k){
        if($items[$k]['categoryId']==$categories[$i]['cateogryId']){
          $items[$k]["categoryName"]=$categories[$i]['categoryName'];
          // echo $items[$k]["categoryName"];
          } 
        }
    }
    $iterI1 = count($itemImages);
    // linking items image to each item
    for($i=0; $i < $iterI1 ; ++$i) {
      for($k=0;$k < $iterk1;++$k){
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
        <li class=""><button class="btn btn-success <?php if(!isset($_GET['cat'])) echo "active"?> "><a
              href="index.php">All</a></button>
        </li>
        <?php foreach($categories as $cat): ?>
        <li><button
            class="btn btn-success <?php if(isset($_GET['cat'])&&$cat['categoryName']===$_GET['cat']) echo "active" ?> "><a
              href="<?php echo "index.php?cat=".$cat['categoryName'] ?>"><?php echo $cat['categoryName'] ?></a></button>
        </li>
        <?php endforeach; ?>
      </ol>
    </div>
    <div class="text-center">
      <?php if($noItems): ?>
      <p class="alert-danger ms-auto me-auto pt-5 pb-5" style="width:50%">No items in this Category</p>
      <?php else: ?>
      <div class="row row-of-card g-5 justify-content-center align-items-center">
        <?php foreach($items as $ite): ?>
        <div class="col-8 col-lg-4 col-xl-3 ">
          <a href="<?php echo "reviewitem.php?itemid=" . $ite['itemId'] ?>" style="text-decoration:none; color:black">
            <div class="card m-md-auto shadow" style="width: 18rem;">
              <img src="<?php echo $imgs . $ite['image'] ?>" class="card-img-top" alt="Item">
              <div class="card-body">
                <h5 class="card-title"><?php echo $ite['title'] ?></h5>
                <h6 class="card-title"><?php echo $ite['categoryName'] ?></h6>
                <p class="card-text"> <?php echo $ite['description'] ?></p>
                <h4 class="card-title"><?php echo $ite['price'] . '$' ?></h4>
                <div class="card-body">
                  <a href="<?php echo "reviewitem.php?id=" . $ite['itemId'] ?>" class="btn btn-success">Review</a>
                </div>
              </div>
            </div>
          </a>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <!-- </div> -->



  <?php include $tpl . "footer.php" ?>