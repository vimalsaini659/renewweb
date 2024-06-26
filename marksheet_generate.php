<?php
error_reporting(0);
include 'includes/connection.php';
include "header.php";
$sid = $_GET['sid'];
$course_id = $_GET['course_id'];
$center_id = $_GET['center_id'];

$info_sql = "SELECT ai_students.*, ai_courses.* FROM ai_students 
             INNER JOIN ai_courses ON ai_students.course_id = ai_courses.cid 
             WHERE ai_students.sid = $sid";
$query1 = $conn->query($info_sql);
$student_data = $query1->fetch_assoc();

$sql = "SELECT ai_students.*, ai_courses.*, result_students.* 
        FROM ai_students 
        LEFT JOIN ai_courses ON ai_courses.cid = ai_students.course_id 
        LEFT JOIN result_students ON ai_students.sid = result_students.student_id 
        WHERE ai_students.sid = $sid";
$query = $conn->query($sql);
$data = $query->fetch_assoc();

// Fetch center data
$test = "SELECT * FROM computer_centers WHERE id = $center_id";
$query2 = $conn->query($test);
$data2 = $query2->fetch_assoc();

$center_name = $data2['center_name'];
$course_title = $student_data['course_title'];
$duration = $student_data['course_duration'];
$photo = $student_data['photo'];

$student_name = $student_data['full_name'];
$father_name = $student_data['father_name'];
$roll_no = $student_data['roll_no'];
$student_id = $student_data['reg_no'];
$student_session = $data['session_year'];
$issue_date = $data['certificate_issue_date'];
?>
<title>Result </title>
<style>
  section.marksheet {
    margin-top: 28px;
}
section.marksheet ul li {
    font-size: 16px;
    /* text-align: center; */
    margin-top: 10px;
    list-style: none;
}
.marksheet-left {
    float: right;
}
section.result-bottom {
    padding: 26px;
    /* text-align: center; */
}
</style>
<div class="page-banner-area bg-2">
    <div class="container">
        <div class="page-banner-content">
            <h1>Result </h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li>Result </li>
            </ul>
        </div>
    </div>
</div>
<section class="marksheet">
  <div class="container">
    <div class="row">
      <h2 class="text-center">Result        
      </h2>
        <div class="col-md-6">
            <div class="marksheet-left">
                <ul>
                    <li><b>Mr. / Ms. / Mrs.</b> <?php echo $student_name; ?></li>
                    <li><b>Father / Husband Name</b> <?php echo $father_name; ?></li>
                    <li><b>Enrollment No.</b> <?php echo $student_id; ?></li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="marksheet-right">
                <ul>
                    <li><b>Course in</b> <?php echo $course_title; ?></li>
                    <li><b>Roll No.</b> <?php echo $roll_no; ?></li>
                    <li><b>Examination Center</b> <?php echo $center_name; ?></li>
                </ul>
            </div>
        </div>
    </div>
    </div>
</section>
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
<section class="student-mark">
  <div class="container">
  <div class="student_marksheet">
    <div class="container">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Subjects</th>
                    <th>Code</th>
                    <th>Max. Marks</th>
                    <th>Min. Marks</th>
                    <th>Theory</th>
                    <th>Assignment</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $grand = 0;
                $total = 0;
                $assignment = 0;
                $theory = 0;

                $sql9 = "SELECT student.*, course.*, subject.*, result.* 
                        FROM ai_students as student 
                        RIGHT JOIN result_students as result ON student.sid = result.student_id 
                        INNER JOIN ai_courses as course ON student.course_id = course.cid 
                        INNER JOIN ai_subjects as subject ON result.subject_id = subject.id 
                        WHERE result.session_year = 1 AND result.student_id = $sid";
                $query11 = $conn->query($sql9);
                while ($row = $query11->fetch_assoc()) {
                    $grand = $row['assignment'] + $row['total_marks'];
                    $total += $grand;
                    $assignment += $row['assignment'];
                    $theory += $row['total_marks'];
                ?>
                <tr>
                    <td><b><?php echo $row['subject_name']; ?></b></td>
                    <td><b><?php echo $row['subject_code']; ?></b></td>
                    <td>100</td>
                    <td>40</td>
                    <td><?php echo $row['total_marks']; ?></td>
                    <td><?php echo $row['assignment']; ?></td>
                    <td><?php echo $grand; ?></td>
                </tr>
                <?php } ?>
            </tbody>
     
            <tfoot class="table-dark">
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
                    <td colspan="6" style="text-align: left;"><?php echo strtoupper(convert_number_to_words($total)); ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

  </div>
</section>
<section class="result-bottom">
<div class="container">
        <p>Result:</i>&nbsp;&nbsp;&nbsp;<b>PASSED IN FIRST DIVISION & OBTAINED:
                <?php echo strtoupper(convert_number_to_words($total)); ?></b></p>
        <p><i>The Minimum Marks for pass 33%</i></p>
        <p><i>Second Division 50%</i></p>
        <p><i>First Division 60%</i></p>
    </div>
</section>

<script type="text/javascript">
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>
<?php include 'footer.php'; ?>