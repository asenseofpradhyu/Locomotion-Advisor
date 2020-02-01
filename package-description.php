<?php 

if(isset($_POST['submit_data'])){

    $person = $_POST['person'];

    if(isset($_SESSION['user'])){

        $tour_package_Model = new tour_package_masterModel();
        $controller = new tour_package_masterController();
        $tour_package_Model->package_id = $_REQUEST['id'];
        $_SESSION['package_id'] = $_REQUEST['id'];
        $data = $controller->ShowTourPackageDescription($tour_package_Model);
        foreach($data as $result) {
        $tour_package_Model->package_price = $result['package_price'] * $person;
        }
        // $_SESSION['package_id'] = $_REQUEST['id'];
        $_SESSION['package_price'] = $tour_package_Model->package_price;
        $tour_package_Model->package_id = $_SESSION['package_id'];
        // echo "<script>alert('".$_SESSION['package_id']."');</script>";
        echo "<script>window.location.href='index.php?page=payment.php'</script>";


    } else {
        echo "<script>M.toast({html: 'Please login First'});</script>";
    }
}

?>


        <!-- Start of Hotel Section -->
        <section class="hotel-detail-section">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="hotel-detail-content">
                    <div class="row bg-background">
                    <?php 
                    
            $tour_package_Model = new tour_package_masterModel();
            $controller = new tour_package_masterController();
            $tour_package_Model->package_id = $_REQUEST['id'];
            $data = $controller->ShowTourPackageDescription($tour_package_Model);
            foreach($data as $result) {
              
            ?>
                        <div class="col s6"  style="padding:10px;">
                            <img src="<?php echo $result['dimage'];?>" alt="">
                        </div>
                        <div class="col s6">
                            <div class="hotel-detail-content">
                                <h3><?php echo $result['package_title'];?></h3>
                                <h5><?php echo $result['package_price'];?> &#8377;</h5>
                                <ul>
                                    <li><i class="material-icons">date_range</i> <br>6 Days 5 Nights</li>
                                    <!-- <li><i class="material-icons">note</i>  <br>29 March 2019 - 3 April 2019</li> -->
                                    <li><i class="material-icons">timer</i>  <br>9:00 P.M</li>
                                    <li><i class="material-icons">directions_car</i> <br>Free Parking</li>
                                </ul>
                                <div class="input-field col s12">
                                     <a href="#person" class="modal-trigger"><input type="submit" value="Book Now" class="payment-btn pay-btn"></a>
                                </div>
                                <div class="hotel-description">
                                    <h4>Description</h4>
                                    <p><?php echo $result['package_description'];?></p>
                                    
                                </div>
                            </div>
                        </div>
            <?php }?>
                    </div>
                </div>
            </div>
        </section>

        <div id="person" class="modal">
        <div class="modal-content">
            <h4>Total Person</h4>
            <div class="row">
                <div class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                                <select id="person" name="person">
                                  <option value="" disabled selected>Choose your option</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                </select>
                                <label>Person</label>
                                  </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="modal-footer">
            <!-- <a href="#!"  class="modal-close btn waves-effect waves-green btn-flat">Submit</a> -->
            <input type="submit" name="submit_data" class="modal-close pay-btn payment-btn" value="Submit" >
        </div>
  </div>
        <!-- End of Hotel Section -->

 