<?php
include_once "site_struct/data_struct/components/lib/lib_class/input_class.php";

$log_input = new input();

if($_SESSION["access_level"] > 2)
{
	$log_input->set_type("email");
	$log_input->set_placeholder("example@example.com");
	$log_input->set_name("login_email");
	$log_input->set_maxlength("48");
	$log_input->set_type("email");
	$log_input->set_onchange("user_login_email(this)");
	
	echo "<div class = '".$header_login_form."'>";
	
	echo "<div>";
	
	echo "<form action = \"site_struct/data_struct/components/additional_componets/php/login_check.php\" method = \"POST\" name = \"login_form\">";
	echo "<h2>Login</h2>";
	echo "<div>";
	echo "<h3>Email</h3>";
	//echo "<input type = \"email\" placeholder = \"example@example.com\" name = \"login_email\" maxlength = \"48\" onChange = \"user_login_email()\">";
	$log_input->display();
	echo "</div>";
	
	$log_input->clear_data();
	
	$log_input->set_type("password");
	$log_input->set_name("password_login");
	$log_input->set_maxlength("48");
	$log_input->set_onchange("user_login_pass(this)");
	
	
	echo "<div>";
	echo "<h3>Password</h3>";
	//echo "<input type = \"password\" name = \"password_login\" maxlength = \"48\" onChange = \"user_login_pass(this)\">";
	$log_input->display();
	echo "</div>";
	
	
	$log_input->clear_data();
	
	$log_input->set_type("submit");
	$log_input->set_value("submit");
	$log_input->set_onchange("user_login(this)");
	
	
	echo "<div>";
	//echo "<input type = \"submit\" value = \"submit\" onChange=\"user_login(this)\">";
	$log_input->display();
	echo "</div>";
	$log_input->clear_data();
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
	echo "<img src = \"\" alt = \"profil_image\" width = \"100px;\">";
	echo "</div>";
	
	echo "<div>";
	echo "<h4>Username: ".$_SESSION["user_name"]."</h4>";
	echo "<h4>Email: ".$_SESSION["user_email"]."</h4>";
	echo "</div>";
	
	$log_input->set_type("submit");
	$log_input->set_value("Logout");
	
	echo "<div>";
	echo "<form action = \"site_struct\data_struct\components\additional_componets\php\deset_session.php\" method = \"POST\">";
	//echo "<input type = \"submit\" value = \"Logout\">";
	$log_input->display();
	echo "</form>";
	echo "</div>";
	$log_input->clear_data();
	echo "</div>";
}

unset($log_input);

echo "</div>";
?>