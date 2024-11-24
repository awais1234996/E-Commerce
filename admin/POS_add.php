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
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Product Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>Unit Price</th>
                                            <th>Quantity</th>
                                            <th>Add</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = $obj->select("product","*");
                                        
                                       foreach ($sql as $fet) {
                                        ?>
                                            <tr>
                                                <td><?php echo $fet['productcode'] ?></td>
                                                <td><?php echo $fet['productname'] ?></td>
                                                <td><?php echo $fet['productunitprice'] ?></td>
                                                <form id="posform">
                                                    <td><input type="number" id="pqty" class="form-control" Name="quantity" max="20" min="1" value="1"></td>
                                                    <td>
                                                        <input type="hidden" id="pname" name="productname" value="<?php echo $fet['productname'] ?>">
                                                        <input type="hidden" id="pcode" name="productcode" value="<?php echo $fet['productcode'] ?>">
                                                        <input type="hidden" id="pprice" name="productunitprice" value="<?php echo $fet['productunitprice'] ?>">
                                                        <a id="addbtn" class="btn btn-primary text-white">ADD</a>
                                                    </td>

                                                </form>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-md-6 col-lg-6">
                    <div class="card">
                        <form id="invoicedata">
                            <div class="card-header">
                                <h4>Invoice</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Invoice No.</label>
                                    <input type="number" id="posinvoice" class="form-control uinvoice" name="userinvoice" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control uname" name="username">
                                    <span id="nerror"></span>
                                </div>
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="number" class="form-control ucontact" name="usercontact">
                                    <span id="cerror"></span>
                                </div>
                                <div class="form-group">
                                    <label>Total Cash</label>
                                    <input type="number" class="form-control ucash" id="tcash" name="usertcash">
                                </div>
                                <label class="col-6 col-form-label fw-bold">Status</label>
                                <div class="col-12 ">
                                    <select class="form-control ustatus" name="userstatus">
                                        <option value="">--SELECT Status--</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Pending">Pending</option>
                                    </select>
                                    <span id="statuserror"></span>
                                </div>
                                <div class="form-group">
                                    <div class="card-footer text-right">
                                        <input type="submit" Name="submit" value="Submit" class="btn btn-primary " id="userbtn">
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>View</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">

                                    <thead>
                                        <tr>
                                            <th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>Unit Price</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="viewtable">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php
include("./include/footer.php")
?>
<script>
    function viewdata() {
        $.ajax({
            url: "./ajax/POSview_ajax.php",
            method: "GET",
            data: {
                dv: "view"
            },
            success: function(res) {
                $("#viewtable").html(res);
                var total=$("#gtotal").html();
                $("#tcash").val(total);
            }
        })
    }
    viewdata();
    $(document).ready(function() {

        $(document).on("click", "#addbtn", function(e) {
            e.preventDefault()
            var adm = $(this).closest("tr");
            var pname = adm.find("#pname").val()
            var pcode = adm.find("#pcode").val()
            var pprice = adm.find("#pprice").val()
            var pqty = adm.find("#pqty").val()
            $.ajax({
                url: "./ajax/POS_add_ajax.php",
                method: "POST",
                data: {
                    "pname": pname,
                    "pcode": pcode,
                    "pprice": pprice,
                    "pqty": pqty
                },
                success: function(val) {
                    // alert(val)
                    if (val == 1) {
                        Swal.fire({
                            title: "<h4>You have to login<br> 'OR'<br> Create an account</h4>",
                            showDenyButton: true,
                            showCancelButton: true,
                            confirmButtonText: "Login",
                            denyButtonText: "<h5>Create an account</h5>"
                        }).then((result) => {

                            if (result.isConfirmed) {

                                location = "./auth-login.php";

                            } else if (result.isDenied) {
                                location = "./auth-register.php";
                            }
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
                            icon: "warning",
                            title: "<h5>Product already exist</h5>"
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
                            title: "<h5>Product has been inserted</h5>"
                        });
                        viewdata();
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
                            title: "<h5>Product has not been exist</h5>"
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
                            title: "<h5>Update failed</h5>"
                        });
                    } else {
                        alert(val)
                    }
                }
            })
        })
    })
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
                    url: "./ajax/POS_delete_ajax.php",
                    method: "POST",
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
                        }

                    }
                })
            } else if (

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
                        url: "./ajax/POS_allremove.php",
                        method: "POST",
                        data: {
                            "alldel": del
                        },

                        success: function(all) {
                            if (all == 1) {
                                swalWithBootstrapButtons.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                })
                                setTimeout(function() {
                                    location.reload();
                                }, 1000)
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
                url: "./ajax/POS_add_ajax.php",
                method: "POST",
                data: {
                    "myid": cartid,
                    "myprice": cartprice,
                    "myqty": cartqty
                },

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
                            title: "<h5>Quantity has been changed</h5>"
                        });
                        viewdata();
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
                            title: "<h5>Quantity has not been changed</h5>"
                        });
                    } else {
                        alert(val);
                    }
                }
            })
        })
    })
    $(document).ready(function() {
        $(document).on("click", "#userbtn", function(e) {
            e.preventDefault();
            var quan = $(this).closest("#invoicedata");
            var username = quan.find(".uname").val();
            var usercontact = quan.find(".ucontact").val();
            var usercash = quan.find(".ucash").val();
            var userstatus = quan.find(".ustatus").val();
            var userinvoice = quan.find(".uinvoice").val();
            $.ajax({
                url: "./ajax/POS_userinfo_ajax.php",
                method: "POST",
                data: {
                    "username": username,
                    "usercontact": usercontact,
                    "usercash": usercash,
                    "userstatus": userstatus,
                    "userinvoice": userinvoice,
                },
                // processData: false,
                // contentType: false,
                success: function(res) {
                    if (res == 1) {
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
                            title: "<h5>Cash is emtpy</h5>"
                        });

                    } else if (res == 2) {
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
                            title: "<h5>Product Already Exist in Cart</h5>"
                        });
                    } else if (res == 3) {
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
                            title: "<h5>Information inserted</h5>"
                        });
                        viewdata();
                        invoicenum();
                    } else if (res == 4) {
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
                            title: "<h5>Information not inserted</h5>"
                        });
                    } else if (res == 5) {
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
                            title: "<h5>Cart is emtpy</h5>"
                        });
                    } else {
                        alert(res);
                    }
                }
            })
        })


        invoicenum();

        function invoicenum() {
            $.ajax({
                url: "./ajax/POS_userinfo_ajax.php",
                method: "POST",
                data: {
                    invoice: "invoice",
                },
                success: function(re) {
                    $("#posinvoice").val(re);
                }
            });
        }
    });
</script>