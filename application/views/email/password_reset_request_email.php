<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Email - Sixer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
<div>
    <img class="col-lg-offset-5" style="border: 0;-ms-interpolation-mode: bicubic;max-width: 400px" src="<?php echo base_url(); ?>/assets/img/logo_new.png" alt="">
    <p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px">Hi <?php echo $userName;?>,</p>
    <p style="Margin-top: 0;font-family: Georgia,serif;font-size: 14px;line-height: 25px;Margin-bottom: 25px">

        <?php echo "We want to help you reset your password" ?> <br>
        <b>Just click the link or copy and paste the link below into your browser to reset your password.</b><br><br>
        <?php  echo $url; ?><br>
    </p>
</div>
</body>
</html>