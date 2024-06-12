<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include 'PHPMailer/config.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


// Define variables and initialize to empty values
$nameErr = $emailErr = $phoneErr = $msgErr = $subErr="";
$side_name = $side_cemail = $side_contact = $msg = $sub="";

// Check if the form is submitted
if (isset($_POST['c_submit'])) {
    $content = "";
    $usertemp = "";
       // Define the starting value of the number
   $number = 0;
   // Check if the number is already saved in a file
   if (file_exists('number.txt')) {
      $number = intval(file_get_contents('number.txt'));
   }
   $number++;
   // Save the new number to the file
   file_put_contents('number.txt', strval($number));
    // $begin = $_POST['phone'];
    // Your reCAPTCHA secret key
    // $secretKey = '6LeAVIEpAAAAAO3LFe3vXMLumrUdTpwsvN-J7kto';

    // Get the user's response from the reCAPTCHA widget
    // $response = $_POST['g-recaptcha-response'];

    // Verify the user's response with Google reCAPTCHA
    // $url = "https://www.google.com/recaptcha/api/siteverify";
    // $data = array(
    //     'secret' => $secretKey,
    //     'response' => $response
    // );

    // $options = array(
    //     'http' => array(
    //         'header' => "Content-type: application/x-www-form-urlencoded\r\n",
    //         'method' => 'POST',
    //         'content' => http_build_query($data)
    //     )
    // );

    // $context = stream_context_create($options);
    // $result = file_get_contents($url, false, $context);

    // if ($result === false) {
    //     // Failed to contact reCAPTCHA
    //     die('Failed to contact reCAPTCHA.');
    // }

    // $resultJson = json_decode($result, true);

    // if (!$resultJson['success']) {
      
    // }

    // Process form data if reCAPTCHA validation is successful
    // Validate form fields
    if (empty($_POST["c_name"])) {
        $nameErr = "Name is required";
    } else {
        $side_name = test_input($_POST["c_name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $side_name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["c_email"])) {
        $emailErr = "Email is required";
    } else {
        $side_cemail = test_input($_POST["c_email"]);
    }
}

if (empty($_POST["contact_phone"])) {
    $phoneErr = "Phone is required";
} else {
    $side_contact = test_input($_POST["contact_phone"]);    
    if (!preg_match('/^[7-9][0-9]{9}$/', $side_contact)) {
        $phoneErr = "Enter a valid phone number.";
    }
}
if (empty($_POST["contact_subject"])) {
    $subErr = "";
} else {
    $sub = test_input($_POST["contact_subject"]);
}
if (empty($_POST["comment"])) {
    $msgErr = "";
} else {
    $msg = test_input($_POST["comment"]);
}
// If there are no errors, proceed with sending emails and redirection
if (empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($msgErr)) {
    // Send email to admin
    ob_start();
    include("template/side_admin.php");
    $content .= ob_get_clean();
    $mail = new PHPMailer(true);
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = false;
    $mail->Host = "smtp.hostinger.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->Username = $cmail;
    $mail->Password = $cpass;
    $mail->setFrom($cmail, 'GIFA ART COLLEGE');
    $mail->addReplyTo($cmail, 'GIFA ART COLLEGE');
    $mail->addAddress($cmail2);
    $mail->Subject ="GIFA ART COLLEGE request Id GIFA2024-$number";
    $mail->Body = $content;
    $mail->Send();
    $mail->ClearAddresses();

    // Send email to user
    ob_start();  
    include("template/side_user.php");
    $usertemp .= ob_get_clean();
    $mail->AddAddress($side_cemail);
    $mail->Subject ="New GIFA ART COLLEGE  Id GIFA2024-$number";
    $mail->Body = $usertemp;
    echo '<script>
         swal({
            title: "Thank you!!!",
            text: "We will contact you soon.",
            icon: "success",
            button: "Ok",
         });
      </script>';
    try {
        $mail->send();
    } catch (Exception $e) {
        echo "Your message could not be sent! PHPMailer Error: {$mail->ErrorInfo}";
    }
}


// Function to sanitize input data
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>