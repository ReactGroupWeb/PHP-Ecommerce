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
<div style="margin-top: 20px;">
     <?php if (isset($_GET['Update'])) {
          if ($_GET['Update'] === 'success') { ?>
               <p class="lead text-success text-center fw-bold">Password Updated Successfully!!!</p>
          <?php } else if ($_GET['Update'] === 'fail') { ?>
                    <p class="lead text-danger text-center fw-bold">Confirm Password Not Match!!! <br /> Please
                         Try Again</p>
          <?php } else if ($_GET['Update'] === 'wrongpass') { ?>
                         <p class="lead text-danger text-center fw-bold">Your Current Password is Wrong!!! <br /> Please
                              Try Again</p>
          <?php } else if ($_GET['Update'] === 'empty') { ?>
                              <p class="lead text-danger text-center fw-bold">Please Enter New Password and Confirm Password Again!!! </p>
          <?php }
     } ?>
</div>
<!-- end breadcrumb section -->

<div class="container">
     <div class="row" style="margin: 100px 0px 150px 0px">
          <div class="col-12">
               <?php
               $heading = "User";
               $dbClass = new dbClass();
               $table = "tb_user";
               $field = "*";
               $condtion = "";
               if (isset($_SESSION['us_id'])) {
                    $user_id = $_SESSION['us_id'];
                    $condtion = "us_id = $user_id";
               }

               $user = $dbClass->dbSelectOne($table, $field, $condtion, );
               ?>
               <div class="card text-center" style="border: 5px solid #ccc">
                    <p class="card-img-top rounded-circle mx-auto" style="width: 200px; height: 200px;
                              margin-top: -100px; 
                              border: 5px solid #ccc; 
                              background-image: url('./assets/images/user/<?= $user['us_image'] ?>');
                              background-position: center;
                              background-size: 100%;
                              background-repeat: no-repeat;
                              ">
                    </p>
                    <div class="card-body">
                         <div class="row">
                              <div class="col-md-6 border-bottom">
                                   <p class="my-3">
                                        <?= $user['us_name'] ?>
                                   </p>
                              </div>
                              <div class="col-md-6 border-bottom">
                                   <p class="my-3">
                                        <?= $user['us_email'] ?>
                                   </p>

                              </div>
                              <div class="col-md-12 border-bottom">
                                   <p class="my-3">
                                        <?= $user['us_phone'] ?>
                                   </p>

                              </div>
                              <div class="col-md-12 border-bottom">
                                   <p class="my-3">
                                        <?= $user['us_DOB'] ?>
                                   </p>

                              </div>
                              <div class="col-md-12 border-bottom">
                                   <p class="my-3">
                                        <?= $user['us_address'] ?>
                                   </p>

                              </div>
                              <div class="col-md-12 border-bottom">
                                   <p class="my-3">
                                        <?= $user['us_isAdmin'] == 1 ? "Admin" : "User" ?>
                                   </p>

                              </div>
                         </div>

                         <div class="row">
                              <div class="col-md-4 my-5">
                                   <a href="../../DB/auth.php?clear=logout" class="btn btn-danger font-weight-bold"><i
                                             class="fas fa-door-open mr-2"></i> Logout</a>
                              </div>
                              <div class="col-md-4 my-5">
                                   <a class="btn btn-success font-weight-bold" data-bs-toggle="modal"
                                        data-bs-target="#editProfile">
                                        <i class="fas fa-tools mr-2"></i> Edit Profile
                                   </a>
                              </div>
                              <div class="col-md-4 my-5">
                                   <a class="btn btn-primary font-weight-bold" data-bs-toggle="modal"
                                        data-bs-target="#changePassword">
                                        <i class="fas fa-key mr-2"></i> Change
                                        Password
                                   </a>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editProfileLabel">Edit Profile
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <!-- form input -->
                    <form action="./DB/user.process.php?send=update&us_id=<?= $user['us_id'] ?>&pg=my-account"
                         class="forms-sample" id="edform" method="POST" enctype="multipart/form-data">
                         <div class="form-group">
                              <label for="us_edname">Name <span class="text-danger fw-bold">*</span></label>
                              <input type="text" class="form-control" value="<?= $user['us_name'] ?>" name="us_edname"
                                   id="us_edname">
                         </div>
                         <div class="form-group">
                              <label for="us_edemail">Email <span class="text-danger fw-bold">*</span></label>
                              <input type="email" class="form-control" value="<?= $user['us_email'] ?>"
                                   name="us_edemail" id="us_edemail">
                         </div>
                         <div class="form-group">
                              <label for="us_edphone">Phone</label>
                              <input type="text" class="form-control" value="<?= $user['us_phone'] ?>" name="us_edphone"
                                   id="us_edphone">
                         </div>
                         <div class="form-group">
                              <label for="us_edDOB">Date of Birth</label>
                              <input type="date" class="form-control" value="<?= $user['us_DOB'] ?>" name="us_edDOB"
                                   id="us_edDOB">
                         </div>
                         <div class="form-group">
                              <label for="us_ednationality">Nationality</label>
                              <input type="text" class="form-control" value="<?= $user['us_nationality'] ?>"
                                   name="us_ednationality" id="us_ednationality">
                         </div>

                         <div class="form-group">
                              <label for="us_edaddress">Address</label>
                              <textarea class="form-control" id="us_edaddress" name="us_edaddress"
                                   rows="5"><?= $user['us_address'] ?></textarea>
                         </div>
                         <div class="form-group form-switch d-none">
                              <input class="form-check-input" type="checkbox" id="us_edisAdmin" name="us_edisAdmin"
                                   <?= $user['us_isAdmin'] == 1 ? 'checked=checked' : '' ?> value="1">
                              <label class="form-check-label pt-1" for="flexSwitchCheckDefault">Admin</label>
                         </div>

                         <div class="form-group text-center">
                              <label class="w-100">
                                   Edit
                                   <?= $heading ?> Profile
                              </label>
                              <label for="us_edimage" class="btn btn-primary btn-sm text-center py-2">
                                   <i class="fa fa-image" aria-hidden="true"></i>Browse Image
                              </label>
                              <input type="file" name="us_edimage" id="us_edimage" class="d-none">
                              <div id="curr_img" class="mt-3">
                                   <img id="edimage" src="./assets/images/user/<?= $user['us_image'] ?>" width="200">
                              </div>
                         </div>
                         <button type="submit" class="btn btn-warning mr-2 float-end py-2 text-dark"><i
                                   class="fas fa-tools me-2"></i>Update</button>
                    </form>
               </div>
          </div>
     </div>
