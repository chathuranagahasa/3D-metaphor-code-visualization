<!--Latest blog start-->
<div class="blog-pages pt-130" style="padding-top: 50px !important;">

    <div class="container">
        <?php $this->view('user/top-bar'); ?>
        <div class="row">
            <?php if ($this->session->flashdata('message_suc_acc_up')) { ?>
                <div class="alert alert-success"> <?= $this->session->flashdata('message_suc_acc_up') ?> </div>
            <?php } ?>
            <?php if ($this->session->flashdata('message_suc_property')) { ?>
                <div class="alert alert-success"> <?= $this->session->flashdata('message_suc_property') ?> </div>
            <?php } ?>
            <?php if ($this->session->flashdata('message_delete_property')) { ?>
                <div class="alert alert-danger"> <?= $this->session->flashdata('message_delete_property') ?> </div>
            <?php } ?>

            <?php $this->view('user/navigation'); ?>

            <div class="col-md-9 col-sm-12 col-xs-12">

                <?php

                if($this->uri->segment(2) == "dashboard"){

                }else if($this->uri->segment(2) == "properties"){

                }else if($this->uri->segment(2) == "dashboard"){

                }else if($this->uri->segment(2) == "dashboard"){

                }

                ?>
                <article class="blog-details">
                    <div class="article-desc bg-1">
                        <div class="post-title">
                            <h4>Properties - Wanted</h4>
                        </div>
                        <div class="post-content">

                            <div class="table-responsive">
                                <div class="dataTables_wrapper" id="example_wrapper">
                                    <table aria-describedby="example_info" role="grid" id="user-list-table" class="display table table dataTable" style="width: 100%;">
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
<!--                                            <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">-->
<!--                                                Description-->
<!--                                            </th>-->
<!--                                            <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">-->
<!--                                                Status-->
<!--                                            </th>-->
<!--                                            <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">-->
<!--                                                Views-->
<!--                                            </th>-->
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

                                        </thead>
                                        <tfoot>
                                        <tr>

                                            <th colspan="1" rowspan="1">

                                            </th>
                                            <th colspan="1" rowspan="1">

                                            </th>
                                            <th colspan="1" rowspan="1">

                                            </th>
<!--                                            <th colspan="1" rowspan="1">-->
<!---->
<!--                                            </th>-->
                                            <th colspan="1" rowspan="1">

                                            </th>
                                            <th colspan="1" rowspan="1">

                                            </th>
                                            <th colspan="1" rowspan="1">

                                            </th>
                                            <th colspan="1" rowspan="1">

                                            </th>
<!--                                            <th colspan="1" rowspan="1">-->
<!---->
<!--                                            </th>-->
                                        </tr>
                                        </tfoot>
                                        <tbody>

                                        <?php
                                        foreach ($properties as $property){
                                            $this->load->model('PropertyModel');
                                            $main = $this->PropertyModel->getMainTypeById($property->main_type);
                                            $sub = $this->PropertyModel->getSubTypeBySubTypeId($property->sub_type);
                                            ?>
                                            <tr>
                                                <td><?php echo (count($main) != 0) ? $main[0]->name : null; ?></td>
                                                <td><?php echo (count($sub) != 0) ? $sub[0]->name : null; ?></td>
                                                <td><?php echo $property->title; ?></td>

<!--                                                <td>--><?php //echo $property->description; ?><!--</td>-->
<!--                                                <td>--><?php //echo "active"; ?><!--</td>-->
<!--                                                <td>--><?php //echo "30"; ?><!--</td>-->
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
                                                    <a href="<?php echo base_url(); ?>property/renew_ad/<?php echo $property->id; ?>">
                                                        <span class="label label-success">Renew</span>
                                                    </a>
                                                    <a href="<?php echo base_url(); ?>property/wanted_edit/<?php echo $property->id; ?>">
                                                        <span class="label label-warning">Edit</span>
                                                    </a>
                                                    <a href="<?php echo base_url(); ?>property/wanted_delete/<?php echo $property->id; ?>">
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

                </article>

            </div>
        </div>
    </div>
</div>
<!--Latest blog end-->