<?php 

session_start();
require 'App_code/AdminController.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
  <title>Locomotion Advisor</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,700,800" rel="stylesheet">
  <link href="css/normalize.css" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="css/c_style.css" type="text/css" rel="stylesheet" media="screen,projection" />

  <!--  Scripts-->
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

</head>
<body>


<?php 


$user_masterModel = new user_masterModel();
$obj = new user_masterController();

if(isset($_POST['guest_submit'])){
  
   $user_masterModel->name = $_POST['guest_fullname'];
   $user_masterModel->email = $_POST['guest_email'];
   $user_masterModel->mobile = $_POST['guest_mobile'];
   $user_masterModel->gender = $_POST['guest_gender'];
   $user_masterModel->password = $_POST['guest_password'];
   $user_masterModel->ur_id = $_POST['guest_ur_id'];

   if(!empty($user_masterModel->name) && !empty($user_masterModel->email) && !empty($user_masterModel->mobile) && !empty($user_masterModel->gender) && !empty($user_masterModel->password)){

    if($obj->InsertRegistrationData($user_masterModel)){

            echo "<script>M.toast({html: 'Your are now Registrated'});</script>";
        } else {
            echo "<script>M.toast({html: 'Error while Registration'});</script>";
        }

  } else {
    echo "<script>M.toast({html: 'Please select all fields'});</script>";
  }

}

if(isset($_POST['member_submit'])){
  
  $user_masterModel->name = $_POST['member_fullname'];
  $user_masterModel->email = $_POST['member_email'];
  $user_masterModel->mobile = $_POST['member_mobile'];
  $user_masterModel->gender = $_POST['member_gender'];
  $user_masterModel->password = $_POST['member_password'];
  $user_masterModel->ur_id = $_POST['member_ur_id'];

  if(!empty($user_masterModel->name) && !empty($user_masterModel->email) && !empty($user_masterModel->mobile) && !empty($user_masterModel->gender) && !empty($user_masterModel->password)){

   if($obj->InsertRegistrationData($user_masterModel)){

           echo "<script>M.toast({html: 'Your are now Registrated'});</script>";
       } else {
           echo "<script>M.toast({html: 'Error while Registration'});</script>";
       }

 } else {
   echo "<script>M.toast({html: 'Please select all fields'});</script>";
 }

}

if(isset($_POST['tour_submit'])){
  
  $user_masterModel->name = $_POST['tour_fullname'];
  $user_masterModel->email = $_POST['tour_email'];
  $user_masterModel->mobile = $_POST['tour_mobile'];
  $user_masterModel->gender = $_POST['tour_gender'];
  $user_masterModel->password = $_POST['tour_password'];
  $user_masterModel->ur_id = $_POST['tour_ur_id'];

  if(!empty($user_masterModel->name) && !empty($user_masterModel->email) && !empty($user_masterModel->mobile) && !empty($user_masterModel->gender) && !empty($user_masterModel->password)){

   if($obj->InsertOperatorRegistrationData($user_masterModel)){

           echo "<script>M.toast({html: 'Your are now Registrated'});</script>";
       } else {
           echo "<script>M.toast({html: 'Error while Registration'});</script>";
       }

 } else {
   echo "<script>M.toast({html: 'Please select all fields'});</script>";
 }

}

if(isset($_POST['resort_submit'])){
  
  $user_masterModel->name = $_POST['resort_fullname'];
  $user_masterModel->email = $_POST['resort_email'];
  $user_masterModel->mobile = $_POST['resort_mobile'];
  $user_masterModel->gender = $_POST['resort_gender'];
  $user_masterModel->password = $_POST['resort_password'];
  $user_masterModel->ur_id = $_POST['resort_ur_id'];

  if(!empty($user_masterModel->name) && !empty($user_masterModel->email) && !empty($user_masterModel->mobile) && !empty($user_masterModel->gender) && !empty($user_masterModel->password)){

   if($obj->InsertOperatorRegistrationData($user_masterModel)){

           echo "<script>M.toast({html: 'Your are now Registrated'});</script>";
       } else {
           echo "<script>M.toast({html: 'Error while Registration'});</script>";
       }

 } else {
   echo "<script>M.toast({html: 'Please select all fields'});</script>";
 }

}

