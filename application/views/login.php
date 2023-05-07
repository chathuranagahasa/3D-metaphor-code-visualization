
<style>
    .validation_error{
        color: #da251d;
    }

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

    .page-header-area-2{
        padding-bottom: 5px;
        padding-top: 5px;
    }

    .section-padding{
        padding-bottom: 70px;
    }
</style>

<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">
    <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
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
                        <li><img src="<?php echo base_url(); ?>assets/images/regi/fav_ad.png" width="40px">    Mark ads as “Preferred” and look at them in detail.</li>
                    </ul>


                </div>
                <!-- Middle Content Area -->
                <div class="col-md-5 col-sm-12">

                    <h3 style="font-weight: 800; color: #000; padding-top: 25px; padding-bottom: 10px">Login</h3>
                    <div id="register_form_front">
                        <?php if ($this->session->flashdata('message_suc_acc_up')) { ?>
                            <div class="alert alert-success"> <?= $this->session->flashdata('message_suc_acc_up') ?> </div>
                        <?php } ?>
                    <!--  Form -->
                    <div class="form-grid">
                        <div class="validation_error">
                            <?= validation_errors(); ?>
                        </div>
                        <?php
                        $form = array(
                            'name' => 'login_customer',
                            'id' => 'login_customer'
                        );
                        echo form_open('login', $form) ?>

<!--                            <a class="btn btn-lg btn-block btn-social btn-facebook">-->
<!--                                <span class="fa fa-facebook"></span> Sign in with Facebook-->
<!--                            </a>-->
<!---->
<!--                            <a class="btn btn-lg btn-block btn-social btn-google">-->
<!--                                <span class="fa fa-google"></span> Sign in with Facebook-->
<!--                            </a>-->

<!--                            <h2 class="no-span"><b>(OR)</b></h2>-->

                            <div class="form-group" style="margin-top: 20px">
                                <label>Email</label>
                                <?php
                                if(isset($hide_menu) && $hide_menu == "yes"){
                                    ?>
                                    <input type="hidden" name="landing_f" value="<?php echo "yes"; ?>">
                                    <?php
                                }
                                ?>
                                <input placeholder="Your Email" name="username" class="form-control" type="email">
                            </div>
                            <div class="form-group" style="margin-bottom: 20px">
                                <label>Password</label>
                                <input placeholder="Your Password" name="password" class="form-control" type="password">
                            </div>
<!--                            <div class="form-group">-->
<!--                                <div class="row">-->
<!--                                    <div class="col-xs-12">-->
<!--                                        <div class="skin-minimal">-->
<!--                                            <ul class="list">-->
<!--                                                <li>-->
<!--                                                    <input  type="checkbox" name="cus_terms_agree" id="cus_terms_agree">-->
<!--                                                    <label for="minimal-checkbox-1">Remember Me</label>-->
<!--                                                </li>-->
<!--                                            </ul>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->

                            <button class="btn btn-theme btn-lg btn-block" type="submit" name="signin">Login With Us</button>
                        </form>
                        <h5 class="main-title text-left" style="text-align: center; margin-top: 10px">
                            Don't have an account yet?
                        </h5>
                        <div style="text-align: center; margin-top: 10px">
                            <?php
                            if($this->uri->segment(3) == "landing"){
                            ?>
                        <a class="btn btn-success btn-xs" href="<?php echo base_url(); ?>home/register/landing">Create New Account</a>
                                <?php
                            }else {
                                ?>
                        <a class="btn btn-success btn-xs" href="<?php echo base_url(); ?>home/register">Create New Account</a>
                                <?php
                            }?>
                        </div>
                        <div class="row">
                            <?php
                            if($this->uri->segment(3) == "landing"){
                                ?>
                                <div class="form-group" style="text-align: center; margin-top: 10px">
                                    Forgot Password ? <a href="<?php echo base_url(); ?>ForgotPassword/index/landing">Click Here</a>
                                </div>

                                <?php
                            }else {
                                ?>
                                <div class="form-group" style="text-align: center; margin-top: 10px">
                                    Forgot Password ? <a href="<?php echo base_url(); ?>ForgotPassword/index/landing">Click Here</a>
                                </div>

                                <?php
                            }?>


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
    <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->



