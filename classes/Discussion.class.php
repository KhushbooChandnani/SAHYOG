<?php
    class Discussion{
        private $database;
        private $table_name;
        public function __construct(){
            $this->database = new DatabaseSQL();
            $this->table_name = "discussion";
        }
        
           public function insert($data){
            $res = $this->database->insert($this->table_name ,$data);
            return $res;
        }

        public function select($id){
            $where = "discussion_id = {$id}";
            $res = $this->database->select($this->table_name , $where);
            return $res;
        }

        public function selectAll(){
           $res = $this->database->selectAll($this->table_name);
           return $res; 
        }
        
        public function getUserId($id){
            $res = "SELECT user_id as id FROM discussion WHERE discussion_id = {$id}";
            
			$db = new DatabaseSQL();
            
			$result = $db->query($res);
            
            $row = $result->fetch_assoc();
            return $row['id'];
        }
        
    }
?>