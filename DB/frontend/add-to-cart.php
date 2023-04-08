<?php
     session_start();
     require_once "../dbClass.php";

     if(isset($_POST['add-to-cart'])){
          if(!empty($_POST['user_id']) && !empty($_POST['product_id']) && !empty($_POST['instance']) && !empty($_POST['quantity'])){

               $user_id = $_POST['user_id'];
               $product_id = $_POST['product_id'];
               $instance = $_POST['instance'];
               $quantity = $_POST['quantity'];

               $insert_cart_item = new dbClass();
               $table = "tb_shopping_cart";
               $data = [
                    'user_id' => $user_id,
                    'product_id' => $product_id,
                    'instance' => $instance,
                    'quantity' => $quantity
               ];
               $add_to_cart = $insert_cart_item->dbInsert($table, $data);

               if($add_to_cart){
                    header("Location: /");
               }
     
          } 
     }

     
?>