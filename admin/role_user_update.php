<?php
// include("./include/database.php");
include("./include/header.php");
include("./include/sidebar.php");
$obj = new DB();
$upid = $_GET['upid'];
$rsql =  $obj->select("admin,role_insertion", "*", "admin_id = '$upid'");
$res = $obj->getresult();

foreach ($res as $rfet) {
    $username = $rfet['admin_name'];
    $useremail = $rfet['admin_email'];
    $userpass = $rfet['admin_password'];
    $userrole = $rfet['admin_role'];
}

?>
<style>
    #caterror,
    #deserror {
        color: red;
    }
</style>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row  justify-content-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form id="roledata">
                            <div class="row justify-content-center mt-4">
                                <div class="col-2">
                                    <a class="btn btn-primary" href="role_user_view.php">VIEW</a>
                                </div>
                            </div>
                            <div class="card-header">
                                <h4>Update Roles</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" id="catname" value="<?php echo $username ?>" name="admin_name">
                                    <input type="hidden" class="form-control" name="admin_id" value="<?php echo $rfet['admin_id'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" id="catname" value="<?php echo $rfet['admin_email'] ?>" name="admin_email">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Password</label>
                                            <input type="password" class="form-control" value="<?php echo $rfet['admin_password'] ?>" id="catname" name="admin_password">
                                        </div>
                                        <div class="col-6">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" value="<?php echo $rfet['admin_cpassword'] ?>" id="catname" name="admin_cpassword">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="mb-3 row ">
                                        <label class="col-6 col-form-label fw-bold">Roles</label>
                                        <div class="col-12 ">
                                            <select class="form-control" id="catname" name="admin_role" required>
                                                <option value=""><?php echo $rfet['admin_role'] ?></option>
                                                <?php
                                                $sql = $obj->select("role_insertion", "*");
                                                $run = $obj->getresult();
                                                foreach ($run as $rfet) {
                                                ?>
                                                    <option value="<?php echo $rfet['rid'] ?>"><?php echo $rfet['role']  ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <input type="submit" Name="submit" id="smt" value="Submit" class="btn btn-primary">
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
        $(document).on("submit", "#roledata", function(e) {
            e.preventDefault();
            var mydata = new FormData(roledata)
            $.ajax({
                url: "./ajax/role_user_update_ajax.php",
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
                            icon: "success",
                            title: "Role has been updated"
                        });

                        // $("#roledata").trigger("reset")
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
                            icon: "error",
                            title: "Role has not been updated"
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
                            title: "Password does not match"
                        });

                    } else {

                        alert(val);
                    }
                }

            })
        })
    })
</script>