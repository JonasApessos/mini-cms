<?php
require_once "../../../../document_data/db_conn.php";
require_once "../../../../document_data/document_data.php";
require_once "data_filter.php";

$res_name = filter_data($_POST['res_name']);
$res_pop = filter_data($_POST['res_people']);
$res_date = filter_data($_POST['res_date']);
$res_comm = filter_data($_POST['res_comment']);
$res_id = filter_data($_POST['res_id']);


$sql = "
UPDATE ".$prefix."reservation
SET ".$prefix."reservation.reservation_name = \"".$res_name."\" , ".$prefix."reservation.reservation_people = \"".$res_pop."\" , ".$prefix."reservation.reservation_date = \"".$res_date."\", ".$prefix."reservation.reservation_comm = \"".$res_comm."\"
WHERE ".$prefix."reservation.reservation_id = ".$res_id.";";

mysqli_query($conn,$sql) or die ("ERROR 1");

header("Location: ../../../../../?menu_id=10&err_msg=reservation was edited");
?>