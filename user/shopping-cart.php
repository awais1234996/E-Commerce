<?php
include("./include/header.php");
$email = $_SESSION['email'];

?>

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

<div class="page-contain shopping-cart">

    <!-- Main content -->
    <div id="main-content" class="main-content">
        <div class="container">

            <!--Top banner-->
            <div class="top-banner background-top-banner-for-shopping min-height-346px">
                <h3 class="title">Save $50!*</h3>
                <p class="subtitle">Save $50 when you open an account online & spen $50 on your first online purchase to day</p>
                <ul class="list">
                    <li>
                        <div class="price-less">
                            <span class="desc">Purchase amount</span>
                            <span class="cost">$0.00</span>
                        </div>
                    </li>
                    <li>
                        <div class="price-less">
                            <span class="desc">Credit on billing statement</span>
                            <span class="cost">$0.00</span>
                        </div>
                    </li>
                    <li>
                        <div class="price-less sum">
                            <span class="desc">Cost affter statemen credit</span>
                            <span class="cost">$0.00</span>
                        </div>
                    </li>
                </ul>
                <p class="btns">
                    <a href="#" class="btn">Open Account</a>
                    <a href="#" class="btn">Learn more</a>
                </p>
            </div>

            <!--Cart Table-->
            <div class="shopping-cart-container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <h3 class="box-title">Your cart items</h3>
                        <form class="shopping-cart-form">
                            <table class="shop_table cart-form">
                                <thead>
                                    <tr>
                                        <th class="product-name">Product Picture</th>
                                        <th class="product-name">Product Name</th>
                                        <th class="product-name">Product Code</th>
                                        <th class="product-name">Product Price</th>
                                        <th class="product-name">Product Quantity</th>
                                        <th class="product-price">Product Total Price</th>
                                        <th class="product-price">Delete</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ksql = $obj->select("shopcart","*","cartemail='$email'");
                                    $carttotal = 0;
                                   foreach($ksql as $kdfet) {
                                    ?>
                                        <tr class="cart_item">
                                            <td>

                                                <img width="150px" height="150px" src="<?php echo "../admin/product_img/" . $kdfet['cartpic'] ?>" />
                                            <td>
                                                <?php echo $kdfet['cartname']  ?>
                                            </td>
                                            <td>
                                                <?php echo $kdfet['cartcode']  ?>
                                            </td>
                                            <td>
                                                <?php echo $kdfet['cartprice']  ?>
                                            </td>

                                            <td class="product-quantity" data-title="Quantity">
                                                <div class="quantity-box type1">
                                                    <div class="qty-input" id="qty">
                                                        <input type="hidden" name="cartid" value="<?php echo $kdfet['cartid']; ?>" id="cartid">
                                                        <input type="hidden" name="cartprice" value="<?php echo $kdfet['cartprice']; ?>" id="cartprice">
                                                        <input type="number" id="cartqnt" name="cartqty" value="<?php echo $kdfet['cartqty']  ?>" data-max_value="20" data-min_value="1" data-step="1">
                                                        <a href="#" class="qty-btn btn-up"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                                                        <a href="#" class="qty-btn btn-down"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <?php echo $kdfet['carttotalprice']  ?>
                                            </td>
                                            <td> <button class="btn btn-danger dlt" data-del="<?php echo $kdfet['cartid'] ?>">Delete</button> </td>
                                        </tr>
                                    <?php
                                        $carttotal = $carttotal + $kdfet['carttotalprice'];
                                    }
                                    ?>
                                    <tr class="cart_item wrap-buttons">
                                        <td class="wrap-btn-control" colspan="4">
                                            <a class="btn back-to-shop" href="./product.php">Back to Shop</a>
                                            <button class="btn btn-update" type="submit">update</button>
                                            <button class="btn btn-danger all" data-clear="<?php echo $kdfet['cartid'] ?>">Delete All</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="shpcart-subtotal-block">
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
                                <p class="desc">Based on 56789</p>
                            </div>
                            <div class="btn-checkout">
                                <a href="./checkout.php" class="btn checkout">Check out</a>
                            </div>
                            <div class="biolife-progress-bar">
                                <table>
                                    <tr>
                                        <td class="first-position">
                                            <span class="index">$0</span>
                                        </td>
                                        <td class="mid-position">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td class="last-position">
                                            <span class="index">$99</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <p class="pickup-info"><b>Free Pickup</b> is available as soon as today More about shipping and pickup</p>
                        </div>
                    </div>
                </div>
            </div>

            <!--Related Product-->
            <div class="product-related-box single-layout">
                <div class="biolife-title-box lg-margin-bottom-26px-im">
                    <span class="biolife-icon icon-organic"></span>
                    <span class="subtitle">All the best item for You</span>
                    <h3 class="main-title">Related Products</h3>
                </div>
                <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":0,"slidesToShow":5, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":20}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10}}]}'>
                    <li class="product-item">
                        <div class="contain-product layout-default">
                            <div class="product-thumb">
                                <a href="#" class="link-to-product">
                                    <img src="assets/images/products/p-13.jpg" alt="dd" width="270" height="270" class="product-thumnail">
                                </a>
                            </div>
                            <div class="info">
                                <b class="categories">Fresh Fruit</b>
                                <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                <div class="price ">
                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                </div>
                                <div class="slide-down-box">
                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                    <div class="buttons">
                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                        <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="product-item">
                        <div class="contain-product layout-default">
                            <div class="product-thumb">
                                <a href="#" class="link-to-product">
                                    <img src="assets/images/products/p-14.jpg" alt="dd" width="270" height="270" class="product-thumnail">
                                </a>
                            </div>
                            <div class="info">
                                <b class="categories">Fresh Fruit</b>
                                <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                <div class="price">
                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                </div>
                                <div class="slide-down-box">
                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                    <div class="buttons">
                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                        <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="product-item">
                        <div class="contain-product layout-default">
                            <div class="product-thumb">
                                <a href="#" class="link-to-product">
                                    <img src="assets/images/products/p-15.jpg" alt="dd" width="270" height="270" class="product-thumnail">
                                </a>
                            </div>
                            <div class="info">
                                <b class="categories">Fresh Fruit</b>
                                <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                <div class="price">
                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                </div>
                                <div class="slide-down-box">
                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                    <div class="buttons">
                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                        <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="product-item">
                        <div class="contain-product layout-default">
                            <div class="product-thumb">
                                <a href="#" class="link-to-product">
                                    <img src="assets/images/products/p-10.jpg" alt="dd" width="270" height="270" class="product-thumnail">
                                </a>
                            </div>
                            <div class="info">
                                <b class="categories">Fresh Fruit</b>
                                <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                <div class="price">
                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                </div>
                                <div class="slide-down-box">
                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                    <div class="buttons">
                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                        <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="product-item">
                        <div class="contain-product layout-default">
                            <div class="product-thumb">
                                <a href="#" class="link-to-product">
                                    <img src="assets/images/products/p-08.jpg" alt="dd" width="270" height="270" class="product-thumnail">
                                </a>
                            </div>
                            <div class="info">
                                <b class="categories">Fresh Fruit</b>
                                <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                <div class="price">
                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                </div>
                                <div class="slide-down-box">
                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                    <div class="buttons">
                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                        <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="product-item">
                        <div class="contain-product layout-default">
                            <div class="product-thumb">
                                <a href="#" class="link-to-product">
                                    <img src="assets/images/products/p-21.jpg" alt="dd" width="270" height="270" class="product-thumnail">
                                </a>
                            </div>
                            <div class="info">
                                <b class="categories">Fresh Fruit</b>
                                <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                <div class="price">
                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                </div>
                                <div class="slide-down-box">
                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                    <div class="buttons">
                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                        <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="product-item">
                        <div class="contain-product layout-default">
                            <div class="product-thumb">
                                <a href="#" class="link-to-product">
                                    <img src="assets/images/products/p-18.jpg" alt="dd" width="270" height="270" class="product-thumnail">
                                </a>
                            </div>
                            <div class="info">
                                <b class="categories">Fresh Fruit</b>
                                <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                <div class="price">
                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                </div>
                                <div class="slide-down-box">
                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                    <div class="buttons">
                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                        <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>
