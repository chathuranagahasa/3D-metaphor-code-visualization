<!--<div class="container">-->
<!--    <div class="col-md-12">-->
<!--        <nav id="dropdown">-->
<!--            <ul>-->
<!--                <li><a href="--><?php //echo base_url(); ?><!--">Home</a>-->
<!--                </li>-->
<!--                <li><a href="--><?php //echo base_url(); ?><!--">Rent</a></li>-->
<!--                <li><a href="--><?php //echo base_url(); ?><!--">Sale</a></li>-->
<!--                <li><a href="--><?php //echo base_url(); ?><!--wanted">Wanted</a></li>-->
<!--                <li class="mega-parent"><a href="#">Services</a>-->
<!--                    <ul class="mega_menu">-->
<!--                        --><?php
//
//                        $categories = $this->PropertyModel->getMainServiceCategories();
//                        foreach ($categories as $category){
//                            ?>
<!--                            <li>-->
<!--                                --><?php
//                                $sub_categories = $this->PropertyModel->getServiceTypesByMainCatId($category->cat_id);
//
//                                ?>
<!--                                <a href="#" class="title">--><?php //echo $category->name; ?><!--</a>-->
<!--                                <ul class="mega-submenu">-->
<!--                                    --><?php
//                                    foreach ($sub_categories as $sub_category){
//                                        ?>
<!--                                        <li><a href="--><?php // ?><!--">--><?php //echo $sub_category->name; ?><!--</a></li>-->
<!--                                        --><?php
//                                    }
//                                    ?>
<!---->
<!--                                </ul>-->
<!---->
<!---->
<!---->
<!--                            </li>-->
<!--                            --><?php
//                        }
//                        ?>
<!--                    </ul>-->
<!--                </li>-->
<!--                --><?php
//                if(count($session_array) == 0){
//                    //echo $session_array['first_name'] . " " . $session_array['last_name'];
//                    ?>
<!--                    <li><a href="--><?php //echo base_url(); ?><!--login"> Login / Register</a></li>-->
<!--                    --><?php
//                }else{
//                    ?>
<!--                    <li><a href="--><?php //echo base_url(); ?><!--user/logout"> Logout</a></li>-->
<!--                    --><?php
//                }
//                ?>
<!--                <li> <a class="post_ad_btn" href="--><?php //echo base_url() ?><!--property"> Post Ad Free</a></li>-->
<!---->
<!--            </ul>-->
<!--        </nav>-->
<!--    </div>-->
<!--</div>-->

<style>
    @media screen and (max-width: 600px) {
        .topnav a:not(:first-child) {display: none;}
        .topnav a.icon {
            float: right;
            display: block;
        }
    }

    @media screen and (max-width: 600px) {
        .topnav.responsive {position: relative;}
        .topnav.responsive .icon {
            position: absolute;
            right: 0;
            top: 0;
        }
        .topnav.responsive a {
            float: none;
            display: block;
            text-align: left;
        }
    }
</style>

