<?php
include("../include/database.php");
$obj=new DB();
$role = $obj->getstr($_POST['role']);
$roleaccess = $obj->getstr($_POST['roleaccess']);
$roledate = date("Y-m-d");
if ($roleaccess == "Custom") {
    $roles = $_POST['roles'];
    $rol = serialize($roles);
} else {
    $rol = serialize([]);
}
$sql = $obj->select("role_insertion", "*", "role = '$role'");
if ($sql) {

    echo 1;
} else {

    $isql = $obj->insert("role_insertion", ["role" => $role, "roleaccess" => $roleaccess, "roleper" => $rol, "roledate" => $roledate]);
  
    if ($isql) {

        echo 2;
    } else {

        echo 3;
    }
}
