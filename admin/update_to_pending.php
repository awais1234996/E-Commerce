<?php
include("./include/database.php");
$obj = new DB();
$id = $_GET['mydel'];
$sql = $obj->update("user", ["status" => "pending"], "userid='$id'");
if ($sql) {
    echo 1;
} else {
    echo 2;
}
