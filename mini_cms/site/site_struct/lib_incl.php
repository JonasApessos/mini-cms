<?php
$sql  = "
SELECT ".$prefix."incFile.fileType_id,".$prefix."incFile.incFile_path 
FROM ".$prefix."incFile,".$prefix."fileType
WHERE ".$prefix."incFile.fileType_id = 4 
AND ".$prefix."incFile.fileType_id = ".$prefix."fileType.fileType_id;";

$css_data_rows = mysqli_query($conn , $sql)or die("ERROR 02" . mysqli_error($conn));

foreach($css_data_rows as $css_data_row => $css_data)
{
	echo "<link rel =\"stylesheet\" type = \"text/css\" href = \"".$css_data['incFile_path']."\" media = \"screen\">";
}
$css_data = 0;
$css_data_row = 0;
$css_data_rows = 0;

$sql  = "
SELECT ".$prefix."incFile.fileType_id,".$prefix."incFile.incFile_path 
FROM ".$prefix."incFile,".$prefix."fileType
WHERE ".$prefix."incFile.fileType_id = 3 
AND ".$prefix."incFile.fileType_id = ".$prefix."fileType.fileType_id;";
 
$js_data_rows = mysqli_query($conn , $sql)or die("ERROR 03".mysqli_error($conn));
 
foreach($js_data_rows as $js_data_row => $js_data)
{
	echo "<script src = \"".$js_data['incFile_path']."\"></script>";
}
$js_data = 0;
$js_data_rows = 0;
$js_data_row = 0;
echo "<title>Deluxe Restaurant</title>";
?>