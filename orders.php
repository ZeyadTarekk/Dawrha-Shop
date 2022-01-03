<?php
ob_start();
$pageTitle = 'Orders';
$images = "layout/images/";
include "init.php";
if (!isset($_SESSION['username'])) {
    header("location: signin.php");
    return;
}
if (!isset($_GET['itemid'])) {
    header("Location: profileSeller.php");
    return;
}
if (isset($_GET['deleteOrderId'])) {
    deleteOrder($_GET['deleteOrderId'], $db);
    header("Location: orders.php?itemid=".$_GET['itemid'] );
    return;
}
$orderDetails = getOrdersOfItem($_GET['itemid'], $db);
$itemName = GetItemByID($_GET['itemid'], $db)[0]['title'];
?>
    <div class="container">
        <h1 class="text-center m-5">Orders for <?=$itemName?></h1>

        <table class="table table-hover text-center">
            <thead class="bg-success text-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Order date</th>
                <th scope="col">Buyer</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $cnt = count($orderDetails);
            for ($i = 0; $i < $cnt; $i++) {
                $buyer = getBuyerById($orderDetails[$i]->buyerId, $db)[0];
                ?>
                <tr>
                    <th scope="row"><?= $i ?></th>
                    <td> <?= $orderDetails[$i]->orderPrice ?> </td>
                    <td> <?= $orderDetails[$i]->quantity ?> </td>
                    <td> <?= $orderDetails[$i]->orderDate ?> </td>
                    <td> <?= $buyer->userName ?> </td>
                    <td>
                        <a href="orders.php" class="btn btn-success">Accept</a>
                        <a href="orders.php?itemid=<?=$_GET['itemid']?>&deleteOrderId=<?=$orderDetails[$i]->orderId?>" class="btn btn-danger">Decline</a>
                    </td>
                </tr>
                <?php
            }
            ?>

            </tbody>
        </table>

    </div>
<?php include $tpl . "footer.php";
ob_end_flush(); ?>