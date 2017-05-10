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
AND user_password = \"".$password."\";";
$user_rows = mysqli_query($conn , $sql) or die("no user found: ".mysqli_error($conn));

if(mysqli_error($conn))
	Header("Location: ../../../../../index.php");
else
{
	foreach($user_rows as $user_row => $user_data)
	{
		$_SESSION['user_name'] = $user_data['user_name'];
		$_SESSION['user_email'] = $user_data['user_email'];
		$_SESSION['access_level'] = $user_data['accessLv_id'];
	}
	$user_data = NULL;
	$user_row = NULL;
}

$sql = "
UPDATE ".$prefix."user 
SET ".$prefix."user.user_state = TRUE , ".$prefix."user.user_logged_in = NOW() 
WHERE ".$prefix."user.user_email = \"".$email."\" 
AND ".$prefix."user.user_password = \"".$password."\";";

mysqli_query($conn , $sql) or die("ERROR 25: ".mysqli_error($conn));

mysqli_close($conn);

$sql = NULL;
$conn = NULL;
$user_rows = NULL;
$email = NULL;
$password = NULL;


Header("Location: ../../../../../index.php");
?>