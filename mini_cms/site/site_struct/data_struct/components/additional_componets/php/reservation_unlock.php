<?php
require_once "../../../../document_data/db_conn.php";
require_once "../../../../document_data/document_data.php";
require_once "data_filter.php";

$res_id = filter_data($_POST['res_id']);

$sql = "
UPDATE ".$prefix."reservation
SET ".$prefix."reservation.reservation_blocked = FALSE
WHERE ".$prefix."reservation.reservation_id = ".$_POST['res_id'].";";

mysqli_query($conn,$sql) or die ("ERROR 1");

header("Location: ../../../../../?menu_id=10&err_msg=reservation unlocked");
?>