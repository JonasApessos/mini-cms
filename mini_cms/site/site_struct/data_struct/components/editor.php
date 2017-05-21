<?php
session_start();

//include_once "site_struct/data_struct/components/lib/lib_class/select_class.php";
//include_once "site_struct/data_struct/components/lib/lib_class/textarea_class.php";

include_once "lib/lib_class/select_class.php";
include_once "lib/lib_class/textarea_class.php";
include_once "lib/lib_class/input_class.php";

$editor_select = new select();
$editor_textarea = new textarea();
$editor_input = new input();

if($_SESSION['access_level'] < 2)
{
	$file_text = "";
	if(empty($_POST['path']))
		$path = "catalog.php";
	else
		$path = $_POST['path'];
	
	if(!(strpos($path,".php")) || strpos($path,".."))
	{
		chdir($path);
	}
	else
	{
		$test_read_file = fopen($path, 'r') or die ("could not open file");

	$files = scandir(getcwd(), 1);
	echo "<div>";
	
	$editor_textarea->set_type("text");
	$editor_textarea->set_dimensions("10","5");
	
	while(!feof($test_read_file))
	{
		$file_text .= fgets($test_read_file);
	}
	$editor_textarea->display_input($file_text);
	unset($file_text);

	echo "<form action=\"#\" method =\"POST\">";
	
	$editor_select->set_name("path");
	
	for($i = 0; $i < count($files); $i++)
	{
		if($files[$i] == "..")
			$files[$i] == "cd ..";
		$editor_select->add_option($files[$i],$files[$i]);
	}

	echo $editor_select->display();
	
	$editor_input->set_type("submit");
	
	echo $editor_input->display();

	echo "</form>";
	echo "</div>";

	fclose($test_read_file);
	}
}
else
	Header("Location: ../../../");
?>