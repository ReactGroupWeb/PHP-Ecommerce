<!-- Menu NavBar Section -->
<?php require 'components/Frontend/menu-navbar.php'; ?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
     <div class="container">
          <div class="row">
               <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                         <p>We sale fresh fruits</p>
                         <h1>About Us</h1>
                    </div>
               </div>
          </div>
     </div>
</div>
<!-- end breadcrumb section -->

<!-- featured section -->
<div class="feature-bg">
     <div class="container">
          <div class="row">
               <div class="col-lg-7">
                    <div class="featured-text">
                         <h2 class="pb-3">Why <span class="orange-text">Fruitkha</span></h2>
                         <div class="row">
                              <div class="col-lg-6 col-md-6 mb-4 mb-md-5">
                                   <div class="list-box d-flex">
                                        <div class="list-icon">
                                             <i class="fas fa-shipping-fast"></i>
                                        </div>
                                        <div class="content">
                                             <h3>Home Delivery</h3>
                                             <p>sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-lg-6 col-md-6 mb-5 mb-md-5">
                                   <div class="list-box d-flex">
                                        <div class="list-icon">
                                             <i class="fas fa-money-bill-alt"></i>
                                        </div>
                                        <div class="content">
                                             <h3>Best Price</h3>
                                             <p>sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-lg-6 col-md-6 mb-5 mb-md-5">
                                   <div class="list-box d-flex">
                                        <div class="list-icon">
                                             <i class="fas fa-briefcase"></i>
                                        </div>
                                        <div class="content">
                                             <h3>Custom Box</h3>
                                             <p>sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-lg-6 col-md-6">
                                   <div class="list-box d-flex">
                                        <div class="list-icon">
                                             <i class="fas fa-sync-alt"></i>
                                        </div>
                                        <div class="content">
                                             <h3>Quick Refund</h3>
                                             <p>sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
<!-- end featured section -->

<!-- shop banner -->
<section class="shop-banner" style="background-image: url(../../assets/frontend/img/1.jpg);">
     <div class="container">
          <h3>December sale is on! <br> with big <span class="orange-text">Discount...</span></h3>
          <div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div>
          <a href="shop.html" class="cart-btn btn-lg">Shop Now</a>
     </div>
</section>
<!-- end shop banner -->

<!-- team section -->
<div class="mt-150">
     <div class="container">
          <div class="row">
               <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                         <h3>Our <span class="orange-text">Team</span></h3>
                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
                    </div>
               </div>
          </div>
          <div class="row">

               <?php
                    $heading = "User";
                    $get_teams = new dbClass();
                    $table = "tb_user";
                    $field = "*";
                    $condition = "";
                    $order = "ORDER BY us_id DESC";

                    $teams = $get_teams->dbSelect($table, $field, $condition, $order);


                    foreach($teams as $team){
                         ?>
                              <div class="col-lg-3 col-md-6">
                                   <div class="single-team-item">
                                        <div class="team-bg team-bg-1" style="background-image: url(../assets/images/<?= strtolower($heading) ?>/<?= $team['us_image'] ?>)"></div>
                                        <h4>
                                             <?= $team['us_name'] ?> 
                                             <span>
                                                  <?php
                                                       if($team['us_isAdmin'] == 1){
                                                            echo "Admin";
                                                       }
                                                       else{
                                                            echo "User";
                                                       }
                                                  ?>
                                             </span>
                                        </h4>
                                        <ul class="social-link-team">
                                             <li><a href="/"><i class="fab fa-facebook-f"></i></a></li>
                                             <li><a href="/"><i class="fab fa-twitter"></i></a></li>
                                             <li><a href="/"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                   </div>
                              </div>
                         
                         <?php
                    }
               ?>
          </div>
     </div>
</div>
<!-- end team section -->

<!-- Testimonial Section -->
<?php require 'components/Frontend/testimonial.php'; ?>

<!-- Logo Carousel Section -->
<?php require 'components/Frontend/logo-carousel.php'; ?>

<!-- Copyrights Section -->
<?php require 'components/Frontend/copyrights.php'; ?>