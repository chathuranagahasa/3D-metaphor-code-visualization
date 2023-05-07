<section class="content-header">

    <h3>Category Management</h3>

</section>
<section class="content">
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="active">Category Management</li>
            <li class="active">List Categories</li>
        </ol>
    </div>
    <div class="panel-heading clearfix" style="background-color: #823168">
        <h4 class="panel-title" style=" color: #FFFFFF;">List - Categories</h4>
    </div>

    <div class="panel panel-white">

        <div class="panel-body">
            <?php if ($this->session->flashdata('message_save_c')) { ?>
                <div class="alert alert-success"> <?php echo $this->session->flashdata('message_save_c') ?> </div>
            <?php } ?>

            <?php if ($this->session->flashdata('message_company_edit')) { ?>
                <div class="alert alert-success"> <?php echo $this->session->flashdata('message_company_edit') ?> </div>
            <?php } ?>

            <?php if ($this->session->flashdata('message_company_delete')) { ?>
                <div class="alert alert-danger"> <?php echo $this->session->flashdata('message_company_delete') ?> </div>
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
                                            <table aria-describedby="example_info" role="grid" id="employee-list-table" class="display table table dataTable" style="width: 100%;">
                                                <thead>
                                                <tr role="row">
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Name
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 200px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Description
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 160px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Sort No
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 160px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Parent
                                                    </th>

                                                    <th aria-label="Name: activate to sort column ascending" style="width: 130px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Status
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
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <?php
                                                foreach($categories as $index => $category){
                                                    ?>
                                                    <tr class="{{ $index%2 == 0 ?'odd' : 'even'}}" role="row">

                                                        <td>
                                                            <?php echo ucwords($category->name); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $category->description; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo ucwords($category->sort); ?>
                                                        </td>
                                                        <td>

                                                            <?php
                                                            if($category->parent != null){
                                                                $categoryx = $this->UserModelAdmin->getCategoryDetailsById($category->parent);
                                                                if($categoryx != null) {
                                                                    echo $categoryx[0]->name;
                                                                }
                                                            }else{
                                                                echo "None";
                                                            }



                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            echo $category->status; ?>
                                                        </td>

                                                        <td>
                                                            <a href="<?php echo base_url().'admin/update_category/'.$category->id; ?>"><span class="label label-warning">Edit</span></a>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url().'admin/delete_category/'.$category->id; ?>"><span class="label label-danger">Delete</span></a>
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