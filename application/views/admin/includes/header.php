<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Car Sale - Dashboard</title>

        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bootstrap/css/bootstrap.min.css">
<!--        <link rel="stylesheet" href="--><?php //echo base_url(); ?><!--assets/admin/css/bootstrap-select.min.css">-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/skins/_all-skins.min.css">



        <link href="<?php echo base_url(); ?>assets/admin/dist/css/datepicker.min.css" rel="stylesheet" type="text/css">

<!--        <link href="--><?php //echo base_url(); ?><!--assets/admin/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css">-->

        <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">



        <link href="<?php echo base_url() ?>assets/admin/css/jquery.fileuploader.css" media="all" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/admin/css/jquery.fileuploader-theme-dragdrop.css" media="all" rel="stylesheet">
        <!-- <link rel="stylesheet" href="<?php /*echo base_url(); */?>assets/plugins/jquery-ui/jquery-ui.min.css">-->
        <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->

        <!--<link href="<?php /*echo base_url(); */?>assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css">-->

        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/css/custom.css">
<!--        <link rel="stylesheet" type="text/css" href="--><?php //echo base_url(); ?><!--assets/css/style.css">-->

<!--        <link rel="stylesheet" type="text/css" href="--><?php //echo base_url(); ?><!--assets/css/custom.css">-->


        <!--<link href="<?php /*echo base_url(); */?>assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css">
        -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/sweatalert-lib/sweetalert.css">

    </head>
<body class="hold-transition skin-blue sidebar-mini" onload="initialize()" data-baseurl="<?php echo base_url(); ?>">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url() ?>admin" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>V</b>S</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Car Sale</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
<!--                    <li class="dropdown messages-menu">-->
<!--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
<!--                            <i class="fa fa-envelope-o"></i>-->
<!--                            <span class="label label-success">4</span>-->
<!--                        </a>-->
<!--                        <ul class="dropdown-menu">-->
<!--                            <li class="header">You have 4 messages</li>-->
<!--                            <li>-->
<!--                                <!-- inner menu: contains the actual data -->
<!--                                <ul class="menu">-->
<!--                                    <li><!-- start message -->
<!--                                        <a href="#">-->
<!--                                            <div class="pull-left">-->
<!--                                                <img src="--><?php //echo base_url(); ?><!--assets/img/logo.png" class="img-circle" alt="User Image">-->
<!--                                            </div>-->
<!--                                            <h4>-->
<!--                                                Support Team-->
<!--                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>-->
<!--                                            </h4>-->
<!--                                            <p>Why not buy a new awesome theme?</p>-->
<!--                                        </a>-->
<!--                                    </li><!-- end message -->
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <div class="pull-left">-->
<!--                                                <img src="--><?php //echo base_url(); ?><!--assets/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">-->
<!--                                            </div>-->
<!--                                            <h4>-->
<!--                                                AdminLTE Design Team-->
<!--                                                <small><i class="fa fa-clock-o"></i> 2 hours</small>-->
<!--                                            </h4>-->
<!--                                            <p>Why not buy a new awesome theme?</p>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <div class="pull-left">-->
<!--                                                <img src="--><?php //echo base_url(); ?><!--assets/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">-->
<!--                                            </div>-->
<!--                                            <h4>-->
<!--                                                Developers-->
<!--                                                <small><i class="fa fa-clock-o"></i> Today</small>-->
<!--                                            </h4>-->
<!--                                            <p>Why not buy a new awesome theme?</p>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <div class="pull-left">-->
<!--                                                <img src="--><?php //echo base_url(); ?><!--assets/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">-->
<!--                                            </div>-->
<!--                                            <h4>-->
<!--                                                Sales Department-->
<!--                                                <small><i class="fa fa-clock-o"></i> Yesterday</small>-->
<!--                                            </h4>-->
<!--                                            <p>Why not buy a new awesome theme?</p>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <div class="pull-left">-->
<!--                                                <img src="--><?php //echo base_url(); ?><!--assets/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">-->
<!--                                            </div>-->
<!--                                            <h4>-->
<!--                                                Reviewers-->
<!--                                                <small><i class="fa fa-clock-o"></i> 2 days</small>-->
<!--                                            </h4>-->
<!--                                            <p>Why not buy a new awesome theme?</p>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </li>-->
<!--                            <li class="footer"><a href="#">See All Messages</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
                    <!-- Notifications: style can be found in dropdown.less -->
