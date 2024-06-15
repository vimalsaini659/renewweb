<?php
error_reporting(0);
include 'includes/connection.php';
include "header.php";

$info_sql = 'SELECT * FROM ai_students inner join ai_courses on ai_students.course_id = ai_courses.cid where ai_students.sid=' . $_GET['sid'];
$query1 = $conn->query($info_sql);
// $student_data = $query1->fetch_assoc();


$sql = 'SELECT * FROM ai_students LEFT JOIN ai_courses ON ai_courses.cid=ai_students.course_id LEFT JOIN result_students on ai_students.sid=result_students.student_id where ai_students.sid= "' . $_GET['sid'] . '"';
$query = $conn->query($sql);
$data = $query->fetch_assoc();

$center_id = $data['center_id'];
$test = 'select * from computer_centers where id=' . $_GET['center_id'];
$query2 = $conn->query($test);
$data2 = $query2->fetch_assoc();

$center_name = $data2['center_name'];
$course_id = $student_data['course_id'];
$student_name = $student_data['full_name'];
$father_name = $student_data['father_name'];
$roll_no = $student_data['roll_no'];

$course_title = $student_data['course_title'];
$duration = $student_data['course_duration'];
$photo = $student_data['photo'];

$student_id = $student_data['reg_no'];
$student_session = $data['session_year'];
$issue_date = $data['certificate_issue_date'];


// $tempDir = 'temp/';
// $codeContents = 'Student Name:' . $student_name . ' Registration: ' . urlencode($student_id) . ' Course: ' . $course_title;
// QRcode::png($codeContents, $tempDir . '' . $filename . '.png', QR_ECLEVEL_L, 5);

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    .container {
      /* position: relative; */
      font-family: Arial;
    }

    .student_session {
      position: absolute;
      top: 317px;
      left: 558px;
      color: black;
      padding-left: 20px;
      padding-right: 20px;
      font-size: 16pt;
      color: red;
    }

    .student_name {
      position: absolute;
      top: 370px;
      left: 68px;
      color: black;
      padding-left: 20px;
      padding-right: 20px;
      font-size: 16pt;
    }

    .student_code {
      position: absolute;
      top: 419px;
      left: 737px;
      color: black;
      padding-left: 20px;
      padding-right: 20px;
      font-size: 16pt;
    }

    .student_roll {
      position: absolute;
      top: 372px;
      left: 806px;
      color: black;
      padding-left: 20px;
      padding-right: 20px;
      font-size: 16pt;
    }

    .student_marksheet {
      position: absolute;
      top: 553px;
      left: 67px;
      color: black;
      padding-left: 20px;
      padding-right: 20px;
    }

    .student_father {
      position: absolute;
      top: 419px;
      left: 68px;
      color: black;
      padding-left: 20px;
      padding-right: 20px;
      font-size: 16pt;
    }

    .center_name {
      position: absolute;
      top: 468px;
      left: 68px;
      color: black;
      padding-left: 20px;
      padding-right: 20px;
      font-size: 16pt;
    }

    .course_title {
      position: absolute;
      top: 468px;
      left: 737px;
      color: black;
      padding-left: 20px;
      padding-right: 20px;
      font-size: 16pt;
    }

    /* .stamp {
      width: 210px;
      position: absolute;
      top: 1250px;
      left: 510px;
      color: black;
      padding-left: 20px;
      padding-right: 20px;
    } */

    .checked {
      width: 210px;
      position: absolute;
      bottom: 200px;
      left: 540px;
      color: black;
      padding-left: 20px;
      padding-right: 20px;
    }

    /* .signature {
      width: 125px;
      position: absolute;
      top: 1260px;
      left: 890px;
      color: black;
      padding-left: 20px;
      padding-right: 20px;
    } */

    .controller {
      width: 275px;
      position: absolute;
      bottom: 202px;
      left: 894px;
      color: black;
      padding-left: 20px;
      padding-right: 20px;
    }

    .qr_code {
      width: 102px;
      position: absolute;
      top: 250px;
      left: 940px;
      color: black;
      padding-left: 20px;
      padding-right: 20px;
    }

    table td {
      padding: 6px;
    }

    .result_student {
      position: absolute;
      bottom: 328px;
      left: 71px;
      color: black;
      padding-left: 20px;
      padding-right: 20px;
    }

    .today {
      position: absolute;
      bottom: 194px;
      left: 70px;
      color: black;
      padding-left: 20px;
      padding-right: 20px;
    }

    tbody td:not(:first-child) {
      text-align: center;
    }

    tfoot td:not(:first-child) {
      text-align: center;
    }

    tfoot td(2) {
      text-align: left;
    }

    @media print {

      .noprint,
      .noprint * {
        display: none !important;
      }
    }
  </style>
