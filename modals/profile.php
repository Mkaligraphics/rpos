<!-- Modal -->
<div class="modal fade" id="profilepicture" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content panel-info">
            <!--Header-->
            <div class="modal-header">                
                <h4 class="modal-title w-100" id="myModalLabel">Change profile</h4>
            </div>
            <!--Body-->
            <div class="modal-body">
                <span class="changeprofile"></span><span id="changeprofile"></span>

 <form onsubmit="return false"  id="changeprofileform" class="changeprofileform" action="process/changeprofile.php" method="POST" 
  enctype="multipart/form-data">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="profilepic" name="profilepic">
              <label class="custom-file-label" for="customFile">Choose file</label>    

              <input type="hidden" id="userprofile" name="userid">         

            <!--Footer-->
            <div class="modal-footer">
                <button type="button" id="trial" class="btn btn-info" data-dismiss="modal">Close</button>                 
                 <button type="submit" class="btn btn-success">confirm</button>
        </div>
</form>
              
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
  <!--/.End of modal Content-->   