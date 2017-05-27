<?php
require_once "../../../../document_data/db_conn.php";
require_once "../../../../document_data/document_data.php";
require_once "data_filter.php";

$usr_unlock = filter_data($_POST['user_id']);

$sql = "
UPDATE ".$prefix."user
SET ".$prefix."user.user_blocked = FALSE
WHERE ".$prefix."user.user_id = ".$usr_unlock."";

mysqli_query($conn,$sql) or die ("ERROR 1");

header("Location: ../../../../../?menu_id=8&err_msg=User unlocked");
?>