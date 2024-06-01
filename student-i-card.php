<?php 
include "includes/conn.php";
if (isset($_POST["check"])) {
    $userName = $_POST["uname"];
    $dob = $_POST["udob"];
    $sql = "SELECT * from ai_students where username= '$userName' and dob= '$dob'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) === 1) {
      $row = mysqli_fetch_assoc($res);
      if ($row["username"] === $userName && $row["dob"] === $dob) {
        echo $row["username"];
        // $_SESSION['userid'] = $row['u_id'];
        // $_SESSION['username'] = $row['u_name'];
        // $_SESSION['userpass'] = $row['u_pass'];
        header("Location: admitCard");
      }
    }
  }
include "header.php"; ?>
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
                <h3>Student  ID card</h3>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" id="uname" name="uname" class="form-control" placeholder="User Name" required>
                    </div>                 
                    <div class="form-group">
                        <input type="date" id="dob" name="udob" class="form-control" placeholder="Date of Birth*" required>
                    </div>
                    <button type="submit"  name="check" class="default-btn btn active">Check</button>                  
                </form>
            </div>
            </div>
        </div>           
        </div>
    </div>
<?php include "footer.php"; ?>
