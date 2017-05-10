<?php
				include_once "../../../../../document_data/document_data.php";
?>
<?php
				$order_selection = "";
				
				if(isset($_GET["flag"]))
				{
					$sql = "delete from ".$prefix."user where usr_id = " . (string)$_GET["usr_id"];
					mysqli_query($conn , $sql);
				}
				
				if(isset($_GET["selection"]))
					$order_selection = $_GET["selection"];
				else
					$order_selection = "usr_id";

				$sql = "select * from ".$prefix."user order by " . $order_selection;

				$user_rows = mysqli_query($conn , $sql);

				foreach($user_rows as $user_row => $user_data)
				{
					echo "<form>";
					echo "	<table class = 'adm_db_view'>";
					echo "		<tbody>";
					echo "			<tr>";
					echo "				<td><h2>ID :</h2></td>";
					echo "				<td><input type = 'text' value = ' " .$user_data["usr_id"] . " ' readonly></td>";
					echo "			</tr>";
					echo "			<tr>";
					echo "				<td><h2>USERNAME :</h2></td>";
					echo "				<td><input type = 'text' value = ' " .$user_data["username"] . " ' readonly></td>";
					echo "			</tr>";
					echo "			<tr>";
					echo "				<td><h2>GENDER :</h2></td>";
					echo "				<td><input type = 'text' value = ' " .$user_data["usr_gender"] . " ' readonly></td>";
					echo "			</tr>";
					echo "			<tr>";
					echo "				<td><h2>DESCRIPTION :</h2></td>";
					echo "				<td><textarea type = 'text' placeholder = ' " .$user_data["usr_desc"] . " ' readonly></textarea></td>";
					echo "			</tr>";
					echo "			<tr>";
					echo "				<td><a href='index.php?flag=true&usr_id=".$user_data['usr_id']."' )><img src = '../images/del_symbol.png' alt = 'del_symbol.png' ></a></td>";
					echo "			</tr>";
					echo "		</tbody>";
					echo "	</table>";
					echo "</form>";
				}

				mysqli_close($conn);
			?>