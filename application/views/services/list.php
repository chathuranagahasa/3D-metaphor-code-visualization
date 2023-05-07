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

            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-md-12" style="">
                        <?php
                        if (count($properties) == 0){
                            echo "<h2>No Result Found.</h2>";
                        }
                        ?>
                        <?php foreach ($properties as $property) {
                            ?>
                            <div class="list_property fix mb-60" style="margin-bottom: 30px !important; border: 1px solid #cccccc; background-color: #ffffff; padding-top: 15px">
                                <div class="col-6 ">
                                    <div class="single-property">


                                    </div>
                                </div>
                                <div  class="col-lg-4 col-md-12 col-sm-12">
                                    <div class="property-desc list_property_desc" style="padding-top: 10px !important;">
                                        <div class="property-desc-top">
                                    <?php
                                        $this->load->model('PropertyModel');
                                        $images = $this->PropertyModel->getServiceImagesById($property->service_id);

                                    ?>
                                    <img src="<?php echo base_url(); ?>assets/uploads/<?php echo (count($images) !=0) ? $images[0]->image_name : null; ?>" alt="">
                                    </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-12 col-sm-12" style="background: #ffffff;">
                                    <div class="property-desc list_property_desc" style="padding-top: 10px !important;">
                                        <div class="property-desc-top">
                                            <h6><a href="<?php echo base_url(); ?>Services/view/<?php echo $property->id; ?>/<?php echo str_replace(' ', '_', $property->title); ?>"><?php echo ucwords($property->title); ?></a></h6>
                                            <div class="property-location main_category_wanted" style="background-color: #666666; width: 20%; text-align: center; border-radius: 5px">
                                                <p style="color: #ffffff;">
                                                    <?php
                                                    $property_type = $this->PropertyModel->getServiceTypeNameById($property->service_type);
                                                    if(count($property_type) != 0){
                                                        echo $property_type[0]->name;
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="property-list-desc">
                                            <p><b>Areas :</b> <?php
                                                $string = strip_tags($property->locations);
                                                if (strlen($string) > 100) {

                                                    // truncate string
                                                    $stringCut = substr($string, 0, 100);
                                                    $endPoint = strrpos($stringCut, ' ');

                                                    //if the string doesn't contain any space then it will cut without word basis.
                                                    $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                                                    $string .= '&nbsp;&nbsp;<a href="">readmore...</a>';
                                                }
                                                echo $string;
                                                ?></p>
                                        </div>
                                        <div class="property-list-desc">
                                            <p><?php echo $property->service_desc; ?></p>
                                        </div>
                                        <div class="property-list-desc" style="text-align: right">
                                            <p style="color: #999999; font-size: 11px">Posted : <?php
                                                $date=date_create($property->posted_date);
                                                echo date_format($date,"Y/m/d");

                                                ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <!--<div class="list_property fix mb-60">
                            <div class="col-6">
                                <div class="single-property">
                                    <span>FOR SALE</span>
                                    <div class="property-img">
                                        <a href="single-properties.html">
                                            <img src="<?php /*echo base_url(); */?>assets/img/property/l-2.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="property-desc list_property_desc">
                                    <div class="property-desc-top">
                                        <h6><a href="single-properties.html">Friuli-Venezia Giulia</a></h6>
                                        <h4 class="price">$52,354</h4>
                                        <div class="property-location">
                                            <p><img src="<?php /*echo base_url(); */?>assets/img/property/icon-11.png" alt=""> 568 E 1st Ave, Miami</p>
                                        </div>
                                    </div>
                                    <div class="property-list-desc">
                                        <p> <span>Friuli-Venezia Giflia</span> is the best theme for elit, sed door dolor sit amet, conse ctetur adipiscing elit, sed do eiud in tempor incididun</p>
                                    </div>
                                    <div class="property-desc-bottom">
                                        <div class="property-bottom-list">
                                            <ul>
                                                <li>
                                                    <img src="<?php /*echo base_url(); */?>assets/img/property/icon-b-1.png" alt="">
                                                    <span>550 sqft</span>
                                                </li>
                                                <li>
                                                    <img src="<?php /*echo base_url(); */?>assets/img/property/icon-b-2.png" alt="">
                                                    <span>6</span>
                                                </li>
                                                <li>
                                                    <img src="<?php /*echo base_url(); */?>assets/img/property/icon-b-3.png" alt="">
                                                    <span>4</span>
                                                </li>
                                                <li>
                                                    <img src="<?php /*echo base_url(); */?>assets/img/property/icon-b-4.png" alt="">
                                                    <span>3</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list_property fix mb-60">
                            <div class="col-6">
                                <div class="single-property">
                                    <span class="bg-blue">FOR Rent</span>
                                    <div class="property-img">
                                        <a href="single-properties.html">
                                            <img src="<?php /*echo base_url(); */?>assets/img/property/l-3.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 ">
                                <div class="property-desc list_property_desc">
                                    <div class="property-desc-top">
                                        <h6><a href="single-properties.html">Friuli-Venezia Giulia</a></h6>
                                        <h4 class="price">$52,354</h4>
                                        <div class="property-location">
                                            <p><img src="<?php /*echo base_url(); */?>assets/img/property/icon-11.png" alt=""> 568 E 1st Ave, Miami</p>
                                        </div>
                                    </div>
                                    <div class="property-list-desc">
                                        <p> <span>Friuli-Venezia Giflia</span> is the best theme for elit, sed door dolor sit amet, conse ctetur adipiscing elit, sed do eiud in tempor incididun</p>
                                    </div>
                                    <div class="property-desc-bottom">
                                        <div class="property-bottom-list">
                                            <ul>
                                                <li>
                                                    <img src="<?php /*echo base_url(); */?>assets/img/property/icon-b-1.png" alt="">
                                                    <span>550 sqft</span>
                                                </li>
                                                <li>
                                                    <img src="<?php /*echo base_url(); */?>assets/img/property/icon-b-2.png" alt="">
                                                    <span>6</span>
                                                </li>
                                                <li>
                                                    <img src="<?php /*echo base_url(); */?>assets/img/property/icon-b-3.png" alt="">
                                                    <span>4</span>
                                                </li>
                                                <li>
                                                    <img src="<?php /*echo base_url(); */?>assets/img/property/icon-b-4.png" alt="">
                                                    <span>3</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list_property fix mb-60">
                            <div class="col-6 ">
                                <div class="single-property">
                                    <span>FOR SALE</span>
                                    <div class="property-img">
                                        <a href="single-properties.html">
                                            <img src="<?php /*echo base_url(); */?>assets/img/property/l-4.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 ">
                                <div class="property-desc list_property_desc">
                                    <div class="property-desc-top">
                                        <h6><a href="single-properties.html">Friuli-Venezia Giulia</a></h6>
                                        <h4 class="price">$52,354</h4>
                                        <div class="property-location">
                                            <p><img src="<?php /*echo base_url(); */?>assets/img/property/icon-11.png" alt=""> 568 E 1st Ave, Miami</p>
                                        </div>
                                    </div>
                                    <div class="property-list-desc">
                                        <p> <span>Friuli-Venezia Giflia</span> is the best theme for elit, sed door dolor sit amet, conse ctetur adipiscing elit, sed do eiud in tempor incididun</p>
                                    </div>
                                    <div class="property-desc-bottom">
                                        <div class="property-bottom-list">
                                            <ul>
                                                <li>
                                                    <img src="<?php /*echo base_url(); */?>assets/img/property/icon-b-1.png" alt="">
                                                    <span>550 sqft</span>
                                                </li>
                                                <li>
                                                    <img src="<?php /*echo base_url(); */?>assets/img/property/icon-b-2.png" alt="">
                                                    <span>6</span>
                                                </li>
                                                <li>
                                                    <img src="<?php /*echo base_url(); */?>assets/img/property/icon-b-3.png" alt="">
                                                    <span>4</span>
                                                </li>
                                                <li>
                                                    <img src="<?php /*echo base_url(); */?>assets/img/property/icon-b-4.png" alt="">
                                                    <span>3</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list_property fix mb-60">
                            <div class="col-6 ">
                                <div class="single-property">
                                    <span>FOR SALE</span>
                                    <div class="property-img">
                                        <a href="single-properties.html">
                                            <img src="<?php /*echo base_url(); */?>assets/img/property/l-5.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 ">
                                <div class="property-desc list_property_desc">
                                    <div class="property-desc-top">
                                        <h6><a href="single-properties.html">Friuli-Venezia Giulia</a></h6>
                                        <h4 class="price">$52,354</h4>
                                        <div class="property-location">
                                            <p><img src="<?php /*echo base_url(); */?>assets/img/property/icon-11.png" alt=""> 568 E 1st Ave, Miami</p>
                                        </div>
                                    </div>
                                    <div class="property-list-desc">
                                        <p> <span>Friuli-Venezia Giflia</span> is the best theme for elit, sed door dolor sit amet, conse ctetur adipiscing elit, sed do eiud in tempor incididun</p>
                                    </div>
                                    <div class="property-desc-bottom">
                                        <div class="property-bottom-list">
                                            <ul>
                                                <li>
                                                    <img src="<?php /*echo base_url(); */?>assets/img/property/icon-b-1.png" alt="">
                                                    <span>550 sqft</span>
                                                </li>
                                                <li>
                                                    <img src="<?php /*echo base_url(); */?>assets/img/property/icon-b-2.png" alt="">
                                                    <span>6</span>
                                                </li>
                                                <li>
                                                    <img src="<?php /*echo base_url(); */?>assets/img/property/icon-b-3.png" alt="">
                                                    <span>4</span>
                                                </li>
                                                <li>
                                                    <img src="<?php /*echo base_url(); */?>assets/img/property/icon-b-4.png" alt="">
                                                    <span>3</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list_property fix ">
                            <div class="col-6 ">
                                <div class="single-property">
                                    <span class="bg-blue">FOR Rent</span>
                                    <div class="property-img">
                                        <a href="single-properties.html">
                                            <img src="<?php /*echo base_url(); */?>assets/img/property/l-6.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 ">
                                <div class="property-desc list_property_desc">
                                    <div class="property-desc-top">
                                        <h6><a href="single-properties.html">Friuli-Venezia Giulia</a></h6>
                                        <h4 class="price">$52,354</h4>
                                        <div class="property-location">
                                            <p><img src="<?php /*echo base_url(); */?>assets/img/property/icon-11.png" alt=""> 568 E 1st Ave, Miami</p>
                                        </div>
                                    </div>
                                    <div class="property-list-desc">
                                        <p> <span>Friuli-Venezia Giflia</span> is the best theme for elit, sed door dolor sit amet, conse ctetur adipiscing elit, sed do eiud in tempor incididun</p>
                                    </div>
                                    <div class="property-desc-bottom">
                                        <div class="property-bottom-list">
                                            <ul>
                                                <li>
                                                    <img src="<?php /*echo base_url(); */?>assets/img/property/icon-b-1.png" alt="">
                                                    <span>550 sqft</span>
                                                </li>
                                                <li>
                                                    <img src="<?php /*echo base_url(); */?>assets/img/property/icon-b-2.png" alt="">
                                                    <span>6</span>
                                                </li>
                                                <li>
                                                    <img src="<?php /*echo base_url(); */?>assets/img/property/icon-b-3.png" alt="">
                                                    <span>4</span>
                                                </li>
                                                <li>
                                                    <img src="<?php /*echo base_url(); */?>assets/img/property/icon-b-4.png" alt="">
                                                    <span>3</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
                <!--<div class="row" style="margin-bottom: 20px">
                    <div class="col-md-12">
                        <div class="pagination">
                            <div class="pagination-inner text-center">
                                <ul>
                                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                    <li class="current">1</li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li>. . . . . .</li>
                                    <li><a href="#">15</a></li>
                                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
</div>