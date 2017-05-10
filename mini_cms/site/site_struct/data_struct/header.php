<?php
//header logo
echo "<div class = \"". $header_class ."\">";
echo "<div class = \"".$header_logo_class."\">";
echo "<img src=\''\" alt = \"LOGO\">";
echo "</div>";

//header site title
echo "<div class = \"".$header_title_class."\">";
echo "<h1>".$header_title."</h1>";
echo"</div>";

//header login form
include_once "site_struct/data_struct/components/login_form.php";
echo "</div>";
?>