<!-- Add -->

<div class="modal fade" id="addnewstudent">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title"><b>Add Student</b></h4>

      </div>

      <div class="modal-body">

        <form class="form-horizontal" method="POST" action="student_add.php" enctype="multipart/form-data" autocomplete="off">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">

                <label for="gender" class="col-sm-3 control-label">Center</label>
                <div class="col-sm-9">

                  <select class="form-control center_select" name="center_select" id="center_select" required>
                    <option value="" selected>- Select Center -</option>
                    <?php
                    $sql = "SELECT * FROM computer_centers";
                    $query = $conn->query($sql);
                    while ($prow = $query->fetch_assoc()) {
                      echo "<option value='" . $prow['id'] . "'>" . $prow['center_name'] . "</option>";
                    }
                    ?>
                  </select>

                </div>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">

                <label for="father" class="col-sm-3 control-label">Student Name</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" id="full_name" name="full_name" oninput="convertToUppercase(this)"  required>

                </div>

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">

                <label for="father" class="col-sm-3 control-label">Father Name</label>
                <div class="col-sm-9">

                  <input type="text" class="form-control" id="father" name="father" oninput="convertToUppercase(this)" required>

                </div>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">

              <div class="form-group">

                <label for="mother" class="col-sm-3 control-label">Mother Name</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" id="mother" name="mother" oninput="convertToUppercase(this)" required>

                </div>

              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">

                <label for="datepicker_adds" class="col-sm-3 control-label">DOB</label>

                <div class="col-sm-9">

                  <div class="date">

                    <input type="date" class="form-control" id="datepicker_adds" name="birthdate">

                  </div>

                </div>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">

                <label for="gender" class="col-sm-3 control-label">Gender</label>

                <div class="col-sm-9">

                  <select class="form-control" name="gender" id="gender" required>

                    <option value="" selected>- Select Gender -</option>

                    <option value="Male">Male</option>

                    <option value="Female">Female</option>

                  </select>

                </div>

              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">

                <label for="category" class="col-sm-3 control-label">Category</label>

                <div class="col-sm-9">

                  <select class="form-control" name="category" id="category" required>

                    <option value="" selected>- Select Category -</option>
                    <option value="SC">SC</option>
                    <option value="ST">ST</option>
                    <option value="OBC">OBC</option>
                    <option value="General">General</option>
                  </select>

                </div>

              </div>

            </div>

          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">

                <label for="firstname" class="col-sm-3 control-label">Qualification</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" id="qualification" name="qualification" oninput="convertToUppercase(this)" required>

                </div>

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">

                <label for="firstname" class="col-sm-3 control-label">Aadhar No</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" id="aadhar_no" name="aadhar_no" minlength="12" maxlength="12" required>

                </div>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">

              <div class="form-group">

                <label for="contact" class="col-sm-3 control-label">Mobile No</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" id="contact" name="contact" minlength="10" maxlength="10" required>

                </div>

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">

                <label for="address" class="col-sm-3 control-label">Email</label>

                <div class="col-sm-9">

                  <input type="email" class="form-control" name="email" id="email" value="">

                </div>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">

                <label for="address" class="col-sm-3 control-label">Address</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" name="address" oninput="convertToUppercase(this)"  id="address" value="">

                </div>

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">

                <label for="photo" class="col-sm-3 control-label">Photo</label>

                <div class="col-sm-9">

                  <input type="file" name="photo" id="photo">

                </div>

              </div>
            </div>
          </div>

          <div class="row">

            <div class="col-md-6">

              <div class="form-group">

                <label for="gender" class="col-sm-3 control-label">
                  <!-- Center -->
                  Course
                </label>
                <div class="col-sm-9">
                  <select class="form-control course_select" name="course1" id="course" required>
                    <option value="" selected>- Select Course -</option>
                    <?php
                    $sql = "SELECT * FROM ai_courses";
                    $query = $conn->query($sql);
                    while ($prow = $query->fetch_assoc()) {
                      echo "<option value='" . $prow['cid'] . "' data-id='" . $prow['course_duration'] . "'>" . $prow['course_title'] . "</option>";
                    }
                    ?>
                  </select>

                </div>

              </div>

            </div>
            <div class="col-md-6">
              <div class="form-group">

                <label for="position" class="col-sm-3 control-label">Duration</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control session" id="session" name="session" required>

                </div>

              </div>
            </div>

          </div>


          <div class="row">

            <div class="col-md-6">
              <div class="form-group">

                <label for="father" class="col-sm-3 control-label">Course From</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" id="course_from" name="course_from" required>

                </div>

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">

                <label for="father" class="col-sm-3 control-label">Course To</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" id="course_to" name="course_to" required>

                </div>

              </div>
            </div>
          </div>

          <input type="hidden" class="form-control" id="username" name="username" value="GIFA/1001" required>

          <input type="hidden" class="form-control" id="password" name="password" value="GIFA@123" required>


          <div class="row">

            <div class="col-md-6">
              <div class="form-group">

                <label for="address" class="col-sm-3 control-label">Referenced By</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" name="referenced" id="referenced" value="">

                </div>

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">

                <label for="address" class="col-sm-3 control-label">Student Type</label>

                <div class="col-sm-9">
                  <div class="form-group">
                    <label for="address" class="control-label">offline</label>
                    <input type="radio" name="std_type" value="1" checked>
                    <label for="address" class="control-label">online</label>
                    <input type="radio" name="std_type" value="0">
                  </div>

                </div>

              </div>
            </div>
          </div>


      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <input type="submit" class="btn btn-primary btn-flat" name="add" value="Save">

        <!-- <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button> -->

        </form>

      </div>

    </div>

  </div>

