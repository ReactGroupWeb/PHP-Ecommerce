<?php
  include_once "./DB/dbConnection.php";
  include_once "./DB/dbClass.php";
  $dbClass = new dbClass();

  
  $table_order = "tb_order";
  $fields = "subTotal, tax, totalPrice, created_at";
  $condition = "created_at BETWEEN '2023-05-01' AND '2023-05-31'";
  $order_by = "";

  $orders = $dbClass->dbSelect($table_order, $fields, $condition, $order_by);

  $subTotal = 0;
  $taxPrice = 0;
  $totalPrice = 0;

  if(!empty($orders)){
    foreach($orders as $order){
      $subTotal += $order['subTotal'];
      $taxPrice += $order['tax'];
      $totalPrice += $order['totalPrice'];
    }
  }
  


?>



<div class="row">
  <div class="col-sm-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <h5>Revenue</h5>
        <div class="row">
          <div class="col-8 col-sm-12 col-xl-8 my-auto">
            <div class="d-flex d-sm-block d-md-flex align-items-center">
              <h2 class="mb-0">$<?= number_format($subTotal,2) ?></h2>
            </div>
            <h6 class="text-muted font-weight-normal">Sub Total Current Month</h6>
          </div>
          <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
            <i class="icon-lg fa fa-credit-card text-primary ml-auto"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <h5>Sales</h5>
        <div class="row">
          <div class="col-8 col-sm-12 col-xl-8 my-auto">
            <div class="d-flex d-sm-block d-md-flex align-items-center">
              <h2 class="mb-0">$<?= number_format($taxPrice,2) ?></h2>
            </div>
            <h6 class="text-muted font-weight-normal">Tax Current Month</h6>
          </div>
          <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
            <i class="icon-lg fa fa-shopping-bag text-danger ml-auto"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <h5>Purchase</h5>
        <div class="row">
          <div class="col-8 col-sm-12 col-xl-8 my-auto">
            <div class="d-flex d-sm-block d-md-flex align-items-center">
              <h2 class="mb-0">$<?= number_format($totalPrice,2) ?></h2>
            </div>
            <h6 class="text-muted font-weight-normal">Total Price Current Month</h6>
          </div>
          <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
            <i class="icon-lg fa fa-desktop text-success ml-auto"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>