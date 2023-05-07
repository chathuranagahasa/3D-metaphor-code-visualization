<style>
    .pager li strong{
        padding: 8px 14px;
        background-color: #ffffff;
        border: 1px solid #ed4c06;
        color: #000000;
        margin-right: 6px;
    }

    .pager li > a:hover, .pager li > a:focus {
        text-decoration: none;
        background-color: #ffffff;
        color: #000000;
    }
    .pager li > a, .pager li > span {
        display: inline-block;
        padding: 5px 14px;
        background-color: #ed4c06;
        border: 1px solid #ed4c06;
        color: #ffffff;
        margin-right: 6px;
        border-radius: 0 !important;
    }

    .paginationx {
        display: inline-block;
        padding-left: 0;
        margin: 20px 0;
    }

    #list_contact_no a {
        color: #505050;
        font-size: 18px;
    }

    #list_contact_no a:hover {
        color: #081e58;
    }

    #list_contact_no{
        padding: 5px;
        background: rgba(3, 49, 152, 0.22);
        border-radius: 2px;
    }

    #fav_img{
        background:url('<?php echo base_url() ?>assets/images/regi/favourite.png') no-repeat 0 0;
    }

    #fav_img:hover{
        background:url('<?php echo base_url() ?>assets/images/regi/favourite_hover.png') no-repeat 0  0;
    }

    #compare_img{
        background:url('<?php echo base_url() ?>assets/images/regi/compare.png') no-repeat 0 0;
    }

    #compare_img:hover{
        background:url('<?php echo base_url() ?>assets/images/regi/compare_hover.png') no-repeat 0  0;
    }


    .section-padding{
        padding-bottom: 40px;
    }

    .page-header-area-2 {
        padding: 0px;
        margin-bottom: 15px;
        background: #eeeeee;
    }

    ul.filterAdType li a{
        padding:6px 7px;
        font-size: 14px;
    }

    .header-listing h6{
        margin-top: 8px;
        margin-right: 10px;
        margin-bottom: 5px;
        margin-left: 0px;
        font-size: 14px;
    }

    .header-listing .custom-select-box .select2-container--default .select2-selection--single .select2-selection__rendered{
        line-height: 40px;
        font-size: 14px;
    }

    .header-listing .custom-select-box .select2-container--default .select2-selection--single .select2-selection__arrow{
        height: 40px;
    }

    .header-listing .custom-select-box{
        width: auto;
    }

    .listingTopFilterBar{
        min-height: 40px;
        font-size: 14px;
    }

    .parent {
        width: 100%;
        height: 100%;
        position: relative;
        display: inline-block;
        overflow: hidden;
        margin: 0;
    }

    /*.parent > img {*/
    /*display: block;*/
    /*position: absolute;*/
    /*!*top: 50%;*!*/
    /*!*left: 50%;*!*/
    /*min-height: 100%;*/
    /*min-width: 100%;*/
    /*transform: translate(-50%, -50%);*/
    /*}*/

    .parent_div{
        background: #d9d9d9;
        height: 220px;
    }


    .parent > img {
        display: inline-flex;
        width: 100%;
        height: 220px;
    }

    /*for browsers which support object fit */

    [data-object-fit='contain'] {
        object-fit: contain
    }


    .ad-archive-desc ul.short-meta, .ads-list-archive .archive-history{
        margin-top: 0;
        line-height: 20px;
    }

    .ad-archive-desc .last-updated{
        line-height: 10px;
    }

    .ad-info-1{
        border-top: none;
    }

    .ad-archive-desc .ad-price-simple{
        margin-top: -1px;
        margin-bottom: 10px;
    }

    .ad-archive-desc h3{
        margin-top: 0;
    }

    .ad-archive-desc h3:hover{
        color: #232323;
    }

    #pro_desc{
        float:  left;
        padding-top: 5px;
    }

    #pro_desc p{
        font-size:15px;
        color: #aaaaaa;
    }

    .ad-archive-desc{
        padding-bottom: 0;
    }


    #wish_list_btn{
        background: #ed4c06;
        color: #ffffff;
        padding: 3px;
        font-weight: 800;
        font-family: Lato;
        font-size: 14px;
        border:none;
        border-radius: 3px;
        margin-top: 2px;
        /*color: #ffffff;*/
    }

    #wish_list_btn:hover{
        text-decoration: underline;
        border:none;
        background: rgba(255, 81, 6, 0.82);
    }


    .grid-style-2 .category-grid-box-1 .short-description-1 ul li i{
        color: #eaa307
    }

    #ad_space_category .client-logo{
        margin-bottom: 5px;
    }

    .grid-style-2 .category-grid-box-1 .short-description-1 ul li i{
        color: #eaa307
    }

    #ad_space_category .client-logo{
        margin-bottom: 5px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered{
        line-height: 35px;
    }

    .select2-container--default .select2-selection--single{
        height: 35px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow{
        height:35px;
    }

    .panel-title{
        font-size: 14px;
    }

    #category_page_sidebar .form-control{
        padding-top: 5px;
        padding-bottom: 5px;
    }

    #category_page_sidebar{
        background: #ffffff;
    }

    #category_page_sidebar .panel-group .panel{
        border: none;
        margin-top: 10px;
    }

    .panel-title button{
        margin:  auto 0;
    }

    #compare_btn{
        background: #195fff;
        color: #ffffff;
        padding: 3px;
        font-weight: 800;
        font-family: Lato;
        font-size: 16px;
        border:none;
        border-radius: 3px;
        /*color: #ffffff;*/
    }

    #compare_btn:hover{
        text-decoration: underline;
        border:none;
        background: rgba(25, 95, 255, 0.71);
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
                            <li><a class="active" href="#">Search Result</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- =-=-=-=-=-=-= Breadcrumb End =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">
    <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
    <section class="section-padding no-top gray">
        <!-- Main Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <div class="col-lg-10" style="padding-left: 10px; padding-right: 10px">
                <!-- Middle Content Area -->
                <div class="col-md-8 col-md-push-4 col-lg-8 col-sx-12">
                    <!-- Row -->
                    <div class="row">
                        <!-- Sorting Filters -->
                        <div class="clearfix"></div>
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                            <div class="clearfix"></div>
                            <div class="listingTopFilterBar">
                                <div class="col-md-5 col-xs-12 col-sm-7 no-padding">
                                    <ul class="filterAdType">


                                        <?php
                                        if($this->uri->segment(2) == "search_result_grid"){
                                            ?>
                                            <li class="active"><a href="<?php echo base_url(); ?>vehicle/search_result"><span class="fa fa-bars"></span>&nbsp;List</a> </li>
                                            <li><a href="<?php echo base_url(); ?>vehicle/search_result_grid"><span class="fa fa-th"></span>&nbsp;Grid</a> </li>
                                            <?php
                                        }
