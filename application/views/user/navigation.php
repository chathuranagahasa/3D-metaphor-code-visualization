


<div class="col-md-4 col-sm-12">
    <div class="settings_links">
        <ul>
            <li style="background-color: #f0f0f0; color: #000; padding: 10px">
                <?php
                $session_array  = $this->session->userdata('logged_in');
                if(count($session_array) != 0){
                    echo $session_array['first_name'] . " " . $session_array['last_name'];
                    ?>
                    <p style="font-size: 12px !important; text-transform: lowercase"><?php echo strtolower($session_array['email']); ?></p>
                    <?php

                }
                ?>
            </li>

        </ul>
        <ul>
            <li><span>Account Settings</span></li>
            <li><a href="<?php echo base_url(); ?>user/profile/<?php echo $session_array['userId'] ?>"><i class="flaticon-user"></i>Profile Update</a></li>
        </ul>
        <ul>
            <li><span>Manage Properties</span></li>

            <?php

            if($this->uri->segment(1) == "vehicle"){
?>              <li><a href="<?php echo base_url(); ?>user/dashboard"><i class="flaticon-home"></i>Dashboard</a></li>
                <li><a href="<?php echo base_url(); ?>user/ads/<?php echo $session_array['userId'] ?>"><i class="flaticon-invoice"></i>My Ads</a></li>
                <li><a href="<?php echo base_url(); ?>user/archived_ads/<?php echo $session_array['userId']; ?>"><i class="flaticon-star"></i>Archived Ads</a></li>
                <li  class="active"><a href="<?php echo base_url() ?>vehicle"><i class="flaticon-export"></i>Submit New Vehicle</a></li>

                <?php
            }else if($this->uri->segment(2) == "ads"){
                ?>
                <li><a href="<?php echo base_url(); ?>user/dashboard"><i class="flaticon-home"></i>Dashboard</a></li>
                <li class="active"><a href="<?php echo base_url(); ?>user/properties/<?php echo $session_array['userId'] ?>"><i class="flaticon-invoice"></i>My Ads</a></li>
                <li><a href="<?php echo base_url(); ?>user/archived_ads/<?php echo $session_array['userId']; ?>"><i class="flaticon-star"></i>Archived Ads</a></li>
                <li><a href="<?php echo base_url() ?>vehicle"><i class="flaticon-export"></i>Submit New Vehicle</a></li>

                <?php

            }else if($this->uri->segment(2) == "archived_ads"){
                ?>
                <li><a href="<?php echo base_url(); ?>user/dashboard"><i class="flaticon-home"></i>Dashboard</a></li>
                <li><a href="<?php echo base_url(); ?>user/ads/<?php echo $session_array['userId'] ?>"><i class="flaticon-invoice"></i>My Ads</a></li>
                <li class="active"><a href="<?php echo base_url(); ?>user/archived_ads/<?php echo $session_array['userId']; ?>"><i class="flaticon-star"></i>Archived Ads</a></li>
                <li><a href="<?php echo base_url() ?>vehicle"><i class="flaticon-export"></i>Submit New Vehicle</a></li>

            <?php

            }else if($this->uri->segment(2) == "dashboard"){
                ?>
                <li class="active"><a href="<?php echo base_url(); ?>user/dashboard"><i class="flaticon-home"></i>Dashboard</a></li>
                <li><a href="<?php echo base_url(); ?>user/ads/<?php echo $session_array['userId'] ?>"><i class="flaticon-invoice"></i>My Ads</a></li>
                <li><a href="<?php echo base_url(); ?>user/archived_ads/<?php echo $session_array['userId']; ?>"><i class="flaticon-star"></i>Archived Ads</a></li>
                <li><a href="<?php echo base_url() ?>vehicle"><i class="flaticon-export"></i>Submit New Vehicle</a></li>

                <?php

            }else{
                ?>

                <li><a href="<?php echo base_url(); ?>user/dashboard"><i class="flaticon-home"></i>Dashboard</a></li>
                <li><a href="<?php echo base_url(); ?>user/ads/<?php echo $session_array['userId'] ?>"><i class="flaticon-invoice"></i>My Ads</a></li>
                <li><a href="<?php echo base_url(); ?>user/archived_ads/<?php echo $session_array['userId']; ?>"><i class="flaticon-star"></i>Archived Ads</a></li>
                <li><a href="<?php echo base_url() ?>vehicle"><i class="flaticon-export"></i>Submit New Vehicle</a></li>

            <?php
            }

            ?>
                    </ul>
<!--        <ul>-->
<!--            <li><a href="message.html"><i class="flaticon-notification"></i>Message <sup><i class="fa fa-circle" aria-hidden="true"></i></sup> <span>( 20 )</span></a></li>-->
<!--            <li><a href="comments.html"><i class="flaticon-chat"></i>Feedback and Comments</a></li>-->
<!--            <li><a href="invoices.html"><i class="flaticon-invoice"></i>Payments and Invoice</a></li>-->
<!--        </ul>-->
        <ul>
<!--            <li><a href="change_password.html"><i class="flaticon-locked"></i>Change Password</a></li>-->
            <li><a href="<?php echo base_url(); ?>user/logout"><i class="flaticon-upload"></i>Log Out</a></li>
        </ul>
    </div>
</div>
