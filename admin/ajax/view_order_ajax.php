<?php
include "../include/database.php";
$obj = new DB();
$sql = $obj->select("online_user", "*", null, null, null, null);
$sql = $obj->getresult();
if (isset($sql)) {
    foreach($sql as $fet) {
?>
        <tr>
            <td><?php echo $fet['uinvoice'] ?></td>
            <td><?php echo $fet['uname'] ?></td>
            <td><?php echo $fet['ulastname'] ?></td>
            <td><?php echo $fet['uemail'] ?></td>
            <td><?php echo $fet['uphone'] ?></td>
            <td><?php echo $fet['ucountry'] ?></td>
            <td><?php echo $fet['ustate'] ?></td>
            <td><?php echo $fet['ucity'] ?></td>
            <td><?php echo $fet['upostalcode'] ?></td>
            <td><?php echo $fet['uaddress1'] ?></td>
            <td><?php echo $fet['uaddress2'] ?></td>
            <td><?php echo $fet['udate'] ?></td>
            <?php
            $ick = "";
            if ($fet['ustatus'] == "Completed") {
                $ick = "checked";
            } else {
                $ick = "";
            }
            ?>
            <td>
                <input type="checkbox" <?php echo $ick; ?> class="chek" data-oi="<?php echo $fet['uinvoice'] ?>" Name="checkbox">
            </td>
            <td><?php echo $fet['ustatus'] ?></td>

            <td> <a class="btn btn-primary" href="./invoice.php?inid=<?php echo base64_encode($fet['uinvoice']) ?>">Invoice</a> </td>
            <td> <button class="btn btn-danger dlt" data-del="<?php echo $fet['uinvoice'] ?>">Delete</button> </td>

        </tr>
<?php
    }
}
?>