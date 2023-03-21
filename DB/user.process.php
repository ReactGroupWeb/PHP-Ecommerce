<?php
include "dbConnection.php";
include "dbClass.php";
$tb = "tb_user";
$users = new dbClass();
$field_img = "us_image";

if (isset($_POST['submit'])) {
  if (
    !empty($_POST['us_name']) &&
    !empty($_POST['us_email']) &&
    !empty($_POST['us_passwordHash'])
  ) {
    $next_userid = $users->dbSelectOne($tb, "max(us_id)+1 as next_id", "", "limit 1")['next_id'];
    // send field_img and return $save_name
    include "helper/upload_img.php";
    // echo $save_name ? $save_name : "no image";
    $password = $_POST['us_passwordHash'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $isAdmin = $_POST['us_isAdmin'] == 1 ? "1" : "0";
    $data = [
      'us_id' => $next_userid == 0 ? 1 : $next_userid,
      'us_name' => $_POST['us_name'],
      'us_email' => $_POST['us_email'],
      'us_passwordHash' => $hashed_password,
      'us_phone' => $_POST['us_phone'],
      'us_address' => $_POST['us_address'],
      'us_DOB' => $_POST['us_DOB'],
      'us_nationality' => $_POST['us_nationality'],
      'us_isAdmin' => $isAdmin,
      $field_img => $save_name,
    ];

    $users->dbInsert($tb, $data);
    header("location: {$_SERVER['HTTP_ORIGIN']}/admin_" . substr($tb, 3) . "?status=added");
  } else
    header("location: {$_SERVER['HTTP_ORIGIN']}/admin_" . substr($tb, 3) . "?status=added_failed");
} else if ($_GET['send'] === 'del') {
  $id = $_GET['id'];
  $pg = $_GET['pg'];
  $filename = "../assets/images/" . substr($tb, 3) . "/" . $users->dbSelectOne($tb, $field_img, "us_id=" . $id)[$field_img];
  // send $filename to delete file image
  include "helper/delete_img.php";

  $users->dbDelete($tb, "us_id=" . $id);
  header("location: {$_SERVER['HTTP_ORIGIN']}/admin_" . substr($tb, 3) . "?status=delete&pg=$pg");
} else if ($_GET['send'] === 'update') {
  $id = $_GET['us_id'];
  $pg = $_GET['pg'];
  $field_img = "us_edimage";
  // send field_img and return $save_name
  include "helper/upload_img.php";
  $field_img = "us_image";
  $old_img = $users->dbSelectOne($tb, $field_img, "us_id=" . $id)[$field_img];
  // echo $save_name ? $save_name : $old_img;
  if ($save_name) {
    $filename = "../assets/images/" . substr($tb, 3) . "/" . $users->dbSelectOne($tb, $field_img, "us_id=" . $id)[$field_img];
    // send $filename to delete file image
    include "helper/delete_img.php";
  }

  $isAdmin = $_POST['us_edisAdmin'] == 1 ? "1" : "0";

  $data = [
    'us_name' => $_POST['us_edname'],
    'us_email' => $_POST['us_edemail'],
    'us_phone' => $_POST['us_edphone'],
    'us_address' => $_POST['us_edaddress'],
    'us_DOB' => $_POST['us_edDOB'],
    'us_nationality' => $_POST['us_ednationality'],
    'us_isAdmin' => $isAdmin,
    $field_img => $save_name ? $save_name : $old_img,
  ];
  $users->dbUpdate($tb, $data, "us_id=" . $id);
  header("location: {$_SERVER['HTTP_ORIGIN']}/admin_" . substr($tb, 3) . "?status=update&pg=$pg");
}
?>