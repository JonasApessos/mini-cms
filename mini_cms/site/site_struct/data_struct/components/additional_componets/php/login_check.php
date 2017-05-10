<?php
session_start();
?>
<?php
include "../../../../document_data/document_data.php"; 
include_once "../../../../document_data/db_conn.php"; 
?>
<?php

$email = $_POST['login_email'];
$password = crypt($_POST['password_login'],"T51");

$sql = "SELECT * 
FROM ".$prefix."user 
WHERE user_email = \"".$email."\" 
AND user_password = \"".$password."\" LIMIT 1;";

$user_rows = mysqli_query($conn , $sql) or die("ERROR 07: ".mysqli_query($conn));

foreach($user_rows as $user_row => $user_data)
{
	if(!isset($user_data['user_id']))
	{
		Header("Location: ../../../../../index.php");
	}
	else
	{
		$_SESSION['user_name'] = $user_data['user_name'];
		$_SESSION['user_email'] = $user_data['user_email'];
		$_SESSION['access_level'] = $user_data['accessLv_id'];
		$_SESSION['user_id'] = $user_data['user_id'];
		$sql = "
		INSERT INTO ".$prefix."userLogin(userLogin_state,userLogin_date,user_id)
		VALUES (TRUE,NOW(),".$_SESSION['user_id'].");";
		mysqli_query($conn , $sql) or die("ERROR 08: ".mysqli_error($conn));
	}
}
$user_data = NULL;
$user_row = NULL;
echo "user_id: ".$_SESSION['user_id'];
//$sql = "
//INSERT INTO ".$prefix."userLogin(userLogin_state,userLogin_date,user_id)
//VALUES (TRUE,NOW(),".$_SESSION['user_id'].");";

//mysqli_query($conn , $sql) or die("ERROR 08: ".mysqli_error($conn));



mysqli_close($conn);

$sql = NULL;
$conn = NULL;
$user_rows = NULL;
$email = NULL;
$password = NULL;


Header("Location: ../../../../../index.php");
?>