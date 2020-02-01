<?php 
require 'App_code/AdminController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Locomotion Dashboard</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />

    <!--  Scripts-->
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <!-- <script src="js/init.js"></script> -->
    <script src="js/app.js"></script>
</head>

<body>
<form action="admin_index.php<?php if(isset($_REQUEST['page'])){echo "?page=".$_REQUEST['page'];} ?>" method="post" enctype="multipart/form-data">
    <!-- Start of Nav Bar -->
    <nav class="light-blue lighten-1 right-content" role="navigation">
        <div class="nav-wrapper ">
            <!-- <a id="logo-container" href="#" class="brand-logo"></a> -->
            <ul class="right hide-on-med-and-down">
                <li><a href="#" class="tooltipped" data-position="bottom" data-tooltip="Notifications"><i class="material-icons white-text">notifications</i></a></li>
                <li><a href="logout.php" class="tooltipped" data-position="bottom" data-tooltip="logout"><i class="material-icons white-text">exit_to_app</i></a></li>
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
                <a href="#name"><span class="white-text name">John Doe</span></a>
                <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
            </div>
        </li>
        <li><a href="admin_index.php?=dashboard.php" class="waves-effect"><i class="material-icons">dashboard</i>Dashboard</a></li>
        <li>
            <div class="divider"></div>
        </li>

        <li>
            <ul class="collapsible collapsible-accordion">
                <!-- Masters -->
                <li><a href="#!" class="collapsible-header">Masters</a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a class="waves-effect" href="admin_index.php?page=role_master.php"><i class="material-icons">extension</i>Role Master</a></li>
                            <li><a class="waves-effect" href="admin_index.php?page=plan_master.php"><i class="material-icons">art_track</i>Plan Master</a></li>
                            <li><a class="waves-effect" href="admin_index.php?page=trip_master.php"><i class="material-icons">directions_car</i>Trip
                                    Master</a></li>
                            <li><a class="waves-effect" href="admin_index.php?page=faq_master.php"><i class="material-icons">comments</i>FAQ's Master</a></li>
                            <li><a class="waves-effect" href="admin_index.php?page=comission_master.php"><i class="material-icons">attach_money</i>Commisson
                                    Master</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Details -->
                <li><a class="collapsible-header">Details</a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a class="waves-effect" href="admin_index.php?page=user_details.php"><i class="material-icons">person</i>User Details</a></li>
                            <li><a class="waves-effect" href="admin_index.php?page=inquiry_details.php"><i class="material-icons">description</i>Inquiry
                                    Details</a></li>
                            <li><a class="waves-effect" href="admin_index.php?page=order_details.php"><i class="material-icons">shopping_cart</i>Order
                                    Details</a></li>
                            <li><a class="waves-effect" href="admin_index.php?page=package_details.php"><i class="material-icons">shopping_cart</i>Package Details</a></li>
                            <li><a class="waves-effect" href="admin_index.php?page=package_type.php"><i class="material-icons">local_activity</i>Package
                                    Type</a></li>
                        </ul>
                    </div>
                </li>
                <!-- Gallery -->
                <li><a class="collapsible-header">Gallery</a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a class="waves-effect" href="admin_index.php?page=trip_gallery.php"><i class="material-icons">collections</i>Trip Gallery</a></li>
                        </ul>
                    </div>
                </li>
                <!-- Places -->
                <li><a class="collapsible-header">Places</a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a class="waves-effect" href="admin_index.php?page=states.php"><i class="material-icons">place</i>States</a></li>
                            <li><a class="waves-effect" href="admin_index.php?page=city.php"><i class="material-icons">location_city</i>City</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <!--End of Collapsible bar-->
        </li>
    </ul>
    <!-- <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->
    <!-- End of Side  Nav Bar -->

   <?php 

   if(isset($_REQUEST['page'])) {

    include($_REQUEST['page']);

} else {

    include('order_details.php');

}

   ?>




    

</form>
</body>

</html>