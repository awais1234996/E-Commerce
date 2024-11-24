<?php
include("../include/database.php");
$obj = new DB();
session_start();
$posemail = $_SESSION['admin_email'];
$upid = $obj->getstr($_POST['userinvoice']);
$rsql = $obj->select("pos_userinfo", "*", "userid = '$upid'");

    $uname = $obj->getstr($_POST['username']);
    $ucontact = $obj->getstr($_POST['usercontact']);
    $ucash = $obj->getstr($_POST['usertcash']);
    $ustatus = $obj->getstr($_POST['userstatus']);
    $uinvo= $obj->getstr($_POST['userinvoice']);
    $odate=date("Y-m-d");

$sql = $obj->select("pos_userinfo", "*", "userinvoice = '$upid'");
if ($sql) {


    $ins = $obj->update("pos_userinfo", ["username" => $uname, "usercontact" => $ucontact, "usertcash" => $ucash, "userstatus" => $ustatus,"userinvoice" => $uinvo, "userdate" => $odate], "userinvoice = '$upid'");
    if ($ins) {
        $sql = $obj->select("pos_orderinfo", "*", "orderinvoice = '$upid'");

        if ($sql) {
            foreach ($sql as $fetch) {
                $uname = $fetch['ordername'];
                $ucode = $fetch['ordercode'];
                $uprice = $fetch['orderprice'];
                $uqty = $fetch['orderqty'];
                $utp = $fetch['ordertotalprice'];
            }

                $insRun = $obj->update("pos_orderinfo", ["ordername" => $uname, "ordercode" => $ucode, "orderprice" => $uprice, "orderqty" => $uqty, "ordertotalprice" => $utp, "orderemail" => $posemail, "orderdate" => $odate], "orderinvoice = '$upid'");
                if ($insRun) {
                    echo 1;
                } else {
                    echo 2;
                }
        }
    }
}