</div>

<!-- Change Password Modal -->
<div class="modal fade" id="changePassword" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <form action="./DB/user.process.php?send=UpdatePassword&us_id=<?= $user['us_id'] ?>&pg=my-account"
                         class="form p-2" method="POST">
                         <div class="form-group">
                              <label for="curr_password">Current Password</label>
                              <input type="password" class="form-control" name="curr_password" id="curr_password">
                         </div>
                         <div class="form-group">
                              <label for="txtNewPass">New Password</label>
                              <input type="password" class="form-control" name="txtNewPass" id="txtNewPass">
                         </div>
                         <div class="form-group">
                              <label for="txtConfirmNewPass">Confirm New Password</label>
                              <input type="password" class="form-control" name="txtConfirmNewPass"
                                   id="txtConfirmNewPass">
                         </div>
                         <button type="submit" class="btn btn-primary float-right font-weight-bold mt-3"><i
                                   class="fas fa-save mr-2"></i> Reset Password</button>
                    </form>
               </div>
          </div>
     </div>
</div>

<!-- Logo Carousel Section -->
<?php require 'components/Frontend/logo-carousel.php'; ?>

<!-- Copyrights Section -->
<?php require 'components/Frontend/copyrights.php'; ?>

<script>
     _("us_edimage").addEventListener("change", function () {
          const files = _("us_edimage").files[0];
          if (files) {
               const fileReader = new FileReader();
               fileReader.readAsDataURL(files);
               fileReader.addEventListener("load", function () {
                    _("edimage").setAttribute("src", this.result);
               });
          }
     });
</script>