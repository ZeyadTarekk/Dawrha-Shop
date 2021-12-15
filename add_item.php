<?php
//$noNavbar = '';
$pageTitle = 'Add Item';
include "init.php";
?>
<!-- <div class="container" style=" margin: 70px 0 0 80px;
  float: left;width: 50%;height: fit-content;"> -->
<div class=" row justify-content-evenly container-fluid ">
    <div class=" col-md-10 row justify-content-center m-5 text-center shadow">
        <h1 class=" head">Add Item</h1>
        <div class=" col-lg-5 col-md-12">
            <form action="" method=" get" target="_self">
                <div class="special">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="name" class="form-control" id="name" placeholder="title's product" name="Name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description"
                            rows="3"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-select" id="inputGroupSelect02">
                            <option selected>Choose Categories...</option>
                            <option value="1">Plastic</option>
                            <option value="2">Paper</option>
                            <option value="3">Glass</option>
                        </select>
                        <label class="input-group-text edit-item" name="category"
                            for="inputGroupSelect02">Options</label>
                    </div>
                    <div>
                        <label for="pri" class="pri1" style="display:block;">Price
                        </label>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control"
                            aria-label="Dollar amount (with dot and two decimal places)">
                        <span class="input-group-text edit-item">&#163</span>
                        <span class="input-group-text edit-item">0.00</span>
                    </div>
                    <br>
                    <div class="img">
                        <div class="input-group mb-3 ">
                            <input type="file" class="form-control " id="inputGroupFile02">
                            <label class="input-group-text edit-item" for="inputGroupFile02">Upload</label>
                        </div>
                    </div>
                    <div class="Counter" id="input_div">
                        <input class="text-number" type="number" size="25" value="1" id="counting">
                        <input class="sign" type="button" value="-" id="moins" onclick="minus()">
                        <input class="sign" type="button" value="+" id="pluss" onclick="plus()">
                    </div>
                    <div class="center">
                        <button type="submit" class="btn edit-item">Add item</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-7 col-md-12">
            <img src=" layout/images/item.jpg" alt="image item" class="bottles" style="width:50%; margin:100px;">
        </div>
    </div>
</div>
<!--flex-grow,flex-shrink,ordering,align-items,align-content,display:flex,justify-content:flex-start,-->
<?php include $tpl . "footer.php" ?>