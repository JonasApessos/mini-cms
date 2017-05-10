<?php
	include "../variables/variables.php";
	mysqli_close($conn);
	$file;
	if(!file_exists("../counter_data/counter_site.txt"))
	{
		$file = fopen("../counter_data/counter_site.txt","w+") or die("error 001");
		fwrite($file , "1");
		$site_visits =(int) fread($file , filesize("../counter_data/counter_site.txt"));
		fclose($file);
	}
	else
	{
		$file = fopen("../counter_data/counter_site.txt" , "r") or die("error 002"); 
		$site_visits =(int) fread($file , filesize("../counter_data/counter_site.txt"));
		fclose($file);
		$file = fopen("../counter_data/counter_site.txt", "w") or die("error 003");
		$site_visits++;
		fwrite($file , $site_visits);
		fclose($file);
		$file = NULL;
	}
?>