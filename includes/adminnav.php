<nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a href="#" class="navbar-brand text-success font-weight-bold">
            <img src="img/logo.png" style="width: 2em;" /> Sweet Joint </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="admin" class="nav-item nav-link active"> <i class="fa fa-desktop fa-fw "></i> Dashboard</a>
                
                <a href="adjustments" class="nav-item nav-link active">Adjustment</a>
                <div class="navbar-nav">
                    <div class="nav-item dropdown"> 
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                Reports</a>
                            <div class="dropdown-menu">
                                <a href="salesreport" class="dropdown-item">Sales</a>
                                <a href="staffsreport" class="dropdown-item">Staff</a>
                                <a href="menu" class="dropdown-item">Menu</a>
                                <!-- <a href="utensilsreport" class="dropdown-item">Utensils</a> -->
                                <a href="stockreport" class="dropdown-item">Raw Stock</a>
                                <a href="printingredients" class="dropdown-item">Ingredients</a> 
                                <a href="directpurchasereport" class="dropdown-item">Direct purchases</a>
                                <!-- <a href="borroweditems" class="dropdown-item">Borrowed items</a> -->
                            </div> 
                        </div>
                    </div>
                </div>                
                
            </div>   

                <div class="navbar-nav">
                    <div class="nav-item dropdown"> 
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                Human resource</a>
                            <div class="dropdown-menu">
                                <a href="staffs" class="dropdown-item">New staff</a>
                                <a href="managestaffs" class="dropdown-item">Manage staff</a>
                                <a href="departments" class="dropdown-item">Departments</a>
                                <a href="suppliers" class="dropdown-item">Suppliers</a>
                                <a href="customers" class="dropdown-item">Customers</a>
                                <a href="units" class="dropdown-item">Manage units</a>
                            </div> 
                        </div>
                    </div>
                </div>

                <div class="navbar-nav">
                    <div class="nav-item dropdown"> 
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                Financial</a>
                            <div class="dropdown-menu">
                                <a href="purchases" class="dropdown-item">BOM Purchases</a>
                                <a href="directpurchase" class="dropdown-item">Direct Purchases</a>
                            </div> 
                        </div>
                    </div>
                </div>


                 <div class="navbar-nav">
                    <div class="nav-item dropdown"> 
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                Productions</a>
                            <div class="dropdown-menu">
                                <a href="newstock" class="dropdown-item">Raw products</a>
                                <a href="managefood" class="dropdown-item">Manage food</a>
                                <a href="bom" class="dropdown-item">Prepare recipe</a>
                                <a href="ingredients" class="dropdown-item">Prepare food</a>                    
                            </div> 
                        </div>
                    </div>
                </div>

            <!-- <div class="navbar-nav">
                <div class="nav-item dropdown"> 
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                           Resources</a>
                        <div class="dropdown-menu">
                            <a href="newutensils" class="dropdown-item">Add utensils</a> 
                            <a href="lendutensils" class="dropdown-item">Lend utensils</a>
                            <a href="returnutensils" class="dropdown-item">Return utensils</a>
                            <a href="resourcespurchase" class="dropdown-item">Purchases</a>                            
                        </div> 
                    </div>
                </div> -->
            </div>

        <!-- 
             <div class="navbar-nav">
                <div class="nav-item dropdown"> 
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                          Prime entry</a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">Make payments</a> 
                            <a href="#" class="dropdown-item">Receive payment</a>
                            <a href="#" class="dropdown-item">Creat orders</a>
                            <a href="#" class="dropdown-item">Creat invoice</a> 
                            <a href="#" class="dropdown-item">Credit note</a>
                            <a href="#" class="dropdown-item">Trail balance</a>
                            <a href="#" class="dropdown-item">Bills</a>                           
                        </div> 
                    </div>
                </div>
            </div> -->

            <div class="navbar-nav">
                <div class="nav-item dropdown"> 
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <?php if ($data->loggedin() && $data->getfield('level') == '1'){  echo $data->getfield('fname').' '.$data->getfield('lname');} else {?>
                        <script>location.href="logout.php";</script>
                    <?php }?></a>

                            
                        <div class="dropdown-menu">
                            <a href="adminsetting" class="dropdown-item">Settings</a>
                            <a href="logout" class="dropdown-item">Logout</a>
                        </div> 
                    </div>

                    <div class="nav-item">
                            <img class="img-profile rounded-circle" src="profile/<?php echo $profile->mypicture('profile');  ?>" style="width: 2.5em;">
                </div>
                
            </div>
        </div>
    </nav>
