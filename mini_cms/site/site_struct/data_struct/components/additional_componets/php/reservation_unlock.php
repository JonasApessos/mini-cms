<?php
require_once "../../../../document_data/db_conn.php";
require_once "../../../../document_data/document_data.php";
$sql = "
UPDATE ".$prefix."reservation
SET ".$prefix."reservation.reservation_blocked = FALSE
WHERE ".$prefix."reservation.reservation_id = ".$_POST['res_id'].";";

mysqli_query($conn,$sql) or die ("ERROR 16".mysqli_error($conn));

header("Location: ../../../../../?menu_id=10&err_msg=reservation unlocked");
?>