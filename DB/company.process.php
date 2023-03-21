<?php
include "dbConnection.php";
include "dbClass.php";
$tb = "tb_company";
$company = new dbClass();

if ($_GET['send'] === 'update') {
  if (
    !empty($_POST['cp_edname']) &&
    !empty($_POST['cp_edemail']) &&
    !empty($_POST['cp_edphone']) &&
    !empty($_POST['cp_edaddress'])
  ) {
    $id = $_GET['cp_id'];

    $field_img = "cp_edlogo";
    include "helper/upload_img.php";
    if ($save_name) {
      $filename = "../assets/images/" . substr($tb, 3) . "/" . $company->dbSelectOne($tb, 'cp_logo', "cp_id=" . $id)['cp_logo'];
      include "helper/delete_img.php";
    } else
      $save_name = $company->dbSelectOne($tb, 'cp_logo', "cp_id=" . $id)['cp_logo'];
    $logo = $save_name;

    $field_img = "cp_edminiLogo";
    include "helper/upload_img.php";
    if ($save_name) {
      $filename = "../assets/images/" . substr($tb, 3) . "/" . $company->dbSelectOne($tb, 'cp_miniLogo', "cp_id=" . $id)['cp_miniLogo'];
      include "helper/delete_img.php";
    } else
      $save_name = $company->dbSelectOne($tb, 'cp_miniLogo', "cp_id=" . $id)['cp_miniLogo'];
    $miniLogo = $save_name;

    $data = [
      'cp_name' => $_POST['cp_edname'],
      'cp_email' => $_POST['cp_edemail'],
      'cp_phone' => $_POST['cp_edphone'],
      'cp_telegram' => $_POST['cp_edtelegram'],
      'cp_facebook' => $_POST['cp_edfacebook'],
      'cp_twitter' => $_POST['cp_edtwitter'],
      'cp_instagram' => $_POST['cp_edinstagram'],
      'cp_address' => $_POST['cp_edaddress'],
      'cp_logo' => $logo,
      'cp_miniLogo' => $miniLogo,
    ];
    $company->dbUpdate($tb, $data, "cp_id=" . $id);
    header("location: {$_SERVER['HTTP_ORIGIN']}/admin_" . substr($tb, 3) . "?status=update");
  } else
    header("location: {$_SERVER['HTTP_ORIGIN']}/admin_" . substr($tb, 3) . "?status=update_failed");
}
?>