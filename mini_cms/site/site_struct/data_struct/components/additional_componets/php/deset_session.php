<?php
	session_start();
?>

<?php
	$_SESSION["access_level"] = 3;
	$_SESSION["user_name"] = "none";
	$_SESSION["user_email"] = "none";

	Header("Location: ../../../../../");
?>