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
        font-size: 16px;
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
        height: 160px;
    }


    .parent > img {
        display: inline-flex;
        width: 100%;
        height: 160px;
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
        padding: 0;
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

    .short-meta li i{
        color: #eaa307 !important;
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
    .ad-archive-desc p{
        font-size: 12px;
    }


    #more_info_li a{
        color: #ed4c06;
        font-weight: 800;
        font-size: 14px;
    }
    #more_info_li a:hover {
        color: rgba(57, 57, 57, 0.96);
        text-decoration: underline;
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
                            <li><a href="#"><?php echo ucwords(str_replace('%20', ' ', $model_type_name)); ?></a>
                            <li><a class="active" href="#">Listing</a></li>
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
                <div class="col-md-9 col-md-push-3 col-lg-9 col-sx-12">
                    <!-- Row -->
                    <div class="row">
                        <!-- Sorting Filters -->
                        <div class="clearfix"></div>
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                            <div class="clearfix"></div>
                            <div class="listingTopFilterBar">
                                <div class="col-md-3 col-xs-12 col-sm-7 no-padding">
                                    <ul class="filterAdType">


                                        <?php
                                        if($this->uri->segment(2) == "sub_category_grid"){
                                            ?>
                                            <li><a href="<?php echo base_url(); ?>vehicle/sub_category/<?php echo $catId; ?>/<?php echo $model_type_name; ?>"><span class="fa fa-bars"></span>&nbsp;List</a> </li>
                                            <li class="active"><a href="<?php echo base_url(); ?>vehicle/sub_category_grid/<?php echo $catId; ?>/<?php echo $model_type_name; ?>"><span class="fa fa-th"></span>&nbsp;Grid</a> </li>
                                            <?php
                                        }else{
                                            ?>
                                            <li class="active"><a href="<?php echo base_url(); ?>vehicle/sub_category/<?php echo $catId; ?>/<?php echo $model_type_name; ?>"><span class="fa fa-bars"></span>&nbsp;List</a> </li>
                                            <li class=""><a href="<?php echo base_url(); ?>vehicle/sub_category_grid/<?php echo $catId; ?>/<?php echo $model_type_name; ?>"><span class="fa fa-th"></span>&nbsp;Grid</a> </li>
                                            <?php
                                        }

                                        ?>

                                    </ul>
                                </div>

                                <div class="col-md-4 col-xs-12 col-sm-5 no-padding">
                                    <div class="header-listing">
                                        <h6>Sort by :</h6>
                                        <div class="custom-select-box">
                                            <input type="hidden" name="cat_id" id="cat_id" value="<?php echo $catId; ?>">
                                            <input type="hidden" name="cat_name" id="cat_name" value="<?php echo $this->uri->segment(4); ?>">
                                            <?php
                                            if($this->uri->segment(5) != null){
                                                ?>
                                                <?php echo form_dropdown('sort_types',
                                                    array('date' => 'Date','brand' => 'Brand',  'price' => 'Price'),
                                                    $this->uri->segment(5) ,'class="custom-select" id="sort_types"') ?>
                                                <?php
                                            }else{
                                                ?>
                                                <?php echo form_dropdown('sort_types',
                                                    array('date' => 'Date', 'brand' => 'Brand', 'price' => 'Price'),
                                                    '','class="custom-select" id="sort_types"') ?>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 col-xs-12 col-sm-5 no-padding" style="margin-top: 7px">
                                    <ul class="list-unstyled list-inline pull-right" style="min-height: 80px">
                                        <li>
                                            <form action="<?php echo base_url(); ?>user/compare_list" method="POST"><?php

                                                //var_dump($session_id);
                                                ?>
                                                <input type="hidden" value="" name="compare_list_array" id="compare_list_array">
                                                <input type="hidden" value="<?php echo $this->session->userdata("session_id");  ?>" name="session_id">
                                                <button id="compare_btn" class="btn btn-flat btn-sm btn-primary" type="submit" title="View Compare List">
                                                    Compare
                                                    <?php


                                                    $resultC = $this->PropertyModel->getCompareListDataBySessionID($this->session->userdata("session_id"));
                                                    if(is_array($resultC) && count($resultC) != 0){
                                                        ?>
                                                        <span style="" id="compare_count">(<?php echo count($resultC); ?>)</span>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <span style="" id="compare_count"> (0)</span>
                                                        <?php
                                                    }
                                                    ?>


                                                </button>
                                            </form>
                                        </li>
                                        <li><?php
                                            $session_array  = $this->session->userdata('logged_in');
                                            //var_dump($session_array);
                                            if($session_array == NULL){
                                                ?>
                                                <a class="btn btn-flat btn-sm btn-primary" id="wish_list_btn" href="<?php echo base_url(); ?>login" title="View Wish List">
                                                   Wish List
                                                    <span style="" id="wishlist_count"> (0)</span>
                                                </a>
                                                <?php
                                            }else {
                                                ?>
                                                <form action="<?php echo base_url(); ?>user/wishlist" method="POST">
                                                    <input type="hidden" value="" name="wish_list_array" id="wish_list_array">
                                                    <input type="hidden" value="user_id" name="user_id" id="<?php echo $session_array['userId']; ?>">
                                                    <button class="btn btn-flat btn-sm btn-primary" id="wish_list_btn" title="Add to Wish List" type="submit" href="<?php echo base_url(); ?>user/wishlist">
                                                        <i class="fa fa-heart-o" aria-hidden="true"></i> Wish List
                                                        <?php
                                                        $result = $this->PropertyModel->getWishListDataByUserID($session_array['userId']);
                                                        if(is_array($result) && count($result) != 0){
                                                            ?>
                                                            <span style="" id="wishlist_count">(<?php echo count($result); ?>)</span>
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <span style="" id="wishlist_count"> (0)</span>
                                                            <?php
                                                        }
                                                        ?>
                                                    </button>

                                                </form>
                                                <?php
                                            }
                                            ?>
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
                                    foreach ($all_properties as $property){
                                        ?>


                                <div class="ads-list-archive">
                                    <!-- Image Block -->
                                    <div class="col-lg-4 col-md-4 col-sm-4 no-padding">
                                        <?php
                                        if($property->featured == 1){
                                            ?> <div class="featured-ribbon">
                                                <span>Featured</span>
                                            </div>

                                        <?php
                                        }
                                        ?>

                                        <!-- Img Block -->
                                        <div class="ad-archive-img">
                                            <a href="<?php echo base_url(); ?>vehicle/view/<?php echo $property->property_id; ?>">
                                                <?php
                                                $result_images = $this->PropertyModel->getPropertyImagesByPropertyId($property->property_id);
                                                if($property->main_image != null){
                                                    ?>
                                                    <div class="parent_div">
                                                        <div class="parent">
                                                            <img class="img-responsive" data-object-fit='contain' src="<?php echo base_url(); ?>assets/uploads/<?php echo $property->main_image; ?>" alt="">
                                                        </div>
                                                    </div>

                                                    <?php
                                                }else if(is_array($result_images) && count($result_images) != 0){
                                                    ?>
                                                    <div class="parent">
                                                        <img alt="Carspot"
                                                             src="<?php echo base_url(); ?>assets/uploads/<?php echo (is_array($result_images) && count($result_images) != 0) ? $result_images[0]->image_name : null; ?>"
                                                             class="img-responsive">
                                                    </div>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <div class="parent">
                                                        <img alt="Carspot"
                                                             src="<?php echo base_url(); ?>assets/admin/img/placeholder.png"
                                                             class="img-responsive">
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
                                    //var_dump($model);
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
                                                    $topmodel = $this->PropertyModel->getTopBrandNameById($property->brand);

                                                    if(is_array($brand) && count($brand) != 0){
                                                        echo $brand[0]->name;
                                                    }else{
                                                        $modelTop = $this->PropertyModel->getTopBrandNameById($property->brand);
                                                        echo (is_array($modelTop) && count($modelTop) != 0) ? $modelTop[0]->name : null;
                                                    }
                                                    ?>,


                                                    <?php echo (is_array($model) && count($model) != 0) ? $model[0]->name : null; ?>
<!--                                                    --><?php //echo ucwords($property->edition); ?>
<!--                                                    --><?php //echo ($property->yom != 0) ? $property->yom : null; ?><!-- |-->
<!--                                                    --><?php //echo strtoupper(str_replace('_', ' ', $property->condition_type)); ?>


                                                </h3>
                                            </a>

                                            <!-- Category -->
<!--                                            <div class="category-title"> <span><a href="#">-->
<!--                                                        -->
<!--                                                    </a></span> </div>-->
                                            <!-- Short Description -->
                                            <div class="ad-price-simple">

                                                <?php
                                                if($property->price == 0) {
                                                    echo "Price not Available";
                                                }else{
                                                    echo $property->price_type . " " . number_format(preg_replace('/[^A-Za-z0-9. -]/', '', $property->price));
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

<!--                                            <div class="clearfix archive-history">-->
<!--                                                <div class="ad-meta" id="pro_desc">-->
<!--                                                    <p>-->
<!--                                                        --><?php //$text = $property->pro_desc;
//                                                        $limit = 10;
//                                                        if (str_word_count($text, 0) > $limit) {
//                                                            $words = str_word_count($text, 2);
//                                                            $pos = array_keys($words);
//                                                            echo $text = substr($text, 0, $pos[$limit]) . '...';
//                                                        }else{
//                                                            echo $property->pro_desc;
//                                                        }
//                                                        ?>
<!---->
<!--                                                    </p>-->
<!--                                                </div>-->
<!--                                            </div>-->

                                            <div class="clearfix archive-history">
                                                <div class="ad-meta" id="list_contact_no" style="background: none">
<!--                                                    <a href="tel:--><?php //echo (is_array($company) && count($company) != 0) ? $company[0]->contactno : $property->contact_mobile; ?><!--"><i class="fa fa-phone"></i>&nbsp;&nbsp;--><?php //echo (is_array($company) && count($company) != 0) ? $company[0]->contactno : $property->contact_mobile; ?><!--</a>-->
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
                                                    <p style="margin-top: 3px; margin-bottom: 3px"><i class="fa fa-eye"></i>
                                                        <?php

                                                        $result = $this->PropertyModel->getPostViewCountByPropertyId($property->property_id);
                                                        if(is_array($result) && count($result) != 0){
                                                            echo count($result);
                                                        }else{
                                                            echo "0";
                                                        }

                                                        ?> Views
                                                    </p>
                                                </div>
                                                <div class="ad-meta">
                                                    <li style="text-align: right; width: 100%; list-style: none; padding: 0; line-height: 0; margin: 0; margin-top:5px" id="more_info_li">
                                                        <a href="<?php echo base_url(); ?>vehicle/view/<?php echo $property->property_id; ?>">More Info >></a>
                                                    </li>
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
                                                                <img id="fav_img" src="<?php echo base_url(); ?>assets/images/regi/favourite.png" width="24px" title="Add to Wish List">
                                                                <!--                                                    Add to Wish List-->
                                                            </a>
                                                        </li>
                                                    </ul>

                                                    <ul class="pull-right">
                                                        <li>
                                                            <a class="addButtonCompare" id="com_<?php echo $property->property_id; ?>">
                                                                <input type="hidden" name="property[1].id" value="<?php echo $property->property_id; ?>" />
                                                                <!--                                                        Compare-->
                                                                <!--                                                        <input type="hidden" name="property[1].name" value="--><?php //echo $featured_property->title; ?><!--" />-->
                                                                <img id="compare_img" src="<?php echo base_url(); ?>assets/images/regi/compare.png" width="24px" title="Add to Compare">
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
                <div class="col-md-3 col-md-pull-9 col-sx-12" style="padding-left: 0; padding-right: 0; background-color: #EEEEEE">
                    <!-- Sidebar Widgets -->
                    <?php include 'advanced_search.php'; ?>
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


        $(document).ready(function () {
            var baseurl = $('body').data('baseurl');
            var numArrayCompare = [];
            $(".addButtonCompare").one("click", function (event) {
                // alert("xxxx");
                event.preventDefault();

                var button = $(this);
                var parent = button.parent(); // We need to find the container in which to seach our fields.
                var idArticle = parent.find("input[name$='.id']").val(); // Find the ID
                // var nameArticle = parent.find("input[name$='.name']").val(); // Find ather data
                //+ " and name = " + nameArticle

                //alert('#com_'+idArticle+' img' );
                //$('#com_' + idArticle + ' img').hide();


                numArrayCompare.push(idArticle);
                //alert("The Vehicle Ad added for Comparison.");
                //console.log("array", numArrayCompare);
                $('#compare_count').text("(" + numArrayCompare.length + ")");
                $('#compare_list_array').val(numArrayCompare);


//                $.ajax({
//                    type: "POST",
//                    url: baseurl + "property/compare_item_store",
//                    data: {'property_id': idArticle.split()},
//                    success: function (data) {
//                        console.log("result", data);
//                    }
//                });


                this.disabled = true;
                // Next step is the ajax method to call the server with the correct data.
            });
        });


    </script>

    <?php
    if($this->session->userdata('logged_in') !== null){
        $userId = $session_array['userId'];

        ?>

        <script>
            $(document).ready(function () {
                var baseurl = $('body').data('baseurl');
                var numArray = [];
                $(".addButton").one("click", function (event) {

                    event.preventDefault();
                    //alert(session_array);

                    var user_id = '<?php echo $userId; ?>';
//                alert(user_id);
                    if (user_id == "") {
                        //alert("Please Login to Account before add wish list.");
                        //swal("Login !", "Please Login to Account before add wish list!", "warning");

                        swal("Please Login to Account before add wish list.")
                            .then((value) => {
                                window.location.href = baseurl + "login";
                                return;
                            });

                    }


                    var button = $(this);

                    var parent = button.parent(); // We need to find the container in which to seach our fields.
                    var idArticle = parent.find("input[name$='.id']").val(); // Find the ID
                    // var nameArticle = parent.find("input[name$='.name']").val(); // Find ather data
                    //+ " and name = " + nameArticle
                    //alert(idArticle);

                    numArray.push(idArticle);
                    //alert("The Vehicle Ad added to Wish List.");
                    console.log("array", numArray);
                    $('#wishlist_count').text("(" + numArray.length + ")");
                    $('#wish_list_array').val(numArray);

                    this.disabled = true;
                    // Next step is the ajax method to call the server with the correct data.
                });




            });


        </script>
    <?php
    }else{
    ?>
        <script>
            $(document).ready(function () {
                var baseurl = $('body').data('baseurl');
                $(".addButton").on("click", function (event) {

                    event.preventDefault();
                    swal("Please Login to Account before add wish list.")
                        .then((value) => {
                            window.location.href = baseurl + "login";
                            return;
                        });
                });
            });
        </script>
        <?php
    }
    ?>
