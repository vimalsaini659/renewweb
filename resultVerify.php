<?php
ob_start(); // Start output buffering
include "header.php";
include "includes/connection.php";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Validate the name field
    $uname = trim($_POST["uname"]);
    if (empty($uname)) {
        $errors[] = "User Name is required.";
    }

    // Validate the registration field
    $registration = trim($_POST["registration"]);
    if (empty($registration)) {
        $errors[] = "Registration is required.";
    }
 
    $query = "SELECT * FROM ai_students WHERE full_name = '$uname' AND reg_no = '$registration'";
    $result = mysqli_query($conn, $query);  

    if (mysqli_num_rows($result) === 0) {
        $errors[] = "Student is Not Found";
    }

    // Display errors (if any)
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p class='idcaderror' style='color: red; text-align:center;'>$error</p>";
        }
    } else {
        // Fetch the reg_no from the database
        $sql = "SELECT student.*,course.* FROM ai_students as student LEFT JOIN ai_courses as course ON course.cid=student.course_id";
        // $query = "SELECT reg_no FROM ai_students WHERE full_name = '$uname' AND reg_no = '$registration'";
        $result = mysqli_query($conn, $query);
    
        if ($row = mysqli_fetch_assoc($result)) {
            // Found a matching record, extract the necessary fields
            $sid = $row['sid'];
            $courseid = $row['course_id'];
            $centerid = $row['center_id']; // Assuming this field exists and holds the center ID
        
            // Redirect to marksheet_generate.php with necessary query parameters
            header("Location: marksheet_generate.php?sid=" . $sid . "&course_id=" . $courseid . "&center_id=" . $centerid);
            exit(); // Ensure no further code is executed after redirection
        } else {
// No matching record found
$errors[] = "Result is Not Found";
foreach ($errors as $error) {
echo "<p class='idcaderror' style='color: red; text-align:center;'>$error</p>";
}
}
}

mysqli_close($conn);
}
?>

<title>Result Verify</title>
<div class="page-banner-area bg-result-verify">
    <div class="container">
        <div class="page-banner-content">
            <h1>Result Verify</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li>Result Verify</li>
            </ul>
        </div>
    </div>
</div>

<div class="login-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="login">
                    <h3>Result Verify</h3>
                    <form method="post" action="" autocomplete="off">
                        <div class="form-group">
                            <input type="text" id="name" class="form-control" name="uname" placeholder="User Name"
                                required>
                            <?php if (isset($errors["uname"])): ?>
                            <p style="color: red;"><?php echo $errors["uname"]; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <input type="text" id="registration" name="registration" class="form-control"
                                placeholder="Registration*" required>
                            <?php if (isset($errors["registration"])): ?>
                            <p style="color: red;"><?php echo $errors["registration"]; ?></p>
                            <?php endif; ?>
                        </div>
                        <button type="submit" name="check" class="default-btn btn active">Check</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="result-right-block">
                    <div class="excellence">
                        <h4>Creative Excellence:</h4>
                        <p>GIFA Art College has consistently nurtured creative excellence among its students. Our
                            faculty
                            members are accomplished artists who guide students to explore their artistic potential and
                            develop their unique styles.</p>
                    </div>
                    <div class="excellence">
                        <h4>Inspiring Guidance:</h4>
                        <p>GIFA provides diploma and degree programs in fine arts, art and craft, and other creative
                            disciplines. These programs cater to different levels of expertise and duration.</p>
                    </div>
                    <div class="excellence">
                        <h4>Hobby Classes</h4>
                        <p>GIFA offers short-term hobby classes in various art forms like paper craft, rangoli, drawing,
                            and
                            clay work.</p>
                    </div>
                    <div class="excellence">
                        <h4>Face-to-Face and Online Sessions:</h4>
                        <p>GIFA provides face-to-face tutoring sessions for homework help and online study programs to
                            replicate the classroom experience.</p>
                    </div>
                    <h4>Contact Information</h4>
                    <p><b>Location </b> Regd. Office : SCO 59 Sector 17 Kurukshetra Haryana</p>
                    <p><b>Phone </b>91 9992588777</p>
                    <p><b>Phone </b>+91 9992588777</p>
                    <p><b>Email </b>gifaartcollege@gmail.com</p>
                    <!-- <div class="login">
                    <img src="assets/images/newimages/admitcard.jpg" alt="">
                </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include "footer.php"; 
ob_end_flush(); // Flush the output buffer
?>