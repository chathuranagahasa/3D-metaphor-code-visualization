<section class="content-header">

    <?php if ($this->session->flashdata('message_suc')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('message_suc') ?> </div>
    <?php }elseif ($this->session->flashdata('message_error')){?>
        <div class="alert alert-danger"> <?= $this->session->flashdata('message_error') ?> </div>
    <?php } ?>

    <?php

     $session_array  = $this->session->userdata('logged_in_admin');

     //var_dump($session_array);
     //$userid = $session_array['user_id'];


    $this->load->model('UserModelAdmin');
    //$user = $this->UserModel->getUserNameByUserId($userid);

//    if($user[0]->user_verified == 0){ ?>
<!--        <div class="alert alert-success" style="text-align: center">-->
<!--            Your email, --><?php //echo $session_array['email']; ?><!-- has not been verified. You need to verify email to apply to schools.-->
<!--            <a href="--><?php //echo base_url(); ?><!--user/send_email_verify/--><?php //echo $session_array['email'];?><!--/--><?php //echo $session_array['name'] ?><!--/--><?php //echo $session_array['user_id'] ?><!--">resend verification email</a>-->
<!--        </div>-->
<!---->
<!--        --><?php //if($this->session->flashdata('success_msg')){ ?>
<!--            <div class="alert alert-warning" style="text-align: center">-->
<!--                --><?php //echo $this->session->flashdata('success_msg'); ?>
<!--            </div>-->
<!--        --><?php //} ?>
<!---->
<!--    --><?php
//
//    }
    ?>

    <h3>Administrator Dashboard</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="http://favr-susl.dev">Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="panel-heading clearfix" style="background-color: #823168">
        <h4 class="panel-title" style=" color: #FFFFFF;">Admin Dashboard</h4>
    </div><br>

<!--    <div class="box box-header">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-3 col-xs-6">-->
<!--                <!-- small box -->
<!--                <div class="small-box bg-aqua">-->
<!--                    <div class="inner">-->
<!--                        <h3 style="font-size: 60px">-->
<!--                           ff-->
<!--                        </h3>-->
<!---->
<!--                        <p>UpComing Birth days</p>-->
<!--                    </div>-->
<!--                    <div class="icon">-->
<!--                        <i class="ion-android-notifications"></i>-->
<!--                    </div>-->
<!--                    <a href="--><?php //echo base_url()."User/getUpComingAlerts/dashboard"?><!--" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <!-- ./col -->
<!---->
<!--            <div class="col-lg-3 col-xs-6">-->
<!--                <!-- small box -->
<!--                <div class="small-box bg-yellow">-->
<!--                    <div class="inner">-->
<!--                        <h3 style="font-size: 60px">ggg</h3>-->
<!---->
<!--                        <p>Insurance Cards Expire Notifications</p>-->
<!--                    </div>-->
<!--                    <div class="icon">-->
<!--                        <i class="ion ion-clock"></i>-->
<!--                    </div>-->
<!--                    <a href="--><?php //echo base_url()."User/getUpComingAlerts/insurance"?><!--" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <!-- ./col -->
<!--            <div class="col-lg-3 col-xs-6">-->
<!--                <!-- small box -->
<!--                <div class="small-box bg-red">-->
<!--                    <div class="inner">-->
<!--                        <h3 style="font-size: 60px">ggg</h3>-->
<!---->
<!--                        <p>Passports Expire Notifications</p>-->
<!--                    </div>-->
<!--                    <div class="icon">-->
<!--                        <i class="ion ion-card"></i>-->
<!--                    </div>-->
<!--                    <a href="--><?php //echo base_url()."User/getUpComingAlerts/passport"?><!--" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <!-- ./col -->
<!---->
<!--            <div class="col-lg-3 col-xs-6">-->
<!--                <!-- small box -->
<!--                <div class="small-box bg-green">-->
<!--                    <div class="inner">-->
<!--                        <h3 style="font-size: 60px">-->
<!--                            hh-->
<!--                            <sup style="font-size: 30px">Days</sup></h3>-->
<!---->
<!--                        <p>-->
<!--                            remaining for your Acknowledgement <br>-->
<!--                            <input type="hidden" value="hh" id="fixed-date-acknowledge">-->
<!--                            hhh-->
<!--                        </p>-->
<!--                    </div>-->
<!--                    <div class="icon">-->
<!--                        <i class="ion ion-refresh"></i>-->
<!--                    </div>-->
<!--                    <a href="#" class="small-box-footer"><!--More info <i class="fa fa-arrow-circle-right"></i></a>
<!--                </div>-->
<!--            </div>-->
<!--            <!-- ./col -->
<!--        </div>-->
<!--    </div>-->
    <div class="row">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">User Management</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-orange" style="padding-top:20px"><i class="ion ion-ios-personadd"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-number" id="dashboard-box-link"><a href="<?php echo base_url() ?>admin/new_user">CREATE </a></span>
                                <span class="info-box-text">New <br/>User</span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-green" style="padding-top:20px"><i class="fa fa-list"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-number" id="dashboard-box-link"><a href="<?php echo base_url() ?>admin/user_list">LIST </a></span>
                                <span class="info-box-text">List All <br/>Users</span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix visible-sm-block"></div>
                </div>
                <div class="box-footer clearfix">



                </div><!-- /.box-footer -->
            </div><!-- /.box-body -->
        </div>
    </div>




    <div class="row">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Property Management</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-blue" style="padding-top:20px"><i class="fa fa-user"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-number" id="dashboard-box-link"><a href="<?php echo base_url() ?>admin/create_property">CREATE </a></span>
                                <span class="info-box-text">New <br/>Property</span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-yellow" style="padding-top:20px"><i class="fa fa-list"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-number" id="dashboard-box-link"><a href="<?php echo base_url() ?>admin/list_properties">LIST </a></span>
                                <span class="info-box-text">List All <br/>Properties</span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix visible-sm-block"></div>
                </div>
                <div class="box-footer clearfix">



                </div><!-- /.box-footer -->
            </div><!-- /.box-body -->
        </div>
    </div>



    <div class="row">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Analytics</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <!--<div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-purple" style="padding-top:20px"><i class="fa fa-lightbulb-o"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-number" id="dashboard-box-link"><a href="<?php /*echo base_url() */?>index.php/UserController/createTip">CREATE </a></span>
                                        <span class="info-box-text">New<br/>Reminder</span>
                                    </div><!-- /.info-box-content -->
                    <!--</div>--><!-- /.info-box -->
                    <!--</div>--><!-- /.col -->

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-red" style="padding-top:20px"><i class="fa fa-power-off"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-number" id="dashboard-box-link"><a href="<?php echo base_url() ?>admin/analytics">Ad View Count</a></span>
                                <span class="info-box-text">List All <br/>Ads View Count</span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->



                    <!-- fix for small devices only -->
                    <div class="clearfix visible-sm-block"></div>
                </div>
                <div class="box-footer clearfix">



                </div><!-- /.box-footer -->
            </div><!-- /.box-body -->
        </div>
    </div>
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
