<div class="product-section mt-150">
     <div class="container">
          <div class="row">
               <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">	
                         <h3><span class="orange-text">Our</span> Products</h3>
                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
                    </div>
               </div>
          </div>

          <div class="row">

               <?php
                    $heading = "Product";
                    $get_products = new dbClass();
                    $table = "tb_product";
                    $field = "*";
                    $condition = "pd_countInStock !=0";
                    $order = "ORDER BY pd_dateCreated ASC limit 8";

                    $products = $get_products->dbSelect($table, $field, $condition, $order);

                    if($products){
                         foreach($products as $product){
                              ?>
                                   <div class="col-lg-3 col-md-6 text-center">
                                        <div class="single-product-item">
                                             <?php
                                                  if($product['pd_salePrice'] == 0){
                                                       ?>
                                                            <button class="float-start btn-badge-new">new</button>
                                                       <?php
                                                  }
                                                  else{
                                                       ?>
                                                            <button class="float-start btn-badge-sale">sale</button>
                                                       <?php
                                                  }
                                             ?>
                                             <div class="product-image">
                                                  <a href="/shop/product-detail?productid=<?php echo $product['pd_id']; ?>">
                                                       <img src="./assets/images/<?= strtolower($heading) ?>/<?= $product['pd_image'] ?>">
                                                  </a>
                                             </div>
                                             <h3><?php echo $product['pd_name']; ?></h3>
                                             <?php
                                                  if(!empty($product['pd_salePrice'])){
                                                       ?>
                                                            <p class="product-price my-0"><span>Per Kg</span></p>
                                                            <p class="d-flex justify-content-center fw-bold sale-price"> <?php echo number_format($product['pd_salePrice'], 2); ?>$ 
                                                                 <span class="text-decoration-line-through ms-3 text-secondary"><?php echo number_format($product['pd_regularPrice'], 2); ?>$</span> 
                                                            </p>
                                                       <?php
                                                  }
                                                  else if($product['pd_salePrice'] == 0){
                                                       ?>
                                                            <p class="product-price"><span>Per Kg</span> <?php echo number_format($product['pd_regularPrice'], 2); ?>$ </p>
                                                       <?php
                                                  }
                                             ?>

                                             <form action="../../../DB/frontend/add-to-cart.php" method="POST">
                                                  <?php if(isset($_SESSION['us_id'])){ $user_id = $_SESSION['us_id']; } ?>
                                                  <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                                  <input type="hidden" name="product_id" value="<?php echo $product['pd_id']; ?>">
                                                  <input type="hidden" name="instance" value="cart">
                                                  <input type="hidden" name="quantity" value="1">

                                                  <button type="submit" name="add-to-cart" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                                             </form> 
                                             

                                        </div>
                                   </div>
                              <?php

                         }
                    }
                    else{
                         ?>
                              <h3>No Product in the storage</h3>
                         <?php
                    }
               ?>
          </div>
     </div>
</div>