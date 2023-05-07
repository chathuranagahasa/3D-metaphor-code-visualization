<style>
    #map{
        height: 400px;
        width: 100%;
    }
</style>



<!--Latest blog start-->
<!--Latest blog start-->
<div style="padding-top: 80px; padding-bottom: 80px" id="popular-category">

    <section id="profile_setting">
        <div class="container">
            <div class="row">
                <?php if ($this->session->flashdata('message_error_property')) { ?>
                    <div class="alert alert-danger"> <?= $this->session->flashdata('message_error_property') ?> </div>
                <?php } ?>
                <?php if ($this->session->flashdata('message_suc_acc_up')) { ?>
                    <div class="alert alert-success"> <?= $this->session->flashdata('message_suc_acc_up') ?> </div>
                <?php } ?>
                <?php if ($this->session->flashdata('message_suc_acc_update')) { ?>
                    <div class="alert alert-success"> <?= $this->session->flashdata('message_suc_acc_update') ?> </div>
                <?php } ?>
                <?php if ($this->session->flashdata('message_suc_password_update')) { ?>
                    <div class="alert alert-success"> <?= $this->session->flashdata('message_suc_password_update') ?> </div>
                <?php } ?>
                <?php include "navigation.php"; ?>


                <div class="col-md-8 col-sm-12 col-xs-12">

                <?php $this->view('user/dash_menu'); ?>

                <article class="blog-details">
                    <div class="article-desc bg-1">
                        <?php if ($this->session->flashdata('message_error_property')) { ?>
                            <div class="alert alert-danger"> <?= $this->session->flashdata('message_error_property') ?> </div>
                        <?php } ?>

                        <div class="post-title">
                            <h2 style="font-weight: 600 !important;">Sell Your Car</h2>
                        </div>
                        <div class="post-content" id="property-add-form">
                            <h5></h5>
                            <?php
                            $form = array(
                                'name' => 'property_delete',
                                'id' => 'property_delete'
                            );
                            echo form_open_multipart('property/property_delete', $form) ?>

                            <div class="row">

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="profile-top-form">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="hidden" name="property_id" id="property_id" value="<?php echo $property[0]->property_id; ?>">
                                            <div class="input-type">
                                                <label>Type of Ad</label>
                                                <?php echo form_dropdown('pro_offer_type',
                                                    array('0'=>'Select','rent'=>'Rent', 'sell' => 'Sell', 'wanted' => 'wanted'),
                                                    (count($property) != 0) ? $property[0]->offer_type : null,'class="selectpicker form-control" id="pro_offer_type" disabled') ?>
                                                <input type="hidden" name="pro_offer_type" value="<?php echo $property[0]->offer_type; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <div class="input-type">
                                                <label>Vehicle Category</label>
                                                <?php echo form_dropdown('pro_body_type',
                                                    $body_types,
                                                    (count($property) != 0) ? $property[0]->body_type : null,'class="selectpicker form-control" id="pro_body_type" disabled') ?>
                                                <input type="hidden" name="pro_body_type" value="<?php echo $property[0]->body_type; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="input-type">
                                                <label>Brand</label>
                                                <?php echo form_dropdown('pro_property_brand',
                                                    $models,
                                                    (count($property) != 0) ? $property[0]->brand : null,'class="selectpicker form-control" id="pro_property_brand" ') ?>
                                            </div>
                                        </div>
                                        <!--                                                        <div class="col-md-12 col-sm-12 col-xs-12">-->
                                        <!--                                                            <div class="input-type">-->
                                        <!--                                                                <label>Title</label>-->
                                        <!--                                                                <input type="text" name="property_title" disabled id="property_title" value="--><?php //echo (count($property) != 0) ? $property[0]->title : null; ?><!--" class="form-control" placeholder="Eg : BMW M for Sale">-->
                                        <!--                                                                <input type="hidden" name="property_title" value="--><?php //echo ((count($property) != 0) ? $property[0]->title : null ) ?><!--">-->
                                        <!--                                                            </div>-->
                                        <!--                                                        </div>-->
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="input-type">
                                                <label>Model</label>
                                                <input type="text" name="property_model" id="property_model" value="<?php echo (count($property) != 0) ? $property[0]->model : null; ?>" class="form-control" placeholder="Eg :  BMW M3 Sedan.">
                                            </div>
                                        </div>
                                        <div class="profile-top-form-bottom">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="input-type">
                                                    <label>Description<span style="font-weight: 100; font-size: 13px">(Optional)</span></label>
                                                    <textarea class="form-control" onkeyup="countChar(this)" name="textarea-desc-property" id="textarea-desc-property"><?php echo (count($property) != 0) ? $property[0]->pro_desc : null; ?></textarea>
                                                </div>
                                                <span style="color: #990000;">Remaining character count - </span><span id="charNum"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: !important;padding-right: 0 !important;">

                                            <div class="col-md-3 col-sm-3 col-xs-12 price_row">
                                                <div class="input-type">
                                                    <label>Price</label>
                                                    <?php echo form_dropdown('pro_price_type',
                                                        array('0' => 'Select','LKR' => 'LKR', 'USD' => 'USD'),
                                                        (count($property) != 0) ? $property[0]->price_type : null,'class="selectpicker form-control" id="pro_price_type" ') ?>
                                                </div>
                                            </div>
                                            <div class="col-md-9 col-sm-9 col-xs-12 price_row">
                                                <div class="input-type">
                                                    <label>.</label>
                                                    <input type="text" name="pro_price" value="<?php echo (count($property) != 0) ? $property[0]->price : null; ?>" id="pro_price" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-md-1 col-sm-1 col-xs-12">
                                                    <div class="input-type">
                                                        <input type="hidden" name="price_onrequest" value="0" class="form-control">
                                                        <input type="checkbox" name="price_onrequest" value="1" id="postad_check_req_price" class="form-control">
                                                    </div>

                                                </div>
                                                <div class="col-md-11 col-sm-11 col-xs-12">
                                                    Price On Request
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="price_nagotiable_row">
                                                <div class="col-md-1 col-sm-1 col-xs-12">
                                                    <div class="input-type">
                                                        <input type="hidden" name="price_nagotiable" value="0" class="form-control">
                                                        <input type="checkbox" name="price_nagotiable" value="1" class="form-control">
                                                    </div>

                                                </div>
                                                <div class="col-md-11 col-sm-11 col-xs-12">
                                                    Price Negotiable
                                                </div>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 40px">
                                            <div class="input-type">
                                                <label>Upload your Images</label>
                                                <input type="hidden" id="user_id" name="user_id" value="<?php echo (count($session_array) != 0) ? $session_array['userId'] : null; ?>">
                                                <input class="form-control" id="pro_images_edit" name="pro_images_edit" type="file">


                                                <div class="fileuploader-items col-lg-12">
                                                    <ul class="fileuploader-items-list">

                                                        <?php

                                                        $this->load->model('PropertyModel');
                                                        $images = $this->PropertyModel->getPropertyImagesByPropertyId($property[0]->property_id);

                                                        foreach ($images as $image){
                                                            ?>
                                                            <li class="fileuploader-item file-type-image file-ext-jpg upload-failed" style="padding-bottom: 25px !important;">

                                                                <div class="columns"><div class="column-thumbnail">
                                                                        <div class="fileuploader-item-image">

                                                                            <img src="<?php echo base_url()."assets/uploads/".$image->image_name ?>" width="36" height="36">
                                                                        </div>
                                                                    </div>
                                                                    <div class="column-title">
                                                                        <div title="images2.jpg"><?php echo ucwords($image->image_name); ?></div>
                                                                    </div>
                                                                    <div class="column-actions">
                                                                        <a href="<?php echo base_url()."vehicle/removePropertyImage/".$image->id."/". $property[0]->property_id; ?>" class="fileuploader-action fileuploader-action-remove" title="Remove">
                                                                            <i></i>
                                                                        </a>
                                                                    </div>
                                                                </div>


                                                                <div class="progress-bar2" style="display: none;">
                                                                    <div class="fileuploader-progressbar">
                                                                        <div class="bar" style="width: 0%;">

                                                                        </div>
                                                                    </div>
                                                                    <span>0%</span>
                                                                </div>
                                                            </li>
                                                            <?php

                                                        }
                                                        ?>
                                                    </ul>
                                                </div>



                                            </div>
                                        </div>

                                        <br>
                                        <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 15px">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="input-type">
                                                        <label>District</label>
                                                        <?php echo form_dropdown('pro_district',
                                                            $districts,
                                                            (count($property) != 0) ? $property[0]->district : null,'class="form-control" id="pro_district" ') ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <?php
                                                    if(count($property) != 0){
                                                        $city = $this->PropertyModel->getCityNameById($property[0]->city);
                                                    }
                                                    ?>
                                                    <input type="hidden" name="selected_city" id="selected_city" value="<?php echo ((count($property) != 0) ? $property[0]->city : null ) ?>">
                                                    <input type="hidden" name="selected_city_name" id="selected_city_name" value="<?php echo $city[0]->cname; ?>">

                                                    <div class="input-type">
                                                        <label>City</label>
                                                        <select name="pro_city_edit" id="pro_city_edit" class="form-control">
                                                            <option value="0">Select City</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group map-border">
                                                        <div id="map"></div>

                                                    </div>
                                                    <input type="hidden" class="form-control" id="mylat" name="lat" value="<?php echo (count($property) != 0) ? $property[0]->loc_lat : null; ?>"/>
                                                    <input type="hidden" class="form-control" id="mylng" name="lng" value="<?php echo (count($property) != 0) ? $property[0]->loc_lng : null; ?>"/>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: !important;padding-right: 0 !important; margin-top: 25px">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="input-type">
                                                    <label>Condition</label>
                                                    <?php echo form_dropdown('pro_property_condition',
                                                        array('0' => 'Select','brand_new' => 'Brand New','used' => 'Used', 'registered' => 'Registered', 'unregistered' => 'Unregistered'),
                                                        (count($property) != 0) ? $property[0]->condition_type : null,'class="selectpicker form-control" id="pro_property_condition" ') ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="input-type">
                                                    <label>Year of Manufacture</label>
                                                    <input type="text" name="property_year" id="property_year" value="<?php echo (count($property) != 0) ? $property[0]->year : null; ?>" class="form-control" placeholder="Eg :  1950.">
                                                </div>
                                            </div>

                                        </div>
                                        <!--                                                        <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: !important;padding-right: 0 !important; ">-->
                                        <!---->
                                        <!---->
                                        <!--                                                        </div>-->

                                        <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: !important;padding-right: 0 !important; ">
                                            <!--                                                            <div class="col-md-6 col-sm-6 col-xs-12">-->
                                            <!--                                                                <div class="input-type">-->
                                            <!--                                                                    <label>Fuel Type</label>-->
                                            <!--                                                                    --><?php //echo form_dropdown('pro_fuel_types',
                                            //                                                                        $fuel_types,
                                            //                                                                        (count($property) != 0) ? $property[0]->fuel_type : null,'class="selectpicker form-control" id="pro_fuel_types" ') ?>
                                            <!--                                                                </div>-->
                                            <!--                                                            </div>-->
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="input-type">
                                                    <label>Transmission Type</label>
                                                    <?php echo form_dropdown('pro_transmission_types',
                                                        $trans_types,
                                                        (count($property) != 0) ? $property[0]->transmission : null,'class="selectpicker form-control" id="pro_transmission_types" ') ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="input-type">
                                                    <label>Engine Capacity (cc)</label>
                                                    <input type="text" name="property_engine_size" id="property_engine_size" value="<?php echo (count($property) != 0) ? $property[0]->engine_size : null; ?>" class="form-control" placeholder="Eg :  1000CC.">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12" id="mileage_parent" style="padding-left: 0 !important; padding-right: !important;padding-right: 0 !important; display: none ">

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="input-type">
                                                    <label>Mileage (km):</label>
                                                    <input type="text" name="property_mileage" id="property_mileage" value="<?php echo (count($property) != 0) ? $property[0]->mileage : null; ?>" class="form-control" placeholder="Eg :  1000km.">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0 !important; padding-right: !important;padding-right: 0 !important; ">
                                            <!--                                                            <div class="col-md-6 col-sm-6 col-xs-12">-->
                                            <!--                                                                <div class="input-type">-->
                                            <!--                                                                    <label>Door Count</label>-->
                                            <!--                                                                    --><?php //echo form_dropdown('pro_door_count',
                                            //                                                                        array('0'=>'Select','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7'),
                                            //                                                                        (count($property) != 0) ? $property[0]->door_count : null,'class="selectpicker form-control" id="pro_door_count" ') ?>
                                            <!--                                                                </div>-->
                                            <!--                                                            </div>-->

                                        </div>
                                    </div>













                                        <div class="profile-title" style="margin-top: 20px">
                                            <h5>Please review your contact details</h5>
                                            <p style="margin-top: 15px; font-size: 12px">
                                                Make sure your details are updated so our users can easily contact you at the right channel.
                                            </p>
                                        </div>
                                        <div class="profile-desc">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="input-type">
                                                        <label>Name and Surname</label>
                                                        <input type="text" readonly class="form-control" value="<?php echo (count($property) != 0) ? $property[0]->contact_name : null; ?>" name="pro_contact_name" id="pro_contact_name" data-language='en' id="pro_contact_name">
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="input-type">
                                                        <label>Contact Email</label>
                                                        <input type="text" readonly class="form-control" value="<?php echo (count($property) != 0) ? $property[0]->contact_email : null; ?>" name="pro_contact_email" id="pro_contact_email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                    <div class="input-type">
                                                        <label>Phone (Mobile)</label>
                                                        <input type="text" readonly class="form-control" value="<?php echo (count($property) != 0) ? $property[0]->phone_mobile : null; ?>" name="pro_contact_phone" id="pro_contact_phone">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                    <div class="input-type">
                                                        <label>Phone (Home)</label>
                                                        <input type="text" readonly class="form-control" value="<?php echo (count($property) != 0) ? $property[0]->phone_home : null; ?>" name="pro_contact_home" id="pro_contact_home">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="update-profile-submit">
                                        <button class="btn btn-danger" type="submit">Delete Your Ad Now</button>
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
</div>
<!--Latest blog end-->

