<?php
$noNavbar = "";
$pageTitle = "Cart Item";
include "init.php";
$rows=cartItem($db);
if (isset($_GET['deleteItem'])) {
    deleteItemCart($_GET['deleteItem'], $db);
    ?>
<script>
window.location.href = "cart.php";
</script>
<?php
}
?>
<div class="container-lg text-center pt-5">
    <div class="text-center">
        <div class="row row-of-card g-5 justify-content-start align-items-center">
            <?php
            foreach($rows as $k):
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
                <a href="reviewItem.php" class="btn btn-success">view item</a>
                <a href="cart.php?deleteItem" class="btn btn-primary">order item</a>
            </div>
        </div>
    </div>
</div>';?>
            <?php endforeach?>

        </div>
    </div>
</div>