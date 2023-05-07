<section class="content-header">

    <h3>Property Management</h3>

</section>
<section class="content">
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="http://favr-susl.dev">Home</a></li>
            <li class="active">Lagna Management</li>
            <li class="active">List Lagna</li>
        </ol>
    </div>
    <div class="panel-heading clearfix" style="background-color: #823168">
        <h4 class="panel-title" style=" color: #FFFFFF;">List - Lagna</h4>
    </div>


    <div class="panel panel-white">

        <div class="panel-body">

            <?php if ($this->session->flashdata('message_suc_product')) { ?>
                <div class="alert alert-success"> <?= $this->session->flashdata('message_suc_product') ?> </div>
            <?php } ?>

            <?php if ($this->session->flashdata('message_featured')) { ?>
                <div class="alert alert-success"> <?= $this->session->flashdata('message_featured') ?> </div>
            <?php } ?>



            <div class="row">
                <div class="col-sm-12">

                    <div class="box">
                        <div class="box-header">
                            <!--   <h3 class="box-title">Users List</h3> -->
                        </div>
                        <div class="box-body">

                            <div class="panel panel-white">
                                <div class="panel-body">


                                    <div class="table-responsive">
                                        <div class="dataTables_wrapper" id="example_wrapper">
                                            <table aria-describedby="example_info" role="grid" id="property-list-table" class="display table table dataTable" style="width: 100%;">
                                                <thead>
                                                <tr role="row">
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Name
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Description
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Date
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        From
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        To
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Views
                                                    </th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>

                                                </thead>
                                                <tfoot>
                                                <tr>

                                                    <th colspan="1" rowspan="1">

                                                    </th>
                                                    <th colspan="1" rowspan="1">

                                                    </th>
                                                    <th colspan="1" rowspan="1">

                                                    </th>
                                                    <th colspan="1" rowspan="1">

                                                    </th>
                                                    <th colspan="1" rowspan="1">

                                                    </th>
                                                    <th colspan="1" rowspan="1">

                                                    </th>
                                                    <th colspan="1" rowspan="1">

                                                    </th>
                                                    <th colspan="1" rowspan="1">

                                                    </th>
                                                    <th colspan="1" rowspan="1">

                                                    </th>
                                                    <th colspan="1" rowspan="1">

                                                    </th>
                                                    <th colspan="1" rowspan="1">

                                                    </th>
                                                </tr>
                                                </tfoot>
                                                <tbody>

                                                <?php
                                                foreach ($properties as $property){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo ucwords($property->offer_type); ?></td>
                                                        <td><?php echo $property->title; ?></td>
                                                        <td><?php echo $property->price . " " . $property->price_type; ?></td>
                                                        <td><?php echo "active"; ?></td>
                                                        <td><?php echo "30"; ?></td>
                                                        <td><?php echo $property->phone_mobile; ?></td>
                                                        <td>
                                                            <a href="<?php echo base_url(); ?>property/renew_ad/<?php echo $property->property_id; ?>">
                                                                <span class="label label-success">Renew</span>
                                                            </a>

                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url(); ?>admin/edit/<?php echo $property->property_id; ?>">
                                                                <span class="label label-warning">Edit</span>
                                                            </a>

                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url(); ?>admin/delete/<?php echo $property->property_id; ?>">
                                                                <span class="label label-danger">Delete</span>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if($property->approve_status == 0){
                                                                ?>
                                                                <a href="<?php echo base_url(); ?>admin/approved/<?php echo $property->property_id; ?>">
                                                                    <span class="label label-success">Approve Ad</span>
                                                                </a>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if($property->featured == 0){
                                                                ?>
                                                                <a href="<?php echo base_url(); ?>admin/set_featured/<?php echo $property->property_id; ?>">
                                                                    <span class="label label-primary">Set Featured</span>
                                                                </a>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php

                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>



                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

</section>
</div>