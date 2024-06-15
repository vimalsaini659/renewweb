<?php include 'includes/session.php'; ?>

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

          Student List

        </h1>

        <ol class="breadcrumb">

          <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>

          <li>Students</li>

          <li class="active">Student List</li>

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

        <div class="row">

          <div class="col-xs-12">

            <div class="box">

              <div class="box-header with-border">

                <!--a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a-->

              </div>

              <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered">

                  <thead>

                    <th>Student ID</th>

                    <th>Center</th>

                    <th>Course</th>

                    <th>Photo</th>

                    <th>Name</th>

                    <th>Schedule</th>

                    <th>Admission Date</th>

                    <th>Tools</th>

                    <th>Action</th>

                    <th>Request</th>


                  </thead>

                  <tbody>

                    <?php

                    //$sql = "SELECT * FROM ai_students LEFT JOIN ai_courses ON ai_courses.cid=ai_students.course_id";
                    /*echo $sql ="SELECT ai_students.*,computer_centers.*,ai_courses.* FROM `ai_students` inner join ai_courses on ai_students.course_id=ai_courses.cid inner join ai_subjects on ai_courses.cid=ai_subjects.course_id inner join exams on ai_subjects.id=exams.subject_id inner join computer_centers on computer_centers.id=ai_courses.center_id";*/
                    $sql = "SELECT student.*,course.*,cinfo.* FROM ai_students as student LEFT JOIN ai_courses as course ON course.cid=student.course_id LEFT JOIN computer_centers as cinfo on student.center_id=cinfo.id";

                    $query = $conn->query($sql);

                    while ($row = $query->fetch_assoc()) {

                    ?>

                      <tr>

                        <td><?php echo $row['reg_no']; ?></td>

                        <td><?php echo $row['center_name']; ?></td>

                        <td><?php echo $row['course_title']; ?></td>

                        <td><img src="<?php echo (!empty($row['photo'])) ? '../uploads/' . $row['photo'] : '../images/profile.jpg'; ?>" width="30px" height="30px"></td>

                        <td><?php echo $row['full_name']; ?></td>

                        <td><?php echo date('h:i A', strtotime($row['time_in'])) . ' - ' . date('h:i A', strtotime($row['time_out'])); ?></td>

                        <td><?php echo date('M d, Y', strtotime($row['created_at'])) ?></td>

                        <td>

                          <button type="button" id="<?php echo $row['reg_no']; ?>" class="btn btn-info btnSetIssueDate" data-regno="<?php echo $row['reg_no']; ?>" data-toggle="modal" data-target="#issueDateModal">Set Issue Date</button>

                          <a class="btn btn-success" href="marksheet_generate.php?sid=<?php echo $row['sid']; ?>&course_id=1&center_id=<?php echo $row['id']; ?>" target="_blank">Marksheet</a>

                          <!-- <a class="btn btn-success" href="marksheet_generate-new.php?sid=<?php echo $row['sid']; ?>&course_id=<?php echo $row['course_id']; ?>&center_id=<?php echo $row['id']; ?>" target="_blank">Marksheet2</a> -->

                          <a class="btn btn-info" href="set_marksheet.php?sid=<?php echo $row['sid']; ?>&course_id=1&center_id=<?php echo $row['id']; ?>" target="_blank">Set Marksheet</a>

                          <a class="btn btn-danger" href="edit_marksheet.php?sid=<?php echo $row['sid']; ?>&course_id=1&center_id=<?php echo $row['id']; ?>" target="_blank"> Edit</a>

                          <a class="btn btn-success" href="marksheet_generate2.php?sid=<?php echo $row['sid']; ?>&course_id=2&center_id=<?php echo $row['id']; ?>" target="_blank">2nd Marksheet</a>

                          <a class="btn btn-info" href="set_marksheet2.php?sid=<?php echo $row['sid']; ?>&course_id=2&center_id=<?php echo $row['id']; ?>" target="_blank">Set Marksheet</a>

                          <a class="btn btn-danger" href="edit_marksheet2.php?sid=<?php echo $row['sid']; ?>&course_id=2&center_id=<?php echo $row['id']; ?>" target="_blank"> Edit</a>
                        </td>
                        <td>
                          <form method="post" action="">
                            <input type="hidden" name="sid" value="<?php echo $row['sid']; ?>">
                            <input type="radio" name="radon" value="2" <?php if ($row['mark_status'] == 2) echo "checked" ?>> on
                            <input type="radio" name="radon" value="0" <?php if (($row['mark_status'] == 0) || ($row['mark_status'] == 1)) echo "checked" ?>> off
                            <input type="submit" name="submit" value="Submit" class="btn btn-info">
                          </form>

                        </td>
                        <td>
                          <?php
                          if ($row['mark_status'] == '0') {
                            echo "<input type='button' class='btn btn-danger' value='Request'>";
                          } else if (($row['mark_status'] == 1) || ($row['mark_status'] == 2)) {
                            echo "<input type='button' class='btn btn-success' value='Request'>";
                          }
                          ?>
                        </td>

                      </tr>

                    <?php

                    }

                    ?>

                  </tbody>

                </table>

              </div>
              </div>

            </div>

          </div>

        </div>

      </section>

    </div>



    <?php include 'includes/footer.php'; ?>

    <?php include 'includes/certificate_modal.php'; ?>
    <?php include 'includes/student_modal.php'; ?>

  </div>

  <?php include 'includes/scripts.php'; ?>

  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

  <script>
    $(function() {

      $('.edit').click(function(e) {

        e.preventDefault();

        $('#edit').modal('show');

        var id = $(this).data('id');

        getRow(id);

      });

      $('.btnCopySID').click(function(e) {
        e.preventDefault();
        var url = $(this).data('url');
        var path1 = url + '&year=1';
        var path2 = url + '&year=2';
        console.log(path1 + path2);
        $('.yearoption1').attr('href', path1);
        $('.yearoption2').attr('href', path2);

      });

      $('.delete').click(function(e) {

        e.preventDefault();

        $('#delete').modal('show');

        var id = $(this).data('id');

        getRow(id);

      });

      $(document).on('click', '.btnSetIssueDate', function() {
        //alert($(this).data('regno'));
        $('#regno').val($(this).data('regno'));
      });

      $('.photo').click(function(e) {

        e.preventDefault();

        var id = $(this).data('id');

        getRow(id);

      });



    });



    function getRow(id) {

      console.log(id);

      $.ajax({

        type: 'POST',

        url: 'student_row.php',

        data: {
          id: id
        },

        dataType: 'json',

        success: function(response) {

          console.log(response);

          $('.stdid').val(response.id);

          $('.student_id').html(response.student_id);

          $('.del_student_name').html(response.firstname + ' ' + response.lastname);

          $('#employee_name').html(response.firstname + ' ' + response.lastname);

          $('#edit_firstname').val(response.firstname);

          $('#edit_lastname').val(response.lastname);

          $('#edit_address').val(response.address);

          $('#datepicker_edit').val(response.birthdate);

          $('#edit_contact').val(response.contact_info);

          $('#gender_val').val(response.gender).html(response.gender);

          $('#position_val').val(response.position_id).html(response.description);

          $('#schedule_val').val(response.schedule_id).html(response.time_in + ' - ' + response.time_out);

        },

        error: function(error) {

          console.log(error);

        }

      });

    }
  </script>

</body>

</html>


<?php

if (isset($_POST['submit'])) {
  $sid = $_POST['sid'];
  $newname = $_POST['radon'];
  $query2 = "UPDATE ai_students set mark_status = '$newname' WHERE sid = '$sid'";
  $result1 = mysqli_query($conn, $query2);
  if ($newname == 2) {
    echo "<script>alert('Button Enabled');</script>";
  }
  if ($newname == 0) {
    echo "<script>alert('Button Disabled');</script>";
  }
}
