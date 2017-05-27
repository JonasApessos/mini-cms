<?php
include_once	"attributes_methods_proccess.php";

class input extends html_standard_attributes_proccess
{
	public function display()
	{
		echo "<input ".$this->chain_attributes.">";
	}
}
?>