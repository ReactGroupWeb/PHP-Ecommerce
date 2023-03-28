<!-- Menu NavBar Section -->
<?php require 'components/Frontend/menu-navbar.php'; ?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
     <div class="container">
          <div class="row">
               <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                         <p>Fresh and Organic</p>
                         <h1>Shop</h1>
                    </div>
               </div>
          </div>
     </div>
</div>
<!-- end breadcrumb section -->

<!-- products -->
<div class="product-section mt-150 mb-150">
     <div class="container">

          <?php
               $heading = "Product";

               $get_products = new dbClass();

               $table_product = "tb_product p";
               $table_category = "tb_category c";
               
               $field = "p.pd_id, p.cg_id, p.pd_name, p.pd_image, p.pd_regularPrice, p.pd_salePrice, p.pd_dateCreated, c.cg_name AS category_name";
               $condition = "";
               $order = "ORDER BY p.pd_dateCreated DESC limit 16";

               $join_condition = "c.cg_id = p.cg_id";
               $table_join = $table_product . " INNER JOIN " . $table_category . " ON " . $join_condition;

               $products = $get_products->dbSelect($table_join, $field, $condition, $order);

          
               ?>
                    <div class="row">
                         <div class="col-md-12">
                              <div class="product-filters">
                                   <ul>
                                        <li class="active" data-filter="*">All</li>
                                        <?php
                                             $displayed_category = []; // track the display of categories
                                             $used_categories = []; 
                                             foreach($products as $product_category){
                                                  $category_name = strtolower($product_category['category_name']);

                                                  // display the category name when it is the first time
                                                  if(!in_array($category_name, $displayed_category)){
                                                       array_push($displayed_category, $category_name);
                                                       ?>
                                                            <li data-filter=".<?php echo $category_name; ?>">
                                                                 <?php echo $product_category['category_name']?>
                                                            </li>
                                                       <?php
                                                  }
                                             }
                                        ?>
                                   </ul>
                              </div>
                         </div>
                    </div>

               <?php

               ?>
                    <div class="row product-lists">
                         <?php
                              foreach($products as $product){
                                   ?>
                                        <div class="col-lg-3 col-md-6 text-center <?php echo strtolower($product['category_name']) ?>">
                                             <div class="single-product-item">
                                                  <div class="product-image">
                                                       <a href="/shop/product-detail?productid=<?php echo $product['pd_id']; ?>">
                                                            <img src="../assets/images/<?= strtolower($heading) ?>/<?= $product['pd_image'] ?>">
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
                         ?>
                    </div>

               <?php
          
          ?>

          <div class="row">
               <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                         <ul>
                              <li><a href="#">Prev</a></li>
                              <li><a href="#">1</a></li>
                              <li><a class="active" href="#">2</a></li>
                              <li><a href="#">3</a></li>
                              <li><a href="#">Next</a></li>
                         </ul>
                    </div>
               </div>
          </div>
     </div>
</div>
<!-- end products -->

<!-- Logo Carousel Section -->
<?php require 'components/Frontend/logo-carousel.php'; ?>

<!-- Copyrights Section -->
<?php require 'components/Frontend/copyrights.php'; ?>