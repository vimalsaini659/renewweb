
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!class_exists('PHPMailer\PHPMailer\Exception')) {
    include 'PHPMailer/config.php';
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
}
$c_namefErr = $c_emailfErr = $c_phoneErr=$cr_resumeErr= $cr_msgfErr =$c_profileErr="";
$cr_name = $cr_email =$cr_phone=$cr_resume= $cr_msg = $cr_profile="";
if (isset($_POST['rs_apply'])) {
    $content = "";
    $usertemp = "";
    // $begin = $_POST['full'];
           // Define the starting value of the number
   $number = 0;
   // Check if the number is already saved in a file
   if (file_exists('number.txt')) {
      $number = intval(file_get_contents('number.txt'));
   }
   $number++;
   // Save the new number to the file
   file_put_contents('number.txt', strval($number));
            // Your reCAPTCHA secret key
        $secretKey = '6LfpUhgqAAAAABIQsOD0KjD2cb1DjPbvWKwZLZER';    
        // Get the user's response from the reCAPTCHA widget
        $response = $_POST['g-recaptcha-response'];        
        // Verify the user's response with Google reCAPTCHA
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $data = array(
            'secret' => $secretKey,
            'response' => $response
        );
    
        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
    
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        
        if ($result === false) {
            // Failed to contact reCAPTCHA
            die('Failed to contact reCAPTCHA.');
        }
    
        $resultJson = json_decode($result, true);
    
        if (!$resultJson['success']) {
            // reCAPTCHA validation failed
            // die('reCAPTCHA validation failed.');
        }
    
    if (empty($_POST["rs_name"])) {
        $c_namefErr = "Name is required";
    } else {
        $cr_name = test_input($_POST["rs_name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $cr_name)) {
            $c_namefErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["full"])) {
        $c_phoneErr = "Phone is required";
    } else {
        $cr_phone = test_input($_POST["full"]);
        // if (preg_match('/^ [0-9] {10}+$/', $cr_phone)) {
        //     $c_phoneErr = "Enter the number Only.";
        // }
    } 
    if (empty($_POST["rs_email"])) {
        $c_emailfErr = "Email is required";
    } else {
        $cr_email = test_input($_POST["rs_email"]);
        if (!filter_var($cr_email, FILTER_VALIDATE_EMAIL)) {
            $c_emailfErr = "Invalid email format";
        }
    }

    if (empty($_POST["profile"])) {
        $c_profileErr = "";
    } else {
        $cr_profile = test_input($_POST["profile"]);
    }
  
    if (empty($_FILES['userfile']['tmp_name'])) {
        $c_resumeErr = "";
    } else {
        $cr_resume = test_input($_FILES['userfile']['tmp_name']);
    }

    if (empty($_POST["rs_message"])) {
        $cr_msgfErr = "";
    } else {
        $cr_msg = test_input($_POST["rs_message"]);
    }

    if (empty($c_namefErr) && empty($c_emailfErr) && empty($c_phoneErr)&& empty($cr_msgfErr)) {
       
        ob_start();
        include("template/career_admin.php");
        $content .= ob_get_clean();
        $mail = new PHPMailer(true);
        $mail->IsSMTP();
        $mail->SMTPDebug =2;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = False;
        $mail->Host = "smtp.hostinger.com";
        $mail->Port = 587;
        $mail->IsHTML(true);
        $mail->Username = $cmail;
        $mail->Password = $cpass; 
        $mail->setFrom($cmail, 'Gifa Art College ');
        $mail->addReplyTo($cmail, 'Gifa Art College ');
        $mail->addAddress($cmail2);      
        $mail->isHTML(true);
        $mail->Subject = "CV email Gifa Art College  GIFA-$number";
        $mail->Body = $content;
        $mail->addAttachment($cr_resume,'Resume/File');
        $mail->Send();
        $mail->ClearAddresses();
        ob_start();
        include("template/career_user.php");
        $usertemp .= ob_get_clean();
        $mail->addAddress($cr_email);
        $mail->Subject = "CV email (GIFA ART COLLEGE) your Id GIFA-$number";
        $mail->Body = $usertemp;     
        echo '<script>
        swal({
           title: "Thank you!!!",
           text: "We will contact you soon.",
           icon: "success",
           button: "Ok",
        });
     </script>';
        $mail->send();
        try {
            $mail->send();
        } catch (Exception $e) {
            echo "Your message could not be sent! PHPMailer Error: {$mail->ErrorInfo}";
        }
    }
}
 function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

?>