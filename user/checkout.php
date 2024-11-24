<?php
include("./include/header.php");

$email = $_SESSION['email'];
?>
<style>
    .cbtn {
        width: 450px;
        font-size: 25px;
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
            <li class="nav-item"><span class="current-page">ShoppingCart</span></li>
        </ul>
    </nav>
</div>

<div class="page-contain checkout">

    <!-- Main content -->
    <div id="main-content" class="main-content">
        <div class="container sm-margin-top-37px">
            <div class="row">

                <!--checkout progress box-->
                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                    <div class="checkout-progress-wrap">
                        <ul class="steps">
                            <li class="step 1st">
                                <div class="checkout-act active">
                                    <h3 class="title-box"><span class="number">1</span>Customer</h3>
                                    <div class="box-content">
                                        <p class="txt-desc">Checking out as a <a class="pmlink" href="#">Guest?</a> You’ll be able to save your details to create an account with us later.</p>
                                        <?php
                                        $sql = $obj->select("user", "*", "email='$email'");
                                        foreach ($sql as $checkfet) {
                                        ?>

                                            <div class="login-on-checkout">
                                                <form id="checkdata" onsubmit="return smt()">
                                                    <p class="form-row">
                                                        <label for="fid-name">First Name<span class="requite">*</span></label>
                                                        <input type="text" id="fn" onblur="firstname()" name="fname" value="<?php echo $checkfet['fname'] ?>" class="txt-input">
                                                        <span id="ferror"></span>
                                                    </p>
                                                    <span id="fnameerror"></span>
                                                    <p class="form-row">
                                                        <label for="fid-name">Last Name<span class="requite">*</span></label>
                                                        <input type="text" id="last" onblur="lastname()" name="lname" value="<?php echo $checkfet['lname'] ?>" class="txt-input">
                                                        <span id="lerror"></span>
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="fid-name">Email Address:<span class="requite">*</span></label>
                                                        <input type="email" readonly id="email" onblur="eml()" name="email" value="<?php echo $checkfet['email'] ?>" class="txt-input">
                                                        <span id="emlerror"></span>
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="fid-name">Phone#<span class="requite">*</span></label>
                                                        <input type="tel" id="phne" onblur="phonn()" name="phone" value="<?php echo $checkfet['phone'] ?>" class="txt-input">
                                                        <span id="phnerror"></span>
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="fid-name">Country<span class="requite">*</span></label>
                                                        <input type="text" id="country" onblur="cnt()" name="country" value="<?php echo $checkfet['country'] ?>" class="txt-input">
                                                        <span id="cnterror"></span>
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="fid-name">State<span class="requite">*</span></label>
                                                        <input type="text" id="state" onblur="stt()" name="state" value="<?php echo $checkfet['state'] ?>" class="txt-input">
                                                        <span id="stterror"></span>
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="fid-name">City<span class="requite">*</span></label>
                                                        <input type="text" id="city" onblur="ct()" name="city" value="<?php echo $checkfet['city'] ?>" class="txt-input">
                                                        <span id="cterror"></span>
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="fid-name">Postal code<span class="requite">*</span></label>
                                                        <input type="number" id="postal" onblur="pc()" name="pcode" value="<?php echo $checkfet['pcode'] ?>" class="txt-input">

                                                        <span id="pcerror"></span>
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="fid-pass">Address-1<span class="requite">*</span></label>
                                                        <input type="text" id="address" onblur="a1()" name="address1" value="<?php echo $checkfet['address1'] ?>" class="txt-input">
                                                        <span id="a1error"></span>
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="fid-pass">Address-2<span class="requite">*</span></label>
                                                        <input type="text" id="address2" onblur="a2()" name="address2" value="<?php echo $checkfet['address2'] ?>" class="txt-input">
                                                        <span id="a2error"></span>
                                                    </p>



                                            </div>
                                    </div>
                                </div>
                            </li>
                            <li class="step 2nd">
                                <div class="checkout-act">
                                    <h3 class="title-box"><span class="number">2</span>Shipping</h3>
                                </div>
                            </li>
                            <li class="step 3rd">
                                <div class="checkout-act">
                                    <h3 class="title-box"><span class="number">3</span>Billing</h3>
                                </div>
                            </li>
                            <li class="step 4th">
                                <div class="checkout-act">
                                    <h3 class="title-box"><span class="number">4</span>Payment</h3>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!--Order Summary-->
                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 sm-padding-top-48px sm-margin-bottom-0 xs-margin-bottom-15px">
                    <div class="order-summary sm-margin-bottom-80px">
                        <div class="title-block">
                            <h3 class="title">Order Summary</h3>
                            <a href="#" class="link-forward">Edit cart</a>
                        </div>
                        <?php
                                            $tsql = $obj->select("shopcart", "*", "cartemail='$email'");
                                            $carttotal = 0;
                                            foreach ($tsql as $checkfet) {
                        ?>

                            <table class="shop_table cart-form">
                                <tr>

                                    <th><b>Product Name</b></th>
                                    <th><b>Price</b></th>
                                    <th><b>QTY</b></th>
                                    <th><b>Total price</b></th>

                                </tr>
                                <tr>
                                    <td><?php echo $checkfet['cartname'] ?></td>
                                    <td><?php echo $checkfet['cartprice'] ?></td>
                                    <td><?php echo $checkfet['cartqty'] ?></td>
                                    <td><?php echo $checkfet['carttotalprice'] ?></td>
                                </tr>

                            </table>

                        <?php
                                                $carttotal = $carttotal + $checkfet['carttotalprice'];
                                            }
                        ?>
                        <div class="col-lg-12">
                            <div class="">
                                <div class="subtotal-line">
                                    <b class="stt-name">Subtotal <span class="sub">(2-items)</span></b>
                                    <span class="stt-price"><?php echo $carttotal ?></span>
                                </div>
                                <div class="subtotal-line">
                                    <b class="stt-name">Shipping</b>
                                    <span class="stt-price">£0.00</span>
                                </div>
                                <div class="tax-fee">
                                    <p class="title">Est. Taxes & Fees</p>

                                </div>


                                <p class="pickup-info"><b>Free Pickup</b> is available as soon as today More about shipping and pickup</p>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-submit btn-success cbtn">Place Order</button>
                    <br><br>
                    <a href="./product.php" type="button" class="btn cbtn btn-primary ">
                        Add to cart
                    </a><br><br>
                    <a href="./shopping-cart.php" type="button" class="btn cbtn btn-warning">
                        Shopping
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
</form>
<?php

                                        }
?>
<?php
include("./include/footer.php");

?>
<script>
    $(document).ready(function() {
        $(document).on("submit", "#checkdata", function(e) {
            e.preventDefault();
            console.log("sub");
            var cdata = new FormData(this);
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Place it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "./ajax/checkout_orderajax.php",
                        method: "POST",
                        data: cdata,
                        contentType: false,
                        processData: false,
                        success: function(val) {
                            alert(val)
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
                                    icon: "error",
                                    title: "<h4>Please fill all required fields</h4>"
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
                                    icon: "success",
                                    title: "<h4>Your Order Placed successfully</h4>"
                                });
                                setTimeout(function() {
                                    window.location = "./product.php";
                                }, 1000)
                            } else if (val == 3) {
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
                                    title: "<h4>Order Placing failed</h4>"
                                });
                            } else if (val == 4) {
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
                                    title: "<h4>Your cart is empty</h4>"
                                });
                            } else if (val == 5) {
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
                                    title: "<h4>Disconnected internet</h4>"
                                });
                            } else {
                                alert(val);
                            }
                        }
                    });
                }
            });
        });
    });
</script>