</head>

<body>

  <div class="container">
    <!-- <img src="https://gifaartcollege.in/gifapanel/admin/images/GIFA-Marksheet-www.jpg" alt="Gagan Fine Art" > -->
    <div id="printableArea">
      <!-- <img src="https://gifaartcollege.in/gifapanel/admin/images/secretay_signature_new.png" alt="GIFA Stamp"  class="stamp">
      <img src="https://gifaartcollege.in/gifapanel/admin/images/secretay_signature_new.png" alt="Controller of Exam"  class="signature"> -->
      <!-- <img src="../admin/temp/<?php echo $filename . '.png'; ?>" alt="Controller of Exam" style="" class="qr_code" style="width:100px; height:100px;"> -->
      <!-- <div class="checked">
        <h2>Checked by</h2>
      </div> -->
      <!-- <div class="controller">
        <h2>Secretary</h2>
      </div> -->
      <div class="student_name">
        <h4>Mr. / Ms. / Mrs. &nbsp;&nbsp;<?php echo $student_name; ?></h4>
      </div>
      <div class="student_father">
        <h4>Father / Husband Name &nbsp;&nbsp;<?php echo $father_name; ?></h4>
      </div>
      <div class="student_code">
        <h4>Enrollment No. &nbsp;&nbsp;<?php echo $student_id; ?></h4>
      </div>
      <div class="course_title">
        <h4>Course in &nbsp;&nbsp;<?php 
        echo $course_title;
         ?></h4>
      </div>
      <div class="student_roll">
        <h4>Roll No. &nbsp;&nbsp;<?php echo $roll_no; ?></h4>
      </div>
      <div class="center_name">
        <h4>Examination Center &nbsp;&nbsp;<?php echo $center_name; ?></h4>
      </div>
      <!-- <div class="today">
        <h2>Date of issue: <?php echo $issue_date; ?></h2>
      </div> -->

      <div class="student_marksheet">
        <table border="1" cellpadding="0" cellspacing="0" width="970px">
          <thead>
            <th>Subjects</th>
            <th>Code</th>
            <th>Max. Marks</th>
            <th>Min. Marks</th>
            <th>Theory</th>
            <th>Assignment</th>
            <th>Total</th>
          </thead>
          <tbody>
            <?php
            $grand = 0;
            $total = 0;
            $assignment = 0;
            $theory = 0;

            $sql9 = "SELECT student.*,course.*,subject.*,result.* FROM ai_students as student RIGHT JOIN result_students as result ON student.sid = result.student_id INNER JOIN ai_courses as course ON student.course_id = course.cid INNER JOIN ai_subjects as subject ON result.subject_id = subject.id where result.session_year =1 && result.student_id= " . $_GET['sid'];  
         
            //die();
            $query11 = $conn->query($sql9);
            while ($row = $query11->fetch_assoc()) {
              $grand = $grand + $row['assignment'] + $row['total_marks'];
              $total = $total + $grand;
              $assignment = $assignment + $row['assignment'];
              $theory = $theory + $row['total_marks'];
            ?>
              <tr>
                <td><b><?php
                 echo $row['subject_name']; 
                 ?></b></td>
                <td><b>
                  <?php 
                  echo $row['subject_code'];
                   ?>
                </b></td>
                <td>100</td>
                <td>40</td>
                <td><?php echo $row['total_marks']; ?></td>
                <td><?php echo $row['assignment']; ?></td>
                <td><?php echo $grand; ?></td>
              </tr>
            <?php $grand = 0;
            } ?>
          </tbody>
          <?php


          function convert_number_to_words($number)
          {

            $hyphen      = '-';
            $conjunction = ' and ';
            $separator   = ', ';
            $negative    = 'negative ';
            $decimal     = ' point ';
            $dictionary  = array(
              0                   => 'zero',
              1                   => 'one',
              2                   => 'two',
              3                   => 'three',
              4                   => 'four',
              5                   => 'five',
              6                   => 'six',
              7                   => 'seven',
              8                   => 'eight',
              9                   => 'nine',
              10                  => 'ten',
              11                  => 'eleven',
              12                  => 'twelve',
              13                  => 'thirteen',
              14                  => 'fourteen',
              15                  => 'fifteen',
              16                  => 'sixteen',
              17                  => 'seventeen',
              18                  => 'eighteen',
              19                  => 'nineteen',
              20                  => 'twenty',
              30                  => 'thirty',
              40                  => 'fourty',
              50                  => 'fifty',
              60                  => 'sixty',
              70                  => 'seventy',
              80                  => 'eighty',
              90                  => 'ninety',
              100                 => 'hundred',
              1000                => 'thousand',
              1000000             => 'million',
              1000000000          => 'billion',
              1000000000000       => 'trillion',
              1000000000000000    => 'quadrillion',
              1000000000000000000 => 'quintillion'
            );

            if (!is_numeric($number)) {
              return false;
            }

            if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
              // overflow
              trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
              );
              return false;
            }

            if ($number < 0) {
              return $negative . convert_number_to_words(abs($number));
            }

            $string = $fraction = null;

            if (strpos($number, '.') !== false) {
              list($number, $fraction) = explode('.', $number);
            }

            switch (true) {
              case $number < 21:
                $string = $dictionary[$number];
                break;
              case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                  $string .= $hyphen . $dictionary[$units];
                }
                break;
              case $number < 1000:
                $hundreds  = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                  $string .= $conjunction . convert_number_to_words($remainder);
                }
                break;
              default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                  $string .= $remainder < 100 ? $conjunction : $separator;
                  $string .= convert_number_to_words($remainder);
                }
                break;
            }

            if (null !== $fraction && is_numeric($fraction)) {
              $string .= $decimal;
              $words = array();
              foreach (str_split((string) $fraction) as $number) {
                $words[] = $dictionary[$number];
              }
              $string .= implode(' ', $words);
            }

            return $string;
          }
          ?>
          <tfoot>
            <tr>
              <td colspan="2"><b>Grand Total</b></td>
              <td>1000</td>
              <td>400</td>
              <td><?php echo $theory; ?></td>
              <td><?php echo $assignment; ?></td>
              <td><?php echo $total; ?></td>
            </tr>
            <tr>
              <td><b>Grand Total in words</b></td>
              <td colspan="6" style="text-align: left;"><?php echo strtoupper(convert_number_to_words($total)); ?></td>
            </tr>
          </tfoot>
        </table>
      </div>

      <div class="result_student">
        <h3><i>Result:</i>&nbsp;&nbsp;&nbsp;<b>PASSED IN FIRST DIVISION & OBTAINED: <?php echo strtoupper(convert_number_to_words($total)); ?></b></h3>
        <h3><i>The Minimum Marks for pass 33%</i></h3>
        <h3><i>Second Division 50%</i></h3>
        <h3><i>First Division 60%</i></h3>
      </div>

    </div>
  </div>
    <!--input type="button" id="create_pdf" value="Generate PDF"-->
    <input type="button" class="noprint" onclick="printDiv('printableArea')" value="Print" />

    <script type="text/javascript">
      function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
      }
      var rname = localStorage.getItem("name");

      var rage = localStorage.getItem("age");

      console.log("zfzfggcvhbjnkmllkjhgfdxfcvgbhnjmklghf");
    </script>

    <script>
      (function() {

        var

          form = $('.container'),

          cache_width = 980, //form.width(),  

          a4 = [595.28, 841.89]; // for a4 size paper width and height 


        $('#create_pdf').on('click', function() {

          $('body').scrollTop(0);

          createPDF();

        });

        //create pdf  s

        function createPDF() {

          getCanvas().then(function(canvas) {

            var

              img = canvas.toDataURL("image/png"),

              doc = new jsPDF({

                unit: 'px',

                format: 'a4'

              });

            doc.addImage(img, 'JPEG', 1.2, 1);

            doc.save('certificate.pdf');

            form.width(cache_width);

          });

        }

        // create canvas object  

        function getCanvas() {

          form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');

          return html2canvas(form, {

            imageTimeout: 2000,

            removeContainer: true

          });

        }

      }());
    </script>
<?php include 'footer.php'; ?>