</div>


<div class="modal fade" id="addnewstudent2">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title"><b>Add Student Without Exam</b></h4>

      </div>

      <div class="modal-body">

        <form class="form-horizontal" method="POST" action="student_add_without_exam.php" enctype="multipart/form-data" autocomplete="off">
          <div class="row">
            <div class="col-md-6">

              <div class="form-group">

                <label for="gender" class="col-sm-3 control-label">Center</label>

                <div class="col-sm-9">

                  <select class="form-control center_select" name="center_select" id="center_select" required>
                    <option value="" selected>- Select -</option>
                    <?php
                    $sql = "SELECT * FROM computer_centers";
                    $query = $conn->query($sql);
                    while ($prow = $query->fetch_assoc()) {
                      echo "<option value='" . $prow['id'] . "'>" . $prow['center_name'] . "</option>";
                    }
                    ?>
                  </select>

                </div>

              </div>

            </div>
            <div class="col-md-6">
              <div class="form-group">

                <label for="gender" class="col-sm-3 control-label">Course</label>
                <div class="col-sm-9">
                  <select class="form-control course_select" name="course2[]" multiple id="course2" required="required">
                    <option value="" selected>- Select Course -</option>
                    <?php

                    $sql = "SELECT * FROM ai_courses";

                    $query = $conn->query($sql);

                    while ($prow = $query->fetch_assoc()) {

                      echo "<option value='" . $prow['cid'] . "'>" . $prow['course_title'] . "</option>";
                    }

                    ?>
                  </select>

                </div>

              </div>

            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">

                <label for="gender" class="col-sm-3 control-label">Category</label>

                <div class="col-sm-9">

                  <select class="form-control" name="gender" id="gender" required>

                    <option value="" selected>- Select -</option>
                    <option value="SC">SC</option>
                    <option value="ST">ST</option>
                    <option value="OBC">OBC</option>
                    <option value="General">General</option>
                  </select>

                </div>

              </div>

            </div>
            <div class="col-md-6">
              <div class="form-group">

                <label for="position" class="col-sm-3 control-label">Session</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" id="session" name="session" required>

                </div>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">

                <label for="father" class="col-sm-3 control-label">Course From</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" id="course_from" name="course_from" placeholder="YYYY/mm/dd" required>

                </div>

              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">

                <label for="father" class="col-sm-3 control-label">Course To</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" id="course_to" name="course_to" required>

                </div>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">

                <label for="father" class="col-sm-3 control-label">Username</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" id="username" name="username" required>

                </div>

              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">

                <label for="father" class="col-sm-3 control-label">Password</label>

                <div class="col-sm-9">

                  <input type="password" class="form-control" id="password" name="password" required>

                </div>

              </div>
            </div>
          </div>

          <div class="row">

            <div class="col-md-6">
              <div class="form-group">

                <label for="father" class="col-sm-3 control-label">Student Name</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" id="full_name" name="full_name" required>

                </div>

              </div>
            </div>


            <div class="col-md-6">
              <div class="form-group">

                <label for="father" class="col-sm-3 control-label">Father Name</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" id="father" name="father" required>

                </div>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">

                <label for="firstname" class="col-sm-3 control-label">Aadhar No</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" id="aadhar_no" name="aadhar_no" required>

                </div>

              </div>
            </div>
            <div class="col-md-6">

              <div class="form-group">

                <label for="mother" class="col-sm-3 control-label">Mother Name</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" id="mother" name="mother" required>

                </div>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">

                <label for="firstname" class="col-sm-3 control-label">Qualification</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" id="qualification" name="qualification" required>

                </div>

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">

                <label for="lastname" class="col-sm-3 control-label">Address</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" id="address" name="address" required>

                </div>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">

                <label for="address" class="col-sm-3 control-label">Email</label>

                <div class="col-sm-9">

                  <input type="email" class="form-control" name="email" id="email" value="">

                </div>

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">

                <label for="datepicker_adds" class="col-sm-3 control-label">Birthdate</label>

                <div class="col-sm-9">

                  <div class="date">

                    <input type="date" class="form-control" id="datepicker_adds" name="birthdate">

                  </div>

                </div>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">

              <div class="form-group">

                <label for="contact" class="col-sm-3 control-label">Mobile No</label>



                <div class="col-sm-9">

                  <input type="text" class="form-control" id="contact" name="contact">

                </div>

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">

                <label for="gender" class="col-sm-3 control-label">Gender</label>



                <div class="col-sm-9">

                  <select class="form-control" name="gender" id="gender" required>

                    <option value="" selected>- Select -</option>

                    <option value="Male">Male</option>

                    <option value="Female">Female</option>

                  </select>

                </div>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">

                <label for="photo" class="col-sm-3 control-label">Photo</label>



                <div class="col-sm-9">

                  <input type="file" name="photo" id="photo">

                </div>

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">

                <label for="address" class="col-sm-3 control-label">Referenced By</label>



                <div class="col-sm-9">

                  <input type="text" class="form-control" name="referenced" id="referenced" value="">

                </div>

              </div>
            </div>
          </div>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

        <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>

        </form>

      </div>

    </div>

  </div>

