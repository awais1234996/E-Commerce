<?php
include("../include/database.php");
$obj = new DB();
if (isset($_POST['del'])) {
    $sql = $obj->select(" role_insertion ", "*");
    $run = $obj->getresult();
    if (isset($run)) {

        foreach ($run as $fet) {

?>

            <tr>

                <td><?php echo $fet['rid'] ?></td>
                <td><?php echo $fet['role'] ?></td>
                <td><?php echo $fet['roleaccess'] ?></td>

                <?php
                $p = unserialize($fet['roleper']);
                $rp = array("category", "subcategory", "supplier", "quantity", "product", "confirmedusers", "orders", "pos", "contact", "usermanagement");
                foreach ($rp as $per) {
                ?>
                    <td>
                        <input type="checkbox" name="roles[]" value="<?php echo $per ?>" <?php echo in_array($per, $p) ? 'checked' : '' ?>>
                        <?php echo ucfirst($per) ?>
                    </td>
                <?php
                }
                ?>


                <td><?php echo $fet['roledate'] ?></td>

                <td> <button class="btn btn-danger dlt" data-del="<?php echo $fet['rid'] ?>">Delete</button> </td>
                <td> <a class="btn btn-success" href="./role_update.php?upid=<?php echo $fet['rid'] ?>">Update</a> </td>
            </tr>


        <?php
        }
    }
}
if (isset($_POST['user'])) {
    $sql = $obj->select("admin,role_insertion", "*", "admin_role=rid");
    $run = $obj->getresult();


        foreach ($run as $fet) {
        ?>
            <tr>

                <td><?php echo $fet['admin_id'] ?></td>
                <td><?php echo ucfirst($fet['admin_name']) ?></td>
                <td><?php echo $fet['admin_email'] ?></td>
                <td><?php echo $fet['role'] ?></td>
                <td><?php echo $fet['admin_password'] ?></td>

                <td> <button class="btn btn-danger dlt" data-del="<?php echo $fet['admin_role'] ?>">Delete</button> </td>
                <td> <a class="btn btn-success" href="./role_user_update.php?upid=<?php echo $fet['admin_id'] ?>">Update</a> </td>
            </tr>
<?php
        }
    }
?>