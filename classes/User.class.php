<?php
    include_once("Mailer.php");
    include_once("DatabaseSQL.class.php");
    include_once("Session.class.php");
    include_once("Functions.class.php");
    class User{
    private $table = "users";
    private $user_id;	
    private $user_first_name;
    private $user_last_name;
    private $user_dob;
    private $user_contact_no;
    private $user_email;
    private $user_password;
    private $user_address_line1;
    private $user_address_line2;
    private $user_pincode;
    private $user_role_id;
    private $user_field_of_interest;
    private $is_email_verified;
    private $is_first_login;
    private $created_at;
    private $created_by;
    private $updated_at;    
    private $updated_by;
    private $deleted_at;
    private $deleted_by;
    private $conn;
    
    public function __construct($conn){
            $this->conn = $conn;
        
        }

    function insertUser($data){
           $columnString = implode(",",array_keys($data));
           $valueString = ":".implode(", :",array_keys($data));
           
           $sql = "INSERT INTO {$this->table} ({$columnString}) VALUES ({$valueString})";
        echo "hii";
           
           $ps = $this->conn->prepare($sql);
           
           $result = $ps->execute($data);
           
           if($result){
               return $this->conn->lastInsertId();
           }else{
               return false;
           }
       }
        
     public function insertUserDetails($user_first_name, $user_last_name, $user_phone_number,$user_address,$is_first_login){
			
			$created_by = $_SESSION['user_id'];
        	$current_date = date("Y-m-d h:i:sa");
        	$is_email_verified = 1;
            


			$sql = "UPDATE $this->table set user_first_name='$user_first_name', user_last_name='$user_last_name',        user_phone_number=$user_phone_number,user_address='$user_address',is_email_verified=1,is_first_login=0, created_by=$created_by, updated_by=$created_by,is_deleted=0 where user_id=$created_by";


			
			$db = new DatabaseSQL();
            
			$result = $db->query($sql);
			
		
//			$user_name=$user_first_name." ".$user_last_name;
//			$this->setSession($created_by,$user_name,$user_role_id,$_SESSION['user_email']);
			
			//unlink("images/$img_name");
            
			
			
		}
    function updateUser($data,$condition){
           $i=0;
           $columnValueSet = "";
           foreach($data as $key=>$value){
               $comma = ($i<count($data)-1?", ":"");
               $columnValueSet.=$key."='".$value."'".$comma;
               $i++;
           }
           $sql = "UPDATE $this->table SET $columnValueSet WHERE $condition";
           $ps =  $this->conn->prepare($sql);
           
           $result = $ps->execute();
           if($result){
               return $ps->rowCount();
           }else{
               return false;
           }
       }
        
    function processLogin($email, $password,$signed_in){
        //global $database;
        $db = new DatabaseSQL();
        Session::startSession();
            $_SESSION['user_email']=$email;
//            $sql = "select * from {$this->table} where user_email='$email'";
            $res=$db->query("select * from users where user_email='$email'");
			if($row=mysqli_fetch_assoc($res)){	
				if(password_verify($password,$row['user_password'])){
					$this->setCookies($row['user_id'],$signed_in);
					if($row['is_first_login']==1){
						$_SESSION['user_id']=$row['user_id'];
						Functions::redirect('registerUser.php');
						}
						else{
							$user_name=$row['user_first_name']." ".$row['user_last_name'];
					         // Setting the session variables here for further use 
                            $this->setSession($row['user_id'],$row['user_name'],$row['user_role_id'],$row['user_email']);
							return true;
						}
                } else{
                    return false;
                }
            }
    }
    
    function setSession($user_id,$user_name,$user_role,$email){
			 		$_SESSION['login'] = true;
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['user_name'] = $user_name;
                    $_SESSION['user_role'] = $user_role;
			        $_SESSION['user_email']=$email;
		}
    
    function setCookies($user_id,$signed_in){
			if($signed_in){
                    $cookie_name = "Sahyog";
                    $cookie_content = $user_id;
                    $cookie_time = time() + 86400 * 30;
                    $path = "/";
                    setcookie($cookie_name, $cookie_content, $cookie_time, $path);
                } else{
                    $cookie_name = "Sahyog";
                  
                    $cookie_content = $user_id;
                    $cookie_time = time() + 3600;
                    $path = "/";
                    setcookie($cookie_name, $cookie_content, $cookie_time, $path);
                }
		}  
    
    function sendEmailToRecipient($email){   
        $mailer = new Mailer();

        $subject = "Account Confirmation";

        $base_url_link =BASELANDING."helper/login_routing.php?XSRS=$email";
        $body = "<div><table border='0' cellpadding='0' cellspacing='0' height='100%' style='font-family:&quot;Arial&quot;' width='100%'><tbody><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' style='font-family:&quot;Arial&quot;;border:1px solid #b2b2b2' width='600'><tbody><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' style='font-family:&quot;Arial&quot;;background-color:#fff;font-size:14px;color:#46535e;border-radius:3px;' width='100%'><tbody><tr><td align='left' valign='top'><div style='color:#fff;background:white;padding:0px 20px 0px 20px;text-align:center;'><img align='center' height='auto' src='cid:logo' style='height:auto'></div><hr><div style='margin:0 30px 36px 30px'><span style='display:block;margin:0 0 18px 0;font-size:14px;line-height:2;color:black'><h3>Hi $email,</h3><br> Welcome to The Aptifier! Some Generic Statement.Get started NOW!</span><div style='margin:0 auto;display:table'><a style='font-size:14px;border-radius:3px;display:inline-block;text-decoration:none;color:#fff;text-align:center;padding:15px 20px;width:180px;background-color:#08476E' href='$base_url_link'><img src='cid:favicon' alt='' style='width: 30px;height: 40px;'></a></div></div><div style='line-height:2;margin:30px 0 18px 30px;color:black'>Thank you for registering<br><div>Sincerely,</div><div>Team Aptifier</div></div></td></tr></tbody></table></td></tr><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' style='font-family:&quot;Arial&quot;;font-size:12px;color:#666;padding-top:30px' width='100%'><tbody><tr><td align='left' style='padding:0 20px;font-size:12px;color:#90979e' valign='top'></td></tr><tr><td style='background-color: lightgray;border-top:1px solid #b2b2b2 '><p  style='margin-left: 85px;padding-bottom: 20px;padding-top: 20px;color:gray;'>This email was sent to <span style='color:#08476E'>$email</span> to confirm your Aptifier registration.</p></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></div>";

       return( $mailer->send_mail($email, $body, $subject));
    }
	    function sendForgotPassEmailToRecipient($email){
	    
        $mailer = new Mailer();

        $subject = "Forgot Password Confirmation";

        $base_url_link ="http://localhost/e-learning/includes/resetPassword.php?XSRS=$email";
        $body = "http://localhost/aptifier/includes/register.php?XSRS=$email";
        $body = "<div><table border='0' cellpadding='0' cellspacing='0' height='100%' style='font-family:&quot;Arial&quot;' width='100%'><tbody><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' style='font-family:&quot;Arial&quot;;border:1px solid #b2b2b2' width='600'><tbody><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' style='font-family:&quot;Arial&quot;;background-color:#fff;font-size:14px;color:#46535e;border-radius:3px;' width='100%'><tbody><tr><td align='left' valign='top'><div style='color:#fff;background:white;padding:0px 20px 0px 20px;text-align:center;'><img align='center' height='auto' src='cid:logo' style='height:auto'></div><hr><div style='margin:0 30px 36px 30px'><span style='display:block;margin:0 0 18px 0;font-size:14px;line-height:2;color:black'><h3>Hi $email,</h3><br> Reset your Aptifier Password here,click the link below</span><div style='margin:0 auto;display:table'><a style='font-size:14px;border-radius:3px;display:inline-block;text-decoration:none;color:#fff;text-align:center;padding:15px 20px;width:180px;background-color:#08476E' href='$base_url_link'><img src='cid:favicon' alt='' style='width: 30px;height: 40px;'></a></div></div><div style='line-height:2;margin:30px 0 18px 30px;color:black'>Thank you for registering<br><div>Sincerely,</div><div>Team Aptifier</div></div></td></tr></tbody></table></td></tr><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' style='font-family:&quot;Arial&quot;;font-size:12px;color:#666;padding-top:30px' width='100%'><tbody><tr><td align='left' style='padding:0 20px;font-size:12px;color:#90979e' valign='top'></td></tr><tr><td style='background-color: lightgray;border-top:1px solid #b2b2b2 '><p  style='margin-left: 85px;padding-bottom: 20px;padding-top: 20px;color:gray;'>This email was sent to <span style='color:#08476E'>$email</span> to confirm your Aptifier Forgot Password Request.</p></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></div>";

        return( $mailer->send_mail($email, $body, $subject));
		}
		
        function sendChangePassEmailToRecipient($email){
	    
        $mailer = new Mailer();

        $subject = "Change Password Confirmation";

        $base_url_link ="http://localhost/quiz-handlers/includes/resetPassword.php?XSRS=$email&action=reset";
        $body = "http://localhost/aptifier/includes/register.php?XSRS=$email";
        $body = "<div><table border='0' cellpadding='0' cellspacing='0' height='100%' style='font-family:&quot;Arial&quot;' width='100%'><tbody><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' style='font-family:&quot;Arial&quot;;border:1px solid #b2b2b2' width='600'><tbody><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' style='font-family:&quot;Arial&quot;;background-color:#fff;font-size:14px;color:#46535e;border-radius:3px;' width='100%'><tbody><tr><td align='left' valign='top'><div style='color:#fff;background:white;padding:0px 20px 0px 20px;text-align:center;'><img align='center' height='auto' src='cid:logo' style='height:auto'></div><hr><div style='margin:0 30px 36px 30px'><span style='display:block;margin:0 0 18px 0;font-size:14px;line-height:2;color:black'><h3>Hi $email,</h3><br>Change your Aptifier Password here,click the link below </span><div style='margin:0 auto;display:table'><a style='font-size:14px;border-radius:3px;display:inline-block;text-decoration:none;color:#fff;text-align:center;padding:15px 20px;width:180px;background-color:#08476E' href='$base_url_link'><img src='cid:favicon' alt='' style='width: 30px;height: 40px;'></a></div></div><div style='line-height:2;margin:30px 0 18px 30px;color:black'>Thank you for registering<br><div>Sincerely,</div><div>Team Aptifier</div></div></td></tr></tbody></table></td></tr><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' style='font-family:&quot;Arial&quot;;font-size:12px;color:#666;padding-top:30px' width='100%'><tbody><tr><td align='left' style='padding:0 20px;font-size:12px;color:#90979e' valign='top'></td></tr><tr><td style='background-color: lightgray;border-top:1px solid #b2b2b2 '><p  style='margin-left: 85px;padding-bottom: 20px;padding-top: 20px;color:gray;'>This email was sent to <span style='color:#08476E'>$email</span> to confirm your Aptifier Change Password.</p></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></div>";

        return( $mailer->send_mail($email, $body, $subject));
		}
    }
?>    