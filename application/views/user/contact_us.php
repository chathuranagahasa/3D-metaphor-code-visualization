<section id="contact">
    <div class="container">
        <h2 class="section_title_blue">Get <span>In Touch</span></h2>
        <div class="row">
            <div class="col-md-6">
                <div class="contact_area">
                    <p>We welcome any feedback that you may have to improve our site. Please fill in the form below with your feedback and submit it to us. </p>
                    <form id="contact-form" class="contact_message" action="email.php" method="post">
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-6">
                                <input class="form-control" id="firstname" type="text" name="firstname" placeholder="First Name">
                            </div>
                            <div class="form-group col-md-6 col-sm-6">
                                <input class="form-control" id="lastname" type="text" name="lastname" placeholder="Last Name">
                            </div>
                            <div class="form-group col-md-6 col-sm-6">
                                <input class="form-control" id="email" type="text" name="email" placeholder="Email Address">
                            </div>
                            <div class="form-group col-md-6 col-sm-6">
                                <input class="form-control" id="subject" type="text" name="subject" placeholder="Enter Subject">
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <textarea class="form-control" id="message" name="message" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <input id="send" class="btn btn-default" type="submit" value="Send">
                            </div>
                            <div class="col-md-12">
                                <div class="error-handel">
                                    <div id="success">Your email sent Successfully, Thank you.</div>
                                    <div id="error"> Error occurred while sending email. Please try again later.</div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6" style="background-color: #ffffff">
                <div class="row">
                    <div class="col-md-12" style="padding-top: 20px">
                        <div class="contact_right">
                            <h5 class="inner-title" style="text-decoration: underline">OFFICE ADDRESS</h5>
                            <p>
                                Ullandupitiya Road, <br>Werellagama, <br>Kandy 20000</p>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top: 20px">
                        <div class="contact_right">
                            <h5 class="inner-title" style="text-decoration: underline">Contact Info</h5>
                            <p><b>Phone :</b> (+94) 71 445 3417</p>
                            <p><b>Email :</b> ceylonautotrade@gmail.com</p>
                            <p><b>Whats App / Viber :</b> (+94) 71 445 3417</p>
                        </div>
                    </div>
                </div>

            </div>

<!--            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
<!--                <div class="contact_map">-->
<!--                    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d8168.884797914333!2d80.57768971638404!3d7.329295901082769!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sUllandupitiya+Road%2C+Werellagama%2C+Kandy!5e0!3m2!1sen!2slk!4v1525889688563" width="auto" height="300" frameborder="0" style="border:1px solid #cccccc" allowfullscreen></iframe>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Register Section Start -->
<section id="register-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="reg_banner">
                    <h4 class="reg_banner_title">Are you looking for a Customer for your Vehicle sale?</h4>
                    <span>Please click the button for register, we will become your best agent and help you for both.</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="register_btn">
                    <a href="<?php echo base_url(); ?>vehicle" class="btn btn-primary">Register Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Register Section End -->