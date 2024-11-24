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
            <div class="row justify-content-center mb-3">
                <div class="col-10 col-md-6 col-lg-6 ">
                    <div class="card">
                        <form id="prodata" onsubmit="return smt()">
                            <div class="card-header">
                                <h4>Add User</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="fid-name">First Name</label>
                                    <input type="text" id="fn" onblur="firstname()" name="fname" value="" class="form-control">
                                    <span id="ferror"></span>
                                </div>
                                <span id="fnameerror"></span>
                                <div class="form-group">
                                    <label for="fid-name">Last Name</label>
                                    <input type="text" id="last" onblur="lastname()" name="lname" value="" class="form-control">
                                    <span id="lerror"></span>
                                </div>
                                <div class="form-group">
                                    <label for="fid-name">Email Address:</label>
                                    <input type="email" id="email" onblur="eml()" name="email" value="" class="form-control">
                                    <span id="emlerror"></span>
                                </div>
                                <div class="form-group">
                                    <label for="fid-name">Phone#</label>
                                    <input type="tel" id="phne" onblur="phonn()" name="phone" value="" class="form-control">
                                    <span id="phnerror"></span>
                                </div>
                                <div class="form-group">
                                    <label for="fid-name">Country</label>
                                    <input type="text" id="country" onblur="cnt()" name="country" value="" class="form-control">
                                    <span id="cnterror"></span>
                                </div>
                                <div class="form-group">
                                    <label for="fid-name">State</label>
                                    <input type="text" id="state" onblur="stt()" name="state" value="" class="form-control">
                                    <span id="stterror"></span>
                                </div>
                                <div class="form-group">
                                    <label for="fid-name">City</label>
                                    <input type="text" id="city" onblur="ct()" name="city" value="" class="form-control">
                                    <span id="cterror"></span>
                                </div>
                                <div class="form-group">
                                    <label for="fid-name">Postal code</label>
                                    <input type="number" id="postal" onblur="pc()" name="pcode" value="" class="form-control">

                                    <span id="pcerror"></span>
                                </div>
                                <div class="form-group">
                                    <label for="fid-pass">Address-1</label>
                                    <input type="text" id="address" onblur="a1()" name="address1" value="" class="form-control">
                                    <span id="a1error"></span>
                                </div>
                                <div class="form-group">
                                    <label for="fid-pass">Address-2</label>
                                    <input type="text" id="address2" onblur="a2()" name="address2" value="" class="form-control">
                                    <span id="a2error"></span>
                                </div>
                                <div class="form-group">
                                    <label for="fid-pass">Password</label>
                                    <input type="password" id="pass" onblur="pswrd()" name="password" value="" class="form-control">
                                    <span id="pswrderror"></span>
                                </div>
                                <div class="form-group">
                                    <label for="fid-pass">Confirm Password</label>
                                    <input type="password" id="cpass" onblur="cp()" name="cpassword" value="" class="form-control">
                                    <span id="cperror"></span>
                                </div>
                                <div class="form-row wrap-btn">

                                    <input type="submit" Name="submit" id="logbtn" value="Submit" class="btn btn-primary">

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
    </section>

</div>
<!-- <script src="./js files/first.js"></script> -->
<?php
include("./include/footer.php")
?>
<script>
    $(document).ready(function() {
        $(document).on("submit", "#prodata", function(e) {
            e.preventDefault();
            var mydata = new FormData(prodata)
            $.ajax({
                url: "./ajax/user_add_ajax.php",
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
                            title: "User Email Already Exist"
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
                            title: "User has been inserted"
                        });
                        $("#prodata").trigger("reset")

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
                            title: "User has not been inserted"
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
                            title: "Password Does not match"
                        });

                    } else {

                        alert(val);
                    }
                }

            })
        })
    })
</script>