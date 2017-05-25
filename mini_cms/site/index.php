<?php
Header("Pragma: no-cache");//disable web automatic content cashing
session_set_cookie_params(180,"/",true,false);
session_start();//starting session
//print_r(session_get_cookie_params ());
ini_set('display_errors',1);
//echo ini_get('register_globals');
?>
<?php
include_once "site_struct/document_data/db_conn.php";//db connection
include_once "site_struct/document_data/document_data.php";//header with global variables
include_once "site_struct/data_struct/components/lib/lib_class/input_class.php";//include class files
include_once "site_struct/data_struct/components/lib/lib_class/button_class.php";
include_once "site_struct/data_struct/components/lib/lib_class/select_class.php";
include_once "site_struct/data_struct/components/lib/lib_class/textarea_class.php";

$input = new input();//create new input object that all the page will use
$button = new button();//create new button object that all the page will use
$select = new select();//create new select object that all the page will use
$textarea = new textarea();//create textarea input object that all the page will use

?>
<?php
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<p>step1: " . ((memory_get_usage()/1000)/1000) . "MB</p>";//see memory usage of php
echo "<link rel=\"icon\" href=\"../images/test.png\" type=\"image/png\"/>";//favicon
include_once "site_struct/document_data/init_sessions.php";//init session

include_once "site_struct/lib_incl.php";//include external library's (css,js)

echo "</head>";

echo "<body onload = \"initFunc()\">";//init function loads all script needed , if 1 script fails all else fails , this is for good practice reason
include_once "site_struct/mobile_screen/absolute_menu.php";//include absolute menu structure (phone menu)
include_once "site_struct/data_struct/components/create_account.php";
include_once "site_struct/data_struct/components/additional_componets/php/recovery.php";
include_once "site_struct/data_struct/components/additional_componets/php/broadcaster.php";
		
echo "<div class = \"containment\">";//this is a container div where it will contain all the page structure
		
include_once "site_struct/data_struct.php";//include site data structure
		
echo "</div>";

include_once "site_struct/data_struct/components/admin_images.php";//include administrator button images

echo "</body>";
echo "</html>";
echo "<p>step2: " . ((memory_get_usage()/1000)/1000) . "MB</p>";
mysqli_close($conn);//closing db connection for the client

unset($conn);//unset variables to free up unused memory
unset($sql);
unset($input);
unset($button);
unset($select);
unset($textarea);

echo "<p>step3: " . ((memory_get_usage()/1000)/1000) . "MB</p>";
?>