<section class="content-header">

    <h3>Property Management</h3>

</section>
<section class="content">
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="active">Property Management</li>
            <li class="active">Featured Vehicle</li>
        </ol>
    </div>
    <div class="panel-heading clearfix" style="background-color: #823168">
        <h4 class="panel-title" style=" color: #FFFFFF;">Featured - Vehicle</h4>
    </div>

    <div class="panel panel-white">

        <div class="panel-body">





            <div class="container">
                <?php $this->view('user/top-bar'); ?>

                <div class="row">


                    <div class="col-md-8 col-sm-12 col-xs-12">



                        <article class="blog-details" style="padding: 20px">
                            <div class="article-desc bg-1" style="background-color: #ffffff !important;">

                                <div class="post-title">

                                    <?php
                                    //                                    $current_date = date('d-m-Y H:i:s');
                                    //                                    $date = new DateTime("+3 months");
                                    //                                    echo $current_date;
                                    ?>
                                </div>
                                <div class="post-content" id="property-add-form">
                                    <h5></h5>
                                    <?php
                                    $form = array(
                                        'name' => 'featured_property_save',
                                        'id' => 'featured_property_save'
                                    );
                                    echo form_open_multipart('admin/store_featured_property', $form) ?>

                                    <div class="row">

                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="profile-update">
                                                <div class="profile-title">
                                                    <h5 style="color: #000;"></h5>
                                                </div>
                                                <div class="profile-desc">
                                                    <div class="row">
                                                        <div class="profile-top-form">

                                                            <?php
                                                            $session_array  = $this->session->userdata('logged_in_admin');
                                                            //var_dump($session_array);
                                                            ?>

                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="input-type">
                                                                    <label>Customer Name</label>
                                                                    <input type="hidden" id="user_id" name="user_id" value="<?php echo (count($session_array) != 0) ? $session_array['user_id'] : null; ?>">
                                                                    <input type="hidden" id="property_id" name="property_id" value="<?php echo $property_id; ?>">
                                                                    <input type="text" name="customer_name" id="customer_name" value="<?php echo set_value('customer_name'); ?>" class="form-control">
                                                                </div>
                                                                <div class="input-type">
                                                                    <label>Customer Email</label>
                                                                    <input type="text" name="customer_email" id="customer_email" value="<?php echo set_value('customer_email'); ?>" class="form-control">
                                                                </div>
                                                                <div class="input-type">
                                                                    <label>Amount (Rs.)</label>
                                                                    <input type="text" name="pro_price" value="<?php echo set_value('pro_price'); ?>" id="pro_price" class="form-control">
                                                                </div>
                                                                <div class="input-type">
                                                                    <label>Payment Slip Image</label>
                                                                    <input name="payment_slip_img" type="file" id="payment_slip_img"/>
                                                                </div>

                                                            </div>
                                                            <div class="profile-top-form-bottom">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="input-type">
                                                                        <label>Description</label>
                                                                        <textarea onkeyup="countChar(this)" name="ad_description" id="ad_description"><?php echo set_value('ad_description'); ?></textarea>
                                                                    </div>
                                                                    <span style="color: #990000;">Remaining character count - </span><span id="charNum"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="update-profile-submit">
                                                <button class="btn btn-flat btn-default" type="submit" style="margin-top:10px;border: none; color: #FFF;">Add Featured Vehicle</button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>

                        </article>

                    </div>
                </div>
            </div>







        </div><!-- end of the panel body-->

    </div>
</section>

</div>


