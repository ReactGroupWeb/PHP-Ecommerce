<?php
     include "dbConnection.php";
     include "dbClass.php";
     
     $tb = "tb_slideshow";
     $slideshows = new dbClass();
     $field_img = "ss_image";

     if (isset($_POST['submit'])) {

          if (!empty($_POST['ss_title']) && !empty($_POST['ss_event']) && !empty($_POST['ss_description']) && !empty($_POST['ss_url'])) {
               $next_ssorder = $slideshows->dbSelectOne($tb, "max(ss_order)+1 as next_ssorder", "", "limit 1")['next_ssorder'];
               $next_ssid = $slideshows->dbSelectOne($tb, "max(ss_id)+1 as next_id", "", "limit 1")['next_id'];

               // send field_img and return $save_name
               include "helper/upload_img.php";

               $data = [
                    'ss_id' => $next_ssid == 0 ? 1 : $next_ssid,
                    'ss_title' => $_POST['ss_title'],
                    'ss_event' => $_POST['ss_event'],
                    'ss_description' => $_POST['ss_description'],
                    $field_img => $save_name,
                    'ss_url' => $_POST['ss_url'],
                    'ss_order' => $next_ssorder == 0 ? 1 : $next_ssorder,
               ];

               $slideshows->dbInsert($tb, $data);

               header("location: {$_SERVER['HTTP_ORIGIN']}/admin_" . substr($tb, 3) . "?status=added");
          } 
          else{
               header("location: {$_SERVER['HTTP_ORIGIN']}/admin_" . substr($tb, 3) . "?status=added_failed");
          }   
     } 
     else if ($_GET['send'] === 'del') {

          $id = $_GET['id'];
          $pg = $_GET['pg'];
          $filename = "../assets/images/" . substr($tb, 3) . "/" . $slideshows->dbSelectOne($tb, $field_img, "ss_id=" . $id)[$field_img];

          // send $filename to delete file image
          include "helper/delete_img.php";

          $slideshows->dbDelete($tb, "ss_id=" . $id);

          header("location: {$_SERVER['HTTP_ORIGIN']}/admin_" . substr($tb, 3) . "?status=delete&pg=$pg");
     } 
     else if ($_GET['send'] === 'update') {

          $id = $_GET['ss_id'];
          $pg = $_GET['pg'];
          $field_img = "ss_edimage";

          // send field_img and return $save_name
          include "helper/upload_img.php";
          $field_img = "ss_image";
          $old_img = $slideshows->dbSelectOne($tb, "$field_img", "ss_id=" . $id)[$field_img];

          if ($save_name) {
               $filename = "../assets/images/" . substr($tb, 3) . "/" . $slideshows->dbSelectOne($tb, $field_img, "ss_id=" . $id)[$field_img];
               // send $filename to delete file image
               include "helper/delete_img.php";
          }

          $data = [
               'ss_title' => $_POST['title'],
               'ss_event' => $_POST['event'],
               'ss_description' => $_POST['description'],
               $field_img => $save_name ? $save_name : $old_img,
               'ss_url' => $_POST['url'],
          ];

          $slideshows->dbUpdate($tb, $data, "ss_id=" . $id);

          header("location: {$_SERVER['HTTP_ORIGIN']}/admin_" . substr($tb, 3) . "?status=update&pg=$pg");
     } 
     else if ($_GET['send'] === 'MO') { //MO => Move Order
          
          $curr_id = $_GET['ss_id'];
          $curr_ssorder = $_GET['ss_order'];
          $direction = $_GET['direction'];
          $pg = $_GET['pg'];
          $next_ssorder = $slideshows->dbSelectOne($tb, "ss_id, ss_order", "ss_order " . ($direction == "up" ? "<" : ">") . " $curr_ssorder", "order by ss_order " . ($direction == "up" ? "desc" : "asc") . " limit 1");

          $currdata = [
               'ss_order' => $curr_ssorder
          ];
          $nextdata = [
               'ss_order' => $next_ssorder['ss_order']
          ];

          if ($next_ssorder != false) {
               $slideshows->dbUpdate($tb, $currdata, "ss_id = " . $next_ssorder['ss_id']);
               $slideshows->dbUpdate($tb, $nextdata, "ss_id = " . $curr_id);
          }

          echo $currdata['ss_order'] . "=>" . $next_ssorder['ss_id'];
          echo $nextdata['ss_order'] . "=>" . $curr_id;

          header("location: {$_SERVER['HTTP_ORIGIN']}/admin_" . substr($tb, 3) . "?move=$direction&pg=$pg");
     } 
     else if ($_GET['send'] === 'eye') {

          $pg = $_GET['pg'];
          $id = $_GET['ss_id'];
          $enable = $_GET['ss_enable'] == "1" ? "0" : "1";
          $data = [
               'ss_enable' => $enable
          ];

          $slideshows->dbUpdate($tb, $data, "ss_id=" . $id);

          header("location: {$_SERVER['HTTP_ORIGIN']}/admin_" . substr($tb, 3) . "?status=eye&pg=$pg");
     }
?>