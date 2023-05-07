<section class="content-header">

    <h3>Employee Management</h3>

</section>
<section class="content">
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="http://favr-susl.dev">Home</a></li>
            <li class="active">Employee Management</li>
            <li class="active">List Employees</li>
        </ol>
    </div>
    <div class="panel-heading clearfix" style="background-color: #823168">
        <h4 class="panel-title" style=" color: #FFFFFF;">List - Employee</h4>
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
                                                <table aria-describedby="example_info" role="grid" id="employee-list-table" class="display table table dataTable" style="width: 100%;">
                                                    <thead>
                                                    <tr role="row">
                                                        <th aria-label="Name: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                            Employee ID
                                                        </th>
                                                        <th aria-label="Name: activate to sort column ascending" style="width: 200px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                            Name
                                                        </th>
                                                        <th aria-label="Name: activate to sort column ascending" style="width: 160px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                            BP Location
                                                        </th>
                                                        <th aria-label="Name: activate to sort column ascending" style="width: 130px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                            Birth Day
                                                        </th>
                                                        <th aria-label="Name: activate to sort column ascending" style="width: 130px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                            Insurance ID
                                                        </th>
                                                        <th aria-label="Name: activate to sort column ascending" style="width: 130px;" colspan="1" rowspan="1" aria-controls="example" tabindex="0" class="sorting">
                                                            Passport No
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
                                                    foreach($employeesList as $index => $employee){
                                                        ?>
                                                        <tr class="{{ $index%2 == 0 ?'odd' : 'even'}}" role="row">

                                                            <td>
                                                                <?php echo sprintf("%03d", $employee->emp_id); ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $employee->first_name ." ". $employee->last_name; ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $this->load->model('Employee');
                                                                $bplocation = $this->Employee->getBPLocationNameById($employee->bp_location);
                                                                //var_dump($bplocation);
                                                                if($bplocation == null){

                                                                }else{
                                                                    echo $bplocation[0]->loc_name;
                                                                }


                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $employee->dob; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $employee->insurance_id; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $employee->passport_no; ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo base_url().'User/getUpdateEmployee/'.$employee->id; ?>"><span class="label label-warning">Edit</span></a>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo base_url().'User/getDeleteEmployee/'.$employee->id; ?>"><span class="label label-danger">Delete</span></a>
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