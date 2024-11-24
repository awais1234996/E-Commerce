<?php
// include("./include/database.php");
include("./include/header.php");
include("./include/sidebar.php");
$obj = new DB();

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
                                <h4>Assign Roles</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" id="catname" name="admin_name">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" id="catname" name="admin_email">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Password</label>
                                            <input type="password" class="form-control" id="catname" name="admin_password">
                                        </div>
                                        <div class="col-6">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" id="catname" name="admin_cpassword">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="mb-3 row ">
                                        <label class="col-6 col-form-label fw-bold">Roles</label>
                                        <div class="col-12 ">
                                            <select class="form-control" id="catname" name="admin_role" required>
                                                <option value="">SELECT Category</option>
                                                <?php
                                                $tsql = $obj->select("role_insertion", "*", null, null, null, null);
                                                foreach ($tsql as $fet) {
                                                ?>
                                                    <option value="<?php echo $fet['rid'] ?>"><?php echo $fet['role']  ?></option>
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
                url: "./ajax/role_user_ajax.php",
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
                            title: "Role Already Assigned"
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
                            icon: "success",
                            title: "Role has been assigned"
                        });

                        $("#roledata").trigger("reset")
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
                            icon: "error",
                            title: "Role has not been assigned"
                        });

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