<?php
include("./include/header.php");

?>
<style>
    #ferror,
    #lerror,
    #phnerror,
    #emlerror,
    #stterror,
    #cnterror,
    #cterror,
    #a1error,
    #a2error,
    #pcerror,
    #pswrderror,
    #cperror {
        color: red;
    }
</style>
<!--Hero Section-->
<div class="hero-section hero-background">
    <h1 class="page-title">Organic Fruits</h1>
</div>

<!--Navigation section-->
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
            <li class="nav-item"><span class="current-page">Authentication</span></li>
        </ul>
    </nav>
</div>

<div class="page-contain login-page">

    <!-- Main content -->
    <div id="main-content" class="main-content">
        <div class="container">

            <div class="row">

                <!--Form Sign In-->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="signin-container">
                        <form id="logindata" onsubmit="return smt()">
                            <p class="form-row">
                                <label for="fid-name">First Name<span class="requite">*</span></label>
                                <input type="text" id="fn" onblur="firstname()" name="fname" value="" class="txt-input">
                                <span id="ferror"></span>
                            </p>
                            <span id="fnameerror"></span>
                            <p class="form-row">
                                <label for="fid-name">Last Name<span class="requite">*</span></label>
                                <input type="text" id="last" onblur="lastname()" name="lname" value="" class="txt-input">
                                <span id="lerror"></span>
                            </p>
                            <p class="form-row">
                                <label for="fid-name">Email Address:<span class="requite">*</span></label>
                                <input type="email" id="email" onblur="eml()" name="email" value="" class="txt-input">
                                <span id="emlerror"></span>
                            </p>
                            <p class="form-row">
                                <label for="fid-name">Phone#<span class="requite">*</span></label>
                                <input type="tel" id="phne" onblur="phonn()" name="phone" value="" class="txt-input">
                                <span id="phnerror"></span>
                            </p>
                            <p class="form-row">
                                <label for="fid-name">Country<span class="requite">*</span></label>
                                <input type="text" id="country" onblur="cnt()" name="country" value="" class="txt-input">
                                <span id="cnterror"></span>
                            </p>
                            <p class="form-row">
                                <label for="fid-name">State<span class="requite">*</span></label>
                                <input type="text" id="state" onblur="stt()" name="state" value="" class="txt-input">
                                <span id="stterror"></span>
                            </p>
                            <p class="form-row">
                                <label for="fid-name">City<span class="requite">*</span></label>
                                <input type="text" id="city" onblur="ct()" name="city" value="" class="txt-input">
                                <span id="cterror"></span>
                            </p>
                            <p class="form-row">
                                <label for="fid-name">Postal code<span class="requite">*</span></label>
                                <input type="number" id="postal" onblur="pc()" name="pcode" value="" class="txt-input">

                                <span id="pcerror"></span>
                            </p>
                            <p class="form-row">
                                <label for="fid-pass">Address-1<span class="requite">*</span></label>
                                <input type="text" id="address" onblur="a1()" name="address1" value="" class="txt-input">
                                <span id="a1error"></span>
                            </p>
                            <p class="form-row">
                                <label for="fid-pass">Address-2<span class="requite">*</span></label>
                                <input type="text" id="address2" onblur="a2()" name="address2" value="" class="txt-input">
                                <span id="a2error"></span>
                            </p>
                            <p class="form-row">
                                <label for="fid-pass">Password<span class="requite">*</span></label>
                                <input type="password" id="pass" onblur="pswrd()" name="password" value="" class="txt-input">
                                <span id="pswrderror"></span>
                            </p>
                            <p class="form-row">
                                <label for="fid-pass">Confirm Password<span class="requite">*</span></label>
                                <input type="password" id="cpass" onblur="cp()" name="cpassword" value="" class="txt-input">
                                <span id="cperror"></span>
                            </p>
                            <p class="form-row wrap-btn">
                                <button class="btn btn-submit btn-bold" id="logbtn" name="submit" value="submit" type="submit">Submit</button>

                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("./include/footer.php")
?>
<script src="./JS Files/signupvalidation.js"></script>
 <script>
    $(document).ready(function() {
        $(document).on("submit", "#logindata", function(e) {
            e.preventDefault();
            var mydata = new FormData(logindata)
            $.ajax({
                url: "./ajax/signupajax.php",
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
                            title: "<h4>Please Fill All Required Fields</h4>"
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
                            title: "<h4>User E-mail Already Exist</h4>"
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
                            title: "<h4>Registered successfully</h4>"
                        });
                        setTimeout(function(){
                            window.location.href="./login.php";
                        },500)
                        $("#logindata").trigger("reset")
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
                            title: "<h4>Registered Failed</h4>"
                        });
                        $("#logindata").trigger("reset")
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
                            title: "<h4>Passwrod Does not macth</h4>"
                        });
                    } else {

                        alert(val);
                    }
                }

            })
        })
    })
</script> 

</body>

</html>