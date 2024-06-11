<?php include 'header.php'; ?>
<title>Competition</title>


    <div class="page-banner-area bg-2">
        <div class="container">
            <div class="page-banner-content">
                <h1>Competition</h1>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li>Online Art Competition</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="contact-us-area pt-100 pb-70">
        <div class="container">
            <div class="row">
            <div class="col-lg-6">
                    <div class="contact-and-address">
                        <h2>Rules And Regulation</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tem incididunt ut
                            labore et dolore magna aliquat enim minim veniam quis nostr exercitation labore et dolore
                            magna aliquat </p>
                        <div class="contact-and-address-content">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="contact-card">
                                        <div class="icon">
                                            <i class="ri-phone-line"></i>
                                        </div>
                                        <h4>Contact</h4>
                                        <p>Mobile: <a href="tel:+8819906886">(+88)-1990-6886</a></p>
                                        <p>Mail: <a
                                                href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#ea8985849e8b899eaa8f8e9f878b8686c4898587"><span
                                                    class="__cf_email__"
                                                    data-cfemail="a6d5c7c8d3e6c3c2d3cbc7cfca88c5c9cb">[email&#160;protected]</span></a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="contact-card">
                                        <div class="icon">
                                            <i class="ri-map-pin-line"></i>
                                        </div>
                                        <h4>Address</h4>
                                        <p>1800 Abbot Kinney Blvd.</p>
                                        <p>Unit D & E Venice</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="social-media">
                            <h3>Social Media</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tem incididunt ut
                                labore et dolore magna aliquat enim</p>
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank"><i
                                            class="flaticon-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.twitter.com/" target="_blank"><i
                                            class="flaticon-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="https://instagram.com/?lang=en" target="_blank"><i
                                            class="flaticon-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="https://linkedin.com/?lang=en" target="_blank"><i
                                            class="flaticon-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contacts-form">
                        <h3>Registration Form</h3>
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Your name</label>
                                        <input type="text" name="name" id="name" class="form-control" required
                                            data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Your email</label>
                                        <input type="email" name="email" id="email" class="form-control" required
                                            data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Your phone</label>
                                        <input type="text" name="phone_number" id="phone_number" required
                                            data-error="Please enter your number" class="form-control">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" name="msg_subject" id="msg_subject" class="form-control"
                                            required data-error="Please enter your subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Your message</label>
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="8"
                                            required data-error="Write your message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input name="gridCheck" value="I agree to the terms and privacy policy."
                                            class="form-check-input" type="checkbox" id="gridCheck" required>
                                        <label class="form-check-label" for="gridCheck">
                                            I agree to the <a href="terms-conditions.php">terms</a> and <a
                                                href="privacy-policy.php">privacy policy</a>
                                        </label>
                                        <div class="help-block with-errors gridCheck-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn">
                                        <span>Send message</span>
                                    </button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>                
            </div>
        </div>
    </div>


  <?php include 'footer.php'; ?>