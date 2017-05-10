<?php

if(empty($_POST['res_date']) || empty($_POST['res_name']) || empty($_POST['res_people']))
{
	echo "<div class = \"".$res_class."\">";
	echo "<div>";

	echo "<form action=\"\" method=\"POST\" onChange = \"updateForm()\">";
	
	echo "<div>";

	echo "<div>";
	echo "<h2>Name</h2>";
	echo "<input type = \"text\" name = \"res_name\" onfocusout = \"nameFieldCheck(this.value)\" placeholder = \"ex. charles\">";
	echo "</div>";

	echo "<div>";
	echo "<h2>Smoking</h2>";
	echo "<select name = \"res_smoking\"><option value = \"1\">Yes</option><option value = \"0\">No</option></select>";
	echo "</div>";

	echo "<div>";
	echo "<h2>Number of people</h2>";
	echo "<input type = \"number\" name = \"res_people\" onfocusout = \"peopleFieldCheck(this.value)\" placeholder = \"ex. 5\">";
	echo "</div>";

	echo "<div>";
	echo "<h2>Comment</h2>";
	echo "<textarea spellcheck = \"true\" name = \"res_comment\" placeholder = \"ex. i want a table close to the window with a champange ready\"></textarea>";
	echo "</div>";

	echo "<div id = \"res_cal\">";
	echo "</div>";

	echo "<div>";
	echo "<input type = \"submit\" value = \"reserve\">";
	echo "</div>";

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
	
	echo "<div>";
	echo "<h2>Name: ".$_POST['res_name']."</h2>";
	echo "<input type = \"hidden\" name = \"fin_res_name\" value = \"".$_POST['res_name']."\" readonly=\"readonly\">";
	echo "</div>";
	
	echo "<div>";
	echo "<h2>Smoking: ".$smoking."</h2>";
	echo "<input type = \"hidden\" name = \"fin_res_smoking\" value = \"".$_POST['res_smoking']."\" readonly=\"readonly\">";
	echo "</div>";
	
	echo "<div>";
	echo "<h2>Number of people: ".$_POST['res_people']."</h2>";
	echo "<input type = \"hidden\" name = \"fin_res_people\" value = \"".$_POST['res_people']."\" readonly=\"readonly\">";
	echo "</div>";
	
	echo "<div>";
	echo "<h2>Comment: ".$_POST['res_comment']."</h2>";
	echo "<input type = \"hidden\" name = \"fin_res_comment\" value = \"".$_POST['res_comment']."\" =\"readonly\">";
	echo "</div>";
	
	echo "<div>";
	echo "<h2>Date: ".$_POST['res_date']."</h2>";
	echo "<input type = \"hidden\" name = \"fin_res_date\" value = \"".$_POST['res_date']."\" readonly=\"readonly\">";
	echo "</div>";
	
	echo "<div>";
	
	include_once "site_struct/data_struct/components/table_place.php";
	
	/*echo "<div>";
	echo "<h2>Reserve Table</h2>";
	echo "</div>";
	
	echo "<div>";
	echo "<h3>Position</h3>";
	echo "</div>";
	
	echo "<div>";
	
	echo "<div>";
	echo "<h4>position title</h4>";
	echo "</div>";
	
	echo "<div>";
	
	echo "<div>";
	echo "<h5>table id</h5>";
	echo "</div>";
	
	echo "<div>";
	echo "<h5>table id2</h5>";
	echo "</div>";
	
	echo "<div>";
	echo "<h5>table id3</h5>";
	echo "</div>";
	
	echo "</div>";
	
	echo "</div>";*/
	
	echo "</div>";
	
	echo "</div>";
	echo "</form>";
}
echo "</div>";
echo "</div>";
?>