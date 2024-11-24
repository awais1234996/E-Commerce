<?php

include("../include/database.php");
$obj = new DB();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


session_start();
$email = $_SESSION['email'];



$connetion = fsockopen("www.google.com", 80);

if ($connetion) {
    $oname = $obj->getstr($_POST['fname']);
    $olname = $obj->getstr($_POST['lname']);
    $oemail = $obj->getstr($_POST['email']);
    $ophone = $obj->getstr($_POST['phone']);
    $ocountry = $obj->getstr($_POST['country']);
    $ostate = $obj->getstr($_POST['state']);
    $ocity = $obj->getstr($_POST['city']);
    $opostal = $obj->getstr($_POST['pcode']);
    $oaddress1 = $obj->getstr($_POST['address1']);
    $oaddress2 = $obj->getstr($_POST['address2']);
    $date = date('Y-m-d');
    $invoice = rand(5000, 90000);
    $ostatus = "pending";

    if (empty($oname) || empty($olname) || empty($oemail) || empty($ophone) || empty($ocountry) || empty($ostate) || empty($ocity) || empty($opostal)) {
        echo 1;
    } else {
        $usersql = $obj->insert("online_user", ["uname" => $oname, "ulastname" => $olname, "uemail" => $oemail, "uphone" => $ophone, "ucountry" => $ocountry, "ustate" => $ostate, "ucity" => $ocity, "upostalcode" => $opostal, "uaddress1" => $oaddress1, "uaddress2" => $oaddress2, "udate" => $date, "uinvoice" => $invoice, "ustatus" => $ostatus,]);
        if ($usersql) {
            $sql = $obj->select("shopcart", "*", "cartemail='$email'", null, null, null);
            if ($sql) {
                foreach ($sql as $fetch) {
                    $uname = $fetch['cartname'];
                    $ucode = $fetch['cartcode'];
                    $uprice = $fetch['cartprice'];
                    $uqty = $fetch['cartqty'];
                    $utp = $fetch['carttotalprice'];
                    $upic = $fetch['cartpic'];
                    $ins = $obj->insert("online_order", ["ordname" => $uname, "ordcode" => $ucode, "ordprice" => $uprice, "ordqty" => $uqty, "ordtotalprice" => $utp, "ordpic" => $upic, "ordinvoice" => $invoice, "ordstatus" => $ostatus,]);

                    if ($ins) {
                        $msg = "Right";
                    } else {
                        $msg = "Wrong";
                    }
                }
                if ($msg == "Right") {
                    require "../PHPMailer/PHPMailer.php";
                    require "../PHPMailer/SMTP.php";
                    require "../PHPMailer/Exception.php";

                    $mail = new PHPMailer(true);

                    //SMTP Settings                           
                    $mail->isSMTP();
                    $mail->Host = "smtp.gmail.com";
                    $mail->SMTPAuth = true;
                    $mail->Username = "awaisraza031074@gmail.com"; //enter you email address
                    $mail->Password = 'owxu qofb dcvg lhrz'; //enter you email password
                    $mail->Port = 465;
                    $mail->SMTPSecure = "ssl";

                    //Email Settings
                    $mail->isHTML(true);
                    $mail->setFrom($oemail, $oname);
                    $mail->addAddress($oemail); //enter you email address
                    $mail->Subject = "order confirmation";
                    $mail->Body = "wah kia bt han mail send $invoice";

                    if ($mail->send()) {
                        $msg = "Success";
                    } else {
                        $msg = "dafa dor nahi send";
                    }
                }

                if ($msg == "Success") {
                    $delsql = $obj->delete("shopcart", "cartemail='$email'");
                    if ($delsql) {
                        echo 2;
                    } else {
                        echo 3;
                    }
                }
            } else {
                echo 4;
            }
        }
    }
} else {
    echo 5;
}
