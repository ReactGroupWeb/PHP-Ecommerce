<!-- Menu NavBar Section -->
<?php require 'components/Frontend/menu-navbar.php'; ?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
     <div class="container">
          <div class="row">
               <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                         <p>Fresh and Organic</p>
                         <h1>Cart</h1>
                    </div>
               </div>
          </div>
     </div>
</div>
<!-- end breadcrumb section -->

<!-- cart -->
<div class="cart-section mt-150 mb-150">
     <div class="container">
          <div class="row">
               <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                         <table class="cart-table">
                              <thead class="cart-table-head">
                                   <tr class="table-head-row">
                                        <th></th>
                                        <th>Product Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php
                                        $heading = "Product";
                                        $get_cart_items = new dbClass();

                                        $table_shopping_cart = "tb_shopping_cart as sc";
                                        $table_product = "tb_product as p";

                                        $field = "sc.id, sc.quantity, sc.created_at, p.pd_name, p.pd_image, p.pd_regularPrice, p.pd_salePrice";

                                        $condition = "";
                                        if(isset($_SESSION['us_id'])){
                                             $user_id = $_SESSION['us_id'];
                                             $condition = "sc.user_id = $user_id AND sc.instance = 'cart'";
                                        }

                                        $order = "ORDER BY sc.created_at DESC";

                                        $join_condition = "p.pd_id = sc.product_id";
                                        $table_join = $table_shopping_cart . " INNER JOIN " . $table_product . " ON " . $join_condition;

                                        $cart_tiems = $get_cart_items->dbSelect($table_join, $field, $condition, $order);     
                                        
                                        if(!empty($cart_tiems)){
                                             foreach($cart_tiems as $cItem){
                                                  ?>
                                                       <tr class="table-body-row">
                                                            <td> <a href="#" class="text-dark"><i class="far fa-window-close"></i></a> </td>
                                                            <td><img src="../assets/images/<?= strtolower($heading) ?>/<?= $cItem['pd_image'] ?>" width="35"></td>
                                                            <td><?= $cItem['pd_name'] ?></td>
                                                            <td>
                                                                 $<?php
                                                                      echo $cItem['pd_salePrice']  ? number_format($cItem['pd_salePrice'], 2)  : number_format($cItem['pd_regularPrice'], 2);
                                                                 ?>
                                                            </td>
                                                            <td><input type="number" placeholder="<?= $cItem['quantity'] ?>"></td>

                                                            <?php
                                                                 $totalPrice = 0;
                                                                 $price = $cItem['quantity']  * ($cItem['pd_salePrice']  ? $cItem['pd_salePrice']  : $cItem['pd_regularPrice'] );
                                                                 $totalPrice += $price;
                                                            ?>

                                                            <td>$<?= number_format($totalPrice, 2); ?></td>
                                                       </tr>
                                                  
                                                  <?php
                                             } 
                                        }
                                        else{
                                             ?>
                                                  <tr class="text-center table-body-row">
                                                       <td colspan="6">
                                                            <h3>No Cart Item Have Been Added</h3>
                                                            <a href="/shop" class="btn btn-success btn-sm text-center px-3 py-2 fw-bold"><i class="fa-solid fa-circle-arrow-left me-2"></i>Shop Now</a>
                                                       </td>
                                                       
                                                  </tr>
                                             <?php
                                        }
                                        
                                   
                                   ?>
                                   
                                   
                              </tbody>
                         </table>
                    </div>
               </div>

               <div class="col-lg-4">
                    <div class="total-section">
                         <table class="total-table">
                              <thead class="total-table-head">
                                   <tr class="table-total-row">
                                        <th>Total</th>
                                        <th>Price</th>
                                   </tr>
                              </thead>
                              <tbody>

                                   <?php
                                        if(!empty($cart_tiems)){
                                             foreach($cart_tiems as $cItem){
                                                  ?>
                                                       <tr class="total-data">
                                                            <td><strong>Subtotal: </strong></td>
                                                            <td>$500</td>
                                                       </tr>
                                                       <tr class="total-data">
                                                            <td><strong>Shipping: </strong></td>
                                                            <td>$45</td>
                                                       </tr>
                                                       <tr class="total-data">
                                                            <td><strong>Total: </strong></td>
                                                            <td>$545</td>
                                                       </tr>
                                                  
                                                  <?php
                                             } 
                                        }
                                        else{
                                             ?>
                                                  <tr class="text-center table-body-row">
                                                       <td colspan="6" class="py-5">
                                                            <h4>No Cart Item Have Been Added</h4>
                                                            <a href="/shop" class="btn btn-success btn-sm text-center px-3 py-2 fw-bold"><i class="fa-solid fa-circle-arrow-left me-2"></i>Shop Now</a>
                                                       </td>
                                                       
                                                  </tr>
                                             <?php
                                        }
                                        
                                   
                                   ?>
                                   
                                  

                                   
                              </tbody>
                         </table>
                         <div class="cart-buttons">
                              <a href="/cart" class="boxed-btn">Update Cart</a>
                              <a href="/checkout" class="boxed-btn black">Check Out</a>
                         </div>
                    </div>

                    <div class="coupon-section">
                         <h3>Apply Coupon</h3>
                         <div class="coupon-form-wrap">
                              <form action="index.html">
                                   <p><input type="text" placeholder="Coupon"></p>
                                   <p><input type="submit" value="Apply"></p>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
<!-- end cart -->

<!-- Logo Carousel Section -->
<?php require 'components/Frontend/logo-carousel.php'; ?>

<!-- Copyrights Section -->
<?php require 'components/Frontend/copyrights.php'; ?>