//                                        else{
//                                            ?>
<!--                                            <li><a href="--><?php //echo base_url(); ?><!--vehicle/search_result"><span class="fa fa-bars"></span>&nbsp;List</a> </li>-->
<!--                                            <li class="active"><a href="--><?php //echo base_url(); ?><!--vehicle/search_result_grid"><span class="fa fa-th"></span>&nbsp;Grid</a> </li>-->
<!--                                            --><?php
//                                        }

                                        ?>

                                    </ul>
                                </div>

                                <div class="col-md-4 col-xs-12 col-sm-5 no-padding">
                                    <div class="header-listing">
                                        <h6>Sort by :</h6>
                                        <div class="custom-select-box">
                                            <select name="order" class="custom-select">
                                                <option value="0">Most popular</option>
                                                <option value="1">The latest</option>
                                                <option value="2">The best rating</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xs-12 col-sm-5 no-padding">
                                    <ul class="list-unstyled list-inline pull-right">
                                        <li>
                                            <form action="<?php echo base_url(); ?>user/wishlist" method="POST">
                                                <input type="hidden" value="" name="wish_list_array" id="wish_list_array">
                                                <button id="wish_list_btn" type="submit" href="<?php echo base_url(); ?>user/wishlist">
                                                    <i class="fa fa-heart-o" aria-hidden="true"></i> Wish List
                                                    <span style="" id="wishlist_count"> (0)</span>
                                                </button>

                                            </form>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Sorting Filters End-->
                        <div class="clearfix"></div>
                        <!-- Ads Archive -->
                        <div class="col-md-12 col-xs-12 col-xs-12">
                            <div class="posts-masonry">
                                <?php

                                if(is_array($all_properties) && count($all_properties) != 0){


                                foreach ($all_properties as $property){
                                    ?>


                                    <div class="ads-list-archive">
                                        <!-- Image Block -->
                                        <div class="col-lg-4 col-md-4 col-sm-4 no-padding">
                                            <!-- Img Block -->
                                            <div class="ad-archive-img">
                                                <a href="<?php echo base_url(); ?>vehicle/view/<?php echo $property->property_id; ?>">
                                                    <?php
                                                    if($property->main_image != null){
                                                        ?>
                                                        <div class="parent_div">
                                                            <div class="parent">
                                                                <img class="img-responsive" data-object-fit='contain' src="<?php echo base_url(); ?>assets/uploads/<?php echo $property->main_image; ?>" alt="">
                                                            </div>
                                                        </div>

                                                        <?php
                                                    }else {
                                                        $result_images = $this->PropertyModel->getPropertyImagesByPropertyId($property->property_id);
                                                        ?>
                                                        <div class="parent_div">
                                                            <div class="parent">
                                                                <img class="img-responsive" data-object-fit='contain'
                                                                     src="<?php echo base_url(); ?>assets/uploads/<?php echo $result_images[0]->image_name; ?>"
                                                                     alt="">
                                                            </div>
                                                        </div>
                                                        <?php

                                                    }
                                                    ?>

                                                </a>
                                            </div>
                                            <!-- Img Block -->
                                        </div>
                                        <!-- Ads Listing -->
                                        <div class="clearfix visible-xs-block"></div>
                                        <!-- Content Block -->
                                        <?php

                                        $model = $this->PropertyModel->getModelNameById($property->model);
                                        $brand = $this->PropertyModel->getBrandNameById($property->brand);
                                        $company = $this->PropertyModel->getCompanyDetailsById($property->car_sale_id);
                                        $transmission = $this->PropertyModel->getTransmissionNameById($property->transmission);
                                        ?>
                                        <div class="col-lg-8 col-md-8 col-sm-8 no-padding">
                                            <!-- Ad Desc -->
                                            <div class="ad-archive-desc">
                                                <!-- Price -->
                                                <!--                                            <img alt="" class="pull-right" src="--><?php //echo base_url(); ?><!--assets/images/certified.png">-->
                                                <!-- Title -->
                                                <a href="<?php echo base_url(); ?>vehicle/view/<?php echo $property->property_id; ?>">
                                                    <h3>
                                                        <?php
                                                        if(is_array($brand) && count($brand) != 0){
                                                            echo $brand[0]->name;
                                                        }else {
                                                            $modelTop = $this->PropertyModel->getTopBrandNameById($property->brand);
                                                            echo (is_array($modelTop) && count($modelTop) != 0) ? $modelTop[0]->name : null;
                                                        }
                                                        ?>,
                                                        <?php echo (is_array($model) && count($model) != 0) ? $model[0]->name : null; ?>
<!--                                                        --><?php //echo ucwords($property->edition); ?>
<!--                                                        --><?php //echo ($property->yom != 0) ? $property->yom : null; ?><!-- |-->
<!--                                                        --><?php //echo strtoupper(str_replace('_', ' ', $property->condition_type)); ?>


                                                    </h3>
                                                </a>

                                                <!-- Category -->
                                                <!--                                            <div class="category-title"> <span><a href="#">-->
                                                <!--                                                        -->
                                                <!--                                                    </a></span> </div>-->
                                                <!-- Short Description -->
                                                <div class="ad-price-simple">

                                                    <?php
                                                    if($property->price_on_request == 1){
                                                        echo "Price on Request";
                                                    }else if($property->price == 0) {
                                                        echo "Price not Available";
                                                    }else{
                                                        echo $property->price_type . " " .$property->price;
                                                    }
                                                    ?>
                                                </div>
                                                <div class="clearfix visible-xs-block"></div>


                                                <!-- Ad Features -->
                                                <ul class="short-meta list-inline">
                                                    <li>
                                                        <i class="flaticon-car-2"></i>
                                                        <?php
                                                        $bodytype = $this->UserModelAdmin->getCategoryDetailsByCatId($property->body_type);
                                                        echo $bodytype[0]->name;
                                                        ?>
                                                    </li>
                                                    <li>
                                                        <i class="flaticon-gas-station-1"></i>
                                                        <?php
                                                        $fueltype = $this->PropertyModel->getFuelTypesNameById($property->fuel_type);
                                                        echo $fueltype[0]->name;
                                                        ?>
                                                    </li>
                                                    <li><i class="flaticon-dashboard"></i>
                                                        <?php echo $property->mileage . " km"; ?></li>
                                                    <li><i class="flaticon-gearshift-1"></i> <?php echo (is_array($transmission) && count($transmission) != 0) ? $transmission[0]->name : null; ?> </a></li>
                                                    <li><i class="fa fa-map-marker"></i>

                                                        <?php
                                                        $district = $this->PropertyModel->getDistrictNameById($property->district);
                                                        if(is_array($district) && count($district) != 0){
                                                            ?>
                                                            <?php echo $district[0]->dname; ?>
                                                            <?php
                                                        }
                                                        ?>
                                                    </li>
                                                </ul>
                                                <!-- Ad History -->

                                                <div class="clearfix archive-history">
                                                    <div class="ad-meta" id="pro_desc">
                                                        <p>
                                                            <?php $text = $property->pro_desc;
                                                            $limit = 14;
                                                            if (str_word_count($text, 0) > $limit) {
                                                                $words = str_word_count($text, 2);
                                                                $pos = array_keys($words);
                                                                echo $text = substr($text, 0, $pos[$limit]) . '...';
                                                            }else{
                                                                echo $property->pro_desc;
                                                            }
                                                            ?>

                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="clearfix archive-history">
                                                    <div class="ad-meta" id="list_contact_no" style="background: none">
<!--                                                        <a href="tel:--><?php //echo (is_array($company) && count($company) != 0) ? $company[0]->contactno : $property->contact_mobile; ?><!--"><i class="fa fa-phone"></i>&nbsp;&nbsp;--><?php //echo (is_array($company) && count($company) != 0) ? $company[0]->contactno : $property->contact_mobile; ?><!--</a>-->
                                                    </div>
                                                </div>
                                                <div class="clearfix archive-history">

                                                    <div class="last-updated">
                                                        <h3>Ref ID : <?php
                                                            echo $property->ref_id;
                                                            ?></h3>
                                                        Date Added :
                                                        <?php
                                                        $date=date_create($property->posted_date);
                                                        echo date_format($date,"M d, Y");
                                                        ?>
                                                    </div>
                                                    <div class="ad-meta">
                                                        <div class="ad-info-1">
                                                            <!--                                            <p><i class="flaticon-calendar"></i> &nbsp;<span>-->
                                                            <!--                                                    --><?php
                                                            //                                                    $date=date_create($featured_property->posted_date);
                                                            //                                                    //echo " Posted : ".date_format($date,"M d, Y");
                                                            //
                                                            //                                                    $date1 = new DateTime($featured_property->posted_date);
                                                            //                                                    $date2 = new DateTime(date("Y-m-d H:i:s"));
                                                            //                                                    $intvl = $date1->diff($date2);
                                                            //                                                    echo $intvl->days . " days ";
                                                            //                                                    ?>
                                                            <!--                                                </span></p>-->
                                                            <ul class="pull-left">
                                                                <li>
                                                                    <a class="addButton">
                                                                        <input type="hidden" name="property[1].id" value="<?php echo $property->property_id; ?>" />
                                                                        <!--                                                        <input type="hidden" name="property[1].name" value="--><?php //echo $featured_property->title; ?><!--" />-->
                                                                        <!--                                                    <i class="flaticon-like-1"></i>-->
                                                                        <img id="fav_img" src="<?php echo base_url(); ?>assets/images/regi/favourite.png" width="24px">
                                                                        <!--                                                    Add to Wish List-->
                                                                    </a>
                                                                </li>
                                                            </ul>

                                                            <ul class="pull-right">
                                                                <li>
                                                                    <a class="addButtonCompare">
                                                                        <input type="hidden" name="property[1].id" value="<?php echo $property->property_id; ?>" />
                                                                        <!--                                                        Compare-->
                                                                        <!--                                                        <input type="hidden" name="property[1].name" value="--><?php //echo $featured_property->title; ?><!--" />-->
                                                                        <img id="compare_img" src="<?php echo base_url(); ?>assets/images/regi/compare.png" width="24px">
                                                                    </a>
                                                                </li>
                                                                <!--                                                <li><a href="#"><i class="flaticon-message"></i></a></li>-->
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <!--                                                <div class="ad-meta">-->
                                                    <!--<!--                                                    <a class="btn save-ad"><i class="fa fa-heart-o"></i> Save Ad.</a>-->
                                                    <!--                                                    <a class="btn btn-success"> View Details.</a> </div>-->
                                                </div>
                                            </div>
                                            <!-- Ad Desc End -->
                                        </div>
                                        <!-- Content Block End -->
                                    </div>


                                    <?php
                                }
                                }else{
                                    ?>
                                    <p>
                                        <?php
                                        echo "No Result Found";
                                        ?>
                                    </p>


                                <?php
                                }
                                ?>
                            </div>
                            <!-- Ads Archive End -->
                        </div>
                        <div class="clearfix"></div>
                        <!-- Pagination -->
                        <!--                        <div class="text-center margin-top-30">-->
                        <!--                            <ul class="pagination ">-->
                        <!--                                <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>-->
                        <!--                                <li><a href="#">1</a></li>-->
                        <!--                                <li class="active"><a href="#">2</a></li>-->
                        <!--                                <li><a href="#">3</a></li>-->
                        <!--                                <li><a href="#">4</a></li>-->
                        <!--                                <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>-->
                        <!--                            </ul>-->
                        <!--                        </div>-->

                        <center>
                            <div class="paginationx">
                                <ul class="pager">
                                    <li class="active">
                                        <?PHP
                                        echo $this->pagination->create_links();
                                        ?>
                                    </li>

                                </ul>
                            </div>
                        </center>
                        <!-- Pagination End -->
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Middle Content Area  End -->
                <!-- Left Sidebar -->
                <div class="col-md-4 col-md-pull-8 col-sx-12">
                    <!-- Sidebar Widgets -->
                    <div class="sidebar" id="category_page_sidebar">
                        <h4 style="color: #333333; font-weight:bold;padding-left: 5px; padding-right: -5px; margin-top: 5px">Advanced Search</h4>
                        <!-- Panel group -->
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <form action="<?php echo base_url(); ?>vehicle/advanced_search" method="post">


                                <div class="panel panel-default">
                                    <!-- Heading -->
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">

                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" style="line-height: 2.9em;">
                                                BodyType
                                            </div>
                                            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12" style="padding-right: 0; margin: 3px; float: right">
                                                <?php echo form_dropdown('body_type',
                                                    $body_types,
                                                    '','class="form-control" id="body_type" ') ?>


                                            </div>


                                        </h4>
                                    </div>
                                    <!-- Content -->
                                </div>

                                <!-- Brands Panel -->
                                <div class="panel panel-default">
                                    <!-- Heading -->
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">

                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" style="line-height: 2.9em;">
                                                Brand
                                            </div>
                                            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12" style="padding-right: 0; margin: 3px; float: right">
                                                <?php echo form_dropdown('brand',
                                                    $models,
                                                    '','class="form-control" id="brand" ') ?>


                                            </div>


                                        </h4>
                                    </div>
                                    <!-- Content -->
                                </div>
                                <!-- Brands Panel End -->
                                <!-- Condition Panel -->
                                <div class="panel panel-default">
                                    <!-- Heading -->
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">

                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" style="line-height: 2.9em;">
                                                Model
                                            </div>
                                            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12" style="padding-right: 0; margin: 3px; float: right">
                                                <?php echo form_dropdown('model',
                                                    $models,
                                                    '','class="form-control" id="model" ') ?>

                                            </div>


                                        </h4>
                                    </div>
                                    <!-- Content -->
                                </div>
                                <!-- Condition Panel End -->
                                <!-- Condition Panel -->
                                <div class="panel panel-default">
                                    <!-- Heading -->
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">

                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" style="line-height: 2.9em;">
                                                Edition
                                            </div>
                                            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12" style="padding-right: 0; margin: 3px; float: right">
                                                <input type="text" id="edition" name="edition" class="form-control" placeholder="Eg: Corolla 121">

                                            </div>


                                        </h4>
                                    </div>
                                    <!-- Content -->
                                </div>
                                <!-- Condition Panel End -->
                                <!-- Body Type Panel -->
                                <div class="panel panel-default">
                                    <!-- Heading -->
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">

                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" style="line-height: 2.9em;">
                                                YOM
                                            </div>
                                            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12" style="padding-right: 0; margin: 3px; float: right">
                                                <input type="text" name="yom" id="yom" class="form-control" placeholder="Eg: 2012">
                                            </div>


                                        </h4>
                                    </div>
                                    <!-- Content -->
                                </div>
                                <!-- Condition Panel End -->
                                <!-- Pricing Panel -->
                                <div class="panel panel-default">
                                    <!-- Heading -->
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">

                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" style="line-height: 2.9em;">
                                                YOR
                                            </div>
                                            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12" style="padding-right: 0; margin: 3px; float: right">
                                                <input type="text" name="yor" id="yor" class="form-control" placeholder="Eg: 1999">

                                            </div>


                                        </h4>
                                    </div>
                                    <!-- Content -->
                                </div>
                                <!-- Pricing Panel End -->
                                <!-- Year Panel -->
                                <div class="panel panel-default">
                                    <!-- Heading -->
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">

                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                                Engine (CC)
                                            </div>
                                            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12" style="padding-right: 0; margin: 3px; float: right">
                                                <input type="text" name="engine" id="engine" class="form-control" placeholder="Eg: 1000">

                                            </div>


                                        </h4>
                                    </div>
                                    <!-- Content -->
                                </div>

                                <div class="panel panel-default">
                                    <!-- Heading -->
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">

                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" style="line-height: 2.9em;">
                                                Transmission
                                            </div>
                                            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12" style="padding-right: 0; margin: 3px; float: right">
                                                <?php echo form_dropdown('transmission',
                                                    $transmissions,
                                                    '','class="form-control" id="transmission" ') ?>


                                            </div>


                                        </h4>
                                    </div>
                                    <!-- Content -->
                                </div>

                                <div class="panel panel-default">
                                    <!-- Heading -->
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">

                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                                Fuel Type
                                            </div>
                                            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12" style="padding-right: 0; margin: 3px; float: right">
                                                <?php echo form_dropdown('fuel_type',
                                                    $fuel_types,
                                                    '','class="form-control" id="fuel_type" ') ?>

                                            </div>


                                        </h4>
                                    </div>
                                    <!-- Content -->
                                </div>

                                <div class="panel panel-default">
                                    <!-- Heading -->
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">

                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" style="line-height: 2.9em;">
                                                Condition
                                            </div>
                                            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12" style="padding-right: 0; margin: 3px; float: right">
                                                <?php echo form_dropdown('condition',
                                                    array('0' => 'Select','brand_new' => 'Brand New','used' => 'Used', 'registered' => 'Registered', 'unregistered' => 'Unregistered'),
                                                    '','class="selectpicker form-control" id="condition" ') ?>


                                            </div>


                                        </h4>
                                    </div>
                                    <!-- Content -->
                                </div>
                                <div class="panel panel-default">
                                    <!-- Heading -->
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">

                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                                Door Count
                                            </div>
                                            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12" style="padding-right: 0; margin: 3px; float: right">
                                                <?php echo form_dropdown('door_count',
                                                    array('0'=>'Select','2' => '2', '3'=>'3', '4'=>'4', '5'=>'5','6'=>'6','7'=>'7','Other'=>'Other'),
                                                    '','class="selectpicker form-control" id="door_count" ') ?>


                                            </div>


                                        </h4>
                                    </div>
                                    <!-- Content -->
                                </div>
                                <div class="panel panel-default">
                                    <!-- Heading -->
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">

                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                                Mileage (km)
                                            </div>
                                            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12" style="padding-right: 0; margin: 3px; float: right">
                                                <input type="text" name="mileage_from" id="mileage_from" class="form-control" placeholder="Eg: 1000">
                                                <p style="text-align: center; margin-bottom: 0; font-size: 13px; font-weight: 900">To</p>
                                                <input type="text" name="mileage_to" to="mileage_to" class="form-control" placeholder="Eg: 50000">
                                            </div>


                                        </h4>
                                    </div>
                                    <!-- Content -->
                                </div>

                                <div class="panel panel-default">
                                    <!-- Heading -->
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">

                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                                Price (Rs)
                                            </div>
                                            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12" style="padding-right: 0; margin: 3px; float: right">
                                                <input type="text" name="price_from" id="price_from" class="form-control" placeholder="Eg: 100,000">
                                                <p style="text-align: center; margin-bottom: 0; font-size: 13px; font-weight: 900">To</p>
                                                <input type="text" name="price_to" id="price_to" class="form-control" placeholder="Eg: 500,000">
                                            </div>


                                        </h4>
                                    </div>
                                    <!-- Content -->
                                </div>
                                <div class="panel panel-default">
                                    <!-- Heading -->
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">

                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                                Car Sale
                                            </div>
                                            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12" style="padding-right: 0; margin: 3px; float: right">
                                                <input type="text" name="car_sale" id="car_sale" class="form-control" placeholder="Eg: Indra Traders">

                                            </div>


                                        </h4>
                                    </div>
                                    <!-- Content -->
                                </div>
                                <div class="panel panel-default">
                                    <!-- Heading -->
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">

                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                                Keywords
                                            </div>
                                            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12" style="padding-right: 0; margin: 3px; float: right">
                                                <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Eg: Toyota">

                                            </div>


                                        </h4>
                                    </div>
                                    <!-- Content -->
                                </div>
                                <div class="panel panel-default">
                                    <!-- Heading -->
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <button type="submit" name="adv_search" class="btn btn-flat btn-warning btn-lg" style="margin-top: 10px; margin-bottom: 10px; margin-left: 10px; margin-right: -10px">Search</button>
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
                    <!-- Sidebar Widgets End -->
                </div>
                <!-- Left Sidebar End -->
                </div>
                <div class="col-lg-2" style="padding-left: 0;padding-right: 0" id="ad_space_category">
                    <div class="client-logo">
                        <a href="#"><img src="<?php  echo base_url(); ?>assets/uploads/footer_banner/1.png" class="img-responsive" alt="Brand Image" /></a>
                    </div>
                    <div class="client-logo">
                        <a href="#"><img src="<?php  echo base_url(); ?>assets/uploads/footer_banner/2.png" class="img-responsive" alt="Brand Image" /></a>
                    </div>
                    <div class="client-logo">
                        <a href="#"><img src="<?php  echo base_url(); ?>assets/uploads/footer_banner/3.png" class="img-responsive" alt="Brand Image" /></a>
                    </div>
                    <div class="client-logo">
                        <a href="#"><img src="<?php  echo base_url(); ?>assets/uploads/footer_banner/4.png" class="img-responsive" alt="Brand Image" /></a>
                    </div>
                    <div class="client-logo">
                        <a href="#"><img src="<?php  echo base_url(); ?>assets/uploads/footer_banner/1.png" class="img-responsive" alt="Brand Image" /></a>
                    </div>
                    <div class="client-logo">
                        <a href="#"><img src="<?php  echo base_url(); ?>assets/uploads/footer_banner/2.png" class="img-responsive" alt="Brand Image" /></a>
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Main Container End -->
    </section>
    <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->

    <script>
        $( document ).ready(function() {
            var baseurl = $('body').data('baseurl');
            var numArray = [];
            $(".addButton").on("click", function (event) {
                event.preventDefault();

                var button = $(this);
                var parent = button.parent(); // We need to find the container in which to seach our fields.
                var idArticle = parent.find("input[name$='.id']").val(); // Find the ID
                // var nameArticle = parent.find("input[name$='.name']").val(); // Find ather data
                //+ " and name = " + nameArticle


                numArray.push(idArticle);
                //alert("The Vehicle Ad added to Wish List.");
                console.log("array", numArray);
                $('#wishlist_count').text("(" + numArray.length + ")");
                $('#wish_list_array').val(numArray);

                this.disabled = true;
                // Next step is the ajax method to call the server with the correct data.
            });



            var numArrayCompare = [];
            $(".addButtonCompare").on("click", function (event) {
                event.preventDefault();

                var button = $(this);
                var parent = button.parent(); // We need to find the container in which to seach our fields.
                var idArticle = parent.find("input[name$='.id']").val(); // Find the ID
                // var nameArticle = parent.find("input[name$='.name']").val(); // Find ather data
                //+ " and name = " + nameArticle


                numArrayCompare.push(idArticle);
                //alert("The Vehicle Ad added for Comparison.");
                console.log("array", numArrayCompare);
                $('#compare_count').text("(" + numArrayCompare.length + ")");
                $('#compare_array').val(numArrayCompare);

                this.disabled = true;
                // Next step is the ajax method to call the server with the correct data.
            });

        });






    </script>