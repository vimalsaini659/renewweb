<!-- Add -->

<div class="modal fade" id="addnewuser">

    <div class="modal-dialog">

        <div class="modal-content">

          	<div class="modal-header">

            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">

              		<span aria-hidden="true">&times;</span></button>

            	<h4 class="modal-title"><b>Add Admin User</b></h4>

          	</div>

          	<div class="modal-body">

            	<form class="form-horizontal" method="POST" action="admin_user_add.php" enctype="multipart/form-data">

          		  <div class="form-group">

                  	<label for="firstname" class="col-sm-3 control-label">Username</label>



                  	<div class="col-sm-9">

                    	<input type="text" class="form-control" id="username" name="username" required>

                  	</div>

                </div>

                <div class="form-group">

                    <label for="firstname" class="col-sm-3 control-label">Password</label>



                    <div class="col-sm-9">

                      <input type="password" class="form-control" id="password" name="password" required>

                    </div>

                </div>

                <div class="form-group">

                  	<label for="lastname" class="col-sm-3 control-label">First Name</label>



                  	<div class="col-sm-9">

                    	<input type="text" class="form-control" id="firstname" name="firstname" required>

                  	</div>

                </div>


                <div class="form-group">

                    <label for="lastname" class="col-sm-3 control-label">Last Name</label>



                    <div class="col-sm-9">

                      <input type="text" class="form-control" id="lastname" name="lastname" required>

                    </div>

                </div>



               

                <div class="form-group">

                  	<label for="datepicker_add" class="col-sm-3 control-label">Photo</label>



                  	<div class="col-sm-9"> 

                      <div class="date">

                        <input type="file" class="form-control" id="photo" name="photo">

                      </div>

                  	</div>

                </div>

                <div class="form-group">

                    <label for="datepicker_add" class="col-sm-3 control-label">Status</label>



                    <div class="col-sm-9"> 

                      <div class="date">

                        <select class="form-control" name="status">
                          <option value="0"> Select</option>
                          <option value="1"> Active</option>
                          <option value="0"> InActive</option>
                        </select>

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

<div class="modal fade" id="edituser">

    <div class="modal-dialog">

        <div class="modal-content">

          	<div class="modal-header">

            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">

              		<span aria-hidden="true">&times;</span></button>

            	<h4 class="modal-title"><b><span class="user_id">Edit User</span></b></h4>

          	</div>

          	<div class="modal-body">

            	<form class="form-horizontal" method="POST" action="user_edit.php">

            		<input type="hidden" class="userid" name="userid" value="">

                <div class="form-group">

                    <label for="edit_lastname" class="col-sm-3 control-label">Username</label>



                    <div class="col-sm-9">

                      <input type="text" class="form-control" id="edit_username" name="username" value="">

                    </div>

                </div>

                <div class="form-group">

                    <label for="edit_lastname" class="col-sm-3 control-label">Password</label>



                    <div class="col-sm-9">

                      <input type="password" class="form-control" id="edit_password" name="password" value="">

                    </div>

                </div>

                <div class="form-group">

                    <label for="edit_firstname" class="col-sm-3 control-label">Firstname</label>



                    <div class="col-sm-9">

                      <input type="text" class="form-control" id="edit_firstname" name="firstname" value="">

                    </div>

                </div>

                <div class="form-group">

                    <label for="edit_firstname" class="col-sm-3 control-label">Lastname</label>



                    <div class="col-sm-9">

                      <input type="text" class="form-control" id="edit_lastname" name="lastname" value="">

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

<div class="modal fade" id="userdelete">

    <div class="modal-dialog">

        <div class="modal-content">

          	<div class="modal-header">

            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">

              		<span aria-hidden="true">&times;</span></button>

            	<h4 class="modal-title"><b><span class="user_id"></span></b></h4>

          	</div>

          	<div class="modal-body">

            	<form class="form-horizontal" method="POST" action="user_delete.php">

            		<input type="hidden" class="userid" name="id" value="">

            		<div class="text-center">

	                	<p>DELETE User</p>

	                	<h2 class="bold del_user_name"></h2>

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

<div class="modal fade" id="photo">

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

<!-- Delete -->

<div class="modal fade" id="addnotice">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                  <span aria-hidden="true">&times;</span></button>

              <h4 class="modal-title"><b><span class="student_id">New Ntoce</span></b></h4>

            </div>

            <div class="modal-body">
              <form action="notice_add.php" method="post">
        <div class="form-group">
          <label for="notice">Notice:</label>
          <input type="text" class="form-control" id="notice" name="notice" value="" required="required">
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