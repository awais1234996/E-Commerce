<?php
// require "./include/database.php";
include("./include/header.php");
include("./include/sidebar.php");
$id = $_GET['upid'];
$obj = new DB();

$obj->select("category", "*", "categoryid=$id");

$res = $obj->getresult();
foreach ($res as $row) {
    $categoryname = $row['categoryname'];
    $categorydescription = $row['categorydescription'];
}








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
                                <h4>Add Category</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" class="form-control" value="<?php echo $categoryname ?>" name="categoryname" required="">
                                    <input type="hidden" name="categoryid" value="<?php echo $id ?>">
                                </div>

                                <div class="form-group mb-0">
                                    <label>Description(Optional)</label>
                                    <textarea class="form-control" value="<?php echo $categorydescription ?>" name="categorydescription"><?php echo $categorydescription ?></textarea>
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
<!-- <script src="./js files/category.js"></script> -->
<?php
include("./include/footer.php")
?>
<script>
    $(document).ready(function() {
        $("#data").on("submit", function(e) {
            e.preventDefault();
            var mydata = new FormData(data);
            $.ajax({
                url: "./ajax/update_category_ajax.php",
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
                            icon: "success",
                            title: "DATA HAS BEEN UPDATED"

                        });
                        setTimeout(function() {
                            window.location.href = "./view_category.php";
                        }, 1000)
                        $("#data").trigger("reset");
                    } else if (res == 1) {
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