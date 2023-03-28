<?php
     if (file_exists($_FILES[$field_img]['tmp_name']) || is_uploaded_file($_FILES[$field_img]['tmp_name'])) {
          $tmpFilePath = $_FILES[$field_img]['tmp_name'];
          $ori_name = $_FILES[$field_img]['name'];
          $save_name = date("Y-m-d") . "_" . date("h-i-sa") . "_" . $ori_name;
          $ext = pathinfo($ori_name, PATHINFO_EXTENSION);

          if ($ext == 'gif' || $ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'tiff' || $ext == 'svg') {
               $size = $_FILES[$field_img]['size'];
               $type = $_FILES[$field_img]['type'];
               $error = $_FILES[$field_img]['error'];
               move_uploaded_file($tmpFilePath, "../assets/images/" . substr($tb, 3) . "/" . $save_name);
          }
     }

?>