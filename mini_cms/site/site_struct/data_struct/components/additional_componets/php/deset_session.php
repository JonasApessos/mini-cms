<?php
	session_start();
?>

<?php
	include_once "../../../../document_data/db_conn.php";
	include_once "../../../../document_data/document_data.php";
?>
<?php

$sql = "
UPDATE ".$prefix."user
SET ".$prefix."user.user_state = FALSE , ".$prefix."user.user_logged_out = NOW()
WHERE ".$prefix."user.user_email = \"".$_SESSION["user_email"]."\" 
AND ".$prefix."user.user_name = \"".$_SESSION["user_name"]."\"
AND ".$prefix."user.accessLv_id = ".$_SESSION["access_level"]."
;";

mysqli_query($conn,$sql) or die(mysqli_error($conn));

if(!mysqli_error($conn))
{
	$_SESSION["access_level"] = 3;
	$_SESSION["user_name"] = "none";
	$_SESSION["user_email"] = "none";
}
Header("Location: ../../../../../");
?>