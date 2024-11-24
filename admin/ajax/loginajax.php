<?php
include("../include/database.php");
$obj=new DB();
session_start();
if (isset($_POST['admin_email']) && isset($_POST['admin_password'])) {
    $admin_email =$obj->getstr($_POST['admin_email']);
    $admin_password =$obj->getstr($_POST['admin_password']);
    if (empty($admin_email) || empty($admin_password)) {
        echo 1;
    } else {
        $sql = $obj->select("admin", "*", "admin_email = '$admin_email' AND admin_password = '$admin_password'");

        if ($sql) {
            foreach ($sql as $fet) {

                $rolid = $fet['admin_role'];

            }
            

            $_SESSION['admin_email'] = $admin_email;
            $_SESSION['admin_role'] = $rolid;
            echo 2;
        } else {
            echo 3;
        }
    }
}
