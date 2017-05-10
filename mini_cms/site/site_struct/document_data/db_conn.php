<?php
$server_name = "localhost";//server name of the site to connect to
$server_user = "root";//access level to the database server
$server_password = "";//password of the access level
$db_name = "re2213_restaurant_db";//fetch database name
$sql = NULL;//sql query
$conn = mysqli_connect($server_name , $server_user , $server_password , $db_name)or die("ERROR 05" . mysqli_error($conn));//server and database connection
?>