<section class="content-header">

    <h3>User Management</h3>

</section>
<section class="content">
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="active">User Management</li>
            <li class="active">List Users</li>
        </ol>
    </div>
    <div class="panel-heading clearfix" style="background-color: #823168">
        <h4 class="panel-title" style=" color: #FFFFFF;">List - Users</h4>
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
                                                        Phone
                                                    </th>
                                                    <th aria-label="Name: activate to sort column ascending" style="width: 130px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                        Role
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
                                                    <th colspan="1" rowspan="1">

                                                    </th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <?php
                                                foreach($usersList as $index => $user){
                                                    ?>
                                                    <tr class="{{ $index%2 == 0 ?'odd' : 'even'}}" role="row">

                                                        <td>
                                                            <?php echo sprintf("%03d", $user->user_id); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $user->first_name ." ". $user->last_name; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $user->email; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $user->phone; ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                                $role = $this->UserModelAdmin->getUserRoleById($user->user_role);
                                                                //var_dump($bplocation);
                                                                if(is_array($role) && count($role) != 0){
                                                                    echo $role[0]->name;
                                                                }else{
                                                                }
                                                            //var_dump($user->designation); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo ucwords($user->status); ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url().'admin/update_user/'.$user->user_id; ?>"><span class="label label-warning">Edit</span></a>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url().'admin/delete_user/'.$user->user_id; ?>"><span class="label label-danger">Delete</span></a>
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