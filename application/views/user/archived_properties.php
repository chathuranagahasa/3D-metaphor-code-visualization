<div style="padding-top: 80px; padding-bottom: 80px" id="popular-category">

    <section id="profile_setting">
        <div class="container">
            <div class="row">
                <?php include "navigation.php"; ?>
                <div class="col-md-8 col-sm-12">
                    <div class="my_property_list">
                        <div class="table-responsive">
                            <div class="dataTables_wrapper" id="example_wrapper">
                                <table aria-describedby="example_info" border="0" cellpadding="0" cellspacing="0" role="grid" id="property-list-table" class="list_table display table table dataTable" style="width: 100%;">
                                    <thead>
                                    <tr style="color: #ffffff;">
                                        <th aria-label="Name: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">Title</th>
                                        <th aria-label="Name: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">Price</th>
                                        <th aria-label="Name: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">Phone</th>
                                        <th aria-label="Name: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">Posted Date</th>
                                        <th aria-label="Name: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">Expire Date</th>
                                        <th aria-label="Name: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">Views</th>
                                        <th aria-label="Name: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting"></th>
                                    </tr>
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
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php
                                    foreach ($properties as $property){
                                        ?>
                                        <tr>
                                            <td><?php echo $property->title; ?></td>
                                            <td><?php echo $property->price . " " . $property->price_type; ?></td>
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
                                            <td>30</td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>property/renew_ad/<?php echo $property->property_id; ?>">
                                                    <span class="label label-success">Renew</span>
                                                </a>
                                                <a href="<?php echo base_url(); ?>property/edit/<?php echo $property->property_id; ?>">
                                                    <span class="label label-warning">Edit</span>
                                                </a>
                                                <a href="<?php echo base_url(); ?>property/delete/<?php echo $property->property_id; ?>">
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
    </section>
    <!-- Profile Setting End -->
</div>