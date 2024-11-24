<?php
include("../include/database.php");
$obj = new DB();
$delid = $_POST['mydel'];

$sql = $obj->delete("online_user", "uinvoice='$delid'");
if ($sql) {
    $sql = $obj->delete("online_order", "ordinvoice='$delid'");
    if ($sql) {
        echo 1;
    } else {
        echo 2;
    }
};
