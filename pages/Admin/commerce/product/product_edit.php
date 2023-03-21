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
                         <div class="row">
                              <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="pd_edname">
                                             <?= ($heading) ?> Name
                                        </label>
                                        <input type="text" class="form-control" name="pd_edname" id="pd_edname">
                                   </div>
                                   <div class="form-group">
                                        <label for="pd_edsku">
                                             <?= ($heading) ?> SKU
                                        </label>
                                        <input type="text" class="form-control" name="pd_edsku" id="pd_edsku">
                                   </div>
                                   <div class="form-group">
                                        <label for="pd_edregularPrice">Regular Price</label>
                                        <input type="text" class="form-control" name="pd_edregularPrice"
                                             id="pd_edregularPrice">
                                   </div>
                                   <div class="form-group">
                                        <label for="pd_edsalePrice">Sale Price</label>
                                        <input type="text" class="form-control" name="pd_edsalePrice"
                                             id="pd_edsalePrice">
                                   </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="pd_edcategory">Category</label>
                                        <select class="form-control" name="pd_edcategory" id="pd_edcategory">
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
                                        <label for="pd_edcountInStock">Quantity</label>
                                        <input type="number" class="form-control" name="pd_edcountInStock"
                                             id="pd_edcountInStock">
                                   </div>
                                   <div class="form-group">
                                        <label for="pd_eddescription">
                                             <?= ($heading) ?> Description
                                        </label>
                                        <textarea class="form-control" id="pd_eddescription" name="pd_eddescription"
                                             rows="4"></textarea>
                                   </div>
                              </div>
                         </div>
                         <div class="form-group text-center">
                              <label class="w-100">File upload</label>
                              <label for="pd_edimage" class="btn btn-primary btn-sm text-center py-2">
                                   <i class="fa fa-image" aria-hidden="true"></i>Browse Image
                              </label>
                              <input type="file" name="pd_edimage" id="pd_edimage" class="d-none">
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
     function loadDataForEdit(id, name, sku, regularPrice, salePrice, category, quantity, description, img, pg) {
          _("edform").setAttribute("action", "./DB/<?= strtolower($heading) ?>.process.php?send=update&pd_id=" + id + "&pg=" + pg);
          _("pd_edname").value = name;
          _("pd_edsku").value = sku;
          _("pd_edregularPrice").value = regularPrice;
          _("pd_edsalePrice").value = salePrice;
          _("pd_edcategory").value = category;
          _("pd_edcountInStock").value = quantity;
          _("pd_eddescription").innerHTML = description;
          _("edimage").setAttribute("src", "./assets/images/<?= strtolower($heading) ?>/" + img);
     }
     _("pd_edimage").addEventListener("change", function () {
          const files = _("pd_edimage").files[0];
          if (files) {
               const fileReader = new FileReader();
               fileReader.readAsDataURL(files);
               fileReader.addEventListener("load", function () {
                    _("edimage").setAttribute("src", this.result);
               });
          }
     });
</script>