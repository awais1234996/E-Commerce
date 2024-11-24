<?php
include("./include/header.php");

?>


<!--Hero Section-->
<div class="hero-section hero-background">
    <h1 class="page-title">Organic Fruits</h1>
</div>

<!--Navigation section-->
<div class="container">
    <nav class="biolife-nav nav-86px">
        <ul>
            <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
            <li class="nav-item"><span class="current-page">Contact</span></li>
        </ul>
    </nav>
</div>

<div class="page-contain contact-us">

    <!-- Main content -->
    <div id="main-content" class="main-content">
        <div class="wrap-map biolife-wrap-map" id="map-block">
            <iframe width="1920" height="591" src="https://maps.google.com/maps?width=100%&amp;height=263&amp;hl=en&amp;q=1%20Grafton%20Street%2C%20Dublin%2C%20Ireland+(My%20Business%20Name)&amp;ie=UTF8&amp;t=p&amp;z=15&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
            </iframe>
        </div>

        <div class="container">

            <div class="row">

                <!--Contact info-->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="contact-info-container sm-margin-top-27px xs-margin-bottom-60px xs-margin-top-60px">
                        <h4 class="box-title">Our Contact</h4>
                        <p class="frst-desc">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                        <ul class="addr-info">
                            <li>
                                <div class="if-item">
                                    <b class="tie">Addess:</b>
                                    <p class="dsc">7563 St. Vicent Place, Glasgow, Greater<br>Newyork NH7689, UK</p>
                                </div>
                            </li>
                            <li>
                                <div class="if-item">
                                    <b class="tie">Phone:</b>
                                    <p class="dsc">(800) 123 456789</p>
                                </div>
                            </li>
                            <li>
                                <div class="if-item">
                                    <b class="tie">Email:</b>
                                    <p class="dsc">Organic@example.com</p>
                                </div>
                            </li>
                            <li>
                                <div class="if-item">
                                    <b class="tie">Store Open:</b>
                                    <p class="dsc">8am - 08pm, Mon - Sat</p>
                                </div>
                            </li>
                        </ul>
                        <div class="biolife-social inline">
                            <ul class="socials">
                                <li><a href="#" title="twitter" class="socail-btn"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="facebook" class="socail-btn"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="pinterest" class="socail-btn"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="youtube" class="socail-btn"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="instagram" class="socail-btn"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--Contact form-->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="contact-form-container sm-margin-top-112px">
                        <form action="#" id="cform" name="frm-contact">
                            <p class="form-row">
                                <input type="text" name="name " id="uname" value="" placeholder="Your Name" class="txt-input">
                            </p>
                            <p class="form-row">
                                <input type="email" name="email" id="uemail" value="" placeholder="Email Address" class="txt-input">
                            </p>
                            <p class="form-row">
                                <input type="tel" name="phone" value="" id="uphone" placeholder="Phone Number" class="txt-input">
                            </p>
                            <p class="form-row">
                                <textarea name="mes" cols="30" id="umsg" rows="9" placeholder="Leave Message"></textarea>
                            </p>
                            <p class="form-row">
                                <button class="btn btn-submit" type="submit" id="contact">send message</button>
                            </p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
include("./include/footer.php");

?>
<script>
    $(document).ready(function() {
        $(document).on("click", "#contact", function(e) {
            e.preventDefault();
            var quan = $(this).closest("#cform");
            var contactid = quan.find("#cid").val();
            var username = quan.find("#uname").val();
            var useremail = quan.find("#uemail").val();
            var userphone = quan.find("#uphone").val();
            var usermsg = quan.find("#umsg").val();

            $.ajax({
                url: "./ajax/contactajax.php",
                method: "POST",
                data: {
                    "cid": contactid,
                    "uname": username,
                    "uemail": useremail,
                    "uphone": userphone,
                    "umsg": usermsg
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
                            title: "<h3>Your message has delivered</h3>"
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
                            title: "<h3>Your message has not delivered</h3>"
                        });
                    } else {
                        alert(val);
                    }
                }
            })
        })
    })
</script>