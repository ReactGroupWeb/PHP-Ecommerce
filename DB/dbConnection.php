<?php

     class Dbh
     {
          private $host = "localhost:";
          private $port = "3306";
          private $user = "root";
          private $pwd = "";
          private $dbName = "a3phpdb";

          public function dbConn()
          {
               try {
                    $dsn = 'mysql:host=' . $this->host . $this->port . ';dbname=' . $this->dbName;
                    $conn = new PDO($dsn, $this->user, $this->pwd);
                    // $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    return $conn;
               } catch (PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
               }
          }
          // Close a database
          public function dbClose($conn)
          {
               $conn = null;
          }
     }
?>