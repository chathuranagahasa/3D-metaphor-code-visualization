<section class="content-header">

    <h3>Property Management</h3>

</section>
<section class="content">
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="http://favr-susl.dev">Home</a></li>
            <li class="active">Property Management</li>
            <li class="active">List Featured Properties</li>
        </ol>
    </div>
    <div class="panel-heading clearfix" style="background-color: #823168">
        <h4 class="panel-title" style=" color: #FFFFFF;">List - Featured Properties</h4>
    </div>


    <div class="panel panel-white">

        <div class="panel-body">


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
                                                        Customer Name
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Email
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Price
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Payment Date
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Description
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
                                                </tr>
                                                </tfoot>
                                                <tbody>

                                                <?php
                                                foreach ($featured_list as $property){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo ucwords($property->customer_name); ?></td>
                                                        <td><?php echo $property->email; ?></td>
                                                        <td><?php echo $property->amount; ?></td>
                                                        <td><?php
                                                            $date=date_create($property->payment_date);
                                                            echo date_format($date,"Y/m/d");
                                                            ?>
                                                        </td>
                                                        <td><?php
                                                            echo $property->description;
                                                            ?></td>
                                                        <td>
                                                            <a href="<?php echo base_url(); ?>property/renew_ad/<?php echo $property->vehicle_id; ?>">
                                                                <span class="label label-warning">Edit</span>
                                                            </a>

                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url(); ?>admin/edit/<?php echo $property->vehicle_id; ?>">
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