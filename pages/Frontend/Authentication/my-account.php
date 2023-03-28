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
     <div class="row"  style="margin: 150px 0px 150px 0px">
          <div class="col-12">
               <div class="card text-center" style="border: 5px solid #ccc">
                    <div class="text-center">
                         <img src="../../assets/frontend/img/avaters/avatar3.png" class="card-img-top rounded-circle" style="width: 200px; margin-top: -100px; border: 5px solid #ccc">
                    </div>
                 
                    <div class="card-body">
                         <div class="row">
                              <div class="col-md-6 border-bottom">
                                   <p class="my-3">Mr. Jonh Fernandez</p>
                              </div>
                              <div class="col-md-6 border-bottom">
                                   <p class="my-3">jonh.fernandez@gmail.com</p>      
                              </div>
                              <div class="col-md-12 border-bottom">
                                   <p class="my-3">+185 9655 9225 852</p>      
                              </div>
                              <div class="col-md-12 border-bottom">
                                   <p class="my-3">02-Jul-1985</p>      
                              </div>
                              <div class="col-md-12 border-bottom">
                                   <p class="my-3">Area 51</p>      
                              </div>
                              <div class="col-md-12 border-bottom">
                                   <p class="my-3">Nevada State, United State of America</p>      
                              </div>
                         </div>

                         <div class="row">
                              <div class="col-md-4 my-5">
                                   <a href="#" class="btn btn-danger font-weight-bold"><i class="fas fa-door-open mr-2"></i>Logout</a>
                              </div>
                              <div class="col-md-4 my-5">
                                   <a href="#" class="btn btn-success font-weight-bold" data-toggle="modal" data-target="#edit_profile"><i class="fas fa-tools mr-2"></i>Edit Profile</a>
                              </div>
                              <div class="col-md-4 my-5">
                                   <a href="#" class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#change_password"><i class="fas fa-key mr-2"></i>Change Password</a>
                              </div>
                         </div>
                    </div>
               </div>
          </div>     
     </div>
</div>


<!-- Edit Profile Modal -->
<div class="modal fade" id="edit_profile" tabindex="-1" role="dialog">
     <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <div class="modal-body">
                    <form class="form p-2">
                         <div class="form-group">
                              <label for="username">Username</label>
                              <input type="text" name="username" class="form-control" value="Mr. Jonh Fernandez" id="username">
                         </div>
                         <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" name="email" class="form-control" value="jonh.fernandez@gmail.com" id="email">
                         </div>
                         <div class="form-group">
                              <label for="phone">Confirm New Password</label>
                              <input type="text" name="phone" class="form-control" value="185 9655 9225 852" id="phone">
                         </div>
                         <div class="form-group">
                              <label for="date_of_birth">Date of Birth</label>
                              <input type="date" name="cn_password" class="form-control" value="02/07/1985" id="date_of_birth">
                         </div>
                         <div class="form-group">
                              <label for="place_of_birth">Place of Birth</label>
                              <input type="text" name="place_of_birth" class="form-control" value="Area 51" id="place_of_birth">
                         </div>
                         <div class="form-group">
                              <label for="address">Address</label>
                              <input type="address" name="address" class="form-control" value="Nevada State, United State of America" id="address">
                         </div>
                         
                         <button type="submit" class="btn btn-warning float-right text-dark font-weight-bold"><i class="fas fa-tools mr-2"></i>Update</button>
                    </form>
               </div>
          </div>
     </div>
</div>


<!-- Change Password Modal -->
<div class="modal fade" id="change_password" tabindex="-1" role="dialog">
     <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <div class="modal-body">
                    <form class="form p-2">
                         <div class="form-group">
                              <label for="password">Current Password</label>
                              <input type="password" name="password" class="form-control" id="password">
                         </div>
                         <div class="form-group">
                              <label for="new_password">New Password</label>
                              <input type="password" name="new_password" class="form-control" id="new_password">
                         </div>
                         <div class="form-group">
                              <label for="confirm_password">Confirm New Password</label>
                              <input type="password" name="cn_password" class="form-control" id="confirm_password">
                         </div>
                         <button type="submit" class="btn btn-primary float-right font-weight-bold"><i class="fas fa-save mr-2"></i>Reset Password</button>
                    </form>
               </div>
          </div>
     </div>
</div>


<!-- Logo Carousel Section -->
<?php require 'components/Frontend/logo-carousel.php'; ?>

<!-- Copyrights Section -->
<?php require 'components/Frontend/copyrights.php'; ?>