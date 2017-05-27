<?php
if($_SESSION['access_level'] == 1)
{
	$sql = "
	SELECT ".$prefix."compDataImg.compDataImg_id,".$prefix."compDataImg.compDataImg_path
	FROM ".$prefix."compDataImg,".$prefix."compData
	WHERE ".$prefix."compDataImg.fileType_id = 6 
	AND ".$prefix."compDataImg.compDataImg_id = ".$prefix."compData.compDataImg_id
	AND ".$prefix."compData.accessLv_id = ".$_SESSION['access_level'].";";

	$img_rows = mysqli_query($conn , $sql) or die("error images : " . mysqli_error($conn));

	foreach($img_rows as $img_row => $img_data)
	{
		echo "<button type = \"button\"><img src = \"".$img_data['compDataImg_path']."\"></button>";
	}
	
	mysqli_free_result($img_rows);
}
?>