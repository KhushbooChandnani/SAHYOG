<?php
require_once('../../includes/bootstrap.php');
$users = new User();
if($_POST['action'] == 'login'){
    $res = $users->processLogin($_POST['user_email'], $_POST['user_password']);
    // $res = mysqli_fetch_assoc($res);
    if(mysqli_num_rows($res)==1)
    {
        $res = mysqli_fetch_assoc($res);
        $res['status'] = true;
    }else{
        $res = mysqli_fetch_assoc($res);
        $res['status'] = false;
    }
    echo json_encode($res);
}
?>