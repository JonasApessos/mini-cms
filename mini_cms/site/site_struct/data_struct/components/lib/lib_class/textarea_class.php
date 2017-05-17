<?php
include_once	"attributes_methods_proccess.php";

class textarea extends html_standard_attributes_proccess
{
	public function display()
	{
		echo "<textarea ".$this->chain_attributes."></textarea>";
	}
}
?>