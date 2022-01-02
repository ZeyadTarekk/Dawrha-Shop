<?php 
function getBuyer($db,$username){
  $sql = "CALL `getBuyerWithUserName`('$username');";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // echo $result[0]['ID'];
  return $result;
}

function getSeller($db,$username){
  $sql = "CALL `getSellerWithUserName`('$username');";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // echo $result[0]['sellerId'];
  return $result;
}

function getNotificationsForBuyer($db,$ownerID){
  $sql = "SELECT DISTINCT n.id, message,date,seen,sellerId,ownerID, s.fName ,s.lName  from notification as n , buyernotification , seller as s WHERE n.id = notificationId and ownerID =". $ownerID ." and s.ID = sellerId ORDER by date DESC;";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // echo $result[0]['message'];
  // print_r($result);
  return $result;
}

function getNotificationsForSeller($db,$ownerID){
  $sql = "SELECT DISTINCT n.id, message,date,seen,buyerId,ownerID, s.fName ,s.lName  from notification as n , sellernotifications , buyer as s WHERE n.id = notificationId and ownerID =" . $ownerID. " and s.ID = buyerId ORDER by date DESC;";
  $stmt = $db->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // echo $result[0]['message'];
  // print_r($result);
  return $result;
}

?>