<?php
session_start();
?>
<?php
require_once "../../../../document_data/db_conn.php";//connection to the database
require_once "../../../../document_data/document_data.php";//data preserved for latter use
?>
<?php
function table_seperation($table_list)
{
	$string_len = strlen($table_list);
	$table_array_list = array();
	$string = "";
	for($i = 0; $i < $string_len; $i++)//search in each index of the string array and if you find ',' then insert the string with the table id into the array
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
}//seperate the table string format to each tables ids

if($_SESSION['access_level'] < 2)//if users access level is lower than 1 then he/she cannot use this code
{
	$date_string = 0;
	$table_list = array();
	$table_list_len = 0;

	$date_string = $_POST['fin_user_date'];//reservation date

	$table_list = table_seperation($_POST['res_table_list']);
	$table_list_len = count($table_list);
	
	$sql = "SELECT ".$prefix."reservation.user_id
	FROM ".$prefix."reservation
	WHERE ".$prefix."reservation.user_id = ".$_POST['fin_user_id']."
	AND ".$prefix."reservation.reservation_date = \"".$date_string."\"
	AND ".$prefix."reservation.reservation_blocked = FALSE
	AND ".$prefix."reservation.reservation_name = \"".$_POST['fin_user_name']."\"
	LIMIT 1;";//checking if users reservation at this date already exists
	
	$reservation_rows = mysqli_query($conn,$sql)or die("ERROR 0");
	
	$reservation_row = mysqli_fetch_array($reservation_rows,MYSQLI_ASSOC);
	
	if(!($reservation_row['user_id'] == $_POST['fin_user_id']))//check if in the same date there is already a reservation with the same user and same hour
	{

		$sql = "INSERT INTO ".$prefix."reservation(reservation_name,reservation_smoker,reservation_people,reservation_comm,reservation_date,user_id) VALUES
		(\"".$_POST['fin_user_name']."\",".$_POST['fin_user_smoking'].",".$_POST['fin_user_people'].",\"".$_POST['fin_user_comm']."\",\"".$date_string."\",".$_POST['fin_user_id'].");";//insert reservation 
	
		mysqli_query($conn,$sql)or die("ERROR 1");
	
		$sql = "SELECT ".$prefix."reservation.reservation_id
		FROM ".$prefix."reservation
		WHERE ".$prefix."reservation.user_id = ".$_POST['fin_user_id']."
		AND ".$prefix."reservation.reservation_date = \"".$date_string."\"
		AND ".$prefix."reservation.reservation_blocked = FALSE
		AND ".$prefix."reservation.reservation_name = \"".$_POST['fin_user_name']."\"
		LIMIT 1;";//find the newly inserted reservation
	
		$reservation_rows = mysqli_query($conn,$sql)or die("ERROR 1");
	
		$reservation_row = mysqli_fetch_array($reservation_rows,MYSQLI_ASSOC);
	
		$sql = "INSERT INTO ".$prefix."resDate(Dtable_id,reservation_id)
		VALUES";//insert with the new reservation id to a other table that connects the reservation with the tables reserved
		
		for($i = 0; $i < $table_list_len; $i++)
		{
			$sql .= "(".$table_list[$i].",".$reservation_row['reservation_id'].")";
			if($i == $table_list_len - 1)
				$sql .= ';';
			else
				$sql .= ',';
		}//creating multiple insert data
		//echo $sql;
		mysqli_query($conn,$sql)or die("ERROR 2");
	
		HEADER("Location:../../../../../?menu_id=8&err_msg=reservation complete");//return to user list (if you are admin)
	}
	else
		HEADER("Location:../../../../../?menu_id=8&err_msg=missing data, please try again");//return to user list (if you are admin)
}
else
	HEADER("Location:../../../../../?err_msg=Access Denied");//return to home page , not admin
?>
