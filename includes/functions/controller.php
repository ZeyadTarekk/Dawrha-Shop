<?php
//this file will be used to write sql commands like insert a new buyer or select items or etc..
// Start homepage functions
function getItems($db)
{
    $sql = "call GetAllitems();";
    $stmt = $db->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getItemsImages($db)
{
    $sql = "call GetAllIamges();";
    $stmt = $db->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getCategories($db)
{
    $sql = "call GetAllCategories();";
    $stmt = $db->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getItemsByCategory($db, $categoryName)
{
    $sql = "SELECT * FROM item as e WHERE e.categoryId in (SELECT b.categoryId from category as b WHERE categoryName = '" . $categoryName . "');";
    $stmt = $db->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function searchForItems($db,$keyWord){
    $sql = "SELECT * FROM item WHERE title LIKE '%".$keyWord."%' UNION SELECT * FROM item WHERE description LIKE '%".$keyWord."%'";
    $stmt = $db->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// End homepage functions
// Signin functions
function getBuyerPassword_ID($username, $db)
{
    $sql = "SELECT password,ID FROM buyer WHERE userName = :username";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":username" => $username));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}

function getSellerPassword_ID($username, $db)
{
    $sql = "SELECT password,ID FROM seller WHERE userName = :username";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":username" => $username));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}

function getAdminPassword_ID($username, $db)
{
    $sql = "SELECT password,ID FROM admin WHERE userName = :username";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":username" => $username));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}

// Signup functions
function isBuyerUserNameExist($username, $db)
{
    $sql = "SELECT 1 FROM buyer WHERE userName = :username";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":username" => $username));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}

function isSellerUserNameExist($username, $db)
{
    $sql = "SELECT 1 FROM seller WHERE userName = :username";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":username" => $username));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}

function isAdminUserNameExist($username, $db)
{
    $sql = "SELECT 1 FROM admin WHERE userName = :username";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":username" => $username));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}

function isBuyerEmailExist($email, $db)
{
    $sql = "SELECT 1 FROM buyer WHERE email = :email";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":email" => $email));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}

function isAdminEmailExist($email, $db)
{
    $sql = "SELECT 1 FROM admin WHERE email = :email";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":email" => $email));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}

function isSellerEmailExist($email, $db)
{
    $sql = "SELECT 1 FROM seller WHERE email = :email";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":email" => $email));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}

function insertCart($db)
{
    $sql = "insert into cart (itemCount,payment) values (0,0)";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $last_id = $db->lastInsertId();
    return $last_id;
}

function insertBuyer($username, $password, $email, $fname, $lname, $db)
{
    $cartID = insertCart($db);
    $sql = "insert into buyer (userName,password,email,fName,lName,cartId) values (:username,:password,:email,:fname,:lname,:cartid)";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(
        ":username" => $username,
        ":password" => $password,
        ":email" => $email,
        ":fname" => $fname,
        ":lname" => $lname,
        ":cartid" => $cartID
    ));
    $last_id = $db->lastInsertId();
    return $last_id;
}

function insertSeller($username, $password, $email, $fname, $lname, $db)
{
    $sql = "insert into seller (userName,password,email,fName,lName) values (:username,:password,:email,:fname,:lname)";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(
        ":username" => $username,
        ":password" => $password,
        ":email" => $email,
        ":fname" => $fname,
        ":lname" => $lname
    ));
    $last_id = $db->lastInsertId();
    return $last_id;
}
function insertBuyerPhoneNumber($id,$mobile,$db){
    $sql = "insert into mobilebuyer (mobilebuyer.buyerId,mobilebuyer.phone) values (:id,:mobile)";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(
        ":id" => $id,
        ":mobile" => $mobile,
    ));
    $last_id = $db->lastInsertId();
    return $last_id;
}
function insertSellerPhoneNumber($id,$mobile,$db){
    $sql = "insert into mobileseller (mobileseller.sellerId,mobileseller.phoneNo) values (:id,:mobile)";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(
        ":id" => $id,
        ":mobile" => $mobile,
    ));
    $last_id = $db->lastInsertId();
    return $last_id;
}
// Add Item

function insertItemName($title,$Des,$price,$quantity,$catId,$discount,$sellerid,$homeNum,$street,$city,$country,$db){
    $sql="INSERT INTO item ( title, description, price, quantity, categoryId,sellerId,discount,homeNumber,street,city,country)
    VALUES ('".$title."', '".$Des."', ".$price.", ".$quantity.", ".$catId.",".$sellerid.",".$discount.", ".$homeNum.",'".$street."','".$city."','".$country."')";
    $stmt=$db->prepare($sql);
    $stmt->execute();
    }

    function checkUnique($db,$homeNum,$street,$city,$country){
        $sql="SELECT COUNT(*) FROM item WHERE  item.homeNumber=".$homeNum." AND item.city='".$city."' AND item.street='".$street."'
         AND item.country='".$country."'";
        $stmt = $db->query($sql);
        $result = $stmt->fetchColumn();
        return $result;
    }

    //image uploading
    function insertImage($imageName,$db){
    $itemID=$db->lastInsertId();
    $sql="INSERT INTO itemimage ( itemId,image) 
    VALUES (".$itemID.",'".$imageName."')";
    $stmt=$db->prepare($sql);
    $stmt->execute();
    }


