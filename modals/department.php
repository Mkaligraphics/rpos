<!-- Modal -->
<div class="modal fade" id="editdepartment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content panel-info">
            <!--Header-->
            <div class="modal-header">                
                <h4 class="modal-title w-100" id="myModalLabel">Edit department</h4>
            </div>
            <!--Body-->
            <div class="modal-body">
                <div class="paymentfeed"></div>
                
                    <div class="form-group">
                      <label>Description<span class="text-danger">*</span></label>
                      <input class="form-control" id="description"  name="description" type="text" >
                      <input  id="depid"  name="description"  type="hidden" >
                    </div> 

            <!--Footer-->
            <div class="modal-footer">
                <button type="button" id="trial" class="btn btn-info" data-dismiss="modal">Close</button>                 
                 <button type="submit" class="btn btn-success" id="updatedepartment">confirm</button>
</div>

              
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
  <!--/.End of modal Content-->   