<style>
    .error{
        color: #da251d;
    }

    .checkbox{
        margin-top: 0;
        margin-bottom: 0;
    }

    .fileuploader-theme-dragdrop .fileuploader-input{
        padding-top: 15px;
        padding-bottom: 15px;
    }

    .post-ad-form .select2-container--default .select2-selection--single{
        border: 1px solid #CCCCCC;
    }

    .form-control{
        padding-top: 8px;
        padding-bottom: 8px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered{
        line-height: 35px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow{
        height: 35px;
    }

    .post-ad-form .select2-container--default .select2-selection--single{
        height:38px;
    }

    .section-padding{
        padding-bottom: 40px;
    }

    .page-header-area-2 {
        padding: 0px;
        margin-bottom: 15px;
        background: #eeeeee;
    }

</style>


<!-- =-=-=-=-=-=-= Breadcrumb =-=-=-=-=-=-= -->

<div class="page-header-area-2 gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="small-breadcrumb">
                    <div class=" breadcrumb-link">
                        <ul>
                            <li><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li><a class="active" href="#">Submit New Vehicle</a>
                        </ul>
                        <a class="btn btn-danger btn-sm" style="float: right; margin-top: 6px" href="<?php echo base_url(); ?>user/dashboard">Got To Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-content-area clearfix">
    <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
    <section class="section-padding no-top gray ">
        <!-- Main Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <h3 style="font-weight: 800; color: #000; padding-top: 10px; padding-bottom: 10px; padding-left: 20px">Post Your Advertisement</h3>
                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                    <!-- end post-padding -->
                    <div class="post-ad-form postdetails" style="padding-top: 0">




                        <?php
                        $form = array(
                            'name' => 'property_save',
                            'id' => 'property_save'
                        );
                        echo form_open_multipart('vehicle/store_vehicle', $form) ?>

                        <div class="col-md-10 col-lg-offset-1 col-sm-12 col-xs-12">
                            <div class="profile-update">
                                <!--                                            <div class="profile-title">-->
                                <!--                                                <h4 style="color: #000; margin-top: 20px; margin-bottom: 20px"> Post Advertisement </h4>-->
                                <!--                                            </div>-->
                                <div class="profile-desc">
                                    <div class="row">
                                        <div class="profile-top-form">


                                            <!--                                                        <div class="col-md-12 col-sm-12 col-xs-12" style="padding-top: 5px">-->
                                            <!--                                                            <div class="input-type">-->
                                            <!--                                                                <label>Type of Ad</label>-->
                                            <!--                                                                --><?php //echo form_dropdown('pro_offer_type',
                                            //                                                                    array('0'=>'Select','rent'=>'Rent', 'sell' => 'Sell', 'wanted' => 'wanted'),
                                            //                                                                    set_value('pro_offer_type'),'class="selectpicker form-control" id="pro_offer_type" ') ?>
                                            <!--                                                            </div>-->
                                            <!--                                                        </div>-->
                                            <div class="row" style="border:1px solid #CCCCCC; background: #fdfdfd; padding: 20px; margin-top: 20px">
                                                <p style="text-decoration: underline; font-size: 18px; font-weight: 800; color: #333333">General Information</p>
                                                <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; margin-top: 10px; display: none">
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input-type">
                                                            <label>Ref ID</label>
                                                            <input type="text" name="pro_refid" id="pro_refid" readonly value="<?php echo $refid; ?>" class="form-control">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; padding-top: 5px">
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input-type">
                                                            <label>Body Type <span style="color: #cb1a09;">*</span></label>
                                                            <?php echo form_dropdown('pro_body_type',
                                                                $body_types,
                                                                set_value('pro_body_type'),'class="selectpicker form-control" id="pro_body_type" ') ?>
                                                        </div>
                                                        <label id="pro_body_type-error" class="error" for="pro_body_type"></label>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input-type">
                                                            <label>Sub Body Type</label>
                                                            <select name="pro_sub_body_type" id="pro_sub_body_type" class="form-control">
                                                                <option value="0" selected="selected">Select Sub Body Type</option>
                                                            </select>
                                                        </div>
                                                        <label id="pro_body_type-error" class="error" for="pro_sub_body_type"></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; padding-top: 5px">
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input-type">
                                                            <label>Brand <span style="color: #cb1a09;">*</span></label>
                                                            <select name="pro_brand" id="pro_brand" class="form-control">
                                                                <option value="0" selected="selected">Select Brand</option>
                                                                <optgroup label="Favorite Brands">
                                                                    <?php foreach($top_models as $top_model):?>
                                                                        <option value="<?php echo $top_model->model_id; ?>"><?php echo $top_model->name; ?></option>
                                                                    <?php endforeach; ?>
                                                                </optgroup>
                                                                <optgroup label="Other Brands">
                                                                    <?php foreach($models as $model):?>
                                                                        <option value="<?php echo $model->model_id; ?>"><?php echo $model->name; ?></option>
                                                                    <?php endforeach; ?>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                        <label id="pro_brand-error" class="error" for="pro_brand"></label>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input-type">
                                                            <label>Model <span style="color: #cb1a09;">*</span></label>
                                                            <select name="pro_model" id="pro_model" class="form-control">
                                                                <option value="0" selected="selected">Select Model</option>
                                                                <?php foreach($models as $model):?>
                                                                    <option value="<?php echo $model->model_id; ?>"><?php echo $model->name; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--                                                    <div class="col-md-12 col-sm-12 col-xs-12">-->
                                                <!--                                                        <div class="input-type">-->
                                                <!--                                                            <label>Title</label>-->
                                                <!--                                                            <input type="text" name="property_title" id="property_title" value="--><?php //echo set_value('property_title'); ?><!--" class="form-control" placeholder="Eg : BMW M for Sale">-->
                                                <!--                                                        </div>-->
                                                <!--                                                    </div>-->


<!--                                                <div class="col-md-12 col-sm-12 col-xs-12" style="padding-top: 5px">-->
<!--                                                    <div class="input-type">-->
<!--                                                        <label>Title</label>-->
<!--                                                        <input type="text" name="property_title" id="property_title" value="--><?php //echo set_value('property_title'); ?><!--" class="form-control" placeholder="Eg :  Toyota Corolla 121.">-->
<!--                                                    </div>-->
<!--                                                </div>-->

                                                <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; margin-top: 5px">
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input-type">
                                                            <label>Edition</label>
                                                            <input type="text" name="pro_edition" id="pro_edition" value="<?php echo set_value('pro_edition'); ?>" class="form-control" placeholder="Eg :  Corolla 121.">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input-type">
                                                            <label>Condition <span style="color: #cb1a09;">*</span></label>
                                                            <?php echo form_dropdown('pro_property_condition',
                                                                array('0' => 'Select','brand_new' => 'Brand New',  'reconditioned' => 'Reconditioned','used' => 'Used'),
                                                                set_value('pro_property_condition'),'class="selectpicker form-control" id="pro_property_condition" ') ?>
                                                        </div>
                                                        <label id="pro_property_condition-error" class="error" for="pro_property_condition"></label>
                                                    </div>


                                                </div>


                                                <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; margin-top: 5px">
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input-type">
                                                            <label>Year of Manufacture <span style="color: #cb1a09;">*</span></label>
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

                                                <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; margin-top: 25px">

                                                    <div class="col-md-6 col-sm-6 col-xs-12" id="regi_no_div" style="display: none">
                                                        <div class="input-type">
                                                            <label>Registration No</label>
                                                            <input type="text" name="pro_regi_no" id="pro_regi_no" value="<?php echo set_value('pro_regi_no'); ?>" class="form-control">
                                                        </div>
                                                        <div class="input-type">
                                                            <input style="float: left; margin: 10px; margin-top: 20px; margin-left: 0" type="hidden" name="show_in_ad_regno" id="show_in_ad_regno" value="0" class="form-control">
                                                            <input style="float: left; margin: 10px; margin-top: 20px; margin-left: 0" type="checkbox" name="show_in_ad_regno" id="show_in_ad_regno" value="1" class="form-control">
                                                            <label style="float: left; margin: 10px">Show in the detail section</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12" id="show_in_ad_regno_div" style="display: none">

                                                    </div>

                                                </div>

                                                <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; margin-top: 5px">
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input-type">
                                                            <label>Engine Capacity (cc)</label>
                                                            <input type="text" name="property_engine_size" id="property_engine_size" value="<?php echo set_value('property_engine_size'); ?>" class="form-control" placeholder="Eg :  1000CC.">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input-type">
                                                            <label>Transmission Type <span style="color: #cb1a09;">*</span></label>
                                                            <?php echo form_dropdown('pro_transmission_types',
                                                                $trans_types,
                                                                set_value('pro_transmission_types'),'class="selectpicker form-control" id="pro_transmission_types" ') ?>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; margin-top: 5px">
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input-type">
                                                            <label>Fuel Type <span style="color: #cb1a09;">*</span></label>
                                                            <?php echo form_dropdown('pro_fuel_types',
                                                                $fuel_types,
                                                                set_value('pro_fuel_types'),'class="selectpicker form-control" id="pro_fuel_types" ') ?>
                                                        </div>
                                                        <label id="pro_fuel_types-error" class="error" for="pro_fuel_types"></label>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; margin-top: 15px">
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input-type">
                                                            <label>Mileage (km):</label>
                                                            <input type="text" name="property_mileage" id="property_mileage" value="<?php echo set_value('property_mileage'); ?>" class="form-control" placeholder="Eg :  1000km.">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input-type">
                                                            <label>Door Count :</label>
                                                            <?php echo form_dropdown('property_door_count',
                                                                array('0'=>'Select Door Count','2' => '2', '3'=>'3', '4'=>'4', '5'=>'5','6'=>'6','7'=>'7','Other'=>'Other'),
                                                                set_value('property_door_count'),'class="selectpicker form-control"  data-live-search="true" id="property_door_count" ') ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; margin-top: 15px">
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input-type">
                                                            <label>Seat Count :</label>
                                                            <input type="text" name="property_seat_count" id="property_seat_count" value="<?php echo set_value('property_seat_count'); ?>" class="form-control" placeholder="Eg :  4">
                                                        </div>
                                                    </div>
                                                </div>
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
                                                            <label>District <span style="color: #cb1a09;">*</span></label>
                                                            <?php echo form_dropdown('pro_district',
                                                                $districts,
                                                                set_value('pro_district'),'class="selectpicker form-control"  data-live-search="true" id="pro_district" ') ?>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: !important; padding-top: 5px">


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
<!--                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px">-->
<!--                                                        <div class="col-md-1 col-sm-1 col-xs-12">-->
<!--                                                            <div class="input-type">-->
<!--                                                                <input type="hidden" name="price_onrequest" value="0">-->
<!--                                                                <input type="checkbox" name="price_onrequest" value="1" id="postad_check_req_price">-->
<!--                                                            </div>-->
<!---->
<!---->
<!--                                                        </div>-->
<!--                                                        <div class="col-md-11 col-sm-11 col-xs-12">-->
<!--                                                            Price On Request-->
<!--                                                        </div>-->
<!--                                                    </div>-->

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
                                                <p style="text-decoration: underline; font-size: 18px; font-weight: 800; color: #333333">Images</p>

                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="input-type">
                                                        <label>Main Image</label>
                                                        <input type="file" name="property_main_image" id="property_main_image" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px">
                                                    <div class="input-type">
                                                        <?php $session_array  = $this->session->userdata('logged_in');
                                                        //var_dump($session_array);
                                                        ?>
                                                        <label>Upload other Images</label>
                                                        <input type="hidden" id="user_id" name="user_id" value="<?php echo (is_array($session_array) && count($session_array) != 0) ? $session_array['userId'] : null; ?>">
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
                                                <p style="text-decoration: underline; font-size: 18px; font-weight: 800; color: #333333">Options and Features</p>

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
                                                <p style="text-decoration: underline; font-size: 18px; font-weight: 800; color: #333333">Additional Information</p>
                                                <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; margin-top: 10px">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="input-type">
                                                            <textarea class="form-control" onkeyup="countChar(this)" name="textarea-desc-property" id="textarea-desc-property" placeholder="Eg : Fuel Type, Door Count, Accident Free, etc.."><?php echo set_value('textarea-desc-property'); ?></textarea>
                                                        </div>
                                                        <span style="color: #990000;">Remaining character count - </span><span id="charNum">1000</span>
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


                                            <div class="row" style="border:1px solid #CCCCCC; background: #fdfdfd; padding: 20px; margin-top: 20px">
                                                <p style="text-decoration: underline; font-size: 18px; font-weight: 800; color: #333333">Contact Information</p>
                                                <p>Please update the below contact details if it not relevant with you registration infromatin.</p>

                                                <?php
                                                $customer = $this->UserModel->getCustomerByUserId((is_array($session_array) && count($session_array) != 0) ? $session_array['userId'] : null );
                                                if(is_array($customer) && count($customer) != 0){
                                                    ?>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="input-type">
                                                            <label>Name and Surname <span style="color: #cb1a09;">*</span></label>
                                                            <input type="text" class="form-control" value="<?php echo $customer[0]->first_name . " " . $customer[0]->last_name ?>" name="pro_contact_name" id="pro_contact_name" data-language='en'>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="input-type">
                                                            <label>Contact Email <span style="color: #cb1a09;">*</span></label>
                                                            <input type="text" class="form-control" value="<?php echo $customer[0]->email_address; ?>" name="pro_contact_email" id="pro_contact_email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                                        <div class="input-type">
                                                            <label>Phone (Mobile) <span style="color: #cb1a09;">*</span></label>
                                                            <input type="text" class="form-control" value="<?php echo $customer[0]->contact_no; ?>" name="pro_contact_phone" id="pro_contact_phone">
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>


                                                        <!--                                                <div class="col-md-6 col-sm-12 col-xs-12">-->
                                                        <!--                                                    <div class="input-type">-->
                                                        <!--                                                        <label>Phone (Home)</label>-->
                                                        <!--                                                        <input type="text" class="form-control" value="--><?php //echo set_value('pro_contact_home'); ?><!--" name="pro_contact_home" id="pro_contact_home">-->
                                                        <!--                                                    </div>-->
                                                        <!--                                                </div>-->


                                            </div>

<!--                                            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: 0 !important; margin-top: 15px">-->
<!--                                                <div class="col-md-6 col-sm-6 col-xs-12">-->
<!--                                                    <div class="input-type">-->
<!--                                                        <label>Ad Category</label>-->
<!--                                                        <!--                                                                        --><?php ////echo form_dropdown('pro_ad_type',
//                                                        //                                                                            $ad_types,
//                                                        //                                                                            set_value('pro_ad_type'),'class="selectpicker form-control" id="pro_ad_type" ') ?>
<!--                                                    </div>-->
<!--                                                    <div class='checkbox'>-->
<!--                                                        <label class='input-name-1'>-->
<!--                                                            <input type='hidden' class='feature_list' name='feature_ad' id='feature_ad' value='0'>-->
<!--                                                            <input type='checkbox' class='feature_list' name='feature_ad' id='feature_ad' value='1'>-->
<!--                                                            <label>-->
<!--                                                                Is this a featured Vehicle?-->
<!--                                                            </label>-->
<!--                                                        </label>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->

                                        </div>
                                    </div>




                                </div>















                                <div class="g-recaptcha" data-sitekey="6LeVol8UAAAAAE9R1cWvsRWFpTFHF_CveYfAiTvq"></div>

                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 15px; padding-left: 0px">

                                <div class="">
                                    <button class="btn btn-flat btn-default btn-warning btn-lg" type="submit" style="border: none; color: #FFF;">Post Your Ad Now</button>
<!--                                    <a href="--><?php //echo base_url(); ?><!--vehicle/payment">Post Ad</a>-->
                                </div>
                            </div>
                        </div>
                        </form>





                    </div>
                </div>
            </div>

        </div>
    </section>
</div>