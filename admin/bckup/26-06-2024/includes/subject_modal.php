<!-- Add -->

<div class="modal fade" id="addnew">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title"><b>Add Subject</b></h4>

      </div>

      <div class="modal-body">

        <form class="form-horizontal" method="POST" action="subject_add.php" enctype="multipart/form-data">


          <div class="form-group">

            <label for="position" class="col-sm-3 control-label">Center Select First</label>



            <div class="col-sm-9">

              <select class="form-control center_select" name="center" id="center" required>

                <option value="" selected>- Select -</option>

                <?php

                $sql = "SELECT * FROM computer_centers";

                $query = $conn->query($sql);

                while ($prow = $query->fetch_assoc()) {

                  echo "

                              <option value='" . $prow['id'] . "'>" . $prow['center_name'] . "</option>

                            ";
                }

                ?>

              </select>

            </div>

          </div>

          <div class="form-group">

            <label for="position" class="col-sm-3 control-label">Course</label>
            <div class="col-sm-9">

              <select class="form-control course_select" name="course1" id="course1" required>
                <option value="" selected>- Select Course-</option>
              </select>

            </div>

          </div>

          <div class="form-group">

            <label for="firstname" class="col-sm-3 control-label">Subject Code</label>

            <div class="col-sm-9">

              <input type="text" class="form-control" id="subject_code" name="subject_code" value="" required>

            </div>

          </div>

          <div class="form-group">

            <label for="firstname" class="col-sm-3 control-label">Subject Name</label>

            <div class="col-sm-9">

              <input type="text" class="form-control" id="subject_name" name="subject_name" value="" required>

            </div>

          </div>

          <div class="form-group">

            <label for="firstname" class="col-sm-3 control-label">Year</label>

            <div class="col-sm-9">

              <input type="number" class="form-control" id="year" name="year" value="" maxlength="1" required>

            </div>

          </div>
          <div class="form-group">

            <label for="status" class="col-sm-3 control-label">Status</label>

            <div class="col-sm-9">

              <select class="form-control" id="status" name="status" required>

                <option value="" selected>- Select -</option>

                <option value="Active">Active</option>

                <option value="InActive">InActive</option>

              </select>

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

<div class="modal fade" id="editSubject">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title"><b><span class="subject_id">Update Subject</span></b></h4>

      </div>

      <div class="modal-body">

        <form class="form-horizontal" method="POST" action="subject_edit.php">

          <input type="hidden" class="subjectid" name="subjectid" value="">

          <div class="form-group">

            <label for="esubject_name" class="col-sm-3 control-label">Subject Name</label>


            <div class="col-sm-9">

              <input type="text" class="form-control" id="esubject_name" name="subject_name">

            </div>

          </div>

          <div class="form-group">

            <label for="esubject_code" class="col-sm-3 control-label">Subject Code</label>

            <div class="col-sm-9">

              <input type="text" class="form-control" id="esubject_code" name="subject_code">

            </div>

          </div>

          <div class="form-group">

            <label for="esubject_code" class="col-sm-3 control-label">Year</label>

            <div class="col-sm-9">

              <input type="number" class="form-control" id="year" name="year" value="" maxlength="1" required="required">

            </div>

          </div>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

        <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>

        </form>

      </div>

    </div>

  </div>

</div>



<!-- Delete -->

<div class="modal fade" id="deleteSubject">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title"><b><span class="subject_id"></span></b></h4>

      </div>

      <div class="modal-body">

        <form class="form-horizontal" method="POST" action="subject_delete.php">

          <input type="hidden" class="subjectid" name="subjectid" value="">

          <div class="text-center">

            <p>DELETE Subject</p>

            <h2 class="bold del_employee_name"></h2>

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