<?php

require "../include/database.php";
$obj = new DB();


$categoryid = $obj->getstr($_POST['idcategory']);
$subcategoryname = $obj->getstr($_POST['subcategoryname']);
$subcategorydescription = $obj->getstr($_POST['subcategorydescription']);


if (empty($categoryid) ||empty($subcategoryname) || empty($subcategorydescription)) {
    echo 1;
} else {
    $sql = $obj->select("*", "subcategory", "subcategoryname='$subcategoryname' AND idcategory='$categoryid'");
    if ($sql) {
        echo 2;
    } else {
        $ins = $obj->insert("subcategory", [ "idcategory" => $categoryid,"subcategoryname" => $subcategoryname, "subcategorydescription" => $subcategorydescription]);
        if ($ins) {
            echo 3;
        } else {
            echo 4;
        }
    }
}
