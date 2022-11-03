
<!-- Modal -->
<div class="modal fade" id="cashout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content panel-info">
            <!--Header-->
            <div class="modal-header">                
                <h4 class="modal-title w-100">Receive Payment</h4>
                
            </div>
            <!--Body-->
            <div class="modal-body"> 

        <div class="col-xs-12">    		
    			<div class="col-xs-6 float-right">
    				<address>
    				<strong>Billed To:</strong><br>
    					<i>Name: </i><span id="customerName">Null</span><br>
    					<i>Table no: </i><span id="tableNo">Null</span><br>
    					<i>Order no: </i><span id="billNo">Null</span><br>
    					<i>Due date: </i><span id="dueDate" class="text-danger">Null</span>
    				</address>
    		</div>    		
    	</div>

   <div class="clearfix"></div>
 
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h4 class="panel-title"><strong>Payments</strong></h4>
    			</div>
        <hr>
    			<div class="panel-body">

<form onsubmit="return false"  class="cashoutBill" id="cashoutBill" action="process/cashout.php" method="POST">
            <div class="container">

                        <div class="row">
                            <div class="col-sm-6">
                                    <label>Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="debit">Debit</option>
                                            <option value="credit">Credit</option>
                                        </select>
                                </div>

                                <div class="col-sm-6">
                                    <label>Mode</label>
                                        <select class="form-control" name="mode">
                                            <option value="cash">Cash</option>
                                            <option value="mode">Mpesa</option>
                                        </select>
                                </div>
                        </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="inputFirstname">Amount</label>
                                    <input type="text" id="amount" name="amount" readonly="readonly" class="form-control text-success font-weight-bold" value="0.00">
                                </div>

                                <div class="col-sm-6">
                                    <label>Paying</label>
                                    <input type="text" min="5" name="paying" id="paying" class="form-control text-success font-weight-bold" value="0.00">
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Discount</label>
                                    <input type="text" id="discount" name="discount" class="form-control text-danger font-weight-bold" value="0.00">
                                </div>

                                <div class="col-sm-6">
                                        <label >Balance</label>
                                    <input type="text" id="balance" name="balance" class="form-control text-danger font-weight-bold" readonly="readonly" value="0.00">
                                </div>
                            </div>    

                            <input type="hidden" id="orderid" name="orderid">   
            </div>
 
    				
    			</div>
    		</div>
    	</div>
    </div>
</div>
              

            <!--Footer-->
            <div class="modal-footer">
            <button type="button" id="trial" class="btn btn-dark" data-dismiss="modal">Close</button>                 
            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Confirm</button>
</div>
</form> 
              
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
  <!--/.End of modal Content-->   