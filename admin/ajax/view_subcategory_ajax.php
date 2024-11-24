<?php
include "../include/database.php";

$obj = new DB();

$rest = $obj->select("subcategory", "*", null, "INNER JOIN category ON subcategory.idcategory = category.categoryid", null, null);

if (isset($rest)) {
    foreach ($rest as $row) {
?>
        <tr>
            <td><?php echo $row['idcategory'] ?></td>
            <td><?php echo $row['categoryname'] ?></td>
            <td><?php echo $row['subcategoryid'] ?></td>
            <td><?php echo $row['subcategoryname'] ?></td>
            <td><?php echo $row['subcategorydescription'] ?></td>
            <td> <button class="btn btn-danger dlt" data-del="<?php echo $row['subcategoryid'] ?>">Delete</button> </td>
            <td> <a class="btn btn-success" href="./update_subcategory.php?upid=<?php echo $row['subcategoryid'] ?>">Update</a> </td>



        </tr>
<?php
    }
}
?>