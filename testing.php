<?php
$noNavbar = '';
$pageTitle = 'Add Item';
include "init.php";
?>
<div class="container">
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
                <label class="input-group-text" for="inputGroupSelect02">Options</label>
            </div>
            <div>
                <label for="pri" class="pri1" style="display:block;">Price
                </label>
            </div>
            <div class="input-group">
                <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                <span class="input-group-text">&#163</span>
                <span class="input-group-text">0.00</span>
            </div>
            <br>
            <div id="input_div">
                <input type="text" size="25" value="1" id="count">
                <input type="button" value="-" id="moins" onclick="minus()">
                <input type="button" value="+" id="pluss" onclick="plus()">
            </div>
            <br>
            <div class="img">
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
            </div>
            <br>
            <div>
                <button id="save">Add</button>
            </div>
        </div>
        <form>
</div>
<!--flex-grow,flex-shrink,ordering,align-items,align-content,display:flex,justify-content:flex-start,-->
<?php include $tpl . "footer.php" ?>