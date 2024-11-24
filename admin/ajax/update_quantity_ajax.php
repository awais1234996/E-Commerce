<?php
include("../include/database.php");
$obj = new DB();
$qid = $obj->getstr($_POST['quantityid']);
$qname = $obj->getstr($_POST['quantityname']);
$qdes = $obj->getstr($_POST['quantitydescription']);
$isql = $obj->update("quantity", ["quantityname" => $qname, "quantitydescription" => $qdes,], "quantityid='$qid'");
if ($isql) {
    echo 2;
} else {
    echo 3;
}
