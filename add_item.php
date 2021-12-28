<?php
$pageTitle = 'Add Item';
include "init.php";


if(!isset($_SESSION['username']) ||(isset($_SESSION['typeOfUser'])&&$_SESSION['typeOfUser']!='seller')){
    header("Location: logout.php");
    return;
}
if(isset($_POST['done']))
{ 
        //filter data
$_SESSION["item_name"]=input_data($_POST['name']);
$_SESSION["price"]=input_data($_POST['priceOfItem']);
$_SESSION["disocunt_item"]=input_data($_POST['discountOfItem']);
$_SESSION["quantity_item"]=input_data( $_POST['quantity']);
$_SESSION["location_item"]=input_data($_POST['address']);
$_SESSION["desription_item"]=input_data( $_POST['description']);
$_SESSION["filepath"]=input_data( basename($_FILES['file']['name']));
$_SESSION["city"]=input_data($_POST['city']);
$_SESSION["country"]=input_data( $_POST['country']);
$_SESSION["category_item"]=input_data($_POST['category']);
$_SESSION["pricerr"] = "";
$_SESSION["cat_er"]="";
$_SESSION["city_er"]="";
$_SESSION["country_er"]="";
        //validate priceItem
if(!ctype_digit($_SESSION["price"])){
    $_SESSION["pricerr"]="* Only numeric value is allowed";
}

                //location validation
$_SESSION["location_item_er"]=validate_street_address($_SESSION["location_item"]);
$_SESSION['homeNum'] = strtok($_SESSION["location_item"],  ' ');
$_SESSION['st'] = substr($_SESSION["location_item"], strpos($_SESSION["location_item"], " ") + 1);
    

        //validate city & country
if((!ctype_alpha( $_SESSION["city"]))||(!ctype_alpha($_SESSION["country"]) )){
    $_SESSION["country_er"]="* Only alphabets and white space are allowed";
}

        //validate Category
if($_SESSION["category_item"]=="Choose Categories..."){
    $_SESSION["cat_er"]=" * Please Choose Category";
    }

    
if($_SESSION["pricerr"]==""  && $_SESSION["cat_er"]=="" &&$_SESSION["city_er"]=="" && $_SESSION["country_er"]=="" && $_SESSION["location_item_er"]==""){    
    insertItemName($_SESSION['item_name'],$_SESSION['desription_item'],$_SESSION['price'],$_SESSION['quantity_item']
    ,$_SESSION['category_item'],$_SESSION['disocunt_item'],$_SESSION['id'],$_SESSION['homeNum'],$_SESSION['st']
    ,$_SESSION['city'],$_SESSION['country'],$db); 
    if(empty($_FILES['file']['name'])){
        header("Location: add_item.php");
        return;
    }
    
    $targetDir = "uploads/";
    $targetFilePath = $targetDir . $_SESSION["filepath"];
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes))
        {
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $_SESSION["filepath"])){
                    insertImage($_SESSION["filepath"],$db);
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
  <div class=" row justify-content-center  ">
    <div class=" col-md-10 row  justify-content-center m-5 text-center input-group-lg shadow">
      <div class="display h1 mt-4 mb-4">Add Item</div>
      <div class=" col-lg-5 col-md-12 col-sm-6">
        <form action="add_item.php" method="POST" id="contactFrom" enctype="multipart/form-data">
          <div class="mb-4 input-group ">
            <input type="name" class="form-control " id="namee" placeholder="Item Name" name="name" required autofocus
              value="<?php 
                             if(isset($_SESSION["item_name"])){
                             echo $_SESSION["item_name"];
                            unset($_SESSION["item_name"]);
                            }
                             ?>">
          </div>
          <p class="diplay text-danger mb-2">
            <?php if(isset($_SESSION["item_namerr"])){
                            echo $_SESSION["item_namerr"] ;
                            unset($_SESSION["item_namerr"]);
                        }?></p>
          <div class=" mb-4 input-group">
            <textarea placeholder="Description" class="form-control" id="exampleFormControlTextarea1" name="description"
              value="<?php if(isset($_SESSION["desription_item"])){
                            echo $_SESSION["desription_item"] ;
                            unset($_SESSION["desription_item"]);
                        } ;?>" rows="3"></textarea>
          </div>
          <div class="input-group  mb-4">
            <select required value="<?php if(isset($_SESSION["category_item"])){
                                echo $_SESSION["category_item"]; 
                                unset($_SESSION["category_item'"]);
                        }?>" class="form-select " id="inputGroupSelect02" name="category" required>
              <option selected>Choose Categories...</option>
              <option value="1">Plastic</option>
              <option value="2">Paper</option>
              <option value="3">Glass</option>
              <option value="4">others</option>
            </select>
            <label class="input-group-text bg-success text-light" for="inputGroupSelect02">Options</label>
          </div>
          <p class="diplay text-danger "><?php 
                    if(isset($_SESSION["cat_er"])){
                        echo $_SESSION["cat_er"]; 
                        unset($_SESSION["cat_er"]);
                } ?></p>
          <div class="mb-4 input-group">
            <input type="address" class="form-control" id="address" placeholder="Location@exmaple: 1234 main st"
              name="address" required value="<?php if(isset($_SESSION["location_item"])){
                                echo $_SESSION["location_item"]; 
                                unset($_SESSION["location_item"]);
                        }?>">
          </div>
          <p class="diplay text-danger "><?php 
                    if(isset($_SESSION["location_item_er"])){
                        echo $_SESSION["location_item_er"]; 
                        unset($_SESSION["location_item_er"]);
                } ?></p>
          <div class="row g-2 mb-4">
            <div class="col-sm-6">
              <input required type="text" name="city" class="form-control" placeholder="City" aria-label="City">
            </div>
            <div class="col-sm-6">
              <input required name="country" type="text" class="form-control" placeholder="Country"
                aria-label="country">
            </div>
          </div>
          <p class="diplay text-danger "><?php if(isset($_SESSION["country_er"])){
                        echo $_SESSION["country_er"]; 
                        unset($_SESSION["country_er"]);
                }  ?></p>
          <div class="input-group  mb-4">
            <input value="<?php if(isset($_SESSION["price"])){
                                echo $_SESSION["price"]; 
                                unset($_SESSION["price"]);}?>" placeholder=" Price" name="priceOfItem" type="text"
              required class="form-control  " aria-label="Dollar amount (with dot and two decimal places)">
            <span class="input-group-text bg-success text-light">&#163</span>
            <span class="input-group-text bg-success text-light">0.00</span>
          </div>
          <p class="diplay text-danger "><?php if(isset($_SESSION["pricerr"])){
                        echo $_SESSION["pricerr"]; 
                        unset($_SESSION["pricerr"]);
                } ?></p>
          <div class=" input-group mb-4">
            <input min=0 placeholder="Discount" max=100 name="discountOfItem" type="number" class="form-control">
            <span class=" input-group-text  bg-success text-light">&#163</span>
            <span class="input-group-text bg-success text-light">%</span>
          </div>

          <div class="input-group  mb-4 ">
            <input name="file" type="file" class="form-control " id="inputGroupFile04"
              aria-describedby="inputGroupFileAddon04 " aria-label="Upload" />
            <button name="upload-img" class="btn btn-success" type="submit" id="inputGroupFileAddon04" multiple>
              Upload
            </button>
          </div>
          <div class="input-group mb-4" id="input_div">
            <input required class="form-control " type="number" placeholder="Quantity" name="quantity" size="25" min=0
              id=" counting">
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