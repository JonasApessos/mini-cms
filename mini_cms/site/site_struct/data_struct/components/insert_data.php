<?php
include_once "../../document_data/db_conn.php";
include_once "../../document_data/document_data.php";
?>

<?php
function remove_tag($data)
{
	$len = strlen($data);
	for($i = 0; $i < $len; $i++)
	{
		echo "data1: ".$data[$i]."<br>";
		if($data[$i] == '<')
		{
			do
			{
				$data[$i] = '';
				$i++;
			}while($data[$i] != '>');
			
			if($data[$i] == '>')
				$data[$i] = '';
		}
	}
	return $data;
}

function filter_data($data)
{
	$data = trim($data);
	$data = remove_tag($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	
	return $data;
}
?>

<?php
	$user_name = $user_email = $user_pass = $user_gender = "";

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$user_name = filter_data($_POST['user_name']);
		$user_email = filter_data($_POST['user_email']);
		$user_pass = crypt(filter_data($_POST['user_pass']),"T51");
		$user_gender = filter_data($_POST['user_gender']);

		$sql = "INSERT INTO ".$prefix."user(accessLv_id , user_name , user_email  , user_password , user_gender) VALUES
		( 2 ,
			\"".$user_name."\",
			\"".$user_email."\",
			\"".$user_pass."\",
			\"".$user_gender."\"
		)";
		mysqli_query($conn,$sql) or die("error:".mysqli_error($conn));
	}
	else
		echo "access_denied";
	
	mysqli_close($conn);
	echo $user_name."<br>";
	echo $user_email."<br>";
	echo $user_pass."<br>";
	echo $user_gender;
	Header("Location:../../../../site");
?>