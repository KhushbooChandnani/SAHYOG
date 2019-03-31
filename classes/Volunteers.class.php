<?php
    class Volunteers{
        private $database;
        private $table_name;
        public function __construct(){
            $this->database = new DatabaseSQL();
            $this->table_name = "Volunteers";
        }

        public function insert($data){
            $res = $this->database->insert($this->table_name , $data);
            return $res;
        }
    }
?>