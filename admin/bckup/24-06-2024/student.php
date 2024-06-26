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

                <a href="#addnewstudent" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                <!--a href="#addnewstudent2" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New Student</a-->
                <!--a href="stduent_form.php" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New Admission</a>

               <a href="import.php" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-plus"></i> Import Students</a-->

              </div>

              <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered">

                    <thead>

                      <th>Student ID</th>

                      <th>Photo</th>

                      <th>Name</th>

                      <th>Registration</th>

                      <th>Center Name</th>

                      <th>Course</th>

                      <th>User Name</th>

                      <th>Password</th>

                      <th>Tools</th>

                    </thead>

                    <tbody>

                      <?php

                      //$sql = "SELECT *, ai_studentss.id AS stdid FROM ai_students LEFT JOIN courses ON ai_courses.id=ai_students.course_id LEFT JOIN schedules ON schedules.id=ai_students.schedule_id";
                      // $sql = "SELECT student.*,course.* FROM ai_students as student LEFT JOIN ai_courses as course ON course.cid=student.course_id";
                      $sql = "SELECT student.*,course.*,computer_centers.* FROM ai_students as student 
                    LEFT JOIN ai_courses as course ON course.cid=student.course_id
                    LEFT JOIN computer_centers on computer_centers.id = student.center_id";

                      /*$sqln = 'SELECT * FROM ai_students as student join student_course_programs as scp on student.st_id=scp.s_id join ai_courses as course on scp.c_id=course.cid join computer_centers cc on scp.c_id=cc.id';*/

                      $query = $conn->query($sql);
                      $num = mysqli_num_rows($query);                  
                      

                      while ($row = $query->fetch_assoc()) {

                      ?>

                        <tr>

                          <td><?php echo $row['roll_no']; ?></td>

                          <td><img src="<?php echo (!empty($row['photo'])) ? '../uploads/' . $row['photo'] : '../uploads/profile.jpg'; ?>" width="30px" height="30px"> <a href="#edit_photo" data-toggle="modal" class="pull-right photo" data-id="<?php echo $row['sid']; ?>"><span class="fa fa-edit"></span></a></td>

                          <td><?php echo $row['full_name']; ?></td>

                          <td><?php echo $row['reg_no']; ?></td>

                          <td><?php echo $row['center_name']; ?></td>

                          <td><?php echo $row['course_title']; ?></td>

                          <td><?php echo $row['email']; ?></td>

                          <td><?php echo $row['password'] ?></td>

                          <td>
                            <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['sid']; ?>"><i class="fa fa-edit"></i> Edit</button>

                            <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['sid']; ?>"><i class="fa fa-trash"></i> Delete</button>

                            <!-- <button class="btn btn-info btn-sm password btn-flat" data-id="<?php echo $row['sid']; ?>"><i class="fa fa-key" aria-hidden="true"></i> Password</button> -->

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
    $('#course').change(function() {
      var criteria_id = $(':selected', this).data('id');
      $('.session').val(criteria_id);
    });

    $('#edit_course1').change(function() {
      var criteria_id = $(':selected', this).data('id');
      $('.session_year').val(criteria_id);
    });

    $('#coursess_from').change(function() {
      var criteria_id = $(':selected', this).data('id');
      $('.courses_f').val(criteria_id);
    });

    $('#coursess_to').change(function() {
      var criteria_id = $(':selected', this).data('id');
      $('.courses_t').val(criteria_id);
    });

    $(function() {

      $('#course2').multiselect({
        nonSelectedText: 'Select Courses',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth: '250px'
      });

      $.get('server/fetch_centers.php', function(data) {
        var returnedData = JSON.parse(data);
        $.each(returnedData, function(i, j) {
          content = '<option data-id="' + j.id + '" id="' + j.id + '">' + j.center_name + '</option>';
        });
      });

      //$('#center_id').on('change', function() {
      $(document).on('change', '.center_select', function(e) {
        e.preventDefault();
        var cid = $(this).val();
        $.post('server/fetch_courses.php', {
          'cid': cid
        }, function(data) {
          console.log(data);
          $('#course1').html('<option>Select Course</option>');
          addnewstudent
          $('#course2').html('<option>Select Course</option>');
          $('#edit_course').html('');
          var obj = JSON.parse(data);
          //console.log(obj);
          var content = '';
          $.each(obj, function(i, j) {
            content += '<option data-id="' + j.cid + '" id="' + j.cid + '" value="' + j.cid + '">' + j.course_title + '</option>';
          });
          $('#course1').append(content);
          $('#course2').append(content);
          $('#edit_course').append(content);
        });
      });

      $(document).on('click', '.edit', function(e) {

        e.preventDefault();

        $('#editStudent').modal('show');

        var id = $(this).data('id');
        console.log('student_id' + id);

        //getRow(id);

        $.ajax({

          type: 'POST',

          url: 'student_row.php',

          data: {
            id: id
          },

          dataType: 'json',

          success: function(response) {

            //console.log(response);

            $.each(response, function(i, item) {
              console.log(i + item);
              $('.' + i).val(item);
            });

          },

          error: function(error) {

            console.log(error);

          }

        });

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
        $('#deleteStudent').modal('show');
        var id = $(this).data('id');
        $('.stdid').val(id);
        getRow(id);
      });

      $(document).on('click', '.password', function(e) {
        e.preventDefault();
        $('#passwordStudent').modal('show');
        var id = $(this).data('id');
        $('.stdid').val(id);
        getRow(id);
      });


      $(document).on('click', '.photo', function(e) {
        e.preventDefault();

        var id = $(this).data('id');
        getRow(id);

      });

    }); // end jquery here

    function getRow(id) {

      //console.log(id);

      $.ajax({

        type: 'POST',

        url: 'student_row.php',

        data: {
          id: id
        },

        dataType: 'json',

        success: function(response) {

          //console.log(response);

          $('.stdid').val(response.sid);

          $('.student_id').html(response.student_id);

          $('.del_student_name').html(response.full_name);

          $('#edit_firstname').val(response.full_name);
          $('#edit_username').val(response.username);

          $('#edit_address').val(response.address);

          $('#datepicker_edit').val(response.dob);

          $('.courses_f').val(response.training_from);

          $('.courses_t').val(response.training_to);

          $('#edit_contact').val(response.contact);

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