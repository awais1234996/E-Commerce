<?php
include("../include/connection.php");
session_start();
$email = $_SESSION['posemail'];
$delid = $_POST['alldel'];

$sql = "DELETE FROM `posadmin` WHERE `posemail`='$email' ";
$run = mysqli_query($conn, $sql);
if ($run) {
    echo 3;
} else {
    echo 4;
};
