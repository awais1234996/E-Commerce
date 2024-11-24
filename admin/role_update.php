<?php
// include("./include/database.php");
include("./include/header.php");
include("./include/sidebar.php");
$obj=new DB();
$upid = $_GET['upid'];
$rsql =  $obj->select("role_insertion", "*", "rid = '$upid'");
$res=$obj->getresult();
foreach($res as $rfet){
    $rid=$rfet['rid'];
    $role=$rfet['role'];
    $roleaccess=$rfet['roleaccess'];
    $roledate=$rfet['roledate'];
    $roleper=$rfet['roleper'];
}
?>

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
                                    <a class="btn btn-primary" href="role_view.php">VIEW</a>
                                </div>
                            </div>
                            <div class="card-header">
                                <h4>Add Role</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Role</label>
                                    <input type="text" class="form-control" id="catname" value="<?php echo $rfet['role'] ?>" name="role">
                                    <input type="hidden" class="form-control" value="<?php echo $rfet['rid'] ?>" name="rid">
                                    <br>

                                </div>
                                <div class="form-group">
                                    <label>Role Access</label>
                                    <select name="roleaccess" class="form-control" id="raccess">
                                        <option value=""><?php echo $rfet['roleaccess'] ?></option>
                                        <option value="All" id="all">All</option>
                                        <option value="Custom" id="custom">Custom</option>


                                    </select>


                                </div>
                                <div class="box">
                                    <?php
                                       $p = unserialize($rfet['roleper']);
                                       $rp = array("category", "subcategory", "supplier", "quantity", "product", "confirmedusers", "orders", "pos", "contact", "usermanagement");
                                       foreach ($rp as $per) {
                                       ?>                             
                                        <input type="checkbox" name="roles[]" value="<?php echo $per ?>" <?php echo in_array($per, $p) ? 'checked' : '' ?>>
                                        <?php echo ucfirst($per) ?>
                                        <br>
                                    <?php
                                       }
                                    ?>
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
<?php
include("./include/footer.php")
?>
<script>
    $(document).ready(function() {
        $(document).on("change", "#raccess", function(e) {
            e.preventDefault();
            var mydata = $(this).val();
            if (mydata == "Custom") {
                $(".box").show()
            } else {
                $(".box").hide()
            }
        })
    })

    $(document).ready(function() {
        $(document).on("submit", "#roledata", function(e) {
            e.preventDefault();
            var mydata = new FormData(roledata)
            $.ajax({
                url: "./ajax/role_update_ajax.php",
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
                            title: "Role has been inserted"
                        });

                        $("#roledata").trigger("reset")
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
                            title: "Role has not been inserted"
                        });

                    } else {

                        alert(val);
                    }
                }

            })
        })
    })
</script>