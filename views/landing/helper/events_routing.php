<?php
require_once("../../includes/bootstrap.php");
session_start();
$event = new Events();
if(isset($_POST['add_event'])){
    $image = "";
    if(isset($_FILES['event_image'])){
        $_POST['is_image'] = 1;
        if($_FILES['event_image']['size'] < 16000000){
           $image = addslashes(file_get_contents($_FILES['event_image']['tmp_name']));
        }else{
            $image = "";
            $_SESSION['event_image_upload'] = false;
            header("Location: ../pages/add-event.php");
        }
    }
    
    $_POST['event_image'] = $image;

    if(isset($_POST['event_video_link'])){
        $_POST['is_video'] = 1;
        $_POST['event_video_link'] = explode('/', $_POST['event_video_link'])[3];
    }

    $_POST['suggested_by'] = $_SESSION['user_id'];
    unset($_POST['add_event']);
    // print_r($_POST);
    // print_r($_FILES);
    $event->insert($_POST);
}else if(isset($_POST['participate'])){
    $parti = new Participants();
    unset($_POST['participate']);
    $_POST['user_id'] = $_SESSION['user_id'];
    $parti->insert($_POST);
}
?>