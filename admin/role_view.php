<?php
// include("./include/database.php");
include("./include/header.php");
include("./include/sidebar.php");
$obj=new DB();
?>
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    
                    <div class="card">
                    <div class="row justify-content-center mt-4">
                        <div class="col-2">
                            <a class="btn btn-primary" href="role_add.php">ADD</a>
                        </div>
                    </div>
                        <div class="card-header">
                            <h4>Roles Table</h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>

                                            <th>Role ID</th>
                                            <th>Role Name</th>
                                            <th>Role Access</th>
                                            <th>Category</th>
                                            <th>Sub-Category</th>
                                            <th>Supplier</th>
                                            <th>Quantity</th>
                                            <th>Product</th>
                                            <th>Users</th>
                                            <th>Orders</th>
                                            <th>POS</th>
                                            <th>Contact</th>
                                            <th>User Management</th>
                                            <th>Date</th>
                                            <th>Delete</th>
                                            <th>Update</th>

                                        </tr>
                                    </thead>
                                    <tbody id="viewrole">

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
            url: "./ajax/role_view_ajax.php",
            method: "POST",
            data:{
                del:"dele"
            },
            success: function(res) {
                $("#viewrole").html(res);
            }
        })
    }
    viewdata();
    $(document).ready(function() {
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
                        url: "./ajax/role_delete_ajax.php",
                        method: "POST",
                        data: {
                            "del": del
                        },

                        success: function(all) {
                            if (all == 1) {
                                swalWithBootstrapButtons.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                })
                                viewdata();
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
</script>