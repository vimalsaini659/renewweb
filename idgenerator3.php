<?php
include 'includes/session.php';
include('libs/phpqrcode/qrlib.php');

$sql = 'SELECT * FROM ai_students LEFT JOIN ai_courses ON ai_courses.cid=ai_students.course_id 
LEFT JOIN computer_centers on computer_centers.id = ai_students.center_id
where ai_students.reg_no= "' . $_GET['id'] . '"';

$query = $conn->query($sql);

$data = $query->fetch_assoc();

$student_name = $data['full_name'];
$father_name = $data['father_name'];

//echo $course_title = $data['course_name'];
$course_title = $data['course_title'];
$duration = $data['course_duration'];
$photo = $data['photo'];

$center = $data['center_name'];
$center_address = $data['center_address'];
$center_contact = $data['center_contact'];
$center_email = $data['center_email'];

$student_id = $data['reg_no'];
$tempDir = 'temp/';
/*$email = 'laxman091@gmail.com';
                    $subject =  'Developer Testing';
                    $filename = $email;
                    $body =  'This is demo message';*/
$codeContents = 'Student Name:' . $student_name . ' Registration: ' . urlencode($student_id) . ' Course: ' . $course_title;
QRcode::png($codeContents, $tempDir . '' . $filename . '.png', QR_ECLEVEL_L, 5);
$barcodeType = 'codabar';
$barcodeDisplay = 'horizontal';
$barcodeSize = '20';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap");

* {
  --dark: #ffffff;
  --red: #ffafb2;;
}

body {
  margin: 0;
  font-family: Roboto, Arial, Helvetica, sans-serif;
  position: relative;
}

.credit {
  position: absolute;
  top: 15px;
  right: 10px;
  border-radius: 10px;
  padding: 10px;
  background-color: rgb(248, 92, 113);
      cursor: pointer;
    z-index: 2;
    overflow: hidden;
}

.credit a {
  text-decoration: none;
  color: #eee;
  padding:10px;
}

.credit:after {
  box-sizing: border-box;
  content: "";
  border: 8px solid;
  border-color: transparent transparent transparent #eee;
  width: 8px;
  height: 8px;
  position: absolute;
  right: 1px;
  top: 50%;
  transform: translateY(-50%);
  transition: all 0.5s;
}
.credit:hover::after {
  right: -3px;
}

.test {
    background-color: #1769ff;
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: -100%;
    transition: .5s ease-in-out;
    z-index: -1;
}

.credit:hover .test {
    left: 0;
}
.business2 {
  display: flex;
  align-items: center;
  min-height: 100vh;
  justify-content: center;
  background-color: #131417;
}

.business2 .front,
.business2 .back {
  background-color: var(--dark);
  width: 280px;
  height: 480px;
  margin: 20px;
  border-radius: 25px;
  overflow: hidden;
  position: relative;
}

.business2 svg {
  width: 50px;
}

.business2 h1,
.business2 h2,
.business2 p {
  margin: 0;
  color: #000000;
  text-align: center;
}

.business2 .red {
  height: 35%;
  background-color: var(--red);
}

.business2 .head {
  display: flex;
  justify-content: center;
  padding: 25px 0;
}

.business2 .head img {
  width: 160px;
}

.business2 .head > div {
  text-align: center;
  margin: 0 10px;
  text-transform: uppercase;
}

.business2 .head > div p {
  font-size: 0.8rem;
  font-weight: 600;
}

.business2 .avatar {
  position: absolute;
  width: 50%;
  left: 50%;
  top: 100px;
  transform: translate(-50%);
  text-align: center;
}

.business2 .img {
  background-color: white;
  box-sizing: border-box;
  border-radius: 50%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.business2 .img img {
  width: 80%;
  padding: 10px 0;
  border-radius:50%;
}

.business2 .avatar p:nth-of-type(1) {
  text-transform: uppercase;
  font-weight: 900;
}

.business2 .infos {
  position: absolute;
  bottom: 5%;
  left: 5%;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.business2 .infos > div {
  display: flex;
  margin: 5px;
}

.business2 .infos > div svg {
  width: 25px;
  height: 25px;
  margin-right: 10px;
  background-color: var(--red);
  padding: 8px;
  border-radius: 7px;
}

.business2 .infos > div p {
  font-size: 0.8rem;
  margin: 5px 0;
  font-weight: 500;
}

/* back*/
.business2 .back .top {
  width: 100%;
  box-sizing: border-box;
  height: 70%;
  filter: contrast(160%);
  position: relative;
}

.business2 .back .top::after {
  content: "";
  width: 100%;
  height: 100%;
  position: absolute;
  z-index: 10;
  background: linear-gradient(rgba(71, 11, 11, 0.8), rgba(240, 8, 8, 0.5));
}

.business2 .back .top {
  position: relative;
}

.business2 .back .top div img {
  width: 160px;
  margin: 10px 0px;
}

.business2 .back .top div {
  position: absolute;
  display: flex;
  flex-direction: column;
  align-items: center;
  top: 40%;
  left:22%;
  z-index: 11;
  filter: contrast(80%);
  text-transform: uppercase;
}

.webicon {
  background-color: var(--dark);
  border-radius: 50%;
  width: 70%;
  padding: 20px 0;
  position: absolute;
  top: calc(70% - 40px);
  left: 15%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.webicon div {
  background-color: var(--red);
  border-radius: 50%;
  padding: 5px 4px 2px 5px;
}

.business2 .back > p {
  text-align: center;
  margin-top: 30%;
  color: black;
}
hr{
  width: 210px;
}
.qr-code img{
  width: 70px;
}
</style>
<body>

<div class="business2">


    <div class="front">
        <div class="red">

            <div class="head">
                <img src="GIFAPNG.png" alt="logo">
                
            </div>
        </div>
        <div class="avatar">
            <div class="img">
            <img src="../uploads/<?php echo $photo; ?>">
            </div>
            <p><?php echo $student_name; ?></p>
            <p><?php echo $course_title; ?></p>
        </div>
        <div class="infos">
          <hr>
            <div>
                <div>
                    GIFA Art College
                    
                </div>
            </div>
            <div>
              <p>SCO-59, Near kessel Mall , Sector -17 </p>
              
            </div>
            <div>
              <p>Kurukshetra</p>
            </div>
        </div>
    </div>

    <!-- back -->
    <div class="back">
        <div class="top">
            <div>
                <img src="GIFAPNG.png" alt="">
            </div>
        </div>
        <div class="webicon">
            <div>
            <div class="qr-code">
              <img src="temp/<?php echo @$filename . '.png'; ?>">
             </div>
            </div>
        </div>
        <p>www.gifaartcollege.in</p>
    </div>

</div>
</body>
</html>