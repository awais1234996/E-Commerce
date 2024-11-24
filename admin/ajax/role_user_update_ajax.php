<?php

include("../include/database.php");
$obj = new DB();
$rid = $obj->getstr($_POST['admin_id']);
$aname = $obj->getstr($_POST['admin_name']);
$aemail = $obj->getstr($_POST['admin_email']);
$apass = $obj->getstr($_POST['admin_password']);
$cpass = $obj->getstr($_POST['admin_cpassword']);
$arole = $obj->getstr($_POST['admin_role']);

if ($apass == $cpass) {
    $isql = $obj->update("admin", ["admin_name" => $aname, "admin_email" => $aemail, "admin_password" => $apass, "admin_role" => $arole], "admin_id = '$rid'");
    if ($isql) {

        echo 1;
    } else {

        echo 2;
    }
} else {
    echo 3;
}
