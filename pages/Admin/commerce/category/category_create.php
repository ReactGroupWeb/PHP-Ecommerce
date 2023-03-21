<div class="modal fade" id="create<?= $heading ?>" tabindex="-1" aria-labelledby="create<?= $heading ?>Label"
     aria-hidden="true">
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
                    <form class="forms-sample" action="./DB/<?= strtolower($heading) ?>.process.php" method="POST"
                         enctype="multipart/form-data">
                         <div class="form-group">
                              <label for="cg_name">Category Name</label>
                              <input type="text" class="form-control" name="cg_name" id="cg_name"
                                   placeholder="<?= $heading ?> Name">
                         </div>
                         <div class="form-group text-center">
                              <label class="w-100">File upload</label>
                              <label for="cg_icon" class="btn btn-primary btn-sm text-center py-2">
                                   <i class="fa fa-image" aria-hidden="true"></i>Browse Icon
                              </label>
                              <input type="file" name="cg_icon" id="cg_icon" class="d-none">
                              <div id="img-preview" class="m=0"></div>
                         </div>
                         <button type="submit" name="submit" class="float-end btn btn-success btn-sm text-center py-2">
                              <i class="fas fa-plus-circle"></i>Create
                              <?= $heading; ?>
                         </button>
                    </form>
               </div>
          </div>
     </div>
</div>
<script>
     _("cg_icon").addEventListener("change", function () {
          const files = _("cg_icon").files[0];
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