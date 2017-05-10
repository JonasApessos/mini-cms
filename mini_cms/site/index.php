<?php
	session_start();//starting session
	
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
<link rel="stylesheet" type="text/css" href="../css/site_style/desktop_style/desktop_style.css" media="screen">
<link rel="stylesheet" type="text/css" href="../css/site_style/desktop_style/header.css" media="screen">
<link rel="stylesheet" type="text/css" href="../css/site_style/desktop_style/menu.css" media="screen">
<link rel="stylesheet" type="text/css" href="../css/site_style/desktop_style/main.css" media="screen">
<link rel="stylesheet" type="text/css" href="../css/site_style/desktop_style/footer.css" media="screen">
<link rel="stylesheet" href="../css/site_style/desktop_style/component_style/drop_down_menu.php" media="screen">
<link rel="stylesheet" type="text/css" href="../css/site_style/desktop_style/component_style/login_form.php" media="screen">
<link rel="stylesheet" type="text/css" href="../css/site_style/desktop_style/component_style/register_form.css" media="screen">
<link rel="stylesheet" type="text/css" href="../css/site_style/desktop_style/component_style/home.css" media="screen">
<link rel="stylesheet" type="text/css" href="../css/site_style/desktop_style/component_style/about_us.css" media="screen">
<link rel="stylesheet" type="text/css" href="../css/site_style/desktop_style/component_style/contact.css" media="screen">
<link rel="stylesheet" type="text/css" href="../css/site_style/desktop_style/component_style/catalog.css" media="screen">
<link rel="stylesheet" type="text/css" href="../css/site_style/desktop_style/component_style/faculty.css" media="screen">
<link rel="stylesheet" type="text/css" href="../css/site_style/phone_style.css" media="screen">
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