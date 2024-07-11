<!-- Add -->

<div class="modal fade" id="addnewcourse">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title"><b>Add New Course</b></h4>

      </div>

      <div class="modal-body">

        <form class="form-horizontal" method="POST" action="course_center_add.php" enctype="multipart/form-data" autocomplete="off">

          <div class="form-group">

            <label for="gender" class="col-sm-3 control-label">Centers</label>



            <div class="col-sm-9">

              <select class="form-control" name="center_id" id="center_id" required>

                <option value="" selected>- Select Center -</option>
                <?php
                $sql = "SELECT * from computer_centers";

                $query = $conn->query($sql);

                while ($row = $query->fetch_assoc()) {

                ?>
                  <option value="<?php echo $row['id']; ?>"><?php echo $row['center_name']; ?></option>
                <?php } ?>

              </select>

            </div>

          </div>
          <!-- start -->
          <div class="form-group">

            <label for="Program" class="col-sm-3 control-label">Program</label>

            <div class="col-sm-9">
              <select name="program" class="form-control" required>
                <option value="0" selected="" disabled>-Select Program-</option>
                <option value="Entrance Exam">Entrance Exam</option>
                <option value="Hobby Classes">Hobby Classes</option>
                <option value="Diploma Programs">Diploma Programs</option>
                <option value="Degree Programs">Degree Programs</option>
                <option value="Internship Programs">Internship Programs</option>
                <option value="PHD research ">PHD research </option>
                <option value="Other">Other</option>
              </select>
            </div>

          </div>
          <div class="form-group">
            <label for="photo" class="col-sm-3 control-label">Course Image</label>
            <div class="col-sm-9">
              <input type="file" name="coursephoto" id="photo" required>
            </div>
          </div>
          <!-- end -->

          <div class="form-group">

            <label for="firstname" class="col-sm-3 control-label">Course Name</label>

            <div class="col-sm-9">

              <input type="text" class="form-control" id="course_title" name="course_title" required>

            </div>

          </div>

          <div class="form-group">

            <label for="lastname" class="col-sm-3 control-label">Course Details</label>

            <div class="col-sm-9">

              <input type="text" class="form-control" id="course_details" name="course_details" value="" required>

            </div>

          </div>

          <div class="form-group">

            <label for="lastname" class="col-sm-3 control-label">Course Fees</label>

            <div class="col-sm-9">

              <input type="text" class="form-control" id="course_fees" name="course_fees" value="" required>

            </div>

          </div>

          <div class="form-group">

            <label for="address" class="col-sm-3 control-label">Course Duration</label>

            <div class="col-sm-9">

              <input type="text" class="form-control" name="course_duration" id="course_duration" value="">

            </div>

          </div>

          <div class="form-group">

            <label for="gender" class="col-sm-3 control-label">Approved</label>

            <div class="col-sm-9">

              <select class="form-control" name="status" id="status" required>

                <option value="" selected>- Select -</option>

                <option value="1">Active</option>

                <option value="0">InActive</option>

              </select>

            </div>

          </div>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-primary btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

        <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>

        </form>

      </div>

    </div>

  </div>

</div>



<!-- Update -->

<div class="modal fade" id="editcourse">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title"><b>Edit Course</b></h4>

      </div>

      <div class="modal-body">

        <form class="form-horizontal" method="POST" action="course_center_update.php">

          <input type="hidden" class="ecourseid" name="ecourseid">

          <div class="form-group">

            <label for="gender" class="col-sm-3 control-label">Centers</label>

            <div class="col-sm-9">

              <select class="form-control" name="center_id" id="center_id" required>

                <option value="" selected>- Select Center -</option>
                <?php
                $sql = "SELECT * from computer_centers";

                $query = $conn->query($sql);

                while ($row = $query->fetch_assoc()) {

                ?>
                  <option value="<?php echo $row['id']; ?>"><?php echo $row['center_name']; ?></option>
                <?php } ?>

              </select>

            </div>

          </div>
          <!-- start -->
          <div class="form-group">

            <label for="Program" class="col-sm-3 control-label">Program</label>

            <div class="col-sm-9">
              <select name="program" class="form-control" required>
                <option value="0" selected="" disabled>-Select Program-</option>
                <option value="Entrance Exam">Entrance Exam</option>
                <option value="Hobby Classes">Hobby Classes</option>
                <option value="Diploma Programs">Diploma Programs</option>
                <option value="Degree Programs">Degree Programs</option>
                <option value="Internship Programs">Internship Programs</option>
                <option value="PHD research ">PHD research </option>
                <option value="Other">Other</option>
              </select>
            </div>

          </div>
       
          <!-- end -->

          <div class="form-group">

            <label for="firstname" class="col-sm-3 control-label">Course Name</label>

            <div class="col-sm-9">

              <input type="text" class="form-control" id="ecourse_title" name="course_title" required>

            </div>

          </div>

          <div class="form-group">

            <label for="lastname" class="col-sm-3 control-label">Course Details</label>

            <div class="col-sm-9">

              <input type="text" class="form-control" id="ecourse_details" name="course_details" value="" required>

            </div>

          </div>

          <div class="form-group">

            <label for="lastname" class="col-sm-3 control-label">Course Fees</label>

            <div class="col-sm-9">

              <input type="text" class="form-control" id="ecourse_fees" name="course_fees" value="" required>

            </div>

          </div>

          <div class="form-group">

            <label for="address" class="col-sm-3 control-label">Course Duration</label>

            <div class="col-sm-9">

              <input type="text" class="form-control" name="course_duration" id="ecourse_duration" value="">

            </div>

          </div>


          <div class="form-group">

            <label for="gender" class="col-sm-3 control-label">Approved</label>

            <div class="col-sm-9">

              <select class="form-control" name="status" id="status" required>

                <option value="" selected>- Select -</option>

                <option value="1">Active</option>

                <option value="0">InActive</option>

              </select>

            </div>

          </div>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-primary btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

        <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>

        </form>

      </div>

    </div>

  </div>

