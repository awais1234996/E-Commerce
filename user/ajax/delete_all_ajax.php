<?php
include("../include/database.php");
$obj=new DB();
session_start();
$email = $_SESSION['email'];
$delid = $_GET['mydel'];

$sql = $sql = $obj->delete("shopcart","cartemail='$email'");
if ($sql) {
    echo 1;
} else {
    echo 2;
};
