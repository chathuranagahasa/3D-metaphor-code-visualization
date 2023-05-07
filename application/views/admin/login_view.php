<div class="login-box">
    <div class="login-logo">
       <!-- <a href="#"><b>Unilever</b></a>-->
    </div><!-- /.login-logo -->
    <div class="login-logo">
        <a href="">

            <b style="font-size: 42px; color: #3c8dbc">
<!--                <img src="--><?php //echo base_url() ?><!--assets/img/uni_logo.jpg" width="130px" height="130px"> -->
            </b>
            <br>
            <div style="font-size: 22px;">CarSale - <b style="color: #000000;"> Admin Login</b> </div></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <div style="color: #d43f3a">
            <?= validation_errors(); ?>
        </div>
        <?= form_open('LoginAdmin')?>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="username" id="username" >
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">

                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div><!-- /.col -->
            </div>
        </form>


    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->