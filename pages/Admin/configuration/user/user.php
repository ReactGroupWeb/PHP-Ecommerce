<?php
     include "./DB/dbConnection.php";
     include "./DB/dbClass.php";
     include "./apps/config.php";

     $heading = "User";
     $tb = "tb_user";

     //get total count of users
     $pd = new dbClass();

     $numpage = ceil($pd->dbCount($tb) / MAXPERPAGE);
     $pg = 1;
     $offset = 0;
     if (isset($_GET['pg'])) {
          $pg = $_GET['pg'];
          $offset = ($pg - 1) * MAXPERPAGE;
     }

?>

<style>
     .user-profile {
          background-position: center;
          background-size: 100%;
          background-repeat: no-repeat;
          width: 35px;
          height: 35px;
     }
</style>
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
                                   <th>Email</th>
                                   <th>Phone</th>
                                   <th>Role</th>
                                   <th>Actions</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php
                              $getPD = new dbClass();
                              $users = $getPD->dbSelect($tb, "*", "", "order by us_name asc limit " . MAXPERPAGE . " offset $offset");
                              if ($users) {
                                   $i = 1;
                                   foreach ($users as $user) {
                                        ?>
                                        <tr>
                                             <td>
                                                  <?= $i + $offset ?>
                                             </td>
                                             <td class="py-1">
                                                  <div class="rounded-circle user-profile"
                                                       style="background-image: url('./assets/images/<?= strtolower($heading) ?>/<?= $user['us_image'] ?>')">
                                                  </div>
                                             </td>
                                             <td> <?= $user['us_name'] ?> </td>
                                             <td> <?= $user['us_email'] ?> </td>
                                             <td> <?= $user['us_phone'] ?> </td>
                                             <td> <?= $user['us_isAdmin'] == "1" ? "Admin" : "User" ?> </td>
                                             <td>
                                                  <a class="btn btn-warning btn-sm mx-1 py-2" data-bs-toggle="modal"
                                                       data-bs-target="#edit<?= $heading ?>" onclick="loadDataForEdit('<?= $user['us_id'] ?>',
                                                            '<?= $user['us_name'] ?>',
                                                            '<?= $user['us_email'] ?>',
                                                            '<?= $user['us_phone'] ?>',
                                                            '<?= $user['us_DOB'] ?>',
                                                            '<?= $user['us_nationality'] ?>',
                                                            '<?= $user['us_address'] ?>',
                                                            '<?= $user['us_isAdmin'] ?>',
                                                            '<?= $user['us_image'] ?>',
                                                            '<?= $pg ?>')">
                                                       <i class="fas fa-tools"></i>Edit
                                                  </a>
                                                  <a class="btn btn-danger btn-sm mx-1 p-2" data-bs-toggle="modal"
                                                       data-bs-target="#delete<?= $heading ?>"
                                                       onclick="loadDataForDelete(<?= $user['us_id'] ?>)">
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