<style>
    #map{
        height: 400px;
        width: 100%;
    }

    .fileuploader-theme-dragdrop .fileuploader-input{
        padding-top: 20px;
        padding-bottom: 20px;
    }

    #property-add-form input, #property-add-form textarea{
        font-weight: 500;
        color: #333333;
    }
</style>


<section class="content-header">

    <h3>Property Management</h3>

</section>
<section class="content">
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="active">Property Management</li>
            <li class="active">Create Advertisement</li>
        </ol>
    </div>
    <div class="panel-heading clearfix" style="background-color: #823168">
        <h4 class="panel-title" style=" color: #FFFFFF;">Post Advertisement</h4>
    </div>

    <div class="panel panel-white">

        <div class="panel-body">





            <div class="container">
                <?php $this->view('user/top-bar'); ?>

                <div class="row">
                    <?php if ($this->session->flashdata('message_suc_acc_up')) { ?>
                        <div class="alert alert-success"> <?= $this->session->flashdata('message_suc_acc_up') ?> </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('message_suc_acc_update')) { ?>
                        <div class="alert alert-success"> <?= $this->session->flashdata('message_suc_acc_update') ?> </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('message_suc_password_update')) { ?>
                        <div class="alert alert-success"> <?= $this->session->flashdata('message_suc_password_update') ?> </div>
                    <?php } ?>


                    <div class="col-md-8 col-sm-12 col-xs-12">



                        <article class="blog-details" style="padding: 20px">
                            <div class="article-desc bg-1" style="background-color: #ffffff !important;">
                                <?php if ($this->session->flashdata('message_error_property')) { ?>
                                    <div class="alert alert-danger"> <?= $this->session->flashdata('message_error_property') ?> </div>
                                <?php } ?>

                                <div class="post-title">

                                    <?php
//                                    $current_date = date('d-m-Y H:i:s');
//                                    $date = new DateTime("+3 months");
//                                    echo $current_date;
                                    ?>
                                </div>
                                <div class="post-content" id="property-add-form">
                                    <h5></h5>
                                    <?php
                                    $form = array(
                                        'name' => 'property_save',
                                        'id' => 'property_save'
                                    );
                                    echo form_open_multipart('admin/store_property', $form) ?>

                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="profile-update">
<!--                                            <div class="profile-title">-->
<!--                                                <h4 style="color: #000; margin-top: 20px; margin-bottom: 20px"> Post Advertisement </h4>-->
<!--                                            </div>-->
                                            <div class="profile-desc">
                                                <div class="row">
                                                    <div class="profile-top-form">
                                                        <div class="row" style="border:1px solid #CCCCCC; background: #fdfdfd; padding: 20px">
                                                            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; padding-top: 15px">
                                                                <p style="text-decoration: underline; font-size: 18px; font-weight: 800">Sales Information</p>
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="input-type">
                                                                        <label>Car Sale<span style="color: #cb1a09;">*</span></label>
                                                                        <?php echo form_dropdown('car_sale_select',
                                                                            $car_sales,
                                                                            set_value('car_sale_select'),'class="selectpicker form-control"  data-live-search="true" id="car_sale_select" ') ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; margin-top: 15px">
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <div class="input-type">
                                                                            <label>Name</label>
                                                                            <input type="text" name="car_sale_name" id="car_sale_name" value="<?php echo set_value('car_sale_name'); ?>" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <div class="input-type">
                                                                            <label>Contact No</label>
                                                                            <input type="text" name="car_sale_contactno" id="car_sale_contactno" value="<?php echo set_value('car_sale_contactno'); ?>" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top: 10px">
                                                                        <div class="input-type">
                                                                            <label>Address</label>
                                                                            <input type="text" name="car_sale_address" id="car_sale_address" value="<?php echo set_value('car_sale_address'); ?>" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

