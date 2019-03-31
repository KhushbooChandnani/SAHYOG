<?php
class EventDonors{
    private $database;
    private $table_name;
    public function __construct($database){
        $this->database = $database;
        $this->table_name = "event_donors";
    }

    public function insert($data){
        $res = $this->database->insert($this->table_name , $data);
        return $res;

    }

    public function select($id){
        $query = "SELECT * FROM {$this->table_name} WHERE event_id = {$id}";

        $res = $this->database->query($query);

        return $res;
    }

    public function selectAll(){
        $query = "SELECT * FROM {$this->table_name}";
        $res = $this->database->query($query);
        return $res;
    }
}
?>