<?php
include("../include/database.php");
$obj = new DB();
$sid = $obj->getstr($_POST['supplierid']);
$sname = $obj->getstr($_POST['suppliername']);
$semail = $obj->getstr($_POST['supplieremail']);
$scnic = $obj->getstr($_POST['suppliercnic']);
$isql = $obj->update("supplier", ["suppliername" => $sname, "supplieremail" => $semail, "suppliercnic" => $scnic], "supplierid='$sid'");
if ($isql) {
    echo 2;
} else {
    echo 3;
}
