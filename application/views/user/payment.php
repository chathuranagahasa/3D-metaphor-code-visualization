<style>
    .page-header-area-2 {
        padding: 0px;
        margin-bottom: 15px;
        background: #eeeeee;
    }

    .blog-post, .blog-sidebar{
        margin-top: 10px;
    }

    .section-padding {
        padding: 40px 0;
        padding-top: 40px;
    }

    .pro-section ul li b{
        color: #333333;
    }

    #payment_form label{
        font-size: 16px;
    }

    #payment_form{
        padding-top: 20px;
    }

    .post-review .summary-review .final-rate{
        width: 200px;
        height:200px;
    }

    .review-excerpt{
        padding-left: 35px;
        padding-top: 25px;
    }
    
    .error{
        color: #fb1e09;
    }
</style>

<?php
$session_array  = $this->session->userdata('logged_in');
$customer = $this->UserModel->getCustomerByUserId($user_id);
?>

<!-- =-=-=-=-=-=-= Main Header End  =-=-=-=-=-=-= -->
<div class="page-header-area-2 no-bottom gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 no-padding  col-md-12 col-sm-12 col-xs-12">
                <div class="small-breadcrumb">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <div class=" breadcrumb-link">
                            <ul>
                                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li><a href="">Payment</a></li>
                            </ul>
                        </div>
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
    <section class="section-padding no-top gray review-details ">
        <!-- Main Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <!-- Middle Content Area -->
                <div class="col-md-8 col-xs-12 col-sm-12">
                    <div class="blog-detial">
                        <!-- Blog Archive -->
                        <div class="blog-post">
                            <?php if ($this->session->flashdata('message_suc')) { ?>
                                <div class="alert alert-success"> <?php echo $this->session->flashdata('message_suc') ?> </div>
                            <?php } ?>
                            <div class="review-excerpt">
                                <h3 style="padding: 10px; background: #eeeeee">Payment for Advertisement</h3>
                                <hr>

                                <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>vehicle/payment_submit" id="payment_form">
                                    <div class="row">
                                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                        <input type="hidden" name="ad_id" value="<?php echo $ad_id; ?>">
                                        <input type="hidden" name="renew" id="renew" value="<?php echo $renew; ?>">
                                        <input type="hidden" id="loyalty_balance_val" name="loyalty_balance_val" value="<?php echo (is_array($customer) && count($customer) != 0) ? $customer[0]->loyalty_balance  : null; ?>">
                                        <div class="col-md-12 col-sm-12 col-xs-12" style="padding-bottom: 10px">
                                            <div class="input-type">


                                                <label>Feature Vehicle ? </label>&nbsp;&nbsp;
                                                <?php
                                                    if(isset($type) && $type != null){
                                                        ?>
                                                        <input type='hidden'  name='type' value='<?php echo $type; ?>'>
                                                <?php
                                                    }
                                                ?>
                                                <input type='hidden' class='feature_list' name='feature_vehicle_is' value='0'>
                                                <input type='checkbox' class='feature_list' name='feature_vehicle_is' id='feature_vehicle_is' value='1'>
                                                <span style="padding-left: 10px">( Feature ad will cost 500 LKR )</span>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-12 col-xs-12"  style="padding-bottom: 10px">
                                            <div class="input-type">
                                                <label>Time Duration of Advertisement</label>
                                                <?php echo form_dropdown('time_du_pay',
                                                    $durations,
                                                    '','class="form-control" id="time_du_pay" ') ?>
                                            </div>
                                        </div>



                                        <div class="col-md-6 col-sm-6 col-xs-12" style="padding-bottom: 10px; margin-top: 10px">
                                            <h5 style="color: #000; font-weight: 800; margin-bottom: 10px">Payment Options</h5>
                                            <div id="pay_op_active">
                                            <div class="input-type">
                                                <input type='radio' class='feature_list' name='payment_method' id='payonstore' value='payonstore'>&nbsp;&nbsp;
                                                <label>Pay at Store</label>
                                            </div>
                                            <div class="input-type">
                                                <input type='radio' class='feature_list' name='payment_method' id='bank_tranfer' value='bank'>&nbsp;&nbsp;
                                                <label>Bank Transfer </label>
                                            </div>
                                            <div class="input-type">
                                                <input type='radio' class='feature_list' name='payment_method' id='onlinepay' value='online'>&nbsp;&nbsp;
                                                <label>Online Payment</label>
                                            </div>
                                            </div>
                                            <div class="input-type" id="no_amount_to_pay_parent">
<!--                                                <p style="padding-top: 20px; margin-bottom: 0">If pay amount is 0.00 LKR, </p>-->
                                                <input type='radio' class='feature_list' name='payment_method' id='no_amount_to_pay' value='free'>&nbsp;&nbsp;

                                                <label>No Amount to Pay</label>
                                            </div>
                                            <input type="hidden" class="total_ad_cost" name="total_ad_pay">
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12 ">
                                            <div class="pro-section" id="store_div" style="display: none; padding: 20px">
