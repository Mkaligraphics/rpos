<nav class="navbar navbar-expand-md navbar-dark bg-dark" style="padding: 20px !important; ">
        <a href="#" class="navbar-brand text-success font-weight-bold"><img src="img/logo.png" style="width: 2em;" /> Sweet Joint </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav">               
            </div> 
                    <h3 class="text-white font-weight-bold">
                        <span class="text-success"> POINT </span> OF SALE
                    </h3>

            <div class="navbar-nav">
            <div class="nav-item"> 
                     <a href="#" class="nav-link">
                           <?php if ($data->loggedin() ){  echo strtoupper($data->getfield('name'));} else {?>
                        <script>location.href="logout.php";</script>
                    <?php }?></a>
                    </a>                    
                </div>
                               
            </div>
        </div>
    </nav>
    <a class="btn btn-dark ml-3 mt-2 mb-2 text-white openbtn" >
       Menu <i class="fa fa-list fa-fw"></i>
    </a>

