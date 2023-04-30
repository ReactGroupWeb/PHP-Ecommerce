<?php
     session_start();
     require_once "../dbClass.php";
     require_once "../../vendor/stripe/stripe-php/init.php";
     require_once "../../vendor/autoload.php";

     $dbClass= new dbClass();

     if(isset($_POST['place-order'])){

          // order properties
          $user_id = $_POST['us_id'];
          $firstname = $_POST['firstname'];
          $lastname = $_POST['lastname'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $city = $_POST['city'];
          $country = $_POST['country'];
          $shippingAddress = $_POST['shippingAddress'];
          $subTotal = $_POST['subTotal'];
          $tax = $_POST['tax'];
          $totalPrice = $_POST['totalPrice'];


          $table_order = "tb_order";
          $order_data = [
               "us_id" => $user_id,
               "firstname" => $firstname,
               "lastname" => $lastname,
               "phone" => $phone,
               "email" => $email,
               "shippingAddress" => $shippingAddress,
               "city" => $city,
               "country" => $country,
               "tax" => $tax,
               "subTotal" => $subTotal,
               "totalPrice" => $totalPrice
          ];

          $place_order = $dbClass->dbInsert($table_order, $order_data);
          

          // order detail properties
          $order_id = $_POST['od_id'];
          $product_id = $_POST['pd_id'];
          $quantity = $_POST['quantity'];

          $table_shopping_cart = "tb_shopping_cart";
          $fields = "*";
          $condition = "user_id = $user_id AND instance = 'cart'";
          $order = "";
          $cart_items = $dbClass->dbSelect($table_shopping_cart, $fields, $condition, $order);

          foreach($cart_items as $cItem){
               
               $table_order_detail = "tb_orderdetail";
               $order_detail_data = [
                    "od_id" => $order_id,
                    "pd_id" => $cItem['product_id'],
                    "quantity" => $cItem['quantity']
               ];

               $place_order = $dbClass->dbInsert($table_order_detail, $order_detail_data);
          }
          

          // transaction properties (Cash on Delivery, Credit Card, or Paypal)
          if(isset($_POST['payment-method'])){

               $paymentmode = $_POST['payment-method'];
               $table_transaction = "tb_transaction";
               
               // properties for pay method
               $card_no = $_POST['card-no'];
               $exp_month = $_POST['expiry-month'];
               $exp_year = $_POST['expiry-year'];
               $cvc = $_POST['cvc'];

               // payment by cash on delivery 
               if($paymentmode == "cash_on_delivery"){
                    $transaction_data = [
                         "us_id" => $user_id,
                         "od_id" => $order_id,
                         "tmode" => "cash_on_delivery",
                         "tstatus" => "pending"
                    ];
          
                    $place_order = $dbClass->dbInsert($table_transaction, $transaction_data);
               }

               // payment by credit card 
               else if($paymentmode == "card"){

                    // stripe secret key
                    \Stripe\Stripe::setApiKey("sk_test_51LpuVUGSdYN9NwxFcpKS0OizpcX8WJG88B7ubqsZGNrJb9WEmlxZXP1QGtWYtgo8Jsuspfj1jUN0y0dsux54ul3i00vWDRxKSN");
                                   
                    // Create a charge: this will charge the user's card
                    try {
                         if(isset($_POST['stripeToken'])){
                              $token = $_POST['stripeToken']; 
                         } else {
                              // create a token from the credit card details
                              $token = \Stripe\Token::create(array(
                                   'card' =>[
                                        'number' => $card_no,
                                        'exp_month' => $exp_month,
                                        'exp_year' => $exp_year,
                                        'cvc' => $cvc
                                   ]
                              ));
                         }
                    
                         if(!isset($token['id'])){
                              echo "The Stripe token was not generated correctly";
                         }
                    
                         $customer = \Stripe\Customer::create(array(
                              'name' => $firstname . ' ' . $lastname,
                              'email' => $email,
                              'phone' => $phone,
                              'address' => [
                                   'city' => $city,
                                   'country' => $country,
                                   'line1' => $shippingAddress
                              ],
                              'source' => $token['id']
                         ));
                    
                         $charge = \Stripe\Charge::create(array(
                              "customer" => $customer['id'],
                              "currency" => "usd",
                              "amount" => $totalPrice * 100, // Amount in cents
                              "description" => "Payment for order no " . $order_id
                         ));
                         
                         if($charge['status'] == 'succeeded'){
                              $transaction_data = [
                                   "us_id" => $user_id,
                                   "od_id" => $order_id,
                                   "tmode" => "card",
                                   "tstatus" => "approved"
                              ];
                    
                              $place_order = $dbClass->dbInsert($table_transaction, $transaction_data);
                         }
                         else{
                              echo "Error in Transaction";
                         }
                    } catch(\Stripe\Exception\CardException $e) {
                         // The card has been declined
                         echo $e->getMessage();
                    }
               }
          }
          else{
               echo "No Payment Method has been added";
          }

          // redirect to rotuer /
          if($place_order){

               // clear cart item when checkout
               $condition = "user_id = $user_id AND instance = 'cart'";
               $cart_items = $dbClass->dbDelete($table_shopping_cart, $condition);

               header("Location: /thank-you");
          }

     }
?>