<?php
include("./include/footer.php");

?>

<script>
    $(document).on("click", ".dlt", function(e) {
        e.preventDefault()
        var del = $(this).data("del")
        var msg = this
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "./ajax/delete_single_ajax.php",
                    method: "GET",
                    data: {
                        "mydel": del
                    },

                    success: function(delt) {
                        if (delt == 1) {
                            swalWithBootstrapButtons.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success"
                            })
                            $(msg).closest("tr").fadeOut()
                            load_cart_items();
                            load_cart_items_price();
                        }

                    }
                })

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire({
                    title: "Cancelled",
                    text: "Your imaginary file is safe :)",
                    icon: "error"
                });
            }
        });

    })
    $(document).ready(function() {
        $(document).on("click", ".all", function(e) {
            e.preventDefault()
            var del = $(this).data("clear")
            var msg = this
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "./ajax/delete_all_ajax.php",
                        method: "GET",
                        data: {
                            "mydel": del
                        },

                        success: function(delt) {
                            if (delt == 1) {
                                swalWithBootstrapButtons.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                })
                                location = "./shopping-cart.php"
                                load_cart_items();
                                load_cart_items_price();
                            }

                        }
                    })

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelled",
                        text: "Your imaginary file is safe :)",
                        icon: "error"
                    });
                }
            });

        })
    })

    $(document).ready(function() {
        $(document).on("change", "#cartqnt", function(e) {
            e.preventDefault();
            var quan = $(this).closest("tr");
            var cartid = quan.find("#cartid").val();
            var cartprice = quan.find("#cartprice").val();
            var cartqty = quan.find("#cartqnt").val();

            $.ajax({
                url: "./ajax/cartajax.php",
                method: "POST",
                data: {
                    "myid": cartid,
                    "myprice": cartprice,
                    "myqty": cartqty
                },
                // processData: false,
                // contentType: false,
                success: function(val) {
                    if (val == 5) {
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
                            title: "<h3>Quantity has been changed</h3>"
                        });
                    } else if (val == 6) {
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
                            title: "<h3>Quantity has not been changed</h3>"
                        });
                    } else {
                        alert(val);
                    }
                }
            })
        })
    })
</script>