<?php 


$hotel_ordermenu_masterMod = new hotel_order_masterModel();
$obj = new hotel_order_masterController();
include("App_Code/AdminEditController.php");





?>


        <!--Start of Order-Menu table-->
        <section id="order-menu" class="right-content">
            <div class="admin-content-bg">
                <div class="row">
                    <div class="col l12">
                        <div class="card ">
                            <div class="card-content">
                                <table class="responsive-table highlight centered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Order For</th>
                                            <th>Amount</th>
                                            <th>Payment Type</th>
                                            <th>Payment Status</th>
                                            <th>Order Date</th>
                                            <th>Order Status</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php 
                                  
                                  $data = $obj->ShowHotelOrderMenu($hotel_ordermenu_masterMod);
                                  $count=1;
                                  foreach ($data as $result) {
                                
                                ?>
                                  <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $result["order_for"]; ?></td>
                                    <td><?php echo $result["amount"]; ?></td>
                                    <td><?php echo $result["payment_type"]; ?></td>
                                    <td><?php echo $result["payment_status"]; ?></td>
                                    <td><?php echo $result["order_date"]; ?></td>
                                    <td><?php echo $result["order_status"]; ?></td>

                                    <td><a href="#!" class="modal-trigger"><i class="material-icons">edit</i></a>
                                    </td>

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
           
        </section>

        <!--End of Order Menu table-->