<!--                                                        <div class="col-md-12 col-sm-12 col-xs-12" style="padding-top: 15px">-->
<!--                                                            <div class="input-type">-->
<!--                                                                <label>Type of Ad</label>-->
<!--                                                                --><?php //echo form_dropdown('pro_offer_type',
//                                                                    array('0'=>'Select','rent'=>'Rent', 'sell' => 'Sell', 'wanted' => 'wanted'),
//                                                                    set_value('pro_offer_type'),'class="selectpicker form-control" id="pro_offer_type" ') ?>
<!--                                                            </div>-->
<!--                                                        </div>-->
                                                        <div class="row" style="border:1px solid #CCCCCC; background: #fdfdfd; padding: 20px; margin-top: 20px">
                                                            <p style="text-decoration: underline; font-size: 18px; font-weight: 800">General Information</p>
                                                            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; padding-top: 15px">
                                                            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; margin-top: 10px; display: none">
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="input-type">
                                                                        <label>Ref ID</label>
                                                                        <input type="text" name="pro_refid" id="pro_refid" readonly value="<?php echo $refid; ?>" class="form-control">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 15px">
                                                                <div class="input-type">
                                                                    <label>Body Type <span style="color: #cb1a09;">*</span></label>
                                                                    <?php echo form_dropdown('pro_body_type',
                                                                        $body_types,
                                                                        set_value('pro_body_type'),'class="selectpicker form-control" id="pro_body_type" ') ?>
                                                                </div>
                                                            </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 15px">
                                                                    <div class="input-type">
                                                                        <label>Sub Body Type</label>
                                                                        <select name="pro_sub_body_type" id="pro_sub_body_type" class="form-control">
                                                                            <option value="0" selected="selected">Select Sub Body Type</option>
                                                                        </select>
                                                                    </div>
                                                                    <label id="pro_body_type-error" class="error" for="pro_sub_body_type"></label>
                                                                </div>
                                                        </div>

                                                            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; padding-top: 15px">
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="input-type">
                                                                        <label>Brand<span style="color: #cb1a09;">*</span></label>
<!--                                                                        --><?php //echo form_dropdown('pro_brand',
//                                                                            $models,
//                                                                            set_value('pro_brand'),'class="form-control" id="pro_brand" ') ?>


                                                                        <select name="pro_brand" id="pro_brand" class="form-control">
                                                                            <option value="0" selected="selected">Select Brand</option>
                                                                            <optgroup label="Top Brands">
                                                                            <?php foreach($top_models as $top_model):?>
                                                                                <option value="<?php echo $top_model->model_id; ?>"><?php echo $top_model->name; ?></option>
                                                                            <?php endforeach; ?>
                                                                            </optgroup>
                                                                            <optgroup label="Brands">
                                                                                <?php foreach($models as $model):?>
                                                                                    <option value="<?php echo $model->model_id; ?>"><?php echo $model->name; ?></option>
                                                                                <?php endforeach; ?>
                                                                            </optgroup>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="input-type">
                                                                        <label>Model<span style="color: #cb1a09;">*</span></label>
                                                                        <select name="pro_model" id="pro_model" class="form-control">
                                                                            <option value="0" selected="selected">Select Model</option>
                                                                        </select>
<!--                                                                        --><?php //echo form_dropdown('pro_model',
//                                                                            $models,
//                                                                            set_value('pro_model'),'class="selectpicker form-control" id="pro_model" ') ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <!--                                                    <div class="col-md-12 col-sm-12 col-xs-12">-->
                                                        <!--                                                        <div class="input-type">-->
                                                        <!--                                                            <label>Title</label>-->
                                                        <!--                                                            <input type="text" name="property_title" id="property_title" value="--><?php //echo set_value('property_title'); ?><!--" class="form-control" placeholder="Eg : BMW M for Sale">-->
                                                        <!--                                                        </div>-->
                                                        <!--                                                    </div>-->


