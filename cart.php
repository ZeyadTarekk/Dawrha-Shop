<?php
ob_start();
$pageTitle = "Cart Item";
include "init.php";
if((isset($_SESSION['typeOfUser'])&&$_SESSION['typeOfUser']!='buyer')&&!isset($_GET['id'])){
    echo "mangaa ya beshoy";
    header("Location: index.php");
}

$cartID = GetCartIDFromBuyer($_SESSION["id"], $db)[0]['cartId'];

$items=cartItem($db);
if (isset($_GET['deleteItem'])) {
    deleteItemCart($cartID, $_GET['deleteItem'], $db);
    header("Location: cart.php");
}
?>
<div class="container-lg text-center shadow p-5 mt-4 mb-4 border-3">
    <div class="text-center">
        <div class="row row-of-card g-5 justify-content-start align-items-center">
            <?php
            foreach($items as $k):
            $finalPrice= $k['quantity'] * ($k['price'] - ($k['price'] * ($k['discount']/100)));

            echo ' 
            <div class="col-8 col-lg-4 col-xl-3 ">
                <div class="card m-md-auto shadow" style="width: 18rem;">
                    <a href="cart.php?deleteItem='.$k['itemId']. '" id="stopRedirect"   class="btn btn-danger rounded-pill position-absolute"
                        style="width: fit-content; top: 0;right: 0"  onclick="return  deleteItemCart()">
                        <span class="badge"><i class="bi bi-trash"></i>
                        </span></a> ';?>
            <img src="<?php echo $imgs . "Login-img.png" ?>" class="card-img-top" alt="Item">
            <?php  echo'
            <div class="card-body">
                <h5 class="card-title">
                    '.$k['title'].' </h5>
                <p class="card-text">'.$k['description'].' </p>
                <h4 class="card-title">' .$finalPrice.'   &#163;</h4>
            <div class="card-body">
                <a href="reviewItem.php?do=Manage&itemId=' . $k['itemId'] . '&itemName=' . $k['itemId'] . '" class="btn btn-success">view item</a>
                <a href="cart.php?deleteItem" class="btn btn-primary">order item</a>
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