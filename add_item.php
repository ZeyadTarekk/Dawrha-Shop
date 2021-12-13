<?php
//$noNavbar = '';
$pageTitle = 'Add Item';
include "init.php";
?>
<div class="container" style=" margin: 70px 0 0 80px;
  float: left;width: 50%;height: fit-content;">
    <h1 class="head">Add Item</h1>
    <form method="post" target="_self">
        <div class="special">
            <div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="name" class="form-control" id="name" placeholder="title's product">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
            <div class="input-group mb-3">
                <select class="form-select" id="inputGroupSelect02">
                    <option selected>Choose Categories...</option>
                    <option value="1">Plastic</option>
                    <option value="2">Paper</option>
                    <option value="3">Glass</option>
                </select>
                <label style=" background-color: #198754" class="input-group-text"
                    for="inputGroupSelect02">Options</label>
            </div>
            <div>
                <label for="pri" class="pri1" style="display:block;">Price
                </label>
            </div>
            <div class="input-group">
                <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                <span style=" background-color: #198754" class="input-group-text">&#163</span>
                <span style=" background-color: #198754" class="input-group-text">0.00</span>
            </div>
            <br>
            <div class="img">
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile02">
                    <label style=" background-color: #198754" class="input-group-text"
                        for="inputGroupFile02">Upload</label>
                </div>
            </div>
            <div class="Counter" id="input_div" style="display:inline;">
                <input type=" text" size="25" value="1" id="count">
                <input type="button" value="-" id="moins" onclick="minus()">
                <input type="button" value="+" id="pluss" onclick="plus()">
            </div>
            <div class="center">
                <div class="buttons d-flex flex-row">
                    <div class="cart"><i class="fa fa-shopping-cart"></i></div>
                    <button class="btn btn-success cart-button px-5" style="font-weight: 400;"><span class="
                        dot">1</span>Add to cart </button>
                </div>
            </div>
        </div>

</div>
<!--flex-grow,flex-shrink,ordering,align-items,align-content,display:flex,justify-content:flex-start,-->
<?php include $tpl . "footer.php" ?>