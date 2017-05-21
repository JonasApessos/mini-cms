<?php
include_once "site_struct/data_struct/components/lib/lib_class/input_class.php";
include_once "site_struct/data_struct/components/lib/lib_class/textarea_class.php";
include_once "site_struct/data_struct/components/lib/lib_class/select_class.php";

$res_input = new input();
$res_textarea = new textarea();
$res_select = new select();

if(empty($_POST['res_date']) || empty($_POST['res_name']) || empty($_POST['res_people']))
{
	echo "<form action=\"#\" method=\"POST\">";
	echo "<div class = \"".$res_class."\">";
	echo "<div>";
	
	echo "<div>";

	$res_input->set_type("text");
	$res_input->set_name("res_name");
	$res_input->set_maxlength("32");
	$res_input->set_onfocusout("nameFieldCheck(this.value)");
	$res_input->set_placeholder("ex. charles");
	
	echo "<div>";
	echo "<h2>Name</h2>";
	echo $res_input->display();
	echo "</div>";
	
	$res_input->clear_data();
	
	$res_select->set_name("res_smoking");
	$res_select->add_option("Yes","TRUE");
	$res_select->add_option("No","FALSE");
	
	echo "<div>";
	echo "<h2>Smoking</h2>";
	echo $res_select->display();
	echo "</div>";
	
	$res_select->clear_data();

	$res_input->set_type("number");
	$res_input->set_name("res_people");
	$res_input->set_min_max("1","20");
	$res_input->set_onfocusout("PeopleFieldCheck(this.value)");
	$res_input->set_placeholder("ex. 5");
	
	echo "<div>";
	echo "<h2>Number of people</h2>";
	echo $res_input->display();
	echo "</div>";

	$res_input->clear_data();
	
	$res_textarea->set_spellcheck(true);
	$res_textarea->set_name("res_comment");
	$res_textarea->set_maxlength(255);
	$res_textarea->set_placeholder("ex. i want a table close to the window with a champange ready");

	echo "<div>";
	echo "<h2>Comment</h2>";
	echo $res_textarea->display();
	echo "</div>";
	
	$res_textarea->clear_data();

	echo "<div id = \"res_cal\">";
	echo "</div>";

	$res_input->set_type("submit");
	
	echo "<div>";
	echo $res_input->display();
	echo "</div>";

	$res_input->clear_data();
	
	echo "<div>";
	echo "<h3 class = \"type_error\">type of error</h3>";
	echo "</div>";

	echo "</div>";
	
	echo "</form>";
}
else
{
	$smoking = 0;
	if($_POST['res_smoking'])
		$smoking = "Yes";
	else
		$smoking = "No";
	
	$res_class = "res_form2";
	echo "<div class = \"".$res_class."\">";
	echo "<div>";
	
	echo "<form action = \"site_struct/data_struct/components/additional_componets/php/res_table.php\" method = \"POST\">";
	echo "<div>";
	$res_input->set_type("hidden");
	$res_input->set_name("fin_res_name");
	$res_input->set_value($_POST['res_name']);
	$res_input->set_readonly();
	echo "<div>";
	echo "<h2>Name: ".$_POST['res_name']."</h2>";
	echo $res_input->display();
	echo "</div>";
	
	$res_input->clear_data();
	
	$res_input->set_type("hidden");
	$res_input->set_name("fin_res_smoking");
	$res_input->set_value($_POST['res_smoking']);
	$res_input->set_readonly();
	
	echo "<div>";
	echo "<h2>Smoking: ".$smoking."</h2>";
	echo $res_input->display();
	echo "</div>";
	
	$res_input->clear_data();
	
	$res_input->set_type("hidden");
	$res_input->set_name("fin_res_people");
	$res_input->set_value($_POST['res_people']);
	$res_input->set_readonly();
	
	echo "<div>";
	echo "<h2>Number of people: ".$_POST['res_people']."</h2>";
	echo $res_input->display();
	echo "</div>";
	
	$res_input->clear_data();
	
	$res_input->set_type("hidden");
	$res_input->set_name("fin_res_comment");
	$res_input->set_value($_POST['res_comment']);
	$res_input->set_readonly();
	
	echo "<div>";
	echo "<h2>Comment: ".$_POST['res_comment']."</h2>";
	echo $res_input->display();
	echo "</div>";
	
	$res_input->clear_data();
	
	$res_input->set_type("hidden");
	$res_input->set_name("fin_res_date");
	$res_input->set_value($_POST['res_date']);
	$res_input->set_readonly();
	
	echo "<div>";
	echo "<h2>Date: ".$_POST['res_date']."</h2>";
	echo $res_input->display();
	echo "</div>";
	
	$res_input->clear_data();
	
	echo "<div>";
	
	include_once "site_struct/data_struct/components/table_place.php";
	
	echo "</div>";
	
	$res_input->set_type("submit");
	
	echo "<div>";
	echo $res_input->display();
	echo "</div>";
	
	echo "</div>";
	echo "</form>";
}
echo "</div>";
echo "</div>";

unset($res_input);
unset($res_select);
unset($res_textarea);
?>