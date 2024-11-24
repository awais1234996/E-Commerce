<?php
include("../include/database.php");
$obj = new DB();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['remail'])) {
    session_start();
    $email = $_SESSION['admin_email'];
    $cid = $obj->getstr($_POST['cid']);
    $remail = $obj->getstr($_POST['remail']);
    $rsub = $obj->getstr($_POST['rsub']);
    $rmsg = $obj->getstr($_POST['rmsg']);
    $odate = date("Y-m-d");
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
    $mail->setFrom($remail);
    $mail->addAddress($remail); //enter you email address
    $mail->Subject = $rsub;
    $mail->Body = $rmsg;

    if ($mail->send()) {
        $msg = "Success";
    } else {
        $msg = "Error";
    }
}
if ($msg = "Success") {
    $delsql =$obj->delete("usercontact", "cid='$cid'");
       if ($delsql) {
        echo 1;
    } else {
        echo 2;
    }
}
