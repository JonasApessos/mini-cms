<?php
require_once "../../../../document_data/db_conn.php";
require_once "../../../../document_data/document_data.php";
require_once "data_filter.php";

$table_lock = filter_data($_POST['table_id']);

$sql = "
UPDATE ".$prefix."Dtable
SET ".$prefix."Dtable.Dtable_blocked = TRUE
WHERE ".$prefix."Dtable.Dtable_id = ".$table_lock.";";

mysqli_query($conn,$sql) or die ("ERROR 1");

header("Location: ../../../../../?menu_id=9&err_msg=table blocked");
?>