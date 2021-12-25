<?php 
function getBuyer($db,$username){
  $sql = "SELECT * FROM buyer where userName ='".$username."'";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // echo $result[0]['ID'];
  return $result;
}

function getSeller($db,$username){
  $sql = "SELECT * FROM seller where userName ='".$username."'";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // echo $result[0]['sellerId'];
  return $result;
}

function getNotificationsForBuyer($db,$ownerID){
  $sql = "SELECT * FROM notification WHERE id in (SELECT  notificationId from buyernotification WHERE ownerID =".$ownerID.") ORDER by date";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // echo $result[0]['message'];
  // print_r($result);
  return $result;
  
}
function getNotificationsForSeller($db,$ownerID){
  $sql = "SELECT * FROM notification WHERE id in (SELECT  notificationId from sellernotifications WHERE ownerID =".$ownerID.") ORDER by date";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // echo $result[0]['message'];
  // print_r($result);
  return $result;

}

?>