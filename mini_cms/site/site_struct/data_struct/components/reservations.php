<?php
$table_string = "";
$start_index = (empty($_POST['index']) || (!isset($_POST['index']))) ? 0 : $_POST['index'];

if(!empty($_POST['next_list']))
{
	switch($_POST['next_list'])
	{
		case "TRUE":
			$start_index += 1;
			break;
		case "FALSE":
			$start_index -= 1;
			break;
		default:
			break;
	}
}

if($start_index < 0)
	$start_index = 0;

switch($_SESSION['access_level'])
{
	case 1:
		$sql = "
		SELECT ".$prefix."reservation.reservation_id , ".$prefix."reservation.reservation_name , ".$prefix."reservation.reservation_smoker , ".$prefix."reservation.reservation_people , ".$prefix."reservation.reservation_date , ".$prefix."reservation.reservation_comm , ".$prefix."reservation.user_id , ".$prefix."reservation.reservation_blocked
		FROM ".$prefix."reservation
		WHERE ".$prefix."reservation.".(empty($_POST['search_type']) ? "reservation_name" : $_POST['search_type'])." 
		LIKE \"".(empty($_POST['search_query']) ? "" : $_POST['search_query'])."%\"
		LIMIT ".($start_index * 25).",25;";
		break;
	case 2:
		$sql = "
		SELECT ".$prefix."reservation.reservation_id , ".$prefix."reservation.reservation_name , ".$prefix."reservation.reservation_smoker , ".$prefix."reservation.reservation_people , ".$prefix."reservation.reservation_date , ".$prefix."reservation.reservation_comm , ".$prefix."reservation.user_id , ".$prefix."reservation.reservation_blocked
		FROM ".$prefix."reservation
		WHERE ".$prefix."reservation.user_id > ".($_SESSION['user_id'] - 1)."
		AND ".$prefix."reservation.".(empty($_POST['search_type']) ? "reservation_name" : $_POST['search_type'])." 
		LIKE \"".(empty($_POST['search_query']) ? "" : $_POST['search_query'])."%\"
		LIMIT ".($start_index * 25).",25;";
		break;
	default:
		echo "an error accured";
		break;
}
$res_rows = mysqli_query($conn,$sql) or die ("ERROR 14" . mysqli_error($conn));

$res_rows_count = mysqli_num_rows($res_rows);

if(!(empty($_POST['next_list'])))
{
	if($res_rows_count < 1 && $_POST['next_list'] == "TRUE")
	{
		$start_index = empty($_POST['index']) ? 0 : $_POST['index'];

		echo "<h1>No data...</h1>";
	}
}

echo "<div class = \"reservations_list_style\">";
echo "<div>";
echo "<div>";

echo "<form action=\"#\" method=\"POST\">";
$input->clear_data();

$input->set_type("text");
$input->set_name("search_query");
$input->set_value("");

$select->clear_data();

$select->set_name("search_type");
$select->add_option("by reservation name","reservation_name");
$select->add_option("by reservation email","reservation_people");
$select->add_option("by reservation id","reservation_id");
$select->add_option("by user id","user_id");

echo "<div id=\"search_panel\">";
echo "<h3>Search</h3>";
echo $input->display();

echo $select->display();

$select->clear_data();

$input->clear_data();

$input->set_type("submit");

echo $input->display();

echo "</div>";

$input->clear_data();

echo "</form>";

