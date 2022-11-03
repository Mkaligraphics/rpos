<!-- Modal -->
<div class="modal fade" id="editphoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content panel-info">
            <!--Header-->
            <div class="modal-header">                
                <h4 class="modal-title w-100" id="myModalLabel">Change photo</h4>
            </div>
            <!--Body-->
            <div class="modal-body">
                <span class="changephoto"></span><span id="changephoto"></span>

 <form onsubmit="return false"  id="changepictureform" class="changepictureform" action="process/changephoto.php" method="POST" 
  enctype="multipart/form-data">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="profilepic" name="profilepic">
              <label class="custom-file-label" for="customFile">Choose file</label>    

              <input type="hidden" id="foodpicture" name="foodpicture">         

            <!--Footer-->
            <div class="modal-footer">
                <button type="button"  class="btn btn-info" data-dismiss="modal">Close</button>                 
                 <button type="submit" class="btn btn-success">confirm</button>
        </div>
</form>
              
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
  <!--/.End of modal Content-->   