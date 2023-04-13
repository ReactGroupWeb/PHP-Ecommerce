<!-- Menu NavBar Section -->
<?php require 'components/Frontend/menu-navbar.php'; ?>


<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
     <div class="container">
          <div class="row">
               <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                         <p>Fresh and Organic</p>
                         <h1>My Dashboard</h1>
                    </div>
               </div>
          </div>
     </div>
</div>
<!-- end breadcrumb section -->


<!-- Dashboard Record  -->
<div class="container mt-5">
     <div class="row">
          <?php
                                                              
               $dbClass = new dbClass();
               $table_order = "tb_order as ord";
               $fields = "*";
               

               $total_cost = "0";
               $total_purchased = "0";
               $total_delivered = "0";

               if(isset($_SESSION['us_id'])){
                    $user_id = $_SESSION['us_id'];

                    $order_conditon = "ord.us_id = $user_id";

                    $total_cost_condition = "us_id = $user_id AND totalPrice != 0";
                    $total_purchased_condition = "us_id = $user_id";
                    $total_delivered_condition = "us_id = $user_id AND status = 'delivered'";
               }

               $orders_total_price = $dbClass->dbSelect($table_order, $fields, $total_cost_condition, "");

               if(!empty($orders_total_price)){
                    foreach($orders_total_price as $ord_tot_pri){
                         $total_cost += $ord_tot_pri['totalPrice'];
                    } 
               }
 
               
               $total_purchased += $dbClass->dbCount($table_order, $total_purchased_condition);
               $total_delivered += $dbClass->dbCount($table_order, $total_delivered_condition);

               $table_user = "tb_user as usr";
               $heading = "User";

               $field_orders = "ord.od_id, ord.firstname, ord.lastname, ord.phone, ord.email, ord.status, ord.totalPrice, usr.us_image";
               $join_conditions = "usr.us_id = ord.us_id"; 
               $table_joins = $table_order . " INNER JOIN " . $table_user . " ON " . $join_conditions;
               $filter_order = "ORDER BY ord.status ASC";
               $orders = $dbClass->dbSelect($table_joins, $field_orders, $order_conditon, $filter_order);

          ?>
          <div class="col-lg-4 col-md-6">
               <div class="single-latest-news">
                    <div class="latest-news-bg news-bg-1" style="background-image: url(../../assets/frontend/img/dashboard/bg-1.jpg)"></div>
                    <div class="card mb-3 py-3 dashboard-item">
                         <div class="row my-auto">
                              <div class="col-md-4 my-auto text-center">
                                   <i class="fas fa-wallet dashboard-item-icon"></i>
                              </div>
                              <div class="col-md-8 text-end">
                                   <div class="card-body">
                                        <h3 class="card-title text-light">Total Cost</h3>
                                        <h4 class="card-text text-light fw-bold">$<?= number_format($total_cost, 2); ?></h4>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="col-lg-4 col-md-6">
               <div class="single-latest-news">
                    <div class="latest-news-bg news-bg-2" style="background-image: url(../../assets/frontend/img/dashboard/bg-2.jfif)"></div>
                    <div class="card mb-3 py-3 dashboard-item">
                         <div class="row my-auto">
                              <div class="col-md-4 my-auto text-center">
                                   <i class="fas fa-cash-register dashboard-item-icon"></i>
                              </div>
                              <div class="col-md-8 text-end">
                                   <div class="card-body">
                                        <h3 class="card-title text-light">Total Purchased</h3>
                                        <h4 class="card-text text-light fw-bold"><?= $total_purchased; ?> <?= $total_purchased == 0 || $total_purchased == 1 ? ' Item' : ' Items' ?></h4>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="col-lg-4 col-md-6">
               <div class="single-latest-news">
                    <div class="latest-news-bg news-bg-3" style="background-image: url(../../assets/frontend/img/dashboard/bg-3.jpg)"></div>
                    <div class="card mb-3 py-3 dashboard-item">
                         <div class="row my-auto">
                              <div class="col-md-4 my-auto text-center">
                                   <i class="fas fa-truck dashboard-item-icon"></i>
                              </div>
                              <div class="col-md-8 text-end">
                                   <div class="card-body">
                                        <h3 class="card-title text-light">Total Delivered</h3>
                                        <h4 class="card-text text-light fw-bold"><?= $total_delivered; ?></h4>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
<!-- End of Dashboard Record -->


