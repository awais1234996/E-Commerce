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
                            <h4>Pending Users Table</h4>
                        </div>
                        <div class="row justify-content-end ">
                            <div class="col-2">
                                <a class="btn btn-primary" href="./confirmuserview.php">View Confirm Table</a>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Postal Code</th>
                                            <th>Address 1</th>
                                            <th>Address 2</th>
                                            <th>Password</th>
                                            <th>Confirm Password</th>
                                            <th>Status</th>
                                            <th>Delete</th>
                                            <th>Update Status</th>

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
    function viewtable() {
        $.ajax({
            url: "./ajax/pendinguserview_ajax.php",
            method: "GET",
            success: function(res) {
                $("#viewtable").html(res)
            }
        })
    }
    viewtable();

    $(document).on("click", ".dlt", function() {
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
                    url: "./ajax/delete_user.php",
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

    $(document).on("click", ".cfm", function() {
        var del = $(this).data("confirm")
        var msg = this
        $.ajax({
            url: "./update_to_confirm.php",
            method: "GET",
            data: {
                "mydel": del
            },
            success: function(val) {
                // alert(val)
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
                        icon: "success",
                        title: "Status updated successfully"
                    });
                    setTimeout(function() {
                        window.location.href = "./pendinguserview.php";
                    }, 1000)
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
                        icon: "error",
                        title: "Status updated failed"
                    });
                }
            }
        })
    })
</script>