</div>


<!-- Edit -->

<div class="modal fade" id="editStudent">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title"><b>Edit Student</b></h4>

      </div>

      <div class="modal-body">

        <form class="form-horizontal" method="POST" action="student_edit.php" enctype="multipart/form-data" autocomplete="off">
          <input type="hidden" name="sid" class="sid" value="">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">

                <label for="gender" class="col-sm-3 control-label">Center</label>

                <div class="col-sm-9">

                  <select class="form-control center_id center_select" name="center_select" id="center_select" required>

                    <option value="" selected>- Select -</option>

                    <?php

                    $sql = "SELECT * FROM computer_centers";

                    $query = $conn->query($sql);

                    while ($prow = $query->fetch_assoc()) {

                      echo "<option value='" . $prow['id'] . "'>" . $prow['center_name'] . "</option>";
                    }

                    ?>

                  </select>

                </div>

              </div>

            </div>
            <div class="col-md-6">
              <div class="form-group">

                <label for="address" class="col-sm-3 control-label">Reg. No</label>

                <div class="col-sm-9">
                  <input type="text" class="form-control reg_no" id="reg_no" name="reg_no">

                </div>

              </div>
            </div>
          </div>

          <div class="row">


            <div class="col-md-6">
              <div class="form-group">

                <label for="father" class="col-sm-3 control-label">Student Name</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control full_name" id="full_name" name="full_name" required>

                </div>

              </div>
            </div>


            <div class="col-md-6">
              <div class="form-group">

                <label for="father" class="col-sm-3 control-label">Father Name</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control father_name" id="father" name="father" required>

                </div>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">

              <div class="form-group">

                <label for="mother" class="col-sm-3 control-label">Mother Name</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control mother_name" id="mother" name="mother" required>

                </div>

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">

                <label for="datepicker_adds" class="col-sm-3 control-label">DOB</label>

                <div class="col-sm-9">

                  <div class="date">

                    <input type="date" class="form-control dob" id="datepicker_adds" name="birthdate">

                  </div>

                </div>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">

                <label for="category" class="col-sm-3 control-label">Category</label>
                <div class="col-sm-9">

                  <select class="form-control category" name="category" id="category" required>

                    <option value="" selected>- Select -</option>

                    <option value="SC">SC</option>

                    <option value="ST">ST</option>

                    <option value="OBC">OBC</option>

                    <option value="General">General</option>

                  </select>

                </div>

              </div>

            </div>
            <div class="col-md-6">
              <div class="form-group">

                <label for="gender" class="col-sm-3 control-label">Gender</label>
                <div class="col-sm-9">

                  <select class="form-control gender" name="gender" id="gender" required>

                    <option value="" selected>- Select -</option>

                    <option value="Male">Male</option>

                    <option value="Female">Female</option>

                  </select>

                </div>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="firstname" class="col-sm-3 control-label">Qualification</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control qualification" id="qualification" name="qualification" value="" required>

                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">

                <label for="firstname" class="col-sm-3 control-label">Aadhar No</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control aadhar" id="aadhar_no" name="aadhar_no" required>

                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">

              <div class="form-group">

                <label for="contact" class="col-sm-3 control-label">Mobile No</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control contact" id="contact" name="contact">

                </div>

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">

                <label for="address" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">

                  <input type="email" class="form-control email" name="email" id="email" value="">

                </div>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">

                <label for="lastname" class="col-sm-3 control-label">Address</label>
                <div class="col-sm-9">

                  <input type="text" class="form-control address" id="address" name="address" required>

                </div>

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">

                <label for="reg_no" class="col-sm-3 control-label">Roll No</label>
                <div class="col-sm-9">

                  <div class="date">

                    <input type="text" class="form-control roll_no" name="roll_no" id="roll_no" value="">

                  </div>

                </div>

              </div>

            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">

                <label for="gender" class="col-sm-3 control-label">Course</label>
                <div class="col-sm-9">
                  <select class="form-control getcourse course_id" name="course1" id="edit_course1" required>
                    <option value="" selected>- Select Course -</option>
                    <?php
                    $sql = "SELECT * FROM ai_courses";
                    $query = $conn->query($sql);
                    while ($prow = $query->fetch_assoc()) {
                      echo "<option value='" . $prow['cid'] . "' data-id='" . $prow['course_duration'] . "'>" . $prow['course_title'] . "</option>";
                    }
                    ?>
                  </select>

                </div>

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">

                <label for="position" class="col-sm-3 control-label">Duration</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control session_year" id="session_year" name="session" required>

                </div>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">

                <label for="lastname" class="col-sm-3 control-label">Course From</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control courses_f" id="courses_f" name="courses_from" required>
                </div>

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">

                <label for="reg_no" class="col-sm-3 control-label">Course To</label>
                <div class="col-sm-9">

                  <div class="date">

                    <input type="text" class="form-control courses_t" id="courses_t" name="courses_to" required>

                  </div>

                </div>

              </div>

            </div>
          </div>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-danger btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

        <button type="submit" class="btn btn-primary btn-flat" name="edit"><i class="fa fa-save"></i> Saves</button>

        </form>

      </div>

    </div>

  </div>

