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
		switch($img_data['compDataImg_id'])
		{
			case 1:
				echo "<img src = \"".$img_data['compDataImg_path']."\">";
				break;
			case 2:
				echo "<img src = \"".$img_data['compDataImg_path']."\">";
				break;
			case 3:
				echo "<img src = \"".$img_data['compDataImg_path']."\">";
				break;
			default:
				echo "admin buttons not found\n";
				break;
		}
	}
	mysqli_free_result($img_rows);
}
?>