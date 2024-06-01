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
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>GEM - Student ID Card</title>
    <link rel="icon" type="image/ico" href="<?php //echo base_url(); 
                                            ?>assets/images/favicon.ico">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!--/ modernizr -->
    <style>
        @media print {
            .hideme {
                display: none
            }
        }

        .id-card-holder {
            width: 225px;
            padding: 4px;
            margin: 0 auto;
            background-color: #1f1f1f;
            border-radius: 5px;
            position: relative;
        }

        .id-card-holder:after {
            /*content: '';
            width: 7px;
            display: block;
            background-color: #0a0a0a;
            height: 100px;
            position: absolute;
            top: 105px;
            border-radius: 0 5px 5px 0;*/
        }

        .id-card-holder:before {
            /*content: '';
            width: 7px;
            display: block;
            background-color: #0a0a0a;
            height: 100px;
            position: absolute;
            top: 105px;
            left: 222px;
            border-radius: 5px 0 0 5px;*/
        }

        .id-card {

            background-color: #fff;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 1.5px 0px #b9b9b9;
        }

        .id-card img {
            margin: 0 auto;
        }

        .header img {
            width: 100px;
            margin-top: 15px;
        }

        .photo img {
            width: 80px;
            margin-top: 15px;
        }

        h2 {
            font-size: 15px;
            margin: 5px 0;
        }

        h3 {
            font-size: 12px;
            margin: 2.5px 0;
            font-weight: 300;
        }

        .qr-code img {
            width: 50px;
        }

        p {
            font-size: 10px;
            margin: 2px;
        }

        h5 {
            margin-bottom: 3px;
            margin-top: 3px;
        }

        .id-card-hook {
            /*background-color: #000;
            width: 70px;
            margin: 0 auto;
            height: 15px;
            border-radius: 5px 5px 0 0;*/
        }

        .id-card-hook:after {
            /*content: '';
            background-color: #d7d6d3;
            width: 47px;
            height: 6px;
            display: block;
            margin: 0px auto;
            position: relative;
            top: 6px;
            border-radius: 4px;*/
        }

        .id-card-tag-strip {
            /*width: 45px;
            height: 40px;
            background-color: #0950ef;
            margin: 0 auto;
            border-radius: 5px;
            position: relative;
            top: 9px;
            z-index: 1;
            border: 1px solid #0041ad;*/
        }

        .id-card-tag-strip:after {
            /*content: '';
            display: block;
            width: 100%;
            height: 1px;
            background-color: #c1c1c1;
            position: relative;
            top: 10px;*/
        }

        .id-card-tag {
            /*width: 0;
            height: 0;
            border-left: 100px solid transparent;
            border-right: 100px solid transparent;
            border-top: 100px solid #0958db;
            margin: -10px auto -30px auto;*/
        }

        .id-card-tag:after {
            /*content: '';
            display: block;
            width: 0;
            height: 0;
            border-left: 50px solid transparent;
            border-right: 50px solid transparent;
            border-top: 100px solid #d7d6d3;
            margin: -10px auto -30px auto;
            position: relative;
            top: -130px;
            left: -50px;*/
        }
    </style>

</head>

<body id="minovate" class="appWrapper">
    <div id="wrap" class="animsition">
        <section id="content">

            <div class="page page-profile">

                <!-- page content -->
                <div class="pagecontent">
                    <!-- row -->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-8">

                            <div class="container">


                                <div class="row">

                                    <!-- start column -->
                                    <div class="col-md-8 col-lg-8">

                                        <div id="html-2-pdfwrapper" style="width: 240px;">


                                            <!-- ID Card -->
                                            <div class="id-card-tag"></div>
                                            <div class="id-card-tag-strip"></div>
                                            <div class="id-card-hook"></div>
                                            <div class="id-card-holder">
                                                <div class="id-card">
                                                    <div class="header">
                                                        <img src="images/GEMLogo.png">
                                                    </div>
                                                    <div class="photo">
                                                        <img src="../uploads/<?php echo $photo; ?>">
                                                    </div>
                                                    <b><?php echo $student_name; ?></b><br>
                                                    <?php echo $course_title; ?>
                                                    <h2><?php //echo $session['username'];
                                                        ?></h2>
                                                    <div class="qr-code">
                                                        <img src="temp/<?php echo @$filename . '.png'; ?>">
                                                    </div>
                                                    <h3>gemindia.co.in</h3>
                                                    <hr>
                                                    <h5><?php echo $center; ?></h5>
                                                    <p><?php echo $center_address; ?></p>
                                                    <p><?php echo $center_contact; ?></p>
                                                    <p><?php echo $center_email; ?></p>

                                                </div>
                                            </div>

                                        </div>

                                        <button class="hideme" onclick="window.print()">Print this page</button>
                                    </div>

                                </div>
                                <!-- row -->

                            </div>

                        </div>
                        <!-- /col -->
                    </div>
                    <!-- /row -->
                </div>

            </div>

        </section>

    </div>

</body>

</html>