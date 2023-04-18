<div class="container user_profile_panel">
     <div class="row">
          <div class="col-3 p-0 user_profile_sidebar">
               <div class="user_profile_img" style="background-image: url('../../../../assets/images/auth/Login_bg.jpg')">
               </div>
               <div class="user_profile_text text-center py-4">
                    <button type="button" class="btn btn-warning fw-bold px-3 py-2 mb-3" data-bs-toggle="modal" data-bs-target="#edit_profile"><i class="fa-solid fa-tools me-2"></i>Edit User Profile</button>
                    <button type="button" class="btn btn-primary fw-bold px-3 py-2 mb-3" data-bs-toggle="modal" data-bs-target="#change_password"><i class="fa-solid fa-arrow-rotate-left me-2"></i> Change Password</i></button>  
                             
               </div>
               
          </div>
          <div class="col-9 p-0">
               <div class="user_profile_text py-4 ps-5">
                    <h3 class="fw-bold mb-3">Username A</h3>
                    <a href="mailto:user.a@gmail.com"><i class="fa-solid fa-envelope me-2"></i>user.a@gmail.com</a>
                    <a href="tel:123456789"><i class="fa-solid fa-phone me-2"></i>+855 123 456 7891</a>
                    <p><i class="fa-solid fa-cake-candles me-2"></i>25th, May 2000</p>
                    <p><i class="fa-solid fa-flag me-2"></i>Cambodian</p>
                    <p><i class="fa-solid fa-location me-2"></i>H2100, St2100, Sangkat ABC, Khan ABC, Phnom Penh, Cambodia</p>
               </div>
          </div>
     </div>
</div>


<!-- Edit Profile Modal -->
<div class="modal fade px-5" id="edit_profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <input type="text" class="form-control" name="name" id="name" value="username A">
                                   </div>
                                   <div class="form-group mb-3">
                                        <label class="form-label fw-bold text-capitalize" for="email">Email <span class="text-danger fw-bold">*</span></label>
                                        <input type="email" class="form-control" name="email" id="email" value="user.a@gmail.com">
                                   </div>
                                   <div class="form-group mb-3">
                                        <label class="form-label fw-bold text-capitalize" for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="123 456 7891">
                                   </div>
                                   <div class="form-group mb-3">
                                        <label class="form-label fw-bold text-capitalize" for="DOB">Date of Birth</label>
                                        <input type="date" class="form-control" name="DOB" id="DOB" value="25th, May 2000">
                                   </div>
                                   <div class="form-group mb-3">
                                        <label class="form-label fw-bold text-capitalize" for="nationality">Nationality</label>
                                        <input type="text" class="form-control" name="nationality" id="nationality" value="Cambodian">
                                   </div>
                              </div>
                              <div class="col-5">
                                   <div class="form-group mb-3">
                                        <label class="form-label fw-bold text-capitalize" for="address">Address</label>
                                        <textarea class="form-control" id="address" name="address" rows="3" style="resize: none">H2100, St2100, Sangkat ABC, Khan ABC, Phnom Penh, Cambodia</textarea>
                                   </div>
                         
                                   <div class="form-group mb-3 text-center">
                                        <label class="w-100 form-label fw-bold text-capitalize">Edit User Profile</label>
                                        <label for="image" class="btn btn-primary btn-sm text-center py-2 form-label fw-bold text-capitalize">
                                             <i class="fa fa-image me-2"></i>Browse Image
                                        </label>
                                        <input type="file" name="image" id="image" class="d-none">
                                        <div id="curr_img" class="mt-3">
                                             <img id="edimage" width="200" src="../../../../assets/images/auth/Login_bg.jpg">
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
                         <button type="submit" class="btn btn-primary float-right font-weight-bold"><i
                                   class="fas fa-save mr-2"></i>Reset Password</button>
                    </form>
               </div>
          </div>
     </div>
</div>