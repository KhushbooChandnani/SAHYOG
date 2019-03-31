<?php
require_once("../../includes/bootstrap.php");
Session::startSession();
if(isset($_POST['discussion_submit'])){
extract($_POST);
if($_FILES['discussion_image']['size'] > 16000000) {
    
    $discussion_image="none";
    $is_image = 0;
    }
    else{ 
    
	
        
    $discussion_image = addslashes(file_get_contents($_FILES["discussion_image"]["tmp_name"]));
        

           $is_image = 1;

    }
    $user_id = $_SESSION['user_id'];
    
    $data = array("user_id"=>$user_id,"discussion_title"=>$discussion_title,"is_image"=>$is_image,
                  "discussion_image"=>$discussion_image,
                  "discussion_link"=>$discussion_link);
    
    $db = new DatabaseSQL();
    $res = $db->insert("discussion",$data);
    


}else if(isset($_POST['submit_comment'])){
    $id = $_SESSION['user_id'];
    extract($_POST);
    $obj = new Discussion();
    $ans = $obj->getUserId($_SESSION['discussion_id']);
    if($id == $ans){
        $reply_to = -1;
    $data = array("discussion_id"=>$_SESSION['discussion_id'],"user_id"=>$_SESSION['user_id'],"comment_text"=>$comment_text,"reply"=>$id,"reply_to"=>$reply_to);
        
    }else{
        $reply = -1;
        $data = array("discussion_id"=>$_SESSION['discussion_id'],"user_id"=>$_SESSION['user_id'],"comment_text"=>$comment_text,"reply"=>$reply,"reply_to"=>$ans);
    }
    
    $db = new DatabaseSQL();
    $res = $db->insert("comments",$data);
    
}
?>