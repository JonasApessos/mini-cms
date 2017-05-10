<?php			
			include "site_struct/document_data/db_conn.php";
			
			$level_request = $_SESSION['access_level'];
			
			switch($level_request)
			{
				case "GUEST":
					$sql = "SELECT page_component_title , re2213_include_file.page_component_id , include_file_path
					FROM re2213_page_component_structure , re2213_include_file
					WHERE re2213_page_component_structure.include_file_id = re2213_include_file.include_file_id 
					AND re2213_page_component_structure.access_level_id = 3
					ORDER BY re2213_page_component_structure.page_component_id ASC;";
					break;
				case "PUBLIC":
					$sql = "SELECT page_component_title , re2213_include_file.page_component_id , include_file_path
					FROM re2213_page_component_structure , re2213_include_file
					WHERE re2213_page_component_structure.include_file_id = re2213_include_file.include_file_id
					AND 
					(
					re2213_page_component_structure.access_level_id = 3 
					OR re2213_page_component_structure.access_level_id = 2
					)
					ORDER BY re2213_page_component_structure.page_component_id ASC;";
					break;
				case "ADMIN":
					$sql = "SELECT page_component_title , re2213_include_file.page_component_id , include_file_path
					FROM re2213_page_component_structure , re2213_include_file
					WHERE re2213_page_component_structure.include_file_id = re2213_include_file.include_file_id
					AND 
					(
					re2213_page_component_structure.access_level_id = 3 
					OR re2213_page_component_structure.access_level_id = 2
					OR re2213_page_component_structure.access_level_id = 1 
					)
					ORDER BY re2213_page_component_structure.page_component_id ASC;";
					break;
				default:
					echo "ERROR 22 , could not identify access level;";
					break;
			}

			$page_component_rows = mysqli_query($conn , $sql) or die("ERROR 23" . mysqli_error($conn));
			
			mysqli_close($conn);
			if(!isset($page_component_rows))
				echo "No data in the database";
			else
			{
				foreach($page_component_rows as $page_componet_row)
				{
					include_once $page_componet_row["include_file_path"];
				}
			}
			
			
?>