</div>

<!-- Delete -->

<div class="modal fade" id="deleteStudent">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title"><b><span class="student_id"></span></b></h4>

      </div>

      <div class="modal-body">

        <form class="form-horizontal" method="POST" action="student_delete.php">

          <input type="hidden" class="stdid" name="id" value="">

          <div class="text-center">

            <p>DELETE Student</p>

            <h2 class="bold del_student_name"></h2>

          </div>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

        <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>

        </form>

      </div>

    </div>

  </div>

</div>

<!-- Password -->
<!-- <div class="modal fade" id="passwordStudent">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title"><b><span class="student_id"></span></b></h4>

      </div>

      <div class="modal-body">

        <form class="form-horizontal" method="POST" action="student_update_password.php">

          <input type="hidden" class="stdid" name="sid" value="">

          <div class="text-center">

            <h2>Change Password</h2>

            <p class="bold del_student_name"></p>
            <input type="text" class="form-control" name="password" value="" style="margin-left:160px;width:250px">

          </div>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

        <button type="submit" class="btn btn-danger btn-flat" name="update"><i class="fa fa-trash"></i> Update</button>

        </form>

      </div>

    </div>

  </div>

</div> -->

<div class="modal fade" id="edit_photo">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title"><b><span class="del_employee_name"></span></b></h4>

      </div>

      <div class="modal-body">

        <form class="form-horizontal" method="POST" action="student_update_photo.php" enctype="multipart/form-data">

          <input type="hidden" class="stdid" name="id">

          <div class="form-group">

            <label for="photo" class="col-sm-3 control-label">Photo</label>

            <div class="col-sm-9">

              <input type="file" id="photo" name="photo" required>

            </div>

          </div>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

        <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>

        </form>

      </div>

    </div>

  </div>

</div>
<script>
        function convertToUppercase(nvalur) {
            // Get the entered value and convert it to uppercase
            var enteredValue = nvalur.value;
            var uppercaseValue = enteredValue.toUpperCase();

            // Update the input field with the uppercase value
            nvalur.value = uppercaseValue;
        }
    </script>