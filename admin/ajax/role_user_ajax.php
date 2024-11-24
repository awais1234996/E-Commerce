<?php
include("../include/database.php");
$obj=new DB();
$rolename = $obj->getstr($_POST['admin_name']);
$roleemail = $obj->getstr($_POST['admin_email']);
$rolepassword = $obj->getstr($_POST['admin_password']);
$roleCpassword = $obj->getstr($_POST['admin_cpassword']);
$role = $obj->getstr($_POST['admin_role']);

if (empty($rolename) || empty($roleemail) || empty($rolepassword) || empty($roleCpassword) || empty($rolepassword)) {
    echo 1;
} else {
    $sql = $obj->select("admin", "*", "admin_email = '$roleemail'");
    if ($sql) {

        echo 2;
    } else {
        if ($rolepassword == $roleCpassword) {


            $isql = $obj->insert("admin", ["admin_name" => $rolename, "admin_email" => $roleemail, "admin_password" => $rolepassword,"admin_cpassword" => $rolepassword, "admin_role" => $role]);
            if ($isql) {

                echo 3;
            } else {

                echo 4;
            }
        } else {
            echo 5;
        }
    }
}
