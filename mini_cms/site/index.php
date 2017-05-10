<?php
Header("Pragma: no-cache");//disable web automatic content cashing
session_start();//starting session
?>
<?php
include_once "site_struct/document_data/db_conn.php";//db connection
include_once "site_struct/document_data/document_data.php";//header with global variables
?>
<?php
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";

if(!isset($_SESSION['access_level']))
{
	$_SESSION['access_level'] = 3;//access level session determines the access level a user has the rite to access content of the website
	$_SESSION['user_name'] = "none";
	$_SESSION['user_email'] = "none";
	$_SESSION['user_id'] = 0;
}

if(!isset($_GET["menu_id"]) || empty($_GET['menu_id']))
	$_SESSION["menu_id"] = 2;//setting menu selection session id
else
	$_SESSION["menu_id"] = $_GET["menu_id"];

include_once "site_struct/lib_incl.php";//include external library's (css,js)

echo "</head>";

echo "<body onload = \"initFunc()\">";//init function loads all script needed , if 1 script fails all else fails , this is for good practice reason
include_once "site_struct/mobile_screen/absolute_menu.php";//include absolute menu structure (phone menu)
		
echo "<div class = \"containment\">";
		
include_once "site_struct/data_struct.php";//include site data structure
		
echo "</div>";

//include administrator button images
include_once "site_struct/data_struct/components/admin_images.php";

echo "</body>";
echo "</html>";
mysqli_close($conn);//closing db connection for the entire page
$conn = 0;
$sql = 0;
?>