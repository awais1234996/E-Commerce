<?php
include("../include/database.php");
$obj=new DB();
if (isset($_POST['uemail'])) {


    $uname = $obj->getstr($_POST['uname']);
    $uemail = $obj->getstr($_POST['uemail']);
    $uph = $obj->getstr($_POST['uphone']);
    $umsg = $obj->getstr($_POST['umsg']);

    $emailsql =$obj->insert("usercontact",["username"=>$uname,"useremail"=>$uemail,"userphone"=>$uph,"usermsg"=>$umsg]);
    if ($emailsql) {
        
        echo 1;
    } else {
        echo 2;
    }
}
