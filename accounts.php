<?php
require 'classes/autoloader.php'; 
$data =  new modules();
$accounts =  new accounts();
$profile = new profile();

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SweetJoint Restaurant Point of Sale</title>
    <?php include 'includes/headerlinks.php'; ?>
    <link rel="stylesheet" type="text/css" href="assets/dataexports/buttons.dataTables.min.css">
    <link href="assets/datepicker.min.css" rel="stylesheet" type="text/css">
    <link href="assets/core.css" rel="stylesheet" type="text/css">

</head>

<body>

 <?php require 'includes/cashiernav.php'; ?>


<div class="container-fluid page-body-wrapper">

    <div class="main-panel">
        <div class="content-wrapper">

<div class="main pt-5">   
        <div class="row">      
          <div class="col-md-8 grid-margin stretch-card ">
              <div class="card panel panel-info">
                <div class="card-body">
                    <div class="clearfix"> 
              <?php require 'includes/accountbox.php'; ?>   <br>       
                  
                            <div class="card-header font-weight-bold">BUSINESS TRANSACTIONS</div>
                              <div class="card-body">                             
                            
 <div class="row well input-daterange">
            <div class="col-sm-4">
              <label class="control-label">Transaction</label>
              <select class="form-control" name="transaction" id="transaction" style="height: 40px;">
                <option value="">- Please select -</option>
                <option value="debit">Debit</option>
                <option value="credit">Credit</option>
              </select>
      </div>

            <div class="col-sm-3">
              <label class="control-label">Start date</label>
              <input class="form-control initial_date" placeholder="dd/mm/yyyy"  type="text" name="initial_date" id="initial_date_picker" readonly="readonly" style="height: 40px;"/>
            </div>

            <div class="col-sm-3">
              <label class="control-label">End date</label>
              <input class="form-control final_date"  type="text" name="final_date" id="final_date_picker" readonly="readonly" placeholder="dd/mm/yyyy"  style="height: 40px;"/>
            </div>

            <div class="col-sm-2">
              <button class="btn btn-success btn-block " type="submit" name="filter" id="filter" style="margin-top: 30px">
                <i class="fa fa-filter"></i> Filter
              </button>
            </div>

            <div class="col-sm-12 text-danger" id="error_log"></div>
      </div>
<br><br>


                                  
                        <table class="table" id="fetch_generated_wills">
                            <thead>
                                <tr class="font-weight-bold">
                                    <td>Date</td>
                                    <td>Mode</td>                           
                                    <td>Grandtotal</td>
                                    <td>Transaction</td>                                  
                                    <td>Receipt </td>                                    
                                </tr>
                            </thead> 
                            </table>
                    
                                
                              </div>                 

                    </div>  
                </div>
              </div>
            </div>
            
         <?php require 'includes/cashierright.php'; ?>
       

        </div>
    </div>
</div>   
<?php require 'modals/cashout.php'; ?>

<?php require 'includes/bottomlinks.php'; ?>


<script src="assets/dataexports/dataTables.buttons.min.js"></script>
<script src="assets/dataexports/jszip.min.js"></script>
<script src="assets/dataexports/pdfmake.min.js"></script>
<script src="assets/dataexports/vfs_fonts.js"></script>
<script src="assets/dataexports/buttons.html5.min.js"></script>
<script src="assets/dataexports/buttons.print.min.js"></script>
    <script src="assets/core.js"></script>

<script src="assets/datepicker.min.js"></script> 

<script type="text/javascript" src="scripts/cashout.js"></script>
  <script>
    new GijgoDatePicker(document.getElementById('initial_date_picker'), 
      { footer: true, modal: true, header: true });

    new GijgoDatePicker(document.getElementById('final_date_picker'), 
      { footer: true, modal: true, header: true });

        
</script>
</body>
</html>