<?php include 'includes/session.php'; ?>

<?php

include '../timezone.php';

$today = date('Y-m-d');

$year = date('Y');

if (isset($_GET['year'])) {

  $year = $_GET['year'];
}



$sql_count_users = "SELECT * FROM online_users";

$query = $conn->query($sql_count_users);



$online = $query->num_rows;

?>

<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">



    <?php include 'includes/navbar.php'; ?>

    <?php include 'includes/menubar.php'; ?>



    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">

      <!-- Content Header (Page header) -->

      <section class="content-header">

        <h1>

          Dashboard

        </h1>

        <ol class="breadcrumb">

          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

          <li class="active">Dashboard</li>

        </ol>

      </section>



      <!-- Main content -->

      <section class="content">

        <?php

        if (isset($_SESSION['error'])) {

          echo "

            <div class='alert alert-danger alert-dismissible'>

              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>

              <h4><i class='icon fa fa-warning'></i> Error!</h4>

              " . $_SESSION['error'] . "

            </div>

          ";

          unset($_SESSION['error']);
        }

        if (isset($_SESSION['success'])) {

          echo "

            <div class='alert alert-success alert-dismissible'>

              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>

              <h4><i class='icon fa fa-check'></i> Success!</h4>

              " . $_SESSION['success'] . "

            </div>

          ";

          unset($_SESSION['success']);
        }

        ?>

        <!-- Small boxes (Stat box) -->

        <div class="row">

          <div class="col-lg-2 col-xs-6">

            <!-- small box -->

            <div class="small-box bg-aqua">

              <div class="inner">

                <?php

                $sql = "SELECT * FROM admin";

                $query = $conn->query($sql);



                echo "<h3>" . $query->num_rows . "</h3>";

                ?>



                <p>Total Users</p>

              </div>

              <div class="icon">

                <i class="ion ion-person-stalker"></i>

              </div>

              <a href="admin_users.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

            </div>

          </div>

          <!-- ./col -->

          <div class="col-lg-2 col-xs-6">

            <!-- small box -->

            <div class="small-box bg-green">

              <div class="inner">

                <?php

                $sql = "SELECT * FROM ai_courses";

                $query = $conn->query($sql);

                $total = $query->num_rows;







                echo "<h3>" . $total . "</h3>";

                ?>



                <p>Total Courses</p>

              </div>

              <div class="icon">

                <i class="ion ion-pie-graph"></i>

              </div>

              <a href="attendance.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

            </div>

          </div>

          <!-- ./col -->

          <div class="col-lg-2 col-xs-6">

            <!-- small box -->

            <div class="small-box bg-yellow">

              <div class="inner">

                <?php

                $sql = "SELECT * FROM ai_subjects";

                $query = $conn->query($sql);



                echo "<h3>" . $query->num_rows . "</h3>"

                ?>



                <p>Total Subjects</p>

              </div>

              <div class="icon">

                <i class="ion ion-clock"></i>

              </div>

              <a href="subjects.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

            </div>

          </div>

          <!-- ./col -->

          <div class="col-lg-2 col-xs-6">

            <!-- small box -->

            <div class="small-box bg-red">

              <div class="inner">

                <?php

                $sql = "SELECT * FROM ai_notifications";

                $query = $conn->query($sql);



                echo "<h3>" . $query->num_rows . "</h3>"

                ?>



                <p>Total Notices</p>

              </div>

              <div class="icon">

                <i class="ion ion-alert-circled"></i>

              </div>

              <a href="notices.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

            </div>

          </div>

          <div class="col-lg-2 col-xs-6">

            <!-- small box -->

            <div class="small-box bg-red">

              <div class="inner">

                <?php

                $sql = "SELECT * FROM ai_students";

                $query = $conn->query($sql);



                echo "<h3>" . $query->num_rows . "</h3>"

                ?>



                <p>Students</p>

              </div>

              <div class="icon">

                <i class="ion ion-person-stalker"></i>

              </div>

              <a href="student.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

            </div>

          </div>

          <!-- ./col -->

          <!-- ./col -->


          <!-- ./col -->
          <div class="col-lg-2 col-xs-6">

            <!-- small box -->

            <div class="small-box bg-yellow">

              <div class="inner">

                <?php

                $sql = "SELECT * FROM questions";

                $query = $conn->query($sql);

                echo "<h3>" . $query->num_rows . "</h3>"

                ?>

                <p>Total Questions</p>

              </div>

              <div class="icon">

                <i class="ion ion-clock"></i>

              </div>

              <a href="questions.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

            </div>

          </div>

          <!-- ./col -->

        </div>

        <!-- /.row -->

        <div class="row">

          <!-- ./col -->
          <div class="col-lg-2 col-xs-6">

            <!-- small box -->

            <div class="small-box bg-green">

              <div class="inner">

                <?php

                $sql = "SELECT * FROM computer_centers";

                $query = $conn->query($sql);



                echo "<h3>" . $query->num_rows . "</h3>"

                ?>



                <p>Centers</p>

              </div>

              <div class="icon">

                <i class="ion ion-alert-circled"></i>

              </div>

              <a href="centers.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

            </div>

          </div>

          <div class="col-lg-2 col-xs-6">

            <!-- small box -->

            <div class="small-box bg-aqua">

              <div class="inner">

                <?php

                $sql = "SELECT *,ai_subjects.id as subjectid,ai_courses.cid as courseid,exams.id as eid FROM ai_subjects join ai_courses on ai_subjects.center_id=ai_courses.cid left join exams on ai_subjects.id=exams.subject_id order by exams.exam_date ASC";

                $query = $conn->query($sql);

                echo "<h3>" . $query->num_rows . "</h3>";

                ?>

                <p>Exam</p>

              </div>

              <div class="icon">

                <i class="ion ion-person-stalker"></i>

              </div>

              <a href="exams.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

            </div>

          </div>

          <!-- ./col -->

          <div class="col-lg-2 col-xs-6">

            <!-- small box -->

            <div class="small-box bg-green">

              <div class="inner">

                <?php

                $sql = "SELECT *, ai_students.sid AS stdid, ai_subjects.id as subid FROM ai_students LEFT JOIN ai_courses ON ai_courses.cid=ai_students.course_id left join ai_subjects on ai_subjects.course_id=ai_courses.cid";

                $query = $conn->query($sql);

                $total = $query->num_rows;

                echo "<h3>" . $total . "</h3>";

                ?>
                <p>Exam History</p>

              </div>

              <div class="icon">

                <i class="ion ion-pie-graph"></i>

              </div>

              <a href="studentexamhistory.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

            </div>

          </div>

          <!-- ./col -->

          <div class="col-lg-2 col-xs-6">

            <!-- small box -->

            <div class="small-box bg-red">

              <div class="inner">

                <?php

                $sql = "SELECT student.*,course.* FROM ai_students as student LEFT JOIN ai_courses as course ON course.cid=student.course_id where st_type=0";

                $query = $conn->query($sql);

                echo "<h3>" . $query->num_rows . "</h3>"

                ?>
                <p>Student Online</p>

              </div>

              <div class="icon">

                <i class="ion ion-clock"></i>

              </div>

              <a href="studentoff.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

            </div>

          </div>

          <!-- ./col -->

          <div class="col-lg-2 col-xs-6">

            <!-- small box -->

            <div class="small-box bg-yellow">


              <div class="inner">

                <?php

                $sql = "SELECT * FROM ai_students LEFT JOIN ai_courses ON ai_courses.cid=ai_students.course_id";

                $query = $conn->query($sql);

                echo "<h3>" . $query->num_rows . "</h3>"

                ?>

                <p>Total Certificates</p>

              </div>

              <div class="icon">

                <i class="ion ion-person-stalker"></i>

              </div>

              <a href="certificate.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

            </div>

          </div>
          <div class="col-lg-2 col-xs-6">

            <!-- small box -->

            <div class="small-box bg-green">

              <div class="inner">

                <?php

                $sql = "SELECT student.*,course.*,cinfo.* FROM ai_students as student LEFT JOIN ai_courses as course ON course.cid=student.course_id LEFT JOIN computer_centers as cinfo on student.center_id=cinfo.id";

                $query = $conn->query($sql);

                $total = $query->num_rows;

                echo "<h3>" . $total . "</h3>";

                ?>
                <p>Marksheets</p>

              </div>

              <div class="icon">

                <i class="ion ion-pie-graph"></i>

              </div>

              <a href="studentexamhistory.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

            </div>

          </div>

        </div>

        <!-- ./col -->


        <div class="row">

          <!-- ./col -->

          <div class="col-lg-2 col-xs-6">

            <!-- small box -->

            <div class="small-box bg-aqua">

              <div class="inner">

                <?php

                $sql = "SELECT *, ai_students.sid AS stdid FROM ai_students LEFT JOIN ai_courses ON ai_courses.cid=ai_students.course_id";

                $query = $conn->query($sql);

                echo "<h3>" . $query->num_rows . "</h3>"

                ?>
                <p>Student Id Card</p>

              </div>

              <div class="icon">

                <i class="ion ion-alert-circled"></i>

              </div>

              <a href="studentidcard.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

            </div>

          </div>
          <div class="col-lg-2 col-xs-6">

            <!-- small box -->

            <div class="small-box bg-green">

              <div class="inner">

                <?php

                $sql = "SELECT student.*,course.* FROM ai_students as student LEFT JOIN ai_courses as course ON course.cid=student.course_id";

                $query = $conn->query($sql);

                echo "<h3>" . $query->num_rows . "</h3>"

                ?>

                <p>Students Admit Card</p>

              </div>

              <div class="icon">

                <i class="ion ion-person-stalker"></i>

              </div>

              <a href="studentadmitcard.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

            </div>

          </div>

          <!-- ./col -->

          <!-- ./col -->

          <div class="col-lg-2 col-xs-6">

            <!-- small box -->

            <div class="small-box bg-red">

              <div class="inner">

                <?php

                $sql = "SELECT student.roll_no,student.photo,student.full_name,docs.*,docs.id as docid,docs.created_at as mydate,cntr.*,course.*, docs.isactive as status FROM send_request_documents as docs LEFT join ai_students as student on student.sid=docs.stud_id LEFT JOIN computer_centers as cntr on docs.center_id=cntr.id LEFT JOIN ai_courses as course on course.cid=student.course_id";

                $query = $conn->query($sql);

                echo "<h3>" . $query->num_rows . "</h3>"

                ?>

                <p>RFC</p>

              </div>

              <div class="icon">

                <i class="ion ion-alert-circled"></i>

              </div>

              <a href="scr.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

            </div>

          </div>

        </div>
      </section>

      <div class="row">

        <div class="col-xs-12">

          <div class="box">

            <div class="box-header with-border">

              <h3 class="box-title">Monthly Attendance Report</h3>

              <div class="box-tools pull-right">

                <form class="form-inline">

                  <div class="form-group">

                    Search <input type="text" name="search">

                    <label>Select Year: </label>

                    <select class="form-control input-sm" id="select_year">

                      <?php

                      for ($i = 2015; $i <= 2065; $i++) {

                        $selected = ($i == $year) ? 'selected' : '';

                        echo "

                            <option value='" . $i . "' " . $selected . ">" . $i . "</option>

                          ";
                      }

                      ?>

                    </select>

                  </div>

                </form>

              </div>

            </div>

            <div class="box-body">

              <div class="chart">

                <br>

                <div id="legend" class="text-center"></div>

                <canvas id="barChart" style="height:350px"></canvas>

              </div>

            </div>

          </div>

        </div>

      </div>



      </section>

      <!-- right col -->

    </div>

    <?php include 'includes/footer.php'; ?>



  </div>

  <!-- ./wrapper -->



  <!-- Chart Data -->

  <?php

  $and = 'AND YEAR(date) = ' . $year;

  $months = array();

  $ontime = array();

  $late = array();

  for ($m = 1; $m <= 12; $m++) {

    $sql = "SELECT * FROM attendance WHERE MONTH(date) = '$m' AND status = 1 $and";

    $oquery = $conn->query($sql);

    array_push($ontime, $oquery->num_rows);



    $sql = "SELECT * FROM attendance WHERE MONTH(date) = '$m' AND status = 0 $and";

    $lquery = $conn->query($sql);

    array_push($late, $lquery->num_rows);



    $num = str_pad($m, 2, 0, STR_PAD_LEFT);

    $month =  date('M', mktime(0, 0, 0, $m, 1));

    array_push($months, $month);
  }



  $months = json_encode($months);

  $late = json_encode($late);

  $ontime = json_encode($ontime);



  ?>

  <!-- End Chart Data -->

  <?php include 'includes/scripts.php'; ?>

  <script>
    $(function() {

      var barChartCanvas = $('#barChart').get(0).getContext('2d')

      var barChart = new Chart(barChartCanvas)

      var barChartData = {

        labels: <?php echo $months; ?>,

        datasets: [

          {

            label: 'Late',

            fillColor: 'rgba(210, 214, 222, 1)',

            strokeColor: 'rgba(210, 214, 222, 1)',

            pointColor: 'rgba(210, 214, 222, 1)',

            pointStrokeColor: '#c1c7d1',

            pointHighlightFill: '#fff',

            pointHighlightStroke: 'rgba(220,220,220,1)',

            data: <?php echo $late; ?>

          },

          {

            label: 'Ontime',

            fillColor: 'rgba(60,141,188,0.9)',

            strokeColor: 'rgba(60,141,188,0.8)',

            pointColor: '#3b8bba',

            pointStrokeColor: 'rgba(60,141,188,1)',

            pointHighlightFill: '#fff',

            pointHighlightStroke: 'rgba(60,141,188,1)',

            data: <?php echo $ontime; ?>

          }

        ]

      }

      barChartData.datasets[1].fillColor = '#00a65a'

      barChartData.datasets[1].strokeColor = '#00a65a'

      barChartData.datasets[1].pointColor = '#00a65a'

      var barChartOptions = {

        //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value

        scaleBeginAtZero: true,

        //Boolean - Whether grid lines are shown across the chart

        scaleShowGridLines: true,

        //String - Colour of the grid lines

        scaleGridLineColor: 'rgba(0,0,0,.05)',

        //Number - Width of the grid lines

        scaleGridLineWidth: 1,

        //Boolean - Whether to show horizontal lines (except X axis)

        scaleShowHorizontalLines: true,

        //Boolean - Whether to show vertical lines (except Y axis)

        scaleShowVerticalLines: true,

        //Boolean - If there is a stroke on each bar

        barShowStroke: true,

        //Number - Pixel width of the bar stroke

        barStrokeWidth: 2,

        //Number - Spacing between each of the X value sets

        barValueSpacing: 5,

        //Number - Spacing between data sets within X values

        barDatasetSpacing: 1,

        //String - A legend template

        legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',

        //Boolean - whether to make the chart responsive

        responsive: true,

        maintainAspectRatio: true

      }



      barChartOptions.datasetFill = false

      var myChart = barChart.Bar(barChartData, barChartOptions)

      document.getElementById('legend').innerHTML = myChart.generateLegend();

    });
  </script>

  <script>
    $(function() {

      $('#select_year').change(function() {

        window.location.href = 'home.php?year=' + $(this).val();

      });

    });
  </script>

</body>

</html>