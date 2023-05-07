<div style="padding-top: 80px; padding-bottom: 80px" id="popular-category">

    <section id="profile_setting">
        <div class="container">
            <div class="row">
                <?php include "navigation.php"; ?>

            <div class="col-md-8 col-sm-12 col-xs-12">
                <?php if ($this->session->flashdata('message_suc_acc_up')) { ?>
                    <div class="alert alert-success"> <?= $this->session->flashdata('message_suc_acc_up') ?> </div>
                <?php } ?>
                <?php $this->view('user/dash_menu'); ?>

                <article class="blog-details">
                    <div class="article-desc bg-1">
                        <div class="post-title">
                            <h4>Update Profile</h4><br>
                        </div>
                        <div class="post-content" >

                            <div id="property-add-form">
                                <?php
                                $form = array(
                                    'name' => 'update_profile',
                                    'id' => 'update_profile'
                                );
                                echo form_open('user/update_profile', $form) ?>
                                <input type="hidden" name="user_id" value="<?php echo $session_array['userId']; ?>">
                                <label class="col-lg-3 control-label">First Name</label>
                                <div class="col-lg-9">
                                    <input type="text" class=" form-control" value="<?php echo $customer[0]->first_name; ?>" name="cus_firstname">
                                </div>
                                <label class="col-lg-3  control-label">Last Name</label>
                                <div class="col-lg-9">
                                    <input type="text" value="<?php echo $customer[0]->last_name; ?>" name="cus_lastname" class="form-control">
                                </div>

                                <label class="col-lg-3  control-label">Email Address</label>
                                <div class="col-lg-9">
                                    <input type="text" value="<?php echo $customer[0]->email_address; ?>" name="cus_email" class="form-control">
                                </div>
                                <label class="col-lg-3  control-label">Password</label>
                                <div class="col-lg-6">
                                    <input disabled type="password" value="<?php echo $customer[0]->password; ?>" name="cus_password" class="form-control">
                                </div>
                                <div class="col-lg-3  control-label">
                                    <a href="<?php echo base_url(); ?>user/change_password/<?php echo $session_array['userId'] ?>">Change Password</a>
                                </div>

                                <div class="agree-text col-md-12 i_am_cls" style="padding-left: 0 !important; padding-right: 0 !important; margin-left: 15px; margin-top: 10px; margin-bottom: 10px !important;">
                                    <?php if ($customer[0]->im_am_in == "agent"){ ?>
                                        <ul>
                                            <li class="col-lg-3"><span>I am</span></li>
                                            <li class="col-lg-3">
                                                <label class=" control-label">
                                                    <input type="hidden" name="cus_who_am_i" value="0">
                                                    <input type="radio" name="cus_who_am_i" value="owner" class="form-control">
                                                    <span>Owner</span>
                                                </label>
                                            </li>
                                            <li class="col-lg-3">
                                                <label class=" control-label">
                                                    <input type="radio" name="cus_who_am_i" checked value="agent" class="form-control">
                                                    <span>Agent</span>
                                                </label>
                                            </li>
                                            <li  class="col-lg-3">
                                                <label class=" control-label"><input type="radio" name="cus_who_am_i" value="developer" class="form-control">
                                                    <span>Developer</span>
                                                </label>
                                            </li>
                                        </ul>
                                    <?php }else if ($customer[0]->im_am_in == "owner"){ ?>
                                        <ul>
                                            <li class="col-lg-3"><span>I am</span></li>
                                            <li  class="col-lg-3">
                                                <label class=" control-label">
                                                    <input type="hidden" name="cus_who_am_i" value="0">
                                                    <input type="radio" name="cus_who_am_i" checked value="owner" class="form-control">
                                                    <span>Owner</span>
                                                </label>
                                            </li>
                                            <li  class="col-lg-3">
                                                <label class=" control-label">
                                                    <input type="radio" name="cus_who_am_i" value="agent" class="form-control">
                                                    <span>Agent</span>
                                                </label>
                                            </li>
                                            <li  class="col-lg-3">
                                                <label class=" control-label"><input type="radio" name="cus_who_am_i" value="developer" class="form-control">
                                                    <span>Developer</span>
                                                </label>
                                            </li>
                                        </ul>
                                    <?php }else if ($customer[0]->im_am_in == "developer"){ ?>
                                        <ul>
                                            <li class="col-lg-3"><span>I am</span></li>
                                            <li>
                                                <label class=" control-label">
                                                    <input type="hidden" name="cus_who_am_i" value="0">
                                                    <input type="radio" name="cus_who_am_i" value="owner" class="form-control">
                                                    <span>Owner</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class=" control-label">
                                                    <input type="radio" name="cus_who_am_i" value="agent" class="form-control">
                                                    <span>Agent</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class=" control-label"><input type="radio" name="cus_who_am_i" checked value="developer">
                                                    <span>Developer</span>
                                                </label>
                                            </li>
                                        </ul>
                                    <?php } ?>

                                </div>
                                <label class="col-lg-3">Country</label>
                                <div class="col-lg-9">
                                    <?php echo form_dropdown('cus_country',
                                        $countries,
                                        $customer[0]->country,'class="selectpicker form-control" id="cus_country" ') ?>
                                </div>

                                <div class="register">
                                    <button class="btn btn-default" type="submit" name="sub_customer">Update</button>
                                </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </article>

            </div>
        </div>
    </div>
    </section>
</div>
<!--Latest blog end-->