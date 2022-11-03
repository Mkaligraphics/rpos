<?php 
require '../classes/dbase.class.php';
require '../classes/datediff.class.php';

 $data = new dbase();
 $dateFormat = new timeStamp();

if (isset($_POST)){

if ($_POST['search'] == '0') {
         $sql =$data->con->query("SELECT foodorder.id,users.fname, users.lname, foodorder.started, users.profile FROM foodorder, users WHERE foodorder.userid = users.id AND foodorder.prepared = '1' ORDER BY foodorder.id DESC  ");
                if (mysqli_num_rows($sql) > 0){
                  while($rws = mysqli_fetch_array($sql)){ ?>
                       
<a href="#" data-toggle="modal" data-target="#cashout"  id="<?php echo $rws['id']; ?>" class="vieworder">
       <li class="ticket-item">                        
                <div class="row">
                                <div class="ticket-user col-md-6 col-sm-12">
                                  <img src=" profile/<?php echo $rws['profile']; ?>" class="user-avatar">
                                  <span class="user-name"><?php echo strtoupper($rws['fname'].' '.$rws['lname']); ?></span>
                                   
                                </div>
                                <div class="ticket-time  col-md-4 col-sm-6 col-xs-12">
                                    <div class="divider hidden-md hidden-sm hidden-xs"></div>
                                    <i class="fa fa-clock-o"></i>
                                    <span class="time ">
                                      <?php
                                       $started = $rws['started'];                             
                                        echo $dateFormat->getDateTimeDiff ($started); 
                                      ?>     
                                </span>
                                </div>
                                <div class="ticket-type  col-md-2 col-sm-6 col-xs-12">
                                    <span class="divider hidden-xs"></span>
                                    <span class="type text-danger">
                                      
                                      No #<?php echo $rws['id']; ?>
                                     
                                    </span>
                                </div>
                                <div class="ticket-state ">
                                    <i class="fa fa-times"></i>
                                </div>
                  </div>
      </li>
      </a>      
          
            <?php } } else { ?>
                     <li class="ticket-item  pt-2 pb-2"> 
                <span class="text-danger">No records</span>
      </li>

  <?php }}else { 
    $sql =$data->con->query("SELECT foodorder.id,users.fname, users.lname, foodorder.started, users.profile FROM foodorder, users  WHERE foodorder.id LIKE '%".$_POST['search']."%' AND users.id = foodorder.userid AND  foodorder.prepared = '1' ORDER BY foodorder.id DESC  ");
                if (mysqli_num_rows($sql) > 0){
                  while($rws = mysqli_fetch_array($sql)){  ?>

<a href="#" data-toggle="modal" data-target="#cashout"  id="<?php echo $rws['billno']; ?>" class="viewbillno">
       <li class="ticket-item">                        
                <div class="row">
                                <div class="ticket-user col-md-6 col-sm-12">
                                  <img src=" profile/<?php echo $rws['profile']; ?>" class="user-avatar">
                                  <span class="user-name"><?php echo strtoupper($rws['fname'].' '.$rws['lname']); ?></span>
                                   
                                </div>
                                <div class="ticket-time  col-md-4 col-sm-6 col-xs-12">
                                    <div class="divider hidden-md hidden-sm hidden-xs"></div>
                                    <i class="fa fa-clock-o"></i>
                                    <span class="time ">
                                      <?php
                                       $started = $rws['started'];                             
                                        echo $dateFormat->getDateTimeDiff ($started); 
                                      ?>     
                                </span>
                                </div>
                                <div class="ticket-type  col-md-2 col-sm-6 col-xs-12">
                                    <span class="divider hidden-xs"></span>
                                    <span class="type text-danger">
                                      
                                      No #<?php echo $rws['id']; ?>
                                     
                                    </span>
                                </div>
                                <div class="ticket-state ">
                                    <i class="fa fa-times"></i>
                                </div>
                  </div>
      </li>
            
    </a>   
<?php } } else { ?>
                     <li class="ticket-item pt-2 pb-2"> 
                <span class="text-danger">No records</span>
      </li>

<?php }}} ?>