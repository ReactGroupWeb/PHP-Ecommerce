<div class="copyright">
     <div class="container">
          <div class="row">
               <?php
               
                    $get_company_media = new dbClass();
                    $table = "tb_company";
                    $field = "*";
                    $condition = "";
                    $order = "";
                    $company = $get_company_media->dbSelectOne($table, $field, $condition, $order);

                    ?>
                         <div class="col-lg-6 col-md-12">
                              <p>Copyrights &copy; <script>document.write(new Date().getFullYear())</script> - <a href="http://localhost:8000//"><?php echo $company['cp_name'] ?></a>,  All Rights Reserved.<br>
                                   Distributed By - <a href="http://localhost:8000/"><?php echo $company['cp_name'] ?></a>
                              </p>
                         </div>
                         <div class="col-lg-6 text-right col-md-12">
                              <div class="social-icons">
                                   <ul>
                                        <li><a href="<?php echo $company['cp_facebook'] ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="<?php echo $company['cp_twitter'] ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="<?php echo $company['cp_instagram'] ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="<?php echo $company['cp_telegram'] ?>" target="_blank"><i class="fab fa-telegram"></i></a></li>
                                   </ul>
                              </div>
                         </div>
                    <?php
               ?>
          </div>
     </div>
</div>