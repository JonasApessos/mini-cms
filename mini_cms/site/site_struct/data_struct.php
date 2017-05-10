<?php			
			include "site_struct/document_data/db_conn.php";
			
			$sql = "SELECT page_component_title , re2213_include_file.page_component_id , include_file_path FROM re2213_page_component_structure , re2213_include_file WHERE re2213_page_component_structure.include_file_id = re2213_include_file.include_file_id;";
			$page_component_rows = mysqli_query($conn , $sql) or die("ERROR 22" . mysqli_error($conn));
			
			mysqli_close($conn);
			foreach($page_component_rows as $page_componet_row)
			{
				include_once $page_componet_row["include_file_path"];
			}
			
			
?>