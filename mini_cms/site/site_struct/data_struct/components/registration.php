<?php

echo "<form action = \"../data_parse/login_data_parse.php\" method=\"POST\">";
echo "<table class=\"".$table_form_class."\">";
echo "<tbody>";
echo "<tr>";
echo "<td><p>username</p></td>";
echo "<td><input type = \"text\" name = \"reg_1\" placeholder = \"example : john\" required></td>";
echo "</tr>";
echo "<tr>";
echo "<td><p>Password</p></td>";
echo "<td><input type = \"password\"  name = \"reg_2\" required></td>";
echo "</tr>";			
echo "<tr>";
echo "<td><p>Gender</p></td>";
echo "<td>";
echo "<input type = \"radio\" name = \"gender\" value = \"male\" required>Male";
echo "<input type = \"radio\" name = \"gender\" value = \"female\" required>Female";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td><p>Description</p></td>";
echo "<td><textarea type = \"description\" name = \"reg_4\" placeholder = \"description\"></textarea></td>";
echo "</tr>";
echo "<tr>";
echo "<td><input type = \"submit\" value = \"Register\" ></td>";
echo "</tr>";
echo "</tbody>";
echo "</table>";
echo "</form>";


?>