<script>

    var geocoder;
    var map;
    var map2;


    $( document ).ready(function() {
        var baseurl = $('body').data('baseurl');


        var district_id = $('#pro_district').val();

        var selected_city = $('#selected_city').val();
        var selected_city_name = $('#selected_city_name').val();

        $('#pro_city_edit').empty();
        $.ajax({
            url: baseurl+ 'vehicle/city/'+ district_id,
            type: "GET",
            success: function (data) {
                $("#pro_city_edit").append("<option selected value='"+selected_city+"'>"+selected_city_name+"</option>");
                $("#pro_city_edit").append("<option value='0'>Select City</option>");
                for(var i=0; i < data.length; i++){
                    $("#pro_city_edit").append("<option value='"+data[i].cid+"'>"+data[i].cname+"</option>");
                }
            },
            error: function (error) {
                console.log(error);
                alert(error);
            }
        });



        $('.input-type').on('change', '#pro_district', function () {

            var district_id = $('#pro_district').val();

            $('#pro_city_edit').empty();
            $.ajax({
                url: baseurl+ 'vehicle/city/'+ district_id,
                type: "GET",
                success: function (data) {
                    $("#pro_city_edit").append("<option value='0'>Select City</option>");
                    for(var i=0; i < data.length; i++){
                        $("#pro_city_edit").append("<option value='"+data[i].cid+"'>"+data[i].cname+"</option>");
                    }
                },
                error: function (error) {
                    console.log(error);
                    alert(error);
                }
            });

        });

        $('.row').on('change', '#pro_city_edit', function () {
            codeAddressEdit();
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


        var address = 'Sri Lanka';

        geocoder.geocode({'address': address}, function (results, status) {
            var lat = <?php echo ((count($property) != 0) ? $property[0]->loc_lat : null ); ?>;
            var lng = <?php echo ((count($property) != 0) ? $property[0]->loc_lng : null ); ?>;
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

        });/* */
    }

    var marker;
    function codeAddressEdit() {
        $('#map').show();
        //var addr = $('#no').val() + ',' + $('#street').val();


        var index = document.getElementById("pro_city_edit").selectedIndex;
        var city = document.getElementById("pro_city_edit").options[index].text;
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