<!--                                                        <div class="col-md-12 col-sm-12 col-xs-12" style="padding-top: 15px">-->
<!--                                                            <div class="input-type">-->
<!--                                                                <label>Title</label>-->
<!--                                                                <input type="text" name="property_title" id="property_title" value="--><?php //echo set_value('property_title'); ?><!--" class="form-control" placeholder="Eg :  Toyota Corolla 121.">-->
<!--                                                            </div>-->
<!--                                                        </div>-->




                                                            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; margin-top: 25px">
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="input-type">
                                                                        <label>Condition<span style="color: #cb1a09;">*</span></label>
                                                                        <?php echo form_dropdown('pro_property_condition',
                                                                            array('0' => 'Select','brand_new' => 'Brand New',  'reconditioned' => 'Reconditioned','used' => 'Used'),
                                                                            set_value('pro_property_condition'),'class="selectpicker form-control" id="pro_property_condition" ') ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="input-type">
                                                                        <label>Edition</label>
                                                                        <input type="text" name="pro_edition" id="pro_edition" value="<?php echo set_value('pro_edition'); ?>" class="form-control" placeholder="Eg :  Corolla 121.">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; margin-top: 25px">

                                                                <div class="col-md-6 col-sm-6 col-xs-12" id="regi_no_div" style="display: none">
                                                                    <div class="input-type">
                                                                        <label>Registration No</label>
                                                                        <input type="text" name="pro_regi_no" id="pro_regi_no" value="<?php echo set_value('pro_regi_no'); ?>" class="form-control">
                                                                    </div>
                                                                    <div class="input-type">
                                                                        <input style="float: left; margin: 10px; margin-top: 20px; margin-left: 0" type="hidden" name="show_in_ad_regno" id="show_in_ad_regno" value="0" class="form-control">
                                                                        <input style="float: left; margin: 10px; margin-top: 20px; margin-left: 0" type="checkbox" name="show_in_ad_regno" id="show_in_ad_regno" value="1">
                                                                        <label style="float: left; margin: 10px; padding-top: 5px">Show in the detail section</label>
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; margin-top: 15px">
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="input-type">
                                                                        <label>Year of Manufacture<span style="color: #cb1a09;">*</span></label>
                                                                        <input type="text" name="property_year_manu" id="property_year_manu" value="<?php echo set_value('property_year_manu'); ?>" class="form-control" placeholder="Eg :  1950.">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="input-type">
                                                                        <label>Year of Register</label>
                                                                        <input type="text" name="property_regi_year" id="property_regi_year" value="<?php echo set_value('property_regi_year'); ?>" class="form-control" placeholder="Eg :  2000.">
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; margin-top: 15px">
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="input-type">
                                                                        <label>Transmission Type<span style="color: #cb1a09;">*</span></label>
                                                                        <?php echo form_dropdown('pro_transmission_types',
                                                                            $trans_types,
                                                                            set_value('pro_transmission_types'),'class="selectpicker form-control" id="pro_transmission_types" ') ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="input-type">
                                                                        <label>Engine Capacity (cc)</label>
                                                                        <input type="text" name="property_engine_size" id="property_engine_size" value="<?php echo set_value('property_engine_size'); ?>" class="form-control" placeholder="Eg :  1000CC.">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; margin-top: 15px">
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="input-type">
                                                                        <label>Fuel Type<span style="color: #cb1a09;">*</span></label>
                                                                        <?php echo form_dropdown('pro_fuel_types',
                                                                            $fuel_types,
                                                                            set_value('pro_fuel_types'),'class="selectpicker form-control" id="pro_fuel_types" ') ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="input-type">
                                                                        <label>Mileage (km):</label>
                                                                        <input type="text" name="property_mileage" id="property_mileage" value="<?php echo set_value('property_mileage'); ?>" class="form-control" placeholder="Eg :  1000km.">
                                                                    </div>
                                                                </div>
                                                            </div>




                                                            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; margin-top: 15px">

                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="input-type">
                                                                        <label>Door Count :</label>
                                                                        <?php echo form_dropdown('property_door_count',
                                                                            array('0'=>'Select Door Count','2' => '2', '3'=>'3', '4'=>'4', '5'=>'5','6'=>'6','7'=>'7','Other'=>'Other'),
                                                                            set_value('property_door_count'),'class="selectpicker form-control"  data-live-search="true" id="property_door_count" ') ?>
<!--                                                                        <input type="text" name="property_door_count" id="property_door_count" value="--><?php //echo set_value('property_door_count'); ?><!--" class="form-control" placeholder="Eg :  4.">-->
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="input-type">
                                                                        <label>Seat Count :</label>
                                                                        <input type="text" name="property_seat_count" id="property_seat_count" value="<?php echo set_value('property_seat_count'); ?>" class="form-control" placeholder="Eg :  4">
                                                                    </div>
                                                                </div>
                                                            </div>
