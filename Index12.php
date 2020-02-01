<?php 
 session_start();
 require 'App_code/Controller.php';

  $user_master_Mod = new user_masterModel();
  $obj = new user_masterController();


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Locomotion Advisor</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

   <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/app.js"></script>

</head>




<body>
  <!-- Start of Navbar-->
  <form action="index.php<?php if(isset($_REQUEST['page'])){echo "?page=".$_REQUEST['page'];} ?>" method="post" enctype="multipart/form-data">
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo">MVC</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.php">Home</a></li>
        <li style="display:<?php if(isset($_SESSION['user'])){echo "block";}else{echo "none";} ?>">
        <?php 
        if(isset($_SESSION['user']))
        {
         $user_master_Mod->user_id = $_SESSION["user"];
         echo $obj->GetUserName($user_master_Mod);
        }
        ?>
        </li>
        <li style="display:<?php if(isset($_SESSION['user'])){echo "block";} else{echo "none";} ?>">
          <a href="logout.php">Logout</a>
        </li>

        <li style="display:<?php if(isset($_SESSION['user'])){echo "none";}else{echo "block";} ?>"><a href="#loginbox" class="modal-trigger">Login</a></li>
        <li  style="display:<?php if(isset($_SESSION['user'])){echo "none";}else{echo "block";} ?>"><a href="index.php?page=registration.php">Register</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
          <li><div class="user-view">
              <div class="background sidenav-img">
                <img src="img/Holiday Blue Sky.jpg">
              </div>
              <a href="#user"><img class="circle" src="img/Black Wings.jpg"></a>
              <a href="#name"><span class="white-text name"><?php
                    // $user_master_Mod = new user_masterModel();
                    if(isset($_SESSION['user']))
                    {
                     $user_master_Mod->user_id = $_SESSION["user"];
                     echo $obj->GetUserName($user_master_Mod);
                    }
              
              ?></span></a>
              <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
            </div></li>
            <li><a href="index.php"><i class="material-icons">home</i>Home</a></li>
            <li><a href="#loginbox" class="modal-trigger"><i class="material-icons">face</i>Login</a></li>
            <li><a href="index.php?page=registration.php"><i class="material-icons">dvr</i>Register</a></li>
            <li><div class="divider"></div></li>
            <li><a class="subheader">Subheader</a></li>
            <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <!-- End of Navbar-->

  

<?php 
if(isset($_REQUEST['page'])) {
    include($_REQUEST['page']);
} else {
    include('home.php');
}

?>
  

<?php 
   
   

    if(isset($_POST['login'])){

      $user_master_Mod->email = $_POST['username'];
      $user_master_Mod->password = $_POST['loginpass'];
    
      $test = $obj->Userlogin($user_master_Mod);
      $val = explode("|", $test);

      if($val[1] == "1"){
        $_SESSION["user"] = $val[0];
        $user_master_Mod->user_id = $val[0];
       echo "<script>M.toast({html: 'Welcome!! ".$obj->GetUserName($user_master_Mod)."'}); window.location.href='Index.php';</script>";
      }
      else
      {
        echo "<script>M.toast({html: 'Wrong ID & Password'});</script>";
      }
    }
?>
    <!--Start of Login Popup Box-->

  <div id="loginbox" class="modal">
    <div class="modal-content">
      <h4>login</h4>
    <div class="row">
        <div class="col m12">
            <div class="input-field">
            <i class="material-icons prefix">account_circle</i>
                <input type="text" name="username" id="username" class="icon_prefix">
                <label for="username">Username or Email</label>
                  </div>
        </div>
        <div class="col m12">
            <div class="input-field">
            <i class="material-icons prefix">mode_edit</i>
                <input type="password" name="loginpass" id="loginpass" class="icon_prefix">
                <label for="loginpass">Password</label>
            </div>
        </div>
    </div>
    </div>
    <div class="modal-footer">
        <button class="btn waves-effect waves-light" type="submit" name="login">Login
             <i class="material-icons right">check</i>
        </button>
    </div>
  </div>
         
   <!--End of Login Popup Box--> 





   <!--Start of Footer Section--> 

   <footer class="page-footer">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">Footer Content</h5>
            <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
          </div>
          <div class="col l4 offset-l2 s12">
            <h5 class="white-text">Links</h5>
            <ul>
              <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
              <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
              <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
              <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
        © 2018 Copyright Text
        <a class="grey-text text-lighten-4 right" href="#!">Materialize MVC </a>
        </div>
      </div>
    </footer>

   <!--End of Footer Section--> 

</form>

  </body>
</html>
