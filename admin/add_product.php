<?php
// include("./include/database.php");
include("./include/header.php");
include("./include/sidebar.php");
$obj = new DB();

?>
<style>
    #nameerror,
    #deserror,
    #shorterror,
    #codeerror,
    #picerror,
    #uniterror,
    #saleerror,
    #statuserror,
    #stockerror,
    #caterror {
        color: red;
    }
</style>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center ">
                <div class="col-10 col-md-6 col-lg-10 ">
                    <div class="card">
                        <form id="prodata" onsubmit="return smt()">
                            <div class="row justify-content-center mt-4">
                                <div class="col-2">
                                    <a class="btn btn-primary" href="view_product.php">VIEW</a>
                                </div>
                            </div>
                            <div class="card-header">
                                <h4>Add product</h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 row ">
                                    <label class="col-6 col-form-label fw-bold">Category ID</label>
                                    <div class="col-12 ">
                                        <select class="form-control" id="catname" onchange="catid()" name="categoryid" required>
                                            <option value="">SELECT Category</option>
                                            <?php
                                            $tsql = $obj->select("category", "*", null, null, null, null);

                                            foreach ($tsql as $fet) {
                                            ?>
                                                <option value="<?php echo $fet['categoryid'] ?>"><?php echo $fet['categoryname']  ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <span id="caterror"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3 row ">
                                        <label class="col-6 col-form-label fw-bold">Sub-Category ID</label>
                                        <div class="col-12 ">
                                            <select class="form-control" id="sctname" onblur="subcatid()" name="subcategoryid" required>
                                                <option value="">SELECT Sub-Category ID</option>
                                                <?php
                                                $tsql = $obj->select("subcategory", "*", null, null, null, null);

                                                foreach ($tsql as $fet) {
                                                ?>
                                                    <option value="<?php echo $fet['subcategoryid'] ?>"><?php echo $fet['subcategoryname']  ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <span id="scaterror"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3 row ">
                                        <label class="col-6 col-form-label fw-bold">Supplier</label>
                                        <div class="col-12 ">
                                            <select class="form-control" name="supplier" required>
                                                <option value="">SELECT Supplier</option>
                                                <?php
                                                $tsql = $obj->select("supplier", "*", null, null, null, null);

                                                foreach ($tsql as $fet) {
                                                ?>
                                                    <option value="<?php echo $fet['supplierid'] ?>"><?php echo $fet['suppliername']  ?></option>
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
                                            <select class="form-control" name="productquantity" required>
                                                <option value="">SELECT Quantity</option>
                                                <?php
                                                $tsql = $obj->select("quantity", "*", null, null, null, null);
                                                foreach ($tsql as $fet) {
                                                ?>
                                                    <option value="<?php echo $fet['quantityid'] ?>"><?php echo $fet['quantityname']  ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>product Name</label>
                                        <input type="text" class="form-control" id="pname" onblur="proname()" name="productname">
                                        <br>
                                        <span id="nameerror"></span>
                                    </div>
                                    <div class="form-group ">
                                        <label>Product Description</label>
                                        <textarea class="form-control" id="pdes" onblur="prodes()" name="productdescription"></textarea>
                                        <br>
                                        <span id="deserror"></span>
                                    </div>
                                    <div class="form-group ">
                                        <label>Short Description</label>
                                        <textarea class="form-control" id="psdes" onblur="prosdes()" name="shortdescription"></textarea>
                                        <br>
                                        <span id="shorterror"></span>
                                    </div>

                                    <div class="form-group">
                                        <label>Product Code</label>
                                        <input type="number" class="form-control" id="pcode" onblur="procode()" name="productcode">
                                        <br>
                                        <span id="codeerror"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Product Stock</label>
                                        <input type="number" class="form-control" id="pstock" onblur="prostock()" name="productstock">
                                        <br>
                                        <span id="stockerror"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Product Unit Price</label>
                                        <input type="number" class="form-control" id="punit" onblur="prounit()" name="productunitprice">
                                        <br>
                                        <span id="uniterror"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Product Sale Price</label>
                                        <input type="number" class="form-control" id="psale" onblur="prosale()" name="productsaleprice">
                                        <br>
                                        <span id="saleerror"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Picture</label><br>
                                        <input type="file" " name=" picture[]" id="img" onblur="picture()" multiple>
                                        <br>
                                        <span id="picerror"></span>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" id="pstatus" onblur="prostatus()" name="status" type="radio" name="flexRadioDefault" value="online" id="flexRadioDefault1">
                                        <br>
                                        <span id="statuserror"></span>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Online
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" id="pstatus" onblur="prostatus()" name="status" type="radio" name="flexRadioDefault" value="offline" id="flexRadioDefault2" checked>
                                        <br>
                                        <span id="statuserror"></span>
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
        $(document).on("submit", "#prodata", function(e) {
            e.preventDefault();
            var mydata = new FormData(prodata)
            $.ajax({
                url: "./ajax/productajax.php",
                method: "POST",
                data: mydata,
                processData: false,
                contentType: false,
                success: function(val) {
                    if (val == 1) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "error",
                            title: "Please Fill All Required Fields"
                        });
                    } else if (val == 2) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "warning",
                            title: "Product Already Exist"
                        });
                    } else if (val == 3) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "error",
                            title: "Product Code already exist"
                        });


                    } else if (val == 4) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "success",
                            title: "Product has been inserted"
                        });
                        $("#prodata").trigger("reset")
                    } else if (val == 5) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "error",
                            title: "Product has not been inserted"
                        });

                    } else if (val == 6) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "error",
                            title: "Image is not right"
                        });

                    } else {

                        alert(val);
                    }
                }

            })
        })
    })
</script>