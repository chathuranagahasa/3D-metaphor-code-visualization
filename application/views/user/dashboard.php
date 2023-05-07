<?php
$session_array  = $this->session->userdata('logged_in');
?>
<style>
    #dash-item h4:hover {
       color: #990000;
    }

    .section-padding{
        padding-bottom: 40px;
    }

    .page-header-area-2 {
        padding: 0px;
        margin-bottom: 15px;

</style>

<!-- =-=-=-=-=-=-= Breadcrumb =-=-=-=-=-=-= -->
<div class="page-header-area-2 gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="small-breadcrumb">
                    <div class=" breadcrumb-link">
                        <ul>
                            <li><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li><a class="active" href="#">Profile</a>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- =-=-=-=-=-=-= Breadcrumb End =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">
    <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
    <section class="section-padding no-top gray">
        <!-- Main Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <h3 style="font-weight: 800; color: #000; padding-top: 10px; padding-bottom: 10px; padding-left: 20px">User Dashboard</h3>
                <!-- Middle Content Area -->
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <?php include 'dashboard_menu.php'; ?>

                </div>
                <!-- Middle Content Area  End -->
            </div>
            <!-- Row End -->
            <?php
            $userResult = $this->UserModel->getCustomerByUserId($session_array['userId']);

            if(is_array($userResult) && count($userResult) != 0){
                ?>



            <div class="row margin-top-40">
                <!-- Middle Content Area -->
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <!-- Row -->
                    <div class="profile-section margin-bottom-20">
                        <div class="profile-tabs">
                            <ul class="nav nav-justified nav-tabs">
                                <li class="active"><a href="#profile" data-toggle="tab">Dashboard</a></li>
                                <li><a href="#edit" data-toggle="tab">Edit Profile</a></li>
<!--                                <li><a href="#payment" data-toggle="tab">Plan Setting</a></li>-->
<!--                                <li><a href="#settings" data-toggle="tab">Notification Settings</a></li>-->
                            </ul>
                            <div class="tab-content">
                                <?php if ($this->session->flashdata('message_suc_acc_up')) { ?>
                                    <div class="alert alert-success"> <?= $this->session->flashdata('message_suc_acc_up') ?> </div>
                                <?php } ?>
                                <?php if ($this->session->flashdata('message_suc_acc_update')) { ?>
                                    <div class="alert alert-success"> <?= $this->session->flashdata('message_suc_acc_update') ?> </div>
                                <?php } ?>
                                <?php if ($this->session->flashdata('message_suc_password_update')) { ?>
                                    <div class="alert alert-success"> <?= $this->session->flashdata('message_suc_password_update') ?> </div>
                                <?php } ?>
                                <div class="profile-edit tab-pane fade in active" id="profile">
                                    <h2 class="heading-md">Welcome to Dashbaord,</h2>
                                    <p>You can view your ads, post new ad, chaange password here.</p>
                                    <dl class="dl-horizontal">

                                        <a href="<?php echo base_url(); ?>user/ads/<?php echo (count($session_array) != 0) ? $session_array['userId'] : null ?>">
                                            <div class="col-md-5" id="itempiece" style="background-color: #f0f0f0; color: #000; font-size: 15px; height: 100px;
margin: 10px;">
                                                <h4 style="padding:15px; padding-bottom: 5px; padding-top: 20px ">My Ads</h4>
                                                <p style="padding-left: 15px">List all your ads</p>
                                            </div>
                                        </a>

                                        <a href="<?php echo base_url(); ?>vehicle">
                                            <div class="col-md-5" id="itempiece" style="background-color: #f0f0f0; color: #000; font-size: 15px; height: 100px;
margin: 10px">
                                                <h4 style="padding:15px; padding-bottom: 5px; padding-top: 20px ">Submit a new vehicle</h4>
                                                <p style="padding-left: 15px">Post your vehicle ad free</p>
                                            </div>
                                        </a>
                                    </dl>
                                </div>
                                <div class="profile-edit tab-pane fade" id="edit">
                                    <h2 class="heading-md">Manage your Security Settings</h2>
                                    <p>Manage Your Account</p>
                                    <div class="clearfix"></div>
                                    <?php
                                    $form = array(
                                        'name' => 'update_profile',
                                        'id' => 'update_profile'
                                    );
                                    echo form_open('user/update_profile', $form) ?>
                                    <input type="hidden" name="user_id" value="<?php echo $session_array['userId']; ?>">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <label>First Name </label>
                                                <input type="text" value="<?php echo $userResult[0]->first_name; ?>" name="cus_firstname" class="form-control margin-bottom-20">
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <label>Last Name </label>
                                                <input type="text" value="<?php echo $userResult[0]->last_name; ?>" name="cus_lastname" class="form-control margin-bottom-20">
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <label>Email Address <span class="color-red">*</span></label>
                                                <input type="text" class="form-control margin-bottom-20" name="cus_email" value="<?php echo $userResult[0]->email_address; ?>">
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <label>Contact Number <span class="color-red">*</span></label>
                                                <input type="text" class="form-control margin-bottom-20"  name="cus_phone" value="<?php echo $userResult[0]->contact_no; ?>">
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <label>Password <span class="color-red">*</span></label>
                                                <input type="password" class="form-control margin-bottom-20" name="cus_password" value="<?php echo $userResult[0]->password; ?>">
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <label>Confirm Password <span class="color-red">*</span></label>
                                                <input type="password" class="form-control margin-bottom-20" name="cus_conpassword" value="<?php echo $userResult[0]->password; ?>">
                                            </div>
<!--                                            <div class="col-md-6 col-sm-12 col-xs-12 margin-bottom-20">-->
<!--                                                <label>Country <span class="color-red">*</span></label>-->
<!--                                                <select class="form-control">-->
<!--                                                    <option value="0">SriLanka</option>-->
<!--                                                    <option value="1">Australia</option>-->
<!--                                                    <option value="2">Bahrain</option>-->
<!--                                                    <option value="3">Canada</option>-->
<!--                                                    <option value="4">Denmark</option>-->
<!--                                                    <option value="5">Germany</option>-->
<!--                                                </select>-->
<!--                                            </div>-->
<!--                                            <div class="col-md-6 col-sm-12 col-xs-12 margin-bottom-20">-->
<!--                                                <label>City <span class="color-red">*</span></label>-->
<!--                                                <select class="form-control">-->
<!--                                                    <option value="0">London</option>-->
<!--                                                    <option value="1">Edinburgh</option>-->
<!--                                                    <option value="2">Wales</option>-->
<!--                                                    <option value="3">Cardiff</option>-->
<!--                                                    <option value="4">Bradford</option>-->
<!--                                                    <option value="5">Cambridge</option>-->
<!--                                                </select>-->
<!--                                            </div>-->
<!--                                            <div class="col-md-12 col-sm-12 col-xs-12">-->
<!--                                                <label>Address <span class="color-red">*</span></label>-->
<!--                                                <textarea class = "form-control margin-bottom-20" rows = "3"></textarea>-->
<!--                                            </div>-->
                                        </div>
<!--                                        <div class="row margin-bottom-20">-->
<!--                                            <div class="form-group">-->
<!--                                                <div class="col-md-9">-->
<!--                                                    <div class="input-group">-->
<!--                                                <span class="input-group-btn">-->
<!--                                                <span class="btn btn-default btn-file">-->
<!--                                                Browse… <input type="file" id="imgInp">-->
<!--                                                </span>-->
<!--                                                </span>-->
<!--                                                        <input type="text" class="form-control" readonly>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                                <div class="col-md-3">-->
<!--                                                    <img id="img-upload" class="img-responsive" src="images/users/2.jpg" alt="" />-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
                                        <div class="clearfix"></div>
                                        <div class="row">
<!--                                            <div class="col-md-8 col-sm-8 col-xs-12">-->
<!--                                                <div class="form-group">-->
<!--                                                    <div class="skin-minimal">-->
<!--                                                        <ul class="list">-->
<!--                                                            <li>-->
<!--                                                                <input  type="checkbox" id="minimal-checkbox-7">-->
<!--                                                                <label for="minimal-checkbox-7">i agree <a href="#">Terms of Services</a></label>-->
<!--                                                            </li>-->
<!--                                                        </ul>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
                                            <div class="col-md-4 col-sm-4 col-xs-12 text-right">
                                                <button type="submit" name="sub_customer" class="btn btn-theme btn-sm">Update My Info</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="profile-edit tab-pane fade" id="payment">
                                    <h2 class="heading-md">Manage your Package Settings</h2>
                                    <p>Below are the payment options for your account.</p>
                                    <br>
                                    <form action="#" id="sky-form" class="sky-form" novalidate>
                                        <!--Checkout-Form-->
                                        <dl class="dl-horizontal">
                                            <dt><strong>Current Plan</strong></dt>
                                            <dd>
                                                Premium
                                            </dd>
                                            <dt><strong>Expiration Date </strong></dt>
                                            <dd>
                                                2nd January 2017
                                            </dd>
                                        </dl>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 margin-bottom-20">
                                                <label>Select Plan You Want To Change<span class="color-red">*</span></label>
                                                <select class="form-control">
                                                    <option value="0">Free</option>
                                                    <option value="1">Premium</option>
                                                    <option value="2">Advanced</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button class="btn btn-sm btn-default" type="button">Cancel</button>
                                        <button type="submit" class="btn btn-sm btn-theme">Save Changes</button>
                                        <!--End Checkout-Form-->
                                    </form>
                                </div>
                                <div class="profile-edit tab-pane fade" id="settings">
                                    <h2 class="heading-md">Manage your Notifications.</h2>
                                    <p>Below are the notifications you may manage.</p>
                                    <br>
                                    <form>
                                        <div class="skin-minimal">
                                            <ul class="list">
                                                <li>
                                                    <input  type="checkbox" id="minimal-checkbox-1">
                                                    <label for="minimal-checkbox-1">Send me email notification when Ad is processed</label>
                                                </li>
                                                <li>
                                                    <input  type="checkbox" id="minimal-checkbox-2">
                                                    <label for="minimal-checkbox-2">Send me email notification when user comment</label>
                                                </li>
                                                <li>
                                                    <input  type="checkbox" id="minimal-checkbox-3">
                                                    <label for="minimal-checkbox-3">Send me email notification for the latest update</label>
                                                </li>
                                                <li>
                                                    <input  type="checkbox" id="minimal-checkbox-4">
                                                    <label for="minimal-checkbox-4"> Receive our monthly newsletter</label>
                                                </li>
                                                <li>
                                                    <input  type="checkbox" id="minimal-checkbox-5">
                                                    <label for="minimal-checkbox-5">Email notification</label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="button-group margin-top-20">
                                            <button class="btn btn-sm btn-default" type="button">Reset</button>
                                            <button type="submit" class="btn btn-sm btn-theme">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Middle Content Area  End -->
            </div>

                <?php
            }
            ?>
        </div>
        <!-- Main Container End -->
    </section>
    <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->