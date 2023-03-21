<div class="modal fade" id="edit<?= $heading ?>" tabindex="-1" aria-labelledby="edit<?= $heading ?>Label"
     aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="edit<?= $heading ?>Label">Update
                         <?= $heading ?>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <!-- form input -->
                    <form class="forms-sample" id="edform" method="POST" enctype="multipart/form-data">
                         <div class="form-group">
                              <label for="cg_edname">Category Name</label>
                              <input type="text" class="form-control" name="cg_edname" id="cg_edname"
                                   placeholder="<?= $heading ?> Name">
                         </div>
                         <div class="form-group text-center">
                              <label class="w-100">File upload</label>
                              <label for="cg_edicon" class="btn btn-primary btn-sm text-center py-2">
                                   <i class="fa fa-image" aria-hidden="true"></i>Browse Icon
                              </label>
                              <input type="file" name="cg_edicon" id="cg_edicon" class="d-none">
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
     function loadDataForEdit(id, name, img, pg) {
          _("edform").setAttribute("action", "./DB/<?= strtolower($heading) ?>.process.php?send=update&cg_id=" + id + "&pg=" + pg);
          _("cg_edname").value = name;
          _("edimage").setAttribute("src", "./assets/images/<?= strtolower($heading) ?>/" + img);
     }
     _("cg_edicon").addEventListener("change", function () {
          const files = _("cg_edicon").files[0];
          if (files) {
               const fileReader = new FileReader();
               fileReader.readAsDataURL(files);
               fileReader.addEventListener("load", function () {
                    _("edimage").setAttribute("src", this.result);
               });
          }
     });
</script>