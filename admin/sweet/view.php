<?php
include("./include/connection.php");
include("./include/header.php");
include("./include/sidebar.php");


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
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM `user` WHERE `status`='pending'";
                                        $run = mysqli_query($conn, $sql);

                                        while ($fet = mysqli_fetch_assoc($run)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $fet['userid'] ?></td>
                                                <td><?php echo $fet['fname'] ?></td>
                                                <td><?php echo $fet['lname'] ?></td>
                                                <td><?php echo $fet['email'] ?></td>
                                                <td><?php echo $fet['phone'] ?></td>
                                                <td><?php echo $fet['country'] ?></td>
                                                <td><?php echo $fet['state'] ?></td>
                                                <td><?php echo $fet['city'] ?></td>
                                                <td><?php echo $fet['pcode'] ?></td>
                                                <td><?php echo $fet['address1'] ?></td>
                                                <td><?php echo $fet['address2'] ?></td>
                                                <td><?php echo $fet['password'] ?></td>
                                                <td><?php echo $fet['cpassword'] ?></td>
                                                <td><?php echo $fet['status'] ?></td>

                                                <td>  <button class="btn btn-danger dlt" data-del="<?php echo $fet['userid'] ?>">Delete</button> </td>
                                                <td> <a class="btn btn-success" href="./update_to_confirm.php?confirmid=<?php echo $fet['userid'] ?>">Confirm</a> </td>

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
            </div>
        </div>
    </section>

</div>

<?php
include("./include/footer.php")
?>
<script>
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
                        url: "./ajax/delete.php",
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
</script>
