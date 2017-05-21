<?php
session_start();
?>
<?php
include "../../../../document_data/document_data.php"; 
include_once "../../../../document_data/db_conn.php"; 
?>
<?php
$email = $_POST['login_email'];
$password = crypt($_POST['password_login'],"T51");

$sql = "SELECT * 
FROM ".$prefix."user 
WHERE ".$prefix."user.user_email = \"".$email."\" 
AND ".$prefix."user.user_password = \"".$password."\"
AND ".$prefix."user.user_blocked = FALSE LIMIT 1;";

$user_rows = mysqli_query($conn , $sql) or die("ERROR 07: ".mysqli_query($conn));

foreach($user_rows as $user_row => $user_data)
{
	if(empty($user_data['user_id']) || $user_data['user_blocked'])
	{
		Header("Location: ../../../../../index.php");
	}
	else
	{
		$_SESSION['user_name'] = $user_data['user_name'];
		$_SESSION['user_email'] = $user_data['user_email'];
		$_SESSION['access_level'] = $user_data['accessLv_id'];
		$_SESSION['user_id'] = $user_data['user_id'];
		$sql = "
		INSERT INTO ".$prefix."userLogin(userLogin_state,userLogin_date,user_id)
		VALUES (TRUE,NOW(),".$_SESSION['user_id'].");";
		mysqli_query($conn , $sql) or die("ERROR 08: ".mysqli_error($conn));
	}
}
mysqli_free_result($user_rows);



mysqli_close($conn);

$sql = NULL;
$conn = NULL;
$email = NULL;
$password = NULL;


Header("Location: ../../../../../index.php");
?>