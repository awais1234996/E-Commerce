<?php
include("../include/database.php");
$obj = new DB();
$categoryid = $obj->getstr($_POST['categoryid']);
$subcategoryid = $obj->getstr($_POST['subcategoryid']);
$supplier = $obj->getstr($_POST['supplier']);
$productname = $obj->getstr($_POST['productname']);
$productquantity = $obj->getstr($_POST['productquantity']);
$productdescription = $obj->getstr($_POST['productdescription']);
$shortdescription = $obj->getstr($_POST['shortdescription']);
$productcode = $obj->getstr($_POST['productcode']);
$productstock = $obj->getstr($_POST['productstock']);
$productunitprice = $obj->getstr($_POST['productunitprice']);
$productsaleprice = $obj->getstr($_POST['productsaleprice']);
$status = $obj->getstr($_POST['status']);
$picture = $_FILES['picture']['name'];
$productdate = date("y-m-d");
if (empty($categoryid) || empty($subcategoryid) || empty($supplier) || empty($productname) || empty($productquantity) || empty($productdescription) || empty($productcode) || empty($productstock) || empty($productunitprice) || empty($productsaleprice) || empty($status)) {
    echo 1;
} else {
    $sql = $obj->select("*", "product", "productname='$productname' AND categoryid='$categoryid' AND subcategoryid='$subcategoryid'");
    if ($obj->getstr($sql) > 0) {
        echo 2;
    } else {
        $csql = $obj->select("*", "product", "productcode='$productcode'");
        if ($obj->getstr($csql) > 0) {
            echo 3;
        } else {
            $array = array();
            foreach ($picture as $pic) {
                $array = array('png', 'jpg', 'jpeg');
                $exe = strtolower(pathinfo($pic, PATHINFO_EXTENSION));
                if (in_array($exe, $array)) {
                    $file = rand(1, 190000) . "." . $exe;
                    $data = "right";
                    $img[] = $file;
                } else {
                    $data = "not right";
                }
            }
            if ($data == 'right') {

                $pic = serialize($img);
                $sql = $obj->insert("product", ["categoryid" => $categoryid, "subcategoryid" => $subcategoryid, "supplier" => $supplier, "productname" => $productname, "productquantity" => $productquantity, "productdescription" => $productdescription, "shortdescription" => $shortdescription, "productcode" => $productcode, "productstock" => $productstock, "productunitprice" => $productunitprice, "productsaleprice" => $productsaleprice, "status" => $status, "picture" => $pic, "productdate" => $productdate]);
                if ($sql) {
                    foreach ($img as $key => $val) {
                        move_uploaded_file($_FILES['picture']['tmp_name'][$key], "../product_img/" . $val);
                    }
                    echo 4;
                } else {
                    echo 5;
                }
            } else {
                echo 6;
            }
        }
    }
}
