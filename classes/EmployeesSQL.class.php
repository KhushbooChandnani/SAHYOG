<?php
    class EmployeesSQL{
        private $database;
        private $table_name;
        public function __construct(){
            $this->database = new DatabaseSQL();
            $this->table_name = "employees";

        }

        public function insert($data){
            $res = $this->database->insert($this->table_name , $data);
            return $res;
        }

        public function select($employee_id){
            $where = "employee_id = {$employee_id}";

            $res = $this->database->select($this->table_name , $where);

            return $res;
        }

        public function selectAll(){
            $res = $this->database->selectAll();

            return $res;
        }


    }
?>