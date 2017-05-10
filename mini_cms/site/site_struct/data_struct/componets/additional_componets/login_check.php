<?php
include_once "site_struct/document_data/document_data.php"; 

$email = $_POST['login_email'];
$password = $_POST['password_login'];

$sql = "SELECT * FROM ".$prefix."_user WHERE user_email = ".$email." and user_password = ".$password.";";
$user_rows = mysqli_query($conn , $sql)or die("ERROR 25 " . mysqli_error($conn));

foreach($user_rows as $user_row)
{
	$_SESSION['user_name'] = $user_row['user_name'];
	$_SESSION['user_email'] = $user_row['user_email'];
}

header('location: localhost/Deluxe_restaurant/site/');
?>