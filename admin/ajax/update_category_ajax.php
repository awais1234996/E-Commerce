<?php
require "../include/database.php";
$obj = new DB();


$id = $obj->getstr($_POST['categoryid']);
$categoryname = $obj->getstr($_POST['categoryname']);
$categorydescription = $obj->getstr($_POST['categorydescription']);
$categorydate = date("y-m-d");

$usp = $obj->update("category", ["categoryname" => $categoryname, "categorydescription" => $categorydescription,], "categoryid='$id'");
if ($usp) {
    echo 1;
} else {
    echo 2;
}
