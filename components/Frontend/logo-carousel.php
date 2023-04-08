<!-- logo carousel -->
<div class="logo-carousel-section">
     <div class="container">
          <div class="row">
               <div class="col-lg-12">
                    <div class="logo-carousel-inner">
                         <div class="single-logo-item">
                              <img src="../../assets/frontend/img/company-logos/1.png" alt="">
                         </div>
                         <div class="single-logo-item">
                              <img src="../../assets/frontend/img/company-logos/2.png" alt="">
                         </div>
                         <div class="single-logo-item">
                              <img src="../../assets/frontend/img/company-logos/3.png" alt="">
                         </div>
                         <div class="single-logo-item">
                              <img src="../../assets/frontend/img/company-logos/4.png" alt="">
                         </div>
                         <div class="single-logo-item">
                              <img src="../../assets/frontend/img/company-logos/5.png" alt="">
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
<!-- end logo carousel -->

<!-- footer -->
<div class="footer-area">
     <div class="container">
          <div class="row">

               <?php
                    $heading = "Company";
                    $get_company = new dbClass();
                    $table = "tb_company";
                    $field = "*";
                    $condition = "";
                    $order = "";

                    $company = $get_company->dbSelectOne($table, $field, $condition, $order);
              
                    ?>

                         <div class="col-lg-3 col-md-6">
                              <div class="footer-box about-widget">
                                   <h2 class="widget-title">Company</h2>
                                        <a href="/"> <img src="../assets/images/<?= strtolower($heading) ?>/<?= $company['cp_logo'] ?>"> </a>
                              </div>
                         </div>
                         <div class="col-lg-3 col-md-6">
                              <div class="footer-box get-in-touch">
                                   <h2 class="widget-title">Get in Touch</h2>
                                   <ul>
                                        <li><i class="fa-solid fa-location-dot pe-2"></i> <?php echo $company['cp_address'];?></li>
                                        <li><i class="fa-solid fa-phone pe-2"></i><?php echo $company['cp_phone'] ?></li>
                                        <li><i class="fa-solid fa-envelope pe-2"></i><?php echo $company['cp_email'] ?></li>
                                   </ul>
                              </div>
                         </div>
                         <div class="col-lg-3 col-md-6">
                              <div class="footer-box pages">
                                   <h2 class="widget-title">Pages</h2>
                                   <ul>
                                        <li><a href="/">Home</a></li>
                                        <li><a href="/about-us">About</a></li>
                                        <li><a href="/shop">Shop</a></li>
                                        <li><a href="/news">News</a></li>
                                        <li><a href="/contact-us">Contact</a></li>
                                   </ul>
                              </div>
                         </div>
                         <div class="col-lg-3 col-md-6">
                              <div class="footer-box subscribe">
                                   <h2 class="widget-title">Subscribe</h2>
                                   <p>Subscribe to our mailing list to get the latest updates.</p>
                                   <form action="index.html">
                                        <input type="email" placeholder="Email">
                                        <button type="submit"><i class="fas fa-paper-plane"></i></button>
                                   </form>
                              </div>
                         </div>
                    <?php
               ?>
          </div>
     </div>
</div>
<!-- end footer -->