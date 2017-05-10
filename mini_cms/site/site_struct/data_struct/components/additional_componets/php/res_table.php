<?php
session_start();
?>
<?php
echo $_GET['res_name']."<br>";
echo $_GET['smoking']."<br>";
echo $_GET['res_comment']."<br>";
echo $_GET['res_date']."<br>";
echo $_SESSION['user_name']."<br>";
echo $_SESSION['user_email']."<br>";
?>