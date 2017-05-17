<?php
include_once "../../../../document_data/db_conn.php";
include_once "../../../../document_data/document_data.php";

$sql ="
INSERT INTO ".$prefix."resPos(resPos_title,resPos_desc)
VALUES (\"".$_POST['pos_title']."\",\"".$_POST['pos_desc']."\");";

mysqli_query($conn,$sql) or die ("ERROR 17" . mysqli_error($conn));

Header("Location: ../../../../../?menu_id=9");
?>