<?php
include_once "../../../../document_data/db_conn.php";
include_once "../../../../document_data/document_data.php";

$sql ="
INSERT INTO ".$prefix."Dtable(Dtable_capacity,resPos_id,Dtable_blocked)
VALUES (\"".$_POST['table_capacity']."\", ".$_POST['table_respos']." ,".$_POST['table_blocked'].");";

mysqli_query($conn,$sql) or die ("ERROR 17" . mysqli_error($conn));

Header("Location: ../../../../../?menu_id=9");
?>