<?php
// include("./include/database.php");
include("./include/header.php");
include("./include/sidebar.php");
$obj=new DB();
$upid = $_GET['upid'];

$rsql = $obj->select("supplier", "*", "supplierid=$upid");
foreach($rsql as $rfet){
    $sname=$rfet['suppliername'];
    $semail=$rfet['supplieremail'];
    $scnic=$rfet['suppliercnic'];
}

?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row  justify-content-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form id="supdata">
                            <div class="card-header">
                                <h4>Add supplier</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Supplier Name</label>
                                    <input type="text" class="form-control" value="<?php echo $rfet['suppliername'] ?>" name="suppliername">
                                    <input type="hidden" class="form-control" value="<?php echo $rfet['supplierid'] ?>" name="supplierid">
                                </div>

                                <div class="form-group mb-0">
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="<?php echo $rfet['supplieremail'] ?>" name="supplieremail">
                                </div>
                                <div class="form-group">
                                    <label>Supplier CNIC</label>
                                    <input type="number" class="form-control" value="<?php echo $rfet['suppliercnic'] ?>" name="suppliercnic">
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
<!-- <script src="./js files/supplier.js"></script> -->
<?php
include("./include/footer.php")
?>
<script>
    $(document).ready(function() {
        $("#supdata").on("submit", function(e) {
            e.preventDefault();
            var mydata = new FormData(supdata);
            $.ajax({
                url: "./ajax/update_supplier_ajax.php",
                method: "POST",
                data: mydata,
                processData: false,
                contentType: false,
                success: function(res) {
                    // alert(res);
                 if (res == 2) {
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
                            window.location.href = "./view_supplier.php";
                        }, 1000)
                        $("#supdata").trigger("reset");
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