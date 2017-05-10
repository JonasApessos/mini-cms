<?php
include_once "site_struct/document_data/db_conn.php";

$sql  = "SELECT include_file_path FROM " . $prefix . "_include_file , ".$prefix."_page_component_structure where file_type_id = 4 AND ".$prefix."_page_component_structure.page_component_id = ".$prefix."_include_file.page_component_id;";

$css_data_rows = mysqli_query($conn , $sql)or die("ERROR 02" . mysqli_error($conn));

foreach($css_data_rows as $css_data_row)
{
	echo $test = "<link rel =\"stylesheet\" type = \"text/css\" href = \"".$css_data_row['include_file_path']."\" media = \"screen\">";
}

$css_data_row = NULL;
$css_data_rows = NULL;

echo "<link rel=\"stylesheet\" href=\"../css/site_style/desktop_style/component_style/drop_down_menu.php\" media=\"screen\">";
echo "<script src = \"../js/absolute_menu.js\"></script>";
echo "<script src = \"../js/google_map.js\"></script>";
echo "<script src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyDYo2lMIObZYq2QN4sx7sEqBTsyPfxxwog&callback=google_map\"></script>";
echo "<script src = \"../js/res_cal.js\"></script>";
echo "<script src =  \"../js/".$header_login_script."\"></script>";
echo "<script src = \"../js/init.js\"></script>";
echo "<title>Deluxe Restaurant</title>";
?>