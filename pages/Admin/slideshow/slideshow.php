<?php
     include "./DB/dbConnection.php";
     include "./DB/dbClass.php";
     $heading = "Slideshow";


     $tb = "tb_slideshow";
     $ss = new dbClass();
     $numpage = ceil($ss->dbCount($tb) / MAXPERPAGE);
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
                                   <th>Title</th>
                                   <th>Event</th>
                                   <th>Order</th>
                                   <th>Actions</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php
                              $getSS = new dbClass();
                              $slideshows = $getSS->dbSelect($tb, "*", "", "order by ss_order asc limit " . MAXPERPAGE . " offset $offset");
                              if ($slideshows) {
                                   $i = 1;
                                   foreach ($slideshows as $slideshow) {
                                        ?>
                                        <tr>
                                             <td>
                                                  <?=
                                                       // $i + $offset
                                                       $slideshow['ss_id']
                                                       ?>
                                             </td>
                                             <td class="py-1">
                                                  <img
                                                       src='./assets/images/<?= strtolower($heading) ?>/<?= $slideshow['ss_image'] ?>' />
                                             </td>
                                             <td>
                                                  <?= $slideshow['ss_title'] ?>
                                             </td>
                                             <td>
                                                  <?= $slideshow['ss_event'] ?>
                                             </td>
                                             <td>
                                                  <?= $slideshow['ss_order'] ?>
                                             </td>
                                             <td>
                                                  <a href="./DB/slideshow.process.php?send=eye&ss_enable=<?= $slideshow['ss_enable'] ?>&ss_id=<?= $slideshow['ss_id'] ?>&pg=<?= $pg ?>"
                                                       class="btn btn-success btn-sm mx-1 p-2"> <i
                                                            class="m-0 fas fa-eye<?= $slideshow['ss_enable'] == "1" ? "" : "-slash" ?>"></i>
                                                  </a>
                                                  <a class="btn btn-warning btn-sm mx-1 py-2" data-bs-toggle="modal"
                                                       data-bs-target="#editSlideshow"
                                                       onclick="loadDataForEdit('<?= $slideshow['ss_id'] ?>','<?= $slideshow['ss_title'] ?>','<?= $slideshow['ss_event'] ?>','<?= $slideshow['ss_url'] ?>','<?= $slideshow['ss_description'] ?>','<?= $slideshow['ss_image'] ?>','<?= $pg ?>')"
                                                       title="<?= $slideshow['ss_id'] ?>">
                                                       <i class="m-0 fas fa-tools"></i>
                                                  </a>
                                                  <a class="btn btn-danger btn-sm mx-1 p-2" data-bs-toggle="modal"
                                                       data-bs-target="#deleteSlideshow"
                                                       onclick="loadDataForDelete(<?= $slideshow['ss_id'] ?>)">
                                                       <i class="m-0 fas fa-trash-alt"></i>
                                                  </a>
                                                  <a href="./DB/slideshow.process.php?send=MO&ss_id=<?= $slideshow['ss_id'] ?>&ss_order=<?= $slideshow['ss_order'] ?>&direction=up&pg=<?= $pg ?>"
                                                       class="btn btn-primary btn-sm mx-1 p-2">
                                                       <i class="m-0 fas fa-arrow-up"></i>
                                                  </a>
                                                  <a href="./DB/slideshow.process.php?send=MO&ss_id=<?= $slideshow['ss_id'] ?>&ss_order=<?= $slideshow['ss_order'] ?>&direction=down&pg=<?= $pg ?>"
                                                       class="btn btn-primary btn-sm mx-1 p-2">
                                                       <i class="m-0 fas fa-arrow-down"></i>
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
               <?php require strtolower($heading) . '_create.php'; ?>
               <?php require strtolower($heading) . '_edit.php'; ?>
               <?php require './components/Admin/Comfirm_delete.php'; ?>
          </div>
     </div>
</div>