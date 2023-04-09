<?php
     session_start();
     require_once "../dbClass.php";
     $dbClass= new dbClass();

     if(isset($_SESSION['us_id'])){
          $user_id = $_SESSION['us_id'];
     }

     // if(isset($_POST['add-to-cart'])){
          
     // }
?>