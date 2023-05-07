
<style>
    .section-padding{
        padding-bottom: 40px;
    }

    .page-header-area-2 {
        padding: 0px;
        margin-bottom: 15px;
    }

    .parent_div{
        background: #d9d9d9;
        height: 250px;
    }


    .parent > img {
        display: inline-flex;
        width: 100%;
        height: 250px;
    }

    /*for browsers which support object fit */

    [data-object-fit='contain'] {
        object-fit: contain
    }

    .ad-listing .content-area .ad-details ul li i{
        color: #ec971f;
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
                            <li><a href="<?php echo base_url(); ?>">Home Page</a></li>
                            <li><a class="active" href="#">Favourite</a></li>
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
    <section class="custom-padding no-top gray">
        <!-- Main Container -->
        <div class="container">
            <div class="row"> <h3 style="font-weight: 800; color: #000; padding-top: 10px; padding-bottom: 10px; padding-left: 20px">Your Wish List</h3>
                <?php if ($this->session->flashdata('message_suc')) { ?>
                    <div class="alert alert-success"> <?= $this->session->flashdata('message_suc') ?> </div>
                <?php } ?>
                <?php if ($this->session->flashdata('message_suc_property')) { ?>
                    <div class="alert alert-success"> <?= $this->session->flashdata('message_suc_property') ?> </div>
                <?php } ?>
                <?php if ($this->session->flashdata('message_delete_property')) { ?>
                    <div class="alert alert-danger"> <?= $this->session->flashdata('message_delete_property') ?> </div>
                <?php } ?>
                <!-- Middle Content Area -->
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <?php include 'dashboard_menu.php'; ?>
                </div>
                <!-- Middle Content Area  End -->
            </div>
            <!-- Row End -->

            <div class="row margin-top-40">




                <!-- Middle Content Area -->
                <div class="col-md-12 col-lg-12 col-sx-12">
                    <!-- Row -->
                    <ul class="list-unstyled">
                        <!-- Listing Grid -->
                        <?php
                        $wishList = $this->PropertyModel->getWishListDataByUserID($user_id);



                        for ($i=0; $i < count($wishList); $i ++){
                            $properties = $this->PropertyModel->getPropertyDetailsByPropertyId($wishList[$i]->property_id);

                            foreach($properties as $property){
                                ?>
                                <li>
                                    <div class="well ad-listing clearfix">
                                        <div class="col-md-3 col-sm-5 col-xs-12 grid-style no-padding">
                                            <!-- Image Box -->
                                            <div class="img-box">
                                                <?php
                                                $transmission = $this->PropertyModel->getTransmissionNameById($property->transmission);
                                                $bodytype = $this->UserModelAdmin->getCategoryDetailsByCatId($property->body_type);

                                                $model = $this->PropertyModel->getModelNameById($property->model);
                                                $brand = $this->PropertyModel->getBrandNameById($property->brand);
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
                                    <div class="parent_div">
                                        <div class="parent">
                                        <img src="<?php echo base_url(); ?>assets/uploads/<?php echo $result_images[0]->image_name; ?>"
                                             class="img-responsive" alt="" data-object-fit='contain'>
                                        </div>
                                    </div>
                                                    <?php
                                                }else{
                                    ?>
                                    <div class="parent_div">
                                        <div class="parent">
                                            <img src="<?php echo base_url(); ?>assets/images/no_image.png"
                                                 class="img-responsive" alt="" data-object-fit='contain'>
                                        </div>
                                    </div>
                                    <?php
                                }
                                                ?>
                                                <!--                                        <div class="total-images"><strong>8</strong> photos </div>-->
<!--                                                <div class="quick-view"><a href="#ad-preview" data-toggle="modal"-->
<!--                                                                           class="view-button"><i class="fa fa-search"></i></a>-->
<!--                                                </div>-->
                                            </div>
                                            <!-- Ad Status -->
                                            <!--                                    <span class="ad-status"> Featured </span>-->


                                        </div>
                                        <div class="col-md-9 col-sm-7 col-xs-12">
                                            <!-- Ad Content-->
                                            <div class="row">
                                                <div class="content-area">
                                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                                        <!-- Ad Title -->
                                                        <h3><a href="<?php echo base_url(); ?>vehicle/view/<?php echo $property->property_id; ?>">
                                                                <?php
                                                                if(is_array($brand) && count($brand) != 0){
                                                                    echo $brand[0]->name;
                                                                }else{
                                                                    $modelTop = $this->PropertyModel->getTopBrandNameById($property->brand);
                                                                    echo (is_array($modelTop) && count($modelTop) != 0) ? $modelTop[0]->name : null;
                                                                }

                                                                ?>,
                                                                <?php echo (is_array($model) && count($model) != 0) ? $model[0]->name : null; ?>
                                                            </a></h3>
                                                        <!-- Ad Meta Info -->
                                                        <ul class="ad-meta-info">
                                                            <li><i class="fa fa-map-marker"></i><a href="#">
                                                                    <?php
                                                                    $district = $this->PropertyModel->getDistrictNameById($property->district);
                                                                    if (is_array($district) && count($district) != 0) {
                                                                        echo $district[0]->dname;
                                                                    }
                                                                    ?>
                                                                </a></li>
                                                            <li><i class="fa fa-eye"></i>
                                                                <?php

                                                                $result = $this->PropertyModel->getPostViewCountByPropertyId($property->property_id);
                                                                if(is_array($result) && count($result) != 0){
                                                                    echo count($result);
                                                                }

                                                                ?> Views</li>
                                                        </ul>
                                                        <!-- Ad Description-->
                                                        <div class="ad-details">
                                                            <p>
                                                                <?php $text = $property->pro_desc;
                                                                $limit = 20;
                                                                if (str_word_count($text, 0) > $limit) {
                                                                    $words = str_word_count($text, 2);
                                                                    $pos = array_keys($words);
                                                                    echo $text = substr($text, 0, $pos[$limit]) . '...';
                                                                }else{
                                                                    echo $property->pro_desc;
                                                                }
                                                                ?>

                                                            </p>
                                                            <ul class="list-unstyled">
                                                                <li><i class="flaticon-gas-station-1"></i>
                                                                    <?php
                                                                    $fueltype = $this->PropertyModel->getFuelTypesNameById($property->fuel_type);
                                                                    echo $fueltype[0]->name;
                                                                    ?></li>
                                                                <li>
                                                                    <i class="flaticon-dashboard"></i><?php echo $property->mileage . " km"; ?>
                                                                </li>
                                                                <li>
                                                                    <i class="flaticon-engine-2"></i><?php echo $property->engine_size . " cc"; ?>
                                                                </li>
                                                                <li>
                                                                    <i class="flaticon-key"></i><?php echo (is_array($transmission) && count($transmission) != 0) ? $transmission[0]->name : null; ?>
                                                                </li>
                                                                <li>
                                                                    <i class="flaticon-calendar-2"></i>Year <?php echo $property->yor; ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-xs-12 col-sm-12">
                                                        <!-- Ad Stats -->
                                                        <div class="short-info">
                                                            <div class="ad-stats hidden-xs">
                                                                <span>Condition  : </span><?php echo ucwords($property->condition_type); ?>
                                                            </div>
                                                            <div class="ad-stats hidden-xs">
                                                                <span>Type : </span><?php echo (is_array($bodytype) && count($bodytype) != 0) ? $bodytype[0]->name : null; ?>
                                                            </div>
                                                            <div class="ad-stats hidden-xs"><span>Make : </span><?php
                                                                echo (is_array($model) && count($model) != 0) ? $model[0]->name : null;
                                                                ?></div>
                                                        </div>
                                                        <!-- Price -->
                                                        <div class="price"> <span>
                                                         <?php
                                                         if ($property->price == "") {
                                                             echo "Price on Available";
                                                         } else {
                                                             echo $property->price_type . " " . number_format(preg_replace("/[^0-9.]/", "", $property->price));
                                                         }
                                                         ?>
                                                    </span></div>
                                                        <!-- Ad View Button -->
<!--                                                        <button class="btn btn-block btn-warning"><i class="fa fa-times"-->
<!--                                                                                                     aria-hidden="true"></i>-->
<!--                                                            Edit-->
<!--                                                        </button>-->
                                                        <a class="btn btn-block btn-danger" href="<?php echo base_url(); ?>user/delete_wishlist/<?php echo $wishList[$i]->id; ?>/<?php echo $wishList[$i]->user_id; ?>"><i class="fa fa-times"
                                                                                                    aria-hidden="true"></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Ad Content End -->
                                        </div>
                                    </div>
                                </li>
                                <?php
                            }
                            ?>

                            <!-- Listing Grid -->
                            <?php
                        }
                        ?>
                    </ul>
                    <!-- Advertizing -->
