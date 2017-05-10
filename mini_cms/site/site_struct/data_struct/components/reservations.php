<?php
$table_string = "";

$sql = "
SELECT *
FROM ".$prefix."reservation;";

$res_rows = mysqli_query($conn,$sql) or die ("ERROR 14" . mysqli_error($conn));

echo "<div class = \"reservations_list_style\">";
echo "<div>";
echo "<div>";

foreach($res_rows as $res_row => $res_data)
{
	switch($res_data['user_id'])
	{
		case 1:
			$user_type = "ADMIN";
			break;
		case 2:
			$user_type = "PUBLIC";
			break;
		case 3:
			$user_type = "GUEST";
			break;
		default:
			$user_type = "Unknown";
	}
	$sql = "
	SELECT ".$prefix."resDate.Dtable_id
	FROM ".$prefix."resDate, ".$prefix."reservation
	WHERE ".$prefix."resDate.reservation_id = ".$res_data['reservation_id']."
	AND re2213_resDate.reservation_id = re2213_reservation.reservation_id;";
	
	$table_rows = mysqli_query($conn,$sql) or die ("ERROR 15" . mysqli_error($conn));
	
	echo "<div>";
	echo "<h3>Reservation ID: ".$res_data['reservation_id']."</h3>";
	echo "<h3>Name:	".$res_data['reservation_name']."</h3>";
	echo "<h3>Smoker: ".$res_data['reservation_smoker']."</h3>";
	echo "<h3>Number of People: ".$res_data['reservation_people']."</h3>";
	foreach($table_rows as $table_row => $table_data)
	{
		$table_string .=(string) "".$table_data['Dtable_id'] . ", ";
	}
	echo "<h3>Tables Reserved ID: ".$table_string."</h3>";
	
	echo "<h3>Reservation Date: ".$res_data['reservation_date']."</h3>";
	echo "<h3>Comment: ".$res_data['reservation_comm']."</h3>";
	echo "<h3>By User ID: ".$user_type."</h3>";
	echo "</div>";
	
	$table_string = "";
}

mysqli_free_result($res_rows);

echo "</div>";
echo "</div>";
echo "</div>";
?>