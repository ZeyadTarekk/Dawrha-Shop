<?php
$pageTitle = "Admins";
include 'init.php';


  //check the wanted page [Manage | Edit(Update) | Add(Insert) | Delete] before going there
  $do = isset($_GET['do'])? $_GET['do'] : 'Manage';

  if($do == 'Manage') { //manage page to show all the admins
?>
    <div class="container admin">
          <h1 class="text-center">Manage Admins</h1>
          <div class="table-responsive">
            <table class="table table-bordered text-center">
              <thead class="thead-dark">
                <tr>
                  <th scope="col" class="table-dark">#ID</th>
                  <th scope="col" class="table-dark">Username</th>
                  <th scope="col" class="table-dark">Email</th>
                  <th scope="col" class="table-dark">Fullname</th>
                  <th scope="col" class="table-dark">Phone</th>
                  <th scope="col" class="table-dark">Control</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <th scope="row">5</th>
                  <td>beshoy</td>
                  <td>Beshoy Morad</td>
                  <td>besh0morta@gmail.com</td>
                  <td>01273311810</td>
                  <td>
                    <!-- here we need to send the admin id to edit or delete -->
                    <a href="?do=Edit&adminId=5" class="btn btn-success"><i class="fas fa-edit"></i> Edit</a>
                    <a href="?do=Delete&adminId=5" class="btn btn-danger"><i class="fas fa-user-minus"></i> Delete</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <a href="?do=Add" class="btn btn-primary add-btn"><i class="fa fa-plus"></i> Add New Admin</a>
    </div>
<?php
  } elseif ($do == 'Add') {
?>
    <div class="AdminsForm container mb-5">
        <h1 class="text-center">Add New Admins</h1>
        <form class="col-lg-6 m-auto" action="?do=Insert" method="POST">
          <div class="mb-3">
            <label for="Username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="Username" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="Firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" name="firstname" id="Firstname" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="Secondname" class="form-label">Second Name</label>
            <input type="text" class="form-control" name="secondname" id="Secondname" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="Email" aria-describedby="emailHelp" required placeholder="Email must be valid">
          </div>
          <div class="mb-3">
            <label for="ConfirmEmail" class="form-label">Confirm Email</label>
            <input type="email" class="form-control" name="confirmemail" id="ConfirmEmail" aria-describedby="emailHelp" required placeholder="Confirm The Email">
          </div>
          <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="Password" required placeholder="Password must be hard & complex">
          </div>
          <div class="mb-3">
            <label for="ConfirmPassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="confirmpassword" id="ConfirmPassword" required placeholder="Confirm The Password">
          </div>
          <button type="submit" class="btn btn-primary form-btn">Add</button>
        </form>
    </div>
<?php
  } elseif ($do == 'Insert') {
    // get the data from the form and validate it then insert into admin table
  } elseif ($do == 'Edit') {
?>
    <!-- need to get the data of that admin and put it as value attribute for all the inputs -->
    <div class="AdminsForm container mb-5">
        <h1 class="text-center">Edit Admins</h1>
        <form class="col-lg-6 m-auto" action="?do=Update" method="POST">
          <div class="mb-3">
            <label for="Username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="Username" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="Firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" name="firstname" id="Firstname" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="Secondname" class="form-label">Second Name</label>
            <input type="text" class="form-control" name="secondname" id="Secondname" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="Email" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="ConfirmEmail" class="form-label">Confirm Email</label>
            <input type="email" class="form-control" name="confirmemail" id="ConfirmEmail" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="Password" required>
          </div>
          <div class="mb-3">
            <label for="ConfirmPassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="confirmpassword" id="ConfirmPassword" required>
          </div>
          <button type="submit" class="btn btn-primary form-btn">Edit</button>
        </form>
    </div>

<?php
  } elseif ($do == 'Update') {
    // get the data from the form and validate it then update the admin table
  } elseif ($do == 'Delete') {
    // get the data from the form and validate it then delete the admin
  }
?>

<?php 
include $tpl . 'footer.php';
?>