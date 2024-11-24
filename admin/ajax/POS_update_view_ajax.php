<?php
include("../include/database.php");
$obj=new DB();
$upid=$obj->getstr($_GET['sinvo']);
$sql = $obj->select("pos_orderinfo", "*", "orderinvoice=$upid");
$carttotal = 0;
foreach ($sql as $fet) {

?>

    <tr id="postable">

        <td><?php echo $fet['ordercode'] ?></td>
        <td><?php echo $fet['ordername'] ?></td>
        <td><?php echo $fet['orderprice'] ?></td>
        <td>
            <input type="hidden" id="cartid" value="<?php echo $fet['oid']; ?>">
            <input type="hidden" id="cartprice" value="<?php echo $fet['orderprice']; ?>">
            <input type="number" class="form-control" id="cartqnt" name="posqty" value="<?php echo $fet['orderqty']  ?>" data-max_value="20" data-min_value="1" data-step="1">
        </td>
        <td><?php echo $fet['ordertotalprice'] ?></td>

        <td> <button class="btn btn-danger dlt" data-del="<?php echo $fet['oid'] ?>">Delete</button> </td>
    </tr>


<?php
    $carttotal = $carttotal + $fet['ordertotalprice'];
}
?>

<tr style="font-weight:bold; font-size:large;">

    <td colspan=5>Total cash:</td>
    <td ><span id="gtotal"><?php echo $carttotal; ?></span></td>
</tr>
<tr>
    <td> <button class="btn btn-warning all" style="width: 150px;" data-clear="<?php echo $fet['oid'] ?>">Remove All</button> </td>
</tr>