<!--                                                            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; margin-top: 15px">-->
<!---->
<!--                                                            </div>-->

                                                            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; margin-top: 15px">
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="input-type">
                                                                        <label>Exterior Color :</label>
                                                                        <?php echo form_dropdown('property_color',
                                                                            $colors,
                                                                            set_value('property_color'),'class="selectpicker form-control"  data-live-search="true" id="property_color" ') ?>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="input-type">
                                                                        <label>Interior Color :</label>
                                                                        <?php echo form_dropdown('property_inte_color',
                                                                            $colors,
                                                                            set_value('property_inte_color'),'class="selectpicker form-control"  data-live-search="true" id="property_inte_color" ') ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; margin-top: 15px">
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="input-type">
                                                                        <label>District<span style="color: #cb1a09;">*</span></label>
                                                                        <?php echo form_dropdown('pro_district',
                                                                            $districts,
                                                                            set_value('pro_district'),'class="selectpicker form-control"  data-live-search="true" id="pro_district" ') ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: !important; padding-top: 15px">


                                                                <div class="col-md-3 col-sm-3 col-xs-12 price_row">
                                                                    <div class="input-type">
                                                                        <label>Price</label>
                                                                        <?php echo form_dropdown('pro_price_type',
                                                                            array('LKR' => 'LKR'),
                                                                            set_value('pro_price_type'),'class="selectpicker form-control" id="pro_price_type" ') ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-9 col-sm-9 col-xs-12 price_row">
                                                                    <div class="input-type">
                                                                        <label>.</label>
                                                                        <input type="text" name="pro_price" value="<?php echo set_value('pro_price'); ?>" id="pro_price" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <!--                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px">-->
                                                                <!--                                                                <div class="col-md-1 col-sm-1 col-xs-12">-->
                                                                <!--                                                                    <div class="input-type">-->
                                                                <!--                                                                        <input type="hidden" name="price_onrequest" value="0">-->
                                                                <!--                                                                        <input type="checkbox" name="price_onrequest" value="1" id="postad_check_req_price">-->
                                                                <!--                                                                    </div>-->
                                                                <!---->
                                                                <!---->
                                                                <!--                                                                </div>-->
                                                                <!--                                                                <div class="col-md-11 col-sm-11 col-xs-12">-->
                                                                <!--                                                                    Price On Request-->
                                                                <!--                                                                </div>-->
                                                                <!--                                                            </div>-->

                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="price_nagotiable_row" style="margin-top: 20px">
                                                                    <div class="col-md-1 col-sm-1 col-xs-12">
                                                                        <div class="input-type">
                                                                            <input type="hidden" name="price_nagotiable" value="0">
                                                                            <input type="checkbox" name="price_nagotiable" value="1">
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-md-11 col-sm-11 col-xs-12">
                                                                        Price Negotiable
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div><!-- end of row | general info -->


                                                        <div class="row" style="border:1px solid #CCCCCC; background: #fdfdfd; padding: 20px; margin-top: 20px">
                                                            <p style="text-decoration: underline; font-size: 18px; font-weight: 800">Images</p>

                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="input-type">
                                                                    <label>Main Image</label>
                                                                    <input type="file" name="property_main_image" id="property_main_image" class="form-control">
                                                                </div>
                                                            </div>

                                                        <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px">
                                                            <div class="input-type">
                                                                <?php $session_array  = $this->session->userdata('logged_in_admin');
                                                                //var_dump($session_array);
                                                                ?>
                                                                <label>Upload other Images</label>
                                                                <input type="hidden" id="user_id" name="user_id" value="<?php echo (count($session_array) != 0) ? $session_array['user_id'] : null; ?>">
                                                                <input class="form-control" id="pro_images" name="pro_images" type="file">
                                                            </div>
                                                            <div class="profile-title">
                                                                <p style="margin-top: 15px;">
                                                                    Maximum images size is 5MB and you can upload only 7 images. Please upload the main image of the vehicle in main image section.
                                                                </p>
                                                            </div>
                                                        </div>
                                                        </div><!--end of row photos -->
                                                        <br>
