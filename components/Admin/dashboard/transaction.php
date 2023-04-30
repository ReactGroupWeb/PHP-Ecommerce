<?php
  date_default_timezone_set('Asia/Phnom_Penh');
  $current_time = date('D d M Y, h:i A', time());
  
  include_once "./DB/dbConnection.php";
  include_once "./DB/dbClass.php";
  $dbClass = new dbClass();

  $table_transaction = "tb_transaction as ts";
  $table_order = "tb_order as ord";

  $field = "ts.id, ts.od_id, ts.tmode, ord.od_id, ord.totalPrice";
  $condition = "";
  $order = "";

  $join_conditon = "ord.od_id = ts.od_id";
  $table_join = $table_transaction . " INNER JOIN " . $table_order . " ON " . $join_conditon;
  $transactions = $dbClass->dbSelect($table_join, $field, $condition, $order);

  $total_paid_by_cash = 0;
  $total_paid_by_card = 0;
  $total_paid = 0;

  if(!empty($transactions)){
    foreach($transactions as $transaction){
      if($transaction['tmode'] == "cash_on_delivery"){
        $total_paid_by_cash += $transaction['totalPrice'];
      }
      else if($transaction['tmode'] == "card"){
        $total_paid_by_card += $transaction['totalPrice'];
      }
    }
  }

  $total_paid = $total_paid_by_cash + $total_paid_by_card;

  $_SESSION['total_paid'] = $total_paid;
  $_SESSION['total_paid_by_cash'] = $total_paid_by_cash;
  $_SESSION['total_paid_by_card'] = $total_paid_by_card;
  
?>


<div class="row">
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Transaction History</h4>
        <canvas id="transaction-history" class="transaction-chart"></canvas>
        <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
          <div class="text-md-center text-xl-left">
            <h6 class="mb-1">Payment on Cash Delivery</h6>
            <p class="text-muted mb-0"><?= $current_time; ?></p>
          </div>
          <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
            <h6 class="font-weight-bold mb-0">$<?= number_format($total_paid_by_cash, 2) ?></h6>
          </div>
        </div>
        <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
          <div class="text-md-center text-xl-left">
            <h6 class="mb-1">Tranfer to Stripe</h6>
            <p class="text-muted mb-0"><?= $current_time; ?></p>
          </div>
          <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
            <h6 class="font-weight-bold mb-0">$<?= number_format($total_paid_by_card, 2) ?></h6>
          </div>
        </div>
      </div>
    </div>
  </div>




  <div class="col-md-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-row justify-content-between">
          <h4 class="card-title mb-1">Open Projects</h4>
          <p class="text-muted mb-1">Your data status</p>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="preview-list">
              <div class="preview-item border-bottom">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-primary">
                    <i class="fa fa-file-text" aria-hidden="true"></i>
                  </div>
                </div>
                <div class="preview-item-content d-sm-flex flex-grow">
                  <div class="flex-grow">
                    <h6 class="preview-subject">Admin dashboard design</h6>
                    <p class="text-muted mb-0">Broadcast web app mockup</p>
                  </div>
                  <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                    <p class="text-muted">15 minutes ago</p>
                    <p class="text-muted mb-0">30 tasks, 5 issues </p>
                  </div>
                </div>
              </div>
              <div class="preview-item border-bottom">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="fa fa-cloud-download"></i>
                  </div>
                </div>
                <div class="preview-item-content d-sm-flex flex-grow">
                  <div class="flex-grow">
                    <h6 class="preview-subject">Wordpress Development</h6>
                    <p class="text-muted mb-0">Upload new design</p>
                  </div>
                  <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                    <p class="text-muted">1 hour ago</p>
                    <p class="text-muted mb-0">23 tasks, 5 issues </p>
                  </div>
                </div>
              </div>
              <div class="preview-item border-bottom">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="fa fa-clock"></i>
                  </div>
                </div>
                <div class="preview-item-content d-sm-flex flex-grow">
                  <div class="flex-grow">
                    <h6 class="preview-subject">Project meeting</h6>
                    <p class="text-muted mb-0">New project discussion</p>
                  </div>
                  <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                    <p class="text-muted">35 minutes ago</p>
                    <p class="text-muted mb-0">15 tasks, 2 issues</p>
                  </div>
                </div>
              </div>
              <div class="preview-item border-bottom">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-danger">
                    <i class="fa fa-envelope"></i>
                  </div>
                </div>
                <div class="preview-item-content d-sm-flex flex-grow">
                  <div class="flex-grow">
                    <h6 class="preview-subject">Broadcast Mail</h6>
                    <p class="text-muted mb-0">Sent release details to team</p>
                  </div>
                  <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                    <p class="text-muted">55 minutes ago</p>
                    <p class="text-muted mb-0">35 tasks, 7 issues </p>
                  </div>
                </div>
              </div>
              <div class="preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="fa fa-chart-pie"></i>
                  </div>
                </div>
                <div class="preview-item-content d-sm-flex flex-grow">
                  <div class="flex-grow">
                    <h6 class="preview-subject">UI Design</h6>
                    <p class="text-muted mb-0">New application planning</p>
                  </div>
                  <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                    <p class="text-muted">50 minutes ago</p>
                    <p class="text-muted mb-0">27 tasks, 4 issues </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  window.total_paid = <?php echo json_encode($_SESSION['total_paid']); ?>;
  window.total_paid_by_cash = <?php echo json_encode($_SESSION['total_paid_by_cash']); ?>;
  window.total_paid_by_card = <?php echo json_encode($_SESSION['total_paid_by_card']); ?>;
</script>