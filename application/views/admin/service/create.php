<section class="content-header">

    <h3>Services Management</h3>

</section>
<section class="content">
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="http://favr-susl.dev">Home</a></li>
            <li class="active">Service Management</li>
            <li class="active">Create Service</li>
        </ol>
    </div>
    <div class="panel-heading clearfix" style="background-color: #823168">
        <h4 class="panel-title" style=" color: #FFFFFF;">Create - Service</h4>
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
                            'name' => 'createService',
                            'id' => 'createService'
                        );
                        echo form_open_multipart('admin/store_services', $form) ?>
                        <!--  <form role="form" > -->
                        <div class="box-body">


                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="emp_id"> Title </label>
                                <div class="col-sm-4">
                                    <input class="form-control" name="service_title" type="text" id="service_title"/>
                                </div>
                            </div>

                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="service_type">Service Type </label>
                                <div class="col-sm-4">
                                    <select name="service_type" id="service_type" class="form-control">
                                        <option value="0" selected="selected">Select Service Type</option>
                                        <?php foreach($bp_locations as $bp_location):?>
                                            <option value="<?php echo $bp_location->sub_id; ?>"><?php echo $bp_location->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>

                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="service_desc"> Description </label>
                                <div class="col-xs-10">
                                    <textarea class="form-control" name="service_desc" id="service_desc"></textarea>
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>


                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="service_loc"> Location(s) </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="text" name="service_loc" id="service_loc">
                                </div>
                                <div class="error_msg"></div>
                                <label class="col-sm-12 control-label"></label>
                            </div>

                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="banner_image"> Banner Image </label>
                                <div class="col-xs-10">
                                    <input type="file" class="form-control" name="banner_image" id="banner_image"></input>
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>
                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="service_category"> Service Category </label>
                                <div class="col-xs-4">
                                    <textarea class="form-control" name="service_category" id="service_category"></textarea>
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>

                            <div class="form-horizontal">
                                <label class="col-xs-12" for="emp_insuid" style="text-decoration: underline"> Contact Details </label>
                                <label class="col-xs-2 control-label" for="contact_name">  Name </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="text" name="contact_name" id="contact_name">
                                </div>

                                <label class="col-xs-2 control-label" for="contact_email"> Email </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="text" name="contact_email" id="contact_email">
                                </div>
                                <label class="col-sm-12 control-label"></label>

                                <label class="col-xs-2 control-label" for="contact_phone"> Phone </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="text" name="contact_phone" id="contact_phone">
                                </div>

                            </div>



                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="sub_service" id="sub_service" class="btn btn-info btn-flat" style="padding-left:50px; padding-right:50px; margin-bottom : 20px">Add</button>

                        </div>
                        <!-- </form> -->

                    </div>
                </div>
            </div>
        </div><!-- end of the panel body-->

    </div>
</section>

</div>

