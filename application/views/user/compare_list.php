<style>
    .page-header-area-2 {
        padding: 0px;
        margin-bottom: 15px;
        background: #eeeeee;
    }

    .header-page h1 {
        color: #232323;
        font-size: 26px;
        font-weight: 600;
        text-transform: capitalize;
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
        /*background: #d9d9d9;*/
        height: 120px;
        margin-bottom: 6px;
    }


    .parent > img {
        display: inline-flex;
        width: 100%;
        height: 120px;
    }

    /*for browsers which support object fit */

    [data-object-fit='contain'] {
        object-fit: contain
    }

    .compare-detial tr td{
        padding-top: 4px;
        padding-right: 5px;
        padding-bottom: 4px;
        padding-left: 5px;
        font-size: 15px;
        vertical-align:top;
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

    #wish_list_btn{
        background: #ed4c06;
        color: #ffffff;
        padding: 6px;
        font-weight: 800;
        font-family: Lato;
        font-size: 16px;
        border:none;
        border-radius: 3px;
        /*color: #ffffff;*/
    }

    #wish_list_btn:hover{
        text-decoration: underline;
        border:none;
        background: rgba(255, 81, 6, 0.82);
    }

    .compare-detial tr td:first-child{
        text-align: left;
        padding-left: 20px;
    }

    .compare-detial .accordion{
        margin-top: 0;
    }

    .compare-detial table tr td h4{
        margin-top: 25px;
    }

    .parent_div{
        background: #d9d9d9;
        height: 300px;
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
</style>
<style>
    #close{
        display:block;
        float:right;
        width:30px;
        height:29px;
        background:url(https://web.archive.org/web/20110126035650/http://digitalsbykobke.com/images/close.png) no-repeat center center;
    }

</style>


<div class="page-header-area-2 gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="small-breadcrumb">
                    <div class="breadcrumb-link">
                        <ul>
                            <li><a href="<?php echo base_url(); ?>">Home Page</a></li>
                            <li><a class="active" href="#">Compare</a></li>
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
    <!-- =-=-=-=-=-=-= Car Comparison =-=-=-=-=-=-= -->
    <section class="section-padding no-top compare-detial gray ">

        <!-- Main Container -->
        <div class="container">
            <div class="header-page" style="padding: 5px">
                <h1>Compare Vehicles</h1>
                <!--                        <div class="socail-icons">-->
                <!--                            <ul>-->
                <!--                                <li><a class="Facebook" href=""><i class="fa fa-facebook"></i></a></li>-->
                <!--                                <li><a class="Twitter" href=""><i class="fa fa-twitter"></i></a></li>-->
                <!--                                <li><a class="Linkedin" href=""><i class="fa fa-linkedin"></i></a></li>-->
                <!--                                <li><a class="Google" href=""><i class="fa fa-google-plus"></i></a></li>-->
                <!--                                <li><a class="Instagram" href=""><i class="fa fa-instagram"></i></a></li>-->
                <!--                                <li><a class="Pinterest" href=""><i class="fa fa-pinterest"></i></a></li>-->
                <!--                                <li><a class="StumbleUpon" href=""><i class="fa fa-stumbleupon"></i></a></li>-->
                <!--                            </ul>-->
                <!--                        </div>-->
                <a style="float: right; margin-bottom: 20px" href="<?php echo base_url(); ?>vehicle/compare_clear/<?php echo $session_id; ?>" class="btn btn-danger">Clear All</a>
            </div>
            <!-- Row -->
            <div class="row">
                <!-- Middle Content Area -->
                <div class="col-md-12 col-xs-12 col-sm-12">

                    <?php if ($this->session->flashdata('message_suc')) { ?>
                        <div class="alert alert-success"> <?= $this->session->flashdata('message_suc') ?> </div>
                    <?php } ?>
                    <table>
                        <tbody>
                        <tr>
                            <td>
<!--                                Selected Property-->
                            </td>
                            <?php
                            $vehicles = $this->PropertyModel->getCompareListDataBySessionID($session_id);

                            for ($i=0; $i < count($vehicles); $i ++){
                                $properties = $this->PropertyModel->getPropertyDetailsByPropertyId($vehicles[$i]->property_id);

                                ?>
                                <td>

                                    <a id="close" href="<?php echo base_url(); ?>/vehicle/delete_item_compare/<?php echo $properties[0]->property_id; ?>/<?php echo $session_id; ?>"></a>
                                    <div class="parent_div">
                                        <div class="parent">
                                            <img src="<?php echo base_url(); ?>assets/uploads/<?php echo $properties[0]->main_image; ?>"
                                                 class="center-block"  alt="" data-object-fit='contain'>
                                        </div>
                                    </div>

                                    <h4>
                                        <?php
                                        $model = $this->PropertyModel->getModelNameById($properties[0]->model);
                                        $topmodel = $this->PropertyModel->getTopBrandNameById($properties[0]->brand);
                                        $brand = $this->PropertyModel->getBrandNameById($properties[0]->brand);
                                        if(is_array($brand) && count($brand) != 0){
                                            echo $brand[0]->name;
                                        }else{
                                            $modelTop = $this->PropertyModel->getTopBrandNameById($properties[0]->brand);
                                            echo (is_array($modelTop) && count($modelTop) != 0) ? $modelTop[0]->name : null;
                                        }

                                        ?>,
                                        <?php echo (is_array($model) && count($model) != 0) ? $model[0]->name : null; ?>
                                    </h4>
                                </td>
                            <?php
                            }
                            ?>

                        </tr>
                        </tbody>
                    </table>
                    <ul class="accordion">
                        <li>
                            <h3 class="accordion-title" style="padding-top: 20px"><a href="#">General </a></h3>
                            <div class="accordion-content" style="display: inherit;">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>
                                            Price (LKR)
                                        </td>
                                        <?php

                                        for ($i=0; $i < count($vehicles); $i ++) {
                                            $properties = $this->PropertyModel->getPropertyDetailsByPropertyId($vehicles[$i]->property_id);

                                            ?>
                                            <td>
                                                <?php echo number_format(preg_replace('/[^A-Za-z0-9. -]/', '', $properties[0]->price)); ?>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td>
                                            Body Type
                                        </td>
                                        <?php
                                        for ($i=0; $i < count($vehicles); $i ++) {
                                        $properties = $this->PropertyModel->getPropertyDetailsByPropertyId($vehicles[$i]->property_id);

                                        ?>
                                        <td>
                                            <?php
                                            $pro_type = $this->UserModelAdmin->getCategoryDetailsByCatId($properties[0]->body_type);

                                            echo (is_array($pro_type) && count($pro_type)) ? $pro_type[0]->name : null; ?>
                                        </td>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td>
                                            Brand
                                        </td>
                                        <?php
                                        for ($i=0; $i < count($vehicles); $i ++) {
                                        $properties = $this->PropertyModel->getPropertyDetailsByPropertyId($vehicles[$i]->property_id);
                                            $brand = $this->PropertyModel->getBrandNameById($properties[0]->brand);
                                        ?>
                                        <td>
                                            <?php
                                            if(is_array($brand) && count($brand) != 0){
                                                echo $brand[0]->name;
                                            }else{
                                                $modelTop = $this->PropertyModel->getTopBrandNameById($properties[0]->brand);
                                                echo (is_array($modelTop) && count($modelTop) != 0) ? $modelTop[0]->name : null;
                                            }

                                            ?>
                                        </td>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td>
                                           Model
                                        </td>
                                        <?php
                                        for ($i=0; $i < count($vehicles); $i ++) {
                                        $properties = $this->PropertyModel->getPropertyDetailsByPropertyId($vehicles[$i]->property_id);
                                            $model = $this->PropertyModel->getModelNameById($properties[0]->model);
                                        ?>
                                        <td>
                                            <?php echo (is_array($model) && count($model) != 0) ? $model[0]->name : null; ?>
                                        </td>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td>
                                            Edition
                                        </td>
                                        <?php
                                        for ($i=0; $i < count($vehicles); $i ++) {
                                            $properties = $this->PropertyModel->getPropertyDetailsByPropertyId($vehicles[$i]->property_id);

                                            ?>
                                            <td>
                                                <?php
                                                echo $properties[0]->edition; ?>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td>
                                            YOM
                                        </td>
                                        <?php
                                        for ($i=0; $i < count($vehicles); $i ++) {
                                            $properties = $this->PropertyModel->getPropertyDetailsByPropertyId($vehicles[$i]->property_id);

                                            ?>
                                            <td>
                                                <?php
                                                echo  $properties[0]->yom; ?>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td>
                                            YOR
                                        </td>
                                        <?php
                                        for ($i=0; $i < count($vehicles); $i ++) {
                                            $properties = $this->PropertyModel->getPropertyDetailsByPropertyId($vehicles[$i]->property_id);

                                            ?>
                                            <td>
                                                <?php
                                                echo  $properties[0]->yor; ?>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td>
                                            Condition
                                        </td>
                                        <?php
                                        for ($i=0; $i < count($vehicles); $i ++) {
                                            $properties = $this->PropertyModel->getPropertyDetailsByPropertyId($vehicles[$i]->property_id);

                                            ?>
                                            <td>
                                                <?php
                                                echo strtoupper(str_replace('_', ' ', $properties[0]->condition_type)); ?>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td>
                                            Engine Capacity (CC)
                                        </td>
                                        <?php
                                        for ($i=0; $i < count($vehicles); $i ++) {
                                            $properties = $this->PropertyModel->getPropertyDetailsByPropertyId($vehicles[$i]->property_id);

                                            ?>
                                            <td>
                                                <?php
                                                echo $properties[0]->engine_size;  ?>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td>
                                            Transmission
                                        </td>
                                        <?php
                                        for ($i=0; $i < count($vehicles); $i ++) {
                                            $properties = $this->PropertyModel->getPropertyDetailsByPropertyId($vehicles[$i]->property_id);
                                            $transmission = $this->PropertyModel->getTransmissionNameById($properties[0]->transmission);
                                            ?>
                                            <td>
                                                <?php
                                                echo $transmission[0]->name; ?>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td>
                                            Fuel Type
                                        </td>
                                        <?php
                                        for ($i=0; $i < count($vehicles); $i ++) {
                                            $properties = $this->PropertyModel->getPropertyDetailsByPropertyId($vehicles[$i]->property_id);

                                            ?>
                                            <td>
                                                <?php
                                                $fueltype = $this->PropertyModel->getFuelTypesNameById($properties[0]->fuel_type);
                                                echo $fueltype[0]->name;
                                                ?>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                    </tr>




                                    </tbody>
                                </table>
                            </div>
                        </li>
                        <li>
                            <h3 class="accordion-title"><a href="#">Features </a></h3>
                            <div class="accordion-content" style="display: inherit">
                                <table>
                                    <tbody>

                                        <?php

                                        $features = $this->PropertyModel->getFeaturesByPropertyTypeId(1);


                                        foreach ($features as $feature) {

                                            ?>

                                        <tr>
                                            <td>
                                                <?php
                                                echo $feature->name; ?>
                                            </td>
                                            <?php
                                            for ($i=0; $i < count($vehicles); $i ++) {
                                                ?>
                                                <td>
                                                    <?php
//                                                    echo $vehicles[$i]->property_id;
                                                    $propertyF  = $this->PropertyModel->getFeaturesByPropertyPropertyAndFeatureId($vehicles[$i]->property_id, $feature->id);
                                                    if(count($propertyF) > 0){
                                                        ?>

                                                        <i class="fa fa-check"></i>
                                                    <?php
                                                    }else{
                                                        ?>
                                                    <i class="fa fa-times">
                                                        <?php

                                                    }
                                                    ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                            <?php

                                        }
                                        ?>

<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            24 hour security-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            4-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            4-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            3 Phase electricity-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            <i class="fa fa-times"></i>-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            <i class="fa fa-check"></i>-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            AC rooms-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            <i class="fa fa-times"></i>-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            <i class="fa fa-times"></i>-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Backup Power Generator-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            67bhp@5500rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            84bhp@5500rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Balcony-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Beachfront / Ocean Facing-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Big Hall-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Brand New-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Cable/Sat TV-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Colonial Architecture-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Elevator-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            En suite Rooms-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Fully Furnished-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Garage-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!---->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Home security system-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!---->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Hot Water-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!---->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Infinity Pool-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!---->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Jogging Track-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!---->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Landline Telephone-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!---->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Luxury Specifications-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!---->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Main line water-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!---->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Overhead water tank-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!---->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Private Garden-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!---->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Servant's room-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!---->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Servant's toilet-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!---->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Solar Powered-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!---->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Swimming Pool-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!---->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Tennis Courts-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!---->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Theatre-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Waterfront / Riverside-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Wi-Fi-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->


                                    </tbody>
                                </table>
                            </div>
                        </li>


                    </ul>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Main Container End -->
    </section>
    <!-- =-=-=-=-=-=-= Comparison End =-=-=-=-=-=-= -->