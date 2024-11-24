<?php
include("../include/database.php");
$obj=new DB();
$sql = $obj->select("pos_userinfo","*");
foreach ($sql as $fet) {
?>
    <tr>
        <td><?php echo $fet['userid'] ?></td>
        <td><?php echo $fet['username'] ?></td>
        <td><?php echo $fet['usercontact'] ?></td>
        <td><?php echo $fet['userinvoice'] ?></td>

        <td><?php echo $fet['usertcash'] ?></td>
        <td><?php echo $fet['userstatus'] ?></td>

        <td><?php echo $fet['userdate'] ?></td>
        <td> <a class="btn btn-primary" href="./POS_invoice.php?inid=<?php echo base64_encode($fet['userinvoice']) ?>">Invoice</a> </td>
        <td> <button class="btn btn-danger dlt" data-del="<?php echo $fet['userinvoice'] ?>">Delete</button> </td>
        <td> <a class="btn btn-success" href="./update_POS.php?ordid=<?php echo $fet['userinvoice'] ?>">Update</a> </td>

    </tr>
<?php
}

?>