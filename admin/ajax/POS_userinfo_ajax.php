<?php
include("../include/database.php");
$obj = new DB();
session_start();
$posemail = $_SESSION['admin_email'];

if (isset($_POST['username'])) {

    $uname = $obj->getstr($_POST['username']);
    $ucontact = $obj->getstr($_POST['usercontact']);
    $ucash = intval($obj->getstr($_POST['usercash']));
    $ustatus = $obj->getstr($_POST['userstatus']);
    $uinvoice = $obj->getstr($_POST['userinvoice']);
    $odate = date("Y-m-d");

    if ($ucash == 0) {
        echo 1;
    } else {
        $inv = $obj->select("pos_userinfo", "*", "userinvoice='$uinvoice'", null, null, null);
        if ($inv) {
            echo 2;
        } else {
            $ins = $obj->insert("pos_userinfo", ["username" => $uname, "usercontact" => $ucontact, "usertcash" => $ucash, "userstatus" => $ustatus, "userinvoice" => $uinvoice, "userdate" => $odate]);

            if ($ins) {
                $sql = $obj->select("posadmin", "*", "posemail='$posemail'", null, null, null);

                if ($sql) {
                    foreach ($sql as $fetch) { {
                            $uname = $fetch['posname'];
                            $ucode = $fetch['poscode'];
                            $uprice = $fetch['posprice'];
                            $uqty = $fetch['posqty'];
                            $utp = $fetch['postprice'];
                            $orderRun = $obj->insert("pos_orderinfo", ["ordername" => $uname, "ordercode" => $ucode, "orderprice" => $uprice, "orderqty" => $uqty, "ordertotalprice" => $utp, "orderemail" => $posemail, "orderinvoice" => $uinvoice, "orderdate" => $odate, "orderstatus" => $ustatus]);

                            if ($orderRun) {
                                $msg = "Right";
                            } else {
                                $msg = "Wrong";
                            }
                            if ($msg == "Right") {
                                $delsql = $obj->delete("posadmin", "posemail='$posemail'");

                                if ($delsql) {
                                    echo 3;
                                } else {
                                    echo 4;
                                }
                            }
                        }
                    }
                } else {
                    echo 5;
                }
            }
        }
    }
}

if (isset($_POST['invoice'])) {
    
    $latestInvoiceId = $obj->getLatestInvoiceId();

    if ($latestInvoiceId !== null) {
        $newInvoiceId = $latestInvoiceId + 1;
        echo $newInvoiceId;
    } else {
        echo "No invoice found";
    }
}
