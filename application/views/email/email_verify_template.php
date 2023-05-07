<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Email - Bizlink</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
<div class="col-lg-12">

    <p style="Margin-top: 0;color: #333333;font-size: 14px;line-height: 25px;Margin-bottom: 10px">Dear <?php echo ucwords($name); ?>,</p>
    <p style="Margin-top: 0;color: #333333;font-size: 14px;line-height: 20px;Margin-bottom: 20px">
        Welcome and thank you for registering to <a href="https://bizlink.lk">Bizlink.lk</a>
    </p>
    <div style="border-top: 2px solid #ed4c06; width: 100%"></div>
    <div style="font-size: 26px;font-weight: 700;letter-spacing: -0.02em;line-height: 32px;color: #41637e;font-family: sans-serif; id="emb-email-header">
        <img class="col-lg-offset-5" style="border: 0;-ms-interpolation-mode: bicubic;max-width: 400px" src="<?php echo base_url(); ?>/assets/images/bizlink_logo.png" alt="">
    </div>
    <p>
        Your account has now been created and you can login to the system by using below details
    </p>
    <p>
        Username : <?php echo $email; ?>
    </p>
    <p>
        Site Link : <a href="https://bizlink.lk">https://bizlink.lk</a>
    </p>

<!--    <div style="font-size: 26px;font-weight: 700;letter-spacing: -0.02em;line-height: 32px;color: #41637e;font-family: sans-serif; id="emb-email-header">-->
<!--        <img style="border: 0;-ms-interpolation-mode: bicubic;max-width: 100%" src="--><?php //echo base_url(); ?><!--/assets/img/email/registration_email_pic.png" alt="">-->
<!--    </div>-->
<div class="col-lg-12" style="margin-top: 40px">
    <p>
        Thank You
    </p>
    <p>
        Team Bizlink
    </p>
<!--    <table align="center">-->
<!--        <tr>-->
<!--            <td>-->
<!--                <a href="https://lankaresidence.com/property" style="padding: 15px !important;background-color: #ed4c06;border: 1px solid #ed4c06;color: #ffffff; border-radius: 5px">Post Ad Free</a>-->
<!--            </td>-->
<!--        </tr>-->
<!--    </table>-->
<!--    <table align="center" style="margin-top: 50px">-->
<!--        <tr>-->
<!--            <td>-->
<!--                <a href="https://lankaresidence.com/property/search" style="padding: 15px !important;background-color: #009933;border: 1px solid #009933;color: #ffffff; border-radius: 5px">-->
<!--                    Search-->
<!--                </a>-->
<!--            </td>-->
<!--        </tr>-->
<!--    </table>-->
<!--    <table align="center" style="margin-top: 50px">-->
<!--        <tr>-->
<!--            <td>-->
<!--                <a href="https://lankaresidence.com/ContactUs" style="padding: 15px !important;background-color: #009933;border: 1px solid #009933;color: #ffffff; border-radius: 5px">-->
<!--                    Contact-->
<!--                </a>-->
<!--            </td>-->
<!--        </tr>-->
<!--    </table>-->
<!--    <table align="center" style="margin-top: 50px">-->
<!--        <tr>-->
<!--            <td>-->
<!--                <a href="https://www.facebook.com/LankaResidenceWeb">-->
<!--                    <img src="--><?php //echo base_url(); ?><!--assets/img/social_icons/fb.png" width="40" height="40" style="margin: 5px">-->
<!--                </a>-->
<!--            </td>-->
<!--            <td>-->
<!--                <a href="https://www.instagram.com/lankaresidence.social">-->
<!--                    <img src="--><?php //echo base_url(); ?><!--assets/img/social_icons/instagram.png" width="40" height="40" style="margin: 5px">-->
<!--                </a>-->
<!--            </td>-->
<!--            <td>-->
<!--                <a href="https://www.linkedin.com/in/lanka-residence/">-->
<!--                    <img src="--><?php //echo base_url(); ?><!--assets/img/social_icons/linkedin.png" width="48" height="48" style="margin: 5px">-->
<!--                </a>-->
<!--            </td>-->
<!--            <td>-->
<!--                <a href="https://www.pinterest.com/lankaresidence/ ">-->
<!--                    <img src="--><?php //echo base_url(); ?><!--assets/img/social_icons/pinterest.png" width="48" height="48" style="margin: 5px">-->
<!--                </a>-->
<!--            </td>-->
<!--            <td>-->
<!--                <a href="https://twitter.com/LankaResidence">-->
<!--                    <img src="--><?php //echo base_url(); ?><!--assets/img/social_icons/twitter.png" width="40" height="40" style="margin: 5px">-->
<!--                </a>-->
<!--            </td>-->
<!--            -->
<!--        </tr>-->
<!--    </table>-->
    <div class="col-lg-12" style="margin-top: 40px">

        <p style="text-align: center">(C) 2021 Bizlink.lk All rights reserved.
        </p>
    </div>

</div>

</div>
</body>
</html>