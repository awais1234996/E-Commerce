<?php
// include("./include/database.php");
include("./include/header.php");
include("./include/sidebar.php");

$obj = new DB();
?>
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>POS Orders Table</h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>

                                            <th>User ID</th>
                                            <th>User Name</th>
                                            <th>User Contact</th>
                                            <th>Invoice</th>
                                            <th>Total Price</th>
                                            <th>User Status</th>
                                            <th>Invoice No.</th>
                                            <th>Date</th>
                                            <th>Update</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody id="view">
                                       
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
            url: "./ajax/POS_view_ajax.php",
            method: "GET",
            success: function(res) {
                $("#view").html(res);
            }
        })
    }
    viewdata()
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
                        url: "./ajax/POS_delete_ajax.php",
                        method: "POST",
                        data: {
                            "posdel": del
                        },

                        success: function(all) {
                            // alert(all)
                            if (all == 3) {
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