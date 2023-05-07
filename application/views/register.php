<style>
    .error{
        color: #da251d;
    }

    #register_icons{
        padding: 25px;

    }

    #register_icons ul li{
        color: #333333;
    }

    #register_icons ul li img{
        padding: 5px;
        margin: 10px;
    }

    #register_icons p{
        color: #666666;
    }

    #register_form_front{
        background: #ffffff;
        padding: 10px;
        padding-top: 20px;
        padding-bottom: 20px;
    }

    #register_form_front .form-group{
        margin-bottom: 3px;

    }

    #register_form_front .form-control{
        padding: 8px 10px;
    }

    #register_form_front .select{
        padding: 8px 10px;
    }

    .page-header-area-2{
        padding-bottom: 5px;
        padding-top: 5px;
    }

    .select2-container--default .select2-selection--single{
        height: 40px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered{
        line-height:40px;
    }
</style>
<!--<script src='https://www.google.com/recaptcha/api.js'></script>-->
<!-- =-=-=-=-=-=-= Breadcrumb =-=-=-=-=-=-= -->
<!--<div class="page-header-area-2" style="background: #CCCCCC">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
<!--                <div class="small-breadcrumb">-->
<!--                    <div class=" breadcrumb-link">-->
<!--                        <ul>-->
<!--                            <li><a href="--><?php //echo base_url(); ?><!--">Home</a></li>-->
<!--                            <li><a class="active" href="#">Registration</a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--<!--                    <div class="header-page">-->
<!--<!--                        <h1>Create Your Account</h1>-->
<!--<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- =-=-=-=-=-=-= Breadcrumb End =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">
    <!-- =-=-=-=-=-=-= Registration Form =-=-=-=-=-=-= -->

    <section class="section-padding no-top gray">
        <!-- Main Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <div class="col-md-5 col-sm-12 col-lg-offset-1" id="register_icons">

                    <h3 style="font-weight: 800; color: #000;">Login for CRIKEY DEAL</h3>

                    <p>Best marketplace in Sri Lanka</p>

                    <b style="color: #000;">Want to Sell</b>
                    <ul>
                        <li><img src="<?php echo base_url(); ?>assets/images/regi/index.png" width="40px">Easy way to create your own ads.</li>
                        <li><img src="<?php echo base_url(); ?>assets/images/regi/fav_ad.png" width="40px">Make them “Featured” to get more prominence.</li>
                        <li><img src="<?php echo base_url(); ?>assets/images/regi/view_ad.png" width="40px">View and manage your ads at your convenience.</li>
<!--                        <li><img src="--><?php //echo base_url(); ?><!--assets/images/regi/view_ad.png" width="40px">Get weekly statistics on your add performance</li>-->
                    </ul>

                    <b style="color: #000;">Want to buy</b>
                    <ul>
                        <li><img src="<?php echo base_url(); ?>assets/images/regi/index.png" width="40px"> Compare vehicles.</li>
                        <li><img src="<?php echo base_url(); ?>assets/images/regi/fav_ad.png" width="40px">    Mark adds as “Preferred” and look at them in detail.</li>
                    </ul>


                </div>
                <!-- Middle Content Area -->

                <div class="col-md-5 col-sm-12">

                    <h3 style="font-weight: 800; color: #000; padding-top: 25px; padding-bottom: 10px">Register Here</h3>
                    <div id="register_form_front">
                    <!--  Form -->
                    <div class="form-grid">
                        <div class="validation_error">
                            <?= validation_errors(); ?>
                        </div>
                        <?php if ($this->session->flashdata('message_error_email')) { ?>
                            <div class="alert alert-danger"> <?= $this->session->flashdata('message_error_email') ?> </div>
                        <?php } ?>
                        <?php
                        $form = array(
                            'name' => 'register_customer',
                            'id' => 'register_customer'
                        );
                        echo form_open('login/store_customer', $form) ?>

<!--                            <a class="btn btn-lg btn-block btn-social btn-facebook">-->
<!--                                <span class="fa fa-facebook"></span> Sign up with Facebook-->
<!--                            </a>-->
<!---->
<!--                            <a class="btn btn-lg btn-block btn-social btn-google">-->
<!--                                <span class="fa fa-google"></span> Sign up with Facebook-->
<!--                            </a>-->
<!---->
<!--                            <h2 class="no-span"><b>(OR)</b></h2>-->

                            <div class="form-group">
                                <label>First Name <span style="color: #cb1a09;">*</span></label>
                                <?php
                                if(isset($hide_menu) && $hide_menu == "yes"){
                                    ?>
                                    <input type="hidden" name="landing_f" value="<?php echo "yes"; ?>">
                                    <?php
                                }
                                ?>
                                <input type="hidden" name="user_id" value="<?php echo $customer_id; ?>">
                                <input placeholder="Enter Your First Name" name="cus_firstname" id="cus_firstname" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label>Last Name <span style="color: #cb1a09;">*</span></label>
                                <input placeholder="Enter Your Last Name" name="cus_lastname" id="cus_lastname" class="form-control" type="text">
                            </div>
                        <div class="form-group">
                            <label>Age Group </label>
                            <?php echo form_dropdown('cus_age_group',
                                array('0' => 'Select Age Group', '18-25' => '18-35','35-50' => '35-50'),
                                set_value('property_inte_color'),'class="selectpicker form-control"  data-live-search="true" id="cus_age_group" ') ?>
                        </div>
                        <div class="form-group">
                            <label>Gender </label>
                            <?php echo form_dropdown('cus_sex',
                                array('0' => 'Select Gender', 'male' => 'Male', 'female' => 'Female'),
                                set_value('cus_sex'),'class="selectpicker form-control"  data-live-search="true" id="cus_sex" ') ?>
                        </div>
                        <div class="form-group">
                            <label>Occupation</label>
                            <?php echo form_dropdown('cus_occupation',
                                array('0' => 'Select Occupation', 'male' => 'Male', 'female' => 'Female'),
                                set_value('property_inte_color'),'class="selectpicker form-control"  data-live-search="true" id="cus_occupation" ') ?>
                        </div>
                            <div class="form-group">
                                <label>Contact Number <span style="color: #cb1a09;">*</span></label>
                                <input placeholder="Enter Your Contact Number" name="cus_contactno" id="cus_contactno" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label>Email <span style="color: #cb1a09;">*</span></label>
                                <input placeholder="Your Email"  name="cus_email"  id="cus_email" class="form-control" type="email">
                            </div>
                            <div class="form-group">
                                <label>Password <span style="color: #cb1a09;">*</span></label>
                                <input placeholder="Your Password"  name="cus_password" id="cus_password" class="form-control" type="password">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password <span style="color: #cb1a09;">*</span></label>
                                <input placeholder="Your Confirm Password"  name="cus_con_password" id="cus_con_password" class="form-control" type="password">
                            </div>
<!--                            <div class="form-group">-->
<!--                                <div class="row">-->
<!--                                    -->
<!--                                    <div class="col-xs-12 col-sm-5 text-right">-->
<!--                                        <p class="help-block"><a data-target="#myModal" data-toggle="modal">Forgot password?</a>-->
<!--                                        </p>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                        <p>
                            <label>
                                <input type="hidden" name="cus_terms_agree" value="0">
                                <input  type="checkbox" name="cus_terms_agree" id="cus_terms_agree"> <span> &nbsp;I have read, understood and accept the
                                                            <a href="<?php echo base_url(); ?>home/terms_conditions">Terms and Conditions</a> of Car Mart Web Site</span>
                            </label>
                        </p>
                        <label id="cus_terms_agree-error" class="error" for="cus_terms_agree" style=""></label>

<!--                        <div class="g-recaptcha" data-sitekey="6LeVol8UAAAAAE9R1cWvsRWFpTFHF_CveYfAiTvq"></div>-->
                            <button class="btn btn-theme btn-lg btn-block" name="sub_customer">Register</button>

                        </form>
                        <h5 class="main-title text-left" style="text-align: center; margin-top: 10px">
                            Already have an account?
                        </h5>
                        <div style="text-align: center; margin-top: 10px">
                            <?php
                            if($this->uri->segment(3) == "landing"){
                                ?>
                                <a class="btn btn-success btn-xs" href="<?php echo base_url(); ?>login/index/landing">Login to your Account</a>
                                <?php
                            }else{
                                ?>
                                <a class="btn btn-success btn-xs" href="<?php echo base_url(); ?>login">Login to your Account</a>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                    <!-- Form -->
                    </div>
                </div>
                <!-- Middle Content Area  End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Main Container End -->
    </section>
    <!-- =-=-=-=-=-=-= Registration Form End =-=-=-=-=-=-= -->