<!-- List of Order Item Box -->
<div class="container mb-5">
     <?php
          if(!empty($orders)){
               ?>
                    <div class="row">
                         <div class="col-12 text-center">
                              <h3>Latest Order</h3>
                         </div>
                    </div>
                    <div class="row my-4">
               <?php
 
                    foreach($orders as $order){

                         if($order['status'] == "ordered"){
                              ?>
                                   <div class="col-4 text-center">
                                        <div class="card mb-3 py-3 border border-danger" style="border: 5px solid #dc3545 !important">
                                             <div class="row my-auto">
                                                  <div class="col-md-5 my-auto text-center">
                                                       <img style="background-image: url('../../assets/images/<?= strtolower($heading) ?>/<?= $order['us_image']; ?>')" class="order-item-profile">
                                                       <div class="px-3 mt-3 mb-2">
                                                            <h6 class="bg-danger fw-bold my-2 py-1 text-light">Ordered</h6>
                                                       </div>
                                                       <p>
                                                            <a href="/my-dashboard/order-detail?orderid=<?= $order['od_id']; ?>" class="btn btn-primary btn-sm text-light fw-bold"><i class="fas fa-eye me-2"></i>Detail</a>
                                                       </p>
                                                  </div>
                                                  <div class="col-md-7 text-right">
                                                       <div class="card-body">
                                                            <p class="m-0 card-title"><span class="fw-bold">No. </span><?= $order['od_id']; ?></p>
                                                            <p class="m-0 card-title"><?= $order['lastname']; ?> <?= $order['firstname']; ?></p>
                                                            <p class="m-0 card-text"><a href="mailto:<?= $order['email']; ?>" class="text-dark"><?= $order['email']; ?></a></p>
                                                            <p class="m-0 card-text"><a href="tel:<?= $order['phone']; ?>" class="text-dark">+(855) <?= $order['phone']; ?></a></p>
                                                            <p class="m-0 card-text fw-bold">$<?= number_format($order['totalPrice'],2); ?></p>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              <?php
                         }

                         else if($order['status']  == "delivering"){
                              ?>
                                   <div class="col-4 text-center">
                                        <div class="card mb-3 py-3 border border-warning" style="border: 5px solid #ffc107 !important">
                                             <div class="row my-auto">
                                                  <div class="col-md-5 my-auto text-center">
                                                       <img style="background-image: url('../../assets/images/<?= strtolower($heading) ?>/<?= $order['us_image']; ?>')" class="order-item-profile">
                                                       <div class="px-3 mt-3 mb-2">
                                                            <h6 class="bg-warning fw-bold my-2 py-1 text-dark">Delivering</h6>
                                                       </div>
                                                       <div class="d-flex justify-content-center">
                                                            <form action="../../../DB/frontend/accept_delivery.php" method="POST">
                                                                 <input type="hidden" name="user_id" value="<?= $user_id; ?>">
                                                                 <input type="hidden" name="order_id" value="<?= $order['od_id']; ?>">
                                                                 <button type="submit" name="accept_delivered" class="btn btn-success btn-sm text-light fw-bold me-2"><i class="fa-solid fa-check fw-bold"></i></button>
                                                            </form>
                                                            <!-- <a href="#" class="btn btn-success btn-sm text-light"><i class="fas fa-check"></i></a> -->
                                                            <a href="/my-dashboard/order-detail?orderid=<?= $order['od_id']; ?>" class="btn btn-primary btn-sm text-light fw-bold"><i class="fas fa-eye me-2"></i>Detail</a>
                                                       </div>
                                                  </div>
                                                  <div class="col-md-7 text-right">
                                                       <div class="card-body">
                                                            <p class="m-0 card-title"><span class="fw-bold">No. </span><?= $order['od_id']; ?></p>
                                                            <p class="m-0 card-title"><?= $order['lastname']; ?> <?= $order['firstname']; ?></p>
                                                            <p class="m-0 card-text"><a href="mailto:<?= $order['email']; ?>" class="text-dark"><?= $order['email']; ?></a></p>
                                                            <p class="m-0 card-text"><a href="tel:<?= $order['phone']; ?>" class="text-dark">+(855) <?= $order['phone']; ?></a></p>
                                                            <p class="m-0 card-text fw-bold">$<?= number_format($order['totalPrice'],2); ?></p>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              <?php
                         }

                         else if($order['status']  == "delivered"){
                              ?>
                                   <div class="col-4 text-center">
                                        <div class="card mb-3 py-3 border border-success" style="border: 5px solid #28a745 !important">
                                             <div class="row my-auto">
                                                  <div class="col-md-5 my-auto text-center">
                                                       <img style="background-image: url('../../assets/images/<?= strtolower($heading) ?>/<?= $order['us_image']; ?>')" class="order-item-profile">
                                                       <div class="px-3 mt-3 mb-2">
                                                            <h6 class="bg-success fw-bold my-2 py-1 text-light">Succes</h6>
                                                       </div>
                                                       <p>
                                                            <a href="/my-dashboard/order-detail?orderid=<?= $order['od_id']; ?>" class="btn btn-primary btn-sm text-light fw-bold"><i class="fas fa-eye me-2"></i>Detail</a>
                                                       </p>
                                                  </div>
                                                  <div class="col-md-7 text-right">
                                                       <div class="card-body">
                                                            <p class="m-0 card-title"><span class="fw-bold">No. </span><?= $order['od_id']; ?></p>
                                                            <p class="m-0 card-title"><?= $order['lastname']; ?> <?= $order['firstname']; ?></p>
                                                            <p class="m-0 card-text"><a href="mailto:<?= $order['email']; ?>" class="text-dark"><?= $order['email']; ?></a></p>
                                                            <p class="m-0 card-text"><a href="tel:<?= $order['phone']; ?>" class="text-dark">+(855) <?= $order['phone']; ?></a></p>
                                                            <p class="m-0 card-text fw-bold">$<?= number_format($order['totalPrice'],2); ?></p>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              <?php
                         }
                    }
                    
               }
               else{
                    ?>
                         <div class="text-center text-capitalize py-5">
                              <h3>No Product Item has been ordered</h3>
                              <a href="/shop" class="btn btn-sm btn-success py-2 px-3 fw-bold"><i class="fa-solid fa-circle-arrow-left me-2"></i>Shop Now</a>
                         </div>
                   
                    <?php
               }
          
          ?>
     </div>
          
          
          
          
     
</div>
<!-- End of List of Order Item Box -->


<!-- Logo Carousel Section -->
<?php require 'components/Frontend/logo-carousel.php'; ?>

<!-- Copyrights Section -->
<?php require 'components/Frontend/copyrights.php'; ?>