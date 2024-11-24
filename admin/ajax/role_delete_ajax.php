<?php
include("../include/database.php");
$obj=new DB();
if (isset($_POST['del'])) {
    $delid = $_POST['del'];

    $sql = $obj->delete("role_insertion","rid=$delid");
   
    if ($sql) {
        echo 1;
    } else {
        echo 2;
    }
}
if (isset($_POST['roldel'])) {
    $delid = $_POST['roldel'];

    $sql = $obj->delete("admin","admin_role=$delid");
      if ($sql) {
        echo 3;
    } else {
        echo 4;
    }
}