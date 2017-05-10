<?php
$server_name = "localhost";
$server_user = "root";
$server_password = "";
$db_name = "re2213_restaurant_db";
$sql = NULL;

$conn = mysqli_connect($server_name , $server_user , $server_password , $db_name)or die("ERROR 00" . mysqli_error($conn));

?>