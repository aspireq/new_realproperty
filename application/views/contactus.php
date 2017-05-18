<?php echo $header; ?>

<section id="contact" class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="row card p-b-20">
                    <div class="col-md-12">
                        <h3 class="maintitle">Contact <span class="red">Us</span></h3>
                        <p>We would love to hear from you!
                            Call us on our India number +91-840179199 or Fill the form below</p>
                    </div>
                    <hr/>
                    <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">

                        <p class="red">* For faster respond please include your support pin although it is not mandatory.</p>
                        <br/>
                        <form class="contactform row" method="post">
                            <?php
                            if ($message != "" && $message == "Email has been sent successfully") {
                                ?>
                                <div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <?php echo $message; ?>
                                </div>
                                <?php
                            } else if ($message != "") {
                                ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <?php echo $message; ?>
                                </div>
                            <?php } ?>
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="name">Name:<sup>*</sup></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required="">
                            </div>
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="contact_no">Contact No.:</label>
                                <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Contact No." required="" maxlength="10">
                            </div>
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="email">Email:<sup>*</sup></label>
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email" required="">
                            </div>
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="subject">Subject:</label>
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required="">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="message">Message:<sup>*</sup></label>
                                <textarea  class="form-control" rows="3" name="message"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-main btn-primary pull-right ">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                        <div class="media">
                            <div class="media-left contact-icon">
                                <img class="media-object" src="<?php echo base_url(); ?>includes/img/email.png" alt="email">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Email</h4>
                                <p>property@realgujarat.com</p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left contact-icon">
                                <img class="media-object" src="<?php echo base_url(); ?>includes/img/contact.png" alt="email">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Phone</h4>
                                <p>+91-8401791999</p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left contact-icon">
                                <img class="media-object" src="<?php echo base_url(); ?>includes/img/address.png" alt="email">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Address</h4>
                                <address>Aspire Web Services Pvt Ltd<br/>
                                    2nd Floor Satyam Complex<br/>
                                    Jawhar Chowk Maninagar <br/>
                                    Ahmedabad Gujarat India<br/>
                                    380008
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $footer; ?>
