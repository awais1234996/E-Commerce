<?php
include("../include/database.php");
$obj = new DB();
$suppliername = $obj->getstr($_POST['suppliername']);
$supplieremail = $obj->getstr($_POST['supplieremail']);
$suppliercnic = $obj->getstr($_POST['suppliercnic']);

if (empty($suppliername) || empty($supplieremail) || empty($suppliercnic)) {
    echo 1;
} else {
    $sql = $obj->select("*", "supplier", "suppliername='$suppliername'");

    if ($sql) {
        echo 2;
    } else {
        $isql = $obj->insert("supplier", ["suppliername" => $suppliername, "supplieremail" => $supplieremail, "suppliercnic" => $suppliercnic]);
        if ($isql) {
            echo 3;
        } else {
            echo 4;
        }
    }
}
