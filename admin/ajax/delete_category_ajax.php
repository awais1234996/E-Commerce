<?php
require '../include/database.php';
$obj = new DB();
$id = $_GET["mydel"];
$del=$obj->delete("category", "categoryid='$id'");
if($del){

    echo 1;
}