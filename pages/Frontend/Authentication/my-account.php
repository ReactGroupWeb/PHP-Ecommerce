<!-- Menu NavBar Section -->
<?php require 'components/Frontend/menu-navbar.php'; ?>


<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
     <div class="container">
          <div class="row">
               <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                         <p>Fresh and Organic</p>
                         <h1>My Account</h1>
                    </div>
               </div>
          </div>
     </div>
</div>
<!-- end breadcrumb section -->


<div class="container">
     <div class="row" style="margin: 150px 0px 150px 0px">
          <div class="col-12">

               <?php
                    $heading = "User";
                    $dbClass = new dbClass();
                    $table = "tb_user";
                    $field = "*";
                    $condtion = "";
                    if(isset($_SESSION['us_id'])){
                         $user_id = $_SESSION['us_id'];

                         $condtion = "us_id = $user_id";
                    }

                    $order = "";

                    $user = $dbClass->dbSelectOne($table, $field, $condtion, $order);
               
               ?>
               
               <div class="card text-center" style="border: 5px solid #ccc">
                    <div class="text-center">
                         <img src="../../assets/images/<?= strtolower($heading) ?>/<?= $user['us_image'] ?>" class="card-img-top rounded-circle" style="width: 200px; height: 200px; margin-top: -100px; border: 5px solid #ccc">
                    </div>

                    <div class="card-body">
                         <div class="row">
                              <div class="col-md-6 border-bottom">
                                   <p class="my-3 fw-bold"><?= $user['us_name']; ?></p>
                              </div>
                              <div class="col-md-6 border-bottom">
                                   <p class="my-3 fw-bold"><?= $user['us_email']; ?></p>
                              </div>
                              <div class="col-md-12 border-bottom">
                                   <p class="my-3 fw-bold">+855 <?= $user['us_phone']; ?></p>
                              </div>
                              <div class="col-md-12 border-bottom">
                                   <p class="my-3 fw-bold"><?= $user['us_DOB']; ?></p>
                              </div>
                              <div class="col-md-12 border-bottom">
                                   <p class="my-3 fw-bold"><?= $user['us_nationality']; ?></p>
                              </div>
                              <div class="col-md-12 border-bottom">
                                   <p class="my-3 fw-bold"><?= $user['us_address']; ?></p>
                              </div>
                         </div>

                         <div class="row">
                              <div class="col-md-4 my-5">
                              <a href="../../DB/auth.php?clear=logout" class="btn btn-danger fw-bold"><i class="fas fa-door-open me-2"></i>Logout</a>
                              </div>
                              <div class="col-md-4 my-5">
                                   <a href="#" class="btn btn-success fw-bold" data-bs-toggle="modal" data-bs-target="#edit_profile"><i class="fas fa-tools me-2"></i>Edit Profile</a>
                              </div>
                              <div class="col-md-4 my-5">
                                   <a href="#" class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#change_password"><i class="fas fa-key me-2"></i>Change Password</a>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>


<!-- Edit Profile Modal -->

<div class="modal fade" id="edit_profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <form class="form p-2">
                         <div class="mb-3">
                              <label class="form-label fw-bold text-capitalize" for="username">Username</label>
                              <input type="text" name="username" class="form-control" value="Mr. Jonh Fernandez" id="username">
                         </div>
                         <div class="mb-3">
                              <label class="form-label fw-bold text-capitalize" for="email">Email</label>
                              <input type="email" name="email" class="form-control" value="jonh.fernandez@gmail.com" id="email">
                         </div>
                         <div class="mb-3">
                              <label class="form-label fw-bold text-capitalize" for="phone">Confirm New Password</label>
                              <input type="text" name="phone" class="form-control" value="185 9655 9225 852" id="phone">
                         </div>
                         <div class="mb-3">
                              <label class="form-label fw-bold text-capitalize" for="date_of_birth">Date of Birth</label>
                              <input type="date" name="cn_password" class="form-control" value="02/07/1985" id="date_of_birth">
                         </div>
                         <div class="mb-3">
                              <label class="form-label fw-bold text-capitalize" for="place_of_birth">Place of Birth</label>
                              <input type="text" name="place_of_birth" class="form-control" value="Area 51" id="place_of_birth">
                         </div>
                         <div class="mb-3">
                              <label class="form-label fw-bold text-capitalize" for="address">Address</label>
                              <input type="address" name="address" class="form-control" value="Nevada State, United State of America" id="address">
                         </div>

                         <button type="submit" class="btn btn-warning float-end text-dark fw-bold"><i class="fas fa-tools me-2"></i>Update</button>
                    </form>
               </div>

          </div>
     </div>
</div>



<!-- Change Password Modal -->
<div class="modal fade" id="change_password" tabindex="-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Change Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <form class="form p-2">
                         <div class="mb-3">
                              <label class="form-label fw-bold text-capitalize" for="password">Current Password</label>
                              <input type="password" name="password" class="form-control" id="password">
                         </div>
                         <div class="mb-3">
                              <label class="form-label fw-bold text-capitalize" for="new_password">New Password</label>
                              <input type="password" name="new_password" class="form-control" id="new_password">
                         </div>
                         <div class="mb-3">
                              <label class="form-label fw-bold text-capitalize" for="confirm_password">Confirm New Password</label>
                              <input type="password" name="cn_password" class="form-control" id="confirm_password">
                         </div>
                         <button type="submit" class="btn btn-primary float-end fw-bold"><i class="fas fa-save me-2"></i>Reset Password</button>
                    </form>
               </div>
          </div>
     </div>
</div>


<!-- Logo Carousel Section -->
<?php require 'components/Frontend/logo-carousel.php'; ?>

<!-- Copyrights Section -->
<?php require 'components/Frontend/copyrights.php'; ?>