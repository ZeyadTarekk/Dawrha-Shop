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
?>
<div class="container-lg text-center shadow p-5 mt-4 mb-4 border-3">
    <div class="text-center">
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
                <a href="" class="btn btn-primary">Order Item</a>
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