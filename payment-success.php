
<!-- Start of Payment Success Section -->
            <section class="payment-success-section">
                <div class="container">
                    <div class="row">
                        <div class="col s12 blank-space"></div>
                        <div class="col s12 center">
                            <div class="card hoverable">
                              <div class="card-content">
                                <span class="card-title center">Final Payment Detail</span>
                                <ul>

                                  <?php 
                                if(isset($_SESSION['package_id'])){

                                  $order_Mastermodel = new order_masterModel();
                                  $controller = new order_masterController();
                                  $order_Mastermodel->order_id = $_SESSION['order_id'];
                                  $data = $controller->ShowOrderData($order_Mastermodel);
                                   foreach ($data as $result) {
                                  ?>
                                    <li>Invoice ID:- <?php echo $result['invoice']; ?></li>
                                    <li>Name: <?php echo $_SESSION['user_name']; ?></li>
                                    <li>Price: <?php echo $result['amount'];?> &#8377;</li>
                                    <li>Date: <?php echo $result['order_date']; ?></li>
                                   <?php }} ?>

                                   <?php 
                                if(isset($_SESSION['plan_id'])){

                                  $order_Mastermodel = new order_masterModel();
                                  $controller = new order_masterController();
                                  $order_Mastermodel->order_id = $_SESSION['order_id'];
                                  $data = $controller->ShowOrderData($order_Mastermodel);
                                   foreach ($data as $result) {
                                  ?>
                                    <li>Invoice ID:- <?php echo $result['invoice']; ?></li>
                                    <li>Name: <?php echo $_SESSION['user']; ?></li>
                                    <li>Price: <?php echo $result['amount'];?> &#8377;</li>
                                    <li>Date: <?php echo $result['order_date']; ?></li>
                                   <?php }} ?>
                                </ul>
                              </div>
                              <div class="card-action">
                                <div class="input-field col s12">
                                    <input type="submit" value="Go to Paypal" class="payment-btn pay-btn">
                                  </div>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </section>
    <!-- End of Payment Success Section -->

   