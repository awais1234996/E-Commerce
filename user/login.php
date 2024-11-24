<?php
include("./include/header.php");

?>
<style>
    #emailerror,
    #passworderror {
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
                        <form id="log" name="frm-login" onsubmit="return smt()">
                            <p class="form-row">
                                <label for="fid-name">Email Address:<span class="requite">*</span></label>
                                <input type="email" id="email" name="email" class="txt-input" onblur="femail()">
                                <span id="emailerror"></span>
                            </p>
                            <p class="form-row">
                                <label for="fid-pass">Password:<span class="requite">*</span></label>
                                <input type="text" id="password" name="password" value="" class="txt-input" onblur="pswrd()">
                                <span id="passworderror"></span>
                            </p>
                            <p class="form-row wrap-btn">
                                <button class="btn btn-submit btn-bold" id="logbtn" type="submit"><a style="color: white;" href="#">sign in</a></button>
                                <button class="btn btn-submit btn-bold" type="submit"><a style="color: white;" href="./signup.php">sign up</a></button>
                                <a href="#" class="link-to-help">Forgot your password</a>
                            </p>
                        </form>
                    </div>
                </div>

                <!--Go to Register form-->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="register-in-container">
                        <div class="intro">
                            <h4 class="box-title">New Customer?</h4>
                            <p class="sub-title">Create an account with us and you’ll be able to:</p>
                            <ul class="lis">
                                <li>Check out faster</li>
                                <li>Save multiple shipping anddesses</li>
                                <li>Access your order history</li>
                                <li>Track new orders</li>
                                <li>Save items to your Wishlist</li>
                            </ul>
                            <a href="./signup.php" class="btn btn-bold">Create an account</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

<?php
include("./include/footer.php");
?>
<script src="./JS Files/loginvalidation.js"></script>
<script>
    $(document).ready(function() {
        $(document).on("click", "#logbtn", function(e) {
            e.preventDefault();
            var form=$(this).closest("#log")
            var logemail=form.find("#email").val()
            var logpass=form.find("#password").val()
            // console.log (logemail)
            // console.log (logpass)

            $.ajax({
                url: "./ajax/loginajax.php",
                method: "POST",
                data:{
                    "email":logemail,
                    "password":logpass
                },
                
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
                            icon: "success",
                            title: "<h4>Login successfully</h4>"
                        });
                        setTimeout(function() {
                            window.location.href = "./index.php";
                        }, 500)
                        $("#logindata").trigger("reset")
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
                            icon: "warning",
                            title: "<h4>Login Failed</h4>"
                        });

                    } else {

                        alert(val);
                    }
                }

            })
        })
    })
</script>