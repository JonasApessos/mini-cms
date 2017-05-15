<?php

include_once "site_struct/data_struct/components/additional_componets/php/table_editor.php";

$sql = "
SELECT ".$prefix."resPos.resPos_id , ".$prefix."resPos.resPos_title , ".$prefix."resPos.resPos_desc
FROM ".$prefix."resPos;";

$pos_rows = mysqli_query($conn,$sql) or die ("ERROR 13" . mysqli_error($conn));

echo "<div class = \"table_list_style\">";
echo "<div>";
echo "<div>";

foreach($pos_rows as $pos_row => $pos_data)
{
	echo "<div>";
	
	echo "<div>";
	echo "<h3>".$pos_data['resPos_title']."</h3>";
	echo "</div>";
	
	echo "<div>";
	$sql = "
	SELECT ".$prefix."Dtable.Dtable_id , ".$prefix."Dtable.Dtable_capacity
	FROM ".$prefix."Dtable
	WHERE ".$prefix."Dtable.resPos_id = ".$pos_data['resPos_id'].";";
	
	$table_rows = mysqli_query($conn,$sql) or die ("ERROR 14" . mysqli_error($conn));
	
	foreach($table_rows as $table_row => $table_data)
	{
		echo "<div>";
		echo "<h4>Table ID: ".$table_data['Dtable_id']."</h4>";
		echo "</div>";
	}
	echo "</div>";
	
	echo "</div>";
}

echo "<button type=\"submit\" onClick=\"display_table_editor()\"><div><img src=\"../images/img_bt_add.png\"><h4>Add table</h4></div></button> ";

echo "</div>";
echo "</div>";
echo "</div>";
?>