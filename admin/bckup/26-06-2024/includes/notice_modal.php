<div class="modal fade" id="addnotice">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                <h4 class="modal-title"><b>Add Notice</b></h4>

            </div>

            <div class="modal-body">

                <form class="form-horizontal" method="POST" action="notice_add.php" enctype="multipart/form-data">


                    <div class="form-group">

                        <label for="position" class="col-sm-3 control-label">Add Notice Here</label>
                        <textarea class="form-control" name="notice"></textarea>
                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

                        <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
                    </div>
                </form>

            </div>

        </div>

    </div>

</div>