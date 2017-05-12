<?php
if(empty($_POST['path']))
	$path = "catalog.php";
else
	$path = $_POST['path'];

$test_read_file = fopen($path, 'r') or die ("could not open file");

$files = scandir(getcwd(), 1);
echo "<div>";
echo "<textarea type = \"text\">";
while(!feof($test_read_file))
{
	echo fgets($test_read_file);
}
echo "</textarea>";

echo "<form action=\"\" method =\"POST\">";

echo "<select name=\"path\">";
for($i = 0; $i < count($files); $i++)
{
	echo "<option value = \"".$files[$i]."\">".$files[$i]."</option>";
}
echo "</select>";
echo "<input type=\"submit\">";

echo "</form>";
echo "</div>";

fclose($test_read_file);
?>