if($res_rows_count > 0)
{
foreach($res_rows as $res_row => $res_data)
{
	$sql = "
	SELECT ".$prefix."resDate.Dtable_id
	FROM ".$prefix."resDate, ".$prefix."reservation
	WHERE ".$prefix."resDate.reservation_id = ".$res_data['reservation_id']."
	AND re2213_resDate.reservation_id = re2213_reservation.reservation_id;";
	
	$table_rows = mysqli_query($conn,$sql) or die ("ERROR 15" . mysqli_error($conn));
	
	$input->set_type("number");
	$input->set_name("res_id");
	$input->set_value($res_data['reservation_id']);
	$input->set_readonly();
	$input->set_required();
	
	echo "<form>";
	
	echo "<div>";
	echo "<div>";
	echo "<h3>Reservation ID: </h3>";
	echo $input->display();
	echo "</div>";
	
	$input->clear_data();
	
	$input->set_type("text");
	$input->set_name("res_name");
	$input->set_value($res_data['reservation_name']);
	$input->set_maxlength("32");
	$input->set_required();
	
	echo "<div>";
	echo "<h3>Name:	</h3>";
	echo $input->display();
	echo "</div>";
	
	$input->clear_data();
	
	$input->set_type("text");
	$input->set_name("res_smoker");
	$input->set_value($res_data['reservation_smoker'] ? "Yes" : "No");
	$input->set_maxlength("3");
	$input->set_readonly();
	$input->set_required();
	
	echo "<div>";
	echo "<h3>Smoker: </h3>";
	echo $input->display();
	echo "</div>";
	
	$input->clear_data();
	
	$input->set_type("number");
	$input->set_name("res_people");
	$input->set_value($res_data['reservation_people']);
	$input->set_min_max(1,100);
	$input->set_required();
	
	echo "<div>";
	echo "<h3>Number of People: </h3>";
	echo $input->display();
	echo "</div>";
	
	$input->clear_data();
	
	foreach($table_rows as $table_row => $table_data)
	{
		$table_string .=(string) "".$table_data['Dtable_id'] . ",";
	}

	$input->set_type("text");
	$input->set_name("res_table_id");
	$input->set_value($table_string);
	$input->set_readonly();
	$input->set_required();
	
	echo "<div>";
	echo "<h3>Tables Reserved ID: </h3>";
	echo $input->display();
	echo "</div>";
	
	$input->clear_data();
	
	$input->set_type("text");
	$input->set_name("res_date");
	$input->set_value($res_data['reservation_date']);
	$input->set_maxlength(19);
	$input->set_required();
	
	echo "<div>";
	echo "<h3>Reservation Date: </h3>";
	echo $input->display();
	echo "</div>";
	
	$textarea->set_name("res_comment");
	//$textarea->
	
	echo "<div>";
	echo "<h3>Comment: </h3>";
	echo $textarea->display_input($res_data['reservation_comm']);
	echo "</div>";
	
	$input->clear_data();
	
	$input->set_type("text");
	$input->set_name("res_user_id");
	$input->set_value($res_data['user_id']);
	$input->set_required();
	$input->set_readonly();
	
	echo "<div>";
	echo "<h3>By User ID: </h3>";
	echo $input->display();
	echo "</div>";
	
	$input->clear_data();
	
	$input->set_type("text");
	$input->set_name("res_blocked");
	$input->set_value($res_data['reservation_blocked'] ? "Yes" : "No");
	$input->set_required();
	$input->set_readonly();
	
	echo "<div>";
	echo "<h3>Blocked: </h3>";
	echo $input->display();
	echo "</div>";
	
	$input->clear_data();
	
	$button->set_type("submit");
	$button->set_formmethod("POST");
	$button->set_formaction("site_struct/data_struct/components/additional_componets/php/edit_reservation.php");
	
	echo "<div>";
	echo $button->display("<div><img src=\"../images/img_bt_edit.png\" alt=\"edit_reservation\"><h4>Edit reservation</h4></div>");
	
	$button->clear_data();
	
	$button->set_type("submit");
	$button->set_formmethod("POST");
	$button->set_formaction("site_struct/data_struct/components/additional_componets/php/reservation_".($res_data['reservation_blocked'] ? "unlock" : "lock").".php");
	
	echo $button->display("<div><img src=\"../images/img_bt_".($res_data['reservation_blocked'] ? "unlock" : "lock").".png\" alt=\"lock_reservation\"><h4>".($res_data['reservation_blocked'] ? "Unlock" : "Lock")." reservation</h4></div>");
	echo "</div>";
	
	echo "</div>";
	echo "</form>";
	$button->clear_data();
	
	$table_string = "";
}
}
else
	echo "No data...";

$input->set_type("hidden");
$input->set_name("index");
$input->set_value($start_index);

$button->set_type("submit");
$button->set_name("next_list");
$button->set_value("FALSE");

echo "<form action=\"#\" method=\"POST\">";
echo "<div id=\"page_index\">";

echo $input->display();

$input->clear_data();

echo "<div>";
echo $button->display("Prev");
echo "</div>";

$button->clear_data();

$button->set_type("submit");
$button->set_name("next_list");
$button->set_value("TRUE");

echo "<div>";
echo $button->display("Next");
echo "</div>";

$button->clear_data();

echo "<p>page ".$start_index."<p>";

echo "</div>";
echo "</form>";
mysqli_free_result($res_rows);
echo "</div>";
echo "</div>";
echo "</div>";
?>