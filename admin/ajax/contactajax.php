<?php
include("../include/database.php");
$obj = new DB();
$sql = $obj->select("usercontact", "*");
$run = $obj->getresult();
if (isset($run)) {


    foreach ($run as $fet) {

?>

        <tr>

            <td><?php echo $fet['username'] ?></td>
            <td><?php echo $fet['useremail'] ?></td>
            <td><?php echo $fet['userphone'] ?></td>
            <td><?php echo $fet['usermsg'] ?></td>

            <td> <a class="btn btn-primary" href="reply.php?rid=<?php echo $fet['cid'] ?>">Reply</a> </td>
            <td> <button class="btn btn-danger dlt" data-del="<?php echo $fet['cid'] ?>">Delete</button> </td>
        </tr>


<?php
    }
}
?>
<?php
if (isset($_POST['mydel'])) {
    $delid = $_POST['mydel'];

    $sql = $obj->delete("usercontact", "cid='$delid'");
    if ($sql) {
        echo 1;
    } else {
        echo 2;
    };
}
