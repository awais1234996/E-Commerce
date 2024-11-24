<?php
include("./include/connection.php");
$id=$_GET['confirmid'];
$sql="UPDATE `user` SET `status`='confirm' WHERE `userid`='$id'";
$run=mysqli_query($conn,$sql);
if($run){
    header("Location:./pendinguserview.php");
}
?>