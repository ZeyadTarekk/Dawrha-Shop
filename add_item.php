<?php
$pageTitle = 'Add Item';
include "init.php";

//  if(isset($_POST['upload-img']))
//   { 
//       $filepath= $_FILES["file"]["name"];
//     if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) 
//     { 
//         //echo "<img src=" .$filepath."  />";
//       //  echo "DONEEE";
//     }
//     else
//         {
//         echo "Error !!";
//         }
// }
print_r($_SESSION);
//main variables
$item_name="";
$desription_item="";
$category_item="";
$price="";
$location_item="";
$disocunt_item="";
$quantity_item="";
$filepath="";

//main error variables
$pricerr="";
$item_namerr="";
$discount_er="";
$quantity_item_er="";
$desription_item_er="";
$filepath_er="";
$cat_er="";
$location_item_er="";

if(isset($_POST['done']))
{
    $item_name=$_POST['name'];
    $desription_item=$_POST['description'];
    $category_item=$_POST['category'];
    $price=$_POST['priceOfItem'];
    $location_item=$_POST['address'];
    $disocunt_item=$_POST['discountOfItem'];
    $quantity_item=$_POST['quantity'];
    $filepath=basename($_FILES['file']['name']);
    
        //filter data
$item_name= input_data($item_name);
$price=input_data($price);
$disocunt_item=input_data($disocunt_item);
$quantity_item=input_data($quantity_item);
$location_item=input_data($location_item);
$desription_item=input_data($desription_item);
$filepath=input_data($filepath);
$category_item=input_data($category_item);

        //validate data
//$item_namerr=validateString($item_name);
// $pricerr=validateNumber($price);
// $discount_er=validateNumber($disocunt_item);
// $quantity_item_er=validateNumber($quantity_item);
// $desription_item_er=validateString($desription_item);


if($item_namerr=="" && $pricerr=="" && $discount_er=="" && $quantity_item_er=="" && $desription_item_er==""){

    if(isset($_SESSION['sellerID'])){
    insertItemName($item_name,$desription_item,$price,$quantity_item,$category_item,$disocunt_item,$_SESSION['id'],$db);
    header("Location: add_item.php");
    return ;}
    else{
        echo "Manga";
    }
    
//upload image
$targetDir = "uploads/";
$targetFilePath = $targetDir . $filepath;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(!empty($_FILES['file']['name']))
 {
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes))
    {
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
            {
                insertImage($filepath);
            }
            else
            {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
    }
 }
}
else{
    header("Location: add_item.php");
    return ;
}
}
?>
<div class="container-fluid ">
    <div class=" row justify-content-center m-5 ">
        <div class=" col-md-10 row  justify-content-center m-5 text-center input-group-lg shadow">
            <div class="display h1 mt-4 mb-4">Add Item</div>
            <div class=" col-lg-5 col-md-12 col-sm-6">
                <form action="add_item.php" method="POST" id="contactFrom" enctype="multipart/form-data">
                    <div class="mb-4 input-group ">
                        <input type="name" class="form-control " id="namee" placeholder="Item Name" name="name" required
                            autofocus value="<?php echo $item_name?>">
                    </div>
                    <p class="diplay text-danger mb-2"><?php echo $item_namerr ?></p>
                    <div class=" mb-4 input-group">
                        <textarea placeholder="Description" class="form-control" id="exampleFormControlTextarea1"
                            name="description" value="<?php $desription_item?>" rows="3"></textarea>
                    </div>
                    <div class="input-group  mb-4">
                        <select required value="<?php echo $category_item?>" class="form-select "
                            id="inputGroupSelect02" name="category" required>
                            <option selected>Choose Categories...</option>
                            <option value="1 ">Plastic</option>
                            <option value="2">Paper</option>
                            <option value="3">Glass</option>
                        </select>
                        <label class="input-group-text bg-success text-light" for="inputGroupSelect02">Options</label>
                    </div>
                    <div class="mb-4 input-group">
                        <input type="address" class="form-control" id="address" placeholder="Location Item"
                            name="address" required value="<?php echo $location_item?>">
                    </div>
                    <div class="input-group  mb-4">
                        <input value="<?php echo $price?>" placeholder=" Price" name="priceOfItem" type="text" required
                            class="form-control  " aria-label="Dollar amount (with dot and two decimal places)">
                        <span class="input-group-text bg-success text-light">&#163</span>
                        <span class="input-group-text bg-success text-light">0.00</span>
                    </div>
                    <p class="diplay text-danger mb-2"><?php echo $pricerr ?></p>
                    <div class=" input-group mb-4">
                        <input min=0 placeholder="Discount" max=100 name="discountOfItem" type="number"
                            class="form-control">
                        <span class=" input-group-text  bg-success text-light">&#163</span>
                        <span class="input-group-text bg-success text-light">%</span>
                    </div>

                    <div class="input-group  mb-4 ">
                        <input name="file" type="file" class="form-control " id="inputGroupFile04"
                            aria-describedby="inputGroupFileAddon04 " aria-label="Upload" />
                        <button name="upload-img" class="btn btn-success" type="submit" id="inputGroupFileAddon04"
                            multiple>
                            Upload
                        </button>
                    </div>
                    <div class="input-group mb-4" id="input_div">
                        <input required class="form-control " type="number" placeholder="Quantity" name="quantity"
                            size="25" min=0 id=" counting">
                        <!-- <input class=" bg-success text-light" type="button" value="-" id="moins" onclick="minus()">
                        <input class=" bg-success text-light" type="button" value="+" id="pluss" onclick="plus()"> -->
                    </div>
                    <button class="btn  btn-success text-align-light mt-2 mb-4" type="submit" name="done">Add
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