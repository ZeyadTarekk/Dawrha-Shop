<?php
$pageTitle = "Items";
include 'init.php';

if (!isset($_SESSION['id']) && $_SESSION['typeOfUser'] == "admin") {
  header("Location: ../signin.php");
}
  //check the wanted page [Manage | Edit(Update) | Add(Insert) | Delete] before going there
  $do = isset($_GET['do'])? $_GET['do'] : 'Manage';

  if($do == 'Manage') {
    $items = GetItems($db);
?>

    <div class="container items">
          <h1 class="text-center">Manage Items</h1>
          <div class="table-responsive">
            <table class="table table-bordered text-center">
              <thead class="thead-dark">
                <tr>
                  <th scope="col" class="table-dark">#ID</th>
                  <th scope="col" class="table-dark">Name</th>
                  <th scope="col" class="table-dark">Category</th>
                  <th scope="col" class="table-dark">Owner's Name</th>
                  <th scope="col" class="table-dark">Price</th>
                  <th scope="col" class="table-dark">Quantity</th>
                  <th scope="col" class="table-dark">Control</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  foreach ($items as $item) {
                    echo '<tr>';
                    echo '<th scope="row">' . $item['itemId'] . '</th>';
                    echo '<td>' . $item['title'] . '</td>';
                    echo '<td>' . $item['categoryName'] . '</td>';
                    echo '<td>' . $item['fName'] . ' ' . $item['lName'] . '</td>';
                    echo '<td>' . $item['price'] . ' $</td>';
                    echo '<td>' . $item['quantity'] . '</td>';
                    echo '</td>';
                    echo '<td>
                            <a href="?do=View&itemId=' . $item['itemId'] . '" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
                            <a href="?do=Delete&itemId=' . $item['itemId'] . '" class="btn btn-danger"><i class="fas fa-user-minus"></i> Delete</a>
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
    $itemId = isset($_GET['itemId']) && is_numeric($_GET['itemId']) ? intval($_GET['itemId']) : 0;
    if (!$itemId) {
      header("Location: items.php");
    }else {
      $item = GetItemByID($itemId, $db);
      if(isset($_POST['submit'])) {
        DeleteItemByID($itemId, $db);
        header("Location: items.php");
      }
    }
?>

    <div class="ItemsForm container mb-5">
      <h1 class="text-center">Delete Item</h1>
      <div class="delete-box shadow">
        <h3 class="text-center">Are you Sure You Want To Delete <b><?php echo $item[0]['title'] ?></b></h3>
        <form action="?do=Delete&itemId=<?php echo $itemId; ?>" method="POST" class="text-center">
          <button type="submit" name="submit" class="btn btn-danger">Yes</button>
          <a class="btn btn-success" href="?do=Manage">No</a>
        </form>
      </div>
    </div>

<?php
  } elseif ($do == 'View') {
    $itemId = isset($_GET['itemId']) && is_numeric($_GET['itemId']) ? intval($_GET['itemId']) : 0;
    if (!$itemId) {
      header("Location: items.php");
    } else {
      $item = GetItemViewByID($itemId, $db);
?>

    <div class="ItemsForm container mb-5 shadow">
      <section class="review-item">
        <div class="gallery">
          <!-- the main image -->
          <div id="screen">
            <!-- remember to put each image in var then swap between them if any of the thumbnails picked -->
            <img src="../data/uploads/items/magna-1.jfif" alt="">
          </div>
          <div class="thumbnails">
            <!-- loop to get the number of images of the product -->
            <img src="../data/uploads/items/magna-1.jfif" alt="">
            <img src="../data/uploads/items/magna-2.jfif" alt="">
          </div>
          </div>
            <div class="product">
              <a href="?do=Manage" class="seller-name">(ask)<?php echo $item[0]['fName'] . ' ' . $item[0]['lName']; ?></a>
              <hr>
              <span class="date-of-item"><?php echo $item[0]['addDate']; ?></span>
              <p class="item-name"><?php echo $item[0]['title']; ?></p>
              <p class="description"><?php echo $item[0]['description']; ?></p>
              <div class="price">
              <!-- here we need to get the discount then know the new price -->
              <div class="new-price"><?php echo $item[0]['price'] - ($item[0]['price'] * $item[0]['discount']) . " $"; ?></div>
              <div class="discount"><?php echo $item[0]['discount'] . "%"; ?></div>
              <div class="old-price"><?php echo $item[0]['price'] . " $"; ?></div>
            </div>
          </div>
      </section>
    </div>

<?php
      }
    }
  include $tpl . 'footer.php';
?>