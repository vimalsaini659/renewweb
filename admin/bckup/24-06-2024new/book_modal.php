<!-- Add -->

<div class="modal fade" id="bookadd">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                <h4 class="modal-title"><b>Add New Book</b></h4>

            </div>

            <div class="modal-body">

                <form class="form-horizontal" method="POST" action="bookadd.php" enctype="multipart/form-data"
                    autocomplete="off">
                    <!-- start -->
                    <div class="form-group">
                        <label for="book_name" class="col-sm-3 control-label">Book Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="book_name" name="book_name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="photo" class="col-sm-3 control-label">Book Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="bookphoto" id="photo" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="photo" class="col-sm-3 control-label">Upload Book</label>
                        <div class="col-sm-9">
                            <input type="file" name="pdfphoto" id="photo" required>
                        </div>
                    </div>
                    <!-- end -->
                    <div class="form-group">

                        <label for="author" class="col-sm-3 control-label">Author</label>

                        <div class="col-sm-9">

                            <input type="text" class="form-control" id="author" name="author" value="" required>

                        </div>

                    </div>

                    <div class="form-group">

                        <label for="shortDetail" class="col-sm-3 control-label">Short Details</label>

                        <div class="col-sm-9">

                            <input type="text" class="form-control" id="shortDetail" name="shortDetail" value=""
                                required>

                        </div>

                    </div>
                    <div class="form-group">
                        <label for="LongDescription" class="col-sm-3 control-label">Long Description</label>

                        <div class="col-sm-9">

                            <input type="text" class="form-control" id="LongDescription" name="LongDescription" value=""
                                required>

                        </div>

                    </div>

                    <div class="form-group">

                        <label for="Price" class="col-sm-3 control-label">Price</label>

                        <div class="col-sm-9">

                            <input type="text" class="form-control" id="Price" name="Price" value="" required>

                        </div>

                    </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-primary btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>

                <button type="submit" class="btn btn-primary btn-flat" name="bookadd"><i class="fa fa-save"></i>
                    Save</button>

                </form>

            </div>

        </div>

    </div>

</div>

<!-- new update -->
<div class="modal fade" id="editbook">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                <h4 class="modal-title"><b>Edits Book</b></h4>

            </div>

            <div class="modal-body">

                <form class="form-horizontal" method="POST" action="book_update.php">
                    <div class="form-group">
                        <label for="book_name" class="col-sm-3 control-label">Book Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="book_name" name="book_name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="author" class="col-sm-3 control-label">Author</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="author" name="author" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Price" class="col-sm-3 control-label">Price</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Price" name="Price" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="shortDetail" class="col-sm-3 control-label">Short Details</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="shortDetail" name="shortDetail" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="LongDescription" class="col-sm-3 control-label">Long Description</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="LongDescription" name="LongDescription"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-flat pull-left" data-dismiss="modal"><i
                                class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i>
                            Save</button>
                    </div>
                </form>


            </div>

        </div>

    </div>

</div> <!-- Update -->



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

                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>

                <button type="submit" class="btn btn-danger btn-flat" name="deletecourse"><i class="fa fa-trash"></i>
                    Delete</button>

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

                <form class="form-horizontal" method="POST" action="employee_edit_photo.php"
                    enctype="multipart/form-data">

                    <input type="hidden" class="empid" name="id">

                    <div class="form-group">

                        <label for="photo" class="col-sm-3 control-label">Photo</label>


                        <div class="col-sm-9">

                            <input type="file" id="photo" name="photo" required>

                        </div>

                    </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>

                <button type="submit" class="btn btn-success btn-flat" name="upload"><i
                        class="fa fa-check-square-o"></i> Update</button>

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

                <form class="form-horizontal" method="POST" action="coursenew_update_photo.php"
                    enctype="multipart/form-data">

                    <input type="hidden" class="ecourseid" name="ecourseid">

                    <div class="form-group">

                        <label for="cphoto" class="col-sm-3 control-label">Course Image</label>

                        <div class="col-sm-9">

                            <input type="file" id="photo" name="cphoto" required>

                        </div>

                    </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>

                <button type="submit" class="btn btn-success btn-flat" name="upload"><i
                        class="fa fa-check-square-o"></i> Update</button>

                </form>

            </div>

        </div>

    </div>

</div>