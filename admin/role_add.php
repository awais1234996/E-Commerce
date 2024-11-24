<?php
// include("./include/database.php");
include("./include/header.php");
include("./include/sidebar.php");
$obj=new DB();

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
                                    <input type="text" class="form-control" id="catname" name="role">
                                    
                                </div>
                                <div class="form-group">
                                    <label>Role Access</label>
                                    <select name="roleaccess" class="form-control" id="raccess">
                                        <option value="">--Select Module--</option>
                                        <option value="All" id="all">All</option>
                                        <option value="Custom" id="custom">Custom</option>


                                    </select>


                                </div>
                                <div class="box" style="display:none;">
                                    <input type="checkbox" name="roles[]" value="category">
                                    <label for="Category">Category</label>
                                    <br>
                                    <input type="checkbox" name="roles[]" value="subcategory">
                                    <label for="subCategory">subCategory</label>
                                    <br>
                                    <input type="checkbox" name="roles[]" value="supplier">
                                    <label for="supplier">Supplier</label>
                                    <br>
                                    <input type="checkbox" name="roles[]" value="quantity">
                                    <label for="quantity">Quantity</label>
                                    <br>
                                    <input type="checkbox" name="roles[]" value="product">
                                    <label for="product">Product</label>
                                    <br>
                                    <input type="checkbox" name="roles[]" value="confirmedusers">
                                    <label for="confirmedusers">Confirmed users</label>
                                    <br>
                                    <input type="checkbox" name="roles[]" value="orders">
                                    <label for="order">Orders</label>
                                    <br>
                                    <input type="checkbox" name="roles[]" value="pos">
                                    <label for="pos">POS</label>
                                    <br>
                                    <input type="checkbox" name="roles[]" value="contact">
                                    <label for="contact">Contact</label>
                                    <br>
                                    <input type="checkbox" name="roles[]" value="usermanagement">
                                    <label for="contact">User Management</label>
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
        $("#roledata").on("submit", function(e) {
            e.preventDefault();
            var mydata = new FormData(roledata)
            $.ajax({
                url: "./ajax/role_add_ajax.php",
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
                            icon: "warning",
                            title: "Role Already Exist"
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
                            icon: "success",
                            title: "Role has been inserted"
                        });

                        $("#roledata").trigger("reset")
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