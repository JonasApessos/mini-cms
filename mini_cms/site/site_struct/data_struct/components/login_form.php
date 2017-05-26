<?php
if($_SESSION["access_level"] > 2)
{
	$input->set_type("email");
	$input->set_placeholder("example@example.com");
	$input->set_name("login_email");
	$input->set_maxlength("48");
	$input->set_required();
	$input->set_onchange("user_login_email(this)");
	
	echo "<div class = '".$header_login_form."'>";
	
	echo "<div>";
	
	echo "<form action = \"site_struct/data_struct/components/additional_componets/php/login_check.php\" method = \"POST\" name = \"login_form\">";
	echo "<h2>Login</h2>";
	echo "<div>";
	echo "<h3>Email</h3>";
	$input->display();
	echo "</div>";
	
	$input->clear_data();
	
	$input->set_type("password");
	$input->set_name("password_login");
	$input->set_maxlength("48");
	$input->set_required();
	$input->set_onchange("user_login_pass(this)");
	
	
	echo "<div>";
	echo "<h3>Password</h3>";
	$input->display();
	echo "</div>";
	
	
	$input->clear_data();
	
	$input->set_type("submit");
	$input->set_value("submit");
	$input->set_onchange("user_login(this)");
	
	echo "<div>";
	$input->display();
	echo "</div>";
	$input->clear_data();
	
	$button->set_type("button");
	$button->set_onclick("display_creator()");
	
	
	echo "<div>";
	echo $button->display("Create Account");
		
	echo "</div>";
	
	echo "</form>";
}
else
{	
	$header_login_form = "loged_form_top";
	
	echo "<div class = '".$header_login_form."'>";
	
	echo "<div>";
	
	/*echo "<div>";
	echo "<img src = \"\" alt = \"profil_image\" width = \"100px;\">";
	echo "</div>";*/
	
	echo "<div>";
	echo "<h4>Username: ".$_SESSION["user_name"]."</h4>";
	echo "<h4>Email: ".$_SESSION["user_email"]."</h4>";
	echo "</div>";
	
	$input->set_type("submit");
	$input->set_value("Logout");
	
	echo "<div>";
	echo "<form action = \"site_struct\data_struct\components\additional_componets\php\deset_session.php\" method = \"POST\">";
	$input->display();
	echo "</form>";
	echo "</div>";
	$input->clear_data();
	echo "</div>";
}

echo "</div>";
?>