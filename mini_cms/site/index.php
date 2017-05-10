<?php
	session_start();//starting session
?>

<?php
	include_once "site_struct/document_data/document_data.php";
?>

<?php
	$prefix = "re2213";
?>

<?php
	
	if(!isset($_SESSION['access_level']))
	{
		$_SESSION['access_level'] = 3;
		$_SESSION['user_name'] = "none";
		$_SESSION['user_email'] = "none";
	}
	
	if(!isset($_GET["menu_id"]))
	{
		$_SESSION["menu_id"] = 1;//setting menu selection session id
	}
	else
	{
		$_SESSION["menu_id"] = $_GET["menu_id"];
	}
	
?>

<?php
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";

	include "site_struct/document_data/db_conn.php";
	
	$sql  = "SELECT include_file_path FROM " . $prefix . "_include_file , ".$prefix."_page_component_structure where file_type_id = 4 AND ".$prefix."_page_component_structure.page_component_id = ".$prefix."_include_file.page_component_id;";
	$css_data_rows = mysqli_query($conn , $sql)or die("ERROR 02" . mysqli_error($conn));

	foreach($css_data_rows as $css_data_row)
	{
		echo $test = "<link rel =\"stylesheet\" type = \"text/css\" href = \"".$css_data_row['include_file_path']."\" media = \"screen\">";
		$css_data_row = NULL;
	}
	mysqli_close($conn);
	$css_data_rows = NULL;


echo "<link rel=\"stylesheet\" href=\"../css/site_style/desktop_style/component_style/drop_down_menu.php\" media=\"screen\">";

echo "<script src = \"../js/absolute_menu.js\"></script><!-- absolute menu javascript execution arrow menu animation-->";

echo "<script src =  \"../js/".$header_login_script."\"></script>";

echo "<title>Deluxe Restaurant</title>";
echo "</head>";
?>

<?php
echo "<body>";
		
			include_once "site_struct/mobile_screen/absolute_menu.php";//include absolute menu structure (phone menu)
		

echo "  <div class = \"containment\">";

		
			include_once "site_struct/data_struct.php";//include site data structure
		
		
echo "   </div>";
echo "</body>";
echo "</html>";
?>