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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Orders Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>

                                            <th>Invoice ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Postal Code</th>
                                            <th>Address-1</th>
                                            <th>Address-2</th>
                                            <th>Date</th>
                                            <th>Payment Status</th>
                                            <th>Status</th>
                                            <th>Invoice</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="viewuser">
                                       
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
            url: "./ajax/view_order_ajax.php",
            method: "POST",
            success: function(res) {
                $("#viewuser").html(res)
            }
        })
    }
    viewdata() ;
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
                    url: "./ajax/delete_orders_ajax.php",
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
    $(document).on("click", ".chek", function(e) {
        e.preventDefault()
        if (this.checked) {
            var ustatus = "Completed";
        } else {
            var ustatus = "Pending";
        }
        var oi = $(this).data("oi")
        $.ajax({
            url: "./ajax/update_order_ajax.php",
            method: "POST",
            data: {
                "ustatus": ustatus,
                "oi": oi
            },
            success: function(val) {
                // alert(val)
               if (val == 1) {
                    window.location.reload();
                } else if (val == 2) {
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
                        title: "Failed to update online-order"
                    });
                } else if (val == 3) {
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
                        title: "Failed to update online_user"
                    });
                } else {
                    alert(val)
                }
            }
        })
    })
</script>