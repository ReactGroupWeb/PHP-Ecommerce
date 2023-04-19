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
    $isAdmin = (isset($_POST['us_edisAdmin']) && $_POST['us_edisAdmin'] == 1) ? "1" : "0";
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
  $pg = $_GET['pg'];
  $id = $_GET['us_id'];
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

  $isAdmin = (isset($_POST['us_edisAdmin']) && $_POST['us_edisAdmin'] == 1) ? "1" : "0";

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
  if (is_numeric($pg))
    header("location: {$_SERVER['HTTP_ORIGIN']}/admin_" . substr($tb, 3) . "?status=update&pg=$pg");
  else
    header("location: {$_SERVER['HTTP_ORIGIN']}/$pg?status=update");
} else if ($_GET['send'] === 'UpdatePass') {
  $userID = $_POST['txtIDforUpdate'];
  $newpass = $_POST['txtNewPass'];
  $Cnewpass = $_POST['txtConfirmNewPass'];
  if ($newpass == $Cnewpass) {
    $hashed_password = password_hash($newpass, PASSWORD_DEFAULT);
    $data = [
      'us_passwordHash' => $hashed_password,
    ];
    $users->dbUpdate($tb, $data, "us_id=" . $userID);

    header("location: {$_SERVER['HTTP_ORIGIN']}/login?Update=true");
  } else {
    header("location: {$_SERVER['HTTP_ORIGIN']}/login?Update=false");
  }
} else if ($_GET['send'] === 'UpdatePassword') {
  $pg = $_GET['pg'];
  $userID = $_GET['us_id'];
  $currpass = $_POST['curr_password'];
  if (!empty($userID) && !empty($currpass)) {
    $checkID = $users->dbSelectOne("tb_user", "*", "us_id = '$userID'");
    if ($checkID) {
      if (password_verify($currpass, $checkID['us_passwordHash'])) {
        $newpass = $_POST['txtNewPass'];
        $Cnewpass = $_POST['txtConfirmNewPass'];
        if (!empty($newpass) && !empty($Cnewpass))
          if ($newpass == $Cnewpass) {
            $hashed_password = password_hash($newpass, PASSWORD_DEFAULT);
            $data = [
              'us_passwordHash' => $hashed_password,
            ];
            $users->dbUpdate($tb, $data, "us_id=" . $userID);
            header("location: {$_SERVER['HTTP_ORIGIN']}/$pg?Update=success");
          } else
            header("location: {$_SERVER['HTTP_ORIGIN']}/$pg?Update=fail");
        else
          header("location: {$_SERVER['HTTP_ORIGIN']}/$pg?Update=empty");
      } else
        header("location: {$_SERVER['HTTP_ORIGIN']}/$pg?Update=wrongpass");
    }
  }
} else if ($_GET['send'] === 'register') {
  session_start();
  if ($_POST['otp1'] . $_POST['otp2'] . $_POST['otp3'] . $_POST['otp4'] == $_SESSION['RandomOTP']) {
    $next_userid = $users->dbSelectOne($tb, "max(us_id)+1 as next_id", "", "limit 1")['next_id'];
    $password = $_SESSION['usRe_password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $data = [
      'us_id' => $next_userid == 0 ? 1 : $next_userid,
      'us_name' => $_SESSION['usRe_name'],
      'us_email' => $_SESSION['usRe_email'],
      'us_passwordHash' => $hashed_password,
      $field_img => "no image",
    ];

    $users->dbInsert($tb, $data);
    header("location: {$_SERVER['HTTP_ORIGIN']}/login?Insert=true");
  } else {
    header("location: {$_SERVER['HTTP_ORIGIN']}/register?Insert=false_OTP");
  }
  unset($_SESSION['RandomOTP']);
  unset($_SESSION['usRe_name']);
  unset($_SESSION['usRe_email']);
  unset($_SESSION['usRe_password']);
}

?>