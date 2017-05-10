<?php

echo "	<div class = '".$header_login_form."'>";
if($_SESSION["access_level"] == 3)
{
	echo "		<form action = \"site_struct/data_struct/components/additional_componets/php/login_check.php\" method = \"POST\" name = \"login_form\">";
	echo "			<table>";
	echo "				<tbody>";
	echo "					<tr>";
	echo "	    				<td><p>Email</p></td>";
	echo "						<td><input type = \"text\" placeholder = \"example@examble.com\" name = \"login_email\" onChange = \"user_login_email()\"></td>";
	echo "					</tr>";
	echo "					<tr>";
	echo "						<td><p>Password</p></td>";
	echo "						<td><input type = \"password\" name = \"password_login\" onChange = \"user_login_pass(this)\"></td>";
	echo "					</tr>";
	echo "					<tr>";
	echo "						<td></td>";
	echo "						<td><input type = \"submit\" value = \"submit\" onChange=\"user_login(this)\"></td>";
	echo "					</tr>";
	echo "					<tr>";
	echo "						<td><p><a href=?menu_id=7>create account?</a></p></td>";
	echo "						<td><p><a href=?menu_id=9>forgot password?</a></p></td>";
	echo "					</tr>";
	echo "				</tbody>";
	echo "			</table>";
	echo "		</form>";
	echo"	</div>";
}
else
{
	echo "	<div>";
	echo "		<img src = \"../d2s.jpg\" alt = \"profil_image\" width = \"100px;\"/>";
	echo "	</div>";
	
	echo "	<div>";
	echo "		<h4>Username: ".$_SESSION["user_name"]."</h4>";
	echo "		<h4>Email: ".$_SESSION["user_email"]."</h4>";
	echo "	</div>";
	
	echo "	<div>";
	echo "	<form action = \"site_struct\data_struct\components\additional_componets\php\deset_session.php\" method = \"POST\">";
	echo "		<input type = \"submit\" value = \"Logout\">";
	echo "	</form>";
	echo "	</div>";
}
echo "</div>";
?>