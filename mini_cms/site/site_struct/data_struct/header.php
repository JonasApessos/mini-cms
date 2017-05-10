<?php
include "site_struct/document_data/document_data.php";

echo "<div class = '". $header_class ."'>";
echo "	<div class = '".$header_logo_class."'>";
echo "		<img src='' alt = 'LOGO'>";
echo "	</div>";

echo "	<div class = '".$header_title_class."'>";
echo "		<h1>".$header_title."</h1>";
echo"		</div>";


echo "	<div class = '".$header_login_form."'>";
echo "		<form>";
echo "			<table>";
echo "				<tbody>";
echo "					<tr>";
echo "	    				<td><p>Email</p></td>";
echo "						<td><input type = 'text' placeholder = 'example@examble.com' name ='login_email'></td>";
echo "					</tr>";
echo "					<tr>";
echo "						<td><p>Password</p></td>";
echo "						<td><input type = 'password' name = 'password_login'></td>";
echo "					</tr>";
echo "					<tr>";
echo "						<td></td>";
echo "						<td><input type = 'submit' value = 'submit' ></td>";
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