<!--                                                        <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 15px; display: none">-->
<!--                                                            <div class="row">-->
<!--                                                                <div class="col-md-6 col-sm-6 col-xs-12">-->
<!--                                                                    <div class="input-type">-->
<!--                                                                        <label>District</label>-->
<!--                                                                        --><?php //echo form_dropdown('pro_district',
//                                                                            $districts,
//                                                                            set_value('pro_district'),'class="form-control" id="pro_district" ') ?>
<!--                                                                    </div>-->
<!--                                                                </div>-->
<!--                                                                <div class="col-md-6 col-sm-6 col-xs-12">-->
<!--                                                                    <div class="input-type">-->
<!--                                                                        <label>City</label>-->
<!--                                                                        <select name="pro_city" id="pro_city" class="form-control">-->
<!--                                                                            <option value="0">Select City</option>-->
<!--                                                                        </select>-->
<!--                                                                    </div>-->
<!--                                                                </div>-->
<!---->
<!--                                                                <div class="col-md-12 col-sm-12 col-xs-12">-->
<!--                                                                    <div class="form-group map-border">-->
<!--                                                                        <div id="map"></div>-->
<!---->
<!--                                                                    </div>-->
<!--                                                                    <input type="hidden" class="form-control" id="mylat" name="lat" value="--><?php //echo set_value('lat'); ?><!--"/>-->
<!--                                                                    <input type="hidden" class="form-control" id="mylng" name="lng" value="--><?php //echo set_value('lng'); ?><!--"/>-->
<!--                                                                </div>-->
<!---->
<!--                                                            </div>-->
<!--                                                        </div>-->


                                                        <div class="row" style="border:1px solid #CCCCCC; background: #fdfdfd; padding: 20px">
                                                            <p style="text-decoration: underline; font-size: 18px; font-weight: 800">Options and Features</p>
                                                            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; margin-top: 10px">
                                                                <p style="padding-left: 15px">
                                                                    <label>
                                                                        <input type="checkbox" id="checkAll"/>
                                                                        &nbsp;&nbsp;&nbsp;Check / Uncheck all
                                                                    </label>
                                                                </p>
                                                                <div id="featureRow">
                                                                <?php
                                                                foreach ($features as $feature){
                                                                    ?>
                                                                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-6'>
                                                                        <div class='checkbox'>
                                                                            <label class='input-name-1'>
                                                                                <input type='checkbox' class='feature_list' name='feature_list[]' id='feature_list_<?php echo $feature->id; ?>' value='<?php echo $feature->id; ?>'>
                                                                                <label>
                                                                                    <?php echo $feature->name; ?>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                    </div>

                                                                <?php
                                                                }
                                                                ?>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row" style="border:1px solid #CCCCCC; background: #fdfdfd; padding: 20px; margin-top: 20px">
                                                            <p style="text-decoration: underline; font-size: 18px; font-weight: 800">Additional Information</p>
                                                        <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; margin-top: 10px">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="input-type">
                                                                    <textarea class="form-control" onkeyup="countChar(this)" name="textarea-desc-property" id="textarea-desc-property" placeholder="Eg : Fuel Type, Door Count, Accident Free, etc.."><?php echo set_value('textarea-desc-property'); ?></textarea>
                                                                </div>
                                                                <span style="color: #990000;">Remaining character count - </span><span id="charNum">500</span>
                                                            </div>
                                                        </div>
                                                        </div>

                                                        <!--                                                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: !important;padding-right: 0 !important; ">-->
                                                        <!--                                                        <div class="col-md-6 col-sm-6 col-xs-12">-->
                                                        <!--                                                            <div class="input-type">-->
                                                        <!--                                                                <label>Door Count</label>-->
                                                        <!--                                                                --><?php //echo form_dropdown('pro_door_count',
                                                        //                                                                    array('0'=>'Select','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7'),
                                                        //                                                                    set_value('pro_door_count'),'class="selectpicker form-control" id="pro_door_count" ') ?>
                                                        <!--                                                            </div>-->
                                                        <!--                                                        </div>-->
                                                        <!--                                                        <div class="col-md-6 col-sm-6 col-xs-12">-->
                                                        <!--                                                            <div class="input-type">-->
                                                        <!--                                                                <label>Fuel Type</label>-->
                                                        <!--                                                                --><?php //echo form_dropdown('pro_fuel_types',
                                                        //                                                                    $fuel_types,
                                                        //                                                                    set_value('pro_fuel_types'),'class="selectpicker form-control" id="pro_fuel_types" ') ?>
                                                        <!--                                                            </div>-->
                                                        <!--                                                        </div>-->
                                                        <!--                                                    </div>-->

                                                            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; margin-top: 15px">
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="input-type">
                                                                        <label>Ad Category</label>
