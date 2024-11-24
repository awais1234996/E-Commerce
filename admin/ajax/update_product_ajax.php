<?php
include("../include/database.php");
$obj = new DB();

$rsql = $obj->select("product", "*", null, "INNER JOIN category ON product.categoryid=category.categoryid INNER JOIN subcategory ON product.subcategoryid=subcategory.subcategoryid INNER JOIN supplier ON product.supplier=supplier.supplierid INNER JOIN quantity ON product.productquantity=quantity.quantityid", null, null);

$upid = $obj->getstr($_POST['productid']);
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
$productdate = date("Y-m-d");

// Check required fields
if (empty($categoryid) || empty($subcategoryid) || empty($supplier) || empty($productname) || empty($productquantity) || empty($productdescription) || empty($productcode) || empty($productstock) || empty($productunitprice) || empty($productsaleprice) || empty($status)) {
    echo 1;
    exit;
}

$picture = $_FILES['picture']['name'] ?? null;
$data = "data is right";
$pic = array();

if (!empty($picture[0])) {
    foreach ($picture as $p) {
        $arr = array("png", 'jpeg', "jpg");
        $path = strtolower(pathinfo($p, PATHINFO_EXTENSION));
        if (in_array($path, $arr)) {
            $file = rand(1, 10000) . "." . $path;
            $pic[] = $file;
        } else {
            $data = "data is not right";
            break;
        }
    }
    
    if ($data == "data is right") {
        // Assuming $rfet is retrieved from a previous query, adjust as necessary
        $rfet = $obj->select("product", "picture", ["productid" => $upid], null, null); // Fetch existing pictures
        if ($rfet) {
            $op = unserialize($rfet['picture']);
            foreach ($op as $pi) {
                if (file_exists("../product_img/" . $pi)) {
                    unlink("../product_img/" . $pi);
                }
            }
        }
    }
    
    if ($data == "data is right") {
        $pic2 = serialize($pic);
        $sql = $obj->update("product", [
            "categoryid" => $categoryid,
            "subcategoryid" => $subcategoryid,
            "supplier" => $supplier,
            "productname" => $productname,
            "productquantity" => $productquantity,
            "productdescription" => $productdescription,
            "shortdescription" => $shortdescription,
            "productcode" => $productcode,
            "productstock" => $productstock,
            "productunitprice" => $productunitprice,
            "productsaleprice" => $productsaleprice,
            "picture" => $pic2,
            "status" => $status,
            "productdate" => $productdate
        ], "productid='$upid'");
        
        if ($sql) {
            foreach ($pic as $key => $val) {
                move_uploaded_file($_FILES['picture']['tmp_name'][$key], "../product_img/" . $val);
            }
            echo 2;
        } else {
            echo 3;
        }
    } else {
        echo 4;
    }
} else {
    $pic3 = serialize($pic);
    $sql = $obj->update("product", [
        "categoryid" => $categoryid,
        "subcategoryid" => $subcategoryid,
        "supplier" => $supplier,
        "productname" => $productname,
        "productquantity" => $productquantity,
        "productdescription" => $productdescription,
        "shortdescription" => $shortdescription,
        "productcode" => $productcode,
        "productstock" => $productstock,
        "productunitprice" => $productunitprice,
        "productsaleprice" => $productsaleprice,
        "picture" => $pic3,
        "status" => $status,
        "productdate" => $productdate
    ], "productid='$upid'");
    
    if ($sql) {
        echo 5;
    } else {
        echo 6;
    }
}
?>
