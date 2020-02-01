<?php 

if (isset($_POST['paybtn_paypal'])) {

if(isset($_SESSION['user'])){
    

    if(isset($_SESSION['plan_id'])){

        $order_for = 'Plan';
        $order_for_id = $_REQUEST['pid'];
        $title = $_REQUEST['title'];
        $price = $_REQUEST['price'];

    } else if(isset($_SESSION['package_id'])){
        $tour_package_Model = new tour_package_masterModel();
        $controller = new tour_package_masterController();
        $tour_package_Model->package_id = $_SESSION['package_id'];
        $data = $controller->ShowTourPackageDescription($tour_package_Model);
        foreach ($data as $result) {

        $order_for = $result['package_title'];
        $order_for_id = $result['user_id'];
        $price = $_SESSION['package_price'];

        echo "<script>window.location.href='index.php?page=payment-success.php'</script>";
        }
    }

    
    
    
    $uid = $_SESSION['user'];
    $randomInvoice = mt_rand(100000, 999999);
    $dbcon = mysqli_connect("localhost","pradhuman","12345","locomotion_db") or die("DB not Connect");
    mysqli_query($dbcon,"INSERT INTO order_master VALUES(NULL, $uid, '$order_for', $order_for_id, $price, 'Paypal', 'Unpaid', NOW(), 'Pending', $randomInvoice)");
    $_SESSION['order_id'] = mysqli_insert_id($dbcon);
    mysqli_close($dbcon);

    

} else {
    echo "<script>M.toast({html: 'Please login First'});</script>";
}

  } 
// }

?>




