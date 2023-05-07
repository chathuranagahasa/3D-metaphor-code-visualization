<section class="content-header">

    <h3>Employee Management</h3>

</section>
<section class="content">
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="http://favr-susl.dev">Home</a></li>
            <li class="active">Employee Management</li>
            <li class="active">Create Employee</li>
        </ol>
    </div>
    <div class="panel-heading clearfix" style="background-color: #823168">
        <h4 class="panel-title" style=" color: #FFFFFF;">Create - Employee</h4>
    </div>

    <div class="panel panel-white">

        <div class="panel-body">

            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!--<div class="box-header with-border">
                            <h3 class="box-title">Add New Employee </h3>
                        </div>--><!-- /.box-header -->
                        <!-- form start -->
                        <?php
                        $form = array(
                            'name' => 'createEmployee',
                            'id' => 'createEmployee'
                        );
                        echo form_open('User/storeEmployee', $form) ?>
                        <!--  <form role="form" > -->
                        <div class="box-body">


                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="emp_id"> Employee ID </label>
                                <div class="col-sm-4">
                                    <input class="form-control" name="emp_id" type="text" value="<?php echo sprintf("%03d", $empId); ?>" readonly id="emp_id"/>
                                </div>
                            </div>

                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="emp_bplocation">BP Location </label>
                                <div class="col-sm-4">
                                    <select name="emp_bplocation" id="emp_bplocation" class="form-control">
                                        <option value="0" selected="selected">Select Location</option>
                                        <?php foreach($bp_locations as $bp_location):?>
                                            <option value="<?php echo $bp_location->id; ?>"><?php echo $bp_location->loc_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>

                            <div class="form-horizontal">
                               <label class="col-sm-2 control-label" for="emp_fname"> First Name </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="text" name="emp_fname" id="emp_fname">
                                </div>
                                <div class="error_msg"></div>
                                <label class="col-sm-2 control-label" for="emp_lname"> Last Name </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="text" name="emp_lname" id="emp_lname">
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>

                            <div class="form-horizontal">
                                <label class="col-xs-2 control-label" for="emp_nic"> NIC </label>
                                <div class="col-xs-4">
                                    <input class="form-control" name="emp_nic" type="text" id="emp_nic"/>
                                </div>
                           </div>

                            <div class="form-horizontal">
                                <label class="col-xs-2 control-label" for="emp_designation">Designation </label>
                                <div class="col-xs-4">
                                    <select name="emp_designation" id="emp_designation" class="form-control">
                                        <option value="0" selected="selected">Select Designation</option>
                                        <?php foreach($designations as $designation):?>
                                            <option value="<?php echo $designation->id; ?>"><?php echo $designation->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>


                            <div class="form-horizontal">
                                <label class="col-xs-2 control-label" for=""> Date of Birth </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="text" name="emp_bdate" id="emp_bdate" data-language='en'>
                                </div>

                                <label class="col-xs-2 control-label" for="emp_status"> Civil Status</label>
                                <div class="col-xs-4">
                                    <select name="emp_status" id="emp_status" class="form-control">
                                        <option value="0" selected="selected">Select Status</option>
                                        <?php foreach($civil_status as $status):?>
                                            <option value="<?php echo $status->id; ?>"><?php echo $status->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-horizontal">
                                <label class="col-sm-12 control-label"></label>
                                <label class="col-xs-2 control-label" for=""> No of Children </label>
                                <div class="col-xs-4">
                                    <?php echo form_dropdown('emp_noofchild',
                                        array('0' =>'Select','1' => '01', '2' => '02', '3' => '03'),
                                        '','class="form-control" id="emp_noofchild"') ?>
                                </div>
                                <label class="col-sm-12 control-label" style="margin-bottom: 20px"></label>

                            </div>
                            <div class="form-horizontal">
                                <label class="col-xs-12" for="emp_insuid" style="text-decoration: underline"> Insurance Details </label>
                                <label class="col-xs-2 control-label" for="emp_insuid"> Insurance ID </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="text" name="emp_insuid" id="emp_insuid">
                                </div>

                                <label class="col-xs-2 control-label" for="emp_insu_issuedate"> Issued Date </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="text" name="emp_insu_issuedate" id="emp_insu_issuedate" data-language='en'>
                                </div>
                                <label class="col-sm-12 control-label"></label>

                                <label class="col-xs-2 control-label" for="emp_insu_expdate"> Expire Date </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="text" name="emp_insu_expdate" id="emp_insu_expdate" data-language='en'>
                                </div>

                           </div>

                            <div class="form-horizontal">
                                <label class="col-xs-12" for="emp_insuid" style="text-decoration: underline"> Passport Details </label>
                                <label class="col-xs-2 control-label" for="emp_passport"> Passport No </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="text" name="emp_passport" id="emp_passport">
                                </div>

                                <label class="col-xs-2 control-label" for="emp_insuid"> Issued Date </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="text" name="emp_passport_issuedate" id="emp_passport_issuedate" data-language='en'>
                                </div>
                                <div class="error_msg"></div>
                                <label class="col-sm-12 control-label"></label>

                                <label class="col-xs-2 control-label" for="emp_insuid"> Expire Date </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="text" name="emp_passport_expiredate" id="emp_passport_expiredate" data-language='en'>
                                </div>
                                <hr>
                                <label class="col-sm-12 control-label" style="margin-bottom: 20px"></label>


                            </div>

                            <div class="form-horizontal">
                                <label class="col-xs-2 control-label" for="emp_shirtsize"> Shirt Size </label>
                                <div class="col-xs-4">
                                    <?php echo form_dropdown('emp_shirtsize',
                                        array('0' =>'Select Size','15' => '15', '15.5' => '15.5', '16' => '16', '16.5' => '16.5'),
                                        '','class="form-control" id="emp_shirtsize"') ?>
                                </div>
                                <div class="error_msg"></div>
                                <label class="col-xs-2 control-label" for="emp_teeshirtsize"> T Shirt Size </label>
                                <div class="col-xs-4">
                                    <?php echo form_dropdown('emp_teeshirtsize',
                                        array('0' =>'Select Size','S' => 'S', 'M' => 'M', 'L' => 'L', 'XL' => 'XL'),
                                        '','class="form-control" id="emp_teeshirtsize"') ?>
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>

                            <div class="form-horizontal">
                                <label class="col-xs-2 control-label" for="emp_rank"> Rank </label>
                                <div class="col-xs-4">
                                    <?php echo form_dropdown('emp_rank',
                                        array('0' =>'Select Rank','1' => '1', '2' => '2', '3' => '3', '4' => '4'),
                                        '','class="form-control" id="emp_rank"') ?>
                                </div>
                                <div class="error_msg"></div>
                                <label class="col-xs-2 control-label" for="emp_dateofjoin"> Date of Joining </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="text" name="emp_dateofjoin" id="emp_dateofjoin" data-language='en'>
                                </div>


                                <label class="col-sm-12 control-label"></label>
                            </div>

                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="sub_employee" id="sub_employee" class="btn btn-info btn-flat" style="padding-left:50px; padding-right:50px; margin-bottom : 20px">Add</button>

                            <div style="width: auto;height: 30px; font-size: 13px;"><?php echo  $message; ?> </div>
                        </div>
                        <!-- </form> -->

                    </div>
                </div>
            </div>
        </div><!-- end of the panel body-->

    </div>
</section>

</div>

