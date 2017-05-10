<?php 
	$user = $_POST["reg_1"];
	$pass = $_POST["reg_2"];
	$gender = $_POST["gender"];
	$desc  = $_POST["reg_4"];
	
	$sql = "use " . $db_name;
	mysqli_query($conn , $sql);
	
	$sql = "insert into re2213_user(username , usr_password , usr_gender , usr_desc) values( ' " . $user . " ', ' " . $pass . " ' , ' " . $gender . " ' , ' " .  $desc . " ') ";
	mysqli_query($conn , $sql);
	mysqli_close($conn);
	
	$sql = NULL;
	$conn  =NULL;
	?>