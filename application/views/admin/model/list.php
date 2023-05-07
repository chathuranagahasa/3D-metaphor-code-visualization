<section class="content-header">

    <h3>User Management</h3>

</section>
<section class="content">
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="active">Model Management</li>
            <li class="active">List Model</li>
        </ol>
    </div>
    <div class="panel-heading clearfix" style="background-color: #823168">
        <h4 class="panel-title" style=" color: #FFFFFF;">List - Models</h4>
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
                                            <h3><b>Models</b></h3>
                                            <table aria-describedby="example_info" role="grid" id="admin-user-list-table" class="display table table dataTable" style="width: 100%;">
                                                <thead>
                                                <tr role="row">
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Model ID
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 200px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Name
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
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <?php
                                                foreach($modelList as $index => $model){
                                                    ?>
                                                    <tr class="{{ $index%2 == 0 ?'odd' : 'even'}}" role="row">

                                                        <td>
                                                            <?php echo $model->model_id; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $model->name; ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url().'admin/update_model/'.$model->model_id; ?>"><span class="label label-warning">Edit</span></a>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url().'admin/delete_model/'.$model->model_id; ?>"><span class="label label-danger">Delete</span></a>
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