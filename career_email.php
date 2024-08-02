<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!class_exists('PHPMailer\PHPMailer\Exception')) {
    include 'PHPMailer/config.php';
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
}

$c_namefErr = $c_emailfErr = $c_phoneErr = $cr_resumeErr = $cr_msgfErr = $c_profileErr = "";
$cr_name = $cr_email = $cr_phone = $cr_resume = $cr_msg = $cr_profile = "";

if (isset($_POST['rs_apply'])) {
    include 'include/connection.php'; // Include the database connection

    // Your reCAPTCHA validation code here...

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
        $c_profileErr = "Profile is required";
    } else {
        $cr_profile = test_input($_POST["profile"]);
    }

    if (empty($_FILES['userfile']['tmp_name'])) {
        $c_resumeErr = "Resume is required";
    } else {
        $cr_resume = test_input($_FILES['userfile']['tmp_name']);
    }

    if (empty($_POST["rs_message"])) {
        $cr_msgfErr = "Message is required";
    } else {
        $cr_msg = test_input($_POST["rs_message"]);
    }

    if (empty($c_namefErr) && empty($c_emailfErr) && empty($c_phoneErr) && empty($cr_msgfErr)) {
        $stmt = $conn->prepare("INSERT INTO jobapply (name, phone, email, profile, resume, message) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $cr_name, $cr_phone, $cr_email, $cr_profile, $resumePath, $cr_msg);

        $resumePath = 'uploads/' . basename($_FILES['userfile']['name']);
        move_uploaded_file($_FILES['userfile']['tmp_name'], $resumePath);

        if ($stmt->execute()) {
            ob_start();
            include("template/career_admin.php");
            $content = ob_get_clean();

            $mail = new PHPMailer(true);
            $mail->IsSMTP();
            $mail->SMTPDebug = 2;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = false;
            $mail->Host = "smtp.hostinger.com";
            $mail->Port = 587;
            $mail->IsHTML(true);
            $mail->Username = $cmail;
            $mail->Password = $cpass;
            $mail->setFrom($cmail, 'Gifa Art College');
            $mail->addReplyTo($cmail, 'Gifa Art College');
            $mail->addAddress($cmail2);
            $mail->isHTML(true);
            $mail->Subject = "CV email Gifa Art College GIFA-$number";
            $mail->Body = $content;
            $mail->addAttachment($resumePath, 'Resume/File');

            if ($mail->send()) {
                $mail->ClearAddresses();
                ob_start();
                include("template/career_user.php");
                $usertemp = ob_get_clean();
                $mail->addAddress($cr_email);
                $mail->Subject = "CV email (GIFA ART COLLEGE) your Id GIFA-$number";
                $mail->Body = $usertemp;
                $mail->send();

                echo '<script>
                    swal({
                       title: "Thank you!!!",
                       text: "We will contact you soon.",
                       icon: "success",
                       button: "Ok",
                    });
                 </script>';
            } else {
                echo "Mail not sent.";
            }
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
