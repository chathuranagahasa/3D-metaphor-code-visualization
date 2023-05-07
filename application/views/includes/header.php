
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <meta name="description" content="">
    <meta name="author" content="ScriptsBundle">
    <title>CarMart | Vehicle Marketplace</title>
    <!-- =-=-=-=-=-=-= Favicons Icon =-=-=-=-=-=-= -->
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/x-icon" />
    <!-- =-=-=-=-=-=-= Mobile Specific =-=-=-=-=-=-= -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- =-=-=-=-=-=-= Bootstrap CSS Style =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">

    <!-- =-=-=-=-=-=-= Template CSS Style =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <!-- =-=-=-=-=-=-= Font Awesome =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.css" type="text/css">
    <!-- =-=-=-=-=-=-= Flat Icon =-=-=-=-=-=-= -->
    <link href="<?php echo base_url(); ?>assets/css/flaticon.css" rel="stylesheet">
    <!-- =-=-=-=-=-=-= Et Line Fonts =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/et-line-fonts.css" type="text/css">
    <!-- =-=-=-=-=-=-= Menu Drop Down =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/carspot-menu.css" type="text/css">
    <!-- =-=-=-=-=-=-= Animation =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css" type="text/css">
    <!-- =-=-=-=-=-=-= Select Options =-=-=-=-=-=-= -->
    <link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet" />
    <!-- =-=-=-=-=-=-= noUiSlider =-=-=-=-=-=-= -->
    <link href="<?php echo base_url(); ?>assets/css/nouislider.min.css" rel="stylesheet">
    <!-- =-=-=-=-=-=-= Listing Slider =-=-=-=-=-=-= -->
    <link href="<?php echo base_url(); ?>assets/css/slider.css" rel="stylesheet">
    <!-- =-=-=-=-=-=-= Owl carousel =-=-=-=-=-=-= -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/owl.theme.css">
    <!-- =-=-=-=-=-=-= Check boxes =-=-=-=-=-=-= -->
    <link href="<?php echo base_url(); ?>assets/skins/minimal/minimal.css" rel="stylesheet">
    <!-- =-=-=-=-=-=-= PrettyPhoto =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.fancybox.min.css" type="text/css" media="screen"/>
    <!-- =-=-=-=-=-=-= Responsive Media =-=-=-=-=-=-= -->
    <link href="<?php echo base_url(); ?>assets/css/responsive-media.css" rel="stylesheet">
    <!-- =-=-=-=-=-=-= Template Color =-=-=-=-=-=-= -->
    <link rel="stylesheet" id="color" href="<?php echo base_url(); ?>assets/css/colors/defualt.css">
    <!-- For This Page Only -->
    <!-- Base MasterSlider style sheet -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/masterslider/style/masterslider.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/masterslider/skins/default/style.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/masterslider/style/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CSource+Sans+Pro:400,400i,600" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/admin/css/jquery.fileuploader.css" media="all" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/admin/css/jquery.fileuploader-theme-dragdrop.css" media="all" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css" />

    <!-- JavaScripts -->
    <script src="<?php echo base_url(); ?>assets/js/modernizr.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?php  echo base_url(); ?>assets/js/jquery.min.js"></script>

    <style>

        .menu-search-bar .btn-theme{
            background: #ed4c06;
            border: 1px solid #ed4c06;
        }

        .menu-search-bar .btn-theme:hover{
            background: #c34506;
            border: 1px solid #c34506;
        }

        .advertising .banner{
            padding: 0;
        }


        #login_btn a{
            color: #c34506;
        }

        #login_btn a:hover{
            color: #b38b01;
        }

        .mega-menu .menu-search-bar li, .mega-menu .menu-search-bar form, .mega-menu .menu-search-bar label{
            width: auto;
        }

        .menu-links li a{

            text-decoration: underline;
        }

        .heading-panel, .heading-panel-2{
            margin-bottom: 0;
        }



        .list-unstyled{
            min-height: 75px;
        }

    </style>
</head>
<body data-baseurl="<?php echo base_url(); ?>">
<!-- =-=-=-=-=-=-= Preloader =-=-=-=-=-=-= -->
<!--<div class="preloader"></div>-->
<!-- =-=-=-=-=-=-= Color Switcher =-=-=-=-=-=-= -->
<!--<div class="color-switcher" id="choose_color">-->
<!--    <a href="#." class="picker_close"><i class="fa fa-gear"></i></a>-->
<!--    <h5>STYLE SWITCHER</h5>-->
<!--    <div class="theme-colours">-->
<!--        <p> Choose Colour style </p>-->
<!--        <ul>-->
<!--            <li>-->
<!--                <a href="#." class="defualt" id="defualt"></a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a href="#." class="green" id="green"></a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a href="#." class="purple" id="purple"></a>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </div>-->
<!--    <div class="clearfix"> </div>-->
<!--</div>-->
<!-- =-=-=-=-=-=-=  Header =-=-=-=-=-=-= -->
<?php
$session_array  = $this->session->userdata('logged_in');
$this->load->model('UserModel');
//var_dump($session_array);
?>


<div class="clearfix"></div>
<!-- =-=-=-=-=-=-= Primary Header End =-=-=-=-=-=-= -->

