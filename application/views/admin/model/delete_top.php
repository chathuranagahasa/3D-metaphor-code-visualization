<section class="content-header">

    <h3>User Management</h3>

</section>
<section class="content">
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="http://favr-susl.dev">Home</a></li>
            <li class="active">User Management</li>
            <li class="active">Delete Top Model</li>
        </ol>
    </div>
    <div class="panel-heading clearfix" style="background-color: #823168">
        <h4 class="panel-title" style=" color: #FFFFFF;">Delete - Top Model</h4>
    </div>

    <div class="panel panel-white">

        <div class="panel-body">

            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->

                    <!-- form start -->
                    <?php
                    $form = array(
                        'name' => 'deleteUser',
                        'id' => 'deleteUser'
                    );
                    echo form_open('admin/delete_user_data', $form) ?>
                    <!--  <form role="form" > -->
                    <div class="box-body">


                        <div class="form-horizontal">
                            <label class="col-sm-2 control-label" for="emp_id"> User ID </label>
                            <div class="col-sm-4">
                                <input class="form-control" readonly="readonly" name="user_id" type="text" value="<?php echo sprintf("%04d", $user_details[0]->user_id); ?>" readonly id="user_id"/>
                            </div>
                        </div>

                        <div class="form-horizontal">
                            <label class="col-sm-2 control-label" for="user_bplocation">BP Location </label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown('user_bplocation',
                                    $bp_locations,
                                    $user_details[0]->location,'class="form-control" id="user_bplocation" readonly="readonly"') ?>
                            </div>
                            <label class="col-sm-12 control-label"></label>
                        </div>

                        <div class="form-horizontal">
                            <label class="col-sm-2 control-label" for="user_fname"> First Name </label>
                            <div class="col-xs-4">
                                <input class="form-control" readonly="readonly" value="<?php echo $user_details[0]->first_name; ?>" type="text" name="user_fname" id="user_fname">
                            </div>
                            <div class="error_msg"></div>
                            <label class="col-sm-2 control-label" for="user_lname"> Last Name </label>
                            <div class="col-xs-4">
                                <input class="form-control" readonly="readonly" type="text" value="<?php echo $user_details[0]->last_name; ?>" name="user_lname" id="user_lname">
                            </div>
                            <label class="col-sm-12 control-label"></label>
                        </div>

                        <div class="form-horizontal">
                            <label class="col-sm-2 control-label" for="user_nic"> NIC </label>
                            <div class="col-xs-4">
                                <input class="form-control" type="text" readonly="readonly" value="<?php echo $user_details[0]->nic; ?>" name="user_nic" id="user_nic">
                            </div>
                            <label class="col-sm-12 control-label"></label>
                        </div>

                        <div class="form-horizontal">

                            <label class="col-xs-2 control-label" for="user_designation">Designation </label>
                            <div class="col-xs-4">
                                <?php echo form_dropdown('user_designation',
                                    $designations,
                                    $user_details[0]->designation,'class="form-control" id="user_designation" readonly="readonly"') ?>
                            </div>
                            <label class="col-xs-2 control-label" for=user_email"> Email Address </label>
                            <div class="col-xs-4">
                                <input class="form-control" name="user_email" readonly="readonly" value="<?php echo $user_details[0]->email; ?>" type="text" id="user_email"/>
                            </div>

                            <label class="col-sm-12 control-label"></label>
                        </div>
                        <div class="form-horizontal">
                            <label class="col-xs-2 control-label" for="user_phone"> Phone </label>
                            <div class="col-xs-4">
                                <input class="form-control" name="user_phone" readonly="readonly" value="<?php echo $user_details[0]->phone; ?>" type="text" id="user_phone"/>
                            </div>


                            <label class="col-sm-12 control-label"></label>
                        </div>
                        <div class="form-horizontal">
                            <label class="col-sm-2 control-label" for="user_password"> Password </label>
                            <div class="col-xs-4">
                                <input class="form-control" type="password" readonly="readonly" value="<?php echo $user_details[0]->password; ?>" name="user_password" id="user_password">
                            </div>
                            <div class="error_msg"></div>
                            <label class="col-sm-12 control-label"></label>
                        </div>



                        <div class="form-horizontal">
                            <label class="col-xs-2 control-label" for="user_address"> Address </label>
                            <div class="col-xs-10">
                                <textarea class="form-control" name="user_address" readonly="readonly" type="text" id="user_address"><?php echo $user_details[0]->address; ?></textarea>

                            </div>
                            <label class="col-sm-12 control-label"></label>
                        </div>

                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" name="sub_user" id="sub_user" class="btn btn-danger btn-flat" style="padding-left:50px; padding-right:50px; margin-bottom : 20px">Delete</button>

                        <div style="width: auto;height: 30px; font-size: 13px;"><?php ?> </div>
                    </div>
                    <!-- </form> -->


                </div>
            </div>
        </div><!-- end of the panel body-->

    </div>
</section>

</div>