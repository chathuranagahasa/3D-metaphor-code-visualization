<!-- Sidebar user panel -->

<ul class="sidebar-menu">

    <li class="header">MAIN NAVIGATION</li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-user"></i> <span>User Management</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>admin/new_user"><i class="fa  fa-file-o"></i>Create</a></li>
            <li><a href="<?php echo base_url() ?>admin/user_list"><i class="fa fa-list"></i> List</a></li>
            <!-- <li><a href="../layout/fixed.html"><i class="fa fa-clipboard"></i> Reports</a></li> -->
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-user-plus"></i> <span>Property Management</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="<?php echo base_url() ?>admin/create_property"><i class="fa  fa-file-o"></i><span> Add New</span>
                    <!--<i class="fa fa-angle-left pull-right"></i>-->
                </a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>admin/list_properties"><i class="fa  fa-file-o"></i><span> List</span>
                    <!--<i class="fa fa-angle-left pull-right"></i>-->
                </a>
            </li>

            <li>
                <a href="<?php echo base_url() ?>admin/wanted"><i class="fa  fa-file-o"></i><span>Add Wanted Ad</span>
<!--                    <i class="fa fa-angle-left pull-right"></i>-->
                </a>
            </li>
            <!-- <li><a href="../layout/fixed.html"><i class="fa fa-clipboard"></i> Reports</a></li> -->
        </ul>
    </li>

<!--    <li class="treeview">-->
<!--        <a href="#">-->
<!--            <i class="fa fa-user-plus"></i> <span>Services Management</span> <i class="fa fa-angle-left pull-right"></i>-->
<!--        </a>-->
<!--        <ul class="treeview-menu">-->
<!--            <li>-->
<!--                <a href="--><?php //echo base_url() ?><!--admin/service"><i class="fa  fa-file-o"></i><span> Add New</span>-->
<!--                    <!--<i class="fa fa-angle-left pull-right"></i>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a href="--><?php //echo base_url() ?><!--admin/list_services"><i class="fa  fa-file-o"></i><span> List</span>-->
<!--                    <!--<i class="fa fa-angle-left pull-right"></i>-->
<!--                </a>-->
<!--            </li>-->
<!--            <!-- <li><a href="../layout/fixed.html"><i class="fa fa-clipboard"></i> Reports</a></li> -->
<!--        </ul>-->
<!--    </li>-->

    <li class="treeview">
        <a href="#">
            <i class="fa fa-user-plus"></i> <span>Category Management</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="<?php echo base_url() ?>admin/create_category"><i class="fa  fa-file-o"></i><span> Add Category</span>
                    <!--<i class="fa fa-angle-left pull-right"></i>-->
                </a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>admin/list_categories"><i class="fa  fa-file-o"></i><span> List</span>
                    <!--<i class="fa fa-angle-left pull-right"></i>-->
                </a>
            </li>
            <!-- <li><a href="../layout/fixed.html"><i class="fa fa-clipboard"></i> Reports</a></li> -->
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-user-plus"></i> <span>Customer Profile</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="<?php echo base_url() ?>admin/create_company"><i class="fa  fa-file-o"></i><span> Add Company</span>
                    <!--<i class="fa fa-angle-left pull-right"></i>-->
                </a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>admin/list_companies"><i class="fa  fa-file-o"></i><span> List</span>
                    <!--<i class="fa fa-angle-left pull-right"></i>-->
                </a>
            </li>
            <!-- <li><a href="../layout/fixed.html"><i class="fa fa-clipboard"></i> Reports</a></li> -->
        </ul>
    </li>

    
    <li class="treeview">
        <a href="#">
            <i class="fa fa-user-plus"></i> <span>Model Management</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="<?php echo base_url() ?>admin/create_model"><i class="fa  fa-file-o"></i><span> Add Model</span>
                    <!--<i class="fa fa-angle-left pull-right"></i>-->
                </a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>admin/create_sub_model"><i class="fa  fa-file-o"></i><span> Add SubModel</span>
                    <!--<i class="fa fa-angle-left pull-right"></i>-->
                </a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>admin/model_list"><i class="fa  fa-file-o"></i><span> List</span>
                    <!--<i class="fa fa-angle-left pull-right"></i>-->
                </a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>admin/model_top_list"><i class="fa  fa-file-o"></i><span> Top Model List</span>
                    <!--<i class="fa fa-angle-left pull-right"></i>-->
                </a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>admin/sub_model_list"><i class="fa  fa-file-o"></i><span> SubModel List</span>
                    <!--<i class="fa fa-angle-left pull-right"></i>-->
                </a>
            </li>
            <!--
                 <li><a href="../layout/fixed.html"><i class="fa fa-clipboard"></i> Reports</a></li> -->
        </ul>
    </li>

<!--    <li class="treeview">-->
<!--        <a href="#">-->
<!--            <i class="fa fa-dollar"></i> <span>Payments</span> <i class="fa fa-angle-left pull-right"></i>-->
<!--        </a>-->
<!--        <ul class="treeview-menu">-->
<!--            <li>-->
<!--                <a href="--><?php //echo base_url() ?><!--admin/fund_transfer_list"><i class="fa  fa-file-o"></i><span> Fund Transfer</span>-->
<!--                    <!--<i class="fa fa-angle-left pull-right"></i>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a href="--><?php //echo base_url() ?><!--admin/pay_on_store_list"><i class="fa  fa-file-o"></i><span> Pay On Store</span>-->
<!--                    <!--<i class="fa fa-angle-left pull-right"></i>-->
<!--                </a>-->
<!--            </li>-->
<!--            <!-- <li><a href="../layout/fixed.html"><i class="fa fa-clipboard"></i> Reports</a></li> -->
<!--        </ul>-->
<!--    </li>-->
<!--    <li class="treeview">-->
<!--        <a href="#">-->
<!--            <i class="fa fa-history"></i> <span>Analytics</span> <i class="fa fa-angle-left pull-right"></i>-->
<!--        </a>-->
<!--        <ul class="treeview-menu">-->
<!--            <li>-->
<!--                <a href="--><?php //echo base_url() ?><!--admin/analytics"><i class="fa  fa-list"></i><span> View </span><i class="fa "></i>-->
<!--                </a>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </li>-->


</ul>








