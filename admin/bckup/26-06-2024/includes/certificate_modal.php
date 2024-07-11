<!-- Modal -->
<div id="issueDateModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Set Issue Date</h4>
      </div>
      <div class="modal-body">
        <form action="set_issue_date.php" method="post">
          <input type="hidden" name="regno" id="regno" value="">
  <div class="form-group">
    <label for="date">Set Date Here:</label>
    <input type="text" class="form-control" id="idate" name="idate" value="">
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>