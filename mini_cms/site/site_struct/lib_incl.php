<?php
//include all css files
$sql  = "
SELECT ".$prefix."incFile.fileType_id,".$prefix."incFile.incFile_path 
FROM ".$prefix."incFile,".$prefix."fileType
WHERE ".$prefix."incFile.fileType_id = 4 
AND ".$prefix."incFile.fileType_id = ".$prefix."fileType.fileType_id
AND ".$prefix."incFile.accessLV_id > ".($_SESSION['access_level'] - 1).";";

$css_data_rows = mysqli_query($conn , $sql)or die("ERROR 03" . mysqli_error($conn));

foreach($css_data_rows as $css_data_row => $css_data)
	echo "<link rel =\"stylesheet\" type = \"text/css\" href = \"".$css_data['incFile_path']."\" media = \"screen\">";


mysqli_free_result($css_data_rows);


//include all js files
$sql  = "
SELECT ".$prefix."incFile.fileType_id,".$prefix."incFile.incFile_path 
FROM ".$prefix."incFile,".$prefix."fileType
WHERE ".$prefix."incFile.fileType_id = 3 
AND ".$prefix."incFile.fileType_id = ".$prefix."fileType.fileType_id
AND ".$prefix."incFile.accessLV_id > ".($_SESSION['access_level'] - 1).";";
 
$js_data_rows = mysqli_query($conn , $sql)or die("ERROR 04".mysqli_error($conn));
 
foreach($js_data_rows as $js_data_row => $js_data)
	echo "<script src = \"".$js_data['incFile_path']."\"></script>";

mysqli_free_result($js_data_rows);


echo "<title>Deluxe Restaurant</title>";
?>