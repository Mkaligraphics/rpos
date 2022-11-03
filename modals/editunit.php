<!-- Modal -->
<div class="modal fade" id="editunit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content panel-info">
            <!--Header-->
            <div class="modal-header">                
                <h4 class="modal-title w-100" id="myModalLabel">Edit unit</h4>
            </div>
            <!--Body-->
            <div class="modal-body">
                <div class="changeunit"></div><div id="changeunit"></div>

  <form class="updateunit" action="process/updateunit.php" method="POST" onsubmit="return false">             
      <div class="form-group row">
        <div class="col-sm-12">
            <label>Unit name <span class="text-danger">*</span></label>
            <input type="text" required="required" class="form-control" id="unitName" name="unitnem">
        </div>                    
    </div>

 
<input type="hidden" name="unitid" id="unitid">

            <!--Footer-->
            <div class="modal-footer">
                <button type="button" id="trial" class="btn btn-info" data-dismiss="modal">Close</button>                 
                 <button type="submit" class="btn btn-success" id="updatedepartment">confirm</button>
</div>
</form>
              
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
  <!--/.End of modal Content-->   