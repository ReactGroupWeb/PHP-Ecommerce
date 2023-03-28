<?php
     $get_edCP = new dbClass();
     $edcompany = $get_edCP->dbSelectOne($tb);
?>
<div class="modal fade" id="edit<?= $heading ?>" tabindex="-1" aria-labelledby="edit<?= $heading ?>Label" aria-hidden="true">
     <div class="modal-dialog modal-lg">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="edit<?= $heading ?>Label">Update
                         <?= $heading ?>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <!-- form input -->
                    <form class="forms-sample"
                         action="./DB/<?= strtolower($heading) ?>.process.php?send=update&cp_id=<?= $edcompany['cp_id'] ?>"
                         method="POST" enctype="multipart/form-data">
                         <div class="row">
                              <div class="col-md-3">
                                   <div class="form-group text-center">
                                        <label class="w-100">File upload</label>
                                        <label for="cp_edlogo" class="btn btn-primary btn-sm text-center py-2">
                                             <i class="fa fa-image" aria-hidden="true"></i>Browse Image
                                        </label>
                                        <input type="file" name="cp_edlogo" id="cp_edlogo" class="d-none">
                                        <div id="curr_img" class="mt-3">
                                             <img id="edlogo" width="200"
                                                  src="./assets/images/<?= strtolower($heading) ?>/<?= $edcompany['cp_logo'] ?>">
                                        </div>
                                   </div>
                                   <div class="form-group text-center">
                                        <label class="w-100">File upload</label>
                                        <label for="cp_edminiLogo" class="btn btn-primary btn-sm text-center py-2">
                                             <i class="fa fa-image" aria-hidden="true"></i>Browse Image
                                        </label>
                                        <input type="file" name="cp_edminiLogo" id="cp_edminiLogo" class="d-none">
                                        <div id="curr_img" class="mt-3">
                                             <img id="edminiLogo" width="200"
                                                  src="./assets/images/<?= strtolower($heading) ?>/<?= $edcompany['cp_miniLogo'] ?>">
                                        </div>
                                   </div>
                              </div>
                              <div class="col-md-9">
                                   <div class="form-group mb-4">
                                        <label for="cp_edname">Company Name</label>
                                        <input type="text" class="form-control file-upload-info" name="cp_edname"
                                             value="<?= $edcompany['cp_name'] ?>" id="cp_edname">
                                   </div>
                                   <div class="form-group mb-4">
                                        <label for="cp_edaddress">Company Address</label>
                                        <textarea class="form-control file-upload-info" id="cp_edaddress"
                                             name="cp_edaddress" rows="8"><?= $edcompany['cp_address'] ?></textarea>
                                   </div>
                                   <div class="form-group mb-4">
                                        <label for="cp_edemail">Email</label>
                                        <input type="text" class="form-control file-upload-info" name="cp_edemail"
                                             value="<?= $edcompany['cp_email'] ?>" id="cp_edemail">
                                   </div>
                                   <div class="form-group mb-4">
                                        <label for="cp_edphone">Company Phone</label>
                                        <input type="text" class="form-control file-upload-info" name="cp_edphone"
                                             value="<?= $edcompany['cp_phone'] ?>" id="cp_edphone">
                                   </div>
                                   <div class="form-group mb-4">
                                        <label for="cp_edfacebook">Facebook</label>
                                        <input type="text" class="form-control file-upload-info" name="cp_edfacebook"
                                             value="<?= $edcompany['cp_facebook'] ?>" id="cp_edfacebook">
                                   </div>
                                   <div class="form-group mb-4">
                                        <label for="cp_edtelegram">telegram</label>
                                        <input type="text" class="form-control file-upload-info" name="cp_edtelegram"
                                             value="<?= $edcompany['cp_telegram'] ?>" id="cp_edtelegram">
                                   </div>
                                   <div class="form-group mb-4">
                                        <label for="cp_edtwitter">Twitter</label>
                                        <input type="text" class="form-control file-upload-info" name="cp_edtwitter"
                                             value="<?= $edcompany['cp_twitter'] ?>" id="cp_edtwitter">
                                   </div>
                                   <div class="form-group mb-4">
                                        <label for="cp_edinstagram">Instagram</label>
                                        <input type="text" class="form-control file-upload-info" name="cp_edinstagram"
                                             value="<?= $edcompany['cp_instagram'] ?>" id="cp_edinstagram">
                                   </div>
                              </div>
                              <div class="col-md-12 mt-3">
                                   <button type="submit" class="btn btn-warning mr-2 float-end py-2 text-dark"><i
                                             class="fas fa-tools me-2"></i>Update</button>
                              </div>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</div>

<script>
     _("cp_edlogo").addEventListener("change", function () {
          const files = _("cp_edlogo").files[0];
          if (files) {
               const fileReader = new FileReader();
               fileReader.readAsDataURL(files);
               fileReader.addEventListener("load", function () {
                    _("edlogo").setAttribute("src", this.result);
               });
          }
     });
     _("cp_edminiLogo").addEventListener("change", function () {
          const files = _("cp_edminiLogo").files[0];
          if (files) {
               const fileReader = new FileReader();
               fileReader.readAsDataURL(files);
               fileReader.addEventListener("load", function () {
                    _("edminiLogo").setAttribute("src", this.result);
               });
          }
     });
</script>