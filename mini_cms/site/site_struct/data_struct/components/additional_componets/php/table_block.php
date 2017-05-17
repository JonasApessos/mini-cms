<?php
include_once "../../../../document_data/db_conn.php";
include_once "../../../../document_data/document_data.php";

$sql = "
UPDATE ".$prefix."Dtable
SET ".$prefix."Dtable.Dtable_blocked = TRUE
WHERE ".$prefix."Dtable.Dtable_id = ".$_POST['table_id'].";";

mysqli_query($conn,$sql) or die ("ERROR 16".mysqli_error($conn));

header("Location: ../../../../../?menu_id=9");
?>