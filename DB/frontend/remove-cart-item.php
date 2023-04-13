<?php
     session_start();
     require_once "../dbClass.php";
     $dbClass = new dbClass();

     if (isset($_POST['remove-cart-item'])) {

          // shopping cart properties
          $user_id = $_POST['user_id'];
          $product_id = $_POST['product_id'];
          $quantity = $_POST['quantity'];



          // fetch the product data
          $table_product = "tb_product";
          $product_field = "pd_id, pd_countInStock";
          $product_condition = "pd_id = $product_id";
          $product_order = "";

          $product_item = $dbClass->dbSelectOne($table_product, $product_field, $product_condition, $product_order);



          // increase the product count in stock by the cart item quantity
          $addition_product_count_in_stock = $product_item['pd_countInStock'] + $quantity;
          $update_product_data = [
               "pd_countInStock" => $addition_product_count_in_stock
          ];
          $update_product_condition = "pd_id = $product_id";

          $dbClass->dbUpdate($table_product, $update_product_data, $update_product_condition);
          


          // delete the cart item
          $table_shopping_cart = "tb_shopping_cart";
          $delete_shopping_cart_condition = "user_id = $user_id AND instance = 'cart' AND product_id = $product_id";
          $remove_cart_item = $dbClass->dbDelete($table_shopping_cart, $delete_shopping_cart_condition);

          

          // redirect to router /
          header("Location: /");
          exit();
     }
?>
