<?php

require "../include/database.php";
$obj = new DB();


$categoryname = $obj->getstr($_POST['categoryname']);
$categorydescription = $obj->getstr($_POST['categorydescription']);
$categorydate = date("y-m-d");

if (empty($categoryname) || empty($categorydescription)) {
    echo 1;
} else {
    $sql = $obj->select("*", "category", "categoryname='$categoryname'");
    if ($obj->getstr($sql)>0) {
        echo 2;
    } else {
        $ins = $obj->insert("category", ["categoryname" => $categoryname, "categorydescription" => $categorydescription, "categorydate" => $categorydate]);
        if ($ins) {
            echo 3;
        } else {
            echo 4;
        }
    }
}





// include("../include/connection.php");

// $categoryname = mysqli_real_escape_string($conn, $_POST['categoryname']);
// $categorydescription = mysqli_real_escape_string($conn, $_POST['categorydescription']);
// $categorydate = date("y-m-d");
// if (empty($categoryname) || empty($categorydescription)) {
//     echo 1;
// } else {
//     $sql = "SELECT * FROM `category` WHERE `categoryname`='$categoryname'";
//     $run = mysqli_query($conn, $sql);
//     if (mysqli_num_rows($run) > 0) {
//         // echo "<script> alert('Category already exist') </script>";
//         echo 2;
//     } else {
//         $isql = "INSERT INTO `category`(`categoryname`,`categorydescription`,`categorydate`)VALUES('$categoryname','$categorydescription','$categorydate')";
//         $irun = mysqli_query($conn, $isql);
//         if ($irun) {
//             // echo "<script> alert ('Category has been inserted') </script>";
//             echo 3;
//         } else {
//             // echo "<script> alert ('Category has not been inserted') </script>";
//             echo 4;
//         }
//     }
// }
