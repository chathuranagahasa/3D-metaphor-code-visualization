<!--Latest blog start-->
<div class="blog-pages pt-130" style="padding-top: 50px !important;">



    <div class="container">
        <?php $this->view('user/top-bar'); ?>

        <div class="row">
            <?php if ($this->session->flashdata('message_suc_acc_up')) { ?>
                <div class="alert alert-success"> <?= $this->session->flashdata('message_suc_acc_up') ?> </div>
            <?php } ?>

            <?php $this->view('user/navigation'); ?>

            <div class="col-md-8 col-sm-12 col-xs-12">

                <?php $this->view('user/dash_menu'); ?>

                <article class="blog-details">
                    <div class="article-desc bg-1">
                        <?php if ($this->session->flashdata('message_error_property')) { ?>
                            <div class="alert alert-danger"> <?= $this->session->flashdata('message_error_property') ?> </div>
                        <?php } ?>

                        <div class="post-title">
                            <h4 style="font-weight: 600 !important;">Delete Property - Wanted</h4>
                            <?php
                            $current_date = date('d-m-Y H:i:s');
                            $date = new DateTime("+3 months");
                            //echo $current_date;
                            ?>
                        </div>
                        <div class="post-content" id="property-add-form">
                            <h5></h5>
                            <?php
                            $form = array(
                                'name' => 'property_wanted_delete',
                                'id' => 'property_wanted_delete'
                            );
                            echo form_open_multipart('property/delete_property_wanted', $form) ?>

                            <div class="row">
                                <?php
                                $session_array  = $this->session->userdata('logged_in');
                                //var_dump($session_array);
                                ?>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="profile-update">
                                        <div class="profile-title">
                                            <h5 style="color: #000;">What type of property do you want?</h5>
                                        </div>
                                        <div class="profile-desc">
                                            <div class="row">
                                                <div class="profile-top-form">
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input-type">
                                                            <label>Property Type</label>
                                                            <input type="hidden" name="user_id" value="<?php echo (count($session_array) != 0) ? $session_array['userId'] : null; ?>">
                                                            <?php echo form_dropdown('pro_property_type',
                                                                $main_properties,
                                                                (count($property) != 0) ? $property[0]->main_type : null,'class="form-control" id="pro_property_type" ') ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <?php

                                                        $this->load->model('PropertyModel');
                                                        if(count($property) != 0){
                                                            $subType = $this->PropertyModel->getSubTypeBySubTypeId($property[0]->sub_type);
                                                        }
                                                        ?>
                                                        <input type="hidden" name="property_id" id="property_id" value="<?php echo ((count($property) != 0) ? $property[0]->id : null ) ?>">
                                                        <input type="hidden" name="selected_sub_type" id="selected_sub_type" value="<?php echo ((count($property) != 0) ? $property[0]->sub_type : null ) ?>">
                                                        <input type="hidden" name="selected_sub_type_name" id="selected_sub_type_name" value="<?php echo $subType[0]->name; ?>">

                                                        <div class="input-type">
                                                            <label>Sub Type</label>
                                                            <select name="pro_property_sub_type" id="pro_property_sub_type" class="form-control">
                                                                <option value="0">Select</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="input-type">
                                                            <label>Title</label>
                                                            <input type="text" name="property_title" id="property_title" value="<?php echo (count($property) != 0) ? $property[0]->title : null; ?>" class="form-control" placeholder="Eg : 2 Bed Room Apartment with Sea View">
                                                        </div>
                                                    </div>
                                                    <div class="profile-top-form-bottom">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="input-type">
                                                                <label>Description</label>
                                                                <textarea onkeyup="countChar(this)" name="textarea-desc-property" id="textarea-desc-property"><?php echo (count($property) != 0) ? $property[0]->description : null; ?></textarea>
                                                            </div>
                                                            <span style="color: #990000;">Remaining character count - </span><span id="charNum"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="profile-title" style="margin-top: 20px">
                                            <h5>Please review your contact details</h5>
                                            <p style="margin-top: 15px; font-size: 12px">
                                                Make sure your details are updated so our users can easily contact you at the right channel.
                                            </p>
                                        </div>
                                        <div class="profile-desc">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="input-type">
                                                        <label>Name and Surname</label>
                                                        <input type="text" class="form-control" value="<?php echo (count($property) != 0) ? $property[0]->contact_name : null; ?>" name="pro_contact_name" id="pro_contact_name" data-language='en' id="pro_contact_name">
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="input-type">
                                                        <label>Contact Email</label>
                                                        <input type="text" class="form-control" value="<?php echo (count($property) != 0) ? $property[0]->contact_email : null; ?>" name="pro_contact_email" id="pro_contact_email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                    <div class="input-type">
                                                        <label>Phone (Mobile)</label>
                                                        <input type="text" class="form-control" value="<?php echo (count($property) != 0) ? $property[0]->phone_mobile : null; ?>" name="pro_contact_phone" id="pro_contact_phone">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                    <div class="input-type">
                                                        <label>Phone (Home)</label>
                                                        <input type="text" class="form-control" value="<?php echo (count($property) != 0) ? $property[0]->phone_home : null; ?>" name="pro_contact_home" id="pro_contact_home">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="update-profile-submit">
                                        <button type="submit">Delete Ad</button>
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
</div>
<!--Latest blog end-->