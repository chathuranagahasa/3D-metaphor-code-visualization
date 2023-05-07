<section class="content-header">

    <h3>Property Management</h3>

</section>
<section class="content">
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="http://favr-susl.dev">Home</a></li>
            <li class="active">Property Management</li>
            <li class="active">List Properties - Wanted</li>
        </ol>
    </div>
    <div class="panel-heading clearfix" style="background-color: #823168">
        <h4 class="panel-title" style=" color: #FFFFFF;">List - Wanted Properties</h4>
    </div>


    <div class="panel panel-white">

        <div class="panel-body">

            <?php if ($this->session->flashdata('message_suc_product')) { ?>
                <div class="alert alert-success"> <?= $this->session->flashdata('message_suc_product') ?> </div>
            <?php } ?>
            <?php if ($this->session->flashdata('message_delete_property_wanted')) { ?>
                <div class="alert alert-success"> <?= $this->session->flashdata('message_delete_property_wanted') ?> </div>
            <?php } ?>
            <?php if ($this->session->flashdata('message_suc_property_wanted')) { ?>
                <div class="alert alert-success"> <?= $this->session->flashdata('message_suc_property_wanted') ?> </div>
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
                                                        Type
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Sub Type
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Title
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Status
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Views
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Contact No
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Ad Start Date
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Ad End Date
                                                    </th>
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
                                                    $this->load->model('PropertyModel');
                                                    $mainType = $this->PropertyModel->getMainTypeById($property->main_type);
                                                    $subType = $this->PropertyModel->getSubTypeBySubTypeId($property->sub_type);
                                                    ?>
                                                    <tr>
                                                        <td><?php echo (count($mainType) !=0) ? $mainType[0]->name :  null; ?></td>
                                                        <td><?php echo (count($subType) !=0) ? $subType[0]->name :  null; ?></td>
                                                        <td><?php echo $property->title; ?></td>
                                                        <td><?php echo $property->contact_name; ?></td>
                                                        <td><?php echo $property->contact_email; ?></td>
                                                        <td><?php echo $property->phone_mobile; ?></td>
                                                        <td><?php
                                                            $date=date_create($property->posted_date);
                                                            echo date_format($date,"Y/m/d");
                                                            ?>
                                                        </td>
                                                        <td><?php
                                                            $date=date_create($property->expire_date);
                                                            echo date_format($date,"Y/m/d");
                                                            ?></td>
                                                        <td>
<!--                                                            <a href="--><?php //echo base_url(); ?><!--property/renew_ad/--><?php //echo $property->id; ?><!--">-->
<!--                                                                <span class="label label-success">Renew</span>-->
<!--                                                            </a>-->

                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url(); ?>admin/wanted_edit/<?php echo $property->id; ?>">
                                                                <span class="label label-warning">Edit</span>
                                                            </a>

                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url(); ?>admin/wanted_delete/<?php echo $property->id; ?>">
                                                                <span class="label label-danger">Delete</span>
                                                            </a>
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