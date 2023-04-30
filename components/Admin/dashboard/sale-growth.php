<?php

  include_once "./DB/dbConnection.php";
  include_once "./DB/dbClass.php";
  $dbClass = new dbClass();

  $table_order = "tb_order";
  $fields = "subTotal, tax, totalPrice";
  $condition = "";
  $order_by = "";

  $orders = $dbClass->dbSelect($table_order, $fields, $condition, $order_by);

  $subTotal = 0;
  $taxPrice = 0;
  $totalPrice = 0;

  foreach($orders as $order){
    $subTotal += $order['subTotal'];
    $taxPrice += $order['tax'];
    $totalPrice += $order['totalPrice'];
  }

  // count product
  $table_product = "tb_product";
  $product = $dbClass->dbCount($table_product, $condition);

?>


<div class="row">
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <div class="d-flex align-items-center align-self-start">
              <h3 class="mb-0">$<?= number_format($subTotal,2) ?></h3>
            </div>
          </div>
          <div class="col-3">
            <div class="icon icon-box-success ">
              <span class="fa fa-bar-chart icon-item"></span>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Oerall Sub Total</h6>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <div class="d-flex align-items-center align-self-start">
              <h3 class="mb-0">$<?= number_format($taxPrice,2) ?></h3>
            </div>
          </div>
          <div class="col-3">
            <div class="icon icon-box-success">
              <span class="fa fa-pie-chart icon-item"></span>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Overall Tax</h6>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <div class="d-flex align-items-center align-self-start">
              <h3 class="mb-0">$<?= number_format($totalPrice,2) ?></h3>
            </div>
          </div>
          <div class="col-3">
            <div class="icon icon-box-success">
              <span class="fa fa-line-chart icon-item"></span>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Overall Total Price</h6>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <div class="d-flex align-items-center align-self-start">
              <h3 class="mb-0">
                <?php
                  if($product !=0){
                    echo "$product Items";
                  }
                  else{
                    echo "$product Item";
                  }
                ?>
              </h3>
            </div>
          </div>
          <div class="col-3">
            <div class="icon icon-box-success ">
              <span class="fa fa-area-chart icon-item"></span>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Overall Product</h6>
      </div>
    </div>
  </div>
</div>