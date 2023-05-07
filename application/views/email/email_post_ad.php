<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Email - Carmart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
<div class="col-lg-12">
    <img class="col-lg-offset-5" style="border: 0;-ms-interpolation-mode: bicubic;max-width: 400px" src="<?php echo base_url(); ?>/assets/images/bizlink_logo.png" alt="">

    <p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 10px">Dear <?php echo ucwords($name); ?>,</p>

    <div style="border-top: 2px solid #ed4c06; width: 100%"></div>
    <div style="font-size: 26px;font-weight: 700;letter-spacing: -0.02em;line-height: 32px;color: #41637e;font-family: sans-serif; id="emb-email-header">
</div>
<div class="col-lg-12" style="margin-top: 20px">
    <p>
        This is an automated email to confirm that we have received your request for advertisement.
    </p>
    <p>
        Our team will check the receipt of the payment and if the content of the advertisement is inline with the company policy and not violate any laws of the country.
        You will receive a notification, when your advertisement is published.  It will not take more than 2 working days to publish your advertisement.
    </p>
</div>
<div class="col-lg-12" style="margin-top: 20px">
    <div class="col-lg-4">
        <img src="<?php echo base_url(); ?>assets/uploads/<?php echo (count($property_images) != 0) ? $property_images[0]->image_name : null ?>" style="max-width: 200px">
    </div>
    <div class="col-lg-8">
        <b>REF ID : <?php echo (count($property) != 0) ? $property[0]->ref_id : null ?></b>
        <p>Ad Submitted Date : <?php echo (count($property) != 0) ? $property[0]->posted_date : null ?></p>
        <p>Amount : <?php echo (count($property) != 0) ? $property[0]->price. " " . $property[0]->price_type : null ?></p>
    </div>
</div>
<div class="col-lg-12" style="margin-top: 20px">
    <p>
        If you have any questions/queries, reach us on info@bizlink.lk.  We’ll be happy to help you.
    </p>
</div>
<!--<div class="col-lg-12" style="margin-top: 20px">-->
<!--    <p>Your Subscription Start Date : --><?php //echo (count($property) != 0) ? $property[0]->posted_date : null ?><!--</p>-->
<!--    <p>Your Subscription End Date :  --><?php //echo (count($property) != 0) ? $property[0]->expire_date : null ?><!--</p>-->
<!--    <p>Subscription Type : Free</p>-->
<!--</div>-->



    <div class="col-lg-12" style="margin-top: 40px">
        <p>Thank You</p>
        <p>Team Bizlink</p>
<!--        <table align="center">-->
<!--            <tr>-->
<!--                <td>-->
<!--                    <a href="https://carmart.com/vehicle" style="padding: 15px !important;background-color: #ed4c06;border: 1px solid #ed4c06;color: #ffffff; border-radius: 5px">Post Ad Free</a>-->
<!--                </td>-->
<!--            </tr>-->
<!--        </table>-->
<!--        <table align="center" style="margin-top: 50px">-->
<!--            <tr>-->
<!--                <td>-->
<!--                    <a href="https://carmart.com/ContactUs" style="padding: 15px !important;background-color: #009933;border: 1px solid #009933;color: #ffffff; border-radius: 5px">-->
<!--                        Contact-->
<!--                    </a>-->
<!--                </td>-->
<!--            </tr>-->
<!--        </table>-->
<!--        <table align="center" style="margin-top: 50px">-->
<!--            <tr>-->
<!--                <td>-->
<!--                    <a href="https://www.facebook.com/carmart">-->
<!--                        <img src="--><?php //echo base_url(); ?><!--assets/img/social_icons/fb.png" width="40" height="40" style="margin: 5px">-->
<!--                    </a>-->
<!--                </td>-->
<!--                <td>-->
<!--                    <a href="https://www.instagram.com/carmart.social">-->
<!--                        <img src="--><?php //echo base_url(); ?><!--assets/img/social_icons/instagram.png" width="40" height="40" style="margin: 5px">-->
<!--                    </a>-->
<!--                </td>-->
<!--                <td>-->
<!--                    <a href="https://www.linkedin.com/company/carmart/">-->
<!--                        <img src="--><?php //echo base_url(); ?><!--assets/img/social_icons/linked.png" width="56" height="56" style="margin: 5px">-->
<!--                    </a>-->
<!--                </td>-->
<!--                <td>-->
<!--                    <a href="https://twitter.com/carmart">-->
<!--                        <img src="--><?php //echo base_url(); ?><!--assets/img/social_icons/twitter.png" width="40" height="40" style="margin: 5px">-->
<!--                    </a>-->
<!--                </td>-->
<!---->
<!--            </tr>-->
<!--        </table>-->
        <div class="col-lg-12" style="margin-top: 40px">

            <p style="text-align: center">(C) 2021 bizlink.lk All rights reserved.
            </p>
        </div>

    </div>
</body>
</html>
