<?php
require_once("../../includes/bootstrap.php");
Session::startSession();
if(isset($_POST['petition_sign'])){
    echo "hii";
    $petition_id = $_POST['petition_id'];
    $user_id = $_SESSION['user_id'];

    $signedPetition = new SignedPetition();

    $data = array("petition_id"=>$petition_id , "user_id"=>$user_id);

    $signedPetition->insert($data);
}
?>