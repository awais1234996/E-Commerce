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
      <div class="invoice">
        <div class="invoice-print">
          <div class="row">
            <div class="col-lg-12">
              <?php
              $inid = base64_decode($_GET['inid']);
              $sql = $obj->select("pos_userinfo", "*", "userinvoice='$inid'");
              foreach ($sql as $fet) {
                // $uinvo = $fet['username'];
              }
              ?>
              <div class="invoice-title">
                <h2>Invoice</h2>
                <div class="invoice-number"><?php echo $fet['userinvoice'] ?></div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <address>
                    <strong>Billed To:</strong><br>
                    <?php echo $fet['username'] ?><br><br>


                    <b>Ph#: </b><br><br><?php echo $fet['usercontact'] ?><br><br>

                    <strong>Payment Method:</strong><br><br>
                    Cash on delivery<br><br>
                    <strong>Order Date:</strong><br><br>
                    <?php echo $fet['userdate'] ?><br><br>
                  </address>
                </div>

              </div>

            </div>
          </div>
          <div class="row mt-4">
            <div class="col-md-12">

              <div class="section-title">Order Summary</div>
              <p class="section-lead">All items here cannot be deleted.</p>
              <div class="table-responsive">
                <table class="table table-striped table-hover table-md">
                  <tr>
                    <th data-width="40">#</th>
                    <th>Item</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-right">Totals</th>
                  </tr>
                  <?php
                  $sql = $obj->select("pos_orderinfo", "*", "orderinvoice='$inid'");
                 
                  $sr = 0;
                  $gtotal = 0;
               foreach($sql as $cfet) {
                    $sr += 1;
                  ?>
                    <tr>
                      <td><?php echo $sr ?></td>
                      <td><?php echo $cfet['ordername'] ?></td>
                      <td class="text-center"><?php echo $cfet['orderprice'] ?></td>
                      <td class="text-center"><?php echo $cfet['orderqty'] ?></td>
                      <td class="text-center"><?php echo $cfet['ordertotalprice'] ?></td>
                    </tr>

                  <?php
                    $gtotal = $gtotal + $cfet['ordertotalprice'];
                  }
                  ?>
                </table>
              </div>
              <div class="row mt-4">
                <div class="col-lg-8">
                  <div class="section-title">Payment Method</div>
                  <p class="section-lead">The payment method that we provide is to make it easier for you to pay
                    invoices.</p>
                  <div class="images">
                    <img src="assets/img/cards/visa.png" alt="visa">
                    <img src="assets/img/cards/jcb.png" alt="jcb">
                    <img src="assets/img/cards/mastercard.png" alt="mastercard">
                    <img src="assets/img/cards/paypal.png" alt="paypal">
                  </div>
                </div>
                <div class="col-lg-4 text-right">
                  <div class="invoice-detail-item">
                    <div class="invoice-detail-name">Subtotal</div>
                    <div class="invoice-detail-value"><?php echo  $gtotal ?></div>
                  </div>
                  <div class="invoice-detail-item">
                    <div class="invoice-detail-name">Shipping</div>
                    <div class="invoice-detail-value">$15</div>
                  </div>
                  <hr class="mt-2 mb-2">
                  <div class="invoice-detail-item">
                    <div class="invoice-detail-name">Total Amount</div>
                    <div class="invoice-detail-value invoice-detail-value-lg"><?php echo  $gtotal ?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="text-md-right">
          <div class="float-lg-left mb-lg-0 mb-3">
            <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Process
              Payment</button>
            <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</button>
          </div>
          <button class="btn btn-warning btn-icon pnt icon-left"><i class="fas fa-print"></i> Print</button>
        </div>
      </div>
    </div>
  </section>

</div>
<?php
include("./include/footer.php")
?>
<script>
  var btn = document.querySelector(".pnt");
  btn.addEventListener("click", function() {
    var data = document.querySelector(".invoice-print").innerHTML;
    var body = document.body.innerHTML;
    document.body.innerHTML = data;
    window.print();
    document.body.innerHTML = body
    location.reload(true);
  })
</script>