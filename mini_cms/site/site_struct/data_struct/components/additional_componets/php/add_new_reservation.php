<?php
require_once "../../../../document_data/db_conn.php";
require_once "../../../../document_data/document_data.php";

$sql ="
INSERT INTO ".$prefix."reservation(reservation_name,reservation_smoker,reservation_people,reservation_date,reservation_comm,user_id,reservation_blocked)
VALUES (\"".$_POST['user_name']."\",\"".$_POST['user_email']."\",\"".crypt($_POST['user_temp_password'],"T51")."\",\"".$_POST['user_gender']."\",0,".$_POST['user_accessLv'].");";

mysqli_query($conn,$sql) or die ("ERROR 17" . mysqli_error($conn));

Header("Location: ../../../../../?menu_id=8");
?>