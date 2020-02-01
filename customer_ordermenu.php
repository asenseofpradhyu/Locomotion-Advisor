
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
                                            <th>Name</th>
                                            <th>Operator Mobile</th>
                                            <th>Order For</th>
                                            <th>Order From</th>
                                            <th>Amount</th>
                                            <th>Order Date</th>
                                            <th>Invoice</th>
                                            <th>Cancel</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php 

                                  $order_Mastermodel = new order_masterModel();
                                  $controller = new order_masterController();
                                  $order_Mastermodel->user_id = $_SESSION['user'];
                                  $count=1;
                                  $data = $controller->ShowCustomerOrder($order_Mastermodel);
                                   foreach ($data as $result) {
                                  ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo $result['Name']; ?></td>
                                            <td><?php echo $result['mobile']; ?></td>
                                            <td><?php echo $result['order_for']; ?></td>
                                            <td>
                                                
                                            <?php 
                                            $odm = new order_masterModel();
                                            $odm->order_for_id = $result['order_for_id'];
                                            $ctn = new order_masterController();
                                            if($result['order_for'] == "Plan")
                                            {
                                                echo $ctn->ShowPlanNameData($odm);
                                            }
                                            else
                                            {
                                                echo $ctn->ShowOperatorNameData($odm);
                                            } ?></td>
                                            <td><?php echo $result['amount']; ?></td>
                                            <td><?php echo $result['order_date']; ?></td>
                                            <td><?php echo $result['invoice']; ?></td>
                                            <td><a onclick="return confirm('Are your sure want to delete order?');"
                                                    href=""><i class="material-icons">delete</i></a></td>
                                        </tr>
                                   <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--End of Order Menu table-->

   