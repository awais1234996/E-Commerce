<?php
// include("./include/database.php");
include("./include/header.php");
include("./include/sidebar.php");
$upid = $_GET['upid'];
$obj=new DB();
$rsql =$obj->select("quantity","*","quantityid=$upid");
$res=$obj->getresult();
foreach($res as $rfet){
$qname=$rfet['quantityname'];
$qdes=$rfet['quantitydescription'];

}

?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row  justify-content-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form id="qtydata">
                            <div class="card-header">
                                <h4>Add Quantity</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Quantity Name</label>
                                    <input type="text" class="form-control" value="<?php echo $rfet['quantityname'] ?>" name="quantityname">
                                    <input type="hidden" class="form-control" value="<?php echo $rfet['quantityid'] ?>" name="quantityid">
                                </div>

                                <div class="form-group mb-0">
                                    <label>Description(Optional)</label>
                                    <textarea class="form-control" value="<?php echo $rfet['quantitydescription'] ?>" name="quantitydescription"><?php echo $rfet['quantitydescription'] ?></textarea>
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
<!-- <script src="./js files/quantity.js"></script> -->
<?php
include("./include/footer.php")
?>
<script>
    $(document).ready(function() {
        $("#qtydata").on("submit", function(e) {
            e.preventDefault();
            var mydata = new FormData(qtydata);
            $.ajax({
                url: "./ajax/update_quantity_ajax.php",
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
                            icon: "error",
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
                            window.location.href = "./view_quantity.php";
                        }, 1000)
                        $("#qtydata").trigger("reset");
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