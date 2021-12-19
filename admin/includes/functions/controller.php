<?php 
//this file will be used to write sql commands like insert a new buyer or select items or etc..

//Start Add Admin
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

function InsertNewPhone($username, $phone, $db) {
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
//End Add Admin
//Start Manage Admin

function GetAdmins($db) {
  $sql = "SELECT * FROM admin";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function GetAdminPhones($db) {
  $sql = "SELECT * FROM mobileadmin";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

//End Manage Admin






?>