<?php
echo "	<div class = '".$header_login_form."'>";
echo "		<form action = \"site_struct/data_struct/componets/additional_componets/login_check.php\" method = \"POST\">";
echo "			<table>";
echo "				<tbody>";
echo "					<tr>";
echo "	    				<td><p>Email</p></td>";
echo "						<td><input type = \"text\" placeholder = \"example@examble.com\" name = \"login_email\"></td>";
echo "					</tr>";
echo "					<tr>";
echo "						<td><p>Password</p></td>";
echo "						<td><input type = \"password\" name = \"password_login\"></td>";
echo "					</tr>";
echo "					<tr>";
echo "						<td></td>";
echo "						<td><input type = \"submit\" value = \"submit\" ></td>";
echo "					</tr>";
echo "					<tr>";
echo "						<td><p><a href=?menu_id=7>create account?</a></p></td>";
echo "						<td><p><a href=?menu_id=9>forgot password?</a></p></td>";
echo "					</tr>";
echo "				</tbody>";
echo "			</table>";
echo "		</form>";
echo"	</div>";
echo "</div>";
?>