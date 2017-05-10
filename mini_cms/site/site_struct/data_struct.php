<?php			
			include "site_struct/document_data/db_conn.php";
?>

<?php
			
			switch($_SESSION['access_level'])
			{
				case 3:
					$sql = "SELECT ".$prefix."_page_component_structure.page_component_title , ".$prefix."_page_component_structure.submenu_id , ".$prefix."_include_file.include_file_path
					FROM ".$prefix."_page_component_structure , ".$prefix."_include_file
					WHERE (".$prefix."_page_component_structure.include_file_id = ".$prefix."_include_file.include_file_id 
                          AND ".$prefix."_page_component_structure.submenu_id = 1)
					AND 
					(
					".$prefix."_page_component_structure.access_level_id = 3 
					)
					ORDER BY ".$prefix."_page_component_structure.page_component_id ASC;";
					break;
				case 2:
					$sql = "SELECT ".$prefix."_page_component_structure.page_component_title , ".$prefix."_page_component_structure.submenu_id , ".$prefix."_include_file.include_file_path
					FROM ".$prefix."_page_component_structure , ".$prefix."_include_file
					WHERE (".$prefix."_page_component_structure.include_file_id = ".$prefix."_include_file.include_file_id 
                          AND ".$prefix."_page_component_structure.submenu_id = 1)
					AND 
					(
					".$prefix."_page_component_structure.access_level_id = 3 
					OR ".$prefix."_page_component_structure.access_level_id = 2
					)
					ORDER BY ".$prefix."_page_component_structure.page_component_id ASC;";
					break;
				case 1:
					$sql = "SELECT ".$prefix."_page_component_structure.page_component_title , ".$prefix."_page_component_structure.submenu_id , ".$prefix."_include_file.include_file_path
					FROM ".$prefix."_page_component_structure , ".$prefix."_include_file
					WHERE (".$prefix."_page_component_structure.include_file_id = ".$prefix."_include_file.include_file_id 
                          AND ".$prefix."_page_component_structure.submenu_id = 1)
					AND 
					(
					".$prefix."_page_component_structure.access_level_id = 3 
					OR ".$prefix."_page_component_structure.access_level_id = 2
					OR ".$prefix."_page_component_structure.access_level_id = 1 
					)
					ORDER BY ".$prefix."_page_component_structure.page_component_id ASC;";
					break;
				default:
					echo "ERROR 22 , could not identify access level;";
					break;
			}

			$page_component_rows = mysqli_query($conn , $sql) or die("ERROR 23" . mysqli_error($conn));
			
			
			if(!isset($page_component_rows))
				echo "No data";
			else
			{
				foreach($page_component_rows as $page_component_row)
				{
					include_once $page_component_row["include_file_path"];
					$page_component_row = NULL;
				}
			}
			
?>