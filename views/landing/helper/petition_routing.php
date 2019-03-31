<?php
    
    require_once("../../includes/bootstrap.php");

    Session::startSession();
    // $_SESSION['user_id'] = 1;
    if(isset($_POST['petition_submit'])){
        
        $image = "";

        $petitions = new Petitions();
        if(isset($_FILES['petition_image'])){
            if($_FILES['petition_image']['size'] < 16000000){
               $image = addslashes(file_get_contents($_FILES['petition_image']['tmp_name']));
            }else{
                $image = "";
                $_SESSION['petition_image_upload'] = false;
                header("Location: ../pages/create_petition.php");
            }
        }


        $data = array("petition_problem"=>$_POST['petition_problem'],"petition_describe"=>$_POST['petition_responsible'],"petition_image"=>$image , "user_id"=>$_SESSION['user_id']);

        $id = $petitions->insert($data);

        header("Location: ../pages/petition_signing.php?ID={$id}");




    }else{
        die("either kaise");
    }
?>