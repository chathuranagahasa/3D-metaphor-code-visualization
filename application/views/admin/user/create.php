<section class="content-header">

    <h3>User Management</h3>

</section>
<section class="content">
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="active">User Management</li>
            <li class="active">Create User</li>
        </ol>
    </div>
    <div class="panel-heading clearfix" style="background-color: #a23c81">
        <h4 class="panel-title" style=" color: #FFFFFF;">Create - User</h4>
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
                            'name' => 'createUser',
                            'id' => 'createUser'
                        );
                        echo form_open_multipart('Admin/store_user', $form) ?>
                        <!--  <form role="form" > -->
                        <div class="box-body">


                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="emp_id"> User ID </label>
                                <div class="col-sm-4">
                                    <input class="form-control" name="user_id" type="text" value="<?php echo sprintf("%04d", $userId); ?>" readonly id="user_id"/>
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>

<!--                            <div class="form-horizontal">-->
<!--                                <label class="col-sm-2 control-label" for="user_bplocation">BP Location </label>-->
<!--                                <div class="col-sm-4">-->
<!--                                    <select name="user_bplocation" id="user_bplocation" class="form-control">-->
<!--                                        <option value="0" selected="selected">Select Location</option>-->
<!--                                        --><?php //foreach($bp_locations as $bp_location):?>
<!--                                            <option value="--><?php //echo $bp_location->id; ?><!--">--><?php //echo $bp_location->loc_name; ?><!--</option>-->
<!--                                        --><?php //endforeach; ?>
<!--                                    </select>-->
<!--                                </div>-->
<!--                                <label class="col-sm-12 control-label"></label>-->
<!--                            </div>-->

                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="user_fname"> First Name <span style="color: #cb1a09;">*</span></label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="text" name="user_fname" id="user_fname">
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>
                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="user_lname"> Last Name <span style="color: #cb1a09;">*</span> </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="text" name="user_lname" id="user_lname">
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>

                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="user_nic"> NIC <span style="color: #cb1a09;">*</span></label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="text" name="user_nic" id="user_nic">
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>

                            <div class="form-horizontal">

                                <label class="col-xs-2 control-label" for="user_designation">User Role <span style="color: #cb1a09;">*</span></label>
                                <div class="col-xs-4">
                                        <?php echo form_dropdown('user_role',
                                            $user_roles,
                                            '','class="selectpicker form-control" id="user_role" ') ?>

                                </div>

                                <label class="col-sm-12 control-label"></label>
                            </div>
                            <div class="form-horizontal">
                                <label class="col-xs-2 control-label" for="user_phone"> Phone <span style="color: #cb1a09;">*</span></label>
                                <div class="col-xs-4">
                                    <input class="form-control" name="user_phone" type="text" id="user_phone" placeholder="+94710000000"/>
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>
                            <div class="form-horizontal">
                                <label class="col-xs-2 control-label" for=user_email"> Email Address <span style="color: #cb1a09;">*</span></label>
                                <div class="col-xs-4">
                                    <input class="form-control" name="user_email" type="text" id="user_email"/>
                                </div>

                                <label class="col-sm-12 control-label"></label>
                            </div>
                            <div class="form-horizontal">

                                <label class="col-lg-2 col-md-2 col-sm-12 col-sm-12 control-label" for=user_picture"> User Photo </label>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-sm-12">
                                    <input name="user_picture" type="file" id="user_picture"/>
                                </div>

                                <label class="col-sm-12 control-label"></label>
                            </div>
                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="user_password"> Password <span style="color: #cb1a09;">*</span></label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="password" name="user_password" id="user_password">
                                </div>
                                <div class="error_msg"></div>
<!--                                <label class="col-sm-2 control-label" for="user_conpassword"> Confirm Password </label>-->
<!--                                <div class="col-xs-4">-->
<!--                                    <input class="form-control" type="password" name="user_conpassword" id="user_conpassword">-->
<!--                                </div>-->
                                <label class="col-sm-12 control-label"></label>
                            </div>

                            <div class="form-horizontal">

                                <label class="col-xs-2 control-label" for="user_designation">Status <span style="color: #cb1a09;">*</span></label>
                                <div class="col-xs-4">
                                    <?php echo form_dropdown('user_status',
                                        array('0'=>'Select', 'active' => 'Active', 'inactive' => 'Inactive'),
                                        '','class="selectpicker form-control" id="user_status" ') ?>

                                </div>

                                <label class="col-sm-12 control-label"></label>
                            </div>

<!---->
<!--                            <div class="form-horizontal">-->
<!--                                <label class="col-xs-2 control-label" for="user_address"> Address </label>-->
<!--                                <div class="col-xs-10">-->
<!--                                    <textarea class="form-control" name="user_address" type="text" id="user_address">-->
<!---->
<!--                                    </textarea>-->
<!---->
<!--                                </div>-->
<!--                                <label class="col-sm-12 control-label"></label>-->
<!--                            </div>-->

                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="sub_user" id="sub_user" class="btn btn-info btn-flat" style="padding-left:50px; padding-right:50px; margin-bottom : 20px; background: #a23c81; border: 1px solid #a23c81;">Create</button>

                            <div style="width: auto;height: 30px; font-size: 13px;"><?php ?> </div>
                        </div>
                        <!-- </form> -->


                </div>
            </div>
        </div><!-- end of the panel body-->

    </div>
</section>

</div>

