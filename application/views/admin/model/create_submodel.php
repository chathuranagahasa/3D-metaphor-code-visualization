<section class="content-header">

    <h3>Model Management</h3>

</section>
<section class="content">
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="active">Model Management</li>
            <li class="active">Create SubModel</li>
        </ol>
    </div>
    <div class="panel-heading clearfix" style="background-color: #a23c81">
        <h4 class="panel-title" style=" color: #FFFFFF;">Create - SubModel</h4>
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
                        echo form_open_multipart('Admin/store_sub_model', $form) ?>
                        <!--  <form role="form" > -->
                        <div class="box-body">

                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="emp_id">Top Model <span style="color: #cb1a09;">*</span></label>
                                <div class="col-sm-4">
                                    <?php echo form_dropdown('model_type_top',
                                       $top_models,
                                        '','class="selectpicker form-control"  data-live-search="true" id="model_type" ') ?>
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>
                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="emp_id"> Model <span style="color: #cb1a09;">*</span></label>
                                <div class="col-sm-4">
                                    <?php echo form_dropdown('model_type_normal',
                                       $models,
                                        '','class="selectpicker form-control"  data-live-search="true" id="model_type" ') ?>
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>
                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="emp_id"> SubModel ID <span style="color: #cb1a09;">*</span></label>
                                <div class="col-sm-4">
                                    <input class="form-control" name="model_id" type="text" id="model_id"/>
                                </div>
                                <div class="col-sm-6">
                                    <b>Last SubModel ID : </b><?php
                                    echo $model_id= $this->PropertyModel->getLastSubModelId();
                                    ?>
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>

                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="model_name"> Submodel Name <span style="color: #cb1a09;">*</span></label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="text" name="model_name" id="model_name">
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>
                        

                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="model_btn" id="model_btn" class="btn btn-info btn-flat" style="padding-left:50px; padding-right:50px; margin-bottom : 20px; background: #a23c81; border: 1px solid #a23c81;">Create</button>

                            <div style="width: auto;height: 30px; font-size: 13px;"><?php ?> </div>
                        </div>
                        <!-- </form> -->


                </div>
            </div>
        </div><!-- end of the panel body-->

    </div>
</section>

</div>

