<section class="content-header">

    <h3>Services Management</h3>

</section>
<section class="content">
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="http://favr-susl.dev">Home</a></li>
            <li class="active">Services Management</li>
            <li class="active">List Services</li>
        </ol>
    </div>
    <div class="panel-heading clearfix" style="background-color: #823168">
        <h4 class="panel-title" style=" color: #FFFFFF;">List - Services</h4>
    </div>


    <div class="panel panel-white">

        <div class="panel-body">

            <?php if ($this->session->flashdata('message_suc_product')) { ?>
                <div class="alert alert-success"> <?= $this->session->flashdata('message_suc_product') ?> </div>
            <?php } ?>
            <?php if ($this->session->flashdata('message_service_edit')) { ?>
                <div class="alert alert-success"> <?= $this->session->flashdata('message_service_edit') ?> </div>
            <?php } ?>
            <?php if ($this->session->flashdata('message_delete_property_service')) { ?>
                <div class="alert alert-success"> <?= $this->session->flashdata('message_delete_property_service') ?> </div>
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
                                                        Title
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Service Type
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Locations
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Service Category
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        name
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        email
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        phone
                                                    </th>
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
                                                </tr>
                                                </tfoot>
                                                <tbody>

                                                <?php
                                                foreach ($services as $service){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo ucwords($service->title); ?></td>
                                                        <td><?php
                                                            $property_type = $this->PropertyModel->getServiceTypeNameById($service->service_type);
                                                            if(count($property_type) != 0){
                                                                echo $property_type[0]->name;
                                                            }
                                                            ?></td>
                                                        <td><?php echo $service->locations; ?></td>
                                                        <td><?php echo $service->service_category; ?></td>
                                                        <td><?php echo $service->name; ?></td>
                                                        <td><?php echo $service->email; ?></td>
                                                        <td><?php
                                                            echo $service->phone;
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url(); ?>admin/edit_service/<?php echo $service->id; ?>">
                                                                <span class="label label-warning">Edit</span>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url(); ?>admin/delete_service/<?php echo $service->id; ?>">
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