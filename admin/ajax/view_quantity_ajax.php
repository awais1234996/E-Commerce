<?php
include("../include/database.php");
$obj = new DB();
$sql = $obj->select("quantity", "*", null, null, null, null);

if (isset($sql)) {
    foreach ($sql as $fet) {
?>
        <tr>
            <td><?php echo $fet['quantityid'] ?></td>
            <td><?php echo $fet['quantityname'] ?></td>
            <td><?php echo $fet['quantitydescription'] ?></td>
            <td> <button class="btn btn-danger dlt" data-del="<?php echo $fet['quantityid'] ?>">Delete</button> </td>
            <td> <a class="btn btn-success" href="./update_quantity.php?upid=<?php echo $fet['quantityid'] ?>">Update</a> </td>

        </tr>
<?php
    }
}

?>