<?php
	header("Pragma: no-cache");//disable web automatic content cashing
	session_start();//starting session
?>
<?php
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";

include_once "site_struct/document_data/document_data.php";


if(!isset($_SESSION['access_level']))
{
	$_SESSION['access_level'] = 3;
	$_SESSION['user_name'] = "none";
	$_SESSION['user_email'] = "none";
}

if(!isset($_GET["menu_id"]) || empty($_GET['menu_id']))
	$_SESSION["menu_id"] = 2;//setting menu selection session id
else
	$_SESSION["menu_id"] = $_GET["menu_id"];


include_once "site_struct/lib_incl.php";

echo "</head>";

echo "<body onload = \"init_func()\">";
include_once "site_struct/mobile_screen/absolute_menu.php";//include absolute menu structure (phone menu)
		

echo "  <div class = \"containment\" >";
		
include_once "site_struct/data_struct.php";//include site data structure
		
echo "  </div>";

$sql = "SELECT ".$prefix."compDataImg.compDataImg_id , ".$prefix."compDataImg.compDataImg_path FROM ".$prefix."compDataImg , ".$prefix."compData
WHERE ".$prefix."compDataImg.fileType_id = 6 
AND ".$prefix."compDataImg.compDataImg_id = ".$prefix."compData.compDataImg_id
AND ".$prefix."compData.accessLv_id = ".$_SESSION['access_level'].";";

$img_rows = mysqli_query($conn , $sql) or die("error images : " . mysqli_error($conn));

foreach($img_rows as $img_row => $img_data)
{
	switch($img_data['compDataImg_id'])
	{
		case 1:
			echo "<img src = \"".$img_data['compDataImg_path']."\">";
			break;
		case 2:
			echo "<img src = \"".$img_data['compDataImg_path']."\">";
			break;
		case 3:
			echo "<img src = \"".$img_data['compDataImg_path']."\">";
			break;
		default:
			echo "admin buttons not found\n";
			break;
	}
}

echo "</body>";
echo "</html>";
mysqli_close($conn);
?>