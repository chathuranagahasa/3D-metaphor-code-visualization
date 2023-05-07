<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Email - Lanka Residence</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
<div class="col-lg-12">

    <p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 10px">Hi <?php echo ucwords($owner_name); ?>,</p>
    <p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 14px;line-height: 20px;Margin-bottom: 20px">
        You have the following message please respond directly to the email given.
    </p>
    <div style="border-top: 2px solid #ed4c06; width: 100%"></div>
    <div style="font-size: 26px;font-weight: 700;letter-spacing: -0.02em;line-height: 32px;color: #41637e;font-family: sans-serif; id="emb-email-header">
    <img class="col-lg-offset-5" style="border: 0;-ms-interpolation-mode: bicubic;max-width: 400px" src="<?php echo base_url(); ?>/assets/img/logo_new.png" alt="">
</div>
<div class="col-lg-12" style="margin-top: 20px">
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <p><?php echo $title; ?></p>
        <p><?php echo $message; ?></p>
        <p><?php echo $name; ?></p>
        <p><?php echo $email; ?></p>
        <p><?php echo $phone; ?></p>
    </div>
</div>



<div class="col-lg-12" style="margin-top: 40px">
    <table align="center">
        <tr>
            <td>
                <a href="https://lankaresidence.com/property" style="padding: 15px !important;background-color: #ed4c06;border: 1px solid #ed4c06;color: #ffffff; border-radius: 5px">Post Ad Free</a>
            </td>
        </tr>
    </table>
    <table align="center" style="margin-top: 50px">
        <tr>
            <td>
                <a href="https://lankaresidence.com/property/search" style="padding: 15px !important;background-color: #009933;border: 1px solid #009933;color: #ffffff; border-radius: 5px">
                    Search
                </a>
            </td>
        </tr>
    </table>
    <table align="center" style="margin-top: 50px">
        <tr>
            <td>
                <a href="https://lankaresidence.com/ContactUs" style="padding: 15px !important;background-color: #009933;border: 1px solid #009933;color: #ffffff; border-radius: 5px">
                    Contact
                </a>
            </td>
        </tr>
    </table>
    <table align="center" style="margin-top: 50px">
        <tr>
            <td>
                <a href="https://www.facebook.com/LankaResidenceWeb">
                    <img src="<?php echo base_url(); ?>assets/img/social_icons/fb.png" width="40" height="40" style="margin: 5px">
                </a>
            </td>
            <td>
                <a href="https://www.instagram.com/lankaresidence.social">
                    <img src="<?php echo base_url(); ?>assets/img/social_icons/instagram.png" width="40" height="40" style="margin: 5px">
                </a>
            </td>
            <td>
                <a href="https://www.linkedin.com/in/lanka-residence/">
                    <img src="<?php echo base_url(); ?>assets/img/social_icons/linkedin.png" width="48" height="48" style="margin: 5px">
                </a>
            </td>
            <td>
                <a href="https://www.pinterest.com/lankaresidence/ ">
                    <img src="<?php echo base_url(); ?>assets/img/social_icons/pinterest.png" width="48" height="48" style="margin: 5px">
                </a>
            </td>
            <td>
                <a href="https://twitter.com/LankaResidence">
                    <img src="<?php echo base_url(); ?>assets/img/social_icons/twitter.png" width="40" height="40" style="margin: 5px">
                </a>
            </td>

        </tr>
    </table>
    <div class="col-lg-12" style="margin-top: 40px">

        <p style="text-align: center">(C) 2018 LankaResidence.Com All rights reserved.
        </p>
    </div>

</body>
</html>
