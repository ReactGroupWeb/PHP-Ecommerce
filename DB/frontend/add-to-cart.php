<?php
     session_start();
     require_once "../dbClass.php";
     $dbClass= new dbClass();

     if(isset($_POST['add-to-cart'])){
          
          if(!empty($_POST['user_id']) && !empty($_POST['product_id']) && !empty($_POST['instance']) && !empty($_POST['quantity'])){

               // shopping cart properties
               $user_id = $_POST['user_id'];
               $product_id = $_POST['product_id'];
               $instance = $_POST['instance'];
               $quantity = $_POST['quantity'];

               

               // fetch the product data
               $table_product = "tb_product";
               $product_field = "pd_id, pd_countInStock";
               $product_condition = "pd_id = $product_id";
               $product_order = "";

               $product_item = $dbClass->dbSelectOne($table_product, $product_field, $product_condition, $product_order);



               // decrease the product count in stock by 1 when clicked add to cart button
               $substract_product_count_in_stock = $product_item['pd_countInStock'] - $quantity;
               $update_product_data = [
                    "pd_countInStock" => $substract_product_count_in_stock
               ];
               $update_product_condition = "pd_id = $product_id";

               $dbClass->dbUpdate($table_product, $update_product_data, $update_product_condition);



               // fetch the shopping cart items
               $table_shopping_cart = "tb_shopping_cart";
               $shopping_cart_field = "*";
               $shopping_cart_condition = "user_id = $user_id AND instance = 'cart'";
               $shopping_cart_order = "";

               $cart_items = $dbClass->dbSelect($table_shopping_cart, $shopping_cart_field, $shopping_cart_condition, $shopping_cart_order);



               // update the cart quantity, if the product id in product table and shopping cart table are matching and exist one
               $product_in_cart = false;
               foreach($cart_items as $cart_item) {

                    // compare the product id of product table and product id of shopping carts table
                    if($product_item['pd_id'] == $cart_item['product_id']){

                         $cart_id = $cart_item['id'];
                         $cart_quantity = [
                              'quantity' => $cart_item['quantity'] += $quantity
                         ];
                         $update_shopping_cart_condition = "id = $cart_id";

                         $add_to_cart = $dbClass->dbUpdate($table_shopping_cart, $cart_quantity, $update_shopping_cart_condition);

                         $product_in_cart = true;
                         break;
                    }
               }



               // insert the data if there is no cart item added before
               if(!$product_in_cart) {
                    $data = [
                         'user_id' => $user_id,
                         'product_id' => $product_id,
                         'instance' => $instance,
                         'quantity' => $quantity
                    ];
     
                    $add_to_cart = $dbClass->dbInsert($table_shopping_cart, $data);
               }



               // redirect to rotuer /shop
               if($add_to_cart){
                    header("Location: /shop");
               }
     
          } 
     }

     
?>
