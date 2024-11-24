<?php
// include("./include/database.php");
include("./include/header.php");
include("./include/sidebar.php");
$obj = new DB();
$upid = $_GET['upid'];
$rsql = $obj->select("product", "*", "productid = '$upid'", "INNER JOIN category ON product.categoryid=category.categoryid INNER JOIN subcategory ON product.subcategoryid=subcategory.subcategoryid INNER JOIN supplier ON product.supplier=supplier.supplierid INNER JOIN quantity ON product.productquantity=quantity.quantityid");


$res = $obj->getresult();
foreach ($res as $rfet) {
    $cname = $rfet['categoryname'];
    $scname = $rfet['subcategoryname'];
    $sname = $rfet['suppliername'];
    $qname = $rfet['quantityname'];
    $pid = $rfet['productid'];
    $pcode = $rfet['productcode'];
    $pname = $rfet['productname'];
    $pdes = $rfet['productdescription'];
    $psdes = $rfet['shortdescription'];
    $pstock = $rfet['productstock'];
    $puprice = $rfet['productunitprice'];
    $psprice = $rfet['productsaleprice'];
    $status = $rfet['status'];
}





?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center ">
                <div class="col-10 col-md-6 col-lg-10 ">
                    <div class="card">
                        <form id="data">
                            <div class="row justify-content-center mt-4">
                                <div class="col-2">
                                    <a class="btn btn-primary" href="view_product.php">VIEW</a>
                                </div>
                            </div>
                            <div class="card-header">
                                <h4>Update product</h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 row ">
                                    <label class="col-6 col-form-label fw-bold">Category ID</label>
                                    <div class="col-12 ">
                                        <select class="form-control" name="categoryid">
                                            <option value="<?php echo $rfet['categoryid'] ?>"><?php echo $rfet['categoryname']  ?></option>
                                            <?php
                                            $tsql = "SELECT * FROM `category`";
                                            $trun = mysqli_query($conn, $tsql);
                                            while ($cfet = mysqli_fetch_array($trun)) {
                                            ?>
                                                <option value="<?php echo $cfet['categoryid'] ?>"><?php echo $cfet['categoryname']  ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3 row ">
                                        <label class="col-6 col-form-label fw-bold">Sub-Category ID</label>
                                        <div class="col-12 ">
                                            <select class="form-control" name="subcategoryid">
                                                <option value="<?php echo $rfet['subcategoryid'] ?>"><?php echo $rfet['subcategoryname']  ?></option>
                                                <?php
                                                $ssql = "SELECT * FROM `subcategory`";
                                                $srun = mysqli_query($conn, $ssql);
                                                while ($sfet = mysqli_fetch_array($srun)) {
                                                ?>
                                                    <option value="<?php echo $sfet['subcategoryid'] ?>"><?php echo $sfet['subcategoryname']  ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3 row ">
                                        <label class="col-6 col-form-label fw-bold">Supplier</label>
                                        <div class="col-12 ">
                                            <select class="form-control" name="supplier">
                                                <option value="<?php echo $rfet['supplier'] ?>"><?php echo $rfet['suppliername']  ?></option>
                                                <?php
                                                $supsql = "SELECT * FROM `supplier`";
                                                $suprun = mysqli_query($conn, $supsql);
                                                while ($supfet = mysqli_fetch_array($suprun)) {
                                                ?>
                                                    <option value="<?php echo $supfet['supplierid'] ?>"><?php echo $supfet['suppliername']  ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="mb-3 row ">
                                        <label class="col-6 col-form-label fw-bold">Quantity</label>
                                        <div class="col-12 ">
                                            <select class="form-control" name="productquantity">

                                                <option value="<?php echo $rfet['productquantity'] ?>"><?php echo $rfet['productquantity']  ?></option>
                                                <?php
                                                $qsql = "SELECT * FROM `quantity`";
                                                $qrun = mysqli_query($conn, $qsql);
                                                while ($qfet = mysqli_fetch_array($qrun)) {
                                                ?>
                                                    <option value="<?php echo $qfet['quantityid'] ?>"><?php echo $qfet['quantityname']  ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>product Name</label>
                                        <input type="text" class="form-control" value="<?php echo $rfet['productname'] ?>" name="productname">
                                        <input type="hidden" class="form-control" value="<?php echo $rfet['productid'] ?>" name="productid">

                                    </div>
                                    <div class="form-group ">
                                        <label>Product Description</label>
                                        <textarea class="form-control" value="<?php echo $rfet['productdescription'] ?>" name="productdescription"><?php echo $rfet['productdescription'] ?></textarea>
                                    </div>
                                    <div class="form-group ">
                                        <label>Short Description</label>
                                        <textarea class="form-control" value="<?php echo $rfet['shortdescription'] ?>" name="shortdescription"><?php echo $rfet['shortdescription'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Product Code</label>
                                        <input type="number" class="form-control" value="<?php echo $rfet['productcode'] ?>" name="productcode">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Stock</label>
                                        <input type="number" value="<?php echo $rfet['productstock'] ?>" class="form-control" name="productstock">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Unit Price</label>
                                        <input type="number" class="form-control" value="<?php echo $rfet['productunitprice'] ?>" name="productunitprice">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Sale Price</label>
                                        <input type="number" class="form-control" value="<?php echo $rfet['productsaleprice'] ?>" name="productsaleprice">
                                    </div>
                                    <div class="form-group">
                                        <label>Picture</label><br>
                                        <input type="file" name="picture[]" multiple>
                                    </div>
                                    <?php
                                    if ($rfet['status'] == "online") {
                                        $m = "checked";
                                    } else {
                                        $f = "checked";
                                    }
                                    ?>
                                    <div class="form-check">
                                        <input class="form-check-input" name="status" type="radio" name="flexRadioDefault" value="online" <?php echo @$m; ?> id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Online
                                        </label>
                                    </div>
                                    <div class="form-check">

                                        <input class="form-check-input" name="status" type="radio" name="flexRadioDefault" value="offline" <?php echo @$f; ?> id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Offline
                                        </label>
                                    </div>



                                    <div class="card-footer text-right">
                                        <input type="submit" Name="submit" value="Submit" class="btn btn-primary">
                                    </div>
                                </div>
                        </form>

                    </div>
                </div>
    </section>

</div>
<!-- <script src="./js files/product.js"></script> -->
<?php
include("./include/footer.php")
?>
<script>
    $(document).ready(function() {
        $("#data").on("submit", function(e) {
            e.preventDefault();
            var mydata = new FormData(data);
            $.ajax({
                url: "./ajax/update_product_ajax.php",
                method: "POST",
                data: mydata,
                processData: false,
                contentType: false,
                success: function(res) {
                    // alert(res);
                    if (res == 1) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "warning",
                            title: "Please fill all fields"
                        });
                    } else if (res == 2) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "success",
                            title: "DATA HAS BEEN UPDATED"

                        });
                        setTimeout(function() {
                            window.location.href = "./view_product.php";
                        }, 1000)
                        $("#data").trigger("reset");
                    } else if (res == 3) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "error",
                            title: "DATA HAS NOT BEEN UPDATED"
                        });
                    } else if (res == 4) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "error",
                            title: "Img is not right"
                        });
                    } else if (res == 5) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "success",
                            title: "Same data inserted"
                        });
                    } else if (res == 6) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "error",
                            title: "Same data not inserted"
                        });
                    } else {
                        alert(res)
                    }
                }

            })
        })
    })
</script>