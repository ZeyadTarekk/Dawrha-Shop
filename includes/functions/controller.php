<?php 
//this file will be used to write sql commands like insert a new buyer or select items or etc..
// Start homepage functions
function getItems($db) {
  $sql = "SELECT * FROM item";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}
function getItemsImages($db) {
  $sql = "SELECT * FROM itemimage";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}
function getCategories($db) {
  $sql = "SELECT * FROM category";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}
function getItemsByCategory($db,$categoryName){
  $sql = "SELECT * FROM item as e WHERE e.categoryId in (SELECT b.cateogryId from category as b WHERE categoryName = '".$categoryName."');";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}
// End homepage functions
// Signin functions
function getBuyerPassword_ID($username,$db){
    $sql = "SELECT password,ID FROM buyer WHERE userName = :username";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":username"=>$username));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}
function getSellerPassword_ID($username,$db){
    $sql = "SELECT password,ID FROM seller WHERE userName = :username";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":username"=>$username));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}
function getAdminPassword_ID($username,$db){
    $sql = "SELECT password,ID FROM admin WHERE userName = :username";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":username"=>$username));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}

// Signup functions
function isBuyerUserNameExist($username,$db){
    $sql = "SELECT 1 FROM buyer WHERE userName = :username";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":username"=>$username));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}
function isSellerUserNameExist($username,$db){
    $sql = "SELECT 1 FROM seller WHERE userName = :username";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":username"=>$username));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}
function isAdminUserNameExist($username,$db){
    $sql = "SELECT 1 FROM admin WHERE userName = :username";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":username"=>$username));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}
function isBuyerEmailExist($email,$db){
    $sql = "SELECT 1 FROM buyer WHERE email = :email";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":email"=>$email));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}
function isAdminEmailExist($email,$db){
    $sql = "SELECT 1 FROM admin WHERE email = :email";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":email"=>$email));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}
function isSellerEmailExist($email,$db){
    $sql = "SELECT 1 FROM seller WHERE email = :email";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(":email"=>$email));
    $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $rows;
}
function insertCart($db){
    $sql = "insert into cart (itemCount,payment) values (0,0)";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $last_id = $db->lastInsertId();
    return $last_id;
}
function insertBuyer($username,$password,$email,$fname,$lname,$db){
    $cartID = insertCart($db);
    $sql = "insert into buyer (userName,password,email,fName,lName,cartId) values (:username,:password,:email,:fname,:lname,:cartid)";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(
        ":username"=>$username,
        ":password"=>$password,
        ":email"=>$email,
        ":fname"=>$fname,
        ":lname"=>$lname,
        ":cartid"=>$cartID
    ));
    $last_id = $db->lastInsertId();
    return $last_id;
}
function insertSeller($username,$password,$email,$fname,$lname,$db){
    $sql = "insert into seller (userName,password,email,fName,lName) values (:username,:password,:email,:fname,:lname)";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(
        ":username"=>$username,
        ":password"=>$password,
        ":email"=>$email,
        ":fname"=>$fname,
        ":lname"=>$lname
    ));
    $last_id = $db->lastInsertId();
    return $last_id;
}

// Add Item

function insertItemName($title,$Des,$price,$quantity,$cat,$discount,$sellerid,$homeNum,$street,$city,$country,$db){
    $sql="INSERT INTO item ( title, description, price, quantity, addDate,categoryId,sellerId,comission,homeNumber,street,city,country)
    VALUES ('".$title."', '".$Des."', ".$price.", ".$quantity.", current_timestamp(), '1','21',".$discount.", ".$homeNum.",'".$street."','".$city."','".$country."')";
    $stmt=$db->prepare($sql);
    $stmt->execute();
    }

    //image uploading
    function insertImage($imageName,$db){
    $itemID=$db->lastInsertId();
    $sql="INSERT INTO itemimage ( itemId,image) 
    VALUES (".$itemID.",'".$imageName."')";
    $stmt=$db->prepare($sql);
    $stmt->execute();
    }

?>