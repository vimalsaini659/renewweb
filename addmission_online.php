<?php
ob_start(); // Start output buffering
include "header.php";
include "includes/connection.php";
?>
<style>
    .page-banner-area.bg-admission {
    background-image: url(assets/images/page-banner/admission-online.jpeg);
}
</style>
<title>Addmission Online</title>
<div class="page-banner-area bg-admission">
    <div class="container">
        <div class="page-banner-content">
            <h1>Addmission Online</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li>Addmission Online</li>
            </ul>
        </div>
    </div>
</div>

<div class="login-area pt-100 pb-70">
    <div class="container">
        
        <form>
        <h2 class="text-center my-4">ADDMISSION ONLINE</h2>        
            <div class="row">
                <!-- Personal Details -->
                <div class="col-md-3">
                    <h4>Personal Details</h4>
                    <div class="mb-2">
                        <label for="applicantName" class="form-label">Applicant Full Name</label>
                        <input type="text" class="form-control" name="applicant_name" id="applicantName" pattern="^[a-zA-ZÀ-ÿ.'-]+$" required>
                    </div>
                    <div class="mb-2">
                        <label for="guardianName" class="form-label">Guardian Name</label>
                        <input type="text" class="form-control" name="applicant_guardian" id="guardianName" pattern="^[a-zA-ZÀ-ÿ.'-]+$" required>
                    </div>
                    <div class="mb-2">
                        <label for="applicantType" class="form-label">Kind of Applicant</label>
                        <select class="form-select" id="applicantType" name="applicantType" required>
                            <option selected value="House Wife">House Wife</option>
                            <option value="Kid">Kid</option>
                            <option value="Student">Student</option>
                            <option value="Professional">Professional</option>
                            <!-- Add options here -->
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Date of Birth</label>
                        <div class="d-flex">
                            <input type="number" name="dobyear" class="form-control me-1" placeholder="Year" required>
                            <input type="number" name="dobmonth" class="form-control me-1" placeholder="Month" required>
                            <input type="number" name="dobdate" class="form-control" placeholder="Date" required>
                        </div>
                    </div>  
                    <div class="mb-2">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" name="age" id="age">
                    </div>                                

                    <div class="mb-2">
                        <label for="occupation" class="form-label">Occupation of Father/Husband</label>
                        <input type="text" class="form-control" id="occupation" name="occupation" required>
                    </div>
                    <div class="mb-2">
                        <label for="nationality" class="form-label">Nationality</label>
                        <input type="text" class="form-control" id="nationality" name="nationality" required>
                    </div>
                    <div class="mb-2">
                        <label for="applicantPhoto" class="form-label"> Photo Upload</label>
                        <input type="file" class="form-control" name="applicantPhoto" id="photoapplicant">
                    </div>
                </div>

                <!-- Contact Details -->
                <div class="col-md-3">
                    <h4>Contact Details</h4>
                    <div class="mb-2">
                        <label for="mobile" class="form-label">Mobile No.</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" required>
                    </div>
                  
                    <div class="mb-2">
                        <label for="aaddhar" class="form-label">Aadhar Card</label>
                        <input type="file" class="form-control" name="aaddhar" id="aadhar">
                    </div>  
                    <!-- <div class="mb-4">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender" name="gender">
                            <option selected value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>                           
                    </div> -->
                    <div class="mb-2">
                        <label for="whatsapp" class="form-label">Whatsapp No.</label>
                        <input type="text" class="form-control" id="whatsapp" name="whatsapp" required>
                    </div>
                    <div class="mb-2">
                        <label for="email" class="form-label">Email ID</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-2">
                        <label for="state" class="form-label">State</label>
                        <select class="form-select" id="state" name="State" required>
                            <option selected>Select State</option>
                            <!-- Add options here -->
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="city" class="form-label">City</label>
                        <select class="form-select" id="city" name="city">
                            <option selected>Select City</option>
                            <!-- Add options here -->
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="address" class="form-label">Permanent Address</label>
                        <textarea class="form-control" id="address" rows="3" name="address"></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="duration" class="form-label">Duration</label>
                        <input type="text" class="form-control" id="duration" name="duration" required>
                    </div>
                </div>

                <!-- Educational Details -->
                <div class="col-md-3">
                    <h4>Educational Details</h4>
                    <div class="mb-2">
                        <label for="schoolCollege" class="form-label">School/College Name</label>
                        <input type="text" class="form-control" id="schoolCollege" name="schoolCollege" required>
                    </div>
                    <div class="mb-2">
                        <label for="Program" class="form-label">Program</label>
                        <input type="text" class="form-control" id="Program"  name="Program" >
                    </div>
                    <div class="mb-2">
                        <label for="qualification" class="form-label">Qualification</label>
                        <input type="text" class="form-control" id="qualification"  name="qualification" >
                    </div>
                    <div class="mb-2">
                        <label for="planToJoin" class="form-label">Plan to Join</label>
                        <input type="text" class="form-control" id="planToJoin" name="planToJoin" >
                    </div>
                    <div class="mb-2">
                        <label for="course" class="form-label">Select Course</label>
                        <select class="form-select" id="course"  name="course" >
                            <option selected>Select Course</option>
                            <!-- Add options here -->
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="batch" class="form-label">Join Batch in</label>
                        <input type="text" class="form-control" id="batch"  name="batch" >
                    </div>
                    <div class="mb-2">
                        <label for="campus" class="form-label">Select Campus</label>
                        <select class="form-select" id="campus"  name="campus" >
                            <option selected>Select Campus</option>
                            <!-- Add options here -->
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="reference" class="form-label">Reference</label>
                        <input type="text" class="form-control" id="reference"  name="campus" >
                    </div>
                </div>
                <!-- Payment Options -->
                <div class="col-md-3">
                    <h4>Payment Options</h4>
                    <div class="mb-2">
                        <label for="paymentOption" class="form-label">Select Option</label>
                        <select class="form-select" id="paymentOption" name="paymentOption">
                            <option selected>Select Option</option>
                            <!-- Add options here -->
                        </select>
                    </div> 
                    <div class="mb-2">
                        <label for="fees" class="form-label">Fees</label>
                        <input type="text" class="form-control" id="fees"  name="fees" >
                    </div>
                    <div>
                        <p>Bank Details</p>
                        <p>Account No. - 6895472551</p>
                        <p>Name - Gagan Institute of Fine Art</p>
                        <p>Bank Name - Indian Bank </p>
                        <p>Branch - Sector 17 Kurukshetr</p>
                        <p>IFSC CODE - IDIB000K207</p>
                        <div class="qr-code mb-3">
                            <img src="assets/images/newimages//qrcode.jpeg" alt="QR Code" class="img-fluid">
                        </div>
                        <div class="text-cente">
                            <button type="submit" class="btn btn-danger" name="submit">Submit</button>
                        </div>
                    </div>
                </div>

            </div>

        </form>
    </div>
</div>

<?php 
include "footer.php"; 
ob_end_flush(); // Flush the output buffer
?>