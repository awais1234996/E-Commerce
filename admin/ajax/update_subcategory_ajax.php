<?php
include("../include/database.php");
$obj = new DB();

$rest = $obj->select("subcategory", "*", null, "INNER JOIN category ON subcategory.idcategory = category.categoryid", null, null);
$upid = $obj->getstr($_POST['subcategoryid']);
$categoryid = $obj->getstr($_POST['idcategory']);
$subcategoryname = $obj->getstr($_POST['subcategoryname']);
$subcategorydescription = $obj->getstr($_POST['subcategorydescription']);
if (empty($categoryid) || empty($subcategoryname) || empty($subcategorydescription)) {
    echo 1;
} else {

    $usp = $obj->update("subcategory", ["idcategory" => $categoryid,"subcategoryname" => $subcategoryname, "subcategorydescription" => $subcategorydescription,], "subcategoryid='$upid'");
    if ($usp) {
        echo 2;
    } else {
        echo 3;
    }
}
