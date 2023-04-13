<?php
     date_default_timezone_set('Asia/Phnom_Penh');
     session_start();
     require_once "../dbClass.php";
     $dbClass= new dbClass();

     if(isset($_POST['accept_delivered'])){

          if(!empty($_POST['user_id']) && !empty($_POST['order_id'])){

               $user_id = $_POST['user_id'];
               $order_id = $_POST['order_id'];


               $table_order = "tb_order";
               $order_status = [
                    'status' => 'delivered',
                    'dateSuccess' => date("Y-m-d H:i:s")
               ];
               $condition_order = "us_id = $user_id AND od_id = $order_id";
               $accept_deliver = $dbClass->dbUpdate($table_order, $order_status, $condition_order); 
               

               // redirect to rotuer /my-dashboard
               if($accept_deliver){
                    header("Location: /my-dashboard");
               }
          }

     }

?>