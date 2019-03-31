<?php
    class SignedPetition{
        private $database;
        private $table_name;
        public function __construct(){
            $this->database = new DatabaseSQL();
            $this->table_name = "signedpetition";
        }

        public function select($petition_id , $user_id){
            $where = "petition_id = {$petition_id} AND user_id = {$user_id}";

            $res = $this->database->select($this->table_name , $where);

            

            if(mysqli_num_rows($res)>0){
                return true;
            }else{
                return false;
            }
            return false;

        }

        public function insert($data){
            // print_r($res);
            $res = null;
           if($this->select($data['petition_id'], $data['user_id'])) 
                $res = $this->database->insert($this->table_name,$data);
            return $res;
        }


        public function totalSigns($petition_id){
            $where = "petition_id = {$petition_id}";

            $res = $this->database->select($this->table_name,$where);

            $count = count($res);

            return $count;

        }

    }
?>