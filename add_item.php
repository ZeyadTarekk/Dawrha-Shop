<?php
$noNavbar = '';
$pageTitle = 'Add Item';
include "init.php";
 if(isset($_POST['upload-img']))
  { 
      $filepath= $_FILES["file"]["name"];
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) 
    { 
        //echo "<img src=" .$filepath."  />";
      //  echo "DONEEE";
    }
    else
        {
        echo "Error !!";
        }
}
?>
<!-- <div class="container" style=" margin: 70px 0 0 80px;
  float: left;width: 50%;height: fit-content;"> -->
<div class=" row justify-content-evenly container-fluid ">
    <div class=" col-md-10 row justify-content-center m-5 text-center shadow">
        <h1 class=" head">Add Item</h1>
        <div class=" col-lg-5 col-md-12">
            <form action="cart.php" method="POST" target=" _self" id="contactFrom" enctype="multipart/form-data">
                <div class="special">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="name" class="form-control" id="namee" placeholder="title's product" name="name"
                            required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" required
                            rows="3"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-select" id="inputGroupSelect02" name="category">
                            <option selected>Choose Categories...</option>
                            <option value="1">Plastic</option>
                            <option value="2">Paper</option>
                            <option value="3">Glass</option>
                        </select>
                        <label class="input-group-text edit-item" for="inputGroupSelect02">Options</label>
                    </div>
                    <div>
                        <label for="pri" class="pri1" style="display:block;">Price
                        </label>
                    </div>
                    <div class="input-group">
                        <input name="priceOfItem" type="text" required class="form-control"
                            aria-label="Dollar amount (with dot and two decimal places)">
                        <span class="input-group-text edit-item">&#163</span>
                        <span class="input-group-text edit-item">0.00</span>
                    </div>
                    <br>
                    <div class="img">
                        <div class="input-group">
                            <input name="file" type="file" class="form-control" id="inputGroupFile04"
                                aria-describedby="inputGroupFileAddon04" aria-label="Upload" />
                            <button name="upload-img" class="btn btn-success" type="click" id="inputGroupFileAddon04">
                                Upload
                            </button>
                        </div>
                    </div>
                    <div class="Counter" id="input_div">
                        <input required class="text-number" type="number" name="quantity" size="25" value="1"
                            id="counting">
                        <input class="sign" type="button" value="-" id="moins" onclick="minus()">
                        <input class="sign" type="button" value="+" id="pluss" onclick="plus()">
                    </div>
                    <div class="center">
                        <button name="done" type=" submit" class="btn btn-success" id="add-item">Add item</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-7 col-md-12">
            <img src="<?php echo $filepath; ?>" alt="item's photo" class="bottles">
        </div>
    </div>
</div>

<!--flex-grow,flex-shrink,ordering,align-items,align-content,display:flex,justify-content:flex-start,-->
<?php include $tpl . "footer.php" ?>