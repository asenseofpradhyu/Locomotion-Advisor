  <?php 
  echo "<script>editOperatorprofileMaster(".$_SESSION['user'].");</script>";



  if(isset($_POST['submit_profile'])){

    $user_masterMod = new user_masterModel();
    $obj = new user_masterController();

    $user_masterMod->name = $_POST['owner_name'];
    $user_masterMod->email = $_POST['owner_email'];
    $user_masterMod->mobile = $_POST['owner_mobile'];
    $user_masterMod->o_contect_no = $_POST['office_contact'];
    $user_masterMod->city_id = $_POST['city'];
    $user_masterMod->state_id = $_POST['state'];
    $user_masterMod->business_title = $_POST['company_title'];
    $user_masterMod->manager_name = $_POST['manager_name'];
    $user_masterMod->reg_no = $_POST['reg_no'];
    $user_masterMod->tin_no = $_POST['tin_no'];
    $user_masterMod->pro_email = $_POST['pro_email'];
    $user_masterMod->address = $_POST['office_address'];
  
  
    if(!empty($user_masterMod->name) && !empty($user_masterMod->email) && !empty($user_masterMod->mobile) && !empty($user_masterMod->o_contect_no) && !empty($user_masterMod->city_id) && !empty($user_masterMod->state_id)  && !empty($user_masterMod->business_title) && !empty($user_masterMod->address) && !empty($user_masterMod->manager_name) && !empty($user_masterMod->reg_no) && !empty($user_masterMod->tin_no) && !empty($user_masterMod->pro_email)){
  
  // Proifle Image Uploader 
  if($_FILES['photo']['error'] > 0 ){
    echo "<script>M.toast({html: 'Please Add Profile Photo'});</script>";
  } else {
    $photopath = "img/customerprofile/".$_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'], $photopath);
    $user_masterMod->photo = $photopath;
  }
            if($obj->UpdateOperatorProfile($user_masterMod)){
  
              echo "<script>M.toast({html: 'Profile Saved'});</script>";
          } else {
              echo "<script>M.toast({html: 'Error while Saving Profile'});</script>";
          }
      }
  }
  ?>     
       
<?php 

if(isset($_POST['update_pass'])){
  $user_masterMod = new user_masterModel();
    $obj = new user_masterController();

  $user_masterMod->password = $_POST['curr_pass'];
  $user_masterMod->name = $_POST['new_pass'];

  if($obj->UpdatePassword($user_masterMod)){
    echo "<script>M.toast({html: 'Password Changed'});</script>";
  } else {
    echo "<script>M.toast({html: 'Error While Updating Password'});</script>";
  }

}

?> 
      
<!-- Start of Profie Section -->

<section id="tour-profile-section" class="right-content">
            <div class="container">
                <div class="profile-content">
                    <div class="row">
                        <div class="col s12">
                          <ul class="tabs">
                            <li class="tab col s6"><a class="active" href="#profile">Profile</a></li>
                            <li class="tab col s6"><a href="#change_password">Change Password</a></li>
                          </ul>
                        </div>
                        <div id="profile" class="col s12">
                            <div class="profile-content-fields">
                                <h4>Business Profile</h4>
                                <div class="row">
                                    <div class="col s12">
                                      <div class="row">
                                        <div class="input-field col s6">
                                          <input id="owner_name" type="text" class="validate" name="owner_name">
                                          <label for="owner_name">Owner Name</label>
                                        </div>
                                        <div class="input-field col s6">
                                          <input id="owner_email" type="email" class="validate" name="owner_email">
                                          <label for="owner_email">Owner Email</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="company_title" type="text" class="validate" name="company_title">
                                            <label for="company_title">Company Title</label>
                                          </div>
                                          <div class="input-field col s6">
                                            <input id="manager_name" type="text" class="validate" name="manager_name">
                                            <label for="manager_name">Manager Name</label>
                                          </div>
                                          <div class="input-field col s6">
                                            <input id="owner_mobile" type="text" class="validate" name="owner_mobile">
                                            <label for="owner_mobile">Owner Mobile</label>
                                          </div>
                                          <div class="input-field col s6">
                                            <input id="office_contact" type="text" class="validate" name="office_contact">
                                            <label for="office_contact">Office Contact no</label>
                                          </div>
                                          <div class="input-field col s6">
                                            <input id="reg_no" type="text" class="validate" name="reg_no">
                                            <label for="reg_no">Registration No</label>
                                          </div>
                                          <div class="input-field col s6">
                                            <input id="tin_no" type="text" class="validate" name="tin_no">
                                            <label for="tin_no">Tin No</label>
                                          </div>
                                          <div class="input-field col s6">
                                            <select name="city">
                                                <option value="" disabled selected>Choose your option</option>
                                          <?php

                                          $sobj = new city_masterController();
                                          $city_masterModel = new city_masterModel();
                                          $data = $sobj->ShowCityData($city_masterModel);
                                          foreach ($data as $result) 
                                          { ?>
                                          <option value="<?php echo $result['city_id']; ?>"><?php echo $result['city']; ?></option>

                                          <?php } ?>
                                              </select>
                                              <label>City</label>
                                          </div>
                                          <div class="input-field col s6">
                                            <select name="state">
                                                <option value="" disabled selected>Choose your option</option>
                                                <?php

                                                    $sobj = new state_masterController();
                                                    $state_masterModel = new state_masterModel();
                                                    $data = $sobj->ShowStateData($state_masterModel);
                                                    foreach ($data as $result) 
                                                    { ?>
                                                    <option value="<?php echo $result['state_id']; ?>"><?php echo $result['state']; ?></option>

                                                    <?php } ?>
                                              </select>
                                              <label>State</label>
                                          </div>
                                          <div class="input-field col s12">
                                          <input id="pro_email" type="email" class="validate" name="pro_email">
                                          <label for="pro_email">Business Email</label>
                                          </div>
                                          <div class="input-field col s12">
                                            <textarea id="office_address" class="materialize-textarea" name="office_address"></textarea>
                                            <label for="office_address">Office Address</label>
                                          </div>
                                          <div class="file-field input-field col s8">
                                            <div class="btn">
                                              <span>Logo</span>
                                              <input type="file" name="photo">
                                            </div>
                                            <div class="file-path-wrapper">
                                              <input class="file-path validate" type="text">
                                            </div>
                                          </div>
                                          <div class="col s4">
                                            <img src="https://via.placeholder.com/150x150" alt="">
                                          </div>
                                          <br>
                                          <button class="btn col s12 waves-effect waves-light" type="submit" name="submit_profile">Submit
                                          </button>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                        <div id="change_password" class="col s12">
                            <div class="profile-content-fields">
                                <h4>Change Password</h4>
                                <div class="row">
                                    <div class="col s12">
                                      <div class="row">
                                        <div class="input-field col s12">
                                            <input id="current_password" type="password" class="validate" name="curr_pass">
                                            <label for="current_password">Current Password</label>
                                          </div>
                                          <div class="input-field col s12">
                                            <input id="new_password" type="password" class="validate" name="new_pass">
                                            <label for="new_password">New Password</label>
                                          </div>
                                          <div class="input-field col s12">
                                            <input id="re_enter_new_password" type="password" class="validate">
                                            <label for="re_enter_new_password">Re-Enter Password</label>
                                          </div>
                                          <button class="btn col s12 waves-effect waves-light" type="submit" name="update_pass">Change Password
                                        </button>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </section>
        <!-- End of Profile Section -->
