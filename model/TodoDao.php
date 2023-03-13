<?php 
      require("BaseDao.php");
      class TodoDao {
        public function __construct() {

        }
        public function readALL(){
            GLOBAL $db;
            $sth = $db->getPdo()->query("SELECT * FROM Todos t INNER JOIN Status s ON s.id = t.statuspk");
            $result = $sth->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

        public function read() {
            echo "read";
        }
        

      }