<!--                                                <img src="--><?php //echo base_url(); ?><!--assets/images/like.png" alt="">-->
                                                <h3 class="cui-delta">Pay at Store</h3>
                                                <ul class="standard-list">
                                                    <li><b>Address :</b> No: 435,Main Street,Nugegoda</li>
                                                    <li><b>Contact (Office) :</b> 076 92 33 456</li>
                                                    <li><b>Contact (Mobile) :</b> 076 92 33 456</li>
                                                </ul>
                                            </div>
                                            <div class="pro-section" id="bank_div" style="display: none; padding: 20px">
<!--                                                <img src="--><?php //echo base_url(); ?><!--assets/images/like.png" alt="">-->
                                                <h3>Fund Transfer</h3>
                                                <ul class="standard-list">
                                                    <li><b>Bank :</b> Sampath Bank</li>
                                                    <li><b>Branch :</b> Dehiwala</li>
                                                    <li><b>Account No :</b> ###########</li>
                                                    <li><b>Account Name :</b> CarMart</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-md-8 col-sm-12 col-xs-12"  style="padding-bottom: 10px; display: none" id="">
                                            <div class="input-type">
                                                <label>Upload Bank Slip</label>
                                                <input type="file" class="bank_slip" name="bank_slip">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 30px; margin-top: 10px">
                                            <button class="btn btn-theme" type="submit">Confirm</button>
                                        </div>
                                    </div>
                                </form>

                                <div class="row pro-cons">
<!--                                    <div class="col-md-6 col-sm-12 col-xs-12 ">-->
<!--                                        <div class="pro-section" id="store_div" style="display: none;">-->
<!--                                            <img src="--><?php //echo base_url(); ?><!--assets/images/like.png" alt="">-->
<!--                                            <h3 class="cui-delta">Pay at Store</h3>-->
<!--                                            <ul class="standard-list">-->
<!--                                                <li><b>Address :</b> No: 435,Main Street,Nugegoda</li>-->
<!--                                                <li><b>Contact (Office) :</b> 076 92 33 456</li>-->
<!--                                                <li><b>Contact (Mobile) :</b> 076 92 33 456</li>-->
<!--                                            </ul>-->
<!--                                        </div>-->
<!--                                        <div class="pro-section" id="bank_div" style="display: none;">-->
<!--                                            <img src="--><?php //echo base_url(); ?><!--assets/images/like.png" alt="">-->
<!--                                            <h3>Fund Transfer</h3>-->
<!--                                            <ul class="standard-list">-->
<!--                                                <li><b>Bank :</b> Sampath Bank</li>-->
<!--                                                <li><b>Branch :</b> Dehiwala</li>-->
<!--                                                <li><b>Account No :</b> ###########</li>-->
<!--                                                <li><b>Account Name :</b> CarMart</li>-->
<!--                                            </ul>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                    <div class="col-md-6 col-sm-12 col-xs-12 ">

                                    </div>
                                </div>


                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!-- Blog Grid -->
                    </div>
                </div>
                <!-- Right Sidebar -->
                <div class="col-md-4 col-xs-12 col-sm-12">
                    <!-- Sidebar Widgets -->
                    <div class="blog-sidebar">
                        <!-- Latest News -->

                        <div class="widget">
                            <div class="widget-heading">
                                <h4 class="panel-title"><a>Total Cost - Ad</a></h4>
                            </div>
                            <div class="post-review">
                                <!-- / progress-bar-review -->
                                <div class="summary-review" style="padding-bottom: 0">
                                    <div style="padding: 10px">
                                        <h4>Your Loyalty Point Balance</h4>
                                        <h3 style="font-weight: bold; color: #000;" id="loyalty_balance">
                                            <span id="loyalty_balance">
                                               <?php
                                               echo (is_array($customer) && count($customer) != 0) ? $customer[0]->loyalty_balance  : null;
                                               ?>
                                            </span>
                                            LKR

                                        </h3>

                                    </div>
                                    <div class="final-rate">

                                        <h4>Total Price</h4>

                                        <h1 class="total_ad_cost number">0.00</h1>
                                        <h3 class="text">LKR</h3>
                                    </div>
                                    <div id="final_cost_with_balance">
                                        <h3 class="text"><span id="total_f_cost"></span><span id="loyalty_p"></span></h3>

                                    </div>
                                </div>
                            </div>
                            <div class="post-review">
                                <!-- / progress-bar-review -->
                                <div class="summary-review" style="padding-top: 0;">

                                    <div class="final-rate" style=" background-color: #d1d1d1">

                                        <h4>Amount to Pay</h4>

                                        <h1 class="total_amount_pay_cost number">0.00</h1>
                                        <h3 class="text">LKR</h3>
                                    </div>
                                    <div id="final_cost_with_balance">
                                        <h3 class="text"><span id="total_amount_to_pay"></span><span id="loyalty_p_amount_pay"></span></h3>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar Widgets End -->
                </div>
                <!-- Middle Content Area  End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Main Container End -->
    </section>
    <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->

    <script>

    </script>