<!-- Modal -->
<div class="modal fade" id="editutensil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content panel-info">
            <!--Header-->
            <div class="modal-header">                
                <h4 class="modal-title w-100" id="myModalLabel">Edit Utensils</h4>
            </div>
            <!--Body-->
            <div class="modal-body">
                <div class="utensilsfeed"></div>
                
                    <div class="form-group">
                      <label>Description<span class="text-danger">*</span></label>
                      <input class="form-control" id="description"  name="description" type="text" >
                      <input  id="utensilid"  name="utensilid"  type="hidden" >
                    </div> 

            <!--Footer-->
            <div class="modal-footer">
                <button type="button" id="trial" class="btn btn-info" data-dismiss="modal">Close</button>                 
                 <button type="submit" class="btn btn-success" id="updateutensil">confirm</button>
</div>

              
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
  <!--/.End of modal Content-->   