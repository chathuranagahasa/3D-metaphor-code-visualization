<section class="content-header">

    <h3>User Management</h3>

</section>
<section class="content">
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="active">Payment Management</li>
            <li class="active">List Users</li>
        </ol>
    </div>
    <div class="panel-heading clearfix" style="background-color: #823168">
        <h4 class="panel-title" style=" color: #FFFFFF;">Enrollments</h4>
    </div>

    <div class="panel panel-white">

        <div class="panel-body">


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
                                            <table aria-describedby="example_info" role="grid" id="admin-user-list-table" class="display table table dataTable" style="width: 100%;">
                                                <thead>
                                                <tr role="row">
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        User ID
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 200px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Name
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 130px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Email
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 160px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Payment Date
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 160px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Payment Time
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 130px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Ad Duration
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 130px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Transaction ID
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 130px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Payment Method
                                                    </th>
                                                    <th colspan="1" rowspan="1" class="nosorting" style="width: 50px;">

                                                    </th>
                                                    <th colspan="1" rowspan="1" class="nosorting" style="width: 50px;">

                                                    </th>
                                                    <th colspan="1" rowspan="1" class="nosorting" style="width: 50px;">

                                                    </th>
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
                                                <?php foreach ($enrolls as $enroll){
                                                    //var_dump($enroll);
                                                    $property = $this->PropertyModel->getPropertyDetailsByPropertyIdAdmin($enroll->ad_id);
                                                   ?>
                                                        <tr>
                                                            <td><?php
                                                                echo $enroll->user_id;  ?></td>
                                                            <td><?php
                                                                echo (is_array($property) && count($property) ? $property[0]->ref_id : null) ?></td>
                                                            <td><?php
                                                                echo (is_array($property) && count($property) ? $property[0]->contact_email : null) ?></td>
                                                            <td><?php
                                                                echo $enroll->payment_date;
                                                                ?>
                                                            </td>
                                                            <td><?php
                                                                $datetime = new DateTime(date( $enroll->payment_time));
                                                                $la_time = new DateTimeZone('Asia/Colombo');
                                                                $datetime->setTimezone($la_time);
                                                                $current_time = $datetime->format('H:i');

                                                                echo date("h:i a", strtotime($current_time));
                                                                ?></td>
                                                            <td><?php
                                                                $dur = $this->PropertyModel->getDurationDetailsById($enroll->duration);
                                                                echo (is_array($dur) && count($dur) ? $dur[0]->name : null);
                                                                ?></td>

                                                            <td><?php

                                                                echo $enroll->transactionId;


                                                                ?></td>
                                                            <td><?php echo $enroll->payment_method; ?></td>
                                                            <td><?php echo  number_format($enroll->amount); ?></td>
                                                            <td>
                                                                <?php

//                                                                    if($enroll->pay_slip != null) {
//                                                                        ?>
<!--                                                                        <a target="_blank"-->
<!--                                                                           href="--><?php //echo base_url()."assets/uploads/pay_slips/" . $enroll->pay_slip; ?><!--">Click-->
<!--                                                                            Here</a>-->
<!--                                                                        --><?php
//                                                                    }else{
//
//                                                                        echo "No Attachments";
//                                                                        ?>
<!--                                                                --><?php
//                                                                    }


                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if($enroll->status == 0){
                                                                    ?>
                                                                    <a href="<?php echo base_url(); ?>admin/approve_payment_fund/<?php echo $enroll->id;  ?>/<?php echo $enroll->duration;  ?>" class="btn btn-success btn-xs">Approve</a>
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                    <a href="<?php echo base_url(); ?>admin/disapprove_payment_fund/<?php echo $enroll->id;  ?>" class="btn btn-danger btn-xs">Disapprove</a>
                                                                    <a class="btn btn-default btn-flat btn-xs" disabled="disabled">Approved Payment</a>
                                                                    <?php
                                                                }
                                                                ?>

                                                            </td>
                                                        </tr>
                                                    <?php
                                                }?>
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