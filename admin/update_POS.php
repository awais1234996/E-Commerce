<?php
// include("./include/database.php");
include("./include/header.php");
include("./include/sidebar.php");
$obj=new DB();
$upid = $_GET['ordid'];
$rsql = $obj->select("pos_userinfo","*","userinvoice=$upid");

$res=$obj->getresult();
foreach ($res as $rfet) {
    $username = $rfet['username'];
    $usercontact = $rfet['usercontact'];
    $userinvoice = $rfet['userinvoice'];
    $usertcash = $rfet['usertcash'];
    $userstatus = $rfet['userstatus'];
    $userdate = $rfet['userdate'];
}
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
                                                <form>
                                                    <td><input type="number" id="pqty" class="form-control" Name="quantity" max="20" min="1" value="1"></td>
                                                    <td>
                                                        <input type="hidden" class="form-control " id="uinvo" value="<?php echo $rfet['userinvoice'] ?>" id="pos-invoice" name="userinvoice" readonly>
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
                                    <input type="number" class="form-control uinvo" value="<?php echo $rfet['userinvoice'] ?>" id="pos-invoice" name="userinvoice" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control uname" value="<?php echo $rfet['username'] ?>" name="username">
                                    <span id="nerror"></span>
                                </div>
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="number" class="form-control ucontact" value="<?php echo $rfet['usercontact'] ?>" name="usercontact">
                                    <span id="cerror"></span>
                                </div>
                                <div class="form-group">
                                    <label>Total Cash</label>
                                    <input type="number" class="form-control ucash"  name="usertcash">
                                </div>
                                <label class="col-6 col-form-label fw-bold">Status</label>
                                <div class="col-12 ">
                                    <select class="form-control ustatus" name="userstatus">
                                        <option value="<?php echo $rfet['userstatus'] ?>"><?php echo $rfet['userstatus'] ?></option>
                                        <option value="Completed">Completed</option>
                                        <option value="Pending">Pending</option>
                                    </select>
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
                                    <tbody id="postable">

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
        var invo=$(".uinvo").val()
        $.ajax({
            url: "./ajax/POS_update_view_ajax.php",
            method: "GET",
            data: {
                sinvo: invo
            },
            success: function(res) {
                $("#postable").html(res);
                var total=$("#gtotal").html();
                $(".ucash").val(total);
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
            var pinvo = adm.find("#uinvo").val()


            $.ajax({
                url: "./ajax/POS_add_ajax.php",
                method: "POST",
                data: {
                    "oname": pname,
                    "ocode": pcode,
                    "oprice": pprice,
                    "oqty": pqty,
                    "oinvo": pinvo,


                },
                success: function(res) {
                    if (res == 7) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "warning",
                            title: "product already exist"
                        });
                        viewdata();
                    } else if (res == 8) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "success",
                            title: "product inserted"
                        });
                        viewdata();
                    } else if (res == 9) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "error",
                            title: "product not Inserted"
                        });
                        viewdata();
                    } else {
                        alert(res);
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
                        "updel": del
                    },
                    success: function(delt) {
                        if (delt == 3) {
                            swalWithBootstrapButtons.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success"
                            })
                            $(msg).closest("tr").fadeOut()
                        }
                        viewdata();
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
                            "upalldel": del
                        },

                        success: function(all) {

                            if (all == 3) {
                                swalWithBootstrapButtons.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                })
                               
                            }
                            viewdata();

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
            var quan = $(this).closest("#postable");
            var cartid = quan.find("#cartid").val();
            var cartprice = quan.find("#cartprice").val();
            var cartqty = quan.find("#cartqnt").val();

            $.ajax({
                url: "./ajax/POS_add_ajax.php",
                method: "POST",
                data: {
                    "upid": cartid,
                    "upprice": cartprice,
                    "upqty": cartqty
                },

                success: function(val) {
                    if (val == 10) {
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
                    } else if (val == 11) {
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
                        viewdata();
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
            var userinvoice = quan.find(".uinvo").val();
            var username = quan.find(".uname").val();
            var usercontact = quan.find(".ucontact").val();
            var usertcash = quan.find(".ucash").val();
            var userstatus = quan.find(".ustatus").val();
            $.ajax({
                url: "./ajax/update_POS_ajax.php",
                method: "POST",
                data: {
                    "username": username,
                    "usercontact": usercontact,
                    "usertcash": usertcash,
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
                            icon: "success",
                            title: "<h5>Information updated</h5>"
                        });
                        Invoice_num();
                        viewdata();
                        setTimeout(function(){
                            window.reload();
                        })
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
                            title: "<h5>Information not updated</h5>"
                        });
                        viewdata();
                    } else {
                        alert(res);
                    }
                }
            })
        })


        function Invoice_num() {
            $.ajax({
                url: "./ajax/POS_userinfo_ajax.php",
                method: "POST",
                data: {
                    "invoice": invoice
                },
                success: function(re) {
                    $("#pos-invoice").html(re);
                }
            })
        }
        Invoice_num();
    })
</script>