<?php
  if(isset($_POST['plan-1'])){
    $plan_masterModel = new plan_masterModel();
    $plandata = new plan_masterController();
    $plan_masterModel->plan_id = 4;
    $_SESSION['plan_id'] = $plan_masterModel->plan_id;
    $plan_masterModel->plan_price = 9000;
    echo "<script>window.location.href='index.php?page=payment.php&pid=4&title=yellow&price=9000'</script>";
  }
  
  if(isset($_POST['plan-2'])){
    $plan_masterModel = new plan_masterModel();
    $plandata = new plan_masterController();
    $plan_masterModel->plan_id = 5;
    $_SESSION['plan_id'] = $plan_masterModel->plan_id;
    $plan_masterModel->plan_price = 2500;
    echo "<script>window.location.href='index.php?page=payment.php&pid=5&title=red&price=2500'</script>";
  }

  if(isset($_POST['plan-3'])){
    $plan_masterModel = new plan_masterModel();
    $plandata = new plan_masterController();
    $plan_masterModel->plan_id = 6;
    $_SESSION['plan_id'] = $plan_masterModel->plan_id;
    $plan_masterModel->plan_price = 6500;
    echo "<script>window.location.href='index.php?page=payment.php&pid=6&title=orange&price=6500'</script>";
  }

  if(isset($_POST['plan-4'])){
    $plan_masterModel = new plan_masterModel();
    $plandata = new plan_masterController();
    $plan_masterModel->plan_id = 7;
    $_SESSION['plan_id'] = $plan_masterModel->plan_id;
    $plan_masterModel->plan_price = 10500;
    echo "<script>window.location.href='index.php?page=payment.php&title=blue&pid=7&price=10500'</script>";
  }
