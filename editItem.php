<?php
ob_start();
$pageTitle = 'Edit Item';
include "init.php";

if(!isset($_SESSION['username'])){
header("Location: signup.php");
return;
}
if(isset($_GET['id'])){
    $_SESSION['itemID']=$_GET['id'];}
 
    $oldItem=GetItem($db, $_SESSION['itemID']);

    foreach($oldItem as $item)
    $_SESSION["item_name"]=$item['title'];
        $_SESSION['description_item']=$item['description'];
        $_SESSION['discount_item']= $item['discount'];
        $_SESSION['quantity_item']= $item['quantity'];
        $_SESSION['price']= $item['price'];
        $_SESSION['city']= $item['city'];
        $_SESSION['country']= $item['country'];
        $_SESSION['homeNum']= $item['homeNumber'];
        $_SESSION['st']= $item['street'];
        $rows=getCategoryName($item['categoryId'],$db);
        foreach($rows as $i)
        $_SESSION['categoryId']= $i['categoryId'];
        $_SESSION['categoryName']= $i['categoryName'];


if(isset($_POST['DONE']))
{ 
        //filter data
$_SESSION["item_name"]=input_data($_POST['name']);
$_SESSION["price"]=input_data($_POST['priceOfItem']);
$_SESSION["discount_item"]=input_data($_POST['discountOfItem']);
$_SESSION["quantity_item"]=input_data( $_POST['quantity']);
$_SESSION["description_item"]=input_data( $_POST['description']);
$_SESSION["filepath"]=input_data( basename($_FILES['file']['name']));
$_SESSION["city"]=input_data($_POST['city']);
$_SESSION["country"]=input_data( $_POST['country']);
$_SESSION["categoryId"]=input_data($_POST['category']);
$_SESSION['homeNum']=input_data($_POST['homenumber']);
$_SESSION['st']=input_data($_POST['street']);
$_SESSION['st_er']="";
$_SESSION["pricerr"] = "";
$_SESSION["cat_er"]="";
$_SESSION["city_er"]="";
$_SESSION["country_er"]="";
$_SESSION['DB_er']="";

//validate priceItem
if(!ctype_digit($_SESSION["price"]) &&$_SESSION["price"]<0){
    $_SESSION["pricerr"]="* Only Numeric Positive Value is Allowed";
}

                //street validation
if(!ctype_alpha($_SESSION["st"])){
    $_SESSION["st_er"]="* Only Alphabets and White Space Are Allowed";
}    

    

        //validate city & country
if((!ctype_alpha( $_SESSION["city"]))||(!ctype_alpha($_SESSION["country"]))){
    $_SESSION["country_er"]="* Only Alphabets and White Space Are Allowed";
}

        //validate Category
if($_SESSION["categoryId"]=="Choose Categories..."){
    $_SESSION["cat_er"]=" * Please Choose Category";
    }

    
    
if($_SESSION["pricerr"]==""  && $_SESSION["cat_er"]=="" && $_SESSION["country_er"]=="" && $_SESSION["st_er"]==""){    
    updateTitle($db,$_SESSION['itemID'],$_SESSION['item_name']);
    updatePrice($db,$_SESSION['itemID'],$_SESSION['price']);
    updateDescription($db,$_SESSION['itemID'],$_SESSION['description_item']);
    updateCountry($db,$_SESSION['itemID'],$_SESSION['country']);
    updateCity($db,$_SESSION['itemID'],$_SESSION['city']);
    updateStreet($db,$_SESSION['itemID'],$_SESSION['st']);
    updateCategory($db,$_SESSION['itemID'],$_SESSION['categoryId']);
    updateQuantity($db,$_SESSION['itemID'],$_SESSION['quantity_item']);
    updateDiscount($db,$_SESSION['itemID'],$_SESSION['discount_item']);
    $_SESSION['DB_er']=1;


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
else {
header("Location:editItem.php");
return ;
}
if( $_SESSION['DB_er']==1){
header("Location:profileSeller.php");
return;
}
}
?>
<div class="container-fluid ">
    <div class=" row justify-content-center  ">
        <div class=" col-md-10 row  justify-content-center m-5 text-center input-group-lg shadow">
            <div class="display h1 mt-4 mb-4">Edit Item</div>
            <div class=" col-lg-5 col-md-12 col-sm-6">
                <form action="editItem.php" method="POST" id="contactFrom" enctype="multipart/form-data">
                    <div class="mb-4 input-group ">
                        <input type="name" class="form-control" placeholder="Item Name" name='name'
                          autofocus
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
                        <textarea placeholder="Description" class="form-control" rows="2"
                            name="description"><?php if(isset($_SESSION['description_item'])){
                             echo $_SESSION['description_item'];
                             unset($_SESSION['description_item']);
                            };?>
                    </textarea>
                    </div>
                    <div class="input-group  mb-4">
                        <select  value="<?php if(isset($_SESSION["categoryId"])){
                                echo $_SESSION["categoryId"]; 
                                unset($_SESSION["categoryId'"]);
                        }?>" class="form-select " id="inputGroupSelect02" name="category" >
                        <?php
                        
                         ?>
                            <?php  $row = getCategories($db);
                                foreach($row as $cat):
                                    if($cat['categoryId']==$_SESSION['categoryId']){
                                        echo '<option selected value="'.$_SESSION['categoryId'].'">'.$_SESSION['categoryName'].'</option>';}
                                        else{
                             echo '<option value="'.$cat['categoryId'].'">'.$cat['categoryName'].'</option>';}
                               ?>
                            <?php endforeach ?>
                        </select>
                        <label class="input-group-text bg-success text-light" for="inputGroupSelect02">Options</label>
                    </div>
                    <p class="diplay text-danger "><?php 
                    if(isset($_SESSION["cat_er"])){
                        echo $_SESSION["cat_er"]; 
                        unset($_SESSION["cat_er"]);
                } ?></p>
                    <div class="row g-2 mb-4">
                        <div class="col-sm-6">
                            <input  min=1 type="number" name="homenumber" class="form-control"
                                placeholder="Home Number" value="<?php if(isset($_SESSION["homeNum"])){
                            echo $_SESSION["homeNum"] ;
                            unset($_SESSION["homeNum"]);}?>">
                        </div>
                        <div class="col-sm-6">
                            <input  name="street" type="text" class="form-control" placeholder="Street"
                                aria-label="streett" value="<?php if(isset($_SESSION["st"])){
                                    echo $_SESSION["st"] ;
                                    unset($_SESSION["st"]);}?>">
                        </div>
                    </div>
                    <p class="diplay text-danger "><?php 
                    if(isset($_SESSION["st_er"])){
                        echo $_SESSION["st_er"]; 
                        unset($_SESSION["st_er"]);
                } ?></p>
                    <div class="row g-2 mb-4">
                        <div class="col-sm-6">
                            <input  type="text" name="city" class="form-control" placeholder="City"
                                aria-label="City" value="<?php if(isset($_SESSION["city"])){
                            echo $_SESSION["city"] ;
                            unset($_SESSION["city"]);}?>">
                        </div>
                        <div class="col-sm-6">
                            <input  name="country" type="text" class="form-control" placeholder="Country"
                                aria-label="country" value="<?php if(isset($_SESSION["country"])){
                                    echo $_SESSION["country"] ;
                                    unset($_SESSION["country"]);}?>">
                        </div>
                    </div>
                    <p class="diplay text-danger "><?php if(isset($_SESSION["country_er"])){
                        echo $_SESSION["country_er"]; 
                        unset($_SESSION["country_er"]);
                }  ?></p>
                    <div class=" input-group mb-4">
                        <input value="<?php if(isset($_SESSION["price"])){
                                echo $_SESSION["price"]; 
                                unset($_SESSION["price"]);}?>" placeholder=" Price" name="priceOfItem" type="text"
                             class="form-control  "
                            aria-label="Dollar amount (with dot and two decimal places)">
                        <span class="input-group-text bg-success text-light">$</span>
                        <span class="input-group-text bg-success text-light">0.00</span>
                    </div>
                    <p class="diplay text-danger "><?php if(isset($_SESSION["pricerr"])){
                        echo $_SESSION["pricerr"]; 
                        unset($_SESSION["pricerr"]);
                } ?></p>
                    <div class=" input-group mb-4">
                        <input min=0 placeholder="Discount" max=100 name="discountOfItem" type="number"
                            class="form-control" value="<?php if(isset($_SESSION["discount_item"])){
                                echo $_SESSION["discount_item"]; 
                                unset($_SESSION["discount_item"]);}?>">
                        <span class=" input-group-text  bg-success text-light">$</span>
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
                    <div class="input-group mb-4">
                        <input  class="form-control" type="number" placeholder="Quantity" name="quantity"
                             min=0  value="<?php if(isset($_SESSION["quantity_item"])){
                                echo $_SESSION["quantity_item"]; 
                                unset($_SESSION["quantity_item"]);}?>">
                    </div>
                    <button class="btn  btn-success text-align-light mt-2 mb-4" type="submit" name="DONE">save
                        item</button>
                </form>
            </div>
            <div class="col-lg-6 col-md-12">
                <img src=" layout/images/itemPhoto.png" alt=" item's photo" class="img-fluid">
            </div>
            <?php 
             if (isset($_SESSION['DB_er'])&&$_SESSION['DB_er']==1) {
             echo '<div class="alert alert-success w-50" role="alert" >Successfully Editing
                      <i class="bi bi-check"></i></div>';
                     unset($_SESSION["DB_er"]);}
                 else{
                     if(isset($_SESSION['DB_er'])){
                    echo '<div class="alert alert-danger w-50" role="alert">There is a Wrong  !</div>'; 
                    unset($_SESSION["DB_er"]);}
                }?>
        </div>
    </div>
</div>
</div>
<?php include $tpl . "footer.php" ;
ob_end_flush();
?>