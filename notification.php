<?php
  $pageTitle = 'Notifications';
  include "init.php";
  // session_start();
  if(!isset($_SESSION["typeOfUser"]))
    header("Location: logout.php");
  $Notifications = $_SESSION['not'];
  date_default_timezone_set("EET");
  $date = date('Y-m-d', time());
  $date = new DateTime($date);
  
?>

<div class="container pt-5 ">
  <div class="row  justify-content-center">
    <div class="col-lg-9">
      <div class="box shadow-sm rounded bg-white mb-3">
        <div class="box-title border-bottom p-3">
          <h6 class="m-0">Recent</h6>
        </div>
        <div class="box-body p-0">
          <?php foreach($Notifications as $noti): ?>
          <?php if($noti['seen']==='0'): ?>
          <div class="
                  p-3
                  d-flex
                  justify-content-between
                  align-items-center
                  bg-light
                  border-bottom
                ">
            <div class="fw-bold mr-3">
              <div><?php echo $noti['message'] ?>
              </div>
              <div class="small">
                <?php echo
       "Notification From ". $noti['fName']." ".$noti['lName']; ?>
              </div>
            </div>
            <div class="text-right text-muted pt-1">
              <?php $date1 = new DateTime($noti['date']); $interval = $date1->diff($date); if($interval->days == 0 ) echo "Today"; elseif($interval->days == 0) echo "A Day Ago"; else echo $interval->days . " Days Ago"; ?>
            </div>
          </div>
          <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="box shadow-sm rounded bg-white mb-3">
        <div class="box-title border-bottom p-3">
          <h6 class="m-0">Earlier</h6>
        </div>
        <div class="box-body p-0">
          <?php foreach($Notifications as $noti): ?>
          <?php if($noti['seen']==='1'): ?>
          <div class="
                  p-3
                  d-flex
                  justify-content-between
                  align-items-center
                  bg-white
                  border-bottom
                ">
            <div class="fw-normal mr-3">
              <div><?php echo $noti['message'] ?>
              </div>
              <div class="small">
                <?php echo
       "Notification From ". $noti['fName']." ".$noti['lName']; ?>
              </div>
            </div>
            <div class="text-right text-muted pt-1">
              <?php $date1 = new DateTime($noti['date']); $interval = $date1->diff($date); if($interval->days == 0 ) echo "Today"; elseif($interval->days == 0) echo "A Day Ago"; else echo $interval->days . " Days Ago"; ?>
            </div>
          </div>
          <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
  include $tpl . "footer.php";
  if(isset($_SESSION["typeOfUser"]) && $_SESSION['typeOfUser']=='buyer')
    setNotificationsSeenForBuyer($db,$_SESSION['userID']);
  elseif(isset($_SESSION["typeOfUser"]) && $_SESSION['typeOfUser']=='seller')
    setNotificationsSeenForSeller($db,$_SESSION['userID']);
  
?>