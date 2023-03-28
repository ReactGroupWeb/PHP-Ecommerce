<?php
     include "./DB/dbConnection.php";
     include "./DB/dbClass.php";
     include "./apps/config.php";

     $heading = "Company";
     $tb = "tb_company";

     //get category data
     $getCP = new dbClass();

     $company = $getCP->dbSelectOne($tb);
?>

<?php if (isset($_GET['status']) && $_GET['status'] === 'update_failed') { ?>

     <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Update
               <?= $heading ?> Failed !!!
          </strong> You should filled all the information in the boxes.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
          </button>
     </div>
<?php } ?>
<div class="col-lg-12 grid-margin stretch-card">
     <div class="card">
          <div class="card-body">
               <div class="row mb-3">
                    <div class="col-6">
                         <h3 class="page-title">
                              <?= $heading; ?>
                         </h3>
                    </div>
                    <div class="col-6">
                         <a data-bs-toggle="modal" data-bs-target="#edit<?= $heading ?>"
                              class="float-end btn btn-warning btn-sm text-center py-2 text-dark">
                              <i class="fas fa-tools"></i>Edit
                              <?= $heading; ?>
                         </a>
                    </div>
               </div>
               <div class="row">
                    <div class="col-md-3">
                         <div class="form-group mb-4">
                              <label class="w-100">Company Logo</label>
                              <div class="text-center">
                                   <img src="./assets/images/<?= strtolower($heading) ?>/<?= $company['cp_logo'] ?>"
                                        width="200" class="border border-5 border-dark">
                              </div>
                         </div>
                         <div class="form-group mb-4">
                              <label class="w-100">Mini Logo</label>
                              <div class="text-center">
                                   <img src="./assets/images/<?= strtolower($heading) ?>/<?= $company['cp_miniLogo'] ?>"
                                        width="200" class="border border-5 border-dark">
                              </div>
                         </div>
                    </div>
                    <div class="col-md-9">
                         <div class="form-group mb-4">
                              <label for="cp_edname">Company Name</label>
                              <input type="text" class="form-control file-upload-info" name="cp_edname"
                                   value="<?= $company['cp_name'] ?>" id="cp_edname">
                         </div>
                         <div class="form-group mb-4">
                              <label for="address">Company Address</label>
                              <textarea class="form-control file-upload-info" value="address" id="address"
                                   name="address" rows="8"><?= $company['cp_address'] ?></textarea>
                         </div>
                         <div class="form-group mb-4">
                              <label for="email">Email</label>
                              <input type="text" class="form-control file-upload-info" name="email"
                                   value="<?= $company['cp_email'] ?>" id="email">
                         </div>
                         <div class="form-group mb-4">
                              <label for="phone">Company Phone</label>
                              <input type="text" class="form-control file-upload-info" name="phone"
                                   value="<?= $company['cp_phone'] ?>" id="phone">
                         </div>
                         <div class="form-group mb-4">
                              <label for="facebook">Facebook</label>
                              <input type="text" class="form-control file-upload-info" name="facebook"
                                   value="<?= $company['cp_facebook'] ?>" id="facebook">
                         </div>
                         <div class="form-group mb-4">
                              <label for="telegram">telegram</label>
                              <input type="text" class="form-control file-upload-info" name="telegram"
                                   value="<?= $company['cp_telegram'] ?>" id="telegram">
                         </div>
                         <div class="form-group mb-4">
                              <label for="twitter">Twitter</label>
                              <input type="text" class="form-control file-upload-info" name="twitter"
                                   value="<?= $company['cp_twitter'] ?>" id="twitter">
                         </div>
                         <div class="form-group mb-4">
                              <label for="instagram">Instagram</label>
                              <input type="text" class="form-control file-upload-info" name="instagram"
                                   value="<?= $company['cp_instagram'] ?>" id="instagram">
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
<?php require strtolower($heading) . '_edit.php'; ?>

<script>
     function preview(e) {
          var img = document.getElementById("img");
          img.src = URL.createObjectURL(e.target.files[0]);
     }
</script>