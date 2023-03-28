<div class="modal fade" id="create<?= $heading ?>" tabindex="-1" aria-labelledby="create<?= $heading ?>Label" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="create<?= $heading ?>Label">Create
                         <?= $heading ?>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <!-- form input -->
                    <form class="forms-sample" action="./DB/<?= strtolower($heading) ?>.process.php" method="POST" enctype="multipart/form-data">
                         <div class="form-group">
                              <label for="us_name">Name <span class="text-danger fw-bold">*</span></label>
                              <input type="text" class="form-control" name="us_name" id="us_name" placeholder="<?= $heading ?> Name">
                         </div>
                         <div class="form-group">
                              <label for="us_email">Email <span class="text-danger fw-bold">*</span></label>
                              <input type="email" class="form-control" name="us_email" id="us_email" placeholder="<?= $heading ?> Email">
                         </div>
                         <div class="form-group">
                              <label for="us_passwordHash">Password <span class="text-danger fw-bold">*</span></label>
                              <input type="password" class="form-control" name="us_passwordHash" id="us_passwordHash" placeholder="<?= $heading ?> Password">
                         </div>
                         <div class="form-group">
                              <label for="us_phone">Phone</label>
                              <input type="text" class="form-control" name="us_phone" id="us_phone" placeholder="<?= $heading ?> Phone">
                         </div>
                         <div class="form-group">
                              <label for="us_DOB">Date of Birth</label>
                              <input type="date" class="form-control" name="us_DOB" id="us_DOB" placeholder="<?= $heading ?> Date of Birth">
                         </div>
                         <div class="form-group">
                              <label for="us_nationality">Nationality</label>
                              <input type="text" class="form-control" name="us_nationality" id="us_nationality" placeholder="<?= $heading ?> Nationality">
                         </div>

                         <div class="form-group">
                              <label for="us_address">Addres</label>
                              <textarea class="form-control" id="us_address" name="us_address" rows="5" placeholder="Address"></textarea>
                         </div>
                         <div class="form-group form-switch">
                              <input class="form-check-input" type="checkbox" id="us_isAdmin" name="us_isAdmin" value="1">
                              <label class="form-check-label pt-1" for="flexSwitchCheckDefault">Admin</label>
                         </div>

                         <div class="form-group text-center">
                              <label class="w-100"> Add <?= $heading ?> Profile </label>
                              <label for="us_image" class="btn btn-primary btn-sm text-center py-2">
                                   <i class="fa fa-image" aria-hidden="true"></i>Browse Image
                              </label>
                              <input type="file" name="us_image" id="us_image" class="d-none">
                              <div id="img-preview" class="m=0"></div>
                         </div>
                         <button type="submit" name="submit" class="btn btn-primary mr-2 float-end py-2">Submit</button>
                    </form>
               </div>
          </div>
     </div>
</div>
<script>
     _("us_image").addEventListener("change", function () {
          const files = _("us_image").files[0];
          if (files) {
               const fileReader = new FileReader();
               fileReader.readAsDataURL(files);
               fileReader.addEventListener("load", function () {
                    _("img-preview").style.display = "block";
                    _("img-preview").innerHTML = '<img src="' + this.result + '" width="200"/>';
               });
          }
     });
</script>