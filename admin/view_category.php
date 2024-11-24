<?php
// include("./include/connection.php");
include("./include/header.php");
include("./include/sidebar.php");
// include("./include/database.php");

$obj = new DB();


?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h4>Category Table</h4>
                        </div>
                        <div class="row justify-content-end ">
                            <div class="col-2">
                                <a class="btn btn-primary" href="add_category.php">ADD</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Category ID</th>
                                            <th>Category Name</th>
                                            <th>Category Description</th>
                                            <th>Category Date</th>
                                            <th>Delete</th>
                                            <th>Update</th>

                                        </tr>
                                    </thead>
                                    <tbody id="viewdata">

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
            url: "./ajax/view_category_ajax.php",
            method: "GET",
            success: function(res) {
                $("#viewdata").html(res);
            }
        })
    }
    viewdata();
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
                        url: "./ajax/delete_category_ajax.php",
                        method: "GET",
                        data: {
                            "mydel": del
                        },

                        success: function(delt) {
                            // alert(delt)
                            if (delt == 1) {
                                swalWithBootstrapButtons.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                })
                                $(msg).closest("tr").fadeOut()
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
</script>