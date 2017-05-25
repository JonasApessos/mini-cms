<?php

if(!empty($_GET['err_msg']) || isset($_GET['err_msg']))
{	
	echo "<div id=\"broadcaster\" style=\"display:display; position:fixed; z-index:2;\">";
	echo "<div>";
	echo "<div>";

	echo "<div>";
	echo "<h2>".$_GET['err_msg']."</h2>";
	echo "</div>";
	
	$button->clear_data();
	
	$button->set_type("button");
	$button->set_onclick("hide_broadcaster()");
	
	echo "<div>";
	echo $button->display("OK");
	echo "</div>";
	
	$button->clear_data();
	
	echo "</div>";
	echo "</div>";
	echo "</div>";
}

?>