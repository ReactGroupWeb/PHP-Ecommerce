<?php
include "./DB/dbConnection.php";
include "./DB/dbClass.php";

$heading = "Order";
$tb = "tb_order";
$getOD = new dbClass();
$order = $getOD->dbSelectOne($tb, "*", "od_id=" . $_GET['od_id']);
$getOD_Product = new dbClass();
$orderProducts = $getOD_Product->dbSelect("tb_orderdetail", "*", "od_id=" . $_GET['od_id']);
$transaction = $getOD_Product->dbSelectOne("tb_transaction", "*", "od_id=" . $_GET['od_id'])
?>

<div class="col-lg-12 grid-margin stretch-card">
     <div class="card">
          <div class="card-body">
               <div class="row">
                    <div class="col-6">
                         <h3 class="page-title">
                              <?= $heading; ?> Detail
                         </h3>
                    </div>
                    <div class="col-6 mb-3">
                         <a href="/admin_order" class="btn btn-success btn-sm float-end py-2"><i
                                   class="fas fa-arrow-left me-2"></i>Back</a>
                    </div>
                    <div class="col-md-4">
                         <div class="row">
                              <div class="col-12 mb-3 rounded bg-secondary text-dark p-0">
                                   <div class="card bg-secondary">
                                        <div class="card-header text-uppercase">
                                             <?= $heading; ?> Details
                                        </div>
                                        <div class="card-body">
                                             <table class="table table-dark p-0">
                                                  <tbody>
                                                       <tr>
                                                            <th>
                                                                 <?= $heading; ?> ID
                                                            </th>
                                                            <td>
                                                                 <?= $order['od_id'] ?>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <th>
                                                                 <?= $heading; ?> Date
                                                            </th>
                                                            <td>
                                                                 <?= date_format(DateTime::createFromFormat('Y-m-d H:i:s', $order['dateOrdered']),"D d F Y | g:i A");?>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <th>Status</th>
                                                            <td>
                                                                 <?php
                                                                      if($order['status'] == 'ordered'){
                                                                           echo "Ordered";
                                                                      }
                                                                      else if($order['status'] == 'delivering'){
                                                                           echo "Delivering";
                                                                      }
                                                                      else if($order['status'] == 'delivered'){
                                                                           echo "Delivered";
                                                                      }
                                                                 ?>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <th>Delivered Date</th>
                                                            <td>
                                                                 <?= ($order['dateDelivered'] == NULL || $order['dateDelivered'] == "0000-00-00 00:00:00") ?
                                                                      "Not yet Deliver" : date_format(DateTime::createFromFormat('Y-m-d H:i:s', $order['dateDelivered']),"D d F Y | g:i A") ?>
                                                                      
                                                            </td>
                                                       </tr>
                                                  </tbody>
                                             </table>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-12 mb-3 rounded bg-secondary text-dark p-0">
                                   <div class="card bg-secondary">
                                        <div class="card-header">TRANSACTION</div>
                                        <div class="card-body">
                                             <table class="table table-dark p-0">
                                                  <tbody>
                                                       <tr>
                                                            <th>Transaction Mode</th>
                                                            <td>
                                                                 <?= $transaction['tmode'] == 'cash_on_delivery' ? "Cash On Delivery" : "Credit Card" ?>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <th>Transaction Status</th>
                                                            <td>
                                                                 <?= $transaction['tstatus'] == 'pending' ? "Pending" : "Approved" ?>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <th>Transaction Date</th>
                                                            <td>
                                                                 <?php
                                                                      if(!empty($transaction['tstatus'])){
                                                                           if($transaction['tstatus'] == 'pending' || $transaction['tstatus'] == 'approved'){
                                                                                ?>
                                                                                     <?= date_format(DateTime::createFromFormat('Y-m-d H:i:s', $transaction['created_at']),"D d F Y | g:i A") ?>
                                                                                     
                                                                                <?php
                                                                           }
                                                                           else{
                                                                                echo "Not Paid";
                                                                           }
                                                                      }
                                                                 ?>
                                                            </td>
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
                                        <div class="card-header">PRODUCT ITEMS</div>
                                        <div class="card-body">
                                             <div class="row mb-3">
                                                  <div class="text-center mx-auto my-auto justify-content-center">
                                                       <div id="recipeCarousel" class="carousel slide"
                                                            data-bs-ride="carousel">
                                                            <div class="carousel-inner" role="listbox">
                                                                 <?php
                                                                 if ($orderProducts) {
                                                                      $i = 1;
                                                                      foreach ($orderProducts as $orderProduct) { 
                                                                           $productItem = $getOD_Product->dbSelectOne("tb_product", "pd_name, pd_image, pd_salePrice, pd_regularPrice", "pd_id=" . $orderProduct['pd_id'])?>
                                                                           <div class="carousel-item active">
                                                                                <div class="col-md-6">
                                                                                     <div class="card bg-light">
                                                                                          <div class="row g-0">
                                                                                               <div
                                                                                                    class="col-md-5 my-auto card-img">
                                                                                                    <img src="./assets/images/product/<?= $productItem['pd_image'] ?>"
                                                                                                         width="150"
                                                                                                         class="img-fluid">
                                                                                               </div>
                                                                                               <div class="col-md-7">
                                                                                                    <div class="card-body">
                                                                                                         <h5
                                                                                                              class="card-title text-dark">
                                                                                                              <?= $productItem['pd_name']?></h5>
                                                                                                         <p class="card-text">
                                                                                                              Quantity:
                                                                                                              <?= $orderProduct['quantity'] ?>
                                                                                                         </p>
                                                                                                         <p class="card-text">
                                                                                                              Price: $<?= number_format($productItem['pd_salePrice'],2 ) ==0 ? number_format($productItem['pd_regularPrice'],2) : number_format($productItem['pd_salePrice'],2 ) ?>
                                                                                                         </p>
                                                                                                    </div>
                                                                                               </div>
                                                                                          </div>
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                           <?php
                                                                           $i++;
                                                                      }
                                                                 } ?>
                                                            </div>
                                                            <a class="carousel-control-prev bg-transparent w-aut"
                                                                 href="#recipeCarousel" role="button"
                                                                 data-bs-slide="prev">
                                                                 <span class="carousel-control-prev-icon"
                                                                      aria-hidden="true"></span>
                                                            </a>
                                                            <a class="carousel-control-next bg-transparent w-aut"
                                                                 href="#recipeCarousel" role="button"
                                                                 data-bs-slide="next">
                                                                 <span class="carousel-control-next-icon"
                                                                      aria-hidden="true"></span>
                                                            </a>
                                                       </div>
                                                  </div>
                                             </div>
                                             <table class="table table-dark p-0">
                                                  <tbody>
                                                       <tr>
                                                            <td>SubTotal</td>
                                                            <th class="text-end">$
                                                                 $<?= number_format($order['subTotal'], 2) ?>
                                                            </th>
                                                       </tr>
                                                       <tr>
                                                            <td>Tax</td>
                                                            <th class="text-end">$
                                                                 $<?= number_format($order['subTotal'], 2) ?>
                                                            </th>
                                                       </tr>
                                                       <tr>
                                                            <td>Shipping</td>
                                                            <th class="text-end">Free Shipping
                                                            </th>
                                                       </tr>
                                                       <tr>
                                                            <td>Total</td>
                                                            <th class="text-end">
                                                                 $<?= number_format($order['totalPrice'], 2) ?>
                                                            </th>
                                                       </tr>
                                                  </tbody>
                                             </table>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-12 mb-3 rounded bg-secondary text-dark p-0">
                                   <div class="card bg-secondary">
                                        <div class="card-header">BILLING DETAILS</div>
                                        <div class="card-body">
                                             <table class="table table-dark p-0">
                                                  <tbody>
                                                       <tr>
                                                            <th>Name</th>
                                                            <td>
                                                                 <?= $order['firstname'] . " " . $order['lastname'] ?>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <th>Email</th>
                                                            <td>
                                                                 <?= $order['email'] ?>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <th>Phone</th>
                                                            <td>
                                                                 <?= $order['phone'] ?>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <th>Shipping Address</th>
                                                            <td>
                                                                 <?= $order['shippingAddress'] ?>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <th>City/Province</th>
                                                            <td>
                                                                 <?= $order['city'] ?>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <th>Country</th>
                                                            <td>
                                                                 <?= $order['country'] ?>
                                                            </td>
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
<script>
     let items = document.querySelectorAll('.carousel .carousel-item')

     items.forEach((el) => {
          const minPerSlide = 2
          let next = el.nextElementSibling
          for (var i = 1; i < minPerSlide; i++) {
               if (!next) {
                    // wrap carousel by using first child
                    next = items[0]
               }
               let cloneChild = next.cloneNode(true)
               el.appendChild(cloneChild.children[0])
               next = next.nextElementSibling
          }
     })
</script>