<!--                    <section class="advertising">-->
<!--                        <a href="post-ad-1.html">-->
<!--                            <div class="banner">-->
<!--                                <div class="wrapper">-->
<!--                                    <span class="title">Do you want your property to be listed here?</span>-->
<!--                                    <span class="submit">Submit it now! <i class="fa fa-plus-square"></i></span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <!-- /.banner-->
<!--                        </a>-->
<!--                    </section>-->
                    <!-- Advertizing End -->
                    <!-- Ads Archive End -->
                    <div class="clearfix"></div>
                    <!-- Pagination -->
<!--                    <div class="col-md-12 col-xs-12 col-sm-12">-->
<!--                        <ul class="pagination pagination-lg">-->
<!--                            <li> <a href="#"> <i class="fa fa-chevron-left" aria-hidden="true"></i></a></li>-->
<!--                            <li> <a href="#">1</a> </li>-->
<!--                            <li class="active"> <a href="#">2</a> </li>-->
<!--                            <li> <a href="#">3</a> </li>-->
<!--                            <li> <a href="#">4</a> </li>-->
<!--                            <li><a href="#"> <i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
                    <!-- Pagination End -->
                </div>
                <!-- Middle Content Area  End -->
            </div>
        </div>
        <!-- Main Container End -->
    </section>
    <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->