<?php
include_once	"attributes_methods_proccess.php";

class button extends html_standard_attributes_proccess
{
	public function display($at_input)
	{
		echo "<button ".$this->chain_attributes.">".$at_input."</button>";
	}
}

?>