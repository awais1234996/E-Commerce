<?php
include("../include/database.php");
$obj = new DB();

$sql = $obj->select("supplier", "*", null, null, null, null);
$res = $obj->getresult();
if (isset($res)) {
    foreach ($res as $fet) {
?>
        <tr>
            <td><?php echo $fet['supplierid'] ?></td>
            <td><?php echo $fet['suppliername'] ?></td>
            <td><?php echo $fet['supplieremail'] ?></td>
            <td><?php echo $fet['suppliercnic'] ?></td>
            <td> <button class="btn btn-danger dlt" data-del="<?php echo $fet['supplierid'] ?>">Delete</button> </td>
            <td> <a class="btn btn-success" href="./update_supplier.php?upid=<?php echo $fet['supplierid'] ?>">Update</a> </td>

        </tr>
<?php
    }
}
?>