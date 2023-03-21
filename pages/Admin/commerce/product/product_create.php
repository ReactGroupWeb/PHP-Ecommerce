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
                         <div class="row">
                              <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="pd_name">
                                             <?= ($heading) ?> Name
                                        </label>
                                        <input type="text" class="form-control" name="pd_name" id="pd_name"
                                             placeholder="<?= ($heading) ?> Name">
                                   </div>
                                   <div class="form-group">
                                        <label for="pd_sku">
                                             <?= ($heading) ?> SKU
                                        </label>
                                        <input type="text" class="form-control" name="pd_sku" id="pd_sku"
                                             placeholder="<?= ($heading) ?> SKU">
                                   </div>
                                   <div class="form-group">
                                        <label for="pd_regularPrice">Regular Price</label>
                                        <input type="text" class="form-control" name="pd_regularPrice"
                                             id="pd_regularPrice" placeholder="Regular Price">
                                   </div>
                                   <div class="form-group">
                                        <label for="pd_salePrice">Sale Price</label>
                                        <input type="text" class="form-control" name="pd_salePrice" id="pd_salePrice"
                                             placeholder="Sale Price">
                                   </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="cg_id">Category</label>
                                        <select class="form-control" name="cg_id" id="cg_id">
                                             <?php
                                             if ($categorys) {
                                                  foreach ($categorys as $category) {
                                                       ?>
                                                       <option value="<?= $category['cg_id'] ?>"><?= $category['cg_name'] ?>
                                                       </option>
                                                       <?php
                                                  }
                                             }
                                             ?>
                                        </select>
                                   </div>
                                   <div class="form-group">
                                        <label for="pd_countInStock">Quantity</label>
                                        <input type="number" class="form-control" name="pd_countInStock"
                                             id="pd_countInStock" placeholder="<?= ($heading) ?> Quantity">
                                   </div>
                                   <div class="form-group">
                                        <label for="pd_description">
                                             <?= ($heading) ?> Description
                                        </label>
                                        <textarea class="form-control" id="pd_description" name="pd_description"
                                             rows="7" placeholder="<?= ($heading) ?> Description"></textarea>
                                   </div>
                              </div>
                         </div>
                         <div class="form-group text-center">
                              <label class="w-100">File upload</label>
                              <label for="pd_image" class="btn btn-primary btn-sm text-center py-2">
                                   <i class="fa fa-image" aria-hidden="true"></i>Browse Image
                              </label>
                              <input type="file" name="pd_image" id="pd_image" class="d-none">
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
     _("pd_image").addEventListener("change", function () {
          const files = _("pd_image").files[0];
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