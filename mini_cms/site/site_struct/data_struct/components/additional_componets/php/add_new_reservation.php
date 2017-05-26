<?php
require_once "../../../../document_data/db_conn.php";
require_once "../../../../document_data/document_data.php";
require_once "data_filter.php";

$res_name = data_filter($_POST['user_name']);
$res_email = data_filter($_POST['user_email']);
$res_temp_pass = crypt(data_filter($_POST['user_temp_password']),"T51");
$res_gender = data_filter($_POST['user_gender']);
$res_access_level = data_filter($_POST['user_accessLv']);

$sql ="
INSERT INTO ".$prefix."reservation(reservation_name,reservation_smoker,reservation_people,reservation_date,reservation_comm,user_id,reservation_blocked)
VALUES (\"".$res_name."\",\"".$res_email."\",\"".$res_temp_pass."\",\"".$res_gender."\",0,".$res_access_level.");";

mysqli_query($conn,$sql) or die ("ERROR 1");

Header("Location: ../../../../../?menu_id=8");
?>