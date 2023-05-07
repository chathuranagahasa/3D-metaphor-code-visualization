<section class="content-header">

    <h3>User Management</h3>

</section>
<section class="content">
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="active">Model Management</li>
            <li class="active">Update Top Model</li>
        </ol>
    </div>
    <div class="panel-heading clearfix" style="background-color: #a23c81">
        <h4 class="panel-title" style=" color: #FFFFFF;">Update - Top Model</h4>
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
                            'name' => 'createModel',
                            'id' => 'createModel'
                        );
                        echo form_open_multipart('Admin/update_model_data', $form) ?>
                        <!--  <form role="form" > -->
                        <div class="box-body">

                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="emp_id"> Model Type <span style="color: #cb1a09;">*</span></label>
                                <div class="col-sm-4">
                                    <?php echo form_dropdown('model_type',
                                        array('0'=>'Select Model Type','top'=>'Top', 'normal' => 'Normal'),
                                        'top','class="selectpicker form-control"  data-live-search="true" id="model_type" ') ?>
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>
                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="emp_id"> Model ID <span style="color: #cb1a09;">*</span></label>
                                <div class="col-sm-4">
                                <input value="<?php echo $topmodel[0]->id; ?>" class="form-control" name="id" type="hidden" id="id"/>
                                    <input class="form-control" value="<?php echo $topmodel[0]->model_id; ?>" name="model_id" type="text" id="model_id"/>
                                </div>
                                <div class="col-sm-4">
                                    <b>Last Model ID : </b><?php
                                    echo "Model ID - " . $model_id= $this->PropertyModel->getLastModelId() . " | ";
                                    echo "Top Model ID - " . $top_model_id = $this->PropertyModel->getLastTopModelId();
                                    ?>
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>

                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="model_name"> Name <span style="color: #cb1a09;">*</span></label>
                                <div class="col-xs-4">
                                    <input class="form-control" value="<?php echo $topmodel[0]->name; ?>" type="text" name="model_name" id="model_name">
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>
                        

                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="model_btn" id="model_btn" class="btn btn-info btn-flat" style="padding-left:50px; padding-right:50px; margin-bottom : 20px; background: #a23c81; border: 1px solid #a23c81;">Update</button>

                            <div style="width: auto;height: 30px; font-size: 13px;"><?php ?> </div>
                        </div>
                        <!-- </form> -->


                </div>
            </div>
        </div><!-- end of the panel body-->

    </div>
</section>

</div>

