<?php
include("../include/database.php");
$obj = new DB();
session_start();
$posemail = $_SESSION['admin_email'];
if (isset($_POST['pcode'])) {
    $pname = $obj->getstr($_POST['pname']);
    $pcode = $obj->getstr($_POST['pcode']);
    $pprice = $obj->getstr($_POST['pprice']);
    $pqnt = $obj->getstr($_POST['pqty']);
    $gtotal = $pprice * $pqnt;
    if ($posemail == "") {
        echo 1;
    } else {
        $mat = $obj->select("posadmin", "*", "posemail='$posemail' AND poscode='$pcode'", null, null, null);

        if ($mat) {
            echo 2;
        } else {
            $ins = $ins = $obj->insert("posadmin", ["posname" => $pname, "poscode" => $pcode, "posprice" => $pprice, "posqty" => $pqnt, "postprice" => $gtotal, "posemail" => $posemail]);
            if ($ins) {
                echo 3;
            } else {
                echo 4;
            }
        }
    }
}

if (isset($_POST['myid'])) {
    $cid = $obj->getstr($_POST['myid']);
    $cprice = $obj->getstr($_POST['myprice']);
    $cqty = $obj->getstr($_POST['myqty']);
    $newprice = $cqty * $cprice;
    $qsql = $obj->update("posadmin", ["postprice" => $newprice, "posqty" => $cqty], "posid='$cid'");
    if ($qsql) {
        echo 5;
    } else {
        echo 6;
    }
}
if (isset($_POST['ocode'])) {

    $pname = $obj->getstr($_POST['oname']);
    $pcode = $obj->getstr($_POST['ocode']);
    $pprice = $obj->getstr($_POST['oprice']);
    $pqnt = $obj->getstr($_POST['oqty']);
    $pinv = $obj->getstr($_POST['oinvo']);
    $odate = date("Y-m-d");
    $gtotal = $pprice * $pqnt;

    $mat = $obj->select("pos_orderinfo", "*", "ordercode='$pcode' AND orderemail='$posemail'", null, null, null);
    if ($mat) {
        echo 7;
    } else {


        $ins =  $obj->insert("pos_orderinfo", ["ordername" => $pname, "ordercode" => $pcode, "orderprice" => $pprice, "orderqty" => $pqnt, "ordertotalprice" => $gtotal, "orderemail" => $posemail, "orderdate" => $odate, "orderinvoice" => $pinv]);

        if ($ins) {
            echo 8;
        } else {
            echo 9;
        }
    }
}


if (isset($_POST['upid'])) {
    $cid = $obj->getstr($_POST['upid']);
    $cprice = $obj->getstr($_POST['upprice']);
    $cqty = $obj->getstr($_POST['upqty']);
    $newprice = $cqty * $cprice;
    $qsql = $obj->update("pos_orderinfo", ["ordertotalprice" => $newprice, "orderqty" => $cqty], "oid='$cid'");
    if ($qsql) {
        echo 10;
    } else {
        echo 11;
    }
}
