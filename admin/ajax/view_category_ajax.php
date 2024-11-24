<?php
include "../include/database.php";

$obj = new DB();

$rest = $obj->select("category", "*", null, null, null, null);

if (isset($rest)) {
    foreach ($rest as $row) {
?>
        <tr>
            <td><?php echo $row['categoryid'] ?></td>
            <td><?php echo $row['categoryname'] ?></td>
            <td><?php echo $row['categorydescription'] ?></td>
            <td><?php echo $row['categorydate'] ?></td>
            
            <td><a data-del="<?php echo $row['categoryid'] ?>" class="btn btn-danger text-white  dlt">Delete</a></td>
            <td><a href="../update_category.php?upid=<?php echo $row['categoryid'] ?>" class="btn btn-success">Update</a></td>



        </tr>
<?php
    }
}
?>