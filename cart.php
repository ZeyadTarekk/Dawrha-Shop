<?php
ob_start();
$pageTitle = "Cart";
include "init.php";
if(isset($_SESSION['typeOfUser'])&&$_SESSION['typeOfUser']!='buyer'){
    header("Location: index.php");
}

$cartID = GetCartIDFromBuyer($_SESSION["id"], $db)[0]['cartId'];

$items=cartItem($db,$_SESSION['id']);
if (isset($_GET['deleteItem'])) {
    deleteItemCart($cartID, $_GET['deleteItem'], $db);
    updateTheCartAfterDeletion($cartID, $_GET['finalPrice'], $db);
    header("Location: cart.php");
}
if(isset($_GET['orderPrice'])&&isset($_GET['qty'])&&isset($_GET['userID'])&&isset($_GET['itemID'])){
    makeAnOrder($db,$_GET['userID'],$_GET['itemID'],$_GET['orderPrice'],$_GET['qty']);
    header("Location: cart.php?Ordersuccess=true");
}
$Ordersuccess = false;
if(isset($_GET['Ordersuccess']))
    $Ordersuccess = true;
?>
<div class="container-lg text-center shadow p-5 mt-4 mb-4 border-3">
  <div class="text-center">
    <?php if($Ordersuccess): ?>
    <div class="alert alert-success m-auto mb-3" style="width: 50%;" role="alert">Order Done Successfully</div>
    <?php endif; ?>
    <div class="row row-of-card g-5 justify-content-start align-items-center">
      <?php
            foreach($items as $k):
            $finalPrice= (int)$k['quantity'] * (int)($k['price']) - (int)($k['price']) * (int)(($k['discount']/100));
            ?>
      <div class="col-8 col-lg-4 col-xl-3 ">
        <div class="card m-md-auto shadow" style="width: 19rem;">
          <a href="cart.php?deleteItem='. <?php echo $k['itemId']?> .'&finalPrice=' . $finalPrice . '" id="stopRedirect"
            class="btn btn-danger rounded-pill position-absolute" style="width: fit-content; top: 0;right: 0"
            onclick="return        deleteItemCart()">
            <span class="badge"><i class="bi bi-trash"></i>
            </span></a>
          <img src="<?php echo $imgs . "Login-img.png" ?>" class="card-img-top" alt="Item">
          <div class="card-body ">
            <h5 class="card-title">
              <?php echo $k['title']?> </h5>
            <p class="card-text"><?php echo $k['description'] ?> </p>
            <h4 class="card-title"> <?php echo  'Quantity: ' .$k['quantity'] ?> </h4>
            <h4 class="card-title"> <?php echo $finalPrice ?> $</h4>
            <div class="card-body">
              <a href="reviewItem.php?do=Manage&itemId= <?php echo $k['itemId']?>&itemName= <?php echo $k['itemId'] ?>"
                class="btn btn-success ">Edit quantity</a>
              <a href="cart.php?itemID=<?php echo $k['itemId']?>&userID=<?php echo $_SESSION['id']?>&orderPrice=<?php echo $finalPrice?>&qty=<?php echo $k['quantity']?>"
                class="btn btn-primary">Order Item</a>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach?>
    </div>
  </div>
</div>


<?php 
include $tpl . 'footer.php';
ob_end_flush();
?>