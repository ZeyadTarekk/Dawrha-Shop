<?php
$pageTitle = "Sellers";
include 'init.php';

if (!isset($_SESSION['id']) && $_SESSION['typeOfUser'] == "admin") {
  header("Location: ../signin.php");
}
//check the wanted page [Manage | Edit | Add | Delete] before going there
$do = isset($_GET['do'])? $_GET['do'] : 'Manage';

if ($do == 'Manage') {
  $sellers = GetSellers($db);
?>
  <div class="container buyer">
        <h1 class="text-center">Manage Sellers</h1>
        <div class="table-responsive">
          <table class="table table-bordered text-center">
            <thead class="thead-dark">
              <tr>
                <th scope="col" class="table-dark">#ID</th>
                <th scope="col" class="table-dark">Username</th>
                <th scope="col" class="table-dark">Fullname</th>
                <th scope="col" class="table-dark">Email</th>
                <th scope="col" class="table-dark">Likes</th>
                <th scope="col" class="table-dark">DisLikes</th>
                <th scope="col" class="table-dark">Transactions</th>
                <th scope="col" class="table-dark">Phones</th>
                <th scope="col" class="table-dark">Control</th>
              </tr>
              </thead>
              <tbody>
              <?php 
                foreach($sellers as $seller) {
                  echo '<tr>';
                  echo '<th scope="row">' . $seller['ID'] . '</th>';
                  echo '<td>' . $seller['userName'] . '</td>';
                  echo '<td>' . $seller['fName'] . ' ' . $seller['lName'] . '</td>';
                  echo '<td>' . $seller['email'] . '</td>';
                  echo '<td>' . $seller['likes'] . '</td>';
                  echo '<td>' . $seller['disLikes'] . '</td>';
                  echo '<td>' . $seller['transactions'] . '</td>';
                  echo '<td>';
                  $phones = GetSellerPhones($seller['ID'], $db);
                  foreach($phones as $phone) {
                    echo $phone['phoneNo'] . '<br>';}
                  echo '</td>';
                  echo '<td>
                          <a href="?do=Delete&sellerId=' . $seller['ID'] . '" class="btn btn-danger"><i class="fas fa-user-minus"></i> Delete</a>
                        </td>';
                  echo '</tr>';
                }
              ?>
            </tbody>
          </table>
        </div>
  </div>

  <?php
  } elseif ($do == 'Delete') {
    $sellerId = isset($_GET['sellerId']) && is_numeric($_GET['sellerId']) ? intval($_GET['sellerId']) : 0;
    if (!$sellerId) {
      header("Location: sellers.php");
    }else {
      $seller = GetSellerByID($sellerId, $db);
      if(isset($_POST['submit'])) {
        DeleteSellerByID($sellerId, $db);
        header("Location: sellers.php");
      }
    }
?>
    <div class="Users container mb-5">
      <h1 class="text-center">Delete Seller</h1>
      <div class="delete-box shadow">
        <h3 class="text-center">Are you Sure You Want To Delete <b><?php echo $seller[0]['userName'] ?></b></h3>
        <form action="?do=Delete&sellerId=<?php echo $sellerId; ?>" method="POST" class="text-center">
          <button type="submit" name="submit" class="btn btn-danger">Yes</button>
          <a class="btn btn-success" href="?do=Manage">No</a>
        </form>
      </div>
    </div>
<?php
  }
include $tpl . 'footer.php';
?>