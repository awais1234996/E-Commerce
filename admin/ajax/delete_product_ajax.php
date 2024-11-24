<?php
include("../include/database.php");
$obj = new DB();
$delid = $_GET['mydel'];

$gsql = $obj->select("product", "picture", "productid=$delid");

foreach ($gsql as $gfetch) {


    $pic = unserialize($gfetch["picture"]);
    foreach ($pic as $value) {
        unlink("../Product_img/" . $value);
    }
}

$sql = $obj->delete("product", "productid=$delid");
if ($sql) {
    echo 1;
} else {
    echo 2;
};
