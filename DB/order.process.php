<?php
include "dbConnection.php";
include "dbClass.php";
$tb = "tb_order";
$orders = new dbClass();

if ($_GET['send'] === 'del') {
  $id = $_GET['id'];
  $pg = $_GET['pg'];

  $orders->dbDelete($tb, "od_id=" . $id);
  header("location: {$_SERVER['HTTP_ORIGIN']}/admin_" . substr($tb, 3) . "?status=delete&pg=$pg");
} else if ($_GET['send'] == 'update') {
  $id = $_GET['od_id'];
  $pg = $_GET['pg'];
  $status = $_GET['status'] == "ordered" ? "delivering" : "ordered";
  $date = $status == "delivering" ? date('Y-m-d H:i:s') : null;
  $data = [
    'status' => $status,
    'dateDelivered' => $date,
  ];
  $orders->dbUpdate($tb, $data, "od_id=" . $id);
  header("location: {$_SERVER['HTTP_ORIGIN']}/admin_" . substr($tb, 3) . "?status=update&pg=$pg");
}
?>