<?php
require '../include/database.php';
$obj = new DB();
$id = $_GET["mydel"];
$del=$obj->delete("subcategory", "subcategoryid='$id'");
if($del){

    echo 1;
}