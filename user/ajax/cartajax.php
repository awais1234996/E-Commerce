<?php
include("../include/database.php");
$obj=new DB();
if (isset($_POST['productcode'])) {
    session_start();
    $email = $_SESSION['email'];
    $cartname = $obj->getstr($_POST['productname']);
    $cartcode = $obj->getstr($_POST['productcode']);
    $cartpic = $obj->getstr($_POST['picture']);
    $cartprice = $obj->getstr($_POST['productunitprice']);
    $qty = 1;
    if ($email == "") {
        echo 1;
    } else {
        $mat = $obj->select("shopcart","*","cartemail='$email' AND cartcode='$cartcode'");
        
        if ($mat) {
            echo 2;
        } else {
            $ins = $obj->insert("shopcart",["cartname"=>$cartname,"cartcode"=>$cartcode,"cartpic"=>$cartpic,"cartprice"=>$cartprice,"cartqty"=>$qty,"carttotalprice"=>$cartprice,"cartemail"=>$email,]);
            
            if ($ins) {
                echo 3;
            } else {
                echo 4;
            }
        }
    }
}
if (isset($_POST['myid'])) {
    $cid = $obj->getstr($_POST['myid']);
    $cprice = $obj->getstr($_POST['myprice']);
    $cqty = $obj->getstr($_POST['myqty']);
    $newprice = $cqty * $cprice;
    $qsql =$obj->update("shopcart",["carttotalprice=$newprice","cartqty=$cqty",],"cartid='$cid'");
    if ($qsql) {
        echo 5;
    } else {
        echo 6;
    }
}
