<?php
/* Template Name: Admission Form 
Template Post Type: post, page, event
*/

if (!defined('ABSPATH')) {
    exit;
}
get_header();

?>
<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
global $wpdb;

include_once(ABSPATH . 'wp-admin/includes/file.php');
include_once(ABSPATH . 'wp-admin/includes/media.php');
if (!empty($_POST)) {

    $target = 'wp-admin/images/' . basename($_FILES['uploadfile']['name']);
    move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target);
    $result = $wpdb->get_results("SELECT * FROM wp_admission_form");
    $num_rows = count($result);
    $total = $num_rows + 1;
    $regis = $_POST['admission_date'];
    $newdateformat = date("ymd", strtotime($regis));
    $registration = "GIFA" . $newdateformat . $total;
    $stu_roll = "GIFA" .  date("y") . "00" . $total;
    global $wpdb;
    $data = array(
        'stu_roll' => $stu_roll,
        'registration' => $registration,
        'fullname' => $_POST['fullname'],
        'guardian' => $_POST['guardian'],
        'guardphone' => $_POST['guard-phone'],
        'dob' => $_POST['dob'],
        'age' => $_POST['age'],
        'gender' => $_POST['gender'],
        'category' => $_POST['category'],
        'nationality' => $_POST['nationality'],
        'phone' => $_POST['phone'],
        'email' => $_POST['email'],
        //'password' => 'GIFA@123', //generateRandomString(6),
        'center' => $_POST['center'],
        'state' => $_POST['state'],
        'city' => $_POST['city'],
        'address' => $_POST['address'],
        'image' => $target,
        'school' => $_POST['school'],
        'qualification' => $_POST['qualification'],
        'program' => $_POST['program'],
        'course' => $_POST['course'],
        'duration' => $_POST['duration'],
        'fees' => $_POST['fees'],
        'batch' => $_POST['batch'],
        'reference' => $_POST['reference'],
        'admission_date' => $_POST['admission_date'],
        'payment_method' => $_POST['payment'],
        'mother_name' => $_POST['mother_name'],
        'aadhar' => $_POST['aadhar']
        
    );
    $format = array(
        '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s','%s','%s'
    );

    //$success = $wpdb->insert('wp_admission_form', $data, $format);
    $success = $wpdb->insert('wp_admission_form', $data);


    if ($success) {
    ?>
        <script>
            swal({
                title: "Success!",
                text: "Your application form submitted!",
                icon: "success",
            });
        </script>
<?php
    } else {
        $message .= "Failed to submit form";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Form</title>
    <style>
        .elementor-container {
            max-width: 1500px;
            margin: 0 auto;
        }

        .myform {
            margin-top: 40px;
            margin-bottom: 46px;
        }

        .column {
            float: left;
            width: 25%;
            padding: 10px;
            height: auto;
        }

        .newcol {
            float: left;
            width: 50%;
            padding: 2px;
            height: auto;
        }

        .newcol1 {
            width: 50%;
            float: right;
            padding: 2px;
            height: auto;
        }

        b {
            color: white;
            background-color: #008000a8;
            margin: 10px;
            padding: 8px;
        }

        .success {
            margin-top: 10px;
        }

        h3 {
            text-align: center;
            font-weight: 700;
            color: green;
        }

        input#uploadfile {
            border: 1px solid;
            width: 100%;
            padding: 6px;
        }

        .submit-btn {
            margin-left: 36px;
            background-color: green;
            color: #fff;
            border: 1px solid green;
        }

        label {
            display: inline-block;
            text-align: left;
            width: 100%;
            line-height: 1;
            vertical-align: middle;
        }

        .form-control {
            margin: 3px;
        }

        .hobby,
        .diploma_program,
        .degree {
            display: none;
        }

        .newcol img {
            height: 186px;
            width: 202px;
        }

        @media only screen and (max-width: 1024px) {
            .column {
                float: left;
                width: 50%;
                padding: 10px;
                height: auto;
            }
        }

        @media only screen and (max-width: 767px) {
            .column {
                float: left;
                width: 100%;
                padding: 10px;
                height: auto;
            }
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="http://gifaartcollege.in/wp-admin/js/custom.js"></script>

</head>

<body>
    <div class="elementor-container mt-5">
    	<h3>Addmission New Form</h3>
		<div class="row" id="admission_form_new">
            <div class="myform">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="column">
                        <strong>Personal Details</strong><br>
                        <label>Full Name *</label>
                        <input type="text" name="fullname"  class="form-control" oninput="convertToUppercase(this)"  required>
                        <label>Father Name *</label>
                        <input type="text" name="guardian" class="form-control" oninput="convertToUppercase(this)" required>
                        <label>Mother Name *</label>
                        <input type="text" name="mother_name" class="form-control" oninput="convertToUppercase(this)" required>
                        <div class="newcol">
                            <label>Date of Birth *</label>
                            <input type="date" name="dob" class="form-control" max="<?= date("Y-m-d"); ?>" required>
                        </div>
                        <div class="newcol">
                            <label>Age *</label>
                            <input type="number" name="age" class="form-control" required>
                        </div>
                        <div class="newcol1">
                            <label>Gender *</label>
                            <select name="gender" class="form-control" required>
                                <option selected="" disabled>-Select Gender-</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="newcol1">
                            <label>Category *</label>
                            <select name="category" class="form-control" required>
                                <option selected="" disabled>-Select Category-</option>
                                <option value="SC">SC</option>
                                <option value="ST">ST</option>
                                <option value="OBC">OBC</option>
                                <option value="General">General</option>
                            </select>
                        </div>
                        <label>Upload Profile Image *</label>
                        <input type="file" class="form-control" name="uploadfile" id="uploadfile" required>
                        <label>School/College *</label>
                        <input type="text" name="school" class="form-control" required>
                        <label>Qualification *</label>
                        <input type="text" name="qualification" class="form-control" required>
                    </div>
                    <div class="column">
                        <strong>Contact Details</strong><br>
                        <label>Mobile Number *</label>
                        <input type="number" name="phone" class="form-control" required>
                        <label>Aadhar Number *</label>
                        <input type="text" name="aadhar" minlength="12" maxlength="12" class="form-control" required>
                        <label>Guardian Phone *</label>
                        <input type="number" name="guard-phone" class="form-control" required>
                        <label>E-mail ID *</label>
                        <input type="email" name="email" class="form-control" required>
                        <label>Nationality *</label>
                        <select name="nationality" class="countries form-control" id="countryId" required>
                            <option value="">-Select Country-</option>
                        </select>
                        <label>State *</label>
                        <select name="state" class="states form-control" id="stateId" required>
                            <option value="">-Select State-</option>
                        </select>
                        <label>City *</label>
                        <select name="city" class="cities form-control" id="cityId" required>
                            <option value="">-Select City-</option>
                        </select>
                        <label>Address *</label>
                        <textarea name="address" class="form-control" required></textarea>

                    </div>
                    <div class="column">
                        <strong>Course Program</strong><br>
                        <label>Programs *</label>
                        <select name="program" class="form-control" id="typeOfProgram" required>
                            <option value="0" selected="selected" disabled>-Plan to Join-</option>
                            <option value="Entrance Exam">Entrance Exam</option>
                            <option value="Hobby Classes">Hobby Classes</option>
                            <option value="Diploma Programs">Diploma Programs</option>
                            <option value="Degree Programs">Degree Programs</option>
                        </select>
                        <label>Courses Details*</label>
                        <div class="entrance">
                            <select name="course" class="form-control" id="entrance" required>
                                <option value="0" selected="selected" disabled>-Select Course-</option>
                                    <option value="UID">UID</option>
                                    <option value="NID">NID</option>
                                    <option value="NIFT">NIFT</option>
                                    <option value="BFA">BFA</option>
                            </select>
                        </div>
                        <div class="hobby">
                            <select name="course" class="form-control" id="hobby">
                                <option value="0" selected="selected" disabled>-Select Course-</option>
                                <option value="Basic Drawing">Basic Drawing</option>
                                <option value="Painting Classes">Painting Classes</option>
                                <option value="Portrait">Portrait</option>
                                <option value="Art and Craft">Art and Craft</option>
                            </select>
                        </div>
                        <div class="diploma_program">
                            <select name="course" class="form-control" id="diploma_program">
                                <option value="0" selected="selected" disabled>-Select Course-</option>
                                <option value="Art and Craft (1 Year)">Art and Craft (1 Year)</option>
                                <option value="Art and Craft (2 Year)">Art and Craft (2 Year)</option>
                                <option value="Fine Art (1 Year)">Fine Art (1 Year)</option>
                                <option value="Fine Art (2 Year)">Fine Art (2 Year)</option>
                            </select>
                        </div>
                        <div class="degree">
                            <select name="course" class="form-control" id="degree">
                                <option value="0" selected="selected" disabled>-Select Course-</option>
                                <option value="B.A Fine Art">B.A Fine Art</option>
                                <option value="M.A Fine Art">M.A Fine Art</option>
                                <option value="BFA">BFA</option>
                                <option value="MFA">MFA</option>
                            </select>
                        </div>

                        <div class="diploma">
                            <div class="newcol">
                                <label>Duration</label>
                                <input type="text" name="duration" id="duration" value="" class="form-control" readonly>
                            </div>
                            <div class="newcol">
                                <label>Fees</label>
                                <input type="text" name="fees" id="fees" value="" class="form-control" readonly>
                            </div>
                        </div>

                        <strong>Academic Information</strong><br>
                        <label>Study Center *</label>
                        <select name="center" class="form-control">
                            <option value="0" selected="" disabled>-Select Study Center-</option>
                            <option value="Gagan Institute Of Fine Arts">Gagan Institute Of Fine Arts</option>
                            <option value="aryan infotech">aryan infotech</option>
                            <option value="GIFA Art College">GIFA Art College</option>
                            <option value="mohitsales">mohitsales</option>
                        </select>
                        <label>Date of Admission *</label>
                        <input type="date" name="admission_date" class="form-control" required>
                        <label>Join Batch In *</label>
                        <select name="batch" class="form-control" required>
                            <option selected="" disabled>-Select Batch Join-</option>
                            <option value="Weekdays">Weekdays</option>
                            <option value="Weekend">Weekend</option>
                        </select>
                        <label>Reference *</label>
                        <input type="text" name="reference" class="form-control" required>
                    </div>
                    <div class="column">
                        <strong>Payment Options</strong>
                        <label>Payment Method *</label>
                        <select name="payment" class="form-control">
                            <option value="0" selected="" disabled>-Select Payment Method-</option>
                            <option value="Cash in Hand">Cash in Hand</option>
                            <option value="Cheque/Draft">Cheque/Draft</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="Online Payment">Online Payment</option>
                        </select>
                        <strong>Bank Details</strong>
                        <ul>
                            <li>Bank Name: Indian Bank</li>
                            <li>Account No.: 6895472551</li>
                            <li>Name: Gagan Institute of Fine Arts</li>
                            <li>IFSC Code: IDIB000K207</li>
                        </ul>
                        <strong>Online Payment</strong><br>
                        <div class="newcol">
                            <img src="http://gifaartcollege.in/wp-content/uploads/2022/08/barcode.jpeg">
                        </div>
                        <div class="newcol">
                            <img src="http://gifaartcollege.in/wp-content/uploads/2022/08/g-pay.png">
                        </div>
                    </div>
                    <input type="submit" name="submit" value="Submit Form" class="submit-btn">


                </form>
                <div class="success">
                    <?php if (isset($message)) {
                        echo $message;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php
    get_footer();
    ?>
  <script>
        function convertToUppercase(nvalur) {
            // Get the entered value and convert it to uppercase
            var enteredValue = nvalur.value;
            var uppercaseValue = enteredValue.toUpperCase();

            // Update the input field with the uppercase value
            nvalur.value = uppercaseValue;
        }
    </script>
    <script>

    	jQuery(document).ready(function($){
            $(document).on('click', '.btnOldAdmission', function(){
            	console.log('show Old form');
            });
            $(document).on('click', '.btnNewAdmission', function(){
            	console.log('show New form');
            	$('#admission_form_new').show('fast');
            });

            });

        $('#typeOfProgram').on('change', function() {
            if ($(this).val() == "Entrance Exams") {
                $('.entrance').show();
                $('.hobby').hide();
                $('.diploma_program').hide();
                $('.degree').hide();
            } else if ($(this).val() == "Hobby Classes") {
                $('.entrance').hide();
                $('.hobby').show();
                $('.diploma_program').hide();
                $('.degree').hide();
            } else if ($(this).val() == "Diploma Programs") {
                $('.entrance').hide();
                $('.hobby').hide();
                $('.diploma_program').show();
                $('.degree').hide();
            } else if ($(this).val() == "Degree Programs") {
                $('.entrance').hide();
                $('.hobby').hide();
                $('.diploma_program').hide();
                $('.degree').show();
            }
        });

        $('#entrance').change(function() {
            var dataValue = $('#entrance').val();
            if (dataValue == 'BFA') {
                $("#fees").val('₹5000');
                $("#duration").val('3 Months');
            } else if (dataValue == 'NIT') {
                $("#fees").val('₹15000');
                $("#duration").val('6 Months');
            } else if (dataValue == 'UID') {
                $("#fees").val('₹10000');
                $("#duration").val('6 Months');
            } else if (dataValue == 'NIFT') {
                $("#fees").val('₹12000');
                $("#duration").val('1 Years');
            }
        });

        $('#hobby').change(function() {
            var dataValue = $('#hobby').val();
            if (dataValue == 'Basic Drawing') {
                $("#fees").val('₹1500');
                $("#duration").val('1 Months');
            } else if (dataValue == 'Painting Classes') {
                $("#fees").val('₹9000');
                $("#duration").val('6 Months');
            } else if (dataValue == 'Portrait') {
                $("#fees").val('₹9000');
                $("#duration").val('6 Months');
            } else if (dataValue == 'Art and Craft') {
                $("#fees").val('₹15000');
                $("#duration").val('1 Years');
            }
        });

        $('#diploma_program').change(function() {
            var dataValue = $('#diploma_program').val();
            if (dataValue == 'Art and Craft (1 Year)') {
                $("#fees").val('₹18000');
                $("#duration").val('1 Year');
            } else if (dataValue == 'Art and Craft (2 Year)') {
                $("#fees").val('₹36000');
                $("#duration").val('2 Years');
            } else if (dataValue == 'Fine Art (1 Year)') {
                $("#fees").val('₹22000');
                $("#duration").val('1 Year');
            } else if (dataValue == 'Fine Art (2 Year)') {
                $("#fees").val('₹44000');
                $("#duration").val('2 Years');
            }
        });

        $('#degree').change(function() {
            var dataValue = $('#degree').val();
            if (dataValue == 'B.A Fine Art') {
                $("#fees").val('As Per University');
                $("#duration").val('3 Years');
            } else if (dataValue == 'M.A Fine Art') {
                $("#fees").val('As Per University');
                $("#duration").val('2 Years');
            } else if (dataValue == 'BFA ') {
                $("#fees").val('As Per University');
                $("#duration").val('4 Years');
            } else if (dataValue == 'MFA') {
                $("#fees").val('As Per University');
                $("#duration").val('2 Years');
            }
        });
    </script>