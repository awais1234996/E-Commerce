<?php
include("../include/database.php");
$obj=new DB();
$delid = $_POST['mydel'];

$sql = $obj->delete("user", "userid='$delid'");
if ($sql) {
    echo 1;
} else {
    echo 2;
};
