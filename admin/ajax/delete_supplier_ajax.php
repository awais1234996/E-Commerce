<?php
include("../include/database.php");
$obj=new DB();
$delid = $_POST['mydel'];

$sql = $obj->delete("supplier", "supplierid='$delid'");

if ($sql) {
    echo 1;
} else {
    echo 2;
};