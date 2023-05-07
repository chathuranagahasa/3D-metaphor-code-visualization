
    <?php
    $session_array  = $this->session->userdata('logged_in');
    ?>


            <div style="padding-top: 80px; padding-bottom: 80px" id="popular-category">

                <section id="profile_setting">
                    <div class="container">
                        <?php if ($this->session->flashdata('message_suc_acc_up')) { ?>
                            <div class="alert alert-success"> <?= $this->session->flashdata('message_suc_acc_up') ?> </div>
                        <?php } ?>
                        <div class="row">

                            <?php include "navigation.php"; ?>

                            <div class="col-md-8 col-sm-12 col-xs-12">

                <?php $this->view('user/dash_menu'); ?>

                <article class="blog-details">
                    <div class="article-desc bg-1">
                        <div class="post-title">
                            <h4>Change Password</h4><br>
                        </div>
                        <div class="post-content">

                            <div class="register-page-form">

                                <div class="validation_error">
                                    <?= validation_errors(); ?>
                                </div>
                                <?php
                                $form = array(
                                    'name' => 'update_password',
                                    'id' => 'update_password'
                                );
                                echo form_open('user/update_password', $form) ?>
                                <input type="hidden" name="user_id" value="<?php echo $session_array['userId']; ?>">
                                <label class="col-lg-3">Current Password</label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control" value="" name="cus_current_pass">
                                </div>
                                <label class="col-lg-3">New Password</label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control" value="" name="cus_new_pass">
                                </div>
                                <label class="col-lg-3">Confirm Password</label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control" value="" name="cus_confirm_pass">
                                </div>

                                <div class="register">
                                    <button type="submit" class="btn btn-default" name="sub_customer">Update</button>
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