<!--                    <li class="dropdown notifications-menu">-->
<!--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
<!--                            <i class="fa fa-bell-o"></i>-->
<!--                            <span class="label label-warning">10</span>-->
<!--                        </a>-->
<!--                        <ul class="dropdown-menu">-->
<!--                            <li class="header">You have 10 notifications</li>-->
<!--                            <li>-->
<!--                                <!-- inner menu: contains the actual data -->
<!--                                <ul class="menu">-->
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <i class="fa fa-users text-red"></i> 5 new members joined-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <i class="fa fa-shopping-cart text-green"></i> 25 sales made-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <i class="fa fa-user text-red"></i> You changed your username-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </li>-->
<!--                            <li class="footer"><a href="#">View all</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
                    <!-- Tasks: style can be found in dropdown.less -->
<!--                    <li class="dropdown tasks-menu">-->
<!--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
<!--                            <i class="fa fa-flag-o"></i>-->
<!--                            <span class="label label-danger">9</span>-->
<!--                        </a>-->
<!--                        <ul class="dropdown-menu">-->
<!--                            <li class="header">You have 9 tasks</li>-->
<!--                            <li>-->
<!--                                <!-- inner menu: contains the actual data -->
<!--                                <ul class="menu">-->
<!--                                    <li><!-- Task item -->
<!--                                        <a href="#">-->
<!--                                            <h3>-->
<!--                                                Design some buttons-->
<!--                                                <small class="pull-right">20%</small>-->
<!--                                            </h3>-->
<!--                                            <div class="progress xs">-->
<!--                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">-->
<!--                                                    <span class="sr-only">20% Complete</span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </a>-->
<!--                                    </li><!-- end task item -->
<!--                                    <li><!-- Task item -->
<!--                                        <a href="#">-->
<!--                                            <h3>-->
<!--                                                Create a nice theme-->
<!--                                                <small class="pull-right">40%</small>-->
<!--                                            </h3>-->
<!--                                            <div class="progress xs">-->
<!--                                                <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">-->
<!--                                                    <span class="sr-only">40% Complete</span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </a>-->
<!--                                    </li><!-- end task item -->
<!--                                    <li><!-- Task item -->
<!--                                        <a href="#">-->
<!--                                            <h3>-->
<!--                                                Some task I need to do-->
<!--                                                <small class="pull-right">60%</small>-->
<!--                                            </h3>-->
<!--                                            <div class="progress xs">-->
<!--                                                <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">-->
<!--                                                    <span class="sr-only">60% Complete</span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </a>-->
<!--                                    </li><!-- end task item -->
<!--                                    <li><!-- Task item -->
<!--                                        <a href="#">-->
<!--                                            <h3>-->
<!--                                                Make beautiful transitions-->
<!--                                                <small class="pull-right">80%</small>-->
<!--                                            </h3>-->
<!--                                            <div class="progress xs">-->
<!--                                                <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">-->
<!--                                                    <span class="sr-only">80% Complete</span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </a>-->
<!--                                    </li><!-- end task item -->
<!--                                </ul>-->
<!--                            </li>-->
<!--                            <li class="footer">-->
<!--                                <a href="#">View all tasks</a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </li>-->
                    <!-- User Account: style can be found in dropdown.less -->
                    <?php $session_array  = $this->session->userdata('logged_in_admin');
                    //var_dump($session_array); ?>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo base_url(); ?>assets/admin/img/avatar5.png" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?php echo $session_array['fname']; ?> <?php echo $session_array['lname']; ?><i class="fa fa-angle-down" style="padding-left: 10px"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo base_url(); ?>assets/admin/img/avatar5.png" class="img-circle" alt="User Image">
                                <p>
<!--                                   --><?php //echo $session_array['username']. "<br>";
//                                   $this->load->model('Employee');
//                                   $bplocation = $this->Employee->getBPLocationNameById($session_array['bp_location']);
//                                   //var_dump($bplocation);
//                                   if($bplocation == null){
//
//                                   }else{
//                                       echo $bplocation[0]->loc_name;
//                                   }
//
//                                   ?>
                                    <!--<small>Member since Nov. 2016</small>-->
                                </p>
                            </li>
                            <!-- Menu Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo base_url(); ?>LoginAdmin/logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out m-r-xs"></i>Log out</a>
                                    <!--<a href="#" class="btn btn-default btn-flat">Sign out</a>-->
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
<!--                    <li>-->
<!--                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>-->
<!--                    </li>-->
                </ul>
            </div>
        </nav>
    </header>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript" async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3KhIAoLaY7Kq6b3cM8kYXMHgxpsTV2Nk&callback"></script>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <?php

                    if($session_array['user_role'] == 1){
                        include('admin-sidebar.php');
                    }else if($session_array['user_role'] == 2){
                        include('manager-sidebar.php');
                    }else if($session_array['user_role'] == 3){
                        include('employee-sidebar.php');
                    }
            ?>

        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!--<section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>-->
