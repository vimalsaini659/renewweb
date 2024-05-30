<?php include "header.php"; ?>

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
                <form>
                    <div class="form-group">
                        <input type="text" id="name" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" class="form-control" placeholder="Email Address*">
                    </div>
                    <div class="form-group">
                        <input type="date" id="dob" class="form-control" placeholder="Date of Birth*">
                    </div>
                    <button type="submit"  name="check" class="default-btn btn active">Check</button>                  
                </form>
            </div>
            </div>
        </div>           
        </div>
    </div>
<?php include "footer.php"; ?>