// Seller's profile functions
function getSellerMobiles($id, $db)
{
    $sql = "SELECT phoneNo FROM mobileseller WHERE sellerId = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":id" => $id));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}

function getSellerForSaleItems($id, $db)
{
    $sql = "SELECT * FROM seller,item WHERE seller.ID = item.sellerId AND item.isDeleted = 0 AND item.quantity != 0 AND seller.ID = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":id" => $id));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}

function getSellerDeletedItems($id, $db)
{
    $sql = "SELECT * FROM seller,item WHERE seller.ID = item.sellerId AND item.isDeleted = 1 AND seller.ID = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":id" => $id));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}

function getSellerSoldOutItems($id, $db)
{
    $sql = "SELECT * FROM seller,item WHERE seller.ID = item.sellerId AND item.isDeleted = 0 AND item.quantity = 0  AND seller.ID = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":id" => $id));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}

function getCategory($catId, $db)
{
    $sql = "SELECT * from category WHERE category.categoryId = :catId";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":catId" => $catId));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}

function shallowDeleteItem($id, $db)
{
    $sql = "UPDATE item set item.isDeleted = 1 WHERE itemId = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":id" => $id));
}

function retrieveItem($id, $db)
{
    $sql = "UPDATE item set item.isDeleted = 0 WHERE itemId = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":id" => $id));
}

function permanentlyDeleteItem($id, $db)
{
    $sql = "DELETE FROM item WHERE item.itemId = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":id" => $id));
}
function getImageOfAnItem($id,$db){
    $sql = "SELECT image from itemimage WHERE itemimage.itemId = :id LIMIT 1";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":id" => $id));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}
function getOrdersCount($itemId,$db){
    $sql = "SELECT count(*) FROM orders,item WHERE orders.itemId = item.itemId AND item.itemId = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":id" => $itemId));
    $rows = $stmt->fetchColumn();
    return $rows;
}
// end profile seller
// Start notifications
function setNotificationsSeenForBuyer($db,$ownerID){
    $sql = "UPDATE notification set seen = 1 where id in (SELECT notificationId from buyernotification WHERE ownerID = :ownerId)";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":ownerId" => $ownerID));
    
}
function setNotificationsSeenForSeller($db,$ownerID){
    $sql = "UPDATE notification set seen = 1 where id in (SELECT notificationId from sellernotifications WHERE ownerID = :ownerId)";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":ownerId" => $ownerID));
}
// End notifications

// start edit item
function updateTitle($db,$itemID,$title){
    $sql="UPDATE `item` SET `title` = '".$title."' WHERE `item`.`itemId` = ".$itemID."";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}
function updateDescription($db,$itemID,$Des){
    $sql="UPDATE `item` SET `description` = '".$Des."' WHERE `item`.`itemId` = ".$itemID."";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}
function updatePrice($db,$itemID,$price){
    $sql="UPDATE `item` SET `price` = '".$price."' WHERE `item`.`itemId` = ".$itemID."";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}
function updateCategory($db,$itemID,$cat){
    $sql="UPDATE `item` SET `category` = '".$cat."' WHERE `item`.`itemId` = ".$itemID."";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}
function updateDiscount($db,$itemID,$discount){
    $sql="UPDATE `item` SET `discount` = '".$discount."' WHERE `item`.`itemId` = ".$itemID."";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}
function updateHomeNumber($db,$itemID,$homeNum){
    $sql="UPDATE `item` SET `homeNumber` = '".$homeNum."' WHERE `item`.`itemId` = ".$itemID."";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}
function updateStreet($db,$itemID,$street){
    $sql="UPDATE `item` SET `street` = '".$street."' WHERE `item`.`itemId` = ".$itemID."";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}
function updateCity($db,$itemID,$city){
    $sql="UPDATE `item` SET `city` = '".$city."' WHERE `item`.`itemId` = ".$itemID."";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}
function updateCountry($db,$itemID,$country){
    $sql="UPDATE `item` SET `country` = '".$country."' WHERE `item`.`itemId` = ".$itemID."";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}
function updateQuantity($db,$itemID,$quantity){
    $sql="UPDATE `item` SET `quantity` = ".$quantity." WHERE `item`.`itemId` = ".$itemID."";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}
//end edit item

// functions for buyer profile
function getBuyerMobiles($id, $db)
{
    $sql = "SELECT phone FROM mobilebuyer WHERE buyerId = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":id" => $id));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}
function getBuyerOrderedItems($id, $db)
{
    $sql = "SELECT * FROM buyer,orders,item WHERE buyer.ID = orders.buyerId AND orders.itemId = item.itemId AND buyer.ID = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":id" => $id));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}
function getBuyerDeletedItems($id, $db)
{
    $sql = "SELECT * FROM buyer,item WHERE buyer.ID = item.buyerId AND item.isDeleted = 1 AND buyer.ID = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":id" => $id));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}
function deleteOrder($id,$db){
    $sql = "DELETE FROM orders WHERE orders.itemId = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":id" => $id));
}
//start cart 

function cartItem($db){
    $sql="SELECT title,price,description,discount,item.quantity
    from buyer,cartitem,item WHERE buyer.cartId=cartitem.cartId AND cartitem.itemId=item.itemId";
    $stmt = $db->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
// end cart

//Start reviewItem
function GetItemByID($id, $db) {
    $sql = "SELECT * FROM item,seller WHERE item.sellerId=seller.ID AND item.itemId=" . $id . ";";
    $stmt = $db->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function GetCartIDFromBuyer($id, $db) {
    $sql = "SELECT cartId  FROM buyer WHERE ID=" . $id . ";";
    $stmt = $db->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function UpdateItemCount($id, $price, $db) {
    $updateSql = "UPDATE cart SET itemCount=itemCount+1, payment=payment+" . $price . " WHERE cart.cartId=" . $id . ";";
    $db->exec($updateSql);
}
function InsertCartItem($cartID, $itemID, $quantity, $db) {
    $insertSql = "INSERT INTO cartitem (cartId, itemId, quantity) VALUES (" . $cartID . ", " . $itemID . ", " . $quantity . ");";
    $db->exec($insertSql);
}
//End reviewItem
?>