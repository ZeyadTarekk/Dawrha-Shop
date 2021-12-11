<?php
$pageTitle = "Items";
include 'init.php';

  //check the wanted page [Manage | Edit(Update) | Add(Insert) | Delete] before going there
  $do = isset($_GET['do'])? $_GET['do'] : 'Manage';

  if($do == 'Manage') { //manage page to show all the admins
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
                <tr>
                  <th scope="row">5</th>
                  <td>shose</td>
                  <td>most3ml</td>
                  <td>Beshoy Morad</td>
                  <td>$250</td>
                  <td>3</td>
                  <td>
                    <!-- here we need to send the item id to edit or delete -->
                    <a href="?do=View&itemId=5" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
                    <a href="?do=Edit&itemId=5" class="btn btn-success"><i class="fas fa-edit"></i> Edit</a>
                    <a href="?do=Delete&itemId=5" class="btn btn-danger"><i class="fas fa-user-minus"></i> Delete</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
    </div>
<?php
  } elseif ($do == 'Edit') {
?>
    <!-- need to get the data of that admin and put it as value attribute for all the inputs -->
    <div class="ItemsForm container mb-5">
        <h1 class="text-center">Edit Items</h1>
        <form class="col-lg-6 m-auto" action="?do=Update" method="POST">
          <div class="mb-3">
            <label for="Username" class="form-label">Example</label>
            <input type="text" class="form-control" name="username" id="Username" aria-describedby="emailHelp" required>
          </div>
          <button type="submit" class="btn btn-primary form-btn">Edit</button>
        </form>
    </div>

<?php
  } elseif ($do == 'Update') {
    // get the data from the form and validate it then update the admin table
  } elseif ($do == 'Delete') {
    // get the data from the form and validate it then delete the admin
  } elseif ($do == 'View') {
    // view the item and put a button to view the owner of that item
  }
?>

<?php 
include $tpl . 'footer.php';
?>