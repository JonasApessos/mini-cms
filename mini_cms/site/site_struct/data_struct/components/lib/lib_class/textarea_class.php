<?php
include_once	"attributes_methods_proccess.php";

class textarea extends html_standard_attributes_proccess
{
	public function display()
	{
		echo "<textarea ".$this->chain_attributes."></textarea>";
	}
	
	public function display_input($input)
	{
		echo "<textarea ".$this->chain_attributes.">".$input."</textarea>";
	}
	
	public function set_dimensions($at_input_x , $at_input_y)
	{
		if(empty($at_input_x))
			$this->chain_attributes .= "";
		else
			$this->chain_attributes .= " cols=\"".$at_input_x."\"";
	
		if(empty($at_input_y))
			$this->chain_attributes .= "";
		else
			$this->chain_attributes .= " rows=\"".$at_input_y."\"";
	}
}
?>