<?php
     require_once "dbConnection.php";
     class dbClass extends Dbh
     {
          public function dbSelect($table, $column = "*", $criteria = "", $clause = "")
          {
               if (empty($table))
                    return false;

               $sql = "select " . $column . " from " . $table;

               if (!empty($criteria))
                    $sql .= " where " . $criteria;
               if (!empty($clause))
                    $sql .= " " . $clause;

               $conn = $this->dbConn();
               $stmt = $conn->prepare($sql);
               $stmt->execute();
               $result = $stmt->fetchAll();
               if (!$result) {
                    // echo "There no Data in " . substr($table, 3);
                    return false;
               }
               $this->dbClose($conn);
               return $result;
          }
          public function dbSelectOne($table, $column = "*", $criteria = "", $clause = "")
          {
               if (empty($table))
                    return false;

               $sql = "select " . $column . " from " . $table;

               if (!empty($criteria))
                    $sql .= " where " . $criteria;
               if (!empty($clause))
                    $sql .= " " . $clause;

               $conn = $this->dbConn();
               $stmt = $conn->prepare($sql);
               $stmt->execute();
               $result = $stmt->fetch();
               if (!$result) {
                    echo "Error in selecting data : " . $stmt->errorInfo();
                    return false;
               }
               $this->dbClose($conn);
               return $result;
          }
          function dbInsert($table, $data = array())
          {
               if (empty($table) || empty($data)) {
                    return false;
               }
               $conn = $this->dbConn();
               $fields = implode(",", array_keys($data));
               $values = implode("','", array_values($data));
               $sql = "insert into " . $table . " (" . $fields . ") values ('" . $values . "')";

               $stmt = $conn->prepare($sql);
               $stmt->execute();
               if (!$stmt) {
                    echo ("Error description: " . $stmt->errorInfo());
                    return false;
               }
               $this->dbClose($conn);
               return true;
          }
          public function dbDelete($table, $criteria) //dbDelete(" table name ", "id=".$id);
          {
               if (empty($table) || empty($criteria)) {
                    return false;
               }
               $sql = "delete from " . $table . " where " . $criteria;
               $conn = $this->dbConn();
               $stmt = $conn->prepare($sql);
               $stmt->execute();

               if (!$stmt) {
                    echo ("Error description: " . $stmt->errorInfo());
                    return false;
               }
               $this->dbClose($conn);
               return true;
          }
          function dbUpdate($table, $data = array(), $criteria = "")
          {
               if (empty($table) || empty($data) || empty($criteria)) {
                    return false;
               }

               $fv = "";
               $conn = $this->dbConn();
               foreach ($data as $field => $value) {
                    $fv .= " " . $field . "='" . $value . "',";
               }
               $fv = substr($fv, 0, strlen($fv) - 1);
               $sql = "update " . $table . " set " . $fv . " where " . $criteria;

               $stmt = $conn->prepare($sql);
               $stmt->execute();

               if (!$stmt) {
                    echo ("Error description: " . $stmt->errorInfo());
                    return false;
               }
               $this->dbClose($conn);
               return true;
          }
          function dbCount($table = "", $criteria = "")
          {
               if (empty($table)) {
                    return false;
               }
               $sql = "select * from " . $table;
               if (!empty($criteria)) {
                    $sql .= " where " . $criteria;
               }
               $conn = $this->dbConn();
               $stmt = $conn->query($sql);
               // $stmt->execute();
               $num = $stmt->rowCount();

               if (!$stmt) {
                    echo ("Error description: " . $stmt->errorInfo());
                    return false;
               }
               $this->dbClose($conn);
               return $num;
          }
     }

?>