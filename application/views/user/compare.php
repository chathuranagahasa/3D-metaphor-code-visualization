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
                <a style="float: right" href="<?php echo base_url(); ?>Vehicle/compare_clear" class="btn btn-danger">Clear All</a>
            </div>
            <!-- Row -->
            <div class="row">
                <!-- Middle Content Area -->
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <?php
                    $vehicles_old  = $this->session->userdata('compare_items');
                    //var_dump($vehicles_old);


                    //var_dump($vehicles_old);
                    $vehicles = array();
                    for ($y=0; $y < 4; $y++){
                        if(isset($vehicles_old[$y])) {
                            array_push($vehicles, $vehicles_old[$y]);
                        }
                    }
                    //array_shift($arrayNew);
                    //var_dump($vehicles);

                    //var_dump(count($arrayNew));
//                    for ($o=1; $o < count($arrayNew); $o++){
//                       echo $arrayNew[$o][0];
//                    }
                    //var_dump($vehicles);

                    if(count($vehicles) != 0)
                    if(is_array($vehicles) && count($vehicles[0]) != null){

                       // $vehicles = $arrayNew;
                        //var_dump($vehicles);

                        ?>

                    <ul class="accordion">
                        <li>
                            <div class="accordion-content">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>

                                        </td>
                                        <?php
                                        for ($i=0; $i < count($vehicles); $i ++){


                                           //var_dump($vehicles[$i][0]);


                                            $property = $this->PropertyModel->getPropertyDetailsByPropertyId($vehicles[$i][0]);
//                                            var_dump($property[0]->model);
//
//
                                            $model = $this->PropertyModel->getModelNameById($property[0]->model);
                                            $topmodel = $this->PropertyModel->getTopBrandNameById($property[0]->brand);
                                            $brand = $this->PropertyModel->getBrandNameById($property[0]->brand);
                                            $company = $this->PropertyModel->getCompanyDetailsById($property[0]->car_sale_id);

                                            ?>
                                            <td>
                                                <a id="close" href="<?php echo base_url(); ?>/vehicle/delete_item_compare/<?php echo $property[0]->property_id; ?>"></a>
                                                <?php
                                                $result_images = $this->PropertyModel->getPropertyImagesByPropertyId($property[0]->property_id);
                                                if($property[0]->main_image != "") {
                                                    ?>
                                                    <div class="parent_div">
                                                        <div class="parent">
                                                            <img alt="Carspot" data-object-fit='contain'
                                                                 src="<?php echo base_url(); ?>assets/uploads/<?php echo $property[0]->main_image; ?>"
                                                                 class="center-block">
                                                        </div>
                                                    </div>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <div class="parent_div">
                                                        <div class="parent">
                                                            <img alt="Carspot" data-object-fit='contain'
                                                                 src="<?php echo base_url(); ?>assets/uploads/<?php echo (is_array($result_images) && count($result_images) != 0) ? $result_images[0]->image_name : null; ?>"
                                                                 class="center-block">
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                <h4>
                                                    <?php
                                                    if(is_array($brand) && count($brand) != 0){
                                                        echo $brand[0]->name;
                                                    }else{
                                                        $modelTop = $this->PropertyModel->getTopBrandNameById($property[0]->brand);
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
                                    <tr>
                                        <td>
                                            Price
                                        </td>
                                            <?php
                                            for ($i=0; $i < count($vehicles); $i ++) {
                                                $property = $this->PropertyModel->getPropertyDetailsByPropertyId($vehicles[$i][0]);
                                                ?>
                                                <td>
                                                    <?php
                                                    if($property[0]->price == 0) {
                                                        echo "Price not Available";
                                                    }else{
                                                        echo $property[0]->price_type . " " .$property[0]->price;
                                                    }
                                                    ?>
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
                                            $property = $this->PropertyModel->getPropertyDetailsByPropertyId($vehicles[$i][0]);
                                            ?>
                                            <td>
                                                <?php
                                                $bodytype = $this->UserModelAdmin->getCategoryDetailsByCatId($property[0]->body_type);
                                                echo $bodytype[0]->name;
                                                ?>
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
                                            $property = $this->PropertyModel->getPropertyDetailsByPropertyId($vehicles[$i][0]);
                                            $brand = $this->PropertyModel->getBrandNameById($property[0]->brand);
                                            ?>
                                            <td>
                                                <?php
                                                if(is_array($brand) && count($brand) != 0){
                                                    echo $brand[0]->name;
                                                }else{
                                                    $modelTop = $this->PropertyModel->getTopBrandNameById($property[0]->brand);
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
                                            $property = $this->PropertyModel->getPropertyDetailsByPropertyId($vehicles[$i][0]);
                                            $model = $this->PropertyModel->getModelNameById($property[0]->model);
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
                                            $property = $this->PropertyModel->getPropertyDetailsByPropertyId($vehicles[$i][0]);?>
                                            <td>
                                                <?php
                                                echo $property[0]->edition;
                                                ?>
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
                                            $property = $this->PropertyModel->getPropertyDetailsByPropertyId($vehicles[$i][0]);?>
                                            <td>
                                                <?php
                                                echo $property[0]->yom;
                                                ?>
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
                                            $property = $this->PropertyModel->getPropertyDetailsByPropertyId($vehicles[$i][0]);?>
                                            <td>
                                                <?php
                                                echo $property[0]->yor;
                                                ?>
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
                                            $property = $this->PropertyModel->getPropertyDetailsByPropertyId($vehicles[$i][0]);?>
                                            <td>
                                                <?php
                                                echo strtoupper(str_replace('_', ' ', $property[0]->condition_type));
                                                ?>
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
                                            $property = $this->PropertyModel->getPropertyDetailsByPropertyId($vehicles[$i][0]);?>
                                            <td>
                                                <?php
                                                echo $property[0]->engine_size;
                                                ?>
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
                                            $property = $this->PropertyModel->getPropertyDetailsByPropertyId($vehicles[$i][0]);
                                            $transmission = $this->PropertyModel->getTransmissionNameById($property[0]->transmission);?>
                                            <td>
                                                <?php
                                                echo $transmission[0]->name;
                                                ?>
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
                                            $property = $this->PropertyModel->getPropertyDetailsByPropertyId($vehicles[$i][0]);?>
                                            <td>
                                                <?php
                                                $fueltype = $this->PropertyModel->getFuelTypesNameById($property[0]->fuel_type);
                                                echo $fueltype[0]->name;
                                                ?>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                    </tr>
<!---->
                                    <?php
                                    $featuresList = $this->PropertyModel->getProFeaturesList();
                                    for ($j=0; $j < count($featuresList); $j ++) {
                                        ?>
                                    <tr>
                                        <td style="text-align: left; padding-left: 20px">
                                            <?php
                                            echo $featuresList[$j]->name;
                                            ?>
                                        </td>
                                        <?php
                                        $features1=null;
                                        $features2=null;
                                        $features3=null;
                                        $features4=null;
                                        if(is_array($vehicles) && count($vehicles) >= 1) {
                                            $features1 = $this->PropertyModel->getFeaturesByPropertyIdFeatureId($vehicles[0][0], $featuresList[$j]->id);
                                        }
                                        if(is_array($vehicles) && count($vehicles) >= 2) {
                                            $features2 = $this->PropertyModel->getFeaturesByPropertyIdFeatureId($vehicles[1][0], $featuresList[$j]->id);
                                        }
                                        if(is_array($vehicles) && count($vehicles) >= 3){
                                            $features3 = $this->PropertyModel->getFeaturesByPropertyIdFeatureId($vehicles[2][0], $featuresList[$j]->id);
                                        }

                                        if(is_array($vehicles) && count($vehicles) == 4){
                                            $features4 = $this->PropertyModel->getFeaturesByPropertyIdFeatureId($vehicles[3][0], $featuresList[$j]->id);
                                        }

//                                        var_dump($featuresList[$j]->id);
//                                        var_dump("<br>");
//                                        var_dump($vehicles[0]);
//                                        var_dump("<br>");
//                                        var_dump($features[0]->id);
                                        ?>
                                        <?php
                                        if(is_array($vehicles) && count($vehicles) >= 1) {

                                            ?>
                                            <td>
                                                <?php
                                                    if (is_array($features1) && count($features1) != 0) {

                                                        ?>
                                                        <span>
                                                    <i class="fa fa-check-square-o" style="color:#da251d "></i>
                                                </span>
                                                        <?php
                                                    }
                                                ?>
                                            </td>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if(is_array($vehicles) && count($vehicles) >= 2) {
                                            ?>
                                        <td>
                                            <?php
                                                if (is_array($features2) && count($features2) != 0) {
                                                    ?>
                                                    <span>
                                                    <i class="fa fa-check-square-o" style="color:#da251d "></i>
                                                </span>
                                                    <?php
                                                }
                                           ?>
                                        </td>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if(is_array($vehicles) && count($vehicles) >= 3) {
                                        ?>
                                        <td>
                                            <?php
                                                if (is_array($features3) && count($features3) != 0) {
                                                    ?>
                                                    <span>
                                                    <i class="fa fa-check-square-o" style="color:#da251d "></i>
                                                </span>
                                                    <?php
                                                }
                                            ?>
                                        </td>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if(is_array($vehicles) && count($vehicles) == 4) {
                                            ?>
                                        <td>
                                            <?php
                                            if(is_array($vehicles) && count($vehicles) == 4) {
                                                if (is_array($features4) && count($features4) != 0) {
                                                    ?>
                                                    <span>
                                                    <i class="fa fa-check-square-o" style="color:#da251d "></i>
                                                </span>
                                                    <?php
                                                }
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
                                    </tbody>
                                </table>
                            </div>
                        </li>
                        <?php
                        }
                        ?>
<!--                        <li>-->
<!--                            <h3 class="accordion-title"><a href="#">Engine </a></h3>-->
<!--                            <div class="accordion-content">-->
<!--                                <table>-->
<!--                                    <tbody>-->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Engine Type-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            Petrol Engine-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            Revotron Engine-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            No Of Cylinders-->
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
<!--                                            Turbo Charger-->
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
<!--                                            Super Charger-->
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
<!--                                            Maximum Power-->
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
<!--                                            Maximum Torque-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            91Nm@4250rpm-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            120Nm@4250rpm-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!---->
<!--                                    </tbody>-->
<!--                                </table>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <h3 class="accordion-title"><a href="#">Comfort & Convenience </a></h3>-->
<!--                            <div class="accordion-content">-->
<!--                                <table>-->
<!--                                    <tbody>-->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Air Conditioner-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            <i class="fa fa-check"></i>-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            <i class="fa fa-check"></i>-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            CD Player-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            <i class="fa fa-check"></i>-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            <i class="fa fa-times"></i>-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            AntiLock Braking System-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            <i class="fa fa-check"></i>-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            <i class="fa fa-check"></i>-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Power Steering-->
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
<!--                                            Power Windows-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            <i class="fa fa-check"></i>-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            <i class="fa fa-times"></i>-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            Leather Seats-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            <i class="fa fa-check"></i>-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            <i class="fa fa-times"></i>-->
<!--                                        </td>-->
<!---->
<!--                                    </tr>-->
<!--                                    </tbody>-->
<!--                                </table>-->
<!--                            </div>-->
<!--                        </li>-->

                    </ul>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Main Container End -->
    </section>
    <!-- =-=-=-=-=-=-= Comparison End =-=-=-=-=-=-= -->