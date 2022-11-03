<div class="row">
            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-round">
                <div class="card-body ">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center">
                        <i class="fa fa-list text-danger"></i>
                      </div>
                    </div>
                    <div class="col col-stats">
                      <div class="numbers">
                        <p class="card-category">Daily sales</p>
                        <h4 class="card-title">
                          <?php echo number_format($statistics->dailyincome(),2); ?>
                        </h4>
                        <!--a href="">View reports</a-->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-round">
                <div class="card-body ">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center">
                        <i class="fa fa-check text-info"></i>
                      </div>
                    </div>
                    <div class="col col-stats">
                      <div class="numbers">
                        <p class="card-category">Monthly sales</p> 
                        <h4 class="card-title"><?php echo number_format($statistics->monthlyincome(),2); ?></h4>
                         <!--a href="">View reports</a-->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-round">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center">
                        <i class="fa fa-flash text-warning"></i>
                      </div>
                    </div>
                    <div class="col col-stats">
                      <div class="numbers">
                        <p class="card-category">Credited stocks</p>
                        <h4 class="card-title">
                          Ksh <?php echo $statistics->stockcredit(); ?>                            
                          </h4>
                        <!--  <a href="">View reports</a> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-round">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center">
                        <i class="fa fa-money text-success"></i>
                      </div>
                    </div>
                    <div class="col col-stats">
                      <div class="numbers">
                        <p class="card-category">Credited sales</p>
                        <h4 class="card-title">0.00</h4>
                         <!-- <a href="">View reports</a> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


  <div class="row pt-5">
            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-round">
                <div class="card-body ">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center">
                        <i class="fa fa-list text-danger"></i>
                      </div>
                    </div>
                    <div class="col col-stats">
                      <div class="numbers">
                        <p class="card-category">Pending cash</p>
                        <h4 class="card-title">0.00</h4>
                         <!-- <a href="">View reports</a> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-round">
                <div class="card-body ">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center">
                        <i class="fa fa-check text-info"></i>
                      </div>
                    </div>
                    <div class="col col-stats">
                      <div class="numbers">
                        <p class="card-category">Monthly expenditures</p> 
                        <h4 class="card-title">
                          <?php 
                          echo number_format($statistics->stockexpenses() + $statistics->monthlyutensilspurchase() + $statistics->reducedcredit() + $statistics->monthly_ingredients(), 2) ;?>
                            
                          </h4>
                         <!-- <a href="">View reports</a> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-round">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center">
                        <i class="fa fa-money text-success"></i>
                      </div>
                    </div>
                    <div class="col col-stats">
                      <div class="numbers">
                        <p class="card-category">Daily expenditure</p>
                        <h4 class="card-title">Ksh 
                            <?php 
                          echo number_format($statistics->dailyutensilspurchase() + $statistics->dailystockexpenses()+ $statistics->daily_ingredients(), 2) ;?>
                            
                        </h4>
                         <!-- <a href="">View reports</a> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-round">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center">
                        <i class="fa fa-users text-warning"></i>
                      </div>
                    </div>
                    <div class="col col-stats">
                      <div class="numbers">
                        <p class="card-category">Total employees</p>
                        <h4 class="card-title"><?php echo $statistics->staffs(); ?></h4>
                        <!--  <a href="">View reports</a> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>