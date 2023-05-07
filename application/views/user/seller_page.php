<style>
    .readmore {
        width:100%;
    }
    .readmore .moreText {
        display:none;
    }
    .readmore a.more {
        display:block;
    }

    .readmore_email {
        width:100%;
    }
    .readmore_email .moreText_email {
        display:none;
    }
    .readmore_email a.more_email {
        display:block;
    }

    .center-cropped {
        object-fit: cover;       /* Scale the image so it covers whole area, thus will likely crop */
        object-position: bottom; /* Center the image within the element */
        height: 100px;
        width: 100px;
    }

    }
</style>

<div style="padding-top: 30px; padding-bottom: 80px; background-color: #f9f9f9">
<section id="property_area">
    <div class="container" style="margin-top: 40px">
        <div class="row">

            <div class="col-md-12" id="main_banner">


                <img src="<?php echo base_url(); ?>assets/img/banner.jpg" class="center-cropped" style="width: 100%; height: 250px; border: 1px solid #f0f0f0; background-color: #f0f0f0"/>

                <div class="logo">
                    <img src="<?php echo base_url(); ?>assets/img/logo_seller.png" style="height: 120px; width: 120px; background-color: #333333; margin-top: -50px; margin-left: 20px">
                </div>
                <h3 style="width: 50%; text-align: center; margin-top: -50px; font-weight: 500"><?php echo (count($company_details) != "") ? $company_details[0]->name : null; ?></h3>

                <div style="margin-top: 40px" class="col-md-8">
                    <div class="readmore">
                        <?php
                        $desc = (count($company_details) != "") ? $company_details[0]->description : null;


                        $string = strip_tags($desc);
                        if (strlen($string) > 500) {

                            // truncate string
                            $stringCut = substr($string, 0, 500);
                            $endPoint = strrpos($stringCut, ' ');

                            //if the string doesn't contain any space then it will cut without word basis.
                            $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                        }
                        echo $string;
                        ?>
                        <span class="ellipsis">...</span>
                        <span class="moreText">
                            <?php
                            $stringLong = strip_tags($desc);
                            if (strlen($stringLong) > 500) {

                                // truncate string
                                $stringCut = substr($stringLong, 501, 1000000);
                                $endPoint = strrpos($stringCut, ' ');

                                //if the string doesn't contain any space then it will cut without word basis.
                                $stringLong = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                            }
                            echo $stringLong;
                            ?>

                        </span>
                        <a class="more" href="#">show more</a>
                    </div>


                    <div style="margin-top: 30px">
                        <p style="color: #000; font-size: 18px; font-weight: 400">All ads from

                            <?php

                            $result = $this->UserModel->getCustomerByUserId($userId);
                            if($result[0]->im_am_in == "agent"){
                                ?>
                                <a href="<?php echo base_url(); ?>company/view/<?php echo $userId; ?>">
                                    <?php echo (count($company_details) != "") ? $company_details[0]->name : null; ?>
                                </a>

                                <?php
                            }?>

                            Car Sale</p>







                        <div class="row">
                            <?php
                            if (count($search_results) == 0){
                                echo "<h2>No Result Found.</h2>";
                            }
                            ?>
                            <?php foreach ($search_results as $search_result) {
                                ?>
                                <div class="col-md-12">
                                    <div class="property_list">
                                        <div class="img_area list_img" style="width: 200px">
                                            <div class="sale_btn"><?php echo strtoupper($search_result->offer_type); ?></div>
                                            <a href="<?php echo base_url(); ?>property/view/<?php echo $search_result->property_id; ?>/<?php echo str_replace(' ', '_', $search_result->model); ?>">
                                                <?php
                                                $this->load->model('PropertyModel');
                                                $result = $this->PropertyModel->getPropertyImagesByPropertyId($search_result->property_id);
                                                //echo $result[0]->image_name;
                                                if(count($result) != 0){
                                                    ?>
                                                    <img src="<?php echo base_url(); ?>assets/uploads/<?php echo $result[0]->image_name; ?>" alt="">
                                                    <?php
                                                }else{
                                                    ?>
                                                    <img src="<?php echo base_url(); ?>assets/img/no_image.png" alt="">
                                                    <?php
                                                }

                                                ?>

                                            </a>
                                            <!--                                    <div class="sale_amount">2 Hours Ago</div>-->
                                            <div class="hover_property">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="list_type">
                                            <div class="property-text">
                                                <a href="<?php echo base_url(); ?>property/view/<?php echo $search_result->property_id; ?>/<?php echo str_replace(' ', '_', $search_result->model); ?>"><h5 class="property-title">
                                                        <?php
                                                        $string = strip_tags($search_result->model);
                                                        if (strlen($string) > 50) {

                                                            // truncate string
                                                            $stringCut = substr($string, 0, 40);
                                                            $endPoint = strrpos($stringCut, ' ');

                                                            //if the string doesn't contain any space then it will cut without word basis.
                                                            $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                                                            $string .= '...';
                                                        }
                                                        echo $string;
                                                        ?></h5></a>
                                                <span><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                    <?php

                                                    $city = $this->PropertyModel->getCityNameById($search_result->city);
                                                    if(count($city) != 0){
                                                        echo $city[0]->cname. ", ";
                                                    }
                                                    $district = $this->PropertyModel->getDistrictNameById($search_result->district);
                                                    if(count($district) != 0){
                                                        echo $district[0]->dname;
                                                    }
                                                    ?></span>
                                            </div>
                                            <div class="quantity">

                                                <ul><?php
                                                    $fuelType = $this->PropertyModel->getFuelTypesNameById($search_result->fuel_type);
                                                    $bodyType = $this->PropertyModel->getBodyTypesNameById($search_result->body_type);
                                                    $transType = $this->PropertyModel->getTransmissionNameById($search_result->transmission);
                                                    ?>
                                                    <li>

                                                            <span style="font-size: 12px; display: inline-block; color: #000;">
                                                                <img src="<?php echo base_url(); ?>assets/img/list_icons/category_icon.png" style="width: 25px">
                                                                <?php echo ($search_result->body_type != "") ? $bodyType[0]->name : " - "; ?>


                                                    </li>

                                                    <li>
                                                            <span style="font-size: 12px; display: inline-block; color: #000;">
                                                            <img src="<?php echo base_url(); ?>assets/img/list_icons/transmission.png" style="width: 15px">
                                                                <?php echo ($search_result->transmission != 0) ? $transType[0]->name : " - "; ?></span>


                                                    </li>
                                                    <!--                                                        <li>-->
                                                    <!---->
                                                    <!--                                                            <span style="font-size: 12px;display: inline-block; color: #000;">-->
                                                    <!--                                                                <img src="--><?php //echo base_url(); ?><!--assets/img/list_icons/fuel.png" style="width: 20px">-->
                                                    <!--                                                                --><?php //echo ($property->fuel_type != 0) ? $fuelType[0]->name : " - "; ?><!--</span>-->
                                                    <!---->
                                                    <!---->
                                                    <!--                                                        </li>-->
                                                    <li>
                                                            <span style="font-size: 13px;display: inline-block; color: #000;">
                                                            <img src="<?php echo base_url(); ?>assets/img/list_icons/mileage.png" style="width: 20px">
                                                                <?php echo ($search_result->mileage != "") ? $search_result->mileage : " - "; ?></span>

                                                    </li>
                                                    <li>

                                                        <span style="font-size: 12px;display: inline-block; color: #000;"><b>Registered Year :</b>  <?php echo ($search_result->year != "") ? $search_result->year : " - "; ?></span>


                                                    </li>

                                                </ul>

                                            </div>
                                            <div class="bed_area">
                                                <ul>
                                                    <li><?php echo $search_result->price . " " . $search_result->price_type; ?></li>
                                                </ul>
                                            </div>
                                            <div class="bed_area">
                                                <ul>
                                                    <li style="font-weight: bold; font-size: 21px"><?php

                                                        if($search_result->price_on_request != 0){
                                                            echo "Price On Request";
                                                        }else{
                                                            echo $search_result->price . " " . $search_result->price_type;

                                                            ?>
                                                            <p style="font-size: 12px; font-weight: 100; color: #999999; margin-top: -20px;">

                                                                <?php
                                                                echo ($search_result->price_negotiable == 1) ? "Negotiable" : null;
                                                                ?>
                                                            </p>

                                                            <?php
                                                        }
                                                        ?>
                                                    </li>
                                                    <!--                                                <li  class="flat-icon"><a href="#"><i class="flaticon-like"></i></a></li>-->
                                                    <!--                                                <li class="flat-icon"><a href="#"><i class="flaticon-connections"></i></a></li>-->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>









                    </div>
                </div>
                <div class="col-md-4">

                    <div class="open_hours">
                        <p style="font-size: 18px; text-decoration: underline">
                            Open Hours
                        </p>
                        <p  style="color: #000; font-size: 14px">
                            Open today:  8:00 am –  8:30 pm
                        </p>
                    </div>
                    <hr>

                    <div class="seller_address" >
                        <p  style="color: #000; font-size: 14px">
                            <?php
                                echo (count($company_details) != "") ? $company_details[0]->address : null;
                            ?>
                        </p>
                    </div>
                    <hr>

                    <div class="contact_no">
                        <p style="color: #000; font-size: 18px">
                            <span id="clickToShow"><?php echo (count($company_details) != "") ? $company_details[0]->contactno : null; ?></span>
                        </p>
                    </div>
                    <hr>
                            <div class="readmore_email">
                                <a class="btn btn-default btn-flat more_email">SEND EMAIL</a>
                                <span class="ellipsis_email"></span>
                                <span class="moreText_email">

                                    <div class="contact_agent sidebar-widget leave-review" style="padding-top: 20px; padding-bottom: 30px">

                                <div class="review-title">
                                    <h5 class="service_title" style="color: #999999;text-transform: capitalize; font-weight: 400; font-size: 16px">Contact the Seller</h5>
                                </div>
                                <div class="review-inner">

                                    <?php if ($this->session->flashdata('message_suc_advertiser')) { ?>
                                        <div class="alert alert-success"> <?= $this->session->flashdata('message_suc_advertiser') ?> </div>
                                    <?php } ?>
                                    <form action="<?php echo base_url(); ?>Property/submit_message_advetiser" method="POST">
                                         <div class="form-top">
                                            <div class="input-filed">
                                                <input type="text" class="form-control"  name="pro_name" placeholder="Your name">
                                            </div>
                                            <div class="input-filed">
                                                <input type="text" class="form-control"  name="pro_emails" placeholder="Your Email">
                                            </div>
                                        </div>
                                        <div class="form-bottom">
                                            <div class="input-field">
                                                <input type="text" class="form-control" name="pro_phone" placeholder="Phone">
                                            </div>
                                            <textarea class="form-control"  name="write_message" placeholder="Write here"></textarea>
                                        </div>
                                        <div class="submit-form">
                                            <button class="btn btn-default" type="submit">SEND</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </span>
                    </div>



                </div>

            </div>
        </div>
    </div>
</section>
<!-- Property List End -->
</div>




<script>
    $(function(){
        $('.readmore a.more').on('click', function(){
            var $parent = $(this).parent();
            if($parent.data('visible')) {
                $parent.data('visible', false).find('.ellipsis').show()
                    .end().find('.moreText').hide()
                    .end().find('a.more').text('show more');
            } else {
                $parent.data('visible', true).find('.ellipsis').hide()
                    .end().find('.moreText').show()
                    .end().find('a.more').text('show less');
            }
        });



        $('.readmore_email a.more_email').on('click', function(){
            var $parent = $(this).parent();
            if($parent.data('visible')) {
                $parent.data('visible', false).find('.ellipsis_email').show()
                    .end().find('.moreText_email').hide()
                    .end().find('a.more_email').text('SEND EMAIL');
            } else {
                $parent.data('visible', true).find('.ellipsis_email').hide()
                    .end().find('.moreText_email').show()
                    .end().find('a.more_email').text('SEND EMAIL');
            }
        });
    });
</script>


<script>
    jQuery(document).ready(function($) {
        var shortNumber = $("#clickToShow").text().substring(0, $("#clickToShow").text().length - 8);
        //var eventTracking = "_gaq.push(['_trackEvent', 'Advertisement', 'click', 'Track View Ads']);";
        var eventTracking = "ga('send', 'event', 'Advertisement', 'click', 'label', 'Track View Ads - RealEstate')";

        $("#clickToShow").hide().after('<span id="clickToShowButton" onClick="' + eventTracking + '">' + shortNumber + '... (click to show number)</span>');
        $("#clickToShowButton").click(function () {
            $("#clickToShow").show();
            $("#clickToShowButton").hide();
        });
    });
</script>




