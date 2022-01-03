<?php 
  ob_start();
  $pageTitle = "Statistics";
  include 'init.php';

  //main --> number of buyers    , sellers 
  //        last month join in   , last year join in
  //        orders in last month , orders in last year
  // flag --> 1 mainStats
  // flag --> 2 itemsOfEachSeller
  // flag --> 3 ordersOfEachItem
  
  // $flag = 1;
  // if (isset($_POST['mainStats'])) {
  //   $flag = 1;
  // }
  // if (isset($_POST['itemsOfEachSeller'])) {
  //   $flag = 2;
  // }
  // if (isset($_POST['ordersOfEachItem'])) {
  //   $flag = 3;
  // }
?>

<!-- <div class="container buyer mt-5 mb-5">
  <form action="stats.php" method="POST" class="search-form">
    <div class="search-btns">
      <input type="submit" name="mainStats" value="Main Stats" class="btn btn-primary">
      <input type="submit" name="itemsOfEachSeller" value="Items Of Each Seller" class="btn btn-primary">
      <input type="submit" name="ordersOfEachItem" value="Orders Of Each Item" class="btn btn-primary">
    </div>
  </form>
</div> -->

<div class="container mt-5 mb-5">
  <div class="table-responsive">
    <table class="table table-bordered text-center">
      <thead class="thead-dark">
        <tr>
          <th scope="col" class="table-dark">Stats</th>
          <th scope="col" class="table-dark">Number</th>
        </tr>
        </thead>
        <tbody>
          <?php 
              echo '
              <tr>
              <th scope="row">Number of Buyers</th>
              <td>' . GetNumOfBuyers($db) . '</td>
              </tr>';
              echo '
              <tr>
              <th scope="row">Number of Sellers</th>
              <td>' . GetNumOfSellers($db) . '</td>
              </tr>';
              echo '
              <tr>
              <th scope="row">Number of Users Joined During Last Month</th>
              <td>' . LastMonthUsers($db) . '</td>
              </tr>';
              echo '
              <tr>
              <th scope="row">Number of Users Joined During Last Year</th>
              <td>' . LastYearUsers($db) . '</td>
              </tr>';
              echo '
              <tr>
              <th scope="row">Number of Orders During Last Month</th>
              <td>' . LastMonthOrders($db) . '</td>
              </tr>';
              echo '
              <tr>
              <th scope="row">Number of Orders During Last Year</th>
              <td>' . LastYearOrders($db) . '</td>
              </tr>';
          ?>
      </tbody>
    </table>
  </div>
</div>


<?php 
include $tpl . 'footer.php';
ob_end_flush();
?>