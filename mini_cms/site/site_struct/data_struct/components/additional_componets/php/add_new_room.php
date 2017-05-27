<?php
require_once "../../../../document_data/db_conn.php";
require_once "../../../../document_data/document_data.php";
require_once "data_filter.php";

$pos_title = data_filter($_POST['pos_title']);
$pos_desc = data_filter($_POST['pos_desc']);

$sql ="
INSERT INTO ".$prefix."resPos(resPos_title,resPos_desc)
VALUES (\"".$pos_title."\",\"".$pos_desc."\");";

mysqli_query($conn,$sql) or die ("ERROR 1");

Header("Location: ../../../../../?menu_id=9");
?>