<?php
error_reporting(0);
include 'includes/connection.php';
include('libs/phpqrcode/qrlib.php');
$id=$_GET['id'];
$course_id=$_GET['id'];
$sql = 'SELECT * FROM ai_students LEFT JOIN ai_courses ON ai_courses.cid=ai_students.course_id 
LEFT JOIN computer_centers ON computer_centers.id = ai_students.center_id
where ai_students.reg_no= "'.$id.'"';

$query = $conn->query($sql);
$data = $query->fetch_assoc();

$roll_no = $data['roll_no'];
$student_name = $data['full_name'];
$father_husband = $data['father_name'];
$mother_name = $data['mother_name'];
$dob = $data['dob'];
$gender = $data['gender'];
$email = $data['email'];
$contact = $data['contact'];
$center = $data['center_name'];
$address = $data['address'];

$course_title = $data['course_title'];
$duration = $data['course_duration'];
$photo = $data['photo'];

$student_id = $data['reg_no'];
// $tempDir = 'temp/';
// $codeContents = 'Student Name:' . $student_name . ' Registration: ' . urlencode($student_id) . ' Course: ' . $course_title;
// QRcode::png($codeContents, $tempDir . '' . $filename . '.png', QR_ECLEVEL_L, 5);
// $barcodeType = 'codabar';
// $barcodeDisplay = 'horizontal';
// $barcodeSize = '20';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Admit Card</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/javascript">
        function printpage() {
            var printButton = document.getElementById("print");
            printButton.style.visibility = 'hidden';
            window.print()
            printButton.style.visibility = 'visible';
        }
    </script>
    <style>
        tr.info {
            background-color: #0364b0;
            color: white;
        }

        tr.success {
            background-color: #ee1a22;
            color: white;
        }

        tr.danger {
            background-color: #fec40a;
        }

        .borderless td,
        .borderless th {
            border: none;
        }

        @media print {
            img {
                max-width: 180px;
                height: auto;
            }
        }

        #top_txt {
            text-align: center;
            background-color: #9d231f;
            font-family: Arial Black;
            font-size: 20px;
        }
    </style>
    <style type="text/css">
        tr.info {}

        div#stamp {
            position: absolute;
            top: 102px;
            left: 961px;
            display: none;
        }

        div.admit_card {
            width: 750px;
            height: auto;
            margin: auto;
            padding: 12px;
        }

        th>div#address {
            height: 150px;
            max-width: 200px;
            line-height: 20px;
        }

        td>div#photo {
            height: 150px;
            width: 165px;
            line-height: 150px;
            text-align: center;
        }

        td>div#sign {
            height: 150px;
            width: 150px;
            text-align: center;
            line-height: 150px;
        }

        th#inclusion {
            text-align: left;
            line-height: 25px;
        }

        td#instructions>ol>li {
            line-height: 30px;
        }

        td.noborder {
            text-align: center;
        }

        tr#print {
            background-color: #02ad4f;
        }
    </style>
    <script type="text/javascript">
        function AdmitCard() {

            var printButton = document.getElementById("print");
            printButton.style.visibility = 'hidden';
            window.print()
            printButton.style.visibility = 'visible';
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="admit_card">
            <div id="stamp">
                <img src="http://gifaartcollege.in/wp-content/uploads/2022/05/cropped-cropped-gifa_logo.jpeg" width="80px" />
            </div>
            <table class="table table-bordered table-striped" border="2" cellpadding="6" cellspacing="0">

                <thead>
                    <tr class="info">
                        <th colspan="4" style="font-size: 25px;" class="text-center">
                            GIFA ART COLLEGE
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <!-- <img src="temp/<?php echo @$filename . '.png'; ?>" width="150px"height="150px"> -->
                            <img src="assets/images/newimages/gifa-art-college-logo-1.png" width="200px" height="">
                        </td>
                        <td colspan="2">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Roll No:</td>
                                        <td><?php echo $roll_no; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Name:</td>
                                        <td><?php echo $student_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Father Name:</td>
                                        <td><?php echo $father_husband; ?></td>
                                    </tr>
                                    <tr>
                                        <td>DOB:</td>
                                        <td><?php echo $dob; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Registeration No:</td>
                                        <td><?php echo $student_id; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Examination Center:</td>
                                        <td><?php echo $center; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Examination City:</td>
                                        <td><?php echo $address; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td>
                            <img src="http://gifaartcollege.in/gifapanel/uploads/<?php echo $photo; ?>" width="100px" class="img-rounded" />
                        </td>

                    </tr>
                    <?php
                    $stid = $_GET['id'];
                    $newsql = "SELECT student.*,course.*,computer_centers.* FROM ai_students as student LEFT JOIN ai_courses as course ON course.cid=student.course_id LEFT JOIN computer_centers on computer_centers.id = student.center_id where student.reg_no LIKE '$stid'";
                    $querynew1 = $conn->query($newsql);

                    while ($newrow1 = $querynew1->fetch_assoc()) {
                    ?>
                        <tr>
                            <th></th>
                            <th style="font-size: 18px;" class="text-center"><?php echo $newrow1['course_title']; ?></th>
                            
                        </tr>
                    <?php } ?>
                    <tr class="success">
                        <th style="font-size: 18px;" class="text-center">Paper Code</th>
                        <th style="font-size: 18px;" class="text-center">Title of Paper</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sqlnew = 'SELECT * FROM ai_students LEFT JOIN ai_courses ON ai_courses.cid=ai_students.course_id left join exams as ex on ai_courses.cid=ex.course_id left join ai_subjects on ex.subject_id=ai_subjects.id where ai_students.reg_no= "' . $_GET['id'] . '"';
                    $querynew = $conn->query($sqlnew);

                    while ($newrow = $querynew->fetch_assoc()) {
                    ?>

                        <tr>
                            <td><?php echo $newrow['subject_code'];  ?></td>
                            <td><?php echo $newrow['subject_name'];  ?></td>
                            <td><?php echo $newrow['exam_date'];  ?></td>
                            <td><?php echo $newrow['exam_time'];  ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td class="noborder">..............................<br>Signature of Candidate</td>
                        <td class="noborder">.............................<br>Coordinator</td>
                        <td class="noborder" colspan="2">.........................<br>Controller Of Examinations</td>
                    </tr>
                    <tr>
                        <th colspan="4" id="inclusion">


                            Candidate having valid Admit Card of the allotted Examination Centre only is permitted to undertake the examination.<br>
                            Note : Please bring alongwith you the following<br>
                            (a) A recent passport size photograph for Exam.<br>
                            (b) Origional Photo ID Proof (Aadhar, License, Voter ID, Passport, Institution ID Card or Pan Card).
                        </th>
                    </tr>
                    <tr class="danger">
                        <th colspan="4" style="font-size: 18px;" class="text-center">INSTRUCTIONS TO THE CANDIDATE</th>
                    </tr>
                    <tr>
                        <td colspan="4" id="instructions">
                            <ol type="1">
                                <li>Please report 15 minutes in advance before the commencement of the examination at the alloted Examination Centre.</li>
                                <li>Candidates will not be permitted to enter the examination centre after 30 minutes of the commencement of the examination and will not be permitted to leave the Examination Hall before the end of the examination.
                                </li>
                                <li>Communication devices like Cellphones are not allowed inside the examination hall.</li>
                            </ol>
                        </td>
                    </tr>
                    <tr id="last">
                        <th class="text-center" colspan="4">

                        </th>
                    </tr>
                    <tr id="print">
                        <th class="text-center" colspan="4">
                            <button type="button" name="AdmitCard" onclick="AdmitCard()" id="admit" class="btn btn-success"><span class="glyphicon glyphicon-print"></span> Print</button>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>