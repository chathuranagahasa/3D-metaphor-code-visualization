<style>
    .error{
        color: #d61011;
    }
</style>
<section class="content-header">

    <h3>Company Management</h3>

</section>
<section class="content">
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="active">Customer Profile</li>
            <li class="active">Create Customer</li>
        </ol>
    </div>
    <div class="panel-heading clearfix" style="background-color: #823168">
        <h4 class="panel-title" style=" color: #FFFFFF;">Create - Customer</h4>
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
                            'name' => 'createCompany',
                            'id' => 'createCompany'
                        );
                        echo form_open_multipart('Admin/storeCompany', $form) ?>
                        <!--  <form role="form" > -->
                        <div class="box-body">

                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="company_name"> Company Name </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="text" name="company_name" id="company_name">
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>
                            <div class="form-horizontal">
                                <label class="col-xs-2 control-label" for="company_contactp"> Contact Person </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="text" name="company_contactp" id="company_contactp">
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>

                            <div class="form-horizontal">
                                <label class="col-xs-2 control-label" for="company_contactno"> Contact No </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="text" name="company_contactno" id="company_contactno" placeholder="+94 7x xxx xxxx ">
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>
                            <div class="form-horizontal">
                                <div class="form-horizontal">
                                    <label class="col-sm-2 control-label" for="emp_bplocation">District </label>
                                    <div class="col-sm-4">
                                        <?php echo form_dropdown('emp_bplocation',
                                            $bp_locations,
                                            '','class="form-control" id="emp_bplocation"') ?>
                                    </div>
                                    <label class="col-sm-12 control-label"></label>
                                </div>
                            </div>

                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="company_address"> Address </label>
                                <div class="col-xs-4">
                                    <textarea cols="10" rows="3" class="form-control" name="company_address" id="company_address"></textarea>
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>
                            <div class="form-horizontal">
                                <label class="col-xs-2 control-label" for="company_email"> Email Address </label>
                                <div class="col-xs-4">
                                    <input class="form-control" name="company_email" type="text" id="company_email"/>
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>


                            <div class="form-horizontal">
                                <label class="col-xs-2 control-label" for="company_logo"> Company Logo </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="file" name="company_logo" id="company_logo">
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>

                            <div class="form-horizontal">
                                <label class="col-xs-2 control-label" for="company_banner"> Company Banner </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="file" name="company_banner" id="company_banner">
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>

<!--                            <div class="form-horizontal">-->
<!---->
<!--                                <label class="col-xs-2 control-label" for="user_designation">Status </label>-->
<!--                                <div class="col-xs-4">-->
<!--                                    --><?php //echo form_dropdown('user_status',
//                                        array('0'=>'Select', 'active' => 'Active', 'inactive' => 'Inactive'),
//                                        '','class="selectpicker form-control" id="user_status" ') ?>
<!---->
<!--                                </div>-->
<!---->
<!--                                <label class="col-sm-12 control-label"></label>-->
<!--                            </div>-->

                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="company_description"> Notes </label>
                                <div class="col-xs-10">
                                    <textarea cols="10" rows="3" class="form-control" name="company_description" id="company_description"></textarea>
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>



                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="sub_company" id="sub_company" class="btn btn-primary btn-flat" style="padding-left:50px; padding-right:50px; margin-bottom : 20px">Submit</button>

                        </div>
                        <!-- </form> -->

                    </div>
                </div>
            </div>
        </div><!-- end of the panel body-->

    </div>
</section>

</div>

