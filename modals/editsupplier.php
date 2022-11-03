<!-- Modal -->
<div class="modal fade" id="editsupplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content panel-info">
            <!--Header-->
            <div class="modal-header">                
                <h4 class="modal-title w-100" id="myModalLabel">Edit supplier</h4>
            </div>
            <!--Body-->
            <div class="modal-body">
                <span class="changesupplier"></span><span id="changesupplier"></span>


 <form onsubmit="return false"  id="updatesupplier" class="updatesupplier" action="process/updatesupplier.php" method="POST" 
  enctype="multipart/form-data">
           
     <div class="form-group row">
        <div class="col-sm-12">
            <label>Description <span class="text-danger">*</span></label>
            <input type="text" required="required" class="form-control" id="des" name="description">
        </div>                    
    </div>

 <div class="form-group row">
                <div class="col-sm-12">
                        <label for="inputLastname">Mobile<span class="text-danger">*</span></label>
                        <input type="text" required="required" class="form-control" id="phone" name="mobile" >
                    </div>
   </div>

<div class="form-group row">
                <div class="col-sm-12">
                        <label for="inputLastname">Email</label>
                        <input type="email" class="form-control" id="address" name="email" >
                    </div>

   </div>

<input type="hidden" name="supplierid" id="supplierid">

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