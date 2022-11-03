

 <div class="row">
    <div class="container">
  <div class="row font-weight-bold">
    <div class="col-sm">
  <a href="pendingorders" class="text-white">
      <li class="list-group-item d-flex justify-content-between lh-condensed bg-dark">
                    <div>
                      <h6 class="my-0">PENDING ORDERS</h6>
                      <small class="text-danger"><?php echo $accounts->ordertotals('foodorder','0').' Orders'; ?></small>
                    </div>
                    <span class="text-success">KSH <?php echo $accounts->myCash('0','1'); ?></span>
        </li>
      </a>
    </div>

    <div class="col-sm">
      <a href="servedorders" class="text-white">

        <li class="list-group-item d-flex justify-content-between lh-condensed bg-dark">
                    <div>
                      <h6 class="my-0">SERVED ORDERS</h6>
                      <small class="text-danger"><?php echo $accounts->ordertotals('foodorder','1').' Orders'; ?></small>
                    </div>
                    <span class="text-success">KSH  <?php echo $accounts->myCash('1','1'); ?></span>
        </li>
        </a>
    </div>

    <div class="col-sm">
        <a href="paidorders" class="text-white">
      <li class="list-group-item d-flex justify-content-between lh-condensed bg-dark">
                    <div>
                      <h6 class="my-0">PAID IN CASH</h6>
                      <small class="text-danger"><?php echo $accounts->ordertotals('foodorder','2').' Orders'; ?></small>
                    </div>
                    <span class="text-success">KSH <?php echo $accounts->myCash('2','1'); ?></span>
        </li>
        </a>
    </div>
  </div>

  </div>
</div>