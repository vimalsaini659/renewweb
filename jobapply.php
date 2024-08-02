<?php
include 'header.php'; 

?>
<style>
section.career {
    padding-top: 100px;
    padding-bottom: 100px;
}

.form-content {
    padding-left: 40px;
}

.form-content .givearing {
    color: #e32845;
    font-size: 42px;
    text-transform: uppercase;
    font-weight: 600;
    margin-bottom: 0;
}

.ultext {
    font-size: 20px;
    padding: 0;
    position: relative;
    margin-left: 7px;
}

.ultext li {
    list-style: none;
    font-weight: 500;
    padding: 6px 0 6px 20px;
    color: #00507d;
}

ul.cv-boxm li {
    font-size: 1.125rem;
    list-style: none;
}

.form_bg h2 {
    color: white;
}

ul.cv-boxm li a {
    margin: .4375rem;
    float: left;
    font-weight: 600;
    color: #ff7800;
}

.form_bg h2 {
    color: white;
}

span.career-icon i {
    margin-right: 14px;
}

span.error {
    color: red;
}
/* input.btn-submit {
    background-color: #ff7800;
    color: #fff;
    border: none;
    width: 100%;
    font-size: 20px;
    padding: 20px 0px;
    border-radius: 4px;
} */
input.btn-submit {
    margin-top: 18px;
    background-color: #e32845;
    color: #fff;
    border: none;
    width: 100%;
    font-size: 20px;
    padding: 20px 0px;
    border-radius: 4px;
}

.form_bg {
    background: #111d5e;
    box-shadow: 1px 1px 20px 0 #afafaf;
    color: #fff;
    height: 100%;
    padding: 30px;
}

.file-area {
    width: 100%;
    position: relative;
}

.file-area input[type=file] {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    opacity: 0;
    cursor: pointer;
}

.file-area .file-dummy {
    width: 100%;
    padding: 1.875rem;
    background: rgba(255, 255, 255, 0.2);
    border: .125rem dashed rgba(255, 255, 255, 0.2);
    text-align: center;
    transition: background 0.3s ease-in-out;
}

.file-area .file-dummy .success {
    display: none;
}

.file-area:hover .file-dummy {
    background: rgba(255, 255, 255, 0.1);
}

.file-area input[type=file]:focus+.file-dummy {
    outline: .125rem solid rgba(255, 255, 255, 0.5);
    outline: -webkit-focus-ring-color auto .3125rem;
}

.file-area input[type=file]:valid+.file-dummy {
    border-color: rgba(0, 255, 0, 0.4);
    background-color: rgba(0, 255, 0, 0.3);
}

.file-area input[type=file]:valid+.file-dummy .success {
    display: inline-block;
}

.file-area input[type=file]:valid+.file-dummy .default {
    display: none;
}

.career-content {
    background-color: #f9f9f9;
    box-shadow: 0rem 0rem .1875rem #cccc;
}
</style>

