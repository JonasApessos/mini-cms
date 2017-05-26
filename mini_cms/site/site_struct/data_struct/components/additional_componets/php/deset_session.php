<?php
session_start();
?>
<?php
require_once "../../../../document_data/db_conn.php";
require_once "../../../../document_data/document_data.php";
?>
<?php

$sql = "
UPDATE ".$prefix."userLogin
SET ".$prefix."userLogin.userLogin_state = FALSE , ".$prefix."userLogin.userLogin_date_out = NOW()
WHERE ".$prefix."userLogin.user_id = ".$_SESSION["user_id"]."
AND userLogin_state = true;";

mysqli_query($conn,$sql) or die("ERROR 09 ".mysqli_error($conn));

if(!mysqli_error($conn))
{
	$_SESSION["access_level"] = 3;
	$_SESSION["user_name"] = "none";
	$_SESSION["user_email"] = "none";
	session_destroy();
}
Header("Location: ../../../../../");
?>