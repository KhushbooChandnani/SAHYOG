<?php
    require_once("../../includes/bootstrap.php");

    if(isset($_POST['action'])){
        if($_POST['action'] == "add_contact"){
            $database = new DatabaseSQL();
            $data = array("user_id" => $_POST['user_id'] , "user_contact_name" => $_POST['user_contact_name'] , "user_contact_number"=>$_POST['user_contact_number']);
            $res = $database->insert("user_contact", $data);

            if($res > 0){
                echo json_encode(["status"=>true]);
            }

            
        }
    }


?>
