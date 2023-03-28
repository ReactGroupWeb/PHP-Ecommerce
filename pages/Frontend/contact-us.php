<!-- Menu NavBar Section -->
<?php require 'components/Frontend/menu-navbar.php'; ?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
     <div class="container">
          <div class="row">
               <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                         <p>Get 24/7 Support</p>
                         <h1>Contact us</h1>
                    </div>
               </div>
          </div>
     </div>
</div>
<!-- end breadcrumb section -->

<!-- contact form -->
<div class="contact-from-section mt-150 mb-150">
     <div class="container">
          <div class="row">
               <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="form-title">
                         <h2>Have you any question?</h2>
                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, ratione! Laboriosam est, assumenda. Perferendis, quo alias quaerat aliquid. Corporis ipsum minus voluptate? Dolore, esse natus!</p>
                    </div>
                    <div id="form_status"></div>
                    <div class="contact-form">
                         <form type="POST" id="fruitkha-contact" onSubmit="return valid_datas( this );">
                              <p>
                                   <input type="text" placeholder="Name" name="name" id="name">
                                   <input type="email" placeholder="Email" name="email" id="email">
                              </p>
                              <p>
                                   <input type="tel" placeholder="Phone" name="phone" id="phone">
                                   <input type="text" placeholder="Subject" name="subject" id="subject">
                              </p>
                              <p><textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea></p>
                              <input type="hidden" name="token" value="FsWga4&@f6aw" />
                              <p><input type="submit" value="Submit"></p>
                         </form>
                    </div>
               </div>
               <div class="col-lg-4">
                    <div class="contact-form-wrap">
                         <?php
                              $get_company = new dbClass();
                              $table = "tb_company";
                              $field = "*";
                              $condition = "";
                              $order = "";

                              $company = $get_company->dbSelectOne($table, $field, $condition, $order);

                         
                         ?>


                         <div class="contact-form-box">
                              <h4><i class="fas fa-map"></i> Shop Address</h4>
                              <p><?php echo $company['cp_address'] ?></p>
                         </div>
                         <div class="contact-form-box">
                              <h4><i class="far fa-clock"></i> Shop Hours</h4>
                              <p>MON - FRIDAY: 8 to 9 PM <br> SAT - SUN: 10 to 8 PM </p>
                         </div>
                         <div class="contact-form-box">
                              <h4><i class="fas fa-address-book"></i> Contact</h4>
                              <p>
                                   Phone: <a class="text-dark" href="tel:<?php echo $company['cp_phone'] ?>"><?php echo $company['cp_phone'] ?></a> 
                                   <br> 
                                   Email: <a class="text-dark" href="mailto:<?php echo $company['cp_email'] ?>"><?php echo $company['cp_email'] ?></a>
                                   <br>
                                   Facebook: <a class="text-dark" href="<?php echo $company['cp_facebook'] ?>"><?php echo $company['cp_facebook'] ?></a>
                                   <br>
                                   Twitter: <a class="text-dark" href="<?php echo $company['cp_twitter'] ?>"><?php echo $company['cp_twitter'] ?></a>
                                   <br>
                                   Instagram: <a class="text-dark" href="<?php echo $company['cp_instagram'] ?>"><?php echo $company['cp_instagram'] ?></a>
                                   <br>
                                   Telegram: <a class="text-dark" href="<?php echo $company['cp_telegram'] ?>"><?php echo $company['cp_telegram'] ?></a>
                              </p>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
<!-- end contact form -->

<!-- find our location -->
<div class="find-location blue-bg">
     <div class="container">
          <div class="row">
               <div class="col-lg-12 text-center">
                    <p> <i class="fas fa-map-marker-alt"></i> Find Our Location</p>
               </div>
          </div>
     </div>
</div>
<!-- end find our location -->

<!-- google map section -->
<div class="embed-responsive embed-responsive-21by9">
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.7706603336287!2d104.88850131490558!3d11.568291891787132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109519fe4077d69%3A0x20138e822e434660!2sRUPP%20(Royal%20University%20of%20Phnom%20Penh)!5e0!3m2!1sen!2skh!4v1678865093388!5m2!1sen!2skh" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-100"></iframe>
</div>
<!-- end google map section -->

<!-- Logo Carousel Section -->
<?php require 'components/Frontend/logo-carousel.php'; ?>

<!-- Copyrights Section -->
<?php require 'components/Frontend/copyrights.php'; ?>