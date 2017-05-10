<?php
	session_start();//starting session
	
	$_SESSION['access_level'] = "GUEST";
	$_SESSION['user_name'] = "none";
	$_SESSION['user_email'] = "none";
	
	$prefix = "re2213";
	if(!isset($_GET["menu_id"]))
	{
		$_SESSION["menu_id"] = 1;//setting menu selection session id
	}
	else
	{
		$_SESSION["menu_id"] = $_GET["menu_id"];
	}
	include_once "site_struct/document_data/document_data.php";
?>

<! DOCTYPE html>
<html>
<head>

<!-- setting css style (in future versions those files will change)-->
<?php
	include "site_struct/document_data/db_conn.php";
	
	$sql  = "SELECT include_file_path FROM " . $prefix . "_include_file , ".$prefix."_page_component_structure where file_type_id = 4 AND ".$prefix."_page_component_structure.page_component_id = ".$prefix."_include_file.page_component_id;";
	$css_data_rows = mysqli_query($conn , $sql)or die("ERROR 02" . mysqli_error($conn));
	mysqli_close($conn);
	foreach($css_data_rows as $css_data_row)
	{
		echo $test = "<link rel =\"stylesheet\" type = \"text/css\" href = \"".$css_data_row['include_file_path']."\" media = \"screen\">";
	}
?>

<link rel="stylesheet" href="../css/site_style/desktop_style/component_style/drop_down_menu.php" media="screen">
<link rel="stylesheet" href="../css/site_style/desktop_style/component_style/login_form.php" media="screen">

<script src = "../absolute_menu.js"></script><!-- absolute menu javascript execution arrow menu animation-->

<title>Deluxe Restaurant</title>
</head>

<body>
		<?php
			include_once "site_struct/mobile_screen/absolute_menu.php";//include absolute menu structure (phone menu)
		?>

    <div class = "containment">

		<?php
			include_once "site_struct/data_struct.php";//include site data structure
		?>
		
    </div>
</body>
</html>