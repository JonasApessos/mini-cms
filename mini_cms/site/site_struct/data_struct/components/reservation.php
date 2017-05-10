<?php
echo "<div class = \"".$res_class."\">";
echo "<div>";

echo "<form>";

echo "<table>";
echo "<tbody>";

echo "<tr>";
echo "<td><h2>Name</h2></td>";
echo "<td><input type = \"text\" name = \"res_name\">";
echo "</tr>";

echo "<tr>";
echo "<td><h2>Comment</h2></td>";
echo "<td><textarea spellcheck = \"true\" ></textarea></td>";
echo "</tr>";

echo "<tr id = \"res_cal\">";
echo "</tr>";

echo "<tr>";
echo "<td></td>";
echo "<td><input type = \"submit\" value = \"reserve\"></td>";
echo "</tr>";

echo "<tr>";
echo "<td><h1>Error</h1></td>";
echo "<td><h3>type of error</h3></td>";
echo "</tr>";

echo "</tbody>";
echo "</table>";

echo "</form>";

echo "</div>";
echo "</div>";
?>