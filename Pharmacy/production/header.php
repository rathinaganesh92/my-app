<?php
require_once('controllers/database.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pharmacy Management System </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="home.php" class="site_title"><i class="fa fa-plus"></i> <span>Pharmacy Management System</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
              <!--  <img src="images/img.jpg" alt="..." class="img-circle profile_img">-->
              <i class="fa fa-user fa-5x"></i>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['name']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="home.php"><i class="fa fa-home"></i> Home </a>

                   <li><a href="search.php"><i class="fa fa-search"></i> Search Medicine </a>

          
                   
                  <li><a href="Stock.php"><i class="fa fa-list-ul"></i> Stock List </a>

                
                    <li><a  href= "Sales.php"><i class="fa fa-money"></i> Sales </a>

                    

                       <li><a  href= "Bill.php"><i class="fa  fa-print"></i> Bill Receipt</a>


                  <li><a  href= "order.php"><i class="fa fa-street-view"></i> Order Providers </a>

                  <li><a  href= "Diagnosis.php"><i class="fa fa-stethoscope"></i> Diagnosis </a>
                  
                  

                   <li><a href= "pharmacists.php"><i class="fa fa-user-md"></i> Pharmacists </a>

                    <li><a href= "patients.php"><i class="fa fa-wheelchair"></i> Patients </a>

                    <li><a href="registers.php"><i class="fa fa-users"></i> Register Patient </a>
					
					<?php $id = $_SESSION['user_id'];
					 $Query = "SELECT type FROM users where id='$id'";
                        $result = mysqli_query($conn,$Query);
                        $row = mysqli_fetch_assoc($result);
                        if($row['type'] == 1){
							?>
							
					<li><a  href="Entry.php"><i class="fa fa-database "></i> Stock Entry </a>
					<li><a  href="createuser.php"><i class="fa fa-user "></i> Create User </a>
					
						<?php }?>
                   
                </ul>
              </div>
           
            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                   <i class="fa fa-user fa-5x"></i> <?php echo $_SESSION['name']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li><a href="controllers/authenticate.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
