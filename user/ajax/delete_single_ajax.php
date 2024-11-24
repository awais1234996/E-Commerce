<?php
include("../include/database.php");
$obj=new DB();
$delid = $_GET['mydel'];

$sql = $obj->delete("shopcart","cartid=$delid");
if ($sql) {
    echo 1;
} else {
    echo 2;
};
