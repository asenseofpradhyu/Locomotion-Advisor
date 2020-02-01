<?php 
require 'App_code/AdminController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Hotel Operator Dashboard</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/c_style.css" type="text/css" rel="stylesheet" media="screen,projection" />

    <!--  Scripts-->
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
    <script src="js/app.js"></script>
</head>

<body>
    <form action="hotel_admin.php<?php if(isset($_REQUEST['page'])){echo "?page=".$_REQUEST['page'];} ?>" method="post"
        enctype="multipart/form-data">
        <!-- Start of Nav Bar -->
        <nav class="light-blue lighten-1 right-content" role="navigation">
            <div class="nav-wrapper ">
                <a id="logo-container" href="#" class="logo-font">Hotel Operator</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="#" class="tooltipped" data-position="bottom" data-tooltip="Notifications"><i
                                class="material-icons white-text">notifications</i></a></li>
                    <li><a href="#" class="tooltipped" data-position="bottom" data-tooltip="logout"><i
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
                    <a href="#name"><span class="white-text name">John Doe</span></a>
                    <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
                </div>
            </li>
            <li><a href="#!" class="waves-effect"><i class="material-icons">dashboard</i>Dashboard</a></li>
            <li>
                <div class="divider"></div>
            </li>

            <li>
                <ul class="collapsible collapsible-accordion">
                    <!-- Profile -->
                    <li><a class="waves-effect" href="tour_admin.php?page=hotel_profile.php"><i
                                class="material-icons">art_track</i>Profile</a></li>
                    <!-- Order Menu -->
                    <li><a class="waves-effect" href="tour_admin.php?page=hotel_order_menu.php"><i
                                class="material-icons">shopping_cart</i>Order Menu</a></li>
                    <!-- Pak=ckage Menu -->
                    <li><a class="waves-effect" href="tour_admin.php?page=hotel_package_menu.php"><i
                                class="material-icons">local_activity</i>Package Menu</a></li>
                    <!-- Report -->
                    <li><a class="collapsible-header margin"><i class="material-icons">class</i>Report</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a class="waves-effect" href="tour_admin.php?page=states.php"><i
                                            class="material-icons">alarm_on</i>Daily</a></li>
                                <li><a class="waves-effect" href="tour_admin.php?page=city.php"><i
                                            class="material-icons">library_books</i>Monthly</a></li>
                                <li><a class="waves-effect" href="tour_admin.php?page=city.php"><i
                                            class="material-icons">map</i>Yearly</a></li>
                                <li><a class="waves-effect" href="tour_admin.php?page=city.php"><i
                                            class="material-icons">date_range</i>Date Filter</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->
        <!-- End of Side  Nav Bar -->

<main>
<?php 

if(isset($_REQUEST['page'])) {

 include($_REQUEST['page']);

} else {

 include('dashboard.php');

}

?>


    </form>
</body>

</html>