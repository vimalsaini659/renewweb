<!-- Add -->

<div class="modal fade" id="addnew">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title"><b>Add Computer Center</b></h4>

      </div>

      <div class="modal-body">

        <form class="form-horizontal" method="POST" action="computer_center_add.php" enctype="multipart/form-data">

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


                <input type="text" class="form-control" id="lastname" name="center_username" value="gifa/20220" readonly>
              
            </div>

          </div>

          <div class="form-group">

            <label for="address" class="col-sm-3 control-label">Center Password</label>



            <div class="col-sm-9">
              <input type="text" class="form-control" id="center_password" name="center_password" value="gifa@123456" readonly required>

            </div>

          </div>

          <div class="form-group">

            <label for="datepicker_add" class="col-sm-3 control-label">center contact</label>



            <div class="col-sm-9">

              <div class="date">

                <input type="text" class="form-control" id="datepicker_add1" name="center_contact">

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



<!-- Edit -->

<div class="modal fade" id="edit">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title"><b>Edit Computer Center</b></h4>

      </div>

      <div class="modal-body">

        <form class="form-horizontal" method="POST" action="computer_center_edit.php" enctype="multipart/form-data">
          <input type="hidden" class="center_id" name="center_id" id="center_id" value="">

          <div class="form-group">

            <label for="firstname" class="col-sm-3 control-label">Center Name</label>



            <div class="col-sm-9">

              <input type="text" class="form-control center_name" id="center_name" name="center_name" required>

            </div>

          </div>

          <div class="form-group">

            <label for="firstname" class="col-sm-3 control-label">Center Code</label>



            <div class="col-sm-9">

              <input type="text" class="form-control center_code" id="center_code" name="center_code" required>

            </div>

          </div>

          <div class="form-group">

            <label for="lastname" class="col-sm-3 control-label">Center Email</label>



            <div class="col-sm-9">

              <input type="text" class="form-control center_email" id="center_email" name="center_email" required>

            </div>

          </div>

          <div class="form-group">

            <label for="lastname" class="col-sm-3 control-label">Center Username</label>



            <div class="col-sm-9">

              <input type="text" class="form-control center_username" id="center_username" name="center_username" required>

            </div>

          </div>

          <div class="form-group">

            <label for="password" class="col-sm-3 control-label">Center Password</label>

            <div class="col-sm-9">

              <input type="text" class="form-control center_password" id="center_password" name="center_password" required>

            </div>

          </div>

          <div class="form-group">

            <label for="datepicker_add" class="col-sm-3 control-label">Center Contact</label>



            <div class="col-sm-9">

              <div class="date">

                <input type="text" class="form-control center_contact" id="center_contact" name="center_contact">

              </div>

            </div>

          </div>

          <div class="form-group">

            <label for="contact" class="col-sm-3 control-label">Center Address</label>



            <div class="col-sm-9">

              <input type="text" class="form-control center_address" id="center_address" name="center_address">

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

        <button type="submit" class="btn btn-primary btn-flat" name="edit"><i class="fa fa-save"></i> Update</button>

        </form>

      </div>

    </div>

  </div>

</div>



<!-- Delete -->

<div class="modal fade" id="delete">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title"><b><span class="center_id"></span></b></h4>

      </div>

      <div class="modal-body">

        <form class="form-horizontal" method="POST" action="center_delete.php">

          <input type="hidden" class="center_id" name="id">

          <div class="text-center">

            <p>DELETE Computer Center</p>

            <h2 class="bold center_name"></h2>

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