<div class="product-section mt-150 mb-150">
     <div class="container">
          <div class="row">
               <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">	
                         <h3><span class="orange-text">New Arrival</span> Products</h3>
                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
                    </div>
               </div>
          </div>

          <div class="row new-arrival-product">

               <?php
                    $heading = "Product";
                    $get_products = new dbClass();
                    $table = "tb_product";
                    $field = "*";
                    $condition = "pd_countInStock !=0";
                    $order = "ORDER BY pd_dateCreated DESC limit 8";

                    $products = $get_products->dbSelect($table, $field, $condition, $order);

                    if($products){
                         foreach($products as $product){
                              ?>
                                   <div class="col-12 text-center">
                                        <div class="single-product-item">
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
                                        
                                             <a href="/shopping-cart" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
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