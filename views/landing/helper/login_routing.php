<?php
session_start();
require_once("../../includes/bootstrap.php");
if(isset($_POST['login_submit'])){
	extract($_POST);
    $db = new DatabaseSQL();
    $connection = $db->getConnection();
	$obj = new User($connection);
	$signed_in=($_POST['signed_in']==='Remember me') ? 1 : 0;
	
    if( $obj->processLogin($user_email, $user_password,$signed_in) ) {
        Functions::redirect("index.php");
    }
}else if(isset($_POST['register'])){
    echo "hii";
    $db = new DatabaseSQL();
    $connection = $db->getConnection();
    $user = new User($connection);
    
    $user_email = $_POST['email'];
    $password = $_POST['password'];
    if($user_email!='' && $password!=''){
        if($user->sendEmailToRecipient($user_email)){
        $user_password = password_hash($password,PASSWORD_DEFAULT);
        $data = array("user_email"=>$user_email,"user_password"=>$user_password,"is_email_verified"=>0,"is_first_login"=>1);
        $table = "users";
        $db->insert($table,$data);

        }else{
            echo "email sending failed!";
        }
    }
    
}else if(isset($_GET['XSRS'])){
       Functions::redirect("login.php?p={$_GET['XSRS']}");
}else if(isset($_POST['submit_user_details'])){
    
    Session::startSession();
    extract($_POST);
    $db = new DatabaseSQL();
    $conn = $db->getConnection();
    $user = new User($conn);
    $is_first_login = 0;
    
    $result = $user->insertUserDetails($user_first_name,$user_last_name,$user_phone_number,$user_address,$is_first_login);
    $user_id = $_SESSION['user_id'];
	Functions::redirect('tp.php');
}


if(isset($_GET['status'])){
	if($_GET['status']=="unset"){
		unset($_SESSION['user_id']);
//		print_r($_SESSION);
//		echo "unseetd";
//		die();
		Functions::redirect('index.php');
	}
}
?>