</div>



<!-- Edit -->

<div class="modal fade" id="edit1">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title"><b>Add Computer Center</b></h4>

      </div>

      <div class="modal-body">

        <form class="form-horizontal" method="POST" action="computer_center_edit.php" enctype="multipart/form-data">

          <div class="form-group">

            <label for="firstname" class="col-sm-3 control-label">Center Name</label>



            <div class="col-sm-9">

              <input type="text" class="form-control" id="firstname" name="center_name" required>

            </div>

          </div>

          <div class="form-group">

            <label for="lastname" class="col-sm-3 control-label">Center Email</label>



            <div class="col-sm-9">

              <input type="text" class="form-control" id="lastname" name="center_email" required>

            </div>

          </div>

          <div class="form-group">

            <label for="lastname" class="col-sm-3 control-label">Center Username</label>



            <div class="col-sm-9">

              <input type="text" class="form-control" id="lastname" name="center_username" required>

            </div>

          </div>

          <div class="form-group">

            <label for="address" class="col-sm-3 control-label">Center Password</label>



            <div class="col-sm-9">

              <textarea class="form-control" name="password" id="password"></textarea>

            </div>

          </div>

          <div class="form-group">

            <label for="datepicker_add" class="col-sm-3 control-label">center contact</label>



            <div class="col-sm-9">

              <div class="date">

                <input type="text" class="form-control" id="datepicker_add" name="center_contact">

              </div>

            </div>

          </div>

          <div class="form-group">

            <label for="contact" class="col-sm-3 control-label">center address</label>



            <div class="col-sm-9">

              <input type="text" class="form-control" id="contact" name="center_address">

            </div>

          </div>

          <div class="form-group">

            <label for="gender" class="col-sm-3 control-label">Approved</label>



            <div class="col-sm-9">

              <select class="form-control" name="status" id="status" required>

                <option value="" selected>- Select -</option>

                <option value="1">Active</option>

                <option value="0">InActive</option>

              </select>

            </div>

          </div>



      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-primary btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

        <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>

        </form>

      </div>

    </div>

  </div>

</div>



<!-- Delete -->

<div class="modal fade" id="deletecourse">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title"><b><span class="course_title"></span></b></h4>

      </div>

      <div class="modal-body">

        <form class="form-horizontal" method="POST" action="course_delete.php">

          <input type="hidden" class="courseid" name="courseid" value="">

          <div class="text-center">

            <p>DELETE Course</p>

            <h2 class="bold del_course_name"></h2>

          </div>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

        <button type="submit" class="btn btn-danger btn-flat" name="deletecourse"><i class="fa fa-trash"></i> Delete</button>

        </form>

      </div>

    </div>

  </div>

</div>



<!-- Update Photo -->

<div class="modal fade" id="edit_photo">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title"><b><span class="del_employee_name"></span></b></h4>

      </div>

      <div class="modal-body">

        <form class="form-horizontal" method="POST" action="employee_edit_photo.php" enctype="multipart/form-data">

          <input type="hidden" class="empid" name="id">

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
<!-- edit  course photo -->
<div class="modal fade" id="edit_coursenew">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title"><b><span class="del_employee_name"></span></b></h4>

      </div>

      <div class="modal-body">

        <form class="form-horizontal" method="POST" action="coursenew_update_photo.php" enctype="multipart/form-data">

          <input type="hidden" class="ecourseid" name="ecourseid">

          <div class="form-group">

            <label for="cphoto" class="col-sm-3 control-label">Course Image</label>

            <div class="col-sm-9">

              <input type="file" id="photo" name="cphoto" required>

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