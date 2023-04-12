<!-- Menu NavBar Section -->
<?php require 'components/Frontend/menu-navbar.php'; ?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
     <div class="container">
          <div class="row">
               <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                         <p>Fresh and Organic</p>
                         <h1>Check Out Product</h1>
                    </div>
               </div>
          </div>
     </div>
</div>
<!-- end breadcrumb section -->

<!-- check out section -->
<div class="checkout-section mt-150 mb-150">
     <div class="container">
          <form action="../../DB/frontend/checkout.php" method="POST"> 

               <?php
                    $dbClass = new dbClass();

                    $table_shopping_cart = "tb_shopping_cart as sc";
                    $table_product = "tb_product as p";

                    $field = "sc.id, sc.product_id, sc.quantity, sc.created_at, p.pd_name, p.pd_image, p.pd_regularPrice, p.pd_salePrice";

                    $condition = "";
                    if(isset($_SESSION['us_id'])){
                         $user_id = $_SESSION['us_id'];
                         $condition = "sc.user_id = $user_id AND sc.instance = 'cart'";
                    }

                    $order = "ORDER BY sc.created_at DESC";

                    $join_condition = "p.pd_id = sc.product_id";
                    $table_join = $table_shopping_cart . " INNER JOIN " . $table_product . " ON " . $join_condition;

                    $cart_tiems = $dbClass->dbSelect($table_join, $field, $condition, $order);     
                    $subtotal = 0;
                    $taxPrice = 0;
                    $totalPrice = 0;


                    $table_order = "tb_order";
                    $order_id = $dbClass->dbSelectLastInsertID($table_order);
               ?>
               
          
               <div class="row">

                    <?php
                         if(!empty($cart_tiems)){
                              ?>
                              
                              
                                   <div class="col-lg-8">
                                        <div class="checkout-accordion-wrap">
                                             <div class="accordion" id="accordionExample">
                                                  <div class="card single-accordion">
                                                       <div class="card-header" id="headingOne">
                                                            <h5 class="mb-0">
                                                                 <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                      Billing Address
                                                                 </button>
                                                            </h5>
                                                       </div>

                                                       <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                            <div class="card-body">
                                                                 <div class="billing-address-form">

                                                                      <input type="hidden" name="us_id" value="<?= $user_id; ?>">
                                                                      <input type="hidden" name="od_id" value="<?= $order_id + 1; ?>" class="form-control">
                                                                      <div class="row">
                                                                           <div class="col-6">
                                                                                <input type="text" name="firstname" class="form-control py-3 mb-3" required placeholder="First Name">
                                                                           </div>
                                                                           <div class="col-6">
                                                                                <input type="text" name="lastname" class="form-control py-3 mb-3" required placeholder="Last Name">
                                                                           </div>
                                                                      </div>
                                             
                                                                      <input type="email" name="email" class="form-control py-3 mb-3" required placeholder="Email">
                                                                      <input type="tel" name="phone" class="form-control py-3 mb-3" required placeholder="Phone">

                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>
                                                  <div class="card single-accordion">
                                                       <div class="card-header" id="headingTwo">
                                                            <h5 class="mb-0">
                                                                 <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                      Shipping Address
                                                                 </button>
                                                            </h5>
                                                       </div>
                                                       <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                            <div class="card-body">
                                                                 <div class="shipping-address-form">
                                                                      <input type="text" name="city" class="form-control py-3 mb-3" required placeholder="City">
                                                                      <input type="text" name="country" class="form-control py-3 mb-3" required placeholder="Country">
                                                                      <textarea name="shippingAddress" rows="3" class="form-control py-3" style="resize: none" required placeholder="Shipping Address"></textarea>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>
                                                  <div class="card single-accordion">
                                                       <div class="card-header" id="headingThree">
                                                            <h5 class="mb-0">
                                                                 <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                      Payment Methods
                                                                 </button>
                                                            </h5>
                                                       </div>
                                                       <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                            <div class="card-body">
                                                                 <div class="card-details">
                                                                 <div class="summary summary-checkout">
               
                                                                      <div class="summary-item payment-method w-100">
                                                                           <div class="wrap-address-billing">

                                                                                <div class="row">
                                                                                     <div class="col-6 mb-3">
                                                                                          <label class="mb-2 fw-bold text-capitalize" for="card-no">Card Number</label>
                                                                                          <input type="text" name="card-no" class="form-control py-2" placeholder="Card Number" >
                                                                                     </div>

                                                                                     <div class="col-6 mb-3">
                                                                                          <label class="mb-2 fw-bold text-capitalize" for="expiry-month">Expiry Month</label>
                                                                                          <input type="text" name="expiry-month" class="form-control py-2" placeholder="MM">
                                                                                     </div>

                                                                                     <div class="col-6 mb-3">
                                                                                          <label class="mb-2 fw-bold text-capitalize" for="expiry-year">Expiry Year</label>
                                                                                          <input type="text" name="expiry-year" class="form-control py-2" placeholder="YYYY">
                                                                                     </div>

                                                                                     <div class="col-6 mb-3">
                                                                                          <label class="mb-2 fw-bold text-capitalize" for="cvc">CVC</label>
                                                                                          <input type="password" name="cvc" class="form-control py-2" placeholder="CVC">
                                                                                     </div>
                                                                                </div>

                                                                           </div> 
                                             
                                                                           <div class="choose-payment-methods mt-3">

                                                                                <label class="payment-method w-100 mb-3">

                                                                                     <input type="radio" name="payment-method" value="cash_on_delivery" class="payment-method-bank" id="payment-method-bank">
                                                                                     <span class="fw-bold">Cash On Delivery</span>
                                                                                     <p class="payment-desc">Order Now Pay On Delivery</p>
                                                                                </label>
                                                                                <label class="payment-method w-100 mb-3">
                                                                                     <input type="radio" name="payment-method" value="card" class="payment-method-visa" id="payment-method-visa">
                                                                                     <span class="fw-bold">Debit / Credit Card</span>
                                                                                     <p class="payment-desc">There are many variations of passages of Lorem Ipsum available</p>
                                                                                </label>
                                                                                <!-- <label class="payment-method w-100 mb-3">
                                                                                     <input type="radio" name="payment-method" value="paypal" class="payment-method-paypal" id="payment-method-paypal">
                                                                                     <span class="fw-bold">Paypal</span>
                                                                                     <p class="payment-desc">You can pay with your credit card if you don't have a paypal account</p>
                                                                                </label> -->
                                                                           
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

                                   <div class="col-lg-4">
                                        <div class="order-details-wrap">
                                             <table class="order-details">
                                                  <thead>
                                                       <tr>
                                                            <th>Your order Details</th>
                                                            <th>Unit Price</th>
                                                            <th>Qty</th>
                                                            <th>Total</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody class="order-details-body">
                                                       <?php
                                                  
                                                            foreach($cart_tiems as $cItem){
                                                                 ?>
                                                                      <tr>
                                                                           <td><?= $cItem['pd_name'] ?></td>
                                                                           <td class="text-center">
                                                                                $<?php
                                                                                     echo $cItem['pd_salePrice']  ? number_format($cItem['pd_salePrice'], 2)  : number_format($cItem['pd_regularPrice'], 2);
                                                                                ?>
                                                                           </td>
                                                                           <td class="text-center"><?= $cItem['quantity'] ?></td>
                                                                           <?php
                                                                                $totalPrice = 0;
                                                                                $price = $cItem['quantity']  * ($cItem['pd_salePrice']  ? $cItem['pd_salePrice']  : $cItem['pd_regularPrice'] );
                                                                                $totalPrice += $price;
                                                                           ?>

                                                                           <td class="text-center">$<?= number_format($totalPrice, 2); ?></td>
                                                                      </tr>
                                                                      <tr>
                                                                           <input type="hidden" name="pd_id" value="<?= $cItem['product_id'];?>">
                                                                           <input type="hidden" name="quantity" value="<?= $cItem['quantity'];?>">
                                                                      </tr>
                                                                 <?php

                                                                 $subtotal +=  $cItem['quantity']  * ($cItem['pd_salePrice']  ? $cItem['pd_salePrice']  : $cItem['pd_regularPrice'] );
                                                                 $taxPrice = $subtotal * 0.1;
                                                                 $totalPrice = $subtotal + $taxPrice;

                                                            }
                                                            
                                                       ?>
                                                       
                                                  </tbody>
                                                  <tbody class="checkout-details fw-bold">
                                                       <tr>
                                                            <td colspan="3">Subtotal</td>
                                                            <td>$<?= number_format($subtotal, 2); ?></td>
                                                            <input type="hidden" name="subTotal" value="<?= $subtotal; ?>">
                                                       </tr>
                                                       <tr>
                                                            <td colspan="3">Tax (VAT 10%)</td>
                                                            <td>$<?= number_format($taxPrice, 2); ?></td>
                                                            <input type="hidden" name="tax" value="<?= $taxPrice; ?>">
                                                       </tr>
                                                       <tr>
                                                            <td colspan="3">Total</td>
                                                            <td>$<?= number_format($totalPrice, 2); ?></td>
                                                            <input type="hidden" name="totalPrice" value="<?= $totalPrice; ?>">
                                                       </tr>
                                                  </tbody>
                                             </table>
                                             <button type="submit" name="place-order" class="boxed-btn">Place Order</button>
                                        </div>
                                   </div>
                              <?php
                         }
                         else{
                              ?>
                                   <div class="text-center">
                                        <h2>No Order Item To Checkout</h2>
                                        <a href="/shop" class="btn btn-success text-center px-3 py-2 fw-bold"><i class="fa-solid fa-circle-arrow-left me-2"></i>Shop Now</a>
                                   </div>
                              <?php
                         }
                    ?>
               </div>
          </form>     
     </div>
</div>
<!-- end check out section -->

<!-- Logo Carousel Section -->
<?php require 'components/Frontend/logo-carousel.php'; ?>

<!-- Copyrights Section -->
<?php require 'components/Frontend/copyrights.php'; ?>
