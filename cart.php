<?php
ob_start();
$pageTitle = "Cart Item";
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

            echo ' 
            <div class="col-8 col-lg-4 col-xl-3 ">
                <div class="card m-md-auto shadow" style="width: 18rem;">
                    <a href="cart.php?deleteItem='. $k['itemId'] .'&finalPrice=' . $finalPrice . '" id="stopRedirect"  class="btn btn-danger rounded-pill position-absolute"
                        style="width: fit-content; top: 0;right: 0"  onclick="return  deleteItemCart()">
                        <span class="badge"><i class="bi bi-trash"></i>
                        </span></a> ';?>
            <img src="<?php echo $imgs . "Login-img.png" ?>" class="card-img-top" alt="Item">
            <?php  echo'
            <div class="card-body">
                <h5 class="card-title">
                    '.$k['title'].' </h5>
                <p class="card-text">'.$k['description'].' </p>
                <h4 class="card-title">' .$finalPrice.' $</h4>
            <div class="card-body">
                <a href="reviewItem.php?do=Manage&itemId=' . $k['itemId'] . '&itemName=' . $k['itemId'] . '" class="btn btn-success">View Item</a>
                <a href="cart.php?itemID='.$k['itemId'].'&userID='.$_SESSION['id'].'&orderPrice='.$finalPrice.'&qty='.$k['quantity'].'" class="btn btn-primary">Order Item</a>
            </div>
        </div>
    </div>
</div>';?>
            <?php endforeach?>

        </div>
    </div>
</div>


<?php 
include $tpl . 'footer.php';
ob_end_flush();
?>