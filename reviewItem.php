<?php
//get the name of the item to update the header
$itemName = isset($_GET['itemName']) ? $_GET['itemName'] : 0;
if (!$itemName) {
  //header("Location: index.php");
}
$pageTitle = $itemName;
include 'init.php';

if ($_SESSION['typeOfUser'] == "admin") {
  header("Location: admin/index.php");
}

$itemId = isset($_GET['itemId']) && is_numeric($_GET['itemId']) ? intval($_GET['itemId']) : 0;
if (!$itemId) {
  header("Location: index.php");
}

$do = isset($_GET['do'])? $_GET['do'] : 'Manage';

$item = GetItemByID($itemId, $db)[0];

if ($do == 'Manage') {
?>

<div class="container shadow mt-5 mb-5">
  <section class="review-item">
    <div class="gallery">
      <!-- the main image -->
      <div id="screen">
        <!-- remember to put each image in var then swap between them if any of the thumbnails picked -->
        <img src="<?php echo $dataimages . "image-product-1.jpg" ?>" alt="">
      </div>
      <div class="thumbnails">
        <!-- loop to get the number of images of the product -->
        <img src="<?php echo $dataimages . "image-product-1.jpg" ?>" alt="">
        <img src="<?php echo $dataimages . "image-product-2.jpg" ?>" alt="">
        <img src="<?php echo $dataimages . "image-product-3.jpg" ?>" alt="">
        <img src="<?php echo $dataimages . "image-product-4.jpg" ?>" alt="">
      </div>
    </div>
    <div class="product">
      <p class="seller-name">By: <?php echo $item['fName'] . ' ' . $item['lName']; ?></p>
      <hr>
      <span class="date-of-item">Added in : <?php echo $item['addDate']; ?></span>
      <p class="item-name"><?php echo $itemName; ?></p>
      <p class="description"><?php echo $item['description']; ?></p>
      <div class="price">
        <?php 
          if ($item['discount'] == 0) {
            echo '<div class="new-price">';
            echo $item['price'] . " $";
            echo '</div>';
          }else {
            echo '<div class="new-price">';
            echo $item['price'] - ($item['price'] * ($item['discount']/100)) . " $";
            echo '</div>';
            echo '<div class="discount">';
            echo $item['discount'] . "%";
            echo '</div>';
            echo '<div class="old-price">';
            echo $item['price'] . " $";
            echo '</div>';
          }
        ?>
      </div>
      <?php 
        if ($_SESSION['typeOfUser'] != 'seller') {
      ?>
      <form action="?do=Confirm&itemId=<?php echo $itemId ?>&itemName=<?php echo $itemName; ?>" class="order-section" method="POST">
        <div class="counter">
          <span class="left-btn" onclick="ereasing()"><i class="fas fa-minus"></i></span>
          <input type="number" id="amount" max="5" name="quan">
          <!-- need to send the max number of items to adding(max) -->
          <span class="right-btn" onclick="adding(<?php echo $item['quantity']; ?>)"><i class="fas fa-plus"></i></span>
        </div>
        <button class="add-to-cart-btn">
          <i class="fas fa-shopping-cart"></i>
          <span>Add to cart</span>
        </button>
      </form>
      <?php } ?>
    </div>
  </section>
</div>

<?php 
} elseif ($do == 'Confirm' && $_SESSION['id']) {
  if (isset($_POST['submit'])) {
    //add this item to the cart of that buyer(session_id)
    $num = $_GET['quantity'];
    //get the cart id from the buyer info
    $cartID = GetCartIDFromBuyer($_SESSION['id'], $db)[0];
    //update the itemCount and payment in cart
    $price = $num * ($item['price'] - ($item['price'] * ($item['discount']/100)));
    UpdateItemCount($cartID['cartId'], $price, $db);
    //insert into the cart item table
    InsertCartItem($cartID['cartId'], $item['itemId'], $num, $db);
    header("Location: index.php");
  } else {
  $num = $_POST['quan'];
  if ($num <= 0) {
    header("Location: reviewitem.php?do=Manage&itemId=" . $itemId . "&itemName=" . $itemName);
  } else {
?>

<div class="container shadow add-to-cart">
  <h1 class="text-center">Add to Cart</h1>
  <div class="info-section">
    <div class="item-name"><b>Item:</b> <?php echo $item['title']; ?></div>
    <div class="final-price"><b>Price:</b> <?php echo $item['price'] - ($item['price'] * ($item['discount']/100)); ?> $</div>
    <div class="quantity"><b>Quantity:</b> <?php echo $num; ?></div>
    <div class="total-price"><b>Total Price:</b> <?php echo $num * ($item['price'] - ($item['price'] * ($item['discount']/100))); ?> $</div>
    <div class="location"><b>Location:</b> <?php echo $item['homeNumber'] . ', ' .
                                  $item['street'] . ' ' . $item['city'] . ' ' . $item['country'];?></div>
  </div>
  <form action="?do=Confirm&itemId=<?php echo $itemId ?>&itemName=<?php echo $itemName; ?>&quantity=<?php echo $num; ?>" method="POST" class="text-center" method="POST">
    <button type="submit" name="submit" class="btn btn-success">Confirm</button>
    <a class="btn btn-danger" href="<?php echo '?do=Manage&itemId=' . $itemId . '&itemName=' . $itemName; ?>">Go Back</a>
  </form>
</div>

<?php
    }
  }
}

include $tpl . 'footer.php' 
?>