<!--                                                                        --><?php //echo form_dropdown('pro_ad_type',
//                                                                            $ad_types,
//                                                                            set_value('pro_ad_type'),'class="selectpicker form-control" id="pro_ad_type" ') ?>
                                                                    </div>
                                                                    <div class='checkbox'>
                                                                        <label class='input-name-1'>
                                                                            <input type='hidden' class='feature_list' name='feature_ad' id='feature_ad' value='0'>
                                                                            <input type='checkbox' class='feature_list' name='feature_ad' id='feature_ad' value='1'>
                                                                            <label>
                                                                               Is this a featured Vehicle?
                                                                            </label>
                                                                        </label>
                                                                    </div>
                                                                </div>
<!--                                                                <div class="col-md-6 col-sm-6 col-xs-12">-->
<!--                                                                    <input type="text" name="featured_price" id="featured_price" style="display: none">-->
<!--                                                                </div>-->
                                                            </div>

                                                        <div class="col-md-12 col-sm-12 col-xs-12" id="featured_ad_amount_parent" style="display: none">
                                                            <div class="input-type">
                                                                <label>Ad Amount</label>
                                                                <!--                                                                        --><?php //echo form_dropdown('pro_ad_type',
                                                                //                                                                            $ad_types,
                                                                //                                                                            set_value('pro_ad_type'),'class="selectpicker form-control" id="pro_ad_type" ') ?>
                                                            </div>
                                                            <div class="col-lg-6" style="padding-left: 0">
                                                                <input type='text' class="form-control" name='featured_ad_amount' id='featured_ad_amount'>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>













                                                <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; margin-top: 30px; display: none">
                                                    <div class="profile-title">
                                                        <h4>Contact </h4>
                                                        <div style="width: 100%; border-bottom: 1px solid #999999; margin-bottom: 15px;"></div>
                                                        <!--                                                <p style="margin-top: 15px; font-size: 12px">-->
                                                        <!--                                                    Make sure your details are updated so our users can easily contact you at the right channel.-->
                                                        <!--                                                </p>-->
                                                    </div>
                                                </div>
                                            <div class="profile-desc" style="display: none">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="input-type">
                                                            <label>Name and Surname<span style="color: #cb1a09;">*</span></label>
                                                            <input type="text" class="form-control" value="<?php echo set_value('pro_contact_name'); ?>" name="pro_contact_name" id="pro_contact_name" data-language='en' id="pro_contact_name">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="input-type">
                                                            <label>Contact Email<span style="color: #cb1a09;">*</span></label>
                                                            <input type="text" class="form-control" value="<?php echo set_value('pro_contact_email'); ?>" name="pro_contact_email" id="pro_contact_email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                                        <div class="input-type">
                                                            <label>Phone (Mobile)<span style="color: #cb1a09;">*</span></label>
                                                            <input type="text" class="form-control" value="<?php echo set_value('pro_contact_phone'); ?>" name="pro_contact_phone" id="pro_contact_phone">
                                                        </div>
                                                    </div>
                                                    <!--                                                <div class="col-md-6 col-sm-12 col-xs-12">-->
                                                    <!--                                                    <div class="input-type">-->
                                                    <!--                                                        <label>Phone (Home)</label>-->
                                                    <!--                                                        <input type="text" class="form-control" value="--><?php //echo set_value('pro_contact_home'); ?><!--" name="pro_contact_home" id="pro_contact_home">-->
                                                    <!--                                                    </div>-->
                                                    <!--                                                </div>-->
                                                </div>
                                            </div>

                                            <div class="g-recaptcha" data-sitekey="6LeVol8UAAAAAE9R1cWvsRWFpTFHF_CveYfAiTvq"></div>

                                        </div>

                                            <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 15px">

                                            <div class="">
                                                <button class="btn btn-flat btn-default btn-primary btn-lg" type="submit" style="border: none; color: #FFF;">Post Your Ad Now</button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>

                        </article>

                    </div>
                </div>
            </div>







        </div><!-- end of the panel body-->

    </div>
