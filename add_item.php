<?php
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
<div class="container-fluid ">
    <div class=" row justify-content-center m-5 ">
        <div class=" col-md-10 row  justify-content-center m-5 text-center input-group-lg shadow">
            <div class="display h1 mt-4 mb-4">Add Item</div>
            <div class=" col-lg-5 col-md-12 col-sm-6">
                <form action="profileBuyer.php" method="POST" target=" _self" id="contactFrom"
                    enctype="multipart/form-data">
                    <div class="mb-4 input-group-lg ">
                        <input type="name" class="form-control " id="namee" placeholder="Item Name" name="name" required
                            autofocus>
                    </div>
                    <div class="mb-4 input-group-lg">
                        <textarea placeholder="Description" class="form-control" id="exampleFormControlTextarea1"
                            name="description" required rows="3"></textarea>
                    </div>
                    <div class="input-group input-group-lg mb-4">
                        <select class="form-select input-lg " id="inputGroupSelect02" name="category">
                            <option selected>Choose Categories...</option>
                            <option value="1 ">Plastic</option>
                            <option value="2">Paper</option>
                            <option value="3">Glass</option>
                        </select>
                        <label class="input-group-text bg-success text-light" for="inputGroupSelect02">Options</label>
                    </div>
                    <div class="mb-4 input-group-lg">
                        <input type="address" class="form-control" id="address" placeholder="Location Item"
                            name="address" required>
                    </div>
                    <div class="input-group input-group-lg mb-4">
                        <input placeholder="Price" name="priceOfItem" type="text" required
                            class="form-control form-control-lg "
                            aria-label="Dollar amount (with dot and two decimal places)">
                        <span class="input-group-text bg-success text-light">&#163</span>
                        <span class="input-group-text bg-success text-light">0.00</span>
                    </div>
                    <div class="input-group input-group-lg  mb-4">
                        <input placeholder="Discount" max=100 name="discountOfItem" type="number" class="form-control">
                        <span class=" input-group-text  bg-success text-light">&#163</span>
                        <span class="input-group-text bg-success text-light">%</span>
                    </div>
                    <div class="input-group input-group-lg mb-4 ">
                        <input name="file" type="file" class="form-control form-control-lg " id="inputGroupFile04"
                            aria-describedby="inputGroupFileAddon04 " aria-label="Upload" />
                        <button name="upload-img" class="btn btn-success" type="submit" id="inputGroupFileAddon04"
                            multiple>
                            Upload
                        </button>
                    </div>
                    <div class="input-group-lg mb-4" id="input_div">
                        <input required class="form-control " type="number" placeholder="Quantity" name="quantity"
                            size="25" min=0 id=" counting">
                        <!-- <input class=" bg-success text-light" type="button" value="-" id="moins" onclick="minus()">
                        <input class=" bg-success text-light" type="button" value="+" id="pluss" onclick="plus()"> -->
                    </div>
                    <button class="btn btn-lg btn-success text-align-light mb-4" type="submit" name="done">Add
                        item</button>
                </form>
            </div>
            <div class="col-lg-6 col-md-12">
                <img src=" layout/images/itemPhoto.png" alt=" item's photo" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<?php include $tpl . "footer.php" ?>