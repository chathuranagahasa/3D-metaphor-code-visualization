<section id="property_area">
    <div class="container">
        <div class="row">
            <!-- Left Sidebar -->
            <div class="col-md-4">
                <div class="property_sidebar">

                    <div class="advance_search sidebar-widget" style="padding-top: 60px">
                        <h4 class="widget-title">Search</h4>
                        <form method="POST" action="<?php echo base_url(); ?>property/search" class="search_form">
                            <div class="row">
                                <div class="col-md-12 col-sm-6">
                                    <select class="selectpicker search-fields form-control" name="property_status" data-live-search="true" data-live-search-placeholder="Search value" tabindex="-98">
                                        <option value="">Any</option>
                                        <option value="sale">For Sale</option>
                                        <option value="rent">For Rent</option>
                                    </select>
                                </div>
                                <div class="col-md-12 col-sm-6">
                                    <select class="selectpicker search-fields form-control" name="property_type" data-live-search="true" data-live-search-placeholder="Search value" tabindex="-98">
                                        <option value="">Any</option>
                                        <?php foreach($property_types as $type):?>
                                            <option value="<?php echo $type->pro_id; ?>"><?php echo $type->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-12 col-sm-6">
                                    <select class="selectpicker form-control search-fields" name="property_location" data-live-search="true" data-live-search-placeholder="Search value" tabindex="-98">
                                        <option value="">Any Location</option>
                                        <?php foreach($cities as $city):?>
                                            <option value="<?php echo $city->cid; ?>"><?php echo $city->cname; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-12 col-sm-6">
                                    <button name="search" class="btn btn-default" type="submit">search property</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="sidebar_tesimonial">
                        <h4 class="widget-title">Clients Feedback</h4>
                        <div class="feedback_small">
                            <div class="item">
                                <div class="testimonial_person">
                                    <img class="avata" src="<?php echo base_url(); ?>assets/new/img/testimonial/Johan-swift.png" alt="">
                                    <h6 class="client_name">Leandro Crocker</h6>
                                    <span>commercial leader</span>
                                </div>
                                <p>“ Nisi fermentum augue etiam convallis mollis consectetuer bibendum. Gravida. Purus praesent urna fringilla magna lacinia praesent vivamus. Quis adipiscing. Dictum sociosqu lectus. Nulla nascetur vitae praesent elit habitasse.”</p>
                            </div>
                            <div class="item">
                                <div class="testimonial_person">
                                    <img class="avata" src="<?php echo base_url(); ?>assets/new/img/testimonial/Johan-swift.png" alt="">
                                    <h6 class="client_name">Leandro Crocker</h6>
                                    <span>commercial leader</span>
                                </div>
                                <p>“ Nisi fermentum augue etiam convallis mollis consectetuer bibendum. Gravida. Purus praesent urna fringilla magna lacinia praesent vivamus. Quis adipiscing. Dictum sociosqu lectus. Nulla nascetur vitae praesent elit habitasse.”</p>
                            </div>
                            <div class="item">
                                <div class="testimonial_person">
                                    <img class="avata" src="<?php echo base_url(); ?>assets/new/img/testimonial/Johan-swift.png" alt="">
                                    <h6 class="client_name">Leandro Crocker</h6>
                                    <span>commercial leader</span>
                                </div>
                                <p>“ Nisi fermentum augue etiam convallis mollis consectetuer bibendum. Gravida. Purus praesent urna fringilla magna lacinia praesent vivamus. Quis adipiscing. Dictum sociosqu lectus. Nulla nascetur vitae praesent elit habitasse.”</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Left Sidebar -->
            <div class="col-md-8" style="padding-top: 60px">
                <div class="row">
                    <div class="col-md-12">
                        <div class="property_sorting">
                            <form class="property_filter" action="#" method="post">
                                <div class="property_view">
                                    <ul>
                                        <li>
                                            <span>Order:</span>
                                            <select class="selectpicker form-control">
                                                <option>Default Order</option>
                                                <option>Featured</option>
                                                <option>Price Hight</option>
                                                <option>Price Low</option>
                                                <option>Latest Item</option>
                                                <option>Oldest Item</option>
                                            </select>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>property/search_grid"><i class="fa fa-th" aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a class="active" href="property_list.html"><i class="fa fa-th-list" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Property List Start -->
                <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12" style="background-color: #ffffff !important; padding: 20px">
                <div class="row">
                    <div class="col-md-12">
                        <div style="font-size: 24px; font-weight: 600;">
                            <?php echo (count($property_details) != 0) ? ucwords($property_details[0]->title) : null ?>
                        </div>
                        <p style="font-size: 18px; font-weight: 600; margin-top: 20px">
                            <?php
                            $subType = $this->PropertyModel->getSubTypeBySubTypeId($property_details[0]->sub_type);

                            $mainType = $this->PropertyModel->getMainTypeById($property_details[0]->main_type);
                            if(count($mainType) != 0){
                                ?>
                                Service Type : <?php echo $subType[0]->name; ?>, <?php echo $mainType[0]->name; ?>
                            <?php
                            }
                            ?>

                        </p>

                        <div style="font-size: 14px;margin-top: 30px">
                            <?php echo (count($property_details) != 0) ? ucwords($property_details[0]->description) : null ?>
                        </div>

                        <div style="margin-top: 30px" id="contact_details_wanted">
                            <p style="font-size: 18px  !important; font-weight: 600;">Contact Details</p>
                            <p>Name :  <?php echo (count($property_details) != 0) ? ucwords($property_details[0]->contact_name) : null ?></p>
                            <p>Email Address :  <?php echo (count($property_details) != 0) ? $property_details[0]->contact_email : null ?></p>
                            <p>Phone Number :  <?php echo (count($property_details) != 0) ? ucwords($property_details[0]->phone_mobile) : null ?></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>