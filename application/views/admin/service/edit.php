<section class="content-header">

    <h3>Services Management</h3>

</section>
<section class="content">
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="http://favr-susl.dev">Home</a></li>
            <li class="active">Service Management</li>
            <li class="active">Update Service</li>
        </ol>
    </div>
    <div class="panel-heading clearfix" style="background-color: #823168">
        <h4 class="panel-title" style=" color: #FFFFFF;">Update - Service</h4>
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
                            'name' => 'updateService',
                            'id' => 'updateService'
                        );
                        echo form_open_multipart('admin/update_services', $form) ?>
                        <!--  <form role="form" > -->
                        <div class="box-body">


                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="emp_id"> Title </label>
                                <div class="col-sm-4">
                                    <input type="hidden" name="service_id" value="<?php echo (count($service) != 0) ? $service[0]->service_id : null; ?>">
                                    <input class="form-control" name="service_title" type="text" id="service_title" value="<?php echo (count($service) != 0) ? $service[0]->title : null; ?>"/>
                                </div>
                            </div>

                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="service_type">Service Type </label>
                                <div class="col-sm-4">
                                        <?php echo form_dropdown('service_type',
                                            $bp_locations,
                                            (count($service) != 0) ? $service[0]->service_type : null,'class="form-control" id="service_type" ') ?>
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>

                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="service_desc"> Description </label>
                                <div class="col-xs-10">
                                    <textarea class="form-control" name="service_desc" id="service_desc"><?php echo (count($service) != 0) ? $service[0]->service_desc : null; ?></textarea>
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>


                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="service_loc"> Location(s) </label>
                                <div class="col-xs-4">
                                    <input class="form-control" value="<?php echo (count($service) != 0) ? $service[0]->locations : null; ?>" type="text" name="service_loc" id="service_loc">
                                </div>
                                <div class="error_msg"></div>
                                <label class="col-sm-12 control-label"></label>
                            </div>

<!--                            <div class="form-horizontal">-->
<!--                                <label class="col-sm-2 control-label" for="banner_image"> Banner Image </label>-->
<!--                                <div class="col-xs-10">-->
<!--                                    <input type="file" class="form-control" name="banner_image" id="banner_image"></input>-->
<!--                                </div>-->
<!--                                <label class="col-sm-12 control-label"></label>-->
<!--                            </div>-->
                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="service_category"> Service Category </label>
                                <div class="col-xs-4">
                                    <textarea class="form-control" name="service_category" id="service_category"><?php echo(count($service) != 0) ? $service[0]->service_category : null; ?></textarea>
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>

                            <div class="form-horizontal">
                                <label class="col-xs-12" for="emp_insuid" style="text-decoration: underline"> Contact Details </label>
                                <label class="col-xs-2 control-label" for="contact_name">  Name </label>
                                <div class="col-xs-4">
                                    <input class="form-control" value="<?php echo (count($service) != 0) ? $service[0]->name : null; ?>" type="text" name="contact_name" id="contact_name">
                                </div>

                                <label class="col-xs-2 control-label" for="contact_email"> Email </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="text" value="<?php echo (count($service) != 0) ? $service[0]->email : null; ?>" name="contact_email" id="contact_email">
                                </div>
                                <label class="col-sm-12 control-label"></label>

                                <label class="col-xs-2 control-label" for="contact_phone"> Phone </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="text" name="contact_phone" value="<?php echo (count($service) != 0) ? $service[0]->phone : null; ?>" id="contact_phone">
                                </div>

                            </div>



                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="sub_service" id="sub_service" class="btn btn-info btn-flat" style="padding-left:50px; padding-right:50px; margin-bottom : 20px">Update</button>

                        </div>
                        <!-- </form> -->

                    </div>
                </div>
            </div>
        </div><!-- end of the panel body-->

    </div>
</section>

</div>