<section class="career">
    <div class="container">

        <div class="section-title">
            <h2>JOBS</h2>
            <h3>Find the perfect <span>Jobs</span></h3>
            <p class="text-muted mb-0 para-desc">Join professional associations or organizations related to your field.
            </p>
        </div>
        <div class="career-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-content">
                        <h3>JOIN OUR TEAM</h3>
                        <p>Vacancies/Job: Apply today for better Career</p>
                        <p class="givearing">WE&apos;RE HIRING!</p>
                        <p class="mobnum">Welcome to our Job Application. We're excited that you're interested in joining our team. At <b>GIFA ART COLLEGE</b>, we believe that every individual's unique talents and perspectives contribute to our collective success. We are committed to fostering an inclusive and diverse work environment where all employees can thrive and grow.</p>
                        <ul class="ultext">
                            <li><span class="career-icon"><i class="flaticon-next"></i></span>PAPER CRAFT</li>
                            <li><span class="career-icon"><i class="flaticon-next"></i></span>NTT</li>
                            <li><span class="career-icon"><i class="flaticon-next"></i></span>Ignite Your Ambition</li>
                            <li><span class="career-icon"><i class="flaticon-next"></i></span>YOGA</li>
                            <li><span class="career-icon"><i class="flaticon-next"></i></span>COMPUTER</li>
                            <li><span class="career-icon"><i class="flaticon-next"></i></span>FINE ARTS</li>
                            <li><span class="career-icon"><i class="flaticon-next"></i></span>ART & CRAFT</li>
                            <li><span class="career-icon"><i class="flaticon-next"></i></span>DRAW & COLOR</li>
                            <li><span class="career-icon"><i class="flaticon-next"></i></span>Gifa Art College</li>
                        </ul>
                        <p class="accby">Apply Now</p>
                        <p>Send Your CV and Cover Letter To</p>
                        <div class="cv-box">
                            <ul class="cv-boxm">
                                <li><a href="mailto:gifaartcollege@gmail.com"><i class="bi bi-envelope"></i>
                                        gifaartcollege@gmail.com</a></li>
                                <li><a href="tel:+919992588777"><i class="fas fa-phone-square"></i>+919992588777</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
         
                <div class="col-md-6">
                <?php include 'career_email.php'; ?>
                    <div class="form_bg">
                        <h2>Job Application Form</h2>
                        <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label>Full Name <span class="error">* <?php 
                                    echo $c_namefErr;
                                     ?></span>
                                     </label>
                                    <input type="text" name="rs_name" pattern="[a-zA-Z ]*"
                                        title="Please enter only alphabets" class="form-control" id="fname"
                                        placeholder="" required>
                                </div>
                                <div class="col-6 form-group">
                                    <label>Phone No <span class="error">* <?php 
                                    echo
                                     $cphonefErr; 
                                     ?></span></label>
                                    <input type="tel" name="rs_phone" pattern="[7-9]{1}[0-9]{9}"
                                        title="Please enter only number" class="form-control" id="phone" placeholder=""
                                        required>
                                    <input type="hidden" name="full" id="full">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label>Email<span class="error">* <?php 
                                    echo $cemailfErr;
                                     ?></span></label>
                                    <input type="email" class="form-control" name="rs_email" id="email" placeholder=""
                                        required>
                                </div>
                                <div class="col-6 form-group">
                                    <label>Choose Your Job Profile </label>
                                    <select name="profile" id="profile" class="form-control">

                                        <option value="Teacher">Teacher</option>
                                        <option value="Reception"> Reception</option>
                                        <option value="Internship">Internship</option>
                                        <option value="Artist Work ">Artist Work </option>
                                        <option value="Coordinator">Coordinator</option>
                                        <option value="Content Writer ">Content Writer </option>
                                        <option value="Graphic Design">Graphic Design</option>
                                        <option value="Other">Other
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <!-- <div class="form-group"> -->
                            <div class="form-group file-area">
                                <label for="images">Upload <span>CV / Resume</span></label>
                                <input type="file" name="userfile" id="images" required="required"
                                    multiple="multiple" />
                                <div class="file-dummy">
                                    <div class="success">Great, your CV is uploaded. Keep on.</div>
                                    <div class="default">Upload CV</div>
                                </div>
                            </div>
                            <!-- </div> -->
                            <div class="form-group">
                                <label>Message</label>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="rs_message" rows="4" placeholder="Message"
                                    required=""></textarea>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
                                    <input type="hidden" class="g-recaptcha"
                                        data-sitekey="6LfpUhgqAAAAAMPy5jCE9bhJVr5D7Xjlzw_llR5o"
                                        name="g-recaptcha-response">
                                </div>
                                <div class="text-center">
                                    <input type="submit" name="rs_apply" class="btn-submit" value="Apply Now">
                                    <!-- <button type="submit" class="btn-submit">Send Message</button> -->
                                </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ======= Jobs======= -->
<script>
    const phoneInputField = document.querySelector("#phone");
const phoneInput = window.intlTelInput(phoneInputField, {
  initialCountry: "in",
  separateDialCode: true,
  utilsScript:
    "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});
$("form").submit(function () {
  var full_number = phoneInput.getNumber(intlTelInputUtils.numberFormat.E164);
  $("input[name='phone'").val(full_number);
  $("#full").val(full_number);
});
</script>
<?php include "footer.php"; ?>