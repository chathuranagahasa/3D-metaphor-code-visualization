<!-- =-=-=-=-=-=-= Main Header End  =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Breadcrumb =-=-=-=-=-=-= -->
<!--<div class="car-detail gray">-->
<!--    <div class="advertising">-->
<!--        <div class="container">-->
<!--            <div class="banner">-->
<!--                <img src="--><?php //echo base_url(); ?><!--assets/images/banner-1.png" alt="">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<style>
    .category-list-title h5 #clickToShowButton {
        color: #232323;
        display: block;
        font-size: 20px;
        font-weight: 600;
        text-transform: capitalize;
    }

    .category-list-title h5 a{
        font-size: 20px;
        font-weight: 600;
    }

    form input .checkbox{
        padding: 20px;
    }

    .content-box-grid{
        padding: 10px 15px;
        border: none;
        border-bottom: 1px solid #CCCCCC;
        color: #333333;
    }

    #vehicle_details_box{
        line-height:40px;
    }


    #price_view_box{
        padding: 20px;
        margin-bottom: 10px;
    }


    .parent {
        width: 100%;
        height: 100%;
        position: relative;
        display: inline-block;
        overflow: hidden;
        margin: 0;
    }

    .parent > img {
    display: block;
    position: absolute;
    top: 50%;
    left: 50%;
    min-height: 100%;
    transform: translate(-50%, -50%);
    }

    .parent_div{
        background: #000000;
        height: 500px;
    }

    .flexslider .slides img{
        width: auto;
    }


    /*.parent > img {*/
        /*display: inline-flex;*/
        /*width: 100%;*/
        /*height: 695px;*/
    /*}*/

    [data-object-fit='contain'] {
        object-fit: contain
    }

    .parent_thumb {
        width: 100%;
        height: 100%;
        position: relative;
        display: inline-block;
        overflow: hidden;
        margin: 0;
    }

    .parent_thumb > img {
        display: block;
        position: absolute;
        top: 50%;
        left: 50%;
        min-height: 100%;
        transform: translate(-50%, -50%);
    }

    .parent_div_thumb{
        background: #000000;
        height: 160px;
    }

    /*.section-padding{*/
        /*padding-bottom: 40px;*/
    /*}*/

    .page-header-area-2 {
        padding: 0px;
        margin-bottom: 15px;
        background: #eeeeee;
    }

    .heading-zone {
        padding: 10px 0 30px;
    }

    .heading-zone h1{
        line-height: 29px;
    }

    hr{
        margin-top: 5px;
        margin-bottom: 5px;
    }

    .heading-panel h3{
        line-height: 30px;
        padding-top: 10px;
    }

    .sidebar .heading-zone{
        padding-bottom: 5px;
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

    .content-box-grid{
        padding-top: 0;
    }

    #sidebar_refid_div{
        padding: 10px;
        padding-top: 15px;
        line-height: 23px;
        background-color: #CCCCCC;
        border-radius: 4px;
    }

    #sidebar_feature_div{
        padding: 5px;
        line-height: 40px;
    }

    #sidebar_price_div{
        padding-top: 50px;
        padding-bottom: 30px;
        font-size: 32px;
        text-align: center;
        margin-top: 20px;
        margin-bottom: 20px;
        background: #eba50c;
        font-weight: 800;
        border-radius: 3px;
        line-height: 20px;
    }

    .category-list-icon i{
        color: #333333;
    }

    .client-logo a img{
        margin-bottom: 5px;
    }


    #wish_list_btn, #compare_btn{
        float: right;
        margin-right: 5px;
        margin-top: 5px;
    }

</style>


<?php

