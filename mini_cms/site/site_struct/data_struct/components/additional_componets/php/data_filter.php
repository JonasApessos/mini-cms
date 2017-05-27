<?php
function remove_tag($data)
{
	$len = strlen($data);
	for($i = 0; $i < $len; $i++)
	{
		//echo "data1: ".$data[$i]."<br>";
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