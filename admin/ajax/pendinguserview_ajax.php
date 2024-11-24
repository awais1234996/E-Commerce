<?php
include("../include/database.php");
$obj = new DB();
$sql = $obj->select("user", "*", "status='pending'", null, null, null);

$sql = $obj->getresult();
if (isset($sql)) {
    foreach ($sql as $fet) {
?>
        <tr>
            <td><?php echo $fet['userid'] ?></td>
            <td><?php echo $fet['fname'] ?></td>
            <td><?php echo $fet['lname'] ?></td>
            <td><?php echo $fet['email'] ?></td>
            <td><?php echo $fet['phone'] ?></td>
            <td><?php echo $fet['country'] ?></td>
            <td><?php echo $fet['state'] ?></td>
            <td><?php echo $fet['city'] ?></td>
            <td><?php echo $fet['pcode'] ?></td>
            <td><?php echo $fet['address1'] ?></td>
            <td><?php echo $fet['address2'] ?></td>
            <td><?php echo $fet['password'] ?></td>
            <td><?php echo $fet['cpassword'] ?></td>
            <td><?php echo $fet['status'] ?></td>

            <td> <button class="btn btn-danger dlt" data-del="<?php echo $fet['userid'] ?>">Delete</button> </td>
            <td> <button class="btn btn-success cfm" data-confirm="<?php echo $fet['userid'] ?>">Confirm</button> </td>


        </tr>
<?php
    }
}

?>