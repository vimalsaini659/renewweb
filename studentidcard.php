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

                <!--a href="#addnewstudent" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a-->

              </div>

              <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered">

                  <thead>

                    <th>Student ID</th>

                    <th>Photo</th>

                    <th>Registration</th>

                    <th>Name</th>

                    <th>Course</th>

                    <th>Schedule</th>

                    <th>Member Since</th>

                    <th>Action</th>

                    <th>Tools</th>

                    <th>Request</th>

                  </thead>

                  <tbody>

                    <?php

                    //$sql = "SELECT *, ai_studentss.id AS stdid FROM ai_students LEFT JOIN courses ON ai_courses.id=ai_students.course_id LEFT JOIN schedules ON schedules.id=ai_students.schedule_id";
                    $sql = "SELECT *, ai_students.sid AS stdid FROM ai_students LEFT JOIN ai_courses ON ai_courses.cid=ai_students.course_id";

                    $query = $conn->query($sql);

                    while ($row = $query->fetch_assoc()) {

                    ?>

                      <tr>

                        <td><?php echo $row['sid']; ?></td>

                        <td><img src="<?php echo (!empty($row['photo'])) ? '../uploads/' . $row['photo'] : '../images/profile.jpg'; ?>" width="30px" height="30px"> <a href="#edit_photo" data-toggle="modal" class="pull-right photo" data-id="<?php echo $row['stdid']; ?>"><span class="fa fa-edit"></span></a></td>
                        <td><?php echo $row['reg_no']; ?></td>
                        <td><?php echo $row['full_name']; ?></td>

                        <td><?php echo $row['course_title']; ?></td>

                        <td><?php echo date('h:i A', strtotime($row['time_in'])) . ' - ' . date('h:i A', strtotime($row['time_out'])); ?></td>

                        <td><?php echo date('M d, Y', strtotime($row['created_at'])) ?></td>

                        <td>
                          <a class="btn btn-warning btn-sm btn-flat" href="idgenerator3.php?id=<?php echo $row['reg_no']; ?>" target="_blank">Generate ID</a>
                        </td>
                        <td>
                          <form method="post" action="">
                            <input type="hidden" name="sid" value="<?php echo $row['sid']; ?>">
                            <input type="radio" name="radon" value="2" <?php if ($row['idCard_status'] == 2) echo "checked" ?>> on
                            <input type="radio" name="radon" value="0" <?php if (($row['idCard_status'] == 0) || ($row['idCard_status'] == 1)) echo "checked" ?>> off
                            <input type="submit" name="submit" value="Submit" class="btn btn-success">
                          </form>
                        </td>
                        <td>
                          <?php
                          if ($row['idCard_status'] == '0') {
                            echo "<input type='button' class='btn btn-danger' value='Request'>";
                          } else if (($row['idCard_status'] == 1) || ($row['idCard_status'] == 2)) {
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

      $(document).on('change', '.course_select', function(e) {
        e.preventDefault();
        var cid = $(this).val();
        $.post('course_details.php', {
          'course_id': cid
        }, function(data) {

          var obj = JSON.parse(data);
          //console.log(data + obj.course_fees);
          $('.course_fees').val(obj.course_fees);
          $('.course_duration').val(obj.course_duration);
          $('.hideme').show('fast');
        });

      });

      //  $('.delete').click(function(e){
      $(document).on('click', '.delete', function(e) {
        e.preventDefault();


        $('#delete1').modal('show');

        var id = $(this).data('id');
        //alert('testing delete' + id);
        $('.stdid').val(id);
        //getRow(id);


      });



      $('.photo').click(function(e) {

        e.preventDefault();

        var id = $(this).data('id');

        getRow(id);

      });



    }); // end jquery here



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
  $query2 = "UPDATE ai_students set idCard_status = '$newname' WHERE sid = '$sid'";
  $result1 = mysqli_query($conn, $query2);
  if ($newname == 2) {
    echo "<script>alert('Button Enabled');</script>";
  }
  if ($newname == 0) {
    echo "<script>alert('Button Disabled');</script>";
  }
}
