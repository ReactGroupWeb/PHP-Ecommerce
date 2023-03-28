<?php
     include "./DB/dbConnection.php";
     include "./DB/dbClass.php";
     include "./apps/config.php";
     $heading = "Category";

     $tb = "tb_category";
     $cg = new dbClass();
     $numpage = ceil($cg->dbCount($tb) / MAXPERPAGE);
     $pg = 1;
     $offset = 0;
     if (isset($_GET['pg'])) {
          $pg = $_GET['pg'];
          $offset = ($pg - 1) * MAXPERPAGE;
     }
?>

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
                         <button type="button" class="float-end btn btn-success btn-sm text-center py-2"
                              data-bs-toggle="modal" data-bs-target="#create<?= $heading; ?>">
                              <i class="fas fa-plus-circle"></i>Create
                              <?= $heading; ?>
                         </button>
                    </div>
               </div>

               <?php if (isset($_GET['status']) && $_GET['status'] === 'added_failed') { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                         <strong>Add
                              <?= $heading ?> Failed !!!
                         </strong> You should filled all the information in the boxes.
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
               <?php } ?>
               <div class="table-responsive">
                    <table class="table table-striped table-dark">
                         <thead>
                              <tr>
                                   <th>Nº</th>
                                   <th>Image</th>
                                   <th>Name</th>
                                   <th>Actions</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php
                              $getCG = new dbClass();
                              $categorys = $getCG->dbSelect($tb, "*", "", "order by cg_dateCreated asc limit " . MAXPERPAGE . " offset $offset");
                              if ($categorys) {
                                   $i = 1;
                                   foreach ($categorys as $category) {
                                        ?>
                                        <tr>
                                             <td>
                                                  <?= $i + $offset ?>
                                             </td>
                                             <td class="py-1">
                                                  <img
                                                       src='./assets/images/<?= strtolower($heading) ?>/<?= $category['cg_icon'] ?>' />
                                             </td>
                                             <td>
                                                  <?= $category['cg_name'] ?>
                                             </td>
                                             <td><a class="btn btn-warning btn-sm mx-1 py-2" data-bs-toggle="modal"
                                                       data-bs-target="#edit<?= $heading ?>"
                                                       onclick="loadDataForEdit('<?= $category['cg_id'] ?>',
                                                                                                         '<?= $category['cg_name'] ?>',
                                                                                                         '<?= $category['cg_icon'] ?>',
                                                                                                         '<?= $pg ?>')">
                                                       <i class="fas fa-tools"></i>Edit
                                                  </a>
                                                  <a class="btn btn-danger btn-sm mx-1 p-2" data-bs-toggle="modal"
                                                       data-bs-target="#delete<?= $heading ?>"
                                                       onclick="loadDataForDelete(<?= $category['cg_id'] ?>)">
                                                       <i class="fas fa-trash-alt"></i>Delete
                                                  </a>

                                             </td>
                                        </tr>
                                        <?php
                                        $i++;
                                   }
                              }
                              ?>
                         </tbody>
                    </table>
                    <?php
                    if ($numpage > 1)
                         require './components/Admin/pagination.php';
                    ?>
               </div>
               <!-- model popup -->
               <?php require strtolower($heading) . '_create.php'; ?>
               <?php require strtolower($heading) . '_edit.php'; ?>
               <?php require './components/Admin/Comfirm_delete.php'; ?>
          </div>
     </div>
</div>