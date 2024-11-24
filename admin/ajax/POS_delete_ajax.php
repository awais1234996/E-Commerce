<?php
include("../include/database.php");
$obj = new DB();
if (isset($_POST['mydel'])) {
    $delid = $_POST['mydel'];

    $sql = $obj->delete("posadmin", "posid=$delid");
    if ($sql) {
        echo 1;
    } else {
        echo 2;
    }
}

if (isset($_POST['posdel'])) {
    $oid = $_POST['posdel'];

    $Msql = $obj->delete("pos_orderinfo", "orderinvoice='$oid' ");
    if ($Msql) {
        $Nsql = $obj->delete("pos_userinfo", "userinvoice='$oid' ");
        if ($Nsql) {
            echo 3;
        } else {
            echo 4;
        };
    }
}

if (isset($_POST['updel'])) {
    $delid = $_POST['updel'];

    $sql = $obj->delete("pos_orderinfo", "oid=$delid");
       if ($osql) {
        echo 5;
    } else {
        echo 6;
    };
}