</section>

</div>

<script>

    var geocoder;
    var map;
    var map2;


    $( document ).ready(function() {
        var baseurl = $('body').data('baseurl');
        $('.input-type').on('change', '#pro_district', function () {

            var district_id = $('#pro_district').val();

            $('#pro_city').empty();
            $.ajax({
                url: baseurl+ 'vehicle/city/'+ district_id,
                type: "GET",
                success: function (data) {
                    $("#pro_city").append("<option value='0'>Select City</option>");
                    for(var i=0; i < data.length; i++){
                        $("#pro_city").append("<option value='"+data[i].cid+"'>"+data[i].cname+"</option>");
                    }
                },
                error: function (error) {
                    console.log(error);
                    alert(error);
                }
            });

        });

        $('.row').on('change', '#pro_city', function () {
            codeAddress();
        });



    });


    var geocoder;
    var map2;
    var mapEdit;



    function initialize() {
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(6.887607 , 79.860828);
        var mapOptions = {
            zoom: 15,
            center: latlng,
            mapTypeId: 'roadmap',
            zoomControl: true,
            scaleControl: true,
            disableDefaultUI: true
        };
        map2 = new google.maps.Map(document.getElementById('map'), mapOptions);


        /*    var address = 'Sri Lanka';

         geocoder.geocode({'address': address}, function (results, status) {
         var lat = parseFloat($('#mylat').val());
         var lng = parseFloat($('#mylng').val());
         var myCenter = new google.maps.LatLng(lat, lng);

         map2.setCenter(myCenter);
         if (marker) {
         marker.setMap(null);
         }

         marker = new google.maps.Marker({
         map: map2,
         position: myCenter,
         //icon: 'http://maps.google.com/mapfiles/ms/micons/homegardenbusiness.png',
         draggable: true
         });
         document.getElementById("mylat").value = marker.getPosition().lat();
         document.getElementById("mylng").value = marker.getPosition().lng();
         google.maps.event.addListener(marker, 'dragend', function (e) {
         document.getElementById('mylat').value = e.latLng.lat().toFixed(6);
         document.getElementById('mylng').value = e.latLng.lng().toFixed(6);
         });

         });*/
    }

    var marker;
    function codeAddress() {
        $('#map').show();
        //var addr = $('#no').val() + ',' + $('#street').val();


        var index = document.getElementById("pro_city").selectedIndex;
        var city = document.getElementById("pro_city").options[index].text;
        var state = $('#state').val();

        var address = city + ',' + 'Sri Lanka';

//        var address = addr + ', ' + city + ', ' + state + ',' + 'America';
        //var address = 'colombo 01' + ', ' + 'Sri Lanka';

        geocoder.geocode({'address': address}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map2.setCenter(results[0].geometry.location);
                var mapOptions = {
                    zoom: 15,
                    center: results[0].geometry.location,
                    mapTypeId: 'roadmap',
                    zoomControl: true,
                    scaleControl: true,
                    disableDefaultUI: true
                }
                map2 = new google.maps.Map(document.getElementById('map'), mapOptions);
                //alert(results[0].place_id)


                if (marker) {
                    marker.setMap(null);
                }
                marker = new google.maps.Marker({
                    map: map2,
                    position: results[0].geometry.location,
                    draggable: true
                });
                document.getElementById("mylat").value = marker.getPosition().lat();
                document.getElementById("mylng").value = marker.getPosition().lng();
                google.maps.event.addListener(marker, 'dragend', function (e) {
                    document.getElementById('mylat').value = e.latLng.lat().toFixed(6);
                    document.getElementById('mylng').value = e.latLng.lng().toFixed(6);
                    //alert();

                    var latlng = {lat: parseFloat($('#mylat').val()), lng: parseFloat($('#mylng').val())};

                    geocoder.geocode({'location': latlng}, function (results, status) {
                        if (status === google.maps.GeocoderStatus.OK) {
                            if (results[1]) {
                                //alert(results[1].place_id);
                                //alert(JSON.stringify(results[1]));
                            }
                        }
                    });
                });

            } else {
                alert("Couldn't find the address you entered.");
            }
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

