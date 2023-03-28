<!-- Menu NavBar Section -->
<?php require 'components/Frontend/menu-navbar.php'; ?>

<?php
     if(isset($_GET['productid']) && !empty($_GET['productid'])){

          $heading = "Product";
          $product_id = $_GET['productid'];

          $get_product = new dbClass();

          // Fetch a Single Product Data for Product Detail Page
          $table_product = "tb_product p";
          $table_category = "tb_category c";
          
          $field = "p.pd_id, p.cg_id, p.pd_name, p.pd_description, p.pd_image, p.pd_regularPrice, p.pd_salePrice, p.pd_sku, p.pd_countInStock, c.cg_name AS category_name";
          $condition = "p.pd_id = $product_id";
          $order = "";
     
          $join_condition = "c.cg_id = p.cg_id";
          $table_join = $table_product . " INNER JOIN " . $table_category . " ON " . $join_condition;
          $product = $get_product->dbSelectOne($table_join, $field, $condition, $order);


          // Related Product
          $condition_related_product = "p.cg_id = {$product['cg_id']} AND p.pd_countInStock !=0";
          $group_by_category = "GROUP BY {$product['cg_id']} ORDER BY cg_id ASC limit 8";
          $related_products = $get_product->dbSelect($table_join, $field, $condition_related_product, $group_by_category);

          ?>

               <!-- breadcrumb-section -->
               <div class="breadcrumb-section breadcrumb-bg">
                    <div class="container">
                         <div class="row">
                              <div class="col-lg-8 offset-lg-2 text-center">
                                   <div class="breadcrumb-text">
                                        <p>See more Details</p>
                                        <h1><?php echo $product['pd_name']; ?></h1>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
               <!-- end breadcrumb section -->

               <!-- single product -->
               <div class="single-product mt-150 mb-150">
                    <div class="container">
                         <div class="row">
                              <div class="col-md-5">
                                   <div class="single-product-img">
                                        <img src="../assets/images/<?= strtolower($heading) ?>/<?= $product['pd_image'] ?>">
                                   </div> 
                              </div>
                              <div class="col-md-7">
                                   <div class="single-product-content">
                                        <h3><?php echo $product['pd_name']; ?></h3>
                                        <?php
                                             if(!empty($product['pd_salePrice'])){
                                                  ?>
                                                       <p class="single-product-pricing my-0"><span>Per Kg</span></p>
                                                       <p class="d-flex justify-content-start fw-bold sale-price"> <?php echo number_format($product['pd_salePrice'], 2); ?>$ 
                                                            <span class="text-decoration-line-through ms-3 text-secondary"><?php echo number_format($product['pd_regularPrice'], 2); ?>$</span> 
                                                       </p>
                                                  <?php
                                             }
                                             else if($product['pd_salePrice'] == 0){
                                                  ?>
                                                       <p class="product-price regular-price"><span>Per Kg</span> <?php echo number_format($product['pd_regularPrice'], 2); ?>$ </p>
                                                  <?php
                                             }
                                        ?>
                                        <p><?php echo $product['pd_description']; ?></p>
                                        <div class="single-product-form">
                                             <form action="index.html">
                                                  <input type="number" placeholder="0">
                                             </form>
                                             <a href="/shopping-cart" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                             <p><strong>SKU: </strong><?php echo $product['pd_sku']; ?></p>
                                             <p><strong>Categories: </strong><?php echo $product['category_name']; ?></p>
                                        </div>
                                        <h4>Share:</h4>
                                        <ul class="product-share">
                                             <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                             <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                             <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                                             <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                                        </ul>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
               <!-- end single product -->

               <!-- Related Products -->
               <div class="more-products mb-150">
                    <div class="container">
                         <div class="row">
                              <div class="col-lg-8 offset-lg-2 text-center">
                                   <div class="section-title">	
                                        <h3><span class="orange-text">Related</span> Products</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
                                   </div>
                              </div>
                         </div>
                         <div class="row related-product-section">
                              <?php
                                   if($related_products){
                                        foreach($related_products as $related_product){
                                             ?>
                                                  <div class="col-12 text-center">
                                                       <div class="single-product-item">
                                                            <div class="product-image">
                                                                 <a href="/shop/product-detail?productid=<?php echo $related_product['pd_id']; ?>">
                                                                      <img src="../assets/images/<?= strtolower($heading) ?>/<?= $related_product['pd_image'] ?>">
                                                                 </a>
                                                            </div>
                                                            <h3><?php echo $related_product['pd_name']; ?></h3>
                                                            <?php
                                                                 if(!empty($related_product['pd_salePrice'])){
                                                                      ?>
                                                                           <p class="product-price my-0"><span>Per Kg</span></p>
                                                                           <p class="d-flex justify-content-center fw-bold sale-price"> <?php echo number_format($related_product['pd_salePrice'], 2); ?>$ 
                                                                                <span class="text-decoration-line-through ms-3 text-secondary"><?php echo number_format($related_product['pd_regularPrice'], 2); ?>$</span> 
                                                                           </p>
                                                                      <?php
                                                                 }
                                                                 else if($related_product['pd_salePrice'] == 0){
                                                                      ?>
                                                                           <p class="product-price"><span>Per Kg</span> <?php echo number_format($related_product['pd_regularPrice'], 2); ?>$ </p>
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
                                             <h3 class="text-center text-danger text-uppercase">No Category related with these Product</h3>
                                        <?php
                                   }
                                        
                              ?>

                              
                              
                              <!-- <div class="col-lg-4 col-md-6 text-center">
                                   <div class="single-product-item">
                                        <div class="product-image">
                                             <a href="/shop/product-detail"><img src="../../assets/frontend/img/products/product-img-2.jpg" alt=""></a>
                                        </div>
                                        <h3>Berry</h3>
                                        <p class="product-price"><span>Per Kg</span> 70$ </p>
                                        <a href="/shopping-cart" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                   </div>
                              </div>
                              <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 text-center">
                                   <div class="single-product-item">
                                        <div class="product-image">
                                             <a href="/shop/product-detail"><img src="../../assets/frontend/img/products/product-img-3.jpg" alt=""></a>
                                        </div>
                                        <h3>Lemon</h3>
                                        <p class="product-price"><span>Per Kg</span> 35$ </p>
                                        <a href="/shopping-cart" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                   </div>
                              </div>
                          -->
                         </div>
                    </div>
               </div>
               <!-- end Related Products -->
          <?php
     }
?>

<!-- Logo Carousel Section -->
<?php require 'components/Frontend/logo-carousel.php'; ?>

<!-- Copyrights Section -->
<?php require 'components/Frontend/copyrights.php'; ?>