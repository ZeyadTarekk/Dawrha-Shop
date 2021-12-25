<?php 
//this file will be used to write sql commands like insert a new buyer or select items or etc..
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
?>