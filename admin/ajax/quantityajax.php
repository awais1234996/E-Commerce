<?php
include("../include/database.php");
$obj = new DB();

$quantityname = $obj->getstr($_POST['quantityname']);
$quantitydescription = $obj->getstr($_POST['quantitydescription']);
if (empty($quantityname) || empty($quantitydescription)) {
    echo 1;
} else {
    $sql = $obj->select("*", "quantity", "quantityname='$quantityname'");
    if ($sql) {
        echo 2;
    } else {
        $isql = $obj->insert("quantity", ["quantityname" => $quantityname, "quantitydescription" => $quantitydescription]);

        if ($isql) {
            echo 3;
        } else {
            echo 4;
        }
    }
}
