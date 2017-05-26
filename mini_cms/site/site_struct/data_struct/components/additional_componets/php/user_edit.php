<?php
require_once "../../../../document_data/db_conn.php";
require_once "../../../../document_data/document_data.php";

$sql = "
UPDATE ".$prefix."user
SET ".$prefix."user.user_gender = \"".$_POST['user_gender']."\" , ".$prefix."user.user_email = \"".$_POST['user_email']."\" , ".$prefix."user.user_name = \"".$_POST['user_name']."\", ".$prefix."user.accessLv_id = ".$_POST['user_access_level']."
WHERE ".$prefix."user.user_id = ".$_POST['user_id'].";";

mysqli_query($conn,$sql) or die ("ERROR 1");

header("Location: ../../../../../?menu_id=8&err_msg=User was edited");
?>