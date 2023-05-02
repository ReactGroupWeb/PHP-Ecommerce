<?php
  include_once "./DB/dbConnection.php";
  include_once "./DB/dbClass.php";
  $dbClass = new dbClass();
  $heading_user = "User";
  $heading_product = "Product";

  // tables
  $table_transaction = "tb_transaction as ts";
  $table_user = "tb_user as usr";
  $table_order = "tb_order as ord";
  $table_order_detail = "tb_orderdetail as ordd";
  $table_product = "tb_product as p";

  // fields
  $field_order_history = "ts.tmode, ts.tstatus, ts.created_at, usr.us_name, usr.us_image, ord.od_id, p.pd_name, 
                          p.pd_image, p.pd_regularPrice, p.pd_salePrice, ordd.odt_id, ordd.quantity";
  $conditon_transaction = "";
  $order_by_transaction = "ORDER BY ordd.odt_id DESC limit 10"; 


  // join transaction with user
  $join_condition_transaction_and_user = "ts.us_id = usr.us_id";
  $transaction_join_user = $table_transaction . " INNER JOIN " . $table_user . " ON " . $join_condition_transaction_and_user;

  // join transaction with order detail
  $join_condition_transaction_and_order_detail = "ts.od_id = ordd.od_id";
  $transaction_join_order_detail = " INNER JOIN " . $table_order_detail . " ON " . $join_condition_transaction_and_order_detail;

  // join orderdetail with order
  $join_conditon_order_detail_and_order = "ordd.od_id = ord.od_id";
  $order_detail_join_order = " INNER JOIN " . $table_order . " ON " . $join_conditon_order_detail_and_order;

  // join orderdetail with product
  $join_condition_order_detail_and_product = "ordd.pd_id = p.pd_id";
  $order_detail_join_product = " INNER JOIN " . $table_product . " ON " . $join_condition_order_detail_and_product;

  // connect tables join
  $tables_connect_join = $transaction_join_user . ' ' . $transaction_join_order_detail . ' ' . $order_detail_join_order . ' ' . $order_detail_join_product;


  $order_histories = $dbClass->dbSelect($tables_connect_join, $field_order_history, $conditon_transaction, $order_by_transaction);
?>



<div class="row ">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Order History</h4>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th> Nº </th>
                <th> Client Name </th>
                <th> Order Nº </th>
                <th> Product Cost </th>
                <th> Product Name </th>
                <th> Payment Mode </th>
                <th> Paid Date </th>
                <th> Payment Status </th>
              </tr>
            </thead>
            <tbody>
              <?php
                if(!empty($order_histories)){
                  foreach($order_histories as $order_history){
                    ?>
                      <tr>
                      <td><?= $order_history['odt_id']; ?></td>
                      <td>
                        <img src="../../../assets/images/<?= strtolower($heading_user) ?>/<?= $order_history['us_image']; ?>" alt="image" />
                        <span class="pl-2"><?= $order_history['us_name']; ?></span>
                      </td>
                      <td> <?= $order_history['od_id']; ?> </td>
                      <td>
                        $<?= $order_history['pd_salePrice']  ? number_format($order_history['pd_salePrice'] * $order_history['quantity'], 2) : number_format($order_history['pd_regularPrice'] * $order_history['quantity'], 2);
                          ?>
                      </td>
                      <td> 
                        <img src="../../../assets/images/<?= strtolower($heading_product) ?>/<?= $order_history['pd_image']; ?>" alt="image" />
                        <span class="pl-2"><?= $order_history['pd_name']; ?></span> 
                      </td>
                      <td> 
                        <?php
                          if($order_history['tmode'] == "cash_on_delivery"){
                            echo "Cash On Delivery";
                          }
                          else if($order_history['tmode'] == "card"){
                            echo "Credit Card";
                          }
                        ?>  
                      </td>
                      <td> <?= date_format(DateTime::createFromFormat('Y-m-d H:i:s', $order_history['created_at']),"d F Y | g:i A");?> </td>
                      <td>
                        <?php
                          if($order_history['tstatus'] == "pending"){
                            echo "<div class='badge badge-outline-warning'>Pending</div>";
                          }
                          else if($order_history['tstatus'] == "approved"){
                            echo "<div class='badge badge-outline-success'>Approved</div>";
                          }
                        ?>
                      </td>
                    </tr>
                    <?php
                  }
                }
                else{
                  ?>
                    <tr class="text-center" colspan="8">
                      <h1>No Order History</h1>
                    </tr>
                  <?php
                }
                
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>