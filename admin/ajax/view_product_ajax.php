<?php
include("../include/database.php");
$obj = new DB();
$sql = $obj->select("product", "*", null, "INNER JOIN category  ON product.categoryid=category.categoryid  INNER JOIN subcategory  ON product.subcategoryid=subcategory.subcategoryid INNER JOIN supplier  ON product.supplier=supplier.supplierid INNER JOIN  quantity ON product.productquantity=quantity.quantityid", null, null);
if (isset($sql)) {
    foreach ($sql as $fet) {
?>
        <tr>
            <td><?php echo $fet['categoryname'] ?></td>
            <td><?php echo $fet['subcategoryname'] ?></td>
            <td><?php echo $fet['suppliername'] ?></td>
            <td><?php echo $fet['productid'] ?></td>
            <td><?php echo $fet['productcode'] ?></td>
            <td><?php echo $fet['productname'] ?></td>
            <td><?php echo $fet['productdescription'] ?></td>
            <td><?php echo $fet['shortdescription'] ?></td>
            <td><?php echo $fet['quantityname'] ?></td>
            <td><?php echo $fet['productstock'] ?></td>
            <td><?php echo $fet['productunitprice'] ?></td>
            <td><?php echo $fet['productsaleprice'] ?></td>
            <td><?php echo $fet['status'] ?></td>
            <td><?php
                $p = unserialize($fet['picture']);
                foreach ($p as $val) {
                ?>
                    <img width="100px" height="100px" src="<?php echo "./product_img/" . $val ?>" />
                <?php

                }  ?>
            </td>
            <td><?php echo $fet['productdate'] ?></td>
            <td> <button class="btn btn-danger dlt" data-del="<?php echo $fet['productid'] ?>">Delete</button> </td>
            <td> <a class="btn btn-success" href="./update_product.php?upid=<?php echo $fet['productid'] ?>">Update</a> </td>

        </tr>
<?php
    }
}
?>