<?php
session_start();
?>
<?php
require "../../../../document_data/document_data.php"; 
require_once "../../../../document_data/db_conn.php"; 
?>
<?php
$email = $_POST['login_email'];
$password = crypt($_POST['password_login'],"T51");

$sql = "
SELECT ".$prefix."user.user_name , ".$prefix."user.user_email , ".$prefix."user.accessLv_id , ".$prefix."user.user_id
FROM ".$prefix."user 
WHERE ".$prefix."user.user_email = \"".$email."\" 
AND ".$prefix."user.user_password = \"".$password."\"
AND ".$prefix."user.user_blocked = FALSE 
LIMIT 1;";

$user_rows = mysqli_query($conn , $sql) or die("ERROR 1");

$user_row = mysqli_fetch_array($user_rows, MYSQLI_ASSOC);

if(empty($user_row))
{
	mysqli_free_result($user_rows);
	
	mysqli_close($conn);
	
	Header("Location: ../../../../../index.php?err_msg=wrong email or password , please try again");
}
else
{
	$_SESSION['user_name'] = $user_row['user_name'];
	$_SESSION['user_email'] = $user_row['user_email'];
	$_SESSION['access_level'] = $user_row['accessLv_id'];
	$_SESSION['user_id'] = $user_row['user_id'];
	$sql = "
	INSERT INTO ".$prefix."userLogin(userLogin_state,userLogin_date,user_id)
	VALUES (TRUE,NOW(),".$_SESSION['user_id'].");";
	mysqli_query($conn , $sql) or die("ERROR 2");
	
	mysqli_free_result($user_rows);
	
	mysqli_close($conn);
	
	Header("Location: ../../../../../index.php");
}
?>