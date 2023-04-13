<div class="modal fade" id="edit<?= $heading ?>" tabindex="-1" aria-labelledby="edit<?= $heading ?>Label"
     aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="edit<?= $heading ?>Label">Edit
                         <?= $heading ?>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <!-- form input -->
                    <form class="forms-sample" id="edform" method="POST" enctype="multipart/form-data">
                         <div class="form-group">
                              <label for="us_edname">Name <span class="text-danger fw-bold">*</span></label>
                              <input type="text" class="form-control" name="us_edname" id="us_edname">
                         </div>
                         <div class="form-group">
                              <label for="us_edemail">Email <span class="text-danger fw-bold">*</span></label>
                              <input type="email" class="form-control" name="us_edemail" id="us_edemail">
                         </div>
                         <div class="form-group">
                              <label for="us_edphone">Phone</label>
                              <input type="text" class="form-control" name="us_edphone" id="us_edphone">
                         </div>
                         <div class="form-group">
                              <label for="us_edDOB">Date of Birth</label>
                              <input type="date" class="form-control" name="us_edDOB" id="us_edDOB">
                         </div>
                         <div class="form-group">
                              <label for="us_ednationality">Nationality</label>
                              <input type="text" class="form-control" name="us_ednationality" id="us_ednationality">
                         </div>

                         <div class="form-group">
                              <label for="us_edaddress">Addres</label>
                              <textarea class="form-control" id="us_edaddress" name="us_edaddress" rows="5"></textarea>
                         </div>
                         <div class="form-group form-switch">
                              <input class="form-check-input" type="checkbox" id="us_edisAdmin" name="us_edisAdmin"
                                   value="1">
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
                                   <img id="edimage" width="200">
                              </div>
                         </div>
                         <button type="submit" class="btn btn-warning mr-2 float-end py-2 text-dark"><i
                                   class="fas fa-tools me-2"></i>Update</button>
                    </form>
               </div>
          </div>
     </div>
</div>
<script>
     function loadDataForEdit(id, name, email, phone, DateOB, nationality, address, isAdmin, img, pg) {
          _("edform").setAttribute("action", "./DB/<?= strtolower($heading) ?>.process.php?send=update&us_id=" + id + "&pg=" + pg);
          _("us_edname").value = name;
          _("us_edemail").value = email;
          _("us_edphone").value = phone;
          _("us_edDateOB").value = DateOB;
          _("us_ednationality").value = nationality;
          _("us_edaddress").innerHTML = address;
          _("edimage").setAttribute("src", "./assets/images/<?= strtolower($heading) ?>/" + img);
          if (isAdmin == 1)
               _("us_edisAdmin").checked = true;
          else
               _("us_edisAdmin").checked = false;
     }
     _("us_edimage").addEventListener("change", function () {
          const files = _("us_edimage").files[0];
          if (files) {
               const fileReader = new FileReader();
               fileReader.readAsDataURL(files);
               fileReader.addEventListener("load", function () {
                    _("edimage").innerHTML = '<img src="' + this.result + '" width="200"/>';
               });
          }
     });
</script>