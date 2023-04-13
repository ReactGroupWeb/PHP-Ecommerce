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
                         <img style="background-image: url(../../assets/images/<?= strtolower($heading) ?>/<?= $user['us_image'] ?>)" class="card-img-top user-client-profile">
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
     <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">

                    <!-- form input -->
                    <form class="form p-2" id="edform" method="POST" enctype="multipart/form-data">

                         <div class="row">
                              <div class="col-7">
                                   <div class="form-group mb-3">
                                        <label class="form-label fw-bold text-capitalize" for="name">Name <span class="text-danger fw-bold">*</span></label>
                                        <input type="text" class="form-control" name="name" id="name" value="<?= $user['us_name'] ?>">
                                   </div>
                                   <div class="form-group mb-3">
                                        <label class="form-label fw-bold text-capitalize" for="email">Email <span class="text-danger fw-bold">*</span></label>
                                        <input type="email" class="form-control" name="email" id="email" value="<?= $user['us_email'] ?>">
                                   </div>
                                   <div class="form-group mb-3">
                                        <label class="form-label fw-bold text-capitalize" for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="<?= $user['us_phone'] ?>">
                                   </div>
                                   <div class="form-group mb-3">
                                        <label class="form-label fw-bold text-capitalize" for="DOB">Date of Birth</label>
                                        <input type="date" class="form-control" name="DOB" id="DOB" value="<?= $user['us_DOB'] ?>">
                                   </div>
                                   <div class="form-group mb-3">
                                        <label class="form-label fw-bold text-capitalize" for="nationality">Nationality</label>
                                        <input type="text" class="form-control" name="nationality" id="nationality" value="<?= $user['us_nationality'] ?>">
                                   </div>
                              </div>
                              <div class="col-5">
                                   <div class="form-group mb-3">
                                        <label class="form-label fw-bold text-capitalize" for="address">Address</label>
                                        <textarea class="form-control" id="address" name="address" rows="3" style="resize: none"><?= $user['us_address'] ?></textarea>
                                   </div>
                         
                                   <div class="form-group mb-3 text-center">
                                        <label class="w-100 form-label fw-bold text-capitalize">Edit <?= $heading ?> Profile</label>
                                        <label for="image" class="btn btn-primary btn-sm text-center py-2 form-label fw-bold text-capitalize">
                                             <i class="fa fa-image me-2"></i>Browse Image
                                        </label>
                                        <input type="file" name="image" id="image" class="d-none">
                                        <div id="curr_img" class="mt-3">
                                             <img id="edimage" width="200" src="../../assets/images/<?= strtolower($heading) ?>/<?= $user['us_image'] ?>">
                                        </div>
                                   </div>
                              </div>
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