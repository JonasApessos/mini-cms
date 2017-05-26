<?php
session_start();
$_SESSION['path'] = "";

//include_once "site_struct/data_struct/components/lib/lib_class/select_class.php";
//include_once "site_struct/data_struct/components/lib/lib_class/textarea_class.php";
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head></head>";
echo "<body>";
require_once "lib/lib_class/select_class.php";
require_once "lib/lib_class/textarea_class.php";
require_once "lib/lib_class/input_class.php";
require_once "lib/lib_class/button_class.php";
require_once "../../document_data/db_conn.php";
require_once "../../document_data/document_data.php";

if($_SESSION['access_level'] < 2)
{		
		$input = new input();
		$textarea = new textarea();
		$select = new select();
		$button = new button();


		echo "<div>";
		echo "<form action=\"\" method=\"POST\">";
		
		$path = 0;
		$read_file = 0;
		$file_text = "";
		
		echo "</br> Current Path: ".getcwd()."</br>";
		
		if(empty($_POST['path']))
			$path = getcwd();
		else
			$path = $_POST['path'];
		
		if(empty($_POST['selected_file']))
			$selected_file = "";
		else
			$selected_file = $_POST['selected_file'];
		
		echo "</br>is dir : " . $selected_file . "</br>";
		
		if(is_dir($selected_file))
			$dir = ($path ."\\". $selected_file);
		else if(empty($dir))
			$dir = getcwd();
		else if(is_file($selected_file))
			$dir = ($path.$selected_file);
		
		chdir($dir);

		$files = scandir(getcwd(),1);
		
		if(is_file($selected_file))
		{
			$read_file = fopen($selected_file,'r')or die("could not open file");
			while(!feof($read_file))
				$file_text .= fgets($read_file);
		}
		
		$select->clear_data();
		
		$select->set_name("selected_file");
		
		for($i = 0; $i < count($files); $i++)
		{
			//echo "</br>is dir? : " . is_dir($selected_file) . "</br>";
			if((is_dir($files[$i]) || is_dir($selected_file)) && $files[$i] != ".." && !(is_file($files[$i])))
				$select->add_option(($files[$i]." (DIR)"),($selected_file . $files[$i] . "\\"));
			else if((is_dir($files[$i]) || is_dir($selected_file)) && $files[$i] == "..")
				$select->add_option(($files[$i]." (DIR)"),($selected_file . $files[$i] . "/"));
			else if(is_dir($files[$i]) && !(is_file($files[$i])))
				$select->add_option(($files[$i]." (DIR)"),$files[$i]);
			else
				$select->add_option($files[$i]." (FILE)",($selected_file . $files[$i]));
		}
		
		echo $select->display();
		
		$input->clear_data();
		
		$input->set_type("text");
		$input->set_name("input_path");
		$input->set_value($dir);
		$input->set_required();
		$input->set_readonly();
		
		echo $input->display();
		
		$input->clear_data();
		
		$select->clear_data();
		
		$textarea->clear_data();
		
		$textarea->set_name("file_data");
		
		echo $textarea->display_input($file_text);
		
		$textarea->clear_data();
		
		$select->clear_data();
		
		$input->clear_data();
		
		$input->set_type("submit");
		$input->set_value("Open/redirect file");
		
		echo $input->display();
		
		$input->clear_data();
		
		$button->set_type("button");
		$button->set_formaction("additional_componets/save_file.php");
		$button->set_formmethod("POST");
		
		echo $button->display("Save");
		
		$button->clear_data();
		
		echo "</form>";
		echo "</div>";
		
		echo "<iframe src=\"../../../\" width=\"100%\" height=\"512px\"></iframe>";
}
else
	Header("Location: ../../../");

echo "</body>";
echo "</html>";
?>