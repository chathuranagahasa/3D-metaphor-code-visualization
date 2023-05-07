<?php

// unique_order_id|total_amount

//-----BEGIN PUBLIC KEY-----
//MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQC8b4xixoNYuG1JekBkfzJdCahh
//YSedB0/AUucXNGGzpkuuhA26PBT7hJKsDd5S9d/wukcmNpYNJpcIjKdJo5IMhvxD
//9LouVfTZyAh1sJb5TRUL7kX8Gb21c31+U+pntfVtOgH6sj53bWH2ejchiYbQD45N
//02tKl3+HLwKDdJa50wIDAQAB
//-----END PUBLIC KEY-----

$plaintext = $payment_id.'|'. $amount;
$publickey = "-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDgOQRVeCRflFrddLJi7sIYkAf4
5JvqQ8Y1Uai9MlMPlHWZLOAcpmWOsx2S2X3a9Spo3NO7z+4rG1Ct1QC+eLQLEjBm
J2qYoWQ8Qn1AyIX7dcynXh+HKy2kuhCoAwIWku1k5ZaiUR5ocN1cNhmch5LHW1y6
sgbNaeMSEYqIh7YstQIDAQAB
-----END PUBLIC KEY-----";
//load public key for encrypting
openssl_public_encrypt($plaintext, $encrypt, $publickey);

//encode for data passing
$payment = base64_encode($encrypt);
//checkout URL
$url = 'https://webxpay.com/index.php?route=checkout/billing';

//custom fields
//cus_1|cus_2|cus_3|cus_4
if(isset($renew) && $renew == 1){
    $custom_fields = base64_encode($ad_id . "|". $amount . "|" . $time_du_pay . "| " . $is_featured . "|" . $user_id . "|". "carsale" . "|" . "renew");
}else{
    $custom_fields = base64_encode($ad_id . "|". $amount . "|" . $time_du_pay . "| " . $is_featured . "|" . $user_id . "|". "carsale" );
}


?>

<style>
    .error{
        color: #da251d;
    }

    .checkbox{
        margin-top: 0;
        margin-bottom: 0;
    }

    .fileuploader-theme-dragdrop .fileuploader-input{
        padding-top: 15px;
        padding-bottom: 15px;
    }

    .post-ad-form .select2-container--default .select2-selection--single{
        border: 1px solid #CCCCCC;
    }

    .form-control{
        padding-top: 8px;
        padding-bottom: 8px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered{
        line-height: 35px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow{
        height: 35px;
    }

    .post-ad-form .select2-container--default .select2-selection--single{
        height:38px;
    }

    .section-padding{
        padding-bottom: 40px;
    }

    .page-header-area-2 {
        padding: 0px;
        margin-bottom: 15px;
        background: #eeeeee;
    }

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
                            <li><a class="active" href="#">Submit New Vehicle</a>
                        </ul>
                        <a class="btn btn-danger btn-sm" style="float: right; margin-top: 6px" href="<?php echo base_url(); ?>user/dashboard">Got To Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-content-area clearfix">
    <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
    <section class="section-padding no-top gray ">
        <!-- Main Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <h3 style="font-weight: 800; color: #000; padding-top: 10px; padding-bottom: 10px; padding-left: 20px">Online Payment - Bizlink</h3>
                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                    <!-- end post-padding -->
                    <div class="post-ad-form postdetails" style="padding-top: 0">


<?php
//var_dump($user_id);
$user = $this->UserModel->getCustomerByUserId($user_id);
//var_dump($user);
if(is_array($user) && count($user) != 0){
    ?>


                    <form action="<?php echo $url; ?>" method="POST">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-type">
                                    <label>First name</label>
                                    <input type="text" name="first_name" value="<?php echo $user[0]->first_name; ?>" placeholder="Enter First Name" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-type">
                                    <label>Last name</label>
                                    <input type="text" name="last_name" value="<?php echo $user[0]->last_name; ?>" placeholder="Enter Last Name" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-type">
                                    <label>Email</label>
                                    <input type="text" name="email" value="<?php echo $user[0]->email_address; ?>" placeholder="Enter Email Address" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-type">
                                    <label>Contact No</label>
                                    <input type="text" name="contact_number"  value="<?php echo $user[0]->contact_no; ?>" placeholder="Enter Phone Number" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-type">
                                    <label>Address Line 1</label>
                                    <input type="text" name="address_line_one" placeholder="Address Line 1" class="form-control" style="margin-bottom: 5px">
                                    <input type="text" name="address_line_two" placeholder="Address Line 2"  class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-type">
                                    <label>City</label>
                                    <input type="text" name="city" placeholder="Enter City" class="form-control" style="margin-bottom: 5px">
                                    <input type="text" name="state" placeholder="Enter Province" class="form-control" style="margin-bottom: 5px">
                                    <input type="text" name="postal_code" placeholder="Enter Postal Code" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12" style="display: none">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-type">
                                    <label>Country</label>
                                    <input type="text" name="country" value="<?php echo "Sri Lanka"; ?>" placeholder="Enter Country" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-type">
                                    <input type="hidden" name="process_currency" value="LKR" class="form-control">
                                    <input type="hidden" name="cms" value="PHP">
                                    <input type="hidden" name="custom_fields" value="<?php echo $custom_fields; ?>">
                                    <input type="hidden" name="enc_method" value="JCs3J+6oSz4V0LgE0zi/Bg==">
                                    <input type="hidden" name="secret_key" value="3c658f0d-9fa1-47e9-8863-1e848e96c09e"> <!--   87873f8e-9516-4d06-ac07-56ad5df6f05c -->
                                    <input type="hidden" name="payment" value="<?php echo $payment; ?>" >
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 15px; padding-left: 0px">

                            <div class="">
                                <button class="btn btn-flat btn-default btn-warning btn-lg" type="submit" style="border: none; color: #FFF;">Pay Now</button>
                                <!--                                    <a href="--><?php //echo base_url(); ?><!--vehicle/payment">Post Ad</a>-->
                            </div>
                        </div>
                    </form>

    <?php
}
?>




</div>
</div>
</div>

</div>
</section>
</div>

