<?php 
include 'admin/connect.php';

//Routes 
$tpl = "includes/temps/";
$func = "includes/functions/";
$css = "layout/css/";
$js = "layout/js/";
$imgs = "layout/images/";
$dataimages = "data/uploads/items/";


include $func . 'functions.php';
include $tpl . "header.php";

if(!isset($noNavbar)) { include $tpl . "navbar.php"; }

?>