?>

    <!-- Start of Hero Section -->

    <section class="hero-section">
      <div class="hero-div">
        <img src="img/Bag_pack.png" alt="Travel Image">
        <h1>Locomotion<br>&nbsp;&nbsp;&nbsp;&nbsp; Advisor</h1>
      </div>
    </section>

    <!-- End of Hero Section -->

    <!-- Start of Search Section -->

    <section class="search-section">
      <div class="search-section-content gradient-bg">
        <div class="container">
          <img src="img/Travel_bus.png" alt="Travel Bus">
          <div class="search-box">
            <div class="row">
              <div class="col m12 search-box-content">
                <ul id="tab-swipe" class="tabs">
                  <li class="tab col m6 search-box-title">
                    <a href="#test-swipe-1" class="">
                      Tours
                    </a>
                  </li>
                  <li class="tab col m6 search-box-title">
                    <a class="active" href="#test-swipe-2" class="">
                      Resort
                    </a>
                  </li>
                </ul>

                <div id="test-swipe-1" class="col m12">
                  <div class="input-field col m2">
                    <input id="from-destination" type="text">
                    <label for="from-destination">From</label>
                  </div>
                  <div class="input-field col m2">
                    <input id="to-destination" type="text">
                    <label for="to-destination">To</label>
                  </div>
                  <div class="input-field col m2">
                    <input id="depart-date" type="text" class="datepicker">
                    <label for="depart-date">Depart Date</label>
                  </div>
                  <div class="input-field col m2">
                    <input id="return-date" type="text" class="datepicker">
                    <label for="return-date">Return Date</label>
                  </div>
                  <div class="col m2 traveller">
                    <span>Traveller</span>
                    <div class="traveller-icon">
                      <a href="#!"><i class="material-icons small">person</i></a>
                      <a href="#!"><i class="material-icons small">child_care</i></a>
                    </div>
                  </div>
                  <a href="#!" class="search-icon"><i class="material-icons small">search</i></a>
                </div>
                <div id="test-swipe-2" class="col m12">
                  <div class="input-field col m2">
                    <input id="from-destination" type="text">
                    <label for="from-destination">From</label>
                  </div>
                  <div class="input-field col m2">
                    <input id="to-destination" type="text">
                    <label for="to-destination">To</label>
                  </div>
                  <div class="input-field col m2">
                    <input id="depart-date" type="text" class="datepicker">
                    <label for="depart-date">Depart Date</label>
                  </div>
                  <div class="input-field col m2">
                    <input id="return-date" type="text" class="datepicker">
                    <label for="return-date">Return Date</label>
                  </div>
                  <div class="col m2 traveller">
                    <span>Traveller</span>
                    <div class="traveller-icon">
                      <a href="#!"><i class="material-icons small">person</i></a>
                      <a href="#!"><i class="material-icons small">child_care</i></a>
                    </div>
                  </div>
                  <a href="#!" class="search-icon"><i class="material-icons small">search</i></a>
                </div>


              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- End of Search Section -->

    <!-- Start of Membership Plan Section -->

    <section class="membership-plan">
      <div class="membership-content">
        <img src="img/pricing_bg_3.png" alt="Pricing Background" class="pricing-bg-img">
        <div class="container-fluid">
          <div class="row">
            <div class="col m12">
              <div class="membership-header">
                <h1>Membership Plan</h1>
                <h3>Choose Best Plan For You</h3>
              </div>
            </div>
            <div class="col m3">
              <div class="pricing-table">
                <img src="img/icon/Price-plan-icon-1.png" alt="Pricing Plan Icon">
                <?php 
                $plan_masterModel = new plan_masterModel();
                $plandata = new plan_masterController();
                $plan_masterModel->plan_id  = 4;
                $data = $plandata->ShowPlanData($plan_masterModel);
                foreach($data as $result):
                ?>
                  <h2><?php echo $result["plan_title"]; ?></h2>
                  <ul>
                  <li>Price: <?php echo $result["plan_price"]; $_SESSION['plan_price'] = $result['plan_price'];?>&#8377;</li>
                  <li>Discount: <?php echo $result["discount"]; ?>%</li>
                  <li>Detail: <?php echo $result["discraption"]; ?></li>
                  <li>Time: <?php echo $result["quarter_time"]; ?></li>
                  <li>Days: <?php echo $result["duration"]; ?></li>
                </ul>  
                <?php endforeach; ?>
                <input type="submit" value="Buy Now" class="plan-btn-1" name="plan-1">
              </div>
            </div>
            <div class="col m3">
              <div class="pricing-table">
                <img src="img/icon/Price-plan-icon-2.png" alt="Pricing Plan Icon">
                <?php 
                 $plan_masterModel->plan_id  = 5;
                 $data = $plandata->ShowPlanData($plan_masterModel);
                 foreach($data as $result):
                 ?>
                   <h2><?php echo $result["plan_title"]; $_SESSION['plan_price'] = $result['plan_price'];?></h2>
                   <ul>
                   <li>Price: <?php echo $result["plan_price"]; ?>&#8377;</li>
                   <li>Discount: <?php echo $result["discount"]; ?>%</li>
                   <li>Detail: <?php echo $result["discraption"]; ?></li>
                   <li>Time: <?php echo $result["quarter_time"]; ?></li>
                   <li>Days: <?php echo $result["duration"]; ?></li>
                 </ul>  
                 <?php endforeach; ?>
                
                <input type="submit" value="Buy Now" class="plan-btn-2" name="plan-2">
              </div>
            </div>
            <div class="col m3">
              <div class="pricing-table">
                <img src="img/icon/Price-plan-icon-3.png" alt="Pricing Plan Icon">
                <?php
                $plan_masterModel->plan_id  = 6;
                $data = $plandata->ShowPlanData($plan_masterModel);
                foreach($data as $result):
                ?>
                  <h2><?php echo $result["plan_title"]; $_SESSION['plan_price'] = $result['plan_price'];?></h2>
                  <ul>
                  <li>Price: <?php echo $result["plan_price"]; ?>&#8377;</li>
                  <li>Discount: <?php echo $result["discount"]; ?>%</li>
                  <li>Detail: <?php echo $result["discraption"]; ?></li>
                  <li>Time: <?php echo $result["quarter_time"]; ?></li>
                  <li>Days: <?php echo $result["duration"]; ?></li>
                </ul>  
                <?php endforeach; ?>
                <input type="submit" value="Buy Now" class="plan-btn-3" name="plan-3">
              </div>
            </div>
            <div class="col m3">
              <div class="pricing-table">
                <img src="img/icon/Price-plan-icon-4.png" alt="Pricing Plan Icon">
                <?php
                $plan_masterModel->plan_id  = 7;
                $data = $plandata->ShowPlanData($plan_masterModel);
                foreach($data as $result):
                ?>
                  <h2><?php echo $result["plan_title"]; ?></h2>
                  <ul>
                  <li>Price: <?php echo $result["plan_price"]; $_SESSION['plan_price'] = $result['plan_price'];?>&#8377;</li>
                  <li>Discount: <?php echo $result["discount"]; ?>%</li>
                  <li>Detail: <?php echo $result["discraption"]; ?></li>
                  <li>Time: <?php echo $result["quarter_time"]; ?></li>
                  <li>Days: <?php echo $result["duration"]; ?></li>
                </ul>  
                <?php endforeach; ?>
                <input type="submit" value="Buy Now" class="plan-btn-4" name="plan-4">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- End of Membership Plan Section -->
    
  