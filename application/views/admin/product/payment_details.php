<style>
    #map{
        height: 400px;
        width: 100%;
    }
</style>

<style>
    #close{
        display:block;
        float:right;
        width:30px;
        height:29px;
        background:url(https://web.archive.org/web/20110126035650/http://digitalsbykobke.com/images/close.png) no-repeat center center;
    }

    .fileuploader-theme-dragdrop .fileuploader-input{
        padding-top: 20px;
        padding-bottom: 20px;
    }

    #property-add-form input, #property-add-form textarea{
        font-weight: 500;
        color: #333333;
    }

    .error{
        color: #fb1e09 !important;
    }
</style>



<section class="content-header">

    <h3>Property Management</h3>

</section>
<?php
//var_dump($payment);
if(is_array($payment) && count($payment) != 0) {

    $property = $this->PropertyModel->getPropertyDetailsByPropertyIdAdmin($payment[0]->ad_id);

    if (is_array($property) && count($property) != 0) {
        ?>


        <section class="content">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="active">Property Management</li>
                    <li class="active">Payment Details</li>
                </ol>
            </div>
            <div class="panel-heading clearfix" style="background-color: #823168">
                <h4 class="panel-title" style=" color: #FFFFFF;">Payment Details
                    - <?php echo $property[0]->ref_id; ?></h4>
            </div>

            <div class="panel panel-white">

                <div class="panel-body">


                    <div class="container">

                        <div class="row">
                            <?php if ($this->session->flashdata('message_suc_acc_up')) { ?>
                                <div
                                    class="alert alert-success"> <?= $this->session->flashdata('message_suc_acc_up') ?> </div>
                            <?php } ?>
                            <?php if ($this->session->flashdata('message_suc_acc_update')) { ?>
                                <div
                                    class="alert alert-success"> <?= $this->session->flashdata('message_suc_acc_update') ?> </div>
                            <?php } ?>
                            <?php if ($this->session->flashdata('message_suc_password_update')) { ?>
                                <div
                                    class="alert alert-success"> <?= $this->session->flashdata('message_suc_password_update') ?> </div>
                            <?php } ?>


                            <div class="col-md-8 col-sm-12 col-xs-12">


                                <div class="blog-details">
                                    <div class="article-desc bg-1" style="background-color: #ffffff !important;">
                                        <?php if ($this->session->flashdata('message_error_property')) { ?>
                                            <div
                                                class="alert alert-danger"> <?= $this->session->flashdata('message_error_property') ?> </div>
                                        <?php } ?>


                                        <div class="post-content" id="property-add-form">
                                            <h5></h5>
                                            <?php
                                            $form = array(
                                                'name' => 'update_property',
                                                'id' => 'update_property'
                                            );
                                            echo form_open_multipart('admin/approve_payment', $form) ?>

                                            <div class="row">
                                                <?php


                                                ?>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="profile-update">
                                                        <!--                                        <div class="profile-title">-->
                                                        <!--                                            <h4 style="color: #000; margin-top: 20px; margin-bottom: 20px"> Update Advertisement </h4>-->
                                                        <!--                                        </div>-->
                                                        <div class="profile-desc">
                                                            <div class="row">
                                                                <div class="profile-top-form">
                                                                    <div class="row"
                                                                         style="border:1px solid #CCCCCC; background: #fdfdfd; padding: 20px">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12"
                                                                             style="padding-left: 0 !important; padding-right: 0 !important; padding-top: 15px">
                                                                            <p style="text-decoration: underline; font-size: 18px; font-weight: 800">
                                                                                Payment Information</p>


                                                                            <div class="col-md-12 col-sm-12 col-xs-12"
                                                                                 style="padding-left: 0 !important; padding-right: 0 !important; margin-top: 15px">
                                                                                <div
                                                                                    class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="input-type">
                                                                                        <label>Payment Method</label>
                                                                                        <input type="hidden" name="ad_id"
                                                                                               value="<?php echo $payment[0]->ad_id; ?>"
                                                                                               class="form-control">
                                                                                        <input type="text"
                                                                                               value="<?php echo $payment[0]->description; ?>"
                                                                                               class="form-control">
                                                                                    </div>
                                                                                </div>
<!--                                                                                <div-->
<!--                                                                                    class="col-md-12 col-sm-12 col-xs-12">-->
<!--                                                                                    <div class="input-type">-->
<!--                                                                                        <label>Payment Slip</label>-->
<!--                                                                                        <br><br>-->
<!--                                                                                        <img src="--><?php //echo base_url(); ?><!--assets/uploads/--><?php //echo $payment[0]->pay_slip; ?><!--" width="30%">-->
<!--                                                                                        <br>-->
<!--                                                                                    </div>-->
<!--                                                                                </div>-->


                                                                                <?php
                                                                                if($payment[0]->payment_method == "bank") {
                                                                                    ?>
                                                                                    <div
                                                                                            class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px; margin-bottom: 10px">
                                                                                        <div class="input-type">
                                                                                            <label>Payment Slip</label>

                                                                                            <?php

                                                                                            if ($payment[0]->pay_slip != "") {
                                                                                                ?>
                                                                                                <br><br>
                                                                                                <img src="<?php echo base_url(); ?>assets/uploads/slips/<?php echo $payment[0]->pay_slip; ?>"
                                                                                                     width="30%">
                                                                                                <?php

                                                                                            } else {
                                                                                                ?>
                                                                                                <p style="color: #ea2c19;">
                                                                                                    <?php
                                                                                                    echo "Pay Slip Pending";
                                                                                                    ?>
                                                                                                </p>
                                                                                                <?php

                                                                                            }


                                                                                            ?>

                                                                                            <br>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?php
                                                                                }
                                                                                ?>
<!--                                                                                <div-->
<!--                                                                                    class="col-md-6 col-sm-6 col-xs-12">-->
<!--                                                                                    <div class="input-type">-->
<!--                                                                                        <label>Payment Date</label>-->
<!--                                                                                        <input type="text"-->
<!--                                                                                               value="--><?php //echo $payment[0]->payment_date; ?><!--"-->
<!--                                                                                               class="form-control">-->
<!--                                                                                    </div>-->
<!--                                                                                </div>-->
                                                                                <div
                                                                                    class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="input-type">
                                                                                        <label>Ad Posted Date</label>
                                                                                        <input type="text"
                                                                                               value="<?php
                                                                                               $date=date_create($property[0]->posted_date);
                                                                                               echo date_format($date,"Y-m-d");
                                                                                               ?>"
                                                                                               class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12"
                                                                                     style="margin-top: 10px">
                                                                                    <div class="input-type">
                                                                                        <label>Duration</label>
                                                                                        <?php
                                                                                        $duration = $this->PropertyModel->getDurationDetailsById($payment[0]->duration);
                                                                                        ?>
                                                                                        <input type="text"
                                                                                               name="car_sale_address"
                                                                                               id="car_sale_address"
                                                                                               value="<?php echo (is_array($duration) && count($duration) != 0) ? $duration[0]->name : null; ?>"
                                                                                               class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12"
                                                                                     style="margin-top: 10px">
                                                                                    <div class="input-type">
                                                                                        <label>Featured</label>
                                                                                        <input type="text"
                                                                                               name="car_sale_address"
                                                                                               id="car_sale_address"
                                                                                               value="<?php echo (is_array($payment) && $payment[0]->is_featured == 1) ? "Yes" : "No"; ?>"
                                                                                               class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12"
                                                                                     style="margin-top: 10px">
                                                                                    <div class="input-type">
                                                                                        <label>Ad Amount (Rs.)</label>
                                                                                        <input type="text"
                                                                                               name="car_sale_address"
                                                                                               id="car_sale_address"
                                                                                               value="<?php echo $payment[0]->amount; ?>"
                                                                                               class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>


                                                                </div>


                                                            </div>


                                                        </div>


                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="">
                                            <button class="btn btn-flat btn-success btn-lg" type="submit"
                                                    style="margin-top:10px;border: none; color: #FFF;">Approve Payment
                                            </button>
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
        <?php
    }
}
?>


</div>


<script>



    var geocoder;
    var map;
    var map2;


    $( document ).ready(function() {
        var baseurl = $('body').data('baseurl');


        var district_id = $('#pro_district_edit').val();

        var selected_city = $('#selected_city').val();
        var selected_city_name = $('#selected_city_name').val();

//        alert(selected_city);
//        alert(selected_city_name);

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
                //(error);
            }
        });



        $('.input-type').on('change', '#pro_district_edit', function () {

            var district_id = $('#pro_district_edit').val();

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
