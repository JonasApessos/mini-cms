<?php
session_start();
?>
<?php
include_once "../../../../document_data/db_conn.php";
include_once "../../../../document_data/document_data.php";
?>
<?php
if($_SESSION['access_level'] != 3)
{
	$date_string = 0;

	echo $_POST['res_name']."<br>";
	echo $_POST['smoking']."<br>";
	echo $_POST['res_people']."<br>";
	echo $_POST['res_comment']."<br>";
	$date_string = $_POST['res_date'];
	echo $_SESSION['user_id']."<br>";
	echo $_SESSION['user_email']."<br>";

	echo "-".$date_string."-";

	$sql = "INSERT INTO ".$prefix."reservation(reservation_name,reservation_smoker,reservation_people,reservation_comm,reservation_date,user_id,Dtable_id) VALUES
	(\"".$_POST['res_name']."\",".$_POST['smoking'].",".$_POST['res_people'].",\"".$_POST['res_comment']."\",\"".$date_string."\",".$_SESSION['user_id'].",1);";
	mysqli_query($conn,$sql)or die("ERROR 10".mysqli_error($conn));
}
else
	HEADER("Location:../../../../../?menu_id=-1&submenuname=Access Denied");
//echo "ACCESS DENIED";
?>
