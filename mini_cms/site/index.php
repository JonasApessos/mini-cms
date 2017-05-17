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
echo "<link rel=\"icon\" href=\"../images/test.png\" type=\"image/png\"/>";
include_once "site_struct/document_data/init_sessions.php";//init session

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
mysqli_close($conn);//closing db connection for the client

unset($conn);
unset($sql);
?>