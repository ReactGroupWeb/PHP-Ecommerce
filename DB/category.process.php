<?php
     include "dbConnection.php";
     include "dbClass.php";

     $tb = "tb_category";
     $categorys = new dbClass();
     $field_img = "cg_icon";

     if (isset($_POST['submit'])) {
          
          if (!empty($_POST['cg_name'])) {

               // send field_img and return $save_name
               include "helper/upload_img.php";

               $data = [
                    'cg_name' => $_POST['cg_name'],
                    $field_img => $save_name
               ];

               $categorys->dbInsert($tb, $data);

               header("location: {$_SERVER['HTTP_ORIGIN']}/admin_" . substr($tb, 3) . "?status=added");
          } 
          else{
               header("location: {$_SERVER['HTTP_ORIGIN']}/admin_" . substr($tb, 3) . "?status=added_failed");
          }       
     } 
     else if ($_GET['send'] === 'del') {

          $id = $_GET['id'];
          $pg = $_GET['pg'];
          $filename = "../assets/images/" . substr($tb, 3) . "/" . $categorys->dbSelectOne($tb, $field_img, "cg_id=" . $id)[$field_img];

          // send $filename to delete file image
          include "helper/delete_img.php";

          $categorys->dbDelete($tb, "cg_id=" . $id);

          header("location: {$_SERVER['HTTP_ORIGIN']}/admin_" . substr($tb, 3) . "?status=delete&pg=$pg");
     } 
     else if ($_GET['send'] === 'update') {

          $id = $_GET['cg_id'];
          $pg = $_GET['pg'];
          $field_img = "cg_edicon";

          // send field_img and return $save_name
          include "helper/upload_img.php";

          $field_img = "cg_icon";
          $old_img = $categorys->dbSelectOne($tb, $field_img, "cg_id=" . $id)[$field_img];
       
          if ($save_name) {
               $filename = "../assets/images/" . substr($tb, 3) . "/" . $categorys->dbSelectOne($tb, $field_img, "cg_id=" . $id)[$field_img];

               // send $filename to delete file image
               include "helper/delete_img.php";
          }
          $data = [
               'cg_name' => $_POST['cg_edname'],
               $field_img => $save_name ? $save_name : $old_img,
          ];

          $categorys->dbUpdate($tb, $data, "cg_id=" . $id);
          
          header("location: {$_SERVER['HTTP_ORIGIN']}/admin_" . substr($tb, 3) . "?status=update&pg=$pg");
     }
?>