<?php include 'header.php'; ?>
<title>Competition</title>
<style>
.prize-list ul li {
    list-style: none;
}

.prize-list ul li i {
    padding-right: 10px;
    color: #e32845;
}
span.error {
    display: none;
}
</style>

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


<div class="contact-us-area pt-100 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-and-address">
                    <h2>Canvas Painting Workshop</h2>
                    <h2><b>Date: June 25, 2024</b></h2>
                    <p>Join us for an immersive Canvas Painting Workshop at Gifa Art College! This workshop is designed
                        for both beginners and experienced artists looking to refine their skills and explore new
                        techniques. Led by the renowned artist Sarah Thompson, this is an opportunity to learn from the
                        best and enhance your artistic journey. </p>
                    <h2>Organized by Gifa Art College</h2>

                    <div class="contact-and-address-content">
                        <div class="row">
                            <div class="col-lg-10 col-md-10">
                                <div class="contact-card">
                                    <div class="icon">
                                        <i class="ri-notification-2-line"></i>
                                    </div>
                                    <h4>Workshop Details:</h4>
                                    <p>Instructor: Mr. Gagandeep, Artist</p>
                                    <p>Date: June 25, 2024</p>
                                    <p>Time:10:00 AM - 4:00 PM </p>
                                    <p>Location:Gifa Art College, Main Hall</p>
                                    <p>FEES 1999/- ONLY WITH ALL MATERIAL INCLUDE</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="social-media">
                        <h3>Join us for a day of creativity and learning at Gifa Art College!</h3>
                        <p>To complete your registration, please follow the link below to fill out the registration form
                            and submit your payment. If you have any questions or need further assistance, feel free to
                            reach out to us on WhatsApp or through the contact information provided below.</p>
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/gifacollege/" target="_blank"><i
                                        class="flaticon-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/gifa_arts_college/" target="_blank"><i
                                        class="flaticon-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://api.whatsapp.com/send?phone=919992588777&text=Thank%20You%20for%20Contacting%20Us!"
                                    target="_blank"><i class="ri-whatsapp-fill"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contacts-form">
                    <h3>Registration Form</h3>
                    <form action="" method="post" autocomplete="off">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <label>Your name<span class="error">* <?php echo $nameErr; ?></span> </label>                                   
                                    <input type="text" name="c_name" class="form-control" required
                                       pattern="^[a-zA-Z\s]+$"
                                        title="Name can only contain letters and spaces">                                   
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <label>Your email <span class="error">* <?php echo $emailErr; ?></span></label>
                                    <input type="email" name="c_email"  class="form-control" required
                                        >                                    
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <label>Your phone <span class="error">* <?php echo $phoneErr; ?></span></label>
                                    <input type="tel" name="contact_phone"  required
                                         class="form-control" pattern="\d{10}"
                                        title="Please enter a valid 10-digit phone number">
                                   
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <label>Subject <span class="error">* <?php echo $subErr; ?></span></label>
                                    <input type="text" name="contact_subject"  class="form-control" required
                                       >                                    
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Your message</label>
                                    <textarea name="comment" class="form-control"  cols="30" rows="6"
                                        ></textarea>                                   
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <input type="submit" name="c_submit" value="Submit" class="default-btn">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="prize-section pb-70">
    <div class="container">
        <h2>Additional Information:</h2>
        <p><b>Judging Criteria: </b>Artworks will be judged based on originality, technique, composition, and overall
            impact.</p>
        <p><b>Announcement of Winners: </b>Winners will be announced at the end of the workshop during the feedback and
            Q&A session.</p>
        <p><b>Eligibility:</b> All registered participants of the workshop are eligible to compete for these prizes.</p>
        <div class="prize-list">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <h3>Pay the Registration fees</h3>
                    <ul>
                        <li><i class="ri-checkbox-circle-line"></i>Single Art Work ₹500</li>
                        <li><i class="ri-checkbox-circle-line"></i>Two Art Work ₹700</li>
                        <li><i class="ri-checkbox-circle-line"></i>Three Art Work ₹900</li>
                        <li><i class="ri-checkbox-circle-line"></i>Four Art Work ₹1000</li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4">
                    <h3>International Participants</h3>
                    <ul>
                        <li><i class="ri-checkbox-circle-line"></i>Single Art Work $15</li>
                        <li><i class="ri-checkbox-circle-line"></i>Two Art Work $20</li>
                        <li><i class="ri-checkbox-circle-line"></i>Three Art Work $25</li>
                        <li><i class="ri-checkbox-circle-line"></i>Three Art Work $30</li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4">
                    <h3>Lifetime Member</h3>
                    <ul>
                        <li><i class="ri-checkbox-circle-line"></i>Single Art Work ₹300</li>
                        <li><i class="ri-checkbox-circle-line"></i>Two Art Work ₹500</li>
                        <li><i class="ri-checkbox-circle-line"></i>Three Art Work ₹700</li>
                        <li><i class="ri-checkbox-circle-line"></i>Four Art Work ₹800</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>
<?php include 'competition_form.php'; ?>