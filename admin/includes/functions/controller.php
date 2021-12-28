<?php 
//this file will be used to write sql commands like insert a new buyer or select items or etc..

//Start Admin
function AddNewAdmin($username, $fname, $lname, $email, $pass, $db) {
  $hashedPass = sha1($pass);
  $sql = "SET @fName='" . $fname . "';
          SET @lName='" . $lname . "';
          SET @userName='" . $username . "';
          SET @email='" . $email . "';
          SET @password='" . $hashedPass . "';
          CALL AddNewAdmin(@fName, @lName, @userName, @email, @password);";
  
  $db->exec($sql);
}

function InsertPhone($username, $phone, $db) {
  $sql = "SELECT ID FROM admin WHERE userName='" . $username . "';";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $ID = $result[0]['ID'];
  $insertSql = "INSERT INTO mobileadmin VALUES(" . $ID . ",'" . $phone . "')";
  $db->exec($insertSql);
}

function isUsedUserName($username, $db) {
  $sql = "SELECT userName FROM admin WHERE userName='" . $username . "';";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return count($result);
}

function isUsedEmail($email, $db) {
  $sql = "SELECT userName FROM admin WHERE email='" . $email . "';";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return count($result);
}

function GetAdmins($db) {
  $sql = "SELECT * FROM admin";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function GetAdminPhones($id, $db) {
  $sql = "SELECT * FROM mobileadmin WHERE adminId=" . $id . ";";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function CheckPhone($id, $phone, $db) {
  $sql = "SELECT * FROM mobileadmin WHERE adminId=" . $id . " AND phone='" . $phone . "';";
  $stmt = $db->query($sql);
  $count = $stmt->rowCount();
  return $count;
}

function InsertNewPhone($id, $phone, $db) {
  $insertSql = "INSERT INTO mobileadmin VALUES(" . $id . ",'" . $phone . "')";
  $db->exec($insertSql);
}

function DeletePhone($id, $phone, $db) {
  $deleteSql = "DELETE FROM mobileadmin WHERE mobileadmin.adminId=" . $id . " AND mobileadmin.phone ='" . $phone . "';";
  $db->exec($deleteSql);
}

function GetAdminByID($id, $db) {
  $sql = "SELECT * FROM admin WHERE ID=" . $id . ";";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function UpdateAdmin($id, $username, $fname, $lname, $email, $pass, $db) {
  $hashedPass = sha1($pass);
  $insertSql = "UPDATE admin as A SET A.fName='" . $fname . "', A.lName='" . $lname . "', A.userName='" . $username . "', A.email='" . $email . "', A.password='" . $hashedPass . "' WHERE A.ID = " . $id . ";";
  $db->exec($insertSql);
}

function DeleteAdminByID($id, $db) {
  $deleteSql = "DELETE FROM admin WHERE ID=" . $id . "";
  $db->exec($deleteSql);
}
//End Admin

//Start Categories Section
function GetCategories($db) {
  $sql = "SELECT * FROM category;";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function AddNewCategory($name, $des, $db) {
  $insertSql = "INSERT INTO category (categoryName, categoryDescription) VALUES ('" . $name . "', '" . $des . "');";
  $db->exec($insertSql);
}

function GetCategoryByID($id, $db) {
  $sql = "SELECT * FROM category WHERE cateogryId=" . $id . ";";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function UpdateCategory($id, $name, $des, $db) {
  $insertSql = "UPDATE category SET categoryName='" . $name . "', categoryDescription='" . $des . "' WHERE cateogryId=" . $id . ";";
  $db->exec($insertSql);
}

function DeleteCategoryByID($id, $db) {
  $deleteSql = "DELETE FROM category WHERE cateogryId=" . $id . ";";
  $db->exec($deleteSql);
}
//End Categories

//Start Buyer
function GetBuyers($db) {
  $sql = "SELECT * FROM buyer";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function GetBuyerPhones($id, $db) {
  $sql = "SELECT * FROM mobilebuyer WHERE buyerId=" . $id . ";";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function GetBuyerByID($id, $db) {
  $sql = "SELECT * FROM buyer WHERE ID=" . $id . ";";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function DeleteBuyerByID($id, $db) {
  $deleteSql = "DELETE FROM buyer WHERE ID=" . $id . "";
  $db->exec($deleteSql);
}
//End Buyer

//Start Seller
function GetSellers($db) {
  $sql = "SELECT * FROM seller";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function GetSellerPhones($id, $db) {
  $sql = "SELECT * FROM mobileseller WHERE sellerId=" . $id . ";";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function GetSellerByID($id, $db) {
  $sql = "SELECT * FROM seller WHERE ID=" . $id . ";";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function DeleteSellerByID($id, $db) {
  $deleteSql = "DELETE FROM seller WHERE ID=" . $id . "";
  $db->exec($deleteSql);
}
//End Seller

//Start Item
function GetItems($db) {
  $sql = "SELECT I.itemId,I.title,C.categoryName,S.fName,S.lName,I.price,I.quantity 
          FROM item as I,category as C,seller as S 
          WHERE I.categoryId=C.cateogryId AND I.sellerId=S.ID;";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function GetItemByID($id, $db) {
  $sql = "SELECT * FROM item WHERE itemId=" . $id . ";";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function DeleteItemByID($id, $db) {
  $deleteSql = "DELETE FROM item WHERE itemId=" . $id . "";
  $db->exec($deleteSql);
}

function GetItemViewByID($id, $db) {
  $sql = "SELECT * FROM item,seller WHERE item.sellerId=seller.ID;";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}
//End Item

?>


<!-- To do -->
<!-- Gm3 ele mtkrr ben el seller buyer and admin -->