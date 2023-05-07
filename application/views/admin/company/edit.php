<style>
    #close{
        display:block;
        float:right;
        width:30px;
        height:29px;
        background:url(https://web.archive.org/web/20110126035650/http://digitalsbykobke.com/images/close.png) no-repeat center center;
    }

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
            <li class="active">Update Customer</li>
        </ol>
    </div>
    <div class="panel-heading clearfix" style="background-color: #823168">
        <h4 class="panel-title" style=" color: #FFFFFF;">Update - Customer</h4>
    </div>

    <div class="panel panel-white">

        <div class="panel-body">
            <?php if ($this->session->flashdata('message_logo_dlt')) { ?>
                <div class="alert alert-success"> <?php echo $this->session->flashdata('message_logo_dlt') ?> </div>
            <?php } ?>

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
                            'name' => 'editCompany',
                            'id' => 'editCompany'
                        );
                        echo form_open_multipart('Admin/updateCompanyDetails', $form) ?>
                        <!--  <form role="form" > -->
                        <div class="box-body">

                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="company_name"> Company Name </label>
                                <div class="col-xs-4">
                                    <input type="hidden" name="company_id" id="company_id" value="<?php echo (count($company) !=0) ? $company[0]->id : null; ?>">
                                    <input class="form-control" value="<?php echo (count($company) !=0) ? $company[0]->name : null?>" type="text" name="company_name" id="company_name">
                                </div>

                                    <label class="col-sm-12 control-label"></label>

                            </div>
                            <div class="form-horizontal">
                                <label class="col-xs-2 control-label" for="company_contactp"> Contact Person </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="text" name="company_contactp" value="<?php echo (count($company) !=0) ? $company[0]->cperson : null?>" id="company_contactp">
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>

                            <div class="form-horizontal">
                                <label class="col-xs-2 control-label" for="company_contactno"> Contact No </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="text" value="<?php echo (count($company) !=0) ? $company[0]->contactno : null?>" name="company_contactno" id="company_contactno">
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>

                            <div class="form-horizontal">
                                <div class="form-horizontal">
                                    <label class="col-sm-2 control-label" for="emp_bplocation">Location </label>
                                    <div class="col-sm-4">
                                        <?php echo form_dropdown('emp_bplocation',
                                            $bp_locations,
                                            $company[0]->location,'class="form-control" id="emp_bplocation"') ?>
                                    </div>
                                    <label class="col-sm-12 control-label"></label>
                                </div>
                            </div>

                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="company_address"> Address </label>
                                <div class="col-xs-4">
                                    <textarea cols="10" rows="3" class="form-control" name="company_address" id="company_address"><?php echo (count($company) !=0) ? $company[0]->address : null?></textarea>
                                </div>

                                <label class="col-sm-12 control-label"></label>
                            </div>

                            <div class="form-horizontal">

                                <label class="col-xs-2 control-label" for="company_email"> Email Address </label>
                                <div class="col-xs-4">
                                    <input class="form-control" name="company_email" value="<?php echo (count($company) !=0) ? $company[0]->email : null?>" type="text" id="company_email"/>
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>




                            <div class="form-horizontal">
                                <label class="col-xs-2 control-label" for="company_logo"> Company Logo </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="file" name="company_logo" id="company_logo">
                                    <?php
                                    if($company[0]->logo != null){
                                        ?>
                                        <img src="<?php echo base_url(); ?>assets/uploads/company/<?php echo $company[0]->logo; ?>" width="60%" style="margin: 10px">
                                        <a id="close" href="<?php echo base_url(); ?>/admin/delete_company_logo/<?php echo $company[0]->id; ?>"></a>
                                        <?php
                                    }
                                    ?>
                                    <label id="company_logo-error" class="error" for="company_logo"></label>
                                </div>
                                <label class="col-sm-12 control-label"></label>

                            </div>

                            <div class="form-horizontal">
                                <label class="col-xs-2 control-label" for="company_logo"> Company Banner </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="file" name="company_banner" id="company_banner">
                                    <?php
                                    if($company[0]->banner != null){
                                        ?>
                                        <img src="<?php echo base_url(); ?>assets/uploads/company/<?php echo $company[0]->banner; ?>" width="60%" style="margin: 10px">
                                        <a id="close" href="<?php echo base_url(); ?>/admin/delete_company_logo/<?php echo $company[0]->id; ?>"></a>
                                        <?php
                                    }
                                    ?>
                                    <label id="company_banner-error" class="error" for="company_banner"></label>
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>
                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="company_description"> Notes </label>
                                <div class="col-xs-10">
                                    <textarea cols="10" rows="3" class="form-control" name="company_description" id="company_description"><?php echo (count($company) !=0) ? $company[0]->description : null?></textarea>
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>
                            <div class="form-horizontal">

                                <label class="col-xs-2 control-label" for="user_designation">Status </label>
                                <div class="col-xs-4">
                                    <?php echo form_dropdown('user_status',
                                        array('0'=>'Select', 'active' => 'Active', 'inactive' => 'Inactive'),
                                        (count($company) !=0) ? $company[0]->user_status : null,'class="selectpicker form-control" id="user_status" ') ?>

                                </div>

                                <label class="col-sm-12 control-label"></label>
                            </div>



                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="sub_company" id="sub_company" class="btn btn-warning btn-flat" style="padding-left:50px; padding-right:50px; margin-bottom : 20px">Update</button>

                        </div>
                        <!-- </form> -->

                    </div>
                </div>
            </div>
        </div><!-- end of the panel body-->

    </div>
</section>

</div>

