<?php
include_once "../../document_data/db_conn.php";
	
	$sql = "INSERT INTO re2213_user(access_level_id , user_name , user_email  , user_password , user_gender) VALUES
	( 2 ,
		\"".$_POST['user_name']."\",
		\"".$_POST['user_email']."\",
		\"".$_POST['user_pass']."\",
		\"".$_POST['user_gender']."\"
	)";
	
	mysqli_query($conn,$sql) or die("error:".mysqli_error($conn));
	
	mysqli_close($conn);

	Header("Location:../../../index.php");
?>