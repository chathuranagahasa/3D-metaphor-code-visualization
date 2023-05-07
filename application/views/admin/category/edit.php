<style>
    .error{
        color: #d61011;
    }
</style>
<section class="content-header">

    <h3>Category Management</h3>

</section>
<section class="content">
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="active">Category Management</li>
            <li class="active">Update Category</li>
        </ol>
    </div>
    <div class="panel-heading clearfix" style="background-color: #823168">
        <h4 class="panel-title" style=" color: #FFFFFF;">Update - Category</h4>
    </div>

    <div class="panel panel-white">


        <div class="panel-body">
            <?php if ($this->session->flashdata('message_company_delete')) { ?>
                <div class="alert alert-danger"> <?php echo $this->session->flashdata('message_company_delete') ?> </div>
            <?php } ?>


            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!--<div class="box-header with-border">
                            <h3 class="box-title">Add New Employee </h3>
                        </div>--><!-- /.box-header -->
                        <!-- form start -->
                        <?php
                        $form = array(
                            'name' => 'createCategory',
                            'id' => 'createCategory'
                        );
                        echo form_open_multipart('Admin/updateCategoryDetails', $form) ?>
                        <!--  <form role="form" > -->
                        <?php
                        if(is_array($category) && count($category) != 0){
                            ?>


                        <div class="box-body">


                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="company_name"> Category Name </label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="hidden" value="<?php echo $category[0]->id; ?>" name="cat_id" id="cat_id">
                                    <input class="form-control" type="text" value="<?php echo $category[0]->name; ?>" name="category_name" id="category_name">
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>
                            <div class="form-horizontal">
                                <label class="col-sm-2 control-label" for="company_description"> Description </label>
                                <div class="col-xs-10">
                                    <textarea cols="10" rows="3" class="form-control" name="category_description" id="category_description"><?php echo $category[0]->description; ?></textarea>
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>
                            <div class="form-horizontal">
                                <div class="form-horizontal">
                                    <label class="col-sm-2 control-label" for="emp_bplocation">Parent Category </label>
                                    <div class="col-sm-4">
                                        <?php echo form_dropdown('parent_category',
                                            $categories,
                                            $category[0]->parent,'class="form-control" id="parent_category"') ?>
                                    </div>
                                    <label class="col-sm-12 control-label"></label>
                                </div>
                            </div>



                            <div class="form-horizontal" id="sort_div">
                                <label class="col-xs-2 control-label" for="company_contactno"> Sort Order </label>
                                <div class="col-xs-4">
                                    <input class="form-control" value="<?php echo $category[0]->sort; ?>" type="text" name="category_sort_order" id="category_sort_order">
                                </div>
                                <label class="col-sm-12 control-label"></label>
                            </div>


                            <div class="form-horizontal">

                                <label class="col-xs-2 control-label" for="user_designation">Status </label>
                                <div class="col-xs-4">
                                    <?php echo form_dropdown('user_status',
                                        array('0'=>'Select', 'active' => 'Active', 'inactive' => 'Inactive'),
                                        $category[0]->status,'class="selectpicker form-control" id="user_status" ') ?>

                                </div>

                                <label class="col-sm-12 control-label"></label>
                            </div>



                        </div><!-- /.box-body -->

                            <?php
                        }
                        ?>
                        <div class="box-footer">
                            <button type="submit" name="sub_company" id="sub_company" class="btn btn-warning btn-flat" style="padding-left:50px; padding-right:50px; margin-bottom : 20px">Update</button>

                        </div>
                        <!-- </form> -->

                    </div>
                </div>
            </div>
        </div><!-- end of the panel body-->

    </div>
</section>

</div>

