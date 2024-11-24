<?php
// include("./include/database.php");
include("./include/header.php");
include("./include/sidebar.php");
$obj = new DB();
$repid=$_GET['rid'];
$rsql = $obj->select("usercontact","*", "cid = '$repid'");
$run = $obj->getresult();
foreach ($run as $fet) {
    $cid=$fet['cid'];
    $uemail=$fet['useremail'];

}

?>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row  justify-content-center">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <form id="replydata">
                                <div class="row justify-content-center mt-4">

                                </div>
                                <div class="card-header">
                                    <h4>Reply To User</h4>
                                </div>


                                <div class="card-body">
                                    <div class="form-group">
                                        <label>User Email</label>
                                        <input type="hidden" class="form-control" value="<?php echo $fet['cid'] ?>" id="cid" name="replyemail" readonly>
                                        <input type="email" class="form-control" value="<?php echo $fet['useremail'] ?>" id="remail" name="replyemail" readonly>
                                        <br>

                                    </div>

                                    <div class="form-group mb-0">
                                        <label>Subject</label>
                                        <textarea class="form-control" id="rsub" name="replysubject"></textarea>
                                        <br>

                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Message</label>
                                        <textarea class="form-control" id="rmsg" name="replymsg"></textarea>
                                        <br>

                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <input type="submit" Name="submit" id="rsend" value="Send" class="btn btn-primary">
                                </div>
                            </form>

                        </div>
                    </div>
        </section>

    </div>

<!-- <script src="./js files/qunatity.js"></script> -->
<?php
include("./include/footer.php")
?>
<script>
    $(document).ready(function() {
        $(document).on("click", "#rsend", function(e) {
            e.preventDefault();
            var quan = $(this).closest("#replydata");
            var cid = quan.find("#cid").val();
            var remail = quan.find("#remail").val();
            var rsub = quan.find("#rsub").val();
            var rmsg = quan.find("#rmsg").val();


            $.ajax({
                url: "./ajax/replyajax.php",
                method: "POST",
                data: {
                    "cid": cid,
                    "remail": remail,
                    "rsub": rsub,
                    "rmsg": rmsg,

                },
                // processData: false,
                // contentType: false,
                success: function(val) {
                    if (val == 1) {
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
                            title: "<h3>Message has sent</h3>"
                        });
                    } else if (val == 2) {
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
                            title: "<h3>Message has not sent</h3>"
                        });
                    } else {
                        alert(val);
                    }
                }
            })
        })
    })
</script>