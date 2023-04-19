<!-- Menu NavBar Section -->
<?php require 'components/Frontend/menu-navbar.php'; ?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
     <div class="container">
          <div class="row">
               <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                         <p>Fresh and Organic</p>
                         <h1>My Order</h1>
                    </div>
               </div>
          </div>
     </div>
</div>
<!-- end breadcrumb section -->

<?php
     $heading = "Product";
     $dbClass = new dbClass();

     $table_order = "tb_order as ord";
     $table_order_detail = "tb_orderdetail as ordd";
     $table_transaction = "tb_transaction as ts"; 
     $table_product = "tb_product as p";
     $table_user = "tb_user as usr";

     if(isset($_SESSION['us_id'])){
          $user_id = $_SESSION['us_id'];
     }

     if(isset($_GET['orderid'])){
          $order_id = $_GET['orderid'];
     }


     // Order 
     $field_order = "ord.od_id, ord.firstname, ord.lastname, ord.email, ord.phone, ord.city, ord.country, ord.shippingAddress, ord.status, ord.dateOrdered, ord.dateDelivered, ord.dateSuccess";
     $condition_order = "ord.od_id = $order_id AND usr.us_id = $user_id";
     $join_condition_order = "ord.us_id = usr.us_id";
     $order_join_user = $table_order . " INNER JOIN " . $table_user . " ON " . $join_condition_order;
     $order = $dbClass->dbSelectOne($order_join_user, $field_order, $condition_order, "");


     // Transaction
     $field_transaction = "ts.od_id, ts.us_id, ts.tmode, ts.tstatus, .ts.created_at";
     $condition_transaction = "ts.od_id = $order_id AND ts.us_id = $user_id";
     $join_condition_transaction = "ts.od_id = ord.od_id";
     $transaction_join_order = $table_transaction . " INNER JOIN " . $table_order . " ON " . $join_condition_transaction;
     $transaction = $dbClass->dbSelectOne($transaction_join_order, $field_transaction, $condition_transaction, "");


     // Order Detail 
     $field_order_detail = "ordd.od_id, ordd.quantity, p.pd_name, p.pd_image, p.pd_salePrice, p.pd_regularPrice";
     $condition_order_detail = "ordd.od_id = $order_id";
     $join_condition_order_detail = "ordd.pd_id = p.pd_id";
     $order_detail_join_product = $table_order_detail . " INNER JOIN " . $table_product . " ON " . $join_condition_order_detail;
     $order_details = $dbClass->dbSelect($order_detail_join_product, $field_order_detail, $condition_order_detail, "");


     $subtotal = 0;
     $taxPrice = 0;
     $totalPrice = 0;

?>

