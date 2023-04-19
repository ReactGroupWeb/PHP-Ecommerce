<?php
include "./DB/dbConnection.php";
include "./DB/dbClass.php";

$heading = "Order";
$tb = "tb_order";
//get total count of Orders
$pd = new dbClass();
$numpage = ceil($pd->dbCount($tb) / MAXPERPAGE);
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
               </div>
               <div class="table-responsive">
                    <table class="table table-striped table-dark text-center">
                         <thead>
                              <tr>
                                   <th>Nº</th>
                                   <th>SubTotal</th>
                                   <th>Tax</th>
                                   <th>Total</th>
                                   <th>Name</th>
                                   <th>Tel</th>
                                   <th>Status</th>
                                   <th>Order Date</th>
                                   <th>Actions</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php
                              $getOD = new dbClass();
                              $orders = $getOD->dbSelect($tb, "*", "", "order by dateOrdered asc limit " . MAXPERPAGE . " offset $offset");
                              if ($orders) {
                                   $i = 1;
                                   foreach ($orders as $order) {
                                        ?>
                                        <tr>
                                             <td>
                                                  <?= $i + $offset ?>
                                             </td>
                                             <td>
                                                  <?= $order['subTotal'] ?>
                                             </td>
                                             <td>
                                                  <?= $order['subTotal'] * 0.1 ?>
                                             </td>
                                             <td>
                                                  <?= $order['totalPrice'] ?>
                                             </td>
                                             <td>
                                                  <?= $order['firstname'] . " " . $order['lastname'] ?>
                                             </td>
                                             <td>
                                                  <?= $order['phone'] ?>
                                             </td>
                                             <td>
                                                  <?= $order['status'] ?>
                                             </td>
                                             <td>
                                                  <?= $order['dateOrdered'] ?>
                                             </td>
                                             <td>
                                                  <a href="/admin_order_detail?od_id=<?= $order['od_id'] ?>&pg=<?= $pg ?>"
                                                       class="btn btn-success btn-sm py-2"><i class="fas fa-eye m-0"></i></a>
                                                  <?php if ($order['status'] != "Success") { ?>
                                                       <a href="./DB/<?= strtolower($heading) ?>.process.php?send=update&od_id=<?= $order['od_id'] ?>&status=<?= $order['status'] ?>&pg=<?= $pg ?>"
                                                            class="btn btn-warning btn-sm py-2"><i class="fas fa-truck m-0"></i></a>
                                                  <?php } ?>
                                                  <?php if ($order['status'] == "Ordered") { ?>
                                                       <a href="#" class="btn btn-danger btn-sm py-2" data-bs-toggle="modal"
                                                            data-bs-target="#delete<?= $heading ?>"
                                                            onclick="loadDataForDelete(<?= $order['od_id'] ?>)"><i
                                                                 class="fas fa-trash-alt m-0"></i></a>
                                                  <?php } ?>
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
               <?php require './components/Admin/Comfirm_delete.php'; ?>
          </div>
     </div>
</div>