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
              $sql = $obj->select("online_user", "*", "uinvoice='$inid'");
              $sql = $obj->getresult();
              foreach ($sql as $fet) {
              ?>
                <div class="invoice-title">
                  <h2>Invoice</h2>
                  <div class="invoice-number"><?php echo $fet['uinvoice'] ?></div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-6">
                    <address>
                      <strong>Billed To:</strong><br>
                      <?php echo $fet['uname'] ?> <?php echo $fet['ulastname'] ?><br>

                      <b>Address-1:</b><br> <?php echo $fet['uaddress1'] ?><br>
                      <b>Address-2:</b><br> <?php echo $fet['uaddress2'] ?><br>
                      <b>Ph#: </b><br><?php echo $fet['uphone'] ?><br>
                      <b>City: </b><br><?php echo $fet['ucity'] ?>,<br> <b>Postal Code: </b><br><?php echo $fet['upostalcode'] ?><br>
                      <b>State: </b><br><?php echo $fet['ustate'] ?>,<br> <b>Country: </b><br><?php echo $fet['ucountry'] ?>
                    </address>
                  </div>
                  <div class="col-md-6 text-md-right">
                    <address>
                      <strong>Shipped To:</strong><br>
                      <b>Address-1:</b><br> <?php echo $fet['uaddress1'] ?><br>
                      <b>Address-2:</b><br> <?php echo $fet['uaddress2'] ?><br>
                      <b>State: </b><br><?php echo $fet['ustate'] ?>,<br> <b>Country: </b><br><?php echo $fet['ucountry'] ?>
                    </address>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <address>
                      <strong>Payment Method:</strong><br>
                      Cash on delivery<br>
                      <?php echo $fet['uemail'] ?>
                    </address>
                  </div>
                  <div class="col-md-6 text-md-right">
                    <address>
                      <strong>Order Date:</strong><br>
                      <?php echo $fet['udate'] ?><br>
                    </address>
                  </div>
                </div>
              <?php
              }

              ?>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-md-12">

              <div class="section-title">Order Summary</div>
              <p class="section-lead">All items here cannot be deleted.</p>
              <div class="table-responsive">
                <table class="table table-striped table-hover table-md">
                  <thead>
                    <tr>
                      <th data-width="40">#</th>
                      <th>Item</th>
                      <th class="text-center">Price</th>
                      <th class="text-center">Quantity</th>
                      <th class="text-right">Totals</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = $obj->select("online_order", "*", "ordinvoice='$inid'");
                    $sr = 0;
                    $gtotal = 0;
                    foreach ($sql as $cfet) {
                      $sr += 1;
                    ?>
                      <tr>
                        <td><?php echo $sr ?></td>
                        <td><?php echo $cfet['ordname'] ?></td>
                        <td class="text-center"><?php echo $cfet['ordprice'] ?></td>
                        <td class="text-center"><?php echo $cfet['ordqty'] ?></td>
                        <td class="text-center"><?php echo $cfet['ordtotalprice'] ?></td>
                      </tr>

                    <?php
                      $gtotal = $gtotal + $cfet['ordtotalprice'];
                    }
                    ?>
                  </tbody>
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
                    <div class="invoice-detail-name">Total</div>
                    <div class="invoice-detail-value invoice-detail-value-lg">$685.99</div>
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