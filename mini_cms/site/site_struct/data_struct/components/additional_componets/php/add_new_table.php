<?php
require_once "../../../../document_data/db_conn.php";
require_once "../../../../document_data/document_data.php";
require_once "data_filter.php";

$table_cap = data_filter($_POST['table_capacity']);
$table_respos = data_filter($_POST['table_respos']);
$table_block = data_filter($_POST['table_blocked']);

$sql ="
INSERT INTO ".$prefix."Dtable(Dtable_capacity,resPos_id,Dtable_blocked)
VALUES (\"".$table_cap."\", ".$table_respos." ,".$table_block.");";

mysqli_query($conn,$sql) or die ("ERROR 1");

Header("Location: ../../../../../?menu_id=9");
?>