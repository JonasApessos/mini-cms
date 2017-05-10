<?php
echo "<div class = \"".$res_class."\">";
echo "<div>";

echo "<form action=\"site_struct/data_struct/components/additional_componets/php/res_table.php\" method = \"POST\" onChange = \"updateForm()\">";

echo "<table>";
echo "<tbody>";

echo "<tr>";
echo "<td><h2>Name</h2></td>";
echo "<td><input type = \"text\" name = \"res_name\" onfocusout = \"nameFieldCheck(this.value)\" placeholder = \"ex. charles\"></td>";
echo "</tr>";

echo "<tr>";
echo "<td><h2>Smoking</h2></td>";
echo "<td><select name = \"smoking\"><option value = \"1\">Yes</option><option value = \"0\">No</option></select></td>";
echo "</tr>";

echo "<tr>";
echo "<td><h2>Number of people</h2></td>";
echo "<td><input type = \"text\" name = \"res_people\" onfocusout = \"peopleFieldCheck(this.value)\" placeholder = \"ex. 5\"></td>";
echo "</tr>";

echo "<tr>";
echo "<td><h2>Comment</h2></td>";
echo "<td><textarea spellcheck = \"true\" name = \"res_comment\" placeholder = \"ex. i want a table close to the window with a champange ready\"></textarea></td>";
echo "</tr>";

echo "<tr id = \"res_cal\">";
echo "</tr>";

echo "<tr>";
echo "<td></td>";
echo "<td><input type = \"submit\" value = \"reserve\"></td>";
echo "</tr>";

echo "<tr>";
echo "<td class = \"display_error\"><h1>Error</h1></td>";
echo "<td class = \"type_error\"><h3>type of error</h3></td>";
echo "</tr>";

echo "</tbody>";
echo "</table>";

echo "</form>";

echo "</div>";
echo "</div>";
?>