<!-- Start of Payment Section -->
<section class="payment-section">
    <div class="side-gap">
        <div class="row">
            <div class="col s8">
                <ul class="collapsible">
                    <li class="active">
                        <div class="collapsible-header"><span class="payment-num">1</span>Share your Contact Details for more <span class="payment-gateway-name"> &nbsp;Offers</span></div>
                        <div class="collapsible-body">
                            <div class="row">
                                <div class="input-field col s4">
                                    <input id="email" type="email" class="validate">
                                    <label for="email">Email</label>
                                </div>
                                <div class="input-field col s4">
                                    <input id="mobile" type="tel" class="validate">
                                    <label for="mobile">Mobile</label>
                                </div>
                                <div class="col s4">
                                    <input type="submit" value="Continue" class="payment-btn">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <!-- <div class="collapsible-header"><span class="payment-num">2</span>Pay With <span class="payment-gateway-name">&nbsp;PayUmoney</span></div> -->
                        <!-- <div class="collapsible-body">
                            <div class="row">
                                <div class="input-field col s6">
                                    <?php $price = $_REQUEST['price'];?>
                                    <input id="amount-price" type="text" class="validate" value="<?php echo $price; ?>" disabled>
                                    <label for="amount-price">Amount Price</label>
                                </div>
                                <?php 
                                $user_detailMod = new user_detailsmasterModel();
                                $obj = new userDetails_masterController();
                                if(isset($_SESSION['user'])){
                                $user_detailMod->user_id = $_SESSION['user'];
                                $data = $obj->ShowUserDetailsData($user_detailMod);
                                foreach ($data as $result) :

                                  ?>
                                <div class="input-field col s6">
                                    <input id="user-name" type="text" class="validate" value="<?php echo $result['Name']; ?>">
                                    <label for="user-name">Name</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="email" type="email" class="validate" value="<?php echo $result['email']; ?>">
                                    <label for="email">Email</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="mobile-num" type="tel" class="validate" value="<?php echo $result['mobile']; ?>">
                                    <label for="mobile-num">Phone</label>
                                </div>
                                <?php endforeach; 
                                } else {
                                    echo "<script>M.toast({html: 'Login First'});</script>";
                                }
                                ?>
                                <div class="input-field col s12">
                                    <input type="submit" value="Pay Now" class="payment-btn pay-btn" name="paybtn_payumoney">
                                </div>
                            </div>
                        </div> -->
                    </li>
                    <li>
                        <div class="collapsible-header"><span class="payment-num">2</span class="payment-gateway-name">Pay With <span class="payment-gateway-name"> &nbsp;PayPal</span></div>
                        <div class="collapsible-body">
                            <div class="row">
                                <div class="input-field col s6">
                                <?php 
                                
                                if(isset($_SESSION['package_price'])){
                                    $price = $_SESSION['package_price'];
                                } else if(isset($_REQUEST['price'])){
                                    $price = $_REQUEST['price'];    
                                }
                                ?>
                                    <input id="amount-price" type="text" class="validate" value="<?php echo $price; ?>" disabled>
                                    <label for="amount-price">Amount Price</label>
                                </div>
                                <?php 
                                $user_detailMod = new user_detailsmasterModel();
                                $obj = new userDetails_masterController();
                                if(isset($_SESSION['user'])){
                                $user_detailMod->user_id = $_SESSION['user'];
                                $data = $obj->ShowUserDetailsData($user_detailMod);
                                foreach ($data as $result) :
                                    $_SESSION['user_name'] = $result['Name'];
                                  ?>
                                <div class="input-field col s6">
                                    <input id="user-name" type="text" class="validate" value="<?php echo $result['Name']; ?>">
                                    <label for="user-name">Name</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="email" type="email" class="validate" value="<?php echo $result['email']; ?>">
                                    <label for="email">Email</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="mobile-num" type="tel" class="validate" value="<?php echo $result['mobile']; ?>">
                                    <label for="mobile-num">Phone</label>
                                </div>
                                <?php endforeach; 
                                } else {
                                    echo "<script>M.toast({html: 'Login First'});</script>";
                                }

                                ?>
                                <div class="input-field col s12">
                                    <input type="submit" value="Pay Now" class="payment-btn pay-btn" name="paybtn_paypal">
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col s4">
                <!-- Plan -->
            <?php if(isset($_SESSION['plan_id'])){ ?>
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Order Summary</span>
                        <?php 

                        $plan_masterModel = new plan_masterModel();
                        $plandata = new plan_masterController();
                        $plan_masterModel->plan_id = $_SESSION['plan_id'];
                        $data = $plandata->ShowPlanData($plan_masterModel);
                        foreach ($data as $result) :
                          ?>
                        <h5><?php echo $result['plan_title']; ?> Package</h5>
                        <p>Discount: <span><?php echo $result["discount"]; ?>%</span></p>
                        <p>Time: <span><?php echo $result["quarter_time"]; ?></span></p>
                        <p>Days: <span><?php echo $result["duration"]; ?></span></p>
                    </div>
                    <div class="card-action">
                        <Span class="card-title">Total</Span>
                        <span class="card-title right"><?php echo $result["plan_price"]; ?> &#8377;</span>
                    </div>
                    <?php endforeach; ?>
                </div>
                        <?php }?>

                <!-- Package -->
                        <?php if(isset($_SESSION['package_id'])){ ?>
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Order Summary</span>
                        <?php 

                        $tour_package_Model = new tour_package_masterModel();
                        $controller = new tour_package_masterController();
                        $tour_package_Model->package_id = $_SESSION['package_id'];
                        $data = $controller->ShowTourPackageDescription($tour_package_Model);
                        foreach ($data as $result) :
                          ?>
                        <h5><?php echo $result['package_title']; ?> Package</h5>
                        <p>Person: <span><?php echo $_SESSION['package_price'] / $result['package_price']; ?></span></p>
                        <p>Price: <span><?php echo $result["package_price"] ." X ".$_SESSION['package_price'] / $result['package_price']; ?> </span></p>
                        <p>Description: <span><?php echo $result["package_description"]; ?></span></p> 
                    </div>
                    <div class="card-action">
                        <Span class="card-title">Total</Span>
                        <span class="card-title right"><?php echo $_SESSION["package_price"]; ?> &#8377;</span>
                    </div>
                    <?php endforeach; ?>
                </div>
                        <?php }?>      
            </div>
        </div>
    </div>
</section>
<!-- End of Payment Section --> 