<div class="container-fluid px-5">
     <div class="row my-5">
          <div class="col-12">
               <div class="card" style="border: none !important">
                    <div class="card-body">
                         <div class="row">
                              <div class="col-6 pl-0">
                                   <h3 class="text-left">Order Detail</h3>
                              </div>
                              <div class="col-6 mb-4">
                                   <a href="/my-dashboard" class="btn btn-success btn-sm float-end py-2 fw-bold"><i class="fas fa-circle-arrow-left me-2"></i>Back</a>
                              </div>
                              
                              <div class="col-md-4">
                                   <div class="row">
                                        <div class="col-12 mb-3 rounded bg-secondary text-dark p-0">
                                             <div class="card bg-secondary">
                                                  <div class="card-header text-light font-weight-bold">ORDERS DETAILS</div>
                                                  <div class="card-body">
                                                       <table class="table table-secondary p-0">
                                                            <tbody>
                                                                 <tr>
                                                                      <th>Order ID</th>
                                                                      <td><?= $order['od_id']; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                      <th>Order Date</th>
                                                                      <td><?= date_format(DateTime::createFromFormat('Y-m-d H:i:s', $order['dateOrdered']),"D d F Y | g:i A"); ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                      <th>Status</th>
                                                                      <td class="text-capitalize"><?= $order['status']; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                      <th>Delivered Date</th>
                                                                      <td>
                                                                           <?php
                                                                                if($order['status'] == "ordered" && $order['dateDelivered'] == ""){
                                                                                     ?>
                                                                                          <p class="fw-bold text-danger">The order item is not deliver ,yet</p>
                                                                                     <?php
                                                                                }
                                                                                else if(!empty($order['dateDelivered'])){
                                                                                     ?>
                                                                                          <?=  date_format(DateTime::createFromFormat('Y-m-d H:i:s', $order['dateDelivered']),"D d F Y | g:i A"); ?>
                                                                                     <?php
                                                                                }
                                                                                else if($order['status'] == "delivering" && $order['dateSuccess'] == ""){
                                                                                     ?>
                                                                                          <p class="fw-bold text-danger">The order is delivered, No Accept, yet</p>
                                                                                     <?php
                                                                                }
                                                                                else if($order['status'] == "delivered" && $order['dateSuccess']){
                                                                                     ?>
                                                                                         <?=  date_format(DateTime::createFromFormat('Y-m-d H:i:s', $order['dateSuccess']), "D d F Y | g:i A"); ?>
                                                                                     <?php
                                                                                }
                                                                           ?>
                                                                      </td>
                                                                 </tr>
                                                            </tbody>
                                                       </table>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="col-12 mb-3 rounded bg-secondary text-dark p-0">
                                             <div class="card bg-secondary">
                                                  <div class="card-header text-light font-weight-bold">TRANSACTION</div>
                                                  <div class="card-body">
                                                       <table class="table table-secondary p-0">
                                                            <tbody>
                                                                 <tr>
                                                                      <th>Transaction Mode</th>
                                                                      <td>
                                                                           <?php
                                                                                if($transaction['tmode'] == "cash_on_delivery"){
                                                                                     echo "Cash On Delivery";
                                                                                }
                                                                                else if($transaction['tmode'] == "card"){
                                                                                     echo "Credit Card / Visa Card";
                                                                                }
                                                                           ?>
                                                                      </td>
                                                                 </tr>
                                                                 <tr>
                                                                      <th>Transaction Status</th>
                                                                      <td>
                                                                           <?php
                                                                                if($transaction['tstatus'] == "approved"){
                                                                                     echo "Purchased";
                                                                                }
                                                                                else if($transaction['tstatus'] == "pending"){
                                                                                     echo "Pending";
                                                                                }
                                                                           ?>
                                                                      </td>
                                                                 </tr>
                                                                 <tr>
                                                                      <th>Transaction Date</th>
                                                                      <td><?= date_format(DateTime::createFromFormat('Y-m-d H:i:s', $transaction['created_at']),"D d F Y | g:i A"); ?></td>
                                                                 </tr>
                                                            </tbody>
                                                       </table>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>

                              <div class="col-md-8">
                                   <div class="row px-3">
                                        <div class="col-12 mb-3 rounded bg-secondary text-dark p-0">
                                             <div class="card bg-secondary">
                                                  <div class="card-header text-light font-weight-bold">PRODUCT ITEMS</div>
                                                  <div class="card-body">
                                                       <div class="row mb-3 px-2">
                                                   
                                                            <?php 
                                                                 foreach ($order_details as $order_detail){
                                                                      ?>
                                                                           <div class="col-md-4 px-2 bg-secondary">
                                                                                <div class="card mb-3 text-dark" style="max-width: 540px;">
                                                                                     <div class="row g-0">
                                                                                          <div class="col-md-4 my-auto text-center px-2 card-product-img">
                                                                                               <img src="../../../assets/images/<?= strtolower($heading) ?>/<?= $order_detail['pd_image']; ?>" width="150" > 
                                                                                          </div>
                                                                                          <div class="col-md-8">
                                                                                               <div class="card-body">
                                                                                               <h6 class="card-title text-dark m-0"><?= $order_detail['pd_name']; ?></h6> 
                                                                                               <p class="card-text m-0"><span class="fw-bold">Amount:</span> <?= $order_detail['quantity']; ?></p>
                                                                                               <p class="card-text m-0"><span class="fw-bold">Unit Price:</span> $<?= $order_detail['pd_salePrice']  ? number_format($order_detail['pd_salePrice'], 2)  : number_format($order_detail['pd_regularPrice'], 2); ?> </p>
                                                                                               
                                                                                               </div>
                                                                                          </div>
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                      <?php

                                                                      $subtotal +=  $order_detail['quantity']  * ($order_detail['pd_salePrice']  ? $order_detail['pd_salePrice']  : $order_detail['pd_regularPrice'] );
                                                                      $taxPrice = $subtotal * 0.1;
                                                                      $totalPrice = $subtotal + $taxPrice;
                                                                 } 
                                                            ?>
                                             
                                                       </div>
                                                       <table class="table table-secondary p-0">
                                                            <tbody>
                                                                 <tr>
                                                                      <th>Subtotal</th>
                                                                      <th class="text-end">$<?= number_format($subtotal, 2); ?></th>
                                                                 </tr>
                                                                 <tr>
                                                                      <th>Tax ( VAT 10% )</th>
                                                                      <th class="text-end">$<?= number_format($taxPrice, 2); ?></th>
                                                                 </tr>
                                                                 <tr>
                                                                      <th>Total</th>
                                                                      <th class="text-end">$<?= number_format($totalPrice, 2); ?></th>
                                                                 </tr>
                                                            </tbody>
                                                       </table>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="col-12 mb-3 rounded bg-secondary text-dark p-0">
                                             <div class="card bg-secondary">
                                                  <div class="card-header text-light font-weight-bold">BILLING DETAILS</div>
                                                  <div class="card-body">
                                                       <table class="table table-secondary p-0">
                                                            <tbody>
                                                                 <tr>
                                                                      <th>Name</th>
                                                                      <td><?= $order['lastname']; ?> <?= $order['firstname']; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                      <th>Email</th>
                                                                      <td><?= $order['email']; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                      <th>Phone</th>
                                                                      <td>+855 <?= $order['phone']; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                      <th>Shipping Address</th>
                                                                      <td><?= $order['shippingAddress']; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                      <th>City/Province</th>
                                                                      <td><?= $order['city']; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                      <th>Country</th>
                                                                      <td><?= $order['country']; ?></td>
                                                                 </tr>
                                                            </tbody>
                                                       </table>
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
</div>




<!-- Logo Carousel Section -->
<?php require 'components/Frontend/logo-carousel.php'; ?>

<!-- Copyrights Section -->
<?php require 'components/Frontend/copyrights.php'; ?>