<!-- home page slider -->
<div class="homepage-slider">
     
     <?php
          $heading = "Slideshow";
          $get_slideshows = new dbClass();
          $table = "tb_slideshow";
          $field = "*";
          $condition = "ss_enable = 1";
          $order = "ORDER BY ss_order DESC";

          $slideshows = $get_slideshows->dbSelect($table, $field, $condition, $order);
     
          if($slideshows){
               foreach($slideshows as $slideshow){
                    ?>
                         <!-- single home slider -->
                         <div class="single-homepage-slider homepage-bg-2"
                              style="background-image: url('./assets/images/<?= strtolower($heading) ?>/<?= $slideshow['ss_image'] ?>');">
                              <div class="container">
                                   <div class="row">
                                        <div class="col-lg-10 offset-lg-1 text-center">
                                             <div class="hero-text">
                                                  <div class="hero-text-tablecell">
                                                       <p class="subtitle"><?php echo $slideshow['ss_event']; ?></p>
                                                       <h1 class="text-capitalize"><?php echo $slideshow['ss_title'] ?></h1>
                                                       <div class="hero-btns">
                                                            <a href="<?php echo $slideshow['ss_url'] ?>" class="boxed-btn">Visit Shop</a>
                                                            <a href="/contact-us" class="bordered-btn">Contact Us</a>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    <?php
               }    
          }
          else{
               ?>
                    <h3>No Slideshow in the storage</h3>
               <?php
          }
          
     
     ?>
     
    
</div>
<!-- end home page slider -->