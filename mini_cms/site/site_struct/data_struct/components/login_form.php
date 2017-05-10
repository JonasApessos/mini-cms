<?php


if($_SESSION["access_level"] > 2)
{
	echo "<div class = '".$header_login_form."'>";
	
	echo "<div>";
	
	echo "<form action = \"site_struct/data_struct/components/additional_componets/php/login_check.php\" method = \"POST\" name = \"login_form\">";
	echo "<h2>Login</h2>";
	echo "<div>";
	echo "<h3>Email</h3>";
	echo "<input type = \"email\" placeholder = \"example@examble.com\" name = \"login_email\" onChange = \"user_login_email()\">";
	echo "</div>";
	
	echo "<div>";
	echo "<h3>Password</h3>";
	echo "<input type = \"password\" name = \"password_login\" onChange = \"user_login_pass(this)\">";
	echo "</div>";
	
	echo "<div>";
	echo "<input type = \"submit\" value = \"submit\" onChange=\"user_login(this)\">";
	echo "</div>";
	
	echo "<div>";
	echo "<h4><a href=\"site_struct\data_struct\components\create_account.php\">create account?</a></h4>";
	echo "<h4><a href=?menu_id=9>forgot password?</a></h4>";
	echo "</div>";
	
	echo "</div>";
	
	echo "</form>";

}
else
{
	$header_login_form = "loged_form_top";
	
	echo "<div class = '".$header_login_form."'>";
	
	echo "<div>";
	
	echo "<div>";
	echo "<img src = \"\" alt = \"profil_image\" width = \"100px;\"/>";
	echo "</div>";
	
	echo "<div>";
	echo "<h4>Username: ".$_SESSION["user_name"]."</h4>";
	echo "<h4>Email: ".$_SESSION["user_email"]."</h4>";
	echo "</div>";
	
	echo "<div>";
	echo "<form action = \"site_struct\data_struct\components\additional_componets\php\deset_session.php\" method = \"POST\">";
	echo "<input type = \"submit\" value = \"Logout\">";
	echo "</form>";
	echo "</div>";
	
	echo "</div>";
}
echo "</div>";
?>