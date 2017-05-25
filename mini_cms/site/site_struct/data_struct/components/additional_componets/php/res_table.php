<?php
session_start();
?>
<?php
include_once "../../../../document_data/db_conn.php";
include_once "../../../../document_data/document_data.php";
?>
<?php
function table_seperation($table_list)
{
	$string_len = strlen($table_list);
	$table_array_list = array();
	$string = "";
	for($i = 0; $i < $string_len; $i++)
	{
		if($table_list[$i] != ',')
			$string .= $table_list[$i];
		else
		{
			array_push($table_array_list,$string);
			$string = "";
		}
	}
	
	return $table_array_list;
}

if($_SESSION['access_level'] < 3)
{
	$date_string = 0;
	$table_list = array();
	$table_list_len = 0;
	
	/*echo $_POST['fin_res_name']."<br>";
	echo $_POST['fin_res_smoking']."<br>";
	echo $_POST['fin_res_people']."<br>";
	echo $_POST['fin_res_comment']."<br>";*/
	$date_string = $_POST['fin_res_date'];
	
	$table_list = table_seperation($_POST['res_table_list']);
	$table_list_len = count($table_list);

	$sql = "INSERT INTO ".$prefix."reservation(reservation_name,reservation_smoker,reservation_people,reservation_comm,reservation_date,user_id) VALUES
	(\"".$_POST['fin_res_name']."\",".$_POST['fin_res_smoking'].",".$_POST['fin_res_people'].",\"".$_POST['fin_res_comment']."\",\"".$date_string."\",".$_SESSION['user_id'].");";
	
	mysqli_query($conn,$sql)or die("ERROR 1" . mysqli_error($conn));
	
	$sql = "SELECT ".$prefix."reservation.reservation_id
	FROM ".$prefix."reservation
	WHERE ".$prefix."reservation.user_id = ".$_SESSION['user_id']."
	AND ".$prefix."reservation.reservation_date = \"".$date_string."\"
	AND ".$prefix."reservation.reservation_blocked = FALSE
	AND ".$prefix."reservation.reservation_name = \"".$_POST['fin_res_name']."\"
	LIMIT 1;";
	
	$reservation_rows = mysqli_query($conn,$sql)or die("ERROR 2" . mysqli_error($conn));
	
	$reservation_row = mysqli_fetch_array($reservation_rows,MYSQLI_ASSOC);
	
	$sql = "INSERT INTO ".$prefix."resDate(Dtable_id,reservation_id)
		VALUES";
		
	for($i = 0; $i < $table_list_len; $i++)
	{
		$sql .= "(".$table_list[$i].",".$reservation_row['reservation_id'].")";
		if($i == $table_list_len - 1)
			$sql .= ';';
		else
			$sql .= ',';
	}
	//echo $sql;
	mysqli_query($conn,$sql)or die("ERROR 10".mysqli_error($conn));
	
	HEADER("Location:../../../../../");
}
else
	HEADER("Location:../../../../../");
?>
