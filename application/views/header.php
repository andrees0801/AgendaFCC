<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Agenda FCC</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Calendar CSS -->
    
	<link href='<?php echo base_url();?>libs/calendar/core/main.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>libs/calendar/daygrid/main.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>libs/calendar/timegrid/main.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>libs/calendar/list/main.css' rel='stylesheet' /> 

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>libs/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url(); ?>libs/colors/default-dark.css" id="theme" rel="stylesheet">
	<!-- Nuestros estilos -->

	<link href="<?php echo base_url(); ?>libs/estilos-fcc.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border fix-sidebar">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Agenda FCC</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img height="80" width="80" src="<?php echo base_url(); ?>images/logo.png" alt="homepage" class="dark-logo" /> -->
                            
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         
                         <!-- Light Logo text -->
						 
                        </span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item hidden-sm-down"></li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        
                        <li class="nav-item dropdown mega-dropdown">
							<a href="<?php echo base_url(); ?>Welcome/login" class="nav-link dropdown-toggle waves-effect waves-dark">
								<i class="fa fa-user-circle"></i>
							</a>
                        </li>
                        
                    </ul>
                </div>
            </nav>
        </header>
