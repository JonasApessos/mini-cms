<?php
include_once "site_struct/document_data/document_data.php";
include "site_struct/document_data/db_conn.php";

$sql = "SELECT submenu_id FROM re2213_submenu_structure";

$submenu_rows = mysqli_query($conn , $sql);

foreach($submenu_rows as $submenu_row)
{
    $menu_height = $menu_height + 50;
}
echo $menu_height;
$submenu_height  = 50;

mysqli_close($conn);
?>