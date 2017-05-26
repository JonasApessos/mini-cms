<?php

if(empty($_POST['res_date']) || empty($_POST['res_name']) || empty($_POST['res_people']))
{
	echo "<form action=\"#\" method=\"POST\">";
	echo "<div class = \"".$res_class."\">";
	echo "<div>";
	
	echo "<div>";

	$input->set_type("text");
	$input->set_name("res_name");
	$input->set_maxlength("32");
	$input->set_onfocusout("nameFieldCheck(this.value)");
	$input->set_placeholder("ex. charles");
	
	echo "<div>";
	echo "<h2>Name</h2>";
	echo $input->display();
	echo "</div>";
	
	$input->clear_data();
	
	$select->set_name("res_smoking");
	$select->add_option("Yes","TRUE");
	$select->add_option("No","FALSE");
	
	echo "<div>";
	echo "<h2>Smoking</h2>";
	echo $select->display();
	echo "</div>";
	
	$select->clear_data();

	$input->set_type("number");
	$input->set_name("res_people");
	$input->set_min_max("1","20");
	$input->set_onfocusout("PeopleFieldCheck(this.value)");
	$input->set_placeholder("ex. 5");
	
	echo "<div>";
	echo "<h2>Number of people</h2>";
	echo $input->display();
	echo "</div>";

	$input->clear_data();
	
	$textarea->set_spellcheck(true);
	$textarea->set_name("res_comment");
	$textarea->set_maxlength(255);
	$textarea->set_placeholder("ex. i want a table close to the window with a champange ready");

	echo "<div>";
	echo "<h2>Comment</h2>";
	echo $textarea->display();
	echo "</div>";
	
	$textarea->clear_data();

	echo "<div id = \"res_cal\">";
	echo "</div>";

	$input->set_type("submit");
	
	echo "<div>";
	echo $input->display();
	echo "</div>";

	$input->clear_data();

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
	$input->set_type("hidden");
	$input->set_name("fin_res_name");
	$input->set_value($_POST['res_name']);
	$input->set_readonly();
	echo "<div>";
	echo "<h2>Name: ".$_POST['res_name']."</h2>";
	echo $input->display();
	echo "</div>";
	
	$input->clear_data();
	
	$input->set_type("hidden");
	$input->set_name("fin_res_smoking");
	$input->set_value($_POST['res_smoking']);
	$input->set_readonly();
	
	echo "<div>";
	echo "<h2>Smoking: ".$smoking."</h2>";
	echo $input->display();
	echo "</div>";
	
	$input->clear_data();
	
	$input->set_type("hidden");
	$input->set_name("fin_res_people");
	$input->set_value($_POST['res_people']);
	$input->set_readonly();
	
	echo "<div>";
	echo "<h2>Number of people: ".$_POST['res_people']."</h2>";
	echo $input->display();
	echo "</div>";
	
	$input->clear_data();
	
	$input->set_type("hidden");
	$input->set_name("fin_res_comment");
	$input->set_value($_POST['res_comment']);
	$input->set_readonly();
	
	echo "<div>";
	echo "<h2>Comment: ".$_POST['res_comment']."</h2>";
	echo $input->display();
	echo "</div>";
	
	$input->clear_data();
	
	$input->set_type("hidden");
	$input->set_name("fin_res_date");
	$input->set_value($_POST['res_date']);
	$input->set_readonly();
	
	echo "<div>";
	echo "<h2>Date: ".$_POST['res_date']."</h2>";
	echo $input->display();
	echo "</div>";
	
	$input->clear_data();
	
	echo "<div>";
	
	require_once "site_struct/data_struct/components/table_place.php";
	
	echo "</div>";
	
	$input->set_type("submit");
	
	echo "<div>";
	echo $input->display();
	echo "</div>";
	
	echo "</div>";
	echo "</form>";
}
echo "</div>";
echo "</div>";

?>