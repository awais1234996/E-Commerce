<?php

// include("./include/database.php");
include("./include/header.php");
include("./include/sidebar.php");
$obj = new DB();
$id = $_GET['upid'];
$res = $obj->select("subcategory ", "*", "subcategoryid=$id", "INNER JOIN category ON subcategory.idcategory = category.categoryid");
$rem= $obj->getresult();
// print_r($row);
foreach ($rem as $row) {
    $catid = $row['idcategory'];
    $subcategoryname = $row['subcategoryname'];
    $subcategorydescription = $row['subcategorydescription'];
}
$tsql = $obj->select("category", "*", null, null, null, null);
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row  justify-content-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form id="data">
                            <div class="card-header">
                                <h4>Add subCategory</h4>
                            </div>
                            <div class="row justify-content-center mt-4">
                                <div class="col-2">
                                    <a class="btn btn-primary" href="view_subcategory.php">VIEW</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 row ">
                                    <label class="col-4 col-form-label fw-bold">Category</label>
                                    <div class="col-12 ">
                                        <select class="form-control" name="idcategory">
                                            <option value="<?php echo $catid ?>"><?php echo $row['categoryname']  ?></option>
                                            <?php

                                            if (isset($tsql)) {
                                                foreach ($tsql as $fet) {
                                            ?>
                                                    <option value="<?php echo $fet['categoryid'] ?>"><?php echo $fet['categoryname']  ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Sub Category Name</label>
                                    <input type="text" class="form-control" value="<?php echo $subcategoryname ?>" name="subcategoryname">
                                    <input type="text" hidden name="subcategoryid" value="<?php echo $id ?>">
                                </div>

                                <div class="form-group mb-0">
                                    <label>Description(Optional)</label>
                                    <textarea class="form-control" name="subcategorydescription"><?php echo $row['subcategorydescription'] ?></textarea>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <input type="submit" Name="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </form>

                    </div>
                </div>
    </section>

</div>
<!-- <script src="./js files/subcategory.js"></script> -->
<?php
include("./include/footer.php")
?>
<script>
    $(document).ready(function() {
        $("#data").on("submit", function(e) {
            e.preventDefault();
            var mydata = new FormData(data);
            $.ajax({
                url: "./ajax/update_subcategory_ajax.php",
                method: "POST",
                data: mydata,
                processData: false,
                contentType: false,

                success: function(res) {
                    // alert(res);
                    if (res == 1) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top",
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
                            position: "top",
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
                            window.location.href = "./view_subcategory.php";
                        }, 1000)
                        $("#data").trigger("reset");
                    } else if (res == 3) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top",
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
                    } else {
                        alert(res)
                    }
                }

            })
        })
    })
</script>