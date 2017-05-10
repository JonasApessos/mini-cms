<?php
				include_once "../variables/variables.php";
				$order_selection = NULL;
				
				$sql = "use " . $dbname;
				mysqli_query($conn , $sql);
				
				if(isset($_GET["flag"]))
				{
					$sql = "delete from re2213_user where usr_id = " . (string)$_GET["usr_id"];
					mysqli_query($conn , $sql);
				}
				
				if(isset($_GET["selection"]))
					$order_selection = $_GET["selection"];
				else
					$order_selection = "usr_id";

				$sql = "select * from re2213_user order by " . $order_selection;

				$rows = mysqli_query($conn , $sql);

				foreach($rows as $row)
				{
					echo "<form>";
					echo "	<table class = 'adm_db_view'>";
					echo "		<tbody>";
					echo "			<tr>";
					echo "				<td><h2>ID :</h2></td>";
					echo "				<td><input type = 'text' value = ' " .$row["usr_id"] . " ' readonly></td>";
					echo "			</tr>";
					echo "			<tr>";
					echo "				<td><h2>USERNAME :</h2></td>";
					echo "				<td><input type = 'text' value = ' " .$row["username"] . " ' readonly></td>";
					echo "			</tr>";
					echo "			<tr>";
					echo "				<td><h2>GENDER :</h2></td>";
					echo "				<td><input type = 'text' value = ' " .$row["usr_gender"] . " ' readonly></td>";
					echo "			</tr>";
					echo "			<tr>";
					echo "				<td><h2>DESCRIPTION :</h2></td>";
					echo "				<td><textarea type = 'text' placeholder = ' " .$row["usr_desc"] . " ' readonly></textarea></td>";
					echo "			</tr>";
					echo "			<tr>";
					echo "				<td><a href='index.php?flag=true&usr_id=".$row['usr_id']."' )><img src = '../images/del_symbol.png' alt = 'del_symbol.png' ></a></td>";
					echo "			</tr>";
					echo "		</tbody>";
					echo "	</table>";
					echo "</form>";
				}

				mysqli_close($conn);
			?>