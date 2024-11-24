<?php
include ("./include/header.php");
$sccategoryid = $_GET['subcategoryid'];
?>

<!--Hero Section-->
<div class="hero-section hero-background">
    <h1 class="page-title">Organic Fruits</h1>
</div>

<!--Navigation section-->
<div class="container">
    <nav class="biolife-nav">
        <!-- <ul>
            <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
            <li class="nav-item"><a href="#" class="permal-link">Natural Organic</a></li>
            <li class="nav-item"><span class="current-page">Fresh Fruit</span></li>
        </ul> -->
    </nav>
</div>

<div class="page-contain category-page left-sidebar">
    <div class="container">
        <div class="row">
            <!-- Main content -->
            <div id="main-content" class="main-content col-lg-9 col-md-8 col-sm-12 col-xs-12">

                <div class="block-item recently-products-cat md-margin-bottom-39">
                    <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile"
                        data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":0,"slidesToShow":5, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 3}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":30}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10}}]}'>
                        <?php
                        $csql = $obj->select("product", "*", "product.subcategoryid = $sccategoryid", "INNER JOIN category ON product.categoryid = category.categoryid INNER JOIN subcategory ON product.subcategoryid = subcategory.subcategoryid");

                        foreach ($csql as $cfet) {
                            ?>
                            <li class="product-item">
                                <div class="contain-product layout-02">
                                    <div class="product-thumb">
                                        <a href="#" class="link-to-product">
                                            <?php $p = unserialize($cfet['picture']);
                                            foreach ($p as $v) {
                                                ?>
                                                <img style="width: 180px; height: 100px;"
                                                    src="<?php echo "../admin/product_img/" . $v ?>" class="product-thumnail">
                                                <?php
                                            }
                                            ?>
                                        </a>
                                    </div>
                                    <div class="info">
                                        <b class="categories">
                                            <?php echo $cfet['subcategoryname'] ?>
                                        </b>
                                        <h4 class="product-title"><a href="#" class="pr-name">
                                                <?php echo $cfet['productname'] ?>
                                            </a></h4>
                                        <div class="price">
                                            <ins><span class="price-amount"><span class="currencySymbol">Rs.</span>
                                                    <?php echo $cfet['productunitprice'] ?>
                                                </span></ins>
                                            <del><span class="price-amount"><span
                                                        class="currencySymbol">£</span>95.00</span></del>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>

                <div class="product-category grid-style">

                    <div id="top-functions-area" class="top-functions-area">
                        <div class="flt-item to-left group-on-mobile">
                            <span class="flt-title">Refine</span>
                            <a href="#" class="icon-for-mobile">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                            <div class="wrap-selectors">
                                <form action="#" name="frm-refine" method="get">
                                    <span class="title-for-mobile">Refine Products By</span>
                                    <div data-title="Price:" class="selector-item">
                                        <select name="price" class="selector">
                                            <option value="all">Price</option>
                                            <option value="class-1st">Less than 5$</option>
                                            <option value="class-2nd">$5-10$</option>
                                            <option value="class-3rd">$10-20$</option>
                                            <option value="class-4th">$20-45$</option>
                                            <option value="class-5th">$45-100$</option>
                                            <option value="class-6th">$100-150$</option>
                                            <option value="class-7th">More than 150$</option>
                                        </select>
                                    </div>
                                    <div data-title="Brand:" class="selector-item">
                                        <select name="brad" class="selector">
                                            <option value="all">Top brands</option>
                                            <!-- <option value="br2">Brand first</option>
                                            <option value="br3">Brand second</option>
                                            <option value="br4">Brand third</option>
                                            <option value="br5">Brand fourth</option>
                                            <option value="br6">Brand fiveth</option> -->
                                        </select>
                                    </div>
                                    <div data-title="Avalability:" class="selector-item">
                                        <select name="ability" class="selector">
                                            <option value="all">Availability</option>
                                            <!-- <option value="vl2">Availability 1</option>
                                            <option value="vl3">Availability 2</option>
                                            <option value="vl4">Availability 3</option>
                                            <option value="vl5">Availability 4</option>
                                            <option value="vl6">Availability 5</option> -->
                                        </select>
                                    </div>
                                    <p class="btn-for-mobile"><button type="submit" class="btn-submit">Go</button></p>
                                </form>
                            </div>
                        </div>
                        <div class="flt-item to-right">
                            <span class="flt-title">Sort</span>
                            <div class="wrap-selectors">
                                <div class="selector-item orderby-selector">
                                    <select name="orderby" class="orderby" aria-label="Shop order">
                                        <option value="menu_order" selected="selected">Default sorting</option>
                                        <option value="popularity">popularity</option>
                                        <option value="rating">average rating</option>
                                        <option value="date">newness</option>
                                        <option value="price">price: low to high</option>
                                        <option value="price-desc">price: high to low</option>
                                    </select>
                                </div>
                                <div class="selector-item viewmode-selector">
                                    <a href="category-grid-left-sidebar.html" class="viewmode grid-mode active"><i
                                            class="biolife-icon icon-grid"></i></a>
                                    <a href="category-list-left-sidebar.html" class="viewmode detail-mode"><i
                                            class="biolife-icon icon-list"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <ul class="products-list">
                            <?php
                            $csql = $obj->select("product", "*", "product.subcategoryid = $sccategoryid", "INNER JOIN category ON product.categoryid = category.categoryid INNER JOIN subcategory ON product.subcategoryid = subcategory.subcategoryid");

                            foreach ($csql as $cfet) {
                                ?>
                                <li class="product-item col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                    <div class="contain-product layout-default">
                                        <div class="product-thumb">
                                            <a href="./subcategory.php?categoryid=<?php echo $cfet['categoryid'] ?>"
                                                class="link-to-product">
                                                <?php $p = unserialize($cfet['picture']);
                                                foreach ($p as $v) {
                                                    ?>
                                                    <img style="width: 270px; height: 270px;"
                                                        src="<?php echo "../admin/product_img/" . $v ?>" alt="Product Images"
                                                        class="product-thumnail">
                                                    <?php
                                                }
                                                ?>
                                            </a>
                                        </div>
                                        <div class="info">
                                            <b class="categories">
                                                <?php echo $cfet['subcategoryname'] ?>
                                            </b>
                                            <h4 class="product-title"><a href="#" class="pr-name">
                                                    <?php echo $cfet['productname'] ?>
                                                </a>
                                            </h4>
                                            <div class="price">
                                                <ins><span class="price-amount"><span class="currencySymbol">Rs.</span>
                                                        <?php echo $cfet["productunitprice"] ?>
                                                    </span></ins>
                                                <del><span class="price-amount"><span
                                                            class="currencySymbol">£</span>95.00</span></del>
                                            </div>
                                            <div class="shipping-info">
                                                <p class="shipping-day">3-Day Shipping</p>
                                                <p class="for-today">Free Pickup Today</p>
                                            </div>
                                            <div class="slide-down-box">
                                                <p class="message">
                                                    <?php echo $cfet['shortdescription'] ?>
                                                </p>
                                                <form id="addtocartform">
                                                    <div class="buttons">
                                                        <input type="hidden" class="pname" name="productname"
                                                            value="<?php echo $cfet['productname'] ?>">
                                                        <input type="hidden" class="pcode" name="productcode"
                                                            value="<?php echo $cfet['productcode'] ?>">
                                                        <input type="hidden" class="pprice" name="productprice"
                                                            value="<?php echo $cfet["productunitprice"] ?>">

                                                        <input type="hidden" class="ppicture" name="picture"
                                                            value="<?php echo $p[0] ?>">

                                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart"
                                                                aria-hidden="true"></i></a>
                                                        <a id="addtocart" class="btn add-to-cart-btn"><i
                                                                class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to
                                                            cart</a>
                                                        <a href="#" class="btn compare-btn"><i class="fa fa-random"
                                                                aria-hidden="true"></i></a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>

                    <div class="biolife-panigations-block">
                        <ul class="panigation-contain">
                            <li><span class="current-page">1</span></li>
                            <li><a href="#" class="link-page">2</a></li>
                            <li><a href="#" class="link-page">3</a></li>
                            <li><span class="sep">....</span></li>
                            <li><a href="#" class="link-page">20</a></li>
                            <li><a href="#" class="link-page next"><i class="fa fa-angle-right"
                                        aria-hidden="true"></i></a></li>
                        </ul>
                    </div>

                </div>

            </div>
            <!-- Sidebar -->
            <aside id="sidebar" class="sidebar col-lg-3 col-md-4 col-sm-12 col-xs-12">
                <div class="biolife-mobile-panels">
                    <span class="biolife-current-panel-title">Sidebar</span>
                    <a class="biolife-close-btn" href="#" data-object="open-mobile-filter">&times;</a>
                </div>
                <div class="sidebar-contain">
                    <div class="widget biolife-filter">
                        <h4 class="wgt-title">Categories</h4>
                        <div class="wgt-content">
                            <ul class="cat-list">
                                <?php
                                $sql = $obj->select("category", "*", null, null);
                                foreach ($sql as $cfet) {
                                    ?>
                                    <li class="cat-list-item"><a
                                            href="./category.php?categoryid=<?php echo $cfet['categoryid'] ?>"
                                            class="cat-link">
                                            <?php echo $cfet['categoryname'] ?>
                                        </a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                    <div class="widget biolife-filter">
                        <h4 class="wgt-title">Sub Categories</h4>
                        <div class="wgt-content">
                            <ul class="cat-list">
                                <?php
                                $sql = $obj->select("subcategory", "*", "subcategoryid = $sccategoryid", null);
                                foreach ($sql as $scfet) {
                                    ?>
                                    <li class="cat-list-item"><a
                                            href="./subcategory.php?subcategoryid=<?php echo $scfet['subcategoryid'] ?>"
                                            class="cat-link">
                                            <?php echo $scfet['subcategoryname'] ?>
                                        </a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                    <div class="widget biolife-filter">
                        <h4 class="wgt-title">Recently Viewed</h4>
                        <div class="wgt-content">
                            <ul class="products">
                                <?php
                                $rsql =$obj->select("product", "*", null, "INNER JOIN category  ON product.categoryid=category.categoryid  INNER JOIN subcategory  ON product.subcategoryid=subcategory.subcategoryid", "productid", "ASC LIMIT 3");
                                foreach($rsql as $rfet) {
                                ?>
                                    <li class="pr-item">
                                        <div class="contain-product style-widget">
                                            <div class="product-thumb">
                                                <?php
                                                $p = unserialize($rfet['picture']);
                                                foreach ($p as $val) {
                                                ?>
                                                    <a href="#" class="link-to-product">
                                                        <img style="height: 80px; width:100px" src="<?php echo "../admin/product_img/" . $val ?>" />
                                                    </a>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="info">
                                                <b class="categories"><?php echo $rfet['subcategoryname'] ?></b>
                                                <h4 class="product-title"><a href="#" class="pr-name" tabindex="0"><?php echo $rfet['categoryname'] ?></a></h4>
                                                <div class="price">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                    <div class="widget biolife-filter">
                        <h4 class="wgt-title">Product Tags</h4>
                        <div class="wgt-content">
                            <ul class="tag-cloud">
                                <li class="tag-item"><a href="#" class="tag-link">Fresh Fruit</a></li>
                                <li class="tag-item"><a href="#" class="tag-link">Natural Food</a></li>
                                <li class="tag-item"><a href="#" class="tag-link">Hot</a></li>
                                <li class="tag-item"><a href="#" class="tag-link">Organics</a></li>
                                <li class="tag-item"><a href="#" class="tag-link">Dried Organic</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </aside>
        </div>
    </div>
</div>

<?php
include("./include/footer.php");

?>
<script>
    $(document).ready(function() {
        $(document).on("click", "#addbtn", function(e) {
            e.preventDefault()
            var form = $(this).closest("#logdata")
            var ctname = form.find("#pname").val()
            var ctcode = form.find("#pcode").val()
            var ctprice = form.find("#pprice").val()
            var ctpic = form.find("#ppic").val()
            $.ajax({
                url: "./ajax/cartajax.php",
                method: "POST",
                data: {
                    "productname": ctname,
                    "productcode": ctcode,
                    "picture": ctpic,
                    "productunitprice": ctprice

                },
                success: function(val) {
                    if (val == 1) {
                        Swal.fire({
                            title: "<h4>You have to login<br> 'OR'<br> Create an account</h4>",
                            showDenyButton: true,
                            showCancelButton: true,
                            confirmButtonText: "Login",
                            denyButtonText: "<h5>Create an account</h5>"
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {

                                location = "./login.php";

                            } else if (result.isDenied) {
                                location = "./signup.php";
                            }
                        });
                        // setTimeout(function() {
                        //     window.location.href = "./login.php";
                        // }, 500)
                    } else if (val == 2) {
                        const Toast = Swal.mixin({
                            toast: false,
                            position: "center",
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "warning",
                            title: "<h3>Item Already Exist</h3>"
                        });
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
                            icon: "success",
                            title: "<h3>Item inserted</h3>"
                        });
                        load_cart_items();
                        load_cart_items_price();
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
                            title: "<h3>Item not inserted</h3>"
                        });
                    } else {
                        alert(val);
                    }
                }

            })
        })
    })
</script>