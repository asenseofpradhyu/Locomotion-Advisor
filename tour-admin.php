<?php 
session_start();
include("App_Code/AdminController.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Operator Dashboard</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />

    <!--  Scripts-->
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
    <script src="js/app.js"></script>
</head>

<body>
    <form action="tour-admin.php<?php if(isset($_REQUEST['page'])){echo "?page=".$_REQUEST['page'];} ?>" method="post"
        enctype="multipart/form-data">
        <!-- Start of Nav Bar -->
        <nav class="light-blue lighten-1 right-content" role="navigation">
            <div class="nav-wrapper ">
                <a id="logo-container" href="#" class="logo-font"></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="#" class="tooltipped" data-position="bottom" data-tooltip="Notifications"><i
                                class="material-icons white-text">notifications</i></a></li>
                    <li><a href="logout.php" class="tooltipped" data-position="bottom" data-tooltip="logout"><i
                                class="material-icons white-text">exit_to_app</i></a></li>
                    <li><a href=""></a></li>
                </ul>

                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        <!-- End f=of Nav Bar -->

        <!-- Start of Side Nav Bar -->
        <ul id="slide-out" class="sidenav sidenav-fixed">
            <li>
                <div class="user-view">
                    <div class="background">
                        <img src="https://source.unsplash.com/random/300x200">
                    </div>
                    <a href="#user"><img class="circle" src="https://source.unsplash.com/random/600x600"></a>
                    <a href="#name"><span class="white-text name"><?php 
                    $user_master_mod = new user_masterModel();
                    $obj = new user_masterController();
                    echo $obj->GetUserName($user_master_mod);
                    ?></span></a>
                </div>
            </li>
            <li><a href="#!" class="waves-effect"><i class="material-icons">dashboard</i>Dashboard</a></li>
            <li>
                <div class="divider"></div>
            </li>

            <li>
                <ul class="collapsible collapsible-accordion">
                    <!-- Profile -->
                    <li><a class="waves-effect" href="tour-admin.php?page=tour-profile.php"><i
                                class="material-icons">art_track</i>Profile</a></li>
                    <!-- Order Menu -->
                    <li><a class="waves-effect" href="tour-admin.php?page=customer_ordermenu.php"><i
                                class="material-icons">shopping_cart</i>Order Menu</a></li>
                    <!-- Package Menu -->
                    <li><a class="waves-effect" href="tour-admin.php?page=tour_package_menu.php"><i
                           class="material-icons">local_activity</i>Package Menu</a></li>
                </ul>
            </li>
        </ul>
        <!-- <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->
        <!-- End of Side  Nav Bar -->


<?php 

if(isset($_REQUEST['page'])){

    include($_REQUEST['page']);

    } else {

    include('tour-profile.php');

}
?>

    </form>
</body>

</html>