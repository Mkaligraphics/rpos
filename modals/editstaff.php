<!-- Modal -->
<div class="modal fade" id="editstaff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content panel-info">
            <!--Header-->
            <div class="modal-header">                
                <h4 class="modal-title w-100" id="myModalLabel">Edit Staff</h4>
            </div>
            <!--Body-->
            <div class="modal-body">
                <span class="stafffeed"></span> <span id="stafffeed"></span> 
                
    <form onsubmit="return false"  class="editstafform" action="process/editstaff.php" method="POST">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>First name <span class="text-danger">*</span></label>
                        <input type="text" required="required" class="form-control" id="firstname" name="firstname">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputLastname">Last name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="lastname" name="lastname" >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                  <label>Phone <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" id="phone" name="phone1" >
                    </div>
                    <div class="col-sm-6">
                        <label>Phone (Line 2)</label>
                        <input type="number" name="phone2" id="phone2" class="form-control" >
                    </div>
                </div>

                <div class="form-group row">                    
                    <div class="col-sm-6">
                        <label for="inputState">Gender <span class="text-danger">*</span></label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="0">Select gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputPostalCode">KRA PIN</label>
                        <input type="text" class="form-control" id="krapin" name="krapin">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputContactNumber">Designation <span class="text-danger">*</span></label>
                        <select class="form-control"  id="designation" name="designation">
                              <option>Waiter/Waistres</option>
                              <option>Accounts</option>
                              <option>Cook</option>                              
                            </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputWebsite">Engaged on <span class="text-danger">*</span></label>
                            <input type="text" id="datepicker" class="form-control" name="engaged">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputContactNumber">NSSF </label>
                            <input type="text" id="editnssf"  class="form-control" name="nssf">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputWebsite">NHIF </label>
                            <input type="text" id="editnhif"  class="form-control" name="nhif">
                    </div>
                </div>

                <div class="form-group row">                   
                    <div class="col-sm-3">
                        <label for="inputState">Basic salary <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="salary" name="salary">
                    </div>

                    <div class="col-sm-3">
                        <label for="inputPostalCode">Mode <span class="text-danger">*</span></label>
                            <select class="form-control" id="mode" name="mode">
                                    <option value="">Select mode</option>
                                    <option value="daily">Daily</option>
                                    <option value="weekly">Weekly</option>                                    
                                    <option value="monthly">Monthly</option>                              
                            </select>
                    </div>

                    <div class="col-sm-6">
                        <label for="inputWebsite">Department</label>
                        <select class="form-control" id="department" name="department">
                            <option value="0">Select department</option>
                            <?php 
                           $qry=$data->con->query("SELECT * FROM departments WHERE active = '1' ");
                           while($row = mysqli_fetch_assoc($qry)){?>                       
                          <option value="<?php echo $row['id'] ?>"><?php echo  strtoupper($row['description']); ?></option>
                              <?php } ?>
                          
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputContactNumber">Id number <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="idnumber" name="idnumber" >
                    </div>

                    <div class="col-sm-6">
                        <label for="inputWebsite">Email</label>
                        <input type="email" id="email" class="form-control" name="email" >
                    </div>
                </div>

           
                   <input type="hidden" name="userid" id="userid" >


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