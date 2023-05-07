<style>
    #category_page_sidebar{
        background: #dddddd;
    }

    .panel, .panel-heading, .panel-title{
        background: #dddddd;
    }
</style>

<div class="sidebar" id="category_page_sidebar">
    <h4 style="color: #333333; font-weight:bold;padding-left: 10px; padding-right: -5px; margin-top: 5px; padding-top: 10px">Advanced Search</h4>
    <!-- Panel group -->
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <form action="<?php echo base_url(); ?>vehicle/advanced_search" method="post" id="adv_search_form">
            <?php
            //var_dump($selected_fields);
            ?>

            <div class="panel panel-default">
                <!-- Heading -->
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">

                        <button type="submit" name="adv_search_clear" id="clear_bn_adv" class="btn btn-flat btn-success btn-sm" style="margin-top: 10px; margin-bottom: 10px; margin-left: 10px; margin-right: -10px">Clear</button>

                        <button type="submit" name="adv_search" class="btn btn-flat btn-warning btn-sm" style="margin-top: 10px; margin-bottom: 10px; margin-left: 10px; margin-right: -10px; padding-left: 30px; padding-right: 30px">Search</button>                                        </h4>
                    </h4>
                </div>
                <!-- Content -->
            </div>

            <?php


            if(isset($selected_fields['body_type'])) {
                //var_dump($selected_fields['body_type']);
                ?>
                <div class="panel panel-default">
                    <!-- Heading -->
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">

                            <?php
                            if ($this->uri->segment(3) != null) {
                                ?>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                     style="padding-right: 5px; padding-left: 5px">
                                    <?php echo form_dropdown('body_type',
                                        $body_types,
                                        $this->uri->segment(3), 'class="form-control" id="body_type" ') ?>
                                </div>
                                <?php
                            } else if (isset($selected_fields) && count($selected_fields) != 0) {
                                ?>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                     style="padding-right: 5px; padding-left: 5px">
                                    <?php echo form_dropdown('body_type',
                                        $body_types,
                                        $selected_fields['body_type'], 'class="form-control" id="body_type" ') ?>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                     style="padding-right: 5px; padding-left: 5px">
                                    <?php echo form_dropdown('body_type',
                                        $body_types,
                                        $this->uri->segment(3), 'class="form-control" id="body_type" ') ?>
                                </div>
                                <?php
                            }
                            ?>


                        </h4>
                    </div>
                    <!-- Content -->
                </div>
                <?php
            }
            else{
                //var_dump($selected_fields['body_type']);
                ?>
                <div class="panel panel-default">
                    <!-- Heading -->
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                     style="padding-right: 5px; padding-left: 5px">
                                    <?php echo form_dropdown('body_type',
                                        $body_types,
                                        null, 'class="form-control" id="body_type" ') ?>
                                </div>
                        </h4>
                    </div>
                    <!-- Content -->
                </div>
            <?php
            }
            ?>


            <?php


            if(isset($selected_fields['pro_brand'])) {

                ?>
                <!-- Brands Panel -->
                <div class="panel panel-default">
                    <!-- Heading -->
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">

                            <?php


                            ?>


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-type"
                                 style="padding-right: 5px; padding-left: 5px">
                                <?php
                                if (isset($selected_fields) && count($selected_fields) != 0) {
                                    $model = $this->PropertyModel->getModelNameById($selected_fields['pro_model']);
                                    $topmodel = $this->PropertyModel->getTopBrandNameById($selected_fields['pro_brand']);
                                    $brand = $this->PropertyModel->getBrandNameById($selected_fields['pro_brand']);
                                    ?>
                                    <select name="pro_brand" id="pro_brand" class="form-control">

                                        <?php

                                        if (is_array($brand) && count($brand) != 0) {
                                            if ($selected_fields['pro_brand'] == "" || $selected_fields['pro_brand'] == "0") {
                                                ?>
                                                <option value="0" selected="selected">Select Brand</option>
                                                <?php

                                            } else {
                                                ?>
                                                <option value="<?php echo $selected_fields['pro_brand']; ?>"
                                                        selected="selected"><?php echo $brand[0]->name; ?></option>
                                                <?php
                                            }
                                            ?>

                                            <?php
                                        } else if ($selected_fields['pro_brand'] == "" || $selected_fields['pro_brand'] == "0") {
                                            ?>
                                            <option value="0" selected="selected">Select Brand</option>
                                            <?php

                                        } else {
                                            $modelTop = $this->PropertyModel->getTopBrandNameById($selected_fields['pro_brand']);
                                            ?>
                                            <option value="<?php echo $selected_fields['pro_brand']; ?>"
                                                    selected="selected"><?php echo (is_array($modelTop) && count($modelTop) != 0) ? $modelTop[0]->name : null; ?></option>
                                            <option value="0">Select Brand</option>
                                            <?php
                                        }
                                        ?>

                                        <optgroup label="Favorite Brands">
                                            <?php foreach ($top_models as $top_model): ?>
                                                <option value="<?php echo $top_model->model_id; ?>"><?php echo $top_model->name; ?></option>
                                            <?php endforeach; ?>
                                        </optgroup>
                                        <optgroup label="Other Brands">
                                            <?php foreach ($models as $model): ?>
                                                <option value="<?php echo $model->model_id; ?>"><?php echo $model->name; ?></option>
                                            <?php endforeach; ?>
                                        </optgroup>
                                    </select>
                                    <?php
                                } else {
                                    ?>


                                    <select name="pro_brand" id="pro_brand" class="form-control">

                                        <option value="0" selected="selected">Select Brand</option>


                                        <optgroup label="Favorite Brands">
                                            <?php foreach ($top_models as $top_model): ?>
                                                <option value="<?php echo $top_model->model_id; ?>"><?php echo $top_model->name; ?></option>
                                            <?php endforeach; ?>
                                        </optgroup>
                                        <optgroup label="Other Brands">
                                            <?php foreach ($models as $model): ?>
                                                <option value="<?php echo $model->model_id; ?>"><?php echo $model->name; ?></option>
                                            <?php endforeach; ?>
                                        </optgroup>
                                    </select>
                                    <?php
                                }
                                ?>

                            </div>


                        </h4>
                    </div>
                    <!-- Content -->
                </div>
                <?php
            }else{
            ?>
            <div class="panel panel-default">
                <!-- Heading -->
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-type"
                             style="padding-right: 5px; padding-left: 5px">
                    <select name="pro_brand" id="pro_brand" class="form-control">

                    <option value="0" selected="selected">Select Brand</option>


                    <optgroup label="Favorite Brands">
                        <?php foreach ($top_models as $top_model): ?>
                            <option value="<?php echo $top_model->model_id; ?>"><?php echo $top_model->name; ?></option>
                        <?php endforeach; ?>
                    </optgroup>
                    <optgroup label="Other Brands">
                        <?php foreach ($models as $model): ?>
                            <option value="<?php echo $model->model_id; ?>"><?php echo $model->name; ?></option>
                        <?php endforeach; ?>
                    </optgroup>
                </select>
                        </div>
                    </h4>
                </div>
            </div>
            <?php
            }
            ?>
            <!-- Brands Panel End -->

            <?php


            if(isset($selected_fields['pro_model'])) {

            ?>

            <!-- Condition Panel -->
            <div class="panel panel-default">
                <!-- Heading -->
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">


                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-type" style="padding-right: 5px; padding-left: 5px">
                            <?php
                            //var_dump($selected_fields);
                            if(isset($selected_fields) && count($selected_fields) != 0) {
                                $model = $this->PropertyModel->getModelNameById($selected_fields['pro_model']);
                                ?>
                                <select name="pro_model" id="pro_model" class="form-control">
                                    <?php
                                    if($selected_fields['pro_model'] == "" || $selected_fields['pro_model'] == "0"){
                                    ?>
                                        <option value="0" selected="selected">
                                           Select Model
                                        </option>
                                    <?php

                                    }else{
                                        ?>

                                        <option value="<?php echo $selected_fields['pro_model']; ?>" selected="selected">
                                            <?php echo (is_array($model) && count($model) != 0) ? $model[0]->name : null; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>




                                    <?php foreach ($models as $model): ?>
                                        <option value="<?php echo $model->model_id; ?>"><?php echo $model->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php
                            }else{
                                ?>
                                <select name="pro_model" id="pro_model" class="form-control">
                                    <option value="0" selected="selected">Select Model</option>
                                    <?php foreach ($models as $model): ?>
                                        <option value="<?php echo $model->model_id; ?>"><?php echo $model->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <?php
                            }
                            ?>

                        </div>


                    </h4>
                </div>
                <!-- Content -->
            </div>
            <!-- Condition Panel End -->
                <?php
            }else{
                ?>
            <div class="panel panel-default">
                <!-- Heading -->
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-type"
                             style="padding-right: 5px; padding-left: 5px">
                    <select name="pro_model" id="pro_model" class="form-control">
                    <option value="0" selected="selected">Select Model</option>
                    <?php foreach ($models as $model): ?>
                        <option value="<?php echo $model->model_id; ?>"><?php echo $model->name; ?></option>
                    <?php endforeach; ?>
                </select>
                        </div>
                    </h4>
                </div>
            </div>
            <?php
            }
            ?>
            <!-- Condition Panel -->

            <!-- Condition Panel End -->
            <!-- Body Type Panel -->
            <?php


            if(isset($selected_fields['yom'])) {

            ?>
            <div class="panel panel-default">
                <!-- Heading -->
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">


                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-right: 5px; padding-left: 5px">
                            <?php
                            if(isset($selected_fields) && count($selected_fields) != 0) {
                                ?>
                                <input type="text" name="yom" id="yom" value="<?php echo $selected_fields['yom']; ?>" class="form-control" placeholder="Enter Year of Manufacture">
                            <?php
                            }else{
                                ?>
                                <input type="text" name="yom" id="yom" class="form-control" placeholder="Enter Year of Manufacture">
                            <?php
                            }
                            ?>

                        </div>


                    </h4>
                </div>
                <!-- Content -->
            </div>
            <?php
            }
            else{
            ?>
                <div class="panel panel-default">
                    <!-- Heading -->
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-right: 5px; padding-left: 5px">

                                    <input type="text" name="yom" id="yom" class="form-control" placeholder="Enter Year of Manufacture">


                            </div>


                        </h4>
                    </div>
                    <!-- Content -->
                </div>
            <?php
            }
            ?>
            <!-- Condition Panel End -->
            <!-- Pricing Panel -->
            <?php


            if(isset($selected_fields['yor'])) {

                ?>
                <div class="panel panel-default">
                    <!-- Heading -->
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                 style="padding-right: 5px; padding-left: 5px">
                                <?php
                                if (isset($selected_fields) && count($selected_fields) != 0) {
                                    ?>
                                    <input type="text" name="yor" id="yor"
                                           value="<?php echo $selected_fields['yor']; ?>" class="form-control"
                                           placeholder="Enter Year of Register">
                                    <?php
                                } else {
                                    ?>
                                    <input type="text" name="yor" id="yor" class="form-control"
                                           placeholder="Enter Year of Register">
                                    <?php
                                }
                                ?>
                            </div>


                        </h4>
                    </div>
                    <!-- Content -->
                </div>
                <?php
            }
            else{
?>
                <div class="panel panel-default">
                    <!-- Heading -->
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                 style="padding-right: 5px; padding-left: 5px">

                                    <input type="text" name="yor" id="yor" class="form-control"
                                           placeholder="Enter Year of Register">

                            </div>


                        </h4>
                    </div>
                    <!-- Content -->
                </div>
            <?php
            }
            ?>
            <!-- Pricing Panel End -->

            <?php


            if(isset($selected_fields['engine'])) {

            ?>
            <!-- Year Panel -->
            <div class="panel panel-default">
                <!-- Heading -->
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-right: 5px; padding-left: 5px">
                            <?php
                            if(isset($selected_fields) && count($selected_fields) != 0) {
                                ?>
                                <input type="text" name="engine" id="engine" value="<?php echo $selected_fields['engine']; ?>" class="form-control" placeholder="Enter Engine Capacity">
                                <?php
                            }else{
                                ?>
                                <input type="text" name="engine" id="engine" class="form-control" placeholder="Enter Engine Capacity">
                                <?php
                            }
                            ?>
                        </div>


                    </h4>
                </div>
                <!-- Content -->
            </div>
            <?php
            }else{
                ?>
                <div class="panel panel-default">
                    <!-- Heading -->
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-right: 5px; padding-left: 5px">

                                    <input type="text" name="engine" id="engine" class="form-control" placeholder="Enter Engine Capacity">

                            </div>


                        </h4>
                    </div>
                    <!-- Content -->
                </div>
            <?php
            }
            ?>


            <?php


            if(isset($selected_fields['transmission'])) {

                ?>

                <div class="panel panel-default">
                    <!-- Heading -->
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                 style="padding-right: 5px; padding-left: 5px">


                                <?php
                                if (isset($selected_fields) && count($selected_fields) != 0) {
                                    ?>
                                    <?php echo form_dropdown('transmission',
                                        $transmissions,
                                        $selected_fields['transmission'], 'class="form-control" id="transmission" ') ?>
                                    <?php
                                } else {
                                    ?>
                                    <?php echo form_dropdown('transmission',
                                        $transmissions,
                                        '', 'class="form-control" id="transmission" ') ?>
                                    <?php
                                }
                                ?>
                            </div>


                        </h4>
                    </div>
                    <!-- Content -->
                </div>

                <?php
            }else{
                ?>
                <div class="panel panel-default">
                    <!-- Heading -->
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                 style="padding-right: 5px; padding-left: 5px">

                                    <?php echo form_dropdown('transmission',
                                        $transmissions,
                                        '', 'class="form-control" id="transmission" ') ?>

                            </div>


                        </h4>
                    </div>
                    <!-- Content -->
                </div>
            <?php
            }
            ?>


            <?php


            if(isset($selected_fields['fuel_type'])) {

            ?>

            <div class="panel panel-default">
                <!-- Heading -->
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">


                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-right: 5px; padding-left: 5px">
                            <?php
                            if(isset($selected_fields) && count($selected_fields) != 0) {
                                ?>
                                <?php echo form_dropdown('fuel_type',
                                    $fuel_types,
                                    $selected_fields['fuel_type'],'class="form-control" id="fuel_type" ') ?>
                                <?php
                            }else{
                                ?>
                                <?php echo form_dropdown('fuel_type',
                                    $fuel_types,
                                    '','class="form-control" id="fuel_type" ') ?>
                                <?php
                            }
                            ?>
                        </div>


                    </h4>
                </div>
                <!-- Content -->
            </div>

                <?php
            }else {
                ?>

                <div class="panel panel-default">
                    <!-- Heading -->
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-right: 5px; padding-left: 5px">

                                    <?php echo form_dropdown('fuel_type',
                                        $fuel_types,
                                        '','class="form-control" id="fuel_type" ') ?>

                            </div>


                        </h4>
                    </div>
                    <!-- Content -->
                </div>

                <?php
            }
            ?>


            <?php


            if(isset($selected_fields['pro_property_condition'])) {

                ?>

                <div class="panel panel-default">
                    <!-- Heading -->
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                 style="padding-right: 5px; padding-left: 5px">
                                <?php
                                if (isset($selected_fields) && count($selected_fields) != 0) {
                                    ?>
                                    <?php echo form_dropdown('pro_property_condition',
                                        array('0' => 'Select Condition', 'brand_new' => 'Brand New', 'reconditioned' => 'Reconditioned', 'used' => 'Used'),
                                        $selected_fields['pro_property_condition'], 'class="selectpicker form-control" id="condition" ') ?>

                                    <?php
                                } else {
                                    ?>
                                    <?php echo form_dropdown('pro_property_condition',
                                        array('0' => 'Select Condition', 'brand_new' => 'Brand New', 'used' => 'Used', 'registered' => 'Registered', 'unregistered' => 'Unregistered'),
                                        '', 'class="selectpicker form-control" id="condition" ') ?>

                                    <?php
                                }
                                ?>

                            </div>


                        </h4>
                    </div>
                    <!-- Content -->
                </div>

                <?php
            }else{
                ?>
                <div class="panel panel-default">
                    <!-- Heading -->
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                 style="padding-right: 5px; padding-left: 5px">

                                    <?php echo form_dropdown('pro_property_condition',
                                        array('0' => 'Select Condition', 'brand_new' => 'Brand New', 'used' => 'Used', 'registered' => 'Registered', 'unregistered' => 'Unregistered'),
                                        '', 'class="selectpicker form-control" id="condition" ') ?>
                            </div>


                        </h4>
                    </div>
                    <!-- Content -->
                </div>
            <?php
            }
            ?>


            <?php


            if(isset($selected_fields['mileage_from']) || isset($selected_fields['mileage_to'])) {

                ?>
                <div class="panel panel-default">
                    <!-- Heading -->
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                 style="padding-right: 5px; padding-left: 5px">
                                <?php
                                if (isset($selected_fields) && count($selected_fields) != 0) {
                                    ?>
                                    <input type="text" name="mileage_from" id="mileage_from"
                                           value="<?php echo $selected_fields['mileage_from']; ?>" class="form-control"
                                           placeholder="Enter Start Mileage">
                                    <?php
                                } else {
                                    ?>
                                    <input type="text" name="mileage_from" id="mileage_from" class="form-control"
                                           placeholder="Enter Start Mileage">
                                    <?php
                                }
                                ?>

                                <p style="text-align: center; margin-bottom: 0; font-size: 13px; font-weight: 900">
                                    To</p>
                                <?php
                                if (isset($selected_fields) && count($selected_fields) != 0) {
                                    ?>
                                    <input type="text" name="mileage_to" id="mileage_to"
                                           value="<?php echo $selected_fields['mileage_to']; ?>" class="form-control"
                                           placeholder="Enter End Mileage">
                                    <?php
                                } else {
                                    ?>
                                    <input type="text" name="mileage_to" id="mileage_to" class="form-control"
                                           placeholder="Enter End Mileage">
                                    <?php
                                }
                                ?>

                            </div>


                        </h4>
                    </div>
                    <!-- Content -->
                </div>
                <?php
            }else{
                ?>
                <div class="panel panel-default">
                    <!-- Heading -->
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                 style="padding-right: 5px; padding-left: 5px">

                                    <input type="text" name="mileage_from" id="mileage_from" class="form-control"
                                           placeholder="Enter Start Mileage">


                                <p style="text-align: center; margin-bottom: 0; font-size: 13px; font-weight: 900">
                                    To</p>

                                    <input type="text" name="mileage_to" id="mileage_to" class="form-control"
                                           placeholder="Enter End Mileage">


                            </div>


                        </h4>
                    </div>
                    <!-- Content -->
                </div>
            <?php
            }
            ?>


            <?php


            if(isset($selected_fields['price_from']) || isset($selected_fields['price_to'])) {

                ?>
                <div class="panel panel-default">
                    <!-- Heading -->
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                 style="padding-right: 5px; padding-left: 5px">
                                <?php
                                if (isset($selected_fields) && count($selected_fields) != 0) {
                                    ?>
                                    <input type="text" name="price_from"
                                           value="<?php echo $selected_fields['price_from']; ?>" id="price_from"
                                           class="form-control" placeholder="Enter Start Price">
                                    <?php
                                } else {
                                    ?>
                                    <input type="text" name="price_from" id="price_from" class="form-control"
                                           placeholder="Enter Start Price">
                                    <?php
                                }
                                ?>


                                <p style="text-align: center; margin-bottom: 0; font-size: 13px; font-weight: 900">
                                    To</p>
                                <?php
                                if (isset($selected_fields) && count($selected_fields) != 0) {
                                    ?>
                                    <input type="text" name="price_to"
                                           value="<?php echo $selected_fields['price_to']; ?>" id="price_to"
                                           class="form-control" placeholder="Enter End Price">
                                    <?php
                                } else {
                                    ?>
                                    <input type="text" name="price_to" id="price_to" class="form-control"
                                           placeholder="Enter End Price">
                                    <?php
                                }
                                ?>


                            </div>


                        </h4>
                    </div>
                    <!-- Content -->
                </div>
                <?php
            }else{
                ?>
                <div class="panel panel-default">
                    <!-- Heading -->
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                 style="padding-right: 5px; padding-left: 5px">

                                    <input type="text" name="price_from" id="price_from" class="form-control"
                                           placeholder="Enter Start Price">


                                <p style="text-align: center; margin-bottom: 0; font-size: 13px; font-weight: 900">
                                    To</p>

                                    <input type="text" name="price_to" id="price_to" class="form-control"
                                           placeholder="Enter End Price">


                            </div>


                        </h4>
                    </div>
                    <!-- Content -->
                </div>
            <?php
            }
            ?>
            <div class="panel panel-default">
                <!-- Heading -->
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">


                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-right: 5px; padding-left: 5px">

                            <?php
                            if(isset($selected_fields) && count($selected_fields) != 0){
                                ?>
                                <?php echo form_dropdown('pro_district',
                                    $districts,
                                    $selected_fields['pro_district'],'class="selectpicker form-control"  data-live-search="true" id="pro_district" ') ?>
                            <?php
                            }else{
                                ?>
                                <?php echo form_dropdown('pro_district',
                                    $districts,
                                    '','class="selectpicker form-control"  data-live-search="true" id="pro_district" ') ?>
                            <?php
                            }
                            ?>
                               
                           
                        </div>


                    </h4>
                </div>
                <!-- Content -->
            </div>

            <?php


            if(isset($selected_fields['price_from']) || isset($selected_fields['price_to'])) {

                ?>
                <div class="panel panel-default">
                    <!-- Heading -->
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                 style="padding-right: 5px; padding-left: 5px">
                                <!--                            <input type="text" name="car_sale" id="car_sale" class="form-control" placeholder="Eg: Indra Traders">-->


                                <?php
                                if (isset($selected_fields) && count($selected_fields) != 0) {
                                    ?>
                                    <?php echo form_dropdown('car_sale',
                                        $car_sales,
                                        $selected_fields['car_sale'], 'class="form-control" id="car_sale" ') ?>
                                    <?php
                                } else {
                                    ?>
                                    <?php echo form_dropdown('car_sale',
                                        $car_sales,
                                        '', 'class="form-control" id="car_sale" ') ?>
                                    <?php
                                }
                                ?>
                            </div>


                        </h4>
                    </div>
                    <!-- Content -->
                </div>
                <?php
            }else{
                ?>
                <div class="panel panel-default">
                    <!-- Heading -->
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                 style="padding-right: 5px; padding-left: 5px">
                                <!--                            <input type="text" name="car_sale" id="car_sale" class="form-control" placeholder="Eg: Indra Traders">-->



                                    <?php echo form_dropdown('car_sale',
                                        $car_sales,
                                        '', 'class="form-control" id="car_sale" ') ?>

                            </div>


                        </h4>
                    </div>
                    <!-- Content -->
                </div>
            <?php
            }
            ?>
            <div class="panel panel-default">
                <!-- Heading -->
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">


                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-right: 5px; padding-left: 5px">

                            <?php
                            if(isset($selected_fields) && count($selected_fields) != 0){
                                ?>
                                <input type="text" value="<?php echo $selected_fields['keyword']; ?>" name="keyword" id="keyword" class="form-control" placeholder="Enter Keyword">
                                <?php
                            }else{
                                ?>
                                <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Enter Keyword">
                                <?php
                            }
                            ?>
                        </div>


                    </h4>
                </div>
                <!-- Content -->
            </div>
            <div class="panel panel-default">
                <!-- Heading -->
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">

                        <button type="submit" name="adv_search_clear" id="clear_bn_adv" class="btn btn-flat btn-success btn-sm" style="margin-top: 10px; margin-bottom: 10px; margin-left: 10px; margin-right: -10px">Clear</button>

                        <button type="submit" name="adv_search" class="btn btn-flat btn-warning btn-sm" style="margin-top: 10px; margin-bottom: 10px; margin-left: 10px; margin-right: -10px; padding-left: 30px; padding-right: 30px">Search</button>                                        </h4>
                    </h4>
                </div>
                <!-- Content -->
            </div>
            <!-- Year Panel End -->
            <!-- Latest Ads Panel -->

            <!-- Latest Ads Panel End -->
        </form>
    </div>
    <!-- panel-group end -->
</div>

<?php



?>

<!--<script>-->
<!--    $( document ).ready(function() {-->
<!--        var baseurl = $('body').data('baseurl');-->
<!---->
<!---->
<!--        $('#clear_bn_adv').click(function(){-->
<!---->
<!--            $("#adv_search_form").trigger('reset');-->
<!--            //$('#adv_search_form').reset();-->
<!--           //$("#adv_search_form")[0].reset();-->
<!---->
<!---->
<!--//            $('#body_type').prop('selectedIndex',0).trigger('change');-->
<!--//-->
<!--//            $('#body_type').val('0').trigger('change');-->
<!--//            $('#pro_brand').val('0').trigger('change');-->
<!--//            $('#pro_model').val('0').trigger('change');-->
<!--//            $('#yom').val('').trigger('change');-->
<!--//            $('#yor').val('').trigger('change');-->
<!--//            $('#engine').val('').trigger('change');-->
<!--//            $('#transmission').val('0').trigger('change');-->
<!--//            $('#fuel_type').val('0').trigger('change');-->
<!--//            $('#pro_property_condition').val('0').trigger('change');-->
<!--//            $('#mileage_from').val('').trigger('change');-->
<!--//            $('#mileage_to').val('').trigger('change');-->
<!--//            $('#price_from').val('').trigger('change');-->
<!--//            $('#price_to').val('').trigger('change');-->
<!--//            $('#pro_district').val('0').trigger('change');-->
<!--//            $('#car_sale').val('0').trigger('change');-->
<!--//            $('#keyword').val('').trigger('change');-->
<!---->
<!--        });-->
<!---->
<!--    });-->
<!--</script>-->