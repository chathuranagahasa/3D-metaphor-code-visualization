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
</style>

<?php
$user = $this->UserModel->getCustomerByUserId($user_id);
if(is_array($user) && count($user) != 0){
    $email = $user[0]->email_address;
    $phone = $user[0]->contact_no;

    $no = str_replace(' ', '', $phone);

    if (substr($no, 0, 1) == '0') {
        $cus_phone = '+94' . substr($no, 1);
    }else if (substr($no, 0, 1) == '7') {
        $cus_phone = '+94' . substr($no, 0);
    }else if (substr($no, 0, 1) == '9') {
        $cus_phone = '+' . substr($no, 0);
    } else {
        $cus_phone = $no;
    }
}
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
                                <li><a href="">Payment Portal</a></li>
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
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <div class="blog-detial">
                        <!-- Blog Archive -->
                        <div class="blog-post">

                            <div class="review-excerpt">
                                <h3 style="padding: 10px; background: #eeeeee">Payment Portal - Car Mart</h3>


                                <div id="card_container"></div>
                                <script src="https://cdn.directpay.lk/dev/v1/directpayCardPayment.js?v=1"></script>
                                <script>
                                    DirectPayCardPayment.init({
                                        container: 'card_container', //<div id="card_container"></div>
                                        merchantId: 'OW01992', //your merchant_id
                                        amount: '<?php echo $amount; ?>',
                                        refCode: "DP12345", //unique referance code form merchant
                                        currency: 'LKR',
                                        type: 'ONE_TIME_PAYMENT',
                                        customerEmail: '<?php echo $email; ?>',
                                        customerMobile: '<?php echo $cus_phone; ?>',
                                        description: 'test products',  //product or service description
                                        debug: true,
                                        responseCallback: responseCallback,
                                        errorCallback: errorCallback,
                                        logo: 'https://test.com/directpay_logo.png',
                                        apiKey: 'aae35bd1938464cbc022ed272c3e6e88fc08d844711d15d7f2ad3a6e5240929c'
                                    });

                                    //response callback.
                                    function responseCallback(result) {
                                        console.log("successCallback-Client", result);
                                        alert(JSON.stringify(result));
                                    }

                                    //error callback
                                    function errorCallback(result) {
                                        console.log("successCallback-Client", result);
                                        alert(JSON.stringify(result));
                                    }

                                </script>




                                <div class="row pro-cons">
                                    <div class="col-md-6 col-sm-12 col-xs-12 ">
                                        <div class="pro-section" id="store_div" style="display: none;">
                                            <img src="<?php echo base_url(); ?>assets/images/like.png" alt="">
                                            <h3 class="cui-delta">Pay at Store</h3>
                                            <ul class="standard-list">
                                                <li><b>Address :</b> No: 435,Main Street,Nugegoda</li>
                                                <li><b>Contact (Office) :</b> 076 92 33 456</li>
                                                <li><b>Contact (Mobile) :</b> 076 92 33 456</li>
                                            </ul>
                                        </div>
                                        <div class="pro-section" id="bank_div" style="display: none;">
                                            <img src="<?php echo base_url(); ?>assets/images/like.png" alt="">
                                            <h3>Fund Transfer</h3>
                                            <ul class="standard-list">
                                                <li><b>Bank :</b> Sampath Bank</li>
                                                <li><b>Branch :</b> Dehiwala</li>
                                                <li><b>Account No :</b> ###########</li>
                                                <li><b>Account Name :</b> CarMart</li>
                                            </ul>
                                        </div>
                                    </div>
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
                <!-- Middle Content Area  End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Main Container End -->
    </section>
    <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->