if(isset($_POST['login_submit'])){
  $user_master_Mod = new user_masterModel();
  $user_master_Mod->email = $_POST['user_email'];
  $user_master_Mod->password = $_POST['user_password'];

  $user_login = $obj->Userlogin($user_master_Mod);
  $val = explode("|", $user_login);

  if($val[1] == "1"){

    $_SESSION["user"] = $val[0];

    if($val[2] == "2") {

      echo "<script>window.location.href='payment.php'</script>";
      header("Location:tour-admin.php");

    } else if($val[2] == "4"){

      echo "<script>window.location.href='payment.php'</script>";
      header("Location:tour-admin.php");

    }

    else if($val[2] == "5"){

      $user_master_Mod->user_id = $val[0];
      echo "<script>M.toast({html: 'Welcome!! ".$obj->GetUserName($user_master_Mod)."'});
            </script>";
      header("Location:customer_admin.php");
      
    }
      else {

      $user_master_Mod->user_id = $val[0];
      echo "<script>M.toast({html: 'Welcome!! ".$obj->GetUserName($user_master_Mod)."'});</script>";
      header("Location:customer_admin.php");

    }
  }
  else
  {
    echo "<script>M.toast({html: 'Wrong ID & Password'});</script>";
  }
}


?>

  <form  method="post" enctype="multipart/form-data"> 
  
  <!-- Start of Navbar -->
  <header>
    <div class="side-fixed-nav">
      <a href="index.php">
        <img src="img/icon/logo.png" class="logo" alt="Logo">
      </a>
      <ul class="side-navbar">
        <li>
          <a href="#login" class="modal-trigger">
            <img src="img/icon/man.png" alt="Logo">
            <span>User!</span>
          </a>
        </li>
        <li>
          <a href="index.php">
            <img src="img/icon/home.png" alt="Home">
            <span>Home</span>
          </a>
        </li>
        <li>
          <a href="index.php?page=hotel-list.php">
            <img src="img/icon/hotel.png" alt="Hotel">
            <span>Hotel</span>
          </a>
        </li>
        <li>
          <a href="index.php?page=packages-list.php">
            <img src="img/icon/Tag.png" alt="Tag">
            <span>Tours</span>
          </a>
        </li>
        <li>
          <a href="index.php?page=faq.php"><img src="img/icon/conversation.png" alt="Conversation">
            <span>FAQ's</span>
          </a>
        </li>
        <li>
          <a href="index.php?page=about-us.php"><img src="img/icon/team.png" alt="Team">
            <span>Team</span>
          </a>
        </li>
        <li>
          <a href="index.php?page=contact.php"><img src="img/icon/contact.png" alt="Contact">
            <span>Contact</span>
          </a>
        </li>
      </ul>
    </div>

    <!-- Mobile Navbar -->
    <ul id="nav-mobile" class="sidenav">
      <li>
        <a href="#!">
          <img src="img/icon/man.png" alt="Logo">
          <span>User!</span>
        </a>
      </li>
      <li>
        <a href="#!">
          <img src="img/icon/home.png" alt="Home">
          <span>Home</span>
        </a>
      </li>
      <li>
        <a href="#!">
          <img src="img/icon/hotel.png" alt="Hotel">
          <span>Hotel</span>
        </a>
      </li>
      <li>
        <a href="#!">
          <img src="img/icon/Tag.png" alt="Tag">
          <span>Tag</span>
        </a>
      </li>
      <li>
        <a href="#!"><img src="img/icon/conversation.png" alt="Conversation">
          <span>FAQ's</span>
        </a>
      </li>
      <li>
        <a href="#!"><img src="img/icon/team.png" alt="Team">
          <span>Team</span>
        </a>
      </li>
      <li>
        <a href="#!"><img src="img/icon/contact.png" alt="Contact">
          <span>Contact</span>
        </a>
      </li>
    </ul>
    <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    <!-- End of Mobile Navbar -->
  </header>
  <!-- End of Navbar -->

  <!-- Start of Login & Registration Modal -->

  <!-- Modal Structure -->
  <div id="login" class="modal modal-section">
      <div class="modal-content">
          <div class="row login-modal">
              <div class="col m6 user-avatar">
                  <img src="img/icon/man.png" alt="">
                  <h3>Hi! User</h3>
                  
              </div>
              <div id="registration-btns" class="col m6 registration-btns">
                  <div class="col m6">
                     <a href="#guest" class="modal-trigger guest"><input type="button" class="reg-btn" value="Guest"></a> 
                  </div>
                  <div class="col m6">
                     <a href="#member_reg" class="modal-trigger member"><input type="button" class="reg-btn" value="Member"></a> 
                  </div>
                  <div class="col m6">
                     <a href="#tour_reg" class="modal-trigger tour"><input type="button" class="reg-btn" value="Tour"></a> 
                  </div>
                  <div class="col m6">
                     <a href="#resort_reg" class="modal-trigger resort"><input type="button" class="reg-btn" value="Resort"></a> 
                  </div>
                  <div class="col m12">
                        <div class="login-btn">
                            <a href="#login_form" class="modal-trigger login-btn pay-btn payment-btn" style="margin-bottom:10px;">login</a>
                            <a href="" ><input type="submit" name="tour_submit" class="modal-close pay-btn payment-btn" value="DashBoard"></a>
                        </div>
                    </div>
              </div>
          </div>
      </div>
      <!-- <div class="modal-footer">
          <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
      </div> -->
  </div>

  
  <div id="guest" class="modal guest-section">
        <div class="modal-content">
            <h4>Guest</h4>
            <div class="row">
                <div class="col s12">
                    <div class="row">
                        <div class="input-field col s6">
                            <input placeholder="John Doe" id="guest_fullname" name="guest_fullname" type="text" class="validate">
                            <label for="fullname">Full Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="guest_email" type="email" class="validate" name="guest_email" placeholder="example@example.com">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="guest_mobile" type="text" class="validate" name="guest_mobile" placeholder="987654321">
                            <label for="mobile">Mobile no:</label>
                        </div>
                        <div class="input-field col s6">
                                <select id="guest_gender" name="guest_gender">
                                  <option value="" disabled selected>Choose your option</option>
                                  <option value="male">Male</option>
                                  <option value="female">Female</option>
                                </select>
                                    <label>Gender</label>
                                  </div>
                        <div class="input-field col s6">
                                <input id="guest_password" type="password" class="validate" name="guest_password" placeholder="Password">
                                <label for="password">Password</label>
                        </div>
                        <div class="input-field col s6">
                                <input id="guest_confirm_password" type="password" name="guest_confirm_password" class="validate" placeholder="Confirm Password">
                                <label for="confirm_password">Confirm Password</label>
                        </div>
                        </div>
                        <input type="hidden" name="guest_ur_id" value="0">
                    </div>
            </div>
        </div>
        <div class="modal-footer">
            <!-- <a href="#!"  class="modal-close btn waves-effect waves-green btn-flat">Submit</a> -->
            <input type="submit" name="guest_submit" class="modal-close pay-btn payment-btn" value="Submit" >
        </div>
  </div>

    <div id="member_reg" class="modal member-section">
        <div class="modal-content">
            <h4>Member</h4>
            <div class="row">
                <div class="col s12">
                    <div class="row">
                        <div class="input-field col s6">
                            <input placeholder="John Doe" id="member_fullname" name="member_fullname" type="text" class="validate">
                            <label for="fullname">Full Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="member_email" type="email" class="validate" name="member_email" placeholder="example@example.com">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="member_mobile" type="text" name="member_mobile" class="validate" placeholder="987654321">
                            <label for="mobile">Mobile no:</label>
                        </div>
                        <div class="input-field col s6">
                                    <select name="member_gender">
                                      <option value="" disabled selected>Choose your option</option>
                                      <option value="male">Male</option>
                                      <option value="female">Female</option>
                                    </select>
                                    <label>Gender</label>
                                  </div>
                        <div class="input-field col s6">
                                <input id="member_password" type="password" class="validate" name="member_password" placeholder="Password">
                                <label for="password">Password</label>
                        </div>
                        <div class="input-field col s6">
                                <input id="member_confirm_password" type="password" name="member_confirm_password" class="validate" placeholder="Confirm Password">
                                <label for="confirm_password">Confirm Password</label>
                        </div>
                        </div>
                        <input type="hidden" name="member_ur_id" value="5">
                    </div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" name="member_submit" class="modal-close pay-btn payment-btn" value="Submit">
        </div>
    </div>
    
    <div id="tour_reg" class="modal tour-section">
        <div class="modal-content">
            <h4>Tour</h4>
            <div class="row">
                <div class="col s12">
                    <div class="row">
                        <div class="input-field col s6">
                            <input placeholder="John Doe" id="tour_fullname" name="tour_fullname" type="text" class="validate">
                            <label for="fullname">Full Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="tour_email" name="tour_email" type="email" class="validate" placeholder="example@example.com">
                            <label for="email">Email</label>
                        </div>

                        <div class="input-field col s6">
                            <input id="tour_mobile" type="text" name="tour_mobile" class="validate" placeholder="987654321">
                            <label for="mobile">Mobile no:</label>
                        </div>
                        <div class="input-field col s6">
                                    <select name="tour_gender">
                                      <option value="" disabled selected>Choose your option</option>
                                      <option value="male">Male</option>
                                      <option value="female">Female</option>
                                    </select>
                                    <label>Gender</label>
                                  </div>
                        <div class="input-field col s6">
                                <input id="tour_password" type="password" name="tour_password" class="validate" placeholder="Password">
                                <label for="password">Password</label>
                        </div>
                        <div class="input-field col s6">
                                <input id="tour_confirm_password" name="tour_confirm_password" type="password" class="validate" placeholder="Confirm Password">
                                <label for="confirm_password">Confirm Password</label>
                        </div>    
                        </div>
                        <input type="hidden" name="tour_ur_id" value="2">
                    </div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" name="tour_submit" class="modal-close pay-btn payment-btn" value="Submit" >
        </div>
    </div>


    <div id="resort_reg" class="modal resort-section">
        <div class="modal-content">
            <h4>Resort</h4>
            <div class="row">
                <div class="col s12">
                    <div class="row">
                        <div class="input-field col s6">
                            <input placeholder="John Doe" id="resort_fullname" name="resort_fullname" type="text" class="validate">
                            <label for="fullname">Full Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="resort_email" name="resort_email" type="email" class="validate" placeholder="example@example.com">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="resort_mobile" type="text" class="validate" name="resort_mobile" placeholder="987654321">
                            <label for="mobile">Mobile no:</label>
                        </div>
                        <div class="input-field col s6">
                            <select name="resort_gender">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                          <label>Gender</label>
                        </div>
                        <div class="input-field col s6">
                                <input id="resort_password" name="resort_password" type="password" class="validate" placeholder="Password">
                                <label for="password">Password</label>
                        </div>
                        <div class="input-field col s6">
                                <input id="resort_confirm_password" name="resort_confirm_password" type="password" class="validate" placeholder="Confirm Password">
                                <label for="confirm_password">Confirm Password</label>
                        </div>
                        </div>
                        <input type="hidden" name="resort_ur_id" value="4">
                    </div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" name="resort_submit" class="modal-close pay-btn payment-btn" value="Submit" >
        </div>
    </div>

    <div id="login_form" class="modal login-section">
        <div class="modal-content">
            <h4>Login</h4>
            <div class="row">
                <div class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input placeholder="example@example.com" id="login_email" name="user_email" type="email" class="validate">
                            <label for="login_email">Email</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="login_password" type="password" name="user_password">
                            <label for="login_password">Password</label>
                        </div>
                    </div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" name="login_submit" class="modal-close pay-btn payment-btn" value="Login">
        </div>
    </div>
    </div>


  <!-- End of Login & Registration Modal -->

 <!-- Start of Main Page Section -->

<main> 

<?php 
if(isset($_REQUEST['page'])){

  include($_REQUEST['page']);

} else {

  include('home_index.php');

}
?>
  


  <!-- Start of Footer Section -->
<footer>
        <div class="row">
          <div class="col s12">
            <div class="footer-content">
              <a href="index.php"><h5>Home</h5></a>
              <a href="index.php?page=package-list.php"><h5>Offer</h5></a>
              <a href="index.php?page=hotel-list.php"><h5>Hotels</h5></a>
              <a href="index.php" class="footer-logo"><h5>Locomotion<br>&nbsp; &nbsp;&nbsp;&nbsp;  Advisor</h5></a>
              <a href="index.php?page=about-us.php"><h5>Team</h5></a>
              <a href="index.php?page=contact.php"><h5>Contact</h5></a>
              <a href="index.php?page=faq.php"><h5>FAQ'S</h5></a>
            </div>
          </div>
        </div>
      </footer>
    <!-- End of Footer Section -->


    </main>

<!-- End of Main -->

  </form>

</body>

</html>