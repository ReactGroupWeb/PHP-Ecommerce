<!--PreLoader-->
<!-- <div class="loader">
     <div class="loader-inner">
          <div class="circle"></div>
     </div>
</div> -->
<!--PreLoader Ends-->

<!-- header -->
<div class="top-header-area" id="sticker">
     <div class="container">
          <div class="row">
               <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                         <!-- logo -->
                         <div class="site-logo">
                              <?php

                              $heading = "Company";
                              $get_company_logo = new dbClass();
                              $table = "tb_company";
                              $field = "cp_miniLogo";
                              $condition = "";
                              $order = "";

                              $logo = $get_company_logo->dbSelectOne($table, $field, $condition, $order);
                              ?>
                              <a href="/"> <img src="../assets/images/<?= strtolower($heading) ?>/<?= $logo['cp_miniLogo'] ?>"> </a>
                         </div>
                         <!-- logo -->

                         <!-- menu start -->
                         <nav class="main-menu">
                              <ul>
                                   <li><a href="/">Home</a></li>
                                   <li><a href="/shop">Shop</a></li>
                                   <li><a href="/contact-us">Contact US</a></li>
                                   <li><a href="/about-us">About US</a></li>
                                   <li><a href="/news">News</a></li>
                                   <li>
                                        <div class="header-icons">
                                             <?php if (isLogin()) { ?>
                                                  <a class="shopping-cart" href="/shopping-cart"><i class="fas fa-shopping-cart"></i> 
                                                       (
                                                            <?php
                                                                 
                                                                 $get_count = new dbClass();
                                                                 $table = "tb_shopping_cart";
                                                                 $condition = "";
                                                                 if(isset($_SESSION['us_id'])){
                                                                      $user_id = $_SESSION['us_id'];
                                                                      $condition = "user_id = $user_id AND instance = 'cart'";
                                                                 }

                                                                 $cart_item = $get_count->dbCount($table, $condition);
                                                                 echo $cart_item;
                                                            ?>
                                                       )
                                                  </a>
                                                  
                                             <?php } ?>
                                             <a class="mobile-hide search-bar-icon me-2" href="#"><i class="fas fa-search"></i></a>
                                             <a class="user-login">
                                                  <?php
                                                       if(isLogin()){
                                                            if(isset($_SESSION['us_id'])){
                                                                 $user_id = $_SESSION['us_id'];
                                                            }
                                                            $heading = "User";
                                                            $get_user = new dbClass();
                                                            $table = "tb_user";
                                                            $field = "us_id, us_image, us_name";
                                                            $condition = "us_id = $user_id";
                                                            $order = "";

                                                            $user = $get_user->dbSelectOne($table, $field, $condition, $order);
                                                       
                                                            ?>
                                                                 <img  style="background-image: url(../assets/images/<?= strtolower($heading) ?>/<?= $user['us_image'] ?>)" class="profile-menu-bar me-2"> <?= $user['us_name'] ?>
                                                            <?php
                                                       }
                                                       else{
                                                            ?>
                                                                 <i class="fas fa-user"></i>
                                                            <?php
                                                       }
                                                       
                                                       
                                                  ?>
                                                  
                                             </a>
                                             <ul class="sub-menu">
                                                  <?php if (isLogin()) { ?>
                                                       <li><a href="/my-dashboard"><i class="mx-2 fas fa-home"></i>My Dashboard</a></li>
                                                       <li><a href="/my-account"><i class="mx-2 fas fa-user"></i>My Account</a></li>
                                                       <li><a href="../../DB/auth.php?clear=logout"><i class="mx-2 fas fa-door-open"></i>Logout</a></li>
                                                  <?php } ?>
                                                  <?php if (!isLogin()) { ?>
                                                       <li><a href="/login"><i class="mx-2 fas fa-users"></i>Login</a>
                                                       </li>
                                                       <li><a href="/register"><i class="mx-2 fas fa-user"></i>Register</a>
                                                       </li>
                                                  <?php } ?>
                                             </ul>
                                        </div>
                                   </li>
                              </ul>
                         </nav>
                         <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                         <div class="mobile-menu"></div>
                         <!-- menu end -->
                    </div>
               </div>
          </div>
     </div>
</div>
<!-- end header -->

<!-- search area -->
<div class="search-area">
     <div class="container">
          <div class="row">
               <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                         <div class="search-bar-tablecell">
                              <h3>Search For:</h3>
                              <input type="text" placeholder="Keywords">
                              <button type="submit">Search <i class="fas fa-search"></i></button>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
<!-- end search area -->