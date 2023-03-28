<?php
     include "./DB/dbConnection.php";
     include "./DB/dbClass.php";
     include "./apps/config.php";
     $heading = "Product";

     $tb = "tb_product";
     
     //get total count of products
     $pd = new dbClass();

     $numpage = ceil($pd->dbCount($tb) / MAXPERPAGE);
     $pg = 1;
     $offset = 0;
     if (isset($_GET['pg'])) {
          $pg = $_GET['pg'];
          $offset = ($pg - 1) * MAXPERPAGE;
     }

     //get category data
     $tb_ref = "tb_category";
     $getCG = new dbClass();
     $categorys = $getCG->dbSelect($tb_ref, "*", "", "order by cg_dateCreated asc");
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
                    <table class="table table-striped table-dark text-center">
                         <thead>
                              <tr>
                                   <th>Nº</th>
                                   <th>Image</th>
                                   <th>Product Code</th>
                                   <th>Stock Status</th>
                                   <th>Name</th>
                                   <th>Category</th>
                                   <th>Quantity</th>
                                   <th>Regular Price</th>
                                   <th>Sale Price</th>
                                   <th>Actions</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php
                              $getPD = new dbClass();
                              $products = $getPD->dbSelect($tb, "*", "", "order by pd_dateCreated DESC limit " . MAXPERPAGE . " offset $offset");
                              if ($products) {
                                   $i = 1;
                                   foreach ($products as $product) {
                                        ?>
                                        <tr>
                                             <td>
                                                  <?= $i + $offset ?>
                                             </td>
                                             <td class="py-1">
                                                  <img
                                                       src='./assets/images/<?= strtolower($heading) ?>/<?= $product['pd_image'] ?>' />
                                             </td>
                                             <td>
                                                  <?= $product['pd_sku'] ?>
                                             </td>
                                             <td>
                                                  <?php if ($product['pd_countInStock'] < 1)
                                                       echo "Out Of Stock";
                                                  else if ($product['pd_countInStock'] < 20)
                                                       echo "Low In Stock";
                                                  else
                                                       echo "In Stock";
                                                  ?>
                                             </td>
                                             <td>
                                                  <?= $product['pd_name'] ?>
                                             </td>
                                             <td>
                                                  <?= $getCG->dbSelectOne($tb_ref, "cg_name", "cg_id=" . $product['cg_id'])["cg_name"]; ?>
                                             </td>
                                             <td>
                                                  <?= $product['pd_countInStock'] ?>
                                             </td>
                                             <td>
                                                  <?= "$".number_format($product['pd_regularPrice'], 2) ?>
                                             </td>
                                             <td>
                                                  <?= "$".number_format($product['pd_salePrice'], 2) ?>
                                             </td>
                                             <td>
                                                  <a class="btn btn-warning btn-sm mx-1 py-2" data-bs-toggle="modal"
                                                       data-bs-target="#edit<?= $heading ?>"
                                                       onclick="loadDataForEdit('<?= $product['pd_id'] ?>',
                                                                                                         '<?= $product['pd_name'] ?>',
                                                                                                         '<?= $product['pd_sku'] ?>',
                                                                                                         '<?= $product['pd_regularPrice'] ?>',
                                                                                                         '<?= $product['pd_salePrice'] ?>',
                                                                                                         '<?= $product['cg_id'] ?>',
                                                                                                         '<?= $product['pd_countInStock'] ?>',
                                                                                                         '<?= $product['pd_description'] ?>',
                                                                                                         '<?= $product['pd_image'] ?>',
                                                                                                         '<?= $pg ?>')">
                                                       <i class="fas fa-tools"></i>Edit
                                                  </a>
                                                  <a class="btn btn-danger btn-sm mx-1 p-2" data-bs-toggle="modal"
                                                       data-bs-target="#delete<?= $heading ?>"
                                                       onclick="loadDataForDelete(<?= $product['pd_id'] ?>)">
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