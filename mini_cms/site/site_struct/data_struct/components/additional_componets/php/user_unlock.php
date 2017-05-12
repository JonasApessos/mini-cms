<?php
include_once "../../../../document_data/db_conn.php";
include_once "../../../../document_data/document_data.php";
$sql = "
UPDATE ".$prefix."user
SET ".$prefix."user.user_blocked = FALSE
WHERE ".$prefix."user.user_id = ".$_POST['user_id']."";

mysqli_query($conn,$sql) or die ("ERROR 16".mysqli_error($conn));

header("Location: ../../../../../?menu_id=8");
?>