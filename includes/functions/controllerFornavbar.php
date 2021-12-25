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
?>