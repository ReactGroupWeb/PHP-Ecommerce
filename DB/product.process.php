<?php
include "dbConnection.php";
include "dbClass.php";
$tb = "tb_product";
$products = new dbClass();
$field_img = "pd_image";

if (isset($_POST['submit'])) {
  if (
    !empty($_POST['pd_name']) &&
    !empty($_POST['pd_description']) &&
    !empty($_POST['pd_regularPrice']) &&
    !empty($_POST['pd_sku']) &&
    !empty($_POST['cg_id']) &&
    !empty($_POST['pd_countInStock'])
  ) {
    $next_pdid = $products->dbSelectOne($tb, "max(pd_id)+1 as next_id", "", "limit 1")['next_id'];
    // send field_img and return $save_name
    include "helper/upload_img.php";
    // echo $save_name ? $save_name : "no image";

    $data = [
      'pd_id' => $next_pdid == 0 ? 1 : $next_pdid,
      'pd_name' => $_POST['pd_name'],
      'pd_description' => $_POST['pd_description'],
      $field_img => $save_name,
      'pd_regularPrice' => $_POST['pd_regularPrice'],
      'pd_salePrice' => $_POST['pd_salePrice'],
      'pd_sku' => $_POST['pd_sku'],
      'cg_id' => $_POST['cg_id'],
      'pd_countInStock' => $_POST['pd_countInStock'],
    ];

    $products->dbInsert($tb, $data);
    header("location: {$_SERVER['HTTP_ORIGIN']}/admin_" . substr($tb, 3) . "?status=added");
  } else
    header("location: {$_SERVER['HTTP_ORIGIN']}/admin_" . substr($tb, 3) . "?status=added_failed");
} else if ($_GET['send'] === 'del') {
  $id = $_GET['id'];
  $pg = $_GET['pg'];
  $filename = "../assets/images/" . substr($tb, 3) . "/" . $products->dbSelectOne($tb, $field_img, "pd_id=" . $id)[$field_img];
  // send $filename to delete file image
  include "helper/delete_img.php";

  $products->dbDelete($tb, "pd_id=" . $id);
  header("location: {$_SERVER['HTTP_ORIGIN']}/admin_" . substr($tb, 3) . "?status=delete&pg=$pg");
} else if ($_GET['send'] === 'update') {
  $id = $_GET['pd_id'];
  $pg = $_GET['pg'];
  $field_img = "pd_edimage";
  // send field_img and return $save_name
  include "helper/upload_img.php";
  $field_img = "pd_image";
  $old_img = $products->dbSelectOne($tb, $field_img, "pd_id=" . $id)[$field_img];
  // echo $save_name ? $save_name : $old_img;
  if ($save_name) {
    $filename = "../assets/images/" . substr($tb, 3) . "/" . $products->dbSelectOne($tb, $field_img, "pd_id=" . $id)[$field_img];
    // send $filename to delete file image
    include "helper/delete_img.php";
  }

  $data = [
    'pd_name' => $_POST['pd_edname'],
    'pd_description' => $_POST['pd_eddescription'],
    $field_img => $save_name ? $save_name : $old_img,
    'pd_regularPrice' => $_POST['pd_edregularPrice'],
    'pd_salePrice' => $_POST['pd_edsalePrice'],
    'pd_sku' => $_POST['pd_edsku'],
    'cg_id' => $_POST['pd_edcategory'],
    'pd_countInStock' => $_POST['pd_edcountInStock'],
  ];
  $products->dbUpdate($tb, $data, "pd_id=" . $id);
  header("location: {$_SERVER['HTTP_ORIGIN']}/admin_" . substr($tb, 3) . "?status=update&pg=$pg");
}
?>