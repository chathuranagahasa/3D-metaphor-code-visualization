<style>
    .section-padding{
        padding-bottom: 40px;
    }

    .page-header-area-2 {
        padding: 0px;
        margin-bottom: 15px;
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
                            <li><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li><a class="active" href="#">Post Ads</a>
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
            <!-- Row -->
            <div class="row"> <h3 style="font-weight: 800; color: #000; padding-top: 10px; padding-bottom: 10px; padding-left: 20px">User Dashboard</h3>
                <?php if ($this->session->flashdata('message_suc')) { ?>
                    <div class="alert alert-success"> <?= $this->session->flashdata('message_suc') ?> </div>
                <?php } elseif ($this->session->flashdata('message_danger')) { ?>
                    <div class="alert alert-danger"> <?= $this->session->flashdata('message_danger') ?> </div>
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
                        foreach ($properties as $property) {
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
                                            }else if(is_array($result_images) && count($result_images) != 0) {


                                                    ?>
                                                    <div class="parent_div">
                                                        <div class="parent">
                                                            <img src="<?php echo base_url(); ?>assets/uploads/<?php echo $result_images[0]->image_name; ?>"
                                                                 class="img-responsive" alt=""
                                                                 data-object-fit='contain'>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <div class="parent_div">
                                                        <div class="parent">
                                                            <img alt="Carspot"
                                                                 src="<?php echo base_url(); ?>assets/admin/img/placeholder.png"
                                                                 class="img-responsive">
                                                        </div>
                                                    </div>
                                                    <?php
                                                }

                                                ?>

                                            <!--                                        <div class="total-images"><strong>8</strong> photos </div>-->
                                            <div class="quick-view"><a href="#ad-preview" data-toggle="modal"
                                                                       class="view-button"><i class="fa fa-search"></i></a>
                                            </div>
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
                                                    <?php
                                                    $payD = $this->PropertyModel->getPaymentDetailsByAdId($property->property_id);
                                                    //if($property->expire_date != "" && $property->renew == ""){
                                                    if($property->expire_date != "" && ($property->expire_date < date('Y-m-d'))){
                                                        ?>
                                                        <b style="color: #ea2c19;">
                                                            <?php
                                                            echo "Ad Expired, Click renew button.";
                                                            // }
                                                            ?>
                                                        </b>
                                                        <?php
                                                    }else if($property->renew_pay_app_status == 1){
                                                    ?>
                                                    <b style="color: #38b04c;">
                                                        <?php
                                                        echo "Approval is processing.";
                                                        }


                                                        ?>
                                                    </b>
                                                    <h3>
                                                        <?php
                                                        if($property->sold == 0 && $property->approve_status == 1) {
                                                            //var_dump("XX");
                                                            ?>
                                                            <a href="<?php echo base_url(); ?>vehicle/view/<?php echo $property->property_id; ?>">
                                                                <?php
                                                                if (is_array($brand) && count($brand) != 0) {
                                                                    echo $brand[0]->name;
                                                                } else {
                                                                    $modelTop = $this->PropertyModel->getTopBrandNameById($property->brand);
                                                                    echo (is_array($modelTop) && count($modelTop) != 0) ? $modelTop[0]->name : null;
                                                                }

                                                                ?>,
                                                                <?php echo (is_array($model) && count($model) != 0) ? $model[0]->name : null; ?>
                                                            </a>
                                                            <?php
                                                        }else if($property->sold == 1 &&  $property->approve_status == 1){
                                                            //var_dump($property->approve_status);
                                                            ?>
                                                            <a href="#">
                                                                <?php
                                                                if(is_array($brand) && count($brand) != 0){
                                                                    echo $brand[0]->name;
                                                                }else{
                                                                    $modelTop = $this->PropertyModel->getTopBrandNameById($property->brand);
                                                                    echo (is_array($modelTop) && count($modelTop) != 0) ? $modelTop[0]->name : null;
                                                                }

                                                                ?>,
                                                                <?php echo (is_array($model) && count($model) != 0) ? $model[0]->name : null; ?>
                                                            </a>
                                                            <?php
                                                        }else{
                                                            ?>

                                                                <?php
                                                                if(is_array($brand) && count($brand) != 0){
                                                                    echo $brand[0]->name;
                                                                }else{
                                                                    $modelTop = $this->PropertyModel->getTopBrandNameById($property->brand);
                                                                    echo (is_array($modelTop) && count($modelTop) != 0) ? $modelTop[0]->name : null;
                                                                }

                                                                ?>,
                                                                <?php echo (is_array($model) && count($model) != 0) ? $model[0]->name : null; ?>

                                                        <?php
                                                        }
                                                        ?>
                                                        </h3>
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
                                                        <li>
                                                            <i class="fa fa-eye"></i>
                                                            <?php

                                                            $result = $this->PropertyModel->getPostViewCountByPropertyId($property->property_id);
                                                            if(is_array($result) && count($result) != 0){
                                                                echo count($result);
                                                            }

                                                            ?> Views
                                                        </li>
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
                                                        <ul class="list-unst4yled">
                                                            <li><b style="color: #666;">Posted Date : </b><?php
                                                                $payD = $this->PropertyModel->getPaymentDetailsByAdId($property->property_id);
                                                               // $adD =  $this->PropertyModel->getPaymentDetailsByAdIdExpireDate($property->property_id);
                                                                if(is_array($payD) && count($payD) != 0) {
                                                                    $date = date_create($payD[0]->payment_date);
                                                                    echo date_format($date, "Y-m-d");
                                                                }

                                                                ?></li>
                                                            <li><b style="color: #666;">Expire Date : </b>
                                                                <?php

                                                                //var_dump($property);


                                                                if(is_array($payD) && count($payD) != 0){
                                                                    $duration = $this->PropertyModel->getDurationDetailsById($payD[0]->duration);
                                                                    if(is_array($duration) && count($duration) != 0){



                                                                        $expires = strtotime($payD[0]->approved_date." + " . $duration[0]->name);
                                                                        $exp_date = date('Y-m-d', $expires);

                                                                        //echo date("M d, Y", $expires);
                                                                    }


                                                                }

                                                                //var_dump($property);
                                                                if(($property->expire_date > date('Y-m-d')) && $property->approve_status == 1 && $payD[0]->renew < date('Y-m-d')) {
                                                                    echo $property->expire_date . "<br>";
                                                                }else{
                                                                    ?>
                                                                    <span style="color: #ea2c19;">
                                                                         <?php echo $property->expire_date; ?>
                                                                    </span>

                                                                    <?php
                                                                }
                                                                ?>
                                                            </li>
                                                        </ul>

                                                        <ul class="list-unst4yled">
                                                            <li><?php
                                                                if($property->sold == 1){
                                                                    ?>
                                                                    <a href="#" class="btn btn-flat btn-default btn-danger">Sold</a>
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                    <a href="<?php echo base_url(); ?>user/make_as_sold/<?php echo $property->property_id; ?>/<?php echo $property->user_id;  ?>" class="btn btn-flat btn-default btn-success">Make as Sold</a>
                                                                    <?php
                                                                }
                                                                ?>

                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-xs-12 col-sm-12">
                                                    <!-- Ad Stats -->
                                                    <div class="short-info">
                                                        <div class="ad-stats hidden-xs">
                                                            <span style="color: #000; font-size: 14px; font-weight: 700; background-color: #DDDDDD; padding: 6px; margin-bottom: 10px">
                                                                Approve Status : <?php
                                                                if($property->approve_status == 1){
                                                                    echo "Success";
                                                                }else{
                                                                    echo "Pending";
                                                                }
                                                                ?>
                                                            </span>
                                                            <br>
                                                            <span>Condition  : </span><?php echo ucwords($property->condition_type); ?>
                                                        </div>
<!--                                                        <div class="ad-stats hidden-xs">-->
<!--                                                            <span>Type : </span>--><?php //echo (is_array($bodytype) && count($bodytype) != 0) ? $bodytype[0]->name : null; ?>
<!--                                                        </div>-->
                                                        <div class="ad-stats hidden-xs"><span>Brand : </span><?php
                                                            if(is_array($brand) && count($brand) != 0){
                                                                echo $brand[0]->name;
                                                            }else{
                                                                $modelTop = $this->PropertyModel->getTopBrandNameById($property->brand);
                                                                echo (is_array($modelTop) && count($modelTop) != 0) ? $modelTop[0]->name : null;
                                                            }
                                                            ?></div>
                                                        <div class="ad-stats hidden-xs">
                                                            <span>Model : </span> <?php echo (is_array($model) && count($model) != 0) ? $model[0]->name : null; ?>
                                                        </div>
                                                    </div>
                                                    <!-- Price -->
                                                    <div class="price"> <span>
                                                         <?php
                                                         if ($property->price == 0) {
                                                             echo "Price not Available";
                                                         } else {
                                                             echo $property->price_type . " " . number_format(preg_replace('/[^A-Za-z0-9. -]/', '', $property->price),2);
                                                         }
                                                         ?>
                                                    </span></div>
                                                    <!-- Ad View Button -->
                                                    <?php

                                                    if(is_array($payD) && count($payD) != 0) {
                                                        if ($property->expire_date != "") {
                                                            if (($property->expire_date < date('Y-m-d')) && $property->renew_pay_app_status != 1) {
                                                                ?>
                                                                <a href="<?php echo base_url(); ?>vehicle/payment_renew/<?php echo $property->user_id; ?>/<?php echo $property->property_id; ?>"
                                                                   class="btn btn-block btn-primary"><i
                                                                            class="fa fa-refresh"
                                                                            aria-hidden="true"></i>
                                                                    Renew
                                                                </a>
                                                                <?php
                                                            }
                                                        }
                                                    }

                                                    ?>

                                                    <?php

                                                    if($property->pay_slip == ""){
                                                        if($property->description == "bank_transfer"){
                                                            ?>
                                                            <div  style="background: #eeeeee; border-radius: 5px; padding: 10px; margin-bottom: 10px; margin-top: 10px" id="bank_slip_div">
                                                                <form id="upload_banksip" enctype="multipart/form-data" method="post" action="<?php echo base_url() ?>vehicle/submit_bankslip/<?php echo $property->user_id; ?>">
                                                                    <div class="input-type" style="padding-bottom: 10px">
                                                                        <label>Upload Bank Slip</label>
                                                                        <input type="file" class="bank_slip" id="bank_slip" name="bank_slip">
                                                                        <input type="hidden" name="pro_id" value="<?php echo $property->property_id;?>">
                                                                    </div>

                                                                    <button type="submit"
                                                                            class="btn btn-block btn-danger">Upload Bankslip</button>

                                                                </form>

                                                            </div>




                                                            <?php

                                                        }
                                                    }


                                                    ?>
<!--                                                    <button class="btn btn-block btn-warning"><i class="fa fa-times"-->
<!--                                                                                                 aria-hidden="true"></i>-->
<!--                                                        Edit-->
<!--                                                    </button>-->
<!--                                                    <button class="btn btn-block btn-danger"><i class="fa fa-times"-->
<!--                                                                                                aria-hidden="true"></i>-->
<!--                                                        Delete-->
<!--                                                    </button>-->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Ad Content End -->
                                    </div>
                                </div>
                            </li>
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