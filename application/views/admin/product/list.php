<section class="content-header">

    <h3>Property Management</h3>

</section>
<section class="content">
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="active">Property Management</li>
            <li class="active">List Properties</li>
        </ol>
    </div>
    <div class="panel-heading clearfix" style="background-color: #823168">
        <h4 class="panel-title" style=" color: #FFFFFF;">List - Properties</h4>
    </div>


    <div class="panel panel-white">

        <div class="panel-body">

            <?php if ($this->session->flashdata('message_suc_product')) { ?>
                <div class="alert alert-success"> <?= $this->session->flashdata('message_suc_product') ?> </div>
            <?php } ?>

            <?php if ($this->session->flashdata('message_featured')) { ?>
                <div class="alert alert-success"> <?= $this->session->flashdata('message_featured') ?> </div>
            <?php } ?>

            <?php if ($this->session->flashdata('message_delete_property')) { ?>
                <div class="alert alert-success"> <?= $this->session->flashdata('message_delete_property') ?> </div>
            <?php } ?>






            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <div class="box">
                        <div class="box-header">
                            <!--   <h3 class="box-title">Users List</h3> -->
                        </div>
                        <div class="box-body">

                            <div class="panel panel-white">
                                <div class="panel-body">


                                    <div class="table-responsive">
                                        <div class="dataTables_wrapper" id="example_wrapper">
                                            <table aria-describedby="example_info" role="grid" id="property-listing-table" class="display table table dataTable" style="width: 100%;">
                                                <thead>
                                                <tr role="row">
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                       REF ID
                                                    </th>
<!--                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">-->
<!--                                                        Brand-->
<!--                                                    </th>-->
<!--                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">-->
<!--                                                        Model-->
<!--                                                    </th>-->
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Condition
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Published Date
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Approved Date
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Expire Date
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Payment Method
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Payment Status
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Amount
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Is featured?
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Ad Status
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
                                                        <td><?php
                                                            $bodytype = $this->UserModelAdmin->getCategoryDetailsByCatId($property->body_type);
                                                            $payment = $this->PropertyModel->getPaymentDetailsByAdIdForRenew($property->property_id);
                                                            echo $property->ref_id; ?></td>
<!--                                                        <td>--><?php
//                                                            $model = $this->PropertyModel->getBrandNameById($property->brand);
//                                                            if(is_array($model) && count($model) != 0){
//                                                                echo $model[0]->name;
//                                                            }else{
//                                                                $modelTop = $this->PropertyModel->getTopBrandNameById($property->brand);
//                                                                echo (is_array($modelTop) && count($modelTop) != 0) ? $modelTop[0]->name : null;
//                                                            }
//                                                            ?><!--</td>-->
<!--                                                        <td>--><?php //echo $property->model; ?><!--</td>-->
                                                        <td><?php echo $property->condition_type; ?></td>
                                                        <td><?php

                                                            $date=date_create($property->posted_date);
                                                            echo date_format($date,"Y-m-d");

//                                                            if($property->price_on_request != 0){
//                                                                echo "Price On Request";
//                                                            }else{
//                                                                echo $property->price . " " . $property->price_type;
//                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php

                                                            if($property->approved_date != ""){
                                                                $date=date_create($property->approved_date);
                                                                echo date_format($date,"Y-m-d");
                                                            }

                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $payment = $this->PropertyModel->getPaymentDetailsByAdIdForRenew($property->property_id);

                                                            if($property->expire_date != ""){
                                                                $date=date_create($property->expire_date);
                                                                echo date_format($date,"Y-m-d");

                                                                if(($property->expire_date < date('Y-m-d'))  && $property->renew_pay_app_status == 0){
                                                                    ?>
                                                                    <b style="color: #ea2c19;">Expired</b>
                                                                    <?php

                                                                }elseif(($property->expire_date < date('Y-m-d')) && $property->renew_pay_app_status == 1){
                                                                    ?>
                                                                    <b style="color: #38b04c;">Renewed and Waiting for Approval</b>
                                                                    <?php
                                                                }
                                                            }

                                                            ?>

                                                        </td>

                                                        <td><?php

                                                            if(is_array($payment) && count($payment) != 0){
                                                                echo ucwords($payment[0]->description);
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php
                                                            if(is_array($payment) && count($payment) != 0){
                                                                if($payment[0]->status == 1){
                                                                    echo "Success";
                                                                }else{
                                                                    ?>
                                                                    <a href="<?php echo base_url(); ?>admin/payment_details/<?php echo $property->property_id; ?>">
                                                                        <?php
                                                                        echo "Pending";
                                                                        ?>
                                                                    </a>
                                                                    <?php
                                                                }

                                                            }
                                                            ?>
                                                        </td>

                                                        <td><?php

                                                            if(is_array($payment) && count($payment) != 0){
                                                                echo ucwords($payment[0]->amount);
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php
                                                            if(is_array($payment) && count($payment) != 0){
                                                                if($payment[0]->is_featured == 1){
                                                                    echo "featured";
                                                                }else{
                                                                    echo "No";
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>

                                                            <?php
                                                            if($property->approve_status == 1){
                                                                echo "Approved";
                                                            }else{
                                                                echo "Pending";
                                                            }


                                                            //var_dump($property->expire_date);
                                                            if($property->expire_date != ""){
                                                                if($property->expire_date < date('Y-m-d')){
                                                                    $this->PropertyModel->updateExpiredAds($property->property_id,$property->user_id);
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <!--                                                            <a href="--><?php //echo base_url(); ?><!--property/renew_ad/--><?php //echo $property->property_id; ?><!--">-->
                                                            <!--                                                                <span class="label label-success">Renew</span>-->
                                                            <!--                                                            </a>-->
                                                            <a href="<?php echo base_url(); ?>admin/edit/<?php echo $property->property_id; ?>">
                                                                <span class="label label-warning">Edit</span>
                                                            </a>
                                                            <a href="<?php echo base_url(); ?>admin/delete/<?php echo $property->property_id; ?>">
                                                                <span class="label label-danger">Delete</span>
                                                            </a>

                                                        </td>
                                                        <td>
                                                            <?php
                                                            if($property->approve_status == 0){
                                                                ?>
                                                                <a href="<?php echo base_url(); ?>admin/approved/<?php echo $property->property_id; ?>">
                                                                    <span class="label label-info">Approve Ad</span>
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

    </div>
</section>
</div>