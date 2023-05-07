<style>
    .ad-history .col-md-4 .user-stats:hover{
        background: #333333;
    }

    .dashboard-menu-container ul .active{
        background: #333333;

    }

    #menu_type_all{
        margin-top: 10px;
    }

    #menu_type_all ul .active{
        background: #ff7f00;
    }

    #menu_type_all ul li .menu-name{
        color: #000;
    }
    /*.dashboard-menu-container ul a div{*/
        /*color: #333333 !important;*/
    /*}*/


</style>


<section class="search-result-item">
    <a class="image-link" href="#"><img class="image center-block" alt="" src="<?php echo base_url(); ?>assets/images/users/user.png" style="padding: 30px"> </a>
    <div class="search-result-item-body">
        <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12">
                <h4 class="search-result-item-heading"><a href="#">
                        <?php
                        $session_array  = $this->session->userdata('logged_in');
                        if(count($session_array) != 0){
                            echo $session_array['first_name'] . " " . $session_array['last_name'];
                        }
                        ?>
                    </a></h4>
                <p class="info">
                                        <span><a href="#"><i class="fa fa-user "></i>
                                                <?php
                                                echo strtolower($session_array['email']);
                                                ?>
                                            </a></span>
                    <span><a href="<?php echo base_url(); ?>user/logout" style="color: #ffffff; font-weight: 600; font-size: 15px; background-color: #cb1a09; padding: 5px; border-radius: 2px"><i class="fa fa-edit"></i>Logout </a></span>
                </p>
                <!--                                    <p class="description">You last logged in at: 14-01-2017 6:40 AM [ USA time (GMT + 6:00hrs)</p>-->
                <!--                                    <span class="label label-warning">Paid Package</span>-->
                <!--                                    <span class="label label-success">Dealer</span>-->
            </div>
            <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="row ad-history">
                    <div class="col-md-4 col-sm-4 col-xs-12">
<!--                        <a href="">-->
<!--                            <div class="user-stats">-->
<!--                                <h2>0</h2>-->
<!--                                <small>Ad Sold</small>-->
<!--                            </div>-->
<!--                        </a>-->
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <a href="<?php echo base_url(); ?>user/ads/<?php echo $session_array['userId']; ?>">
                        <div class="user-stats">
                            <h2>
                                <?php
                                $re = $this->PropertyModel->getAllPropertiesByUserId($session_array['userId']);
                                echo count($re);
                                ?>
                            </h2>
                            <small>Total Listings</small>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <a href="<?php echo base_url() ?>user/wishlist/<?php echo $session_array['userId'] ?>/view">
                            <div class="user-stats">
                                <h2><?php
                                    $result = $this->PropertyModel->getWishListDataByUserID($session_array['userId']);
                                    echo  count($result);
                                    ?></h2>
                                <small>Favourites Ads</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="dashboard-menu-container">
    <ul>
        <?php
        if($this->uri->segment(2) == "dashboard"){
        ?>
        <li class="active">
            <a href="<?php echo base_url(); ?>user/dashboard">
                <div class="menu-name"> Dashboard </div>
            </a>
        </li>
            <?php
        }else{
        ?>
            <li>
                <a href="<?php echo base_url(); ?>user/dashboard">
                    <div class="menu-name"> Dashboard </div>
                </a>
            </li>
            <?php
        }
        ?>



        <?php
        if($this->uri->segment(2) == "ads"){
            ?>
            <li class="active">
                <a href="<?php echo base_url(); ?>user/ads/<?php echo $session_array['userId']; ?>/carsale">
                    <div class="menu-name"> My Ads </div>
                </a>
            </li>
            <?php
        }else{
            ?>
            <li>
                <a href="<?php echo base_url(); ?>user/ads/<?php echo $session_array['userId']; ?>/carsale">
                    <div class="menu-name"> My Ads </div>
                </a>
            </li>
            <?php
        }
        ?>



        <!--                            <li>-->
        <!--                                <a href="archives.html">-->
        <!--                                    <div class="menu-name">Archives</div>-->
        <!--                                </a>-->
        <!--                            </li>-->

        <?php
        if($this->uri->segment(1) == "vehicle"){
        ?>
        <li>
            <a href="<?php echo base_url() ?>vehicle">
                <div class="menu-name">Submit a New Vehicle</div>
            </a>
        </li>
            <?php
        }else{
        ?>
        <li>
            <a href="<?php echo base_url() ?>vehicle">
                <div class="menu-name">Submit a New Vehicle</div>
            </a>
        </li>
            <?php
        }
        ?>
        <?php
        if($this->uri->segment(2) == "wishlist"){
?>
            <li class="active">
                <a href="<?php echo base_url() ?>user/wishlist/<?php echo $session_array['userId'] ?>/view">
                    <div class="menu-name">Favorite Ads</div>
                </a>
            </li>
        <?php
        }else{
            ?>
            <li>
                <a href="<?php echo base_url() ?>user/wishlist/<?php echo $session_array['userId'] ?>/view">
                    <div class="menu-name">Favorite Ads</div>
                </a>
            </li>
        <?php
        }
        ?>

        <!--                            <li>-->
        <!--                                <a href="#">-->
        <!--                                    <div class="menu-name">Close Account</div>-->
        <!--                                </a>-->
        <!--                            </li>-->
<!--        <li>-->
<!--            <a href="--><?php //echo base_url(); ?><!--user/logout">-->
<!--                <div class="menu-name">Logout</div>-->
<!--            </a>-->
<!--        </li>-->
    </ul>
</div>

<?php
//var_dump($this->uri->segment(3));
if($this->uri->segment(2) == "ads") {

    ?>
    <div class="dashboard-menu-container" id="menu_type_all">
        <ul>
            <?php
            //var_dump($this->uri->segment(3));
            if ($this->uri->segment(4) == "carsale") {
                ?>
                <li class="active">
                    <a href="https://bizlink.lk/test/carsale/user/ads/<?php echo $session_array['userId']; ?>/carsale">
                        <div class="menu-name"> Auto Market</div>
                    </a>
                </li>
                <?php
            } else {
                ?>
                <li>
                    <a href="https://bizlink.lk/test/carsale/user/ads/<?php echo $session_array['userId']; ?>/carsale">
                        <div class="menu-name"> Auto Market</div>
                    </a>
                </li>
                <?php
            }
            ?>



            <?php
            if ($this->uri->segment(4) == "property") {
                ?>
                <li class="active">
                    <a href="https://bizlink.lk/test/property/user/ads/<?php echo $session_array['userId']; ?>/property">
                        <div class="menu-name"> Property Market</div>
                    </a>
                </li>
                <?php
            } else {
                ?>
                <li>
                    <a href="https://bizlink.lk/test/property/user/ads/<?php echo $session_array['userId']; ?>/property">
                        <div class="menu-name"> Property Market</div>
                    </a>
                </li>
                <?php
            }
            ?>


            <!--                            <li>-->
            <!--                                <a href="archives.html">-->
            <!--                                    <div class="menu-name">Archives</div>-->
            <!--                                </a>-->
            <!--                            </li>-->


            <?php
            if ($this->uri->segment(4) == "miscellaneous") {
                ?>
                <li class="active">
                    <a href="https://bizlink.lk/test/miscellaneous/user/ads/<?php echo $session_array['userId'] ?>/miscellaneous">
                        <div class="menu-name">Miscellaneous</div>
                    </a>
                </li>
                <?php
            } else {
                ?>
                <li>
                    <a href="https://bizlink.lk/test/miscellaneous/user/ads/<?php echo $session_array['userId'] ?>/miscellaneous">
                        <div class="menu-name">Miscellaneous</div>
                    </a>
                </li>
                <?php
            }
            ?>

        </ul>
    </div>

    <?php
}
    ?>
