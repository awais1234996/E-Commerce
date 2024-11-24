<?php
include("../include/database.php");
$obj = new DB();
session_start();
$email = $_SESSION['admin_email'];
if (isset($_POST['alldel'])) {
    // $delid = $_POST['alldel'];

    $sql = $sql = $obj->delete("posadmin", "posemail='$email'");
    if ($sql) {
        echo 1;
    } else {
        echo 2;
    };
}


if (isset($_POST['upalldel'])) {
    $delid = $_POST['upalldel'];
    $sql = $obj->delete("pos-orderinfo", "orderemail='$email'");
    if ($sql) {
        echo 3;
    } else {
        echo 4;
    };
}
