<?php

include_once "site_struct/data_struct/components/lib/lib_class/input_class.php";
include_once "site_struct/data_struct/components/lib/lib_class/textarea_class.php";

$reservations_input = new input();
$reservations_textarea = new textarea();
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
	$sql = "
	SELECT ".$prefix."resDate.Dtable_id
	FROM ".$prefix."resDate, ".$prefix."reservation
	WHERE ".$prefix."resDate.reservation_id = ".$res_data['reservation_id']."
	AND re2213_resDate.reservation_id = re2213_reservation.reservation_id;";
	
	$table_rows = mysqli_query($conn,$sql) or die ("ERROR 15" . mysqli_error($conn));
	
	$reservations_input->set_type("number");
	$reservations_input->set_name("res_id");
	$reservations_input->set_value($res_data['reservation_id']);
	$reservations_input->set_readonly();
	$reservations_input->set_required();
	
	echo "<div>";
	echo "<div>";
	echo "<h3>Reservation ID: </h3>";
	echo $reservations_input->display();
	echo "</div>";
	
	$reservations_input->clear_data();
	
	$reservations_input->set_type("text");
	$reservations_input->set_name("res_name");
	$reservations_input->set_value($res_data['reservation_name']);
	$reservations_input->set_maxlength("32");
	$reservations_input->set_readonly();
	$reservations_input->set_required();
	
	echo "<div>";
	echo "<h3>Name:	</h3>";
	echo $reservations_input->display();
	echo "</div>";
	
	$reservations_input->clear_data();
	
	$reservations_input->set_type("text");
	$reservations_input->set_name("res_smoker");
	$reservations_input->set_value($res_data['reservation_smoker'] ? "Yes" : "No");
	$reservations_input->set_maxlength("3");
	$reservations_input->set_readonly();
	$reservations_input->set_required();
	
	echo "<div>";
	echo "<h3>Smoker: </h3>";
	echo $reservations_input->display();
	echo "</div>";
	
	$reservations_input->clear_data();
	
	$reservations_input->set_type("number");
	$reservations_input->set_name("res_people");
	$reservations_input->set_value($res_data['reservation_people']);
	$reservations_input->set_min_max(1,100);
	$reservations_input->set_readonly();
	$reservations_input->set_required();
	
	echo "<div>";
	echo "<h3>Number of People: </h3>";
	echo $reservations_input->display();
	echo "</div>";
	
	$reservations_input->clear_data();
	
	foreach($table_rows as $table_row => $table_data)
	{
		$table_string .=(string) "".$table_data['Dtable_id'] . ",";
	}
	
	$reservations_input->set_type("text");
	$reservations_input->set_name("res_table_id");
	$reservations_input->set_value($table_string);
	$reservations_input->set_readonly();
	$reservations_input->set_required();
	
	echo "<div>";
	echo "<h3>Tables Reserved ID: </h3>";
	echo $reservations_input->display();
	echo "</div>";
	
	$reservations_input->clear_data();
	
	$reservations_input->set_type("text");
	$reservations_input->set_name("res_date");
	$reservations_input->set_value($res_data['reservation_date']);
	$reservations_input->set_readonly();
	$reservations_input->set_required();
	
	echo "<div>";
	echo "<h3>Reservation Date: </h3>";
	echo $reservations_input->display();
	echo "</div>";
	
	$reservations_input->clear_data();
	
	$reservations_textarea->set_name("res_comment");
	//$reservations_textarea->
	
	echo "<div>";
	echo "<h3>Comment: </h3>";
	echo $reservations_textarea->display_input($res_data['reservation_comm']);
	echo "</div>";
	
	$reservations_input->set_type("text");
	$reservations_input->set_name("res_user_id");
	$reservations_input->set_value($res_data['user_id']);
	$reservations_input->set_readonly();
	$reservations_input->set_required();
	
	echo "<div>";
	echo "<h3>By User ID: </h3>";
	echo $reservations_input->display();
	echo "</div>";
	echo "</div>";
	
	$reservations_input->clear_data();
	
	$table_string = "";
}

mysqli_free_result($res_rows);
unset($reservations_input);
unset($reservations_textarea);
echo "</div>";
echo "</div>";
echo "</div>";
?>