<?php
include("../include/database.php");
$obj=new DB();
session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {
    
    $email = $obj->getstr($_POST['email']);
    
    $password = $obj->getstr($_POST['password']);
    
    if (empty($email) || empty($password)) {
        echo 1;
    } else {
        $emailsql = $obj->select("user","*","email='$email' AND password='$password'");
        
        if ($emailsql) {
            $_SESSION['email'] = $email;
            echo 2;
        } else {
            echo 3;
        }
    }
}

if (isset($_POST['mycart'])) {
    $email = $_SESSION['email'];
    $csql = $obj->select("shopcart","*","cartemail='$email'");
    echo count($csql);
}
if (isset($_POST['myprice'])) {
    $email = $_SESSION['email'];
    $psql =  $obj->select("shopcart","*","cartemail='$email'");
    $price = 0;
    foreach($psql as $pfetch){
        $price = $price + $pfetch['carttotalprice'];
    }
    echo $price;
}
