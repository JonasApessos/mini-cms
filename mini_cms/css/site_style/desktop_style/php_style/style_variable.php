<?php
	 header("content-type:text/css; charset: UTF-8");
	#include_once "../../../site/site_struct/document_data/document_data.php";
	
	$text_color = "rgb(255,143,0)";
	$border_normal_color = "rgba(255,255,255,1)";
	$border_normal_color2 = "rgba(255,0,0,1)";
	$border_hover_color = "rgba(255,143,0,1)";
	$border_input_color = "rgba(200,133,0,1)";
	$form_background_color = "rgba(30,30,30,1)";
	$form_input_background_color = "rgba(50,50,50,1)";
	$form_input_hover_background_color = "rgba(70,70,70,1)";
	$animation_time_transition = "1,5";
	$border_width = "1";
	
	
	$conn = mysqli_connect("localhost" , "root" , "" , "re2213_restaurant_db")or die("ERROR 21 " . mysqli_error($conn));
	
	$sql = "SELECT submenu_id FROM re2213_submenu_structure";
	$submenu_rows = mysqli_query($conn , $sql)or die ("ERROR 22 " . mysqli_error($conn));
	$menu_height = 0;
	
	foreach($submenu_rows as $submenu_row)
	{
		$menu_height = $menu_height + 50 / 2;
	}
	
	mysqli_close($conn);
?>