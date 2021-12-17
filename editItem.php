<?php
//$noNavbar = '';
$pageTitle = 'Edit Item';
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
        <div class=" col-md-10 row  justify-content-center m-5 text-center shadow">
            <div class="display h1 mt-4 mb-4">Edit Item</div>
            <div class=" col-lg-5 col-md-12">
                <form action="profileSeller.php" method="POST" target=" _self" id="contactFrom"
                    enctype="multipart/form-data">
                    <div class="mb-4 input-group ">
                        <input type="name" class="form-control " id="namee" placeholder="Item Name" name="name" required
                            autofocus>
                    </div>
                    <div class="mb-4 input-group">
                        <textarea placeholder="Description" class="form-control" id="exampleFormControlTextarea1"
                            name="description" rows="3"></textarea>
                    </div>
                    <div class="input-group mb-4">
                        <select class="form-select  " id="inputGroupSelect02" name="category">
                            <option selected>Choose Categories...</option>
                            <option value="1 ">Plastic</option>
                            <option value="2">Paper</option>
                            <option value="3">Glass</option>
                        </select>
                        <label class="input-group-text bg-success text-light" for="inputGroupSelect02">Options</label>
                    </div>
                    <div class="mb-4 input-group">
                        <input type="address" class="form-control" id="address" placeholder="Location Item"
                            name="address" required>
                    </div>
                    <div class="input-group  mb-4">
                        <input placeholder="Price" name="priceOfItem" type="text" required class="form-control"
                            aria-label="Dollar amount (with dot and two decimal places)">
                        <span class="input-group-text bg-success text-light">&#163</span>
                        <span class="input-group-text bg-success text-light">0.00</span>
                    </div>
                    <div class="input-group  mb-4">
                        <input placeholder="Discount" min=0 max=100 name="discountOfItem" type="number" required
                            class="form-control">
                        <span class=" input-group-text bg-success text-light">&#163</span>
                        <span class="input-group-text bg-success text-light">%</span>
                    </div>
                    <div class="input-group  mb-4 ">
                        <input name="file" type="file" class="form-control form-control-lg" id="inputGroupFile04"
                            aria-describedby="inputGroupFileAddon04" aria-label="Upload" />
                        <button name="upload-img" class="btn btn-success" type="submit" id="inputGroupFileAddon04"
                            multiple>
                            Upload
                        </button>
                    </div>
                    <div class="input-group mb-5" id="input_div">
                        <input required class="form-control " type="number" placeholder="Quantity" name="quantity"
                            size="25" min=0 id=" counting">
                        <!-- <input class=" bg-success text-light" type="button" value="-" id="moins" onclick="minus()">
                        <input class=" bg-success text-light" type="button" value="+" id="pluss" onclick="plus()"> -->
                    </div>
                    <button class="btn btn-lg btn-success text-align-light mt-2 mb-4" type="submit" name="done">save
                        item
                    </button>
                </form>
            </div>
            <div class="col-lg-6 col-md-12">
                <img src="<?php echo $imgs . "editing.png" ?>" alt=" item's photo" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<?php include $tpl . "footer.php" ?>