<?php
//header logo
echo "<div class = \"". $header_class ."\">";
echo "<div class = \"".$header_logo_class."\">";
echo "<img src=\"../images/logo.jpg\" alt = \"LOGO\">";
echo "</div>";

//header site title
echo "<div class = \"".$header_title_class."\">";
echo "<h1>".$header_title."</h1>";
echo"</div>";

//header login form
require_once "site_struct/data_struct/components/login_form.php";
echo "</div>";
?>