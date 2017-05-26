<?php
require_once "../../../../document_data/db_conn.php";
require_once "../../../../document_data/document_data.php";
$sql = "
UPDATE ".$prefix."user
SET ".$prefix."user.user_blocked = FALSE
WHERE ".$prefix."user.user_id = ".$_POST['user_id']."";

mysqli_query($conn,$sql) or die ("ERROR 1");

header("Location: ../../../../../?menu_id=8&err_msg=User unlocked");
?>