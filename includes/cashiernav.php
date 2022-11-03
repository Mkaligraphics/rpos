<nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a href="#" class="navbar-brand text-success font-weight-bold">Sweet Joint </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="accounts" class="nav-item nav-link active"> <i class="fa fa-desktop fa-fw "></i> Dashboard</a> 
            </div>  

            <div class="navbar-nav">

                <div class="nav-item "> 
                            <a href="#" class="nav-link">
                               Order adjustment</a>                           
                        
                    </div> 

                    <div class="nav-item dropdown"> 
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                Prime Entry</a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Invoices</a>
                                <a href="#" class="dropdown-item">Credit note</a>
                                <a href="#" class="dropdown-item">Purchase order</a>
                            </div> 
                        </div>
                    </div>
                </div>    

            

            <div class="navbar-nav">
            <div class="nav-item dropdown"> 
                     <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <?php if ($data->loggedin() && $data->getfield('level') == '3'){  echo ucfirst($data->getfield('fname')).' '.ucfirst($data->getfield('lname'));} else {?>
                        <script>location.href="logout.php";</script>
                    <?php }?></a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="logout" class="dropdown-item">Logout</a>
                    </div> 
                </div>

                <div class="nav-item">
            </div>
                
            </div>
        </div>
    </nav>
