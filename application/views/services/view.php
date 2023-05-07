<style>
    #contact_details_wanted p{
        font-size: 13px !important;
        line-height:18px !important;
    }
</style>

<div class="container">
    <div class="row">
        <div class="search-area" style="border: none; padding: 0 !important;">

        </div>
    </div>
</div>
<div class="feature-property properties-list pt-130" style="padding-top: 25px !important;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="sidebar left">
                    <aside class="single-side-box feature">
                        <div class="aside-title">
                            <h5>Featured Property</h5>
                        </div>
                        <div class="feature-property">
                            <div class="row">
                                <?php
                                foreach ($latest_properties as $latest_property){
                                    ?>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="single-property">
                                            <div class="property-img">
                                                <a href="<?php echo base_url(); ?>property/view/<?php echo $latest_property->property_id; ?>/<?php echo str_replace(' ', '_', $latest_property->title); ?>">
                                                    <?php
                                                    $this->load->model('PropertyModel');
                                                    $result = $this->PropertyModel->getPropertyImagesByPropertyId($latest_property->property_id);
                                                    //echo $result[0]->image_name;
                                                    if(count($result) != 0){
                                                        ?>
                                                        <img src="<?php echo base_url(); ?>assets/uploads/<?php echo $result[0]->image_name; ?>" alt="">
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <img src="<?php echo base_url(); ?>assets/img/property/1.jpg" alt="">
                                                        <?php
                                                    }

                                                    ?>

                                                </a>
                                            </div>
                                            <div class="property-desc text-center">
                                                <div class="property-desc-top">
                                                    <h6><a href="<?php echo base_url(); ?>property/view/<?php echo $latest_property->property_id; ?>/<?php echo str_replace(' ', '_', $latest_property->title); ?>">
                                                            <?php
                                                            echo word_limiter($latest_property->title , 3);

                                                            ?>
                                                        </a></h6>
                                                    <h4 class="price">
                                                        <?php echo $latest_property->price . " " . $latest_property->price_type; ?>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>

                            </div>
                        </div>
                    </aside>

                    <aside class="single-side-box tags">
                        <div class="aside-title">
                            <h5>Tags</h5>
                        </div>
                        <div class="our-tag-list">
                            <ul>
                                <li><a href="#">Real Estate</a></li>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Appartment</a></li>
                                <li><a href="#">Duplex villa</a></li>
                                <li><a href="#">But property</a></li>
                            </ul>
                        </div>
                    </aside>

                </div>
            </div>

            <div class="col-md-8 col-sm-12 col-xs-12" style="background-color: #f9f9f9 !important; padding: 20px">
                <div class="row">
                    <div class="col-md-12">
                        <div style="font-size: 24px; font-weight: 600; color: #009933;">
                            <?php echo (count($property_details) != 0) ? ucwords($property_details[0]->title) : null ?>
                        </div>
                        <p style="font-size: 18px; font-weight: 600; margin-top: 20px">
                            Service Type :
                            <?php

                            $property_type = $this->PropertyModel->getServiceTypeNameById($property_details[0]->service_type);
                            if(count($property_type) != 0){
                                echo $property_type[0]->name;
                            }

                            ?>

                        </p>
                        <div class="col-md-12" style="margin-top: 20px">
                            <?php
                            $this->load->model('PropertyModel');
                            $images = $this->PropertyModel->getServiceImagesById($property_details[0]->service_id);

                            ?>
                            <img src="<?php echo base_url(); ?>assets/uploads/<?php echo (count($images) !=0) ? $images[0]->image_name : null; ?>" alt="">
                            <div style="font-size: 14px;margin-top: 30px;">
                                <?php echo (count($property_details) != 0) ? ucwords($property_details[0]->service_desc) : null ?>
                            </div>

                            <div style="font-size: 14px;margin-top: 30px;">
                                Service Category :
                                <?php echo (count($property_details) != 0) ? ucwords($property_details[0]->service_category) : null ?>
                            </div>


                            <div style="margin-top: 30px" id="contact_details_wanted">
                                <p style="font-size: 18px  !important; font-weight: 600;">Contact Details</p>
                                <p>Name :  <?php echo (count($property_details) != 0) ? ucwords($property_details[0]->name) : null ?></p>
                                <p>Email Address :  <?php echo (count($property_details) != 0) ? $property_details[0]->email : null ?></p>
                                <p>Phone Number :  <?php echo (count($property_details) != 0) ? ucwords($property_details[0]->phone) : null ?></p>
                            </div>
                        </div>







                    </div>

                </div>
            </div>
        </div>
    </div>
</div>