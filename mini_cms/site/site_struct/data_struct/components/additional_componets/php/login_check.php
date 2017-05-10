<?php
session_start();
?>

<?php
include "../../../../document_data/document_data.php"; 
include_once "../../../../document_data/db_conn.php"; 
?>

<?php

$email = $_POST['login_email'];
$password = $_POST['password_login'];

$sql = "SELECT * FROM re2213_user WHERE user_email = \"".$email."\" and user_password = \"".$password."\";";
$user_rows = mysqli_query($conn , $sql)or die("ERROR 25 " . mysqli_error($conn));

foreach($user_rows as $user_row)
{
	$_SESSION['user_name'] = $user_row['user_name'];
	$_SESSION['user_email'] = $user_row['user_email'];
	$_SESSION['access_level'] = $user_row['access_level_id'];
	$user_row = NULL;
}


mysqli_close($conn);

$sql = NULL;
$conn = NULL;
$user_rows = NULL;
$email = NULL;
$password = NULL;

echo $_SESSION['user_name'];
echo $_SESSION['user_email'];
echo $_SESSION['access_level'];

Header("Location: ../../../../../index.php");
?>