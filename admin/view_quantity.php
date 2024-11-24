<?php
// include("./include/database.php");
include("./include/header.php");
include("./include/sidebar.php");
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
                            <h4>Quantity Table</h4>
                        </div>
                        <div class="row justify-content-end ">
                            <div class="col-2">
                                <a class="btn btn-primary" href="add_quantity.php">ADD</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Quantity ID</th>
                                            <th>Quantity Name</th>
                                            <th>Quantity Description</th>
                                            <th>Delete</th>
                                            <th>Update</th>

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
    function view() {
        $.ajax({
            url: "./ajax/view_quantity_ajax.php",
            method: "GET",
            success: function(res) {
                $("#view").html(res)
            }
        })
    }
    view();
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
                    url: "./ajax/delete_quantity_ajax.php",
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