if(is_array($property) && count($property) != 0){
    $district = $this->PropertyModel->getDistrictNameById($property[0]->district);
    $fueltype = $this->PropertyModel->getFuelTypesNameById($property[0]->fuel_type);
    $bodytype = $this->UserModelAdmin->getCategoryDetailsByCatId($property[0]->body_type);

    $color = $this->PropertyModel->getColorsById($property[0]->color);
    $company = $this->PropertyModel->getCompanyDetailsById($property[0]->car_sale_id);
    $transmission = $this->PropertyModel->getTransmissionNameById($property[0]->transmission);
    $brand = $this->PropertyModel->getBrandNameById($property[0]->brand);
    $model = $this->PropertyModel->getModelNameById($property[0]->model);
?>
<div class="page-header-area-2 no-bottom gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 no-padding  col-md-12 col-sm-12 col-xs-12">
                <div class="small-breadcrumb">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <div class=" breadcrumb-link">
                            <ul>
                                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li><a href="#"><?php  echo (is_array($bodytype) && count($bodytype) != 0) ? $bodytype[0]->name : null; ?></a></li>
<!--                                --><?php //echo base_url(); ?><!--vehicle/category/--><?php //echo $property[0]->body_type; ?><!--/--><?php //echo $bodytype[0]->name; ?>
                                <li><a class="active" href="#">
                                        <?php echo (is_array($brand) && count($brand) != 0) ? $brand[0]->name : null; ?>
                                        <?php echo (is_array($model) && count($model) != 0) ? $model[0]->name : null; ?>
                                        <?php echo ucwords($property[0]->edition); ?>
                                    </a></li>
                            </ul>

                            <?php
                            $session_array  = $this->session->userdata('logged_in');
                            if($session_array == NULL){
                                ?>
                                <a  class="btn btn-flat btn-sm btn-primary" id="wish_list_btn" href="<?php echo base_url(); ?>login" title="Add to Wish List">
                                    Wish List
                                    <span style="" id="wishlist_count"> (0)</span>
                                </a>
                                <?php
                            }else {
                                ?>
                                <form action="<?php echo base_url(); ?>user/wishlist" method="POST">
                                    <input type="hidden" value="" name="wish_list_array"
                                           id="wish_list_array">
                                    <input type="hidden" value="<?php echo $session_array['userId']; ?>"
                                           name="user_id" id="user_id">
                                    <button class="btn btn-flat btn-sm btn-primary" id="wish_list_btn" type="submit"
                                            href="<?php echo base_url(); ?>user/wishlist">
                                         Wish List
                                        <?php
                                        $result = $this->PropertyModel->getWishListDataByUserID($session_array['userId']);
                                        if(is_array($result) && count($result) != 0){
                                            ?>
                                            <span style="" id="wishlist_count">( <?php echo count($result); ?>)</span>
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

                        </div>
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
    <section class="section-padding no-top gray ">
        <!-- Main Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <div class="pricing-area">
                    <div class="col-md-9 col-xs-12 col-sm-8">

                    </div>
                    <div class="col-md-3 col-sm-4 detail_price col-xs-12">
                    </div>
                </div>
                <!-- Middle Content Area -->
                <div class="col-md-8 col-xs-12 col-sm-12">
                    <!-- Single Ad -->
                    <div class="singlepage-detail ">
                        <div class="featured-ribbon">
                            <span>Featured</span>
                        </div>
                        <div id="single-slider" class="flexslider">
                            <ul class="slides">
                                <li><a href="<?php echo base_url(); ?>assets/uploads/<?php echo $property[0]->main_image; ?>" data-fancybox="group">
                                        <div class="parent_div">
                                            <div class="parent">
                                                <img alt="" data-object-fit='contain' src="<?php echo base_url(); ?>assets/uploads/<?php echo $property[0]->main_image; ?>" />
                                            </div>
                                        </div>

                                    </a></li>
                                <?php
                                $result_images = $this->PropertyModel->getPropertyImagesByPropertyId($property[0]->property_id);
                                for ($i=0; $i < count($result_images); $i ++){
                                    ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>assets/uploads/<?php echo $result_images[$i]->image_name; ?>" data-fancybox="group">
                                        <div class="parent_div">
                                            <div class="parent">
                                        <img alt="" data-object-fit='contain' src="<?php echo base_url(); ?>assets/uploads/<?php echo $result_images[$i]->image_name; ?>" />
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div id="carousel" class="flexslider">
                            <ul class="slides">
                                <li>
                                    <div class="parent_div_thumb">
                                        <div class="parent_thumb">
                                            <img data-object-fit='contain'  alt="" src="<?php echo base_url(); ?>assets/uploads/<?php echo $property[0]->main_image; ?>">
                                        </div>
                                    </div>
                                </li>
                                <?php
                                $result_images = $this->PropertyModel->getPropertyImagesByPropertyId($property[0]->property_id);
                                for ($i=0; $i < count($result_images); $i ++){
                                    ?>
                                    <li>
                                        <div class="parent_div_thumb">
                                            <div class="parent_thumb">
                                                <img data-object-fit='contain'  alt="" src="<?php echo base_url(); ?>assets/uploads/<?php echo $result_images[$i]->image_name; ?>">
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                                ?>

                            </ul>
                        </div>
                        <div class="ad-info-1">
<!-- ad space -->
                        </div>



                        <div class="content-box-grid" style="min-height: 200px">
                            <div class="short-features">
                                <!-- Ad Specifications -->
                                <div class="specification">
                                    <!-- Heading Area -->
                                    <div class="heading-panel">
                                        <div class="ad-info-1">
                                            <!--                                                                        <p><i class="flaticon-calendar"></i> &nbsp;<span>-->
                                            <!--                                                                                --><?php
                                            //                                                                                $date=date_create($property[0]->posted_date);
                                            //                                                                                //echo " Posted : ".date_format($date,"M d, Y");
                                            //
                                            //                                                                                $date1 = new DateTime($property[0]->posted_date);
                                            //                                                                                $date2 = new DateTime(date("Y-m-d H:i:s"));
                                            //                                                                                $intvl = $date1->diff($date2);
                                            //                                                                                echo $intvl->days . " days ";
                                            //                                                                                ?>
                                            <!--                                                                            </span></p>-->
                                            <ul class="pull-left">
                                                <h3 class="main-title text-left">
                                                    Details
                                                </h3>

                                            </ul>
                                            <ul class="pull-right">
                                                <li>
                                                    <a class="addButton">
                                                        <input type="hidden" name="property[1].id" value="<?php echo $property[0]->property_id; ?>" />
                                                        <!--                                                        <input type="hidden" name="property[1].name" value="--><?php //echo $featured_property->title; ?><!--" />-->
                                                        <!--                                                    <i class="flaticon-like-1"></i>-->
                                                        <img id="fav_img" src="<?php echo base_url(); ?>assets/images/regi/favourite.png" width="24px" title="Add to Wish List">
                                                        <!--                                                    Add to Wish List-->
                                                    </a>
                                                </li>
                                            </ul>

                                            <ul class="pull-right">
                                                <li>
                                                    <a class="addButtonCompare" id="com_<?php echo $property[0]->property_id; ?>">
                                                        <input type="hidden" name="property[1].id" value="<?php echo $property[0]->property_id; ?>" />
                                                        <!--                                                        Compare-->
                                                        <!--                                                        <input type="hidden" name="property[1].name" value="--><?php //echo $featured_property->title; ?><!--" />-->
                                                        <img id="compare_img" src="<?php echo base_url(); ?>assets/images/regi/compare.png" width="24px" title="Click to Compare">
                                                    </a>
                                                </li>
                                                <!--                                                <li><a href="#"><i class="flaticon-message"></i></a></li>-->
                                            </ul>
                                        </div>

                                        <hr>
                                        <p>
                                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                            <span><strong><i class="flaticon-car-2"></i>Body Type</strong> :</span> <?php echo $bodytype[0]->name; ?>
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                            <span><strong><i class="flaticon-car-repair"></i>Edition</strong> :</span> <?php echo $property[0]->edition; ?>
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                            <span><strong><i class="flaticon-annual"></i>Year of Register</strong> :</span> <?php echo $property[0]->yor; ?>
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                            <span><strong><i class="flaticon-car-door"></i>Door Count</strong> :</span> <?php echo $property[0]->door_count; ?>
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                            <span><strong><i class="fa fa-list"></i>Seat Count</strong> :</span> <?php echo $property[0]->seat_count; ?>
                                        </div>


                                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                            <span><strong><i class="flaticon-cogwheel-outline"></i>Exterior Color</strong> :</span> <?php
                                            $color = $this->PropertyModel->getColorsById($property[0]->color);
                                            if(is_array($color) && count($color) != 0){
                                                ?>
                                                <!--                                                        <a href="javascript:void(0)">-->

                                                <?php
                                                echo $color[0]->name; ?>
                                                <!--                                                        </a>-->
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                            <span><strong><i class="flaticon-cogwheel-outline"></i>Interior Color</strong> :</span> <?php
                                            $color = $this->PropertyModel->getColorsById($property[0]->interior_color);
                                            if(is_array($color) && count($color) != 0){
                                                ?>
                                                <!--                                                        <a href="javascript:void(0)">-->

                                                <?php
                                                echo $color[0]->name; ?>
                                                <!--                                                        </a>-->
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <?php
                                        if($property[0]-> show_in_ad_regno == 1){
                                            ?>
                                            <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                                <span><strong><i class="fa fa-list"></i>Registration Number</strong> :</span> <?php echo $property[0]->pro_regi_no; ?>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                        <?php
                                        if($property[0]->district != NULL){
                                            ?>
                                            <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                                <?php
                                                $district = $this->PropertyModel->getDistrictNameById($property[0]->district);
                                                if(is_array($district) && count($district) != 0) {
                                                    ?>


                                                <span><strong><i class="fa fa-list"></i>Location</strong> :</span> <?php echo $district[0]->dname; ?>
                                            </div>
                                                    <?php
                                                }
                                            ?>
                                            <?php
                                        }
                                        ?>

<!--                                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding">-->
<!--                                            <span><strong><i class="flaticon-gas-station-1"></i>Fuel type </strong> :</span> --><?php //echo  (is_array($fueltype) && count($fueltype) != 0) ? $fueltype[0]->name : null; ?>
<!--                                        </div>-->
<!--                                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding">-->
<!--                                            <span><strong><i class="flaticon-car-repair"></i>Condition</strong> :</span> --><?php //echo strtoupper(str_replace('_', ' ', $property[0]->condition_type)); ?>
<!--                                        </div>-->
<!--                                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding">-->
<!--                                            <span><strong><i class="flaticon-engine-2"></i>Engine Size (cc) </strong>:</span> --><?php //echo $property[0]->engine_size; ?>
<!--                                        </div>-->
<!--                                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding">-->
<!--                                            <span><strong><i class="flaticon-dashboard"></i>Mileage (km)</strong> :</span> --><?php //echo $property[0]->mileage; ?>
<!--                                        </div>-->
<!--                                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding">-->
<!--                                            <span><strong><i class="flaticon-gearshift-1"></i>Transmission</strong> :</span> --><?php //echo (is_array($transmission) && count($transmission) != 0) ? $transmission[0]->name : null; ?>
<!--                                        </div>-->
<!--                                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding">-->
<!--                                            <span><strong><i class="flaticon-annual"></i>Release Year</strong> :</span> --><?php //echo $property[0]->yor; ?>
<!--                                        </div>-->
<!--                                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding">-->
<!--                                            <span><strong><i class="flaticon-location"></i>District </strong> :</span>-->
<!---->
<!--                                            --><?php
//                                            $district = $this->PropertyModel->getDistrictNameById($property[0]->district);
//                                            if(is_array($district) && count($district) != 0){
//                                                ?>
<!--                                                --><?php //echo $district[0]->dname; ?>
<!--                                                --><?php
//                                            }
//                                            ?>
<!--                                        </div>-->
<!--                                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding">-->
<!--                                            <span><strong><i class="flaticon-vehicle-4"></i>Edition</strong> :</span> --><?php //echo ucwords($property[0]->edition); ?>
<!--                                        </div>-->
<!---->
<!--                                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding">-->
<!--                                            <span><strong><i class="flaticon-annual"></i>Year Of Manufacture</strong> :</span> --><?php //echo ($property[0]->yom != 0) ? $property[0]->yom : null; ?>
<!--                                        </div>-->
<!--                                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding">-->
<!--                                            <span><strong><i class="flaticon-cogwheel-outline"></i>Color</strong> :</span> --><?php
//                                            $color = $this->PropertyModel->getColorsById($property[0]->color);
//                                            if(is_array($color) && count($color) != 0){
//                                                ?>
<!--                                                <!--                                                        <a href="javascript:void(0)">-->
<!---->
<!--                                                --><?php
//                                                echo $color[0]->name; ?>
<!--                                                <!--                                                        </a>-->
<!--                                                --><?php
//                                            }
//                                            ?>
<!--                                        </div>-->

                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="content-box-grid" style="min-height: 200px">
                            <!-- Heading Area -->
                            <div class="short-features">
                                <!-- Heading Area -->
                                <div class="heading-panel">
                                    <h3 class="main-title text-left">
                                        Vehicle Features
                                    </h3>
                                </div>
                                <hr>

                                <?php
                                $features = $this->PropertyModel->getPropertyAddFeaturesByPropertyId($property[0]->property_id);
                                foreach ($features as $feature){
                                    $feDetails = $this->PropertyModel->getFeaturesById($feature->feature_id);
                                    ?>
                                    <div class="col-sm-4 col-md-4 col-xs-12 no-padding">

                                        <span>
                                            <i class="fa fa-check-square-o" style="color:#da251d "></i>
                                            <!--                                            <strong>-->
                                            <!--                                                <input type="checkbox" checked="checked" disabled class="checkbox"> &nbsp;&nbsp;-->
                                            <!--                                            </strong> -->
                                        </span> <?php echo $feDetails[0]->name;  ?>
                                    </div>

                                    <?php
                                }
                                ?>

                            </div>
                            <!-- Short Features  -->

                            <!-- Short Features  -->
                            <div class="clearfix"></div>
                        </div>


                        <div class="content-box-grid" style="min-height: 200px">
                            <!-- Heading Area -->
                            <div class="short-features">
                                <!-- Heading Area -->
                                    <div class="heading-panel">
                                        <h3 class="main-title text-left">
                                            Additional Information
                                        </h3>
                                    </div>
                                <hr>
                                <p>
                                    <?php echo $property[0]->pro_desc;?>
                                </p>
                            </div>
                        </div>


                    </div>

                    <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->

                    <!-- =-=-=-=-=-=-= Latest Ads End =-=-=-=-=-=-= -->
                </div>
                <!-- Right Sidebar -->
                <div class="col-md-4 col-xs-12 col-sm-12">
                    <!-- Sidebar Widgets -->
                    <div class="sidebar">
                        <div class="heading-zone">
                            <h1>
                                <?php
                                if(is_array($brand) && count($brand) != 0){
                                    echo $brand[0]->name;
                                }else{
                                    $modelTop = $this->PropertyModel->getTopBrandNameById($property[0]->brand);
                                    echo (is_array($modelTop) && count($modelTop) != 0) ? $modelTop[0]->name : null;
                                }

                                ?>,
                                <?php echo (is_array($model) && count($model) != 0) ? $model[0]->name : null; ?>
                            </h1>
                            <!--                            <div class="short-history">-->
                            <!--                                <ul>-->
                            <!--                                    <li><b>-->
                            <!--                                            --><?php
                            //
                            //                                            $date=date_create($property[0]->posted_date);
                            //                                            echo " Posted : ".date_format($date,"M d, Y");
                            //                                            ?>
                            <!--                                            </b></li>-->
                            <!--                                    <li>Category: <b><a href="#">-->
                            <!--                                                --><?php
                            //                                                echo  (is_array($model) && count($model) != 0) ? $model[0]->name : null;
                            //                                                ?>
                            <!--                                            </a></b></li>-->
                            <!--<!--                                    <li>Views: <b>666</b></li>-->
                            <!--<!--                                    <li><a href="#">Edit</a></li>-->
                            <!--                                </ul>-->
                            <!--                            </div>-->
                        </div>
                        <div class="content-box-grid" style="padding-top: 10px">
                            <div id="sidebar_refid_div">
                            <strong> <span>Ref ID :</span> <?php
                                echo $property[0]->ref_id;
                                ?> </strong> &nbsp;&nbsp;
                                <span><strong>Date Added</strong> :</span> <?php $date=date_create($property[0]->posted_date);
                                echo date_format($date,"M d, Y"); ?> <br>
                                <span style="font-weight: 600; color: #000;">
<i class="fa fa-eye"></i>
     <?php

     $result = $this->PropertyModel->getPostViewCountByPropertyId($property[0]->property_id);
     if(is_array($result) && count($result) != 0){
         echo count($result);
     }

     ?> Views
                                </span>
                                <br>
                                <span style="font-weight: 600; color: #000;">
                                <i class="fa fa-comments"></i>
                                    <?php

                                    $resultLead = $this->PropertyModel->getLeadCountByPropertyId($property[0]->property_id);
                                    if(is_array($resultLead) && count($resultLead) != 0){
                                        echo count($resultLead);
                                    }else{
                                        echo "0";
                                    }

                                    ?> &nbsp; Lead Count
                                </span>


                            </div>

                            <div id="sidebar_feature_div">
                                <?php
                                $bodytype = $this->UserModelAdmin->getCategoryDetailsByCatId($property[0]->body_type);

                                ?>
                                <span><strong><i class="flaticon-car-2"></i>Brand</strong> :</span>
                                <?php
                                if(is_array($brand) && count($brand) != 0){
                                    echo $brand[0]->name;
                                }else{
                                    $modelTop = $this->PropertyModel->getTopBrandNameById($property[0]->brand);
                                    echo (is_array($modelTop) && count($modelTop) != 0) ? $modelTop[0]->name : null;
                                }

                                ?><br>
                                <span><strong><i class="flaticon-engine-2"></i>Model</strong> :</span> <?php echo (is_array($model) && count($model) != 0) ? $model[0]->name : null; ?> <br>
                                <span><strong><i class="flaticon-car-repair"></i> Condition</strong> :</span> <?php echo ucwords(str_replace('_', ' ', $property[0]->condition_type)); ?><br>
                                <span><strong><i class="flaticon-annual"></i>Year Of Manufacture</strong> :</span> <?php echo ($property[0]->yom != 0) ? $property[0]->yom : null; ?><br>
                                <span><strong><i class="flaticon-engine-2"></i>Engine Capacity</strong> :</span> <?php echo $property[0]->engine_size; ?> CC  <br>
                                <span><strong><i class="flaticon-gearshift-1"></i>Transmission</strong> :</span>  <?php echo (is_array($transmission) && count($transmission) != 0) ? $transmission[0]->name : null; ?>  <br>
<!--                                <span><strong><i class="flaticon-car-2"></i>Body Type</strong> :</span> --><?php //echo $bodytype[0]->name; ?><!-- <br>-->

                                <span><strong><i class="flaticon-gas-station-1"></i> Fuel Type</strong> :</span> <?php echo  (is_array($fueltype) && count($fueltype) != 0) ? $fueltype[0]->name : null; ?><br>
                                <span><strong><i class="flaticon-dashboard"></i>Mileage</strong> :</span> <?php echo $property[0]->mileage; ?> Km <br>



                            </div>
                            <div id="sidebar_price_div">
<!--                            <div class="singleprice-tag" style="font-size: 24px">-->

                                <?php
                                if($property[0]->price == 0){
                                    echo "Price not available";
                                }else{
                                    echo $property[0]->price_type . " " . number_format(preg_replace('/[^A-Za-z0-9. -]/', '', $property[0]->price));
                                }
                                ?><br>
                                <p style="font-size: 15px;">
                                    <?php
                                    if($property[0]->price_negotiable == 1){
                                        echo "Negotiable";
                                    }
                                    ?></p>

                            </div>
                        </div>

                        <div class="category-list-icon" style="margin-top:20px">
                        <div class="widget-heading">
                            <h2 class="panel-title" style="color: #333333; font-size: 22px; padding: 10px;font-weight: 700">Contact Information</h2>
                        </div>
                        </div>
                        <div class="category-list-icon">
<!--                            <i class="flaticon-smartphone"></i>-->
                            <i class="fa fa-phone"></i>
                            <div class="category-list-title">
                                <h5>
                                    <!--                                    <a href="javascript:void(0)" class="number" data-last="111111X">0320<span>XXXXXXX</span>-->
                                    <span id="clickToShow">
                                            <a id="tel_no" href="tel:<?php
                                            if(is_array($company) && count($company) != 0){
                                                echo $company[0]->contactno;
                                            }else{
                                                echo $property[0]->contact_mobile ;
                                            }
                                            ?>"><?php
                                                if(is_array($company) && count($company) != 0){
                                                    echo $company[0]->contactno;
                                                }else{
                                                    echo $property[0]->contact_mobile ;
                                                }
                                                ?>
                                            </a>
                                        </span>
                                    <input type="hidden" id="property_id" value="<?php echo $property[0]->property_id; ?>">
                                    <!--                                    </a>-->
                                </h5>
                            </div>
                        </div>

                        <div class="category-list-icon">
                            <i class="fa fa-envelope"></i>
                            <div class="category-list-title">
                                <h5><a href="mailto:<?php

                                    if(is_array($company) && count($company) != 0){
                                        echo $company[0]->email;
                                    }else{
                                        echo $property[0]->contact_email ;
                                    }
                                    ?>">Contact Seller Via Email</a></h5>
<!--                                <p>(--><?php //echo $company[0]->email; ?><!--)</p>-->
                            </div>
                        </div>


                        <!-- User Info -->

<!--                        <div class="category-list-icon" style="margin-top: 5px">-->
<!--                            <div class="widget-heading">-->
<!--                                <h2 class="panel-title" style="color: #333333; font-size: 22px; font-weight: 700; padding: 10px">Seller Information</h2>-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="white-bg user-contact-info">
                            <div class="user-info-card">
                                <div class="user-photo col-md-4 col-sm-3  col-xs-4">
                                    <img class="img-circle" src="<?php echo base_url(); ?>assets/images/users/user.png" alt="">
                                </div>
                                <div class="user-information  col-md-8 col-sm-9 col-xs-8">
                                    <span class="user-name"><a class="hover-color" href="">
                                            <?php
                                            if(is_array($company) && count($company) != 0){
                                                echo $company[0]->name;
                                            }else{
                                                echo $property[0]->contact_email ;
                                            }
                                            ?>
                                        </a></span>
                                    <div class="item-date">
                                        <span class="ad-pub"><?php
                                            if(is_array($company) && count($company) != 0){
                                                echo $company[0]->address;
                                            }else{
                                                echo $property[0]->contact_address ;
                                            }
                                           // echo $company[0]->address; ?></span><br>
<!--                                        <a href="#" class="link">More Ads</a>-->
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
<!--                        <div id="itemMap">-->
<!---->
<!---->
<!--                            <div class="client-logo">-->
<!--                                <a href="#"><img src="--><?php // echo base_url(); ?><!--assets/uploads/footer_banner/4.png" class="img-responsive" alt="Brand Image" /></a>-->
<!--                            </div>-->
<!--                            <div class="client-logo">-->
<!--                                <a href="#"><img src="--><?php // echo base_url(); ?><!--assets/uploads/footer_banner/5.png" class="img-responsive" alt="Brand Image" /></a>-->
<!--                            </div>-->
<!---->
<!--                        </div>-->

                        <!-- Recent Ads -->

                        <!--  Financing calculator  -->

                    </div>
                    <!-- Sidebar Widgets End -->
                </div>
                <!-- Middle Content Area  End -->

            </div>
            <!-- Row End -->
        </div>
        <!-- Main Container End -->
    </section>
    <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
<?php
    }

    ?>


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


                var exist_count = '<?php echo count($resultC); ?>';
                numArrayCompare.push(idArticle);
                //alert("The Vehicle Ad added for Comparison.");
                //console.log("array", numArrayCompare);
                $('#compare_count').text("(" + (parseInt(numArrayCompare.length) + parseInt(exist_count)) + ")");
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

