
    <!-- Start of Hotel Section -->
    <section class="hotel-section">
      <div class="bg-overlay"></div>
      <div class="hotel-content container">
        <div class="hotel-header">
          <h2>Best Picks</h2>
          <h4>Pick Best One For You</h4>
        </div>
        <div class="hotel-content">
          <div class="row">
            <?php 
            $tour_package_Model = new tour_package_masterModel();
            $controller = new tour_package_masterController();
            $data = $controller->ShowTourPackageData($tour_package_Model);
            foreach($data as $result) {
              if($result['status'] == 'Active' && $result['package_type_id'] == 1){
            ?>
            
            <div class="col m3">
              <div class="card hoverable">
                <div class="card-image waves-effect waves-block waves-light">
                  <img style="height:200px;"class="activator" src="<?php echo $result['dimage']; ?>">
                </div>
                <div class="card-content">
                  <span class="card-title activator"><?php echo $result['package_title']; ?><i class="material-icons right">more_horiz</i></span>
                  <span><h5><?php echo $result['package_price'];?>&#8377;</h5></span>
                  <p><a href="index.php?page=package-description.php&id=<?php echo $result['package_id'];?>" class="theme-btn">View</a></p>
                </div>
                <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4"><?php echo $result['package_title']; ?><i
                      class="material-icons right">close</i></span>
                  <p><?php echo $result['package_description']; ?></p>
                </div>
              </div>
            </div>
            <?php } }?>
          </div>
        </div>
    </section>
    <!-- End of Hotel Section -->

