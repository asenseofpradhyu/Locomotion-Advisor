<?php 
// session_start();

echo "<script>editUserprofileMaster(".$_SESSION['user'].")</script>";

$user_masterMod = new user_masterModel();
$obj = new user_masterController();

if(isset($_POST['submit_profile'])){

  $user_masterMod->name = $_POST['name'];
  $user_masterMod->email = $_POST['email'];
  $user_masterMod->mobile = $_POST['mobile'];
  $user_masterMod->contact_no = $_POST['contact_no'];
  $user_masterMod->city_id = $_POST['city'];
  $user_masterMod->state_id = $_POST['state'];
  $user_masterMod->dob = $_POST['dob'];
  $user_masterMod->gender = $_POST['gender'];
  $user_masterMod->address = $_POST['address'];


  if(!empty($user_masterMod->name) && !empty($user_masterMod->email) && !empty($user_masterMod->mobile) && !empty($user_masterMod->contact_no) && !empty($user_masterMod->city_id) && !empty($user_masterMod->state_id) && !empty($user_masterMod->dob) && !empty($user_masterMod->gender) && !empty($user_masterMod->address)){

// Proifle Image Uploader 
if($_FILES['photo']['error'] > 0 ){
  echo "<script>M.toast({html: 'Please Add Profile Photo'});</script>";
} else {
  $photopath = "img/customerprofile/".$_FILES['photo']['name'];
  move_uploaded_file($_FILES['photo']['tmp_name'], $photopath);
  $user_masterMod->photo = $photopath;
}
        if($obj->UpdateUserProfile($user_masterMod)){

            echo "<script>M.toast({html: 'Profile Saved'});</script>";
        } else {
            echo "<script>M.toast({html: 'Error while Saving Profile'});</script>";
        }
    }
}

if(isset($_POST['update_pass'])){

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

        <section id="customer-profile-section" class="right-content">
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
                                <h4>Profile</h4>
                                <div class="row">
                                    <div class="col s12">
                                      <div class="row">
                                      <input type="hidden" name="editcustomerprofile">
                                        <div class="input-field col s6">
                                          <input id="full_name" type="text" class="validate" name="name">
                                          <label for="full_name">Full Name</label>
                                        </div>
                                        <div class="input-field col s6">
                                          <input id="email" type="email" class="validate" name="email">
                                          <label for="email">Email</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="mobile" type="text" class="validate" name="mobile">
                                            <label for="mobile">Mobile Number</label>
                                          </div>
                                          <div class="input-field col s6">
                                            <input id="contact_no" type="text" class="validate" name="contact_no">
                                            <label for="contact_no">Contact No</label>
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
                                          <div class="input-field col s6">
                                            <select name="gender">
                                                <option value="" disabled selected>Choose your Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                              </select>
                                              <label>Gender</label>
                                          </div>
                                          <div class="input-field col s6">
                                          <input type="text" class="datepicker" name="dob">
                                          <label>Birthdate</label>
                                          </div>
                                          <div class="input-field col s12">
                                            <textarea id="address" class="materialize-textarea" name="address"></textarea>
                                            <label for="address">Address</label>
                                          </div>
                                          <div class="file-field input-field col s8">
                                            <div class="btn">
                                              <span>Profile photo</span>
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
                                          <button class="btn col s12 waves-effect waves-light" type="submit" value="Submit" name="submit_profile">Submit
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
