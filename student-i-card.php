<?php  include "header.php";

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
   
    // Check if the user exists in the database (assuming you have a table named 'ai_student')
    // You'll need to replace the database connection details and query with your own
  
    $query = "SELECT full_name FROM ai_students WHERE full_name = '$uname' AND reg_no = '$registration'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 0) {
        $errors[] = "Student ID Card is Not Found";
    }

    mysqli_close($conn);

?>

<title>Student-i-card</title>
<div class="page-banner-area bg-2">
    <div class="container">
        <div class="page-banner-content">
            <h1>Student ID card</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li>Student ID card</li>
            </ul>
        </div>
    </div>
</div>

<?php 
    // Display errors (if any)
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p class='idcaderror' style='color: red; text-align:center;'>$error</p>";
        }
    } else {
        // Proceed with further actions (e.g., redirect to a success page)
        echo "Form data is valid!";
    }
}?>


<div class="login-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="login">
                    <img src="assets/images/newimages/idcard.jpg" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="login">

                    <h3>Student ID card</h3>

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
        </div>
    </div>
</div>
<?php include "footer.php"; ?>