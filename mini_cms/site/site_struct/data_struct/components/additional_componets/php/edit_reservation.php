<?php
require_once "../../../../document_data/db_conn.php";
require_once "../../../../document_data/document_data.php";

$sql = "
UPDATE ".$prefix."reservation
SET ".$prefix."reservation.reservation_name = \"".$_POST['res_name']."\" , ".$prefix."reservation.reservation_people = \"".$_POST['res_people']."\" , ".$prefix."reservation.reservation_date = \"".$_POST['res_date']."\", ".$prefix."reservation.reservation_comm = \"".$_POST['res_comment']."\"
WHERE ".$prefix."reservation.reservation_id = ".$_POST['res_id'].";";

mysqli_query($conn,$sql) or die ("ERROR 16".mysqli_error($conn));

header("Location: ../../../../../?menu_id=10&err_msg=reservation was edited");
?>