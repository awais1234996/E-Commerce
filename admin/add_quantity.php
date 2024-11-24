<style>
  #nameerror,#deserror{
    color: red;
  }
</style>
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
      <div class="row  justify-content-center">
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card">
            <form id="qtydata" onsubmit="return smt()">
              <div class="row justify-content-center mt-4">
                <div class="col-2">
                  <a class="btn btn-primary" href="view_quantity.php">VIEW</a>
                </div>
              </div>
              <div class="card-header">
                <h4>Add Quantity</h4>
              </div>


              <div class="card-body">
                <div class="form-group">
                  <label>Quantity Name</label>
                  <input type="text" class="form-control" id="qname" onblur="qtyname()" name="quantityname" >
                  <br>
                  <span id="nameerror"></span>
                </div>

                <div class="form-group mb-0">
                  <label>Description(Optional)</label>
                  <textarea class="form-control" id="qdes" onblur="qtydes()" name="quantitydescription"></textarea>
                  <br>
                  <span id="deserror"></span>
                </div>
              </div>
              <div class="card-footer text-right">
                <input type="submit" Name="submit" value="Submit" class="btn btn-primary">
              </div>
            </form>

          </div>
        </div>
  </section>

</div>
<!-- <script src="./js files/qunatity.js"></script> -->
<?php
include("./include/footer.php")
?>
<script>
  $(document).ready(function() {
    $(document).on("submit", "#qtydata", function(e) {
      e.preventDefault();
      var mydata = new FormData(qtydata)
      $.ajax({
        url: "./ajax/quantityajax.php",
        method: "POST",
        data: mydata,
        processData: false,
        contentType: false,
        success: function(val) {
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
              icon: "error",
              title: "Please Fill All Required Fields"
            });
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
              icon: "warning",
              title: "Quantity Already Exist"
            });
          } else if (val == 3) {
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
              title: "Quantity has been inserted"
            });

            $("#qtydata").trigger("reset")
          } else if (val == 4) {
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
              title: "Quantity has not been inserted"
            });

          } else {

            alert(val);
          }
        }

      })
    })
  })
</script>