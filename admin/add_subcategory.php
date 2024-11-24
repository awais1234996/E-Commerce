<?php
// include("./include/database.php");
include("./include/header.php");
include("./include/sidebar.php");
$obj = new DB();
$tsql = $obj->select("category", "*", null, null, null, null);

?>
<style>
  #scerror,
  #deserror,
  #caterror {
    color: red;
  }
</style>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row  justify-content-center">
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card">
            <form id="subdata" onsubmit="return smt()">
              <div class="row justify-content-center mt-4">
                <div class="col-2">
                  <a class="btn btn-primary" href="view_subcategory.php">VIEW</a>
                </div>
              </div>
              <div class="card-header">
                <h4>Add Sub Category</h4>
              </div>
              <div class="mb-3 row card-body">
                <label class="col-4 col-form-label fw-bold">Category</label>
                <div class="col-12 ">
                  <select class="form-control" id="catname" onblur="catid()" name="idcategory">
                    <option value="">SELECT Category</option>
                    <?php

                    if (isset($tsql)) {
                      foreach ($tsql as $fet) {
                    ?>
                        <option value="<?php echo $fet['categoryid'] ?>">
                          <?php echo $fet['categoryname']  ?>
                        </option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                  <span id="caterror"></span>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Sub Category Name</label>
                  <input type="text" class="form-control" id="scatname" name="subcategoryname" onblur="scname()">
                  <br>
                  <span id="scerror"></span>
                </div>

                <div class="form-group mb-0">
                  <label>Description(Optional)</label>
                  <textarea class="form-control" id="scatdes" onblur="scdes()" name="subcategorydescription"></textarea>
                  <br>
                  <span id="deserror"></span>
                </div>
                <div class="card-footer text-right">
                  <input type="submit" Name="submit" id="smt" value="Submit" class="btn btn-primary">
                </div>
            </form>

          </div>
        </div>
  </section>

</div>
<!-- <script src="./js files/subcategory.js"></script> -->
<?php
include("./include/footer.php")
?>
<script>
  $(document).ready(function() {
    $(document).on("submit", "#subdata", function(e) {
      e.preventDefault();
      var mydata = new FormData(subdata)
      $.ajax({
        url: "./ajax/subcategoryajax.php",
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
              title: "Sub-Category Already Exist"
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
              title: "Sub-Category has been inserted"
            });

            $("#subdata").trigger("reset")
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
              title: "Sub-Category has not been inserted"
            });

          } else {

            alert(val);
          }
        }

      })
    })
  })
</script>