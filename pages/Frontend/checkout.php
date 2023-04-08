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
          <div class="row">
               <div class="col-lg-8">
                    <div class="checkout-accordion-wrap">
                         <div class="accordion" id="accordionExample">
                              <div class="card single-accordion">
                                   <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                             <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                  Billing Address
                                             </button>
                                        </h5>
                                   </div>

                                   <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                             <div class="billing-address-form">
                                                  <form action="index.html">
                                                       <p><input type="text" placeholder="Name"></p>
                                                       <p><input type="email" placeholder="Email"></p>
                                                       <p><input type="text" placeholder="Address"></p>
                                                       <p><input type="tel" placeholder="Phone"></p>
                                                       <p><textarea name="bill" id="bill" cols="30" rows="10" placeholder="Say Something"></textarea></p>
                                                  </form>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="card single-accordion">
                                   <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                             <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                  Shipping Address
                                             </button>
                                        </h5>
                                   </div>
                                   <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                             <div class="shipping-address-form">
                                             <p>Your shipping address form is here.</p>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="card single-accordion">
                                   <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                             <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                  Card Details
                                             </button>
                                        </h5>
                                   </div>
                                   <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                             <div class="card-details">
                                                  <p>Your card details goes here.</p>
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
                                        $get_cart_items = new dbClass();

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

                                        $cart_tiems = $get_cart_items->dbSelect($table_join, $field, $condition, $order);     
                                        $subtotal = 0;
                                        $taxPrice = 0;
                                        $totalPrice = 0;

                                        foreach($cart_tiems as $cItem){
                                             ?>
                                                  <tr>
                                                       <td><?= $cItem['pd_name'] ?></td>
                                                       <td>
                                                            $<?php
                                                                 echo $cItem['pd_salePrice']  ? number_format($cItem['pd_salePrice'], 2)  : number_format($cItem['pd_regularPrice'], 2);
                                                            ?>
                                                       </td>
                                                       <td><?= $cItem['quantity'] ?></td>
                                                       <?php
                                                            $totalPrice = 0;
                                                            $price = $cItem['quantity']  * ($cItem['pd_salePrice']  ? $cItem['pd_salePrice']  : $cItem['pd_regularPrice'] );
                                                            $totalPrice += $price;
                                                       ?>

                                                       <td>$<?= number_format($totalPrice, 2); ?></td>
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
                                   </tr>
                                   <tr>
                                        <td colspan="3">Tax (VAT 10%)</td>
                                        <td>$<?= number_format($taxPrice, 2); ?></td>
                                   </tr>
                                   <tr>
                                        <td colspan="3">Total</td>
                                        <td>$<?= number_format($totalPrice, 2); ?></td>
                                   </tr>
                              </tbody>
                         </table>
                         <a href="#" class="boxed-btn">Place Order</a>
                    </div>
               </div>
          </div>
     </div>
</div>
<!-- end check out section -->

<!-- Logo Carousel Section -->
<?php require 'components/Frontend/logo-carousel.php'; ?>

<!-- Copyrights Section -->
<?php require 'components/Frontend/copyrights.php'; ?>