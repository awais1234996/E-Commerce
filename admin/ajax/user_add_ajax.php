<?php
include("../include/database.php");
$obj = new DB();
session_start();

$fname = $obj->getstr($_POST['fname']);
$lname = $obj->getstr($_POST['lname']);
$email = $obj->getstr($_POST['email']);
$phone = $obj->getstr($_POST['phone']);
$country = $obj->getstr($_POST['country']);
$state = $obj->getstr($_POST['state']);
$city = $obj->getstr($_POST['city']);
$pcode = $obj->getstr($_POST['pcode']);
$address1 = $obj->getstr($_POST['address1']);
$address2 = $obj->getstr($_POST['address2']);
$password = $obj->getstr($_POST['password']);
$cpassword = $obj->getstr($_POST['cpassword']);
if (empty($fname) || empty($lname) || empty($email) || empty($phone) || empty($country) || empty($state) || empty($city) || empty($pcode) || empty($address1) || empty($address2) || empty($password) || empty($cpassword)) {
    echo 1;
} else {
    $emailsql = $obj->select("*", "user", "email='$email'");

    if ($emailsql) {
        echo 2;
    } else {
        if ($password == $cpassword) {
            $usersql = $obj->insert("user", ["fname" => $fname, "lname" => $lname, "email" => $email, "phone" => $phone, "country" => $country, "state" => $state, "city" => $city, "pcode" => $pcode, "address1" => $address1, "address2" => $address2, "password" => $password]);
            if ($usersql) {
                echo 3;
            } else {
                echo 4;
            }
        }else{
            echo 5;
        }
    }
}
