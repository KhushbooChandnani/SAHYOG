<?php
require_once('../../includes/bootstrap.php');
$donate = new Donations(new DatabaseSQL());
$donate = new Donations(new DatabaseSQL());
if(isset($_POST['submit_donation'])){
    
    unset($_POST['submit_donation']);
    if($_POST['anonymous_donation']){
        $_POST['anonymous_donation'] = 1;
    }else{
        $_POST['anonymous_donation'] = 0;
    }
    $_POST['user_id'] = $_SESSION['user_id'];
    // print_r($_POST);
    $donate->insert($_POST);
}
?>