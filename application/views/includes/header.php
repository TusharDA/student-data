<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Student</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <style>
    	.error{
    		color:red;
    		font-weight: normal;
    	}
    </style>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/validate.js"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url('user/home'); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>CSD</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Student</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $name; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $name; ?>
                      <small><?php echo $role_text; ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url(); ?>loadChangePass" class="btn btn-default btn-flat"><i class="fa fa-key"></i> Change Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
         <!--   <li class="treeview">
              <a href="<?php echo base_url(); ?>dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>-->
            
            <?php
            if($role == ROLE_ADMIN || $role == ROLE_MANAGER)
            {
            ?>
            
            <?php
            }
            if($role == ROLE_ADMIN)
            {
            ?>
            <li class="treeview">
            <a href="<?php echo base_url('user/home'); ?>">
              <i class="fa fa-cogs"></i>
              <span>Dashboard</span>
              </a>
              </li>
			<li class="treeview">
                                <a href="<?php echo site_url('user/viewstudentlist');?>">
                                    
                                            <i class="fa fa-barcode"></i> <span>Student</span>
                                        </a>
                                    </li>


	<!---------------------------------------------------------------------------------------------------->	
	     <li class="treeview">
                                                <a href="<?php echo site_url('user/moderator_dash');?>">
                                                    <i class="fa fa-cubes"></i>
                                                    <span>Moderator</span>
                                                    <i class="fa fa-angle-left pull-right"></i>
                                                </a>
                                                <ul class="treeview-menu" style="max-height: 90px;overflow-y: auto;overflow-x: hidden;">
                                                    <li>
                                                        <a href="<?php echo site_url('user/viewstudentlist');?>">
                                                            <i class="fa fa-barcode"></i> <span>Student List</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo site_url('user/view_data_entry_operator');?>">
                                                            <i class="fa fa-barcode"></i> <span>Data Entry list</span>
                                                        </a>
                                                    </li>
													<li>
                                                        <a href="<?php echo site_url('user/deactivated_stud');?>">
                                                            <i class="fa fa-barcode"></i> <span>Deactive Student list</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
	<!---------------------------------------------------------------------------------------------------->	
	<li class="treeview">
                                <a href="<?php echo site_url('user/userListing');?>">
                                    <i class="fa fa-user"></i>
                                    <span>User Settings</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu" style="max-height: 90px;overflow-y: auto;overflow-x: hidden;">
                                    <li>
                                        <a href="<?php echo site_url('user/userListing');?>">
                                            <i class="fa fa-barcode"></i> <span>User List</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
	<!---------------------------------------------------------------------------------------------------->	
			<!--<li class="treeview">
              <a href="<?php //echo base_url('user/'); ?>">
                <i class="fa fa-cogs"></i>
                <span>Data Entry Operator</span>

			
              </a>
            </li>
			<li class="treeview">
              <a href="<?php //echo base_url('user/moderator_dash'); ?>">
                <i class="fa fa-cogs"></i>
                <span>Moderator</span>
              </a>
            </li>-->
			<?php
			 
			?>
          <!--  <li class="treeview">
              <a href="<?php// echo base_url('user/editOld'); ?>">
                <i class="fa fa-cogs"></i>
                <span>User Settings</span>
              </a>
            </li>-->
            <?php
            }
            ?>
			
           
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>