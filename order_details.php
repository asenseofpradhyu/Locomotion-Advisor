<?php 

$order_masterMod = new order_masterModel();
$obj = new order_masterController();


if(isset($_REQUEST['delete'])){

    $order_masterMod->order_id = $_REQUEST['delete'];
    $obj->DeleteOrder($order_masterMod);
    echo "<script>window.location.location.href='admin_index.php?page=order_details.php';</script>";
}

?>

<!--Start of User Details table-->
<section id="userDetails" class="right-content">
        <div class="admin-content-bg">
            <div class="row">
                <div class="col l12">
                    <div class="card ">
                        <div class="card-content">
                            <table class="responsive-table highlight">
                                <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>Order For</th>
                                      <th>Order</th>
                                      <th>Amount</th>
                                      <th>Payment Type</th>
                                      <th>Invoice</th>
                                      <th>Order Date</th>
                                      <th>Send Mail</th>
                                      <th>Delete</th>                                      
                                  </tr>
                                </thead>
                        
                                <tbody>
                                <?php 
                                  
                                  $data = $obj->ShowOrderData($order_masterMod);
                                  $count=1;
                                  foreach ($data as $result) {
                                    
                                ?>
                                  <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php
                                    $odm = new order_masterModel();
                                    $odm->order_for_id = $result['order_for_id'];
                                    $ctn = new order_masterController();
                                    if($result['order_for'] == "Plan")
                                    {
                                        echo $ctn->ShowPlanNameData($odm);
                                    } else {
                                      echo $ctn->ShowOperatorNameData($odm);
                                    }
                                    ?></td>
                                    <td><?php echo $result["order_for"]; ?></td>
                                    <td><?php echo $result["amount"]; ?></td>
                                    <td><?php echo $result["payment_type"]; ?></td>
                                    <td><?php echo $result["invoice"]; ?></td>
                                    <td><?php echo $result["order_date"]; ?></td>
                                    <td>
                                      <a href="mailto:<?php echo $result['email'];?>"><i class="material-icons">email</i></a></td>
                                    <td><a onclick="return confirm('Are your sure want to delete Order?');" href="admin_index.php?page=order_details.php&delete=<?php echo $result["order_id"]; ?>"><i class="material-icons">delete</i></a></td>
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

    <!--End of User Details table-->