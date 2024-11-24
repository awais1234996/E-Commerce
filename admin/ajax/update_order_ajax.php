<?php
include("../include/connection.php");

$uinvoice = mysqli_real_escape_string($conn, $_POST['oi']);
$ustatus = mysqli_real_escape_string($conn, $_POST['ustatus']);

$isql = "UPDATE `online_user` SET  `ustatus`='$ustatus' WHERE `uinvoice`='$uinvoice'";
$irun = mysqli_query($conn, $isql);

if ($irun) {
    $osql = "UPDATE `online-order` SET `ordstatus`='$ustatus' WHERE `ordinvoice`='$uinvoice'";
    $orun = mysqli_query($conn, $osql);

    if ($orun) {
        echo 1;
    } else {
        echo 2;
    }
} else {
    echo 3;
}
